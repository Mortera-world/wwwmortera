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
        echo "<link rel=\"stylesheet\" href=\"/tools/simple-page.css?v=20260529\">

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
        }
        // line 59
        echo "      </div>
    </article>
  </section>

  ";
        // line 63
        if (twig_test_empty(($context["recovery_key"] ?? null))) {
            // line 64
            echo "    <section class=\"account-management-notice\">
      <div>
        <span>Recovery Key</span>
        <strong>Your account is not registered!</strong>
        <p>Registra tu cuenta para obtener una recovery key y mejorar la proteccion de acceso.</p>
      </div>
      <form action=\"";
            // line 70
            echo twig_escape_filter($this->env, $this->env->getFunction('getLink')->getCallable()("account/register"), "html", null, true);
            echo "\" method=\"post\">
        <button class=\"account-management-button account-management-button-green\" type=\"submit\">Register Account</button>
      </form>
    </section>
  ";
        }
        // line 75
        echo "
  ";
        // line 76
        if (($context["email_request"] ?? null)) {
            // line 77
            echo "    <section class=\"account-management-notice account-management-notice-warn\">
      <div>
        <span>Email Request</span>
        <strong>Hay un cambio de correo pendiente</strong>
        <p>A request has been submitted to change the email address to <b>";
            // line 81
            echo twig_escape_filter($this->env, ($context["email_new"] ?? null), "html", null, true);
            echo "</b>. After <b>";
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, ($context["email_new_time"] ?? null), "j F Y, G:i:s"), "html", null, true);
            echo "</b> you can accept the new email address.</p>
      </div>
      <form action=\"";
            // line 83
            echo twig_escape_filter($this->env, $this->env->getFunction('getLink')->getCallable()("account/email"), "html", null, true);
            echo "\" method=\"post\">
        <button class=\"account-management-button account-management-button-blue\" type=\"submit\">Review</button>
      </form>
    </section>
  ";
        }
        // line 88
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
        // line 97
        echo twig_escape_filter($this->env, $this->env->getFunction('getLink')->getCallable()("account/character/create"), "html", null, true);
        echo "\" method=\"post\">
          <button class=\"account-management-button account-management-button-green\" type=\"submit\">Create Character</button>
        </form>
        ";
        // line 100
        if (twig_get_attribute($this->env, $this->source, ($context["config"] ?? null), "account_change_character_name", [], "any", false, false, false, 100)) {
            // line 101
            echo "          <form action=\"";
            echo twig_escape_filter($this->env, $this->env->getFunction('getLink')->getCallable()("account/character/name"), "html", null, true);
            echo "\" method=\"post\">
            <button class=\"account-management-button account-management-button-blue\" type=\"submit\">Change Name</button>
          </form>
        ";
        }
        // line 105
        echo "        ";
        if (twig_get_attribute($this->env, $this->source, ($context["config"] ?? null), "account_change_character_sex", [], "any", false, false, false, 105)) {
            // line 106
            echo "          <form action=\"";
            echo twig_escape_filter($this->env, $this->env->getFunction('getLink')->getCallable()("account/character/sex"), "html", null, true);
            echo "\" method=\"post\">
            <button class=\"account-management-button account-management-button-blue\" type=\"submit\">Change Sex</button>
          </form>
        ";
        }
        // line 110
        echo "      </div>
    </div>

    <div class=\"account-management-character-list\">
      ";
        // line 114
        $context["i"] = 0;
        // line 115
        echo "      ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["players"] ?? null));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["player"]) {
            // line 116
            echo "        ";
            $context["i"] = (($context["i"] ?? null) + 1);
            // line 117
            echo "        <article class=\"account-management-character\">
          <div class=\"account-management-character-index\">";
            // line 118
            echo twig_escape_filter($this->env, ($context["i"] ?? null), "html", null, true);
            echo "</div>
          <div class=\"account-management-character-main\">
            <a href=\"";
            // line 120
            echo twig_escape_filter($this->env, $this->env->getFunction('getLink')->getCallable()(("characters/" . twig_urlencode_filter(twig_get_attribute($this->env, $this->source, $context["player"], "getName", [], "method", false, false, false, 120)))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["player"], "getName", [], "method", false, false, false, 120), "html", null, true);
            echo "</a>
            ";
            // line 121
            if (twig_get_attribute($this->env, $this->source, $context["player"], "isDeleted", [], "method", false, false, false, 121)) {
                // line 122
                echo "              <strong class=\"account-management-badge account-management-badge-red\">Deleted</strong>
            ";
            }
            // line 124
            echo "            ";
            if (twig_get_attribute($this->env, $this->source, $context["player"], "isMain", [], "method", false, false, false, 124)) {
                // line 125
                echo "              <strong class=\"account-management-badge\">Main</strong>
            ";
            }
            // line 127
            echo "            <p>";
            echo twig_escape_filter($this->env, (($__internal_compile_2 = twig_get_attribute($this->env, $this->source, ($context["config"] ?? null), "vocations", [], "any", false, false, false, 127)) && is_array($__internal_compile_2) || $__internal_compile_2 instanceof ArrayAccess ? ($__internal_compile_2[twig_get_attribute($this->env, $this->source, $context["player"], "getVocation", [], "method", false, false, false, 127)] ?? null) : null), "html", null, true);
            echo " - Level ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["player"], "getLevel", [], "method", false, false, false, 127), "html", null, true);
            echo " - ";
            echo twig_escape_filter($this->env, (($__internal_compile_3 = (($__internal_compile_4 = ($context["config"] ?? null)) && is_array($__internal_compile_4) || $__internal_compile_4 instanceof ArrayAccess ? ($__internal_compile_4["lua"] ?? null) : null)) && is_array($__internal_compile_3) || $__internal_compile_3 instanceof ArrayAccess ? ($__internal_compile_3["serverName"] ?? null) : null), "html", null, true);
            echo "</p>
          </div>
          <div class=\"account-management-character-state\">
            ";
            // line 130
            if (twig_get_attribute($this->env, $this->source, $context["player"], "isOnline", [], "method", false, false, false, 130)) {
                // line 131
                echo "              <span class=\"account-management-online\">Online</span>
            ";
            } else {
                // line 133
                echo "              <span class=\"account-management-offline\">Offline</span>
            ";
            }
            // line 135
            echo "          </div>
          <div class=\"account-management-character-actions\">
            ";
            // line 137
            if ( !twig_get_attribute($this->env, $this->source, $context["player"], "isDeleted", [], "method", false, false, false, 137)) {
                // line 138
                echo "              <a class=\"account-management-mini-button\" href=\"";
                echo twig_escape_filter($this->env, $this->env->getFunction('getLink')->getCallable()(("account/character/comment/" . twig_urlencode_filter(twig_get_attribute($this->env, $this->source, $context["player"], "getName", [], "method", false, false, false, 138)))), "html", null, true);
                echo "\">Edit</a>
            ";
            }
            // line 140
            echo "            <a class=\"account-management-mini-button account-management-mini-button-red\" href=\"";
            echo twig_escape_filter($this->env, $this->env->getFunction('getLink')->getCallable()("account/character/delete"), "html", null, true);
            echo "\">Delete</a>
          </div>
        </article>
      ";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 144
            echo "        <div class=\"account-management-empty\">No tienes personajes en esta cuenta.</div>
      ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['player'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 146
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
        // line 158
        if (twig_constant("USE_ACCOUNT_NAME")) {
            echo "Name";
        } else {
            echo "Number";
        }
        echo "</span><strong>";
        echo twig_escape_filter($this->env, ($context["account"] ?? null), "html", null, true);
        echo "</strong></div>
        <div><span>Email Address</span><strong>";
        // line 159
        echo twig_escape_filter($this->env, ($context["account_email"] ?? null), "html", null, true);
        echo ($context["email_change"] ?? null);
        echo "</strong></div>
        <div><span>Created</span><strong>";
        // line 160
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, ($context["account_created"] ?? null), "M d Y, G:i:s"), "html", null, true);
        echo "</strong></div>
        <div><span>Last Login</span><strong>";
        // line 161
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, ($context["account_web_lastlogin"] ?? null), "M d Y, G:i:s"), "html", null, true);
        echo "</strong></div>
        <div><span>Account Status</span><strong>";
        // line 162
        echo ($context["account_status"] ?? null);
        echo "</strong></div>
        <div><span>Tibia Coins</span><strong>";
        // line 163
        echo twig_escape_filter($this->env, ($context["account_coins"] ?? null), "html", null, true);
        echo " (";
        echo twig_escape_filter($this->env, ($context["account_coins_transferable"] ?? null), "html", null, true);
        echo " transferable)</strong></div>
        <div><span>Tournament Coins</span><strong>";
        // line 164
        echo twig_escape_filter($this->env, ($context["tournament_coins"] ?? null), "html", null, true);
        echo "</strong></div>
        <div><span>Registered</span><strong>";
        // line 165
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
        // line 176
        if ( !($context["account_update_info_on_register"] ?? null)) {
            // line 177
            echo "          <form action=\"";
            echo twig_escape_filter($this->env, $this->env->getFunction('getLink')->getCallable()("account/info"), "html", null, true);
            echo "\" method=\"post\">
            <button class=\"account-management-button account-management-button-blue\" type=\"submit\">Edit</button>
          </form>
        ";
        }
        // line 181
        echo "      </div>

      <div class=\"account-management-info-list\">
        <div><span>Real Name</span><strong>";
        // line 184
        ((($context["account_rlname"] ?? null)) ? (print (twig_escape_filter($this->env, ($context["account_rlname"] ?? null), "html", null, true))) : (print ("-")));
        echo "</strong></div>
        <div><span>Address</span><strong>";
        // line 185
        ((($context["account_location"] ?? null)) ? (print (twig_escape_filter($this->env, ($context["account_location"] ?? null), "html", null, true))) : (print ("-")));
        echo "</strong></div>
        <div><span>Phone</span><strong>";
        // line 186
        ((($context["account_phone"] ?? null)) ? (print (twig_escape_filter($this->env, ($context["account_phone"] ?? null), "html", null, true))) : (print ("-")));
        echo "</strong></div>
        ";
        // line 187
        if ((($context["account_show_rk"] ?? null) &&  !twig_test_empty(($context["recovery_key"] ?? null)))) {
            // line 188
            echo "          <div><span>Recovery Key</span><strong>";
            echo twig_escape_filter($this->env, ($context["recovery_key"] ?? null), "html", null, true);
            echo "</strong></div>
        ";
        }
        // line 190
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
        // line 202
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["actions"] ?? null));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["action"]) {
            // line 203
            echo "        <div class=\"account-management-log-row\">
          <strong>";
            // line 204
            echo twig_get_attribute($this->env, $this->source, $context["action"], "action", [], "any", false, false, false, 204);
            echo "</strong>
          <span>";
            // line 205
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["action"], "date", [], "any", false, false, false, 205), "d M Y, H:i:s"), "html", null, true);
            echo "</span>
          <small title=\"";
            // line 206
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["action"], "ipv6", [], "any", false, false, false, 206), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["action"], "ip", [], "any", false, false, false, 206), "html", null, true);
            echo "</small>
        </div>
      ";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 209
            echo "        <div class=\"account-management-empty\">No hay logs disponibles.</div>
      ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['action'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 211
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
        return array (  474 => 211,  467 => 209,  457 => 206,  453 => 205,  449 => 204,  446 => 203,  441 => 202,  427 => 190,  421 => 188,  419 => 187,  415 => 186,  411 => 185,  407 => 184,  402 => 181,  394 => 177,  392 => 176,  378 => 165,  374 => 164,  368 => 163,  364 => 162,  360 => 161,  356 => 160,  351 => 159,  341 => 158,  327 => 146,  320 => 144,  310 => 140,  304 => 138,  302 => 137,  298 => 135,  294 => 133,  290 => 131,  288 => 130,  277 => 127,  273 => 125,  270 => 124,  266 => 122,  264 => 121,  258 => 120,  253 => 118,  250 => 117,  247 => 116,  241 => 115,  239 => 114,  233 => 110,  225 => 106,  222 => 105,  214 => 101,  212 => 100,  206 => 97,  195 => 88,  187 => 83,  180 => 81,  174 => 77,  172 => 76,  169 => 75,  161 => 70,  153 => 64,  151 => 63,  145 => 59,  137 => 55,  135 => 54,  127 => 49,  121 => 46,  104 => 32,  101 => 31,  97 => 29,  95 => 28,  87 => 24,  81 => 22,  71 => 20,  69 => 19,  59 => 15,  55 => 14,  44 => 6,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "account.management.html.twig", "C:\\UniServerZ\\www\\templates\\tibiacom\\account.management.html.twig");
    }
}
