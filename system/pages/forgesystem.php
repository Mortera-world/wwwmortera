<link rel="stylesheet" href="tools/simple-page.css">

<div class="simple-page" id="top">
    <div class="simple-hero">
        <div class="simple-toolbar forge-toolbar">
            <button class="simple-button" type="button" data-forge-target="Habilidades">Habilidades</button>
            <button class="simple-button" type="button" data-forge-target="Tiers">Tiers</button>
            <button class="simple-button" type="button" data-forge-target="Howto">Como usar</button>
            <button class="simple-button" type="button" data-forge-target="Fiendish">Fiendish</button>
            <button class="simple-button" type="button" data-forge-target="influencedCreatures">Influenced</button>
            <button class="simple-button" type="button" data-forge-target="DSE">Recursos</button>
        </div>
        <p>El sistema de Exaltation Forge permite mejorar armas, armaduras y cascos con habilidades especiales permanentes.</p>
        <p>Para usarlo, dirigete a la Forja de Exaltacion ubicada en Adventurers' Guild.</p>
    </div>

    <section class="simple-section" id="Habilidades">
        <h3>Habilidades</h3>
        <div class="simple-grid">
            <div class="simple-card-item simple-center">
                <img src="https://www.tibiawiki.com.br/images/4/4a/Onslaught.gif" alt="Onslaught" width="64" height="64">
                <h3>Onslaught</h3>
                <p>Para armas. Funciona parecido al critico de imbuements y puede agregar dano extra al ataque.</p>
            </div>
            <div class="simple-card-item simple-center">
                <img src="https://www.tibiawiki.com.br/images/5/59/Ruse.gif" alt="Ruse" width="64" height="64">
                <h3>Ruse</h3>
                <p>Para armaduras. Funciona como un dodge, pero sin restricciones de criatura seleccionada.</p>
            </div>
            <div class="simple-card-item simple-center">
                <img src="https://www.tibiawiki.com.br/images/2/28/Momentum.gif" alt="Momentum" width="64" height="64">
                <h3>Momentum</h3>
                <p>Para cascos. Puede reducir el cooldown de hechizos secundarios, permitiendo mejores rotaciones.</p>
            </div>
        </div>
    </section>

    <section class="simple-section" id="Tiers">
        <h3>Tiers</h3>
        <p>El efecto base de cada habilidad es el mismo; lo que aumenta con el tier es la probabilidad de activacion.</p>
        <table class="simple-data-table">
            <thead>
            <tr>
                <th>Tier</th>
                <th>Onslaught</th>
                <th>Ruse</th>
                <th>Momentum</th>
            </tr>
            </thead>
            <tbody>
            <tr><td>1</td><td>0.5%</td><td>0.5%</td><td>2.00%</td></tr>
            <tr><td>2</td><td>1.5%</td><td>1.3%</td><td>4.05%</td></tr>
            <tr><td>3</td><td>1.7%</td><td>1.62%</td><td>6.2%</td></tr>
            <tr><td>4</td><td>2.45%</td><td>2.28%</td><td>8.45%</td></tr>
            <tr><td>5</td><td>3.3%</td><td>3.0%</td><td>10.80%</td></tr>
            <tr><td>6</td><td>4.25%</td><td>3.78%</td><td>13.25%</td></tr>
            <tr><td>7</td><td>5.3%</td><td>4.62%</td><td>15.80%</td></tr>
            <tr><td>8</td><td>6.45%</td><td>5.52%</td><td>18.45%</td></tr>
            <tr><td>9</td><td>7.7%</td><td>6.48%</td><td>21.20%</td></tr>
            <tr><td>10</td><td>9.5%</td><td>7.51%</td><td>24.05%</td></tr>
            </tbody>
        </table>
    </section>

    <section class="simple-section" id="Howto">
        <h3>Como usar</h3>
        <div class="simple-grid">
            <div class="simple-card-item">
                <h3>Fusion</h3>
                <p>Fusiona dos items iguales para subir el tier de uno de ellos. Ambos deben ser iguales, tener el mismo tier y no estar imbuidos.</p>
                <p>Necesitas <strong>100 dust</strong> <img class="simple-icon" src="/images/forge/Dust.gif" alt="Dust">, dinero y opcionalmente <strong>Exalted Core</strong> <img class="simple-icon" src="/images/forge/Exalted_Core.gif" alt="Exalted Core">.</p>
            </div>
            <div class="simple-card-item">
                <h3>Mas probabilidad</h3>
                <p>Usar un Exalted Core puede aumentar la posibilidad de exito de 50% a 80%.</p>
            </div>
            <div class="simple-card-item">
                <h3>Menos perdida</h3>
                <p>Usar un Exalted Core tambien puede reducir la perdida en caso de fallo.</p>
            </div>
            <div class="simple-card-item">
                <h3>Transferencia de tier</h3>
                <p>Permite mover un tier a otro item de la misma clasificacion. El item que transfiere debe tener al menos tier 2 y se consume en el proceso.</p>
            </div>
        </div>
    </section>

    <section class="simple-section" id="Fiendish">
        <h3>Fiendish Creatures</h3>
        <p><img src="/images/forge/Fiendish_Dwarf_Guard.png" alt="Fiendish creature" style="float:right; max-width:130px; margin:0 0 10px 12px;">Las criaturas fiendish e influenced son versiones mas fuertes de criaturas comunes. Tienen mas dano y vida maxima segun sus stacks.</p>
        <p>Las fiendish tienen un icono especial <img class="simple-icon" src="/images/forge/Fiendish_Creature_Icon.png" alt="Fiendish icon"> y una sombra naranja en el nombre.</p>
        <div style="clear:both"></div>
    </section>

    <section class="simple-section" id="influencedCreatures">
        <h3>Influenced Creatures</h3>
        <p>Las criaturas influenced pueden tener de 1 a 5 stacks. Estos se muestran debajo del nombre junto al icono <img class="simple-icon" src="/images/forge/Influenced_Creature_Icon.png" alt="Influenced icon">.</p>
        <p>Mientras mas stacks tenga la criatura, mas fuerte sera y mas recursos puede producir.</p>
    </section>

    <section class="simple-section" id="DSE">
        <h3>Dusts, Slivers and Exalted Cores</h3>
        <div class="simple-grid">
            <div class="simple-card-item">
                <h3>Dust</h3>
                <p><img class="simple-icon" src="/images/forge/Dust.gif" alt="Dust"> Se obtiene de criaturas fiendish e influenced.</p>
            </div>
            <div class="simple-card-item">
                <h3>Slivers</h3>
                <p><img class="simple-icon" src="/images/forge/Sliver.gif" alt="Sliver"> Las criaturas fiendish producen slivers.</p>
            </div>
            <div class="simple-card-item">
                <h3>Exalted Core</h3>
                <p><img class="simple-icon" src="/images/forge/Exalted_Core.gif" alt="Exalted Core"> Puedes transformar 50 slivers en 1 Exalted Core.</p>
            </div>
        </div>
        <p>Tambien puedes transformar 30 Dust en 30 Slivers. Al matar criaturas fiendish o influenced en party shared, los miembros elegibles reciben la misma cantidad de dust.</p>
    </section>
</div>

<script>
document.querySelectorAll('[data-forge-target]').forEach(function (button) {
    button.addEventListener('click', function () {
        var target = document.getElementById(button.getAttribute('data-forge-target'));
        if (!target) {
            return;
        }

        target.scrollIntoView({
            behavior: 'smooth',
            block: 'start'
        });
    });
});
</script>
