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

/* serverinfo.html.twig */
class __TwigTemplate_2b85e18da24cfe233d4ae5e94d802a65 extends \Twig\Template
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

<script>
  var serverSaveTime = new Date(";
        // line 4
        echo twig_escape_filter($this->env, ($context["serverSaveTime"] ?? null), "html", null, true);
        echo ");
  var serverOpenedAt = new Date(";
        // line 5
        echo twig_escape_filter($this->env, ($context["serverOpenedAt"] ?? null), "html", null, true);
        echo ");

  function formatElapsed(startDate, nowDate) {
    var years = nowDate.getFullYear() - startDate.getFullYear();
    var anchor = new Date(startDate.getTime());
    anchor.setFullYear(startDate.getFullYear() + years);

    if (anchor > nowDate) {
      years -= 1;
      anchor = new Date(startDate.getTime());
      anchor.setFullYear(startDate.getFullYear() + years);
    }

    var months = 0;
    while (true) {
      var nextMonth = new Date(anchor.getTime());
      nextMonth.setMonth(nextMonth.getMonth() + 1);
      if (nextMonth > nowDate) {
        break;
      }
      anchor = nextMonth;
      months += 1;
    }

    var distance = nowDate - anchor;
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    distance -= days * 1000 * 60 * 60 * 24;
    var hours = Math.floor(distance / (1000 * 60 * 60));
    distance -= hours * 1000 * 60 * 60;
    var minutes = Math.floor(distance / (1000 * 60));

    return years + \" a\\u00f1os, \" + months + \" meses, \" + days + \" d\\u00edas, \" + hours + \" horas, \" + minutes + \" minutos\";
  }

  function refreshOnlineSince() {
    var onlineSinceElement = document.getElementById(\"onlineSinceElapsed\");
    var onlineTimeElement = document.getElementById(\"onlineTimeElapsed\");
    var elapsed = formatElapsed(serverOpenedAt, new Date());

    if (onlineSinceElement) {
      onlineSinceElement.innerHTML = elapsed;
    }

    if (onlineTimeElement) {
      onlineTimeElement.innerHTML = elapsed;
    }
  }

  var serverSaveTimer = setInterval(function () {
    var now = new Date().getTime();
    var distance = serverSaveTime - now;
    var hours = Math.floor(distance / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

    if (distance < 0) {
      clearInterval(serverSaveTimer);
      document.getElementById(\"timerServerSave\").innerHTML = \"Now\";
      return;
    }

    document.getElementById(\"timerServerSave\").innerHTML =
      (hours < 10 ? \"0\" + hours : hours) + \":\" +
      (minutes < 10 ? \"0\" + minutes : minutes) + \":\" +
      (seconds < 10 ? \"0\" + seconds : seconds);
  }, 1000);

  document.addEventListener(\"DOMContentLoaded\", function () {
    refreshOnlineSince();
    setInterval(refreshOnlineSince, 60000);
  });
</script>

<div class=\"serverinfo-page\">
  <div class=\"serverinfo-divider\"><span></span></div>

  <section class=\"serverinfo-panel serverinfo-overview\">
    <div>
      <div class=\"serverinfo-kicker\">World Overview</div>
      <h1>Server Information</h1>
      <p>Core world settings, progression rates, PvP rules, and player commands in one compact reference.</p>

      <div class=\"serverinfo-mini-grid\">
        <div class=\"serverinfo-mini-card\">
          <strong>";
        // line 89
        echo twig_escape_filter($this->env, twig_title_string_filter($this->env, twig_replace_filter(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["config"] ?? null), "lua", [], "any", false, false, false, 89), "worldType", [], "any", false, false, false, 89), ["_" => " "])), "html", null, true);
        echo "</strong>
          <span>world type</span>
        </div>
        <div class=\"serverinfo-mini-card\">
          <strong>";
        // line 93
        ((($context["clientVersion"] ?? null)) ? (print (twig_escape_filter($this->env, ($context["clientVersion"] ?? null), "html", null, true))) : (print ("15.00")));
        echo "</strong>
          <span>client version</span>
        </div>
        <div class=\"serverinfo-mini-card\">
          <strong>";
        // line 97
        echo twig_escape_filter($this->env, ($context["serverSaveDisplay"] ?? null), "html", null, true);
        echo "</strong>
          <span>server save</span>
        </div>
      </div>
    </div>

    <aside class=\"serverinfo-online-card\">
      <span>Online Since</span>
      <strong id=\"onlineSinceElapsed\"></strong>
      <small>Tiempo transcurrido en vivo</small>
    </aside>
  </section>

  <section class=\"serverinfo-panel\">
    <div class=\"serverinfo-kicker\">Basic Details</div>
    <h2>World Settings</h2>
    <p>The practical information players check before creating, hunting, or joining a guild.</p>

    <div class=\"serverinfo-detail-grid\">
      <div class=\"serverinfo-detail-card\">
        <span>World Type</span>
        <strong>";
        // line 118
        echo twig_escape_filter($this->env, twig_title_string_filter($this->env, twig_replace_filter(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["config"] ?? null), "lua", [], "any", false, false, false, 118), "worldType", [], "any", false, false, false, 118), ["_" => " "])), "html", null, true);
        echo "</strong>
      </div>
      <div class=\"serverinfo-detail-card\">
        <span>Client Version</span>
        <strong>";
        // line 122
        ((($context["clientVersion"] ?? null)) ? (print (twig_escape_filter($this->env, ($context["clientVersion"] ?? null), "html", null, true))) : (print ("15.00")));
        echo "</strong>
      </div>
      <div class=\"serverinfo-detail-card\">
        <span>Online Time</span>
        <strong id=\"onlineTimeElapsed\"></strong>
      </div>
      ";
        // line 128
        if (($context["houseLevel"] ?? null)) {
            // line 129
            echo "        <div class=\"serverinfo-detail-card\">
          <span>House Level</span>
          <strong>";
            // line 131
            echo twig_escape_filter($this->env, ($context["houseLevel"] ?? null), "html", null, true);
            echo "</strong>
        </div>
      ";
        }
        // line 134
        echo "      <div class=\"serverinfo-detail-card\">
        <span>Guild Creation</span>
        <strong>Level ";
        // line 136
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["config"] ?? null), "guild_need_level", [], "any", false, false, false, 136), "html", null, true);
        echo "</strong>
      </div>
      <div class=\"serverinfo-detail-card\">
        <span>Server Save</span>
        <strong>";
        // line 140
        echo twig_escape_filter($this->env, ($context["serverSaveDisplay"] ?? null), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, ($context["serverSaveTimezone"] ?? null), "html", null, true);
        echo "</strong>
      </div>
    </div>
  </section>

  <section class=\"serverinfo-panel\">
    <div class=\"serverinfo-kicker\">Progression</div>
    <h2>Server Rates</h2>
    <p>Experience slows down by level bracket, while skill, magic, and loot rates stay easy to scan.</p>

    ";
        // line 150
        if ( !($context["rateUseStages"] ?? null)) {
            // line 151
            echo "      <div class=\"serverinfo-rate-grid\">
        <div class=\"serverinfo-rate-card\"><span>Experience</span><strong>";
            // line 152
            echo twig_escape_filter($this->env, ($context["rateExp"] ?? null), "html", null, true);
            echo "x</strong></div>
        <div class=\"serverinfo-rate-card\"><span>Skills</span><strong>";
            // line 153
            echo twig_escape_filter($this->env, ($context["rateSkill"] ?? null), "html", null, true);
            echo "x</strong></div>
        <div class=\"serverinfo-rate-card\"><span>Magic</span><strong>";
            // line 154
            echo twig_escape_filter($this->env, ($context["rateMagic"] ?? null), "html", null, true);
            echo "x</strong></div>
        <div class=\"serverinfo-rate-card\"><span>Loot</span><strong>";
            // line 155
            echo twig_escape_filter($this->env, ($context["rateLoot"] ?? null), "html", null, true);
            echo "x</strong></div>
        <div class=\"serverinfo-rate-card\"><span>Spawn</span><strong>";
            // line 156
            echo twig_escape_filter($this->env, ($context["rateSpawn"] ?? null), "html", null, true);
            echo "x</strong></div>
      </div>
    ";
        } else {
            // line 159
            echo "      <div class=\"serverinfo-rate-grid\">
        ";
            // line 160
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["rateStages"] ?? null), "experienceStages", [], "any", false, false, false, 160));
            foreach ($context['_seq'] as $context["_key"] => $context["result"]) {
                // line 161
                echo "          <div class=\"serverinfo-rate-card\">
            <span>Levels</span>
            <b>";
                // line 163
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["result"], "minlevel", [], "any", false, false, false, 163), "html", null, true);
                if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, $context["result"], "maxlevel", [], "any", false, false, false, 163))) {
                    echo " - ";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["result"], "maxlevel", [], "any", false, false, false, 163), "html", null, true);
                } else {
                    echo "+";
                }
                echo "</b>
            <strong>";
                // line 164
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["result"], "multiplier", [], "any", false, false, false, 164), "html", null, true);
                echo "x</strong>
          </div>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['result'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 167
            echo "      </div>

      <div class=\"serverinfo-rate-group\">
        <div class=\"serverinfo-rate-title\">
          <span>Skills</span>
          <strong>";
            // line 172
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["rateStages"] ?? null), "skillsStages", [], "any", false, false, false, 172));
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
            foreach ($context['_seq'] as $context["_key"] => $context["result"]) {
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["result"], "multiplier", [], "any", false, false, false, 172), "html", null, true);
                echo "x";
                if ( !twig_get_attribute($this->env, $this->source, $context["loop"], "last", [], "any", false, false, false, 172)) {
                    echo " / ";
                }
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['result'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            echo "</strong>
        </div>
        <div class=\"serverinfo-small-rate-grid\">
          ";
            // line 175
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["rateStages"] ?? null), "skillsStages", [], "any", false, false, false, 175));
            foreach ($context['_seq'] as $context["_key"] => $context["result"]) {
                // line 176
                echo "            <div>
              <span>";
                // line 177
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["result"], "minlevel", [], "any", false, false, false, 177), "html", null, true);
                if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, $context["result"], "maxlevel", [], "any", false, false, false, 177))) {
                    echo " - ";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["result"], "maxlevel", [], "any", false, false, false, 177), "html", null, true);
                } else {
                    echo "+";
                }
                echo "</span>
              <strong>";
                // line 178
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["result"], "multiplier", [], "any", false, false, false, 178), "html", null, true);
                echo "x</strong>
            </div>
          ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['result'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 181
            echo "        </div>
      </div>

      <div class=\"serverinfo-rate-group\">
        <div class=\"serverinfo-rate-title\">
          <span>Magic</span>
          <strong>";
            // line 187
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["rateStages"] ?? null), "magicLevelStages", [], "any", false, false, false, 187));
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
            foreach ($context['_seq'] as $context["_key"] => $context["result"]) {
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["result"], "multiplier", [], "any", false, false, false, 187), "html", null, true);
                echo "x";
                if ( !twig_get_attribute($this->env, $this->source, $context["loop"], "last", [], "any", false, false, false, 187)) {
                    echo " / ";
                }
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['result'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            echo "</strong>
        </div>
        <div class=\"serverinfo-small-rate-grid\">
          ";
            // line 190
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["rateStages"] ?? null), "magicLevelStages", [], "any", false, false, false, 190));
            foreach ($context['_seq'] as $context["_key"] => $context["result"]) {
                // line 191
                echo "            <div>
              <span>";
                // line 192
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["result"], "minlevel", [], "any", false, false, false, 192), "html", null, true);
                if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, $context["result"], "maxlevel", [], "any", false, false, false, 192))) {
                    echo " - ";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["result"], "maxlevel", [], "any", false, false, false, 192), "html", null, true);
                } else {
                    echo "+";
                }
                echo "</span>
              <strong>";
                // line 193
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["result"], "multiplier", [], "any", false, false, false, 193), "html", null, true);
                echo "x</strong>
            </div>
          ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['result'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 196
            echo "        </div>
      </div>

      <div class=\"serverinfo-rate-card serverinfo-rate-wide\">
        <span>Loot</span>
        <strong>";
            // line 201
            echo twig_escape_filter($this->env, ($context["rateLoot"] ?? null), "html", null, true);
            echo "x</strong>
        <p>Global monster loot rate.</p>
      </div>
    ";
        }
        // line 205
        echo "  </section>

  <section class=\"serverinfo-panel\">
    <div class=\"serverinfo-kicker\">PvP Control</div>
    <h2>Frags</h2>
    <p>Skull and protection-zone timings used by the PvP system.</p>

    <div class=\"serverinfo-detail-grid\">
      <div class=\"serverinfo-flat-card\"><span>Decrease Frag</span><strong>";
        // line 213
        echo twig_escape_filter($this->env, ($context["timeToDecreaseFragsDisplay"] ?? null), "html", null, true);
        echo "</strong></div>
      <div class=\"serverinfo-flat-card\"><span>White Skull Time</span><strong>";
        // line 214
        echo twig_escape_filter($this->env, ($context["whiteSkullTimeDisplay"] ?? null), "html", null, true);
        echo "</strong></div>
      <div class=\"serverinfo-flat-card\"><span>PZ Lock</span><strong>";
        // line 215
        echo twig_escape_filter($this->env, ($context["pzLockedDisplay"] ?? null), "html", null, true);
        echo "</strong></div>
      ";
        // line 216
        if (array_key_exists("dailyFragsToRedSkull", $context)) {
            // line 217
            echo "        <div class=\"serverinfo-flat-card\"><span>Daily Red Skull</span><strong>";
            echo twig_escape_filter($this->env, ($context["dailyFragsToRedSkull"] ?? null), "html", null, true);
            echo "</strong></div>
        <div class=\"serverinfo-flat-card\"><span>Weekly Red Skull</span><strong>";
            // line 218
            echo twig_escape_filter($this->env, ($context["weeklyFragsToRedSkull"] ?? null), "html", null, true);
            echo "</strong></div>
        <div class=\"serverinfo-flat-card\"><span>Monthly Red Skull</span><strong>";
            // line 219
            echo twig_escape_filter($this->env, ($context["monthlyFragsToRedSkull"] ?? null), "html", null, true);
            echo "</strong></div>
      ";
        }
        // line 221
        echo "      <div class=\"serverinfo-flat-card\"><span>Red Skull Time</span><strong>";
        echo twig_escape_filter($this->env, ($context["redSkullDuration"] ?? null), "html", null, true);
        echo " days</strong></div>
      ";
        // line 222
        if (($context["blackSkullDuration"] ?? null)) {
            // line 223
            echo "        <div class=\"serverinfo-flat-card\"><span>Black Skull Time</span><strong>";
            echo twig_escape_filter($this->env, ($context["blackSkullDuration"] ?? null), "html", null, true);
            echo " days</strong></div>
      ";
        }
        // line 225
        echo "    </div>
  </section>

  <section class=\"serverinfo-panel\">
    <div class=\"serverinfo-kicker\">Useful Links</div>
    <h2>Player Reference</h2>
    <div class=\"serverinfo-actions\">
      <a href=\"";
        // line 232
        echo twig_escape_filter($this->env, $this->env->getFunction('getLink')->getCallable()("commands"), "html", null, true);
        echo "\">Commands</a>
      <a href=\"";
        // line 233
        echo twig_escape_filter($this->env, $this->env->getFunction('getLink')->getCallable()("team"), "html", null, true);
        echo "\">Support List</a>
      <a href=\"";
        // line 234
        echo twig_escape_filter($this->env, $this->env->getFunction('getLink')->getCallable()("rules"), "html", null, true);
        echo "\">Server Rules</a>
    </div>
  </section>
</div>
";
    }

    public function getTemplateName()
    {
        return "serverinfo.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  507 => 234,  503 => 233,  499 => 232,  490 => 225,  484 => 223,  482 => 222,  477 => 221,  472 => 219,  468 => 218,  463 => 217,  461 => 216,  457 => 215,  453 => 214,  449 => 213,  439 => 205,  432 => 201,  425 => 196,  416 => 193,  406 => 192,  403 => 191,  399 => 190,  361 => 187,  353 => 181,  344 => 178,  334 => 177,  331 => 176,  327 => 175,  289 => 172,  282 => 167,  273 => 164,  263 => 163,  259 => 161,  255 => 160,  252 => 159,  246 => 156,  242 => 155,  238 => 154,  234 => 153,  230 => 152,  227 => 151,  225 => 150,  210 => 140,  203 => 136,  199 => 134,  193 => 131,  189 => 129,  187 => 128,  178 => 122,  171 => 118,  147 => 97,  140 => 93,  133 => 89,  46 => 5,  42 => 4,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "serverinfo.html.twig", "C:\\UniServerZ\\www\\system\\templates\\serverinfo.html.twig");
    }
}
