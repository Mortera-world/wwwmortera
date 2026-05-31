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

/* account.create.html.twig */
class __TwigTemplate_c4df26d6187ab46dd80af073ea72b858 extends \Twig\Template
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
        echo twig_escape_filter($this->env, $this->env->getFunction('hook')->getCallable()($context, "HOOK_ACCOUNT_CREATE_BEFORE_FORM"), "html", null, true);
        echo "
<link rel=\"stylesheet\" href=\"/tools/simple-page.css?v=20260529\">

<form action=\"";
        // line 4
        echo twig_escape_filter($this->env, $this->env->getFunction('getLink')->getCallable()("account/create"), "html", null, true);
        echo "\" method=\"post\" id=\"createaccount\" class=\"create-account-page\">
\t<section class=\"create-account-hero\">
\t\t<span>New account</span>
\t\t<h1>Create Account</h1>
\t\t<p>Registra tu cuenta para entrar al servidor. Usa datos reales y guarda tu account name y password en un lugar seguro.</p>
\t</section>

\t<section class=\"create-account-card\">
\t\t<div class=\"create-account-card-heading\">
\t\t\t<span>Account details</span>
\t\t\t<h2>Datos de acceso</h2>
\t\t\t<p>Estos datos seran necesarios para entrar al juego y administrar tu cuenta.</p>
\t\t</div>

\t\t<div class=\"create-account-fields\">
\t\t\t";
        // line 19
        echo twig_escape_filter($this->env, $this->env->getFunction('hook')->getCallable()($context, "HOOK_ACCOUNT_CREATE_BEFORE_BOXES"), "html", null, true);
        echo "
\t\t\t";
        // line 20
        echo twig_escape_filter($this->env, $this->env->getFunction('hook')->getCallable()($context, "HOOK_ACCOUNT_CREATE_BEFORE_ACCOUNT"), "html", null, true);
        echo "

\t\t\t";
        // line 22
        if (twig_get_attribute($this->env, $this->source, ($context["config"] ?? null), "account_login_by_email", [], "any", false, false, false, 22)) {
            // line 23
            echo "\t\t\t\t<label class=\"create-account-field\">
\t\t\t\t\t<span";
            // line 24
            if (twig_get_attribute($this->env, $this->source, ($context["errors"] ?? null), "account", [], "any", true, true, false, 24)) {
                echo " class=\"red\"";
            }
            echo ">Account ";
            if (twig_constant("USE_ACCOUNT_NAME")) {
                echo "Name";
            } else {
                echo "Number";
            }
            echo "</span>
\t\t\t\t\t<div class=\"create-account-input-wrap\">
\t\t\t\t\t\t<input type=\"text\" name=\"account\" id=\"account_input\" maxlength=\"";
            // line 26
            if (twig_constant("USE_ACCOUNT_NAME")) {
                echo "30";
            } else {
                echo "10";
            }
            echo "\" value=\"";
            echo twig_escape_filter($this->env, ($context["account"] ?? null), "html", null, true);
            echo "\" />
\t\t\t\t\t\t<img id=\"account_indicator\" src=\"images/global/general/";
            // line 27
            if (( !($context["save"] ?? null) || twig_get_attribute($this->env, $this->source, ($context["errors"] ?? null), "account", [], "any", true, true, false, 27))) {
                echo "n";
            }
            echo "ok.gif\" style=\"display: none;\" />
\t\t\t\t\t</div>
\t\t\t\t\t";
            // line 29
            if (twig_constant("USE_ACCOUNT_NAME")) {
                // line 30
                echo "\t\t\t\t\t\t<small id=\"SuggestAccountNumber\"><a href=\"#\">Suggest number</a></small>
\t\t\t\t\t";
            }
            // line 32
            echo "\t\t\t\t\t<em id=\"account_error\" class=\"FormFieldError\">";
            if (twig_get_attribute($this->env, $this->source, ($context["errors"] ?? null), "account", [], "any", true, true, false, 32)) {
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["errors"] ?? null), "account", [], "any", false, false, false, 32), "html", null, true);
            }
            echo "</em>
\t\t\t\t</label>
\t\t\t";
        }
        // line 35
        echo "
\t\t\t";
        // line 36
        echo twig_escape_filter($this->env, $this->env->getFunction('hook')->getCallable()($context, "HOOK_ACCOUNT_CREATE_AFTER_ACCOUNT"), "html", null, true);
        echo "

\t\t\t<label class=\"create-account-field\">
\t\t\t\t<span";
        // line 39
        if (twig_get_attribute($this->env, $this->source, ($context["errors"] ?? null), "email", [], "any", true, true, false, 39)) {
            echo " class=\"red\"";
        }
        echo ">Email Address</span>
\t\t\t\t<div class=\"create-account-input-wrap\">
\t\t\t\t\t<input type=\"text\" name=\"email\" id=\"email\" maxlength=\"50\" value=\"";
        // line 41
        echo twig_escape_filter($this->env, ($context["email"] ?? null), "html", null, true);
        echo "\" />
\t\t\t\t\t<img id=\"email_indicator\" src=\"images/global/general/";
        // line 42
        if (( !($context["save"] ?? null) || twig_get_attribute($this->env, $this->source, ($context["errors"] ?? null), "email", [], "any", true, true, false, 42))) {
            echo "n";
        }
        echo "ok.gif\" style=\"display: none;\" />
\t\t\t\t</div>
\t\t\t\t<em id=\"email_error\" class=\"FormFieldError\">";
        // line 44
        if (twig_get_attribute($this->env, $this->source, ($context["errors"] ?? null), "email", [], "any", true, true, false, 44)) {
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["errors"] ?? null), "email", [], "any", false, false, false, 44), "html", null, true);
        }
        echo "</em>
\t\t\t</label>

\t\t\t";
        // line 47
        if ((twig_get_attribute($this->env, $this->source, ($context["config"] ?? null), "mail_enabled", [], "any", false, false, false, 47) && twig_get_attribute($this->env, $this->source, ($context["config"] ?? null), "account_mail_verify", [], "any", false, false, false, 47))) {
            // line 48
            echo "\t\t\t\t<div class=\"create-account-note\">Usa un correo real. Enviaremos un link para confirmar tu cuenta.</div>
\t\t\t";
        }
        // line 50
        echo "
\t\t\t";
        // line 51
        echo twig_escape_filter($this->env, $this->env->getFunction('hook')->getCallable()($context, "HOOK_ACCOUNT_CREATE_AFTER_EMAIL"), "html", null, true);
        echo "

\t\t\t";
        // line 53
        if (twig_get_attribute($this->env, $this->source, ($context["config"] ?? null), "account_country", [], "any", false, false, false, 53)) {
            // line 54
            echo "\t\t\t\t<label class=\"create-account-field\">
\t\t\t\t\t<span";
            // line 55
            if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["errors"] ?? null), "country", [], "any", false, true, false, 55), 0, [], "array", true, true, false, 55)) {
                echo " class=\"red\"";
            }
            echo ">Country</span>
\t\t\t\t\t<div class=\"create-account-input-wrap\">
\t\t\t\t\t\t<select name=\"country\" id=\"account_country\">
\t\t\t\t\t\t\t";
            // line 58
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["countries"] ?? null));
            foreach ($context['_seq'] as $context["code"] => $context["country_"]) {
                // line 59
                echo "\t\t\t\t\t\t\t\t<option value=\"";
                echo twig_escape_filter($this->env, $context["code"], "html", null, true);
                echo "\"";
                if (((array_key_exists("country", $context) && (($context["country"] ?? null) == $context["code"])) || ((null === ($context["country"] ?? null)) && (($context["country_recognized"] ?? null) == $context["code"])))) {
                    echo "selected";
                }
                echo ">";
                echo twig_escape_filter($this->env, $context["country_"], "html", null, true);
                echo "</option>
\t\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['code'], $context['country_'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 61
            echo "\t\t\t\t\t\t</select>
\t\t\t\t\t\t<img src=\"\" id=\"account_country_img\"/>
\t\t\t\t\t</div>
\t\t\t\t\t";
            // line 64
            if (twig_get_attribute($this->env, $this->source, ($context["errors"] ?? null), "country", [], "any", true, true, false, 64)) {
                // line 65
                echo "\t\t\t\t\t\t<em class=\"FormFieldError\">";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["errors"] ?? null), "country", [], "any", false, false, false, 65), "html", null, true);
                echo "</em>
\t\t\t\t\t";
            }
            // line 67
            echo "\t\t\t\t</label>
\t\t\t";
        }
        // line 69
        echo "
\t\t\t";
        // line 70
        echo twig_escape_filter($this->env, $this->env->getFunction('hook')->getCallable()($context, "HOOK_ACCOUNT_CREATE_AFTER_COUNTRY"), "html", null, true);
        echo "

\t\t\t<label class=\"create-account-field\">
\t\t\t\t<span";
        // line 73
        if (twig_get_attribute($this->env, $this->source, ($context["errors"] ?? null), "password", [], "any", true, true, false, 73)) {
            echo " class=\"red\"";
        }
        echo ">Password</span>
\t\t\t\t<div class=\"create-account-input-wrap\">
\t\t\t\t\t<input type=\"password\" name=\"password\" id=\"password\" value=\"\" maxlength=\"29\" />
\t\t\t\t\t<img id=\"password_indicator\" src=\"images/global/general/";
        // line 76
        if (( !($context["save"] ?? null) || twig_get_attribute($this->env, $this->source, ($context["errors"] ?? null), "password", [], "any", true, true, false, 76))) {
            echo "n";
        }
        echo "ok.gif\" style=\"display: none;\" />
\t\t\t\t</div>
\t\t\t\t<em id=\"password_error\" class=\"FormFieldError\">";
        // line 78
        if (twig_get_attribute($this->env, $this->source, ($context["errors"] ?? null), "password", [], "any", true, true, false, 78)) {
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["errors"] ?? null), "password", [], "any", false, false, false, 78), "html", null, true);
        }
        echo "</em>
\t\t\t</label>

\t\t\t<label class=\"create-account-field\">
\t\t\t\t<span";
        // line 82
        if (twig_get_attribute($this->env, $this->source, ($context["errors"] ?? null), "password", [], "any", true, true, false, 82)) {
            echo " class=\"red\"";
        }
        echo ">Repeat Password</span>
\t\t\t\t<div class=\"create-account-input-wrap\">
\t\t\t\t\t<input type=\"password\" name=\"password2\" id=\"password2\" value=\"\" maxlength=\"29\" />
\t\t\t\t\t<img id=\"password2_indicator\" src=\"images/global/general/";
        // line 85
        if (( !($context["save"] ?? null) || twig_get_attribute($this->env, $this->source, ($context["errors"] ?? null), "password", [], "any", true, true, false, 85))) {
            echo "n";
        }
        echo "ok.gif\" style=\"display: none;\" />
\t\t\t\t</div>
\t\t\t\t<em id=\"password2_error\" class=\"FormFieldError\">";
        // line 87
        if (twig_get_attribute($this->env, $this->source, ($context["errors"] ?? null), "password", [], "any", true, true, false, 87)) {
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["errors"] ?? null), "password", [], "any", false, false, false, 87), "html", null, true);
        }
        echo "</em>
\t\t\t</label>

\t\t\t";
        // line 90
        echo twig_escape_filter($this->env, $this->env->getFunction('hook')->getCallable()($context, "HOOK_ACCOUNT_CREATE_AFTER_PASSWORDS"), "html", null, true);
        echo "

\t\t\t";
        // line 92
        if (twig_get_attribute($this->env, $this->source, ($context["config"] ?? null), "recaptcha_enabled", [], "any", false, false, false, 92)) {
            // line 93
            echo "\t\t\t\t<div class=\"create-account-field create-account-recaptcha\">
\t\t\t\t\t<span";
            // line 94
            if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["errors"] ?? null), "verification", [], "any", false, true, false, 94), 0, [], "array", true, true, false, 94)) {
                echo " class=\"red\"";
            }
            echo ">Verification</span>
\t\t\t\t\t<div class=\"g-recaptcha\" data-sitekey=\"";
            // line 95
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["config"] ?? null), "recaptcha_site_key", [], "any", false, false, false, 95), "html", null, true);
            echo "\" data-theme=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["config"] ?? null), "recaptcha_theme", [], "any", false, false, false, 95), "html", null, true);
            echo "\"></div>
\t\t\t\t\t";
            // line 96
            if (twig_get_attribute($this->env, $this->source, ($context["errors"] ?? null), "verification", [], "any", true, true, false, 96)) {
                // line 97
                echo "\t\t\t\t\t\t<em class=\"FormFieldError\">";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["errors"] ?? null), "verification", [], "any", false, false, false, 97), "html", null, true);
                echo "</em>
\t\t\t\t\t";
            }
            // line 99
            echo "\t\t\t\t</div>
\t\t\t";
        }
        // line 101
        echo "
\t\t\t";
        // line 102
        echo twig_escape_filter($this->env, $this->env->getFunction('hook')->getCallable()($context, "HOOK_ACCOUNT_CREATE_AFTER_RECAPTCHA"), "html", null, true);
        echo "
\t\t</div>
\t</section>

\t";
        // line 106
        echo twig_escape_filter($this->env, $this->env->getFunction('hook')->getCallable()($context, "HOOK_ACCOUNT_CREATE_BETWEEN_BOXES_1"), "html", null, true);
        echo "

\t";
        // line 108
        if ((( !twig_get_attribute($this->env, $this->source, ($context["config"] ?? null), "mail_enabled", [], "any", false, false, false, 108) ||  !twig_get_attribute($this->env, $this->source, ($context["config"] ?? null), "account_mail_verify", [], "any", false, false, false, 108)) && twig_get_attribute($this->env, $this->source, ($context["config"] ?? null), "account_create_character_create", [], "any", false, false, false, 108))) {
            // line 109
            echo "\t\t<section class=\"create-account-card\">
\t\t\t<div class=\"create-account-card-heading\">
\t\t\t\t<span>First character</span>
\t\t\t\t<h2>Crear personaje</h2>
\t\t\t\t<p>Elige el nombre y las opciones iniciales de tu primer personaje.</p>
\t\t\t</div>

\t\t\t<div class=\"create-account-fields\">
\t\t\t\t";
            // line 117
            echo twig_escape_filter($this->env, $this->env->getFunction('hook')->getCallable()($context, "HOOK_ACCOUNT_CREATE_BEFORE_CHARACTER_NAME"), "html", null, true);
            echo "

\t\t\t\t<label class=\"create-account-field\">
\t\t\t\t\t<span";
            // line 120
            if (twig_get_attribute($this->env, $this->source, ($context["errors"] ?? null), "name", [], "any", true, true, false, 120)) {
                echo " class=\"red\"";
            }
            echo ">Character Name</span>
\t\t\t\t\t<div class=\"create-account-input-wrap\">
\t\t\t\t\t\t<input id=\"character_name\" name=\"name\" maxlength=\"";
            // line 122
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["config"] ?? null), "character_name_max_length", [], "any", false, false, false, 122), "html", null, true);
            echo "\" value=\"";
            echo twig_escape_filter($this->env, ($context["name"] ?? null), "html", null, true);
            echo "\"/>
\t\t\t\t\t\t<img id=\"character_indicator\" src=\"images/global/general/";
            // line 123
            if (( !($context["save"] ?? null) || twig_get_attribute($this->env, $this->source, ($context["errors"] ?? null), "name", [], "any", true, true, false, 123))) {
                echo "n";
            }
            echo "ok.gif\" style=\"display: none;\" />
\t\t\t\t\t</div>
\t\t\t\t\t<em id=\"character_error\" class=\"FormFieldError\">";
            // line 125
            if (twig_get_attribute($this->env, $this->source, ($context["errors"] ?? null), "name", [], "any", true, true, false, 125)) {
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["errors"] ?? null), "name", [], "any", false, false, false, 125), "html", null, true);
            }
            echo "</em>
\t\t\t\t</label>

\t\t\t\t";
            // line 128
            echo twig_escape_filter($this->env, $this->env->getFunction('hook')->getCallable()($context, "HOOK_ACCOUNT_CREATE_AFTER_CHARACTER_NAME"), "html", null, true);
            echo "

\t\t\t\t<div class=\"create-account-field\">
\t\t\t\t\t<span";
            // line 131
            if (twig_get_attribute($this->env, $this->source, ($context["errors"] ?? null), "sex", [], "any", true, true, false, 131)) {
                echo " class=\"red\"";
            }
            echo ">Sex</span>
\t\t\t\t\t<div class=\"create-account-options\">
\t\t\t\t\t\t";
            // line 133
            $context["i"] = 0;
            // line 134
            echo "\t\t\t\t\t\t";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_reverse_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["config"] ?? null), "genders", [], "any", false, false, false, 134), true));
            foreach ($context['_seq'] as $context["id"] => $context["gender"]) {
                // line 135
                echo "\t\t\t\t\t\t\t";
                $context["i"] = (($context["i"] ?? null) + 1);
                // line 136
                echo "\t\t\t\t\t\t\t<label>
\t\t\t\t\t\t\t\t<input type=\"radio\" name=\"sex\" id=\"sex";
                // line 137
                echo twig_escape_filter($this->env, ($context["i"] ?? null), "html", null, true);
                echo "\" value=\"";
                echo twig_escape_filter($this->env, $context["id"], "html", null, true);
                echo "\"";
                if (( !(null === ($context["sex"] ?? null)) && (($context["sex"] ?? null) == $context["id"]))) {
                    echo " checked=\"checked\"";
                }
                echo ">
\t\t\t\t\t\t\t\t";
                // line 138
                echo twig_escape_filter($this->env, twig_lower_filter($this->env, $context["gender"]), "html", null, true);
                echo "
\t\t\t\t\t\t\t</label>
\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['id'], $context['gender'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 141
            echo "\t\t\t\t\t</div>
\t\t\t\t\t<em id=\"sex_error\" class=\"FormFieldError\">";
            // line 142
            if (twig_get_attribute($this->env, $this->source, ($context["errors"] ?? null), "sex", [], "any", true, true, false, 142)) {
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["errors"] ?? null), "sex", [], "any", false, false, false, 142), "html", null, true);
            }
            echo "</em>
\t\t\t\t</div>

\t\t\t\t";
            // line 145
            echo twig_escape_filter($this->env, $this->env->getFunction('hook')->getCallable()($context, "HOOK_ACCOUNT_CREATE_AFTER_SEX"), "html", null, true);
            echo "

\t\t\t\t";
            // line 147
            if ((twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["config"] ?? null), "character_samples", [], "any", false, false, false, 147)) > 1)) {
                // line 148
                echo "\t\t\t\t\t<div class=\"create-account-field\">
\t\t\t\t\t\t<span";
                // line 149
                if (twig_get_attribute($this->env, $this->source, ($context["errors"] ?? null), "vocation", [], "any", true, true, false, 149)) {
                    echo " class=\"red\"";
                }
                echo ">Vocation</span>
\t\t\t\t\t\t<div class=\"create-account-options\">
\t\t\t\t\t\t\t";
                // line 151
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["config"] ?? null), "character_samples", [], "any", false, false, false, 151));
                foreach ($context['_seq'] as $context["key"] => $context["sample_char"]) {
                    // line 152
                    echo "\t\t\t\t\t\t\t\t<label>
\t\t\t\t\t\t\t\t\t<input type=\"radio\" name=\"vocation\" id=\"vocation";
                    // line 153
                    echo twig_escape_filter($this->env, $context["key"], "html", null, true);
                    echo "\" value=\"";
                    echo twig_escape_filter($this->env, $context["key"], "html", null, true);
                    echo "\"";
                    if (( !(null === ($context["vocation"] ?? null)) && (($context["vocation"] ?? null) == $context["key"]))) {
                        echo " checked=\"checked\"";
                    }
                    echo ">
\t\t\t\t\t\t\t\t\t";
                    // line 154
                    echo twig_escape_filter($this->env, (($__internal_compile_0 = (($__internal_compile_1 = ($context["config"] ?? null)) && is_array($__internal_compile_1) || $__internal_compile_1 instanceof ArrayAccess ? ($__internal_compile_1["vocations"] ?? null) : null)) && is_array($__internal_compile_0) || $__internal_compile_0 instanceof ArrayAccess ? ($__internal_compile_0[$context["key"]] ?? null) : null), "html", null, true);
                    echo "
\t\t\t\t\t\t\t\t</label>
\t\t\t\t\t\t\t";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['key'], $context['sample_char'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 157
                echo "\t\t\t\t\t\t</div>
\t\t\t\t\t\t<em id=\"vocation_error\" class=\"FormFieldError\">";
                // line 158
                if (twig_get_attribute($this->env, $this->source, ($context["errors"] ?? null), "vocation", [], "any", true, true, false, 158)) {
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["errors"] ?? null), "vocation", [], "any", false, false, false, 158), "html", null, true);
                }
                echo "</em>
\t\t\t\t\t</div>
\t\t\t\t";
            }
            // line 161
            echo "
\t\t\t\t";
            // line 162
            echo twig_escape_filter($this->env, $this->env->getFunction('hook')->getCallable()($context, "HOOK_ACCOUNT_CREATE_AFTER_VOCATION"), "html", null, true);
            echo "

\t\t\t\t";
            // line 164
            if ((twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["config"] ?? null), "character_towns", [], "any", false, false, false, 164)) > 1)) {
                // line 165
                echo "\t\t\t\t\t<div class=\"create-account-field\">
\t\t\t\t\t\t<span";
                // line 166
                if (twig_get_attribute($this->env, $this->source, ($context["errors"] ?? null), "town", [], "any", true, true, false, 166)) {
                    echo " class=\"red\"";
                }
                echo ">Select your town</span>
\t\t\t\t\t\t<div class=\"create-account-options\">
\t\t\t\t\t\t\t";
                // line 168
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["config"] ?? null), "character_towns", [], "any", false, false, false, 168));
                foreach ($context['_seq'] as $context["_key"] => $context["town_id"]) {
                    // line 169
                    echo "\t\t\t\t\t\t\t\t<label>
\t\t\t\t\t\t\t\t\t<input type=\"radio\" name=\"town\" id=\"town";
                    // line 170
                    echo twig_escape_filter($this->env, $context["town_id"], "html", null, true);
                    echo "\" value=\"";
                    echo twig_escape_filter($this->env, $context["town_id"], "html", null, true);
                    echo "\"";
                    if (( !(null === ($context["town"] ?? null)) && (($context["town"] ?? null) == $context["town_id"]))) {
                        echo " checked=\"checked\"";
                    }
                    echo ">
\t\t\t\t\t\t\t\t\t";
                    // line 171
                    echo twig_escape_filter($this->env, (($__internal_compile_2 = twig_get_attribute($this->env, $this->source, ($context["config"] ?? null), "towns", [], "any", false, false, false, 171)) && is_array($__internal_compile_2) || $__internal_compile_2 instanceof ArrayAccess ? ($__internal_compile_2[$context["town_id"]] ?? null) : null), "html", null, true);
                    echo "
\t\t\t\t\t\t\t\t</label>
\t\t\t\t\t\t\t";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['town_id'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 174
                echo "\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t";
            }
            // line 177
            echo "
\t\t\t\t";
            // line 178
            echo twig_escape_filter($this->env, $this->env->getFunction('hook')->getCallable()($context, "HOOK_ACCOUNT_CREATE_AFTER_TOWNS"), "html", null, true);
            echo "
\t\t\t</div>
\t\t</section>
\t";
        }
        // line 182
        echo "
\t";
        // line 183
        echo twig_escape_filter($this->env, $this->env->getFunction('hook')->getCallable()($context, "HOOK_ACCOUNT_CREATE_BETWEEN_BOXES_2"), "html", null, true);
        echo "

\t<section class=\"create-account-card create-account-rules\">
\t\t<div class=\"create-account-card-heading\">
\t\t\t<span>Rules</span>
\t\t\t<h2>Terminos del servidor</h2>
\t\t\t<p>Para crear la cuenta necesitas aceptar las reglas del servidor.</p>
\t\t</div>

\t\t<label class=\"create-account-check\">
\t\t\t<input type=\"checkbox\" id=\"accept_rules\" name=\"accept_rules\" value=\"true\"";
        // line 193
        if (($context["accept_rules"] ?? null)) {
            echo "checked";
        }
        echo "/>
\t\t\t<span>I agree to the <a href=\"?subtopic=rules\" target=\"_blank\">";
        // line 194
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["config"] ?? null), "lua", [], "any", false, false, false, 194), "serverName", [], "any", false, false, false, 194), "html", null, true);
        echo " Rules</a>.</span>
\t\t</label>

\t\t";
        // line 197
        if (twig_get_attribute($this->env, $this->source, ($context["errors"] ?? null), "accept_rules", [], "any", true, true, false, 197)) {
            // line 198
            echo "\t\t\t<em class=\"FormFieldError\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["errors"] ?? null), "accept_rules", [], "any", false, false, false, 198), "html", null, true);
            echo "</em>
\t\t";
        }
        // line 200
        echo "\t</section>

\t";
        // line 202
        echo twig_escape_filter($this->env, $this->env->getFunction('hook')->getCallable()($context, "HOOK_ACCOUNT_CREATE_AFTER_BOXES"), "html", null, true);
        echo "
\t";
        // line 203
        echo twig_escape_filter($this->env, $this->env->getFunction('hook')->getCallable()($context, "HOOK_ACCOUNT_CREATE_BEFORE_SUBMIT_BUTTON"), "html", null, true);
        echo "

\t<div class=\"create-account-submit\">
\t\t<input type=\"hidden\" name=\"save\" value=\"1\">
\t\t<button class=\"create-account-button\" type=\"submit\">Create Account</button>
\t</div>
</form>

";
        // line 211
        echo twig_escape_filter($this->env, $this->env->getFunction('hook')->getCallable()($context, "HOOK_ACCOUNT_CREATE_AFTER_FORM"), "html", null, true);
        echo "
<script type=\"text/javascript\" src=\"tools/check_name.js\"></script>
";
    }

    public function getTemplateName()
    {
        return "account.create.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  595 => 211,  584 => 203,  580 => 202,  576 => 200,  570 => 198,  568 => 197,  562 => 194,  556 => 193,  543 => 183,  540 => 182,  533 => 178,  530 => 177,  525 => 174,  516 => 171,  506 => 170,  503 => 169,  499 => 168,  492 => 166,  489 => 165,  487 => 164,  482 => 162,  479 => 161,  471 => 158,  468 => 157,  459 => 154,  449 => 153,  446 => 152,  442 => 151,  435 => 149,  432 => 148,  430 => 147,  425 => 145,  417 => 142,  414 => 141,  405 => 138,  395 => 137,  392 => 136,  389 => 135,  384 => 134,  382 => 133,  375 => 131,  369 => 128,  361 => 125,  354 => 123,  348 => 122,  341 => 120,  335 => 117,  325 => 109,  323 => 108,  318 => 106,  311 => 102,  308 => 101,  304 => 99,  298 => 97,  296 => 96,  290 => 95,  284 => 94,  281 => 93,  279 => 92,  274 => 90,  266 => 87,  259 => 85,  251 => 82,  242 => 78,  235 => 76,  227 => 73,  221 => 70,  218 => 69,  214 => 67,  208 => 65,  206 => 64,  201 => 61,  186 => 59,  182 => 58,  174 => 55,  171 => 54,  169 => 53,  164 => 51,  161 => 50,  157 => 48,  155 => 47,  147 => 44,  140 => 42,  136 => 41,  129 => 39,  123 => 36,  120 => 35,  111 => 32,  107 => 30,  105 => 29,  98 => 27,  88 => 26,  75 => 24,  72 => 23,  70 => 22,  65 => 20,  61 => 19,  43 => 4,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "account.create.html.twig", "C:\\UniServerZ\\www\\system\\templates\\account.create.html.twig");
    }
}
