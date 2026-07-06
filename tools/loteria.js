(function () {
    'use strict';

    var root = document.getElementById('loteria-app');
    var bootstrapNode = document.getElementById('loteria-bootstrap');
    if (!root || !bootstrapNode) return;

    var config = JSON.parse(bootstrapNode.textContent);
    var state = {
        roomId: null,
        room: null,
        data: null,
        selected: new Set(),
        pendingMarks: new Map(),
        polling: false,
        pollTimer: null,
        lobbyTimer: null,
        signatures: {},
        activeCardIndex: 0,
        sound: true,
        lastDrawnId: null,
        introAudio: null,
        introRoomId: null,
        introHandledRoomId: null,
        introCanFinish: false,
        introHasEnded: false,
        introFinishPending: false,
        queuedCardAudio: null,
        toastTimer: null
    };

    var el = function (id) { return document.getElementById(id); };
    var lobby = el('loteria-lobby');
    var roomView = el('loteria-room');
    var dialog = el('loteria-create-dialog');
    var editDialog = el('loteria-edit-dialog');
    var historyDialog = el('loteria-history-dialog');

    function endpoint(action, params) {
        var url = config.apiUrl + encodeURIComponent(action);
        Object.keys(params || {}).forEach(function (key) {
            url += '&' + encodeURIComponent(key) + '=' + encodeURIComponent(params[key]);
        });
        return url;
    }

    async function request(action, options) {
        options = options || {};
        var response = await fetch(endpoint(action, options.params), {
            method: options.method || 'GET',
            credentials: 'same-origin',
            cache: 'no-store',
            headers: options.method === 'POST' ? {
                'Content-Type': 'application/json',
                'X-CSRF-Token': config.csrf,
                'X-Requested-With': 'XMLHttpRequest'
            } : { 'X-Requested-With': 'XMLHttpRequest' },
            body: options.method === 'POST' ? JSON.stringify(options.body || {}) : undefined
        });

        var payload;
        try {
            payload = await response.json();
        } catch (error) {
            throw new Error('El servidor no devolvio una respuesta valida.');
        }
        if (!response.ok || !payload.ok) {
            if (response.status === 401) window.location.reload();
            throw new Error(payload.error || 'No se pudo completar la solicitud.');
        }
        return payload.data;
    }

    function formatCoins(value) {
        return new Intl.NumberFormat('es-MX').format(Number(value || 0));
    }

    function statusLabel(status) {
        return status === 'waiting' ? 'Esperando jugadores'
            : status === 'playing' ? 'En juego' : 'Finalizada';
    }

    function statusClass(status) {
        return 'loteria-status' + (status === 'playing' ? ' loteria-status--playing'
            : status === 'finished' ? ' loteria-status--finished' : '');
    }

    function showToast(message, isError) {
        var toast = el('loteria-toast');
        clearTimeout(state.toastTimer);
        toast.textContent = message;
        toast.classList.toggle('is-error', !!isError);
        toast.hidden = false;
        state.toastTimer = setTimeout(function () { toast.hidden = true; }, 4200);
    }

    function setButtonBusy(button, busy, busyText) {
        if (!button) return;
        if (busy) {
            button.dataset.originalText = button.textContent;
            button.textContent = busyText || 'Procesando…';
            button.disabled = true;
        } else {
            button.textContent = button.dataset.originalText || button.textContent;
            button.disabled = false;
        }
    }

    function createImage(card, alt) {
        var image = document.createElement('img');
        image.src = card.image;
        image.alt = alt || card.name;
        image.loading = 'lazy';
        image.addEventListener('error', function () {
            var parent = image.closest('.loteria-cell, .loteria-drawn-mini');
            if (parent) parent.classList.add('has-image-error');
        });
        return image;
    }

    async function loadLobby(quiet) {
        quiet = quiet === true;
        stopPolling();
        stopIntroduction();
        state.roomId = null;
        state.room = null;
        state.data = null;
        state.selected.clear();
        state.pendingMarks.clear();
        state.signatures = {};
        state.activeCardIndex = 0;
        state.lastDrawnId = null;
        lobby.hidden = false;
        roomView.hidden = true;
        if (!quiet) el('loteria-room-list').innerHTML = '<div class="loteria-loading">Buscando salas…</div>';
        try {
            var data = await request('list');
            el('loteria-balance').textContent = formatCoins(data.balance);
            renderLobby(data.rooms);
        } catch (error) {
            el('loteria-room-list').innerHTML = '<div class="loteria-loading">No fue posible cargar las salas.</div>';
            showToast(error.message, true);
        } finally {
            if (!state.roomId) {
                state.lobbyTimer = setTimeout(function () { loadLobby(true); }, config.lobbyPollInterval || 10000);
            }
        }
    }

    function renderLobby(rooms) {
        var container = el('loteria-room-list');
        container.replaceChildren();
        if (!rooms.length) {
            var empty = document.createElement('div');
            empty.className = 'loteria-loading';
            empty.textContent = 'No hay salas todavia. Puedes inaugurar la primera mesa.';
            container.appendChild(empty);
            return;
        }

        rooms.forEach(function (room) {
            var card = document.createElement('article');
            card.className = 'loteria-room-card';

            var top = document.createElement('div');
            top.className = 'loteria-room-card__top';
            var status = document.createElement('span');
            status.className = statusClass(room.status);
            status.textContent = statusLabel(room.status);
            var mine = document.createElement('small');
            mine.textContent = room.my_cards ? room.my_cards + ' carta' + (room.my_cards > 1 ? 's' : '') + ' tuya' + (room.my_cards > 1 ? 's' : '') : '';
            top.append(status, mine);

            var title = document.createElement('h3');
            title.textContent = room.name;
            var creator = document.createElement('p');
            creator.className = 'loteria-room-card__creator';
            creator.textContent = 'Creada por ' + room.creator_name;

            var stats = document.createElement('div');
            stats.className = 'loteria-room-card__stats';
            var players = document.createElement('span');
            players.textContent = room.player_count + ' / ' + room.max_players + ' jugadores';
            var price = document.createElement('span');
            price.textContent = formatCoins(room.card_price) + ' TC · ' + room.victory_mode_label;
            stats.append(players, price);

            var pot = document.createElement('div');
            pot.className = 'loteria-room-card__pot';
            pot.textContent = 'Pozo: ' + formatCoins(room.prize_pool) + ' TC';

            var button = document.createElement('button');
            button.type = 'button';
            button.className = 'loteria-button loteria-button--primary';
            button.textContent = room.status === 'finished' ? 'Ver resultados' : room.my_cards ? 'Volver a la mesa' : 'Entrar a la sala';
            button.addEventListener('click', function () { openRoom(room.id, true); });

            card.append(top, title, creator, stats, pot, button);
            container.appendChild(card);
        });
    }

    function roomUrl(roomId) {
        var url = new URL(config.pageUrl, window.location.href);
        if (roomId) url.searchParams.set('room', roomId);
        else url.searchParams.delete('room');
        return url.toString();
    }

    async function openRoom(roomId, pushHistory) {
        roomId = Number(roomId);
        if (!Number.isInteger(roomId) || roomId <= 0) return;
        stopPolling();
        stopIntroduction();
        state.roomId = roomId;
        state.room = null;
        state.data = null;
        state.selected.clear();
        state.pendingMarks.clear();
        state.signatures = {};
        state.activeCardIndex = 0;
        state.lastDrawnId = null;
        lobby.hidden = true;
        roomView.hidden = false;
        el('loteria-room-name').textContent = 'Cargando sala…';
        if (pushHistory) history.pushState({ roomId: roomId }, '', roomUrl(roomId));
        await pollRoom(true);
    }

    async function pollRoom(showErrors) {
        if (!state.roomId || state.polling) return;
        state.polling = true;
        try {
            var data = await request('state', { params: { room_id: state.roomId } });
            renderRoom(data);
        } catch (error) {
            if (showErrors) showToast(error.message, true);
            if (/no existe/i.test(error.message)) {
                history.replaceState({}, '', roomUrl(null));
                loadLobby();
                return;
            }
        } finally {
            state.polling = false;
            if (state.roomId && !(state.data && state.data.archived)) {
                state.pollTimer = setTimeout(function () { pollRoom(false); }, config.pollInterval);
            }
        }
    }

    function stopPolling() {
        clearTimeout(state.pollTimer);
        clearTimeout(state.lobbyTimer);
        state.pollTimer = null;
        state.lobbyTimer = null;
        state.polling = false;
    }

    function renderRoom(data) {
        state.room = data.room;
        state.data = data;
        el('loteria-balance').textContent = formatCoins(data.balance);
        el('loteria-room-name').textContent = data.room.name;
        var status = el('loteria-room-status');
        status.className = statusClass(data.room.status);
        status.textContent = statusLabel(data.room.status);
        el('loteria-room-meta').textContent = formatCoins(data.room.card_price) + ' TC por carta · una baraja cada '
            + data.room.speed_seconds + ' s · ' + data.room.victory_mode_label + ' · creada por ' + data.room.creator_name;
        el('loteria-pot').textContent = formatCoins(data.room.prize_pool);

        renderCurrent(data.current, data.room.status, data.room.intro_pending);
        renderPlayers(data.players, data.room.max_players);
        renderWinners(data.winners, data.room.prize_pool);
        renderHistory(data.drawn);
        renderOwnedCards(data.my_cards, data.drawn, data.room.status);
        renderOffers(data.offers, data.my_cards.length, data.room);

        el('loteria-finished-notice').hidden = !data.archived;
        var editButton = el('loteria-edit');
        var deleteButton = el('loteria-delete');
        editButton.hidden = !(data.room.is_creator && data.room.status === 'waiting' && !data.archived);
        deleteButton.hidden = !(data.room.is_creator && !data.archived);

        var start = el('loteria-start');
        start.hidden = !(data.room.is_creator && data.room.status === 'waiting');
        if (!start.hidden) {
            start.disabled = !data.room.can_start;
            start.title = data.room.can_start ? 'Comenzar ahora' : 'Se necesitan al menos ' + data.room.rules.min_players + ' jugadores con carta';
        }

        if (data.room.intro_pending) {
            if (state.introHandledRoomId !== state.roomId) {
                startIntroduction(state.roomId, data.room.is_creator);
            } else if (data.room.is_creator) {
                allowIntroductionFinish(state.roomId);
            }
        }

        if (data.current && data.current.id !== state.lastDrawnId) {
            var shouldPlay = state.lastDrawnId !== null || data.drawn.length === 1;
            state.lastDrawnId = data.current.id;
            if (shouldPlay && data.room.status === 'playing') {
                if (state.introAudio && !state.introHasEnded) state.queuedCardAudio = data.current;
                else playCardAudio(data.current);
            }
        }
    }

    function renderCurrent(current, status, introPending) {
        var signature = (current ? current.id + ':' + current.order : 'empty') + ':' + status + ':' + !!introPending;
        if (state.signatures.current === signature) return;
        state.signatures.current = signature;
        var container = el('loteria-current');
        container.replaceChildren();
        if (!current) {
            container.className = 'loteria-current-empty';
            var strong = document.createElement('strong');
            strong.textContent = status === 'finished' ? 'Partida finalizada'
                : introPending ? 'Reproduciendo introduccion' : 'Esperando el inicio';
            var detail = document.createElement('span');
            detail.textContent = introPending
                ? 'La primera baraja saldra al terminar el audio.'
                : 'La primera baraja aparecera aqui.';
            container.append(strong, detail);
            return;
        }
        container.className = 'loteria-current-card';
        var image = createImage(current, current.name);
        image.loading = 'eager';
        var text = document.createElement('div');
        var number = document.createElement('span');
        number.className = 'loteria-current-card__number';
        number.textContent = 'Baraja ' + current.id + ' · turno ' + current.order;
        var name = document.createElement('h3');
        name.textContent = current.name;
        var copy = document.createElement('p');
        copy.textContent = status === 'finished' ? 'Esta fue la ultima baraja cantada.' : '¡Busca esta imagen en tus cartas!';
        text.append(number, name, copy);
        container.append(image, text);
    }

    function renderPlayers(players, maxPlayers) {
        var signature = JSON.stringify(players) + ':' + maxPlayers;
        if (state.signatures.players === signature) return;
        state.signatures.players = signature;
        el('loteria-player-count').textContent = players.length + ' / ' + maxPlayers;
        var list = el('loteria-player-list');
        list.replaceChildren();
        if (!players.length) {
            var empty = document.createElement('li');
            empty.textContent = 'Sin jugadores con carta';
            list.appendChild(empty);
            return;
        }
        players.forEach(function (player) {
            var item = document.createElement('li');
            var name = document.createElement('strong');
            name.textContent = player.display_name;
            var cards = document.createElement('span');
            cards.textContent = player.cards_bought + ' carta' + (player.cards_bought > 1 ? 's' : '');
            item.append(name, cards);
            list.appendChild(item);
        });
    }

    function renderWinners(winners) {
        var signature = JSON.stringify(winners);
        if (state.signatures.winners === signature) return;
        state.signatures.winners = signature;
        var list = el('loteria-winner-list');
        list.replaceChildren();
        for (var place = 1; place <= 3; place++) {
            var winner = winners.find(function (item) { return item.place === place; });
            var row = document.createElement('li');
            row.dataset.place = place;
            var name = document.createElement('strong');
            name.textContent = winner ? winner.player_name : 'Lugar disponible';
            var prize = document.createElement('span');
            prize.textContent = winner && winner.paid_at ? formatCoins(winner.prize_amount) + ' TC' : (place === 1 ? '60%' : place === 2 ? '25%' : '15%');
            row.append(name, prize);
            list.appendChild(row);
        }
    }

    function renderHistory(drawn) {
        var signature = drawn.map(function (card) { return card.id + ':' + card.order; }).join('|');
        if (state.signatures.history === signature) return;
        state.signatures.history = signature;
        el('loteria-draw-count').textContent = drawn.length + ' / 54';
        var history = el('loteria-draw-history');
        var popup = el('loteria-history-popup-grid');
        var openButton = el('loteria-history-open');
        openButton.disabled = drawn.length === 0;
        el('loteria-history-popup-count').textContent = drawn.length + ' baraja' + (drawn.length === 1 ? '' : 's');
        history.replaceChildren();
        popup.replaceChildren();
        if (!drawn.length) {
            var empty = document.createElement('p');
            empty.className = 'loteria-empty-copy';
            empty.textContent = 'Todavia no ha salido ninguna baraja.';
            history.appendChild(empty);
            var popupEmpty = empty.cloneNode(true);
            popup.appendChild(popupEmpty);
            return;
        }
        drawn.forEach(function (card) {
            history.appendChild(buildHistoryCard(card));
            popup.appendChild(buildHistoryCard(card));
        });
        history.scrollLeft = history.scrollWidth;
    }

    function buildHistoryCard(card) {
        var mini = document.createElement('div');
        mini.className = 'loteria-drawn-mini';
        mini.title = card.order + '. ' + card.name;
        var image = createImage(card, card.name);
        var order = document.createElement('span');
        order.textContent = card.order;
        mini.append(image, order);
        return mini;
    }

    function buildCardGrid(cells, markedIds, pendingIds, drawnIds, playerCardId, playable) {
        var grid = document.createElement('div');
        grid.className = 'loteria-card-grid';
        cells.forEach(function (card, index) {
            var cell = document.createElement(playerCardId ? 'button' : 'div');
            if (playerCardId) cell.type = 'button';
            cell.className = 'loteria-cell';
            cell.title = card.name;
            var isMarked = markedIds.has(card.id);
            var isPending = pendingIds.has(card.id);
            var isDrawn = drawnIds.has(card.id);
            cell.classList.toggle('is-marked', isMarked);
            cell.classList.toggle('is-pending', isPending);
            cell.classList.toggle('is-drawn', isDrawn);
            var image = createImage(card, card.name);
            var fallback = document.createElement('span');
            fallback.className = 'loteria-cell__fallback';
            fallback.textContent = card.id + ' ' + card.name;
            cell.append(image, fallback);
            if (playerCardId) {
                cell.disabled = !playable || !isDrawn || isMarked;
                if (!isDrawn) cell.title = card.name + ' · aun no cantada';
                cell.addEventListener('click', function () { markCell(playerCardId, index, card.id, cell); });
            }
            grid.appendChild(cell);
        });
        return grid;
    }

    function renderOwnedCards(cards, drawn, roomStatus) {
        var pendingSignature = Array.from(state.pendingMarks.keys()).sort().join(',');
        var drawnSignature = drawn.map(function (card) { return card.id; }).join(',');
        var signature = JSON.stringify(cards.map(function (card) {
            return [card.id, card.marked, card.is_completed];
        })) + '|' + roomStatus + '|' + drawnSignature + '|' + pendingSignature;
        if (state.signatures.ownedCards === signature) return;
        state.signatures.ownedCards = signature;
        var container = el('loteria-my-cards');
        var navigation = el('loteria-card-nav');
        navigation.hidden = cards.length <= 1;
        state.activeCardIndex = Math.min(state.activeCardIndex, Math.max(0, cards.length - 1));
        container.replaceChildren();
        if (!cards.length) {
            var empty = document.createElement('p');
            empty.className = 'loteria-empty-copy';
            empty.textContent = 'Aun no has comprado cartas en esta sala.';
            container.appendChild(empty);
            return;
        }
        var drawnIds = new Set(drawn.map(function (card) { return card.id; }));
        cards.forEach(function (card, cardIndex) {
            var pendingIds = new Set();
            state.pendingMarks.forEach(function (pending) {
                if (pending.playerCardId === card.id) pendingIds.add(pending.catalogId);
            });
            var markedIds = new Set(card.marked);
            pendingIds.forEach(function (id) { markedIds.add(id); });
            var wrapper = document.createElement('article');
            wrapper.className = 'loteria-owned-card' + (card.is_completed ? ' is-complete' : '');
            wrapper.dataset.playerCardIndex = String(cardIndex);
            wrapper.setAttribute('aria-label', 'Carta ' + (cardIndex + 1) + ' de ' + cards.length);
            var label = document.createElement('div');
            label.className = 'loteria-owned-card__label';
            var name = document.createElement('span');
            name.textContent = 'Carta ' + (cardIndex + 1);
            var progress = document.createElement('span');
            progress.dataset.cardProgress = String(card.id);
            progress.textContent = card.is_completed ? '¡Ganadora!' : markedIds.size + ' marcadas';
            label.append(name, progress);
            wrapper.append(label, buildCardGrid(card.cells, markedIds, pendingIds, drawnIds, card.id, roomStatus === 'playing' && !card.is_completed));
            container.appendChild(wrapper);
        });
        requestAnimationFrame(function () { showPlayerCard(state.activeCardIndex, false); });
    }

    function showPlayerCard(index, smooth) {
        var container = el('loteria-my-cards');
        var cards = container.querySelectorAll('[data-player-card-index]');
        if (!cards.length) return;
        index = (index + cards.length) % cards.length;
        state.activeCardIndex = index;
        var target = cards[index];
        var left = target.offsetLeft - Math.max(0, (container.clientWidth - target.offsetWidth) / 2);
        container.scrollTo({ left: Math.max(0, left), behavior: smooth === false ? 'auto' : 'smooth' });
        el('loteria-card-position').textContent = 'Carta ' + (index + 1) + ' de ' + cards.length;
    }

    function syncCardPositionFromScroll() {
        var container = el('loteria-my-cards');
        var cards = container.querySelectorAll('[data-player-card-index]');
        if (cards.length <= 1) return;
        var center = container.scrollLeft + container.clientWidth / 2;
        var closest = 0;
        var distance = Infinity;
        cards.forEach(function (card, index) {
            var cardCenter = card.offsetLeft + card.offsetWidth / 2;
            var currentDistance = Math.abs(cardCenter - center);
            if (currentDistance < distance) {
                distance = currentDistance;
                closest = index;
            }
        });
        if (closest !== state.activeCardIndex) {
            state.activeCardIndex = closest;
            el('loteria-card-position').textContent = 'Carta ' + (closest + 1) + ' de ' + cards.length;
        }
    }

    function renderOffers(offers, boughtCount, room) {
        var panel = el('loteria-buy-panel');
        var container = el('loteria-offers');
        var canBuy = room.status === 'waiting' && boughtCount < room.rules.cards_per_player && offers.length > 0;
        panel.hidden = !canBuy;
        if (!canBuy) {
            state.selected.clear();
            state.signatures.offers = 'hidden:' + room.status + ':' + boughtCount;
            return;
        }

        var availableTokens = new Set(offers.map(function (offer) { return offer.token; }));
        Array.from(state.selected).forEach(function (token) {
            if (!availableTokens.has(token)) state.selected.delete(token);
        });
        var maximum = room.rules.cards_per_player - boughtCount;
        var signature = offers.map(function (offer) { return offer.token; }).join('|')
            + ':' + Array.from(state.selected).sort().join('|') + ':' + boughtCount + ':' + room.card_price;
        if (state.signatures.offers === signature) {
            updateSelection(room.card_price);
            return;
        }
        state.signatures.offers = signature;
        container.replaceChildren();
        offers.forEach(function (offer, index) {
            var option = document.createElement('button');
            option.type = 'button';
            option.className = 'loteria-card-option';
            option.classList.toggle('is-selected', state.selected.has(offer.token));
            option.setAttribute('aria-pressed', state.selected.has(offer.token) ? 'true' : 'false');
            option.title = 'Carta propuesta ' + (index + 1);
            var check = document.createElement('span');
            check.className = 'loteria-card-option__check';
            check.textContent = '✓';
            option.append(buildCardGrid(offer.cells, new Set(), new Set(), new Set(), null, false), check);
            option.addEventListener('click', function () {
                if (state.selected.has(offer.token)) state.selected.delete(offer.token);
                else if (state.selected.size < maximum) state.selected.add(offer.token);
                else showToast('Puedes escoger ' + maximum + ' carta' + (maximum > 1 ? 's' : '') + ' mas.', true);
                renderOffers(offers, boughtCount, room);
            });
            container.appendChild(option);
        });
        updateSelection(room.card_price);
    }

    function updateSelection(cardPrice) {
        var count = state.selected.size;
        el('loteria-selection-total').textContent = count + ' seleccionada' + (count === 1 ? '' : 's')
            + (count ? ' · ' + formatCoins(count * cardPrice) + ' TC' : '');
        var buy = el('loteria-buy');
        buy.disabled = count === 0;
        buy.textContent = count ? 'Comprar por ' + formatCoins(count * cardPrice) + ' TC' : 'Comprar seleccionadas';
    }

    function updateCardProgress(playerCardId) {
        if (!state.data) return;
        var card = state.data.my_cards.find(function (item) { return item.id === playerCardId; });
        var progress = document.querySelector('[data-card-progress="' + playerCardId + '"]');
        if (!card || !progress) return;
        var ids = new Set(card.marked);
        state.pendingMarks.forEach(function (pending) {
            if (pending.playerCardId === playerCardId) ids.add(pending.catalogId);
        });
        progress.textContent = card.is_completed ? '¡Ganadora!' : ids.size + ' marcadas';
    }

    async function markCell(playerCardId, cellIndex, catalogId, button) {
        if (!state.roomId || button.disabled) return;
        var pendingKey = playerCardId + ':' + catalogId;
        if (state.pendingMarks.has(pendingKey)) return;

        state.pendingMarks.set(pendingKey, {
            playerCardId: playerCardId,
            catalogId: catalogId,
            cellIndex: cellIndex
        });
        button.classList.add('is-marked', 'is-pending');
        button.disabled = true;
        updateCardProgress(playerCardId);
        try {
            var result = await request('mark', {
                method: 'POST',
                body: { room_id: state.roomId, player_card_id: playerCardId, cell_index: cellIndex }
            });
            var card = state.data && state.data.my_cards.find(function (item) { return item.id === playerCardId; });
            if (card) {
                card.marked = result.marked;
                card.is_completed = result.completed;
            }
            state.pendingMarks.delete(pendingKey);
            button.classList.remove('is-pending');
            button.classList.add('is-marked');
            updateCardProgress(playerCardId);
            if (result.completed) {
                showToast(result.place
                    ? '¡Loteria! Obtuviste el lugar ' + result.place + '.'
                    : result.already_winner
                        ? 'Patron completado; tu cuenta ya tiene un premio en esta partida.'
                        : 'Carta ganadora confirmada.');
            }
            state.signatures.ownedCards = '';
            if (state.data) renderOwnedCards(state.data.my_cards, state.data.drawn, state.data.room.status);
            pollRoom(false);
        } catch (error) {
            state.pendingMarks.delete(pendingKey);
            button.classList.remove('is-marked', 'is-pending');
            showToast(error.message, true);
            button.disabled = false;
            updateCardProgress(playerCardId);
            state.signatures.ownedCards = '';
            if (state.data) renderOwnedCards(state.data.my_cards, state.data.drawn, state.data.room.status);
        }
    }

    async function buySelected() {
        if (!state.roomId || !state.selected.size) return;
        var button = el('loteria-buy');
        setButtonBusy(button, true, 'Confirmando compra…');
        try {
            var result = await request('buy', {
                method: 'POST',
                body: { room_id: state.roomId, tokens: Array.from(state.selected) }
            });
            state.selected.clear();
            showToast('Compra lista: ' + result.cards_bought + ' carta' + (result.cards_bought > 1 ? 's' : '') + ' por ' + formatCoins(result.total_cost) + ' TC.');
            await pollRoom(false);
        } catch (error) {
            showToast(error.message, true);
        } finally {
            setButtonBusy(button, false);
            if (state.room) updateSelection(state.room.card_price);
        }
    }

    async function startGame() {
        if (!state.roomId) return;
        var button = el('loteria-start');
        setButtonBusy(button, true, 'Iniciando…');
        // Se inicia desde el clic para conservar el permiso de reproduccion del navegador.
        startIntroduction(state.roomId, false);
        try {
            await request('start', { method: 'POST', body: { room_id: state.roomId } });
            allowIntroductionFinish(state.roomId);
            showToast('¡La partida comenzo!');
            await pollRoom(false);
        } catch (error) {
            stopIntroduction();
            showToast(error.message, true);
        } finally {
            setButtonBusy(button, false);
        }
    }

    function playCardAudio(card) {
        if (!state.sound || !card.audio) return;
        var audio = new Audio(card.audio);
        audio.preload = 'auto';
        audio.play().catch(function () {
            // Un audio ausente o bloqueado por el navegador nunca detiene el juego.
        });
    }

    function startIntroduction(roomId, canFinish) {
        if (!roomId || !config.introAudio || state.introHandledRoomId === roomId) {
            if (canFinish) allowIntroductionFinish(roomId);
            return;
        }
        stopIntroduction();
        var audio = new Audio(config.introAudio);
        state.introAudio = audio;
        state.introRoomId = roomId;
        state.introHandledRoomId = roomId;
        state.introCanFinish = !!canFinish;
        state.introHasEnded = false;
        state.queuedCardAudio = null;
        audio.preload = 'auto';
        audio.muted = !state.sound;

        var settle = function () {
            if (state.introRoomId !== roomId || state.introHasEnded) return;
            state.introHasEnded = true;
            state.introAudio = null;
            if (state.introCanFinish) finishIntroduction(roomId);
            if (state.queuedCardAudio) {
                var queued = state.queuedCardAudio;
                state.queuedCardAudio = null;
                playCardAudio(queued);
            }
        };
        audio.addEventListener('ended', settle, { once: true });
        audio.addEventListener('error', settle, { once: true });
        var playback = audio.play();
        if (playback && typeof playback.catch === 'function') playback.catch(settle);
    }

    function allowIntroductionFinish(roomId) {
        if (state.introRoomId !== roomId) return;
        state.introCanFinish = true;
        if (state.introHasEnded) finishIntroduction(roomId);
    }

    async function finishIntroduction(roomId) {
        if (!roomId || state.introFinishPending || state.roomId !== roomId) return;
        state.introFinishPending = true;
        try {
            await request('intro_finished', { method: 'POST', body: { room_id: roomId } });
            await pollRoom(false);
        } catch (error) {
            // El respaldo del servidor iniciara el sorteo si esta llamada no llega.
        } finally {
            state.introFinishPending = false;
        }
    }

    function stopIntroduction() {
        var audio = state.introAudio;
        state.introAudio = null;
        state.introRoomId = null;
        state.introHandledRoomId = null;
        state.introCanFinish = false;
        state.introHasEnded = false;
        state.introFinishPending = false;
        state.queuedCardAudio = null;
        if (audio) {
            audio.pause();
            audio.removeAttribute('src');
            audio.load();
        }
    }

    function toggleSound() {
        state.sound = !state.sound;
        if (state.introAudio) state.introAudio.muted = !state.sound;
        var button = el('loteria-sound');
        button.setAttribute('aria-pressed', state.sound ? 'true' : 'false');
        button.textContent = state.sound ? '🔊 Sonido activo' : '🔇 Sonido apagado';
        showToast(state.sound ? 'Audio de barajas activado.' : 'Audio de barajas desactivado.');
    }

    function openCreateDialog() {
        if (typeof dialog.showModal === 'function') dialog.showModal();
        else dialog.setAttribute('open', 'open');
    }

    function closeCreateDialog() {
        if (typeof dialog.close === 'function') dialog.close();
        else dialog.removeAttribute('open');
    }

    async function createRoom(event) {
        event.preventDefault();
        var form = event.currentTarget;
        var submit = form.querySelector('[type="submit"]');
        var values = new FormData(form);
        setButtonBusy(submit, true, 'Creando sala…');
        try {
            var result = await request('create', {
                method: 'POST',
                body: {
                    name: values.get('name'),
                    card_price: Number(values.get('card_price')),
                    speed_seconds: Number(values.get('speed_seconds')),
                    max_players: Number(values.get('max_players')),
                    victory_mode: values.get('victory_mode')
                }
            });
            closeCreateDialog();
            form.reset();
            showToast('Sala creada. Ya puedes escoger tu carta.');
            openRoom(result.room_id, true);
        } catch (error) {
            showToast(error.message, true);
        } finally {
            setButtonBusy(submit, false);
        }
    }

    function openEditDialog() {
        if (!state.room || state.room.status !== 'waiting' || !state.room.is_creator) return;
        var form = el('loteria-edit-form');
        form.elements.name.value = state.room.name;
        form.elements.card_price.value = state.room.card_price;
        form.elements.max_players.value = state.room.max_players;
        var speedValue = String(state.room.speed_seconds);
        var speedOption = form.querySelector('select[name="speed_seconds"] option[value="' + speedValue + '"]');
        if (!speedOption) {
            speedOption = document.createElement('option');
            speedOption.value = speedValue;
            speedOption.textContent = speedValue + ' segundos';
            form.elements.speed_seconds.appendChild(speedOption);
        }
        form.elements.speed_seconds.value = speedValue;
        form.elements.victory_mode.value = state.room.victory_mode;
        if (typeof editDialog.showModal === 'function') editDialog.showModal();
        else editDialog.setAttribute('open', 'open');
    }

    function closeEditDialog() {
        if (typeof editDialog.close === 'function') editDialog.close();
        else editDialog.removeAttribute('open');
    }

    function openHistoryDialog() {
        if (!state.data || !state.data.drawn.length) return;
        if (typeof historyDialog.showModal === 'function') historyDialog.showModal();
        else historyDialog.setAttribute('open', 'open');
    }

    function closeHistoryDialog() {
        if (typeof historyDialog.close === 'function') historyDialog.close();
        else historyDialog.removeAttribute('open');
    }

    async function saveRoom(event) {
        event.preventDefault();
        if (!state.roomId) return;
        var form = event.currentTarget;
        var values = new FormData(form);
        var submit = form.querySelector('[type="submit"]');
        setButtonBusy(submit, true, 'Guardando…');
        try {
            await request('edit', {
                method: 'POST',
                body: {
                    room_id: state.roomId,
                    name: values.get('name'),
                    card_price: Number(values.get('card_price')),
                    speed_seconds: Number(values.get('speed_seconds')),
                    max_players: Number(values.get('max_players')),
                    victory_mode: values.get('victory_mode')
                }
            });
            closeEditDialog();
            showToast('La configuracion de la sala fue actualizada.');
            pollRoom(false);
        } catch (error) {
            showToast(error.message, true);
        } finally {
            setButtonBusy(submit, false);
        }
    }

    async function deleteCurrentRoom() {
        if (!state.roomId || !state.room || !state.room.is_creator) return;
        var accepted = window.confirm('¿Eliminar esta sala ahora? Las compras seran reembolsadas y todos los jugadores saldran.');
        if (!accepted) return;
        var button = el('loteria-delete');
        setButtonBusy(button, true, 'Eliminando…');
        try {
            await request('delete', { method: 'POST', body: { room_id: state.roomId } });
            showToast('Sala eliminada. Las compras fueron reembolsadas.');
            history.pushState({}, '', roomUrl(null));
            loadLobby();
        } catch (error) {
            showToast(error.message, true);
            setButtonBusy(button, false);
        }
    }

    function sendLeave(roomId) {
        if (!roomId) return Promise.resolve();
        return fetch(endpoint('leave'), {
            method: 'POST', credentials: 'same-origin', keepalive: true,
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-Token': config.csrf,
                'X-Requested-With': 'XMLHttpRequest'
            },
            body: JSON.stringify({ room_id: roomId })
        }).catch(function () {});
    }

    el('loteria-refresh').addEventListener('click', loadLobby);
    el('loteria-open-create').addEventListener('click', openCreateDialog);
    el('loteria-close-create').addEventListener('click', closeCreateDialog);
    el('loteria-create-form').addEventListener('submit', createRoom);
    el('loteria-edit').addEventListener('click', openEditDialog);
    el('loteria-close-edit').addEventListener('click', closeEditDialog);
    el('loteria-edit-form').addEventListener('submit', saveRoom);
    el('loteria-history-open').addEventListener('click', openHistoryDialog);
    el('loteria-history-close').addEventListener('click', closeHistoryDialog);
    el('loteria-card-prev').addEventListener('click', function () { showPlayerCard(state.activeCardIndex - 1, true); });
    el('loteria-card-next').addEventListener('click', function () { showPlayerCard(state.activeCardIndex + 1, true); });
    el('loteria-my-cards').addEventListener('scroll', function () {
        requestAnimationFrame(syncCardPositionFromScroll);
    }, { passive: true });
    el('loteria-delete').addEventListener('click', deleteCurrentRoom);
    el('loteria-buy').addEventListener('click', buySelected);
    el('loteria-start').addEventListener('click', startGame);
    el('loteria-sound').addEventListener('click', toggleSound);
    el('loteria-back').addEventListener('click', function () {
        var previousRoom = state.roomId;
        history.pushState({}, '', roomUrl(null));
        loadLobby();
        sendLeave(previousRoom);
    });
    window.addEventListener('popstate', function () {
        var previousRoom = state.roomId;
        var roomId = Number(new URL(window.location.href).searchParams.get('room'));
        if (roomId > 0) openRoom(roomId, false);
        else loadLobby();
        if (previousRoom && previousRoom !== roomId) sendLeave(previousRoom);
    });
    document.addEventListener('visibilitychange', function () {
        if (!document.hidden && state.roomId) pollRoom(false);
    });
    window.addEventListener('pagehide', function () {
        if (state.roomId) sendLeave(state.roomId);
    });

    var initialRoomId = Number(new URL(window.location.href).searchParams.get('room'));
    if (initialRoomId > 0) openRoom(initialRoomId, false);
    else loadLobby();
}());
