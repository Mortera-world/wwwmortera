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

/* lastkills.html.twig */
class __TwigTemplate_40fc4c227d9d73b629987c3bd286fec3 extends \Twig\Template
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

<div class=\"lastkills-page\">
  <section class=\"lastkills-hero\">
    <div>
      <span>Recent deaths</span>
      <h1>Last Kills</h1>
      <p>Recent character deaths with the victim, level, date and final killer.</p>
    </div>
    <strong>";
        // line 10
        echo twig_escape_filter($this->env, twig_length_filter($this->env, ($context["lastkills"] ?? null)), "html", null, true);
        echo " records</strong>
  </section>

  ";
        // line 13
        if ((twig_length_filter($this->env, ($context["lastkills"] ?? null)) <= 0)) {
            // line 14
            echo "    <section class=\"lastkills-empty\">
      <h2>No one died on ";
            // line 15
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["config"] ?? null), "lua", [], "any", false, false, false, 15), "serverName", [], "any", false, false, false, 15), "html", null, true);
            echo "</h2>
      <p>There are no recent deaths to show right now.</p>
    </section>
  ";
        } else {
            // line 19
            echo "    <div class=\"lastkills-list\">
      ";
            // line 20
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["lastkills"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["lastkill"]) {
                // line 21
                echo "        <article class=\"lastkill-card\">
          <div class=\"lastkill-side\">
            <div class=\"lastkill-outfit-frame\">
              ";
                // line 24
                if (twig_get_attribute($this->env, $this->source, $context["lastkill"], "player_outfit", [], "any", false, false, false, 24)) {
                    // line 25
                    echo "                <img src=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["lastkill"], "player_outfit", [], "any", false, false, false, 25), "html", null, true);
                    echo "\" alt=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["lastkill"], "player_name", [], "any", false, false, false, 25), "html", null, true);
                    echo "\">
              ";
                } else {
                    // line 27
                    echo "                <b>";
                    echo twig_escape_filter($this->env, twig_upper_filter($this->env, twig_slice($this->env, twig_get_attribute($this->env, $this->source, $context["lastkill"], "player_name", [], "any", false, false, false, 27), 0, 1)), "html", null, true);
                    echo "</b>
              ";
                }
                // line 29
                echo "            </div>

            <div class=\"lastkill-info\">
              <span>Victim</span>
              ";
                // line 33
                if (twig_get_attribute($this->env, $this->source, $context["lastkill"], "player_url", [], "any", false, false, false, 33)) {
                    // line 34
                    echo "                <a href=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["lastkill"], "player_url", [], "any", false, false, false, 34), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["lastkill"], "player_name", [], "any", false, false, false, 34), "html", null, true);
                    echo "</a>
              ";
                } else {
                    // line 36
                    echo "                <strong>";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["lastkill"], "player_name", [], "any", false, false, false, 36), "html", null, true);
                    echo "</strong>
              ";
                }
                // line 38
                echo "              <em>Died at level ";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["lastkill"], "level", [], "any", false, false, false, 38), "html", null, true);
                echo "</em>
            </div>
          </div>

          <div class=\"lastkill-center\">
            <span>Eliminated by</span>
            <b>";
                // line 44
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["lastkill"], "killer", [], "any", false, false, false, 44), "type", [], "any", false, false, false, 44), "html", null, true);
                echo "</b>
          </div>

          <div class=\"lastkill-side lastkill-killer-side\">
            <div class=\"lastkill-outfit-frame lastkill-killer-frame\">
              ";
                // line 49
                if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["lastkill"], "killer", [], "any", false, false, false, 49), "outfit", [], "any", false, false, false, 49)) {
                    // line 50
                    echo "                <img src=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["lastkill"], "killer", [], "any", false, false, false, 50), "outfit", [], "any", false, false, false, 50), "html", null, true);
                    echo "\" alt=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["lastkill"], "killer", [], "any", false, false, false, 50), "name", [], "any", false, false, false, 50), "html", null, true);
                    echo "\">
              ";
                } else {
                    // line 52
                    echo "                <b>";
                    echo twig_escape_filter($this->env, twig_upper_filter($this->env, twig_slice($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["lastkill"], "killer", [], "any", false, false, false, 52), "name", [], "any", false, false, false, 52), 0, 1)), "html", null, true);
                    echo "</b>
              ";
                }
                // line 54
                echo "            </div>

            <div class=\"lastkill-info\">
              <span>Killer</span>
              ";
                // line 58
                if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["lastkill"], "killer", [], "any", false, false, false, 58), "url", [], "any", false, false, false, 58)) {
                    // line 59
                    echo "                <a href=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["lastkill"], "killer", [], "any", false, false, false, 59), "url", [], "any", false, false, false, 59), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["lastkill"], "killer", [], "any", false, false, false, 59), "name", [], "any", false, false, false, 59), "html", null, true);
                    echo "</a>
              ";
                } else {
                    // line 61
                    echo "                <strong>";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["lastkill"], "killer", [], "any", false, false, false, 61), "name", [], "any", false, false, false, 61), "html", null, true);
                    echo "</strong>
              ";
                }
                // line 63
                echo "              <em>";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["lastkill"], "killer", [], "any", false, false, false, 63), "subtitle", [], "any", false, false, false, 63), "html", null, true);
                echo "</em>
              ";
                // line 64
                if ((twig_get_attribute($this->env, $this->source, $context["lastkill"], "assist_count", [], "any", false, false, false, 64) > 0)) {
                    // line 65
                    echo "                <small>+";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["lastkill"], "assist_count", [], "any", false, false, false, 65), "html", null, true);
                    echo " more involved</small>
              ";
                }
                // line 67
                echo "            </div>
          </div>

          <div class=\"lastkill-date\">
            <span>Date</span>
            <strong>";
                // line 72
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["lastkill"], "time", [], "any", false, false, false, 72), "j.m.Y, G:i:s"), "html", null, true);
                echo "</strong>
            ";
                // line 73
                if ((twig_get_attribute($this->env, $this->source, ($context["config"] ?? null), "multiworld", [], "any", false, false, false, 73) && twig_get_attribute($this->env, $this->source, $context["lastkill"], "world_id", [], "any", false, false, false, 73))) {
                    // line 74
                    echo "              <em>";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["lastkill"], "world_id", [], "any", false, false, false, 74), "html", null, true);
                    echo "</em>
            ";
                }
                // line 76
                echo "          </div>
        </article>
      ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['lastkill'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 79
            echo "    </div>
  ";
        }
        // line 81
        echo "</div>
";
    }

    public function getTemplateName()
    {
        return "lastkills.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  216 => 81,  212 => 79,  204 => 76,  198 => 74,  196 => 73,  192 => 72,  185 => 67,  179 => 65,  177 => 64,  172 => 63,  166 => 61,  158 => 59,  156 => 58,  150 => 54,  144 => 52,  136 => 50,  134 => 49,  126 => 44,  116 => 38,  110 => 36,  102 => 34,  100 => 33,  94 => 29,  88 => 27,  80 => 25,  78 => 24,  73 => 21,  69 => 20,  66 => 19,  59 => 15,  56 => 14,  54 => 13,  48 => 10,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "lastkills.html.twig", "C:\\UniServerZ\\www\\system\\templates\\lastkills.html.twig");
    }
}
