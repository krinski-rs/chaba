<?php

/* TroubleticketBundle:BA/modal:ba_export.html.twig */
class __TwigTemplate_ee60819c7443579d6f56b578b3cae3a3901dfb456ad05914bd33d3e940c123cb extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'ba_export' => array($this, 'block_ba_export'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $this->displayBlock('ba_export', $context, $blocks);
    }

    public function block_ba_export($context, array $blocks = array())
    {
        // line 2
        echo "<div class=\"row\">
    <form id=\"form_stack_ba_export\" method=\"GET\" action=\"";
        // line 3
        echo $this->env->getExtension('routing')->getPath("troubleticket_ba_report_incident");
        echo "\">
        <div class=\"col-sm-100\">
            <div class=\"row\">
                <div class=\"col-sm-50\">
                    <label>Data Inicial</label>
                    <input type=\"text\" name=\"date_init\" class=\"input_date input_ba_stack_export_date_init\">
                    <div class=\"error alert\" id=\"div_error_input_ba_stack_export_date_init\" style=\"display:none\"><span>Este campo precisa ser preenchido corretamente!</span></div>
                </div>
                <div class=\"col-sm-50\">
                    <label>Data Final</label>
                    <input type=\"text\" name=\"date_end\" class=\"input_date input_ba_stack_export_date_end\">
                    <div class=\"error alert\" id=\"div_error_input_ba_stack_export_date_end\" style=\"display:none\"><span>Este campo precisa ser preenchido corretamente!</span></div>
                </div>
            </div>
            <div class=\"row\">
                <label>Nome do cliente</label>
                <input type=\"text\" name=\"client_name\">
            </div>
            <div class=\"row\">
                <label>Nome do cliente final</label>
                <input type=\"text\" name=\"client_name_final\">
            </div>
            <div class=\"row\">
                <label>UF</label>
                <select name=\"client_uf\">
                    <option value=\"\">---</option>
                    <option value=\"AC\">Acre</option>
                    <option value=\"AL\">Alagoas</option>
                    <option value=\"AP\">Amapá</option>
                    <option value=\"AM\">Amazonas</option>
                    <option value=\"BA\">Bahia</option>
                    <option value=\"CE\">Ceará</option>
                    <option value=\"DF\">Distrito Federal</option>
                    <option value=\"GO\">Goiás</option>
                    <option value=\"ES\">Espírito Santo</option>
                    <option value=\"MA\">Maranhão</option>
                    <option value=\"MT\">Mato Grosso</option>
                    <option value=\"MS\">Mato Grosso do Sul</option>
                    <option value=\"MG\">Minas Gerais</option>
                    <option value=\"PA\">Pará</option>
                    <option value=\"PB\">Paraiba</option>
                    <option value=\"PR\">Paraná</option>
                    <option value=\"PE\">Pernambuco</option>
                    <option value=\"PI\">Piauí­</option>
                    <option value=\"RJ\">Rio de Janeiro</option>
                    <option value=\"RN\">Rio Grande do Norte</option>
                    <option value=\"RS\">Rio Grande do Sul</option>
                    <option value=\"RO\">Rondônia</option>
                    <option value=\"RR\">Roraima</option>
                    <option value=\"SP\">São Paulo</option>
                    <option value=\"SC\">Santa Catarina</option>
                    <option value=\"SE\">Sergipe</option>
                    <option value=\"TO\">Tocantins</option>
                </select>
            </div>
        </div>
    </form>
</div>
";
    }

    public function getTemplateName()
    {
        return "TroubleticketBundle:BA/modal:ba_export.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  29 => 3,  26 => 2,  20 => 1,);
    }
}
/* {% block ba_export %}*/
/* <div class="row">*/
/*     <form id="form_stack_ba_export" method="GET" action="{{ path('troubleticket_ba_report_incident') }}">*/
/*         <div class="col-sm-100">*/
/*             <div class="row">*/
/*                 <div class="col-sm-50">*/
/*                     <label>Data Inicial</label>*/
/*                     <input type="text" name="date_init" class="input_date input_ba_stack_export_date_init">*/
/*                     <div class="error alert" id="div_error_input_ba_stack_export_date_init" style="display:none"><span>Este campo precisa ser preenchido corretamente!</span></div>*/
/*                 </div>*/
/*                 <div class="col-sm-50">*/
/*                     <label>Data Final</label>*/
/*                     <input type="text" name="date_end" class="input_date input_ba_stack_export_date_end">*/
/*                     <div class="error alert" id="div_error_input_ba_stack_export_date_end" style="display:none"><span>Este campo precisa ser preenchido corretamente!</span></div>*/
/*                 </div>*/
/*             </div>*/
/*             <div class="row">*/
/*                 <label>Nome do cliente</label>*/
/*                 <input type="text" name="client_name">*/
/*             </div>*/
/*             <div class="row">*/
/*                 <label>Nome do cliente final</label>*/
/*                 <input type="text" name="client_name_final">*/
/*             </div>*/
/*             <div class="row">*/
/*                 <label>UF</label>*/
/*                 <select name="client_uf">*/
/*                     <option value="">---</option>*/
/*                     <option value="AC">Acre</option>*/
/*                     <option value="AL">Alagoas</option>*/
/*                     <option value="AP">Amapá</option>*/
/*                     <option value="AM">Amazonas</option>*/
/*                     <option value="BA">Bahia</option>*/
/*                     <option value="CE">Ceará</option>*/
/*                     <option value="DF">Distrito Federal</option>*/
/*                     <option value="GO">Goiás</option>*/
/*                     <option value="ES">Espírito Santo</option>*/
/*                     <option value="MA">Maranhão</option>*/
/*                     <option value="MT">Mato Grosso</option>*/
/*                     <option value="MS">Mato Grosso do Sul</option>*/
/*                     <option value="MG">Minas Gerais</option>*/
/*                     <option value="PA">Pará</option>*/
/*                     <option value="PB">Paraiba</option>*/
/*                     <option value="PR">Paraná</option>*/
/*                     <option value="PE">Pernambuco</option>*/
/*                     <option value="PI">Piauí­</option>*/
/*                     <option value="RJ">Rio de Janeiro</option>*/
/*                     <option value="RN">Rio Grande do Norte</option>*/
/*                     <option value="RS">Rio Grande do Sul</option>*/
/*                     <option value="RO">Rondônia</option>*/
/*                     <option value="RR">Roraima</option>*/
/*                     <option value="SP">São Paulo</option>*/
/*                     <option value="SC">Santa Catarina</option>*/
/*                     <option value="SE">Sergipe</option>*/
/*                     <option value="TO">Tocantins</option>*/
/*                 </select>*/
/*             </div>*/
/*         </div>*/
/*     </form>*/
/* </div>*/
/* {% endblock %}*/
