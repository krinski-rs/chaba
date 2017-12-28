<?php

namespace TroubleticketBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation;

use TroubleticketBundle\Service;
use TroubleticketBundle\Entity;
use TroubleticketBundle\Exception\TroubleticketBundleException;

use Symfony\Component\Validator\Constraints;

use TroubleticketBundle\Component\XLSResponse;
/**
 * Controladora para ações realizadas sobre boletins de serviço
 */
class BSController extends Controller
{
    private $stack_page_limit = 10;

    /**
     * Busca os circuitos através da api para ser demonstrados na tabela
     *
     * @param HttpFoundation\Request $request
     * @access public
     * @return HttpFoundation\JsonResponse
     */
    public function circuitRequestAction(HttpFoundation\Request $request)
    {
        $permissions = $this->get('permissions');

        if (!$permissions->isAllowed('BS', 'read')) {
            $json_response = new HttpFoundation\JsonResponse();
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

        $troubleticket_circuit_api = $this->get('troubleticket.circuit_api');
        $error = null;

        try {
            $troubleticket_circuit_api_get = $troubleticket_circuit_api->get(
                $request_page_limit,
                $request_start,
                $cid,
                $designator,
                null,
                true);//sempre traz os ativos

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
                    '<button type="submit" class="button btn_bs_new" data-id="'.$circuito->contCodigoid.'">Abrir BS</button>');

                $data_list[] = $data_aux;
            }
        }

        $json_response = new HttpFoundation\JsonResponse();
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
     * Ação responsável pela apresentação do HTML da fila de Boletins de Serviço
     *
     * @param HttpFoundation\Request $request
     * @access public
     * @return mixed
     */
    public function stackAction(HttpFoundation\Request $request)
    {
        $permissions = $this->get('permissions');
        if (!$permissions->isAllowed('BS', 'read')) {
            $request->getSession()->getFlashBag()->add(
                'error',
                'Você não possui permissões para visualizar a listagem de BS'
            );
            return $this->redirectToHome($request);
        }
        return $this->render('TroubleticketBundle:BS:stack.html.twig', array('page_limit' => 10));
    }

    /**
     * Ação responsável pela obtenção dos dados da fila de Boletins de Serviço
     *
     * @param HttpFoundation\Request $request
     * @access public
     * @return HttpFoundation\JsonResponse
     */
    public function stackRequestAction(HttpFoundation\Request $request)
    {
        $permissions = $this->get('permissions');
        if (!$permissions->isAllowed('BS', 'read')) {
            $request->getSession()->getFlashBag()->add(
                'error',
                'Você não possui permissões para visualizar a listagem de BS'
            );
            return $this->redirectToHome($request);
        }

        $offset = (int)$request->get('start', 0);
        $limit = (int)$request->get('length', 10);
        $draw = (int)$request->get('draw');

        $availableFilters = array('id', 'cid', 'designation', 'initial_date', 'final_date');

        $filters = array();
        foreach ($availableFilters as $filter) {
            $value = $request->get($filter);
            if (!empty($value)) {
                if ($filter == 'initial_date' || $filter == 'final_date') {
                    if (!preg_match('/^[0-9]{4}(-)[0-9]{2}(-)[0-9]{2}$/',$value)) {
                        $request_date_list = explode('-',$value);

                        $value = vsprintf('%s-%s-%s',array($request_date_list[2],$request_date_list[1],$request_date_list[0]));
                    }
                }

                $filters[$filter] = $value;
            }
        }

        $service = new Service\Reports($this->getDoctrine(), $this->container);
        try {
            $data = $service->getBSStack($limit, $offset, $filters);
        } catch (TroubleticketBundleException $e) {
            $data = array(
                'reports' => null,
                'total' => 0,
            );
        }

        return new HttpFoundation\JsonResponse(array(
            'data' => $data['reports'],
            'recordsTotal' => $data['total'],
            'recordsFiltered' => $data['total'],
            'draw' => $draw,
        ));
    }

    /**
     * Ação responsável pela apresentação dos dados de um BS
     *
     * @param HttpFoundation\Request $request
     * @param int $id
     * @access public
     * @return mixed
     */
    public function mainAction(HttpFoundation\Request $request, $id)
    {
        $permissions = $this->get('permissions');
        if (!$permissions->isAllowed('BS', 'read')) {
            $request->getSession()->getFlashBag()->add(
                'error',
                'Você não possui permissão para visualizar Boletins de Serviço'
            );
            return $this->redirect($this->generateUrl('troubleticket_bs_stack'));
        }

        $report = $this->getBS($id);
        if (empty($report)) {
            $request->getSession()->getFlashBag()->add(
                'error',
                'BS não encontrado'
            );
            return $this->redirect($this->generateUrl('troubleticket_ba_stack'));
        }

        $circuitApi = $this->get('troubleticket.circuit_api');
        $circuitApi->setUrlPath('circuito/' . $report->getCircuitId());

        try {
            $circuit = $circuitApi->get(1, 0, null, null,null);

        } catch (TroubleticketBundleException $error) {
            $request->getSession()->getFlashBag()->add(
                'error',
                'Não foi possível obter os dados do circuito'
            );
            return $this->redirect($this->generateUrl('troubleticket_ba_stack'));
        }

        $circuit = $circuit->circuito;

        $json_form_close = __DIR__.'/../Resources/config/BA/form_close.json';
        $json_form_close = json_decode(file_get_contents($json_form_close));

        $service = new Service\Reports($this->getDoctrine(), $this->container);
        $service->loadResponsibleData($report);

        $troubleticket_colaborador_api = $this->get('troubleticket.colaborador_api');

        //busca todos os colaboradores
        $arColaboradores = array();
        $colaboradoresList = $troubleticket_colaborador_api->get();
        foreach ($colaboradoresList->colaborador as $colaborador) {
            $arColaboradores[] = array(
                'nome' => $colaborador->nome,
                'id' => $colaborador->id
            );
        }

        sort($arColaboradores);

        $params = array(
            'message_error' => null,
            'message_success' => null,
            'report' => $report,
            'circuit' => $circuit,
            'yaml_form_close' => $json_form_close,
            'session_user' => !empty($_SESSION['usr_codigoid']) ? $_SESSION['usr_codigoid'] : '',
            'colaboradores' => $arColaboradores
        );

        return $this->render('TroubleticketBundle:BS:main.html.twig', $params);
    }

    /**
     * Ação que permite um usuário assumir um BS
     *
     * @param HttpFoundation\Request $request
     * @param int $id
     * @access public
     * @return mixed
     */
    public function takeOnAction(HttpFoundation\Request $request, $id)
    {
        $permissions = $this->get('permissions');
        if (!$permissions->isAllowed('BS', 'take_on')) {
            $request->getSession()->getFlashBag()->add(
                'error',
                'Você não possui permissão para editar Boletins de Serviço'
            );
            return $this->redirect($this->generateUrl('troubleticket_bs_stack'));
        }
        $report = $this->getBS($id);
        if (empty($report)) {
            $request->getSession()->getFlashBag()->add(
                'error',
                'BS não encontrado'
            );
            return $this->redirect($this->generateUrl('troubleticket_bs_stack'));
        }

        $service = new Service\Reports($this->getDoctrine(), $this->container);
        try {
            if ($service->takeOn($report, $_SESSION['usr_codigoid'])) {
                $request->getSession()->getFlashBag()->add(
                    'success',
                    'BS assumido com sucesso!'
                );
            } else {
                $request->getSession()->getFlashBag()->add(
                    'error',
                    'Não foi possível assumir o BS'
                );
            }
        } catch (\Exception $e) {
            $request->getSession()->getFlashBag()->add(
                'error',
                'Ocorreu um erro ao tentar assumir o BS'
            );
        }
        return $this->redirect($this->generateUrl('troubleticket_bs_main', array('id' => $id)));
    }

    /**
     * Ação para transferir o boletim para um usuário
     *
     * @param HttpFoundation\Request $request
     * @param integer $report_id
     * @access public
     * @return mixed
     */
    public function sendToUserAction(HttpFoundation\Request $request, $report_id)
    {
        $permissions = $this->get('permissions');
        if (!$permissions->isAllowed('BS', 'send_to_user')) {
            $request->getSession()->getFlashBag()->add(
                'error',
                'Você não possui permissão para editar Boletins de Serviço'
            );
            return $this->redirect($this->generateUrl('troubleticket_bs_stack'));
        }
        $report = $this->getBS($report_id);

        if (empty($report)) {
            $request->getSession()->getFlashBag()->add(
                'error',
                'BS não encontrado'
            );
            return $this->redirect($this->generateUrl('troubleticket_bs_stack'));
        }

        $colaboradorId = $request->request->get('colaborador');
        if (!$colaboradorId) {
            $request->getSession()->getFlashBag()->add(
                'error',
                'Colaborador não encontrado'
            );
            return $this->redirect($this->generateUrl('troubleticket_bs_main', array('id' => $report_id)));
        }
        $troubleticket_colaborador_api = $this->get('troubleticket.colaborador_api');
        $troubleticket_colaborador_api->setUrlPath(vsprintf('colaborador/%s',array($colaboradorId)));
        $colaborador = $troubleticket_colaborador_api->get(1, 0, null);
        if (empty($colaborador->colaborador)){
            $request->getSession()->getFlashBag()->add(
                'error',
                'Colaborador não encontrado'
            );
            return $this->redirect($this->generateUrl('troubleticket_bs_main', array('id' => $report_id)));
        }

        $service = new Service\Reports($this->getDoctrine(), $this->container);
        try {
            if ($service->takeOn($report,  $colaborador->colaborador->id)) {
                $request->getSession()->getFlashBag()->add(
                    'success',
                    'BS transferido com sucesso!'
                );
            } else {
                $request->getSession()->getFlashBag()->add(
                    'error',
                    'Não foi possível transferir o BS'
                );
            }
        } catch (\Exception $e) {
            $request->getSession()->getFlashBag()->add(
                'error',
                'Ocorreu um erro ao tentar transferir o BS'
            );
        }
        return $this->redirect($this->generateUrl('troubleticket_bs_main', array('id' => $report_id)));
    }

    /**
     * Ação que permite que comentários sejam realizados em um BS
     *
     * @param HttpFoundation\Request $request
     * @param int $id
     * @access public
     * @return mixed
     */
    public function commentAction(HttpFoundation\Request $request, $id)
    {
        $permissions = $this->get('permissions');
        if (!$permissions->isAllowed('BS', 'comment')) {
            $request->getSession()->getFlashBag()->add(
                'error',
                'Você não possui permissão para editar Boletin de Serviço'
            );
            return $this->redirect($this->generateUrl('troubleticket_bs_stack'));
        }
        $report = $this->getBS($id);
        if (empty($report)) {
            $request->getSession()->getFlashBag()->add(
                'error',
                'BS não encontrado'
            );
            return $this->redirect($this->generateUrl('troubleticket_bs_stack'));
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

        return $this->redirect($this->generateUrl('troubleticket_bs_main', array('id' => $id)));
    }

    /**
     * Ação que realiza o fechamento de um BS
     *
     * @param HttpFoundation\Request $request
     * @param int $id
     * @access public
     * @return mixed
     */
    public function closeAction(HttpFoundation\Request $request, $id)
    {
        $permissions = $this->get('permissions');
        if (!$permissions->isAllowed('BS', 'close')) {
            $request->getSession()->getFlashBag()->add(
                'error',
                'Você não possui permissão para editar Boletim de Serviço'
            );
            return $this->redirect($this->generateUrl('troubleticket_bs_stack'));
        }
        $report = $this->getBS($id);
        if (empty($report)) {
            $request->getSession()->getFlashBag()->add(
                'error',
                'BS não encontrado'
            );
            return $this->redirect($this->generateUrl('troubleticket_bs_stack'));
        }

        $service = new Service\Reports($this->getDoctrine(), $this->container);

        $request_causa = $request->request->get('causa',$request->request->get('hidden_causa',null));
        $request_local = $request->request->get('local',$request->request->get('hidden_local',null));
        $request_problema = $request->request->get('problema',$request->request->get('hidden_problema',null));
        $request_solucao = $request->request->get('solucao',$request->request->get('hidden_solucao',null));
        $request_comment = $request->request->get('comentario',$request->request->get('hidden_motivo',null));

        $request_incidente = $request->request->get('incidente', $request->request->get('hidden_incidente', null));
        $request_severidade = $request->request->get('severidade', $request->request->get('hidden_severidade', null));
        $request_estrutura = $request->request->get('estrutura', $request->request->get('hidden_estrutura', null));
        $request_pop = $request->request->get('pop', $request->request->get('hidden_pop', null));
        $request_elemento = $request->request->get('elemento', $request->request->get('hidden_elemento', null));

        $request_fornecedor = $request->request->get('fornecedor');
        $request_fornecedor = (!empty($request_fornecedor) ? $request_fornecedor : null);

        if (empty($request_causa) || empty($request_elemento) || empty($request_problema) || empty($request_solucao)) {
            $session = $request->getSession();

            $session->getFlashBag()->set('message_error',null);
            $session->getFlashBag()->add('message_error','Preencha os campos obrigatórios!');

            $route_troubleticket_bs_main = $this->generateUrl('troubleticket_bs_main',array('id' => $id));

            $response = $this->redirect($route_troubleticket_bs_main);

            return $response;
        }

        $report_incidente = (!empty($request_incidente) ? $request_incidente : null);
        $report_severidade = (!empty($request_severidade) ? $request_severidade : null);
        $report_cause = (!empty($request_causa) ? $request_causa : null);
        $report_failure_local = (!empty($request_local) ? $request_local : null);
        $report_element = (!empty($request_elemento) ? $request_elemento : null);
        $report_problem = (!empty($request_problema) ? $request_problema : null);
        $report_solution = (!empty($request_solucao) ? $request_solucao : null);
        $report_estrutura = (!empty($request_estrutura) ? $request_estrutura : null);

        $history_comment = vsprintf('Fechamento do BA - Causa: %s, Local: %s, Elemento: %s, Problema: %s, Solução: %s',
            array($report_cause, $report_failure_local, $report_element, $report_problem, $report_solution)
        );

        try {
            $report->setIncident($report_incidente);
            $report->setClosedSymptom($report_severidade);

            if($request_incidente != 'Cliente') {
                $report->setProviderId($request_fornecedor);
                $report->setPopId($request_pop);
                $report->setStructure($report_estrutura);
            }

            $report->setElement($report_element);
            $report->setCause($report_cause);
            $report->setFailureLocal($report_failure_local);
            $report->setProblem($report_problem);
            $report->setSolution($report_solution);

            if ($service->close($report, $report->getLastTimeCounter(), $history_comment, null, $request_comment)) {
                $request->getSession()->getFlashBag()->add(
                    'success',
                    'BS fechado com sucesso!'
                );
            } else {
                $request->getSession()->getFlashBag()->add(
                    'error',
                    'Não foi possível fechar o BS'
                );
            }
        } catch (\Exception $e) {
            $request->getSession()->getFlashBag()->add(
                'error',
                'Ocorreu um erro ao tentar fechar o BS'
            );
        }
        return $this->redirect($this->generateUrl('troubleticket_bs_stack'));

    }


    /**
     * Ação para editar as configurações de Boletins de Serviço de Análise de Problemas
     *
     * @param HttpFoundation\Request $request
     * @access public
     * @return mixed
     */
    public function configAction(HttpFoundation\Request $request)
    {
        $permissions = $this->get('permissions');
        if (!$permissions->isAllowed('BS', 'config')) {
            $request->getSession()->getFlashBag()->add(
                'error',
                'Você não possui permissão para editar as configurações de boletins de serviço!'
            );
            return $this->redirectToHome($request);
        }

        $service = new Service\Reports($this->getDoctrine(), $this->container);
        $config = $service->getBSConfigs();
        $constraints = array(
            new Constraints\NotBlank,
            new Constraints\GreaterThanOrEqual(array('value' => 0))
        );
        $form = $this->createFormBuilder($config)
            ->add('interval_days', 'integer', array('constraints' => $constraints))
            ->add('reports_amount', 'integer', array('constraints' => $constraints))
            ->add('salvar', 'submit', array('attr' => array('class' => 'btn btn-success block-button')))
            ->getForm();

        $messages = array();
        if ($request->isMethod('POST')) {
            $form->handleRequest($request);
            if ($form->isValid()) {
                if ($service->saveBSConfig($form->getData()) !== false) {
                    $messages[] = array('type' => 'sucesso', 'message' => 'Configurações alteradas com sucesso');
                } else {
                    $messages[] = array('type' => 'error', 'message' => 'Ocorreu um erro!');
                }
            } else {
                $messages[] = array('type' => 'error', 'message' => 'Verifique os dados informados!');
            }
        }
        $data = array('form' => $form->createView(), 'messages' => $messages);
        return $this->render('TroubleticketBundle:BS:config.html.twig', $data);
    }


    /**
     * Ação que padroniza o redirecionamento para a home
     *
     * @param HttpFoundation\Request $request
     * @access protected
     * @return HttpFoundation\Response
     */
    protected function redirectToHome(HttpFoundation\Request $request)
    {
        $pathInfo = $request->getPathInfo();
        $uri = $request->getRequestUri();
        return $this->redirect(preg_replace('$'.$pathInfo.'.*$', '', $uri));
    }


    /**
     * Busca o boletim de serviço pelo identificador
     *
     * @param integer $id
     * @access protected
     * @return Entity\Reports
     */
    protected function getBS($id)
    {
        $repository = $this->getDoctrine()->getRepository('TroubleticketBundle:Reports', 'troubleticket');
        return $repository->findOneBy(array('id' => $id, 'type' => Entity\Reports::TYPE_BS));

    }

    /**
     * Ação que monta e demonstra o formulário de criação do Boletim de Serviço
     *
     * @param HttpFoundation\Request $request
     * @access public
     * @return mixed
     */
    public function newAction(HttpFoundation\Request $request)
    {
        $permissions = $this->get('permissions');
        if (!$permissions->isAllowed('BS', 'create')) {
            $request->getSession()->getFlashBag()->add(
                'error',
                'Você não possui permissão para inserir Boletins de Serviço'
            );
            return $this->redirect($this->generateUrl('troubleticket_bs_stack'));
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
                return $this->redirect($this->generateUrl('troubleticket_bs_new'));
            }
        }

        $render_template = 'TroubleticketBundle:BS:new.html.twig';
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
            $response = $this->forward('TroubleticketBundle:BS:createPreview',array(),array());

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
     * @param HttpFoundation\Request $request
     * @access public
     * @return mixed
     */
    public function createPreviewAction(HttpFoundation\Request $request)
    {
        $circuit_id = null;
        $designador = null;

        $data = $request->get('data');

        if (!$request->isMethod('POST') || empty($data)) {
            return $this->redirect($this->generateUrl('troubleticket_bs_new'));
        }

        $permissions = $this->get('permissions');
        if (!$permissions->isAllowed('BS', 'create')) {
            $request->getSession()->getFlashBag()->add(
                'error',
                'Você não possui permissão para inserir Boletins de Serviço'
            );
            return $this->redirect($this->generateUrl('troubleticket_bs_stack'));
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
                return $this->redirect($this->generateUrl('troubleticket_bs_new'));
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
                return $this->redirect($this->generateUrl('troubleticket_bs_new'));
            }

            $circuito = $troubleticket_circuit_api_get->circuito[0];
        }

        try {
            $service = new Service\Reports($this->getDoctrine(), $this->container);
            $report = $service->create(array(
                'circuit_id' => $circuito->contCodigoid,
                'designation' => $circuito->designador,
                'stack' => Entity\Reports::STACK_ANALISE_PROBLEMAS,
                'type' => Entity\Reports::TYPE_BS,
                'responsible' => null,
            ), 'BS criado');

        } catch (TroubleticketBundleException $error) {
            $request->getSession()->getFlashBag()->add(
                'error',
                $error->getMessage()
            );
            return $this->redirect($this->generateUrl('troubleticket_bs_new'));
        }

        $response = $this->redirect(
            $this->generateUrl(
                'troubleticket_bs_create',
                array('report_id' => $report->getId())
            )
        );

        return $response;
    }

    /**
     * Ação de criação e persistência do boletim de serviço
     *
     * @param HttpFoundation\Request $request
     * @param integer|null $report_id
     * @access public
     * @return mixed
     */
    public function createAction(HttpFoundation\Request $request, $report_id = null)
    {
        $permissions = $this->get('permissions');
        if (!$permissions->isAllowed('BS', 'create')) {
            $request->getSession()->getFlashBag()->add(
                'error',
                'Você não possui permissão para inserir Boletins de Serviço'
            );
            return $this->redirect($this->generateUrl('troubleticket_bs_stack'));
        }
        $report = $this->getBS($report_id);

        if (empty($report)) {
            $request->getSession()->getFlashBag()->add(
                'error',
                'BS não encontrado'
            );
            return $this->redirect($this->generateUrl('troubleticket_bs_stack'));
        }

        if ($report->getStatus() != $report::INATIVO ) {
            $url = $this->generateUrl('troubleticket_bs_main',array(
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
            return $this->redirect($this->generateUrl('troubleticket_bs_new'));
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
            return $this->redirect($this->generateUrl('troubleticket_bs_new'));
        }

        $client = $troubleticket_client_api_get->customer;

        $render_template = 'TroubleticketBundle:BS:add.html.twig';
        $render_template_data = array(
            'message_error' => null,
            'message_success' => null,
        );

         $form = $this->createFormBuilder()
            ->add('requester_name', 'text', array('constraints' => array(new Constraints\NotBlank())))
            ->add('requester_email', 'email', array('constraints' => array(new Constraints\NotBlank())))
            ->add('requester_phone', 'text', array('constraints' => array(new Constraints\NotBlank())))
            ->add('description', 'textarea', array('constraints' => array(new Constraints\NotBlank())))
            ->getForm();

        if ($request->isMethod('POST')) {
            $form->handleRequest($request);
            if ($form->isValid()) {
                $data = $form->getData();
                $report->setRequesterName($data['requester_name'])
                    ->setRequesterPhone($data['requester_phone'])
                    ->setRequesterEmail($data['requester_email'])
                    ->setDescription($data['description']);

                $service = new Service\Reports($this->getDoctrine(), $this->container);
                $service->open($report, 'BS iniciado');

                $request->getSession()->getFlashBag()->set('alert',null);
                return $this->redirect($this->generateUrl('troubleticket_bs_main', array('id' => $report->getId())));
            } else {
                $render_template_data['message_error'] = 'Alguns campos não foram preenchidos corretamente';
            }
        }

        $render_template_data['reports'] = $report;
        $render_template_data['api_circuit'] = $circuit;
        $render_template_data['api_client'] = $client;
        $render_template_data['form'] = $form->createView();

        $render = $this->render($render_template,$render_template_data);

        return $render;
    }

    /**
     * Gera relatório de BS
     *
     * @param HttpFoundation\Request $request
     * @access public
     * @return XLSResponse
     */
    public function reportAction(HttpFoundation\Request $request) {
        $permissions = $this->get('permissions');

        if (!$permissions->isAllowed('BS', 'export_report')) {
            $request->getSession()->getFlashBag()->add(
                'error',
                'Você não possui permissão para exportar relatorios de BS'
            );

            return $this->redirect($this->generateUrl('troubleticket_bs_stack'));
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
            $service_export = $service->BSReport(
                array(
                    'initial_date' => $request_date_init,
                    'final_date' => $request_date_end,
                    'client_name' => $request_client_name,
                    'final_client_name' => $request_client_name_final,
                    'client_uf' => $request_client_uf
                )
            );

        } catch (\Exception $error) {
            $request->getSession()->getFlashBag()->add(
                'error',
                'Ocorreu um erro ao tentar exportar o relatório de BS'
            );

            return $this->redirect($this->generateUrl('troubleticket_bs_stack'));
        }

        $table_head_list = array(
            'Código' => 'string',
            'Status' => 'string',
            'Responsável' => 'string',
            'Tempo decorrido' => 'string',
            'SLA' => 'string',
            'Solicitação' => 'string',
            'Comentário' => 'string',
            'Data de abertura' => 'string',
            'Hora de abertura' => 'string',
            'Data do fechamento' => 'string',
            'Hora do fechamento' => 'string',
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
            'Designação' => 'string',
            'POP' => 'string',
            'Fornecedor' => 'string',
        );

        $response = new XLSResponse('Relatorio-BS');
        $response->setHeaderColumns($table_head_list);
        $response->setBody($service_export);

        return $response;
    }
}
