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

/* guild-wars-old/templates/guild_wars.html.twig */
class __TwigTemplate_b551526dc31cfcef130bf7db6a3644fe extends \Twig\Template
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
        $context["isWarsPage"] = (twig_constant("PAGE") == "wars");
        // line 2
        echo "
";
        // line 3
        if (($context["isWarsPage"] ?? null)) {
            // line 4
            echo "To invite guild to war use your guild page.<br/><br/>
";
        }
        // line 6
        echo "
<script type=\"text/javascript\">
\tfunction show_hide(flip)
\t{
\t\tvar tmp = document.getElementById(flip);
\t\tif(tmp) {
\t\t\ttmp.style.display = tmp.style.display === 'none' ? '' : 'none';
\t\t}
\t}
</script>

<div class=\"TableContainer\">
\t<div class=\"CaptionContainer\">
\t\t<div class=\"CaptionInnerContainer\">
\t\t\t<span class=\"CaptionEdgeLeftTop\" style=\"background-image:url(";
        // line 20
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/content/box-frame-edge.gif);\"></span>
\t\t\t<span class=\"CaptionEdgeRightTop\" style=\"background-image:url(";
        // line 21
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/content/box-frame-edge.gif);\"></span>
\t\t\t<span class=\"CaptionBorderTop\" style=\"background-image:url(";
        // line 22
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/content/table-headline-border.gif);\"></span>
\t\t\t<span class=\"CaptionVerticalLeft\" style=\"background-image:url(";
        // line 23
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/content/box-frame-vertical.gif);\"></span>
\t\t\t<div class=\"Text\">Guild Wars</div>
\t\t\t<span class=\"CaptionVerticalRight\" style=\"background-image:url(";
        // line 25
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/content/box-frame-vertical.gif);\"></span>
\t\t\t<span class=\"CaptionBorderBottom\" style=\"background-image:url(";
        // line 26
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/content/table-headline-border.gif);\"></span>
\t\t\t<span class=\"CaptionEdgeLeftBottom\" style=\"background-image:url(";
        // line 27
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/content/box-frame-edge.gif);\"></span>
\t\t\t<span class=\"CaptionEdgeRightBottom\" style=\"background-image:url(";
        // line 28
        echo twig_escape_filter($this->env, ($context["template_path"] ?? null), "html", null, true);
        echo "/images/content/box-frame-edge.gif);\"></span>
\t\t</div>
\t</div>

\t<table class=\"Table3\" cellpadding=\"0\" cellspacing=\"0\">
\t\t<tbody>
\t\t<tr>
\t\t\t<td>
\t\t\t\t<div class=\"InnerTableContainer\">
\t\t\t\t\t<table style=\"width:100%;\">
\t\t\t\t\t\t<tbody>
\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t\t";
        // line 41
        if (((($context["logged"] ?? null) && ($context["isLeader"] ?? null)) &&  !($context["isWarsPage"] ?? null))) {
            // line 42
            echo "\t\t\t\t\t\t\t\t\t<a href=\"?p=wars&action=choose_enemy&guild=";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["guild"] ?? null), "getId", [], "method", false, false, false, 42), "html", null, true);
            echo "\"><b>Click here to start new war</b></a> - only guild leader can invite other guild to war.<br/><br/>
\t\t\t\t\t\t\t\t";
        }
        // line 44
        echo "\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t</tr>
\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t\t<div class=\"TableContentContainer\">
\t\t\t\t\t\t\t\t\t<table class=\"TableContent\" width=\"100%\">
\t\t\t\t\t\t\t\t\t\t";
        // line 50
        if ((twig_length_filter($this->env, ($context["wars"] ?? null)) > 0)) {
            // line 51
            echo "\t\t\t\t\t\t\t\t\t\t<tr style=\"text-align: center; background: ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["config"] ?? null), "vdarkborder", [], "any", false, false, false, 51), "html", null, true);
            echo "\">
\t\t\t\t\t\t\t\t\t\t\t<td style=\"width: 150px\" class=\"white\"><b>Aggressor</b></td>
\t\t\t\t\t\t\t\t\t\t\t<td class=\"white\"><b>Information</b></td>
\t\t\t\t\t\t\t\t\t\t\t<td style=\"width: 150px\" class=\"white\"><b>Enemy</b></td>
\t\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t\t";
            // line 56
            $context["i"] = 0;
            // line 57
            echo "\t\t\t\t\t\t\t\t\t\t";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["wars"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["war"]) {
                // line 58
                echo "\t\t\t\t\t\t\t\t\t\t\t";
                $context["i"] = (($context["i"] ?? null) + 1);
                // line 59
                echo "\t\t\t\t\t\t\t\t\t\t\t<tr style=\"background: ";
                echo twig_escape_filter($this->env, $this->env->getFunction('getStyle')->getCallable()(($context["i"] ?? null)), "html", null, true);
                echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t<td align=\"center\"><a href=\"";
                // line 60
                echo twig_escape_filter($this->env, $this->env->getFunction('getGuildLink')->getCallable()(twig_get_attribute($this->env, $this->source, $context["war"], "guild1", [], "any", false, false, false, 60), false), "html", null, true);
                echo "\"><img src=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["war"], "guildLogoPath1", [], "any", false, false, false, 60), "html", null, true);
                echo "\" width=\"64\" height=\"64\" border=\"0\" alt=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["war"], "name1", [], "any", false, false, false, 60), "html", null, true);
                echo " Logo\"/><br />";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["war"], "name1", [], "any", false, false, false, 60), "html", null, true);
                echo "</a></td>

\t\t\t\t\t\t\t\t\t\t\t\t<td align=\"center\">
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                // line 63
                if ((twig_get_attribute($this->env, $this->source, $context["war"], "status", [], "any", false, false, false, 63) == 0)) {
                    // line 64
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    if (($context["isWarsPage"] ?? null)) {
                        // line 65
                        echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<span style=\"color: black\"><b>Pending acceptation</b>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<br/>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        // line 68
                        if (twig_get_attribute($this->env, $this->source, $context["war"], "started", [], "any", true, true, false, 68)) {
                            // line 69
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<span style=\"color: black\">Invited on ";
                            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["war"], "started", [], "any", false, false, false, 69), "M d Y, H:i:s"), "html", null, true);
                            echo " for
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                            // line 70
                            if (twig_get_attribute($this->env, $this->source, $context["war"], "frags_limit", [], "any", true, true, false, 70)) {
                                // line 71
                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["war"], "frags_limit", [], "any", false, false, false, 71), "html", null, true);
                                echo " frags.
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                            } else {
                                // line 73
                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t7 days war.
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                            }
                            // line 75
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        } elseif (twig_get_attribute($this->env, $this->source,                         // line 76
$context["war"], "declaration_date", [], "any", true, true, false, 76)) {
                            // line 77
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\tInvited on ";
                            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["war"], "declaration_date", [], "any", false, false, false, 77), "M d Y, H:i:s"), "html", null, true);
                            echo " for ";
                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["war"], "frag_limit", [], "any", false, false, false, 77), "html", null, true);
                            echo " frags war.
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        }
                        // line 79
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<br/>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<br/><br/>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</span>

\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    } else {
                        // line 84
                        echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<font color=\"black\"><b>Pending acceptation</b><br/>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        // line 86
                        if (twig_get_attribute($this->env, $this->source, $context["war"], "started", [], "any", true, true, false, 86)) {
                            // line 87
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<span style=\"color: black\">Invited on ";
                            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["war"], "started", [], "any", false, false, false, 87), "M d Y, H:i:s"), "html", null, true);
                            echo " for
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                            // line 88
                            if (twig_get_attribute($this->env, $this->source, $context["war"], "frags_limit", [], "any", true, true, false, 88)) {
                                // line 89
                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["war"], "frags_limit", [], "any", false, false, false, 89), "html", null, true);
                                echo " frags.
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                            } else {
                                // line 91
                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t7 days war.
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                            }
                            // line 93
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        } elseif (twig_get_attribute($this->env, $this->source,                         // line 94
$context["war"], "declaration_date", [], "any", true, true, false, 94)) {
                            // line 95
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\tInvited on ";
                            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["war"], "declaration_date", [], "any", false, false, false, 95), "M d Y, H:i:s"), "html", null, true);
                            echo " for ";
                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["war"], "frag_limit", [], "any", false, false, false, 95), "html", null, true);
                            echo " frags war. The bounty for this war is set to ";
                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["war"], "bounty", [], "any", false, false, false, 95), "html", null, true);
                            echo " gold coins.
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        }
                        // line 97
                        echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<br/>

\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        // line 100
                        if ((($context["isLeader"] ?? null) && (twig_get_attribute($this->env, $this->source, $context["war"], "guild2", [], "any", false, false, false, 100) == twig_get_attribute($this->env, $this->source, ($context["guild"] ?? null), "getId", [], "method", false, false, false, 100)))) {
                            // line 101
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<br />
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<a href=\"?p=wars&action=invitation_accept&guild=";
                            // line 102
                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["guild"] ?? null), "getId", [], "method", false, false, false, 102), "html", null, true);
                            echo "&war=";
                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["war"], "id", [], "any", false, false, false, 102), "html", null, true);
                            echo "\" onclick=\"return confirm('Are you sure that you want ACCEPT that invitation?');\" style=\"cursor: pointer;\">&raquo; Click here to <span style=\"color: lime;\">accept</span> invitation to war &laquo;</a>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<br/><br/>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<a href=\"?p=wars&action=invitation_reject&guild=";
                            // line 104
                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["guild"] ?? null), "getId", [], "method", false, false, false, 104), "html", null, true);
                            echo "&war=";
                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["war"], "id", [], "any", false, false, false, 104), "html", null, true);
                            echo "\" onclick=\"return confirm('Are you sure that you want REJECT that invitation?');\" style=\"cursor: pointer;\">&raquo; Click here to <span style=\"color: darkred;\">reject</span> invitation to war &laquo;</a>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        }
                        // line 106
                        echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        // line 107
                        if ((($context["isLeader"] ?? null) && (twig_get_attribute($this->env, $this->source, $context["war"], "guild1", [], "any", false, false, false, 107) == twig_get_attribute($this->env, $this->source, ($context["guild"] ?? null), "getId", [], "method", false, false, false, 107)))) {
                            // line 108
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<br /><br /><a href=\"?p=wars&action=invitation_cancel&guild=";
                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["guild"] ?? null), "getId", [], "method", false, false, false, 108), "html", null, true);
                            echo "&war=";
                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["war"], "id", [], "any", false, false, false, 108), "html", null, true);
                            echo "\" onclick=\"return confirm('Are you sure that you want CANCEL that invitation?');\" style=\"cursor: pointer;\">&raquo; Click here to <span style=\"color: darkred;\">cancel</span> invitation to war &laquo;</a>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        }
                        // line 110
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</font>

\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    }
                    // line 113
                    echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                } elseif ((twig_get_attribute($this->env, $this->source,                 // line 114
$context["war"], "status", [], "any", false, false, false, 114) == 1)) {
                    // line 115
                    echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<span style=\"font-size: 12px\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<span style=\"color: red;\">";
                    // line 117
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["war"], "guild1_kills", [], "any", false, false, false, 117), "html", null, true);
                    echo "</span>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<span style=\"color: black\"> : </span><span style=\"color: lime;\">";
                    // line 118
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["war"], "guild2_kills", [], "any", false, false, false, 118), "html", null, true);
                    echo "</span>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t</span><br/>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<br/>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<span style=\"color: darkred; font-weight: bold;\">On a brutal war</span><br/>

\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    // line 123
                    if (twig_get_attribute($this->env, $this->source, $context["war"], "started", [], "any", true, true, false, 123)) {
                        // line 124
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<span style=\"color: black\">Began on ";
                        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["war"], "started", [], "any", false, false, false, 124), "M d Y, H:i:s"), "html", null, true);
                        echo ",
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        // line 125
                        if (twig_get_attribute($this->env, $this->source, $context["war"], "frags_limit", [], "any", true, true, false, 125)) {
                            // line 126
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\twill end up after ";
                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["war"], "frags_limit", [], "any", false, false, false, 126), "html", null, true);
                            echo " frags.
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        } else {
                            // line 128
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\twill end up after server restart after ";
                            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, (twig_get_attribute($this->env, $this->source, $context["war"], "started", [], "any", false, false, false, 128) + (7 * 86400)), "M d Y, H:i:s"), "html", null, true);
                            echo ".<br/>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        }
                        // line 130
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    } elseif (twig_get_attribute($this->env, $this->source,                     // line 131
$context["war"], "declaration_date", [], "any", true, true, false, 131)) {
                        // line 132
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<span style=\"color: black\">Began on ";
                        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["war"], "declaration_date", [], "any", false, false, false, 132), "M d Y, H:i:s"), "html", null, true);
                        echo ", will end up after ";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["war"], "frag_limit", [], "any", false, false, false, 132), "html", null, true);
                        echo " frags.<br/>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    }
                    // line 135
                    echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<br/><br/>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    // line 137
                    if (twig_in_filter(twig_get_attribute($this->env, $this->source, $context["war"], "status", [], "any", false, false, false, 137), [0 => 1, 1 => 4])) {
                        // line 138
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<a onclick=\"show_hide('war-details:";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["war"], "id", [], "any", false, false, false, 138), "html", null, true);
                        echo "'); return false;\" style=\"cursor: pointer;\">&raquo; Details &laquo;</a>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    }
                    // line 140
                    echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                } elseif ((twig_get_attribute($this->env, $this->source,                 // line 141
$context["war"], "status", [], "any", false, false, false, 141) == 2)) {
                    // line 142
                    echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<span style=\"color: black\"><b>Rejected invitation</b><br />Invited on ";
                    // line 143
                    echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["war"], "started", [], "any", false, false, false, 143), "M d Y, H:i:s"), "html", null, true);
                    echo ", rejected on ";
                    echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["war"], "ended", [], "any", false, false, false, 143), "M d Y, H:i:s"), "html", null, true);
                    echo ".";
                    if (($context["isWarsPage"] ?? null)) {
                        echo "<br/><br/><br/>";
                    }
                    echo "</span>

\t\t\t\t\t\t\t\t\t\t\t\t\t";
                } elseif ((twig_get_attribute($this->env, $this->source,                 // line 145
$context["war"], "status", [], "any", false, false, false, 145) == 3)) {
                    // line 146
                    echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<span style=\"color: black\"><b>Canceled invitation</b><br />Sent invite on ";
                    // line 147
                    echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["war"], "started", [], "any", false, false, false, 147), "M d Y, H:i:s"), "html", null, true);
                    echo ", canceled on ";
                    echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["war"], "ended", [], "any", false, false, false, 147), "M d Y, H:i:s"), "html", null, true);
                    echo ".";
                    if (($context["isWarsPage"] ?? null)) {
                        echo "<br/><br/><br/>";
                    }
                    echo "</span>

\t\t\t\t\t\t\t\t\t\t\t\t\t";
                } elseif (((twig_get_attribute($this->env, $this->source,                 // line 149
$context["war"], "status", [], "any", false, false, false, 149) == 4) || (twig_get_attribute($this->env, $this->source, $context["war"], "status", [], "any", false, false, false, 149) == 5))) {
                    // line 150
                    echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    // line 151
                    if ( !($context["isWarsPage"] ?? null)) {
                        // line 152
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<span style=\"color: black\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    }
                    // line 154
                    echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<b><i>Ended</i></b><br />
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    // line 156
                    if (twig_get_attribute($this->env, $this->source, $context["war"], "started", [], "any", true, true, false, 156)) {
                        // line 157
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\tBegan on ";
                        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["war"], "started", [], "any", false, false, false, 157), "M d Y, H:i:s"), "html", null, true);
                        echo ", ended on ";
                        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["war"], "ended", [], "any", false, false, false, 157), "M d Y, H:i:s"), "html", null, true);
                        echo ".
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    } elseif (twig_get_attribute($this->env, $this->source,                     // line 158
$context["war"], "declaration_date", [], "any", true, true, false, 158)) {
                        // line 159
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\tBegan on ";
                        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["war"], "declaration_date", [], "any", false, false, false, 159), "M d Y, H:i:s"), "html", null, true);
                        echo ".
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    }
                    // line 161
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\tFrag statistics: <span style=\"color: red;\">";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["war"], "guild1_kills", [], "any", false, false, false, 161), "html", null, true);
                    echo "</span> to <span style=\"color: lime;\">";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["war"], "guild2_kills", [], "any", false, false, false, 161), "html", null, true);
                    echo "</span>.
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<br/><br/>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    // line 163
                    if (twig_in_filter(twig_get_attribute($this->env, $this->source, $context["war"], "status", [], "any", false, false, false, 163), [0 => 1, 1 => 4])) {
                        // line 164
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<a onclick=\"show_hide('war-details:";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["war"], "id", [], "any", false, false, false, 164), "html", null, true);
                        echo "'); return false;\" style=\"cursor: pointer;\">&raquo; Details &laquo;</a>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    }
                    // line 166
                    echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    // line 167
                    if ( !($context["isWarsPage"] ?? null)) {
                        // line 168
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    }
                    // line 170
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t";
                }
                // line 171
                echo "\t\t\t\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t\t\t\t<td align=\"center\"><a href=\"";
                // line 172
                echo twig_escape_filter($this->env, $this->env->getFunction('getGuildLink')->getCallable()(twig_get_attribute($this->env, $this->source, $context["war"], "guild2", [], "any", false, false, false, 172), false), "html", null, true);
                echo "\"><img src=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["war"], "guildLogoPath2", [], "any", false, false, false, 172), "html", null, true);
                echo "\" width=\"64\" height=\"64\" border=\"0\" alt=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["war"], "name2", [], "any", false, false, false, 172), "html", null, true);
                echo " Logo\"/><br/>";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["war"], "name2", [], "any", false, false, false, 172), "html", null, true);
                echo "</a></td>
\t\t\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t\t\t<tr id=\"war-details:";
                // line 174
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["war"], "id", [], "any", false, false, false, 174), "html", null, true);
                echo "\" style=\"display: none; background: ";
                echo twig_escape_filter($this->env, $this->env->getFunction('getStyle')->getCallable()(($context["i"] ?? null)), "html", null, true);
                echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t<td colspan=\"3\">
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                // line 176
                if (twig_in_filter(twig_get_attribute($this->env, $this->source, $context["war"], "status", [], "any", false, false, false, 176), [0 => 1, 1 => 4])) {
                    // line 177
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    if ((twig_get_attribute($this->env, $this->source, ($context["warFrags"] ?? null), twig_get_attribute($this->env, $this->source, $context["war"], "id", [], "any", false, false, false, 177), [], "array", true, true, false, 177) && (twig_length_filter($this->env, (($__internal_compile_0 = ($context["warFrags"] ?? null)) && is_array($__internal_compile_0) || $__internal_compile_0 instanceof ArrayAccess ? ($__internal_compile_0[twig_get_attribute($this->env, $this->source, $context["war"], "id", [], "any", false, false, false, 177)] ?? null) : null)) > 0))) {
                        // line 178
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        $context['_parent'] = $context;
                        $context['_seq'] = twig_ensure_traversable((($__internal_compile_1 = ($context["warFrags"] ?? null)) && is_array($__internal_compile_1) || $__internal_compile_1 instanceof ArrayAccess ? ($__internal_compile_1[twig_get_attribute($this->env, $this->source, $context["war"], "id", [], "any", false, false, false, 178)] ?? null) : null));
                        foreach ($context['_seq'] as $context["_key"] => $context["frag"]) {
                            // line 179
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["frag"], "time", [], "any", false, false, false, 179), "j M Y, H:i"), "html", null, true);
                            echo " <span style=\"font-weight: bold; color: ";
                            if ((twig_get_attribute($this->env, $this->source, $context["frag"], "killerguild", [], "any", false, false, false, 179) == twig_get_attribute($this->env, $this->source, $context["war"], "guild1", [], "any", false, false, false, 179))) {
                                echo "red";
                            } else {
                                echo "lime";
                            }
                            echo "\">+</span><a href=\"";
                            echo twig_escape_filter($this->env, $this->env->getFunction('getPlayerLink')->getCallable()(twig_get_attribute($this->env, $this->source, $context["frag"], "killer", [], "any", false, false, false, 179), false), "html", null, true);
                            echo "\"><b>";
                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["frag"], "killer", [], "any", false, false, false, 179), "html", null, true);
                            echo "</b></a> killed <a href=\"";
                            echo twig_escape_filter($this->env, $this->env->getFunction('getPlayerLink')->getCallable()(twig_get_attribute($this->env, $this->source, $context["frag"], "target", [], "any", false, false, false, 179), false), "html", null, true);
                            echo "\"> ";
                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["frag"], "target", [], "any", false, false, false, 179), "html", null, true);
                            echo "</a>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['frag'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 181
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    } else {
                        // line 182
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<center>There were no frags on this war so far.</center>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    }
                    // line 184
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t";
                }
                // line 185
                echo "\t\t\t\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['war'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 188
            echo "\t\t\t\t\t\t\t\t\t\t";
        } else {
            // line 189
            echo "\t\t\t\t\t\t\t\t\t\t<tr style=\"background: ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["config"] ?? null), "darkborder", [], "any", false, false, false, 189), "html", null, true);
            echo "\">
\t\t\t\t\t\t\t\t\t\t\t<td colspan=\"3\">Currently, there are no active wars.</td>
\t\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t\t";
        }
        // line 193
        echo "\t\t\t\t\t\t\t\t\t</table>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t</tr>
\t\t\t\t\t\t</tbody>
\t\t\t\t\t</table>
\t\t\t\t</div>
\t\t\t</td>
\t\t</tr>
\t\t</tbody>
\t</table>
</div>
<br/>
";
    }

    public function getTemplateName()
    {
        return "guild-wars-old/templates/guild_wars.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  538 => 193,  530 => 189,  527 => 188,  519 => 185,  516 => 184,  512 => 182,  509 => 181,  486 => 179,  481 => 178,  478 => 177,  476 => 176,  469 => 174,  458 => 172,  455 => 171,  452 => 170,  448 => 168,  446 => 167,  443 => 166,  437 => 164,  435 => 163,  427 => 161,  421 => 159,  419 => 158,  412 => 157,  410 => 156,  406 => 154,  402 => 152,  400 => 151,  397 => 150,  395 => 149,  384 => 147,  381 => 146,  379 => 145,  368 => 143,  365 => 142,  363 => 141,  360 => 140,  354 => 138,  352 => 137,  348 => 135,  339 => 132,  337 => 131,  334 => 130,  328 => 128,  322 => 126,  320 => 125,  315 => 124,  313 => 123,  305 => 118,  301 => 117,  297 => 115,  295 => 114,  292 => 113,  287 => 110,  279 => 108,  277 => 107,  274 => 106,  267 => 104,  260 => 102,  257 => 101,  255 => 100,  250 => 97,  240 => 95,  238 => 94,  235 => 93,  231 => 91,  225 => 89,  223 => 88,  218 => 87,  216 => 86,  212 => 84,  205 => 79,  197 => 77,  195 => 76,  192 => 75,  188 => 73,  182 => 71,  180 => 70,  175 => 69,  173 => 68,  168 => 65,  165 => 64,  163 => 63,  151 => 60,  146 => 59,  143 => 58,  138 => 57,  136 => 56,  127 => 51,  125 => 50,  117 => 44,  111 => 42,  109 => 41,  93 => 28,  89 => 27,  85 => 26,  81 => 25,  76 => 23,  72 => 22,  68 => 21,  64 => 20,  48 => 6,  44 => 4,  42 => 3,  39 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "guild-wars-old/templates/guild_wars.html.twig", "C:\\UniServerZ\\www\\plugins\\guild-wars-old\\templates\\guild_wars.html.twig");
    }
}
