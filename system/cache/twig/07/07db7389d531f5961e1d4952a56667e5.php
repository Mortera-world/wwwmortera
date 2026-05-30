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

/* team.html.twig */
class __TwigTemplate_3759c88d12c095e6e76a69b71abfff0e extends \Twig\Template
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

<div class=\"team-page\">
  <div class=\"team-divider\"><span></span></div>

  ";
        // line 6
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_reverse_filter($this->env, ($context["groupmember"] ?? null)));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["group"]) {
            // line 7
            echo "    ";
            if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, $context["group"], "members", [], "any", false, false, false, 7))) {
                // line 8
                echo "      <section class=\"team-section\">
        <header class=\"team-section-head\">
          <div class=\"team-section-icon\">
            <img src=\"";
                // line 11
                echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
                echo "/images/global/content/headline-bracer-left.gif\" alt=\"\">
          </div>

          <div class=\"team-section-title\">
            <span>";
                // line 15
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["group"], "meta", [], "any", false, false, false, 15), "kicker", [], "any", false, false, false, 15), "html", null, true);
                echo "</span>
            <h2>";
                // line 16
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["group"], "meta", [], "any", false, false, false, 16), "title", [], "any", false, false, false, 16), "html", null, true);
                echo "</h2>
            <p>";
                // line 17
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["group"], "meta", [], "any", false, false, false, 17), "description", [], "any", false, false, false, 17), "html", null, true);
                echo "</p>
          </div>

          <div class=\"team-count\">";
                // line 20
                echo twig_escape_filter($this->env, twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, $context["group"], "members", [], "any", false, false, false, 20)), "html", null, true);
                echo " ";
                if ((twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, $context["group"], "members", [], "any", false, false, false, 20)) == 1)) {
                    echo "member";
                } else {
                    echo "members";
                }
                echo "</div>
        </header>

        <div class=\"team-card-grid\">
          ";
                // line 24
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_reverse_filter($this->env, twig_get_attribute($this->env, $this->source, $context["group"], "members", [], "any", false, false, false, 24)));
                foreach ($context['_seq'] as $context["_key"] => $context["member"]) {
                    // line 25
                    echo "            <a class=\"team-member-card\" href=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["member"], "character_url", [], "any", false, false, false, 25), "html", null, true);
                    echo "\">
              <div class=\"team-outfit-frame\">
                ";
                    // line 27
                    if (twig_get_attribute($this->env, $this->source, $context["member"], "outfit", [], "any", false, false, false, 27)) {
                        // line 28
                        echo "                  <img src=\"";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["member"], "outfit", [], "any", false, false, false, 28), "html", null, true);
                        echo "\" alt=\"";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["member"], "player_name", [], "any", false, false, false, 28), "html", null, true);
                        echo "\">
                ";
                    }
                    // line 30
                    echo "              </div>

              <strong>";
                    // line 32
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["member"], "player_name", [], "any", false, false, false, 32), "html", null, true);
                    echo "</strong>
              <span class=\"team-rank\">";
                    // line 33
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["group"], "meta", [], "any", false, false, false, 33), "title", [], "any", false, false, false, 33), "html", null, true);
                    echo "</span>

              <small>Last Seen</small>
              <em>";
                    // line 36
                    ((twig_get_attribute($this->env, $this->source, $context["member"], "last_login", [], "any", false, false, false, 36)) ? (print (twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["member"], "last_login", [], "any", false, false, false, 36), "html", null, true))) : (print ("Not connected yet")));
                    echo "</em>
            </a>
          ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['member'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 39
                echo "        </div>
      </section>
    ";
            }
            // line 42
            echo "  ";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 43
            echo "    <section class=\"team-section\">
      <h2>Staff Team</h2>
      <p>No staff members are visible right now.</p>
    </section>
  ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['group'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 48
        echo "
  <section class=\"team-help\">
    <strong>Need help?</strong>
    <p>Administrators are available in-game for technical support. For reports and evidence, please use the official support channels.</p>
  </section>
</div>
";
    }

    public function getTemplateName()
    {
        return "team.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  154 => 48,  144 => 43,  139 => 42,  134 => 39,  125 => 36,  119 => 33,  115 => 32,  111 => 30,  103 => 28,  101 => 27,  95 => 25,  91 => 24,  78 => 20,  72 => 17,  68 => 16,  64 => 15,  57 => 11,  52 => 8,  49 => 7,  44 => 6,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "team.html.twig", "C:\\UniServerZ\\www\\system\\templates\\team.html.twig");
    }
}
