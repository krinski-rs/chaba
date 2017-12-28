<?php
namespace TroubleticketBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Constraints\NotBlank;
use TroubleticketBundle\Exception\TroubleticketBundleException;
use Symfony\Component\HttpFoundation\JsonResponse;


use TroubleticketBundle\Service;
use TroubleticketBundle\Entity;
use Exception;

/**
 * Classe de controle de ação dos subcasos de boletins de anormalidade e incidente
 */
class SubcasesController extends Controller
{

  private function init()
  {
    if(!isset($_SESSION))
    {
      session_start();
      $toaParameter = $this->container->getParameter('troubleticket_toa');
      $_SESSION['usr_codigoid'] = $toaParameter['user_toa_id'] ;
    }

  }

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
     * fecha um subcaso
     *
     * @param Request $request
     * @param integer $subcaseId
     * @access public
     * @return mixed
     */
	public function closeAction(Request $request, $subcaseId)
	{
    $this->init();
		$form = $this->createFormBuilder(null, array('csrf_protection' => false))
		->add('comentario', 'text', array('constraints' => array(new NotBlank())))
		->getForm();

		$subcase = $this->getSubcase($subcaseId);
		$routeName = $subcase->getReportId()->getType() == Entity\Reports::TYPE_BA ? 'troubleticket_ba_subcase_main' : 'troubleticket_bi_subcase_main';

        if($request->isMethod('POST')){
            $form->handleRequest($request);
            if ($form->isValid()) {
                $post = $form->getData();

				if (empty($subcase)) {
					$request->getSession()
					->getFlashBag()
					->add("error", "Não foi possível encontrar o subcaso desejado.");

					$url = $this->generateUrl(
							"troubleticket_ba_stack"
							);

					return $this->redirect($url);
				}


				try
				{
					$stringPerm  = strtoupper($subcase->getTypeString());
					$permissao	 = "SUB_".$stringPerm;
					$permissions = $this->get('permissions');
					if (!$permissions->isAllowed($permissao, 'close')) {
						throw new TroubleticketBundleException(
								'Você não possui permissão para editar este tipo de subcaso!'
								);
					}

					if ($subcase->getStatus() == Entity\Subcases::FECHADO || $subcase->getStatus() == Entity\Subcases::PAUSADO) {
						throw new TroubleticketBundleException(
								'Não é possível fechar um subcaso com este status!'
								);
					}

					$service = new Service\Subcases($this->getDoctrine(), $this->container);
					$service->close($subcase, $subcase->getLastTimeCounter(), $post['comentario']);

					$request->getSession()
					->getFlashBag()
					->add("success", "Subcaso alterado com sucesso para status FECHADO!");

				} catch (TroubleticketBundleException $tte) {
					$request->getSession()->getFlashBag()->add(
							'error',
							$tte->getMessage()
							);

				}
			} else {
				$request->getSession()
				->getFlashBag()
				->add("error", "Não foi possível fechar o subcaso pois os dados não foram preenchidos de forma correta!");
			}
		}

		$url = $this->generateUrl(
				$routeName,
					array(
						'subcaseId' => $subcaseId
					)
				);

		return $this->redirect($url);
	}

    /**
     * Ação de criação de um subcaso relacionando a boletim
     *
     * @param Request $request
     * @param integer $report_id
     * @access public
     * @return mixed
     */
	public function createAction(Request $request,$report_id)
    {

        try {
            $repository = $this->getDoctrine()->getRepository('TroubleticketBundle:Reports', 'troubleticket');
            $report = $repository->findOneBy(array('id' => $report_id));

        } catch (Exception $error) {
            throw new TroubleticketBundleException("Dados inconsistentes para efetuar a solicitação");
        }

        $report_id = $report->getId();
        $report_type = $report->getType();

        $form = $this->createFormBuilder(null, array('csrf_protection' => false))
                     ->add('tipo_subcaso', 'integer', array('constraints' => array(new NotBlank())))
                     ->add('activity_type', 'integer', array('constraints' => array(new NotBlank())))
                     ->add('comentario', 'text', array('constraints' => array(new NotBlank())))
                     ->add('hidden_report_id', 'integer', array('constraints' => array(new NotBlank())));

        if ($report_type == Entity\Reports::TYPE_BA) {
            $form->add('materiais', 'text', array('constraints' => array(new NotBlank())));
        }

        $form = $form ->getForm();
        $post = $form->getData();

        if($request->isMethod('POST')){
            $form->handleRequest($request);

            if ($form->isValid()) {
                $post = $form->getData();
                $permissao = "";

                if ($post['tipo_subcaso'] == 1) {
                    $permissao = "SUB_COC";
                } else if ($post['tipo_subcaso'] == 2) {
                    $permissao = "SUB_MANTAINER";
                }

                $permissions = $this->get('permissions');
                if (!$permissions->isAllowed($permissao, 'create')) {
                    $request->getSession()->getFlashBag()->add(
                            'error',
                            'Você não possui permissão para inserir subcasos de '.$report->getTypeString().'!'
                            );

                    $url = $this->generateUrl(
                        "troubleticket_ba_main",
                            array(
                                'report_id' => $report_id
                            )
                        );

                    return $this->redirect($url);
                }

                try {
                    $service = new Service\Subcases($this->getDoctrine(), $this->container);

                    if(!in_array($post['activity_type'],array('01','02','03'))){
                        throw new TroubleticketBundleException('Tipo de Serviço é obrigatório');
                    }

                    if ($report->getStatus() != Entity\Reports::EM_ATENDIMENTO) {
                        throw new TroubleticketBundleException('Não é possível abrir subcasos de '.$report->getTypeString().' com status diferente de "Em Atendimento"!');
                    }

                    if (!$report->canOpenSubcase($post['tipo_subcaso'])) {
                        throw new TroubleticketBundleException('Já existe um subcaso do tipo selecionado relacionado a este '.$report->getTypeString().'!');
                    }

                    $dataArray = array(
                            'report_id' => $report_id,
                            'type'      => $post['tipo_subcaso'],
                            'comment'   => $post['comentario'],
                            'activity_type'   => $post['activity_type']
                    );


                    $dataArray['materials'] = ($report_type == Entity\Reports::TYPE_BA) ? $post['materiais'] : "";


                    $service->create($dataArray);

                    $request->getSession()
                    ->getFlashBag()
                    ->add("success", "Subcaso criado com sucesso!");

                    // pegando código do BA e cid para o envio de push notification
                    $troubleticket_circuit_api = $this->get('troubleticket.circuit_api');
                    $troubleticket_circuit_api->setUrlPath(vsprintf('circuito/%s',array($report->getCircuitId())));
                    $troubleticket_circuit_api_get = $troubleticket_circuit_api->get(1, 0, null, null,null);
                    $circuit = $troubleticket_circuit_api_get->circuito;

                    $this->sendPushAction(
                        $circuit->clieCodigoid,
                        'Abertura de subcaso COC',
                        'Uma equipe de campo está verificando o problema do '.$report->getCode().'.',
                        array('id' => $report_id)
                    );

                } catch (TroubleticketBundleException $tte){
                    $request->getSession()
                    ->getFlashBag()
                    ->add("error", $tte->getMessage());

                }

                if ($report_type == '1') {
                    $generate_url = 'troubleticket_ba_main';

                } else if ($report_type == '2') {
                    $generate_url = 'troubleticket_bi_main';
                }

                $url = $this->generateUrl(
                        $generate_url,
                            array(
                                'report_id' => $report_id
                            )
                        );

                return $this->redirect($url);

            } else {
                $request->getSession()
                        ->getFlashBag()
                        ->add("error", "Não foi possível criar o subcaso.");
            }
        }

        if ($report_type == '1') {
            $generate_url = 'troubleticket_ba_stack';

        } else if ($report_type == '2') {
            $generate_url = 'troubleticket_bi_stack';
        }

        $url = $this->generateUrl($generate_url);

        return $this->redirect($url);
    }

    /**
     * Generates a pdf containing the list of materials for a certain subcase
     *
     * @access public
     * @param $request Request
     * @param $subcaseId integer
     * @return Response
     */
    public function listOfMaterialsPrintAction(Request $request, $subcaseId)
    {
        $subcase = $this->getSubcase($subcaseId);

        if (empty($subcase)) {
            $request->getSession()
                    ->getFlashBag()
                    ->add("error", "Não foi possível encontrar o subcaso desejado.");

            throw new TroubleticketBundleException("Dados inconsistentes para efetuar a solicitação");
        }

        $stringPerm  = strtoupper($subcase->getTypeString());
        $permissao   = "SUB_".$stringPerm;
        $permissions = $this->get('permissions');
        if (!$permissions->isAllowed($permissao, 'read')) {
           $request->getSession()->getFlashBag()->add(
                'error',
                'Você não possui permissão para visualizar subcasos de '.$subcase->getReportId()->getTypeString().'!'
            );

            if ($subcase->getReportId()->getType() == 1) {
               $route = 'troubleticket_ba_main';
            } else if ($subcase->getReportId()->getType() == 2) {
               $route = 'troubleticket_bi_main';
            }

            $url = $this->generateUrl(
                    $route,
                        array(
                            'report_id' => $subcase->getReportId()->getId()
                        )
                    );

            return $this->redirect($url);
        }

        $reports = $subcase->getReportId();

        $reports_type = $reports->getType();

        if ($reports_type == '1') {
            $stackRedirect = 'troubleticket_ba_stack';
        } else if ($reports_type == '2') {
            $stackRedirect = 'troubleticket_bi_stack';
        }

        $troubleticket_circuit_api = $this->get('troubleticket.circuit_api');

        $troubleticket_circuit_api->setUrlPath(vsprintf('circuito/%s',array($subcase->getReportId()->getCircuitId())));

        try {
            $troubleticket_circuit_api_get = $troubleticket_circuit_api->get(1, 0, null, null,null);

        } catch (TroubleticketBundleException $error) {
            $request->getSession()->getFlashBag()->add(
                'error',
                'Não foi possível obter os dados do circuito!'
            );

            return $this->redirect($this->generateUrl($stackRedirect));

        }

        $circuit = $troubleticket_circuit_api_get->circuito;
        $attr = $troubleticket_circuit_api_get->atributos;

        $troubleticket_client_api = $this->get('troubleticket.client_api');
        $troubleticket_client_api->setUrlPath(vsprintf('cliente/%s',array($circuit->clieCodigoid)));

        try {
            $troubleticket_client_api_get = $troubleticket_client_api->get(50,0,null);

        } catch (TroubleticketBundleException $error) {
            $request->getSession()->getFlashBag()->add(
                'error',
                'Não foi possível obter os dados do cliente!'
            );

            return $this->redirect($this->generateUrl($stackRedirect));
        }

        $client = $troubleticket_client_api_get->customer;

        $arrayData = array(
            'subcase'=> $subcase,
            'attr_circuit' => $attr,
            'api_client' => $client,
            'api_circuit' => $circuit,
        );

        $html = $this->renderView('TroubleticketBundle:Subcaso:pdf.html.twig', $arrayData);
        $filename = sprintf('%s-LISTA-DE-MATERIAIS-%s.pdf', $subcase->getReportId()->getCode(), date('dmY-His'));

        return new Response(
            $this->get('knp_snappy.pdf')->getOutputFromHtml($html),
            200,
            array(
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => sprintf('attachment; filename="%s"', $filename),
            )
        );
    }

    /**
     * Monta a visualização do formulário de subcaso
     *
     * @param Request $request
     * @param integer $subcaseId
     * @access public
     * @return mixed
     */
    public function mainAction(Request $request, $subcaseId)
    {
        $subcase = $this->getSubcase($subcaseId);

        if (empty($subcase)) {
            $request->getSession()
                    ->getFlashBag()
                    ->add("error", "Não foi possível encontrar o subcaso desejado.");

            throw new TroubleticketBundleException("Dados inconsistentes para efetuar a solicitação");
        }

        $stringPerm  = strtoupper($subcase->getTypeString());
        $permissao   = "SUB_".$stringPerm;
        $permissions = $this->get('permissions');
        if (!$permissions->isAllowed($permissao, 'read')) {
           $request->getSession()->getFlashBag()->add(
                'error',
                'Você não possui permissão para visualizar subcasos de '.$subcase->getReportId()->getTypeString().'!'
            );

            if ($subcase->getReportId()->getType() == 1) {
               $route = 'troubleticket_ba_main';
            } else if ($subcase->getReportId()->getType() == 2) {
               $route = 'troubleticket_bi_main';
            }

            $url = $this->generateUrl(
                    $route,
                        array(
                            'report_id' => $subcase->getReportId()->getId()
                        )
                    );

            return $this->redirect($url);
         }

        $reports = $subcase->getReportId();

        $reports_type = $reports->getType();

        $time_counters_repository = $this->getDoctrine()->getRepository('TroubleticketBundle:TimeCounters', 'troubleticket');
        $time_counters = $time_counters_repository->findOneBy(
            array('report_id' => $reports->getId(),'final_date' => null),
            array('initial_date' => 'DESC'));

        $history_repository = $this->getDoctrine()->getRepository('TroubleticketBundle:History', 'troubleticket');

        $troubleticket_circuit_api = $this->get('troubleticket.circuit_api');

        $troubleticket_circuit_api->setUrlPath(vsprintf('circuito/%s',array($reports->getCircuitId())));

        if ($reports_type == '1') {
            $stackRedirect = 'troubleticket_ba_stack';
        } else if ($reports_type == '2') {
            $stackRedirect = 'troubleticket_bi_stack';
        }

        try {
            $troubleticket_circuit_api_get = $troubleticket_circuit_api->get(1, 0, null, null,null);

        } catch (TroubleticketBundleException $error) {
            $request->getSession()->getFlashBag()->add(
                'error',
                'Não foi possível obter os dados do circuito!'
            );

            return $this->redirect($this->generateUrl($stackRedirect));

        }

        $circuit = $troubleticket_circuit_api_get->circuito;

        $troubleticket_client_api = $this->get('troubleticket.client_api');
        $troubleticket_client_api->setUrlPath(vsprintf('cliente/%s',array($circuit->clieCodigoid)));

        try {
            $troubleticket_client_api_get = $troubleticket_client_api->get(50,0,null);

        } catch (TroubleticketBundleException $error) {
            $request->getSession()->getFlashBag()->add(
                'error',
                'Não foi possível obter os dados do cliente!'
            );

            return $this->redirect($this->generateUrl($stackRedirect));
        }

        $client = $troubleticket_client_api_get->customer;

        $history_last = $history_repository->findOneBy(
                                array('report_id' => $reports->getId()),
                                array('id' => 'DESC')
                        );

        $troubleticket_colaborador_api = $this->get('troubleticket.colaborador_api');

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

            return $this->redirect($this->generateUrl($stackRedirect));
        }

        $service = new Service\Reports($this->getDoctrine(), $this->container);
        $service->loadResponsibleData($reports);

        $subcaseService = new Service\Subcases($this->getDoctrine(), $this->container);

        $render_template = 'TroubleticketBundle:Subcaso:main.html.twig';
        $render_template_data = array(
            'message_error' => null,
            'message_success' => null,
            'subcases' => $subcase,
            'reports' => $reports,
            'time_counters' => $time_counters,
            'history_last' => $history_last,
            'api_circuit' => $circuit,
            'pause_reasons' => $subcaseService->getPauseReasons(),
            'teams' => $subcaseService->getTeams(),
            'api_client' => $client);

        $session = $request->getSession();

        $session_message_error = $session->getFlashBag()->get('message_error');
        $session_message_success = $session->getFlashBag()->get('message_success');

        if (!empty($session_message_success)) {
            $render_template_data['message_success'] = $session_message_success[0];
        }

        if (!empty($session_message_error)) {
            $render_template_data['message_error'] = $session_message_error[0];
        }

        return $this->render($render_template, $render_template_data);
    }


    /**
     * Ação para pausar um subcaso
     *
     * @param Request $request
     * @param integer $id
     * @access public
     * @return mixed
     */
    public function pauseAction(Request $request, $id)
    {
        $this->init();
        $subcase = $this->getSubcase($id);
        if (empty($subcase)) {
            $request->getSession()->getFlashBag()->add(
                'error',
                'Não foi possível encontrar o subcaso desejado.'
            );

            $url = $this->generateUrl('troubleticket_ba_stack');

            return $this->redirect($url);
        }

        $routeName = $subcase->getReportId()->getType() == Entity\Reports::TYPE_BA ? 'troubleticket_ba_subcase_main' : 'troubleticket_bi_subcase_main';

        if ($subcase->getType() == $subcase::TYPE_COC) {
            $resource = 'SUB_COC';
        } else {
            $resource = 'SUB_MANTAINER';
        }

        $permissions = $this->get('permissions');
        if (!$permissions->isAllowed($resource, 'pause')) {
            $request->getSession()->getFlashBag()->add(
                'error',
                'Você não possui permissão para pausar este subcaso!'
            );

            $url = $this->generateUrl(
                $routeName,
                array(
                    'subcaseId' => $id
                )
            );

            return $this->redirect($url);
        }

        $form = $this->createFormBuilder(null, array('csrf_protection' => false))
            ->add('reason', 'text', array('constraints' => array(new NotBlank())))
            ->add('comment', 'text')
            ->getForm();

        $form->handleRequest($request);
        if ($form->isValid()) {
            $subcaseService = new Service\Subcases($this->getDoctrine(), $this->container);
            $data = $form->getData();
            try {
                if ($subcaseService->pause($subcase, $data['reason'], $data['comment'])) {
                    $request->getSession()->getFlashBag()->add(
                        'success', 'Subcaso pausado com sucesso!'
                    );
                } else {
                    $request->getSession()->getFlashBag()->add(
                        'error', 'Este subcaso não pode ser pausado!'
                    );
                }

            } catch (Exception $e){
                $request->getSession()->getFlashBag()->add('error', $e->getMessage());
            }
        } else {
            $request->getSession()->getFlashBag()->add(
                'error',
                'Dados necessários para pausar o subcaso não foram preenchidos'
            );
        }
        $url = $this->generateUrl(
            $routeName,
            array(
                'subcaseId' => $id
            )
        );
        return $this->redirect($url);
    }

    /**
     * Ação para reiniciar um subcaso
     *
     * @param Request $request
     * @param integer $id
     * @access public
     * @return mixed
     */
    public function restartAction(Request $request, $id)
    {
        $subcase = $this->getSubcase($id);
        if (empty($subcase)) {
            $request->getSession()->getFlashBag()->add(
                'error',
                'Não foi possível encontrar o subcaso desejado.'
            );

            $url = $this->generateUrl('troubleticket_ba_stack');

            return $this->redirect($url);
        }

        $routeName = $subcase->getReportId()->getType() == Entity\Reports::TYPE_BA ? 'troubleticket_ba_subcase_main' : 'troubleticket_bi_subcase_main';

        if ($subcase->getType() == $subcase::TYPE_COC) {
            $resource = 'SUB_COC';
        } else {
            $resource = 'SUB_MANTAINER';
        }

        $permissions = $this->get('permissions');
        if (!$permissions->isAllowed($resource, 'restart')) {
            $request->getSession()->getFlashBag()->add(
                'error',
                'Você não possui permissão para reiniciar este subcaso!'
            );

            $url = $this->generateUrl(
                $routeName,
                array(
                    'subcaseId' => $id
                )
            );

            return $this->redirect($url);
        }

        $form = $this->createFormBuilder(null, array('csrf_protection' => false))
            ->add('comment', 'text', array('constraints' => array(new NotBlank())))
            ->getForm();

        $form->handleRequest($request);
        if ($form->isValid()) {
            $subcaseService = new Service\Subcases($this->getDoctrine(), $this->container);
            $data = $form->getData();
            try {
                if ($subcaseService->restart($subcase, $data['comment'])) {
                    $request->getSession()->getFlashBag()->add(
                        'success', 'Subcaso reiniciado com sucesso!'
                    );
                } else {
                    $request->getSession()->getFlashBag()->add(
                        'error', 'Este subcaso não pode ser reiniciado!'
                    );
                }

            } catch (Exception $e){
                $request->getSession()->getFlashBag()->add('error', $e->getMessage());
            }
        } else {
            $request->getSession()->getFlashBag()->add(
                'error',
                'Dados necessários para reiniciar o subcaso não foram preenchidos'
            );
        }
        $url = $this->generateUrl(
            $routeName,
            array(
                'subcaseId' => $id
            )
        );
        return $this->redirect($url);
    }

    /**
     * Ação para salvar a alteração de um subcaso
     *
     * @param Request $request
     * @param integer $id
     * @access public
     * @return mixed
     */
    public function updateAction(Request $request, $id)
    {
        $subcase = $this->getSubcase($id);
        if (empty($subcase)) {
            $request->getSession()->getFlashBag()->add(
                'error',
                'Não foi possível encontrar o subcaso desejado.'
            );

            $url = $this->generateUrl('troubleticket_ba_stack');

            return $this->redirect($url);
        }

        $routeName = $subcase->getReportId()->getType() == Entity\Reports::TYPE_BA ? 'troubleticket_ba_subcase_main' : 'troubleticket_bi_subcase_main';

        if ($subcase->getType() == $subcase::TYPE_COC) {
            $resource = 'SUB_COC';
        } else {
            $resource = 'SUB_MANTAINER';
        }

        $permissions = $this->get('permissions');
        if (!$permissions->isAllowed($resource, 'update')) {
            $request->getSession()->getFlashBag()->add(
                'error',
                'Você não possui permissão para atualizar este subcaso!'
            );

            $url = $this->generateUrl(
                $routeName,
                array(
                    'subcaseId' => $id
                )
            );

            return $this->redirect($url);
        }

        $form = $this->createFormBuilder(null, array('csrf_protection' => false))
            ->add('status', 'text', array('constraints' => array(new NotBlank())))
            ->add('forecast', 'text', array('constraints' => array(new NotBlank())))
            ->add('team', 'text', array('constraints' => array(new NotBlank())))
            ->add('comment', 'text', array('constraints' => array(new NotBlank())))
            ->getForm();

        $form->handleRequest($request);
        if ($form->isValid()) {
            $subcaseService = new Service\Subcases($this->getDoctrine(), $this->container);
            $data = $form->getData();
            try {
                if ($subcaseService->update($subcase, $data)) {
                    if($data['status'] == 3){
                        // pegando código do BA e cid para o envio de push notification
                        $repository = $this->getDoctrine()->getRepository('TroubleticketBundle:Reports', 'troubleticket');
                        $report = $repository->findOneBy(array('id' => $subcase->getReportId()));
                        $troubleticket_circuit_api = $this->get('troubleticket.circuit_api');
                        $troubleticket_circuit_api->setUrlPath(vsprintf('circuito/%s',array($report->getCircuitId())));
                        $troubleticket_circuit_api_get = $troubleticket_circuit_api->get(1, 0, null, null,null);
                        $circuit = $troubleticket_circuit_api_get->circuito;


                        $this->sendPushAction(
                            $circuit->clieCodigoid,
                            'Atualização do subcaso para Em Deslocamento',
                            'Uma equipe de campo está se deslocando para solucionar o problema do '.$report->getCode().'.',
                            array('id' => $subcase->getReportId()->getId())
                        );
                    }

                    $request->getSession()->getFlashBag()->add(
                        'success', 'Subcaso atualizado com sucesso!'
                    );
                } else {
                    $request->getSession()->getFlashBag()->add(
                        'error', 'Este subcaso não pode ser atualizado!'
                    );
                }

            } catch (Exception $e){
                $request->getSession()->getFlashBag()->add('error', $e->getMessage());
            }
        } else {
            $request->getSession()->getFlashBag()->add(
                'error',
                'Dados necessários para atualizar o subcaso não foram preenchidos'
            );
        }
        $url = $this->generateUrl(
            $routeName,
            array(
                'subcaseId' => $id
            )
        );
        return $this->redirect($url);
    }

    /**
     * Busca um subcaso pelo identificador
     *
     * @param integer $subcaseId
     * @access protected
     * @return Entity\Subcases
     */
	protected function getSubcase($subcaseId)
	{
		$repository = $this->getDoctrine()->getRepository('TroubleticketBundle:Subcases', 'troubleticket');
		return $repository->findOneBy(array('id' => $subcaseId));
    }
    /*
     * Método responsável por registrar o vinculo de tecnico a atividade TOA no TroubleTicket
     */
    public function vinculateUserToActivityAction(Request $request)
    {
        $this->init();
        $dados = json_decode($request->getContent(), true);
        $isValid = $this->verifyValueDate($dados);

        if(!$isValid instanceof JsonResponse) {
            $subcaseService = new Service\Subcases($this->getDoctrine(), $this->container);
            $data = $subcaseService->vinculateUserToActivity($dados);
            $response = new JsonResponse();
            if($data['status'] == 200)
            {
                $response->setData(array(
                        'status'  => 200,
                        'history' =>
                            array(
                                'id'            => $data['data']->getId(),
                                'comment'       => $data['data']->getComment(),
                                'date'          =>$data['data']->getDate(),
                                'techinician'   => $dados['resource_name'],
                                'subCaseCode'   => $data['data']->getReportId()->getCode()
                            )
                    )
                );

            }else{
                $response->setData($data);
            }
            $response->setStatusCode($data['status']);

            return $response;
        }else{
            return $isValid;
        }
    }
    /*
     * Método responsável por registrar o inicio da atividade TOA no TroubleTicket
     */
    public function startActivityAction(Request $request)
    {
        $this->init();
        $dados = json_decode($request->getContent(), true);
        $isValid = $this->verifyValueDate($dados);

    	if(!$isValid instanceof JsonResponse){
            $subcaseService = new Service\Subcases($this->getDoctrine(), $this->container);

            $data = $subcaseService->startActivity($dados);
            $response = new JsonResponse();
            if($data['status'] == 200)
            {
                $response->setData(array(
                        'status'  => 200,
                        'history' =>
                            array(
                                'id'            => $data['data']->getId(),
                                'comment'       => $data['data']->getComment(),
                                'date'          => $data['data']->getDate(),
                                'techinician'   => $dados['resource_name'],
                                'subCaseCode'   => $data['data']->getReportId()->getCode()
                            )
                    )
                );

            }else{
                $response->setData($data);
            }

            $response->setStatusCode(200);

            return $response;
        }else{
    	    return $isValid;
        }
    }
    
    /*
     * Método responsável por registrar o comentario da atividade TOA no TroubleTicket
     */
    public function commentActivityAction(Request $request)
    {
        $this->init();
        $dados = json_decode($request->getContent(), true);
        $isValid = $this->verifyValueDate($dados);
        
        if(!$isValid instanceof JsonResponse){
            $subcaseService = new Service\Subcases($this->getDoctrine(), $this->container);
            
            $data = $subcaseService->startActivity($dados);
            $response = new JsonResponse();
            if($data['status'] == 200)
            {
                $response->setData(array(
                    'status'  => 200,
                    'history' =>
                    array(
                        'id'            => $data['data']->getId(),
                        'comment'       => $data['data']->getComment(),
                        'date'          => $data['data']->getDate(),
                        'techinician'   => $dados['resource_name'],
                        'subCaseCode'   => $data['data']->getReportId()->getCode()
                    )
                )
                    );
                
            }else{
                $response->setData($data);
            }
            
            $response->setStatusCode(200);
            
            return $response;
        }else{
            return $isValid;
        }
    }
    
    /*
     * Método responsável por registrar a finalização da atividade TOA no TroubleTicket
     */
    public function finishActivityAction(Request $request)
    {

        $this->init();
        $dados = json_decode($request->getContent(), true);
        $isValid = $this->verifyValueDate($dados);

        if(!$isValid instanceof JsonResponse) {
            $subcaseService = new Service\Subcases($this->getDoctrine(), $this->container);
            $data = $subcaseService->finishActivity($dados);
            $response = new JsonResponse();
            if($data['status'] == 200)
            {
          
                $response->setData(array(
                        'status'  => 200,
                        'history' =>
                            array(
                                'id'            => $data['data']->getId(),
                                'comment'       => $data['data']->getComment(),
                                'date'          => $data['data']->getDate(),
                                'techinician'   => $dados['resource_name'],
                                'subCaseCode'   => $data['data']->getReportId()->getCode()
                            )
                    )
                );

            }else{

                $response->setData($data);
            }
            //$response->setData($data);
            $response->setStatusCode(200);

            return $response;
        }else{
            return $isValid;
        }
    }
    /*
     * Método responsável por registrar o cancelamento da atividade TOA no TroubleTicket
     */
    public function cancelActivityAction(Request $request)
    {
        $this->init();
        $dados = json_decode($request->getContent(), true);
        $subcaseService = new Service\Subcases($this->getDoctrine(), $this->container);
        $data = $subcaseService->cancelActivity($dados);
        $response = new JsonResponse();
        if($data['status'] == 200)
        {
            $response->setData(array(
                    'status'  => 200,
                    'history' =>
                        array(
                            'id'            => $data['data']->getId(),
                            'comment'       => $data['data']->getComment(),
                            'date'          => $data['data']->getDate(),
                            'techinician'   => $dados['resource_name'],
                            'subCaseCode'   => $data['data']->getReportId()->getCode()
                        )
                )
            );

        }else{
            $response->setData($data);
        }
        //$response->setData($data);
        $response->setStatusCode(200);

        return $response;
    }

    protected function verifyValueDate($data){

        if($data['idActivity'] != null && $data['idActivity'] != 0)
        {
            return true;
        }else{
            $response = new JsonResponse();
            $response->setStatusCode(200);
            $response->setData(array('status' => 400,'messages' => array('Deve ser informado um ID de atividade TOA válido.')));
            return $response;
        }

    }
    
    /**
     * Lista relatório de Subcase daily extract
     *
     * @param \Symfony\Component\HttpFoundation\Request $objRequest
     * @access public
     * @return Response
     */
    public function dailyAction($reportId, Request $objRequest) {
        try {
            $objSubcaseService = new Service\Subcases($this->getDoctrine(), $this->container);
            $arrayRetorno = $objSubcaseService->listDailyExtract($reportId);
            //             print_r($arrayRetorno);
            //             $render_template = 'TroubleticketBundle:Subcaso:daily_extract.html.twig';
            //             $render_template_data = array(
            //                 'message_error' => null,
            //                 'message_success' => null,
            //                 'subcases' => 1,
            //                 'reports' => 1,
            //                 'time_counters' => 1,
            //                 'history_last' => '',
            //                 'api_circuit' => array(),
            //                 'pause_reasons' => null,
            //                 'teams' => null,
            //                 'api_client' => 1000);
            //             $this->render($render_template,array());
            return new JsonResponse($arrayRetorno,200);
        } catch (\Exception $error) {
            $objRequest->getSession()->getFlashBag()->add(
                'error',
                'Ocorreu um erro ao tentar exportar o relatório de BS'
                );
            
            return $this->redirect($this->generateUrl('troubleticket_bs_stack'));
        }
    }
    
    /**
     * view daily extract
     *
     * @param \Symfony\Component\HttpFoundation\Request $objRequest
     * @access public
     * @return Response
     */
    public function viewReportAction($subcaseId, $type) {
        try {
            $objSubcaseService = new Service\Subcases($this->getDoctrine(), $this->container);
            return $objSubcaseService->viewReport($subcaseId, $type);
        } catch (\Exception $error) {
            throw $error;
        }
    }
    
}
