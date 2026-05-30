<link rel="stylesheet" href="tools/donation.css">

<div class="donation-page">
    <section class="donation-hero">
        <div class="donation-intro">
            <p>Elige el paquete de MCoins que quieres donar y despues selecciona un metodo de pago.</p>
            <p class="donation-note">
                Al hacer una donacion aceptas nuestros
                <a href="?terminos" target="_blank" rel="noopener noreferrer">terminos y condiciones</a>.
            </p>
            <div class="donation-actions">
                <button class="donation-button donation-button-primary" type="button" onclick="scrollToDonationSection('donation-methods')">Ver metodos</button>
                <a class="donation-button" href="https://wa.link/ptpv2i" target="_blank" rel="noopener noreferrer">WhatsApp</a>
            </div>
        </div>
    </section>

    <section class="donation-section">
        <h2>Paquetes disponibles</h2>
        <div class="coin-grid">
            <div class="coin-card">
                <div class="coin-amount">250 MCoins</div>
                <img src="images/coin1.png" alt="250 MCoins" class="coin-img">
                <div class="price">50 MXN</div>
            </div>
            <div class="coin-card">
                <div class="coin-amount">550 MCoins</div>
                <img src="images/coin2.png" alt="550 MCoins" class="coin-img">
                <div class="price">100 MXN</div>
            </div>
            <div class="coin-card">
                <div class="coin-amount">1200 MCoins</div>
                <img src="images/coin3.png" alt="1200 MCoins" class="coin-img">
                <div class="price">200 MXN</div>
            </div>
            <div class="coin-card">
                <div class="coin-amount">1800 MCoins</div>
                <img src="images/coin4.png" alt="1800 MCoins" class="coin-img">
                <div class="price">300 MXN</div>
            </div>
            <div class="coin-card">
                <div class="coin-amount">2500 MCoins</div>
                <img src="images/coin5.png" alt="2500 MCoins" class="coin-img">
                <div class="price">400 MXN</div>
            </div>
            <div class="coin-card">
                <div class="coin-amount">3500 MCoins</div>
                <img src="images/coin5.png" alt="3500 MCoins" class="coin-img">
                <div class="price">500 MXN</div>
            </div>
            <div class="coin-card">
                <div class="coin-amount">10000 MCoins</div>
                <img src="images/coin5.png" alt="10000 MCoins" class="coin-img">
                <div class="price">1000 MXN</div>
            </div>
            <div class="coin-card">
                <div class="coin-amount">15000 MCoins</div>
                <img src="images/coin6.png" alt="15000 MCoins" class="coin-img">
                <div class="price">1500 MXN</div>
            </div>
            <div class="coin-card">
                <div class="coin-amount">25000 MCoins</div>
                <img src="images/coin6.png" alt="25000 MCoins" class="coin-img">
                <div class="price">2000 MXN</div>
            </div>
            <div class="coin-card">
                <div class="coin-amount">55000 MCoins</div>
                <img src="images/coin6.png" alt="55000 MCoins" class="coin-img">
                <div class="price">4000 MXN</div>
            </div>
            <div class="coin-card">
                <div class="coin-amount">150000 MCoins</div>
                <img src="images/coin6.png" alt="150000 MCoins" class="coin-img">
                <div class="price">8000 MXN</div>
            </div>
        </div>
    </section>

    <section class="donation-section" id="donation-methods">
        <h2>Metodos de donacion</h2>
        <p class="donation-copy">Click en un metodo para ver los datos. El envio de MCoins puede tomar de 1 minuto a 1 hora despues de enviar el comprobante.</p>
        <p class="donation-copy"><strong>WhatsApp:</strong> +52 833 258 8698</p>

        <div class="payment-grid">
            <button class="payment-card" type="button" onclick="openModal('modal1')">
                <img src="images/donacion/oxxo.png" alt="OXXO">
                <span>OXXO</span>
            </button>
            <button class="payment-card" type="button" onclick="openModal('modal2')">
                <img src="images/donacion/mp.png" alt="Mercado Pago">
                <span>Mercado Pago</span>
            </button>
            <button class="payment-card" type="button" onclick="openModal('modal3')">
                <img src="images/donacion/felix.png" alt="Felix Pago">
                <span>Felix Pago</span>
            </button>
        </div>
    </section>
</div>

<div id="modal1" class="modal">
    <div class="modal-content donation-modal">
        <button class="closemodall" type="button" onclick="closeModal('modal1')">&times;</button>
        <img class="payment-logo" src="images/donacion/oxxo.png" alt="OXXO">
        <h2>Donacion mediante deposito en OXXO</h2>
        <div class="modal-panel">
            <strong>Pasos para realizar el deposito:</strong>
            <ol>
                <li>Acude a la sucursal de OXXO mas cercana.</li>
                <li>Solicita realizar un deposito a la siguiente tarjeta:</li>
                <li><strong>Coppel - 4169 1608 1552 7859</strong></li>
                <li>Indica el monto que deseas depositar.</li>
                <li>Envia tu nombre de jugador y el comprobante por <a href="https://wa.link/ptpv2i" target="_blank" rel="noopener noreferrer">WhatsApp</a> o abre un ticket en <a href="https://discord.gg/JczYp5PvCn" target="_blank" rel="noopener noreferrer">Discord</a>.</li>
            </ol>
        </div>
    </div>
</div>

<div id="modal2" class="modal">
    <div class="modal-content donation-modal">
        <button class="closemodall" type="button" onclick="closeModal('modal2')">&times;</button>
        <img class="payment-logo" src="images/donacion/mp.png" alt="Mercado Pago">
        <h2>Donacion mediante transferencia SPEI / Mercado Pago</h2>
        <div class="modal-panel">
            <strong>Pasos para realizar la transferencia:</strong>
            <ol>
                <li>Inicia sesion en la app o sitio web de tu banco.</li>
                <li>Busca la seccion de transferencia.</li>
                <li><strong>CLABE:</strong> 722969010822421470</li>
                <li><strong>Beneficiario:</strong> Adrian Alvarez Ovalle</li>
                <li><strong>Institucion/banco:</strong> Mercado Pago W</li>
                <li>Digita el monto que deseas transferir.</li>
                <li>Envia tu nombre de jugador y la captura por <a href="https://wa.link/ptpv2i" target="_blank" rel="noopener noreferrer">WhatsApp</a> o abre un ticket en <a href="https://discord.gg/JczYp5PvCn" target="_blank" rel="noopener noreferrer">Discord</a>.</li>
            </ol>
        </div>
    </div>
</div>

<div id="modal3" class="modal">
    <div class="modal-content donation-modal">
        <button class="closemodall" type="button" onclick="closeModal('modal3')">&times;</button>
        <img class="payment-logo" src="images/donacion/felix.png" alt="Felix Pago">
        <h2>Donacion mediante Felix Pago</h2>
        <div class="modal-panel">
            <strong>Este metodo es solo para personas de USA.</strong>
            <p>Envia un <a href="https://wa.link/ptpv2i" target="_blank" rel="noopener noreferrer">WhatsApp</a> o abre un ticket en nuestro <a href="https://discord.gg/JczYp5PvCn" target="_blank" rel="noopener noreferrer">Discord</a> para mayor informacion acerca de este metodo.</p>
        </div>
    </div>
</div>

<script>
    function scrollToDonationSection(sectionId) {
        var target = document.getElementById(sectionId);

        if (!target) {
            return;
        }

        window.scrollTo({
            top: target.getBoundingClientRect().top + window.pageYOffset - 12,
            behavior: 'smooth'
        });
    }
</script>
<script src="tools/donation.js"></script>
