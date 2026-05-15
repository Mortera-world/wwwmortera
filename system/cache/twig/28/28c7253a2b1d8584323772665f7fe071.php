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

/* account.management.html.twig */
class __TwigTemplate_83c7faa5d3d009d6bb2cd702bce2405e extends \Twig\Template
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
        echo "<div style=\"text-align:center\">
  <table style=\"margin-left: auto; margin-right: auto;\">
    <tr>
      <td>
        <img src=\"";
        // line 5
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/content/headline-bracer-left.gif\"/>
      </td>
      <td
        style=\"text-align:center;vertical-align:middle;horizontal-align:center;font-size:17px;font-weight:bold;\">";
        // line 8
        echo ($context["welcome_message"] ?? null);
        echo "
      </td>
      <td><img src=\"";
        // line 10
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/content/headline-bracer-right.gif\"/></td>
    </tr>
  </table>
  <br/>
</div>
<div class=\"TableContainer\">
  <div class=\"CaptionContainer\">
    <div class=\"CaptionInnerContainer\">
      <span class=\"CaptionEdgeLeftTop\"
            style=\"background-image:url(";
        // line 19
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/global/content/box-frame-edge.gif);\"></span>
      <span class=\"CaptionEdgeRightTop\"
            style=\"background-image:url(";
        // line 21
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/global/content/box-frame-edge.gif);\"></span>
      <span class=\"CaptionBorderTop\"
            style=\"background-image:url(";
        // line 23
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/global/content/table-headline-border.gif);\"></span>
      <span class=\"CaptionVerticalLeft\"
            style=\"background-image:url(";
        // line 25
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/global/content/box-frame-vertical.gif);\"></span>
      <div class=\"Text\">Account Status</div>
      <span class=\"CaptionVerticalRight\"
            style=\"background-image:url(";
        // line 28
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/global/content/box-frame-vertical.gif);\"></span>
      <span class=\"CaptionBorderBottom\"
            style=\"background-image:url(";
        // line 30
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/global/content/table-headline-border.gif);\"></span>
      <span class=\"CaptionEdgeLeftBottom\"
            style=\"background-image:url(";
        // line 32
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/global/content/box-frame-edge.gif);\"></span>
      <span class=\"CaptionEdgeRightBottom\"
            style=\"background-image:url(";
        // line 34
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/global/content/box-frame-edge.gif);\"></span>
    </div>
  </div>
  <table class=\"Table5\" cellpadding=\"0\" cellspacing=\"0\">
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
                    <tr>
                      <td>
                        ";
        // line 51
        if (twig_get_attribute($this->env, $this->source, ($context["account_logged"] ?? null), "isPremium", [], "method", false, false, false, 51)) {
            // line 52
            echo "                          <img class=\"AccountStatusImage\"
                               src=\"";
            // line 53
            echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
            echo "/images/account/account-status_green.gif\"
                               title=\"";
            // line 54
            echo twig_escape_filter($this->env, ($context["tag"] ?? null), "html", null, true);
            echo " Account\" alt=\"";
            echo twig_escape_filter($this->env, ($context["tag"] ?? null), "html", null, true);
            echo " account\">
                        ";
        } else {
            // line 56
            echo "                          <img class=\"AccountStatusImage\"
                               src=\"";
            // line 57
            echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
            echo "/images/account/account-status_red.gif\"
                               title=\"Free Account\" alt=\"free account\">
                        ";
        }
        // line 60
        echo "                      </td>
                      <td width=\"100%\" valign=\"middle\">
                        <span class=\"BigBoldText\" style=\"font-size: 24px;\">
                        ";
        // line 64
        echo "                          ";
        echo ($context["account_status"] ?? null);
        echo "
                        ";
        // line 66
        echo "                        </span>
                        <small><br>";
        // line 67
        echo twig_escape_filter($this->env, (($__internal_compile_0 = ($context["account_expire_time"] ?? null)) && is_array($__internal_compile_0) || $__internal_compile_0 instanceof ArrayAccess ? ($__internal_compile_0[0] ?? null) : null), "html", null, true);
        echo " ";
        if ((($__internal_compile_1 = ($context["account_expire_time"] ?? null)) && is_array($__internal_compile_1) || $__internal_compile_1 instanceof ArrayAccess ? ($__internal_compile_1[1] ?? null) : null)) {
            // line 68
            echo "                            (<a href=\"?points\">donate now</a>) ";
        }
        echo "</small>
                      </td>
                      <td>
                        ";
        // line 71
        if (twig_get_attribute($this->env, $this->source, ($context["config"] ?? null), "gifts_system", [], "any", false, false, false, 71)) {
            // line 72
            echo "                          <a href=\"?points\" target=\"blank\">
                            <div class=\"BigButton\"
                                 style=\"background-image:url(";
            // line 74
            echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
            echo "/images/global/buttons/sbutton_green.gif)\">
                              <div onmouseover=\"MouseOverBigButton('GetCoinsButton');\" onmouseout=\"MouseOutBigButton('GetCoinsButton');\">
                                <div id=\"GetCoinsButton\" class=\"BigButtonOver\"
                                     style=\"background-image:url(";
            // line 77
            echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
            echo "/images/global/buttons/sbutton_green_over.gif); visibility: hidden;\"></div>
                                <input class=\"BigButtonText\" type=\"submit\" value=\"Get Coins\"></div>
                            </div>
                          </a>
                        ";
        }
        // line 82
        echo "                        <div style=\"font-size:1px;height:4px;\"></div>

                        <form action=\"";
        // line 84
        echo twig_escape_filter($this->env, $this->env->getFunction('getLink')->getCallable()("account/logout"), "html", null, true);
        echo "\" method=\"post\" style=\"padding:0px;margin:0px;\">
                          ";
        // line 85
        echo twig_include($this->env, $context, "buttons.logout.html.twig");
        echo "
                        </form>
                      </td>
                    </tr>
                    </tbody>
                  </table>
                </div>
              </td>
            </tr>
            <tr>
              <td>
                <div class=\"TableContentContainer\">
                  <table class=\"TableContent\" width=\"100%\" style=\"border:1px solid #faf0d7;\">
                    <tbody>
                    <tr>
                      <style>
                        .premiumbenefits {
                          display: flex;
                          margin: 0px auto;
                        }

                        .premiumbenefits > div {
                          display: flex;
                          align-items: center;
                          flex: 1;
                          margin: auto 5x;
                        }
                      </style>
                      <td class=\"premiumbenefits\">
                        <div style=\"justify-content: flex-start\">
                          <img class=\"PremiumFeatureImage1\"
                               src=\"";
        // line 116
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/premiumfeatures/PremiumIcon-Travel.png\"
                               alt=\"premium feature 1\" style=\"margin:0px 5px\">
                          <div>use instant travel system</div>
                        </div>
                        <div style=\"justify-content: center\">
                          <img class=\"PremiumFeatureImage1\"
                               src=\"";
        // line 122
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/premiumfeatures/PremiumIcon-VIPGroups.png\"
                               alt=\"premium feature 1\" style=\"margin:0px 5px\">
                          <div>add groups to organise your VIP list</div>
                        </div>
                        <div style=\"justify-content: flex-end\">
                          <img class=\"PremiumFeatureImage1\"
                               src=\"";
        // line 128
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/premiumfeatures/PremiumIcon-Promotion.png\"
                               alt=\"premium feature 1\" style=\"margin:0px 5px\">
                          <div>get stronger with a promotion</div>
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
    </tbody>
  </table>
</div>

<br>

<div class=\"TableContainer\">
  <div class=\"CaptionContainer\">
    <div class=\"CaptionInnerContainer\">
      <span class=\"CaptionEdgeLeftTop\"
            style=\"background-image:url(";
        // line 154
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/global/content/box-frame-edge.gif);\"></span>
      <span class=\"CaptionEdgeRightTop\"
            style=\"background-image:url(";
        // line 156
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/global/content/box-frame-edge.gif);\"></span>
      <span class=\"CaptionBorderTop\"
            style=\"background-image:url(";
        // line 158
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/global/content/table-headline-border.gif);\"></span>
      <span class=\"CaptionVerticalLeft\"
            style=\"background-image:url(";
        // line 160
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/global/content/box-frame-vertical.gif);\"></span>
      <div class=\"Text\">Download Client</div>
      <span class=\"CaptionVerticalRight\"
            style=\"background-image:url(";
        // line 163
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/global/content/box-frame-vertical.gif);\"></span>
      <span class=\"CaptionBorderBottom\"
            style=\"background-image:url(";
        // line 165
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/global/content/table-headline-border.gif);\"></span>
      <span class=\"CaptionEdgeLeftBottom\"
            style=\"background-image:url(";
        // line 167
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/global/content/box-frame-edge.gif);\"></span>
      <span class=\"CaptionEdgeRightBottom\"
            style=\"background-image:url(";
        // line 169
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/global/content/box-frame-edge.gif);\"></span>
    </div>
  </div>
  <table class=\"Table5\" cellpadding=\"0\" cellspacing=\"0\">
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
                    <tr>
                      <td>
                        <div style=\"height: 55px;\">
                          <div id=\"DowloadBox\" style=\"position: relative; float:right;\">
                            <a href=\"?downloadclient\"><img
                                style=\"width: 45px; height: 45px; border: 0px; margin-right: 10px;\"
                                src=\"";
        // line 190
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/account/download_windows.gif\"></a>
                            <br>
                            <a style=\"position: absolute; bottom: -5px; right: 0px;\" href=\"?downloadclient\">Download</a>
                          </div>
                          <span style=\"position: relative; top: 18px;\">Click <a href=\"?downloadclient\">here</a> to download the latest ";
        // line 194
        echo twig_escape_filter($this->env, (($__internal_compile_2 = (($__internal_compile_3 = ($context["config"] ?? null)) && is_array($__internal_compile_3) || $__internal_compile_3 instanceof ArrayAccess ? ($__internal_compile_3["lua"] ?? null) : null)) && is_array($__internal_compile_2) || $__internal_compile_2 instanceof ArrayAccess ? ($__internal_compile_2["serverName"] ?? null) : null), "html", null, true);
        echo " client!</span>
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
    </tbody>
  </table>
</div>

<br>

";
        // line 214
        if (twig_test_empty(($context["recovery_key"] ?? null))) {
            // line 215
            echo "  <div class=\"SmallBox\">
    <div class=\"MessageContainer\">
      <div class=\"BoxFrameHorizontal\"
           style=\"background-image:url(";
            // line 218
            echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
            echo "/images/content/box-frame-horizontal.gif);\"></div>
      <div class=\"BoxFrameEdgeLeftTop\"
           style=\"background-image:url(";
            // line 220
            echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
            echo "/images/content/box-frame-edge.gif);\"></div>
      <div class=\"BoxFrameEdgeRightTop\"
           style=\"background-image:url(";
            // line 222
            echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
            echo "/images/content/box-frame-edge.gif);\"></div>
      <div class=\"Message\">
        <div class=\"BoxFrameVerticalLeft\"
             style=\"background-image:url(";
            // line 225
            echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
            echo "/images/content/box-frame-vertical.gif);\"></div>
        <div class=\"BoxFrameVerticalRight\"
             style=\"background-image:url(";
            // line 227
            echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
            echo "/images/content/box-frame-vertical.gif);\"></div>
        <table>
          <tr>
            <td class=\"LabelV\">Your account is not registered!</td>
            <td>
              <form action=\"";
            // line 232
            echo twig_escape_filter($this->env, $this->env->getFunction('getLink')->getCallable()("account/register"), "html", null, true);
            echo "\" method=\"post\" style=\"border:0;\">
                <td style=\"border:0;\">
                  ";
            // line 234
            echo twig_include($this->env, $context, "buttons.register_account.html.twig");
            echo "
                </td>
              </form>
            </td>
          </tr>
          <tr>
            <td style=\"width:100%;\">You can register your account for increased protection. Click on \"Register Account\"
              and get your free recovery key today!
            </td>
          </tr>
        </table>
      </div>
      <div class=\"BoxFrameHorizontal\"
           style=\"background-image:url(";
            // line 247
            echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
            echo "/images/content/box-frame-horizontal.gif);\"></div>
      <div class=\"BoxFrameEdgeRightBottom\"
           style=\"background-image:url(";
            // line 249
            echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
            echo "/images/content/box-frame-edge.gif);\"></div>
      <div class=\"BoxFrameEdgeLeftBottom\"
           style=\"background-image:url(";
            // line 251
            echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
            echo "/images/content/box-frame-edge.gif);\"></div>
    </div>
  </div>
  <br/>
";
        }
        // line 256
        echo "
<div class=\"TopButtonContainer\">
  <div class=\"TopButton\">
    <a href=\"#top\">
      <img style=\"border:0px;\" src=\"";
        // line 260
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/content/back-to-top.gif\"/>
    </a>
  </div>
</div>
<div class=\"TableContainer\">
  <div class=\"CaptionContainer\">
    <div class=\"CaptionInnerContainer\">
      <span class=\"CaptionEdgeLeftTop\"
            style=\"background-image:url(";
        // line 268
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/global/content/box-frame-edge.gif);\"></span>
      <span class=\"CaptionEdgeRightTop\"
            style=\"background-image:url(";
        // line 270
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/global/content/box-frame-edge.gif);\"></span>
      <span class=\"CaptionBorderTop\"
            style=\"background-image:url(";
        // line 272
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/global/content/table-headline-border.gif);\"></span>
      <span class=\"CaptionVerticalLeft\"
            style=\"background-image:url(";
        // line 274
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/global/content/box-frame-vertical.gif);\"></span>
      <div class=\"Text\">Characters</div>
      <span class=\"CaptionVerticalRight\"
            style=\"background-image:url(";
        // line 277
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/global/content/box-frame-vertical.gif);\"></span>
      <span class=\"CaptionBorderBottom\"
            style=\"background-image:url(";
        // line 279
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/global/content/table-headline-border.gif);\"></span>
      <span class=\"CaptionEdgeLeftBottom\"
            style=\"background-image:url(";
        // line 281
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/global/content/box-frame-edge.gif);\"></span>
      <span class=\"CaptionEdgeRightBottom\"
            style=\"background-image:url(";
        // line 283
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/global/content/box-frame-edge.gif);\"></span>
    </div>
  </div>
  <table class=\"Table5\" cellpadding=\"0\" cellspacing=\"0\">
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
                    <tr>
                      <td style=\"text-align: center; font-weight: bold;\">Regular Characters</td>
                    </tr>
                    </tbody>
                  </table>
                </div>
              </td>
            </tr>
            </tbody>
          </table>
        </div>

        <div class=\"InnerTableContainer\">
          <table style=\"width:100%;\">
            <tbody>
            <tr>
              <td>
                <div class=\"TableContentContainer\">
                  <table class=\"TableContent\" width=\"100%\" style=\"border:1px solid #faf0d7;\">
                    <tbody>
                    <tr class=\"LabelH\">
                      <td style=\"width: 15px !important;\"></td>
                      <td>Name</td>
                      <td style=\"width: 100px !important;\">Status</td>
                      <td style=\"width: 100px !important;\"></td>
                    </tr>
                    ";
        // line 324
        $context["i"] = 0;
        // line 325
        echo "                    ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["players"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["player"]) {
            // line 326
            echo "                      ";
            $context["i"] = (($context["i"] ?? null) + 1);
            // line 327
            echo "                      <tr style=\"background-color: ";
            echo twig_escape_filter($this->env, $this->env->getFunction('getStyle')->getCallable()(($context["i"] ?? null)), "html", null, true);
            echo "; height: 50px;\">
                        <td style=\"font-weight: bold;\">";
            // line 328
            echo twig_escape_filter($this->env, ($context["i"] ?? null), "html", null, true);
            echo ".</td>
                        <td>
                          <span style=\"white-space: nowrap; vertical-align: middle; line-height: 12px;\">
                            <span id=\"CharacterNameOf_0\"
                                  style=\"font-size:13pt; font-weight: bold;\">";
            // line 332
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["player"], "getName", [], "method", false, false, false, 332), "html", null, true);
            echo "
                              ";
            // line 333
            if (twig_get_attribute($this->env, $this->source, $context["player"], "isDeleted", [], "method", false, false, false, 333)) {
                // line 334
                echo "                                <span style=\"color: red\"><b> [ DELETED ] </b></span>
                              ";
            }
            // line 336
            echo "                              ";
            if (twig_get_attribute($this->env, $this->source, $context["player"], "isMain", [], "method", false, false, false, 336)) {
                // line 337
                echo "                                <img src=\"";
                echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
                echo "/images//account/maincharacter.png\"
                                     alt=\"(Main Character)\" title=\"Main Character\">
                              ";
            }
            // line 340
            echo "\t\t\t\t\t\t\t\t\t\t        </span>
\t\t\t\t\t\t\t\t\t\t        <br>
                            <small>
                              <span
                                id=\"CharacterNameOf_0\">";
            // line 344
            echo twig_escape_filter($this->env, (($__internal_compile_4 = twig_get_attribute($this->env, $this->source, ($context["config"] ?? null), "vocations", [], "any", false, false, false, 344)) && is_array($__internal_compile_4) || $__internal_compile_4 instanceof ArrayAccess ? ($__internal_compile_4[twig_get_attribute($this->env, $this->source, $context["player"], "getVocation", [], "method", false, false, false, 344)] ?? null) : null), "html", null, true);
            echo " - Level ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["player"], "getLevel", [], "method", false, false, false, 344), "html", null, true);
            echo " - On ";
            echo twig_escape_filter($this->env, (($__internal_compile_5 = (($__internal_compile_6 = ($context["config"] ?? null)) && is_array($__internal_compile_6) || $__internal_compile_6 instanceof ArrayAccess ? ($__internal_compile_6["lua"] ?? null) : null)) && is_array($__internal_compile_5) || $__internal_compile_5 instanceof ArrayAccess ? ($__internal_compile_5["serverName"] ?? null) : null), "html", null, true);
            echo "
                              <span style=\"position: relative; top: 3px; margin-left: 5px;\">
                                <span class=\"HelperDivIndicator\"
                                      onmouseover=\"ActivateHelperDiv(\$(this), 'BattlEye Protected Game World', '<p>This character lives on a game world which has been protected by BattleEye since April 19, 2018.</p>', '');\"
                                      onmouseout=\"\$('#HelperDivContainer').hide();\">
                                  <img style=\"border:0px;\"
                                       src=\"";
            // line 350
            echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
            echo "/images/global/content/icon_battleye.gif\">
                                </span>
                              </span>
                              ";
            // line 353
            if ( !(null === twig_get_attribute($this->env, $this->source, ($context["guild"] ?? null), "rank", [], "any", false, false, false, 353))) {
                // line 354
                echo "                                <br>
                                <span>Guild Membership: ";
                // line 355
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["guild"] ?? null), "rank", [], "any", false, false, false, 355), "html", null, true);
                echo " of the <a
                                    href=\"\">";
                // line 356
                echo twig_get_attribute($this->env, $this->source, ($context["guild"] ?? null), "link", [], "any", false, false, false, 356);
                echo "</a></span>
                              ";
            }
            // line 358
            echo "                              </span>
                            </small>
                          </span>
                        </td>
                        <td>
                          <img id=\"DailyReawardState\"
                               src=\"";
            // line 364
            echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
            echo "/images/global/content/icon-status-dailyreward-collected.png\"
                               alt=\"Daily Reward collected\" title=\"Daily Reward collected\">
                          ";
            // line 366
            if (twig_get_attribute($this->env, $this->source, $context["player"], "isOnline", [], "method", false, false, false, 366)) {
                // line 367
                echo "                            <img src=\"templates/tibiacom/images/on.gif\" title=\"Online\">
                          ";
            } else {
                // line 369
                echo "                            <img src=\"templates/tibiacom/images/off.gif\" title=\"Offline\">
                          ";
            }
            // line 371
            echo "                        </td>
                        <td align=\"center\">
                          <span id=\"CharacterOptionsOf_0\">
                            <span style=\"font-weight:normal;\">";
            // line 374
            if ( !twig_get_attribute($this->env, $this->source, $context["player"], "isDeleted", [], "method", false, false, false, 374)) {
                echo "[<a
                                href=\"";
                // line 375
                echo twig_escape_filter($this->env, $this->env->getFunction('getLink')->getCallable()(("account/character/comment/" . $this->env->getFilter('urlencode')->getCallable()(twig_get_attribute($this->env, $this->source, $context["player"], "getName", [], "any", false, false, false, 375)))), "html", null, true);
                echo "\">Edit</a>]";
            }
            echo "</span>
                            <br>
                            <span style=\"font-weight:normal;\">[<a href=\"";
            // line 377
            echo twig_escape_filter($this->env, $this->env->getFunction('getLink')->getCallable()("account/character/delete"), "html", null, true);
            echo "\">Delete</a>]</span>
                          </span>
                        </td>
                      </tr>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['player'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 382
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
    <tr>
      <td>
        <table class=\"InnerTableButtonRow\" cellpadding=\"0\" cellspacing=\"0\"
               style=\"padding-bottom: 0; margin-bottom: -6px\">
          <tbody>
          <tr>
            <td>
              <div style=\"display: inline-flex; justify-content: center; margin: 2px 0 0 7px;\">
                <form action=\"";
        // line 400
        echo twig_escape_filter($this->env, $this->env->getFunction('getLink')->getCallable()("account/character/create"), "html", null, true);
        echo "\" method=\"post\">
                  ";
        // line 401
        echo twig_include($this->env, $context, "buttons.create_character.html.twig");
        echo "
                </form>
                ";
        // line 403
        if ((twig_get_attribute($this->env, $this->source, ($context["config"] ?? null), "account_change_character_main", [], "any", false, false, false, 403) && (twig_length_filter($this->env, ($context["players"] ?? null)) >= 1))) {
            // line 404
            echo "                  <form action=\"";
            echo twig_escape_filter($this->env, $this->env->getFunction('getLink')->getCallable()("account/character/main"), "html", null, true);
            echo "\" method=\"post\" style=\"margin-left: 6px\">
                    ";
            // line 405
            echo twig_include($this->env, $context, "buttons.change_main.html.twig");
            echo "
                  </form>
                ";
        }
        // line 408
        echo "                ";
        if (twig_get_attribute($this->env, $this->source, ($context["config"] ?? null), "account_change_character_name", [], "any", false, false, false, 408)) {
            // line 409
            echo "                  <form action=\"";
            echo twig_escape_filter($this->env, $this->env->getFunction('getLink')->getCallable()("account/character/name"), "html", null, true);
            echo "\" method=\"post\" style=\"margin-left: 6px\">
                    ";
            // line 410
            echo twig_include($this->env, $context, "buttons.change_name.html.twig");
            echo "
                  </form>
                ";
        }
        // line 413
        echo "                ";
        if (twig_get_attribute($this->env, $this->source, ($context["config"] ?? null), "account_change_character_sex", [], "any", false, false, false, 413)) {
            // line 414
            echo "                  <form action=\"";
            echo twig_escape_filter($this->env, $this->env->getFunction('getLink')->getCallable()("account/character/sex"), "html", null, true);
            echo "\" method=\"post\" style=\"margin-left: 6px\">
                    ";
            // line 415
            echo twig_include($this->env, $context, "buttons.change_sex.html.twig");
            echo "
                  </form>
                ";
        }
        // line 418
        echo "              </div>
            </td>
          </tr>
          </tbody>
        </table>
      </td>
    </tr>
    </tbody>
  </table>
</div>

<br>

";
        // line 432
        echo "
";
        // line 433
        if (($context["email_request"] ?? null)) {
            // line 434
            echo "  <div class=\"SmallBox\">
    <div class=\"MessageContainer\">
      <div class=\"BoxFrameHorizontal\"
           style=\"background-image:url(";
            // line 437
            echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
            echo "/images/content/box-frame-horizontal.gif);\"></div>
      <div class=\"BoxFrameEdgeLeftTop\"
           style=\"background-image:url(";
            // line 439
            echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
            echo "/images/content/box-frame-edge.gif);\"></div>
      <div class=\"BoxFrameEdgeRightTop\"
           style=\"background-image:url(";
            // line 441
            echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
            echo "/images/content/box-frame-edge.gif);\"></div>
      <div class=\"Message\">
        <div class=\"BoxFrameVerticalLeft\"
             style=\"background-image:url(";
            // line 444
            echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
            echo "/images/content/box-frame-vertical.gif);\"></div>
        <div class=\"BoxFrameVerticalRight\"
             style=\"background-image:url(";
            // line 446
            echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
            echo "/images/content/box-frame-vertical.gif);\"></div>
        <table>
          <tr>
            <td class=\"LabelV\">Note:</td>
            <td style=\"width:100%;\">A request has been submitted to change the email address of this account to
              <b>";
            // line 451
            echo twig_escape_filter($this->env, ($context["email_new"] ?? null), "html", null, true);
            echo "</b>. After <b>";
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, ($context["email_new_time"] ?? null), "j F Y, G:i:s"), "html", null, true);
            echo "</b> you can accept the new
              email address and finish the process. Please cancel the request if you do not want your email address to
              be changed! Also cancel the request if you have no access to the new email address!
            </td>
          </tr>
        </table>
        <div style=\"text-align:center\">
          <table border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
            <form action=\"";
            // line 459
            echo twig_escape_filter($this->env, $this->env->getFunction('getLink')->getCallable()("account/email"), "html", null, true);
            echo "\" method=\"post\">
              <tr>
                <td style=\"border:0px;\">
                  ";
            // line 462
            echo twig_include($this->env, $context, "buttons.edit.html.twig");
            echo "
                </td>
              </tr>
            </form>
          </table>
        </div>
      </div>
      <div class=\"BoxFrameHorizontal\"
           style=\"background-image:url(";
            // line 470
            echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
            echo "/images/content/box-frame-horizontal.gif);\"></div>
      <div class=\"BoxFrameEdgeRightBottom\"
           style=\"background-image:url(";
            // line 472
            echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
            echo "/images/content/box-frame-edge.gif);\"></div>
      <div class=\"BoxFrameEdgeLeftBottom\"
           style=\"background-image:url(";
            // line 474
            echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
            echo "/images/content/box-frame-edge.gif);\"></div>
    </div>
  </div>
  <br/>
";
        }
        // line 479
        echo "<a name=\"General+Information\"></a>
<div class=\"TopButtonContainer\">
  <div class=\"TopButton\">
    <a href=\"#top\">
      <img style=\"border:0px;\" src=\"";
        // line 483
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/content/back-to-top.gif\"/>
    </a>
  </div>
</div>
<div class=\"TableContainer\">
  <table class=\"Table3\" cellpadding=\"0\" cellspacing=\"0\">
    <div class=\"CaptionContainer\">
      <div class=\"CaptionInnerContainer\">
        <span class=\"CaptionEdgeLeftTop\"
              style=\"background-image:url(";
        // line 492
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/content/box-frame-edge.gif);\"></span>
        <span class=\"CaptionEdgeRightTop\"
              style=\"background-image:url(";
        // line 494
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/content/box-frame-edge.gif);\"></span>
        <span class=\"CaptionBorderTop\"
              style=\"background-image:url(";
        // line 496
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/content/table-headline-border.gif);\"></span>
        <span class=\"CaptionVerticalLeft\"
              style=\"background-image:url(";
        // line 498
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/content/box-frame-vertical.gif);\"></span>
        <div class=\"Text\">General Information</div>
        <span class=\"CaptionVerticalRight\"
              style=\"background-image:url(";
        // line 501
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/content/box-frame-vertical.gif);\"></span>
        <span class=\"CaptionBorderBottom\"
              style=\"background-image:url(";
        // line 503
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/content/table-headline-border.gif);\"></span>
        <span class=\"CaptionEdgeLeftBottom\"
              style=\"background-image:url(";
        // line 505
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/content/box-frame-edge.gif);\"></span>
        <span class=\"CaptionEdgeRightBottom\"
              style=\"background-image:url(";
        // line 507
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/content/box-frame-edge.gif);\"></span>
      </div>
    </div>
    <tr>
      <td>
        <div class=\"InnerTableContainer\">
          <table style=\"width:100%;\">
            <tr>
              <td>
                <div class=\"TableContentAndRightShadow\">
                  <div class=\"TableContentContainer\">
                    <table class=\"TableContent\" width=\"100%\">
                      <tr style=\"background-color: ";
        // line 519
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["config"] ?? null), "lightborder", [], "any", false, false, false, 519), "html", null, true);
        echo ";\">
                        <td class=\"LabelV\">
                          Account ";
        // line 521
        if (twig_constant("USE_ACCOUNT_NAME")) {
            echo "Name";
        } else {
            echo "Number";
        }
        echo ":
                        </td>
                        <td style=\"width:90%;\">";
        // line 523
        echo twig_escape_filter($this->env, ($context["account"] ?? null), "html", null, true);
        echo "</td>
                      </tr>
                      <tr style=\"background-color: ";
        // line 525
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["config"] ?? null), "darkborder", [], "any", false, false, false, 525), "html", null, true);
        echo ";\">
                        <td class=\"LabelV\">Email Address:</td>
                        <td style=\"width:90%;\">";
        // line 527
        echo twig_escape_filter($this->env, (($context["account_email"] ?? null) . ($context["email_change"] ?? null)), "html", null, true);
        echo "</td>
                      </tr>
                      <tr style=\"background-color: ";
        // line 529
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["config"] ?? null), "lightborder", [], "any", false, false, false, 529), "html", null, true);
        echo ";\">
                        <td class=\"LabelV\">Created:</td>
                        <td>";
        // line 531
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, ($context["account_created"] ?? null), "M d Y, G:i:s"), "html", null, true);
        echo "</td>
                      </tr>
                      <tr style=\"background-color: ";
        // line 533
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["config"] ?? null), "darkborder", [], "any", false, false, false, 533), "html", null, true);
        echo ";\">
                        <td class=\"LabelV\">Last Login:</td>
                        <td>";
        // line 535
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, ($context["account_web_lastlogin"] ?? null), "M d Y, G:i:s"), "html", null, true);
        echo "</td>
                      </tr>
                      ";
        // line 538
        echo "                        <tr style=\"background-color: ";
        echo twig_get_attribute($this->env, $this->source, ($context["config"] ?? null), "lightborder", [], "any", false, false, false, 538);
        echo ";\">
                          <td class=\"LabelV\">Account Status:</td>
                          <td>";
        // line 540
        echo ($context["account_status"] ?? null);
        echo "</td>
                        </tr>
                        <tr style=\"background-color: ";
        // line 542
        echo twig_get_attribute($this->env, $this->source, ($context["config"] ?? null), "darkborder", [], "any", false, false, false, 542);
        echo ";\">
                          <td class=\"LabelV\">Tibia Coins:</td>
                          <td>";
        // line 544
        echo ($context["account_coins"] ?? null);
        echo " <img src=\"";
        echo ($context["template_path"] ?? null);
        echo "/images/account/icon-tibiacoin.png\"
                                                       class=\"VSCCoinImages\"/>
                            (Including: ";
        // line 546
        echo ($context["account_coins_transferable"] ?? null);
        echo " <img
                              src=\"";
        // line 547
        echo ($context["template_path"] ?? null);
        echo "/images/account/icon-tibiacointrusted.png\"
                              class=\"VSCCoinImages\">)
                          </td>
                        </tr>
                        <tr style=\"background-color: ";
        // line 551
        echo twig_get_attribute($this->env, $this->source, ($context["config"] ?? null), "lightborder", [], "any", false, false, false, 551);
        echo ";\">
                          <td class=\"LabelV\">Tournament Coins:</td>
                          <td>";
        // line 553
        echo ($context["tournament_coins"] ?? null);
        echo " <img
                              src=\"";
        // line 554
        echo ($context["template_path"] ?? null);
        echo "/images/account/icon-tournamentcoin.png\" class=\"VSCCoinImages\">
                          </td>
                        </tr>
                        <tr style=\"background-color: ";
        // line 557
        echo twig_get_attribute($this->env, $this->source, ($context["config"] ?? null), "darkborder", [], "any", false, false, false, 557);
        echo ";\">
                          <td class=\"LabelV\">Registered:</td>
                          <td>";
        // line 559
        echo ($context["account_registered"] ?? null);
        echo "</td>
                        </tr>
                      ";
        // line 562
        echo "                    </table>
                  </div>
                </div>
              </td>
            </tr>
            <tr>
              <td>
                <table class=\"InnerTableButtonRow\" cellpadding=\"0\" cellspacing=\"0\">
                  <tr>
                    <td>
                      <table border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
                        <form action=\"";
        // line 573
        echo twig_escape_filter($this->env, $this->env->getFunction('getLink')->getCallable()("account/password"), "html", null, true);
        echo "\" method=\"post\">
                          <tr>
                            <td style=\"border:0px;\">
                              ";
        // line 576
        echo twig_include($this->env, $context, "buttons.change_password.html.twig");
        echo "
                            </td>
                          </tr>
                        </form>
                      </table>
                    </td>
                    <td>
                      <table border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
                        <form action=\"";
        // line 584
        echo twig_escape_filter($this->env, $this->env->getFunction('getLink')->getCallable()("account/email"), "html", null, true);
        echo "\" method=\"post\">
                          <tr>
                            <td style=\"border:0px;\">
                              <input type=\"hidden\" name=\"newemail\" value=\"\"/>
                              <input type=\"hidden\" name=\"newemaildate\" value=\"0\">
                              ";
        // line 589
        echo twig_include($this->env, $context, "buttons.change_email.html.twig");
        echo "
                            </td>
                          </tr>
                        </form>
                      </table>
                    </td>
                    <td width=\"100%\"></td>
                    ";
        // line 597
        echo "                    ";
        if (twig_test_empty(($context["recovery_key"] ?? null))) {
            // line 598
            echo "                      <td>
                        <table border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
                          <form action=\"";
            // line 600
            echo twig_escape_filter($this->env, $this->env->getFunction('getLink')->getCallable()("account/register"), "html", null, true);
            echo "\" method=\"post\">
                            <tr>
                              <td style=\"border:0px;\">
                                ";
            // line 603
            echo twig_include($this->env, $context, "buttons.register_account.html.twig");
            echo "
                              </td>
                            </tr>
                          </form>
                        </table>
                      </td>
                    ";
        }
        // line 610
        echo "                  </tr>
                </table>
              </td>
            </tr>
          </table>
        </div>
      </td>
    </tr>
  </table>
</div>

<br/>

<a name=\"Public+Information\"></a>
<div class=\"TopButtonContainer\">
  <div class=\"TopButton\">
    <a href=\"#top\">
      <img style=\"border:0px;\" src=\"";
        // line 627
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/content/back-to-top.gif\"/>
    </a>
  </div>
</div>
<div class=\"TableContainer\">
  <table class=\"Table5\" cellpadding=\"0\" cellspacing=\"0\">
    <div class=\"CaptionContainer\">
      <div class=\"CaptionInnerContainer\">
          <span class=\"CaptionEdgeLeftTop\"
                style=\"background-image:url(";
        // line 636
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/content/box-frame-edge.gif);\"></span>
        <span class=\"CaptionEdgeRightTop\"
              style=\"background-image:url(";
        // line 638
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/content/box-frame-edge.gif);\"></span>
        <span class=\"CaptionBorderTop\"
              style=\"background-image:url(";
        // line 640
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/content/table-headline-border.gif);\"></span>
        <span class=\"CaptionVerticalLeft\"
              style=\"background-image:url(";
        // line 642
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/content/box-frame-vertical.gif);\"></span>
        <div class=\"Text\">Public Information</div>
        <span class=\"CaptionVerticalRight\"
              style=\"background-image:url(";
        // line 645
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/content/box-frame-vertical.gif);\"></span>
        <span class=\"CaptionBorderBottom\"
              style=\"background-image:url(";
        // line 647
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/content/table-headline-border.gif);\"></span>
        <span class=\"CaptionEdgeLeftBottom\"
              style=\"background-image:url(";
        // line 649
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/content/box-frame-edge.gif);\"></span>
        <span class=\"CaptionEdgeRightBottom\"
              style=\"background-image:url(";
        // line 651
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/content/box-frame-edge.gif);\"></span>
      </div>
    </div>
    <tr>
      <td>
        <div class=\"InnerTableContainer\">
          <table style=\"width:100%;\">
            <tr>
              <td>
                <div class=\"TableContentAndRightShadow\">
                  <div class=\"TableContentContainer\">
                    <table class=\"TableContent\" width=\"100%\">
                      <tr>
                        <td>
                          <table style=\"width:100%;\">
                            <tr>
                              <td class=\"LabelV\">Real Name:</td>
                              <td style=\"width:90%;\">";
        // line 668
        echo twig_escape_filter($this->env, ($context["account_rlname"] ?? null), "html", null, true);
        echo "</td>
                            </tr>
                            <tr>
                              <td class=\"LabelV\">Address:</td>
                              <td style=\"width:90%;\">";
        // line 672
        echo twig_escape_filter($this->env, ($context["account_location"] ?? null), "html", null, true);
        echo "</td>
                            </tr>
                            <tr>
                              <td class=\"LabelV\">Phone:</td>
                              <td style=\"width:90%;\">";
        // line 676
        echo twig_escape_filter($this->env, ($context["account_phone"] ?? null), "html", null, true);
        echo "</td>
                            </tr>
                            ";
        // line 678
        if ((($context["account_show_rk"] ?? null) &&  !twig_test_empty(($context["recovery_key"] ?? null)))) {
            // line 679
            echo "                              <tr>
                                <td class=\"LabelV\">RK:</td>
                                <td style=\"width:90%;\">";
            // line 681
            echo twig_escape_filter($this->env, ($context["recovery_key"] ?? null), "html", null, true);
            echo "</td>
                              </tr>
                            ";
        }
        // line 684
        echo "                            </tr>
                          </table>
                        </td>
                        ";
        // line 687
        if ( !($context["account_update_info_on_register"] ?? null)) {
            // line 688
            echo "                          <td align=right>
                            <table border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
                              <form action=\"";
            // line 690
            echo twig_escape_filter($this->env, $this->env->getFunction('getLink')->getCallable()("account/info"), "html", null, true);
            echo "\" method=\"post\">
                                <tr>
                                  <td style=\"border:0px;\">
                                    ";
            // line 693
            echo twig_include($this->env, $context, "buttons.edit.html.twig");
            echo "
                                  </td>
                                </tr>
                              </form>
                            </table>
                          </td>
                        ";
        }
        // line 700
        echo "                      </tr>
                    </table>
                  </div>
                </div>
              </td>
            </tr>
          </table>
        </div>
      </td>
    </tr>
  </table>
</div>
<br/>

<a name=\"Account+Logs\"></a>
<div class=\"TopButtonContainer\">
  <div class=\"TopButton\">
    <a href=\"#top\">
      <img style=\"border:0px;\" src=\"";
        // line 718
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/content/back-to-top.gif\"/>
    </a>
  </div>
</div>
<div class=\"TableContainer\">
  <table class=\"Table5\" cellpadding=\"0\" cellspacing=\"0\">
    <div class=\"CaptionContainer\">
      <div class=\"CaptionInnerContainer\">
        <span class=\"CaptionEdgeLeftTop\"
              style=\"background-image:url(";
        // line 727
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/content/box-frame-edge.gif);\"></span>
        <span class=\"CaptionEdgeRightTop\"
              style=\"background-image:url(";
        // line 729
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/content/box-frame-edge.gif);\"></span>
        <span class=\"CaptionBorderTop\"
              style=\"background-image:url(";
        // line 731
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/content/table-headline-border.gif);\"></span>
        <span class=\"CaptionVerticalLeft\"
              style=\"background-image:url(";
        // line 733
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/content/box-frame-vertical.gif);\"></span>
        <div class=\"Text\">Account logs</div>
        <span class=\"CaptionVerticalRight\"
              style=\"background-image:url(";
        // line 736
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/content/box-frame-vertical.gif);\"></span>
        <span class=\"CaptionBorderBottom\"
              style=\"background-image:url(";
        // line 738
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/content/table-headline-border.gif);\"></span>
        <span class=\"CaptionEdgeLeftBottom\"
              style=\"background-image:url(";
        // line 740
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/content/box-frame-edge.gif);\"></span>
        <span class=\"CaptionEdgeRightBottom\"
              style=\"background-image:url(";
        // line 742
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/content/box-frame-edge.gif);\"></span>
      </div>
    </div>
    <tr>
      <td>
        <div class=\"InnerTableContainer\">
          <table style=\"width:100%;\">
            <tr>
              <td>
                <div class=\"TableContent\">
                  <div class=\"TableContentContainer\">
                    <table class=\"TableContent\" width=\"100%\">
                      <tr class=\"LabelH\">
                        <td style=\"width:60%\">Action</td>
                        <td style=\"width:30%\">Date</td>
                        <td style=\"width:10%\">IP</td>
                      </tr>
                      ";
        // line 760
        echo "                        ";
        $context["i"] = 0;
        // line 761
        echo "                        ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["actions"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["action"]) {
            // line 762
            echo "                          ";
            $context["i"] = (($context["i"] ?? null) + 1);
            // line 763
            echo "                          <tr style=\"background-color: ";
            echo $this->env->getFunction('getStyle')->getCallable()(($context["i"] ?? null));
            echo "\">
                            <td>";
            // line 764
            echo twig_get_attribute($this->env, $this->source, $context["action"], "action", [], "any", false, false, false, 764);
            echo "</td>
                            <td>";
            // line 765
            echo twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["action"], "date", [], "any", false, false, false, 765), "d M Y, H:i:s");
            echo "</td>
                            <td title=\"";
            // line 766
            echo twig_get_attribute($this->env, $this->source, $context["action"], "ipv6", [], "any", false, false, false, 766);
            echo "\">";
            echo twig_get_attribute($this->env, $this->source, $context["action"], "ip", [], "any", false, false, false, 766);
            echo "</td>
                          </tr>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['action'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 769
        echo "                      ";
        // line 770
        echo "                    </table>
                  </div>
                </div>
              </td>
            </tr>
          </table>
        </div>
      </td>
    </tr>
  </table>
</div>
";
    }

    public function getTemplateName()
    {
        return "account.management.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  1363 => 770,  1361 => 769,  1350 => 766,  1346 => 765,  1342 => 764,  1337 => 763,  1334 => 762,  1329 => 761,  1326 => 760,  1306 => 742,  1301 => 740,  1296 => 738,  1291 => 736,  1285 => 733,  1280 => 731,  1275 => 729,  1270 => 727,  1258 => 718,  1238 => 700,  1228 => 693,  1222 => 690,  1218 => 688,  1216 => 687,  1211 => 684,  1205 => 681,  1201 => 679,  1199 => 678,  1194 => 676,  1187 => 672,  1180 => 668,  1160 => 651,  1155 => 649,  1150 => 647,  1145 => 645,  1139 => 642,  1134 => 640,  1129 => 638,  1124 => 636,  1112 => 627,  1093 => 610,  1083 => 603,  1077 => 600,  1073 => 598,  1070 => 597,  1060 => 589,  1052 => 584,  1041 => 576,  1035 => 573,  1022 => 562,  1017 => 559,  1012 => 557,  1006 => 554,  1002 => 553,  997 => 551,  990 => 547,  986 => 546,  979 => 544,  974 => 542,  969 => 540,  963 => 538,  958 => 535,  953 => 533,  948 => 531,  943 => 529,  938 => 527,  933 => 525,  928 => 523,  919 => 521,  914 => 519,  899 => 507,  894 => 505,  889 => 503,  884 => 501,  878 => 498,  873 => 496,  868 => 494,  863 => 492,  851 => 483,  845 => 479,  837 => 474,  832 => 472,  827 => 470,  816 => 462,  810 => 459,  797 => 451,  789 => 446,  784 => 444,  778 => 441,  773 => 439,  768 => 437,  763 => 434,  761 => 433,  758 => 432,  743 => 418,  737 => 415,  732 => 414,  729 => 413,  723 => 410,  718 => 409,  715 => 408,  709 => 405,  704 => 404,  702 => 403,  697 => 401,  693 => 400,  673 => 382,  662 => 377,  655 => 375,  651 => 374,  646 => 371,  642 => 369,  638 => 367,  636 => 366,  631 => 364,  623 => 358,  618 => 356,  614 => 355,  611 => 354,  609 => 353,  603 => 350,  590 => 344,  584 => 340,  577 => 337,  574 => 336,  570 => 334,  568 => 333,  564 => 332,  557 => 328,  552 => 327,  549 => 326,  544 => 325,  542 => 324,  498 => 283,  493 => 281,  488 => 279,  483 => 277,  477 => 274,  472 => 272,  467 => 270,  462 => 268,  451 => 260,  445 => 256,  437 => 251,  432 => 249,  427 => 247,  411 => 234,  406 => 232,  398 => 227,  393 => 225,  387 => 222,  382 => 220,  377 => 218,  372 => 215,  370 => 214,  347 => 194,  340 => 190,  316 => 169,  311 => 167,  306 => 165,  301 => 163,  295 => 160,  290 => 158,  285 => 156,  280 => 154,  251 => 128,  242 => 122,  233 => 116,  199 => 85,  195 => 84,  191 => 82,  183 => 77,  177 => 74,  173 => 72,  171 => 71,  164 => 68,  160 => 67,  157 => 66,  152 => 64,  147 => 60,  141 => 57,  138 => 56,  131 => 54,  127 => 53,  124 => 52,  122 => 51,  102 => 34,  97 => 32,  92 => 30,  87 => 28,  81 => 25,  76 => 23,  71 => 21,  66 => 19,  54 => 10,  49 => 8,  43 => 5,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "account.management.html.twig", "C:\\UniServerZ\\www\\templates\\tibiacom\\account.management.html.twig");
    }
}
