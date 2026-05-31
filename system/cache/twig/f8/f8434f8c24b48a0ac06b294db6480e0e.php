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

/* experience_table.html.twig */
class __TwigTemplate_39e6421b49b1a6d9825ce6e444127ca3 extends \Twig\Template
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

<div class=\"simple-page\">
  <div class=\"simple-hero\">
    <p>This is the list of experience points required to advance to each level.</p>
    <p class=\"simple-muted\">You can also check your client skill bar to see progress toward the next level.</p>
  </div>

  <section class=\"simple-section\">
    <h3>Required Experience</h3>
    <div class=\"simple-grid\" id=\"ExperienceTable\">
      ";
        // line 12
        $context["rows"] = 0;
        // line 13
        echo "      ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(range(0, (twig_get_attribute($this->env, $this->source, ($context["config"] ?? null), "experiencetable_columns", [], "any", false, false, false, 13) - 1)));
        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
            // line 14
            echo "        <div class=\"simple-card-item\">
          <table class=\"simple-data-table\">
            <thead>
            <tr>
              <th>Level</th>
              <th>Experience</th>
            </tr>
            </thead>
            <tbody>
            ";
            // line 23
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(range((($context["i"] * twig_get_attribute($this->env, $this->source, ($context["config"] ?? null), "experiencetable_rows", [], "any", false, false, false, 23)) + 1), ((($context["i"] * twig_get_attribute($this->env, $this->source, ($context["config"] ?? null), "experiencetable_rows", [], "any", false, false, false, 23)) + (twig_get_attribute($this->env, $this->source, ($context["config"] ?? null), "experiencetable_rows", [], "any", false, false, false, 23) + 1)) - 1)));
            foreach ($context['_seq'] as $context["_key"] => $context["level"]) {
                // line 24
                echo "              ";
                $context["rows"] = (($context["rows"] ?? null) + 1);
                // line 25
                echo "              <tr>
                <td>";
                // line 26
                echo twig_escape_filter($this->env, $context["level"], "html", null, true);
                echo "</td>
                <td>";
                // line 27
                echo twig_escape_filter($this->env, (($__internal_compile_0 = ($context["experience"] ?? null)) && is_array($__internal_compile_0) || $__internal_compile_0 instanceof ArrayAccess ? ($__internal_compile_0[$context["level"]] ?? null) : null), "html", null, true);
                echo "</td>
              </tr>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['level'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 30
            echo "            </tbody>
          </table>
        </div>
      ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 34
        echo "    </div>
  </section>
</div>
";
    }

    public function getTemplateName()
    {
        return "experience_table.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  100 => 34,  91 => 30,  82 => 27,  78 => 26,  75 => 25,  72 => 24,  68 => 23,  57 => 14,  52 => 13,  50 => 12,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "experience_table.html.twig", "C:\\UniServerZ\\www\\system\\templates\\experience_table.html.twig");
    }
}
