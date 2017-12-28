<?php

/* TroubleticketBundle:menu:breadcrumb.html.twig */
class __TwigTemplate_1fe338a372b88f9fab3f8c7a1efd5607cb2c7fb6dbf8a23aaf0a8382078df0be extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'breadcrumb' => array($this, 'block_breadcrumb'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $this->displayBlock('breadcrumb', $context, $blocks);
    }

    public function block_breadcrumb($context, array $blocks = array())
    {
        // line 2
        echo "    ";
        $context["breadcrumb"] = $this->env->getExtension('tt_breadcrumb_extension')->breadcrumb($this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "app"), "request", array()), "attributes", array()), "get", array(0 => "_route"), "method"), $this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "app"), "request", array()), "attributes", array()), "get", array(0 => "_route_params"), "method"));
        // line 3
        echo "
    ";
        // line 4
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "breadcrumb"));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 5
            echo "        <a href=\"";
            if ($this->getAttribute($context["item"], "url", array(), "any", true, true)) {
                echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "url", array()), "html", null, true);
            } else {
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath($this->getAttribute($context["item"], "routeName", array()), $this->getAttribute($context["item"], "routeParams", array())), "html", null, true);
            }
            echo "\">
            <span>
                ";
            // line 7
            echo $this->getAttribute($context["item"], "label", array());
            echo "
            </span>
        </a>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 11
        echo "
";
    }

    public function getTemplateName()
    {
        return "TroubleticketBundle:menu:breadcrumb.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  56 => 11,  46 => 7,  36 => 5,  32 => 4,  29 => 3,  26 => 2,  20 => 1,);
    }
}
/* {% block breadcrumb %}*/
/*     {% set breadcrumb = tt_breadcrumb(app.request.attributes.get('_route'), app.request.attributes.get('_route_params')) %}*/
/* */
/*     {% for item in breadcrumb %}*/
/*         <a href="{% if item.url is defined %}{{ item.url }}{% else %}{{ path(item.routeName, item.routeParams) }}{% endif %}">*/
/*             <span>*/
/*                 {{item.label | raw}}*/
/*             </span>*/
/*         </a>*/
/*     {% endfor %}*/
/* */
/* {% endblock %}*/
/* */
