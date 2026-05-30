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

/* account.generate_recovery_key.html.twig */
class __TwigTemplate_47c811f3a2930ac1fdad671710598e33 extends \Twig\Template
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
        echo "To generate recovery key for your account please enter your password.
";
        // line 2
        if (($context["can_update_public_info"] ?? null)) {
            echo "<br/>Fill fields with your information";
        }
        // line 3
        echo "<br/><br/>
<form action=\"";
        // line 4
        echo twig_escape_filter($this->env, $this->env->getFunction('getLink')->getCallable()("account/register"), "html", null, true);
        echo "\" method=\"post\">
  <input type=\"hidden\" name=\"registeraccountsave\" value=\"1\"/>
  <div class=\"TableContainer\">
    <table class=\"Table1\" cellpadding=\"0\" cellspacing=\"0\">
      <div class=\"CaptionContainer\">
        <div class=\"CaptionInnerContainer\">
          <span class=\"CaptionEdgeLeftTop\"
                style=\"background-image:url(";
        // line 11
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/content/box-frame-edge.gif);\"></span>
          <span class=\"CaptionEdgeRightTop\"
                style=\"background-image:url(";
        // line 13
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/content/box-frame-edge.gif);\"></span>
          <span class=\"CaptionBorderTop\"
                style=\"background-image:url(";
        // line 15
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/content/table-headline-border.gif);\"></span>
          <span class=\"CaptionVerticalLeft\"
                style=\"background-image:url(";
        // line 17
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/content/box-frame-vertical.gif);\"></span>
          <div class=\"Text\">Generate recovery
            key ";
        // line 19
        if (($context["can_update_public_info"] ?? null)) {
            echo " and Update information ";
        }
        echo "</div>
          <span class=\"CaptionVerticalRight\"
                style=\"background-image:url(";
        // line 21
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/content/box-frame-vertical.gif);\"></span>
          <span class=\"CaptionBorderBottom\"
                style=\"background-image:url(";
        // line 23
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/content/table-headline-border.gif);\"></span>
          <span class=\"CaptionEdgeLeftBottom\"
                style=\"background-image:url(";
        // line 25
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/content/box-frame-edge.gif);\"></span>
          <span class=\"CaptionEdgeRightBottom\"
                style=\"background-image:url(";
        // line 27
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/content/box-frame-edge.gif);\"></span>
        </div>
      </div>
      <tr>
        <td>
          <div class=\"InnerTableContainer\">
            <table style=\"width:100%;\">
              <tr>
                <td class=\"LabelV\" style=\"width:15%;\">
                  <span>Password:</span>
                </td>
                <td>
                  <input style=\"width:70%;\" type=\"password\" name=\"reg_password\" size=\"30\" maxlength=\"29\" autofocus/>
                </td>
              </tr>
              ";
        // line 42
        if (($context["can_update_public_info"] ?? null)) {
            // line 43
            echo "                <tr>
                  <td class=\"LabelV\">Real Name:</td>
                  <td>
                    <input name=\"info_rlname\" value=\"";
            // line 46
            echo twig_escape_filter($this->env, ($context["account_rlname"] ?? null), "html", null, true);
            echo "\" size=\"30\" maxlength=\"50\">
                  </td>
                </tr>
                <tr>
                  <td class=\"LabelV\">Address:</td>
                  <td>
                    <input name=\"info_location\" value=\"";
            // line 52
            echo twig_escape_filter($this->env, ($context["account_location"] ?? null), "html", null, true);
            echo "\" size=\"30\" maxlength=\"50\">
                  </td>
                </tr>
                <tr>
                  <td class=\"LabelV\">Phone:</td>
                  <td>
                    <input name=\"info_phone\" value=\"";
            // line 58
            echo twig_escape_filter($this->env, ($context["account_phone"] ?? null), "html", null, true);
            echo "\" size=\"15\" maxlength=\"11\">
                  </td>
                </tr>
                ";
            // line 61
            if (twig_get_attribute($this->env, $this->source, ($context["config"] ?? null), "account_country", [], "any", false, false, false, 61)) {
                // line 62
                echo "                  <tr>
                    <td class=\"LabelV\">Country:</td>
                    <td>
                      <select name=\"info_country\" id=\"account_country\">
                        ";
                // line 66
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(($context["countries"] ?? null));
                foreach ($context['_seq'] as $context["code"] => $context["country"]) {
                    // line 67
                    echo "                          <option
                            value=\"";
                    // line 68
                    echo twig_escape_filter($this->env, $context["code"], "html", null, true);
                    echo "\"";
                    if ((($context["account_country"] ?? null) == $context["code"])) {
                        echo " selected";
                    }
                    echo ">";
                    echo twig_escape_filter($this->env, $context["country"], "html", null, true);
                    echo " </option>
                        ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['code'], $context['country'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 70
                echo "                      </select>
                      <img src=\"\" id=\"account_country_img\"/>
                      <script>
                        function updateFlag() {
                          var img = \$('#account_country_img');
                          var country = \$('#account_country :selected').val();
                          if (country.length) {
                            img.attr('src', 'images/flags/' + country + '.gif');
                            img.show();
                          } else {
                            img.hide();
                          }
                        }

                        \$(function () {
                          updateFlag();
                          \$('#account_country').change(function () {
                            updateFlag();
                          });
                        });
                      </script>
                    </td>
                  </tr>
                ";
            }
            // line 94
            echo "              ";
        }
        // line 95
        echo "            </table>
          </div>
        </td>
      </tr>
    </table>
  </div>
  <br/>
  <table style=\"width:100%\">
    <tr align=\"center\">
      <td>
        <table border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
          <tr>
            <td style=\"border:0px;\">
              ";
        // line 108
        echo twig_include($this->env, $context, "buttons.submit.html.twig");
        echo "
            </td>
          <tr>
        </table>
      </td>
</form>
<td>
  <table border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
    <form action=\"";
        // line 116
        echo twig_escape_filter($this->env, $this->env->getFunction('getLink')->getCallable()("account/manage"), "html", null, true);
        echo "\" method=\"post\">
      <tr>
        <td style=\"border: 0px;\">
          ";
        // line 119
        echo twig_include($this->env, $context, "buttons.back.html.twig");
        echo "
        </td>
      </tr>
    </form>
  </table>
</td>
</tr>
</table>
";
    }

    public function getTemplateName()
    {
        return "account.generate_recovery_key.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  238 => 119,  232 => 116,  221 => 108,  206 => 95,  203 => 94,  177 => 70,  163 => 68,  160 => 67,  156 => 66,  150 => 62,  148 => 61,  142 => 58,  133 => 52,  124 => 46,  119 => 43,  117 => 42,  99 => 27,  94 => 25,  89 => 23,  84 => 21,  77 => 19,  72 => 17,  67 => 15,  62 => 13,  57 => 11,  47 => 4,  44 => 3,  40 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "account.generate_recovery_key.html.twig", "C:\\UniServerZ\\www\\system\\templates\\account.generate_recovery_key.html.twig");
    }
}
