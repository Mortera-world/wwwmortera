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

/* guilds.delete_by_admin.html.twig */
class __TwigTemplate_bd79b11e17582daf26f382d96561ee86 extends \Twig\Template
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
  <section class=\"guild-edit-panel\">
    <span>Admin action</span>
    <h1>Delete Guild</h1>
    <p>This will remove the guild as an administrator action.</p>

    <div class=\"guild-confirm-box\">
      Are you sure you want to delete guild <b>";
        // line 10
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["guild"] ?? null), "getName", [], "method", false, false, false, 10), "html", null, true);
        echo "</b>?
    </div>

    <form action=\"?subtopic=guilds&guild=";
        // line 13
        echo twig_escape_filter($this->env, twig_urlencode_filter(twig_get_attribute($this->env, $this->source, ($context["guild"] ?? null), "getName", [], "method", false, false, false, 13)), "html", null, true);
        echo "&action=delete_by_admin\" method=\"post\">
      <input type=\"hidden\" name=\"todo\" value=\"save\">
      <div class=\"guild-form-actions\">
        <button class=\"guild-button guild-button-danger\" type=\"submit\">Yes, Delete</button>
        <a class=\"guild-button guild-button-danger\" href=\"";
        // line 17
        echo twig_escape_filter($this->env, $this->env->getFunction('getLink')->getCallable()("guilds"), "html", null, true);
        echo "\">Back</a>
      </div>
    </form>
  </section>
</div>
";
    }

    public function getTemplateName()
    {
        return "guilds.delete_by_admin.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  61 => 17,  54 => 13,  48 => 10,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "guilds.delete_by_admin.html.twig", "C:\\UniServerZ\\www\\system\\templates\\guilds.delete_by_admin.html.twig");
    }
}
