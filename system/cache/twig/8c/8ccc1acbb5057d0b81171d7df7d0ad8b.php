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

/* guilds.view.html.twig */
class __TwigTemplate_e3b1d83deceb530c3146aa2f45a9e616 extends \Twig\Template
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
        echo "<link rel=\"stylesheet\" href=\"/tools/simple-page.css?v=20260529\">

";
        // line 3
        $context["guildOwnerName"] = (( !twig_test_empty(($context["guild_owner"] ?? null))) ? (twig_get_attribute($this->env, $this->source, ($context["guild_owner"] ?? null), "getName", [], "method", false, false, false, 3)) : ("Unknown"));
        // line 4
        $context["memberTotal"] = 0;
        // line 5
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["guild_members"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["rank"]) {
            // line 6
            echo "  ";
            $context["memberTotal"] = (($context["memberTotal"] ?? null) + twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, $context["rank"], "members", [], "any", false, false, false, 6)));
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['rank'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 8
        echo "
<div class=\"guilds-page\">
  <section class=\"guild-view-hero\">
    <div class=\"guild-view-logo\">
      <img src=\"images/guilds/";
        // line 12
        echo twig_escape_filter($this->env, ($context["logo"] ?? null), "html", null, true);
        echo "\" alt=\"";
        echo twig_escape_filter($this->env, ($context["guild_name"] ?? null), "html", null, true);
        echo "\">
    </div>

    <div class=\"guild-view-title\">
      <span>Guild Profile</span>
      <h1>";
        // line 17
        echo twig_escape_filter($this->env, ($context["guild_name"] ?? null), "html", null, true);
        echo "</h1>
      <p>";
        // line 18
        echo twig_escape_filter($this->env, ($context["memberTotal"] ?? null), "html", null, true);
        echo " ";
        if ((($context["memberTotal"] ?? null) == 1)) {
            echo "member";
        } else {
            echo "members";
        }
        echo " on ";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["config"] ?? null), "lua", [], "any", false, false, false, 18), "serverName", [], "any", false, false, false, 18), "html", null, true);
        echo "</p>
    </div>

    <a class=\"guild-button guild-button-view\" href=\"";
        // line 21
        echo twig_escape_filter($this->env, $this->env->getFunction('getLink')->getCallable()("guilds"), "html", null, true);
        echo "\">Back</a>
  </section>

  <section class=\"guild-view-layout\">
    <article class=\"guild-panel guild-info-panel\">
      <span>Guild Information</span>
      <h2>Overview</h2>

      ";
        // line 29
        if ( !twig_test_empty(($context["description"] ?? null))) {
            // line 30
            echo "        <div class=\"guild-description\">";
            echo ($context["description"] ?? null);
            echo "</div>
      ";
        } else {
            // line 32
            echo "        <p>No public description has been added for this guild yet.</p>
      ";
        }
        // line 34
        echo "
      <div class=\"guild-info-grid\">
        <div>
          <span>Leader</span>
          <strong><a href=\"";
        // line 38
        echo twig_escape_filter($this->env, $this->env->getFunction('getPlayerLink')->getCallable()(($context["guildOwnerName"] ?? null), false), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, ($context["guildOwnerName"] ?? null), "html", null, true);
        echo "</a></strong>
        </div>
        <div>
          <span>Founded</span>
          <strong>";
        // line 42
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, ($context["guild_creation_date"] ?? null), "M d, Y"), "html", null, true);
        echo "</strong>
        </div>
        <div>
          <span>Bank Balance</span>
          <strong>";
        // line 46
        echo twig_escape_filter($this->env, ($context["guild_balance"] ?? null), "html", null, true);
        echo " gold</strong>
        </div>
        ";
        // line 48
        if ((($context["guild_house"] ?? null) && ($context["isVice"] ?? null))) {
            // line 49
            echo "          <div>
            <span>Guild House</span>
            <strong>";
            // line 51
            echo twig_escape_filter($this->env, ($context["guild_house"] ?? null), "html", null, true);
            echo "</strong>
          </div>
        ";
        }
        // line 54
        echo "      </div>
    </article>

    <aside class=\"guild-panel guild-actions-panel\">
      <span>Actions</span>
      <h2>Navigation</h2>

      <div class=\"guild-action-list\">
        ";
        // line 62
        if (($context["isLeader"] ?? null)) {
            // line 63
            echo "          <a class=\"guild-button guild-button-view\" href=\"?subtopic=guilds&action=manager&guild=";
            echo twig_escape_filter($this->env, twig_urlencode_filter(($context["guild_name"] ?? null)), "html", null, true);
            echo "\">Edit Ranks</a>
          <a class=\"guild-button guild-button-view\" href=\"?subtopic=guilds&guild=";
            // line 64
            echo twig_escape_filter($this->env, twig_urlencode_filter(($context["guild_name"] ?? null)), "html", null, true);
            echo "&action=change_logo\">Change Banner</a>
          <a class=\"guild-button guild-button-view\" href=\"?subtopic=guilds&guild=";
            // line 65
            echo twig_escape_filter($this->env, twig_urlencode_filter(($context["guild_name"] ?? null)), "html", null, true);
            echo "&action=change_description\">Edit Description</a>
          ";
            // line 66
            if (twig_constant("MOTD_EXISTS")) {
                // line 67
                echo "            <a class=\"guild-button guild-button-view\" href=\"?subtopic=guilds&guild=";
                echo twig_escape_filter($this->env, twig_urlencode_filter(($context["guild_name"] ?? null)), "html", null, true);
                echo "&action=change_motd\">Create Board</a>
          ";
            }
            // line 69
            echo "          <a class=\"guild-button guild-button-danger\" href=\"?subtopic=guilds&guild=";
            echo twig_escape_filter($this->env, twig_urlencode_filter(($context["guild_name"] ?? null)), "html", null, true);
            echo "&action=delete_guild\">Disband Guild</a>
          <a class=\"guild-button guild-button-view\" href=\"?subtopic=guilds&guild=";
            // line 70
            echo twig_escape_filter($this->env, twig_urlencode_filter(($context["guild_name"] ?? null)), "html", null, true);
            echo "&action=pass_leadership\">Resign Leadership</a>
        ";
        }
        // line 72
        echo "
        ";
        // line 73
        if (($context["logged"] ?? null)) {
            // line 74
            echo "          ";
            if (($context["isVice"] ?? null)) {
                // line 75
                echo "            <form action=\"?subtopic=guilds&action=invite&guild=";
                echo twig_escape_filter($this->env, twig_urlencode_filter(($context["guild_name"] ?? null)), "html", null, true);
                echo "\" method=\"post\">
              <button class=\"guild-button guild-button-view\" type=\"submit\">Invite Character</button>
            </form>
            <form action=\"?subtopic=guilds&action=change_rank&guild=";
                // line 78
                echo twig_escape_filter($this->env, twig_urlencode_filter(($context["guild_name"] ?? null)), "html", null, true);
                echo "\" method=\"post\">
              <button class=\"guild-button guild-button-view\" type=\"submit\">Edit Members</button>
            </form>
          ";
            }
            // line 82
            echo "
          ";
            // line 83
            if ((($context["show_accept_invite"] ?? null) > 0)) {
                // line 84
                echo "            <form action=\"?subtopic=guilds&action=accept_invite&guild=";
                echo twig_escape_filter($this->env, twig_urlencode_filter(($context["guild_name"] ?? null)), "html", null, true);
                echo "\" method=\"post\">
              <button class=\"guild-button guild-button-view\" type=\"submit\">Accept Guild</button>
            </form>
          ";
            }
            // line 88
            echo "
          ";
            // line 89
            if ((twig_length_filter($this->env, ($context["players_from_account_in_guild"] ?? null)) > 0)) {
                // line 90
                echo "            <form action=\"?subtopic=guilds&action=leave_guild&guild=";
                echo twig_escape_filter($this->env, twig_urlencode_filter(($context["guild_name"] ?? null)), "html", null, true);
                echo "\" method=\"post\">
              <button class=\"guild-button guild-button-danger\" type=\"submit\">Leave Guild</button>
            </form>
          ";
            }
            // line 94
            echo "        ";
        } else {
            // line 95
            echo "          <form action=\"?subtopic=accountmanagement&redirect=";
            echo twig_escape_filter($this->env, $this->env->getFunction('getGuildLink')->getCallable()(twig_urlencode_filter(($context["guild_name"] ?? null)), false), "html", null, true);
            echo "\" method=\"post\">
            <button class=\"guild-button guild-button-view\" type=\"submit\">Login</button>
          </form>
        ";
        }
        // line 99
        echo "      </div>
    </aside>
  </section>

  <section class=\"guild-panel\">
    <span>Guild Members</span>
    <h2>Roster</h2>

    <div class=\"guild-rank-list\">
      ";
        // line 108
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["guild_members"] ?? null));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["rank"]) {
            if ((twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, $context["rank"], "members", [], "any", false, false, false, 108)) > 0)) {
                // line 109
                echo "        <article class=\"guild-rank-card\">
          <header>
            <strong>";
                // line 111
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["rank"], "rank_name", [], "any", false, false, false, 111), "html", null, true);
                echo "</strong>
            <span>";
                // line 112
                echo twig_escape_filter($this->env, twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, $context["rank"], "members", [], "any", false, false, false, 112)), "html", null, true);
                echo " ";
                if ((twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, $context["rank"], "members", [], "any", false, false, false, 112)) == 1)) {
                    echo "member";
                } else {
                    echo "members";
                }
                echo "</span>
          </header>

          <div class=\"guild-member-list\">
            ";
                // line 116
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["rank"], "members", [], "any", false, false, false, 116));
                foreach ($context['_seq'] as $context["_key"] => $context["player"]) {
                    // line 117
                    echo "              ";
                    $context["playerName"] = twig_get_attribute($this->env, $this->source, $context["player"], "getName", [], "method", false, false, false, 117);
                    // line 118
                    echo "              ";
                    $context["showGuildNick"] = (($context["useGuildNick"] ?? null) &&  !twig_test_empty(twig_get_attribute($this->env, $this->source, $context["player"], "getGuildNick", [], "method", false, false, false, 118)));
                    // line 119
                    echo "              <div class=\"guild-member-row\">
                <div>
                  <strong>";
                    // line 121
                    echo $this->env->getFunction('getPlayerLink')->getCallable()(($context["playerName"] ?? null), true);
                    echo "</strong>
                  ";
                    // line 122
                    if (($context["showGuildNick"] ?? null)) {
                        // line 123
                        echo "                    <small>";
                        echo twig_get_attribute($this->env, $this->source, $context["player"], "getGuildNick", [], "method", false, false, false, 123);
                        echo "</small>
                  ";
                    }
                    // line 125
                    echo "                </div>

                <div class=\"guild-member-meta\">
                  <span>";
                    // line 128
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["player"], "getVocationName", [], "method", false, false, false, 128), "html", null, true);
                    echo "</span>
                  <span>Level ";
                    // line 129
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["player"], "getLevel", [], "method", false, false, false, 129), "html", null, true);
                    echo "</span>
                  <b class=\"";
                    // line 130
                    if (twig_get_attribute($this->env, $this->source, $context["player"], "isOnline", [], "method", false, false, false, 130)) {
                        echo "is-online";
                    } else {
                        echo "is-offline";
                    }
                    echo "\">";
                    if (twig_get_attribute($this->env, $this->source, $context["player"], "isOnline", [], "method", false, false, false, 130)) {
                        echo "Online";
                    } else {
                        echo "Offline";
                    }
                    echo "</b>
                </div>

                ";
                    // line 133
                    if ((($context["logged"] ?? null) && twig_in_filter(twig_get_attribute($this->env, $this->source, $context["player"], "getId", [], "method", false, false, false, 133), ($context["players_from_account_ids"] ?? null)))) {
                        // line 134
                        echo "                  <form class=\"guild-nick-form\" action=\"?subtopic=guilds&action=change_nick&name=";
                        echo twig_escape_filter($this->env, twig_urlencode_filter(($context["playerName"] ?? null)), "html", null, true);
                        echo "&guild=";
                        echo twig_escape_filter($this->env, twig_urlencode_filter(($context["guild_name"] ?? null)), "html", null, true);
                        echo "\" method=\"post\">
                    <input type=\"text\" name=\"nick\" value=\"";
                        // line 135
                        if (($context["showGuildNick"] ?? null)) {
                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["player"], "getGuildNick", [], "method", false, false, false, 135), "html", null, true);
                        }
                        echo "\" placeholder=\"Guild title\">
                    <button type=\"submit\">Change</button>
                  </form>
                ";
                    }
                    // line 139
                    echo "
                ";
                    // line 140
                    if (((($context["logged"] ?? null) && ((($context["level_in_guild"] ?? null) > twig_get_attribute($this->env, $this->source, $context["rank"], "rank_level", [], "any", false, false, false, 140)) || ($context["isLeader"] ?? null))) && (($context["guildOwnerName"] ?? null) != ($context["playerName"] ?? null)))) {
                        // line 141
                        echo "                  <a class=\"guild-mini-action\" href=\"?subtopic=guilds&action=kick_player&guild=";
                        echo twig_escape_filter($this->env, twig_urlencode_filter(($context["guild_name"] ?? null)), "html", null, true);
                        echo "&name=";
                        echo twig_escape_filter($this->env, twig_urlencode_filter(($context["playerName"] ?? null)), "html", null, true);
                        echo "\">Kick</a>
                ";
                    }
                    // line 143
                    echo "              </div>
            ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['player'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 145
                echo "          </div>
        </article>
      ";
                $context['_iterated'] = true;
            }
        }
        if (!$context['_iterated']) {
            // line 148
            echo "        <div class=\"guild-empty-message\">No guild members found.</div>
      ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['rank'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 150
        echo "    </div>
  </section>

  <section class=\"guild-panel\">
    <span>Invited Characters</span>
    <h2>Pending Invites</h2>

    <div class=\"guild-invites-list\">
      ";
        // line 158
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["invited_list"] ?? null));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["invited_player"]) {
            if (((twig_length_filter($this->env, ($context["invited_list"] ?? null)) > 0) && twig_get_attribute($this->env, $this->source, $context["invited_player"], "isLoaded", [], "method", false, false, false, 158))) {
                // line 159
                echo "        <div class=\"guild-invite-row\">
          <strong>";
                // line 160
                echo $this->env->getFunction('getPlayerLink')->getCallable()(twig_get_attribute($this->env, $this->source, $context["invited_player"], "getName", [], "method", false, false, false, 160), true);
                echo "</strong>
          ";
                // line 161
                if (($context["isVice"] ?? null)) {
                    // line 162
                    echo "            <a class=\"guild-mini-action\" href=\"?subtopic=guilds&action=delete_invite&guild=";
                    echo twig_escape_filter($this->env, twig_urlencode_filter(($context["guild_name"] ?? null)), "html", null, true);
                    echo "&name=";
                    echo twig_escape_filter($this->env, twig_urlencode_filter(twig_get_attribute($this->env, $this->source, $context["invited_player"], "getName", [], "method", false, false, false, 162)), "html", null, true);
                    echo "\">Cancel Invitation</a>
          ";
                }
                // line 164
                echo "        </div>
      ";
                $context['_iterated'] = true;
            }
        }
        if (!$context['_iterated']) {
            // line 166
            echo "        <div class=\"guild-empty-message\">No invited characters found.</div>
      ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['invited_player'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 168
        echo "    </div>
  </section>
</div>
";
    }

    public function getTemplateName()
    {
        return "guilds.view.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  447 => 168,  440 => 166,  433 => 164,  425 => 162,  423 => 161,  419 => 160,  416 => 159,  410 => 158,  400 => 150,  393 => 148,  385 => 145,  378 => 143,  370 => 141,  368 => 140,  365 => 139,  356 => 135,  349 => 134,  347 => 133,  331 => 130,  327 => 129,  323 => 128,  318 => 125,  312 => 123,  310 => 122,  306 => 121,  302 => 119,  299 => 118,  296 => 117,  292 => 116,  279 => 112,  275 => 111,  271 => 109,  265 => 108,  254 => 99,  246 => 95,  243 => 94,  235 => 90,  233 => 89,  230 => 88,  222 => 84,  220 => 83,  217 => 82,  210 => 78,  203 => 75,  200 => 74,  198 => 73,  195 => 72,  190 => 70,  185 => 69,  179 => 67,  177 => 66,  173 => 65,  169 => 64,  164 => 63,  162 => 62,  152 => 54,  146 => 51,  142 => 49,  140 => 48,  135 => 46,  128 => 42,  119 => 38,  113 => 34,  109 => 32,  103 => 30,  101 => 29,  90 => 21,  76 => 18,  72 => 17,  62 => 12,  56 => 8,  49 => 6,  45 => 5,  43 => 4,  41 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "guilds.view.html.twig", "C:\\UniServerZ\\www\\system\\templates\\guilds.view.html.twig");
    }
}
