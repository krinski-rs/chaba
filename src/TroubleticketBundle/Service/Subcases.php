<?php
namespace TroubleticketBundle\Service;

use TroubleticketBundle\Entity;

use Doctrine\Bundle\DoctrineBundle\Registry;
use Symfony\Component\Yaml\Parser;
use TroubleticketBundle\Exception\TroubleticketBundleException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

/**
 * Serviço para realizar ações sobre os subcasos
 */
class Subcases
{

    /**
     * Registry doctrine
     *
     * @var mixed
     * @access protected
     */
    protected $doctrine;

    /**
     * container de serviços do symfony
     *
     * @var mixed
     * @access protected
     */
    protected $container;

    /**
     * Reports Constructor
     *
     * @param Registry $doctrine
     * @access public
     */
    public function __construct(Registry $doctrine, $container)
    {
        $this->doctrine = $doctrine;
        $this->container = $container;
    }

    /**
     * Get Doctrine
     *
     * @access public
     * @return Registry
     */
    public function getDoctrine()
    {
        return $this->doctrine;
    }

    /**
     * Close a subcase
     *
     * @param Entity\Subcases     $subcase
     * @param Entity\TimeCounters $lastTimeCounter
     * @param string              $comment
     * @access public
     * @return boolean
     */
    public function close(Entity\Subcases $subcase, Entity\TimeCounters $lastTimeCounter, $comment)
    {
        $dbManager = $this->getDoctrine()->getManager('troubleticket');
        $dbManager->getConnection()->beginTransaction();

        try {
            $currentDate = new \DateTime();

            $subcase->setStatus(Entity\Subcases::FECHADO);
            $lastTimeCounter->setFinalDate($currentDate);
            $report = $subcase->getReportId();

            $comment = sprintf("Subcaso código %s(%s) foi fechado.\n%s",
                                $subcase->getCode(),
                                $subcase->getTypeString(),
                                $comment);

            $this->createHistory($subcase, $comment, $currentDate);

            $dbManager->persist($subcase);
            $dbManager->flush();
            $dbManager->persist($lastTimeCounter);
            $dbManager->flush();

            $reportTimeCounter = $report->getLastTimeCounter(true);
            $reportTimeCounter->setFinalDate($currentDate);
            $dbManager->persist($reportTimeCounter);
            $dbManager->flush();

            $timeCounter = new Entity\TimeCounters();
            $timeCounter->setReport($report)
                ->setStack($report->getStack())
                ->setInitialDate($currentDate);
            $dbManager->persist($timeCounter);
            $dbManager->flush();

            $dbManager->getConnection()->commit();
        } catch (\Exception $e) {
            $dbManager->getConnection()->rollback();
            throw $e;
        }
    }
    
    public function doRequest($url, $method = 'GET', $params = array())
    {
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        switch (strtoupper($method)) {
            case 'GET':
                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
                break;
            case 'POST':
                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
                break;
        }
        $data_string = json_encode($params);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($data_string))
            );
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
        $content = curl_exec($curl);
        $statusCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);
        
        if (empty($statusCode)) {
            $statusCode = 500;
        }
        return new Response($content, $statusCode, array('Content-Type' => 'application/json'));
    }
    /**
     * Create a new subcase
     *
     * @param array $data
     * @access public
     * @return Entity\Subcases
     */
    public function create(array $data)
    {
        $dbManager = $this->getDoctrine()->getManager('troubleticket');
        $dbManager->getConnection()->beginTransaction();
        try {

            $subcase = new Entity\Subcases();
            $currentDate = new \DateTime();
            $reports_repository = $this->getDoctrine()->getRepository('TroubleticketBundle:Reports', 'troubleticket');
            $reports = $reports_repository->findOneBy(array('id' => $data['report_id']));
            $subcase->setReportId($reports)
                    ->setStatus($subcase::EM_ATENDIMENTO)
                    ->setType($data['type'])
                    ->setMaterials($data['materials'])
                  ->setActivityType($data['activity_type']);

            $subcaseCode = $reports->getCode().".".(count($reports->getSubcases())+1);
            $subcase->setCode($subcaseCode);

            $dbManager->persist($subcase);
            $dbManager->flush();
            
            if($data['type'] == 1){
                $data['currentDate'] = $currentDate;
                $data['typeString'] = $subcase->getTypeString();
                $data['creatorUser'] = $_SESSION['usr_codigoid'];
                $data['origin'] = \TroubleticketBundle\Entity\Subcases::SUBCASO_TT;
                $data['originId'] = $subcase->getId();

                $response = $this->openToaActivity($data,$reports);
                $content = json_decode($response->getContent(), true);

                if(($response->getStatusCode() != 201 && $response->getStatusCode() != 200) || !array_key_exists('activityId', $content) || !(integer)$content['activityId']){
                    $content = json_decode($response->getContent());
                    throw new TroubleticketBundleException('Não foi possível abrir o Subcaso, entre em contato com o administrador: '.$content->detail);
                }else{
                    $subcase->setIdActivity($content['activityId']);
                    $dbManager->merge($subcase);
                    $dbManager->flush();
                }
            }

            $this->createTimeCounter($subcase, $currentDate);

            $reportTimeCounter = $reports->getLastTimeCounter(true);
            $reportTimeCounter->setFinalDate($currentDate);

            $dbManager->persist($reportTimeCounter);
            $dbManager->flush();

            $timeCounter = new Entity\TimeCounters();
            $timeCounter->setReport($reports)
                ->setStack($reports::STACK_NONE)
                ->setInitialDate($currentDate);
            $dbManager->persist($timeCounter);
            $dbManager->flush();

            $comment = sprintf(
                "Subcaso %s (%s) criado.\n%s",
                $subcase->getCode(),
                $subcase->getTypeString(),
                $data['comment']
            );

            $this->createHistory($subcase, $comment, $currentDate);

            $dbManager->getConnection()->commit();
        } catch (TroubleticketBundleException $e) {
            $dbManager->getConnection()->rollback();
            throw $e;
        } catch (\Exception $e) {
            $dbManager->getConnection()->rollback();
            throw $e;
        }

        return $subcase;
    }

    public function openToaActivity($data,$reports)
    {

    	$troubleticket_circuit_api = $this->container->get('troubleticket.circuit_api');
    	$troubleticket_circuit_api->setUrlPath(vsprintf('circuito/%s',array($reports->getCircuitId())));

    	try{
    		$circuit = $troubleticket_circuit_api->get(1, 0, null, null,null);
    	}catch(\Exception $error){
    		throw new TroubleticketBundleException('Não foi possível obter dados do circuito: '.$error->getMessage());
    	}

    	$circuit = $circuit->circuito;
        $integracaoToaApi = $this->container->get('troubleticket.integracaotoa_api');
        $troubleTicketConfig = $this->container->getParameter('troubleticket_toa');
        $urlClient = $troubleTicketConfig['url_corp'].'clientes/'.$circuit->clieCodigoid.'?entidades=pessoa.admCidade.admUf';
        $client = $integracaoToaApi->getRegionalInfo($urlClient,null);
        $cliente = json_decode($client->getContent(),true);

    	if($cliente == null){
    	    throw new TroubleticketBundleException('Não foi possível obter informações do cliente.');
        }

		try{
			$integracaoToaApi = $this->container->get('troubleticket.integracaotoa_api');
			$troubleTicketConfig = $this->container->getParameter('troubleticket_toa');

            $url = $troubleTicketConfig['url_corp'].'clientes/'.$cliente['id'].'/contratos/'.$circuit->contPaiCodigoid.'/circuitos/'.$circuit->contCodigoid.'?entidades=regiao.regional,contrato.cliente';
			$regional = $integracaoToaApi->getRegionalInfo($url,null);

			$regiao = json_decode($regional->getContent(),true);

            if(isset($regiao['regiao']['regional']['nome'])) {
                $data['resourceId']     = $regiao['regiao']['regional']['nome'];
                $data['customerName']   = $cliente['pessoa']['razaoSocial'];
                $data['streetAddress']  = preg_replace("/^\d+-::-/","",$circuit->endeentrLogradouro).', '.$circuit->endeentrNumero;
                $data['x_bairro']       = $circuit->endeentrBairro;
                $data['postalCode']     = $circuit->endeentrCep;
                $data['city']           = $circuit->nomeCidade;
                $data['stateProvince']  = $circuit->siglaUf;
                $data['cell']           = $reports->getRequesterPhone();
                $data['email']          = $reports->getRequesterEmail();
                $data['apptNumber']     = $reports->getCode();
                $data['nomeServico']    = $circuit->servNome;
                $data['nomeCircuito']   = $circuit->designador;
                $data['velocidade']     = $circuit->velocidade;
                $data['x_tipo_servico'] = (string) "0".$data['activity_type'];
                $data['country_code'] = 'BR';
                $data['language'] = 'br';

                $objResponse = $this->doRequest($troubleTicketConfig['toa_api'], 'POST', $data);
                if(($objResponse instanceof Response) && ($objResponse->getStatusCode() == 200)){
                    return $objResponse;
                }else{
                    throw new TroubleticketBundleException('Não foi possível abrir o SubCaso.');
                }
            }else{
                throw new TroubleticketBundleException('Não foi possível obter os dados da Regional para o cliente.');
            }
		}catch(\Exception $ex){
			throw new TroubleticketBundleException($ex->getMessage());
		}
    }

    public function prepareDataToa($request)
    {
    	$slaEnd    = $request['currentDate'];
    	$dateStart = $request['currentDate']->format('Y-m-d H:i:s');
    	$slaEnd    = $slaEnd->format('Y-m-d H:i:s');
        $request['resourceId'] = $this->validateRegional($request['resourceId']);

    	$data = array(
		    			'resourceId'		    => $request['resourceId'],//"SP" Dado Fixo, pois o serviço de consulta de regionais não está
		    			'date' 				    => $request['currentDate']->format('Y-m-d'),
    					'slaWindowStart' 	    => $dateStart,
    					'slaWindowEnd' 		    => $slaEnd,
		    			'activityType'  	    => 'SubCase',
		    			'apptNumber' 		    => $request['apptNumber'],
                        'customerName'		    => $request['customerName'],
    					'streetAddress'         => $request['streetAddress'],
                        'x_bairro'              => $request['x_bairro'],
    					'postalCode'            => $request['postalCode'],
    					'city'                  => $request['city'],
    					'stateProvince'         => $request['stateProvince'],
                        'country_code'          => 'BR',
                        'customerCell'          => $request['cell'],
                        'customerEmail' 	    => $request['email'],
		    			'duration' 			    => 	240,
		    			'language' 			    => 'br',
		    			'timeZone' 			    => 'America/Sao_Paulo',
                        'x_tipo_servico'        => (string)$request['x_tipo_servico'],
                        'x_comentario_noc'      => "Observações: ".$request['comment'].
                                                   "\n\r Materiais: ".$request['materials'].
                                                   "\n\r Serviço: ".$request['nomeServico'].
                                                   "\n\r Circuito: ".$request['nomeCircuito'].
                                                   "\n\r Velocidade: ".$request['velocidade']
    				);

    	$integracaoToaApi = $this->container->get('troubleticket.integracaotoa_api');
    	$troubleTicketConfig = $this->container->getParameter('troubleticket_toa');
    	$integracaoToaApi->setUrlBase($troubleTicketConfig['url']);

    	try{
    		$return =  $integracaoToaApi->createActivity($data);
    		$this->setSuccessResponse(200,$return);
    	}catch(\Exception $ex){
    	    $return =  $this->setErrorResponse(404,'Não foi possível criar a atividade '.$ex->getMessage());
    	}

    	return $return;
    }

    /**
     * Obtem um subcaso de um determinado tipo para um determinado boletim
     *
     * @param int $subcaseType
     * @param int $report_id
     * @access public
     * @return Entity\Subcases | null
     */
    public function getSubcasesOfType($subcaseType, $report_id = null)
    {

        try{
            $subcases_repository = $this->getDoctrine()->getRepository('TroubleticketBundle:Subcases', 'troubleticket');

            if($report_id){
                $query_builder = $subcases_repository->createQueryBuilder('s')
                                                 ->where('s.type = :type')
                                                 ->andWhere('s.report_id = :report ')
                                                 ->setParameter('type', $subcaseType)
                                                 ->setParameter('report', $report_id)
                                                 ->getQuery();
            }else{
                $query_builder = $subcases_repository->createQueryBuilder('s')
                                                ->where('s.type = :type')
                                                ->setParameter('type', $subcaseType)
                                                ->getQuery();
            }

            $subcases = $query_builder->getResult();
        } catch (\Exception $e) {
            throw $e;
        }

        return $subcases;
    }

    /**
     * Create a Time Counter
     *
     * @param Entity\Subcases $subcase
     * @param \DateTime $date
     * @access protected
     * @return Entity\TimeCounters
     */
    protected function createTimeCounter($subcase, $date = null)
    {
        if (is_null($date)) {
            $date = new \DateTime();
        }

        $manager = $this->getDoctrine()->getManager('troubleticket');
        $time = new Entity\TimeCounters();
        $time->setReport($subcase->getReportId())
             ->setInitialDate($date)
             ->setSubcase($subcase)
             ->setSubcaseStatus($subcase->getStatus())
             ->setStack(-1);

        $manager->persist($time);
        $manager->flush();

        return $time;
    }

    /**
     * Cria o histórico para o subcaso
     *
     * @param Entity\Subcases $subcase
     * @param string $comment
     * @param \DateTime $date
     * @param string $reason
     * @access protected
     * @return Entity\History
     */
    protected function createHistory($subcase, $comment, $date = null, $reason = null)
    {
        if (is_null($date)) {
            $date = new \DateTime();
        }

        $report = $subcase->getReportId();

        $manager = $this->getDoctrine()->getManager('troubleticket');
        $history = new Entity\History();
        $history->setSubcaseId($subcase->getId())
                ->setReportId($report)
                ->setDate($date)
                ->setComment($comment)
                ->setReportStatus($report->getStatus())
                ->setUsuario($_SESSION['usr_codigoid']);

        if ($report->getType() == $report::TYPE_BI) {
            $children = $report->getChildren();

            $service = new Reports($this->getDoctrine(), $this->container);
            foreach ($children as $child) {
                $service->createHistory($child, "Ação realizada pelo ({$report->getCode()}) associado: $comment");
            }
        }

        if (!empty($reason)) {
            $history->setReason($reason);
        }

        $manager->persist($history);
        $manager->flush();

        return $history;
    }

    /**
     * Obtem os motivos de pausa do subcaso
     *
     * @access public
     * @return array
     */
    public function getPauseReasons()
    {
        $file = __DIR__ . '/../Resources/config/Subcase/pause_reasons.yaml';
        $parser = new Parser();
        $data = $parser->parse(file_get_contents($file));
        return $data['Motivo'];
    }

    /**
     * Get Teams
     *
     * @access public
     * @return array
     */
    public function getTeams()
    {
        $file = __DIR__ . '/../Resources/config/Subcase/teams.yaml';
        $parser = new Parser();
        $data = $parser->parse(file_get_contents($file));
        return $data['Equipes'];
    }


    /**
     * Pause a subcase
     *
     * @param Entity\Subcases $subcase
     * @param string $reason
     * @param string $comment
     * @access public
     * @return Entity\Subcases | false on failure
     */
    public function pause(Entity\Subcases $subcase, $reason, $comment)
    {
        if (in_array($subcase->getStatus(), array($subcase::PAUSADO, $subcase::FECHADO))) {
            return false;
        }

        $manager = $this->getDoctrine()->getManager('troubleticket');
        $manager->getConnection()->beginTransaction();
        try {
            $subcase->setStatus($subcase::PAUSADO);
            $manager->persist($subcase);
            $manager->flush();

            $date = new \DateTime();

            $this->closeLastTimeCounter($subcase, $date);

            $this->createTimeCounter($subcase, $date);

            $comment = sprintf(
                "Subcaso %s (%s) pausado.\n%s",
                $subcase->getCode(),
                $subcase->getTypeString(),
                $comment
            );

            $this->createHistory($subcase, $comment, $date, $reason);

            $this->pauseReport($subcase);
            $manager->getConnection()->commit();
        } catch (\Exception $e) {
            $manager->getConnection()->rollback();
            throw $e;
        }

        return $subcase;
    }

    /**
     * Reinicia um subcaso
     *
     * @param Entity\Subcases $subcase
     * @param string $comment
     * @access public
     * @return Entity\Subcases | false
     */
    public function restart(Entity\Subcases $subcase, $comment)
    {
        if ($subcase->getStatus() != $subcase::PAUSADO) {
            return false;
        }

        $manager = $this->getDoctrine()->getManager('troubleticket');
        $manager->getConnection()->beginTransaction();
        try {
            $subcase->setStatus($subcase::EM_ATENDIMENTO);
            $manager->persist($subcase);
            $manager->flush();

            $date = new \DateTime();

            $this->closeLastTimeCounter($subcase, $date);

            $this->createTimeCounter($subcase, $date);

            $comment = sprintf(
                "Subcaso %s (%s) reiniciado.\n%s",
                $subcase->getCode(),
                $subcase->getTypeString(),
                $comment
            );

            $this->createHistory($subcase, $comment, $date);

            $this->restartReport($subcase);

            $history =  $this->getDoctrine()->getRepository('TroubleticketBundle:History')->findBy(array('subcase_id'=>$subcase->getId()));
            $dataDecorte = new \DateTime('2017-08-28');

            if($subcase->getType() == 1 and $history[0]->getDate()->getTimestamp() > $dataDecorte->getTimestamp()){

                $data = array();
                $reports_repository = $this->getDoctrine()->getRepository('TroubleticketBundle:Reports', 'troubleticket');
                $reports = $reports_repository->findOneBy(array('id' => $subcase->getReportId()));
                $data['currentDate'] = $date;
                $data['comment'] = $comment;
                $data['activity_type'] = $subcase->getActivityType();
                $data['materials'] = $subcase->getMaterials();
                $data['type'] = $subcase->getType();
                $data['report_id'] = $reports->getId();
                $data['origin'] = \TroubleticketBundle\Entity\Subcases::SUBCASO_TT;
                $data['originId'] = $subcase->getId();
                $data['typeString'] = $subcase->getTypeString();
                $data['creatorUser'] = $_SESSION['usr_codigoid'];
                
                $response = $this->openToaActivity($data,$reports);
                $content = json_decode($response->getContent(), true);
                
                if(($response->getStatusCode() != 201 && $response->getStatusCode() != 200)  || !array_key_exists('activityId', $content) || !(integer)$content['activityId']){
                    $content = json_decode($response->getContent());
                    throw new TroubleticketBundleException('Não foi possível abrir o Subcaso, entre em contato com o administrador: '.$content->detail);
                }else{
                    $subcase->setIdActivity($content['activityId']);
                }
                $manager->merge($subcase);
                $manager->flush();
            }

            $manager->getConnection()->commit();
        } catch (\Exception $e) {
            $manager->getConnection()->rollback();
            throw $e;
        }

        return $subcase;
    }

    /**
     * Reinicia um boletim se não houverem subcasos ainda pausados
     *
     * @param Entity\Subcases $subcase
     * @access protected
     * @return null
     */
    protected function restartReport($subcase)
    {
        $report = $subcase->getReportId();
        if ($report->getStatus() == $report::PAUSADO) {
            $service = new Reports($this->getDoctrine(), $this->container);
            $report->setFakeStack($report::STACK_NONE);
            $service->restart(
                $report,
                $report->getLastTimeCounter(true),
                'Reiniciado através do Subcaso (' . $subcase->getTypeString() . ')'
            );
        }

        return $this;
    }

    /**
     * Pause a Report only if report has no opened subcases
     *
     * @param mixed $subcase
     * @access protected
     * @return null
     */
    protected function pauseReport($subcase)
    {
        $type = $subcase->getType() == $subcase::TYPE_COC ? $subcase::TYPE_MANTAINER : $subcase::TYPE_COC;
        $report = $subcase->getReportId();
        $otherSubcase = $report->getSubcaseByType($type);
        if (
            $subcase->getStatus() != $subcase::EM_ATENDIMENTO &&
            (
                !$otherSubcase->getId() ||
                $otherSubcase->getStatus() != $subcase::EM_ATENDIMENTO
            )
        ) {
            $service = new Reports($this->getDoctrine(), $this->container);
            $report->setFakeStack($report::STACK_NONE);
            $service->pause(
                $report,
                $report->getLastTimeCounter(true),
                'Pausado através do Subcaso ('. $subcase->getTypeString() . ')'
            );
        }

        return $this;
    }

    /**
     * Close Last TimeCounter of Subcase
     *
     * @param Entity\Subcases $subcase Subcase
     * @param \DateTime $date           Close date (optional)
     * @access protected
     * @return Entity\TimeCounters
     */
    protected function closeLastTimeCounter(Entity\Subcases $subcase, $date = null)
    {
        $timeCounters = $subcase->getTimeCounters();
        $lastTime = null;
        foreach ($timeCounters as $timeCounter) {
            if (is_null($timeCounter->getFinalDate())) {
                $lastTime = $timeCounter;
                break;
            }
        }
        if (!$lastTime) {
            throw new \Exception('Subcaso inconsistente!');
        }

        if (is_null($date)) {
            $date = new \DateTime();
        }
        $lastTime->setFinalDate($date);

        $manager = $this->getDoctrine()->getManager('troubleticket');
        $manager->persist($lastTime);
        $manager->flush();

        return $lastTime;
    }

    /**
     * Atualiza um subcaso
     *
     * @param Entity\Subcases $subcase
     * @param mixed $data
     * @access public
     * @return Entity\Subcases | false
     */
    public function update(Entity\Subcases $subcase, $data)
    {
        if (in_array($subcase->getStatus(), array($subcase::PAUSADO, $subcase::FECHADO))) {
            return false;
        }

        $manager = $this->getDoctrine()->getManager('troubleticket');
        $manager->getConnection()->beginTransaction();
        try {
            $lastStatus = $subcase->getStatus();

            $subcase->setStatus($data['status'])
                ->setForecast(new \DateTime($data['forecast']))
                ->setTeam($data['team']);

            $manager->persist($subcase);
            $manager->flush();

            $date = new \DateTime();

            if ($lastStatus != $data['status']) {

                $this->closeLastTimeCounter($subcase, $date);

                $this->createTimeCounter($subcase, $date);
            }

            $this->createHistory(
                $subcase,
                sprintf(
                    "Atualização do Subcaso %s (%s).\n%s",
                    $subcase->getCode(),
                    $subcase->getTypeString(),
                    $data['comment']
                ),
                $date
            );

            $manager->getConnection()->commit();
        } catch (\Exception $e) {
            $manager->getConnection()->rollback();
            throw $e;
        }

        return $subcase;
    }

    protected function setSuccessResponse($code,$data){

        return array(
            'status' => $code,
            'data' => $data
        );

    }

    protected function setErrorResponse($code,$messages){

        return array(
            'status' => $code,
            'messages' => array(
                $messages
            )
        );

    }

    public function vinculateUserToActivity($params)
    {
        $response = null;
    	try{

    	    $dbManager = $this->getDoctrine()->getManager('troubleticket');
    		$subCase = $dbManager->getRepository('\TroubleticketBundle\Entity\Subcases')->findOneBy(array('id_activity' => $params['idActivity']));

    		if($subCase != null){
    		    $date = new \DateTime();
                $troubleTicketConfig = $this->container->getParameter('troubleticket_toa');
                $_SESSION['usr_codigoid'] = $troubleTicketConfig['user_toa_id'];
                $history =  $this->createHistory(
                                                $subCase,
                                                sprintf(
                                                    "Código SubCaso (%s). Atividade TOA ID %s  vinculada ao usuário %s. ".$params['comment'],
                                                    $subCase->getCode(),
                                                    $subCase->getIdActivity(),
                                                    $params['resource_name']
                                                ),
                                                $date
                                            );
                unset($_SESSION['usr_codigoid']);
                $response = $this->setSuccessResponse(200,$history);
            }else{
                $response = $this->setErrorResponse(400,'Não foi encontrado nenhum SubCaso vinculado a atividade: '.$params['idActivity']);
            }


    	}catch(TroubleticketBundleException $ex){
            $response = $this->setErrorResponse(400,$ex->getMessage());
    	}

    	return $response;
    }

    public function startActivity($params)
    {
        $history = null;
        $response = null;
    	try{
    		$dbManager = $this->getDoctrine()->getManager('troubleticket');
    		$subCase = $dbManager->getRepository('TroubleticketBundle\Entity\Subcases')->findOneBy(array('id_activity' => $params['idActivity']));
    		if($subCase != null)
            {
                $date = new \DateTime();
                $troubleTicketConfig = $this->container->getParameter('troubleticket_toa');
                $_SESSION['usr_codigoid'] = $troubleTicketConfig['user_toa_id'];
                $history = $this->createHistory(
                                                $subCase,
                                                sprintf(
                                                "Código SubCaso (%s). Atividade TOA ID %s  iniciada. ".$params['comment'],
                                                        $subCase->getCode(),
                                                        $subCase->getIdActivity(),
                                                        $params['resource_name']
                                                        ),
                                                $date
                                                );
                unset($_SESSION['usr_codigoid']);
                $response = $this->setSuccessResponse(200,$history);
            }else{
                $response = $this->setErrorResponse(400,'Atividade TOA código '.$params['idActivity'].' não vinculada a nenhum Subcaso.');
            }

    	}catch(TroubleticketBundleException $ex){
            $response = $this->setErrorResponse(200,$ex->getMessage());
    	}

        return $response;
    }
    
    public function commentActivity($params)
    {
        $history = null;
        $response = null;
        try{
            $dbManager = $this->getDoctrine()->getManager('troubleticket');
            $subCase = $dbManager->getRepository('TroubleticketBundle\Entity\Subcases')->findOneBy(array('id_activity' => $params['idActivity']));
            if($subCase != null)
            {
                $date = new \DateTime();
                $troubleTicketConfig = $this->container->getParameter('troubleticket_toa');
                $_SESSION['usr_codigoid'] = $troubleTicketConfig['user_toa_id'];
                $history = $this->createHistory(
                    $subCase,
                    sprintf(
                        "Código SubCaso (%s). Atividade TOA ID %s Comentario:. ".$params['comment'],
                        $subCase->getCode(),
                        $subCase->getIdActivity(),
                        $params['resource_name']
                        ),
                    $date
                    );
                unset($_SESSION['usr_codigoid']);
                $response = $this->setSuccessResponse(200,$history);
            }else{
                $response = $this->setErrorResponse(400,'Atividade TOA código '.$params['idActivity'].' não vinculada a nenhum Subcaso.');
            }
            
        }catch(TroubleticketBundleException $ex){
            $response = $this->setErrorResponse(200,$ex->getMessage());
        }
        
        return $response;
    }
    
    public function finishActivity($params)
    {
        $response = null;
    	try{
    		$dbManager = $this->getDoctrine()->getManager('troubleticket');
            $subCase = $dbManager->getRepository('TroubleticketBundle\Entity\Subcases')->findOneBy(array('id_activity' => $params['idActivity']));
          if ($subCase instanceof Entity\Subcases);
            if($subCase != null && $subCase->getStatus() != 2){
                try{
                    $timeCounter = $dbManager->getRepository('TroubleticketBundle\Entity\TimeCounters')->findOneBy(array('subcase_id' => $subCase->getId(), 'final_date' => null));
                    //Verificar qual o nome do campo com os comentários no fechamento da atividade
                    $this->close($subCase, $timeCounter, $params['comment']);

                    $date = new \DateTime();
                    $troubleTicketConfig = $this->container->getParameter('troubleticket_toa');
                    $_SESSION['usr_codigoid'] = $troubleTicketConfig['user_toa_id'];
                    $history = $this->createHistory(
                                                    $subCase,
                                                    sprintf(
                                                    "Código SubCaso %s. Atividade TOA ID %s ambos foram finalizados. ".$params['comment'],
                                                            $subCase->getCode(),
                                                            $subCase->getIdActivity(),
                                                            $params['resource_name']
                                                            ),
                                                    $date
                                                    );
                    unset($_SESSION['usr_codigoid']);
                    $response = $this->setSuccessResponse(200,$history);
                }catch(TroubleticketBundleException $ex){
                    $response = $this->setErrorResponse(400,$ex->getMessage());
                }

            }else{
                $response = $this->setErrorResponse(400,'Não foi encontrado nenhum SubCaso aberto vinculado a atividade: '.$params['idActivity']);
            }
    	}catch(TroubleticketBundleException $ex){
            $response = $this->setErrorResponse(400,$ex->getMessage());
    	}

    	return $response;
    }

    public function cancelActivity($params)
    {
        $response = null;
        $history = null;
    	try{
    		$dbManager = $this->getDoctrine()->getManager('troubleticket');
            $subCase = $dbManager->getRepository('TroubleticketBundle\Entity\Subcases')->findOneBy(array('id_activity' => $params['idActivity']));

            if($subCase != null){
                $subCase->setIdActivity(null);
                $dbManager->persist($subCase);
                $dbManager->flush();

                $date = new \DateTime();
                $troubleTicketConfig = $this->container->getParameter('troubleticket_toa');
                $_SESSION['usr_codigoid'] = $troubleTicketConfig['user_toa_id'];
                $history = $this->createHistory(
                    $subCase,
                    sprintf(
                        "Código SubCaso (%s). Atividade TOA ID %s cancelada. ".$params['comment'],
                        $subCase->getIdActivity(),
                        $subCase->getCode(),
                        $params['resource_name']
                    ),
                    $date
                );

                $response = $this->setSuccessResponse(200,$history);
            }else{
                $response = $this->setErrorResponse(400,'Não foi encontrado nenhum SubCaso vinculado a atividade: '.$params['idActivity']);
            }
        }catch(TroubleticketBundleException $ex){
            $response = $this->setErrorResponse(400,$ex->getMessage());
        }

        return $response;
    }

    protected function validateRegional($regional){
        switch($regional){
            case "PR":
            case "SC":
            case "RS":
            case "Sul":
                return "Sul";
            break;
            case "MG":
                return "MG";
                break;
            case "DF":
            case "SP":
                return "SP";
                break;
            case "CE":
            case "RN":
            case "PB":
            case "PE":
            case "AL":
            case "SE":
            case "BA":
            case "RJ":
                return "RJ";
            break;
        }
    }
    
    public function listDailyExtract($reportId){
        try {
            $arrayRetorno = array();
            $dbManager = $this->getDoctrine()->getManager('troubleticket');
            $objReports = $dbManager->getRepository('TroubleticketBundle\Entity\Reports')->find($reportId);
            $parameterTOA = $this->container->getParameter('toa');
            if($objReports instanceof Reports){
                $arraySubcases = $objReports->getSubcases();
                if($arraySubcases->count()){
                    $arraySubcases->first();
                    while($objSubcases = $arraySubcases->current()){
                        if(!is_dir($parameterTOA['daily_extract_path'].'/'.$objSubcases->getId())){
                            mkdir($parameterTOA['daily_extract_path'].'/'.$objSubcases->getId(), 0777, true);
                        }
                        
                        if(is_dir($parameterTOA['daily_extract_path'].'/'.$objSubcases->getId())){
                            $files = array_diff( scandir($parameterTOA['daily_extract_path'].'/'.$objSubcases->getId()), array(".", "..") );
//                             $files = scandir($parameterTOA['daily_extract_path'].'/'.$objSubcases->getId());
                            if(count($files)){
                                $arrayFileSubCase = array('code'=>$objSubcases->getCode(), 'files'=>array());
                                $arrayFileSubCase[$objSubcases->getCode()] = array();
                                reset($files);
                                while($file = current($files)){
                                    $arrayFileSubCase['files'][] = array('nome'=>end(explode(DIRECTORY_SEPARATOR, $file)).'gfgf', 'subcase'=>$objSubcases->getId());
                                    next($files);
                                }
                                $arrayRetorno[] = $arrayFileSubCase;
                            }
                        }
                        $arraySubcases->next();
                    }
                }
            }
            return $arrayRetorno;
        } catch (\Exception $e) {
            throw $e;
        }
    }
    
    public function viewReport($subcaseId, $type)
    {
        try {
            $parameterTOA = $this->container->getParameter('toa');
            $file = $parameterTOA['daily_extract_path'].'/'.$subcaseId.'/'.$type;
            if(file_exists($file))
                return new BinaryFileResponse($file);
            else
                return new Response("Arquivo não encontrado", 200);
        } catch (\Exception $e) {
            throw $e;
        }
        
    }
}
