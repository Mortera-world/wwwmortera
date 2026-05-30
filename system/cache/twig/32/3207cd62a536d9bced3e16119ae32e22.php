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

/* account.login.html.twig */
class __TwigTemplate_a22bae8470411d5acdde7220240d406d extends \Twig\Template
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

<div class=\"account-login-page\">
\t<section class=\"account-login-hero\">
\t\t<span>Account access</span>
\t\t<h1>Login</h1>
\t\t<p>Entra a tu cuenta para administrar personajes, recovery key, compras y configuraciones.</p>
\t</section>

\t<section class=\"account-login-layout\">
\t\t<form action=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->env->getFunction('getLink')->getCallable()("account/manage"), "html", null, true);
        echo "\" method=\"post\" class=\"account-login-card\">
\t\t\t";
        // line 12
        if ( !(null === ($context["redirect"] ?? null))) {
            // line 13
            echo "\t\t\t\t<input type=\"hidden\" name=\"redirect\" value=\"";
            echo twig_escape_filter($this->env, ($context["redirect"] ?? null), "html", null, true);
            echo "\" />
\t\t\t";
        }
        // line 15
        echo "
\t\t\t<div class=\"account-login-card-heading\">
\t\t\t\t<span>Account Login</span>
\t\t\t\t<h2>Accede a tu cuenta</h2>
\t\t\t\t<p>Usa tu ";
        // line 19
        echo twig_escape_filter($this->env, twig_lower_filter($this->env, ($context["account"] ?? null)), "html", null, true);
        echo " y password para continuar.</p>
\t\t\t</div>

\t\t\t<div class=\"account-login-fields\">
\t\t\t\t<label class=\"account-login-field\">
\t\t\t\t\t<span";
        // line 24
        if ( !(null === ($context["error"] ?? null))) {
            echo " class=\"red\"";
        }
        echo ">";
        echo twig_escape_filter($this->env, ($context["account_login_by"] ?? null), "html", null, true);
        echo "</span>
\t\t\t\t\t<input type=\"text\" name=\"account_login\" maxlength=\"30\" autofocus />
\t\t\t\t</label>

\t\t\t\t<label class=\"account-login-field\">
\t\t\t\t\t<span";
        // line 29
        if ( !(null === ($context["error"] ?? null))) {
            echo " class=\"red\"";
        }
        echo ">Password</span>
\t\t\t\t\t<input type=\"password\" name=\"password_login\" maxlength=\"29\">
\t\t\t\t</label>

\t\t\t\t<label class=\"account-login-remember\">
\t\t\t\t\t<input type=\"checkbox\" id=\"remember_me\" name=\"remember_me\" value=\"true\" />
\t\t\t\t\t<span>Remember me</span>
\t\t\t\t</label>

\t\t\t\t";
        // line 38
        if ( !(null === ($context["error"] ?? null))) {
            // line 39
            echo "\t\t\t\t\t<div class=\"account-login-error FormFieldError\">";
            echo twig_escape_filter($this->env, ($context["error"] ?? null), "html", null, true);
            echo "</div>
\t\t\t\t";
        }
        // line 41
        echo "\t\t\t</div>

\t\t\t<div class=\"account-login-actions\">
\t\t\t\t<button class=\"account-login-button account-login-button-primary\" type=\"submit\">Login</button>
\t\t\t\t<a class=\"account-login-button account-login-button-secondary\" href=\"";
        // line 45
        echo twig_escape_filter($this->env, $this->env->getFunction('getLink')->getCallable()("account/lost"), "html", null, true);
        echo "\">Lost Account?</a>
\t\t\t</div>
\t\t</form>

\t\t<aside class=\"account-login-side\">
\t\t\t<div>
\t\t\t\t<span>New player</span>
\t\t\t\t<h2>Create Account</h2>
\t\t\t\t<p>Si aun no tienes cuenta, crea una nueva y empieza tu aventura en el servidor.</p>
\t\t\t\t<a class=\"account-login-create\" href=\"";
        // line 54
        echo twig_escape_filter($this->env, $this->env->getFunction('getLink')->getCallable()("account/create"), "html", null, true);
        echo "\">Create Account</a>
\t\t\t</div>
\t\t</aside>
\t</section>
</div>
";
    }

    public function getTemplateName()
    {
        return "account.login.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  127 => 54,  115 => 45,  109 => 41,  103 => 39,  101 => 38,  87 => 29,  75 => 24,  67 => 19,  61 => 15,  55 => 13,  53 => 12,  49 => 11,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "account.login.html.twig", "C:\\UniServerZ\\www\\templates\\tibiacom\\account.login.html.twig");
    }
}
