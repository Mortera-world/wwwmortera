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

/* account.lost.form.html.twig */
class __TwigTemplate_b603dd733830c9beea36ba56e8c6a364 extends \Twig\Template
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
        echo "<h2>Welcome to the Lost Account Interface!</h2>

<p>If you have lost access to your account, this interface can help you. Of course, you need to prove that your claim to the account is justified. Enter the requested data and follow the instructions carefully. Please understand there is no way to get access to your lost account if the interface cannot help you. Further options to change account data are available if you have a registered account.</p>

<p>By using the Lost Account Interface you can</p>

<ul class=\"CustomBulletPointList\" style=\"list-style-image: url(https://static.tibia.com/images/global/content/bullet.gif);\"><li>get a new password if you have lost the current password,</li><li>get your account back if it has been hacked,</li><li>change the email address of your account instantly (only possible with a valid recovery key or a valid recovery TAN),</li><li>request a new recovery key/recovery TAN (only available to registered accounts),</li><li>remove an authenticator app from your account (only possible with a valid recovery key or a valid recovery TAN),</li><li>disable email code authentication for your account (only available to accounts with a valid recovery key).</li></ul>

<p></p>

<p>As a first step to use the Lost Account Interface, please enter the name of a character or the email address of your account and click on \"Submit\".</p>

<br/>



<div class=\"TableContainer\">
<div class=\"CaptionContainer\">
<div class=\"CaptionInnerContainer\">
\t<span class=\"CaptionEdgeLeftTop\" style=\"background-image:url(";
        // line 20
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/global/content/box-frame-edge.gif);\"></span>
\t<span class=\"CaptionEdgeRightTop\" style=\"background-image:url(";
        // line 21
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/global/content/box-frame-edge.gif);\"></span>
\t<span class=\"CaptionBorderTop\" style=\"background-image:url(";
        // line 22
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/global/content/table-headline-border.gif);\"></span>
\t<span class=\"CaptionVerticalLeft\" style=\"background-image:url(";
        // line 23
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/global/content/box-frame-vertical.gif);\"></span>
\t<div class=\"Text\">Lost account</div>
\t<span class=\"CaptionVerticalRight\" style=\"background-image:url(";
        // line 25
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/global/content/box-frame-vertical.gif);\"></span>
\t<span class=\"CaptionBorderBottom\" style=\"background-image:url(";
        // line 26
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/global/content/table-headline-border.gif);\"></span>
\t<span class=\"CaptionEdgeLeftBottom\" style=\"background-image:url(";
        // line 27
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/global/content/box-frame-edge.gif);\"></span>
\t<span class=\"CaptionEdgeRightBottom\" style=\"background-image:url(";
        // line 28
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/global/content/box-frame-edge.gif);\"></span>
</div></div>
<table class=\"Table3\" cellpadding=\"0\" cellspacing=\"0\">
<tbody><tr>
<td>
<div class=\"InnerTableContainer\">
<table style=\"width:100%;\"><tbody><tr><td>
<div class=\"TableContentContainer\">


<form action=\"?subtopic=lostaccount&action=step1\" method=post>
\t<input type=\"hidden\" name=\"character\" value=\"\">
\t<table cellspacing=\"1\" cellpadding=\"4\" border=\"0\" width=\"100%\">
\t\t<tr>
\t\t\t<td bgcolor=\"";
        // line 42
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["config"] ?? null), "darkborder", [], "any", false, false, false, 42), "html", null, true);
        echo "\"><b>Please enter your character name</b></td>
\t\t</tr>
\t\t<tr>
\t\t\t<td bgcolor=\"";
        // line 45
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["config"] ?? null), "darkborder", [], "any", false, false, false, 45), "html", null, true);
        echo "\">
\t\t\t\t<input type=\"text\" name=\"nick\" size=\"40\" autofocus/><br>
\t\t\t</td>
\t\t</tr>
\t</table>
\t<table cellspacing=\"1\" cellpadding=\"4\" border=\"0\" width=\"100%\">
\t\t<tr>
\t\t\t<td bgcolor=\"";
        // line 52
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["config"] ?? null), "darkborder", [], "any", false, false, false, 52), "html", null, true);
        echo "\"><b>What do you want?</b></td>
\t\t</tr>
\t\t<tr>
\t\t\t<td bgcolor=\"";
        // line 55
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["config"] ?? null), "darkborder", [], "any", false, false, false, 55), "html", null, true);
        echo "\">
\t\t\t\t<input type=\"radio\" name=\"action_type\" id=\"action_type_key\" value=\"reckey\" checked>
\t\t\t\t<label for=\"action_type_key\"> I got <b>recovery key</b> and I want to recover access now.</label><br/>
\t\t\t\t<input type=\"radio\" name=\"action_type\" id=\"action_type_manual\" value=\"manual\">
\t\t\t\t<label for=\"action_type_manual\"> I don't have recovery key. I will provide account name, e-mail and real name for manual admin verification.</label><br/>
\t\t\t</td>
\t\t</tr>
\t</table>
\t<br/>
\t<table cellspacing=\"0\" cellpadding=\"0\" border=\"0\" width=\"100%\">
\t\t<tr>
\t\t\t<td align=\"center\">
\t\t\t\t";
        // line 67
        echo twig_include($this->env, $context, "buttons.submit.html.twig");
        echo "
\t\t\t</td>
\t\t</tr>
\t</table>
</form>


</div></td></tr>
</tbody></table>
</div>
</td>
</tr>
</tbody></table></div>


";
    }

    public function getTemplateName()
    {
        return "account.lost.form.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  141 => 67,  126 => 55,  120 => 52,  110 => 45,  104 => 42,  87 => 28,  83 => 27,  79 => 26,  75 => 25,  70 => 23,  66 => 22,  62 => 21,  58 => 20,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "account.lost.form.html.twig", "C:\\UniServerZ\\www\\system\\templates\\account.lost.form.html.twig");
    }
}
