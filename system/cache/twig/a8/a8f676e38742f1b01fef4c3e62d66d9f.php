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

/* online.form.html.twig */
class __TwigTemplate_77576002355cc8f0f54e6532a78869c3 extends \Twig\Template
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
        echo "<section class=\"online-search-panel\">
  <div>
    <span>Search</span>
    <h2>Search character</h2>
    <p>Busca un personaje por nombre para abrir su perfil.</p>
  </div>

  <form class=\"online-search-form\" action=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->env->getFunction('getLink')->getCallable()("characters"), "html", null, true);
        echo "\" method=\"post\">
    <label>
      <span>Character Name</span>
      <input name=\"name\" size=\"29\" maxlength=\"29\" autocomplete=\"off\">
    </label>
    <button class=\"guild-button\" type=\"submit\">Submit</button>
  </form>
</section>
";
    }

    public function getTemplateName()
    {
        return "online.form.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  46 => 8,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "online.form.html.twig", "C:\\UniServerZ\\www\\system\\templates\\online.form.html.twig");
    }
}
