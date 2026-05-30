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

/* guilds.list.html.twig */
class __TwigTemplate_30dc6fb25530bd9349adbb6d8384b19b extends \Twig\Template
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

<div class=\"guilds-page\">
  <section class=\"guilds-hero\">
    <div>
      <span>Guild Directory</span>
      <h1>Active Guilds on ";
        // line 7
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["config"] ?? null), "lua", [], "any", false, false, false, 7), "serverName", [], "any", false, false, false, 7), "html", null, true);
        echo "</h1>
      <p>Browse the active guilds, check their leaders and members, and open a guild profile for full details.</p>
    </div>
    <strong>";
        // line 10
        echo twig_escape_filter($this->env, twig_length_filter($this->env, ($context["guilds"] ?? null)), "html", null, true);
        echo " ";
        if ((twig_length_filter($this->env, ($context["guilds"] ?? null)) == 1)) {
            echo "guild";
        } else {
            echo "guilds";
        }
        echo "</strong>
  </section>

  ";
        // line 13
        if ((twig_length_filter($this->env, ($context["guilds"] ?? null)) > 0)) {
            // line 14
            echo "    <section class=\"guilds-grid\">
      ";
            // line 15
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["guilds"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["guild"]) {
                // line 16
                echo "        <article class=\"guild-card\">
          <div class=\"guild-logo\">
            <img src=\"images/guilds/";
                // line 18
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["guild"], "logo", [], "any", false, false, false, 18), "html", null, true);
                echo "\" alt=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["guild"], "name", [], "any", false, false, false, 18), "html", null, true);
                echo "\">
          </div>

          <div class=\"guild-card-main\">
            <h2>";
                // line 22
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["guild"], "name", [], "any", false, false, false, 22), "html", null, true);
                echo "</h2>
            <div class=\"guild-meta\">
              <span>";
                // line 24
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["guild"], "member_count", [], "any", false, false, false, 24), "html", null, true);
                echo " ";
                if ((twig_get_attribute($this->env, $this->source, $context["guild"], "member_count", [], "any", false, false, false, 24) == 1)) {
                    echo "member";
                } else {
                    echo "members";
                }
                echo "</span>
              <span>Leader: ";
                // line 25
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["guild"], "leader_name", [], "any", false, false, false, 25), "html", null, true);
                echo "</span>
            </div>

            ";
                // line 28
                if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, $context["guild"], "description", [], "any", false, false, false, 28))) {
                    // line 29
                    echo "              <p>";
                    echo twig_escape_filter($this->env, twig_slice($this->env, twig_striptags(twig_get_attribute($this->env, $this->source, $context["guild"], "description", [], "any", false, false, false, 29)), 0, 160), "html", null, true);
                    if ((twig_length_filter($this->env, twig_striptags(twig_get_attribute($this->env, $this->source, $context["guild"], "description", [], "any", false, false, false, 29))) > 160)) {
                        echo "...";
                    }
                    echo "</p>
            ";
                } else {
                    // line 31
                    echo "              <p>No public description has been added for this guild yet.</p>
            ";
                }
                // line 33
                echo "          </div>

          <div class=\"guild-card-actions\">
            <a class=\"guild-button guild-button-view\" href=\"";
                // line 36
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["guild"], "link", [], "any", false, false, false, 36), "html", null, true);
                echo "\">View</a>
            ";
                // line 37
                if (($context["isAdmin"] ?? null)) {
                    // line 38
                    echo "              <a class=\"guild-button guild-button-danger\" href=\"?subtopic=guilds&action=delete_by_admin&guild=";
                    echo twig_escape_filter($this->env, twig_urlencode_filter(twig_get_attribute($this->env, $this->source, $context["guild"], "name", [], "any", false, false, false, 38)), "html", null, true);
                    echo "\">Delete</a>
            ";
                }
                // line 40
                echo "          </div>
        </article>
      ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['guild'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 43
            echo "    </section>
  ";
        } else {
            // line 45
            echo "    <section class=\"guilds-empty\">
      <h2>No guilds found</h2>
      <p>There are no guilds on the server yet.</p>
      ";
            // line 48
            if (($context["logged"] ?? null)) {
                // line 49
                echo "        <form action=\"?subtopic=guilds&action=create\" method=\"post\">
          <button class=\"guild-button guild-button-view\" type=\"submit\">Found Guild</button>
        </form>
      ";
            }
            // line 53
            echo "    </section>
  ";
        }
        // line 55
        echo "
  <section class=\"guilds-footer-panel\">
    ";
        // line 57
        if (($context["logged"] ?? null)) {
            // line 58
            echo "      <div>
        <strong>No guild found that suits your needs?</strong>
        <p>Create a new guild and invite your team.</p>
      </div>
      <form action=\"?subtopic=guilds&action=create\" method=\"post\">
        <button class=\"guild-button guild-button-view\" type=\"submit\">Found Guild</button>
      </form>
    ";
        } else {
            // line 66
            echo "      <div>
        <strong>Before you can create a guild you must login.</strong>
        <p>Log in to create or manage a guild.</p>
      </div>
      <form action=\"?subtopic=accountmanagement&redirect=";
            // line 70
            echo twig_escape_filter($this->env, $this->env->getFunction('getLink')->getCallable()("guilds"), "html", null, true);
            echo "\" method=\"post\">
        <button class=\"guild-button guild-button-view\" type=\"submit\">Login</button>
      </form>
    ";
        }
        // line 74
        echo "  </section>

  ";
        // line 76
        if (($context["logged"] ?? null)) {
            // line 77
            echo "    <section class=\"guilds-tools\">
      <a href=\"?subtopic=guilds&action=cleanup_players\">Cleanup players</a>
      <a href=\"?subtopic=guilds&action=cleanup_guilds\">Cleanup guilds</a>
    </section>
  ";
        }
        // line 82
        echo "</div>
";
    }

    public function getTemplateName()
    {
        return "guilds.list.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  209 => 82,  202 => 77,  200 => 76,  196 => 74,  189 => 70,  183 => 66,  173 => 58,  171 => 57,  167 => 55,  163 => 53,  157 => 49,  155 => 48,  150 => 45,  146 => 43,  138 => 40,  132 => 38,  130 => 37,  126 => 36,  121 => 33,  117 => 31,  108 => 29,  106 => 28,  100 => 25,  90 => 24,  85 => 22,  76 => 18,  72 => 16,  68 => 15,  65 => 14,  63 => 13,  51 => 10,  45 => 7,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "guilds.list.html.twig", "C:\\UniServerZ\\www\\system\\templates\\guilds.list.html.twig");
    }
}
