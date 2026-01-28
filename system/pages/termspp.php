 <style>
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 800px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .language-btn {
            cursor: pointer;
            padding: 5px 10px;
            border: none;
            border-radius: 3px;
        }

        .espanol-btn {
            background-color: #3498db;
            color: #fff;
        }

        .english-btn {
            background-color: #2ecc71;
            color: #fff;
        }

        .terms-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .terms-table th,
        .terms-table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        .terms-table th {
            background-color: #3498db;
            color: #fff;
        }
		
        .accept-checkbox {
            margin-top: 10px;
        }

        .accept-label {
            display: inline-block;
            margin-top: 5px;
			font-size: 16px;
        }
    </style>
<div class="TableContainer">
            <div class="CaptionContainer">
                    <div class="CaptionInnerContainer">
                        <span class="CaptionEdgeLeftTop" style="background-image:url(./layouts/tibiacom/images/global/content/box-frame-edge.gif);"></span>
                        <span class="CaptionEdgeRightTop" style="background-image:url(./layouts/tibiacom/images/global/content/box-frame-edge.gif);"></span>
                        <span class="CaptionBorderTop" style="background-image:url(./layouts/tibiacom/images/global/content/table-headline-border.gif);"></span>
                        <span class="CaptionVerticalLeft" style="background-image:url(./layouts/tibiacom/images/global/content/box-frame-vertical.gif);"></span>
						<div class="text"><center><h2 id="terms-header">Terms and Conditions</h2></center></div>
                        <span class="CaptionVerticalRight" style="background-image:url(./layouts/tibiacom/images/global/content/box-frame-vertical.gif);"></span>
                        <span class="CaptionBorderBottom" style="background-image:url(./layouts/tibiacom/images/global/content/table-headline-border.gif);"></span>
                        <span class="CaptionEdgeLeftBottom" style="background-image:url(./layouts/tibiacom/images/global/content/box-frame-edge.gif);"></span>
                        <span class="CaptionEdgeRightBottom" style="background-image:url(./layouts/tibiacom/images/global/content/box-frame-edge.gif);"></span>
                    </div>
        </div>
		<br>
		<br>
		<br>
        <button class="language-btn espanol-btn" onclick="toggleLanguage('spanish')">Español</button>
        <button class="language-btn english-btn" onclick="toggleLanguage('english')">English</button>

        <table class="terms-table" id="terms-table">
            <thead>
                <tr>
                    <th>Section</th>
                    <th>Content</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td id="section1">Sección 1</td>
                    <td id="content1">
                        <!-- The content will be dynamically updated here -->
                    </td>
                </tr>
                <!-- Add more rows as needed -->
            </tbody>
        </table>
		
		 <center><label for="acceptCheckbox" class="accept-label">Acepto los términos y condiciones</label></center>
       <center> <input type="checkbox" id="acceptCheckbox" class="accept-checkbox"></center>
        <center><button onclick="acceptTermsAndRedirect()">accept</button></center>

		
    <script>
        // Función para redirigir a la URL si la casilla está marcada
        function acceptTermsAndRedirect() {
            var acceptCheckbox = document.getElementById('acceptCheckbox');

            if (acceptCheckbox.checked) {
                window.location.href = 'http://mortera-world.com/?paypal';
            } else {
                alert('Debes aceptar los términos y condiciones antes de continuar.');
            }
        }
        // Function to toggle language and update content
        function toggleLanguage(language) {
            var espanolBtn = document.querySelector('.espanol-btn');
            var englishBtn = document.querySelector('.english-btn');
            var termsHeader = document.getElementById('terms-header');
            var section1 = document.getElementById('section1');
            var content1 = document.getElementById('content1');

            // Toggle active class between buttons
            if (language === 'spanish') {
                espanolBtn.classList.add('active');
                englishBtn.classList.remove('active');
                termsHeader.textContent = 'Términos y Condiciones';
                section1.textContent = 'Sección 1';
                updateContent('spanish');
            } else {
                englishBtn.classList.add('active');
                espanolBtn.classList.remove('active');
                termsHeader.textContent = 'Terms and Conditions';
                section1.textContent = 'Section 1';
                updateContent('english');
            }
        }

        // Function to update content based on language
        function updateContent(language) {
            var content1Element = document.getElementById('content1');

            if (language === 'spanish') {
                content1Element.innerHTML = `
                    <p>La presentación de una donación a "mortera World" es una acción voluntaria completamente innecesaria para el juego en este servidor.</p>
                    <p>Al enviar cualquier tipo de unidad monetaria a mortera World, aceptas que no tienes derecho a recibir nada de mortera World. Esta forma de donación es completamente voluntaria y es para el bien del servidor. Las recompensas se otorgan a aquellos que han donado como agradecimiento por tu continuo apoyo al servidor.</p>
                    <p>Al enviar una donación a través de PayPal, transferencia o deposito a mortera World, aceptas los términos presentados en las siguientes 5 afirmaciones con letras (A-E) y sus subsecciones:</p>
                    <ul>
                        <li>A. En ningún momento reclamarás tu donacion a mortera World.</li>
                        <li>B. No impugnarás los cargos incurridos en tu cuenta de PayPal por tu donación voluntaria a mortera World.</li>
                        <li>C. Te das cuenta de que esta es una donación voluntaria y, al ser una donación, no es reembolsable.</li>
                        <li>D. Comprendes el concepto de "donación" y "voluntaria" y aceptas todas las reglas mencionadas anteriormente (ver subsecciones a y b).</li>
                        <ul>
                            <li>a. Donación [doh-ney-shuhn] - Sustantivo - un acto o instancia de presentar algo como un regalo, subvención o contribución.</li>
                            <li>b. Voluntaria [vol-uhn-ter-ee] - Adjetivo - hecho, realizado, llevado a cabo, emprendido, etc., por propia voluntad o por elección libre.</li>
                        </ul>
                        <li>E. Si no estás de acuerdo con estos términos o no puedes cumplir con este contrato, no envíes una donación.</li>
                        <li>F. La violación continua de las reglas de nuestro servidor conduce a la prohibición de la cuenta, sin importar si se hizo una donación antes. Si rompes la Regla 6 de mortera, tus donaciones serán invalidadas sin la posibilidad de recompensarte por tu donación si hay un reinicio.</li>
                    </ul>
                `;
            } else {
                content1Element.innerHTML = `
                    <p>Submission of a donation to "mortera World" is a voluntary action completely unnecessary for game play on this server.</p>
                    <p>By submitting any type of monetary unit to mortera World, you agree that you are not entitled to receive anything from mortera World. This form of donation is completely voluntary and is for the good of the server. Rewards are given to those who have donated as a thanks to you for your continued support of the server.</p>
                    <p>By submitting a donation via PayPal, transfer or deposit to mortera World, you agree to the terms presented in the following 5, lettered statements (A-E), and their subsections:</p>
                    <ul>
                        <li>A. You will at no time recall your donation from mortera World.</li>
                        <li>B. You will not dispute the charges incurred to your PayPal account from your voluntary donation to mortera World.</li>
                        <li>C. You realize that this is a voluntary donation, and in being a donation, it is not refundable.</li>
                        <li>D. You understand the concept of a "donation" and "voluntary" and agree to all the aforementioned rules (see subsections a and b).</li>
                        <ul>
                            <li>a. Donation [doh-ney-shuhn] - Noun - an act or instance of presenting something as a gift, grant, or contribution.</li>
                            <li>b. Voluntary [vol-uhn-ter-ee] - Adjective - done, made, brought about, undertaken, etc., of one's own accord or by free choice.</li>
                        </ul>
                        <li>E. If you do not agree to these terms or cannot honor this contract, do not send in a donation.</li>
                        <li>F. Continuous violation of our server rules leads to account ban, no matter if a donation was made before. If you break mortera Rule 6, your donations will be invalidated without the possibility of us rewarding you for your donation if there is a reset.</li>
                    </ul>
                `;
            }
        }

        // Set Spanish as the default language
        toggleLanguage('spanish');
    </script>
</div>