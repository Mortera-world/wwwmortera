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

/* forum.show_thread.html.twig */
class __TwigTemplate_bf18644ad93a7b7ff97e0cb69362c867 extends \Twig\Template
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
        if (twig_get_attribute($this->env, $this->source, ($context["account"] ?? null), "logged", [], "any", false, false, false, 1)) {
            // line 2
            echo "  <p class=\"ForumWelcome\">You are <b>not</b> logged in.<br><a href=\"?account/manage\">Log in</a> to post on the forum.
  </p>
";
        }
        // line 5
        echo "<div class=\"ForumBreadCrumbs\">
  <a href=\"";
        // line 6
        echo twig_escape_filter($this->env, $this->env->getFunction('getLink')->getCallable()("forum"), "html", null, true);
        echo "\">Community Boards</a> | <a
    href=\"";
        // line 7
        echo twig_escape_filter($this->env, $this->env->getFunction('getLink')->getCallable()(("forum/board/" . twig_get_attribute($this->env, $this->source, ($context["section"] ?? null), "id", [], "any", false, false, false, 7))), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["section"] ?? null), "name", [], "any", false, false, false, 7), "html", null, true);
        echo "</a> | <b>";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["thread_starter"] ?? null), "post_topic", [], "any", false, false, false, 7), "html", null, true);
        echo "</b>
</div>
<div class=\"ForumBreadCrumbsSeparator\"></div>

<div class=\"TableContainer\">
  <div class=\"CaptionContainer\">
    <div class=\"CaptionInnerContainer\">
      <span class=\"CaptionEdgeLeftTop\"
            style=\"background-image:url(";
        // line 15
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/global/content/box-frame-edge.gif);\"></span>
      <span class=\"CaptionEdgeRightTop\"
            style=\"background-image:url(";
        // line 17
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/global/content/box-frame-edge.gif);\"></span> <span
        class=\"CaptionBorderTop\"
        style=\"background-image:url(";
        // line 19
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/global/content/table-headline-border.gif);\"></span> <span
        class=\"CaptionVerticalLeft\"
        style=\"background-image:url(";
        // line 21
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/global/content/box-frame-vertical.gif);\"></span>
      <div class=\"Text\">
        <a href=\"?subtopic=forum&action=new_post&thread_id=";
        // line 23
        echo twig_escape_filter($this->env, ($context["thread_id"] ?? null), "html", null, true);
        echo "\">
          <div class=\"TableHeaderRightButton\">
            <div class=\"BigButton\"
                 style=\"background-image:url(";
        // line 26
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/global/buttons/sbutton_green.gif)\">
              <div onmouseover=\"MouseOverBigButton(this);\" onmouseout=\"MouseOutBigButton(this);\">
                <div class=\"BigButtonOver\"
                     style=\"background-image: url(";
        // line 29
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/global/buttons/sbutton_green_over.gif); visibility: hidden;\"></div>
                <input class=\"BigButtonText\" type=\"submit\" value=\"Post Reply\"></div>
            </div>
          </div>
        </a>
        <div class=\"ForumTitleText\"><b>";
        // line 34
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["thread_starter"] ?? null), "post_topic", [], "any", false, false, false, 34), "html", null, true);
        echo "</b></div>
      </div>
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
        echo "/images/global/content/box-frame-edge.gif);\"></span> <span
        class=\"CaptionEdgeRightBottom\"
        style=\"background-image:url(";
        // line 43
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/global/content/box-frame-edge.gif);\"></span></div>
  </div>
  <table class=\"Table5\" cellpadding=\"0\" cellspacing=\"0\">
    <tbody>
    <tr>
      <td>
        <div class=\"InnerTableContainer\">
          <table style=\"width:100%;\">
            <tbody>
            <tr>
              <td class=\"PageNavigation\"><small>
                  <div style=\"float: left;\"><b>» Pages: <span class=\"PageLink \"><span
                          class=\"CurrentPageLink\">1</span></span></b></div>
                </small></td>
            </tr>
            <tr>
              <td>
                <div class=\"TableContentContainer\">
                  <table class=\"TableContent\" width=\"100%\" style=\"border:1px solid #faf0d7;\">
                    <tbody>
                    <tr class=\"LabelH\">
                      <td class=\"ForumPostHeaderCell\">
                        <div class=\"ForumPost ForumPostHeader\">
                          <div class=\"ForumPostHeaderAuthor\">Author</div>
                          <div class=\"ForumPostHeaderText\">Thread #";
        // line 67
        echo twig_escape_filter($this->env, ($context["thread_id"] ?? null), "html", null, true);
        echo "</div>
                          <div class=\"PostSeparatorV\"></div>
                        </div>
                      </td>
                    </tr>

                    ";
        // line 73
        $context["i"] = 0;
        // line 74
        echo "                    ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["posts"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["post"]) {
            // line 75
            echo "                      ";
            $context["i"] = (($context["i"] ?? null) + 1);
            // line 76
            echo "                      <tr bgcolor=\"";
            echo twig_escape_filter($this->env, $this->env->getFunction('getStyle')->getCallable()(($context["i"] ?? null)), "html", null, true);
            echo "\">
                        <td class=\"CipPost\">
                          <div id=\"\" class=\"ForumPost\" style=\"background-color:#F1E0C6;\">
                            <div class=\"PostBody\">
                              <div class=\"PostSeparatorV\"></div>
                              <div class=\"PostUpper\">
                                <div class=\"PostCharacterText\"><b>";
            // line 82
            echo ($context["author_link"] ?? null);
            echo "</b><br>
                                  ";
            // line 83
            if (twig_get_attribute($this->env, $this->source, $context["post"], "outfit", [], "any", true, true, false, 83)) {
                // line 84
                echo "                                    <img
                                      style=\"margin-left:";
                // line 85
                if (twig_in_filter(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["post"], "player", [], "any", false, false, false, 85), "getLookType", [], "method", false, false, false, 85), [0 => 75, 1 => 266, 2 => 302])) {
                    echo "-0px;margin-top:-0px;width:64px;height:64px;";
                } else {
                    echo "-60px;margin-top:-60px;width:128px;height:128px;";
                }
                echo "\"
                                      src=\"";
                // line 86
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["post"], "outfit", [], "any", false, false, false, 86), "html", null, true);
                echo "\" alt=\"player outfit\"/>
                                    <br/>
                                  ";
            }
            // line 89
            echo "
                                  <font class=\"ff_infotext\">
                                    ";
            // line 91
            if (twig_get_attribute($this->env, $this->source, $context["post"], "group", [], "any", true, true, false, 91)) {
                // line 92
                echo "                                      ";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["post"], "group", [], "any", false, false, false, 92), "html", null, true);
                echo "<br/>
                                    ";
            }
            // line 94
            echo "                                    Vocation: ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["post"], "vocation", [], "any", false, false, false, 94), "html", null, true);
            echo "<br>
                                    Level: ";
            // line 95
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["post"], "player", [], "any", false, false, false, 95), "getLevel", [], "method", false, false, false, 95), "html", null, true);
            echo "
                                    <br>
                                    <font class=\"ff_smallinfo\">
                                      ";
            // line 98
            if (twig_get_attribute($this->env, $this->source, $context["post"], "guildRank", [], "any", true, true, false, 98)) {
                // line 99
                echo "                                        ";
                echo twig_escape_filter($this->env, ($context["guildRank"] ?? null), "html", null, true);
                echo "<br/>
                                      ";
            }
            // line 101
            echo "                                    </font><br>
                                    <br>
                                    Posts: ";
            // line 103
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["post"], "author_posts_count", [], "any", false, false, false, 103), "html", null, true);
            echo "<br>
                                  </font></div>
                                <div class=\"PostText\">";
            // line 105
            echo twig_get_attribute($this->env, $this->source, $context["post"], "content", [], "any", false, false, false, 105);
            echo "</div>
                              </div>
                              <div class=\"PostLower\">
                                <div class=\"PostDetailsHelper\">
                                  <div class=\"PostDetails\">
                                    <img src=\"";
            // line 110
            echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
            echo "/images/global/forum/logo_oldpost.gif\" border=\"0\"
                                         width=\"14\" height=\"11\">";
            // line 111
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["post"], "date", [], "any", false, false, false, 111), "d.m.y H:i:s"), "html", null, true);
            echo "
                                    ";
            // line 112
            if (twig_get_attribute($this->env, $this->source, $context["post"], "edited_by", [], "any", true, true, false, 112)) {
                // line 113
                echo "                                      <br/>Edited by ";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["post"], "edited_by", [], "any", false, false, false, 113), "html", null, true);
                echo "
                                      <br/>on ";
                // line 114
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["post"], "edit_date", [], "any", false, false, false, 114), "d.m.y H:i:s"), "html", null, true);
                echo "
                                    ";
            }
            // line 116
            echo "                                  </div>
                                </div>
                                <div class=\"PostActions\">
                                  <div class=\"AdditionalBox\">Post #";
            // line 119
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["post"], "id", [], "any", false, false, false, 119), "html", null, true);
            echo "</div>
                                  ";
            // line 120
            if (($context["is_moderator"] ?? null)) {
                // line 121
                echo "                                    ";
                if ((twig_get_attribute($this->env, $this->source, $context["post"], "first_post", [], "any", false, false, false, 121) != twig_get_attribute($this->env, $this->source, $context["post"], "id", [], "any", false, false, false, 121))) {
                    // line 122
                    echo "                                      <a href=\"?subtopic=forum&action=remove_post&id=";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["post"], "id", [], "any", false, false, false, 122), "html", null, true);
                    echo "\" title=\"Remove Post\"
                                         onclick=\"return confirm('Are you sure you want remove post of ";
                    // line 123
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["post"], "player", [], "any", false, false, false, 123), "getName", [], "method", false, false, false, 123), "html", null, true);
                    echo "?')\"><img
                                          src=\"images/del.png\"/> Remove Post</a>
                                    ";
                } else {
                    // line 126
                    echo "                                      <a href=\"?subtopic=forum&action=move_thread&id=";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["post"], "id", [], "any", false, false, false, 126), "html", null, true);
                    echo "\" title=\"Move Thread\"><img
                                          src=\"images/icons/arrow_right.gif\"/> Move Thread</a>
                                      <a href=\"?subtopic=forum&action=remove_post&id=";
                    // line 128
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["post"], "id", [], "any", false, false, false, 128), "html", null, true);
                    echo "\"
                                         title=\"Remove Thread\" target=\"_blank\"
                                         onclick=\"return confirm('Are you sure you want remove thread > ";
                    // line 130
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["post"], "post_topic", [], "any", false, false, false, 130), "html", null, true);
                    echo " <?')\"><img
                                          src=\"images/del.png\"/> Remove Thread</a>
                                    ";
                }
                // line 133
                echo "                                  ";
            }
            // line 134
            echo "
                                  ";
            // line 135
            if ((($context["logged"] ?? null) && ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["post"], "player", [], "any", false, false, false, 135), "getAccount", [], "method", false, false, false, 135), "getId", [], "method", false, false, false, 135) == twig_get_attribute($this->env, $this->source, ($context["account_logged"] ?? null), "getId", [], "method", false, false, false, 135)) || ($context["is_moderator"] ?? null)))) {
                // line 136
                echo "                                    <a href=\"?subtopic=forum&action=edit_post&id=";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["post"], "id", [], "any", false, false, false, 136), "html", null, true);
                echo "\" title=\"Edit Post\"
                                       target=\"_blank\">
                                      <img src=\"images/edit.png\"/> Edit Post</a>
                                  ";
            }
            // line 140
            echo "                                  ";
            if (($context["logged"] ?? null)) {
                // line 141
                echo "                                    <a
                                      href=\"?subtopic=forum&action=new_post&thread_id=";
                // line 142
                echo twig_escape_filter($this->env, ($context["thread_id"] ?? null), "html", null, true);
                echo "&quote=";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["post"], "id", [], "any", false, false, false, 142), "html", null, true);
                echo "\"
                                      title=\"Quote Post\"><img src=\"images/icons/comment_add.png\"/> Quote Post</a>
                                  ";
            }
            // line 145
            echo "                                </div>
                              </div>
                            </div>
                          </div>
                        </td>
                      </tr>
                      ";
            // line 151
            $context["i"] = (($context["i"] ?? null) + 1);
            // line 152
            echo "                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['post'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 153
        echo "                    </tbody>
                  </table>
                </div>
              </td>
            </tr>
            <tr>
              <td class=\"PageNavigation\"><small>
                  <div style=\"float: left;\"><b>» Pages: <span class=\"PageLink \"><span
                          class=\"CurrentPageLink\">";
        // line 161
        echo ($context["links_to_pages"] ?? null);
        echo "</span></span></b></div>
                </small></td>
            </tr>
            </tbody>
          </table>
        </div>
      </td>
    </tr>
    </tbody>
  </table>
</div>

<table border=\"0\" cellpadding=\"6\" cellspacing=\"0\" width=\"100%\">
  <tbody>
  <tr>
    <td class=\"ThreadClassificationControls\" colspan=\"1\" align=\"left\" valign=\" top\"></td>
    <td class=\"ff_large\" colspan=\"1\" align=\"right\" valign=\"top\">
      <div style=\"float: right;\">
        <a href=\"?subtopic=forum&action=new_post&thread_id=";
        // line 179
        echo twig_escape_filter($this->env, ($context["thread_id"] ?? null), "html", null, true);
        echo "\">
          <div class=\"BigButton\"
               style=\"background-image:url(";
        // line 181
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/global/buttons/sbutton_green.gif)\">
            <div onmouseover=\"MouseOverBigButton(this);\" onmouseout=\"MouseOutBigButton(this);\">
              <div class=\"BigButtonOver\"
                   style=\"background-image: url(";
        // line 184
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/global/buttons/sbutton_green_over.gif); visibility: hidden;\"></div>
              <input class=\"BigButtonText\" type=\"submit\" value=\"Post Reply\"></div>
          </div>
        </a>
      </div>
    </td>
  </tr>
  </tbody>
</table>

<br>

<b>Board Rights:<br></b>
View threads.
<br><br>
Replace code is ON. Smileys are ON. Images are OFF. Links are ON. \"Thank You!\" option is OFF.
<br>
Account muting option is ON.












";
    }

    public function getTemplateName()
    {
        return "forum.show_thread.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  404 => 184,  398 => 181,  393 => 179,  372 => 161,  362 => 153,  356 => 152,  354 => 151,  346 => 145,  338 => 142,  335 => 141,  332 => 140,  324 => 136,  322 => 135,  319 => 134,  316 => 133,  310 => 130,  305 => 128,  299 => 126,  293 => 123,  288 => 122,  285 => 121,  283 => 120,  279 => 119,  274 => 116,  269 => 114,  264 => 113,  262 => 112,  258 => 111,  254 => 110,  246 => 105,  241 => 103,  237 => 101,  231 => 99,  229 => 98,  223 => 95,  218 => 94,  212 => 92,  210 => 91,  206 => 89,  200 => 86,  192 => 85,  189 => 84,  187 => 83,  183 => 82,  173 => 76,  170 => 75,  165 => 74,  163 => 73,  154 => 67,  127 => 43,  122 => 41,  117 => 39,  112 => 37,  106 => 34,  98 => 29,  92 => 26,  86 => 23,  81 => 21,  76 => 19,  71 => 17,  66 => 15,  51 => 7,  47 => 6,  44 => 5,  39 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "forum.show_thread.html.twig", "C:\\UniServerZ\\www\\system\\templates\\forum.show_thread.html.twig");
    }
}
