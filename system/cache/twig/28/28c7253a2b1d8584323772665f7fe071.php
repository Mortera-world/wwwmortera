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

/* account.management.html.twig */
class __TwigTemplate_83c7faa5d3d009d6bb2cd702bce2405e extends \Twig\Template
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
        echo "<link rel=\"stylesheet\" href=\"/tools/simple-page.css?v=20260531\">

<div class=\"account-management-page\">
  <section class=\"account-management-hero\">
    <span>Account Management</span>
    <h1>";
        // line 6
        echo ($context["welcome_message"] ?? null);
        echo "</h1>
    <p>Administra tu cuenta, personajes, seguridad y datos publicos desde un solo lugar.</p>
  </section>

  <section class=\"account-management-grid account-management-grid-top\">
    <article class=\"account-management-card account-management-status-card\">
      <div class=\"account-management-card-heading\">
        <span>Account Status</span>
        <h2>";
        // line 14
        echo twig_escape_filter($this->env, ($context["tag"] ?? null), "html", null, true);
        echo " Status</h2>
        <p>";
        // line 15
        echo twig_escape_filter($this->env, (($__internal_compile_0 = ($context["account_expire_time"] ?? null)) && is_array($__internal_compile_0) || $__internal_compile_0 instanceof ArrayAccess ? ($__internal_compile_0[0] ?? null) : null), "html", null, true);
        if ((($__internal_compile_1 = ($context["account_expire_time"] ?? null)) && is_array($__internal_compile_1) || $__internal_compile_1 instanceof ArrayAccess ? ($__internal_compile_1[1] ?? null) : null)) {
            echo " Puedes activar beneficios desde la tienda.";
        }
        echo "</p>
      </div>

      <div class=\"account-management-status\">
        ";
        // line 19
        if (twig_get_attribute($this->env, $this->source, ($context["account_logged"] ?? null), "isPremium", [], "method", false, false, false, 19)) {
            // line 20
            echo "          <img src=\"";
            echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
            echo "/images/account/account-status_green.gif\" title=\"";
            echo twig_escape_filter($this->env, ($context["tag"] ?? null), "html", null, true);
            echo " Account\" alt=\"";
            echo twig_escape_filter($this->env, ($context["tag"] ?? null), "html", null, true);
            echo " account\">
        ";
        } else {
            // line 22
            echo "          <img src=\"";
            echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
            echo "/images/account/account-status_red.gif\" title=\"Free Account\" alt=\"free account\">
        ";
        }
        // line 24
        echo "        <strong>";
        echo ($context["account_status"] ?? null);
        echo "</strong>
      </div>

      <div class=\"account-management-actions\">
        ";
        // line 28
        if (twig_get_attribute($this->env, $this->source, ($context["config"] ?? null), "gifts_system", [], "any", false, false, false, 28)) {
            // line 29
            echo "          <a class=\"account-management-button account-management-button-green\" href=\"?points\">Get Coins</a>
        ";
        }
        // line 31
        echo "        <a class=\"account-management-button account-management-button-blue\" href=\"?downloadclient\">Download Client</a>
        <form action=\"";
        // line 32
        echo twig_escape_filter($this->env, $this->env->getFunction('getLink')->getCallable()("account/logout"), "html", null, true);
        echo "\" method=\"post\">
          <button class=\"account-management-button account-management-button-red\" type=\"submit\">Logout</button>
        </form>
      </div>
    </article>

    <article class=\"account-management-card\">
      <div class=\"account-management-card-heading\">
        <span>Quick Actions</span>
        <h2>Seguridad</h2>
        <p>Cambia tus datos sensibles o registra tu cuenta con recovery key.</p>
      </div>

      <div class=\"account-management-actions account-management-actions-stack\">
        <form action=\"";
        // line 46
        echo twig_escape_filter($this->env, $this->env->getFunction('getLink')->getCallable()("account/password"), "html", null, true);
        echo "\" method=\"post\">
          <button class=\"account-management-button account-management-button-blue\" type=\"submit\">Change Password</button>
        </form>
        <form action=\"";
        // line 49
        echo twig_escape_filter($this->env, $this->env->getFunction('getLink')->getCallable()("account/email"), "html", null, true);
        echo "\" method=\"post\">
          <input type=\"hidden\" name=\"newemail\" value=\"\">
          <input type=\"hidden\" name=\"newemaildate\" value=\"0\">
          <button class=\"account-management-button account-management-button-blue\" type=\"submit\">Change Email</button>
        </form>
        ";
        // line 54
        if (twig_test_empty(($context["recovery_key"] ?? null))) {
            // line 55
            echo "          <form action=\"";
            echo twig_escape_filter($this->env, $this->env->getFunction('getLink')->getCallable()("account/register"), "html", null, true);
            echo "\" method=\"post\">
            <button class=\"account-management-button account-management-button-green\" type=\"submit\">Register Account</button>
          </form>
        ";
        } elseif (twig_get_attribute($this->env, $this->source,         // line 58
($context["config"] ?? null), "generate_new_reckey", [], "any", false, false, false, 58)) {
            // line 59
            echo "          <form action=\"";
            echo twig_escape_filter($this->env, $this->env->getFunction('getLink')->getCallable()("account/register/new"), "html", null, true);
            echo "\" method=\"post\">
            <button class=\"account-management-button account-management-button-green\" type=\"submit\">Buy New Recovery Key</button>
          </form>
        ";
        }
        // line 63
        echo "      </div>
    </article>
  </section>

  ";
        // line 67
        if (twig_test_empty(($context["recovery_key"] ?? null))) {
            // line 68
            echo "    <section class=\"account-management-notice\">
      <div>
        <span>Recovery Key</span>
        <strong>Your account is not registered!</strong>
        <p>Registra tu cuenta para obtener una recovery key y mejorar la proteccion de acceso.</p>
      </div>
      <form action=\"";
            // line 74
            echo twig_escape_filter($this->env, $this->env->getFunction('getLink')->getCallable()("account/register"), "html", null, true);
            echo "\" method=\"post\">
        <button class=\"account-management-button account-management-button-green\" type=\"submit\">Register Account</button>
      </form>
    </section>
  ";
        }
        // line 79
        echo "
  ";
        // line 80
        if (($context["email_request"] ?? null)) {
            // line 81
            echo "    <section class=\"account-management-notice account-management-notice-warn\">
      <div>
        <span>Email Request</span>
        <strong>Hay un cambio de correo pendiente</strong>
        <p>A request has been submitted to change the email address to <b>";
            // line 85
            echo twig_escape_filter($this->env, ($context["email_new"] ?? null), "html", null, true);
            echo "</b>. After <b>";
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, ($context["email_new_time"] ?? null), "j F Y, G:i:s"), "html", null, true);
            echo "</b> you can accept the new email address.</p>
      </div>
      <form action=\"";
            // line 87
            echo twig_escape_filter($this->env, $this->env->getFunction('getLink')->getCallable()("account/email"), "html", null, true);
            echo "\" method=\"post\">
        <button class=\"account-management-button account-management-button-blue\" type=\"submit\">Review</button>
      </form>
    </section>
  ";
        }
        // line 92
        echo "
  <section class=\"account-management-card\">
    <div class=\"account-management-card-heading account-management-heading-row\">
      <div>
        <span>Characters</span>
        <h2>Regular Characters</h2>
        <p>Administra tus personajes activos, comentarios y opciones disponibles.</p>
      </div>
      <div class=\"account-management-actions\">
        <form action=\"";
        // line 101
        echo twig_escape_filter($this->env, $this->env->getFunction('getLink')->getCallable()("account/character/create"), "html", null, true);
        echo "\" method=\"post\">
          <button class=\"account-management-button account-management-button-green\" type=\"submit\">Create Character</button>
        </form>
        ";
        // line 104
        if (twig_get_attribute($this->env, $this->source, ($context["config"] ?? null), "account_change_character_name", [], "any", false, false, false, 104)) {
            // line 105
            echo "          <form action=\"";
            echo twig_escape_filter($this->env, $this->env->getFunction('getLink')->getCallable()("account/character/name"), "html", null, true);
            echo "\" method=\"post\">
            <button class=\"account-management-button account-management-button-blue\" type=\"submit\">Change Name</button>
          </form>
        ";
        }
        // line 109
        echo "        ";
        if (twig_get_attribute($this->env, $this->source, ($context["config"] ?? null), "account_change_character_sex", [], "any", false, false, false, 109)) {
            // line 110
            echo "          <form action=\"";
            echo twig_escape_filter($this->env, $this->env->getFunction('getLink')->getCallable()("account/character/sex"), "html", null, true);
            echo "\" method=\"post\">
            <button class=\"account-management-button account-management-button-blue\" type=\"submit\">Change Sex</button>
          </form>
        ";
        }
        // line 114
        echo "      </div>
    </div>

    <div class=\"account-management-character-list\">
      ";
        // line 118
        $context["i"] = 0;
        // line 119
        echo "      ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["players"] ?? null));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["player"]) {
            // line 120
            echo "        ";
            $context["i"] = (($context["i"] ?? null) + 1);
            // line 121
            echo "        <article class=\"account-management-character\">
          <div class=\"account-management-character-index\">";
            // line 122
            echo twig_escape_filter($this->env, ($context["i"] ?? null), "html", null, true);
            echo "</div>
          <div class=\"account-management-character-main\">
            <a href=\"";
            // line 124
            echo twig_escape_filter($this->env, $this->env->getFunction('getLink')->getCallable()(("characters/" . twig_urlencode_filter(twig_get_attribute($this->env, $this->source, $context["player"], "getName", [], "method", false, false, false, 124)))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["player"], "getName", [], "method", false, false, false, 124), "html", null, true);
            echo "</a>
            ";
            // line 125
            if (twig_get_attribute($this->env, $this->source, $context["player"], "isDeleted", [], "method", false, false, false, 125)) {
                // line 126
                echo "              <strong class=\"account-management-badge account-management-badge-red\">Deleted</strong>
            ";
            }
            // line 128
            echo "            ";
            if (twig_get_attribute($this->env, $this->source, $context["player"], "isMain", [], "method", false, false, false, 128)) {
                // line 129
                echo "              <strong class=\"account-management-badge\">Main</strong>
            ";
            }
            // line 131
            echo "            <p>";
            echo twig_escape_filter($this->env, (($__internal_compile_2 = twig_get_attribute($this->env, $this->source, ($context["config"] ?? null), "vocations", [], "any", false, false, false, 131)) && is_array($__internal_compile_2) || $__internal_compile_2 instanceof ArrayAccess ? ($__internal_compile_2[twig_get_attribute($this->env, $this->source, $context["player"], "getVocation", [], "method", false, false, false, 131)] ?? null) : null), "html", null, true);
            echo " - Level ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["player"], "getLevel", [], "method", false, false, false, 131), "html", null, true);
            echo " - ";
            echo twig_escape_filter($this->env, (($__internal_compile_3 = (($__internal_compile_4 = ($context["config"] ?? null)) && is_array($__internal_compile_4) || $__internal_compile_4 instanceof ArrayAccess ? ($__internal_compile_4["lua"] ?? null) : null)) && is_array($__internal_compile_3) || $__internal_compile_3 instanceof ArrayAccess ? ($__internal_compile_3["serverName"] ?? null) : null), "html", null, true);
            echo "</p>
          </div>
          <div class=\"account-management-character-state\">
            ";
            // line 134
            if (twig_get_attribute($this->env, $this->source, $context["player"], "isOnline", [], "method", false, false, false, 134)) {
                // line 135
                echo "              <span class=\"account-management-online\">Online</span>
            ";
            } else {
                // line 137
                echo "              <span class=\"account-management-offline\">Offline</span>
            ";
            }
            // line 139
            echo "          </div>
          <div class=\"account-management-character-actions\">
            ";
            // line 141
            if ( !twig_get_attribute($this->env, $this->source, $context["player"], "isDeleted", [], "method", false, false, false, 141)) {
                // line 142
                echo "              <a class=\"account-management-mini-button\" href=\"";
                echo twig_escape_filter($this->env, $this->env->getFunction('getLink')->getCallable()(("account/character/comment/" . twig_urlencode_filter(twig_get_attribute($this->env, $this->source, $context["player"], "getName", [], "method", false, false, false, 142)))), "html", null, true);
                echo "\">Edit</a>
            ";
            }
            // line 144
            echo "            <a class=\"account-management-mini-button account-management-mini-button-red\" href=\"";
            echo twig_escape_filter($this->env, $this->env->getFunction('getLink')->getCallable()("account/character/delete"), "html", null, true);
            echo "\">Delete</a>
          </div>
        </article>
      ";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 148
            echo "        <div class=\"account-management-empty\">No tienes personajes en esta cuenta.</div>
      ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['player'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 150
        echo "    </div>
  </section>

  <section class=\"account-management-grid\">
    <article class=\"account-management-card\">
      <div class=\"account-management-card-heading\">
        <span>General Information</span>
        <h2>Datos de cuenta</h2>
        <p>Informacion privada de acceso y estado de la cuenta.</p>
      </div>

      <div class=\"account-management-info-list\">
        <div><span>Account ";
        // line 162
        if (twig_constant("USE_ACCOUNT_NAME")) {
            echo "Name";
        } else {
            echo "Number";
        }
        echo "</span><strong>";
        echo twig_escape_filter($this->env, ($context["account"] ?? null), "html", null, true);
        echo "</strong></div>
        <div><span>Email Address</span><strong>";
        // line 163
        echo twig_escape_filter($this->env, ($context["account_email"] ?? null), "html", null, true);
        echo ($context["email_change"] ?? null);
        echo "</strong></div>
        <div><span>Created</span><strong>";
        // line 164
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, ($context["account_created"] ?? null), "M d Y, G:i:s"), "html", null, true);
        echo "</strong></div>
        <div><span>Last Login</span><strong>";
        // line 165
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, ($context["account_web_lastlogin"] ?? null), "M d Y, G:i:s"), "html", null, true);
        echo "</strong></div>
        <div><span>Account Status</span><strong>";
        // line 166
        echo ($context["account_status"] ?? null);
        echo "</strong></div>
        <div><span>Tibia Coins</span><strong>";
        // line 167
        echo twig_escape_filter($this->env, ($context["account_coins"] ?? null), "html", null, true);
        echo " (";
        echo twig_escape_filter($this->env, ($context["account_coins_transferable"] ?? null), "html", null, true);
        echo " transferable)</strong></div>
        <div><span>Tournament Coins</span><strong>";
        // line 168
        echo twig_escape_filter($this->env, ($context["tournament_coins"] ?? null), "html", null, true);
        echo "</strong></div>
        <div><span>Registered</span><strong>";
        // line 169
        echo ($context["account_registered"] ?? null);
        echo "</strong></div>
      </div>
    </article>

    <article class=\"account-management-card\">
      <div class=\"account-management-card-heading account-management-heading-row\">
        <div>
          <span>Public Information</span>
          <h2>Datos publicos</h2>
          <p>Informacion visible o administrativa del perfil.</p>
        </div>
        ";
        // line 180
        if ( !($context["account_update_info_on_register"] ?? null)) {
            // line 181
            echo "          <form action=\"";
            echo twig_escape_filter($this->env, $this->env->getFunction('getLink')->getCallable()("account/info"), "html", null, true);
            echo "\" method=\"post\">
            <button class=\"account-management-button account-management-button-blue\" type=\"submit\">Edit</button>
          </form>
        ";
        }
        // line 185
        echo "      </div>

      <div class=\"account-management-info-list\">
        <div><span>Real Name</span><strong>";
        // line 188
        ((($context["account_rlname"] ?? null)) ? (print (twig_escape_filter($this->env, ($context["account_rlname"] ?? null), "html", null, true))) : (print ("-")));
        echo "</strong></div>
        <div><span>Address</span><strong>";
        // line 189
        ((($context["account_location"] ?? null)) ? (print (twig_escape_filter($this->env, ($context["account_location"] ?? null), "html", null, true))) : (print ("-")));
        echo "</strong></div>
        <div><span>Phone</span><strong>";
        // line 190
        ((($context["account_phone"] ?? null)) ? (print (twig_escape_filter($this->env, ($context["account_phone"] ?? null), "html", null, true))) : (print ("-")));
        echo "</strong></div>
        ";
        // line 191
        if ((($context["account_show_rk"] ?? null) &&  !twig_test_empty(($context["recovery_key"] ?? null)))) {
            // line 192
            echo "          <div><span>Recovery Key</span><strong>Registered</strong></div>
        ";
        }
        // line 194
        echo "      </div>
    </article>
  </section>

  <section class=\"account-management-card\">
    <div class=\"account-management-card-heading\">
      <span>Account Logs</span>
      <h2>Actividad reciente</h2>
      <p>Registro de cambios y acciones importantes realizadas en tu cuenta.</p>
    </div>

    <div class=\"account-management-log-list\">
      ";
        // line 206
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["actions"] ?? null));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["action"]) {
            // line 207
            echo "        <div class=\"account-management-log-row\">
          <strong>";
            // line 208
            echo twig_get_attribute($this->env, $this->source, $context["action"], "action", [], "any", false, false, false, 208);
            echo "</strong>
          <span>";
            // line 209
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["action"], "date", [], "any", false, false, false, 209), "d M Y, H:i:s"), "html", null, true);
            echo "</span>
          <small title=\"";
            // line 210
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["action"], "ipv6", [], "any", false, false, false, 210), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["action"], "ip", [], "any", false, false, false, 210), "html", null, true);
            echo "</small>
        </div>
      ";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 213
            echo "        <div class=\"account-management-empty\">No hay logs disponibles.</div>
      ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['action'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 215
        echo "    </div>
  </section>
</div>
";
    }

    public function getTemplateName()
    {
        return "account.management.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  481 => 215,  474 => 213,  464 => 210,  460 => 209,  456 => 208,  453 => 207,  448 => 206,  434 => 194,  430 => 192,  428 => 191,  424 => 190,  420 => 189,  416 => 188,  411 => 185,  403 => 181,  401 => 180,  387 => 169,  383 => 168,  377 => 167,  373 => 166,  369 => 165,  365 => 164,  360 => 163,  350 => 162,  336 => 150,  329 => 148,  319 => 144,  313 => 142,  311 => 141,  307 => 139,  303 => 137,  299 => 135,  297 => 134,  286 => 131,  282 => 129,  279 => 128,  275 => 126,  273 => 125,  267 => 124,  262 => 122,  259 => 121,  256 => 120,  250 => 119,  248 => 118,  242 => 114,  234 => 110,  231 => 109,  223 => 105,  221 => 104,  215 => 101,  204 => 92,  196 => 87,  189 => 85,  183 => 81,  181 => 80,  178 => 79,  170 => 74,  162 => 68,  160 => 67,  154 => 63,  146 => 59,  144 => 58,  137 => 55,  135 => 54,  127 => 49,  121 => 46,  104 => 32,  101 => 31,  97 => 29,  95 => 28,  87 => 24,  81 => 22,  71 => 20,  69 => 19,  59 => 15,  55 => 14,  44 => 6,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "account.management.html.twig", "C:\\UniServerZ\\www\\templates\\tibiacom\\account.management.html.twig");
    }
}
