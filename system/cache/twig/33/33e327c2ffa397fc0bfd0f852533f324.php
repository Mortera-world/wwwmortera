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

/* online.html.twig */
class __TwigTemplate_35c742fae32dee39d1ba421987b57ff3 extends \Twig\Template
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

<div class=\"online-page\">
  <section class=\"online-hero\">
    <div>
      <span>Players Online</span>
      <h1>Who is online?</h1>
      <p>Personajes conectados ahora mismo en ";
        // line 8
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["config"] ?? null), "lua", [], "any", false, false, false, 8), "serverName", [], "any", false, false, false, 8), "html", null, true);
        echo ".</p>
    </div>
    <strong>";
        // line 10
        echo twig_escape_filter($this->env, twig_length_filter($this->env, ($context["players"] ?? null)), "html", null, true);
        echo " online</strong>
  </section>

  ";
        // line 13
        if (( !twig_get_attribute($this->env, $this->source, ($context["status"] ?? null), "online", [], "any", false, false, false, 13) && (twig_length_filter($this->env, ($context["players"] ?? null)) == 0))) {
            // line 14
            echo "    <section class=\"online-empty\">
      <h2>Server is offline.</h2>
      <p>";
            // line 16
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["config"] ?? null), "lua", [], "any", false, false, false, 16), "serverName", [], "any", false, false, false, 16), "html", null, true);
            echo " no esta disponible en este momento.</p>
    </section>
  ";
        } else {
            // line 19
            echo "    <section class=\"online-summary-grid\">
      <div class=\"online-summary-card\">
        <span>Status</span>
        <strong>Online</strong>
      </div>
      <div class=\"online-summary-card\">
        <span>Players</span>
        <strong>";
            // line 26
            echo twig_escape_filter($this->env, twig_length_filter($this->env, ($context["players"] ?? null)), "html", null, true);
            echo "</strong>
      </div>
      ";
            // line 28
            if (($context["record"] ?? null)) {
                // line 29
                echo "        <div class=\"online-summary-card\">
          <span>Record</span>
          <strong>";
                // line 31
                echo ($context["record"] ?? null);
                echo "</strong>
        </div>
      ";
            }
            // line 34
            echo "    </section>

    ";
            // line 36
            if (twig_get_attribute($this->env, $this->source, ($context["config"] ?? null), "online_vocations", [], "any", false, false, false, 36)) {
                // line 37
                echo "      <section class=\"online-vocations\">
        <div class=\"online-section-head\">
          <div>
            <span>Vocations</span>
            <h2>Online status</h2>
          </div>
          <strong>";
                // line 43
                echo twig_escape_filter($this->env, ($context["current_date"] ?? null), "html", null, true);
                echo "</strong>
        </div>

        <div class=\"online-vocation-grid\">
          <div class=\"online-vocation-card\"><span>Sorcerers</span><strong>";
                // line 47
                echo twig_escape_filter($this->env, (($__internal_compile_0 = ($context["vocs"] ?? null)) && is_array($__internal_compile_0) || $__internal_compile_0 instanceof ArrayAccess ? ($__internal_compile_0[1] ?? null) : null), "html", null, true);
                echo "</strong></div>
          <div class=\"online-vocation-card\"><span>Druids</span><strong>";
                // line 48
                echo twig_escape_filter($this->env, (($__internal_compile_1 = ($context["vocs"] ?? null)) && is_array($__internal_compile_1) || $__internal_compile_1 instanceof ArrayAccess ? ($__internal_compile_1[2] ?? null) : null), "html", null, true);
                echo "</strong></div>
          <div class=\"online-vocation-card\"><span>Paladins</span><strong>";
                // line 49
                echo twig_escape_filter($this->env, (($__internal_compile_2 = ($context["vocs"] ?? null)) && is_array($__internal_compile_2) || $__internal_compile_2 instanceof ArrayAccess ? ($__internal_compile_2[3] ?? null) : null), "html", null, true);
                echo "</strong></div>
          <div class=\"online-vocation-card\"><span>Knights</span><strong>";
                // line 50
                echo twig_escape_filter($this->env, (($__internal_compile_3 = ($context["vocs"] ?? null)) && is_array($__internal_compile_3) || $__internal_compile_3 instanceof ArrayAccess ? ($__internal_compile_3[4] ?? null) : null), "html", null, true);
                echo "</strong></div>
        </div>
      </section>
    ";
            }
            // line 54
            echo "
    <section class=\"online-list\">
      <div class=\"online-section-head\">
        <div>
          <span>Characters</span>
          <h2>Online players</h2>
        </div>
        <strong>";
            // line 61
            echo twig_escape_filter($this->env, twig_length_filter($this->env, ($context["players"] ?? null)), "html", null, true);
            echo " total</strong>
      </div>

      ";
            // line 64
            if ((twig_length_filter($this->env, ($context["players"] ?? null)) == 0)) {
                // line 65
                echo "        <div class=\"online-empty\">
          <h2>No players online.</h2>
          <p>Currently no one is playing on ";
                // line 67
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["config"] ?? null), "lua", [], "any", false, false, false, 67), "serverName", [], "any", false, false, false, 67), "html", null, true);
                echo ".</p>
        </div>
      ";
            } else {
                // line 70
                echo "        <div class=\"online-card-grid\">
          ";
                // line 71
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(($context["players"] ?? null));
                foreach ($context['_seq'] as $context["_key"] => $context["player"]) {
                    // line 72
                    echo "            <a class=\"online-card\" href=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["player"], "url", [], "any", false, false, false, 72), "html", null, true);
                    echo "\">
              <div class=\"online-outfit\">
                ";
                    // line 74
                    if ((twig_get_attribute($this->env, $this->source, ($context["config"] ?? null), "online_outfit", [], "any", false, false, false, 74) && twig_get_attribute($this->env, $this->source, $context["player"], "outfit", [], "any", false, false, false, 74))) {
                        // line 75
                        echo "                  <img src=\"";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["player"], "outfit", [], "any", false, false, false, 75), "html", null, true);
                        echo "\" alt=\"";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["player"], "display_name", [], "any", false, false, false, 75), "html", null, true);
                        echo "\">
                ";
                    } else {
                        // line 77
                        echo "                  <b>";
                        echo twig_escape_filter($this->env, twig_slice($this->env, twig_get_attribute($this->env, $this->source, $context["player"], "display_name", [], "any", false, false, false, 77), 0, 1), "html", null, true);
                        echo "</b>
                ";
                    }
                    // line 79
                    echo "              </div>

              <div class=\"online-main\">
                <h2>";
                    // line 82
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["player"], "display_name", [], "any", false, false, false, 82), "html", null, true);
                    echo twig_get_attribute($this->env, $this->source, $context["player"], "skull", [], "any", false, false, false, 82);
                    echo "</h2>
                <div class=\"online-meta\">
                  <span>";
                    // line 84
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["player"], "vocation", [], "any", false, false, false, 84), "html", null, true);
                    echo "</span>
                  <span>Level ";
                    // line 85
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["player"], "level", [], "any", false, false, false, 85), "html", null, true);
                    echo "</span>
                  ";
                    // line 86
                    if ((twig_get_attribute($this->env, $this->source, ($context["config"] ?? null), "account_country", [], "any", false, false, false, 86) && twig_get_attribute($this->env, $this->source, $context["player"], "country_image", [], "any", false, false, false, 86))) {
                        // line 87
                        echo "                    <span class=\"online-country\">";
                        echo twig_get_attribute($this->env, $this->source, $context["player"], "country_image", [], "any", false, false, false, 87);
                        echo "</span>
                  ";
                    }
                    // line 89
                    echo "                </div>
              </div>

              <div class=\"online-state\">
                <span>Status</span>
                <strong>Online</strong>
              </div>
            </a>
          ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['player'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 98
                echo "        </div>
      ";
            }
            // line 100
            echo "    </section>
  ";
        }
        // line 102
        echo "</div>
";
    }

    public function getTemplateName()
    {
        return "online.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  240 => 102,  236 => 100,  232 => 98,  218 => 89,  212 => 87,  210 => 86,  206 => 85,  202 => 84,  196 => 82,  191 => 79,  185 => 77,  177 => 75,  175 => 74,  169 => 72,  165 => 71,  162 => 70,  156 => 67,  152 => 65,  150 => 64,  144 => 61,  135 => 54,  128 => 50,  124 => 49,  120 => 48,  116 => 47,  109 => 43,  101 => 37,  99 => 36,  95 => 34,  89 => 31,  85 => 29,  83 => 28,  78 => 26,  69 => 19,  63 => 16,  59 => 14,  57 => 13,  51 => 10,  46 => 8,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "online.html.twig", "C:\\UniServerZ\\www\\system\\templates\\online.html.twig");
    }
}
