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

/* characters.html.twig */
class __TwigTemplate_222367ebddec3aa9540fb7479be82377 extends \Twig\Template
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
        echo "<script type=\"text/javascript\" src=\"tools/js/tipped.js\"></script>
<link rel=\"stylesheet\" type=\"text/css\" href=\"tools/css/tipped.css\"/>
<script>
  \$(document).ready(function () {
    Tipped.create('.item_image');
  });
</script>
";
        // line 8
        $context["rows"] = 0;
        // line 9
        echo "
";
        // line 10
        if (($context["canEdit"] ?? null)) {
            // line 11
            echo "  <a href=\"admin/?p=players&id=";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["player"] ?? null), "getId", [], "method", false, false, false, 11), "html", null, true);
            echo "\" title=\"Edit in Admin Panel\" target=\"_blank\">
    ";
            // line 12
            $context["button_name"] = "Edit Character";
            // line 13
            echo "    ";
            $this->loadTemplate("buttons.base.html.twig", "characters.html.twig", 13)->display($context);
            // line 14
            echo "  </a>
  <br>
";
        }
        // line 17
        echo "
<!-- CHARACTER INFORMATION -->
<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">
  <tr>
    <td>
      <div class=\"TableContainer\">
        <div class=\"CaptionContainer\">
          <div class=\"CaptionInnerContainer\">
            <span class=\"CaptionEdgeLeftTop\"
                  style=\"background-image:url(";
        // line 26
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/global/content/box-frame-edge.gif);\"></span>
            <span class=\"CaptionEdgeRightTop\"
                  style=\"background-image:url(";
        // line 28
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/global/content/box-frame-edge.gif);\"></span>
            <span class=\"CaptionBorderTop\"
                  style=\"background-image:url(";
        // line 30
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/global/content/table-headline-border.gif);\"></span>
            <span class=\"CaptionVerticalLeft\"
                  style=\"background-image:url(";
        // line 32
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/global/content/box-frame-vertical.gif);\"></span>
            <div class=\"Text\">Character Information</div>
            <span class=\"CaptionVerticalRight\"
                  style=\"background-image:url(";
        // line 35
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/global/content/box-frame-vertical.gif);\"></span>
            <span class=\"CaptionBorderBottom\"
                  style=\"background-image:url(";
        // line 37
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/global/content/table-headline-border.gif);\"></span>
            <span class=\"CaptionEdgeLeftBottom\"
                  style=\"background-image:url(";
        // line 39
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/global/content/box-frame-edge.gif);\"></span>
            <span class=\"CaptionEdgeRightBottom\"
                  style=\"background-image:url(";
        // line 41
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/global/content/box-frame-edge.gif);\"></span>
          </div>
        </div>
        <table class=\"Table3\" cellpadding=\"0\" cellspacing=\"0\">
          <tbody>
          <tr>
            <td>
              <div class=\"InnerTableContainer\">
                <table style=\"width:100%;\">
                  <tbody>
                  <tr>
                    <td>
                      <div class=\"TableContentContainer\">
                        <table class=\"TableContent\" width=\"100%\" style=\"border:1px solid #faf0d7;\">
                          <tbody>

                          ";
        // line 57
        $context["rows"] = (($context["rows"] ?? null) + 1);
        // line 58
        echo "                          <tr bgcolor=\"";
        echo twig_escape_filter($this->env, $this->env->getFunction('getStyle')->getCallable()(($context["rows"] ?? null)), "html", null, true);
        echo "\">
                            <td width=\"20%\" class=\"LabelV175\">Name:</td>
                            <td>";
        // line 60
        if ( !(null === ($context["skull"] ?? null))) {
            echo "<img
                                src=\"images/";
            // line 61
            echo twig_escape_filter($this->env, ($context["skull"] ?? null), "html", null, true);
            echo ".gif\">";
        }
        echo " ";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["player"] ?? null), "getName", [], "method", false, false, false, 61), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, ($context["oldName"] ?? null), "html", null, true);
        echo " ";
        if (twig_get_attribute($this->env, $this->source, ($context["player"] ?? null), "isOnline", [], "method", false, false, false, 61)) {
            // line 62
            echo "                                <img src=\"";
            echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
            echo "/images/on.gif\" title=\"Online\">";
        } else {
            echo "<img
                                src=\"";
            // line 63
            echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
            echo "/images/off.gif\" title=\"Offline\">";
        }
        // line 64
        echo "                              <div style=\"float: right\"></div>
                            </td>
                          </tr>

                          ";
        // line 68
        $context["rows"] = (($context["rows"] ?? null) + 1);
        // line 69
        echo "                          <tr bgcolor=\"";
        echo twig_escape_filter($this->env, $this->env->getFunction('getStyle')->getCallable()(($context["rows"] ?? null)), "html", null, true);
        echo "\">
                            <td class=\"LabelV175\">Country:</td>
                            <td>";
        // line 71
        echo twig_escape_filter($this->env, ($context["country"] ?? null), "html", null, true);
        echo " ";
        echo ($context["flag"] ?? null);
        echo "</td>
                          </tr>

                          ";
        // line 74
        $context["rows"] = (($context["rows"] ?? null) + 1);
        // line 75
        echo "                          <tr bgcolor=\"";
        echo twig_escape_filter($this->env, $this->env->getFunction('getStyle')->getCallable()(($context["rows"] ?? null)), "html", null, true);
        echo "\">
                            <td class=\"LabelV175\">Sex:</td>
                            <td>";
        // line 77
        echo twig_escape_filter($this->env, ($context["sex"] ?? null), "html", null, true);
        echo "</td>
                          </tr>

                          ";
        // line 80
        $context["rows"] = (($context["rows"] ?? null) + 1);
        // line 81
        echo "                          <tr bgcolor=\"";
        echo twig_escape_filter($this->env, $this->env->getFunction('getStyle')->getCallable()(($context["rows"] ?? null)), "html", null, true);
        echo "\">
                            <td class=\"LabelV175\">Vocation:</td>
                            <td>";
        // line 83
        echo twig_escape_filter($this->env, ($context["vocation"] ?? null), "html", null, true);
        echo "</td>
                          </tr>

                          ";
        // line 86
        $context["rows"] = (($context["rows"] ?? null) + 1);
        // line 87
        echo "                          <tr bgcolor=\"";
        echo twig_escape_filter($this->env, $this->env->getFunction('getStyle')->getCallable()(($context["rows"] ?? null)), "html", null, true);
        echo "\">
                            <td class=\"LabelV175\">Level:</td>
                            <td>";
        // line 89
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["player"] ?? null), "getLevel", [], "method", false, false, false, 89), "html", null, true);
        echo "</td>
                          </tr>
\t\t\t\t\t\t  
                          ";
        // line 92
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["config"] ?? null), "characters", [], "any", false, false, false, 92), "resets", [], "any", false, false, false, 92)) {
            // line 93
            echo "                          ";
            $context["rows"] = (($context["rows"] ?? null) + 1);
            // line 94
            echo "                          <tr bgcolor=\"";
            echo twig_escape_filter($this->env, $this->env->getFunction('getStyle')->getCallable()(($context["rows"] ?? null)), "html", null, true);
            echo "\">
                              <td class=\"LabelV175\">Resets:</td>
                              <td>
                                  ";
            // line 97
            if ( !twig_get_attribute($this->env, $this->source, ($context["player"] ?? null), "isHidden", [], "method", false, false, false, 97)) {
                // line 98
                echo "                                      ";
                if ( !(null === twig_get_attribute($this->env, $this->source, ($context["player"] ?? null), "getStorage", [0 => 500], "method", false, false, false, 98))) {
                    // line 99
                    echo "                                          ";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["player"] ?? null), "getStorage", [0 => 500], "method", false, false, false, 99), "html", null, true);
                    echo " Resets
                                      ";
                } else {
                    // line 101
                    echo "                                          0 Resets
                                      ";
                }
                // line 103
                echo "                                  ";
            } else {
                // line 104
                echo "                                      <strike>Hidden</strike>
                                  ";
            }
            // line 106
            echo "                              </td>
                          </tr>
                          ";
        }
        // line 109
        echo "

                          ";
        // line 111
        $context["rows"] = (($context["rows"] ?? null) + 1);
        // line 112
        echo "                          <tr bgcolor=\"";
        echo twig_escape_filter($this->env, $this->env->getFunction('getStyle')->getCallable()(($context["rows"] ?? null)), "html", null, true);
        echo "\">
                            <td class=\"LabelV175\">Achievement Points:</td>
                            <td>";
        // line 114
        echo twig_escape_filter($this->env, ($context["achievementPoints"] ?? null), "html", null, true);
        echo "</td>
                          </tr>

                          ";
        // line 117
        $context["rows"] = (($context["rows"] ?? null) + 1);
        // line 118
        echo "                          <tr bgcolor=\"";
        echo twig_escape_filter($this->env, $this->env->getFunction('getStyle')->getCallable()(($context["rows"] ?? null)), "html", null, true);
        echo "\">
                            <td class=\"LabelV175\">Residence:</td>
                            <td>";
        // line 120
        echo twig_escape_filter($this->env, ($context["town"] ?? null), "html", null, true);
        echo "</td>
                          </tr>

                          ";
        // line 123
        if (($context["frags_enabled"] ?? null)) {
            // line 124
            echo "                            ";
            $context["rows"] = (($context["rows"] ?? null) + 1);
            // line 125
            echo "                            <tr bgcolor=\"";
            echo twig_escape_filter($this->env, $this->env->getFunction('getStyle')->getCallable()(($context["rows"] ?? null)), "html", null, true);
            echo "\">
                              <td class=\"LabelV175\">Frags:</td>
                              <td>";
            // line 127
            echo twig_escape_filter($this->env, ($context["frags_count"] ?? null), "html", null, true);
            echo "</td>
                            </tr>
                          ";
        }
        // line 130
        echo "
                          ";
        // line 131
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["config"] ?? null), "characters", [], "any", false, false, false, 131), "balance", [], "any", false, false, false, 131)) {
            // line 132
            echo "                            ";
            $context["rows"] = (($context["rows"] ?? null) + 1);
            // line 133
            echo "                            <tr bgcolor=\"";
            echo twig_escape_filter($this->env, $this->env->getFunction('getStyle')->getCallable()(($context["rows"] ?? null)), "html", null, true);
            echo "\">
                              <td class=\"LabelV175\">Balance:</td>
                              <td>
                                <strong style=\"color: green\">\$</strong>
                                ";
            // line 137
            if ( !twig_get_attribute($this->env, $this->source, ($context["player"] ?? null), "isHidden", [], "method", false, false, false, 137)) {
                echo "<span style=\"color: green; font-weight: bold;\">";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["player"] ?? null), "getBalance", [], "method", false, false, false, 137), "html", null, true);
                echo "</span> Gold Coins
                                ";
            } else {
                // line 138
                echo " <strike>Hidden</strike> ";
            }
            // line 139
            echo "                              </td>
                            </tr>
                          ";
        }
        // line 142
        echo "
                          ";
        // line 143
        if (twig_get_attribute($this->env, $this->source, ($context["house"] ?? null), "found", [], "any", false, false, false, 143)) {
            // line 144
            echo "                            ";
            $context["rows"] = (($context["rows"] ?? null) + 1);
            // line 145
            echo "                            <tr bgcolor=\"";
            echo twig_escape_filter($this->env, $this->env->getFunction('getStyle')->getCallable()(($context["rows"] ?? null)), "html", null, true);
            echo "\">
                              <td class=\"LabelV175\">House:</td>
                              <td><a href=\"\">";
            // line 147
            echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, ($context["house"] ?? null), "name", [], "any", false, false, false, 147) . twig_get_attribute($this->env, $this->source, ($context["house"] ?? null), "town", [], "any", false, false, false, 147)) . twig_get_attribute($this->env, $this->source, ($context["house"] ?? null), "add", [], "any", false, false, false, 147)), "html", null, true);
            echo "</a></td>
                            </tr>
                          ";
        }
        // line 150
        echo "
                          ";
        // line 151
        if ( !(null === twig_get_attribute($this->env, $this->source, ($context["guild"] ?? null), "rank", [], "any", false, false, false, 151))) {
            // line 152
            echo "                            ";
            $context["rows"] = (($context["rows"] ?? null) + 1);
            // line 153
            echo "                            <tr bgcolor=\"";
            echo twig_escape_filter($this->env, $this->env->getFunction('getStyle')->getCallable()(($context["rows"] ?? null)), "html", null, true);
            echo "\">
                              <td class=\"LabelV175\">Guild membership:</td>
                              <td>";
            // line 155
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["guild"] ?? null), "rank", [], "any", false, false, false, 155), "html", null, true);
            echo " of the <a href=\"\">";
            echo twig_get_attribute($this->env, $this->source, ($context["guild"] ?? null), "link", [], "any", false, false, false, 155);
            echo "</a></td>
                            </tr>
                          ";
        }
        // line 158
        echo "
                          ";
        // line 159
        if (($context["marriage_enabled"] ?? null)) {
            // line 160
            echo "                            ";
            $context["rows"] = (($context["rows"] ?? null) + 1);
            // line 161
            echo "                            <tr bgcolor=\"";
            echo twig_escape_filter($this->env, $this->env->getFunction('getStyle')->getCallable()(($context["rows"] ?? null)), "html", null, true);
            echo "\">
                              <td class=\"LabelV175\">Marital status:</td>
                              <td><a href=\"\">";
            // line 163
            echo twig_escape_filter($this->env, ($context["marital_status"] ?? null), "html", null, true);
            echo "</a></td>
                            </tr>
                          ";
        }
        // line 166
        echo "
                          ";
        // line 167
        $context["rows"] = (($context["rows"] ?? null) + 1);
        // line 168
        echo "                          <tr bgcolor=\"";
        echo twig_escape_filter($this->env, $this->env->getFunction('getStyle')->getCallable()(($context["rows"] ?? null)), "html", null, true);
        echo "\">
                            <td class=\"LabelV175\">Last Login:</td>
                            <td>";
        // line 170
        if ((twig_get_attribute($this->env, $this->source, ($context["player"] ?? null), "getLastLogin", [], "method", false, false, false, 170) == 0)) {
            echo "Never logged in.";
        } else {
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["player"] ?? null), "getLastLogin", [], "method", false, false, false, 170), "M d Y, H:i:s"), "html", null, true);
            echo " CEST";
        }
        echo "</td>
                          </tr>

                          ";
        // line 173
        if ( !(null === ($context["comment"] ?? null))) {
            // line 174
            echo "                            ";
            $context["rows"] = (($context["rows"] ?? null) + 1);
            // line 175
            echo "                            <tr bgcolor=\"";
            echo twig_escape_filter($this->env, $this->env->getFunction('getStyle')->getCallable()(($context["rows"] ?? null)), "html", null, true);
            echo "\">
                              <td class=\"LabelV175\">Comment:</td>
                              <td>";
            // line 177
            echo ($context["comment"] ?? null);
            echo "</td>
                            </tr>
                          ";
        }
        // line 180
        echo "
                          ";
        // line 181
        $context["rows"] = (($context["rows"] ?? null) + 1);
        // line 182
        echo "                          <tr bgcolor=\"";
        echo twig_escape_filter($this->env, $this->env->getFunction('getStyle')->getCallable()(($context["rows"] ?? null)), "html", null, true);
        echo "\">
                            <td class=\"LabelV175\">Account Status:</td>
                            <td>
                              ";
        // line 185
        if (($context["vip_enabled"] ?? null)) {
            // line 186
            echo "                                VIP
                                ";
            // line 187
            if (twig_get_attribute($this->env, $this->source, ($context["account"] ?? null), "isPremium", [], "method", false, false, false, 187)) {
                // line 188
                echo "                                  <strong
                                    style=\"color:green\">actived</strong> until ";
                // line 189
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["account"] ?? null), "getExpirePremiumTime", [], "method", false, false, false, 189), "j M Y, H:i"), "html", null, true);
                echo "
                                ";
            } else {
                // line 191
                echo "                                  <strong style=\"color:red\">desactivated</strong>
                                ";
            }
            // line 193
            echo "                              ";
        } else {
            // line 194
            echo "                                ";
            if (twig_get_attribute($this->env, $this->source, ($context["account"] ?? null), "isPremium", [], "method", false, false, false, 194)) {
                // line 195
                echo "                                  <font color=\"green\"><b>Premium Account</b></font>
                                ";
            } else {
                // line 197
                echo "                                  <font color=\"red\">Free Account</font>
                                ";
            }
            // line 199
            echo "                              ";
        }
        // line 200
        echo "                            </td>
                          </tr>

                          </tbody>
                        </table>
                      </div>
                    </td>
                  </tr>
                  </tbody>
                </table>
              </div>
            </td>
          </tr>
          </tbody>
        </table>
      </div>
    </td>
  </tr>
</table>

<br>

<!-- ACCOUNT INFORMATION -->
<div class=\"TableContainer\">
  <div class=\"CaptionContainer\">
    <div class=\"CaptionInnerContainer\">
      <span class=\"CaptionEdgeLeftTop\"
            style=\"background-image:url(";
        // line 227
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/global/content/box-frame-edge.gif);\"></span>
      <span class=\"CaptionEdgeRightTop\"
            style=\"background-image:url(";
        // line 229
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/global/content/box-frame-edge.gif);\"></span>
      <span class=\"CaptionBorderTop\"
            style=\"background-image:url(";
        // line 231
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/global/content/table-headline-border.gif);\"></span>
      <span class=\"CaptionVerticalLeft\"
            style=\"background-image:url(";
        // line 233
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/global/content/box-frame-vertical.gif);\"></span>
      <div class=\"Text\">Account Information</div>
      <span class=\"CaptionVerticalRight\"
            style=\"background-image:url(";
        // line 236
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/global/content/box-frame-vertical.gif);\"></span>
      <span class=\"CaptionBorderBottom\"
            style=\"background-image:url(";
        // line 238
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/global/content/table-headline-border.gif);\"></span>
      <span class=\"CaptionEdgeLeftBottom\"
            style=\"background-image:url(";
        // line 240
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/global/content/box-frame-edge.gif);\"></span>
      <span class=\"CaptionEdgeRightBottom\"
            style=\"background-image:url(";
        // line 242
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/global/content/box-frame-edge.gif);\"></span>
    </div>
  </div>
  <table class=\"Table3\" cellpadding=\"0\" cellspacing=\"0\">
    <tbody>
    <tr>
      <td>
        <div class=\"InnerTableContainer\">
          <table style=\"width:100%;\">
            <tbody>
            <tr>
              <td>
                <div class=\"TableContentContainer\">
                  <table class=\"TableContent\" width=\"100%\" style=\"border:1px solid #faf0d7;\">
                    <tbody>
                    ";
        // line 257
        $context["group"] = twig_get_attribute($this->env, $this->source, ($context["player"] ?? null), "getGroup", [], "method", false, false, false, 257);
        // line 258
        echo "                    ";
        if ((twig_get_attribute($this->env, $this->source, ($context["group"] ?? null), "isLoaded", [], "method", false, false, false, 258) && (twig_get_attribute($this->env, $this->source, ($context["group"] ?? null), "getId", [], "method", false, false, false, 258) != 1))) {
            // line 259
            echo "                      ";
            $context["rows"] = (($context["rows"] ?? null) + 1);
            // line 260
            echo "                      <tr bgcolor=\"";
            echo twig_escape_filter($this->env, $this->env->getFunction('getStyle')->getCallable()(($context["rows"] ?? null)), "html", null, true);
            echo "\">
                        <td class=\"LabelV175\">Position:</td>
                        <td>";
            // line 262
            echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["group"] ?? null), "getName", [], "method", false, false, false, 262)), "html", null, true);
            echo "</td>
                      </tr>
                    ";
        }
        // line 265
        echo "                    ";
        $context["rows"] = (($context["rows"] ?? null) + 1);
        // line 266
        echo "                    <tr bgcolor=\"";
        echo twig_escape_filter($this->env, $this->env->getFunction('getStyle')->getCallable()(($context["rows"] ?? null)), "html", null, true);
        echo "\">
                      <td class=\"LabelV175\">Created:</td>
                      <td>";
        // line 268
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["account"] ?? null), "getCreated", [], "method", false, false, false, 268), "M d Y, g:i:s"), "html", null, true);
        echo " CET
                        ";
        // line 269
        if ((preg_match("/^\\d+\$/", ($context["bannedUntil"] ?? null)) || (($context["bannedUntil"] ?? null) == "-1"))) {
            // line 270
            echo "                          <span
                            style=\"color: red\">[Banished ";
            // line 271
            if ((($context["bannedUntil"] ?? null) == "-1")) {
                echo "forever";
            } else {
                echo "until ";
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, ($context["bannedUntil"] ?? null), "d F Y, h:s"), "html", null, true);
            }
            echo "]</span>
                        ";
        } else {
            // line 273
            echo "                          ";
            echo ($context["bannedUntil"] ?? null);
            echo "
                        ";
        }
        // line 274
        echo "</td>
                    </tr>
                    </tbody>
                  </table>
                </div>
              </td>
            </tr>
            </tbody>
          </table>
        </div>
      </td>
    </tr>
    </tbody>
  </table>
</div>

<br>

<!-- CHARACTER DETAILS -->
<div class=\"TableContainer\">
  <div class=\"CaptionContainer\">
    <div class=\"CaptionInnerContainer\">
      <span class=\"CaptionEdgeLeftTop\"
            style=\"background-image:url(";
        // line 297
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/global/content/box-frame-edge.gif);\"></span>
      <span class=\"CaptionEdgeRightTop\"
            style=\"background-image:url(";
        // line 299
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/global/content/box-frame-edge.gif);\"></span>
      <span class=\"CaptionBorderTop\"
            style=\"background-image:url(";
        // line 301
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/global/content/table-headline-border.gif);\"></span>
      <span class=\"CaptionVerticalLeft\"
            style=\"background-image:url(";
        // line 303
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/global/content/box-frame-vertical.gif);\"></span>
      <div class=\"Text\">Character Details</div>
      <span class=\"CaptionVerticalRight\"
            style=\"background-image:url(";
        // line 306
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/global/content/box-frame-vertical.gif);\"></span>
      <span class=\"CaptionBorderBottom\"
            style=\"background-image:url(";
        // line 308
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/global/content/table-headline-border.gif);\"></span>
      <span class=\"CaptionEdgeLeftBottom\"
            style=\"background-image:url(";
        // line 310
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/global/content/box-frame-edge.gif);\"></span>
      <span class=\"CaptionEdgeRightBottom\"
            style=\"background-image:url(";
        // line 312
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/global/content/box-frame-edge.gif);\"></span>
    </div>
  </div>
  <div style=\"top: 15px;\" id=\"DetailsToggle\" class=\"BigToggleButton\"
         onclick=\"CollapseTable('DetailsCollapseContainer'); \$('#labelshow').html(\$('#labelshow').html() == 'show' ? 'hide' : 'show');\"
         onmouseover=\"ActivateHelperDiv(\$(this), '', 'Click here to expand the list of Character Details.', '');\"
         onmouseout=\"\$('#HelperDivContainer').hide();\">
      <div id=\"Indicator_DetailsCollapseContainer\" class=\"CircleSymbolMinus\"
           style=\"position: absolute; height: 18px; width: 18px; top: -8px; right: -8px; z-index: 99; cursor: pointer; background-image: url(";
        // line 320
        echo twig_escape_filter($this->env, ($context["BASE_URL"] ?? null), "html", null, true);
        echo "templates/tibiacom/images/global/content/circle-symbol-plus.gif);\"></div>
    </div>
\t<div class=\"InnerTableContainer\" id=\"DetailsCollapseContainer\" style=\"display: none;\">
  <table class=\"Table3\" cellpadding=\"0\" cellspacing=\"0\">
    <tbody>
    <tr>
      <td style=\"width: 10rem;\">
        <!-- OUTFIT -->
        ";
        // line 328
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["config"] ?? null), "characters", [], "any", false, false, false, 328), "outfit", [], "any", false, false, false, 328)) {
            // line 329
            echo "          <div class=\"InnerTableContainer\">
            <table style=\"width: 98%;\">
              <tbody>
              <tr>
                <td>
                  <div class=\"TableContentContainer\">
                    <table class=\"TableContent\" width=\"100%\" style=\"border: none;\">
                      <tbody>
                      <tr bgcolor=\"";
            // line 337
            echo twig_escape_filter($this->env, $this->env->getFunction('getStyle')->getCallable()(2), "html", null, true);
            echo "\">
                        <td align=\"center\" style=\"border: none; width: 64px;\">
                          <b>Current outfit:</b>
                        </td>
                        <td style=\"border: none;\">
                          <div style=\"width:64px; height:64px;\">
                            <img
                              style=\"margin-left:";
            // line 344
            if (twig_in_filter(twig_get_attribute($this->env, $this->source, ($context["player"] ?? null), "getLookType", [], "method", false, false, false, 344), [0 => 75, 1 => 266, 2 => 302])) {
                echo "5px;margin-top:0;width:60px;height:60px;";
            } else {
                echo "-18px;margin-top:-28px;width:80px;height:80px;";
            }
            echo "\"
                              src=\"";
            // line 345
            echo twig_escape_filter($this->env, ($context["outfit"] ?? null), "html", null, true);
            echo "\" alt=\"player outfit\"/>
                          </div>
                        </td>
                      </tr>
                      </tbody>
                    </table>
                  </div>
                </td>
              </tr>
              </tbody>
            </table>
          </div>
          <!-- OUTFIT END -->
        ";
        }
        // line 359
        echo "
        ";
        // line 360
        echo twig_escape_filter($this->env, $this->env->getFunction('hook')->getCallable()($context, twig_constant("HOOK_CHARACTERS_AFTER_QUESTS")), "html", null, true);
        echo "

        ";
        // line 362
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["config"] ?? null), "characters", [], "any", false, false, false, 362), "equipment", [], "any", false, false, false, 362)) {
            // line 363
            echo "          <!-- EQUIPMENT -->
<div class=\"InnerTableContainer\">
    <table style=\"border-collapse: collapse; border: none;\">
        <tbody>
            <tr>
                <td style=\"border: none;\">
                    <div class=\"TableContentContainer\">
                        <table class=\"TableContent\" width=\"100%\" style=\"border: none; border-collapse: collapse;\">
                            <tbody>
                                <tr bgcolor=\"";
            // line 372
            echo twig_escape_filter($this->env, $this->env->getFunction('getStyle')->getCallable()(2), "html", null, true);
            echo "\">
                                    <td align=\"center\" style=\"border: none;\">
                                        <b>Inventory:</b>
                                    </td>
                                </tr>
                                <tr bgcolor=\"";
            // line 377
            echo twig_escape_filter($this->env, $this->env->getFunction('getStyle')->getCallable()(2), "html", null, true);
            echo "\">
                                    <td style=\"border: none;\">
                                        <table width=\"100\" align=\"center\" cellspacing=\"0\" cellpadding=\"0\" style=\"border-collapse: collapse; border: none;\">
                                            <tr>
                                                <td style=\"border: none; padding:0px;\">
                                                    <table cellspacing=\"0\" style=\"background: transparent; border-collapse: collapse; border: none;\">
                                                        <tr>
                                                            <td style=\"border: none;\">";
            // line 384
            echo (($__internal_compile_0 = ($context["equipment"] ?? null)) && is_array($__internal_compile_0) || $__internal_compile_0 instanceof ArrayAccess ? ($__internal_compile_0[2] ?? null) : null);
            echo "</td>
                                                        </tr>
                                                        <tr>
                                                            <td style=\"border: none;\">";
            // line 387
            echo (($__internal_compile_1 = ($context["equipment"] ?? null)) && is_array($__internal_compile_1) || $__internal_compile_1 instanceof ArrayAccess ? ($__internal_compile_1[6] ?? null) : null);
            echo "</td>
                                                        </tr>
                                                        <tr>
                                                            <td style=\"border: none;\">";
            // line 390
            echo (($__internal_compile_2 = ($context["equipment"] ?? null)) && is_array($__internal_compile_2) || $__internal_compile_2 instanceof ArrayAccess ? ($__internal_compile_2[9] ?? null) : null);
            echo "</td>
                                                        </tr>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<br>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<br>
                                                        <tr>
                                                            <td style=\"color: #5A2800; text-align: center; font-size: 10px; border: none;\">Soul: ";
            // line 395
            echo twig_escape_filter($this->env, ($context["soul"] ?? null), "html", null, true);
            echo "</td>
                                                        </tr>
                                                    </table>
                                                </td>
                                                <td style=\"border: none;\">
                                                    <table cellspacing=\"0\" style=\"background: transparent; border-collapse: collapse; border: none;\">
                                                        <tr>
                                                            <td style=\"border: none;\">";
            // line 402
            echo (($__internal_compile_3 = ($context["equipment"] ?? null)) && is_array($__internal_compile_3) || $__internal_compile_3 instanceof ArrayAccess ? ($__internal_compile_3[1] ?? null) : null);
            echo "</td>
                                                        </tr>
                                                        <tr>
                                                            <td style=\"border: none;\">";
            // line 405
            echo (($__internal_compile_4 = ($context["equipment"] ?? null)) && is_array($__internal_compile_4) || $__internal_compile_4 instanceof ArrayAccess ? ($__internal_compile_4[4] ?? null) : null);
            echo "</td>
                                                        </tr>
                                                        <tr>
                                                            <td style=\"border: none;\">";
            // line 408
            echo (($__internal_compile_5 = ($context["equipment"] ?? null)) && is_array($__internal_compile_5) || $__internal_compile_5 instanceof ArrayAccess ? ($__internal_compile_5[7] ?? null) : null);
            echo "</td>
                                                        </tr>
                                                        <tr>
                                                            <td style=\"border: none;\">";
            // line 411
            echo (($__internal_compile_6 = ($context["equipment"] ?? null)) && is_array($__internal_compile_6) || $__internal_compile_6 instanceof ArrayAccess ? ($__internal_compile_6[8] ?? null) : null);
            echo "</td>
                                                        </tr>
                                                    </table>
                                                </td>
                                                <td style=\"border: none;\">
                                                    <table cellspacing=\"0\" style=\"background: transparent; border-collapse: collapse; border: none;\">
                                                        <tr>
                                                            <td style=\"border: none;\">";
            // line 418
            echo (($__internal_compile_7 = ($context["equipment"] ?? null)) && is_array($__internal_compile_7) || $__internal_compile_7 instanceof ArrayAccess ? ($__internal_compile_7[3] ?? null) : null);
            echo "</td>
                                                        </tr>
                                                        <tr>
                                                            <td style=\"border: none;\">";
            // line 421
            echo (($__internal_compile_8 = ($context["equipment"] ?? null)) && is_array($__internal_compile_8) || $__internal_compile_8 instanceof ArrayAccess ? ($__internal_compile_8[5] ?? null) : null);
            echo "</td>
                                                        </tr>
                                                        <tr>
                                                            <td style=\"border: none;\">";
            // line 424
            echo (($__internal_compile_9 = ($context["equipment"] ?? null)) && is_array($__internal_compile_9) || $__internal_compile_9 instanceof ArrayAccess ? ($__internal_compile_9[10] ?? null) : null);
            echo "</td>
                                                        </tr>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<br>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<br>
                                                        <tr>
                                                            <td style=\"color: #5A2800; text-align: center; font-size: 10px; border: none;\">Cap: ";
            // line 429
            echo twig_escape_filter($this->env, ($context["cap"] ?? null), "html", null, true);
            echo "</td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</div>
          <!-- EQUIPMENT_END -->
        ";
        }
        // line 447
        echo "
        ";
        // line 448
        echo twig_escape_filter($this->env, $this->env->getFunction('hook')->getCallable()($context, twig_constant("HOOK_CHARACTERS_AFTER_EQUIPMENT")), "html", null, true);
        echo "
      </td>

      <!-- LIFE MANA -->
      <td>
        <div class=\"InnerTableContainer\">
          <table style=\"width:99%;\">
            <tbody>
            <tr>
              <td>
                <div class=\"TableContentContainer\">
                  <table class=\"TableContent\" width=\"85%\" style=\"border:1px solid #faf0d7;\">
                    <tbody>
                    <tr bgcolor=\"";
        // line 461
        echo twig_escape_filter($this->env, $this->env->getFunction('getStyle')->getCallable()(2), "html", null, true);
        echo "\">
                      <td style=\"border:0px; width:15%; text-align: right;\"><b>Health:</b></td>
                      <td style=\"border:0px; text-align: center;\">
                        ";
        // line 464
        echo twig_escape_filter($this->env, ($context["health_current"] ?? null), "html", null, true);
        echo "/";
        echo twig_escape_filter($this->env, ($context["health_max"] ?? null), "html", null, true);
        echo " (";
        echo twig_escape_filter($this->env, ($context["health_percent"] ?? null), "html", null, true);
        echo "%)
                        <div class=\"progress\">
                          <div class=\"progress-bar bg-danger\" role=\"progressbar\" aria-valuenow=\"";
        // line 466
        echo twig_escape_filter($this->env, ($context["health_percent"] ?? null), "html", null, true);
        echo "\"
                               aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width: ";
        // line 467
        echo twig_escape_filter($this->env, ($context["health_percent"] ?? null), "html", null, true);
        echo "%;\"></div>
                        </div>
                      </td>
                    </tr>
                    <tr bgcolor=\"";
        // line 471
        echo twig_escape_filter($this->env, $this->env->getFunction('getStyle')->getCallable()(2), "html", null, true);
        echo "\">
                      <td style=\"border:0px; width:15%; text-align: right;\"><b>Mana:</b></td>
                      <td style=\"border:0px; text-align: center;\">
                        ";
        // line 474
        echo twig_escape_filter($this->env, ($context["mana_current"] ?? null), "html", null, true);
        echo "/";
        echo twig_escape_filter($this->env, ($context["mana_max"] ?? null), "html", null, true);
        echo " (";
        echo twig_escape_filter($this->env, ($context["mana_percent"] ?? null), "html", null, true);
        echo "%)
                        <div class=\"progress\">
                          <div class=\"progress-bar bg-default\" role=\"progressbar\" aria-valuenow=\"";
        // line 476
        echo twig_escape_filter($this->env, ($context["mana_percent"] ?? null), "html", null, true);
        echo "\"
                               aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width: ";
        // line 477
        echo twig_escape_filter($this->env, ($context["mana_percent"] ?? null), "html", null, true);
        echo "%;\"></div>
                        </div>
                      </td>
                    </tr>
                    </tbody>
                  </table>
                </div>
              </td>
            </tr>
            </tbody>
          </table>
        </div>
        <!-- LIFE MANA END -->

        <!-- EXPERIENCE -->
        <div class=\"InnerTableContainer\">
          <table style=\"width:99%;\">
            <tbody>
            <tr>
              <td>
                <div class=\"TableContentContainer\">
                  <table class=\"TableContent\" width=\"85%\" style=\"border:1px solid #faf0d7;\">
                    <tbody>
                    <tr bgcolor=\"";
        // line 500
        echo twig_escape_filter($this->env, $this->env->getFunction('getStyle')->getCallable()(2), "html", null, true);
        echo "\">
                      <td style=\"border:0px; width:15%; text-align: right;\"><b>Experience:</b></td>
                      <td style=\"border:0px; text-align: center;\">
                        Have <b>";
        // line 503
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["player"] ?? null), "getExperience", [], "method", false, false, false, 503), "html", null, true);
        echo "</b> and need <b>";
        echo twig_escape_filter($this->env, ($context["expLeft"] ?? null), "html", null, true);
        echo "</b> to Level
                        <b>";
        // line 504
        echo twig_escape_filter($this->env, (twig_get_attribute($this->env, $this->source, ($context["player"] ?? null), "getLevel", [], "method", false, false, false, 504) + 1), "html", null, true);
        echo "</b>.
                      </td>
                    </tr>
                    <tr bgcolor=\"";
        // line 507
        echo twig_escape_filter($this->env, $this->env->getFunction('getStyle')->getCallable()(2), "html", null, true);
        echo "\">
                      <td style=\"border:0px; width:15%; text-align: right;\"><b>Percent:</b></td>
                      <td style=\"border:0px; text-align: center;\">
                        ";
        // line 510
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["player"] ?? null), "getExperience", [], "method", false, false, false, 510), "html", null, true);
        echo "/";
        echo twig_escape_filter($this->env, ($context["expNext"] ?? null), "html", null, true);
        echo " (";
        echo twig_escape_filter($this->env, ($context["expLeftPercent"] ?? null), "html", null, true);
        echo "%)
                        <div class=\"progress\">
                          <div class=\"progress-bar bg-success\" role=\"progressbar\" aria-valuenow=\"";
        // line 512
        echo twig_escape_filter($this->env, ($context["expLeftPercent"] ?? null), "html", null, true);
        echo "\"
                               aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width:";
        // line 513
        echo twig_escape_filter($this->env, ($context["expLeftPercent"] ?? null), "html", null, true);
        echo "%\"></div>
                        </div>
                      </td>
                    </tr>
                    </tbody>
                  </table>
                </div>
              </td>
            </tr>
            </tbody>
          </table>
        </div>
        <!-- EXPERIENCE END -->

        ";
        // line 527
        echo twig_escape_filter($this->env, $this->env->getFunction('hook')->getCallable()($context, twig_constant("HOOK_CHARACTERS_BEFORE_SKILLS")), "html", null, true);
        echo "

        ";
        // line 529
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["config"] ?? null), "characters", [], "any", false, false, false, 529), "skills", [], "any", false, false, false, 529)) {
            // line 530
            echo "          <!-- SKILLS -->
          <div class=\"InnerTableContainer\">
            <table style=\"width:99%;\">
              <tbody>
              <tr>
                <td>
                  <div class=\"TableContentContainer\">
                    <table class=\"TableContent\" width=\"85%\" style=\"border:1px solid #faf0d7;\">
                      <tbody>
                      <tr bgcolor=\"";
            // line 539
            echo twig_escape_filter($this->env, $this->env->getFunction('getStyle')->getCallable()(2), "html", null, true);
            echo "\" style=\"text-align: center;\">
                        <td style=\"border:0px;\">
                                                     <img style=\"border-radius: 5px; border: 2px solid #592700;\" src=\"images/level.gif\" width=\"30\"/>
                        </td>
                        <td style=\"border:0px;\">
                                                     <img style=\"border-radius: 5px; border: 2px solid #592700;\" src=\"images/ml.gif\" width=\"30\"/>
                        </td>
                        <td style=\"border:0px;\">
                                                     <img style=\"border-radius: 5px; border: 2px solid #592700;\" src=\"images/fist.gif\" width=\"30\"/>
                        </td>
                        <td style=\"border:0px;\">
                                                     <img style=\"border-radius: 5px; border: 2px solid #592700;\" src=\"images/club.gif\" width=\"30\"/>
                        </td>
                        <td style=\"border:0px;\">
                                                     <img style=\"border-radius: 5px; border: 2px solid #592700;\" src=\"images/sword.gif\" width=\"30\"/>
                        </td>
                        <td style=\"border:0px;\">
                                                     <img style=\"border-radius: 5px; border: 2px solid #592700;\" src=\"images/axe.gif\" width=\"30\"/>
                        </td>
                        <td style=\"border:0px;\">
                                                     <img style=\"border-radius: 5px; border: 2px solid #592700;\" src=\"images/dist.gif\" width=\"30\"/>
                        </td>
                        <td style=\"border:0px;\">
                                                     <img style=\"border-radius: 5px; border: 2px solid #592700;\" src=\"images/def.gif\" width=\"30\"/>
                        </td>
                        <td style=\"border:0px;\">
                                                     <img style=\"border-radius: 5px; border: 2px solid #592700;\" src=\"images/fish.gif\" width=\"30\"/>
                        </td>
                      </tr>
                      <tr bgcolor=\"";
            // line 568
            echo twig_escape_filter($this->env, $this->env->getFunction('getStyle')->getCallable()(2), "html", null, true);
            echo "\" style=\"text-align: center;\">
                        <td style=\"border:0px;\"><b>Level</b></td>
                        <td style=\"border:0px;\"><b>ML</b></td>
                        <td style=\"border:0px;\"><b>Fist</b></td>
                        <td style=\"border:0px;\"><b>Club</b></td>
                        <td style=\"border:0px;\"><b>Sword</b></td>
                        <td style=\"border:0px;\"><b>Axe</b></td>
                        <td style=\"border:0px;\"><b>Dist</b></td>
                        <td style=\"border:0px;\"><b>Def</b></td>
                        <td style=\"border:0px;\"><b>Fish</b></td>
                      </tr>
                      <tr bgcolor=\"";
            // line 579
            echo twig_escape_filter($this->env, $this->env->getFunction('getStyle')->getCallable()(2), "html", null, true);
            echo "\" style=\"text-align: center;\">
                        <td style=\"border:0px;\">";
            // line 580
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["player"] ?? null), "getLevel", [], "method", false, false, false, 580), "html", null, true);
            echo "</td>
                        ";
            // line 581
            $context["i"] = 0;
            // line 582
            echo "                        ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["skills"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["skill"]) {
                // line 583
                echo "                          ";
                $context["i"] = (($context["i"] ?? null) + 1);
                // line 584
                echo "                          <td style=\"border:0px;\">";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["skill"], "value", [], "any", false, false, false, 584), "html", null, true);
                echo "</td>
                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['skill'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 586
            echo "                      </tr>
                      </tbody>
                    </table>
                  </div>
                </td>
              </tr>
              </tbody>
            </table>
          </div>
          <!-- SKILLS END -->
        ";
        }
        // line 597
        echo "
        ";
        // line 598
        echo twig_escape_filter($this->env, $this->env->getFunction('hook')->getCallable()($context, twig_constant("HOOK_CHARACTERS_AFTER_SKILLS")), "html", null, true);
        echo "
      </td>
    </tr>
    </tbody>
  </table>
  </div>
</div>

<br>

<div class=\"TableContainer\">
  <div class=\"CaptionContainer\">
    <div class=\"CaptionInnerContainer\">
      <span class=\"CaptionEdgeLeftTop\"
            style=\"background-image:url(";
        // line 612
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/global/content/box-frame-edge.gif);\"></span>
      <span class=\"CaptionEdgeRightTop\"
            style=\"background-image:url(";
        // line 614
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/global/content/box-frame-edge.gif);\"></span>
      <span class=\"CaptionBorderTop\"
            style=\"background-image:url(";
        // line 616
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/global/content/table-headline-border.gif);\"></span>
      <span class=\"CaptionVerticalLeft\"
            style=\"background-image:url(";
        // line 618
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/global/content/box-frame-vertical.gif);\"></span>
      <div class=\"Text\">Character Quests</div>
      <span class=\"CaptionVerticalRight\"
            style=\"background-image:url(";
        // line 621
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/global/content/box-frame-vertical.gif);\"></span>
      <span class=\"CaptionBorderBottom\"
            style=\"background-image:url(";
        // line 623
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/global/content/table-headline-border.gif);\"></span>
      <span class=\"CaptionEdgeLeftBottom\"
            style=\"background-image:url(";
        // line 625
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/global/content/box-frame-edge.gif);\"></span>
      <span class=\"CaptionEdgeRightBottom\"
            style=\"background-image:url(";
        // line 627
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/global/content/box-frame-edge.gif);\"></span>
    </div>
  </div>
  <div style=\"top: 15px;\" id=\"QuestsCollapse\" class=\"BigToggleButton\"
       onclick=\"CollapseTable('QuestsCollapseContainer'); \$('#labelshow').html(\$('#labelshow').html() == 'show' ? 'hide' : 'show');\"
       onmouseover=\"ActivateHelperDiv(\$(this), '', 'Click here to expand the list of Quests.', '');\"
       onmouseout=\"\$('#HelperDivContainer').hide();\">
    <div id=\"Indicator_QuestsCollapseContainer\" class=\"CircleSymbolMinus\"
         style=\"position: absolute; height: 18px; width: 18px; top: -8px; right: -8px; z-index: 99; cursor: pointer; background-image: url(";
        // line 635
        echo twig_escape_filter($this->env, ($context["BASE_URL"] ?? null), "html", null, true);
        echo "templates/tibiacom/images/global/content/circle-symbol-plus.gif);\"></div>
  </div>
  <table class=\"Table3\" cellpadding=\"0\" cellspacing=\"0\">
    <tbody>
    <tr>
      <td>
        <div class=\"InnerTableContainer\" id=\"QuestsCollapseContainer\" style=\"display: none\">
          <table style=\"width:100%;\">
            <tbody>
            <tr>
              <td>
                <div class=\"TableContentContainer\">
                  <table class=\"TableContent\" width=\"100%\" style=\"border:1px solid #faf0d7;\">
                    <tbody>
                    ";
        // line 649
        $context["i"] = 0;
        // line 650
        echo "                    ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["quests"] ?? null));
        foreach ($context['_seq'] as $context["name"] => $context["done"]) {
            // line 651
            echo "                      ";
            $context["i"] = (($context["i"] ?? null) + 1);
            // line 652
            echo "                      ";
            $context["rows"] = (($context["rows"] ?? null) + 1);
            // line 653
            echo "                      <tr bgcolor=\"";
            echo twig_escape_filter($this->env, $this->env->getFunction('getStyle')->getCallable()(($context["rows"] ?? null)), "html", null, true);
            echo "\">
                        <td style=\"width: 90%;\" class=\"LabelV175\">";
            // line 654
            echo twig_escape_filter($this->env, $context["name"], "html", null, true);
            echo "</td>
                        <td><img
                            src=\"templates/tibiacom/images/premiumfeatures/icon_";
            // line 656
            if ($context["done"]) {
                echo "yes";
            } else {
                echo "no";
            }
            echo ".png\"
                            title=\"";
            // line 657
            if ($context["done"]) {
                echo "Completed";
            } else {
                echo "Incomplete";
            }
            echo "\"></td>
                      </tr>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['name'], $context['done'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 660
        echo "                    </tbody>
                  </table>
                </div>
              </td>
            </tr>
            </tbody>
          </table>
        </div>
      </td>
    </tr>
    </tbody>
  </table>
</div>
<br>
<div class=\"TableContainer\">
  <div class=\"CaptionContainer\">
    <div class=\"CaptionInnerContainer\">
      <span class=\"CaptionEdgeLeftTop\"
            style=\"background-image:url(";
        // line 678
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/global/content/box-frame-edge.gif);\"></span>
      <span class=\"CaptionEdgeRightTop\"
            style=\"background-image:url(";
        // line 680
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/global/content/box-frame-edge.gif);\"></span>
      <span class=\"CaptionBorderTop\"
            style=\"background-image:url(";
        // line 682
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/global/content/table-headline-border.gif);\"></span>
      <span class=\"CaptionVerticalLeft\"
            style=\"background-image:url(";
        // line 684
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/global/content/box-frame-vertical.gif);\"></span>
      <div class=\"Text\">Account Achievements</div>
      <span class=\"CaptionVerticalRight\"
            style=\"background-image:url(";
        // line 687
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/global/content/box-frame-vertical.gif);\"></span>
      <span class=\"CaptionBorderBottom\"
            style=\"background-image:url(";
        // line 689
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/global/content/table-headline-border.gif);\"></span>
      <span class=\"CaptionEdgeLeftBottom\"
            style=\"background-image:url(";
        // line 691
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/global/content/box-frame-edge.gif);\"></span>
      <span class=\"CaptionEdgeRightBottom\"
            style=\"background-image:url(";
        // line 693
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/global/content/box-frame-edge.gif);\"></span>
    </div>
  </div>
  <div style=\"top: 15px;\" id=\"AchievementsCollapse\" class=\"BigToggleButton\"
       onclick=\"CollapseTable('AchievementsCollapseContainer'); \$('#labelshow').html(\$('#labelshow').html() == 'show' ? 'hide' : 'show');\"
       onmouseover=\"ActivateHelperDiv(\$(this), '', 'Click here to expand the Achievements list.', '');\"
       onmouseout=\"\$('#HelperDivContainer').hide();\">
    <div id=\"Indicator_AchievementsCollapseContainer\" class=\"CircleSymbolMinus\"
         style=\"position: absolute; height: 18px; width: 18px; top: -8px; right: -8px; z-index: 99; cursor: pointer; background-image: url(";
        // line 701
        echo twig_escape_filter($this->env, ($context["BASE_URL"] ?? null), "html", null, true);
        echo "templates/tibiacom/images/global/content/circle-symbol-plus.gif);\"></div>
  </div>
  <table class=\"Table3\" cellpadding=\"0\" cellspacing=\"0\">
    <tbody>
    <tr>
      <td>
        <div class=\"InnerTableContainer\" id=\"AchievementsCollapseContainer\" style=\"display: none\">
          <table style=\"width:100%;\">
            <tbody>
            <tr>
              <td>
                <div class=\"TableContentContainer\">
                  <table class=\"TableContent\" width=\"100%\" style=\"border:1px solid #faf0d7;\">
                    <tbody>
                    ";
        // line 715
        $context["i"] = 0;
        // line 716
        echo "                    ";
        if ((($context["achievementPoints"] ?? null) > 0)) {
            // line 717
            echo "                      ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["achievements"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["achievement"]) {
                // line 718
                echo "                        ";
                $context["i"] = (($context["i"] ?? null) + 1);
                // line 719
                echo "                        ";
                $context["rows"] = (($context["rows"] ?? null) + 1);
                // line 720
                echo "                        <tr bgcolor=\"";
                echo twig_escape_filter($this->env, $this->env->getFunction('getStyle')->getCallable()(($context["rows"] ?? null)), "html", null, true);
                echo "\">
                          ";
                // line 721
                if ((twig_get_attribute($this->env, $this->source, $context["achievement"], "grade", [], "any", false, false, false, 721) == 1)) {
                    // line 722
                    echo "                            <td><img src=\"";
                    echo twig_escape_filter($this->env, ($context["BASE_URL"] ?? null), "html", null, true);
                    echo "images/global/general/achievement-grade-symbol.gif\"
                                     alt=\"Tibia Achievement\"></td>
                          ";
                }
                // line 725
                echo "                          ";
                if ((twig_get_attribute($this->env, $this->source, $context["achievement"], "grade", [], "any", false, false, false, 725) == 2)) {
                    // line 726
                    echo "                            <td><img src=\"";
                    echo twig_escape_filter($this->env, ($context["BASE_URL"] ?? null), "html", null, true);
                    echo "images/global/general/achievement-grade-symbol.gif\"
                                     alt=\"Tibia Achievement\"><img
                                src=\"";
                    // line 728
                    echo twig_escape_filter($this->env, ($context["BASE_URL"] ?? null), "html", null, true);
                    echo "images/global/general/achievement-grade-symbol.gif\"
                                alt=\"Tibia Achievement\"></td>
                          ";
                }
                // line 731
                echo "                          ";
                if ((twig_get_attribute($this->env, $this->source, $context["achievement"], "grade", [], "any", false, false, false, 731) == 3)) {
                    // line 732
                    echo "                            <td><img src=\"";
                    echo twig_escape_filter($this->env, ($context["BASE_URL"] ?? null), "html", null, true);
                    echo "images/global/general/achievement-grade-symbol.gif\"
                                     alt=\"Tibia Achievement\"><img
                                src=\"";
                    // line 734
                    echo twig_escape_filter($this->env, ($context["BASE_URL"] ?? null), "html", null, true);
                    echo "images/global/general/achievement-grade-symbol.gif\"
                                alt=\"Tibia Achievement\"><img
                                src=\"";
                    // line 736
                    echo twig_escape_filter($this->env, ($context["BASE_URL"] ?? null), "html", null, true);
                    echo "images/global/general/achievement-grade-symbol.gif\"
                                alt=\"Tibia Achievement\"></td>
                          ";
                }
                // line 739
                echo "                          ";
                if ((twig_get_attribute($this->env, $this->source, $context["achievement"], "grade", [], "any", false, false, false, 739) == 4)) {
                    // line 740
                    echo "                            <td><img src=\"";
                    echo twig_escape_filter($this->env, ($context["BASE_URL"] ?? null), "html", null, true);
                    echo "images/global/general/achievement-grade-symbol.gif\"
                                     alt=\"Tibia Achievement\"><img
                                src=\"";
                    // line 742
                    echo twig_escape_filter($this->env, ($context["BASE_URL"] ?? null), "html", null, true);
                    echo "images/global/general/achievement-grade-symbol.gif\"
                                alt=\"Tibia Achievement\"><img
                                src=\"";
                    // line 744
                    echo twig_escape_filter($this->env, ($context["BASE_URL"] ?? null), "html", null, true);
                    echo "images/global/general/achievement-grade-symbol.gif\"
                                alt=\"Tibia Achievement\"><img
                                src=\"";
                    // line 746
                    echo twig_escape_filter($this->env, ($context["BASE_URL"] ?? null), "html", null, true);
                    echo "images/global/general/achievement-grade-symbol.gif\"
                                alt=\"Tibia Achievement\"></td>
                          ";
                }
                // line 749
                echo "                          <td style=\"width: 75%;\">
                            ";
                // line 750
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["achievement"], "name", [], "any", false, false, false, 750), "html", null, true);
                echo "
                            ";
                // line 751
                if ((twig_get_attribute($this->env, $this->source, $context["achievement"], "secret", [], "any", false, false, false, 751) == 1)) {
                    // line 752
                    echo "                              <img class=\"SecretAchievementIcon\"
                                   src=\"";
                    // line 753
                    echo twig_escape_filter($this->env, ($context["BASE_URL"] ?? null), "html", null, true);
                    echo "images/global/general/achievement-secret-symbol.gif\"
                                   alt=\"Tibia Secret Achievement\">
                            ";
                }
                // line 756
                echo "                          </td>
                        </tr>
                      ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['achievement'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 759
            echo "                    ";
        } else {
            // line 760
            echo "                      <tr bgcolor=\"";
            echo twig_escape_filter($this->env, $this->env->getFunction('getStyle')->getCallable()(($context["rows"] ?? null)), "html", null, true);
            echo "\">
                        <td style=\"text-align: center;\">This character has no achievement.</td>
                      </tr>
                    ";
        }
        // line 764
        echo "                    </tbody>
                  </table>
                </div>
              </td>
            </tr>
            </tbody>
          </table>
        </div>
      </td>
    </tr>
    </tbody>
  </table>
</div>
<br>

";
        // line 779
        echo twig_escape_filter($this->env, $this->env->getFunction('hook')->getCallable()($context, twig_constant("HOOK_CHARACTERS_BEFORE_DEATHS")), "html", null, true);
        echo "

";
        // line 781
        if ((twig_length_filter($this->env, ($context["deaths"] ?? null)) > 0)) {
            // line 782
            echo "  <!-- DEATHS -->
  <div class=\"TableContainer\">
    <div class=\"CaptionContainer\">
      <div class=\"CaptionInnerContainer\">
        <span class=\"CaptionEdgeLeftTop\"
              style=\"background-image:url(";
            // line 787
            echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
            echo "/images/global/content/box-frame-edge.gif);\"></span>
        <span class=\"CaptionEdgeRightTop\"
              style=\"background-image:url(";
            // line 789
            echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
            echo "/images/global/content/box-frame-edge.gif);\"></span>
        <span class=\"CaptionBorderTop\"
              style=\"background-image:url(";
            // line 791
            echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
            echo "/images/global/content/table-headline-border.gif);\"></span>
        <span class=\"CaptionVerticalLeft\"
              style=\"background-image:url(";
            // line 793
            echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
            echo "/images/global/content/box-frame-vertical.gif);\"></span>
        <div class=\"Text\">Character Deaths</div>
        <span class=\"CaptionVerticalRight\"
              style=\"background-image:url(";
            // line 796
            echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
            echo "/images/global/content/box-frame-vertical.gif);\"></span>
        <span class=\"CaptionBorderBottom\"
              style=\"background-image:url(";
            // line 798
            echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
            echo "/images/global/content/table-headline-border.gif);\"></span>
        <span class=\"CaptionEdgeLeftBottom\"
              style=\"background-image:url(";
            // line 800
            echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
            echo "/images/global/content/box-frame-edge.gif);\"></span>
        <span class=\"CaptionEdgeRightBottom\"
              style=\"background-image:url(";
            // line 802
            echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
            echo "/images/global/content/box-frame-edge.gif);\"></span>
      </div>
    </div>
    <div style=\"top: 15px;\" id=\"DeathsCollapse\" class=\"BigToggleButton\"
         onclick=\"CollapseTable('DeathsCollapseContainer'); \$('#labelshow').html(\$('#labelshow').html() == 'show' ? 'hide' : 'show');\"
         onmouseover=\"ActivateHelperDiv(\$(this), '', 'Click here to expand the list of Deaths.', '');\"
         onmouseout=\"\$('#HelperDivContainer').hide();\">
      <div id=\"Indicator_DeathsCollapseContainer\" class=\"CircleSymbolMinus\"
           style=\"position: absolute; height: 18px; width: 18px; top: -8px; right: -8px; z-index: 99; cursor: pointer; background-image: url(";
            // line 810
            echo twig_escape_filter($this->env, ($context["BASE_URL"] ?? null), "html", null, true);
            echo "templates/tibiacom/images/global/content/circle-symbol-plus.gif);\"></div>
    </div>
    <table class=\"Table3\" cellpadding=\"0\" cellspacing=\"0\">
      <tbody>
      <tr>
        <td>
          <div class=\"InnerTableContainer\" id=\"DeathsCollapseContainer\" style=\"display: none\">
            <table style=\"width:100%;\">
              <tbody>
              <tr>
                <td>
                  <div class=\"TableContentContainer\">
                    <table class=\"TableContent\" width=\"100%\" style=\"border:1px solid #faf0d7;\">
                      <tbody>
                      ";
            // line 824
            $context["i"] = 0;
            // line 825
            echo "                      ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["deaths"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["death"]) {
                // line 826
                echo "                        ";
                $context["i"] = (($context["i"] ?? null) + 1);
                // line 827
                echo "                        ";
                $context["rows"] = (($context["rows"] ?? null) + 1);
                // line 828
                echo "                        <tr bgcolor=\"";
                echo twig_escape_filter($this->env, $this->env->getFunction('getStyle')->getCallable()(($context["rows"] ?? null)), "html", null, true);
                echo "\">
                          <td>";
                // line 829
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["death"], "time", [], "any", false, false, false, 829), "j M Y, H:i"), "html", null, true);
                echo "</td>
                          <td>";
                // line 830
                echo twig_get_attribute($this->env, $this->source, $context["death"], "description", [], "any", false, false, false, 830);
                echo "</td>
                        </tr>
                      ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['death'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 833
            echo "                      </tbody>
                    </table>
                  </div>
                </td>
              </tr>
              </tbody>
            </table>
          </div>
        </td>
      </tr>
      </tbody>
    </table>
  </div>
  <br>
  <!-- DEATHS_END -->
";
        }
        // line 849
        echo "
";
        // line 850
        if ((twig_length_filter($this->env, ($context["frags"] ?? null)) > 0)) {
            // line 851
            echo "  <!-- FRAGS -->
  <div class=\"TableContainer\">
    <div class=\"CaptionContainer\">
      <div class=\"CaptionInnerContainer\">
        <span class=\"CaptionEdgeLeftTop\"
              style=\"background-image:url(";
            // line 856
            echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
            echo "/images/global/content/box-frame-edge.gif);\"></span>
        <span class=\"CaptionEdgeRightTop\"
              style=\"background-image:url(";
            // line 858
            echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
            echo "/images/global/content/box-frame-edge.gif);\"></span>
        <span class=\"CaptionBorderTop\"
              style=\"background-image:url(";
            // line 860
            echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
            echo "/images/global/content/table-headline-border.gif);\"></span>
        <span class=\"CaptionVerticalLeft\"
              style=\"background-image:url(";
            // line 862
            echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
            echo "/images/global/content/box-frame-vertical.gif);\"></span>
        <div class=\"Text\">Character Frags</div>
        <span class=\"CaptionVerticalRight\"
              style=\"background-image:url(";
            // line 865
            echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
            echo "/images/global/content/box-frame-vertical.gif);\"></span>
        <span class=\"CaptionBorderBottom\"
              style=\"background-image:url(";
            // line 867
            echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
            echo "/images/global/content/table-headline-border.gif);\"></span>
        <span class=\"CaptionEdgeLeftBottom\"
              style=\"background-image:url(";
            // line 869
            echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
            echo "/images/global/content/box-frame-edge.gif);\"></span>
        <span class=\"CaptionEdgeRightBottom\"
              style=\"background-image:url(";
            // line 871
            echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
            echo "/images/global/content/box-frame-edge.gif);\"></span>
      </div>
    </div>
    <div style=\"top: 15px;\" id=\"FragsCollapse\" class=\"BigToggleButton\"
         onclick=\"CollapseTable('FragsCollapseContainer'); \$('#labelshow').html(\$('#labelshow').html() == 'show' ? 'hide' : 'show');\"
         onmouseover=\"ActivateHelperDiv(\$(this), '', 'Click here to expand the list of Frags.', '');\"
         onmouseout=\"\$('#HelperDivContainer').hide();\">
      <div id=\"Indicator_FragsCollapseContainer\" class=\"CircleSymbolMinus\"
           style=\"position: absolute; height: 18px; width: 18px; top: -8px; right: -8px; z-index: 99; cursor: pointer; background-image: url(";
            // line 879
            echo twig_escape_filter($this->env, ($context["BASE_URL"] ?? null), "html", null, true);
            echo "templates/tibiacom/images/global/content/circle-symbol-plus.gif);\"></div>
    </div>
    <table class=\"Table3\" cellpadding=\"0\" cellspacing=\"0\">
      <tbody>
      <tr>
        <td>
          <div class=\"InnerTableContainer\" id=\"FragsCollapseContainer\" style=\"display: none\">
            <table style=\"width:100%;\">
              <tbody>
              <tr>
                <td>
                  <div class=\"TableContentContainer\">
                    <table class=\"TableContent\" width=\"100%\" style=\"border:1px solid #faf0d7;\">
                      <tbody>
                      ";
            // line 893
            $context["i"] = 0;
            // line 894
            echo "                      ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["frags"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["frag"]) {
                // line 895
                echo "                        ";
                $context["i"] = (($context["i"] ?? null) + 1);
                // line 896
                echo "                        <tr bgcolor=\"";
                echo twig_escape_filter($this->env, $this->env->getFunction('getStyle')->getCallable()(($context["i"] ?? null)), "html", null, true);
                echo "\">
                          <td width=\"20%\" align=\"center\">";
                // line 897
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["frag"], "time", [], "any", false, false, false, 897), "j M Y, H:i"), "html", null, true);
                echo "</td>
                          <td>
                            Player: <a href=\"";
                // line 899
                echo twig_escape_filter($this->env, $this->env->getFunction('getPlayerLink')->getCallable()(twig_get_attribute($this->env, $this->source, $context["frag"], "player_name", [], "any", false, false, false, 899), false), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["frag"], "player_name", [], "any", false, false, false, 899), "html", null, true);
                echo "</a><br>
                            Killed by: <a href=\"";
                // line 900
                echo twig_escape_filter($this->env, $this->env->getFunction('getPlayerLink')->getCallable()(twig_get_attribute($this->env, $this->source, $context["frag"], "killer_name", [], "any", false, false, false, 900), false), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["frag"], "killer_name", [], "any", false, false, false, 900), "html", null, true);
                echo "</a><br>
                            Level: ";
                // line 901
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["frag"], "killer_level", [], "any", false, false, false, 901), "html", null, true);
                echo "<br>
                            ";
                // line 902
                if (twig_get_attribute($this->env, $this->source, $context["frag"], "unjustified", [], "any", false, false, false, 902)) {
                    // line 903
                    echo "                              <span style=\"color: red; font-size: 10px\">Unjustified</span>
                            ";
                } else {
                    // line 905
                    echo "                              <span style=\"color: green; font-size: 10px\">Justified</span>
                            ";
                }
                // line 907
                echo "                          </td>
                        </tr>
                      ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['frag'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 910
            echo "                      </tbody>
                    </table>
                  </div>
                </td>
              </tr>
              </tbody>
            </table>
          </div>
        </td>
      </tr>
      </tbody>
    </table>
  </div>
  <br>
  <!-- FRAGS_END -->
";
        }
        // line 926
        echo "
";
        // line 927
        echo twig_escape_filter($this->env, $this->env->getFunction('hook')->getCallable()($context, twig_constant("HOOK_CHARACTERS_BEFORE_SIGNATURE")), "html", null, true);
        echo "
";
        // line 928
        if (twig_get_attribute($this->env, $this->source, ($context["config"] ?? null), "signature_enabled", [], "any", false, false, false, 928)) {
            // line 929
            echo "  <!-- SIGNATURE -->
  <div class=\"TableContainer\">
    <div class=\"CaptionContainer\">
      <div class=\"CaptionInnerContainer\">
        <span class=\"CaptionEdgeLeftTop\"
              style=\"background-image:url(";
            // line 934
            echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
            echo "/images/global/content/box-frame-edge.gif);\"></span>
        <span class=\"CaptionEdgeRightTop\"
              style=\"background-image:url(";
            // line 936
            echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
            echo "/images/global/content/box-frame-edge.gif);\"></span>
        <span class=\"CaptionBorderTop\"
              style=\"background-image:url(";
            // line 938
            echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
            echo "/images/global/content/table-headline-border.gif);\"></span>
        <span class=\"CaptionVerticalLeft\"
              style=\"background-image:url(";
            // line 940
            echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
            echo "/images/global/content/box-frame-vertical.gif);\"></span>
        <div class=\"Text\">Character Signature</div>
        <span class=\"CaptionVerticalRight\"
              style=\"background-image:url(";
            // line 943
            echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
            echo "/images/global/content/box-frame-vertical.gif);\"></span>
        <span class=\"CaptionBorderBottom\"
              style=\"background-image:url(";
            // line 945
            echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
            echo "/images/global/content/table-headline-border.gif);\"></span>
        <span class=\"CaptionEdgeLeftBottom\"
              style=\"background-image:url(";
            // line 947
            echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
            echo "/images/global/content/box-frame-edge.gif);\"></span>
        <span class=\"CaptionEdgeRightBottom\"
              style=\"background-image:url(";
            // line 949
            echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
            echo "/images/global/content/box-frame-edge.gif);\"></span>
      </div>
    </div>
    <div style=\"top: 15px;\" id=\"FragsCollapse\" class=\"BigToggleButton\"
         onclick=\"CollapseTable('FragsCollapseContainer'); \$('#labelshow').html(\$('#labelshow').html() == 'show' ? 'hide' : 'show');\"
         onmouseover=\"ActivateHelperDiv(\$(this), '', 'Click here to view the Signature.', '');\"
         onmouseout=\"\$('#HelperDivContainer').hide();\">
      <div id=\"Indicator_FragsCollapseContainer\" class=\"CircleSymbolMinus\"
           style=\"position: absolute; height: 18px; width: 18px; top: -8px; right: -8px; z-index: 99; cursor: pointer; background-image: url(";
            // line 957
            echo twig_escape_filter($this->env, ($context["BASE_URL"] ?? null), "html", null, true);
            echo "templates/tibiacom/images/global/content/circle-symbol-plus.gif);\"></div>
    </div>
    <table class=\"Table5\" cellpadding=\"0\" cellspacing=\"0\">
      <tbody>
      <tr>
        <td>
          <div class=\"InnerTableContainer\" id=\"FragsCollapseContainer\" style=\"display: none\">
            <table style=\"width:100%;\">
              <tbody>
              <tr>
                <td>
                  <div class=\"TableContentContainer\">
                    <table class=\"TableContent\" width=\"100%\" style=\"border:1px solid #faf0d7;\">
                      <tbody>
                      <tr>
                        <td align=\"center\">
                          <script type=\"text/javascript\">
                            function copyData(containerid) {
                              var range = document.createRange();

                              range.selectNode(containerid);
                              window.getSelection().removeAllRanges();
                              window.getSelection().addRange(range);
                              document.execCommand(\"copy\");
                              window.getSelection().removeAllRanges();
                            }
                          </script>
                          <img src=\"";
            // line 984
            echo twig_escape_filter($this->env, ($context["signature_url"] ?? null), "html", null, true);
            echo "\" alt=\"Signature for player ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["player"] ?? null), "getName", [], "method", false, false, false, 984), "html", null, true);
            echo "\">
                        </td>
                        <td>
                          <table class=\"TableContent\" width=\"100%\">
                            <tr>
                              <td class=\"LabelV80\">Website:</td>
                              <td><input type=\"text\" id=\"inputSignatureWebsite\" class=\"input_clipboard\"
                                         value=\"<a href=&quot;";
            // line 991
            echo twig_escape_filter($this->env, ($context["player_link"] ?? null), "html", null, true);
            echo "&quot;><img src=&quot;";
            echo twig_escape_filter($this->env, ($context["signature_url"] ?? null), "html", null, true);
            echo "&quot;></a>\"
                                         style=\"width: 100%;\" onclick=\"this.select()\"></td>
                              <td>
                                <button onclick=\"copyData(inputSignatureWebsite)\" class=\"btn_clipboard\">Copy</button>
                              </td>
                            </tr>
                            <tr>
                              <td class=\"LabelV80\">Forum:</td>
                              <td><input type=\"text\" id=\"inputSignatureForum\" class=\"input_clipboard\"
                                         value=\"[URL=";
            // line 1000
            echo twig_escape_filter($this->env, ($context["player_link"] ?? null), "html", null, true);
            echo "][IMG]";
            echo twig_escape_filter($this->env, ($context["signature_url"] ?? null), "html", null, true);
            echo "[/IMG][/URL]\"
                                         style=\"width: 100%;\"></td>
                              <td>
                                <button onclick=\"copyData(inputSignatureForum)\" class=\"btn_clipboard\">Copy</button>
                              </td>
                            </tr>
                            <tr>
                              <td class=\"LabelV80\">Direct link:</td>
                              <td><input type=\"text\" id=\"inputSignatureDirectLink\" class=\"input_clipboard\"
                                         value=\"";
            // line 1009
            echo twig_escape_filter($this->env, ($context["signature_url"] ?? null), "html", null, true);
            echo "\" style=\"width: 100%;\"></td>
                              <td>
                                <button onclick=\"copyData(inputSignatureDirectLink)\" class=\"btn_clipboard\">Copy</button>
                              </td>
                            </tr>
                          </table>
                        </td>
                      </tr>
                      </tbody>
                    </table>
                  </div>
                </td>
              </tr>
              </tbody>
            </table>
          </div>
        </td>
      </tr>
      </tbody>
    </table>
  </div>
  <br>
  <!-- SIGNATURE_END -->
";
        }
        // line 1033
        echo twig_escape_filter($this->env, $this->env->getFunction('hook')->getCallable()($context, twig_constant("HOOK_CHARACTERS_AFTER_SIGNATURE")), "html", null, true);
        echo "


<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">
  <tr>
    <td>
      ";
        // line 1039
        if ( !($context["hidden"] ?? null)) {
            // line 1040
            echo "        ";
            $context["rows"] = 0;
            // line 1041
            echo "        <div class=\"TableContainer\">
          <div class=\"CaptionContainer\">
            <div class=\"CaptionInnerContainer\">
              <span class=\"CaptionEdgeLeftTop\"
                    style=\"background-image:url(";
            // line 1045
            echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
            echo "/images/global/content/box-frame-edge.gif);\"></span>
              <span class=\"CaptionEdgeRightTop\"
                    style=\"background-image:url(";
            // line 1047
            echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
            echo "/images/global/content/box-frame-edge.gif);\"></span>
              <span class=\"CaptionBorderTop\"
                    style=\"background-image:url(";
            // line 1049
            echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
            echo "/images/global/content/table-headline-border.gif);\"></span>
              <span class=\"CaptionVerticalLeft\"
                    style=\"background-image:url(";
            // line 1051
            echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
            echo "/images/global/content/box-frame-vertical.gif);\"></span>
              <div class=\"Text\">Characters</div>
              <span class=\"CaptionVerticalRight\"
                    style=\"background-image:url(";
            // line 1054
            echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
            echo "/images/global/content/box-frame-vertical.gif);\"></span>
              <span class=\"CaptionBorderBottom\"
                    style=\"background-image:url(";
            // line 1056
            echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
            echo "/images/global/content/table-headline-border.gif);\"></span>
              <span class=\"CaptionEdgeLeftBottom\"
                    style=\"background-image:url(";
            // line 1058
            echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
            echo "/images/global/content/box-frame-edge.gif);\"></span>
              <span class=\"CaptionEdgeRightBottom\"
                    style=\"background-image:url(";
            // line 1060
            echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
            echo "/images/global/content/box-frame-edge.gif);\"></span>
            </div>
          </div>
          <table class=\"Table3\" cellpadding=\"0\" cellspacing=\"0\">
            <tbody>
            <tr>
              <td>
                <div class=\"InnerTableContainer\">
                  <table style=\"width:100%;\">
                    <tbody>
                    <tr>
                      <td>
                        <div class=\"TableContentContainer\">
                          <table class=\"TableContent\" width=\"100%\">
                            <tbody>
                            <tr bgcolor=\"";
            // line 1075
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["config"] ?? null), "darkborder", [], "any", false, false, false, 1075), "html", null, true);
            echo "\">
                              <td width=\"40%\"><B>Name</b></td>
                              <td width=\"15%\"><B>Level</b></td>
                              <td width=\"20%\"><B>Vocation</b></td>
                              <td width=\"25%\"><b>Status</b></td>
                              <td><b>&#160;</b></td>
                            </tr>
                            ";
            // line 1082
            $context["i"] = 0;
            // line 1083
            echo "                            ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["account_players"] ?? null));
            $context['loop'] = [
              'parent' => $context['_parent'],
              'index0' => 0,
              'index'  => 1,
              'first'  => true,
            ];
            if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
                $length = count($context['_seq']);
                $context['loop']['revindex0'] = $length - 1;
                $context['loop']['revindex'] = $length;
                $context['loop']['length'] = $length;
                $context['loop']['last'] = 1 === $length;
            }
            foreach ($context['_seq'] as $context["_key"] => $context["player"]) {
                // line 1084
                echo "                              ";
                if (( !twig_get_attribute($this->env, $this->source, $context["player"], "isHidden", [], "method", false, false, false, 1084) && ((($__internal_compile_10 = $this->env->getFunction('config')->getCallable()("characters")) && is_array($__internal_compile_10) || $__internal_compile_10 instanceof ArrayAccess ? ($__internal_compile_10["deleted"] ?? null) : null) ||  !twig_get_attribute($this->env, $this->source, $context["player"], "isDeleted", [], "method", false, false, false, 1084)))) {
                    // line 1085
                    echo "                                ";
                    $context["i"] = (($context["i"] ?? null) + 1);
                    // line 1086
                    echo "                                <tr bgcolor=\"";
                    echo twig_escape_filter($this->env, $this->env->getFunction('getStyle')->getCallable()(($context["i"] ?? null)), "html", null, true);
                    echo "\">
                                  <td>
                                    <nobr>";
                    // line 1088
                    echo twig_escape_filter($this->env, ($context["i"] ?? null), "html", null, true);
                    echo ".&#160;";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["player"], "getName", [], "method", false, false, false, 1088), "html", null, true);
                    if (twig_get_attribute($this->env, $this->source, $context["player"], "isDeleted", [], "method", false, false, false, 1088)) {
                        echo "<span
                                        style=\"color: red\"> [DELETED]</span>";
                    }
                    // line 1089
                    echo "</nobr>
                                  </td>
                                  <td>";
                    // line 1091
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["player"], "getLevel", [], "method", false, false, false, 1091), "html", null, true);
                    echo "</td>
                                  <td>";
                    // line 1092
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["player"], "getVocationName", [], "method", false, false, false, 1092), "html", null, true);
                    echo "</td>
                                  <td>";
                    // line 1093
                    if (twig_get_attribute($this->env, $this->source, $context["player"], "isOnline", [], "method", false, false, false, 1093)) {
                        echo "<img src=\"";
                        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
                        echo "/images/on.gif\"
                                                                     title=\"Online\">";
                    } else {
                        // line 1094
                        echo "<img
                                      src=\"";
                        // line 1095
                        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
                        echo "/images/off.gif\" title=\"Offline\">";
                    }
                    echo "</td>
                                  <td>
                                    <table border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
                                      <form action=\"";
                    // line 1098
                    echo twig_escape_filter($this->env, ($context["characters_link"] ?? null), "html", null, true);
                    echo "\" method=post>
                                        <tr>
                                          <td style=\"border: 0;\">
                                            <input type=\"hidden\" name=\"name\" value=\"";
                    // line 1101
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["player"], "getName", [], "method", false, false, false, 1101), "html", null, true);
                    echo "\"/>
                                            ";
                    // line 1102
                    $context["button_name"] = "View";
                    // line 1103
                    echo "                                            ";
                    $context["button_title"] = twig_get_attribute($this->env, $this->source, $context["player"], "getName", [], "method", false, false, false, 1103);
                    // line 1104
                    echo "                                            ";
                    echo twig_include($this->env, $context, "buttons.base.html.twig");
                    echo "

                                            ";
                    // line 1106
                    if (($context["canEdit"] ?? null)) {
                        // line 1107
                        echo "                                              <a href=\"admin/?p=players&id=";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["player"], "getId", [], "method", false, false, false, 1107), "html", null, true);
                        echo "\"
                                                 title=\"Edit in Admin Panel\" target=\"_blank\">
                                                <div class=\"BigButton\"
                                                     style=\"background-image:url(";
                        // line 1110
                        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
                        echo "/images/global/buttons/sbutton.gif)\">
                                                  <div onmouseover=\"MouseOverBigButton(this);\"
                                                       onmouseout=\"MouseOutBigButton(this);\">
                                                    <div class=\"BigButtonOver\"
                                                         style=\"background-image: url(";
                        // line 1114
                        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
                        echo "/images/global/buttons/sbutton_over.gif); visibility: hidden;\"></div>
                                                    <input class=\"BigButtonText\" type=\"text\" name=\"Edit\" alt=\"Edit\"
                                                           value=\"Edit\"></div>
                                                </div>
                                              </a>
                                            ";
                    }
                    // line 1120
                    echo "                                          </td>
                                        </tr>
                                      </form>
                                    </table>
                                  </td>
                                </tr>
                              ";
                }
                // line 1127
                echo "                            ";
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
                if (isset($context['loop']['length'])) {
                    --$context['loop']['revindex0'];
                    --$context['loop']['revindex'];
                    $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['player'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 1128
            echo "                            </tbody>
                          </table>
                        </div>
                      </td>
                    </tr>
                    </tbody>
                  </table>
                </div>
              </td>
            </tr>
            </tbody>
          </table>
        </div>
      ";
        }
        // line 1142
        echo "
      ";
        // line 1143
        echo twig_escape_filter($this->env, $this->env->getFunction('hook')->getCallable()($context, twig_constant("HOOK_CHARACTERS_AFTER_CHARACTERS")), "html", null, true);
        echo "

      ";
        // line 1145
        if (($context["canEdit"] ?? null)) {
            // line 1146
            echo "        <br>
        <a href=\"admin/?p=players&id=";
            // line 1147
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["player"] ?? null), "getId", [], "method", false, false, false, 1147), "html", null, true);
            echo "\" title=\"Edit in Admin Panel\" target=\"_blank\">
          ";
            // line 1148
            $context["button_name"] = "Edit Character";
            // line 1149
            echo "          ";
            $this->loadTemplate("buttons.base.html.twig", "characters.html.twig", 1149)->display($context);
            // line 1150
            echo "        </a>
      ";
        }
        // line 1152
        echo "    </td>
  </tr>
</table>
<br/>";
        // line 1155
        echo ($context["search_form"] ?? null);
        echo "
";
    }

    public function getTemplateName()
    {
        return "characters.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  2213 => 1155,  2208 => 1152,  2204 => 1150,  2201 => 1149,  2199 => 1148,  2195 => 1147,  2192 => 1146,  2190 => 1145,  2185 => 1143,  2182 => 1142,  2166 => 1128,  2152 => 1127,  2143 => 1120,  2134 => 1114,  2127 => 1110,  2120 => 1107,  2118 => 1106,  2112 => 1104,  2109 => 1103,  2107 => 1102,  2103 => 1101,  2097 => 1098,  2089 => 1095,  2086 => 1094,  2079 => 1093,  2075 => 1092,  2071 => 1091,  2067 => 1089,  2059 => 1088,  2053 => 1086,  2050 => 1085,  2047 => 1084,  2029 => 1083,  2027 => 1082,  2017 => 1075,  1999 => 1060,  1994 => 1058,  1989 => 1056,  1984 => 1054,  1978 => 1051,  1973 => 1049,  1968 => 1047,  1963 => 1045,  1957 => 1041,  1954 => 1040,  1952 => 1039,  1943 => 1033,  1916 => 1009,  1902 => 1000,  1888 => 991,  1876 => 984,  1846 => 957,  1835 => 949,  1830 => 947,  1825 => 945,  1820 => 943,  1814 => 940,  1809 => 938,  1804 => 936,  1799 => 934,  1792 => 929,  1790 => 928,  1786 => 927,  1783 => 926,  1765 => 910,  1757 => 907,  1753 => 905,  1749 => 903,  1747 => 902,  1743 => 901,  1737 => 900,  1731 => 899,  1726 => 897,  1721 => 896,  1718 => 895,  1713 => 894,  1711 => 893,  1694 => 879,  1683 => 871,  1678 => 869,  1673 => 867,  1668 => 865,  1662 => 862,  1657 => 860,  1652 => 858,  1647 => 856,  1640 => 851,  1638 => 850,  1635 => 849,  1617 => 833,  1608 => 830,  1604 => 829,  1599 => 828,  1596 => 827,  1593 => 826,  1588 => 825,  1586 => 824,  1569 => 810,  1558 => 802,  1553 => 800,  1548 => 798,  1543 => 796,  1537 => 793,  1532 => 791,  1527 => 789,  1522 => 787,  1515 => 782,  1513 => 781,  1508 => 779,  1491 => 764,  1483 => 760,  1480 => 759,  1472 => 756,  1466 => 753,  1463 => 752,  1461 => 751,  1457 => 750,  1454 => 749,  1448 => 746,  1443 => 744,  1438 => 742,  1432 => 740,  1429 => 739,  1423 => 736,  1418 => 734,  1412 => 732,  1409 => 731,  1403 => 728,  1397 => 726,  1394 => 725,  1387 => 722,  1385 => 721,  1380 => 720,  1377 => 719,  1374 => 718,  1369 => 717,  1366 => 716,  1364 => 715,  1347 => 701,  1336 => 693,  1331 => 691,  1326 => 689,  1321 => 687,  1315 => 684,  1310 => 682,  1305 => 680,  1300 => 678,  1280 => 660,  1267 => 657,  1259 => 656,  1254 => 654,  1249 => 653,  1246 => 652,  1243 => 651,  1238 => 650,  1236 => 649,  1219 => 635,  1208 => 627,  1203 => 625,  1198 => 623,  1193 => 621,  1187 => 618,  1182 => 616,  1177 => 614,  1172 => 612,  1155 => 598,  1152 => 597,  1139 => 586,  1130 => 584,  1127 => 583,  1122 => 582,  1120 => 581,  1116 => 580,  1112 => 579,  1098 => 568,  1066 => 539,  1055 => 530,  1053 => 529,  1048 => 527,  1031 => 513,  1027 => 512,  1018 => 510,  1012 => 507,  1006 => 504,  1000 => 503,  994 => 500,  968 => 477,  964 => 476,  955 => 474,  949 => 471,  942 => 467,  938 => 466,  929 => 464,  923 => 461,  907 => 448,  904 => 447,  883 => 429,  875 => 424,  869 => 421,  863 => 418,  853 => 411,  847 => 408,  841 => 405,  835 => 402,  825 => 395,  817 => 390,  811 => 387,  805 => 384,  795 => 377,  787 => 372,  776 => 363,  774 => 362,  769 => 360,  766 => 359,  749 => 345,  741 => 344,  731 => 337,  721 => 329,  719 => 328,  708 => 320,  697 => 312,  692 => 310,  687 => 308,  682 => 306,  676 => 303,  671 => 301,  666 => 299,  661 => 297,  636 => 274,  630 => 273,  620 => 271,  617 => 270,  615 => 269,  611 => 268,  605 => 266,  602 => 265,  596 => 262,  590 => 260,  587 => 259,  584 => 258,  582 => 257,  564 => 242,  559 => 240,  554 => 238,  549 => 236,  543 => 233,  538 => 231,  533 => 229,  528 => 227,  499 => 200,  496 => 199,  492 => 197,  488 => 195,  485 => 194,  482 => 193,  478 => 191,  473 => 189,  470 => 188,  468 => 187,  465 => 186,  463 => 185,  456 => 182,  454 => 181,  451 => 180,  445 => 177,  439 => 175,  436 => 174,  434 => 173,  423 => 170,  417 => 168,  415 => 167,  412 => 166,  406 => 163,  400 => 161,  397 => 160,  395 => 159,  392 => 158,  384 => 155,  378 => 153,  375 => 152,  373 => 151,  370 => 150,  364 => 147,  358 => 145,  355 => 144,  353 => 143,  350 => 142,  345 => 139,  342 => 138,  335 => 137,  327 => 133,  324 => 132,  322 => 131,  319 => 130,  313 => 127,  307 => 125,  304 => 124,  302 => 123,  296 => 120,  290 => 118,  288 => 117,  282 => 114,  276 => 112,  274 => 111,  270 => 109,  265 => 106,  261 => 104,  258 => 103,  254 => 101,  248 => 99,  245 => 98,  243 => 97,  236 => 94,  233 => 93,  231 => 92,  225 => 89,  219 => 87,  217 => 86,  211 => 83,  205 => 81,  203 => 80,  197 => 77,  191 => 75,  189 => 74,  181 => 71,  175 => 69,  173 => 68,  167 => 64,  163 => 63,  156 => 62,  146 => 61,  142 => 60,  136 => 58,  134 => 57,  115 => 41,  110 => 39,  105 => 37,  100 => 35,  94 => 32,  89 => 30,  84 => 28,  79 => 26,  68 => 17,  63 => 14,  60 => 13,  58 => 12,  53 => 11,  51 => 10,  48 => 9,  46 => 8,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "characters.html.twig", "C:\\UniServerZ\\www\\system\\templates\\characters.html.twig");
    }
}
