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
<link rel=\"stylesheet\" href=\"/tools/simple-page.css?v=20260529\">
<script>
  \$(document).ready(function () {
    Tipped.create('.item_image');
  });
</script>
<div class=\"characters-page\">
";
        // line 10
        $context["rows"] = 0;
        // line 11
        echo "
";
        // line 12
        if (($context["canEdit"] ?? null)) {
            // line 13
            echo "  <a href=\"admin/?p=players&id=";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["player"] ?? null), "getId", [], "method", false, false, false, 13), "html", null, true);
            echo "\" title=\"Edit in Admin Panel\" target=\"_blank\">
    ";
            // line 14
            $context["button_name"] = "Edit Character";
            // line 15
            echo "    ";
            $this->loadTemplate("buttons.base.html.twig", "characters.html.twig", 15)->display($context);
            // line 16
            echo "  </a>
  <br>
";
        }
        // line 19
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
        // line 28
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/global/content/box-frame-edge.gif);\"></span>
            <span class=\"CaptionEdgeRightTop\"
                  style=\"background-image:url(";
        // line 30
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/global/content/box-frame-edge.gif);\"></span>
            <span class=\"CaptionBorderTop\"
                  style=\"background-image:url(";
        // line 32
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/global/content/table-headline-border.gif);\"></span>
            <span class=\"CaptionVerticalLeft\"
                  style=\"background-image:url(";
        // line 34
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/global/content/box-frame-vertical.gif);\"></span>
            <div class=\"Text\">Character Information</div>
            <span class=\"CaptionVerticalRight\"
                  style=\"background-image:url(";
        // line 37
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/global/content/box-frame-vertical.gif);\"></span>
            <span class=\"CaptionBorderBottom\"
                  style=\"background-image:url(";
        // line 39
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/global/content/table-headline-border.gif);\"></span>
            <span class=\"CaptionEdgeLeftBottom\"
                  style=\"background-image:url(";
        // line 41
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/global/content/box-frame-edge.gif);\"></span>
            <span class=\"CaptionEdgeRightBottom\"
                  style=\"background-image:url(";
        // line 43
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
        // line 59
        $context["rows"] = (($context["rows"] ?? null) + 1);
        // line 60
        echo "                          <tr bgcolor=\"";
        echo twig_escape_filter($this->env, $this->env->getFunction('getStyle')->getCallable()(($context["rows"] ?? null)), "html", null, true);
        echo "\">
                            <td width=\"20%\" class=\"LabelV175\">Name:</td>
                            <td>";
        // line 62
        if ( !(null === ($context["skull"] ?? null))) {
            echo "<img
                                src=\"images/";
            // line 63
            echo twig_escape_filter($this->env, ($context["skull"] ?? null), "html", null, true);
            echo ".gif\">";
        }
        echo " ";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["player"] ?? null), "getName", [], "method", false, false, false, 63), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, ($context["oldName"] ?? null), "html", null, true);
        echo " ";
        if (twig_get_attribute($this->env, $this->source, ($context["player"] ?? null), "isOnline", [], "method", false, false, false, 63)) {
            // line 64
            echo "                                <img src=\"";
            echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
            echo "/images/on.gif\" title=\"Online\">";
        } else {
            echo "<img
                                src=\"";
            // line 65
            echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
            echo "/images/off.gif\" title=\"Offline\">";
        }
        // line 66
        echo "                              <div style=\"float: right\"></div>
                            </td>
                          </tr>

                          ";
        // line 70
        $context["rows"] = (($context["rows"] ?? null) + 1);
        // line 71
        echo "                          <tr bgcolor=\"";
        echo twig_escape_filter($this->env, $this->env->getFunction('getStyle')->getCallable()(($context["rows"] ?? null)), "html", null, true);
        echo "\">
                            <td class=\"LabelV175\">Country:</td>
                            <td>";
        // line 73
        echo twig_escape_filter($this->env, ($context["country"] ?? null), "html", null, true);
        echo " ";
        echo ($context["flag"] ?? null);
        echo "</td>
                          </tr>

                          ";
        // line 76
        $context["rows"] = (($context["rows"] ?? null) + 1);
        // line 77
        echo "                          <tr bgcolor=\"";
        echo twig_escape_filter($this->env, $this->env->getFunction('getStyle')->getCallable()(($context["rows"] ?? null)), "html", null, true);
        echo "\">
                            <td class=\"LabelV175\">Sex:</td>
                            <td>";
        // line 79
        echo twig_escape_filter($this->env, ($context["sex"] ?? null), "html", null, true);
        echo "</td>
                          </tr>

                          ";
        // line 82
        $context["rows"] = (($context["rows"] ?? null) + 1);
        // line 83
        echo "                          <tr bgcolor=\"";
        echo twig_escape_filter($this->env, $this->env->getFunction('getStyle')->getCallable()(($context["rows"] ?? null)), "html", null, true);
        echo "\">
                            <td class=\"LabelV175\">Vocation:</td>
                            <td>";
        // line 85
        echo twig_escape_filter($this->env, ($context["vocation"] ?? null), "html", null, true);
        echo "</td>
                          </tr>

                          ";
        // line 88
        $context["rows"] = (($context["rows"] ?? null) + 1);
        // line 89
        echo "                          <tr bgcolor=\"";
        echo twig_escape_filter($this->env, $this->env->getFunction('getStyle')->getCallable()(($context["rows"] ?? null)), "html", null, true);
        echo "\">
                            <td class=\"LabelV175\">Level:</td>
                            <td>";
        // line 91
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["player"] ?? null), "getLevel", [], "method", false, false, false, 91), "html", null, true);
        echo "</td>
                          </tr>
\t\t\t\t\t\t  
                          ";
        // line 94
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["config"] ?? null), "characters", [], "any", false, false, false, 94), "resets", [], "any", false, false, false, 94)) {
            // line 95
            echo "                          ";
            $context["rows"] = (($context["rows"] ?? null) + 1);
            // line 96
            echo "                          <tr bgcolor=\"";
            echo twig_escape_filter($this->env, $this->env->getFunction('getStyle')->getCallable()(($context["rows"] ?? null)), "html", null, true);
            echo "\">
                              <td class=\"LabelV175\">Resets:</td>
                              <td>
                                  ";
            // line 99
            if ( !twig_get_attribute($this->env, $this->source, ($context["player"] ?? null), "isHidden", [], "method", false, false, false, 99)) {
                // line 100
                echo "                                      ";
                if ( !(null === twig_get_attribute($this->env, $this->source, ($context["player"] ?? null), "getStorage", [0 => 500], "method", false, false, false, 100))) {
                    // line 101
                    echo "                                          ";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["player"] ?? null), "getStorage", [0 => 500], "method", false, false, false, 101), "html", null, true);
                    echo " Resets
                                      ";
                } else {
                    // line 103
                    echo "                                          0 Resets
                                      ";
                }
                // line 105
                echo "                                  ";
            } else {
                // line 106
                echo "                                      <strike>Hidden</strike>
                                  ";
            }
            // line 108
            echo "                              </td>
                          </tr>
                          ";
        }
        // line 111
        echo "

                          ";
        // line 113
        $context["rows"] = (($context["rows"] ?? null) + 1);
        // line 114
        echo "                          <tr bgcolor=\"";
        echo twig_escape_filter($this->env, $this->env->getFunction('getStyle')->getCallable()(($context["rows"] ?? null)), "html", null, true);
        echo "\">
                            <td class=\"LabelV175\">Achievement Points:</td>
                            <td>";
        // line 116
        echo twig_escape_filter($this->env, ($context["achievementPoints"] ?? null), "html", null, true);
        echo "</td>
                          </tr>

                          ";
        // line 119
        $context["rows"] = (($context["rows"] ?? null) + 1);
        // line 120
        echo "                          <tr bgcolor=\"";
        echo twig_escape_filter($this->env, $this->env->getFunction('getStyle')->getCallable()(($context["rows"] ?? null)), "html", null, true);
        echo "\">
                            <td class=\"LabelV175\">Residence:</td>
                            <td>";
        // line 122
        echo twig_escape_filter($this->env, ($context["town"] ?? null), "html", null, true);
        echo "</td>
                          </tr>

                          ";
        // line 125
        if (($context["frags_enabled"] ?? null)) {
            // line 126
            echo "                            ";
            $context["rows"] = (($context["rows"] ?? null) + 1);
            // line 127
            echo "                            <tr bgcolor=\"";
            echo twig_escape_filter($this->env, $this->env->getFunction('getStyle')->getCallable()(($context["rows"] ?? null)), "html", null, true);
            echo "\">
                              <td class=\"LabelV175\">Frags:</td>
                              <td>";
            // line 129
            echo twig_escape_filter($this->env, ($context["frags_count"] ?? null), "html", null, true);
            echo "</td>
                            </tr>
                          ";
        }
        // line 132
        echo "
                          ";
        // line 133
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["config"] ?? null), "characters", [], "any", false, false, false, 133), "balance", [], "any", false, false, false, 133)) {
            // line 134
            echo "                            ";
            $context["rows"] = (($context["rows"] ?? null) + 1);
            // line 135
            echo "                            <tr bgcolor=\"";
            echo twig_escape_filter($this->env, $this->env->getFunction('getStyle')->getCallable()(($context["rows"] ?? null)), "html", null, true);
            echo "\">
                              <td class=\"LabelV175\">Balance:</td>
                              <td>
                                <strong style=\"color: green\">\$</strong>
                                ";
            // line 139
            if ( !twig_get_attribute($this->env, $this->source, ($context["player"] ?? null), "isHidden", [], "method", false, false, false, 139)) {
                echo "<span style=\"color: green; font-weight: bold;\">";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["player"] ?? null), "getBalance", [], "method", false, false, false, 139), "html", null, true);
                echo "</span> Gold Coins
                                ";
            } else {
                // line 140
                echo " <strike>Hidden</strike> ";
            }
            // line 141
            echo "                              </td>
                            </tr>
                          ";
        }
        // line 144
        echo "
                          ";
        // line 145
        if (twig_get_attribute($this->env, $this->source, ($context["house"] ?? null), "found", [], "any", false, false, false, 145)) {
            // line 146
            echo "                            ";
            $context["rows"] = (($context["rows"] ?? null) + 1);
            // line 147
            echo "                            <tr bgcolor=\"";
            echo twig_escape_filter($this->env, $this->env->getFunction('getStyle')->getCallable()(($context["rows"] ?? null)), "html", null, true);
            echo "\">
                              <td class=\"LabelV175\">House:</td>
                              <td><a href=\"\">";
            // line 149
            echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, ($context["house"] ?? null), "name", [], "any", false, false, false, 149) . twig_get_attribute($this->env, $this->source, ($context["house"] ?? null), "town", [], "any", false, false, false, 149)) . twig_get_attribute($this->env, $this->source, ($context["house"] ?? null), "add", [], "any", false, false, false, 149)), "html", null, true);
            echo "</a></td>
                            </tr>
                          ";
        }
        // line 152
        echo "
                          ";
        // line 153
        if ( !(null === twig_get_attribute($this->env, $this->source, ($context["guild"] ?? null), "rank", [], "any", false, false, false, 153))) {
            // line 154
            echo "                            ";
            $context["rows"] = (($context["rows"] ?? null) + 1);
            // line 155
            echo "                            <tr bgcolor=\"";
            echo twig_escape_filter($this->env, $this->env->getFunction('getStyle')->getCallable()(($context["rows"] ?? null)), "html", null, true);
            echo "\">
                              <td class=\"LabelV175\">Guild membership:</td>
                              <td>";
            // line 157
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["guild"] ?? null), "rank", [], "any", false, false, false, 157), "html", null, true);
            echo " of the <a href=\"\">";
            echo twig_get_attribute($this->env, $this->source, ($context["guild"] ?? null), "link", [], "any", false, false, false, 157);
            echo "</a></td>
                            </tr>
                          ";
        }
        // line 160
        echo "
                          ";
        // line 161
        if (($context["marriage_enabled"] ?? null)) {
            // line 162
            echo "                            ";
            $context["rows"] = (($context["rows"] ?? null) + 1);
            // line 163
            echo "                            <tr bgcolor=\"";
            echo twig_escape_filter($this->env, $this->env->getFunction('getStyle')->getCallable()(($context["rows"] ?? null)), "html", null, true);
            echo "\">
                              <td class=\"LabelV175\">Marital status:</td>
                              <td><a href=\"\">";
            // line 165
            echo twig_escape_filter($this->env, ($context["marital_status"] ?? null), "html", null, true);
            echo "</a></td>
                            </tr>
                          ";
        }
        // line 168
        echo "
                          ";
        // line 169
        $context["rows"] = (($context["rows"] ?? null) + 1);
        // line 170
        echo "                          <tr bgcolor=\"";
        echo twig_escape_filter($this->env, $this->env->getFunction('getStyle')->getCallable()(($context["rows"] ?? null)), "html", null, true);
        echo "\">
                            <td class=\"LabelV175\">Last Login:</td>
                            <td>";
        // line 172
        if ((twig_get_attribute($this->env, $this->source, ($context["player"] ?? null), "getLastLogin", [], "method", false, false, false, 172) == 0)) {
            echo "Never logged in.";
        } else {
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["player"] ?? null), "getLastLogin", [], "method", false, false, false, 172), "M d Y, H:i:s"), "html", null, true);
            echo " CEST";
        }
        echo "</td>
                          </tr>

                          ";
        // line 175
        if ( !(null === ($context["comment"] ?? null))) {
            // line 176
            echo "                            ";
            $context["rows"] = (($context["rows"] ?? null) + 1);
            // line 177
            echo "                            <tr bgcolor=\"";
            echo twig_escape_filter($this->env, $this->env->getFunction('getStyle')->getCallable()(($context["rows"] ?? null)), "html", null, true);
            echo "\">
                              <td class=\"LabelV175\">Comment:</td>
                              <td>";
            // line 179
            echo ($context["comment"] ?? null);
            echo "</td>
                            </tr>
                          ";
        }
        // line 182
        echo "
                          ";
        // line 183
        $context["rows"] = (($context["rows"] ?? null) + 1);
        // line 184
        echo "                          <tr bgcolor=\"";
        echo twig_escape_filter($this->env, $this->env->getFunction('getStyle')->getCallable()(($context["rows"] ?? null)), "html", null, true);
        echo "\">
                            <td class=\"LabelV175\">Account Status:</td>
                            <td>
                              ";
        // line 187
        if (($context["vip_enabled"] ?? null)) {
            // line 188
            echo "                                VIP
                                ";
            // line 189
            if (twig_get_attribute($this->env, $this->source, ($context["account"] ?? null), "isPremium", [], "method", false, false, false, 189)) {
                // line 190
                echo "                                  <strong
                                    style=\"color:green\">actived</strong> until ";
                // line 191
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["account"] ?? null), "getExpirePremiumTime", [], "method", false, false, false, 191), "j M Y, H:i"), "html", null, true);
                echo "
                                ";
            } else {
                // line 193
                echo "                                  <strong style=\"color:red\">desactivated</strong>
                                ";
            }
            // line 195
            echo "                              ";
        } else {
            // line 196
            echo "                                ";
            if (twig_get_attribute($this->env, $this->source, ($context["account"] ?? null), "isPremium", [], "method", false, false, false, 196)) {
                // line 197
                echo "                                  <font color=\"green\"><b>Premium Account</b></font>
                                ";
            } else {
                // line 199
                echo "                                  <font color=\"red\">Free Account</font>
                                ";
            }
            // line 201
            echo "                              ";
        }
        // line 202
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
        // line 229
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/global/content/box-frame-edge.gif);\"></span>
      <span class=\"CaptionEdgeRightTop\"
            style=\"background-image:url(";
        // line 231
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/global/content/box-frame-edge.gif);\"></span>
      <span class=\"CaptionBorderTop\"
            style=\"background-image:url(";
        // line 233
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/global/content/table-headline-border.gif);\"></span>
      <span class=\"CaptionVerticalLeft\"
            style=\"background-image:url(";
        // line 235
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/global/content/box-frame-vertical.gif);\"></span>
      <div class=\"Text\">Account Information</div>
      <span class=\"CaptionVerticalRight\"
            style=\"background-image:url(";
        // line 238
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/global/content/box-frame-vertical.gif);\"></span>
      <span class=\"CaptionBorderBottom\"
            style=\"background-image:url(";
        // line 240
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/global/content/table-headline-border.gif);\"></span>
      <span class=\"CaptionEdgeLeftBottom\"
            style=\"background-image:url(";
        // line 242
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/global/content/box-frame-edge.gif);\"></span>
      <span class=\"CaptionEdgeRightBottom\"
            style=\"background-image:url(";
        // line 244
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
        // line 259
        $context["group"] = twig_get_attribute($this->env, $this->source, ($context["player"] ?? null), "getGroup", [], "method", false, false, false, 259);
        // line 260
        echo "                    ";
        if ((twig_get_attribute($this->env, $this->source, ($context["group"] ?? null), "isLoaded", [], "method", false, false, false, 260) && (twig_get_attribute($this->env, $this->source, ($context["group"] ?? null), "getId", [], "method", false, false, false, 260) != 1))) {
            // line 261
            echo "                      ";
            $context["rows"] = (($context["rows"] ?? null) + 1);
            // line 262
            echo "                      <tr bgcolor=\"";
            echo twig_escape_filter($this->env, $this->env->getFunction('getStyle')->getCallable()(($context["rows"] ?? null)), "html", null, true);
            echo "\">
                        <td class=\"LabelV175\">Position:</td>
                        <td>";
            // line 264
            echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["group"] ?? null), "getName", [], "method", false, false, false, 264)), "html", null, true);
            echo "</td>
                      </tr>
                    ";
        }
        // line 267
        echo "                    ";
        $context["rows"] = (($context["rows"] ?? null) + 1);
        // line 268
        echo "                    <tr bgcolor=\"";
        echo twig_escape_filter($this->env, $this->env->getFunction('getStyle')->getCallable()(($context["rows"] ?? null)), "html", null, true);
        echo "\">
                      <td class=\"LabelV175\">Created:</td>
                      <td>";
        // line 270
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["account"] ?? null), "getCreated", [], "method", false, false, false, 270), "M d Y, g:i:s"), "html", null, true);
        echo " CET
                        ";
        // line 271
        if ((preg_match("/^\\d+\$/", ($context["bannedUntil"] ?? null)) || (($context["bannedUntil"] ?? null) == "-1"))) {
            // line 272
            echo "                          <span
                            style=\"color: red\">[Banished ";
            // line 273
            if ((($context["bannedUntil"] ?? null) == "-1")) {
                echo "forever";
            } else {
                echo "until ";
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, ($context["bannedUntil"] ?? null), "d F Y, h:s"), "html", null, true);
            }
            echo "]</span>
                        ";
        } else {
            // line 275
            echo "                          ";
            echo ($context["bannedUntil"] ?? null);
            echo "
                        ";
        }
        // line 276
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
        // line 299
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/global/content/box-frame-edge.gif);\"></span>
      <span class=\"CaptionEdgeRightTop\"
            style=\"background-image:url(";
        // line 301
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/global/content/box-frame-edge.gif);\"></span>
      <span class=\"CaptionBorderTop\"
            style=\"background-image:url(";
        // line 303
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/global/content/table-headline-border.gif);\"></span>
      <span class=\"CaptionVerticalLeft\"
            style=\"background-image:url(";
        // line 305
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/global/content/box-frame-vertical.gif);\"></span>
      <div class=\"Text\">Character Details</div>
      <span class=\"CaptionVerticalRight\"
            style=\"background-image:url(";
        // line 308
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/global/content/box-frame-vertical.gif);\"></span>
      <span class=\"CaptionBorderBottom\"
            style=\"background-image:url(";
        // line 310
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/global/content/table-headline-border.gif);\"></span>
      <span class=\"CaptionEdgeLeftBottom\"
            style=\"background-image:url(";
        // line 312
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/global/content/box-frame-edge.gif);\"></span>
      <span class=\"CaptionEdgeRightBottom\"
            style=\"background-image:url(";
        // line 314
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/global/content/box-frame-edge.gif);\"></span>
    </div>
  </div>
\t<div id=\"DetailsCollapseContainer\" class=\"character-details-modern\">
    <aside class=\"character-details-sidebar\">
      ";
        // line 319
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["config"] ?? null), "characters", [], "any", false, false, false, 319), "outfit", [], "any", false, false, false, 319)) {
            // line 320
            echo "        <div class=\"character-outfit-panel\">
          <span>Current Outfit</span>
          <div class=\"character-outfit-box\">
            <img
              style=\"margin-left:";
            // line 324
            if (twig_in_filter(twig_get_attribute($this->env, $this->source, ($context["player"] ?? null), "getLookType", [], "method", false, false, false, 324), [0 => 75, 1 => 266, 2 => 302])) {
                echo "5px;margin-top:0;width:60px;height:60px;";
            } else {
                echo "-18px;margin-top:-28px;width:80px;height:80px;";
            }
            echo "\"
              src=\"";
            // line 325
            echo twig_escape_filter($this->env, ($context["outfit"] ?? null), "html", null, true);
            echo "\" alt=\"player outfit\"/>
          </div>
        </div>
      ";
        }
        // line 329
        echo "
      ";
        // line 330
        echo twig_escape_filter($this->env, $this->env->getFunction('hook')->getCallable()($context, twig_constant("HOOK_CHARACTERS_AFTER_QUESTS")), "html", null, true);
        echo "

      ";
        // line 332
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["config"] ?? null), "characters", [], "any", false, false, false, 332), "equipment", [], "any", false, false, false, 332)) {
            // line 333
            echo "        <div class=\"character-inventory-panel\">
          <span>Inventory</span>
          <div class=\"character-inventory-grid\">
            <div class=\"character-inventory-column\">
              <div class=\"character-item-slot\">";
            // line 337
            echo (($__internal_compile_0 = ($context["equipment"] ?? null)) && is_array($__internal_compile_0) || $__internal_compile_0 instanceof ArrayAccess ? ($__internal_compile_0[2] ?? null) : null);
            echo "</div>
              <div class=\"character-item-slot\">";
            // line 338
            echo (($__internal_compile_1 = ($context["equipment"] ?? null)) && is_array($__internal_compile_1) || $__internal_compile_1 instanceof ArrayAccess ? ($__internal_compile_1[6] ?? null) : null);
            echo "</div>
              <div class=\"character-item-slot\">";
            // line 339
            echo (($__internal_compile_2 = ($context["equipment"] ?? null)) && is_array($__internal_compile_2) || $__internal_compile_2 instanceof ArrayAccess ? ($__internal_compile_2[9] ?? null) : null);
            echo "</div>
              <div class=\"character-stat-slot\">Soul: ";
            // line 340
            echo twig_escape_filter($this->env, ($context["soul"] ?? null), "html", null, true);
            echo "</div>
            </div>
            <div class=\"character-inventory-column\">
              <div class=\"character-item-slot\">";
            // line 343
            echo (($__internal_compile_3 = ($context["equipment"] ?? null)) && is_array($__internal_compile_3) || $__internal_compile_3 instanceof ArrayAccess ? ($__internal_compile_3[1] ?? null) : null);
            echo "</div>
              <div class=\"character-item-slot\">";
            // line 344
            echo (($__internal_compile_4 = ($context["equipment"] ?? null)) && is_array($__internal_compile_4) || $__internal_compile_4 instanceof ArrayAccess ? ($__internal_compile_4[4] ?? null) : null);
            echo "</div>
              <div class=\"character-item-slot\">";
            // line 345
            echo (($__internal_compile_5 = ($context["equipment"] ?? null)) && is_array($__internal_compile_5) || $__internal_compile_5 instanceof ArrayAccess ? ($__internal_compile_5[7] ?? null) : null);
            echo "</div>
              <div class=\"character-item-slot\">";
            // line 346
            echo (($__internal_compile_6 = ($context["equipment"] ?? null)) && is_array($__internal_compile_6) || $__internal_compile_6 instanceof ArrayAccess ? ($__internal_compile_6[8] ?? null) : null);
            echo "</div>
            </div>
            <div class=\"character-inventory-column\">
              <div class=\"character-item-slot\">";
            // line 349
            echo (($__internal_compile_7 = ($context["equipment"] ?? null)) && is_array($__internal_compile_7) || $__internal_compile_7 instanceof ArrayAccess ? ($__internal_compile_7[3] ?? null) : null);
            echo "</div>
              <div class=\"character-item-slot\">";
            // line 350
            echo (($__internal_compile_8 = ($context["equipment"] ?? null)) && is_array($__internal_compile_8) || $__internal_compile_8 instanceof ArrayAccess ? ($__internal_compile_8[5] ?? null) : null);
            echo "</div>
              <div class=\"character-item-slot\">";
            // line 351
            echo (($__internal_compile_9 = ($context["equipment"] ?? null)) && is_array($__internal_compile_9) || $__internal_compile_9 instanceof ArrayAccess ? ($__internal_compile_9[10] ?? null) : null);
            echo "</div>
              <div class=\"character-stat-slot\">Cap: ";
            // line 352
            echo twig_escape_filter($this->env, ($context["cap"] ?? null), "html", null, true);
            echo "</div>
            </div>
          </div>
        </div>
      ";
        }
        // line 357
        echo "
      ";
        // line 358
        echo twig_escape_filter($this->env, $this->env->getFunction('hook')->getCallable()($context, twig_constant("HOOK_CHARACTERS_AFTER_EQUIPMENT")), "html", null, true);
        echo "
    </aside>

    <section class=\"character-details-stats\">
      <div class=\"character-stat-card\">
        <div class=\"character-stat-row\">
          <div class=\"character-stat-icon\">♥</div>
          <strong>Health</strong>
          <div class=\"character-stat-value\">
            <b>";
        // line 367
        echo twig_escape_filter($this->env, ($context["health_current"] ?? null), "html", null, true);
        echo "/";
        echo twig_escape_filter($this->env, ($context["health_max"] ?? null), "html", null, true);
        echo " (";
        echo twig_escape_filter($this->env, ($context["health_percent"] ?? null), "html", null, true);
        echo "%)</b>
            <div class=\"progress\">
              <div class=\"progress-bar bg-danger\" role=\"progressbar\" aria-valuenow=\"";
        // line 369
        echo twig_escape_filter($this->env, ($context["health_percent"] ?? null), "html", null, true);
        echo "\"
                   aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width: ";
        // line 370
        echo twig_escape_filter($this->env, ($context["health_percent"] ?? null), "html", null, true);
        echo "%;\"></div>
            </div>
          </div>
        </div>
        <div class=\"character-stat-row\">
          <div class=\"character-stat-icon\">♦</div>
          <strong>Mana</strong>
          <div class=\"character-stat-value\">
            <b>";
        // line 378
        echo twig_escape_filter($this->env, ($context["mana_current"] ?? null), "html", null, true);
        echo "/";
        echo twig_escape_filter($this->env, ($context["mana_max"] ?? null), "html", null, true);
        echo " (";
        echo twig_escape_filter($this->env, ($context["mana_percent"] ?? null), "html", null, true);
        echo "%)</b>
            <div class=\"progress\">
              <div class=\"progress-bar bg-default\" role=\"progressbar\" aria-valuenow=\"";
        // line 380
        echo twig_escape_filter($this->env, ($context["mana_percent"] ?? null), "html", null, true);
        echo "\"
                   aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width: ";
        // line 381
        echo twig_escape_filter($this->env, ($context["mana_percent"] ?? null), "html", null, true);
        echo "%;\"></div>
            </div>
          </div>
        </div>
      </div>

      <div class=\"character-stat-card\">
        <div class=\"character-stat-row\">
          <div class=\"character-stat-icon\">★</div>
          <strong>Experience</strong>
          <div class=\"character-stat-value\">
            Have <b>";
        // line 392
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["player"] ?? null), "getExperience", [], "method", false, false, false, 392), "html", null, true);
        echo "</b> and need <b>";
        echo twig_escape_filter($this->env, ($context["expLeft"] ?? null), "html", null, true);
        echo "</b> to Level
            <b>";
        // line 393
        echo twig_escape_filter($this->env, (twig_get_attribute($this->env, $this->source, ($context["player"] ?? null), "getLevel", [], "method", false, false, false, 393) + 1), "html", null, true);
        echo "</b>.
          </div>
        </div>
        <div class=\"character-stat-row\">
          <div class=\"character-stat-icon\">%</div>
          <strong>Percent</strong>
          <div class=\"character-stat-value\">
            <b>";
        // line 400
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["player"] ?? null), "getExperience", [], "method", false, false, false, 400), "html", null, true);
        echo "/";
        echo twig_escape_filter($this->env, ($context["expNext"] ?? null), "html", null, true);
        echo " (";
        echo twig_escape_filter($this->env, ($context["expLeftPercent"] ?? null), "html", null, true);
        echo "%)</b>
            <div class=\"progress\">
              <div class=\"progress-bar bg-success\" role=\"progressbar\" aria-valuenow=\"";
        // line 402
        echo twig_escape_filter($this->env, ($context["expLeftPercent"] ?? null), "html", null, true);
        echo "\"
                   aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width:";
        // line 403
        echo twig_escape_filter($this->env, ($context["expLeftPercent"] ?? null), "html", null, true);
        echo "%\"></div>
            </div>
          </div>
        </div>
      </div>
    </section>

    ";
        // line 410
        echo twig_escape_filter($this->env, $this->env->getFunction('hook')->getCallable()($context, twig_constant("HOOK_CHARACTERS_BEFORE_SKILLS")), "html", null, true);
        echo "

    ";
        // line 412
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["config"] ?? null), "characters", [], "any", false, false, false, 412), "skills", [], "any", false, false, false, 412)) {
            // line 413
            echo "      <section class=\"character-skills-panel\">
        <span>Skills</span>
        <div class=\"character-skills-grid\">
          <div class=\"character-skill-cell\"><img src=\"images/level.gif\" alt=\"\"><b>Level</b><strong>";
            // line 416
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["player"] ?? null), "getLevel", [], "method", false, false, false, 416), "html", null, true);
            echo "</strong></div>
          <div class=\"character-skill-cell\"><img src=\"images/ml.gif\" alt=\"\"><b>ML</b><strong>";
            // line 417
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (($__internal_compile_10 = ($context["skills"] ?? null)) && is_array($__internal_compile_10) || $__internal_compile_10 instanceof ArrayAccess ? ($__internal_compile_10[0] ?? null) : null), "value", [], "any", false, false, false, 417), "html", null, true);
            echo "</strong></div>
          <div class=\"character-skill-cell\"><img src=\"images/fist.gif\" alt=\"\"><b>Fist</b><strong>";
            // line 418
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (($__internal_compile_11 = ($context["skills"] ?? null)) && is_array($__internal_compile_11) || $__internal_compile_11 instanceof ArrayAccess ? ($__internal_compile_11[1] ?? null) : null), "value", [], "any", false, false, false, 418), "html", null, true);
            echo "</strong></div>
          <div class=\"character-skill-cell\"><img src=\"images/club.gif\" alt=\"\"><b>Club</b><strong>";
            // line 419
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (($__internal_compile_12 = ($context["skills"] ?? null)) && is_array($__internal_compile_12) || $__internal_compile_12 instanceof ArrayAccess ? ($__internal_compile_12[2] ?? null) : null), "value", [], "any", false, false, false, 419), "html", null, true);
            echo "</strong></div>
          <div class=\"character-skill-cell\"><img src=\"images/sword.gif\" alt=\"\"><b>Sword</b><strong>";
            // line 420
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (($__internal_compile_13 = ($context["skills"] ?? null)) && is_array($__internal_compile_13) || $__internal_compile_13 instanceof ArrayAccess ? ($__internal_compile_13[3] ?? null) : null), "value", [], "any", false, false, false, 420), "html", null, true);
            echo "</strong></div>
          <div class=\"character-skill-cell\"><img src=\"images/axe.gif\" alt=\"\"><b>Axe</b><strong>";
            // line 421
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (($__internal_compile_14 = ($context["skills"] ?? null)) && is_array($__internal_compile_14) || $__internal_compile_14 instanceof ArrayAccess ? ($__internal_compile_14[4] ?? null) : null), "value", [], "any", false, false, false, 421), "html", null, true);
            echo "</strong></div>
          <div class=\"character-skill-cell\"><img src=\"images/dist.gif\" alt=\"\"><b>Dist</b><strong>";
            // line 422
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (($__internal_compile_15 = ($context["skills"] ?? null)) && is_array($__internal_compile_15) || $__internal_compile_15 instanceof ArrayAccess ? ($__internal_compile_15[5] ?? null) : null), "value", [], "any", false, false, false, 422), "html", null, true);
            echo "</strong></div>
          <div class=\"character-skill-cell\"><img src=\"images/def.gif\" alt=\"\"><b>Def</b><strong>";
            // line 423
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (($__internal_compile_16 = ($context["skills"] ?? null)) && is_array($__internal_compile_16) || $__internal_compile_16 instanceof ArrayAccess ? ($__internal_compile_16[6] ?? null) : null), "value", [], "any", false, false, false, 423), "html", null, true);
            echo "</strong></div>
          <div class=\"character-skill-cell\"><img src=\"images/fish.gif\" alt=\"\"><b>Fish</b><strong>";
            // line 424
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (($__internal_compile_17 = ($context["skills"] ?? null)) && is_array($__internal_compile_17) || $__internal_compile_17 instanceof ArrayAccess ? ($__internal_compile_17[7] ?? null) : null), "value", [], "any", false, false, false, 424), "html", null, true);
            echo "</strong></div>
        </div>
      </section>
    ";
        }
        // line 428
        echo "
    ";
        // line 429
        echo twig_escape_filter($this->env, $this->env->getFunction('hook')->getCallable()($context, twig_constant("HOOK_CHARACTERS_AFTER_SKILLS")), "html", null, true);
        echo "
  </div>
</div>

<br>

<div class=\"TableContainer\">
  <div class=\"CaptionContainer\">
    <div class=\"CaptionInnerContainer\">
      <span class=\"CaptionEdgeLeftTop\"
            style=\"background-image:url(";
        // line 439
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/global/content/box-frame-edge.gif);\"></span>
      <span class=\"CaptionEdgeRightTop\"
            style=\"background-image:url(";
        // line 441
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/global/content/box-frame-edge.gif);\"></span>
      <span class=\"CaptionBorderTop\"
            style=\"background-image:url(";
        // line 443
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/global/content/table-headline-border.gif);\"></span>
      <span class=\"CaptionVerticalLeft\"
            style=\"background-image:url(";
        // line 445
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/global/content/box-frame-vertical.gif);\"></span>
      <div class=\"Text\">Character Quests</div>
      <span class=\"CaptionVerticalRight\"
            style=\"background-image:url(";
        // line 448
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/global/content/box-frame-vertical.gif);\"></span>
      <span class=\"CaptionBorderBottom\"
            style=\"background-image:url(";
        // line 450
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/global/content/table-headline-border.gif);\"></span>
      <span class=\"CaptionEdgeLeftBottom\"
            style=\"background-image:url(";
        // line 452
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/global/content/box-frame-edge.gif);\"></span>
      <span class=\"CaptionEdgeRightBottom\"
            style=\"background-image:url(";
        // line 454
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/global/content/box-frame-edge.gif);\"></span>
    </div>
  </div>
  <button type=\"button\" id=\"QuestsCollapse\" class=\"characters-collapse-toggle CircleSymbolPlus\"
       onclick=\"\$('#QuestsCollapseContainer').slideToggle('slow'); \$(this).toggleClass('CircleSymbolPlus CircleSymbolMinus');\"
       aria-label=\"Toggle character quests\">
    <span class=\"characters-collapse-symbol\"></span>
  </button>
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
        // line 474
        $context["i"] = 0;
        // line 475
        echo "                    ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["quests"] ?? null));
        foreach ($context['_seq'] as $context["name"] => $context["done"]) {
            // line 476
            echo "                      ";
            $context["i"] = (($context["i"] ?? null) + 1);
            // line 477
            echo "                      ";
            $context["rows"] = (($context["rows"] ?? null) + 1);
            // line 478
            echo "                      <tr bgcolor=\"";
            echo twig_escape_filter($this->env, $this->env->getFunction('getStyle')->getCallable()(($context["rows"] ?? null)), "html", null, true);
            echo "\">
                        <td style=\"width: 90%;\" class=\"LabelV175\">";
            // line 479
            echo twig_escape_filter($this->env, $context["name"], "html", null, true);
            echo "</td>
                        <td><img
                            src=\"templates/tibiacom/images/premiumfeatures/icon_";
            // line 481
            if ($context["done"]) {
                echo "yes";
            } else {
                echo "no";
            }
            echo ".png\"
                            title=\"";
            // line 482
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
        // line 485
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
        // line 503
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/global/content/box-frame-edge.gif);\"></span>
      <span class=\"CaptionEdgeRightTop\"
            style=\"background-image:url(";
        // line 505
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/global/content/box-frame-edge.gif);\"></span>
      <span class=\"CaptionBorderTop\"
            style=\"background-image:url(";
        // line 507
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/global/content/table-headline-border.gif);\"></span>
      <span class=\"CaptionVerticalLeft\"
            style=\"background-image:url(";
        // line 509
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/global/content/box-frame-vertical.gif);\"></span>
      <div class=\"Text\">Account Achievements</div>
      <span class=\"CaptionVerticalRight\"
            style=\"background-image:url(";
        // line 512
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/global/content/box-frame-vertical.gif);\"></span>
      <span class=\"CaptionBorderBottom\"
            style=\"background-image:url(";
        // line 514
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/global/content/table-headline-border.gif);\"></span>
      <span class=\"CaptionEdgeLeftBottom\"
            style=\"background-image:url(";
        // line 516
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/global/content/box-frame-edge.gif);\"></span>
      <span class=\"CaptionEdgeRightBottom\"
            style=\"background-image:url(";
        // line 518
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/global/content/box-frame-edge.gif);\"></span>
    </div>
  </div>
  <button type=\"button\" id=\"AchievementsCollapse\" class=\"characters-collapse-toggle CircleSymbolPlus\"
       onclick=\"\$('#AchievementsCollapseContainer').slideToggle('slow'); \$(this).toggleClass('CircleSymbolPlus CircleSymbolMinus');\"
       aria-label=\"Toggle achievements\">
    <span class=\"characters-collapse-symbol\"></span>
  </button>
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
        // line 538
        $context["i"] = 0;
        // line 539
        echo "                    ";
        if ((($context["achievementPoints"] ?? null) > 0)) {
            // line 540
            echo "                      ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["achievements"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["achievement"]) {
                // line 541
                echo "                        ";
                $context["i"] = (($context["i"] ?? null) + 1);
                // line 542
                echo "                        ";
                $context["rows"] = (($context["rows"] ?? null) + 1);
                // line 543
                echo "                        <tr bgcolor=\"";
                echo twig_escape_filter($this->env, $this->env->getFunction('getStyle')->getCallable()(($context["rows"] ?? null)), "html", null, true);
                echo "\">
                          ";
                // line 544
                if ((twig_get_attribute($this->env, $this->source, $context["achievement"], "grade", [], "any", false, false, false, 544) == 1)) {
                    // line 545
                    echo "                            <td><img src=\"";
                    echo twig_escape_filter($this->env, ($context["BASE_URL"] ?? null), "html", null, true);
                    echo "images/global/general/achievement-grade-symbol.gif\"
                                     alt=\"Tibia Achievement\"></td>
                          ";
                }
                // line 548
                echo "                          ";
                if ((twig_get_attribute($this->env, $this->source, $context["achievement"], "grade", [], "any", false, false, false, 548) == 2)) {
                    // line 549
                    echo "                            <td><img src=\"";
                    echo twig_escape_filter($this->env, ($context["BASE_URL"] ?? null), "html", null, true);
                    echo "images/global/general/achievement-grade-symbol.gif\"
                                     alt=\"Tibia Achievement\"><img
                                src=\"";
                    // line 551
                    echo twig_escape_filter($this->env, ($context["BASE_URL"] ?? null), "html", null, true);
                    echo "images/global/general/achievement-grade-symbol.gif\"
                                alt=\"Tibia Achievement\"></td>
                          ";
                }
                // line 554
                echo "                          ";
                if ((twig_get_attribute($this->env, $this->source, $context["achievement"], "grade", [], "any", false, false, false, 554) == 3)) {
                    // line 555
                    echo "                            <td><img src=\"";
                    echo twig_escape_filter($this->env, ($context["BASE_URL"] ?? null), "html", null, true);
                    echo "images/global/general/achievement-grade-symbol.gif\"
                                     alt=\"Tibia Achievement\"><img
                                src=\"";
                    // line 557
                    echo twig_escape_filter($this->env, ($context["BASE_URL"] ?? null), "html", null, true);
                    echo "images/global/general/achievement-grade-symbol.gif\"
                                alt=\"Tibia Achievement\"><img
                                src=\"";
                    // line 559
                    echo twig_escape_filter($this->env, ($context["BASE_URL"] ?? null), "html", null, true);
                    echo "images/global/general/achievement-grade-symbol.gif\"
                                alt=\"Tibia Achievement\"></td>
                          ";
                }
                // line 562
                echo "                          ";
                if ((twig_get_attribute($this->env, $this->source, $context["achievement"], "grade", [], "any", false, false, false, 562) == 4)) {
                    // line 563
                    echo "                            <td><img src=\"";
                    echo twig_escape_filter($this->env, ($context["BASE_URL"] ?? null), "html", null, true);
                    echo "images/global/general/achievement-grade-symbol.gif\"
                                     alt=\"Tibia Achievement\"><img
                                src=\"";
                    // line 565
                    echo twig_escape_filter($this->env, ($context["BASE_URL"] ?? null), "html", null, true);
                    echo "images/global/general/achievement-grade-symbol.gif\"
                                alt=\"Tibia Achievement\"><img
                                src=\"";
                    // line 567
                    echo twig_escape_filter($this->env, ($context["BASE_URL"] ?? null), "html", null, true);
                    echo "images/global/general/achievement-grade-symbol.gif\"
                                alt=\"Tibia Achievement\"><img
                                src=\"";
                    // line 569
                    echo twig_escape_filter($this->env, ($context["BASE_URL"] ?? null), "html", null, true);
                    echo "images/global/general/achievement-grade-symbol.gif\"
                                alt=\"Tibia Achievement\"></td>
                          ";
                }
                // line 572
                echo "                          <td style=\"width: 75%;\">
                            ";
                // line 573
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["achievement"], "name", [], "any", false, false, false, 573), "html", null, true);
                echo "
                            ";
                // line 574
                if ((twig_get_attribute($this->env, $this->source, $context["achievement"], "secret", [], "any", false, false, false, 574) == 1)) {
                    // line 575
                    echo "                              <img class=\"SecretAchievementIcon\"
                                   src=\"";
                    // line 576
                    echo twig_escape_filter($this->env, ($context["BASE_URL"] ?? null), "html", null, true);
                    echo "images/global/general/achievement-secret-symbol.gif\"
                                   alt=\"Tibia Secret Achievement\">
                            ";
                }
                // line 579
                echo "                          </td>
                        </tr>
                      ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['achievement'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 582
            echo "                    ";
        } else {
            // line 583
            echo "                      <tr bgcolor=\"";
            echo twig_escape_filter($this->env, $this->env->getFunction('getStyle')->getCallable()(($context["rows"] ?? null)), "html", null, true);
            echo "\">
                        <td style=\"text-align: center;\">This character has no achievement.</td>
                      </tr>
                    ";
        }
        // line 587
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
        // line 602
        echo twig_escape_filter($this->env, $this->env->getFunction('hook')->getCallable()($context, twig_constant("HOOK_CHARACTERS_BEFORE_DEATHS")), "html", null, true);
        echo "

";
        // line 604
        if ((twig_length_filter($this->env, ($context["deaths"] ?? null)) > 0)) {
            // line 605
            echo "  <!-- DEATHS -->
  <div class=\"TableContainer\">
    <div class=\"CaptionContainer\">
      <div class=\"CaptionInnerContainer\">
        <span class=\"CaptionEdgeLeftTop\"
              style=\"background-image:url(";
            // line 610
            echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
            echo "/images/global/content/box-frame-edge.gif);\"></span>
        <span class=\"CaptionEdgeRightTop\"
              style=\"background-image:url(";
            // line 612
            echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
            echo "/images/global/content/box-frame-edge.gif);\"></span>
        <span class=\"CaptionBorderTop\"
              style=\"background-image:url(";
            // line 614
            echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
            echo "/images/global/content/table-headline-border.gif);\"></span>
        <span class=\"CaptionVerticalLeft\"
              style=\"background-image:url(";
            // line 616
            echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
            echo "/images/global/content/box-frame-vertical.gif);\"></span>
        <div class=\"Text\">Character Deaths</div>
        <span class=\"CaptionVerticalRight\"
              style=\"background-image:url(";
            // line 619
            echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
            echo "/images/global/content/box-frame-vertical.gif);\"></span>
        <span class=\"CaptionBorderBottom\"
              style=\"background-image:url(";
            // line 621
            echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
            echo "/images/global/content/table-headline-border.gif);\"></span>
        <span class=\"CaptionEdgeLeftBottom\"
              style=\"background-image:url(";
            // line 623
            echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
            echo "/images/global/content/box-frame-edge.gif);\"></span>
        <span class=\"CaptionEdgeRightBottom\"
              style=\"background-image:url(";
            // line 625
            echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
            echo "/images/global/content/box-frame-edge.gif);\"></span>
      </div>
    </div>
    <button type=\"button\" id=\"DeathsCollapse\" class=\"characters-collapse-toggle CircleSymbolPlus\"
         onclick=\"\$('#DeathsCollapseContainer').slideToggle('slow'); \$(this).toggleClass('CircleSymbolPlus CircleSymbolMinus');\"
         aria-label=\"Toggle character deaths\">
      <span class=\"characters-collapse-symbol\"></span>
    </button>
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
            // line 645
            $context["i"] = 0;
            // line 646
            echo "                      ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["deaths"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["death"]) {
                // line 647
                echo "                        ";
                $context["i"] = (($context["i"] ?? null) + 1);
                // line 648
                echo "                        ";
                $context["rows"] = (($context["rows"] ?? null) + 1);
                // line 649
                echo "                        <tr bgcolor=\"";
                echo twig_escape_filter($this->env, $this->env->getFunction('getStyle')->getCallable()(($context["rows"] ?? null)), "html", null, true);
                echo "\">
                          <td>";
                // line 650
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["death"], "time", [], "any", false, false, false, 650), "j M Y, H:i"), "html", null, true);
                echo "</td>
                          <td>";
                // line 651
                echo twig_get_attribute($this->env, $this->source, $context["death"], "description", [], "any", false, false, false, 651);
                echo "</td>
                        </tr>
                      ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['death'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 654
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
        // line 670
        echo "
";
        // line 671
        if ((twig_length_filter($this->env, ($context["frags"] ?? null)) > 0)) {
            // line 672
            echo "  <!-- FRAGS -->
  <div class=\"TableContainer\">
    <div class=\"CaptionContainer\">
      <div class=\"CaptionInnerContainer\">
        <span class=\"CaptionEdgeLeftTop\"
              style=\"background-image:url(";
            // line 677
            echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
            echo "/images/global/content/box-frame-edge.gif);\"></span>
        <span class=\"CaptionEdgeRightTop\"
              style=\"background-image:url(";
            // line 679
            echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
            echo "/images/global/content/box-frame-edge.gif);\"></span>
        <span class=\"CaptionBorderTop\"
              style=\"background-image:url(";
            // line 681
            echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
            echo "/images/global/content/table-headline-border.gif);\"></span>
        <span class=\"CaptionVerticalLeft\"
              style=\"background-image:url(";
            // line 683
            echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
            echo "/images/global/content/box-frame-vertical.gif);\"></span>
        <div class=\"Text\">Character Frags</div>
        <span class=\"CaptionVerticalRight\"
              style=\"background-image:url(";
            // line 686
            echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
            echo "/images/global/content/box-frame-vertical.gif);\"></span>
        <span class=\"CaptionBorderBottom\"
              style=\"background-image:url(";
            // line 688
            echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
            echo "/images/global/content/table-headline-border.gif);\"></span>
        <span class=\"CaptionEdgeLeftBottom\"
              style=\"background-image:url(";
            // line 690
            echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
            echo "/images/global/content/box-frame-edge.gif);\"></span>
        <span class=\"CaptionEdgeRightBottom\"
              style=\"background-image:url(";
            // line 692
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
            // line 700
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
            // line 714
            $context["i"] = 0;
            // line 715
            echo "                      ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["frags"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["frag"]) {
                // line 716
                echo "                        ";
                $context["i"] = (($context["i"] ?? null) + 1);
                // line 717
                echo "                        <tr bgcolor=\"";
                echo twig_escape_filter($this->env, $this->env->getFunction('getStyle')->getCallable()(($context["i"] ?? null)), "html", null, true);
                echo "\">
                          <td width=\"20%\" align=\"center\">";
                // line 718
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["frag"], "time", [], "any", false, false, false, 718), "j M Y, H:i"), "html", null, true);
                echo "</td>
                          <td>
                            Player: <a href=\"";
                // line 720
                echo twig_escape_filter($this->env, $this->env->getFunction('getPlayerLink')->getCallable()(twig_get_attribute($this->env, $this->source, $context["frag"], "player_name", [], "any", false, false, false, 720), false), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["frag"], "player_name", [], "any", false, false, false, 720), "html", null, true);
                echo "</a><br>
                            Killed by: <a href=\"";
                // line 721
                echo twig_escape_filter($this->env, $this->env->getFunction('getPlayerLink')->getCallable()(twig_get_attribute($this->env, $this->source, $context["frag"], "killer_name", [], "any", false, false, false, 721), false), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["frag"], "killer_name", [], "any", false, false, false, 721), "html", null, true);
                echo "</a><br>
                            Level: ";
                // line 722
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["frag"], "killer_level", [], "any", false, false, false, 722), "html", null, true);
                echo "<br>
                            ";
                // line 723
                if (twig_get_attribute($this->env, $this->source, $context["frag"], "unjustified", [], "any", false, false, false, 723)) {
                    // line 724
                    echo "                              <span style=\"color: red; font-size: 10px\">Unjustified</span>
                            ";
                } else {
                    // line 726
                    echo "                              <span style=\"color: green; font-size: 10px\">Justified</span>
                            ";
                }
                // line 728
                echo "                          </td>
                        </tr>
                      ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['frag'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 731
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
        // line 747
        echo "
";
        // line 748
        echo twig_escape_filter($this->env, $this->env->getFunction('hook')->getCallable()($context, twig_constant("HOOK_CHARACTERS_BEFORE_SIGNATURE")), "html", null, true);
        echo "
";
        // line 749
        if (twig_get_attribute($this->env, $this->source, ($context["config"] ?? null), "signature_enabled", [], "any", false, false, false, 749)) {
            // line 750
            echo "  <!-- SIGNATURE -->
  <div class=\"TableContainer\">
    <div class=\"CaptionContainer\">
      <div class=\"CaptionInnerContainer\">
        <span class=\"CaptionEdgeLeftTop\"
              style=\"background-image:url(";
            // line 755
            echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
            echo "/images/global/content/box-frame-edge.gif);\"></span>
        <span class=\"CaptionEdgeRightTop\"
              style=\"background-image:url(";
            // line 757
            echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
            echo "/images/global/content/box-frame-edge.gif);\"></span>
        <span class=\"CaptionBorderTop\"
              style=\"background-image:url(";
            // line 759
            echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
            echo "/images/global/content/table-headline-border.gif);\"></span>
        <span class=\"CaptionVerticalLeft\"
              style=\"background-image:url(";
            // line 761
            echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
            echo "/images/global/content/box-frame-vertical.gif);\"></span>
        <div class=\"Text\">Character Signature</div>
        <span class=\"CaptionVerticalRight\"
              style=\"background-image:url(";
            // line 764
            echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
            echo "/images/global/content/box-frame-vertical.gif);\"></span>
        <span class=\"CaptionBorderBottom\"
              style=\"background-image:url(";
            // line 766
            echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
            echo "/images/global/content/table-headline-border.gif);\"></span>
        <span class=\"CaptionEdgeLeftBottom\"
              style=\"background-image:url(";
            // line 768
            echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
            echo "/images/global/content/box-frame-edge.gif);\"></span>
        <span class=\"CaptionEdgeRightBottom\"
              style=\"background-image:url(";
            // line 770
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
            // line 778
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
            // line 805
            echo twig_escape_filter($this->env, ($context["signature_url"] ?? null), "html", null, true);
            echo "\" alt=\"Signature for player ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["player"] ?? null), "getName", [], "method", false, false, false, 805), "html", null, true);
            echo "\">
                        </td>
                        <td>
                          <table class=\"TableContent\" width=\"100%\">
                            <tr>
                              <td class=\"LabelV80\">Website:</td>
                              <td><input type=\"text\" id=\"inputSignatureWebsite\" class=\"input_clipboard\"
                                         value=\"<a href=&quot;";
            // line 812
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
            // line 821
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
            // line 830
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
        // line 854
        echo twig_escape_filter($this->env, $this->env->getFunction('hook')->getCallable()($context, twig_constant("HOOK_CHARACTERS_AFTER_SIGNATURE")), "html", null, true);
        echo "


<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">
  <tr>
    <td>
      ";
        // line 860
        if ( !($context["hidden"] ?? null)) {
            // line 861
            echo "        ";
            $context["rows"] = 0;
            // line 862
            echo "        <div class=\"TableContainer\">
          <div class=\"CaptionContainer\">
            <div class=\"CaptionInnerContainer\">
              <span class=\"CaptionEdgeLeftTop\"
                    style=\"background-image:url(";
            // line 866
            echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
            echo "/images/global/content/box-frame-edge.gif);\"></span>
              <span class=\"CaptionEdgeRightTop\"
                    style=\"background-image:url(";
            // line 868
            echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
            echo "/images/global/content/box-frame-edge.gif);\"></span>
              <span class=\"CaptionBorderTop\"
                    style=\"background-image:url(";
            // line 870
            echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
            echo "/images/global/content/table-headline-border.gif);\"></span>
              <span class=\"CaptionVerticalLeft\"
                    style=\"background-image:url(";
            // line 872
            echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
            echo "/images/global/content/box-frame-vertical.gif);\"></span>
              <div class=\"Text\">Characters</div>
              <span class=\"CaptionVerticalRight\"
                    style=\"background-image:url(";
            // line 875
            echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
            echo "/images/global/content/box-frame-vertical.gif);\"></span>
              <span class=\"CaptionBorderBottom\"
                    style=\"background-image:url(";
            // line 877
            echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
            echo "/images/global/content/table-headline-border.gif);\"></span>
              <span class=\"CaptionEdgeLeftBottom\"
                    style=\"background-image:url(";
            // line 879
            echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
            echo "/images/global/content/box-frame-edge.gif);\"></span>
              <span class=\"CaptionEdgeRightBottom\"
                    style=\"background-image:url(";
            // line 881
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
            // line 896
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["config"] ?? null), "darkborder", [], "any", false, false, false, 896), "html", null, true);
            echo "\">
                              <td width=\"40%\"><B>Name</b></td>
                              <td width=\"15%\"><B>Level</b></td>
                              <td width=\"20%\"><B>Vocation</b></td>
                              <td width=\"25%\"><b>Status</b></td>
                              <td><b>&#160;</b></td>
                            </tr>
                            ";
            // line 903
            $context["i"] = 0;
            // line 904
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
                // line 905
                echo "                              ";
                if (( !twig_get_attribute($this->env, $this->source, $context["player"], "isHidden", [], "method", false, false, false, 905) && ((($__internal_compile_18 = $this->env->getFunction('config')->getCallable()("characters")) && is_array($__internal_compile_18) || $__internal_compile_18 instanceof ArrayAccess ? ($__internal_compile_18["deleted"] ?? null) : null) ||  !twig_get_attribute($this->env, $this->source, $context["player"], "isDeleted", [], "method", false, false, false, 905)))) {
                    // line 906
                    echo "                                ";
                    $context["i"] = (($context["i"] ?? null) + 1);
                    // line 907
                    echo "                                <tr bgcolor=\"";
                    echo twig_escape_filter($this->env, $this->env->getFunction('getStyle')->getCallable()(($context["i"] ?? null)), "html", null, true);
                    echo "\">
                                  <td>
                                    <nobr>";
                    // line 909
                    echo twig_escape_filter($this->env, ($context["i"] ?? null), "html", null, true);
                    echo ".&#160;";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["player"], "getName", [], "method", false, false, false, 909), "html", null, true);
                    if (twig_get_attribute($this->env, $this->source, $context["player"], "isDeleted", [], "method", false, false, false, 909)) {
                        echo "<span
                                        style=\"color: red\"> [DELETED]</span>";
                    }
                    // line 910
                    echo "</nobr>
                                  </td>
                                  <td>";
                    // line 912
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["player"], "getLevel", [], "method", false, false, false, 912), "html", null, true);
                    echo "</td>
                                  <td>";
                    // line 913
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["player"], "getVocationName", [], "method", false, false, false, 913), "html", null, true);
                    echo "</td>
                                  <td>";
                    // line 914
                    if (twig_get_attribute($this->env, $this->source, $context["player"], "isOnline", [], "method", false, false, false, 914)) {
                        echo "<img src=\"";
                        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
                        echo "/images/on.gif\"
                                                                     title=\"Online\">";
                    } else {
                        // line 915
                        echo "<img
                                      src=\"";
                        // line 916
                        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
                        echo "/images/off.gif\" title=\"Offline\">";
                    }
                    echo "</td>
                                  <td>
                                    <table border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
                                      <form action=\"";
                    // line 919
                    echo twig_escape_filter($this->env, ($context["characters_link"] ?? null), "html", null, true);
                    echo "\" method=post>
                                        <tr>
                                          <td style=\"border: 0;\">
                                            <input type=\"hidden\" name=\"name\" value=\"";
                    // line 922
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["player"], "getName", [], "method", false, false, false, 922), "html", null, true);
                    echo "\"/>
                                            ";
                    // line 923
                    $context["button_name"] = "View";
                    // line 924
                    echo "                                            ";
                    $context["button_title"] = twig_get_attribute($this->env, $this->source, $context["player"], "getName", [], "method", false, false, false, 924);
                    // line 925
                    echo "                                            ";
                    echo twig_include($this->env, $context, "buttons.base.html.twig");
                    echo "

                                            ";
                    // line 927
                    if (($context["canEdit"] ?? null)) {
                        // line 928
                        echo "                                              <a href=\"admin/?p=players&id=";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["player"], "getId", [], "method", false, false, false, 928), "html", null, true);
                        echo "\"
                                                 title=\"Edit in Admin Panel\" target=\"_blank\">
                                                <div class=\"BigButton\"
                                                     style=\"background-image:url(";
                        // line 931
                        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
                        echo "/images/global/buttons/sbutton.gif)\">
                                                  <div onmouseover=\"MouseOverBigButton(this);\"
                                                       onmouseout=\"MouseOutBigButton(this);\">
                                                    <div class=\"BigButtonOver\"
                                                         style=\"background-image: url(";
                        // line 935
                        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
                        echo "/images/global/buttons/sbutton_over.gif); visibility: hidden;\"></div>
                                                    <input class=\"BigButtonText\" type=\"text\" name=\"Edit\" alt=\"Edit\"
                                                           value=\"Edit\"></div>
                                                </div>
                                              </a>
                                            ";
                    }
                    // line 941
                    echo "                                          </td>
                                        </tr>
                                      </form>
                                    </table>
                                  </td>
                                </tr>
                              ";
                }
                // line 948
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
            // line 949
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
        // line 963
        echo "
      ";
        // line 964
        echo twig_escape_filter($this->env, $this->env->getFunction('hook')->getCallable()($context, twig_constant("HOOK_CHARACTERS_AFTER_CHARACTERS")), "html", null, true);
        echo "

      ";
        // line 966
        if (($context["canEdit"] ?? null)) {
            // line 967
            echo "        <br>
        <a href=\"admin/?p=players&id=";
            // line 968
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["player"] ?? null), "getId", [], "method", false, false, false, 968), "html", null, true);
            echo "\" title=\"Edit in Admin Panel\" target=\"_blank\">
          ";
            // line 969
            $context["button_name"] = "Edit Character";
            // line 970
            echo "          ";
            $this->loadTemplate("buttons.base.html.twig", "characters.html.twig", 970)->display($context);
            // line 971
            echo "        </a>
      ";
        }
        // line 973
        echo "    </td>
  </tr>
</table>
<br/>";
        // line 976
        echo ($context["search_form"] ?? null);
        echo "
</div>
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
        return array (  2000 => 976,  1995 => 973,  1991 => 971,  1988 => 970,  1986 => 969,  1982 => 968,  1979 => 967,  1977 => 966,  1972 => 964,  1969 => 963,  1953 => 949,  1939 => 948,  1930 => 941,  1921 => 935,  1914 => 931,  1907 => 928,  1905 => 927,  1899 => 925,  1896 => 924,  1894 => 923,  1890 => 922,  1884 => 919,  1876 => 916,  1873 => 915,  1866 => 914,  1862 => 913,  1858 => 912,  1854 => 910,  1846 => 909,  1840 => 907,  1837 => 906,  1834 => 905,  1816 => 904,  1814 => 903,  1804 => 896,  1786 => 881,  1781 => 879,  1776 => 877,  1771 => 875,  1765 => 872,  1760 => 870,  1755 => 868,  1750 => 866,  1744 => 862,  1741 => 861,  1739 => 860,  1730 => 854,  1703 => 830,  1689 => 821,  1675 => 812,  1663 => 805,  1633 => 778,  1622 => 770,  1617 => 768,  1612 => 766,  1607 => 764,  1601 => 761,  1596 => 759,  1591 => 757,  1586 => 755,  1579 => 750,  1577 => 749,  1573 => 748,  1570 => 747,  1552 => 731,  1544 => 728,  1540 => 726,  1536 => 724,  1534 => 723,  1530 => 722,  1524 => 721,  1518 => 720,  1513 => 718,  1508 => 717,  1505 => 716,  1500 => 715,  1498 => 714,  1481 => 700,  1470 => 692,  1465 => 690,  1460 => 688,  1455 => 686,  1449 => 683,  1444 => 681,  1439 => 679,  1434 => 677,  1427 => 672,  1425 => 671,  1422 => 670,  1404 => 654,  1395 => 651,  1391 => 650,  1386 => 649,  1383 => 648,  1380 => 647,  1375 => 646,  1373 => 645,  1350 => 625,  1345 => 623,  1340 => 621,  1335 => 619,  1329 => 616,  1324 => 614,  1319 => 612,  1314 => 610,  1307 => 605,  1305 => 604,  1300 => 602,  1283 => 587,  1275 => 583,  1272 => 582,  1264 => 579,  1258 => 576,  1255 => 575,  1253 => 574,  1249 => 573,  1246 => 572,  1240 => 569,  1235 => 567,  1230 => 565,  1224 => 563,  1221 => 562,  1215 => 559,  1210 => 557,  1204 => 555,  1201 => 554,  1195 => 551,  1189 => 549,  1186 => 548,  1179 => 545,  1177 => 544,  1172 => 543,  1169 => 542,  1166 => 541,  1161 => 540,  1158 => 539,  1156 => 538,  1133 => 518,  1128 => 516,  1123 => 514,  1118 => 512,  1112 => 509,  1107 => 507,  1102 => 505,  1097 => 503,  1077 => 485,  1064 => 482,  1056 => 481,  1051 => 479,  1046 => 478,  1043 => 477,  1040 => 476,  1035 => 475,  1033 => 474,  1010 => 454,  1005 => 452,  1000 => 450,  995 => 448,  989 => 445,  984 => 443,  979 => 441,  974 => 439,  961 => 429,  958 => 428,  951 => 424,  947 => 423,  943 => 422,  939 => 421,  935 => 420,  931 => 419,  927 => 418,  923 => 417,  919 => 416,  914 => 413,  912 => 412,  907 => 410,  897 => 403,  893 => 402,  884 => 400,  874 => 393,  868 => 392,  854 => 381,  850 => 380,  841 => 378,  830 => 370,  826 => 369,  817 => 367,  805 => 358,  802 => 357,  794 => 352,  790 => 351,  786 => 350,  782 => 349,  776 => 346,  772 => 345,  768 => 344,  764 => 343,  758 => 340,  754 => 339,  750 => 338,  746 => 337,  740 => 333,  738 => 332,  733 => 330,  730 => 329,  723 => 325,  715 => 324,  709 => 320,  707 => 319,  699 => 314,  694 => 312,  689 => 310,  684 => 308,  678 => 305,  673 => 303,  668 => 301,  663 => 299,  638 => 276,  632 => 275,  622 => 273,  619 => 272,  617 => 271,  613 => 270,  607 => 268,  604 => 267,  598 => 264,  592 => 262,  589 => 261,  586 => 260,  584 => 259,  566 => 244,  561 => 242,  556 => 240,  551 => 238,  545 => 235,  540 => 233,  535 => 231,  530 => 229,  501 => 202,  498 => 201,  494 => 199,  490 => 197,  487 => 196,  484 => 195,  480 => 193,  475 => 191,  472 => 190,  470 => 189,  467 => 188,  465 => 187,  458 => 184,  456 => 183,  453 => 182,  447 => 179,  441 => 177,  438 => 176,  436 => 175,  425 => 172,  419 => 170,  417 => 169,  414 => 168,  408 => 165,  402 => 163,  399 => 162,  397 => 161,  394 => 160,  386 => 157,  380 => 155,  377 => 154,  375 => 153,  372 => 152,  366 => 149,  360 => 147,  357 => 146,  355 => 145,  352 => 144,  347 => 141,  344 => 140,  337 => 139,  329 => 135,  326 => 134,  324 => 133,  321 => 132,  315 => 129,  309 => 127,  306 => 126,  304 => 125,  298 => 122,  292 => 120,  290 => 119,  284 => 116,  278 => 114,  276 => 113,  272 => 111,  267 => 108,  263 => 106,  260 => 105,  256 => 103,  250 => 101,  247 => 100,  245 => 99,  238 => 96,  235 => 95,  233 => 94,  227 => 91,  221 => 89,  219 => 88,  213 => 85,  207 => 83,  205 => 82,  199 => 79,  193 => 77,  191 => 76,  183 => 73,  177 => 71,  175 => 70,  169 => 66,  165 => 65,  158 => 64,  148 => 63,  144 => 62,  138 => 60,  136 => 59,  117 => 43,  112 => 41,  107 => 39,  102 => 37,  96 => 34,  91 => 32,  86 => 30,  81 => 28,  70 => 19,  65 => 16,  62 => 15,  60 => 14,  55 => 13,  53 => 12,  50 => 11,  48 => 10,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "characters.html.twig", "C:\\UniServerZ\\www\\system\\templates\\characters.html.twig");
    }
}
