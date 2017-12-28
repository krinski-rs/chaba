<?php

/* TroubleticketBundle:BA:stack.html.twig */
class __TwigTemplate_e8f7a8fba987ec21b2c16f2b8553ca8dca55ee5e2fa450b734f50253823dbad7 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("TroubleticketBundle::base.html.twig", "TroubleticketBundle:BA:stack.html.twig", 1);
        $_trait_0 = $this->loadTemplate("TroubleticketBundle:BA/modal:ba_export.html.twig", "TroubleticketBundle:BA:stack.html.twig", 2);
        // line 2
        if (!$_trait_0->isTraitable()) {
            throw new Twig_Error_Runtime('Template "'."TroubleticketBundle:BA/modal:ba_export.html.twig".'" cannot be used as a trait.');
        }
        $_trait_0_blocks = $_trait_0->getBlocks();

        $_trait_1 = $this->loadTemplate("TroubleticketBundle:BA/modal:ba_export_performance.html.twig", "TroubleticketBundle:BA:stack.html.twig", 3);
        // line 3
        if (!$_trait_1->isTraitable()) {
            throw new Twig_Error_Runtime('Template "'."TroubleticketBundle:BA/modal:ba_export_performance.html.twig".'" cannot be used as a trait.');
        }
        $_trait_1_blocks = $_trait_1->getBlocks();

        $this->traits = array_merge(
            $_trait_0_blocks,
            $_trait_1_blocks
        );

        $this->blocks = array_merge(
            $this->traits,
            array(
                'body' => array($this, 'block_body'),
                'static_css' => array($this, 'block_static_css'),
                'static_js' => array($this, 'block_static_js'),
            )
        );
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "TroubleticketBundle::base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 4
    public function block_body($context, array $blocks = array())
    {
        // line 5
        echo "    ";
        if ($this->getContext($context, "message_error")) {
            // line 6
            echo "        <div class=\"error\">
            <span>";
            // line 7
            echo twig_escape_filter($this->env, $this->getContext($context, "message_error"), "html", null, true);
            echo "</span>
        </div>
    ";
        }
        // line 10
        echo "    ";
        if ($this->getContext($context, "message_success")) {
            // line 11
            echo "        <div class=\"sucesso\">
            <span>";
            // line 12
            echo twig_escape_filter($this->env, $this->getContext($context, "message_success"), "html", null, true);
            echo "</span>
        </div>
    ";
        }
        // line 15
        echo "    <div class=\"titleModulo\">
        <div>
            <span>Fila de BA</span>
        </div>
    </div>
    <form id=\"form_stack_search\" action=\"\" method=\"get\">
        <div class=\"row\" style=\"margin-bottom: 0px !important;\">
            <div class=\"col-sm-10\">
                <label>ID do BA</label>
                <input type=\"text\" id=\"input_id\" name=\"id\">
            </div>
            <div class=\"col-sm-10\">
                <label>CID</label>
                <input type=\"text\" id=\"input_cid\" name=\"cid\">
            </div>
            <div class=\"col-sm-10\">
                <label>Designação</label>
                <input type=\"text\" id=\"input_designacao\" name=\"designacao\">
            </div>
            <div class=\"col-sm-10\">
                <label>Status</label>
                <select type=\"text\" id=\"input_status\" name=\"status\">
                    <option value=\"\">Todos</option>
                    ";
        // line 38
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "status"));
        foreach ($context['_seq'] as $context["_key"] => $context["entry"]) {
            // line 39
            echo "                        <option value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["entry"], "code", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["entry"], "label", array()), "html", null, true);
            echo "</option>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['entry'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 41
        echo "                </select>
            </div>
            <div class=\"col-sm-10\">
                <label>Fila</label>
                <select id=\"input_stack_fila\" name=\"stack_fila\">
                    <option value=\"\">Todas</option>
                    ";
        // line 47
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "stacks"));
        foreach ($context['_seq'] as $context["_key"] => $context["stack"]) {
            // line 48
            echo "                        <option value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["stack"], "code", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["stack"], "label", array()), "html", null, true);
            echo "</option>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['stack'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 50
        echo "                </select>
            </div>
            <div class=\"col-sm-30\" style=\"margin-bottom: 0px !important;\">
                <label>Data de abertura</label>
                <div class=\"row\" style=\"margin-bottom: 0px !important;margin-top: 0 !important;\">
                    <div class=\"col-sm-10\" style=\"margin-bottom: 0px !important;\">
                        de:
                    </div>
                    <div class=\"col-sm-40\" style=\"margin-bottom: 0px !important;\">
                        <input type=\"text\" class=\"input_date\" id=\"initial_date\" name=\"initial_date\">
                    </div>
                    <div class=\"col-sm-10\" style=\"margin-bottom: 0px !important;\">
                        até:
                    </div>
                    <div class=\"col-sm-40\" style=\"margin-bottom: 0px !important;\">
                        <input type=\"text\" class=\"input_date\" id=\"final_date\" name=\"final_date\">
                    </div>
                </div>
            </div>
            <div class=\"col-sm-10\" style=\"margin-bottom: 0px !important;\">
                <button class=\"btn btn-primary\" type=\"button\" id=\"btn_show_filters\" name=\"btn_show_filters\">Exibir mais filtros</button>
                <div class=\"clearfix\"></div>
            </div>
        </div>
        <div class=\"row\" id=\"filters\">
            <div class=\"row\">
                <div class=\"col-sm-10\">
                    <label>UF</label>
                    <select type=\"text\" id=\"input_uf\" name=\"uf\">
                        <option value=\"\">Todos</option>
                        ";
        // line 80
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "ufs"), "states", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["states"]) {
            // line 81
            echo "                            <option value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["states"], "code", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["states"], "code", array()), "html", null, true);
            echo "</option>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['states'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 83
        echo "                    </select>
                </div>
                <div class=\"col-sm-10\">
                    <label>Severidade</label>
                    <select type=\"text\" id=\"input_severity\" name=\"severity\">
                        <option value=\"\">Todos</option>
                        ";
        // line 89
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "options_severidade"));
        foreach ($context['_seq'] as $context["key"] => $context["severidade"]) {
            // line 90
            echo "                            <option value=\"";
            echo twig_escape_filter($this->env, $context["key"], "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["severidade"], "severidade", array()), "html", null, true);
            echo "</option>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['severidade'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 92
        echo "                    </select>
                </div>
                <div class=\"col-sm-20\">
                    <label>Mostrar boletins:</label>
                    <input type=\"checkbox\" name=\"closed\" value=\"1\"/>Fechados
                    <input type=\"checkbox\" name=\"cancelled\" value=\"1\"/>Cancelados
                </div>
                <div class=\"col-sm-20\">
                    <label>Cliente:</label>
                    <input type=\"text\" name=\"client_name\"/>
                </div>
                <div class=\"col-sm-20\">
                    <label>Cliente Final:</label>
                    <input type=\"text\" name=\"final_client\"/>
                </div>
                <div class=\"col-sm-10\">
                    <label>VIP</label>
                    <select type=\"text\" id=\"input_vip\" name=\"vip\">
                        <option value=\"\">Todos</option>
                        ";
        // line 111
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "vips"));
        foreach ($context['_seq'] as $context["_key"] => $context["entry"]) {
            // line 112
            echo "                            <option value=\"";
            echo twig_escape_filter($this->env, $context["entry"], "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $context["entry"], "html", null, true);
            echo "</option>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['entry'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 114
        echo "                    </select>
                </div>
            </div>
            <div class=\"row\">
                <div class=\"col-sm-10\">
                    <label>ID do BI</label>
                    <input type=\"text\" id=\"input_id\" name=\"bi_id\">
                </div>
                <div class=\"col-sm-30\" style=\"margin-bottom: 0px !important;\">
                    <label>Data da &Uacute;ltima atualiza&ccedil;&atilde;o</label>
                    <div class=\"row\" style=\"margin-bottom: 0px !important;margin-top: 0 !important;\">
                        <div class=\"col-sm-10\" style=\"margin-bottom: 0px !important;\">
                            de:
                        </div>
                        <div class=\"col-sm-40\" style=\"margin-bottom: 0px !important;\">
                            <input type=\"text\" class=\"input_date\" id=\"initial_last_update\" name=\"initial_last_update\">
                        </div>
                        <div class=\"col-sm-10\" style=\"margin-bottom: 0px !important;\">
                            até:
                        </div>
                        <div class=\"col-sm-40\" style=\"margin-bottom: 0px !important;\">
                            <input type=\"text\" class=\"input_date\" id=\"final_last_update\" name=\"final_last_update\">
                        </div>
                    </div>
                </div>
                <div class=\"col-sm-20\">
                    <label>Respons&aacute;vel:</label>
                    <input type=\"text\" name=\"responsible\"/>
                </div>
            </div>
        </div>
        <div class=\"row\">
            <div class=\"col-sm-10\">
                <button class=\"btn btn-primary\">Pesquisar</button>
            </div>
        </div>
    </form>
    <table id=\"table_ba_stack\" class=\"hover row-border stripe compact cell-border\"></table>
    <div class=\"row report_actions\">
        <button class=\"btn btn-primary btn_stack_ba_export\" id=\"btn_stack_ba_export\">Relatório de Incidentes</button>
        <button class=\"btn btn-primary btn_stack_ba_export_performance\" id=\"btn_stack_ba_export_performance\">Relatório de Performance</button>
        <div class=\"clearfix\"></div>
    </div>
    <div id=\"div_stack_ba_export\" style=\"display:none;\">
        ";
        // line 158
        $this->displayBlock("ba_export", $context, $blocks);
        echo "
    </div>
    <div id=\"div_stack_ba_export_performance\" style=\"display:none;\">
        ";
        // line 161
        $this->displayBlock("ba_export_performance", $context, $blocks);
        echo "
    </div>
";
    }

    // line 164
    public function block_static_css($context, array $blocks = array())
    {
        // line 165
        echo "    <link rel=\"stylesheet\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/troubleticket/js/plugins/jquery-dataTables/datatables.min.css"), "html", null, true);
        echo "\" />
";
    }

    // line 167
    public function block_static_js($context, array $blocks = array())
    {
        // line 168
        echo "    <script type=\"text/javascript\">
        var stack_request = \"";
        // line 169
        echo $this->env->getExtension('routing')->getPath("troubleticket_ba_stack_request");
        echo "\",
            main_request = \"";
        // line 170
        echo $this->env->getExtension('routing')->getPath("troubleticket_ba_main", array("report_id" => 0));
        echo "\",
            subcase_request = \"";
        // line 171
        echo $this->env->getExtension('routing')->getPath("troubleticket_ba_subcase_main", array("subcaseId" => 0));
        echo "\",
            bi_main_request = \"";
        // line 172
        echo $this->env->getExtension('routing')->getPath("troubleticket_bi_main", array("report_id" => 0));
        echo "\",
            new_request = \"";
        // line 173
        echo $this->env->getExtension('routing')->getPath("troubleticket_ba_new");
        echo "\";
            page_limit = parseInt('";
        // line 174
        echo twig_escape_filter($this->env, $this->getContext($context, "page_limit"), "html", null, true);
        echo "');
    </script>
    <script type=\"text/javascript\" src=\"";
        // line 176
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/troubleticket/js/plugins/jquery-dataTables/datatables.min.js"), "html", null, true);
        echo "\"></script>
    <script type=\"text/javascript\" src=\"";
        // line 177
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/troubleticket/js/stack.js"), "html", null, true);
        echo "\"></script>
";
    }

    public function getTemplateName()
    {
        return "TroubleticketBundle:BA:stack.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  353 => 177,  349 => 176,  344 => 174,  340 => 173,  336 => 172,  332 => 171,  328 => 170,  324 => 169,  321 => 168,  318 => 167,  311 => 165,  308 => 164,  301 => 161,  295 => 158,  249 => 114,  238 => 112,  234 => 111,  213 => 92,  202 => 90,  198 => 89,  190 => 83,  179 => 81,  175 => 80,  143 => 50,  132 => 48,  128 => 47,  120 => 41,  109 => 39,  105 => 38,  80 => 15,  74 => 12,  71 => 11,  68 => 10,  62 => 7,  59 => 6,  56 => 5,  53 => 4,  44 => 1,  21 => 3,  14 => 2,  11 => 1,);
    }
}
/* {% extends 'TroubleticketBundle::base.html.twig' %}*/
/* {% use "TroubleticketBundle:BA/modal:ba_export.html.twig" %}*/
/* {% use "TroubleticketBundle:BA/modal:ba_export_performance.html.twig" %}*/
/* {% block body %}*/
/*     {% if message_error %}*/
/*         <div class="error">*/
/*             <span>{{message_error}}</span>*/
/*         </div>*/
/*     {% endif %}*/
/*     {% if message_success %}*/
/*         <div class="sucesso">*/
/*             <span>{{message_success}}</span>*/
/*         </div>*/
/*     {% endif %}*/
/*     <div class="titleModulo">*/
/*         <div>*/
/*             <span>Fila de BA</span>*/
/*         </div>*/
/*     </div>*/
/*     <form id="form_stack_search" action="" method="get">*/
/*         <div class="row" style="margin-bottom: 0px !important;">*/
/*             <div class="col-sm-10">*/
/*                 <label>ID do BA</label>*/
/*                 <input type="text" id="input_id" name="id">*/
/*             </div>*/
/*             <div class="col-sm-10">*/
/*                 <label>CID</label>*/
/*                 <input type="text" id="input_cid" name="cid">*/
/*             </div>*/
/*             <div class="col-sm-10">*/
/*                 <label>Designação</label>*/
/*                 <input type="text" id="input_designacao" name="designacao">*/
/*             </div>*/
/*             <div class="col-sm-10">*/
/*                 <label>Status</label>*/
/*                 <select type="text" id="input_status" name="status">*/
/*                     <option value="">Todos</option>*/
/*                     {% for entry in status %}*/
/*                         <option value="{{entry.code}}">{{entry.label}}</option>*/
/*                     {% endfor %}*/
/*                 </select>*/
/*             </div>*/
/*             <div class="col-sm-10">*/
/*                 <label>Fila</label>*/
/*                 <select id="input_stack_fila" name="stack_fila">*/
/*                     <option value="">Todas</option>*/
/*                     {% for stack in stacks %}*/
/*                         <option value="{{stack.code}}">{{stack.label}}</option>*/
/*                     {% endfor %}*/
/*                 </select>*/
/*             </div>*/
/*             <div class="col-sm-30" style="margin-bottom: 0px !important;">*/
/*                 <label>Data de abertura</label>*/
/*                 <div class="row" style="margin-bottom: 0px !important;margin-top: 0 !important;">*/
/*                     <div class="col-sm-10" style="margin-bottom: 0px !important;">*/
/*                         de:*/
/*                     </div>*/
/*                     <div class="col-sm-40" style="margin-bottom: 0px !important;">*/
/*                         <input type="text" class="input_date" id="initial_date" name="initial_date">*/
/*                     </div>*/
/*                     <div class="col-sm-10" style="margin-bottom: 0px !important;">*/
/*                         até:*/
/*                     </div>*/
/*                     <div class="col-sm-40" style="margin-bottom: 0px !important;">*/
/*                         <input type="text" class="input_date" id="final_date" name="final_date">*/
/*                     </div>*/
/*                 </div>*/
/*             </div>*/
/*             <div class="col-sm-10" style="margin-bottom: 0px !important;">*/
/*                 <button class="btn btn-primary" type="button" id="btn_show_filters" name="btn_show_filters">Exibir mais filtros</button>*/
/*                 <div class="clearfix"></div>*/
/*             </div>*/
/*         </div>*/
/*         <div class="row" id="filters">*/
/*             <div class="row">*/
/*                 <div class="col-sm-10">*/
/*                     <label>UF</label>*/
/*                     <select type="text" id="input_uf" name="uf">*/
/*                         <option value="">Todos</option>*/
/*                         {% for states in ufs.states %}*/
/*                             <option value="{{states.code}}">{{states.code}}</option>*/
/*                         {% endfor %}*/
/*                     </select>*/
/*                 </div>*/
/*                 <div class="col-sm-10">*/
/*                     <label>Severidade</label>*/
/*                     <select type="text" id="input_severity" name="severity">*/
/*                         <option value="">Todos</option>*/
/*                         {% for key, severidade in options_severidade %}*/
/*                             <option value="{{key}}">{{severidade.severidade}}</option>*/
/*                         {% endfor %}*/
/*                     </select>*/
/*                 </div>*/
/*                 <div class="col-sm-20">*/
/*                     <label>Mostrar boletins:</label>*/
/*                     <input type="checkbox" name="closed" value="1"/>Fechados*/
/*                     <input type="checkbox" name="cancelled" value="1"/>Cancelados*/
/*                 </div>*/
/*                 <div class="col-sm-20">*/
/*                     <label>Cliente:</label>*/
/*                     <input type="text" name="client_name"/>*/
/*                 </div>*/
/*                 <div class="col-sm-20">*/
/*                     <label>Cliente Final:</label>*/
/*                     <input type="text" name="final_client"/>*/
/*                 </div>*/
/*                 <div class="col-sm-10">*/
/*                     <label>VIP</label>*/
/*                     <select type="text" id="input_vip" name="vip">*/
/*                         <option value="">Todos</option>*/
/*                         {% for entry in vips %}*/
/*                             <option value="{{entry}}">{{entry}}</option>*/
/*                         {% endfor %}*/
/*                     </select>*/
/*                 </div>*/
/*             </div>*/
/*             <div class="row">*/
/*                 <div class="col-sm-10">*/
/*                     <label>ID do BI</label>*/
/*                     <input type="text" id="input_id" name="bi_id">*/
/*                 </div>*/
/*                 <div class="col-sm-30" style="margin-bottom: 0px !important;">*/
/*                     <label>Data da &Uacute;ltima atualiza&ccedil;&atilde;o</label>*/
/*                     <div class="row" style="margin-bottom: 0px !important;margin-top: 0 !important;">*/
/*                         <div class="col-sm-10" style="margin-bottom: 0px !important;">*/
/*                             de:*/
/*                         </div>*/
/*                         <div class="col-sm-40" style="margin-bottom: 0px !important;">*/
/*                             <input type="text" class="input_date" id="initial_last_update" name="initial_last_update">*/
/*                         </div>*/
/*                         <div class="col-sm-10" style="margin-bottom: 0px !important;">*/
/*                             até:*/
/*                         </div>*/
/*                         <div class="col-sm-40" style="margin-bottom: 0px !important;">*/
/*                             <input type="text" class="input_date" id="final_last_update" name="final_last_update">*/
/*                         </div>*/
/*                     </div>*/
/*                 </div>*/
/*                 <div class="col-sm-20">*/
/*                     <label>Respons&aacute;vel:</label>*/
/*                     <input type="text" name="responsible"/>*/
/*                 </div>*/
/*             </div>*/
/*         </div>*/
/*         <div class="row">*/
/*             <div class="col-sm-10">*/
/*                 <button class="btn btn-primary">Pesquisar</button>*/
/*             </div>*/
/*         </div>*/
/*     </form>*/
/*     <table id="table_ba_stack" class="hover row-border stripe compact cell-border"></table>*/
/*     <div class="row report_actions">*/
/*         <button class="btn btn-primary btn_stack_ba_export" id="btn_stack_ba_export">Relatório de Incidentes</button>*/
/*         <button class="btn btn-primary btn_stack_ba_export_performance" id="btn_stack_ba_export_performance">Relatório de Performance</button>*/
/*         <div class="clearfix"></div>*/
/*     </div>*/
/*     <div id="div_stack_ba_export" style="display:none;">*/
/*         {{ block('ba_export') }}*/
/*     </div>*/
/*     <div id="div_stack_ba_export_performance" style="display:none;">*/
/*         {{ block('ba_export_performance') }}*/
/*     </div>*/
/* {% endblock %}*/
/* {% block static_css %}*/
/*     <link rel="stylesheet" href="{{ asset('bundles/troubleticket/js/plugins/jquery-dataTables/datatables.min.css') }}" />*/
/* {% endblock %}*/
/* {% block static_js %}*/
/*     <script type="text/javascript">*/
/*         var stack_request = "{{path('troubleticket_ba_stack_request')}}",*/
/*             main_request = "{{path('troubleticket_ba_main',{'report_id':0})}}",*/
/*             subcase_request = "{{path('troubleticket_ba_subcase_main',{'subcaseId':0})}}",*/
/*             bi_main_request = "{{path('troubleticket_bi_main',{'report_id':0})}}",*/
/*             new_request = "{{path('troubleticket_ba_new')}}";*/
/*             page_limit = parseInt('{{page_limit}}');*/
/*     </script>*/
/*     <script type="text/javascript" src="{{ asset('bundles/troubleticket/js/plugins/jquery-dataTables/datatables.min.js') }}"></script>*/
/*     <script type="text/javascript" src="{{ asset('bundles/troubleticket/js/stack.js') }}"></script>*/
/* {% endblock %}*/
/* */
