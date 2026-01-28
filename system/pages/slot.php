<?php
defined('MYAAC') or die('Direct access not allowed!');

if (!$logged) {
    echo "Debes iniciar sesión para jugar.";
    return;
}

$minBet = 10;
$symbols = [
    1 => ['name' => 'Cereza', 'payouts' => [3 => 2, 4 => 4, 5 => 8]],
    2 => ['name' => 'Limón', 'payouts' => [3 => 2, 4 => 5, 5 => 9]],
    3 => ['name' => 'Campana', 'payouts' => [3 => 3, 4 => 6, 5 => 12]],
    4 => ['name' => 'Bar', 'payouts' => [3 => 4, 4 => 8, 5 => 15]],
    5 => ['name' => 'Uvas', 'payouts' => [3 => 5, 4 => 10, 5 => 18]],
    6 => ['name' => 'Herradura', 'payouts' => [3 => 6, 4 => 12, 5 => 20]],
    7 => ['name' => '777', 'payouts' => [3 => 10, 4 => 20, 5 => 40]],
    8 => ['name' => 'Diamante', 'payouts' => [3 => 8, 4 => 16, 5 => 30]],
    9 => ['name' => 'Corona', 'payouts' => [3 => 12, 4 => 24, 5 => 50]],
];

$winningLines = [
    ['name' => 'Línea Superior', 'positions' => [[0, 0], [0, 1], [0, 2], [0, 3], [0, 4]], 'description' => 'Fila superior completa.'],
    ['name' => 'Línea Central', 'positions' => [[1, 0], [1, 1], [1, 2], [1, 3], [1, 4]], 'description' => 'Fila central completa.'],
    ['name' => 'Línea Inferior', 'positions' => [[2, 0], [2, 1], [2, 2], [2, 3], [2, 4]], 'description' => 'Fila inferior completa.'],
    ['name' => 'V invertida', 'positions' => [[0, 0], [1, 1], [2, 2], [1, 3], [0, 4]], 'description' => 'Sube desde arriba, baja y vuelve a subir.'],
    ['name' => 'V normal', 'positions' => [[2, 0], [1, 1], [0, 2], [1, 3], [2, 4]], 'description' => 'Baja desde abajo, sube y vuelve a bajar.'],
    ['name' => 'Zigzag alto', 'positions' => [[0, 0], [1, 1], [0, 2], [1, 3], [0, 4]], 'description' => 'Alterna entre fila superior y central.'],
    ['name' => 'Zigzag bajo', 'positions' => [[2, 0], [1, 1], [2, 2], [1, 3], [2, 4]], 'description' => 'Alterna entre fila inferior y central.'],
];
?>

<style>
    .slot-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 15px;
        font-family: Arial, sans-serif;
        margin-top: 30px;
    }

    .panel {
        background: #171717;
        border: 2px solid #444;
        border-radius: 12px;
        padding: 16px 20px;
        width: min(900px, 92vw);
        color: #f0f0f0;
    }

    .panel h2 {
        margin: 0 0 12px;
        font-size: 20px;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .payout-table {
        width: 100%;
        border-collapse: collapse;
        font-size: 14px;
    }

    .payout-table th,
    .payout-table td {
        border-bottom: 1px solid #333;
        padding: 8px 10px;
        text-align: center;
    }

    .payout-symbol {
        display: flex;
        align-items: center;
        gap: 8px;
        justify-content: center;
    }

    .payout-symbol img {
        width: 32px;
        height: 32px;
        object-fit: contain;
    }

    .slot-grid {
        display: grid;
        grid-template-columns: repeat(5, 100px);
        grid-template-rows: repeat(3, 100px);
        gap: 8px;
        background: #111;
        padding: 15px;
        border: 3px solid gold;
        border-radius: 12px;
    }

    .slot-cell {
        width: 100px;
        height: 100px;
        background: #222;
        border: 2px solid #555;
        border-radius: 8px;
        overflow: hidden;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
    }

    .slot-cell img {
        width: 90%;
        height: 90%;
        object-fit: contain;
        transition: transform 0.3s ease;
    }

    .slot-cell img.spin {
        animation: spin 0.4s ease;
    }

    @keyframes spin-reel {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-10px); }
    }

    .spin {
        animation: spin-reel 0.5s ease-in-out infinite;
    }

    .controls {
        display: flex;
        gap: 10px;
        align-items: center;
    }

    #spinBtn {
        padding: 8px 20px;
        background: gold;
        border: none;
        border-radius: 6px;
        font-weight: bold;
        cursor: pointer;
    }

    #spinBtn:disabled {
        background: gray;
        cursor: not-allowed;
    }

    #result {
        margin-top: 10px;
        color: #eee;
    }

    #balance {
        font-weight: bold;
        color: #ff0000;
    }

    .line-list {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
        gap: 12px;
        width: min(900px, 92vw);
    }

    .line-card {
        background: #141414;
        border: 1px solid #333;
        border-radius: 10px;
        padding: 12px;
        color: #ddd;
        display: flex;
        flex-direction: column;
        gap: 8px;
    }

    .line-card h3 {
        margin: 0;
        font-size: 16px;
        color: #ffd700;
    }

    .mini-grid {
        display: grid;
        grid-template-columns: repeat(5, 14px);
        grid-template-rows: repeat(3, 14px);
        gap: 4px;
    }

    .mini-cell {
        width: 14px;
        height: 14px;
        border-radius: 3px;
        background: #333;
    }

    .mini-cell.active {
        background: #ffd700;
    }

    /* Efecto brillo dorado animado para celdas ganadoras */
     @keyframes glow {
       0%, 100% {
         box-shadow: 0 0 6px 2px gold, 0 0 12px 6px orange;
         border-color: gold;
       }
       50% {
         box-shadow: 0 0 14px 6px gold, 0 0 20px 10px orange;
         border-color: #ffcc00;
       }
     }
     
     .slot-cell.winning {
       animation: glow 1.5s ease-in-out infinite alternate;
       border-width: 3px !important;
     }

</style>

<div class="slot-container">
    <h1>🎰 slot machine</h1>
    <div>Tcs: <span id="balance"><?= (int) $account_logged->getCustomField('coins_transferable'); ?></span></div>
    <div class="panel">
        <h2>Premios / Payouts</h2>
        <table class="payout-table">
            <thead>
                <tr>
                    <th>Símbolo</th>
                    <th>3 en línea</th>
                    <th>4 en línea</th>
                    <th>5 en línea</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($symbols as $id => $info): ?>
                    <tr>
                        <td>
                            <div class="payout-symbol">
                                <img src="/assets/images/slots/<?= $id; ?>.png" alt="<?= htmlspecialchars($info['name']); ?>">
                                <span><?= htmlspecialchars($info['name']); ?></span>
                            </div>
                        </td>
                        <td><?= $info['payouts'][3]; ?>x</td>
                        <td><?= $info['payouts'][4]; ?>x</td>
                        <td><?= $info['payouts'][5]; ?>x</td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <div class="controls">
        <label for="betAmount">Apuesta:</label>
        <input type="number" id="betAmount" min="<?= $minBet; ?>" value="<?= $minBet; ?>">
        <button id="spinBtn">Girar</button>
    </div>
    <small>Apuesta mínima: <?= $minBet; ?> coins.</small>

    <div class="slot-grid">
        <?php for ($i = 0; $i < 15; $i++): ?>
            <div class="slot-cell" data-index="<?= $i ?>"><img src="/assets/images/slots/1.png" alt="icon"></div>
        <?php endfor; ?>
    </div>

    <div id="result"></div>
    <div class="panel">
        <h2>Combinaciones ganadoras</h2>
        <p>Las líneas pagan desde la primera columna hacia la derecha. Debes obtener al menos 3 símbolos iguales consecutivos.</p>
        <div class="line-list">
            <?php foreach ($winningLines as $line): ?>
                <div class="line-card">
                    <h3><?= htmlspecialchars($line['name']); ?></h3>
                    <div class="mini-grid">
                        <?php for ($r = 0; $r < 3; $r++): ?>
                            <?php for ($c = 0; $c < 5; $c++): ?>
                                <?php
                                    $isActive = false;
                                    foreach ($line['positions'] as $pos) {
                                        if ($pos[0] === $r && $pos[1] === $c) {
                                            $isActive = true;
                                            break;
                                        }
                                    }
                                ?>
                                <span class="mini-cell <?= $isActive ? 'active' : ''; ?>"></span>
                            <?php endfor; ?>
                        <?php endfor; ?>
                    </div>
                    <p><?= htmlspecialchars($line['description']); ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<script>
const spinBtn = document.getElementById("spinBtn");
const betInput = document.getElementById("betAmount");
const resultText = document.getElementById("result");
const balanceDisplay = document.getElementById("balance");
const cells = document.querySelectorAll(".slot-cell");

let winningLinesData = [];

spinBtn.addEventListener("click", async () => {
  const bet = parseInt(betInput.value);
  if (isNaN(bet) || bet < <?= $minBet; ?>) {
    resultText.textContent = "La apuesta mínima es de <?= $minBet; ?> coins.";
    return;
  }

  spinBtn.disabled = true;   // Bloquea el botón al empezar
  resultText.textContent = "Girando...";

  try {
    const response = await fetch("/?subtopic=spin", {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify({ bet }),
    });

    const data = await response.json();

    if (!data.success) {
      resultText.textContent = data.message || "Error al girar.";
      spinBtn.disabled = false;
      return;
    }

    winningLinesData = data.winningLines || [];

    // Ejecutar animación de giro, y luego mostrar resultado y líneas ganadoras
    animateSpin(data.grid, () => {
      balanceDisplay.textContent = data.balance;
      resultText.textContent = data.message;
      markWinningLines(winningLinesData);
      spinBtn.disabled = false;  // Desbloquear cuando termine todo
    });

  } catch (err) {
    resultText.textContent = "Error en la conexión.";
    spinBtn.disabled = false;
  }
});

function animateSpin(grid, callback) {
  const flatGrid = grid.flat();
  const spinDuration = 3500; // ms total de animación
  const spinInterval = 100; // ms cambio rápido imágenes

  const intervalId = setInterval(() => {
    cells.forEach(cell => {
      const img = cell.querySelector("img");
      const randomSymbol = Math.floor(Math.random() * 9) + 1;
      img.src = `/assets/images/slots/${randomSymbol}.png`;
      img.classList.add("spin");
      clearHighlight(cell); // Quitar cualquier línea previa
    });
  }, spinInterval);

  setTimeout(() => {
    clearInterval(intervalId);
    cells.forEach((cell, i) => {
      const img = cell.querySelector("img");
      img.src = `/assets/images/slots/${flatGrid[i]}.png`;
      img.classList.remove("spin");
    });

    callback(); // Llamar después de terminar la animación
  }, spinDuration);
}

function clearHighlight(cell) {
  cell.style.boxShadow = "";
  cell.style.borderColor = "#555";
  cell.classList.remove("winning");  // quitar clase animada
}

function markWinningLines(winningLines) {
  // Limpiar todas las marcas
  cells.forEach(cell => clearHighlight(cell));

  winningLines.forEach(line => {
    line.positions.forEach(pos => {
      const [row, col] = pos;
      const index = row * 5 + col;
      const cell = cells[index];
      cell.classList.add("winning");  // agregar clase animada
    });
  });
}

</script>
