<?php

/* TroubleticketBundle::base.html.twig */
class __TwigTemplate_abeb6a107d931f0c504fc283a32fe50fd63a83d007cd340b411726149a054b48 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $_trait_0 = $this->loadTemplate("TroubleticketBundle:menu:menu.html.twig", "TroubleticketBundle::base.html.twig", 2);
        // line 2
        if (!$_trait_0->isTraitable()) {
            throw new Twig_Error_Runtime('Template "'."TroubleticketBundle:menu:menu.html.twig".'" cannot be used as a trait.');
        }
        $_trait_0_blocks = $_trait_0->getBlocks();

        $this->traits = $_trait_0_blocks;

        $this->blocks = array_merge(
            $this->traits,
            array(
                'title' => array($this, 'block_title'),
                'static_css' => array($this, 'block_static_css'),
                'body' => array($this, 'block_body'),
                'static_js' => array($this, 'block_static_js'),
            )
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
";
        // line 3
        echo "<html>
    <head>
        <meta charset=\"UTF-8\" />
        <title>";
        // line 6
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
\t    <link rel=\"icon\" sizes=\"16x16\" href=\"";
        // line 7
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("favicon.ico"), "html", null, true);
        echo "\" />
\t    <link rel=\"stylesheet\" href=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/base/css/base.css"), "html", null, true);
        echo "\" />
        <link rel=\"stylesheet\" href=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/base/css/menu.css"), "html", null, true);
        echo "\" />
        <link rel=\"stylesheet\" href=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/base/css/jquery-ui.css"), "html", null, true);
        echo "\" />
        <link rel=\"stylesheet\" href=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/troubleticket/css/troubleticket.css"), "html", null, true);
        echo "\" />
        <link rel=\"icon\" type=\"image/x-icon\" href=\"";
        // line 12
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("favicon.ico"), "html", null, true);
        echo "\" />
        ";
        // line 13
        $this->displayBlock('static_css', $context, $blocks);
        // line 15
        echo "    </head>
    <body>
        <div id=\"overlay\">
            <img src=\"";
        // line 18
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/troubleticket/img/loader.gif"), "html", null, true);
        echo "\" />
        </div>
        ";
        // line 20
        $this->displayBlock("menu", $context, $blocks);
        echo "
        ";
        // line 21
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "app"), "session", array()), "flashbag", array()), "get", array(0 => "error"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flash_message"]) {
            // line 22
            echo "            <div class=\"error\">
                <span>";
            // line 23
            echo twig_escape_filter($this->env, $context["flash_message"], "html", null, true);
            echo "</span>
            </div>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flash_message'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 26
        echo "        ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "app"), "session", array()), "flashbag", array()), "get", array(0 => "success"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flash_message"]) {
            // line 27
            echo "            <div class=\"sucesso\">
                <span>";
            // line 28
            echo twig_escape_filter($this->env, $context["flash_message"], "html", null, true);
            echo "</span>
            </div>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flash_message'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 31
        echo "        ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "app"), "session", array()), "flashbag", array()), "get", array(0 => "alert"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flash_message"]) {
            // line 32
            echo "            <div class=\"alert\">
                <span><strong>ALERTA</strong>: ";
            // line 33
            echo twig_escape_filter($this->env, $context["flash_message"], "html", null, true);
            echo "</span>
            </div>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flash_message'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 36
        echo "        <div class=\"content\">";
        $this->displayBlock('body', $context, $blocks);
        echo "</div>
        <script type=\"text/javascript\" src=\"";
        // line 37
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/base/js/jquery/jquery-1.11.3.min.js"), "html", null, true);
        echo "\"></script>
        <script type=\"text/javascript\" src=\"";
        // line 38
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/base/js/jquery-ui/jquery-ui.js"), "html", null, true);
        echo "\"></script>
        <script type=\"text/javascript\" src=\"";
        // line 39
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/troubleticket/js/plugins/jquery.inputmask.bundle.min.js"), "html", null, true);
        echo "\"></script>
        <script type=\"text/javascript\" src=\"";
        // line 40
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/troubleticket/js/troubleticket.js"), "html", null, true);
        echo "\"></script>
         <script type=\"text/javascript\" src=\"";
        // line 41
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/base/js/base.js"), "html", null, true);
        echo "\"></script>
        ";
        // line 42
        $this->displayBlock('static_js', $context, $blocks);
        // line 44
        echo "    </body>
</html>
";
    }

    // line 6
    public function block_title($context, array $blocks = array())
    {
        echo "SisTech";
    }

    // line 13
    public function block_static_css($context, array $blocks = array())
    {
        // line 14
        echo "        ";
    }

    // line 36
    public function block_body($context, array $blocks = array())
    {
    }

    // line 42
    public function block_static_js($context, array $blocks = array())
    {
        // line 43
        echo "        ";
    }

    public function getTemplateName()
    {
        return "TroubleticketBundle::base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  191 => 43,  188 => 42,  183 => 36,  179 => 14,  176 => 13,  170 => 6,  164 => 44,  162 => 42,  158 => 41,  154 => 40,  150 => 39,  146 => 38,  142 => 37,  137 => 36,  128 => 33,  125 => 32,  120 => 31,  111 => 28,  108 => 27,  103 => 26,  94 => 23,  91 => 22,  87 => 21,  83 => 20,  78 => 18,  73 => 15,  71 => 13,  67 => 12,  63 => 11,  59 => 10,  55 => 9,  51 => 8,  47 => 7,  43 => 6,  38 => 3,  35 => 1,  14 => 2,);
    }
}
/* <!DOCTYPE html>*/
/* {% use "TroubleticketBundle:menu:menu.html.twig" %}*/
/* <html>*/
/*     <head>*/
/*         <meta charset="UTF-8" />*/
/*         <title>{% block title %}SisTech{% endblock %}</title>*/
/* 	    <link rel="icon" sizes="16x16" href="{{ asset('favicon.ico') }}" />*/
/* 	    <link rel="stylesheet" href="{{ asset('bundles/base/css/base.css') }}" />*/
/*         <link rel="stylesheet" href="{{ asset('bundles/base/css/menu.css') }}" />*/
/*         <link rel="stylesheet" href="{{ asset('bundles/base/css/jquery-ui.css') }}" />*/
/*         <link rel="stylesheet" href="{{ asset('bundles/troubleticket/css/troubleticket.css') }}" />*/
/*         <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}" />*/
/*         {% block static_css %}*/
/*         {% endblock %}*/
/*     </head>*/
/*     <body>*/
/*         <div id="overlay">*/
/*             <img src="{{ asset('bundles/troubleticket/img/loader.gif') }}" />*/
/*         </div>*/
/*         {{ block('menu') }}*/
/*         {% for flash_message in app.session.flashbag.get('error') %}*/
/*             <div class="error">*/
/*                 <span>{{ flash_message }}</span>*/
/*             </div>*/
/*         {% endfor %}*/
/*         {% for flash_message in app.session.flashbag.get('success') %}*/
/*             <div class="sucesso">*/
/*                 <span>{{ flash_message }}</span>*/
/*             </div>*/
/*         {% endfor %}*/
/*         {% for flash_message in app.session.flashbag.get('alert') %}*/
/*             <div class="alert">*/
/*                 <span><strong>ALERTA</strong>: {{ flash_message }}</span>*/
/*             </div>*/
/*         {% endfor %}*/
/*         <div class="content">{% block body %}{% endblock %}</div>*/
/*         <script type="text/javascript" src="{{ asset('bundles/base/js/jquery/jquery-1.11.3.min.js') }}"></script>*/
/*         <script type="text/javascript" src="{{ asset('bundles/base/js/jquery-ui/jquery-ui.js') }}"></script>*/
/*         <script type="text/javascript" src="{{ asset('bundles/troubleticket/js/plugins/jquery.inputmask.bundle.min.js') }}"></script>*/
/*         <script type="text/javascript" src="{{ asset('bundles/troubleticket/js/troubleticket.js') }}"></script>*/
/*          <script type="text/javascript" src="{{ asset('bundles/base/js/base.js') }}"></script>*/
/*         {% block static_js %}*/
/*         {% endblock %}*/
/*     </body>*/
/* </html>*/
/* */
