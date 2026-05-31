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

/* forum.fullscreen.html.twig */
class __TwigTemplate_84218ceff1c144aaf696f6c053898a39 extends \Twig\Template
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
        echo "<div id=\"FullScreen\">
\t<img src=\"\" alt=\"\" />
</div>
<style>
\t#FullScreen {
\t\theight: 100%;
\t\tdisplay: none;
\t\tposition:fixed;
\t\ttop:0;
\t\tright:0;
\t\tbottom:0;
\t\tleft:0;
\t\tz-index: 100;
\t}
\t#FullScreen img {
\t\theight: 100%;
\t\tdisplay: block;
\t\tmargin: 0 auto;
\t\tcursor: pointer;
\t}
\t
\t.forum-image {
\t\tcursor: pointer;
\t}
</style>
<script type=\"text/javascript\">
\$(function() {
\t\$(\".forum-image\").click(function(event){\t\t
\t\tvar src = \$(this).attr('src'); //get the source attribute of the clicked image
\t\t\$('#FullScreen img').attr('src', src); //assign it to the tag for your fullscreen div
\t\t\$('#FullScreen').fadeIn();
\t});

\t\$(\"#FullScreen\").click(function(){
\t\t\$(this).fadeOut()
\t\t\$(\"#imgBig\").attr(\"src\", \"\");
\t\t\$(\"#overlay\").hide();
\t\t\$(\"#overlayContent\").hide();
\t});
});
</script>";
    }

    public function getTemplateName()
    {
        return "forum.fullscreen.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "forum.fullscreen.html.twig", "C:\\UniServerZ\\www\\system\\templates\\forum.fullscreen.html.twig");
    }
}
