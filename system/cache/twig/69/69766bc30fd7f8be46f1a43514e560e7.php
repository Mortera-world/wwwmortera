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

/* guilds.notice.html.twig */
class __TwigTemplate_30b98e527f9941040726da656118064f extends \Twig\Template
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

<div class=\"guilds-page guild-edit-page\">
  <section class=\"guild-notice-card\">
    <span>";
        // line 5
        echo twig_escape_filter($this->env, ((array_key_exists("eyebrow", $context)) ? (_twig_default_filter(($context["eyebrow"] ?? null), "Guilds")) : ("Guilds")), "html", null, true);
        echo "</span>
    <h1>";
        // line 6
        echo ($context["title"] ?? null);
        echo "</h1>
    <p>";
        // line 7
        echo ($context["description"] ?? null);
        echo "</p>

    <div class=\"guild-form-actions guild-form-actions-center\">
      ";
        // line 10
        if ((array_key_exists("primary_action", $context) && ($context["primary_action"] ?? null))) {
            // line 11
            echo "        <form action=\"";
            echo twig_escape_filter($this->env, ($context["primary_action"] ?? null), "html", null, true);
            echo "\" method=\"post\">
          <button class=\"guild-button\" type=\"submit\">";
            // line 12
            echo twig_escape_filter($this->env, ((array_key_exists("primary_label", $context)) ? (_twig_default_filter(($context["primary_label"] ?? null), "Submit")) : ("Submit")), "html", null, true);
            echo "</button>
        </form>
      ";
        }
        // line 15
        echo "
      <form action=\"";
        // line 16
        echo twig_escape_filter($this->env, ((array_key_exists("back_action", $context)) ? (_twig_default_filter(($context["back_action"] ?? null), $this->env->getFunction('getLink')->getCallable()("guilds"))) : ($this->env->getFunction('getLink')->getCallable()("guilds"))), "html", null, true);
        echo "\" method=\"post\">
        <button class=\"guild-button guild-button-danger\" type=\"submit\">";
        // line 17
        echo twig_escape_filter($this->env, ((array_key_exists("back_label", $context)) ? (_twig_default_filter(($context["back_label"] ?? null), "Back")) : ("Back")), "html", null, true);
        echo "</button>
      </form>
    </div>
  </section>
</div>
";
    }

    public function getTemplateName()
    {
        return "guilds.notice.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  77 => 17,  73 => 16,  70 => 15,  64 => 12,  59 => 11,  57 => 10,  51 => 7,  47 => 6,  43 => 5,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "guilds.notice.html.twig", "C:\\UniServerZ\\www\\system\\templates\\guilds.notice.html.twig");
    }
}
