<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* rules.html.twig */
class __TwigTemplate_81366be7a28349c9f044a25e02f20405 extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<link rel=\"stylesheet\" href=\"tools/simple-page.css\">

<div class=\"legal-documents-page\">
    <section class=\"legal-documents-hero\">
        <span>";
        // line 5
        echo twig_escape_filter($this->env, (($__internal_compile_0 = (($__internal_compile_1 = ($context["config"] ?? null)) && is_array($__internal_compile_1) || $__internal_compile_1 instanceof ArrayAccess ? ($__internal_compile_1["lua"] ?? null) : null)) && is_array($__internal_compile_0) || $__internal_compile_0 instanceof ArrayAccess ? ($__internal_compile_0["serverName"] ?? null) : null), "html", null, true);
        echo "</span>
        <h1>Legal Documents</h1>
        <p>Consulta las reglas, condiciones de uso, pagos y politicas del servidor en un solo lugar.</p>
    </section>

    <section class=\"legal-documents-list\">
        <details class=\"legal-document-card\" open>
            <summary>
                <span>Service Agreement</span>
                <strong>Terminos y servicios</strong>
                <em>Condiciones generales para crear cuenta, jugar y usar los servicios de ";
        // line 15
        echo twig_escape_filter($this->env, (($__internal_compile_2 = (($__internal_compile_3 = ($context["config"] ?? null)) && is_array($__internal_compile_3) || $__internal_compile_3 instanceof ArrayAccess ? ($__internal_compile_3["lua"] ?? null) : null)) && is_array($__internal_compile_2) || $__internal_compile_2 instanceof ArrayAccess ? ($__internal_compile_2["serverName"] ?? null) : null), "html", null, true);
        echo ".</em>
            </summary>
            <div class=\"legal-document-body\">
                <div class=\"legal-rule-row\"><b>1.</b><span>Al crear una cuenta o entrar al juego, aceptas respetar estas reglas y cualquier actualizacion publicada en la pagina.</span></div>
                <div class=\"legal-rule-row\"><b>2.</b><span>El acceso al servidor es un privilegio. El staff puede limitar, suspender o cerrar cuentas que perjudiquen el servicio o a otros jugadores.</span></div>
                <div class=\"legal-rule-row\"><b>3.</b><span>El jugador es responsable de mantener segura su cuenta, correo, contrasena y dispositivos.</span></div>
                <div class=\"legal-rule-row\"><b>4.</b><span>El servidor puede recibir cambios de balance, mapas, sistemas, recompensas o rates sin compensacion obligatoria.</span></div>
                <div class=\"legal-rule-row\"><b>5.</b><span>El uso del sitio, cliente, tienda o juego implica aceptar que el servicio se ofrece tal como esta y puede tener mantenimientos o interrupciones.</span></div>
            </div>
        </details>

        <details class=\"legal-document-card\">
            <summary>
                <span>Terms and Conditions</span>
                <strong>Terminos y condiciones</strong>
                <em>Reglas de conducta general, nombres, comunicacion y uso correcto de los sistemas.</em>
            </summary>
            <div class=\"legal-document-body\">
                <div class=\"legal-rule-row\"><b>1.</b><span>No uses nombres ofensivos, racistas, sexuales, politicos, religiosos, de staff, marcas externas o nombres creados para confundir a otros jugadores.</span></div>
                <div class=\"legal-rule-row\"><b>2.</b><span>No insultes, acoses, amenaces, publiques datos personales ni provoques conflictos dentro del juego, Discord, foro o pagina.</span></div>
                <div class=\"legal-rule-row\"><b>3.</b><span>No hagas publicidad de otros servidores, venta externa, servicios ajenos, enlaces sospechosos o comercio con dinero real fuera de los metodos permitidos.</span></div>
                <div class=\"legal-rule-row\"><b>4.</b><span>No te hagas pasar por administrador, tutor, GM, CM o cualquier miembro del equipo.</span></div>
                <div class=\"legal-rule-row\"><b>5.</b><span>Los reportes falsos, manipulados o hechos con mala intencion pueden ser sancionados.</span></div>
            </div>
        </details>

        <details class=\"legal-document-card\">
            <summary>
                <span>Gameplay Rules</span>
                <strong>Reglas de juego</strong>
                <em>Normas sobre PvP, bugs, automatizacion, abusos y comportamiento dentro del juego.</em>
            </summary>
            <div class=\"legal-document-body\">
                <div class=\"legal-rule-row\"><b>1.</b><span>Esta prohibido abusar de bugs, duplicar items, forzar errores del mapa, explotar NPCs o aprovechar fallas obvias del servidor.</span></div>
                <div class=\"legal-rule-row\"><b>2.</b><span>Esta prohibido usar bots, macros, herramientas automaticas, clientes modificados o software externo para obtener ventaja injusta.</span></div>
                <div class=\"legal-rule-row\"><b>3.</b><span>No bloquees accesos, respawns, quests, NPCs o zonas importantes con la intencion de impedir el progreso de otros jugadores.</span></div>
                <div class=\"legal-rule-row\"><b>4.</b><span>El PvP debe respetar las reglas del mundo. El abuso excesivo, persecucion organizada o uso de exploits puede ser revisado por el staff.</span></div>
                <div class=\"legal-rule-row\"><b>5.</b><span>Si encuentras un error, reportalo. Ocultarlo o usarlo para beneficio propio puede terminar en perdida de items, reset o ban.</span></div>
            </div>
        </details>

        <details class=\"legal-document-card\">
            <summary>
                <span>Account and Security</span>
                <strong>Cuentas y seguridad</strong>
                <em>Responsabilidad del jugador sobre accesos, prestamos, ventas, recuperaciones y proteccion de datos.</em>
            </summary>
            <div class=\"legal-document-body\">
                <div class=\"legal-rule-row\"><b>1.</b><span>No compartas tu cuenta. Si prestas tus datos, cualquier perdida, robo o sancion sigue siendo responsabilidad del dueno de la cuenta.</span></div>
                <div class=\"legal-rule-row\"><b>2.</b><span>La venta, compra o intercambio de cuentas puede ser sancionada si afecta la seguridad, economia o comunidad del servidor.</span></div>
                <div class=\"legal-rule-row\"><b>3.</b><span>El staff nunca pedira tu contrasena. Cualquier mensaje pidiendo datos privados debe ser reportado.</span></div>
                <div class=\"legal-rule-row\"><b>4.</b><span>Las recuperaciones de cuenta dependen de la informacion registrada y pueden ser rechazadas si no se puede verificar la propiedad.</span></div>
                <div class=\"legal-rule-row\"><b>5.</b><span>Intentos de hackeo, robo, phishing o acceso no autorizado causan sancion permanente.</span></div>
            </div>
        </details>

        <details class=\"legal-document-card\">
            <summary>
                <span>Payment Policy</span>
                <strong>Politica de pagos</strong>
                <em>Informacion sobre donaciones, puntos, monedas, entregas y responsabilidad del donador.</em>
            </summary>
            <div class=\"legal-document-body\">
                <div class=\"legal-rule-row\"><b>1.</b><span>Las aportaciones se consideran donaciones de apoyo al servidor, no compras de propiedad digital garantizada.</span></div>
                <div class=\"legal-rule-row\"><b>2.</b><span>Los puntos, coins, items o beneficios pueden tardar en acreditarse dependiendo del metodo de pago y verificacion.</span></div>
                <div class=\"legal-rule-row\"><b>3.</b><span>El jugador debe revisar que el personaje, cuenta, monto y metodo sean correctos antes de confirmar una donacion.</span></div>
                <div class=\"legal-rule-row\"><b>4.</b><span>Pagos sospechosos, revertidos, fraudulentos o no reconocidos pueden bloquear la cuenta hasta aclaracion.</span></div>
                <div class=\"legal-rule-row\"><b>5.</b><span>Los beneficios de donacion pueden cambiar por balance, mantenimiento, errores o decisiones administrativas.</span></div>
            </div>
        </details>

        <details class=\"legal-document-card\">
            <summary>
                <span>Refund Policy</span>
                <strong>Politica de reembolsos</strong>
                <em>Condiciones sobre donaciones voluntarias, pagos confirmados y ausencia de devoluciones.</em>
            </summary>
            <div class=\"legal-document-body\">
                <div class=\"legal-rule-row\"><b>1.</b><span>Toda donacion al servidor es completamente voluntaria y se realiza como apoyo al mantenimiento del proyecto.</span></div>
                <div class=\"legal-rule-row\"><b>2.</b><span>Por ningun motivo se realizan reembolsos, devoluciones, cambios por dinero, cancelaciones o compensaciones economicas.</span></div>
                <div class=\"legal-rule-row\"><b>3.</b><span>Los puntos, coins, items, beneficios o servicios entregados por una donacion no tienen valor monetario reembolsable.</span></div>
                <div class=\"legal-rule-row\"><b>4.</b><span>Antes de donar, el jugador debe revisar monto, cuenta, personaje y metodo de pago, ya que la donacion confirmada es definitiva.</span></div>
                <div class=\"legal-rule-row\"><b>5.</b><span>Contracargos, disputas o intentos de recuperar una donacion ya confirmada pueden causar bloqueo preventivo o permanente de la cuenta.</span></div>
            </div>
        </details>

        <details class=\"legal-document-card\">
            <summary>
                <span>Privacy and Data</span>
                <strong>Privacidad y datos</strong>
                <em>Uso basico de informacion de cuenta, registros de acceso, seguridad y soporte.</em>
            </summary>
            <div class=\"legal-document-body\">
                <div class=\"legal-rule-row\"><b>1.</b><span>El servidor puede guardar datos necesarios para operar cuentas, personajes, pagos, seguridad, logs y soporte.</span></div>
                <div class=\"legal-rule-row\"><b>2.</b><span>Los datos se usan para administracion del juego, proteccion contra abuso, investigacion de reportes y atencion de solicitudes.</span></div>
                <div class=\"legal-rule-row\"><b>3.</b><span>No publiques datos personales tuyos o de otros jugadores dentro de canales publicos.</span></div>
                <div class=\"legal-rule-row\"><b>4.</b><span>El staff puede revisar logs relacionados con bugs, robos, pagos, abusos, reportes o seguridad del servidor.</span></div>
                <div class=\"legal-rule-row\"><b>5.</b><span>El jugador puede contactar al staff para dudas sobre su cuenta o informacion asociada.</span></div>
            </div>
        </details>

        <details class=\"legal-document-card\">
            <summary>
                <span>Sanctions and Appeals</span>
                <strong>Sanciones y apelaciones</strong>
                <em>Consecuencias por romper reglas y proceso para pedir revision.</em>
            </summary>
            <div class=\"legal-document-body\">
                <div class=\"legal-rule-row\"><b>1.</b><span>Las sanciones pueden incluir advertencias, mute, jail, perdida de items, reset, ban temporal, ban permanente o eliminacion de cuenta.</span></div>
                <div class=\"legal-rule-row\"><b>2.</b><span>La gravedad depende del dano causado, reincidencia, intencion y evidencia disponible.</span></div>
                <div class=\"legal-rule-row\"><b>3.</b><span>Las apelaciones deben hacerse con respeto, pruebas claras y sin spam al staff.</span></div>
                <div class=\"legal-rule-row\"><b>4.</b><span>El staff puede rechazar apelaciones con informacion falsa, amenazas, insultos o pruebas editadas.</span></div>
                <div class=\"legal-rule-row\"><b>5.</b><span>La administracion puede modificar estas reglas cuando sea necesario para proteger el servidor y la comunidad.</span></div>
            </div>
        </details>
    </section>
</div>
";
    }

    public function getTemplateName()
    {
        return "rules.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  56 => 15,  43 => 5,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "rules.html.twig", "C:\\UniServerZ\\www\\system\\templates\\rules.html.twig");
    }
}
