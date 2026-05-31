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

/* account.generate_new_recovery_key.html.twig */
class __TwigTemplate_0686c239df1eabbb508fa83a8e4a40ea extends \Twig\Template
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
        echo "<link rel=\"stylesheet\" href=\"/tools/simple-page.css?v=20260531\">

<div class=\"account-form-page\">
  <section class=\"account-form-hero\">
    <span>Recovery Key</span>
    <h1>Buy New Recovery Key</h1>
    <p>Genera una nueva recovery key para tu cuenta. La nueva key reemplaza a la anterior y se muestra una sola vez.</p>
  </section>

  ";
        // line 10
        if (($context["generated_recovery_key"] ?? null)) {
            // line 11
            echo "    <section class=\"account-form-card recovery-key-result-card\">
      <div class=\"account-form-card-heading\">
        <span>Generated</span>
        <h2>New recovery key</h2>
        <p>Guarda esta key ahora. Al salir o recargar esta pagina ya no se volvera a mostrar.</p>
      </div>

      <div class=\"recovery-key-result\">";
            // line 18
            echo twig_escape_filter($this->env, ($context["generated_recovery_key"] ?? null), "html", null, true);
            echo "</div>
      <div class=\"account-form-actions\">
        <a class=\"account-form-button account-form-button-blue\" href=\"";
            // line 20
            echo twig_escape_filter($this->env, $this->env->getFunction('getLink')->getCallable()("account/manage"), "html", null, true);
            echo "\">Back to Account</a>
      </div>
    </section>
  ";
        }
        // line 24
        echo "
  ";
        // line 25
        if (($context["show_form"] ?? null)) {
            // line 26
            echo "    <section class=\"account-form-card\">
      <div class=\"account-form-card-heading\">
        <span>Confirm</span>
        <h2>Confirm purchase</h2>
        <p>
          New recovery key cost:
          <b style=\"color: ";
            // line 32
            echo twig_escape_filter($this->env, ($context["color"] ?? null), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, ($context["need_coins"] ?? null), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, ($context["coin_name"] ?? null), "html", null, true);
            echo "</b>.
          Your balance: <b>";
            // line 33
            echo twig_escape_filter($this->env, ($context["coins"] ?? null), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, ($context["coin_name"] ?? null), "html", null, true);
            echo "</b>.
        </p>
      </div>

      <form action=\"";
            // line 37
            echo twig_escape_filter($this->env, $this->env->getFunction('getLink')->getCallable()("account/register/new"), "html", null, true);
            echo "\" method=\"post\">
        <input type=\"hidden\" name=\"registeraccountsave\" value=\"1\">
        <div class=\"account-form-fields\">
          <label>
            Account password
            <input type=\"password\" name=\"reg_password\" maxlength=\"64\" required>
          </label>
        </div>

        <div class=\"account-form-actions\">
          <button class=\"account-form-button account-form-button-green\" type=\"submit\">Generate Key</button>
          <a class=\"account-form-button account-form-button-red\" href=\"";
            // line 48
            echo twig_escape_filter($this->env, $this->env->getFunction('getLink')->getCallable()("account/manage"), "html", null, true);
            echo "\">Back</a>
        </div>
      </form>
    </section>
  ";
        }
        // line 53
        echo "</div>
";
    }

    public function getTemplateName()
    {
        return "account.generate_new_recovery_key.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  123 => 53,  115 => 48,  101 => 37,  92 => 33,  84 => 32,  76 => 26,  74 => 25,  71 => 24,  64 => 20,  59 => 18,  50 => 11,  48 => 10,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "account.generate_new_recovery_key.html.twig", "C:\\UniServerZ\\www\\system\\templates\\account.generate_new_recovery_key.html.twig");
    }
}
