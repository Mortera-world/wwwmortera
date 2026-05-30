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

/* roulette.html.twig */
class __TwigTemplate_026e368eb7c1003b9d4c6605cf287761 extends \Twig\Template
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

<div class=\"roulette-page\">
  <section class=\"roulette-hero\">
    <h1>Top rewards de la ruleta</h1>
    <p>Un vistazo rapido a los jugadores que han sacado premios en la ruleta del servidor.</p>
  </section>

  <details class=\"roulette-rewards\">
    <summary>Posibles rewards de la ruleta</summary>
    <div class=\"roulette-reward-grid\">
      ";
        // line 12
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["possible_rewards"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["reward"]) {
            // line 13
            echo "        <div class=\"roulette-reward-example\">
          <img src=\"";
            // line 14
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["reward"], "image", [], "any", false, false, false, 14), "html", null, true);
            echo "\" alt=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["reward"], "name", [], "any", false, false, false, 14), "html", null, true);
            echo "\">
          <strong>";
            // line 15
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["reward"], "name", [], "any", false, false, false, 15), "html", null, true);
            echo "</strong>
          <span>ID ";
            // line 16
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["reward"], "item_id", [], "any", false, false, false, 16), "html", null, true);
            echo "</span>
        </div>
      ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['reward'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 19
        echo "    </div>
  </details>

  <section class=\"roulette-ranking\">
    <h2>Ranking de ganadores</h2>
    <p>Se muestran los jugadores con rewards registrados. El listado se ordena de mayor a menor cantidad total.</p>

    <div class=\"roulette-player-list\">
      ";
        // line 27
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["winners"] ?? null));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["winner"]) {
            // line 28
            echo "        <article class=\"roulette-player-card\">
          <a class=\"roulette-outfit-wrap\" href=\"";
            // line 29
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["winner"], "player_link", [], "any", false, false, false, 29), "html", null, true);
            echo "\">
            <img class=\"roulette-outfit\" src=\"";
            // line 30
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["winner"], "outfit", [], "any", false, false, false, 30), "html", null, true);
            echo "\" alt=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["winner"], "player_name", [], "any", false, false, false, 30), "html", null, true);
            echo "\">
          </a>

          <div class=\"roulette-player-main\">
            <div class=\"roulette-player-heading\">
              <div>
                <a class=\"roulette-player-name\" href=\"";
            // line 36
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["winner"], "player_link", [], "any", false, false, false, 36), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["winner"], "player_name", [], "any", false, false, false, 36), "html", null, true);
            echo "</a>
                <div class=\"roulette-player-meta\">Nivel ";
            // line 37
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["winner"], "level", [], "any", false, false, false, 37), "html", null, true);
            echo " &bull; ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["winner"], "vocation", [], "any", false, false, false, 37), "html", null, true);
            echo "</div>
              </div>

              <div class=\"roulette-total\">
                <strong>";
            // line 41
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["winner"], "total_rewards", [], "any", false, false, false, 41), "html", null, true);
            echo "</strong>
                <span>rewards</span>
              </div>
            </div>

            <div class=\"roulette-item-grid\">
              ";
            // line 47
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["winner"], "items", [], "any", false, false, false, 47));
            foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                // line 48
                echo "                <div class=\"roulette-item\">
                  <img src=\"";
                // line 49
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], "image", [], "any", false, false, false, 49), "html", null, true);
                echo "\" alt=\"Reward ";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], "item_id", [], "any", false, false, false, 49), "html", null, true);
                echo "\">
                  <strong>x";
                // line 50
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], "count", [], "any", false, false, false, 50), "html", null, true);
                echo "</strong>
                </div>
              ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 53
            echo "            </div>
          </div>
        </article>
      ";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 57
            echo "        <div class=\"roulette-empty\">Todavia no hay rewards registrados.</div>
      ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['winner'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 59
        echo "    </div>
  </section>
</div>
";
    }

    public function getTemplateName()
    {
        return "roulette.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  170 => 59,  163 => 57,  155 => 53,  146 => 50,  140 => 49,  137 => 48,  133 => 47,  124 => 41,  115 => 37,  109 => 36,  98 => 30,  94 => 29,  91 => 28,  86 => 27,  76 => 19,  67 => 16,  63 => 15,  57 => 14,  54 => 13,  50 => 12,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "roulette.html.twig", "C:\\UniServerZ\\www\\system\\templates\\roulette.html.twig");
    }
}
