<?php

namespace TroubleticketBundle\Controller;

// Aumentado limite, pois existem casos em que há muitos BA's vinculados a uma BI
// ultrapassando o max_execution_time de 30 segundos padrão
set_time_limit(300);

use DateTime;
use Exception;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Generator\UrlGenerator;
use Symfony\Component\Yaml\Parser;
use Symfony\Component\Validator\Constraints\NotBlank;

use TroubleticketBundle\Exception\TroubleticketBundleException;

use TroubleticketBundle\Service;
use TroubleticketBundle\Entity;
use TroubleticketBundle\Component\XLSResponse;

/**
 * Controladora que permite realizar ações sobre Boletins de Interrupçãos
 */
class BIController extends Controller
{
    /**
     * Limite de itens por página na apresentação da fila
     *
     * @var int
     * @access private
     */
    private $stack_page_limit = 10;

    /**
     * Obtem um Boletim de Interrupção pelo identificador
     *
     * @param int $report_id
     * @access protected
     * @return Entity\Reports;
     */
    protected function getBI($report_id)
    {
        $repository = $this->getDoctrine()->getRepository('TroubleticketBundle:Reports', 'troubleticket');

        return $repository->findOneBy(array('id' => $report_id, 'type' => Entity\Reports::TYPE_BI));
    }

    /**
     * Ação para assumir um BI
     *
     * @param Request $request
     * @param int $report_id
     * @access public
     * @return mixed
     */
    public function takeOnAction(Request $request, $report_id)
    {
        $permissions = $this->get('permissions');

        if (!$permissions->isAllowed('BI', 'take_on')) {
            $request->getSession()->getFlashBag()->add(
                'error',
                'Você não possui permissão para editar Boletins de Interrupção'
            );

            return $this->redirect($this->generateUrl('troubleticket_bi_stack'));
        }

        $report = $this->getBI($report_id);

        if (empty($report)) {
            $request->getSession()->getFlashBag()->add(
                'error',
                'BI não encontrado'
            );

            return $this->redirect($this->generateUrl('troubleticket_bi_stack'));
        }

        $service = new Service\Reports($this->getDoctrine(), $this->container);

        try {
            if ($service->takeOn($report, $_SESSION['usr_codigoid'])) {
                $request->getSession()->getFlashBag()->add(
                    'success',
                    'BI assumido com sucesso!'
                );

            } else {
                $request->getSession()->getFlashBag()->add(
                    'error',
                    'Não foi possível assumir o BI'
                );
            }

        } catch (Exception $e) {
            $request->getSession()->getFlashBag()->add(
                'error',
                'Ocorreu um erro ao tentar assumir o BI'
            );
        }

        return $this->redirect($this->generateUrl('troubleticket_bi_main', array('report_id' => $report_id)));
    }

    /**
     * Ação para transferir o boletim para um usuário
     *
     * @param Request $request
     * @param integer $report_id
     * @access public
     * @return mixed
     */
    public function sendToUserAction(Request $request, $report_id)
    {
        $permissions = $this->get('permissions');
        if (!$permissions->isAllowed('BI', 'send_to_user')) {
            $request->getSession()->getFlashBag()->add(
                'error',
                'Você não possui permissão para editar Boletins de Interrupção'
            );
            return $this->redirect($this->generateUrl('troubleticket_bi_stack'));
        }
        $report = $this->getBI($report_id);

        if (empty($report)) {
            $request->getSession()->getFlashBag()->add(
                'error',
                'BI não encontrado'
            );
            return $this->redirect($this->generateUrl('troubleticket_bi_stack'));
        }

        $colaboradorId = $request->request->get('colaborador');
        if (!$colaboradorId) {
            $request->getSession()->getFlashBag()->add(
                'error',
                'Colaborador não encontrado'
            );
            return $this->redirect($this->generateUrl('troubleticket_bi_main', array('report_id' => $report_id)));
        }
        $troubleticket_colaborador_api = $this->get('troubleticket.colaborador_api');
        $troubleticket_colaborador_api->setUrlPath(vsprintf('colaborador/%s',array($colaboradorId)));
        $colaborador = $troubleticket_colaborador_api->get(1, 0, null);
        if (empty($colaborador->colaborador)){
            $request->getSession()->getFlashBag()->add(
                'error',
                'Colaborador não encontrado'
            );
            return $this->redirect($this->generateUrl('troubleticket_bi_main', array('report_id' => $report_id)));
        }

        $service = new Service\Reports($this->getDoctrine(), $this->container);
        try {
            if ($service->takeOn($report,  $colaborador->colaborador->id)) {
                $request->getSession()->getFlashBag()->add(
                    'success',
                    'BI transferido com sucesso!'
                );
            } else {
                $request->getSession()->getFlashBag()->add(
                    'error',
                    'Não foi possível transferir o BI'
                );
            }
        } catch (Exception $e) {
            $request->getSession()->getFlashBag()->add(
                'error',
                'Ocorreu um erro ao tentar transferir o BI'
            );
        }
        return $this->redirect($this->generateUrl('troubleticket_bi_main', array('report_id' => $report_id)));
    }

    /**
     * Ação para a pesquisa de circuitos para a criação de um BI
     *
     * @param Request $request
     * @access public
     * @return JsonResponse
     */
    public function circuitRequestAction(Request $request)
    {
        $request_draw = intval($request->query->get('draw'));
        $request_start = intval($request->query->get('start'));
        $request_page_limit = intval($request->query->get('length'));

        $request_reports_designation = strval($request->query->get('designador'));

        $troubleticket_circuit_api = $this->get('troubleticket.circuit_api');
        $error = null;

        try {
            $troubleticket_circuit_api_get = $troubleticket_circuit_api->get(
                $request_page_limit,
                $request_start,
                null,
                $request_reports_designation,
                null,
                true);

        } catch (TroubleticketBundleException $error) {
            $request->getSession()->getFlashBag()->add('error_message',$error->getMessage());

            $troubleticket_circuit_api_get = array();
            $error = $error->getMessage();
        }

        $data_list = array();
        $data_total = 0;

        if (!empty($troubleticket_circuit_api_get) && !empty($troubleticket_circuit_api_get->circuito)) {
            $data_total = intval($troubleticket_circuit_api_get->total);
            $cid_list = array();

            foreach ($troubleticket_circuit_api_get->circuito as $circuito) {
                if (!in_array($circuito->clieCodigoid,$cid_list)) {
                    $cid_list[] = $circuito->clieCodigoid;
                }
            }

            $troubleticket_client_api = $this->get('troubleticket.client_api');

            $cid_listring = vsprintf('[%s]',implode(',',$cid_list));
            try {
            $troubleticket_client_api_get = $troubleticket_client_api->get(
                $this->stack_page_limit,
                0,
                null,
                null,
                $cid_listring);
            } catch (TroubleticketBundleException $e) {
                $error = $e->getMessage();
            }

            $client_list = $troubleticket_client_api_get->customer;

            foreach ($troubleticket_circuit_api_get->circuito as $circuito) {
                $client_name = '';

                foreach ($client_list as $client) {
                    if ($circuito->clieCodigoid == $client->customerid) {
                        $client_name = $client->nomeFantasia.'/'.$client->cnpj;
                    }
                }

                $data_aux = array(
                    $circuito->contCodigoid,
                    $client_name,
                    $circuito->designador,
                    vsprintf('%s, %s, %s, %s - %s / %s - %s', array($circuito->endeentrLogradouro,$circuito->endeentrNumero,$circuito->endeentrBairro,$circuito->nomeCidade,$circuito->siglaUf,$circuito->nomePais,$circuito->endeentrCep)),
                    '<button type="submit" class="button btn_bi_new" data-id="'.$circuito->contCodigoid.'">Abrir BI</button>');

                $data_list[] = $data_aux;
            }
        }

        $json_response = new JsonResponse();
        $json_response->setData(array(
            'data' => $data_list,
            'recordsTotal' => $data_total,
            'recordsFiltered' => $data_total,
            'draw' => $request_draw,
            'error' => $error
        ));

        return $json_response;
    }

    /**
     * Ação de início da criação do BI
     *
     * Através dela é que se tem acesso a pesquisa e a criação propriamente dita
     *
     * @param Request $request
     * @access public
     * @return mixed
     */
    public function newAction(Request $request)
    {
        $permissions = $this->get('permissions');

        if (!$permissions->isAllowed('BI', 'create')) {
            $request->getSession()->getFlashBag()->add(
                'error',
                'Você não possui permissão para inserir Boletins de Interrupção'
            );

            return $this->redirect($this->generateUrl('troubleticket_bi_stack'));
        }

        $designador = null;
        $troubleticket_circuit_api_get = null;

        $data = $request->get('data');

        if ($request->isMethod('POST') && !empty($data)) {
            $designador = $data;

            $troubleticket_circuit_api = $this->get('troubleticket.circuit_api');

            try {
                $troubleticket_circuit_api_get = $troubleticket_circuit_api->get(50, 0, null, $designador,null);

            } catch (TroubleticketBundleException $error) {
                $request->getSession()->getFlashBag()->add(
                    'error',
                    'Erro na comunicação com a API de circuitos'
                );

                return $this->redirect($this->generateUrl('troubleticket_bi_new'));
            }
        }


        $render_template = 'TroubleticketBundle:BI:new.html.twig';
        $render_template_data = array(
            'message_error' => null,
            'message_success' => null,
            'designador' => null,
            'api_circuit' => null,
            'page_limit' => $this->stack_page_limit
        );

        if (!$request->isMethod('POST') || empty($troubleticket_circuit_api_get)) {
            $render = $this->render($render_template,$render_template_data);

            return $render;

        } else if ($troubleticket_circuit_api_get->total == '1') {
            $response = $this->forward('TroubleticketBundle:BI:createPreview',array(),array());

            return $response;

        } else {
            $render_template_data['designador'] = $designador;
            $render_template_data['api_circuit'] = $troubleticket_circuit_api_get;

            $render = $this->render($render_template, $render_template_data);

            return $render;
        }
    }

    /**
     * Ação que realiza o primeiro estágio de criação do BI
     *
     * Neste momento o BI é criado como Inativo e não contabiliza tempo
     *
     * @param Request $request
     * @access public
     * @return mixed
     */
    public function createPreviewAction(Request $request)
    {
        $circuit_id = null;
        $designador = null;

        $data = $request->get('data');

        if (!$request->isMethod('POST') || empty($data)) {
            return $this->redirect($this->generateUrl('troubleticket_bi_new'));
        }

        $permissions = $this->get('permissions');

        if (!$permissions->isAllowed('BI', 'create')) {
            $request->getSession()->getFlashBag()->add(
                'error',
                'Você não possui permissão para inserir Boletins de Interrupção'
            );

            return $this->redirect($this->generateUrl('troubleticket_bi_stack'));
        }

        if (is_numeric($data)) {
            $circuit_id = $data;

        } else {
            $designador = $data;
        }

        $troubleticket_circuit_api = $this->get('troubleticket.circuit_api');

        if (!empty($circuit_id)) {
            $troubleticket_circuit_api->setUrlPath(vsprintf('circuito/%s',array($circuit_id)));

            try {
                $troubleticket_circuit_api_get = $troubleticket_circuit_api->get(1, 0, null, null,null);

            } catch (TroubleticketBundleException $error) {
                $request->getSession()->getFlashBag()->add(
                    'error',
                    $error->getMessage()
                );

                return $this->redirect($this->generateUrl('troubleticket_bi_new'));
            }

            $circuito = $troubleticket_circuit_api_get->circuito;

        } else if (!empty($designador)) {
            try {
                $troubleticket_circuit_api_get = $troubleticket_circuit_api->get(1,0,null,$designador);

            } catch (TroubleticketBundleException $error) {
                $request->getSession()->getFlashBag()->add(
                    'error',
                    $error->getMessage()
                );

                return $this->redirect($this->generateUrl('troubleticket_bi_new'));
            }

            $circuito = $troubleticket_circuit_api_get->circuito[0];
        }

        try {
            $service = new Service\Reports($this->getDoctrine(), $this->container);
            $report = $service->create(array(
                'circuit_id' => $circuito->contCodigoid,
                'designation' => $circuito->designador,
                'stack' => Entity\Reports::STACK_SN2,
                'type' => Entity\Reports::TYPE_BI,
                'responsible' => $_SESSION['usr_codigoid'],
            ), 'BI criado');

        } catch (TroubleticketBundleException $error) {
            $request->getSession()->getFlashBag()->add(
                'error',
                $error->getMessage()
            );

            return $this->redirect($this->generateUrl('troubleticket_bi_new'));
        }

        $response = $this->redirect(
            $this->generateUrl(
                'troubleticket_bi_create',
                array('report_id' => $report->getId())
            )
        );

        return $response;
    }

    /**
     * Ação que permite a ativação do BI
     *
     * Está apresenta um formulário para o preenchimento das informações adicionais.
     * Quando o usuário preenche os dados corretamente o BI passa de "Inativo" para "Em Atendimento"
     *
     * @param Request $request
     * @param int $report_id
     * @access public
     * @return mixed
     */
    public function createAction(Request $request, $report_id = null)
    {
        $permissions = $this->get('permissions');

        if (!$permissions->isAllowed('BI', 'create')) {
            $request->getSession()->getFlashBag()->add(
                'error',
                'Você não possui permissão para inserir Boletins de Anormalidade'
            );

            return $this->redirect($this->generateUrl('troubleticket_bi_stack'));
        }

        $report = $this->getBI($report_id);

        if (empty($report)) {
            $request->getSession()->getFlashBag()->add(
                'error',
                'BI não encontrado'
            );
            return $this->redirect($this->generateUrl('troubleticket_bi_stack'));
        }

        if ($report->getStatus() != $report::INATIVO ) {
            $url = $this->generateUrl('troubleticket_bi_main',array(
                'report_id' => $report->getId()));

            return $this->redirect($url);
        }

        $service = new Service\Reports($this->getDoctrine(), $this->container);
        $service->loadResponsibleData($report);

        $troubleticket_circuit_api = $this->get('troubleticket.circuit_api');
        $troubleticket_circuit_api->setUrlPath(vsprintf('circuito/%s',array($report->getCircuitId())));

        try {
            $troubleticket_circuit_api_get = $troubleticket_circuit_api->get(1, 0, null, null,null);

        } catch (TroubleticketBundleException $error) {
            $request->getSession()->getFlashBag()->add(
                'error',
                'Não foi possível obter os dados do circuito'
            );
            return $this->redirect($this->generateUrl('troubleticket_bi_new'));
        }

        $circuit = $troubleticket_circuit_api_get->circuito;

        $blockedStatuses = array(10, 11);
        if (in_array($circuit->statCodigoid, $blockedStatuses)) {
            $request->getSession()->getFlashBag()->add(
                'alert',
                'Este circuito está bloqueado!'
            );
        }

        $troubleticket_client_api = $this->get('troubleticket.client_api');
        $troubleticket_client_api->setUrlPath(vsprintf('cliente/%s',array($circuit->clieCodigoid)));

        try {
            $troubleticket_client_api_get = $troubleticket_client_api->get(50, 0, null);

        } catch (TroubleticketBundleException $error) {
            $request->getSession()->getFlashBag()->add(
                'error',
                'Não foi possível obter os dados do cliente'
            );

            return $this->redirect($this->generateUrl('troubleticket_bi_new'));
        }

        $client = $troubleticket_client_api_get->customer;

        $render_template = 'TroubleticketBundle:BI:add.html.twig';
        $render_template_data = array(
            'message_error' => null,
            'message_success' => null,
        );

        $form = $this->createFormBuilder()
            ->add('description', 'textarea', array('constraints' => array(new NotBlank())))
            ->add('symptom', 'text', array('constraints' => array(new NotBlank())))
            ->add('stretch', 'text', array('required' => false))
            ->getForm();

        if ($request->isMethod('POST')) {
            $form->handleRequest($request);
            if ($form->isValid()) {
                $data = $form->getData();

                $report->setDescription($data['description']);
                $report->setSymptom($data['symptom']);

                $stretch = trim($data['stretch']);
                if (!empty($stretch)) {
                    $report->setStretch($stretch);
                }

                $service = new Service\Reports($this->getDoctrine(), $this->container);
                $service->open($report, 'BI iniciado');

                $request->getSession()->getFlashBag()->set('alert',null);
                return $this->redirect($this->generateUrl('troubleticket_bi_main', array('report_id' => $report->getId())));

            } else {
                $render_template_data['message_error'] = 'Alguns campos não foram preenchidos corretamente';
            }
        }

        $yaml_options_sintoma = __DIR__.'/../Resources/config/BA/options_sintoma.yaml';

        $yaml_parser = new Parser();

        $yaml_options_sintoma = $yaml_parser->parse(file_get_contents($yaml_options_sintoma));

        $render_template_data['yaml_options_sintoma'] = $yaml_options_sintoma;
        $render_template_data['reports'] = $report;
        $render_template_data['api_circuit'] = $circuit;
        $render_template_data['api_client'] = $client;
        $render_template_data['form'] = $form->createView();

        $render = $this->render($render_template,$render_template_data);

        return $render;
    }

    /**
     * Ação de atualização do sintoma do boletim
     *
     * @param Request $request
     * @param integer $report_id
     * @access public
     * @return mixed
     */
    public function symptomUpdateAction(Request $request, $report_id)
    {
        $permissions = $this->get('permissions');
        if (!$permissions->isAllowed('BI', 'update')) {
            $request->getSession()->getFlashBag()->add(
                'error',
                'Você não possui permissão para editar Boletins de Incidente'
            );
            return $this->redirect($this->generateUrl('troubleticket_bi_stack'));
        }
        $reports_repository = $this->getDoctrine()->getRepository('TroubleticketBundle:Reports', 'troubleticket');
        $reports = $reports_repository->findOneBy(array(
            'id' => $report_id,
            'type' => Entity\Reports::TYPE_BI));

        if (empty($reports)) {
            $request->getSession()->getFlashBag()->add(
                'message_error',
                'BI não encontrado'
            );

            $response = $this->redirect($this->generateUrl('troubleticket_bi_stack'));

            return $response;
        }

        $reports_status = $reports->getStatus();

        if ($reports_status != Entity\Reports::EM_ATENDIMENTO) {
            $session = $request->getSession();

            $session->getFlashBag()->set('message_error',null);
            $session->getFlashBag()->add('message_error','Status do BI impede esta atualização!');

            $route_troubleticket_bi_main = $this->generateUrl('troubleticket_bi_main',array('report_id' => $report_id));

            $response = $this->redirect($route_troubleticket_bi_main);

            return $response;
        }

        if ($reports->hasOpenedSubcases()) {
            $request->getSession()->getFlashBag()->add(
                'message_error',
                'Não é permitido atualizar o BI com subcasos em aberto!'
            );

            return $this->redirect($this->generateUrl('troubleticket_bi_main', array('report_id' => $report_id)));
        }

        $yaml_options_sintoma = __DIR__.'/../Resources/config/BA/options_sintoma.yaml';

        $yaml_parser = new Parser();
        $yaml_options_sintoma = $yaml_parser->parse(file_get_contents($yaml_options_sintoma));

        $request_reports_symptom = $request->request->get('symptom',null);
        if (!in_array($request_reports_symptom, array_keys($yaml_options_sintoma))) {
            $request->getSession()->getFlashBag()->add(
                'message_error',
                'Sintoma informado não existe!'
            );

            return $this->redirect($this->generateUrl('troubleticket_bi_main', array('report_id' => $report_id)));
        }

        try {
            $history_comment = sprintf("Sintoma do BI alterado para %s.", $yaml_options_sintoma[$request_reports_symptom]['sintoma']);
            $reports->setSymptom($request_reports_symptom);

            $service = new Service\Reports($this->getDoctrine(), $this->container);
            $service->update($reports,$history_comment);

        } catch (TroubleticketBundleException $error) {
            $session = $request->getSession();

            $session->getFlashBag()->set('message_error',null);
            $session->getFlashBag()->add('message_error','Ocorreu um erro, e não foi possivel atualizar o BI!');

            $route_troubleticket_bi_main = $this->generateUrl('troubleticket_bi_main',array('report_id' => $report_id));

            $response = $this->redirect($route_troubleticket_bi_main);

            return $response;
        }

        $session = $request->getSession();

        $session->getFlashBag()->set('message_success',null);
        $session->getFlashBag()->add('message_success','BI atualizado!');

        $route_troubleticket_bi_main = $this->generateUrl('troubleticket_bi_main',array('report_id' => $report_id));

        $response = $this->redirect($route_troubleticket_bi_main);

        return $response;
    }

    /**
     * Ação que apresenta o detalhamento do BI
     *
     * É a partir desta que as demais ações de um BA existente são acessadas.
     *
     * @param Request $request
     * @param int $report_id
     * @access public
     * @return null
     */
    public function mainAction(Request $request, $report_id) {
        $permissions = $this->get('permissions');

        if (!$permissions->isAllowed('BI','read')) {
            $request->getSession()->getFlashBag()->add(
                'error',
                'Você não possui permissão para visualizar Boletins de Interrupção'
            );

            //TODO para onde deve redirecionar??
            $pathInfo = $request->getPathInfo();
            $uri = $request->getRequestUri();

            return $this->redirect(preg_replace('$'.$pathInfo.'.*$', '', $uri));
        }

        $reports = $this->getBI($report_id);

        if (empty($reports)) {
            $request->getSession()->getFlashBag()->add(
                'error',
                'BI não encontrado'
            );

            return $this->redirect($this->generateUrl('troubleticket_bi_stack'));
        }

        $reports_status = $reports->getStatus();

        $availableStatus = array(
            Entity\Reports::EM_ATENDIMENTO,
            Entity\Reports::PAUSADO,
            Entity\Reports::RESOLVIDO,
            Entity\Reports::FECHADO,
        );

        if (!in_array($reports_status, $availableStatus)) {
            if ($reports_status == Entity\Reports::INATIVO) {
                $url = $this->generateUrl('troubleticket_bi_create', array('report_id' => $report_id));

            } else {
                $url = $this->generateUrl('troubleticket_bi_stack');
            }

            $response = $this->redirect($url);

            return $response;
        }

        $time_counters_repository = $this->getDoctrine()->getRepository('TroubleticketBundle:TimeCounters', 'troubleticket');
        $time_counters = $time_counters_repository->findOneBy(
            array('report_id' => $reports->getId(),'final_date' => null),
            array('initial_date' => 'DESC'));

        $history_repository = $this->getDoctrine()->getRepository('TroubleticketBundle:History', 'troubleticket');
        $history = $history_repository->findOneById($report_id);

        $history_last = $history_repository->findOneBy(
            array('report_id' => $reports->getId()),
            array('id' => 'DESC'));

        $troubleticket_colaborador_api = $this->get('troubleticket.colaborador_api');

        //busca todos os colaboradores
        $arColaboradores = array();
        $colaboradoresList = $troubleticket_colaborador_api->get(null, 0, null, null, null, json_encode(array(278,284,283,285,286,287,288,292,476,517,521,522,540,541,542,543,544,545,546,547,548,549,550,551,552,583,584)), 1);
        foreach ($colaboradoresList->colaborador as $colaborador) {
            $arColaboradores[] = array(
                'nome' => $colaborador->nome,
                'id' => $colaborador->id
            );
        }

        sort($arColaboradores);

        $idSubcaseCOC = $reports->getCOCSubcase()->getId();
        $history_last_coc = $history_repository->findOneBy(
            array('report_id' => $reports->getId(),
                  'subcase_id' => $idSubcaseCOC),
            array('id' => 'DESC'));

        try {
            //trabalha dessa forma para evitar uma requisição a mais à API do colaborador
            if ($reports->getResponsible()) {
                $colaboradores = $troubleticket_colaborador_api->getByIds(array($history_last->getUsuario(), $reports->getResponsible()));

                foreach ($colaboradores->colaborador as $colaborador) {
                    if ($reports->getResponsible() == $colaborador->id) {
                        $reports->setResponsibleData($colaborador);
                    }
                    if ($history_last->getUsuario() == $colaborador->id) {
                        $history_last->setUserName($colaborador->nome);
                    }
                }
            } else {
                $troubleticket_colaborador_api->setUrlPath(vsprintf('colaborador/%s',array($history_last->getUsuario())));
                $colaborador = $troubleticket_colaborador_api->get(1, 0, null);
                $history_last->setUserName($colaborador->colaborador->nome);
            }
        } catch (TroubleticketBundleException $tte) {
            $request->getSession()->getFlashBag()->add(
                'error',
                'Não foi possível obter os dados do colaborador'
            );
            return $this->redirect($this->generateUrl('troubleticket_ba_stack'));
        }

        $service = new Service\Reports($this->getDoctrine(), $this->container);
        $service->loadResponsibleData($reports);

        $json_form_close = __DIR__.'/../Resources/config/BI/form_close.json';
        $yaml_options_sintoma = __DIR__.'/../Resources/config/BA/options_sintoma.yaml';

        $yaml_parser = new Parser();

        $json_form_close = json_decode(file_get_contents($json_form_close));
        $yaml_options_sintoma = $yaml_parser->parse(file_get_contents($yaml_options_sintoma));

        $render_template = 'TroubleticketBundle:BI:main.html.twig';
        $render_template_data = array(
            'message_error' => null,
            'message_success' => null,
            'reports' => $reports,
            'time_counters' => $time_counters,
            'history_last' => $history_last,
            'history_last_coc' => $history_last_coc,
            'yaml_options_sintoma' => $yaml_options_sintoma,
            'yaml_form_close' => $json_form_close,
            'childrenHasOpenedSubcases' => $service->childrenHasOpenedSubcases($reports),
            'session_user' => !empty($_SESSION['usr_codigoid']) ? $_SESSION['usr_codigoid'] : '',
            'colaboradores' => $arColaboradores
        );

        $session = $request->getSession();

        $session_message_error = $session->getFlashBag()->get('message_error');
        $session_message_success = $session->getFlashBag()->get('message_success');

        if (!empty($session_message_success)) {
            $render_template_data['message_success'] = $session_message_success[0];
        }

        if (!empty($session_message_error)) {
            $render_template_data['message_error'] = $session_message_error[0];
        }

        $render = $this->render($render_template,$render_template_data);

        return $render;
    }

    /**
     * Ação para fechamento do BA
     *
     * Esta é acionada quando um usuário comunicou um cliente que o problema foi resolvido.
     * Neste momento são gerados os contadores de tempo no boletim. Também é através deste que se pode criar um BS
     *
     * @param Request $request
     * @param int $report_id
     * @access public
     * @return mixed
     */
    public function mainCloseAction(Request $request,$report_id) {
        $permissions = $this->get('permissions');

        if (!$permissions->isAllowed('BI', 'close')) {
            $request->getSession()->getFlashBag()->add(
                'error',
                'Você não possui permissão para editar Boletins de Interrupção'
            );

            return $this->redirect($this->generateUrl('troubleticket_bi_stack'));
        }

        $reports_repository = $this->getDoctrine()->getRepository('TroubleticketBundle:Reports', 'troubleticket');
        $reports = $reports_repository->findOneBy(array(
            'id' => $report_id,
            'type' => Entity\Reports::TYPE_BI));

        if (empty($reports)) {
            $request->getSession()->getFlashBag()->add(
                'message_error',
                'BI não encontrado'
            );

            $response = $this->redirect($this->generateUrl('troubleticket_bi_stack'));

            return $response;
        }

        if ($reports->hasOpenedSubcases()) {
            $request->getSession()->getFlashBag()->add(
                'error',
                'Não é permitido fechar BI com subcasos em aberto.'
            );

            return $this->redirect($this->generateUrl('troubleticket_bi_main', array('report_id' => $report_id)));
        }

        $time_counters_repository = $this->getDoctrine()->getRepository('TroubleticketBundle:TimeCounters', 'troubleticket');
        $time_counters = $time_counters_repository->findOneBy(
            array('report_id' => $reports->getId(),'final_date' => null),
            array('initial_date' => 'DESC'));

        if (empty($time_counters)) {
            $request->getSession()->getFlashBag()->add(
                'message_error',
                'Erro de consistência no BI!'
            );

            $response = $this->redirect($this->generateUrl('troubleticket_bi_stack'));

            return $response;
        }

        $reports_status = $reports->getStatus();

        if ($reports_status != Entity\Reports::EM_ATENDIMENTO) {
            $session = $request->getSession();

            $session->getFlashBag()->set('message_error',null);
            $session->getFlashBag()->add('message_error','Status do BI impede esta atualização!');

            $route_troubleticket_bi_main = $this->generateUrl('troubleticket_bi_main',array('report_id' => $report_id));

            $response = $this->redirect($route_troubleticket_bi_main);

            return $response;
        }

        $request_causa = $request->request->get('causa',null);
        $request_local = $request->request->get('local',null);
        $request_falha = $request->request->get('falha',null);
        $request_problema = $request->request->get('problema',null);
        $request_solucao = $request->request->get('solucao',null);
        $request_abrir_bs = $request->request->get('abrir_bs',null);
        $request_comment = $request->request->get('comentario',null);

        $request_incidente = $request->request->get('incidente', null);
        $request_severidade = $request->request->get('severidade', null);
        $request_estrutura = $request->request->get('estrutura', null);
        $request_pop = $request->request->get('pop', null);
        $request_elemento = $request->request->get('elemento', null);

        $request_fornecedor = $request->request->get('fornecedor');
        $request_fornecedor = (!empty($request_fornecedor) ? $request_fornecedor : null);

        if (empty($request_causa) || empty($request_elemento) || empty($request_problema) || empty($request_solucao)) {
            $session = $request->getSession();

            $session->getFlashBag()->set('message_error',null);
            $session->getFlashBag()->add('message_error','Preencha os campos obrigatórios!');

            $route_troubleticket_bi_main = $this->generateUrl('troubleticket_bi_main',array('report_id' => $report_id));

            $response = $this->redirect($route_troubleticket_bi_main);

            return $response;
        }

        $reports_cause = $request_causa;
        $reports_failure_local = $request_local;
        $reports_failure = $request_falha;
        $reports_problem = $request_problema;
        $reports_solution = $request_solucao;
        $reports_element = $request_elemento;

        $history_comment = vsprintf('Fechamento do BI - Causa: %s, Local: %s, Elemento: %s, Problema: %s, Solução: %s',
            array($reports_cause, $reports_failure_local, $reports_element, $reports_problem, $reports_solution)
        );

        try {
            $reports->setIncident($request_incidente);
            $reports->setClosedSymptom($request_severidade);

            if($request_incidente != 'Cliente') {
                $reports->setProviderId($request_fornecedor);
                $reports->setPopId($request_pop);
                $reports->setStructure($request_estrutura);
            }

            $reports->setElement($request_elemento);
            $reports->setCause($request_causa);
            $reports->setFailureLocal($request_local);
            $reports->setProblem($request_problema);
            $reports->setSolution($request_solucao);

            $service = new Service\Reports($this->getDoctrine(), $this->container);
            $service->close($reports,$time_counters,$history_comment, $request_abrir_bs, $request_comment);

        } catch (Exception $error) {
            $session = $request->getSession();

            $session->getFlashBag()->set('message_error',null);
            $session->getFlashBag()->add('message_error','Ocorreu um erro, e não foi possível fechar o BI!');

            $route_troubleticket_bi_main = $this->generateUrl('troubleticket_bi_main',array('report_id' => $report_id));

            $response = $this->redirect($route_troubleticket_bi_main);

            return $response;
        }

        $session = $request->getSession();

        $session->getFlashBag()->set('message_success',null);
        $session->getFlashBag()->add('message_success','BI fechado!');

        $route_troubleticket_bi_main = $this->generateUrl('troubleticket_bi_main',array('report_id' => $report_id));

        $response = $this->redirect($route_troubleticket_bi_main);

        return $response;
    }

    /**
     * Ação que permite que um usuário realize um comentário no BI
     *
     * @param Request $request
     * @param int $report_id
     * @access public
     * @return mixed
     */
    public function commentAction(Request $request, $report_id) {
        $permissions = $this->get('permissions');

        if (!$permissions->isAllowed('BI', 'comment')) {
            $request->getSession()->getFlashBag()->add(
                'error',
                'Você não possui permissão para editar Boletins de Interrupção'
            );

            return $this->redirect($this->generateUrl('troubleticket_bi_stack'));
        }

        $report = $this->getBI($report_id);

        if (empty($report)) {
            $request->getSession()->getFlashBag()->add(
                'error',
                'BI não encontrado'
            );

            return $this->redirect($this->generateUrl('troubleticket_bi_stack'));
        }

        if ($request->isMethod('POST')) {
            $status = $comment = $request->get('comment');

            if (!empty($comment)) {
                $service = new Service\Reports($this->getDoctrine(), $this->container);
                $status = $service->comment($report, $comment);
            }

            if (!$status) {
                $request->getSession()->getFlashBag()->add(
                    'error',
                    'Não foi possível realizar o comentário'
                );
            }
        }

        return $this->redirect($this->generateUrl('troubleticket_bi_main', array('report_id' => $report_id)));
    }

    /**
     * Ação que apresenta a lista de BIs pendentes
     *
     * Esta não é a responsável pela obtenção dos dados.
     *
     * @param Request $request
     * @access public
     * @return null
     */
    public function stackAction(Request $request)
    {
        $permissions = $this->get('permissions');

        if (!$permissions->isAllowed('BI', 'read')) {
            $request->getSession()->getFlashBag()->add(
                'error',
                'Você não possui permissão para visualizar Boletins de Interrupção'
            );
            //TODO para onde deve redirecionar??
            $pathInfo = $request->getPathInfo();
            $uri = $request->getRequestUri();
            return $this->redirect(preg_replace('$'.$pathInfo.'.*$', '', $uri));
        }

        $yaml_options_sintoma = __DIR__.'/../Resources/config/BA/options_sintoma.yaml';
        $yaml_ufs = __DIR__.'/../Resources/utils/uf.yaml';

        $yaml_parser = new Parser();

        $yaml_options_sintoma = $yaml_parser->parse(file_get_contents($yaml_options_sintoma));
        $yaml_options_ufs = $yaml_parser->parse(file_get_contents($yaml_ufs));

        $render_template = 'TroubleticketBundle:BI:stack.html.twig';
        $render_template_data = array(
            'status' => array(
                array('code' => Entity\Reports::EM_ATENDIMENTO, 'label' => 'Em Atendimento'),
            ),
            'subcases' => array(
                array('code' => '', 'label' => 'Todos'),
                array('code' => Entity\Subcases::TYPE_COC, 'label' => 'COC'),
                array('code' => Entity\Subcases::TYPE_MANTAINER, 'label' => 'Maintainer'),
            ),
            'message_error' => null,
            'options_severidade' => $yaml_options_sintoma,
            'ufs' => $yaml_options_ufs,
            'message_success' => null,
            'page_limit' => $this->stack_page_limit,);

        $session = $request->getSession();

        $session_message_error = $session->getFlashBag()->get('message_error');
        $session_message_success = $session->getFlashBag()->get('message_success');

        if (!empty($session_message_success)) {
            $render_template_data['message_success'] = $session_message_success[0];
        }

        if (!empty($session_message_error)) {
            $render_template_data['message_error'] = $session_message_error[0];
        }

        $render = $this->render($render_template,$render_template_data);

        return $render;
    }

    /**
     * Ação responável pela obtenção dos dados a serem apresentados na lista de BIs pendentes
     *
     * @param Request $request
     * @access public
     * @return JsonResponse
     */
    public function stackRequestAction(Request $request)
    {
        $permissions = $this->get('permissions');
        if (!$permissions->isAllowed('BI', 'read')) {
            $json_response = new JsonResponse();
            $json_response->setData(array(
                'data' => array(),
                'recordsTotal' => array(),
                'recordsFiltered' => array(),
                'draw' => null,
            ));

            return $json_response;
        }
        try {
            $request_draw = intval($request->query->get('draw'));
            $request_start = intval($request->query->get('start'));
            $request_page_limit = intval($request->query->get('length'));

            $request_reports_id = strval($request->query->get('id'));
            $request_reports_designation = strval($request->query->get('designacao'));
            $request_reports_initial_date = strval($request->query->get('initial_date'));
            $request_reports_status = strval($request->query->get('status'));
            $request_reports_final_date = strval($request->query->get('final_date'));
            $request_reports_open_subcases = json_decode($request->query->get('subcases'));
            $request_reports_severity = strval($request->query->get('severity'));
            $request_reports_initial_last_update = strval($request->query->get('initial_last_update'));
            $request_reports_final_last_update = strval($request->query->get('final_last_update'));
            $request_reports_responsible = strval($request->query->get('responsible'));

            $request_reports_cancelled = strval($request->query->get('cancelled'));
            $request_reports_closed = strval($request->query->get('closed'));

            if (!empty($request_reports_initial_date) && !preg_match('/^[0-9]{4}(-)[0-9]{2}(-)[0-9]{2}$/',$request_reports_initial_date)) {
                $request_reports_initial_date_list = explode('-',$request_reports_initial_date);

                $request_reports_initial_date = vsprintf('%s-%s-%s',array($request_reports_initial_date_list[2],$request_reports_initial_date_list[1],$request_reports_initial_date_list[0]));
            }

            if (!empty($request_reports_final_date) && !preg_match('/^[0-9]{4}(-)[0-9]{2}(-)[0-9]{2}$/',$request_reports_final_date)) {
                $request_reports_final_date_list = explode('-', $request_reports_final_date);

                $request_reports_final_date = vsprintf('%s-%s-%s',array($request_reports_final_date_list[2],$request_reports_final_date_list[1],$request_reports_final_date_list[0]));
            }

            if (!empty($request_reports_initial_last_update) && !preg_match('/^[0-9]{4}(-)[0-9]{2}(-)[0-9]{2}$/',$request_reports_initial_last_update)) {
                $request_reports_initial_date_list = explode('-',$request_reports_initial_last_update);

                $request_reports_initial_last_update = vsprintf('%s-%s-%s',array($request_reports_initial_date_list[2],$request_reports_initial_date_list[1],$request_reports_initial_date_list[0]));
            }

            if (!empty($request_reports_final_last_update) && !preg_match('/^[0-9]{4}(-)[0-9]{2}(-)[0-9]{2}$/',$request_reports_final_date)) {
                $request_reports_final_date_list = explode('-', $request_reports_final_last_update);

                $request_reports_final_last_update = vsprintf('%s-%s-%s',array($request_reports_final_date_list[2],$request_reports_final_date_list[1],$request_reports_final_date_list[0]));
            }

            $request_reports_stack = null;
            $circuito_list = array();

            $service = new Service\Reports($this->getDoctrine(), $this->container);
            $order = $request->get('order');
            if (!empty($order)) {
                foreach ($order as &$value) {
                    switch($value['column']) {
                        case 0:
                            $value['column'] = 'code';
                            break;
                        case 1:
                            $value['column'] = 'status';
                            break;
                        case 2:
                            $value['column'] = 'initial_date';
                            break;
                        case 3:
                            $value['column'] = 'responsible';
                            break;
                        case 4:
                            $value['column'] = 'last_update';
                            break;
                        case 5:
                            $value['column'] = 'uf';
                            break;
                        case 6:
                            $value['column'] = 'city';
                            break;
                        case 7:
                            $value['column'] = 'stretch';
                            break;
                        case 8:
                            $value['column'] = 'subcase';
                            break;
                    }
                }
            }
            $reports_filter = $service->filter(
                Entity\Reports::TYPE_BI,
                null,
                $request_page_limit,
                $request_start,
                $request_reports_id,
                $circuito_list,
                $request_reports_designation,
                $request_reports_stack,
                $request_reports_initial_date,
                $request_reports_status,
                $request_reports_final_date,
                $request_reports_open_subcases,
                $request_reports_severity,
                $request_reports_closed,
                $request_reports_cancelled,
                null,
                $request->get('uf'),
                null,
                $order,
                null,
                null,
                $request_reports_initial_last_update,
                $request_reports_final_last_update,
                $request_reports_responsible
            );
            $error = null;
        } catch (TroubleticketBundleException $error) {
            $reports_filter = array(
                'data_list' => array(),
                'data_total' => 0,);
            $error = $error->getMessage();
        }

        $json_response = new JsonResponse();
        $json_response->setData(array(
            'data' => $reports_filter['data_list'],
            'recordsTotal' => $reports_filter['data_total'],
            'recordsFiltered' => $reports_filter['data_total'],
            'draw' => $request_draw,
            'error' => $error
        ));

        return $json_response;
    }

    /**
     * Ação que apresenta os dados de BAs relacionados a um BI
     *
     * Esta não é responsável pela obtenção dos dados, somente pela apresentação do HTML
     *
     * @param Request $request
     * @param int $report_id
     * @access public
     * @return mixed
     */
    public function mainBaRelatedAction(Request $request,$report_id) {
        $permissions = $this->get('permissions');

        if (!$permissions->isAllowed('BI', 'read_related_ba')) {
            $request->getSession()->getFlashBag()->add(
                'error',
                'Você não possui permissão para visualizar Boletins de Interrupção'
            );

            return $this->redirect($this->generateUrl('troubleticket_bi_stack'));
        }

        $report = $this->getBI($report_id);

        if (empty($report)) {
            $request->getSession()->getFlashBag()->add(
                'message_error',
                'BI não encontrado'
            );

            $response = $this->redirect($this->generateUrl('troubleticket_bi_stack'));

            return $response;
        }

        $render_template = 'TroubleticketBundle:BI:bi_related_ba.html.twig';
        $render_template_data = array(
            'stacks' => array(
                array('code' => Entity\Reports::STACK_SN1, 'label' => 'SN1'),
                array('code' => Entity\Reports::STACK_SN2, 'label' => 'SN2'),
            ),
            'status' => array(
                array('code' => Entity\Reports::EM_ATENDIMENTO, 'label' => 'Em Atendimento'),
                array('code' => Entity\Reports::PAUSADO, 'label' => 'Pausado'),
                array('code' => Entity\Reports::RESOLVIDO, 'label' => 'Resolvido'),
            ),
            'message_error' => null,
            'message_success' => null,
            'page_limit' => $this->stack_page_limit,
            'reports' => $report);

        $session = $request->getSession();

        $session_message_error = $session->getFlashBag()->get('message_error');
        $session_message_success = $session->getFlashBag()->get('message_success');

        if (!empty($session_message_success)) {
            $render_template_data['message_success'] = $session_message_success[0];
        }

        if (!empty($session_message_error)) {
            $render_template_data['message_error'] = $session_message_error[0];
        }

        $render = $this->render($render_template,$render_template_data);

        return $render;
    }

    /**
     * Ação responsável pela obtenção dos dados de BAs relacionados a um BI
     *
     * @param Request $request
     * @param int $report_id
     * @access public
     * @return JsonResponse
     */
    public function mainBaRelatedRequestAction(Request $request,$report_id) {
        $permissions = $this->get('permissions');

        if (!$permissions->isAllowed('BI', 'read_related_ba')) {
            $request->getSession()->getFlashBag()->add(
                'error',
                'Você não possui permissão para visualizar Boletins de Interrupção'
            );

            return $this->redirect($this->generateUrl('troubleticket_bi_stack'));
        }

        $report = $this->getBI($report_id);

        if (empty($report)) {
            $request->getSession()->getFlashBag()->add(
                'message_error',
                'BI não encontrado'
            );

            $response = $this->redirect($this->generateUrl('troubleticket_bi_stack'));

            return $response;
        }

        $request_draw = intval($request->query->get('draw'));
        $request_start = intval($request->query->get('start'));
        $request_page_limit = intval($request->query->get('length'));

        $request_reports_id = strval($request->query->get('ba_id'));
        $request_reports_designation = strval($request->query->get('designacao'));
        $request_reports_responsible = strval($request->query->get('responsible'));
        $request_reports_status = strval($request->query->get('status'));
        $request_reports_stack = strval($request->query->get('stack_fila'));

        $circuito_list = array();

        try {
            $service = new Service\Reports($this->getDoctrine(), $this->container);
            $reports_filter = $service->filterBaRelatedBi(
                $report,
                null,
                $request_page_limit,
                $request_start,
                $request_reports_designation,
                $request_reports_stack,
                $request_reports_id,
                $request_reports_responsible,
                $request_reports_status);

        } catch (TroubleticketBundleException $error) {
            $reports_filter = array(
                'data_list' => array(),
                'data_total' => 0,);
        }

        $json_response = new JsonResponse();
        $json_response->setData(array(
            'data' => $reports_filter['data_list'],
            'recordsTotal' => $reports_filter['data_total'],
            'recordsFiltered' => $reports_filter['data_total'],
            'draw' => $request_draw,
        ));

        return $json_response;
    }

    /**
     * Ação responável pela apresentação do relatório de incidentes de um BI
     *
     * @param Request $request
     * @access public
     * @return mixed
     */
    public function reportIncidentAction(Request $request) {
        $permissions = $this->get('permissions');

        if (!$permissions->isAllowed('BI', 'export_report')) {
            $request->getSession()->getFlashBag()->add(
                'error',
                'Você não possui permissão para exportar relatorios de incidente'
            );

            return $this->redirect($this->generateUrl('troubleticket_bi_stack'));
        }

        $request_date_init = strval($request->query->get('date_init'));
        $request_date_end = strval($request->query->get('date_end'));
        $request_client_name = strval($request->query->get('client_name'));
        $request_client_name_final = strval($request->query->get('client_name_final'));
        $request_client_uf = strval($request->query->get('client_uf'));

        if (!empty($request_date_init) && !preg_match('/^[0-9]{4}(-)[0-9]{2}(-)[0-9]{2}$/',$request_date_init)) {
            $request_date_init_list = explode('-',$request_date_init);

            $request_date_init = vsprintf('%s-%s-%s',array($request_date_init_list[2],$request_date_init_list[1],$request_date_init_list[0]));
        }

        if (!empty($request_date_end) && !preg_match('/^[0-9]{4}(-)[0-9]{2}(-)[0-9]{2}$/',$request_date_end)) {
            $request_date_end_list = explode('-',$request_date_end);

            $request_date_end = vsprintf('%s-%s-%s',array($request_date_end_list[2],$request_date_end_list[1],$request_date_end_list[0]));
        }

        $service = new Service\ReportsReport($this->getDoctrine(), $this->container);

        try {
            $service_export = $service->incidentsBIReport(
                array(
                    'initial_date' => $request_date_init,
                    'final_date' => $request_date_end,
                    'client_name' => $request_client_name,
                    'final_client_name' => $request_client_name_final,
                    'client_uf' => $request_client_uf
                )
            );

        } catch (Exception $error) {
            $request->getSession()->getFlashBag()->add(
                'error',
                'Ocorreu um erro ao tentar exportar o relatório de incidente BI'
            );

            return $this->redirect($this->generateUrl('troubleticket_bi_stack'));
        }

        $table_head_list = array(
            'Nº BI' => 'string',
            'Designação' => 'string',
            'Nº de BAs' => 'string',
            'UF Ponta A' => 'string',
            'Nº Subcaso COC' => 'string',
            'Nº Subcaso Parceiro' => 'string',
            'Data de abertura' => 'string',
            'Hora de abertura' => 'string',
            'Data do fechamento' => 'string',
            'Hora do fechamento' => 'string',
            'SN2' => 'string',
            'Incidente' => 'string',
            'Severidade' => 'string',
            'Estrutura' => 'string',
            'Elemento' => 'string',
            'Causa' => 'string',
            'Problema' => 'string',
            'Solução' => 'string',
            'Falha' => 'string',
            'Local da Falha' => 'string',
            'Status' => 'string',
            'Motivo' => 'string',
            'POP' => 'string',
            'Fornecedor' => 'string'
        );

        $response = new XLSResponse('Relatorio-de-Incidentes-BI');
        $response->setHeaderColumns($table_head_list);
        $response->setBody($service_export);

        return $response;
    }

    /**
     * Ação responsável pela apresentação de relatório de performance de BIs
     *
     * @param Request $request
     * @access public
     * @return mixed
     */
    public function reportPerformanceAction(Request $request) {
        $permissions = $this->get('permissions');

        if (!$permissions->isAllowed('BI', 'export_report')) {
            $request->getSession()->getFlashBag()->add(
                'error',
                'Você não possui permissão para exportar relatorios de performance'
            );

            return $this->redirect($this->generateUrl('troubleticket_bi_stack'));
        }

        $request_date_init = strval($request->query->get('date_init'));
        $request_date_end = strval($request->query->get('date_end'));
        $request_client_name = strval($request->query->get('client_name'));
        $request_client_name_final = strval($request->query->get('client_name_final'));
        $request_client_uf = strval($request->query->get('client_uf'));

        if (!empty($request_date_init) && !preg_match('/^[0-9]{4}(-)[0-9]{2}(-)[0-9]{2}$/',$request_date_init)) {
            $request_date_init_list = explode('-',$request_date_init);

            $request_date_init = vsprintf('%s-%s-%s',array($request_date_init_list[2],$request_date_init_list[1],$request_date_init_list[0]));
        }

        if (!empty($request_date_end) && !preg_match('/^[0-9]{4}(-)[0-9]{2}(-)[0-9]{2}$/',$request_date_end)) {
            $request_date_end_list = explode('-',$request_date_end);

            $request_date_end = vsprintf('%s-%s-%s',array($request_date_end_list[2],$request_date_end_list[1],$request_date_end_list[0]));
        }

        $service = new Service\ReportsReport($this->getDoctrine(), $this->container);

        try {
            $service_export = $service->performanceBIReport(
                array(
                    'initial_date' => $request_date_init,
                    'final_date' => $request_date_end,
                    'client_name' => $request_client_name,
                    'final_client_name' => $request_client_name_final,
                    'client_uf' => $request_client_uf
                )
            );

        } catch (Exception $error) {
            $request->getSession()->getFlashBag()->add(
                'error',
                'Ocorreu um erro ao tentar exportar o relatório de performance BI'
            );

            return $this->redirect($this->generateUrl('troubleticket_bi_stack'));
        }

        $table_head_list = array(
            'Nº BI' => 'string',
            'Designação' => 'string',
            'Nº de BAs' => 'string',
            'UF Ponta A' => 'string',
            'Nº Subcaso COC' => 'string',
            'Nº Subcaso Parceiro' => 'string',
            'Data de abertura' => 'string',
            'Hora de abertura' => 'string',
            'Data do fechamento' => 'string',
            'Hora do fechamento' => 'string',
            'TMR' => 'string',
            'TMR NOC' => 'string',
            'TMR SN2' => 'string',
            'TMR COC' => 'string',
            'TMR Deslocamento' => 'string',
            'TMR Atendimento Infra' => 'string',
            'TMR Atendimento Campo' => 'string',
            'TMR Atendimento Cliente' => 'string',
            'Status' => 'string',
            'Motivo' => 'string'
        );

        $response = new XLSResponse('Relatorio-de-Performance-BI');
        $response->setHeaderColumns($table_head_list);
        $response->setBody($service_export);

        return $response;
    }
}
