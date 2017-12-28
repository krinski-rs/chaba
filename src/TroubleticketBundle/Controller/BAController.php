<?php

namespace TroubleticketBundle\Controller;

use Exception;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Yaml\Parser;
use Symfony\Component\Validator\Constraints\NotBlank;

use TroubleticketBundle\Exception\TroubleticketBundleException;

use TroubleticketBundle\Service;
use TroubleticketBundle\Entity;
use TroubleticketBundle\Component\XLSResponse;

/**
 * Classe de controle de ações referente ao boletim de anormalidade
 */
class BAController extends Controller
{
    private $stack_page_limit = 10;

    /**
     * Chama o serviço de envio de push notification
     *
     * @access public
     * @return JsonResponse
     */
    public function sendPushAction($cid = null, $title = null, $body = null, $data = array())
    {
        $push = new Service\PushNotification($this->getDoctrine(), $this->container);

        $fields = array(
            'cid'   => $cid,
            'title' => $title,
            'body'  => $body,
            'data'  => $data
        );
        $result = $push->send($fields);

        $json_response = new JsonResponse();
        $json_response->setData(array(
            'data' => $result,
        ));

        return $json_response;
    }

    /**
     * Busca os circuitos através da api para ser demonstrados na tabela
     *
     * @param Request $request
     * @access public
     * @return JsonResponse
     */
    public function circuitRequestAction(Request $request)
    {
        $permissions = $this->get('permissions');

        if (!$permissions->isAllowed('BA', 'read')) {
            $json_response = new JsonResponse();
            $json_response->setData(array(
                'data' => array(),
                'recordsTotal' => array(),
                'recordsFiltered' => array(),
                'draw' => null,
            ));

            return $json_response;
        }

        $request_draw = intval($request->query->get('draw'));
        $request_start = intval($request->query->get('start'));
        $request_page_limit = intval($request->query->get('length'));

        $cid = strval($request->query->get('cid',null));
        $designator = strval($request->query->get('designador',null));


        $troubleticket_client_api = $this->get('troubleticket.client_api');
        $troubleticket_circuit_api = $this->get('troubleticket.circuit_api');
        $error = null;

        try {
            $troubleticket_circuit_api_get = $troubleticket_circuit_api->get(
                $request_page_limit,
                $request_start,
                null,
                null,
                null,
                true,//sempre traz os ativos
                $designator?$designator:$cid);//procura pela mesma palavra chave em outros campos

        } catch (TroubleticketBundleException $error) {
            $request->getSession()->getFlashBag()->add('error_message',$error->getMessage());

            $troubleticket_circuit_api_get = array();
            $error = $error->getMessage();
        }

        $data_list = array();
        $circuit_total = 0;

        //busca os campos através do filtro pelo circuito
        if (!empty($troubleticket_circuit_api_get) && !empty($troubleticket_circuit_api_get->circuito)) {
            $circuit_total = intval($troubleticket_circuit_api_get->total);

            foreach ($troubleticket_circuit_api_get->circuito as $circuito) {
                $data_aux = array(
                    $circuito->contCodigoid,
                    $circuito->nomeFantasia.'/'.$circuito->cnpj,
                    $circuito->designador,
                    vsprintf('%s, %s, %s, %s - %s / %s - %s', array($circuito->endeentrLogradouro,$circuito->endeentrNumero,$circuito->endeentrBairro,$circuito->nomeCidade,$circuito->siglaUf,$circuito->nomePais,$circuito->endeentrCep)),
                    '<button type="submit" class="button btn_ba_new" data-id="'.$circuito->contCodigoid.'">Abrir BA</button>');

                $data_list[] = $data_aux;
            }
        }

        $json_response = new JsonResponse();
        $json_response->setData(array(
            'data' => $data_list,
            'recordsTotal' => $circuit_total,
            'recordsFiltered' => $circuit_total,
            'draw' => $request_draw,
            'error' => $error
        ));

        return $json_response;
    }

    private function getResultByClient($cid = null, $reason = null, $client = null, $cnpj = null, $address = null, $dataList = array())
    {
        //busca por nome e anexa no resultado
        $clientResult = $this->get('troubleticket.client_api')->get(
            null,           //'limit' => $limit,
            null,           //'offset' => $offset,
            $cid,           //'cid' => $cid,
            $reason,        //'razao' => $razao,
            $client,        //'cliente' => $client,
            $cnpj,          //'cnpj' => $cnpj,
            $address);      //'address' => $address,

        $arClientId = array();
        foreach ($clientResult->customer as $key => $value) {
            $arClientId[] = $value->customerid;
        }

        if (!empty($arClientId)) {
            $strClientId = vsprintf('[%s]',implode(',',$arClientId));
            $circuitResultRazao = $this->get('troubleticket.circuit_api')->get(
                    null,
                    null,
                    null,
                    null,
                    $strClientId,
                    true);

            foreach ($circuitResultRazao->circuito as $circuito) {
                $client_name = '';

                foreach ($clientResult->customer as $value) {
                    if ($circuito->clieCodigoid == $value->customerid) {
                        $client_name = $value->nomeFantasia.'/'.$value->cnpj;
                    }
                }

                $data_aux = array(
                    $circuito->contCodigoid,
                    $client_name,
                    $circuito->designador,
                    vsprintf('%s, %s, %s, %s - %s / %s - %s', array($circuito->endeentrLogradouro,$circuito->endeentrNumero,$circuito->endeentrBairro,$circuito->nomeCidade,$circuito->siglaUf,$circuito->nomePais,$circuito->endeentrCep)),
                    '<button type="submit" class="button btn_ba_new" data-id="'.$circuito->contCodigoid.'">Abrir BA</button>');

                $dataList[] = $data_aux;
            }
        }


        return $dataList;
    }

    /**
     * Ação que monta e demonstra o formulário de criação do Boletim de Anormalidade
     *
     * @param Request $request
     * @access public
     * @return mixed
     */
    public function newAction(Request $request)
    {
        $permissions = $this->get('permissions');
        if (!$permissions->isAllowed('BA', 'create')) {
            $request->getSession()->getFlashBag()->add(
                'error',
                'Você não possui permissão para inserir Boletins de Anormalidade'
            );
            return $this->redirect($this->generateUrl('troubleticket_ba_stack'));
        }
        $cid = null;
        $designador = null;
        $troubleticket_circuit_api_get = null;

        $data = $request->get('data');

        if ($request->isMethod('POST') && !empty($data)) {
            if (is_numeric($data)) {
                $cid = $data;
            } else {
                $designador = $data;
            }

            $troubleticket_circuit_api = $this->get('troubleticket.circuit_api');

            try {
                $troubleticket_circuit_api_get = $troubleticket_circuit_api->get(50, 0, $cid, $designador,null);

            } catch (TroubleticketBundleException $error) {
                $request->getSession()->getFlashBag()->add(
                    'error',
                    'Erro na comunicação com a API de circuitos'
                );
                return $this->redirect($this->generateUrl('troubleticket_ba_new'));
            }
        }

        $render_template = 'TroubleticketBundle:BA:new.html.twig';
        $render_template_data = array(
            'message_error' => null,
            'message_success' => null,
            'cid' => $cid,
            'designador' => $designador,
            'api_circuit' => null,
            'page_limit' => $this->stack_page_limit,
        );

        if (!$request->isMethod('POST') || empty($troubleticket_circuit_api_get)) {
            $render = $this->render($render_template,$render_template_data);

            return $render;

        } else if ($troubleticket_circuit_api_get->total == '1') {
            $response = $this->forward('TroubleticketBundle:BA:createPreview',array(),array());

            return $response;
        } else {
            $render_template_data['cid'] = $cid;
            $render_template_data['designador'] = $designador;
            $render_template_data['api_circuit'] = $troubleticket_circuit_api_get;

            $render = $this->render($render_template, $render_template_data);

            return $render;

        }
    }

    /**
     * Ação de pré criação do Boletim, onde é escolhido o circuito
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
            return $this->redirect($this->generateUrl('troubleticket_ba_new'));
        }

        $permissions = $this->get('permissions');
        if (!$permissions->isAllowed('BA', 'create')) {
            $request->getSession()->getFlashBag()->add(
                'error',
                'Você não possui permissão para inserir Boletins de Anormalidade'
            );
            return $this->redirect($this->generateUrl('troubleticket_ba_stack'));
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
                return $this->redirect($this->generateUrl('troubleticket_ba_new'));
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
                return $this->redirect($this->generateUrl('troubleticket_ba_new'));
            }

            $circuito = $troubleticket_circuit_api_get->circuito[0];
        }

        try {
            $service = new Service\Reports($this->getDoctrine(), $this->container);
            $report = $service->create(array(
                'circuit_id' => $circuito->contCodigoid,
                'designation' => $circuito->designador,
                'stack' => Entity\Reports::STACK_SN1,
                'type' => Entity\Reports::TYPE_BA,
                'responsible' => $_SESSION['usr_codigoid'],
            ), 'BA criado');

        } catch (TroubleticketBundleException $error) {
            $request->getSession()->getFlashBag()->clear();
            $request->getSession()->getFlashBag()->add(
                'notice',
                $error->getMessage()
            );
            return $this->redirect($this->generateUrl('troubleticket_ba_new'));
        } catch (Exception $error) {
            $request->getSession()->getFlashBag()->add(
                'error',
                $error->getMessage()
            );
            return $this->redirect($this->generateUrl('troubleticket_ba_new'));
        }

        $response = $this->redirect(
            $this->generateUrl(
                'troubleticket_ba_create',
                array('report_id' => $report->getId())
            )
        );

        return $response;
    }

    /**
     * Ação de criação e persistência do boletim de anormalidade
     *
     * @param Request $request
     * @param integer|null $report_id
     * @access public
     * @return mixed
     */
    public function createAction(Request $request, $report_id = null)
    {
        $permissions = $this->get('permissions');
        if (!$permissions->isAllowed('BA', 'create')) {
            $request->getSession()->getFlashBag()->add(
                'error',
                'Você não possui permissão para inserir Boletins de Anormalidade'
            );
            return $this->redirect($this->generateUrl('troubleticket_ba_stack'));
        }
        $report = $this->getBA($report_id);

        if (empty($report)) {
            $request->getSession()->getFlashBag()->add(
                'error',
                'BA não encontrado'
            );
            return $this->redirect($this->generateUrl('troubleticket_ba_stack'));
        }

        if ($report->getStatus() != $report::INATIVO ) {
            $url = $this->generateUrl('troubleticket_ba_main',array(
                'report_id' => $report->getId()));

            return $this->redirect($url);
        }

        $troubleticket_circuit_api = $this->get('troubleticket.circuit_api');
        $troubleticket_circuit_api->setUrlPath(vsprintf('circuito/%s',array($report->getCircuitId())));

        try {
            $troubleticket_circuit_api_get = $troubleticket_circuit_api->get(1, 0, null, null,null);

        } catch (TroubleticketBundleException $error) {
            $request->getSession()->getFlashBag()->add(
                'error',
                'Não foi possível obter os dados do circuito'
            );
            return $this->redirect($this->generateUrl('troubleticket_ba_new'));
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
            return $this->redirect($this->generateUrl('troubleticket_ba_new'));
        }

        $client = $troubleticket_client_api_get->customer;

        $render_template = 'TroubleticketBundle:BA:add.html.twig';
        $render_template_data = array(
            'message_error' => null,
            'message_success' => null,
        );

        $form = $this->createFormBuilder()
            ->add('requester_name', 'text', array('constraints' => array(new NotBlank())))
            ->add('requester_email', 'email', array('constraints' => array(new NotBlank())))
            ->add('requester_phone', 'text', array('constraints' => array(new NotBlank())))
            ->add('description', 'textarea', array('constraints' => array(new NotBlank())))
            ->add('symptom', 'text', array('constraints' => array(new NotBlank())))
            ->add('service_channel', 'text', array('constraints' => array(new NotBlank())))
            ->getForm();

        $service = new Service\Reports($this->getDoctrine(), $this->container);
        if ($request->isMethod('POST')) {
            $form->handleRequest($request);
            if ($form->isValid()) {
                $data = $form->getData();
                $report->setRequesterName($data['requester_name'])
                    ->setRequesterPhone($data['requester_phone'])
                    ->setRequesterEmail($data['requester_email'])
                    ->setDescription($data['description'])
                    ->setSymptom($data['symptom'])
                    ->setServiceChannel($data['service_channel']);

                $service->open($report, 'BA iniciado');
                $this->sendPushAction(
                    $circuit->clieCodigoid,
                    'Abertura de chamado',
                    'O '.$report->getCode().' foi aberto para o circuito '.$circuit->designador,
                    array('id' => $report_id)
                );

                $request->getSession()->getFlashBag()->set('alert',null);
                return $this->redirect($this->generateUrl('troubleticket_ba_main', array('report_id' => $report->getId())));
            } else {
                $render_template_data['message_error'] = 'Alguns campos não foram preenchidos corretamente';
            }
        }

        $relapsedTickets = $service->getRelapsedTicketsByDesignation($report->getDesignation(), $report->getType());
        $totalRelapsedTickets = count($relapsedTickets) - 1;//retira ele mesmo

        $render_template_data['reports'] = $report;
        $render_template_data['api_circuit'] = $circuit;
        $render_template_data['api_client'] = $client;
        $render_template_data['form'] = $form->createView();
        $render_template_data['tickets_relapsed'] = $totalRelapsedTickets;

        $render = $this->render($render_template,$render_template_data);

        return $render;
    }

    /**
     * Ação que monta e demonstra o formulário de visualização e cadastro de informações adicionais referente ao boletim de anormalidade
     *
     * @param Request $request
     * @param integer $report_id
     * @access public
     * @return mixed
     */
    public function mainAction(Request $request, $report_id) {
        $permissions = $this->get('permissions');

        if (!$permissions->isAllowed('BA', 'read')) {
            $request->getSession()->getFlashBag()->add(
                'error',
                'Você não possui permissão para visualizar Boletins de Anormalidade'
            );
            //TODO para onde deve redirecionar??
            $pathInfo = $request->getPathInfo();
            $uri = $request->getRequestUri();
            return $this->redirect(preg_replace('$'.$pathInfo.'.*$', '', $uri));
        }
        $reports = $this->getBA($report_id);

        if (empty($reports)) {
            $request->getSession()->getFlashBag()->add(
                'error',
                'BA não encontrado'
            );
            return $this->redirect($this->generateUrl('troubleticket_ba_stack'));
        }

        $reports_status = $reports->getStatus();

        $availableStatus = array(
            Entity\Reports::EM_ATENDIMENTO,
            Entity\Reports::PAUSADO,
            Entity\Reports::RESOLVIDO,
            Entity\Reports::FECHADO,
            Entity\Reports::CANCELADO,
        );

        if (!in_array($reports_status, $availableStatus)) {
            if ($reports_status == Entity\Reports::INATIVO) {
                $url = $this->generateUrl('troubleticket_ba_create', array('report_id' => $report_id));
            } else {
                $url = $this->generateUrl('troubleticket_ba_stack');
            }

            $response = $this->redirect($url);

            return $response;
        }

        $time_counters_repository = $this->getDoctrine()->getRepository('TroubleticketBundle:TimeCounters', 'troubleticket');
        $time_counters = $time_counters_repository->findOneBy(
            array('report_id' => $reports->getId(),'final_date' => null),
            array('initial_date' => 'DESC'));

        $history_repository = $this->getDoctrine()->getRepository('TroubleticketBundle:History', 'troubleticket');

        $troubleticket_circuit_api = $this->get('troubleticket.circuit_api');

        $troubleticket_circuit_api->setUrlPath(vsprintf('circuito/%s',array($reports->getCircuitId())));

        try {
            $troubleticket_circuit_api_get = $troubleticket_circuit_api->get(1, 0, null, null,null);

        } catch (TroubleticketBundleException $error) {
            $request->getSession()->getFlashBag()->add(
                'error',
                'Não foi possível obter os dados do circuito'
            );
            return $this->redirect($this->generateUrl('troubleticket_ba_stack'));
        }

        $circuit = $troubleticket_circuit_api_get->circuito;

        $troubleticket_client_api = $this->get('troubleticket.client_api');
        $troubleticket_client_api->setUrlPath(vsprintf('cliente/%s',array($circuit->clieCodigoid,)));

        try {
            $troubleticket_client_api_get = $troubleticket_client_api->get(50,0,null);

        } catch (TroubleticketBundleException $error) {
            $request->getSession()->getFlashBag()->add(
                'error',
                'Não foi possível obter os dados do cliente'
            );
            return $this->redirect($this->generateUrl('troubleticket_ba_stack'));
        }

        $client = $troubleticket_client_api_get->customer;

        $history_last = $history_repository->findOneBy(
            array('report_id' => $reports->getId()),
            array('id' => 'DESC'));

        $idSubcaseCOC = $reports->getCOCSubcase()->getId();
        $history_last_coc = $history_repository->findOneBy(
            array('report_id' => $reports->getId(),
                  'subcase_id' => $idSubcaseCOC),
            array('id' => 'DESC'));


        $troubleticket_colaborador_api = $this->get('troubleticket.colaborador_api');

        try {

            //busca os colaboradores do NOC
            $arColaboradores = array();
                                                                                                // ids de departamentos do noc, ativos
            $colaboradoresList = $troubleticket_colaborador_api->get(null, 0, null, null, null, json_encode(array(278,284,283,285,286,287,288,292,476,517,521,522,540,541,542,543,544,545,546,547,548,549,550,551,552,583,584)), 1);
            foreach ($colaboradoresList->colaborador as $colaborador) {
                //monta a lista de colaboradores
                $arColaboradores[] = array(
                    'nome' => $colaborador->nome,
                    'id' => $colaborador->id
                );

                //pega as informações do responsável e do último usuário que atualizou
                if ($reports->getResponsible() == $colaborador->id) {
                    $reports->setResponsibleData($colaborador);
                }
                if ($history_last->getUsuario() == $colaborador->id) {
                    $history_last->setUserName($colaborador->nome);
                }
            }

            sort($arColaboradores);

            //trabalha dessa forma para evitar uma requisição a mais à API do colaborador
            // if ($reports->getResponsible()) {
            //     $colaboradores = $troubleticket_colaborador_api->getByIds(array($history_last->getUsuario(), $reports->getResponsible()));
            //     if (isset($colaboradores->colaborador)) {
            //         foreach ($colaboradores->colaborador as $colaborador) {
            //             if ($reports->getResponsible() == $colaborador->id) {
            //                 $reports->setResponsibleData($colaborador);
            //             }
            //             if ($history_last->getUsuario() == $colaborador->id) {
            //                 $history_last->setUserName($colaborador->nome);
            //             }
            //         }
            //     }
            // } else {
            //     $troubleticket_colaborador_api->setUrlPath(vsprintf('colaborador/%s',array($history_last->getUsuario())));
            //     $colaborador = $troubleticket_colaborador_api->get(1, 0, null);
            //     $history_last->setUserName($colaborador->colaborador->nome);
            // }
        } catch (TroubleticketBundleException $tte) {
            $request->getSession()->getFlashBag()->add(
                'error',
                'Não foi possível obter os dados do colaborador'
            );
            return $this->redirect($this->generateUrl('troubleticket_ba_stack'));
        }

        $service = new Service\Reports($this->getDoctrine(), $this->container);
        $service->loadResponsibleData($reports);

        $yaml_form_close = __DIR__.'/../Resources/config/BA/form_close.json';
        $yaml_form_pause = __DIR__.'/../Resources/config/BA/form_pause.yaml';
        $yaml_options_sintoma = __DIR__.'/../Resources/config/BA/options_sintoma.yaml';

        $yaml_parser = new Parser();

        $yaml_form_close = json_decode(file_get_contents($yaml_form_close));
        $yaml_form_pause = $yaml_parser->parse(file_get_contents($yaml_form_pause));
        $yaml_options_sintoma = $yaml_parser->parse(file_get_contents($yaml_options_sintoma));

        try {
            $comment_badge = $service->getCountChatUnviewed($reports->getId());
        } catch(Exception $e) {
            $request->getSession()->getFlashBag()->add(
                'error',
                'Não foi possível obter os dados do colaborador'
            );
            return $this->redirect($this->generateUrl('troubleticket_ba_stack'));
        }

        $render_template = 'TroubleticketBundle:BA:main.html.twig';
        $render_template_data = array(
            'message_error' => null,
            'message_success' => null,
            'reports' => $reports,
            'time_counters' => $time_counters,
            'history_last' => $history_last,
            'history_last_coc' => $history_last_coc,
            'api_circuit' => $circuit,
            'api_client' => $client,
            'yaml_form_close' => $yaml_form_close,
            'yaml_form_pause' => $yaml_form_pause,
            'yaml_options_sintoma' => $yaml_options_sintoma,
            'session_user' => !empty($_SESSION['usr_codigoid']) ? $_SESSION['usr_codigoid'] : '',
            'colaboradores' => $arColaboradores,
            'stacks' => array(
                array('code' => Entity\Reports::STACK_SN1, 'label' => 'SN1'),
                array('code' => Entity\Reports::STACK_SN2, 'label' => 'SN2'),
                array('code' => Entity\Reports::STACK_SN3, 'label' => 'SN3'),
                array('code' => Entity\Reports::STACK_VOZ, 'label' => 'Voz'),
            ),
            'comment_badge' => $comment_badge,
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
        if (!$permissions->isAllowed('BA', 'update')) {
            $request->getSession()->getFlashBag()->add(
                'error',
                'Você não possui permissão para editar Boletins de Anormalidade'
            );
            return $this->redirect($this->generateUrl('troubleticket_ba_stack'));
        }
        $reports_repository = $this->getDoctrine()->getRepository('TroubleticketBundle:Reports', 'troubleticket');
        $reports = $reports_repository->findOneBy(array(
            'id' => $report_id,
            'type' => Entity\Reports::TYPE_BA));

        if (empty($reports)) {
            $request->getSession()->getFlashBag()->add(
                'message_error',
                'BA não encontrado'
            );

            $response = $this->redirect($this->generateUrl('troubleticket_ba_stack'));

            return $response;
        }

        $reports_status = $reports->getStatus();

        if ($reports_status != Entity\Reports::EM_ATENDIMENTO) {
            $session = $request->getSession();

            $session->getFlashBag()->set('message_error',null);
            $session->getFlashBag()->add('message_error','Status do BA impede esta atualização!');

            $route_troubleticket_ba_main = $this->generateUrl('troubleticket_ba_main',array('report_id' => $report_id));

            $response = $this->redirect($route_troubleticket_ba_main);

            return $response;
        }

        if ($reports->hasOpenedSubcases()) {
            $request->getSession()->getFlashBag()->add(
                'message_error',
                'Não é permitido atualizar o BA com subcasos em aberto!'
            );

            return $this->redirect($this->generateUrl('troubleticket_ba_main', array('report_id' => $report_id)));
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

            return $this->redirect($this->generateUrl('troubleticket_ba_main', array('report_id' => $report_id)));
        }

        try {
            $history_comment = sprintf("Sintoma do BA alterado para %s.", $yaml_options_sintoma[$request_reports_symptom]['sintoma']);
            $reports->setSymptom($request_reports_symptom);

            $service = new Service\Reports($this->getDoctrine(), $this->container);
            $service->update($reports,$history_comment);

        } catch (TroubleticketBundleException $error) {
            $session = $request->getSession();

            $session->getFlashBag()->set('message_error',null);
            $session->getFlashBag()->add('message_error','Ocorreu um erro, e não foi possivel atualizar o BA!');

            $route_troubleticket_ba_main = $this->generateUrl('troubleticket_ba_main',array('report_id' => $report_id));

            $response = $this->redirect($route_troubleticket_ba_main);

            return $response;
        }

        $session = $request->getSession();

        $session->getFlashBag()->set('message_success',null);
        $session->getFlashBag()->add('message_success','BA atualizado!');

        $route_troubleticket_ba_main = $this->generateUrl('troubleticket_ba_main',array('report_id' => $report_id));

        $response = $this->redirect($route_troubleticket_ba_main);

        return $response;
    }

    /**
     * Ação de persistência de informações adicionais referente ao boletim de anormalidade
     *
     * @param Request $request
     * @param integer $report_id
     * @access public
     * @return mixed
     */
    public function mainUpdateAction(Request $request,$report_id)
    {
        $permissions = $this->get('permissions');
        if (!$permissions->isAllowed('BA', 'update')) {
            $request->getSession()->getFlashBag()->add(
                'error',
                'Você não possui permissão para editar Boletins de Anormalidade'
            );
            return $this->redirect($this->generateUrl('troubleticket_ba_stack'));
        }
        $reports_repository = $this->getDoctrine()->getRepository('TroubleticketBundle:Reports', 'troubleticket');
        $reports = $reports_repository->findOneBy(array(
            'id' => $report_id,
            'type' => Entity\Reports::TYPE_BA));

        if (empty($reports)) {
            $request->getSession()->getFlashBag()->add(
                'message_error',
                'BA não encontrado'
            );

            $response = $this->redirect($this->generateUrl('troubleticket_ba_stack'));

            return $response;
        }

        $reports_status = $reports->getStatus();

        if ($reports_status != Entity\Reports::EM_ATENDIMENTO) {
            $session = $request->getSession();

            $session->getFlashBag()->set('message_error',null);
            $session->getFlashBag()->add('message_error','Status do BA impede esta atualização!');

            $route_troubleticket_ba_main = $this->generateUrl('troubleticket_ba_main',array('report_id' => $report_id));

            $response = $this->redirect($route_troubleticket_ba_main);

            return $response;
        }

        if ($reports->hasOpenedSubcases()) {
            $request->getSession()->getFlashBag()->add(
                'message_error',
                'Não é permitido atualizar o BA com subcasos em aberto!'
            );

            return $this->redirect($this->generateUrl('troubleticket_ba_main', array('report_id' => $report_id)));
        }

        $request_reports_operator_report_identifier = $request->request->get('reports_operator_report_identifier',null);

        $reports_operator_report_identifier = $request_reports_operator_report_identifier;
        if ($reports->getOperatorReportIdentifier() != $reports_operator_report_identifier) {

            $history_comment = vsprintf('ID chamado operadora atualizado de "%s" para "%s"',array($reports->getOperatorReportIdentifier(),$reports_operator_report_identifier));

            try {
                $reports->setOperatorReportIdentifier($reports_operator_report_identifier);

                $service = new Service\Reports($this->getDoctrine(), $this->container);
                $service->update($reports,$history_comment);

            } catch (TroubleticketBundleException $error) {
                $session = $request->getSession();

                $session->getFlashBag()->set('message_error',null);
                $session->getFlashBag()->add('message_error','Ocorreu um erro, e não foi possivel atualizar o BA!');

                $route_troubleticket_ba_main = $this->generateUrl('troubleticket_ba_main',array('report_id' => $report_id));

                $response = $this->redirect($route_troubleticket_ba_main);

                return $response;
            }
        }

        $session = $request->getSession();

        $session->getFlashBag()->set('message_success',null);
        $session->getFlashBag()->add('message_success','BA atualizado!');

        $route_troubleticket_ba_main = $this->generateUrl('troubleticket_ba_main',array('report_id' => $report_id));

        $response = $this->redirect($route_troubleticket_ba_main);

        return $response;
    }

    /**
     * Ação para pausar o boletim de anormalidade
     *
     * @param Request $request
     * @param integer $report_id
     * @access public
     * @return mixed
     */
    public function mainPauseAction(Request $request,$report_id)
    {
        $permissions = $this->get('permissions');
        if (!$permissions->isAllowed('BA', 'pause')) {
            $request->getSession()->getFlashBag()->add(
                'error',
                'Você não possui permissão para editar Boletins de Anormalidade'
            );
            return $this->redirect($this->generateUrl('troubleticket_ba_stack'));
        }

        $reports_repository = $this->getDoctrine()->getRepository('TroubleticketBundle:Reports', 'troubleticket');
        $reports = $reports_repository->findOneBy(array(
            'id' => $report_id,
            'type' => Entity\Reports::TYPE_BA));

        if (empty($reports)) {
            $request->getSession()->getFlashBag()->add(
                'message_error',
                'BA não encontrado'
            );

            $response = $this->redirect($this->generateUrl('troubleticket_ba_stack'));

            return $response;
        }

        if ($reports->hasOpenedSubcases()) {
            $request->getSession()->getFlashBag()->add(
                'message_error',
                'Não é permitido pausar BA com subcasos em aberto!'
            );

            return $this->redirect($this->generateUrl('troubleticket_ba_main', array('report_id' => $report_id)));
        }

        $time_counters_repository = $this->getDoctrine()->getRepository('TroubleticketBundle:TimeCounters', 'troubleticket');
        $time_counters = $time_counters_repository->findOneBy(
            array('report_id' => $reports->getId(),'final_date' => null),
            array('initial_date' => 'DESC'));

        if (empty($time_counters)) {
            $request->getSession()->getFlashBag()->add(
                'message_error',
                'Erro de consistência no BA!'
            );

            $response = $this->redirect($this->generateUrl('troubleticket_ba_stack'));

            return $response;
        }

        $reports_status = $reports->getStatus();

        if ($reports_status != Entity\Reports::EM_ATENDIMENTO) {
            $session = $request->getSession();

            $session->getFlashBag()->set('message_error',null);
            $session->getFlashBag()->add('message_error','Status do BA impede esta atualização!');

            $route_troubleticket_ba_main = $this->generateUrl('troubleticket_ba_main',array('report_id' => $report_id));

            $response = $this->redirect($route_troubleticket_ba_main);

            return $response;
        }

        $request_motivo = $request->request->get('motivo',null);
        $request_comentario = $request->request->get('comentario',null);

        $history_comment = vsprintf("Pausa do BA.\n%s",array($request_comentario,));
        $history_reason = $request_motivo;

        try {
            $service = new Service\Reports($this->getDoctrine(), $this->container);
            $service->pause($reports,$time_counters,$history_comment,$history_reason);

        } catch (TroubleticketBundleException $error) {
            $session = $request->getSession();

            $session->getFlashBag()->set('message_error',null);
            $session->getFlashBag()->add('message_error','Ocorreu um erro, e não foi possível pausar o BA!');

            $route_troubleticket_ba_main = $this->generateUrl('troubleticket_ba_main',array('report_id' => $report_id));

            $response = $this->redirect($route_troubleticket_ba_main);

            return $response;
        }

        $session = $request->getSession();

        $session->getFlashBag()->set('message_success',null);
        $session->getFlashBag()->add('message_success','BA pausado!');

        $route_troubleticket_ba_main = $this->generateUrl('troubleticket_ba_main',array('report_id' => $report_id));

        $response = $this->redirect($route_troubleticket_ba_main);

        return $response;
    }

    /**
     * Ação para reiniciar o boletim de anormalidade
     *
     * @param Request $request
     * @param integer $report_id
     * @access public
     * @return mixed
     */
    public function mainRestartAction(Request $request,$report_id)
    {
        $permissions = $this->get('permissions');
        if (!$permissions->isAllowed('BA', 'restart')) {
            $request->getSession()->getFlashBag()->add(
                'error',
                'Você não possui permissão para editar Boletins de Anormalidade'
            );
            return $this->redirect($this->generateUrl('troubleticket_ba_stack'));
        }
        $reports_repository = $this->getDoctrine()->getRepository('TroubleticketBundle:Reports', 'troubleticket');
        $reports = $reports_repository->findOneBy(array(
            'id' => $report_id,
            'type' => Entity\Reports::TYPE_BA));

        if (empty($reports)) {
            $request->getSession()->getFlashBag()->add(
                'message_error',
                'BA não encontrado'
            );

            $response = $this->redirect($this->generateUrl('troubleticket_ba_stack'));

            return $response;
        }

        $time_counters_repository = $this->getDoctrine()->getRepository('TroubleticketBundle:TimeCounters', 'troubleticket');
        $time_counters = $time_counters_repository->findOneBy(
            array('report_id' => $reports->getId(),'final_date' => null),
            array('initial_date' => 'DESC'));

        if (empty($time_counters)) {
            $request->getSession()->getFlashBag()->add(
                'message_error',
                'Erro de consistência no BA!'
            );

            $response = $this->redirect($this->generateUrl('troubleticket_ba_stack'));

            return $response;
        }

        if ($reports->hasOpenedSubcases()) {
            $request->getSession()->getFlashBag()->add(
                'message_error',
                'Não é permitido reiniciar o BA com subcasos em aberto!'
            );

            return $this->redirect($this->generateUrl('troubleticket_ba_main', array('report_id' => $report_id)));
        }

        $reports_status = $reports->getStatus();

        if ($reports_status != Entity\Reports::PAUSADO) {
            $session = $request->getSession();

            $session->getFlashBag()->set('message_error',null);
            $session->getFlashBag()->add('message_error','Status do BA impede esta atualização!');

            $route_troubleticket_ba_main = $this->generateUrl('troubleticket_ba_main',array('report_id' => $report_id));

            $response = $this->redirect($route_troubleticket_ba_main);

            return $response;
        }

        $request_comentario = $request->request->get('comentario',null);

        $history_comment = vsprintf("Reinício do BA.\n%s",array($request_comentario));

        try {
            $service = new Service\Reports($this->getDoctrine(), $this->container);
            $service->restart($reports,$time_counters,$history_comment);

        } catch (TroubleticketBundleException $error) {
            $session = $request->getSession();

            $session->getFlashBag()->set('message_error',null);
            $session->getFlashBag()->add('message_error','Ocorreu um erro, e não foi possível reiniciar o BA!');

            $route_troubleticket_ba_main = $this->generateUrl('troubleticket_ba_main',array('report_id' => $report_id));

            $response = $this->redirect($route_troubleticket_ba_main);

            return $response;
        }

        $session = $request->getSession();

        $session->getFlashBag()->set('message_success',null);
        $session->getFlashBag()->add('message_success','BA reiniciado!');

        $route_troubleticket_ba_main = $this->generateUrl('troubleticket_ba_main',array('report_id' => $report_id));

        $response = $this->redirect($route_troubleticket_ba_main);

        return $response;
    }

    /**
     * Ação para definir como resolvido o boletim de anormalidade
     *
     * @param Request $request
     * @param integer $report_id
     * @access public
     * @return mixed
     */
    public function mainSolveAction(Request $request,$report_id)
    {
        $permissions = $this->get('permissions');
        if (!$permissions->isAllowed('BA', 'solve')) {
            $request->getSession()->getFlashBag()->add(
                'error',
                'Você não possui permissão para editar Boletins de Anormalidade'
            );
            return $this->redirect($this->generateUrl('troubleticket_ba_stack'));
        }
        $reports_repository = $this->getDoctrine()->getRepository('TroubleticketBundle:Reports', 'troubleticket');
        $reports = $reports_repository->findOneBy(array(
            'id' => $report_id,
            'type' => Entity\Reports::TYPE_BA));

        if (empty($reports)) {
            $request->getSession()->getFlashBag()->add(
                'message_error',
                'BA não encontrado'
            );

            $response = $this->redirect($this->generateUrl('troubleticket_ba_stack'));

            return $response;
        }

        if ($reports->hasOpenedSubcases()) {
            $request->getSession()->getFlashBag()->add(
                'message_error',
                'Não é permitido resolver o BA com subcasos em aberto!'
            );

            return $this->redirect($this->generateUrl('troubleticket_ba_main', array('report_id' => $report_id)));
        }

        $time_counters_repository = $this->getDoctrine()->getRepository('TroubleticketBundle:TimeCounters', 'troubleticket');
        $time_counters = $time_counters_repository->findOneBy(
            array('report_id' => $reports->getId(),'final_date' => null, 'subcase_id' => null),
            array('initial_date' => 'DESC'));

        if (empty($time_counters)) {
            $request->getSession()->getFlashBag()->add(
                'message_error',
                'Erro de consistência no BA!'
            );

            $response = $this->redirect($this->generateUrl('troubleticket_ba_stack'));

            return $response;
        }

        $reports_status = $reports->getStatus();

        if ($reports_status != Entity\Reports::EM_ATENDIMENTO) {
            $session = $request->getSession();

            $session->getFlashBag()->set('message_error',null);
            $session->getFlashBag()->add('message_error','Status do BA impede esta atualização!');

            $route_troubleticket_ba_main = $this->generateUrl('troubleticket_ba_main',array('report_id' => $report_id));

            $response = $this->redirect($route_troubleticket_ba_main);

            return $response;
        }

        try {
            $request_causa = $request->request->get('causa',$request->request->get('hidden_causa',null));
            $request_local = $request->request->get('local',$request->request->get('hidden_local',null));
            $request_problema = $request->request->get('problema',$request->request->get('hidden_problema',null));
            $request_solucao = $request->request->get('solucao',$request->request->get('hidden_solucao',null));
            $request_abrir_bs = $request->request->get('abrir_bs',null);
            $request_comment = $request->request->get('comentario',$request->request->get('hidden_motivo',null));

            $request_incidente = $request->request->get('incidente', $request->request->get('hidden_incidente', null));
            $request_severidade = $request->request->get('severidade', $request->request->get('hidden_severidade', null));
            $request_estrutura = $request->request->get('estrutura', $request->request->get('hidden_estrutura', null));
            $request_pop = $request->request->get('pop', $request->request->get('hidden_pop', null));
            $request_elemento = $request->request->get('elemento', $request->request->get('hidden_elemento', null));
            $request_fornecedor = $request->request->get('fornecedor', $request->request->get('hidden_fornecedor', null));
            $request_fornecedor = (!empty($request_fornecedor) ? $request_fornecedor : null);

            if (empty($request_causa) || empty($request_elemento) || empty($request_problema) || empty($request_solucao)) {
                $session = $request->getSession();

                $session->getFlashBag()->set('message_error',null);
                $session->getFlashBag()->add('message_error','Preencha os campos obrigatórios!');

                $route_troubleticket_ba_main = $this->generateUrl('troubleticket_ba_main',array('report_id' => $report_id));

                $response = $this->redirect($route_troubleticket_ba_main);

                return $response;
            }

            $reports_incidente = (!empty($request_incidente) ? $request_incidente : null);
            $reports_severidade = (!empty($request_severidade) ? $request_severidade : null);
            $reports_cause = (!empty($request_causa) ? $request_causa : null);
            $reports_failure_local = (!empty($request_local) ? $request_local : null);
            $reports_element = (!empty($request_elemento) ? $request_elemento : null);
            $reports_problem = (!empty($request_problema) ? $request_problema : null);
            $reports_solution = (!empty($request_solucao) ? $request_solucao : null);
            $reports_estrutura = (!empty($request_estrutura) ? $request_estrutura : null);

            $history_comment = vsprintf('Fechamento do BA - Causa: %s, Local: %s, Elemento: %s, Problema: %s, Solução: %s',
                array($reports_cause, $reports_failure_local, $reports_element, $reports_problem, $reports_solution)
            );

            $reports->setIncident($reports_incidente);
            $reports->setClosedSymptom($reports_severidade);
            $reports->setStructure($reports_estrutura);

            if($request_incidente != 'Cliente') {
                $reports->setProviderId($request_fornecedor);
                $reports->setPopId($request_pop);
            }

            $reports->setElement($reports_element);
            $reports->setCause($reports_cause);
            $reports->setFailureLocal($reports_failure_local);
            $reports->setProblem($reports_problem);
            $reports->setSolution($reports_solution);

            $openBS = $request->get('abrir_bs');

            $service = new Service\Reports($this->getDoctrine(), $this->container);
            $service->solve($reports,$time_counters, $history_comment, $openBS, $request_comment);

        } catch (TroubleticketBundleException $error) {
            $session = $request->getSession();

            $session->getFlashBag()->set('message_error',null);
            $session->getFlashBag()->add('message_error','Ocorreu um erro, e não foi possível resolver o BA!');

            $route_troubleticket_ba_main = $this->generateUrl('troubleticket_ba_main',array('report_id' => $report_id));

            $response = $this->redirect($route_troubleticket_ba_main);

            return $response;
        }

        $session = $request->getSession();

        $session->getFlashBag()->set('message_success',null);
        $session->getFlashBag()->add('message_success','BA resolvido!');

        // pegando código do BA e cid para o envio de push notification
        $report = $this->getBA($report_id);
        $troubleticket_circuit_api = $this->get('troubleticket.circuit_api');
        $troubleticket_circuit_api->setUrlPath(vsprintf('circuito/%s',array($report->getCircuitId())));
        $troubleticket_circuit_api_get = $troubleticket_circuit_api->get(1, 0, null, null,null);
        $circuit = $troubleticket_circuit_api_get->circuito;

        $this->sendPushAction(
            $circuit->clieCodigoid,
            'Resolução de BA',
            'O '.$report->getCode().' foi resolvido! Dentro de instantes um técnico entrará em contato.',
            array('id' => $report_id)
        );

        $route_troubleticket_ba_main = $this->generateUrl('troubleticket_ba_main',array('report_id' => $report_id));

        $response = $this->redirect($route_troubleticket_ba_main);

        return $response;
    }

    /**
     * Ação para definir como fechado o boletim de anormalidade
     *
     * @param Request $request
     * @param integer $report_id
     * @access public
     * @return mixed
     */
    public function mainCloseAction(Request $request,$report_id) {
        $permissions = $this->get('permissions');
        if (!$permissions->isAllowed('BA', 'close')) {
            $request->getSession()->getFlashBag()->add(
                'error',
                'Você não possui permissão para editar Boletins de Anormalidade'
            );
            return $this->redirect($this->generateUrl('troubleticket_ba_stack'));
        }
        $reports_repository = $this->getDoctrine()->getRepository('TroubleticketBundle:Reports', 'troubleticket');
        $reports = $reports_repository->findOneBy(array(
            'id' => $report_id,
            'type' => Entity\Reports::TYPE_BA));
        if (empty($reports)) {
            $request->getSession()->getFlashBag()->add(
                'message_error',
                'BA não encontrado'
            );
            $response = $this->redirect($this->generateUrl('troubleticket_ba_stack'));
            return $response;
        }
        $time_counters_repository = $this->getDoctrine()->getRepository('TroubleticketBundle:TimeCounters', 'troubleticket');
        $time_counters = $time_counters_repository->findOneBy(
            array('report_id' => $reports->getId(),'final_date' => null),
            array('initial_date' => 'DESC'));
        if (empty($time_counters)) {
            $request->getSession()->getFlashBag()->add(
                'message_error',
                'Erro de consistência no BA!'
            );
            $response = $this->redirect($this->generateUrl('troubleticket_ba_stack'));
            return $response;
        }

        $reports_status = $reports->getStatus();
        if ($reports_status != Entity\Reports::RESOLVIDO) {
            $session = $request->getSession();
            $session->getFlashBag()->set('message_error',null);
            $session->getFlashBag()->add('message_error','Status do BA impede esta atualização!');
            $route_troubleticket_ba_main = $this->generateUrl('troubleticket_ba_main',array('report_id' => $report_id));
            $response = $this->redirect($route_troubleticket_ba_main);
            return $response;
        }

        $dataComment = array(
            $reports->getCause(),
            $reports->getFailureLocal(),
            $reports->getFailure(),
            $reports->getProblem(),
            $reports->getSolution()
        );
        $history_comment = vsprintf('Fechamento do BA - Causa: %s, Local: %s, Falha: %s, Problema: %s, Solução: %s', $dataComment);

        try {
            $openBS = null;
            $service = new Service\Reports($this->getDoctrine(), $this->container);
            $service->close($reports, $time_counters, $history_comment, $openBS, $request_comment);
        } catch (TroubleticketBundleException $error) {
            $session = $request->getSession();
            $session->getFlashBag()->set('message_error',null);
            $session->getFlashBag()->add('message_error','Ocorreu um erro, e não foi possível fechar o BA!');
            $route_troubleticket_ba_main = $this->generateUrl('troubleticket_ba_main',array('report_id' => $report_id));
            $response = $this->redirect($route_troubleticket_ba_main);
            return $response;
        }

        $session = $request->getSession();
        $session->getFlashBag()->set('message_success',null);
        $session->getFlashBag()->add('message_success','BA fechado!');
        // pegando código do BA e cid para o envio de push notification
        $report = $this->getBA($report_id);
        $troubleticket_circuit_api = $this->get('troubleticket.circuit_api');
        $troubleticket_circuit_api->setUrlPath(vsprintf('circuito/%s',array($report->getCircuitId())));
        $troubleticket_circuit_api_get = $troubleticket_circuit_api->get(1, 0, null, null,null);
        $circuit = $troubleticket_circuit_api_get->circuito;
        $this->sendPushAction(
            $circuit->clieCodigoid,
            'Fechamento do BA',
            'O '.$report->getCode().' está fechado.',
            array('id' => $report_id)
        );
        $route_troubleticket_ba_main = $this->generateUrl('troubleticket_ba_main',array('report_id' => $report_id));
        $response = $this->redirect($route_troubleticket_ba_main);
        return $response;
    }

    /**
     * Ação para definir como não resolvido o boletim de anormalidade
     *
     * @param Request $request
     * @param integer $report_id
     * @access public
     * @return mixed
     */
    public function mainUnsolvedAction(Request $request,$report_id) {
        $permissions = $this->get('permissions');
        if (!$permissions->isAllowed('BA', 'unsolved')) {
            $request->getSession()->getFlashBag()->add(
                'error',
                'Você não possui permissão para editar Boletins de Anormalidade'
            );
            return $this->redirect($this->generateUrl('troubleticket_ba_stack'));
        }
        $reports_repository = $this->getDoctrine()->getRepository('TroubleticketBundle:Reports', 'troubleticket');
        $reports = $reports_repository->findOneBy(array(
            'id' => $report_id,
            'type' => Entity\Reports::TYPE_BA));

        if (empty($reports)) {
            $request->getSession()->getFlashBag()->add(
                'message_error',
                'BA não encontrado'
            );

            $response = $this->redirect($this->generateUrl('troubleticket_ba_stack'));

            return $response;
        }

        $time_counters_repository = $this->getDoctrine()->getRepository('TroubleticketBundle:TimeCounters', 'troubleticket');
        $time_counters = $time_counters_repository->findOneBy(
            array('report_id' => $reports->getId(),'final_date' => null),
            array('initial_date' => 'DESC'));

        if (empty($time_counters)) {
            $request->getSession()->getFlashBag()->add(
                'message_error',
                'Erro de consistência no BA!'
            );

            $response = $this->redirect($this->generateUrl('troubleticket_ba_stack'));

            return $response;
        }

        $reports_status = $reports->getStatus();

        if ($reports_status != Entity\Reports::RESOLVIDO) {
            $session = $request->getSession();

            $session->getFlashBag()->set('message_error',null);
            $session->getFlashBag()->add('message_error','Status do BA impede esta atualização!');

            $route_troubleticket_ba_main = $this->generateUrl('troubleticket_ba_main',array('report_id' => $report_id));

            $response = $this->redirect($route_troubleticket_ba_main);

            return $response;
        }

        try {
            $reports->setIncident(null);
            $reports->setClosedSymptom(null);
            $reports->setStructure(null);
            $reports->setProviderId(null);
            $reports->setPopId(null);
            $reports->setElement(null);
            $reports->setCause(null);
            $reports->setFailureLocal(null);
            $reports->setProblem(null);
            $reports->setSolution(null);
            $reports->setCloseReason(null);

            $service = new Service\Reports($this->getDoctrine(), $this->container);
            $service->unsolved($reports, $time_counters);

        } catch (TroubleticketBundleException $error) {
            $session = $request->getSession();

            $session->getFlashBag()->set('message_error',null);
            $session->getFlashBag()->add('message_error','Ocorreu um erro, e não foi possível marcar o BA como não resolvido!');

            $route_troubleticket_ba_main = $this->generateUrl('troubleticket_ba_main',array('report_id' => $report_id));

            $response = $this->redirect($route_troubleticket_ba_main);

            return $response;
        }

        $session = $request->getSession();

        $session->getFlashBag()->set('message_success',null);
        $session->getFlashBag()->add('message_success','BA marcado como não resolvido!');
        // pegando código do BA e cid para o envio de push notification
        $report = $this->getBA($report_id);
        $troubleticket_circuit_api = $this->get('troubleticket.circuit_api');
        $troubleticket_circuit_api->setUrlPath(vsprintf('circuito/%s',array($report->getCircuitId())));
        $troubleticket_circuit_api_get = $troubleticket_circuit_api->get(1, 0, null, null,null);
        $circuit = $troubleticket_circuit_api_get->circuito;

        $this->sendPushAction(
            $circuit->clieCodigoid,
            'BA marcado como não resolvido',
            'O '.$report->getCode().' foi reaberto!',
            array('id' => $report_id)
        );

        $route_troubleticket_ba_main = $this->generateUrl('troubleticket_ba_main',array('report_id' => $report_id));

        $response = $this->redirect($route_troubleticket_ba_main);

        return $response;
    }

    /**
     * Ação para cancelar o boletim de anormalidade
     *
     * @param Request $request
     * @param integer $report_id
     * @access public
     * @return mixed
     */
    public function mainCancelAction(Request $request,$report_id) {
        $permissions = $this->get('permissions');
        if (!$permissions->isAllowed('BA', 'cancel')) {
            $request->getSession()->getFlashBag()->add(
                'error',
                'Você não possui permissão para cancelar Boletins de Anormalidade'
            );
            return $this->redirect($this->generateUrl('troubleticket_ba_stack'));
        }
        $reports_repository = $this->getDoctrine()->getRepository('TroubleticketBundle:Reports', 'troubleticket');
        $reports = $reports_repository->findOneBy(array(
            'id' => $report_id,
            'type' => Entity\Reports::TYPE_BA));

        if (empty($reports)) {
            $request->getSession()->getFlashBag()->add(
                'message_error',
                'BA não encontrado'
            );

            $response = $this->redirect($this->generateUrl('troubleticket_ba_stack'));

            return $response;
        }

        if ($reports->hasOpenedSubcases()) {
            $request->getSession()->getFlashBag()->add(
                'message_error',
                'BA possui subcasos abertos'
            );

            $route_troubleticket_ba_main = $this->generateUrl('troubleticket_ba_main',array('report_id' => $report_id));

            return $this->redirect($route_troubleticket_ba_main);;
        }

        $time_counters_repository = $this->getDoctrine()->getRepository('TroubleticketBundle:TimeCounters', 'troubleticket');
        $time_counters = $time_counters_repository->findOneBy(
            array('report_id' => $reports->getId(),'final_date' => null),
            array('initial_date' => 'DESC'));

        if (empty($time_counters)) {
            $request->getSession()->getFlashBag()->add(
                'message_error',
                'Erro de consistência no BA!'
            );

            $response = $this->redirect($this->generateUrl('troubleticket_ba_stack'));

            return $response;
        }

        $reports_status = $reports->getStatus();

        if ($reports_status != Entity\Reports::EM_ATENDIMENTO) {
            $session = $request->getSession();

            $session->getFlashBag()->set('message_error',null);
            $session->getFlashBag()->add('message_error','Status do BA impede o cancelamento!');

            $route_troubleticket_ba_main = $this->generateUrl('troubleticket_ba_main',array('report_id' => $report_id));

            $response = $this->redirect($route_troubleticket_ba_main);

            return $response;
        }

        try {
            $service = new Service\Reports($this->getDoctrine(), $this->container);
            $service->cancel($reports,$time_counters);

        } catch (TroubleticketBundleException $error) {
            $session = $request->getSession();

            $session->getFlashBag()->set('message_error',null);
            $session->getFlashBag()->add('message_error','Ocorreu um erro, e não foi possível cancelar o BA!');

            $route_troubleticket_ba_main = $this->generateUrl('troubleticket_ba_main',array('report_id' => $report_id));

            $response = $this->redirect($route_troubleticket_ba_main);

            return $response;
        }

        $session = $request->getSession();

        $session->getFlashBag()->set('message_success',null);
        $session->getFlashBag()->add('message_success','BA cancelado!');

        $route_troubleticket_ba_new = $this->generateUrl('troubleticket_ba_stack');

        $response = $this->redirect($route_troubleticket_ba_new);

        return $response;
    }

    /**
     * Ação monta e demonstra a lista de boletins de anormalidade
     *
     * @param Request $request
     * @access public
     * @return mixed
     */
    public function stackAction(Request $request)
    {
        $permissions = $this->get('permissions');

        if (!$permissions->isAllowed('BA','read')) {
            $request->getSession()->getFlashBag()->add(
                'error',
                'Você não possui permissão para visualizar Boletins de Anormalidade'
            );

            //TODO para onde deve redirecionar??/
            $pathInfo = $request->getPathInfo();
            $uri = $request->getRequestUri();
            return $this->redirect(preg_replace('$'.$pathInfo.'.*$', '', $uri));
        }

        $yaml_options_sintoma = __DIR__.'/../Resources/config/BA/options_sintoma.yaml';
        $yaml_ufs = __DIR__.'/../Resources/utils/uf.yaml';

        $yaml_parser = new Parser();

        $yaml_options_sintoma = $yaml_parser->parse(file_get_contents($yaml_options_sintoma));
        $yaml_options_ufs = $yaml_parser->parse(file_get_contents($yaml_ufs));

        $service = new Service\Reports($this->getDoctrine(), $this->container);
        $vips = $service->getAllVIP();

        $render_template = 'TroubleticketBundle:BA:stack.html.twig';
        $render_template_data = array(
            'stacks' => array(
                array('code' => Entity\Reports::STACK_SN1, 'label' => 'SN1'),
                array('code' => Entity\Reports::STACK_SN2, 'label' => 'SN2'),
                array('code' => Entity\Reports::STACK_SN3, 'label' => 'SN3'),
                array('code' => Entity\Reports::STACK_VOZ, 'label' => 'Voz'),
            ),
            'status' => array(
                array('code' => Entity\Reports::EM_ATENDIMENTO, 'label' => 'Em Atendimento'),
                array('code' => Entity\Reports::PAUSADO, 'label' => 'Pausado'),
                array('code' => Entity\Reports::RESOLVIDO, 'label' => 'Resolvido'),
            ),
            'subcases' => array(
                array('code' => '', 'label' => 'Todos'),
                array('code' => Entity\Subcases::TYPE_COC, 'label' => 'COC'),
                array('code' => Entity\Subcases::TYPE_MANTAINER, 'label' => 'Maintainer'),
            ),
            'options_severidade' => $yaml_options_sintoma,
            'ufs' => $yaml_options_ufs,
            'message_error' => null,
            'message_success' => null,
            'page_limit' => $this->stack_page_limit,
            'vips' => $vips
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
     * Ação que retorna a lista de boletins de anormaliadade
     *
     * @param Request $request
     * @access public
     * @return JsonResponse
     */
    public function stackRequestAction(Request $request)
    {
        $permissions = $this->get('permissions');
        if (!$permissions->isAllowed('BA', 'read')) {
            $json_response = new JsonResponse();
            $json_response->setData(array(
                'data' => array(),
                'recordsTotal' => array(),
                'recordsFiltered' => array(),
                'draw' => null,
            ));

            return $json_response;
        }
        $request_draw = intval($request->query->get('draw'));
        $request_start = intval($request->query->get('start'));
        $request_page_limit = intval($request->query->get('length'));

        $request_reports_id = strval($request->query->get('id'));
        $request_reports_bi_id = strval($request->query->get('bi_id'));
        $request_circuit_cid = strval($request->query->get('cid'));
        $request_reports_designation = strval($request->query->get('designacao'));
        $request_reports_stack = strval($request->query->get('stack_fila'));
        $request_reports_initial_date = strval($request->query->get('initial_date'));
        $request_reports_final_date = strval($request->query->get('final_date'));
        $request_reports_initial_last_update = strval($request->query->get('initial_last_update'));
        $request_reports_final_last_update = strval($request->query->get('final_last_update'));
        $request_reports_status = strval($request->query->get('status'));
        $request_reports_open_subcases = json_decode($request->query->get('subcases'));
        $request_reports_severity = strval($request->query->get('severity'));
        $request_reports_vip = strval($request->query->get('vip'));
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

        try {

            $circuito_list = array();

            if (!empty($request_circuit_cid)) {
                function troubleticketCircuitApiRecursive($request_circuit_cid,$limit,$offset,$circuito_list, $troubleticket_circuit_api) {

                    try {
                        $troubleticket_circuit_api_get = $troubleticket_circuit_api->get($limit,$offset,$request_circuit_cid,null,null);

                    } catch (TroubleticketBundleException $error) {
                        $request->getSession()->getFlashBag()->add('error_message',$error->getMessage());

                        $troubleticket_circuit_api_get = null;
                    }

                    if (!empty($troubleticket_circuit_api_get)) {
                        $circuito = $troubleticket_circuit_api_get->circuito;

                        if (is_array($circuito)) {
                            foreach ($circuito as $circuito_dict) {
                                if (!in_array($circuito_dict->contCodigoid,$circuito_list)) {
                                    $circuito_list[] = $circuito_dict->contCodigoid;
                                }
                            }
                        }

                        $circuito_total = intval($troubleticket_circuit_api_get->total);

                        $page_total = ceil($circuito_total / $limit);

                        if ($page_total > ($offset / $limit)) {
                            $offset += $limit;

                            return troubleticketCircuitApiRecursive($request_circuit_cid,$limit,$offset,$circuito_list, $troubleticket_circuit_api);
                        }
                    }

                    return $circuito_list;
                }
                $troubleticket_circuit_api = $this->get('troubleticket.circuit_api');

                $circuito_list = troubleticketCircuitApiRecursive($request_circuit_cid,50,0,array(), $troubleticket_circuit_api);
            }

            $service = new Service\Reports($this->getDoctrine(), $this->container);
            $order = $request->get('order');
            if (!empty($order)) {
                foreach ($order as &$value) {
                    switch($value['column']) {
                        case 1:
                            $value['column'] = 'code';
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
                            $value['column'] = 'tme';
                            break;
                        case 6:
                            $value['column'] = 'status';
                            break;
                        case 7:
                            $value['column'] = 'client';
                            break;
                        case 8:
                            $value['column'] = 'final_client';
                            break;
                        case 9:
                            $value['column'] = 'uf';
                            break;
                        case 10:
                            $value['column'] = 'city';
                            break;
                        case 11:
                            $value['column'] = 'designator';
                            break;
                        case 12:
                            $value['column'] = 'severity';
                            break;
                        case 13:
                            $value['column'] = 'stack';
                            break;
                        case 14:
                            $value['column'] = 'subcase';
                            break;
                        case 15:
                            $value['column'] = 'nivel';
                            break;
                    }
                }
            }


            $reports_filter = $service->filter(
                Entity\Reports::TYPE_BA,
                null,
                $request_page_limit,
                $request_start,
                $request_reports_id,
                $circuito_list ? $circuito_list : $request_circuit_cid,
                $request_reports_designation,
                $request_reports_stack,
                $request_reports_initial_date,
                $request_reports_status,
                $request_reports_final_date,
                $request_reports_open_subcases,
                $request_reports_severity,
                $request_reports_closed,
                $request_reports_cancelled,
                $request->get('final_client'),
                $request->get('uf'),
                $request->get('client_name'),
                $order,
                $request_reports_vip,
                $request_reports_bi_id,
                $request_reports_initial_last_update,
                $request_reports_final_last_update,
                $request_reports_responsible
            );
            $reports_filter['error'] = null;
        } catch (TroubleticketBundleException $error) {
            $reports_filter = array(
                'data_list' => array(),
                'data_total' => 0,
                'error' => $error->getMessage()
            );
        } catch (\Exception $e) {
            $reports_filter = array(
                'data_list' => array(),
                'data_total' => 0,
                'error' => 'Ocorreu um erro não esperado'
            );
        }

        $json_response = new JsonResponse();
        $json_response->setData(array(
            'data' => $reports_filter['data_list'],
            'recordsTotal' => $reports_filter['data_total'],
            'recordsFiltered' => $reports_filter['data_total'],
            'draw' => $request_draw,
            'error' => $reports_filter['error']
        ));

        return $json_response;
    }

    /**
     * Ação de envio do boletim de anormalidade para a stack de SN2
     *
     * @param Request $request
     * @param integer $report_id
     * @access public
     * @return mixed
     */
    public function sendToSn2Action(Request $request, $report_id)
    {
        $permissions = $this->get('permissions');
        if (!$permissions->isAllowed('BA', 'send_to_sn2')) {
            $request->getSession()->getFlashBag()->add(
                'error',
                'Você não possui permissão para editar Boletins de Anormalidade'
            );
            return $this->redirect($this->generateUrl('troubleticket_ba_stack'));
        }
        $report = $this->getBA($report_id);

        if (empty($report)) {
            $request->getSession()->getFlashBag()->add(
                'error',
                'BA não encontrado'
            );
            return $this->redirect($this->generateUrl('troubleticket_ba_stack'));
        }

        $service = new Service\Reports($this->getDoctrine(), $this->container);
        if (!$service->sendToSn2($report)) {
            $request->getSession()->getFlashBag()->add(
                'error',
                'Não foi possível alterar a fila para SN2'
            );
        }

        return $this->redirect($this->generateUrl('troubleticket_ba_main', array('report_id' => $report_id)));
    }

    /**
     * Ação de envio do boletim de anormalidade para a stack de SN2
     *
     * @param Request $request
     * @param integer $report_id
     * @access public
     * @return mixed
     */
    public function changeStackAction(Request $request, $report_id)
    {
        $permissions = $this->get('permissions');
        if (!$permissions->isAllowed('BA', 'change_stack')) {
            $request->getSession()->getFlashBag()->add(
                'error',
                'Você não possui permissão para editar Boletins de Anormalidade'
            );
            return $this->redirect($this->generateUrl('troubleticket_ba_stack'));
        }
        $report = $this->getBA($report_id);

        if (empty($report)) {
            $request->getSession()->getFlashBag()->add(
                'error',
                'BA não encontrado'
            );
            return $this->redirect($this->generateUrl('troubleticket_ba_stack'));
        }

        $stack = $request->get('stack');
        if (empty($stack)) {
            $request->getSession()->getFlashBag()->add(
                'error',
                'Selecione uma Stack'
            );
            return $this->redirect($this->generateUrl('troubleticket_ba_main', array('report_id' => $report_id)));
        }

        $service = new Service\Reports($this->getDoctrine(), $this->container);
        if (!$service->changeStack($report, $stack)) {
            $request->getSession()->getFlashBag()->add(
                'error',
                'Não foi possível alterar a fila para ' . $report->getStackString()
            );
        }

        return $this->redirect($this->generateUrl('troubleticket_ba_main', array('report_id' => $report_id)));
    }

    /**
     * Ação de envio do boletim de anormalidade para a stack de SN2
     *
     * @param Request $request
     * @param integer $report_id
     * @access public
     * @return mixed
     */
    public function sendToSn3Action(Request $request, $report_id)
    {
        $permissions = $this->get('permissions');
        if (!$permissions->isAllowed('BA', 'send_to_sn3')) {
            $request->getSession()->getFlashBag()->add(
                'error',
                'Você não possui permissão para editar Boletins de Anormalidade'
            );
            return $this->redirect($this->generateUrl('troubleticket_ba_stack'));
        }
        $report = $this->getBA($report_id);

        if (empty($report)) {
            $request->getSession()->getFlashBag()->add(
                'error',
                'BA não encontrado'
            );
            return $this->redirect($this->generateUrl('troubleticket_ba_stack'));
        }

        $service = new Service\Reports($this->getDoctrine(), $this->container);
        if (!$service->sendToSn3($report)) {
            $request->getSession()->getFlashBag()->add(
                'error',
                'Não foi possível alterar a fila para SN3'
            );
        }

        return $this->redirect($this->generateUrl('troubleticket_ba_main', array('report_id' => $report_id)));
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
        if (!$permissions->isAllowed('BA', 'send_to_user')) {
            $request->getSession()->getFlashBag()->add(
                'error',
                'Você não possui permissão para editar Boletins de Anormalidade'
            );
            return $this->redirect($this->generateUrl('troubleticket_ba_stack'));
        }
        $report = $this->getBA($report_id);

        if (empty($report)) {
            $request->getSession()->getFlashBag()->add(
                'error',
                'BA não encontrado'
            );
            return $this->redirect($this->generateUrl('troubleticket_ba_stack'));
        }

        $colaboradorId = $request->request->get('colaborador');
        if (!$colaboradorId) {
            $request->getSession()->getFlashBag()->add(
                'error',
                'Colaborador não encontrado'
            );
            return $this->redirect($this->generateUrl('troubleticket_ba_main', array('report_id' => $report_id)));
        }
        $troubleticket_colaborador_api = $this->get('troubleticket.colaborador_api');
        $troubleticket_colaborador_api->setUrlPath(vsprintf('colaborador/%s',array($colaboradorId)));
        $colaborador = $troubleticket_colaborador_api->get(1, 0, null);
        if (empty($colaborador->colaborador)){
            $request->getSession()->getFlashBag()->add(
                'error',
                'Colaborador não encontrado'
            );
            return $this->redirect($this->generateUrl('troubleticket_ba_main', array('report_id' => $report_id)));
        }

        $service = new Service\Reports($this->getDoctrine(), $this->container);
        try {
            if ($service->takeOn($report,  $colaborador->colaborador->id)) {
                $request->getSession()->getFlashBag()->add(
                    'success',
                    'BA transferido com sucesso!'
                );
            } else {
                $request->getSession()->getFlashBag()->add(
                    'error',
                    'Não foi possível transferir o BA'
                );
            }
        } catch (Exception $e) {
            $request->getSession()->getFlashBag()->add(
                'error',
                'Ocorreu um erro ao tentar transferir o BA'
            );
        }
        return $this->redirect($this->generateUrl('troubleticket_ba_main', array('report_id' => $report_id)));
    }

    /**
     * Ação para comentar um boletim de anormalidade
     *
     * @param Request $request
     * @param integer $report_id
     * @access public
     * @return mixed
     */
    public function commentAction(Request $request, $report_id)
    {
        $permissions = $this->get('permissions');
        if (!$permissions->isAllowed('BA', 'comment')) {
            $request->getSession()->getFlashBag()->add(
                'error',
                'Você não possui permissão para editar Boletins de Anormalidade'
            );
            return $this->redirect($this->generateUrl('troubleticket_ba_stack'));
        }
        $report = $this->getBA($report_id);
        if (empty($report)) {
            $request->getSession()->getFlashBag()->add(
                'error',
                'BA não encontrado'
            );
            return $this->redirect($this->generateUrl('troubleticket_ba_stack'));
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

        return $this->redirect($this->generateUrl('troubleticket_ba_main', array('report_id' => $report_id)));
    }

    /**
     * Ação para buscar as mensagens enviadas entre analista e cliente através do APP TroubleTicket
     *
     * @param Request $request
     * @param integer $reportId
     * @access public
     * @return mixed
     */
    public function chatListAction(Request $request, $report_id)
    {
        if (!$report_id) {
            throw new Exception("Identificador do boletim inválido!");
        }

        $emTT = $this->getDoctrine()->getManager('troubleticket');
        $emGcdb = $this->getDoctrine()->getManager('default');
        $session = $this->get('session');

        try{
            $emTT->getConnection()->beginTransaction();
            $messages = $emTT->getRepository('TroubleticketBundle:Messages')->findBy(array('report' =>$report_id), array('createdAt' => 'DESC'));

            $html = <<<HTML
            <div class="row">
                <table style="width: 100%;text-align:center;">
                    <thead style="display: block">
                        <tr style="width: 100%;display: table">
                            <th style="width:10%">Data</th>
                            <th style="width:10%">Nome</th>
                            <th style="width:10%">Analista</th>
                            <th style="width:70%">Comentário</th>
                        </tr>
                    </thead>
                    <tbody style="width: 100%; max-height: 300px; overflow-y:scroll; display: block">
HTML;

            foreach ($messages as $message) {
                $name = '';
                if ($message->getUser()) {
                    $user = $emGcdb->getRepository($message->getReferenceRepository())->findOneBy(array($message->getReferenceId() => $message->getUser()));

                    $name = $user ? $user->getFullName() : '';
                }

                $date = $message->getCreatedAt()->format('d/m/Y');

                if (!$message->getViewedBy()) {
                    $message->setViewedBy($session->get('usr_codigoid'));
                }

                $analist = '';
                $autUser = $emGcdb->getRepository('ServicosGcdbBundle:AutUsuarios')->find($message->getViewedBy());

                $analist = $autUser ? $autUser->getFullName() : '';


                $msg = $message->getMessage();

                $html .= <<<HTML
                        <tr style="width: 100%;display: table; border-top: 1px solid gray">
                            <td style="width:10%">$date</td>
                            <td style="width:10%">$name</td>
                            <td style="width:10%">$analist</td>
                            <td style="width:70%">$msg</td>
                        </tr>
HTML;

                $emTT->persist($message);
                $emTT->flush();
            }
            $html .= <<<HTML
                    </tbody>
                </table>
            </div>
HTML;

            $report = $emTT->getRepository('TroubleticketBundle:Reports')->find($report_id);

            $service = new Service\Reports($this->getDoctrine(), $this->container);
            $history = $service->createHistory($report, 'Comentários do cliente foram visualizados');

            $urlComment = $this->generateUrl('troubleticket_ba_chat_insert', array('report_id' => $report_id));

            if ($report->canChat()) {
                $html .= <<<HTML
                <div class="row">
                    <textarea id="comment" style="width: 100%; height: 100px" data-href="$urlComment"></textarea>
                </div>
HTML;
            }

            $response = new Response($html);

            $emTT->getConnection()->commit();
        } catch (Exception $e) {
            $emTT->getConnection()->rollback();
            $response = new Response('<div class=\'error\'><span>Ocorreu um erro ao buscar as mensagens!</span></div>');
            $response->getStatusCode(500);
        }

        return $response;
    }

    /**
     * Ação para buscar as mensagens enviadas entre analista e cliente através do APP TroubleTicket
     *
     * @param Request $request
     * @param integer $reportId
     * @access public
     * @return mixed
     */
    public function chatAction(Request $request, $report_id)
    {
        $response = new JsonResponse;
        try {
            $session = $this->get('session');
            $entityStech = $this->getDoctrine()->getManager('default');
            $entityTroubleTicket = $this->getDoctrine()->getManager('troubleticket');
            $entityTroubleTicket->getConnection()->beginTransaction();
            $message = $request->get('comment');

            if (!$report_id) {
                throw new TroubleticketBundleException("Identificador do boletim inválido!");
            }

            if (!$message) {
                throw new TroubleticketBundleException("Comentário inválido!");
            }

            $autUsuarioRepository = $entityStech->getRepository("ServicosGcdbBundle:AutUsuarios");
            $autUsuario = $autUsuarioRepository->find($session->get('usr_codigoid'));

            if (!$autUsuario) {
                throw new TroubleticketBundleException("Usuário logado inválido!");
            }

            $reportsRepository = $entityTroubleTicket->getRepository("TroubleticketBundle:Reports");
            $report = $reportsRepository->find($report_id);

            if (!$report) {
                throw new TroubleticketBundleException("Boletim inválido!");
            }

            $service = new Service\Reports($this->getDoctrine(), $this->container);
            $message = $service->chat($report, $message, $session->get('usr_codigoid'), 'ServicosGcdbBundle:AutUsuarios', 'id', $session->get('usr_codigoid'));

            //envia email para o cliente
            $mailData = array(
                'subject' => 'Comentário inserido no '.$report->getCode(),
                'body' => 'Comentário inserido no '.$report->getCode().' por '.$autUsuario->getNome().' <br />
                Comentário: '.$message->getMessage(),
                'type' => 'BA',
                'route' => 'editar/'.$report->getId(),
                'mail_to' => $report->getRequesterEmail()
            );
            $service->vogelSendMail($mailData);

            $response->setData(array(
                'fields' => array(),
                'message' => 'Comentário inserido com sucesso'
            ));
            $response->setStatusCode(200);

            $entityTroubleTicket->getConnection()->commit();
        } catch (TroubleticketBundleException $te) {
            $response->setData(array(
                'error' => true,
                'message' => $te->getMessage()
            ));
            $response->setStatusCode($te->getCode()?$te->getCode():500);
            $entityTroubleTicket->getConnection()->rollback();
        } catch (Exception $e) {
            $response->setData(array(
                'error' => true,
                'message' => 'Ocorreu um erro ao enviar o comentário!'
            ));
            $response->setStatusCode(500);
            $entityTroubleTicket->getConnection()->rollback();
        }

        return $response;
    }

    /**
     * Obtem um Boletim de Anormalidade através do identificador
     *
     * @param int $report_id
     * @access protected
     * @return Entity\Reports
     */
    protected function getBA($report_id)
    {
        $repository = $this->getDoctrine()->getRepository('TroubleticketBundle:Reports', 'troubleticket');
        return $repository->findOneBy(array('id' => $report_id, 'type' => Entity\Reports::TYPE_BA));
    }

    /**
     * Ação para realiza associação entre um BA e um BI
     *
     * @param Request $request
     * @param int $report_id
     * @access public
     * @return JsonResponse
     */
    public function bisAction(Request $request, $report_id)
    {
        $permissions = $this->get('permissions');
        if (!$permissions->isAllowed('BA', 'link_to_bi')) {
            $request->getSession()->getFlashBag()->add(
                'error',
                'Você não possui permissão para editar Boletins de Anormalidade'
            );
            return $this->redirect($this->generateUrl('troubleticket_ba_stack'));
        }
        if ($request->isMethod('POST')) {
            $ba = $this->getBA($report_id);
            $status = false;
            $biId = $request->get('bi');
            if (!empty($biId) && $ba) {
                $service = new Service\Reports($this->getDoctrine(), $this->container);
                if ($service->linkToBi($ba, $biId)) {
                    $status = true;
                    // pegando código do BA e cid para o envio de push notification
                    $troubleticket_circuit_api = $this->get('troubleticket.circuit_api');
                    $troubleticket_circuit_api->setUrlPath(vsprintf('circuito/%s',array($ba->getCircuitId())));
                    $troubleticket_circuit_api_get = $troubleticket_circuit_api->get(1, 0, null, null,null);
                    $circuit = $troubleticket_circuit_api_get->circuito;

                    $this->sendPushAction(
                        $circuit->clieCodigoid,
                        'BA vinculado a um BI',
                        'O '.$ba->getCode().' está relacionado a um problema em massa. Nossas equipes já estão trabalhando na solução do problema.',
                        array('id' => $report_id)
                    );
                }
            }
            return new JsonResponse(array('status' => $status));
        } else if ($request->isMethod('DELETE')) {
            $ba = $this->getBA($report_id);
            $status = false;
            if ($ba) {
                $service = new Service\Reports($this->getDoctrine(), $this->container);
                $status = (bool)$service->unlinkBi($ba);
            }
            return new JsonResponse(array('status' => $status));
        } else {
            try {
                $service = new Service\Reports($this->getDoctrine(), $this->container);
                $data = $service->filter(
                    Entity\Reports::TYPE_BI,
                    null,
                    (int)$request->get('length'),
                    (int)$request->get('start'),
                    null,
                    null,
                    null,
                    null,
                    null,
                    Entity\Reports::EM_ATENDIMENTO
                );
                $result = array(
                    'data' => $data['data_list'],
                    'recordsTotal' => $data['data_total'],
                    'recordsFiltered' => $data['data_total'],
                    'draw' => $request->get('draw'),
                );
            } catch (TroubleticketBundleException $e) {
                $result = array(
                    'error' => $e->getMessage()
                );
            } catch (\Exception $e) {
                $result = array(
                    'error' => 'Ocorreu um erro não esperado'
                );
            }

            return new JsonResponse($result);
        }
    }

    /**
     * Ação para assumir um BA
     *
     * @param Request $request
     * @param int $report_id
     * @access public
     * @return mixed
     */
    public function takeOnAction(Request $request, $report_id)
    {
        $permissions = $this->get('permissions');
        if (!$permissions->isAllowed('BA', 'take_on')) {
            $request->getSession()->getFlashBag()->add(
                'error',
                'Você não possui permissão para editar Boletins de Anormalidade'
            );
            return $this->redirect($this->generateUrl('troubleticket_ba_stack'));
        }
        $report = $this->getBA($report_id);
        if (empty($report)) {
            $request->getSession()->getFlashBag()->add(
                'error',
                'BA não encontrado'
            );
            return $this->redirect($this->generateUrl('troubleticket_ba_stack'));
        }

        $service = new Service\Reports($this->getDoctrine(), $this->container);
        try {
            if ($service->takeOn($report, $_SESSION['usr_codigoid'])) {
                $request->getSession()->getFlashBag()->add(
                    'success',
                    'BA assumido com sucesso!'
                );
            } else {
                $request->getSession()->getFlashBag()->add(
                    'error',
                    'Não foi possível assumir o BA'
                );
            }
        } catch (Exception $e) {
            $request->getSession()->getFlashBag()->add(
                'error',
                'Ocorreu um erro ao tentar assumir o BA'
            );
        }
        return $this->redirect($this->generateUrl('troubleticket_ba_main', array('report_id' => $report_id)));
    }

    /**
     * Gera relatório de incidentes
     *
     * @param Request $request
     * @access public
     * @return XLSResponse
     */
    public function reportIncidentAction(Request $request) {
        $permissions = $this->get('permissions');

        if (!$permissions->isAllowed('BA', 'export_report')) {
            $request->getSession()->getFlashBag()->add(
                'error',
                'Você não possui permissão para exportar relatorios de incidente'
            );

            return $this->redirect($this->generateUrl('troubleticket_ba_stack'));
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
            $service_export = $service->incidentsBAReport(
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
                'Ocorreu um erro ao tentar exportar o relatório de incidente BA'
            );

            return $this->redirect($this->generateUrl('troubleticket_ba_stack'));
        }

        $table_head_list = array(
            'Nº BA' => 'string',
            'Nº do BI!' => 'string',
            'Designação' => 'string',
            'Cliente' => 'string',
            'Cliente Final' => 'string',
            'UF Ponta A' => 'string',
            'Nº Subcaso COC' => 'string',
            'Nº Subcaso Parceiro' => 'string',
            'Data de abertura' => 'string',
            'Hora de abertura' => 'string',
            'Data do fechamento' => 'string',
            'Hora do fechamento' => 'string',
            'SN1' => 'string',
            'SN2' => 'string',
            'SN3' => 'string',
            'Voz' => 'string',
            'Incidente' => 'string',
            'Severidade' => 'string',
            'Estrutura' => 'string',
            'Elemento' => 'string',
            'Causa' => 'string',
            'Problema' => 'string',
            'Solução' => 'string',
            'Local da Falha' => 'string',
            'Falha' => 'string',
            'Motivo' => 'string',
            'Status' => 'string',
            'POP' => 'string',
            'Fornecedor' => 'string'
        );

        $response = new XLSResponse('Relatorio-de-Incidentes-BA');
        $response->setHeaderColumns($table_head_list);
        $response->setBody($service_export);

        return $response;
    }


    /**
     * Ação para visualizar detalhes da ponta
     *
     * @param Request $request
     * @access public
     * @return mixed
     */
    public function previewTipAction(Request $request) {
    	$render_template = 'TroubleticketBundle:BA:tip.html.twig';
    	
    	$api = $this->get('troubleticket.circuit_info_api');
	    
	    try {
	        $objRetorno = $api->get($request->get('circuito'));
	    } catch (TroubleticketBundleException $error) {
	        $request->getSession()->getFlashBag()->add(
	            'error',
	            $error->getMessage()
	            );
	        return $this->redirect($this->generateUrl('troubleticket_ba_stack'));
	    }
	    

    	//$response = $this->forward('ServicosRestBundle:Cliente\CircuitoInformacoes:info', array('id'=> $request->get('circuito')));

    	//$objRetorno = json_decode($response->getContent());

    	/*if($objRetorno->error){
    		throw new \Exception($objRetorno->msg);
    	}*/

    	$render_template_data = array(
    			'infos'		=> $objRetorno->infos,
    			'materiais'	=> $objRetorno->materiais,
    			'projeto' 	=> $objRetorno->projeto,
    			'dependetes'=> $objRetorno->dependente

    	);

    	$render = $this->render($render_template,$render_template_data);

    	return $render;
    }

    /**
     * Ação para apresentar o relatório de Performance do BA
     *
     * @param Request $request
     * @access public
     * @return mixed
     */
    public function reportPerformanceAction(Request $request) {
        $permissions = $this->get('permissions');

        if (!$permissions->isAllowed('BA', 'export_report')) {
            $request->getSession()->getFlashBag()->add(
                'error',
                'Você não possui permissão para exportar relatorios de performance'
            );

            return $this->redirect($this->generateUrl('troubleticket_ba_stack'));
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
            $service_export = $service->performanceBAReport(
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
                'Ocorreu um erro ao tentar exportar o relatório de Performance BA'
            );

            return $this->redirect($this->generateUrl('troubleticket_ba_stack'));
        }

        $table_head_list = array(
            'Nº BA' => 'string',
            'Nº do BI!' => 'string',
            'Designação' => 'string',
            'Cliente' => 'string',
            'Cliente Final' => 'string',
            'UF Ponta A' => 'string',
            'Nº Subcaso COC' => 'string',
            'Nº Subcaso Parceiro' => 'string',
            'Data de abertura' => 'string',
            'Hora de abertura' => 'string',
            'Data do fechamento' => 'string',
            'Hora do fechamento' => 'string',
            'TME' => 'string',
            'Tempo pausado' => 'string',
            'Tempo resolvido' => 'string',
            'TMR' => 'string',
            'TMR NOC' => 'string',
            'TMR SN1' => 'string',
            'TMR SN2' => 'string',
            'TMR SN3' => 'string',
            'TMR VOZ' => 'string',
            'TMR COC' => 'string',
            'TMR Deslocamento' => 'string',
            'TMR Atendimento Infra' => 'string',
            'TMR Atendimento Campo' => 'string',
            'TMR Atendimento Cliente' => 'string',
            'Status' => 'string',
            'Motivo' => 'string'
        );

        $response = new XLSResponse('Relatorio-de-Performance-BA');
        $response->setHeaderColumns($table_head_list);
        $response->setBody($service_export);

        return $response;

    }

    public function countersAction()
    {
        $service = new Service\Reports($this->getDoctrine(), $this->container);
        $result = array(
            "ba" => $service->getQtBaOpen()
        );
        $response = new JsonResponse();
        $response->setData($result);
        return $response;
    }

}
