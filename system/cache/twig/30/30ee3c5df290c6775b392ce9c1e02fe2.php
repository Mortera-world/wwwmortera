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

/* powerful-guilds.box.html.twig */
class __TwigTemplate_98f865e6f78f7c1a74e175c727d1fcef extends \Twig\Template
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
        echo "<div id=\"powerfulguilds\" class=\"Box\">
\t<div class=\"BorderTitleText\"></div>
\t<div class=\"Border_2\">
\t\t<div class=\"Border_3\">
\t\t\t<div class=\"BoxContent\">
\t\t\t\t";
        // line 6
        if (twig_test_empty(($context["guilds"] ?? null))) {
            // line 7
            echo "\t\t\t\t\t<div class=\"PowerfulGuildsEmpty\">There are no any guilds to show yet.</div>
\t\t\t\t";
        } else {
            // line 9
            echo "\t\t\t\t\t<div class=\"PowerfulGuildsGrid\">
\t\t\t\t\t\t";
            // line 10
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["guilds"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["guild"]) {
                // line 11
                echo "\t\t\t\t\t\t\t<a class=\"PowerfulGuildCard\" href=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["guild"], "link", [], "any", false, false, false, 11), "html", null, true);
                echo "\">
\t\t\t\t\t\t\t\t<img src=\"images/guilds/";
                // line 12
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["guild"], "logo", [], "any", false, false, false, 12), "html", null, true);
                echo "\" width=\"64\" height=\"64\" border=\"0\" alt=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["guild"], "name", [], "any", false, false, false, 12), "html", null, true);
                echo "\"/>
\t\t\t\t\t\t\t\t<span class=\"PowerfulGuildName\">";
                // line 13
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["guild"], "name", [], "any", false, false, false, 13), "html", null, true);
                echo "</span>
\t\t\t\t\t\t\t\t<span class=\"PowerfulGuildKills\">";
                // line 14
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["guild"], "frags", [], "any", false, false, false, 14), "html", null, true);
                echo " kills</span>
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['guild'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 17
            echo "\t\t\t\t\t</div>
\t\t\t\t";
        }
        // line 19
        echo "\t\t\t</div>
\t\t</div>
\t</div>
</div>
";
    }

    public function getTemplateName()
    {
        return "powerful-guilds.box.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  85 => 19,  81 => 17,  72 => 14,  68 => 13,  62 => 12,  57 => 11,  53 => 10,  50 => 9,  46 => 7,  44 => 6,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "powerful-guilds.box.html.twig", "C:\\UniServerZ\\www\\plugins\\powerful-guilds\\powerful-guilds.box.html.twig");
    }
}
