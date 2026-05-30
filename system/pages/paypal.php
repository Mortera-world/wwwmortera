<link rel="stylesheet" href="tools/donation.css">

<div class="donation-page">
    <section class="donation-hero">
        <div class="donation-intro">
            <p>Choose the MCoins package you want to donate for, then use PayPal to complete the donation.</p>
            <p class="donation-note">
                By making a donation you accept our
                <a href="?terminospaypal" target="_blank" rel="noopener noreferrer">terms and conditions</a>.
            </p>
            <div class="donation-actions">
                <button class="donation-button donation-button-primary" type="button" onclick="scrollToDonationSection('paypal-method')">Donate with PayPal</button>
                <a class="donation-button" href="https://wa.link/ptpv2i" target="_blank" rel="noopener noreferrer">WhatsApp</a>
            </div>
        </div>
    </section>

    <section class="donation-section">
        <h2>Available Packages</h2>
        <div class="coin-grid">
            <div class="coin-card">
                <div class="coin-amount">250 MCoins</div>
                <img src="images/coin1.png" alt="250 MCoins" class="coin-img">
                <div class="price">3 USD</div>
            </div>
            <div class="coin-card">
                <div class="coin-amount">550 MCoins</div>
                <img src="images/coin2.png" alt="550 MCoins" class="coin-img">
                <div class="price">6 USD</div>
            </div>
            <div class="coin-card">
                <div class="coin-amount">1200 MCoins</div>
                <img src="images/coin3.png" alt="1200 MCoins" class="coin-img">
                <div class="price">12 USD</div>
            </div>
            <div class="coin-card">
                <div class="coin-amount">1800 MCoins</div>
                <img src="images/coin4.png" alt="1800 MCoins" class="coin-img">
                <div class="price">18 USD</div>
            </div>
            <div class="coin-card">
                <div class="coin-amount">2500 MCoins</div>
                <img src="images/coin5.png" alt="2500 MCoins" class="coin-img">
                <div class="price">24 USD</div>
            </div>
            <div class="coin-card">
                <div class="coin-amount">3500 MCoins</div>
                <img src="images/coin5.png" alt="3500 MCoins" class="coin-img">
                <div class="price">29 USD</div>
            </div>
            <div class="coin-card">
                <div class="coin-amount">10000 MCoins</div>
                <img src="images/coin5.png" alt="10000 MCoins" class="coin-img">
                <div class="price">59 USD</div>
            </div>
            <div class="coin-card">
                <div class="coin-amount">15000 MCoins</div>
                <img src="images/coin6.png" alt="15000 MCoins" class="coin-img">
                <div class="price">88 USD</div>
            </div>
            <div class="coin-card">
                <div class="coin-amount">25000 MCoins</div>
                <img src="images/coin6.png" alt="25000 MCoins" class="coin-img">
                <div class="price">118 USD</div>
            </div>
            <div class="coin-card">
                <div class="coin-amount">55000 MCoins</div>
                <img src="images/coin6.png" alt="55000 MCoins" class="coin-img">
                <div class="price">236 USD</div>
            </div>
            <div class="coin-card">
                <div class="coin-amount">150000 MCoins</div>
                <img src="images/coin6.png" alt="150000 MCoins" class="coin-img">
                <div class="price">472 USD</div>
            </div>
        </div>
    </section>

    <section class="donation-section" id="paypal-method">
        <h2>Donation Method</h2>
        <p class="donation-copy">Click PayPal for more information. MCoins are sent after you send your receipt; delivery usually takes from 1 minute to 1 hour.</p>
        <p class="donation-copy"><strong>WhatsApp:</strong> +52 833 258 8698</p>

        <div class="payment-grid payment-grid-single">
            <button class="payment-card" type="button" onclick="openModal('modal1')">
                <img src="images/donacion/paypal.png" alt="PayPal">
                <span>PayPal</span>
            </button>
        </div>
    </section>
</div>

<div id="modal1" class="modal">
    <div class="modal-content donation-modal">
        <button class="closemodall" type="button" onclick="closeModal('modal1')">&times;</button>
        <img class="payment-logo payment-logo-wide" src="images/donacion/paypal.png" alt="PayPal">
        <h2>Donation via PayPal</h2>
        <div class="modal-panel">
            <strong>Steps to make the donation:</strong>
            <ol>
                <li>Click Donate and enter the amount you want to donate.</li>
                <li>Make it clear that you are making a donation, not purchasing a product. By donating, you accept our <a href="?terminospaypal" target="_blank" rel="noopener noreferrer">terms and conditions</a>.</li>
                <li>
                    <form action="https://www.paypal.com/donate" method="post" target="_top" class="paypal-donate-form">
                        <input type="hidden" name="hosted_button_id" value="XEA5F5S7A8P2A">
                        <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donate_LG.gif" border="0" name="submit" title="PayPal - The safer, easier way to pay online!" alt="Donate with PayPal button">
                        <img alt="" border="0" src="https://www.paypal.com/en_MX/i/scr/pixel.gif" width="10" height="10">
                    </form>
                </li>
                <li>After making the donation, send your player name and proof of donation by <a href="https://wa.link/ptpv2i" target="_blank" rel="noopener noreferrer">WhatsApp</a> or open a ticket in our <a href="https://discord.com/invite/xgMVtyq268" target="_blank" rel="noopener noreferrer">Discord</a>.</li>
            </ol>
            <p class="modal-note">The donation amount may change due to currency instability. Donation amounts include commission.</p>
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
