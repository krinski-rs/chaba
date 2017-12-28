<?php

/* TroubleticketBundle:menu:menu.html.twig */
class __TwigTemplate_a958bf40055cfe9938f9e45cdc4ca38e996d219e0e5d9e5cc78df7a7e6466779 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $_trait_0 = $this->loadTemplate("TroubleticketBundle:menu:breadcrumb.html.twig", "TroubleticketBundle:menu:menu.html.twig", 1);
        // line 1
        if (!$_trait_0->isTraitable()) {
            throw new Twig_Error_Runtime('Template "'."TroubleticketBundle:menu:breadcrumb.html.twig".'" cannot be used as a trait.');
        }
        $_trait_0_blocks = $_trait_0->getBlocks();

        $this->traits = $_trait_0_blocks;

        $this->blocks = array_merge(
            $this->traits,
            array(
                'menu' => array($this, 'block_menu'),
            )
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 2
        $this->displayBlock('menu', $context, $blocks);
    }

    public function block_menu($context, array $blocks = array())
    {
        // line 3
        echo "    <div class=\"modal fade\" id=\"myModal\"></div>
    <div class=\"menu\">
        <div class=\"lista\">
            <div class=\"migalha\">
                <a href=\"/\"><img src=\"";
        // line 7
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/base/img/home.png"), "html", null, true);
        echo "\" class=\"home\"></a>
                <a href=\"/\"><span>SISTECH ></span></a>
                ";
        // line 9
        $this->displayBlock("breadcrumb", $context, $blocks);
        echo "
            </div>
            <div class=\"infoSistema\">
";
        // line 12
        if (array_key_exists("modulos", $context)) {
            // line 13
            echo "                <div class=\"floatL modulos\">
";
            // line 14
            if (twig_length_filter($this->env, $this->getContext($context, "modulos"))) {
                // line 15
                echo "                    <ul class=\"navModulos pointer no-select\">
                        <li class=\"select\"> Modulos <span class=\"iconSelect pointer\"></span></li>
";
                // line 17
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($this->getContext($context, "modulos"));
                foreach ($context['_seq'] as $context["_key"] => $context["modulo"]) {
                    // line 18
                    echo "                        <a href=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["modulo"], "link", array()), "html", null, true);
                    echo "\"> <li class=\"displayN item\"> ";
                    echo $this->getAttribute($context["modulo"], "titulo", array());
                    echo "  </li>  </a>
";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['modulo'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 20
                echo "                    </ul>
";
            }
            // line 22
            echo "                </div>
";
        }
        // line 24
        echo "                <form action=\"https://sistech.vogeltelecom.com/sistech/busca.php\" method=\"post\">
                    <div class=\"floatL pesquisa\">
                        <input type=\"text\" name=\"busca\" placeholder=\"Pesquisar no Sistech\">
                        <input type=\"submit\" class=\"btBusca\" value=\" \">
                    </div>
                </form>
                <div class=\"floatL login\">
                    <span>";
        // line 31
        if (array_key_exists("login", $context)) {
            echo $this->getContext($context, "login");
        }
        echo " &nbsp;|<a href=\"https://redecolaborativa.vogeltelecom.com\">sair</a></span>
                </div>
                <div class=\"headLogo\">
                    <img src=\"";
        // line 34
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/base/img/header-logo.png"), "html", null, true);
        echo "\">
                </div>
            </div>
        </div>
    </div>
    <div class=\"navegacao\" id=\"navegacao\">
        <ul class=\"nave\" id=\"listaMenu\">
            ";
        // line 41
        if ($this->env->getExtension('permissions')->isAllowed("BA", "read")) {
            // line 42
            echo "                <li><a>Boletins de Anormalidade</a>
                    <ul>
                        <li><a href=\"";
            // line 44
            echo $this->env->getExtension('routing')->getPath("troubleticket_ba_stack");
            echo "\">Fila</a></li>
                         ";
            // line 45
            if ($this->env->getExtension('permissions')->isAllowed("BA", "create")) {
                // line 46
                echo "                            <li><a href=\"";
                echo $this->env->getExtension('routing')->getPath("troubleticket_ba_new");
                echo "\">Novo</a></li>
                         ";
            }
            // line 48
            echo "                    </ul>
                </li>
            ";
        }
        // line 51
        echo "            ";
        if ($this->env->getExtension('permissions')->isAllowed("BI", "read")) {
            // line 52
            echo "                <li><a>Boletins de Interrupção</a>
                    <ul>
                        <li><a href=\"";
            // line 54
            echo $this->env->getExtension('routing')->getPath("troubleticket_bi_stack");
            echo "\">Fila</a></li>
                         ";
            // line 55
            if ($this->env->getExtension('permissions')->isAllowed("BI", "create")) {
                // line 56
                echo "                            <li><a href=\"";
                echo $this->env->getExtension('routing')->getPath("troubleticket_bi_new");
                echo "\">Novo</a></li>
                         ";
            }
            // line 58
            echo "                    </ul>
                </li>
            ";
        }
        // line 61
        echo "            ";
        if ($this->env->getExtension('permissions')->isAllowed("BS", "read")) {
            // line 62
            echo "                <li><a>Boletins de Serviço</a>
                    <ul>
                        <li><a href=\"";
            // line 64
            echo $this->env->getExtension('routing')->getPath("troubleticket_bs_stack");
            echo "\">Fila</a></li>
                        ";
            // line 65
            if ($this->env->getExtension('permissions')->isAllowed("BS", "create")) {
                // line 66
                echo "                            <li><a href=\"";
                echo $this->env->getExtension('routing')->getPath("troubleticket_bs_new");
                echo "\">Novo</a></li>
                        ";
            }
            // line 68
            echo "                        ";
            if ($this->env->getExtension('permissions')->isAllowed("BS", "config")) {
                // line 69
                echo "                            <li>
                                <a href=\"";
                // line 70
                echo $this->env->getExtension('routing')->getPath("troubleticket_bs_config");
                echo "\">Configurações</a>
                            </li>
                        ";
            }
            // line 73
            echo "                    </ul>
                </li>
            ";
        }
        // line 76
        echo "        </ul>
    </div>
";
    }

    public function getTemplateName()
    {
        return "TroubleticketBundle:menu:menu.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  199 => 76,  194 => 73,  188 => 70,  185 => 69,  182 => 68,  176 => 66,  174 => 65,  170 => 64,  166 => 62,  163 => 61,  158 => 58,  152 => 56,  150 => 55,  146 => 54,  142 => 52,  139 => 51,  134 => 48,  128 => 46,  126 => 45,  122 => 44,  118 => 42,  116 => 41,  106 => 34,  98 => 31,  89 => 24,  85 => 22,  81 => 20,  70 => 18,  66 => 17,  62 => 15,  60 => 14,  57 => 13,  55 => 12,  49 => 9,  44 => 7,  38 => 3,  32 => 2,  14 => 1,);
    }
}
/* {% use "TroubleticketBundle:menu:breadcrumb.html.twig" %}*/
/* {% block menu %}*/
/*     <div class="modal fade" id="myModal"></div>*/
/*     <div class="menu">*/
/*         <div class="lista">*/
/*             <div class="migalha">*/
/*                 <a href="/"><img src="{{ asset('bundles/base/img/home.png') }}" class="home"></a>*/
/*                 <a href="/"><span>SISTECH ></span></a>*/
/*                 {{ block('breadcrumb') }}*/
/*             </div>*/
/*             <div class="infoSistema">*/
/* {% if modulos is defined %}*/
/*                 <div class="floatL modulos">*/
/* {% if modulos|length %}*/
/*                     <ul class="navModulos pointer no-select">*/
/*                         <li class="select"> Modulos <span class="iconSelect pointer"></span></li>*/
/* {% for modulo in modulos %}*/
/*                         <a href="{{ modulo.link }}"> <li class="displayN item"> {{ modulo.titulo|raw }}  </li>  </a>*/
/* {% endfor %}*/
/*                     </ul>*/
/* {% endif %}*/
/*                 </div>*/
/* {% endif %}*/
/*                 <form action="https://sistech.vogeltelecom.com/sistech/busca.php" method="post">*/
/*                     <div class="floatL pesquisa">*/
/*                         <input type="text" name="busca" placeholder="Pesquisar no Sistech">*/
/*                         <input type="submit" class="btBusca" value=" ">*/
/*                     </div>*/
/*                 </form>*/
/*                 <div class="floatL login">*/
/*                     <span>{% if login is defined %}{{ login|raw }}{% endif %} &nbsp;|<a href="https://redecolaborativa.vogeltelecom.com">sair</a></span>*/
/*                 </div>*/
/*                 <div class="headLogo">*/
/*                     <img src="{{ asset('bundles/base/img/header-logo.png') }}">*/
/*                 </div>*/
/*             </div>*/
/*         </div>*/
/*     </div>*/
/*     <div class="navegacao" id="navegacao">*/
/*         <ul class="nave" id="listaMenu">*/
/*             {% if isAllowed('BA', 'read') %}*/
/*                 <li><a>Boletins de Anormalidade</a>*/
/*                     <ul>*/
/*                         <li><a href="{{ path('troubleticket_ba_stack') }}">Fila</a></li>*/
/*                          {% if isAllowed('BA', 'create') %}*/
/*                             <li><a href="{{ path('troubleticket_ba_new') }}">Novo</a></li>*/
/*                          {% endif %}*/
/*                     </ul>*/
/*                 </li>*/
/*             {% endif %}*/
/*             {% if isAllowed('BI', 'read') %}*/
/*                 <li><a>Boletins de Interrupção</a>*/
/*                     <ul>*/
/*                         <li><a href="{{ path('troubleticket_bi_stack') }}">Fila</a></li>*/
/*                          {% if isAllowed('BI', 'create') %}*/
/*                             <li><a href="{{ path('troubleticket_bi_new') }}">Novo</a></li>*/
/*                          {% endif %}*/
/*                     </ul>*/
/*                 </li>*/
/*             {% endif %}*/
/*             {% if isAllowed('BS', 'read') %}*/
/*                 <li><a>Boletins de Serviço</a>*/
/*                     <ul>*/
/*                         <li><a href="{{ path('troubleticket_bs_stack') }}">Fila</a></li>*/
/*                         {% if isAllowed('BS', 'create') %}*/
/*                             <li><a href="{{ path('troubleticket_bs_new') }}">Novo</a></li>*/
/*                         {% endif %}*/
/*                         {% if isAllowed('BS', 'config') %}*/
/*                             <li>*/
/*                                 <a href="{{ path('troubleticket_bs_config') }}">Configurações</a>*/
/*                             </li>*/
/*                         {% endif %}*/
/*                     </ul>*/
/*                 </li>*/
/*             {% endif %}*/
/*         </ul>*/
/*     </div>*/
/* {% endblock %}*/
/* */
