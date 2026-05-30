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

/* characters.form.html.twig */
class __TwigTemplate_ba54d7408a06fde0101572b382def5cc extends \Twig\Template
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

<section class=\"characters-search-panel\">
  <div>
    <span>Character Search</span>
    <h1>Search Character</h1>
    <p>Escribe el nombre del personaje para abrir su informacion.</p>
  </div>

  <form class=\"characters-search-form\" action=\"";
        // line 10
        echo twig_escape_filter($this->env, ($context["link"] ?? null), "html", null, true);
        echo "\" method=\"post\">
    <label>
      <span>Character Name</span>
      <input name=\"name\" value=\"\" size=\"29\" maxlength=\"29\"";
        // line 13
        if (($context["autofocus"] ?? null)) {
            echo " autofocus";
        }
        echo " autocomplete=\"off\">
    </label>
    <button class=\"characters-blue-button\" type=\"submit\">Submit</button>
  </form>
</section>
";
    }

    public function getTemplateName()
    {
        return "characters.form.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  54 => 13,  48 => 10,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "characters.form.html.twig", "C:\\UniServerZ\\www\\system\\templates\\characters.form.html.twig");
    }
}
