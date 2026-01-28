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

/* powerful-guilds.html.twig */
class __TwigTemplate_0a22c33052e51adb30af9891a10d46d6 extends \Twig\Template
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
        echo "<div class=\"NewsHeadline\">
\t<div class=\"NewsHeadlineBackground\" style=\"background-image:url(";
        // line 2
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/news/newsheadline_background.gif)\">
\t\t<table border=\"0\">
\t\t\t<tr>
\t\t\t\t<td style=\"text-align: center; font-weight: bold;\">
\t\t\t\t\t<font color=\"white\">Most powerful guilds</font>
\t\t\t\t</td>
\t\t\t</tr>
\t\t</table>
\t</div>
</div>
<table border=\"0\" cellspacing=\"3\" cellpadding=\"4\" width=\"100%\">
\t<tr>
\t\t";
        // line 14
        if (twig_test_empty(($context["guilds"] ?? null))) {
            // line 15
            echo "\t\t\t<td colspan=\"4\" style=\"text-align: center;\">There are no any guilds to show yet.</td>
\t\t";
        } else {
            // line 17
            echo "\t\t\t";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["guilds"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["guild"]) {
                // line 18
                echo "\t\t\t\t<td style=\"width: ";
                echo twig_escape_filter($this->env, (100 / twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["config"] ?? null), "powerful_guilds", [], "any", false, false, false, 18), "amount", [], "any", false, false, false, 18)), "html", null, true);
                echo "%; text-align: center;\">
\t\t\t\t\t<a href=\"";
                // line 19
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["guild"], "link", [], "any", false, false, false, 19), "html", null, true);
                echo "\"><img src=\"images/guilds/";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["guild"], "logo", [], "any", false, false, false, 19), "html", null, true);
                echo "\" width=\"64\" height=\"64\" border=\"0\"/><br />";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["guild"], "name", [], "any", false, false, false, 19), "html", null, true);
                echo "</a><br />";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["guild"], "frags", [], "any", false, false, false, 19), "html", null, true);
                echo " kills
\t\t\t\t</td>
\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['guild'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 22
            echo "\t\t";
        }
        // line 23
        echo "\t</tr>
</table>
";
    }

    public function getTemplateName()
    {
        return "powerful-guilds.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  89 => 23,  86 => 22,  71 => 19,  66 => 18,  61 => 17,  57 => 15,  55 => 14,  40 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "powerful-guilds.html.twig", "C:\\UniServerZ\\www\\plugins\\powerful-guilds\\powerful-guilds.html.twig");
    }
}
