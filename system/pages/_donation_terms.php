<?php
$termsPrefix = isset($termsPrefix) ? $termsPrefix : 'donation-terms';
$termsRedirect = isset($termsRedirect) ? $termsRedirect : '?points';
$termsDefaultLanguage = isset($termsDefaultLanguage) ? $termsDefaultLanguage : 'es';
$termsTitleEs = 'Terminos y Condiciones';
$termsTitleEn = 'Terms and Conditions';
?>
<link rel="stylesheet" href="tools/simple-page.css">

<div class="simple-page" id="<?= $termsPrefix; ?>-page">
    <div class="simple-card">
        <div class="simple-toolbar">
            <button type="button" class="simple-button" id="<?= $termsPrefix; ?>-spanish-btn">Espanol</button>
            <button type="button" class="simple-button" id="<?= $termsPrefix; ?>-english-btn">English</button>
        </div>

        <div id="<?= $termsPrefix; ?>-es">
            <p>La realizacion de una donacion a Mortera World es una accion completamente voluntaria y no es necesaria para la experiencia de juego en este servidor.</p>
            <p>Al efectuar cualquier tipo de contribucion monetaria a Mortera World, aceptas que no tienes derecho a recibir compensacion alguna por parte del servidor. Estas donaciones son completamente voluntarias y tienen como unico proposito el mantenimiento y desarrollo del servidor. Como muestra de agradecimiento por tu apoyo continuo, se pueden otorgar recompensas a quienes contribuyan.</p>
            <p>Al realizar una donacion mediante PayPal, transferencia bancaria, deposito o Tibia Coins de Tibia RL, aceptas los siguientes terminos y condiciones:</p>

            <div class="simple-section">
                <h3>A. Renuncia a reclamaciones</h3>
                <ol>
                    <li>En ningun momento realizaras reclamaciones sobre tu donacion a <strong>Mortera World</strong>.</li>
                    <li>Al realizar una donacion, aceptas que <strong>Mortera World</strong> no es responsable por problemas tecnicos, interrupciones del servidor o cualquier otro inconveniente fuera de nuestro control. No garantizamos el funcionamiento continuo o ininterrumpido del servidor.</li>
                </ol>
            </div>

            <div class="simple-section">
                <h3>B. No impugnacion de cargos</h3>
                <ol>
                    <li>Te comprometes a no disputar ni impugnar los cargos efectuados en tu cuenta de PayPal u otros metodos de pago utilizados para realizar la donacion.</li>
                </ol>
            </div>

            <div class="simple-section">
                <h3>C. Caracter voluntario e irreversible</h3>
                <ol>
                    <li>Comprendes y aceptas que esta donacion es voluntaria y, como tal, no es reembolsable.</li>
                    <li>Las donaciones son contribuciones voluntarias para apoyar el proyecto y, por lo tanto, no son reembolsables. <strong>Mortera World</strong> no esta obligada a ofrecer beneficios tangibles o intangibles a los donantes; sin embargo, como muestra de agradecimiento, es posible recibir recompensas dentro del juego.</li>
                    <li>Las donaciones son definitivas y no seran reembolsadas. Por favor, realiza tu aportacion de manera consciente y voluntaria.</li>
                </ol>
            </div>

            <div class="simple-section">
                <h3>D. Definicion y aceptacion del concepto de donacion</h3>
                <p>Reconoces y aceptas los conceptos de <strong>donacion</strong> y <strong>voluntariedad</strong>, asi como las disposiciones previamente mencionadas:</p>
                <ul>
                    <li><strong>Donacion:</strong> acto de entregar algo como regalo, contribucion o subvencion sin esperar una contraprestacion.</li>
                    <li><strong>Voluntaria:</strong> accion realizada de manera libre, sin coaccion ni obligacion.</li>
                </ul>
            </div>

            <div class="simple-section">
                <h3>E. Aceptacion de los terminos</h3>
                <ol>
                    <li>Si no estas de acuerdo con estos terminos o no puedes cumplir con ellos, te abstendras de realizar una donacion.</li>
                </ol>
            </div>

            <div class="simple-section">
                <h3>F. Cumplimiento de las reglas del servidor</h3>
                <ol>
                    <li>El incumplimiento reiterado de las normas del servidor puede derivar en la suspension o prohibicion de la cuenta, sin importar si se ha realizado una donacion. En caso de infraccion de las reglas de Mortera World, las donaciones podran ser invalidadas sin posibilidad de reembolso o compensacion, incluso en situaciones de reinicio del servidor.</li>
                </ol>
            </div>

            <div class="simple-section">
                <h3>G. Cambios de terminos</h3>
                <ol>
                    <li>Nos reservamos el derecho de modificar estos terminos y condiciones en cualquier momento. Las actualizaciones se publicaran en el sitio web o se comunicaran dentro del servidor.</li>
                </ol>
            </div>

            <div class="simple-section">
                <h3>H. Contacto</h3>
                <p>Si tienes dudas o inquietudes sobre las donaciones puedes contactarnos a traves de:</p>
                <ul>
                    <li><strong>WhatsApp:</strong> +52 833 258 8698</li>
                    <li><strong>Discord:</strong> <a href="https://discord.gg/JczYp5PvCn" target="_blank" rel="noopener noreferrer">discord</a></li>
                </ul>
            </div>
        </div>

        <div id="<?= $termsPrefix; ?>-en" class="simple-hidden">
            <p>Making a donation to Mortera World is completely voluntary and is not required for the gaming experience on this server.</p>
            <p>By making any kind of monetary contribution to Mortera World, you agree that you are not entitled to any compensation from the server. These donations are completely voluntary and are for the sole purpose of maintaining and developing the server. As a token of appreciation for your continued support, rewards may be given to those who contribute.</p>
            <p>By making a donation via PayPal, bank transfer, deposit, or Tibia RL Coins, you agree to the following terms and conditions:</p>

            <div class="simple-section">
                <h3>A. Waiver of claims</h3>
                <ol>
                    <li>You will not make any claims regarding your donation to <strong>Mortera World</strong>.</li>
                    <li>By making a donation, you agree that <strong>Mortera World</strong> is not responsible for technical problems, server outages, or any other inconvenience beyond our control. We do not guarantee continuous or uninterrupted server operation.</li>
                </ol>
            </div>

            <div class="simple-section">
                <h3>B. No dispute of charges</h3>
                <ol>
                    <li>You agree not to dispute or contest charges made to your PayPal account or other payment methods used to make the donation.</li>
                </ol>
            </div>

            <div class="simple-section">
                <h3>C. Voluntary and irreversible nature of the donation</h3>
                <ol>
                    <li>You understand and agree that this donation is voluntary and, as such, is non-refundable.</li>
                    <li>Donations are voluntary contributions to support the project and, therefore, are non-refundable. <strong>Mortera World</strong> is not obligated to offer tangible or intangible benefits to donors; however, as a token of gratitude, rewards may be received within the game.</li>
                    <li>Donations are final and will not be refunded. Please make your contribution consciously and voluntarily.</li>
                </ol>
            </div>

            <div class="simple-section">
                <h3>D. Definition and acceptance of the concept of donation</h3>
                <p>You acknowledge and accept the concepts of <strong>donation</strong> and <strong>voluntariness</strong>, as well as the previously mentioned provisions:</p>
                <ul>
                    <li><strong>Donation:</strong> act of giving something as a gift, contribution, or subsidy without expecting consideration.</li>
                    <li><strong>Voluntary:</strong> action carried out freely, without coercion or obligation.</li>
                </ul>
            </div>

            <div class="simple-section">
                <h3>E. Acceptance of the terms</h3>
                <ol>
                    <li>If you do not agree with these terms or cannot comply with them, you will refrain from making a donation.</li>
                </ol>
            </div>

            <div class="simple-section">
                <h3>F. Compliance with server rules</h3>
                <ol>
                    <li>Repeated failure to comply with server rules may result in account suspension or ban, regardless of whether a donation has been made. In the event of a violation of Mortera World's rules, donations may be invalidated without the possibility of refund or compensation, even in situations of server restart.</li>
                </ol>
            </div>

            <div class="simple-section">
                <h3>G. Changes to terms</h3>
                <ol>
                    <li>We reserve the right to modify these terms and conditions at any time. Updates will be posted on the website or communicated within the server.</li>
                </ol>
            </div>

            <div class="simple-section">
                <h3>H. Contact</h3>
                <p>If you have questions or concerns about donations you can contact us through:</p>
                <ul>
                    <li><strong>WhatsApp:</strong> +52 833 258 8698</li>
                    <li><strong>Discord:</strong> <a href="https://discord.gg/JczYp5PvCn" target="_blank" rel="noopener noreferrer">discord</a></li>
                </ul>
            </div>
        </div>

        <div class="simple-accept">
            <label>
                <input type="checkbox" id="<?= $termsPrefix; ?>-accept">
                <span id="<?= $termsPrefix; ?>-accept-text">Acepto los terminos y condiciones</span>
            </label>
            <button type="button" id="<?= $termsPrefix; ?>-continue" disabled>Continuar</button>
        </div>
    </div>
</div>

<script>
    (function () {
        var prefix = <?= json_encode($termsPrefix); ?>;
        var redirect = <?= json_encode($termsRedirect); ?>;
        var language = <?= json_encode($termsDefaultLanguage); ?>;

        function byId(suffix) {
            return document.getElementById(prefix + suffix);
        }

        function updateLanguage(nextLanguage) {
            language = nextLanguage;
            var isSpanish = language !== 'en';
            byId('-es').classList.toggle('simple-hidden', !isSpanish);
            byId('-en').classList.toggle('simple-hidden', isSpanish);
            byId('-spanish-btn').classList.toggle('is-active', isSpanish);
            byId('-english-btn').classList.toggle('is-active', !isSpanish);
            byId('-title').innerText = isSpanish ? <?= json_encode($termsTitleEs); ?> : <?= json_encode($termsTitleEn); ?>;
            byId('-accept-text').innerText = isSpanish ? 'Acepto los terminos y condiciones' : 'I accept the terms and conditions';
            byId('-continue').innerText = isSpanish ? 'Continuar' : 'Continue';
        }

        byId('-spanish-btn').addEventListener('click', function () {
            updateLanguage('es');
        });
        byId('-english-btn').addEventListener('click', function () {
            updateLanguage('en');
        });
        byId('-accept').addEventListener('change', function () {
            byId('-continue').disabled = !this.checked;
        });
        byId('-continue').addEventListener('click', function () {
            window.location.href = redirect;
        });

        updateLanguage(language);
    })();
</script>
