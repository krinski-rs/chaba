<?php

namespace TroubleticketBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\HttpFoundation\Cookie;

use TroubleticketBundle\Exception\TroubleticketBundleException;

use TroubleticketBundle\Service;
use TroubleticketBundle\Entity;

class APIController extends Controller
{
    protected $intention = 'login';

    /**
     * Loga um usuário na API para poder consumir dados
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function loginAction(Request $request)
    {
        $csrf = $this->get('form.csrf_provider');
        $entityStech = $this->getDoctrine()->getManager('default');
        $password = $request->get('password');
        $so = $request->get('so');
        $deviceid = $request->get('deviceid');
        $token = $request->cookies->get('token');
        $session = $this->get('session');
        $jsonResponse = new JsonResponse();

        try {
            $session->start();
            $session->invalidate();

            $cid = preg_replace('/\D/','',$request->get('cid'));
            $customer = null;
            if (!$this->validaCPF($cid) && !$this->validaCnpj($cid)) {
                $objCustomers2users = $entityStech->getRepository('ServicosGcdbBundle:Customers2users')->findOneBy(
                    array(
                        'idCustomers' => $cid
                    )
                );

                if(!$objCustomers2users instanceof \Servicos\GcdbBundle\Entity\Customers2users){
                    throw new AuthenticationException('Usuário não encontrado.',403);
                }

                $objCadUsers = $entityStech->getRepository('ServicosGcdbBundle:CadUsers')->loadUserByUsername($objCustomers2users->getIdUsers()->getId());

                $customer = $objCustomers2users->getIdCustomers();
            } else {
                $objCadUsers = $entityStech->getRepository('ServicosGcdbBundle:CadUsers')->loadUserByUsername($cid);

                $objCustomers2users = $entityStech->getRepository('ServicosGcdbBundle:Customers2users')->findOneBy(
                    array(
                        'idUsers' => $objCadUsers->getId()
                    )
                );

                $customer = $objCustomers2users->getIdCustomers();
            }

            if(trim($objCadUsers->getSenha()) !== trim($password)){
                throw new AuthenticationException('Usuário ou senha inválidos.',403);
            }

            if (!in_array($so, array('A', 'I', 'W'))) {
                throw new AuthenticationException('SO inválido.',422);
            }

            $token = $csrf->generateCsrfToken($this->intention);
            $device = $entityStech->getRepository('ServicosGcdbBundle:Devices')->findOneByDeviceID($deviceid);

            if (!$device) {
                $device = new \Servicos\GcdbBundle\Entity\Devices();
                $device->setDeviceID($deviceid);
            }
            $device->setToken($token);
            $device->setSo($so);
            $device->setCustomer($customer);
            $device->setActive(true);

            $entityStech->persist($device);
            $entityStech->flush();

            $session->set('customerId', $customer->getCustomerid());
            $session->set('cadUserId', $objCadUsers->getId());

            $jsonResponse->headers->setCookie(new Cookie('session_cookie', $token));
            $jsonResponse->setData(array(
                'message' => 'Usuário logado com sucesso',
                'name' => $objCadUsers->getFullName()
            ));
        } catch (AuthenticationException $ae) {
            $jsonResponse->setData(array(
                'message' => $ae->getMessage()
            ));
            $jsonResponse->setStatusCode(403);
        } catch (\Exception $e) {
            $jsonResponse->setData(array(
                'message' => 'Falha na autenticação'
            ));
            $jsonResponse->setStatusCode(403);
        }

        return $jsonResponse;
    }

    /**
     * Valida se o usuário está logado
     *
     * @param string $token
     * @return boolean
     */
    private function isLogged($token)
    {
        $entityStech = $this->getDoctrine()->getManager('default');
        $device = $entityStech->getRepository('ServicosGcdbBundle:Devices')->findOneBy(array('token' => $token, 'active' => true));
        $session = $this->get('session');

        try {
            if(!$device instanceof \Servicos\GcdbBundle\Entity\Devices){
                throw new AuthenticationException('Usuário não encontrado.',403);
            }

            $objCustomers2users = $entityStech->getRepository('ServicosGcdbBundle:Customers2users')->findOneBy(
                array(
                    'idCustomers' => $device->getCustomer()->getCustomerid()
                )
            );
            if(!$objCustomers2users instanceof \Servicos\GcdbBundle\Entity\Customers2users){
                throw new AuthenticationException('Usuário não encontrado.',403);
            }

            $objCadUsers = $entityStech->getRepository('ServicosGcdbBundle:CadUsers')->loadUserById($objCustomers2users->getIdUsers()->getId());

            if ($session->get('customerId') == $device->getCustomer()->getCustomerid() && $session->get('cadUserId') == $objCadUsers->getId()) {
                return true;
            }
        } catch (AuthenticationException $ae) {
            return false;
        } catch (\Exception $e) {
            return false;
        }

        return false;
    }

    //método para teste
    public function isLoggedAction(Request $request)
    {
        $token = $request->cookies->get('session_cookie');

        $jsonResponse = new JsonResponse();
        if ($this->isLogged($token)) {
            $jsonResponse->setData(array(
                'message' => 'Usuário logado'
            ));
        } else {
            $jsonResponse->setData(array(
                'message' => 'Usuário não logado'
            ));
            $jsonResponse->setStatusCode(403);
        }

        return $jsonResponse;
    }

    /**
     * Desloga o usuário da A PI
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function logoutAction(Request $request)
    {
        $entityStech = $this->getDoctrine()->getManager('default');
        $token = $request->cookies->get('session_cookie');
        $session = $this->get('session');

        $device = $entityStech->getRepository('ServicosGcdbBundle:Devices')->findOneByToken($token);

        $device->setActive(false);

        $entityStech->persist($device);
        $entityStech->flush();

        $jsonResponse = new JsonResponse();
        $jsonResponse->setData(array(
            'message' => 'Deslogado com sucesso'
        ));
        $jsonResponse->setStatusCode(200);
        return $jsonResponse;
    }

    /**
     * Retorna os circuitos do cliente
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function circuitsAction(Request $request)
    {
        $token = $request->cookies->get('session_cookie');

        $jsonResponse = new JsonResponse();

        if (!$this->isLogged($token)) {
            $jsonResponse->setData(array(
                'message' => 'Usuário não logado'
            ));
            $jsonResponse->setStatusCode(403);

            return $jsonResponse;
        }

        $entityStech = $this->getDoctrine()->getManager('default');
        $entityFinanceiro = $this->getDoctrine()->getManager('financeiro');
        $session = $this->get('session');
        $limit = (integer)$request->get('limit', 10);
        $page = (integer)$request->get('page', 1);
        $offset = is_numeric($page) ? ($page-1) * $limit : 0;

        try {
            $contratoRepository = $entityFinanceiro->getRepository("ServicosFinanceiroBundle:Contrato");

            $where = array(
                array('contPai.contCodigoid', 'IS NOT', 'NULL') // SOMENTE CIRCUITOS
            );
            $where[] = array('contPai.clieCodigoid', '=', (integer)$session->get('customerId'));
            $where[] = array('stat.statCodigoid', 'IN', array(1,2,3,10,11,12)); //ATIVOS
            if (trim($request->get('keyword'))) {
                $filter = ' ( '.
                    ' UPPER(cadUser.endereco) LIKE \'%'.strtoupper(trim($request->get('keyword'))).'%\' OR ' . // RUA
                    ' cadUser.numero LIKE \'%'.trim($request->get('keyword')).'%\' OR ' . // NÚMERO
                    ' cadUser.cep LIKE \'%'.trim($request->get('keyword')).'%\' OR ' . // CEP
                    ' UPPER(cidades.nome) LIKE \'%'.strtoupper(trim($request->get('keyword'))).'%\' OR ' . // NOME CIDADE
                    ' IF(desi.desigStt IS NULL, CONCAT(\'STT-\', contPai.clieCodigoid, \'-\', desi.desigNumero, \'-\', desi.desigPonta), ' .  // DESIGNADOR
                    ' CONCAT(\'STT\', desi.desigStt, LPAD(desi.desigNumero, 4, \'0\')) ) LIKE \'%'.strtoupper(trim($request->get('keyword'))).'%\' OR ' .
                    ' UPPER(endeentr.endeentrDesignadorOld) LIKE \'%'.strtoupper(trim($request->get('keyword'))).'%\' ' . //DESIGNADOR OLD
                    ' ) ';

                $where[] = $filter;
            }

            $circuits = $contratoRepository->listCircuito($offset, $limit, $where, array('cont.contCodigoid' => 'ASC'), array('cont.contCodigoid'));
            $count = $contratoRepository->countContrato($where, array('cont.contCodigoid' => 'ASC'), array());

            $count = (integer)$count[0]['total'];
        } catch (\Exception $e) {
            $jsonResponse->setData(array(
                'message' => $e->getMessage()
            ));
            $jsonResponse->setStatusCode(500);

            return $jsonResponse;
        }

        $result = array();
        foreach ($circuits as $circuit) {
            $result[] = array(
                'circuit' => $circuit['contCodigoid'],
                'designator' => $circuit['designador'],
                'street' => $circuit['endereco'],
                'streetNumber' => $circuit['numero'],
                'city' => $circuit['nomeCidade'],
                'state' => $circuit['siglaUf'],
                'cep' => $circuit['cep']
            );
        }

        $jsonResponse->setData(array(
            'circuits' => $result,
            'total' => $count,
            'limit' => $limit,
            'page' => $page
        ));

        return $jsonResponse;
    }

    /**
     * Retorna os circuitos do cliente
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function reportAction(Request $request)
    {
        $token = $request->cookies->get('session_cookie');

        $jsonResponse = new JsonResponse();

        if (!$this->isLogged($token)) {
            $jsonResponse->setData(array(
                'message' => 'Usuário não logado'
            ));
            $jsonResponse->setStatusCode(403);

            return $jsonResponse;
        }

        $circuit = $request->get('circuit');
        $issue = $request->get('issue');
        $requesterPhone = $request->get('requester_phone');
        $requesterEmail = $request->get('requester_email');
        $description = $request->get('description');
        $operatorReportIdentifier = $request->get('operatorReportIdentifier');
        $session = $this->get('session');

        //usuário do CRV pode inserir boletins não estando vinculado ao circuito
        $usersException = $this->container->getParameter('troubleticket_user_exception');

        $errors = array();
        if (empty($circuit)) {
            $errors[] = array('name' => 'circuit', 'message' => 'Circuito inválido');
        }
        if (empty($issue)) {
            $errors[] = array('name' => 'issue', 'message' => 'Issue inválida');
        }
        if (empty($description)) {
            $errors[] = array('name' => 'description', 'message' => 'Descrição inválida');
        }

        if (!empty($errors)) {
            $jsonResponse->setData(array(
                'fields' => $errors,
                'message' => 'Verifique os campos preenchidos'
            ));
            $jsonResponse->setStatusCode(400);

            return $jsonResponse;
        }

        $entityStech = $this->getDoctrine()->getManager('default');
        $entityFinanceiro = $this->getDoctrine()->getManager('financeiro');
        $contratoRepository = $entityFinanceiro->getRepository("ServicosFinanceiroBundle:Contrato");

        $manager = $this->getDoctrine()->getManager('troubleticket');
        $manager->getConnection()->beginTransaction();

        try {
            $customer = $entityStech->getRepository('ServicosGcdbBundle:Customers')->findCustomer($session->get('customerId'));
            $customer = reset($customer);
            if (empty($customer)) {
                throw new TroubleticketBundleException("Cliente não encontrado", 404);
            }

            $where = array(
                array('contPai.contCodigoid', 'IS NOT', 'NULL') // SOMENTE CIRCUITOS
            );

            if (!in_array($session->get('customerId'), $usersException)) {
                $where[] = array('contPai.clieCodigoid', '=', (integer)$session->get('customerId'));
            }
            $where[] = array('cont.contCodigoid', '=', (integer)$circuit);
            $where[] = array('stat.statCodigoid', 'IN', array(1,2,3,10,11,12)); //ATIVOS

            $circuit = $contratoRepository->listCircuito(0, 0, $where, array('cont.contCodigoid' => 'ASC'), array('cont.contCodigoid'));

            if (empty($circuit)) {
                $errors[] = array(
                    'name' => 'circuit',
                    'message' => 'Circuito não está vinculado ao usuário logado'
                );

                throw new TroubleticketBundleException("Verifique os campos preenchidos", 400);
            }
            $circuit = reset($circuit);

            //é definido pq o serviço utiliza esta session para criar o boletim
            $_SESSION['usr_codigoid'] = $session->get('cadUserId');

            $service = new Service\Reports($this->getDoctrine(), $this->container);
            $report = $service->create(array(
                'circuit_id' => $circuit['contCodigoid'],
                'designation' => $circuit['designador'],
                'stack' => Entity\Reports::STACK_SN1,
                'type' => Entity\Reports::TYPE_BA,
                'responsible' => null,
            ), 'BA criado');

            if (empty($requesterPhone)) {
                $requesterPhone = $customer['ddd'].$customer['telefone'];
            }

            if (empty($requesterEmail)) {
                $requesterEmail = $customer['email'];
            }

            $report->setRequesterName($customer['nomeCliente'] ? $customer['nomeCliente'] : $customer['nomeFantasia'])
                ->setRequesterPhone($requesterPhone)
                ->setRequesterEmail($requesterEmail)
                ->setDescription($description)
                ->setOperatorReportIdentifier($operatorReportIdentifier)
                ->setIssue($issue)
                ->setSymptom(3) // sempre começa com este valor
                ->setCreatedByClient(true)
                ->setCreatedBySystem(Entity\Reports::SYSTEM_MOBILE);

            if (in_array($session->get('customerId'), $usersException)) {
                $report->setCreatedBySystem(Entity\Reports::SYSTEM_CRV);
            }

            $service->open($report, 'BA iniciado');

            unset($_SESSION['usr_codigoid']);

            $jsonResponse->setData(array(
                'id' => $report->getId(),
                'code' => $report->getCode(),
                'fields' => array(),
                'message' => 'Abertura realizada com sucesso'
            ));

            $manager->getConnection()->commit();
        } catch (TroubleticketBundleException $e) {
            $manager->getConnection()->rollback();
            $jsonResponse->setData(array(
                'fields' => $errors,
                'message' => $e->getMessage()
            ));
            $jsonResponse->setStatusCode($e->getCode()?$e->getCode():400);
        } catch (\Exception $e) {
            $manager->getConnection()->rollback();
            $jsonResponse->setData(array(
                'fields' => array(),
                'message' => $e->getMessage()
            ));
            $jsonResponse->setStatusCode($e->getCode()?$e->getCode():400);
        }

        return $jsonResponse;
    }

    /**
     * Retorna os circuitos do cliente
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function reportBSAction(Request $request)
    {
        $token = $request->cookies->get('session_cookie');

        $jsonResponse = new JsonResponse();

        if (!$this->isLogged($token)) {
            $jsonResponse->setData(array(
                'message' => 'Usuário não logado'
            ));
            $jsonResponse->setStatusCode(403);

            return $jsonResponse;
        }

        $circuit = $request->get('circuit');
        $issue = $request->get('issue');
        $description = $request->get('description');
        $session = $this->get('session');
        //usuário do CRV pode inserir boletins não estando vinculado ao circuito
        $usersException = $this->container->getParameter('troubleticket_user_exception');

        $errors = array();
        if (empty($circuit)) {
            $errors[] = array('name' => 'circuit', 'message' => 'Circuito inválido');
        }
        if (empty($issue)) {
            $errors[] = array('name' => 'issue', 'message' => 'Issue inválida');
        }
        if (empty($description)) {
            $errors[] = array('name' => 'description', 'message' => 'Descrição inválida');
        }

        if (!empty($errors)) {
            $jsonResponse->setData(array(
                'fields' => $errors,
                'message' => 'Verifique os campos preenchidos'
            ));
            $jsonResponse->setStatusCode(400);

            return $jsonResponse;
        }

        $entityStech = $this->getDoctrine()->getManager('default');
        $entityFinanceiro = $this->getDoctrine()->getManager('financeiro');
        $contratoRepository = $entityFinanceiro->getRepository("ServicosFinanceiroBundle:Contrato");

        $manager = $this->getDoctrine()->getManager('troubleticket');
        $manager->getConnection()->beginTransaction();

        try {
            $customer = $entityStech->getRepository('ServicosGcdbBundle:Customers')->findCustomer($session->get('customerId'));
            $customer = reset($customer);
            if (empty($customer)) {
                throw new TroubleticketBundleException("Cliente não encontrado", 404);
            }

            $where = array(
                array('contPai.contCodigoid', 'IS NOT', 'NULL') // SOMENTE CIRCUITOS
            );
            if (!in_array($session->get('customerId'), $usersException)) {
                $where[] = array('contPai.clieCodigoid', '=', (integer)$session->get('customerId'));
            }
            $where[] = array('cont.contCodigoid', '=', (integer)$circuit);
            $where[] = array('stat.statCodigoid', 'IN', array(1,2,3,10,11,12)); //ATIVOS

            $circuit = $contratoRepository->listCircuito(0, 0, $where, array('cont.contCodigoid' => 'ASC'), array('cont.contCodigoid'));

            if (empty($circuit)) {
                $errors[] = array(
                    'name' => 'circuit',
                    'message' => 'Circuito não está vinculado ao usuário logado'
                );

                throw new TroubleticketBundleException("Verifique os campos preenchidos", 400);
            }
            $circuit = reset($circuit);

            //é definido pq o serviço utiliza esta session para criar o boletim
            $_SESSION['usr_codigoid'] = $session->get('cadUserId');

            $service = new Service\Reports($this->getDoctrine(), $this->container);
            $report = $service->create(array(
                'circuit_id' => $circuit['contCodigoid'],
                'designation' => $circuit['designador'],
                'stack' => Entity\Reports::STACK_ANALISE_PROBLEMAS,
                'type' => Entity\Reports::TYPE_BS,
                'responsible' => null,
            ), 'BS criado');

            $report->setRequesterName($customer['nomeCliente'] ? $customer['nomeCliente'] : $customer['nomeFantasia'])
                ->setRequesterPhone($customer['ddd'].$customer['telefone'])
                ->setRequesterEmail($customer['email'])
                ->setDescription($description)
                ->setIssue($issue)
                ->setSymptom(3) // sempre começa com este valor
                ->setCreatedByClient(true);

            $service->open($report, 'BS iniciado');

            unset($_SESSION['usr_codigoid']);

            $jsonResponse->setData(array(
                'id' => $report->getId(),
                'code' => $report->getCode(),
                'fields' => array(),
                'message' => 'Abertura realizada com sucesso'
            ));

            $manager->getConnection()->commit();
        } catch (TroubleticketBundleException $e) {
            $manager->getConnection()->rollback();
            $jsonResponse->setData(array(
                'fields' => $errors,
                'message' => $e->getMessage()
            ));
            $jsonResponse->setStatusCode($e->getCode()?$e->getCode():400);
        } catch (\Exception $e) {
            $manager->getConnection()->rollback();
            $jsonResponse->setData(array(
                'fields' => array(),
                'message' => $e->getMessage()
            ));
            $jsonResponse->setStatusCode($e->getCode()?$e->getCode():400);
        }

        return $jsonResponse;
    }

    /**
     * Retorna os circuitos do cliente
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function reportListAction(Request $request)
    {
        $token = $request->cookies->get('session_cookie');

        $jsonResponse = new JsonResponse();

        if (!$this->isLogged($token)) {
            $jsonResponse->setData(array(
                'message' => 'Usuário não logado'
            ));
            $jsonResponse->setStatusCode(403);

            return $jsonResponse;
        }

        $errors = array();
        $status = $request->get('status');
        $page = $request->get('page');
        $limit = $request->get('limit');
        $session = $this->get('session');

        $entityStech = $this->getDoctrine()->getManager('default');
        $entityFinanceiro = $this->getDoctrine()->getManager('financeiro');
        $contratoRepository = $entityFinanceiro->getRepository("ServicosFinanceiroBundle:Contrato");

        try {
            $customer = $entityStech->getRepository('ServicosGcdbBundle:Customers')->findCustomer($session->get('customerId'));
            $customer = reset($customer);
            if (empty($customer)) {
                throw new TroubleticketBundleException("Cliente não encontrado", 404);
            }

            $where = array(
                array('contPai.contCodigoid', 'IS NOT', 'NULL') // SOMENTE CIRCUITOS
            );
            $where[] = array('contPai.clieCodigoid', '=', (integer)$session->get('customerId'));
            $circuits = $contratoRepository->listCircuito(0, 0, $where, array('cont.contCodigoid' => 'ASC'), array('cont.contCodigoid'));

            if (empty($circuits)) {
                throw new TroubleticketBundleException("Não há circuitos para o Cliente", 400);
            }

            $circuitsIdList = array();
            $circuitsList = array();
            foreach ($circuits as $key => $value) {
                $circuitsIdList[] = $value['contCodigoid'];
                $circuitsList[$value['contCodigoid']] = $value;
            }

            $service = new Service\Reports($this->getDoctrine(), $this->container);
            $reports = $service->getAppReports(
                Entity\Reports::TYPE_BA,
                $circuitsIdList,
                $page,
                $limit,
                $status
            );

            foreach ($reports['reports'] as $key => $value) {
                $reports['reports'][$key] = array(
                    'id' => $value['id'],
                    'code' => $value['code'],
                    'opening_date' => $value['initial_date']->format('Y-m-d\TH:i:s'),
                    'circuit' => $value['circuit_id'],
                    'street' => $circuitsList[$value['circuit_id']]['endereco'],
                    'street_number' => $circuitsList[$value['circuit_id']]['numero'],
                    'city' => $circuitsList[$value['circuit_id']]['nomeCidade'],
                    'state' => $circuitsList[$value['circuit_id']]['siglaUf'],
                    'last_followup_date' => $value['last_update']->format('Y-m-d\TH:i:s')
                );
            }

            $jsonResponse->setData($reports);
        } catch (TroubleticketBundleException $e) {
            $jsonResponse->setData(array(
                'fields' => $errors,
                'message' => $e->getMessage()
            ));
            $jsonResponse->setStatusCode($e->getCode()?$e->getCode():400);
        } catch (\Exception $e) {
            $jsonResponse->setData(array(
                'fields' => array(),
                'message' => $e->getMessage()
            ));
            $jsonResponse->setStatusCode($e->getCode()?$e->getCode():400);
        }

        return $jsonResponse;
    }

    /**
     * Retorna os circuitos do cliente
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function reportDetailAction(Request $request, $id)
    {
        $token = $request->cookies->get('session_cookie');

        $jsonResponse = new JsonResponse();

        if (!$this->isLogged($token)) {
            $jsonResponse->setData(array(
                'message' => 'Usuário não logado'
            ));
            $jsonResponse->setStatusCode(403);

            return $jsonResponse;
        }

        if (!$id) {
            $jsonResponse->setData(array(
                'message' => 'Número do chamado inválido'
            ));
            $jsonResponse->setStatusCode(404);

            return $jsonResponse;
        }

        $errors = array();
        $session = $this->get('session');
        //usuário do CRV pode inserir boletins não estando vinculado ao circuito
        $usersException = $this->container->getParameter('troubleticket_user_exception');

        $entityStech = $this->getDoctrine()->getManager('default');
        $entityFinanceiro = $this->getDoctrine()->getManager('financeiro');
        $contratoRepository = $entityFinanceiro->getRepository("ServicosFinanceiroBundle:Contrato");

        try {
            $customer = $entityStech->getRepository('ServicosGcdbBundle:Customers')->findCustomer($session->get('customerId'));
            $customer = reset($customer);
            if (empty($customer)) {
                throw new TroubleticketBundleException("Cliente não encontrado", 404);
            }

            $manager = $this->getDoctrine()->getManager('troubleticket');
            $report = $manager->getRepository('TroubleticketBundle:Reports')->find($id);

            if (empty($report)) {
                throw new TroubleticketBundleException("Chamado não encontrado", 404);
            }

            $where = array(
                array('contPai.contCodigoid', 'IS NOT', 'NULL') // SOMENTE CIRCUITOS
            );
            if (!in_array($session->get('customerId'), $usersException)) {
                $where[] = array('contPai.clieCodigoid', '=', (integer)$session->get('customerId'));
            }
            $where[] = array('cont.contCodigoid', '=', (integer)$report->getCircuitId());
            $circuit = $contratoRepository->listCircuito(0, 0, $where, array('cont.contCodigoid' => 'ASC'), array('cont.contCodigoid'));

            if (empty($circuit)) {
                throw new TroubleticketBundleException("Este chamado não está vinculado ao cliente logado", 400);
            }
            $circuit = reset($circuit);

            $messages = $manager->getRepository('TroubleticketBundle:Messages')->findBy(array('report' => $id), array('createdAt' => 'DESC'));

            $userName = $entityStech->getRepository('ServicosGcdbBundle:CadUsers')->getUserNameById(1113);

            $followups = array();
            foreach ($messages as $message) {
                $userName = $entityStech->getRepository($message->getReferenceRepository())->getUserNameById($message->getUser());

                $followups[] = array(
                    'from_client' => $message->isFromClient(),
                    'name' => $userName,
                    'date' => $message->getCreatedAt()->format('Y-m-d\TH:i:s'),
                    'message' => $message->getMessage()
                );
            }

            $parent = $report->getParent();
            $result = array(
                'id' => $report->getId(),
                'code' => $report->getCode(),
                'opening_date' => $report->getInitialDate()->format('Y-m-d\TH:i:s'),
                'last_followup_date' => $report->getLastUpdate()->format('Y-m-d\TH:i:s'),
                'status' => $report->getStatusString(),
                'issue' => $report->getIssueString(),
                'description' => $report->getDescription(),
                'followups' => $followups,
                'parent' => array(
                    'id' => (!empty($parent)) ? $parent->getId() : null,
                    'code' => (!empty($parent)) ? $parent->getCode() : null,
                    'type' => (!empty($parent)) ? $parent->getTypeString() : null
                ),
                'circuit' => array(
                    'id' => $circuit['contCodigoid'],
                    'designator' => $circuit['designador'],
                    'address' => array(
                        'street' => $circuit['endereco'],
                        'number' => $circuit['numero'],
                        'city' => $circuit['nomeCidade'],
                        'state' => $circuit['siglaUf']
                    )
                )
            );

            $jsonResponse->setData($result);
        } catch (TroubleticketBundleException $e) {
            $jsonResponse->setData(array(
                'fields' => $errors,
                'message' => $e->getMessage()
            ));
            $jsonResponse->setStatusCode($e->getCode()?$e->getCode():400);
        } catch (\Exception $e) {
            $jsonResponse->setData(array(
                'fields' => array(),
                'message' => $e->getMessage()
            ));
            $jsonResponse->setStatusCode($e->getCode()?$e->getCode():400);
        }

        return $jsonResponse;
    }

    /**
     * Retorna os status dos chamados em lote
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function reportLotDetailAction(Request $request)
    {
        $token = $request->cookies->get('session_cookie');
        $chamados = explode(',', $request->query->get('boletins'));

        $jsonResponse = new JsonResponse();

        if (!$this->isLogged($token)) {
            $jsonResponse->setData(array(
                'message' => 'Usuário não logado'
            ));
            $jsonResponse->setStatusCode(403);

            return $jsonResponse;
        }

        if (!is_array($chamados) || count($chamados) == 0) {
            $jsonResponse->setData(array(
                'message' => 'Número do chamado inválido'
            ));
            $jsonResponse->setStatusCode(404);

            return $jsonResponse;
        }

        $chamadosResponse = array();
        $chamadosSearch = array();
        foreach ($chamados as $chamado) {
            if(is_numeric($chamado)) {
                $chamadosSearch[] = $chamado;
                $chamadosResponse[$chamado] = array('status' => 'Chamado não encontrado');
            } else {
                $chamadosResponse[$chamado] = array('status' => 'Número do chamado inválido');
            }
        }

        $errors = array();
        $session = $this->get('session');
        //usuário do CRV pode inserir boletins não estando vinculado ao circuito
        $usersException = $this->container->getParameter('troubleticket_user_exception');

        $entityStech = $this->getDoctrine()->getManager('default');
        $entityFinanceiro = $this->getDoctrine()->getManager('financeiro');
        $contratoRepository = $entityFinanceiro->getRepository("ServicosFinanceiroBundle:Contrato");

        try {
            $customer = $entityStech->getRepository('ServicosGcdbBundle:Customers')->findCustomer($session->get('customerId'));
            $customer = reset($customer);
            if (empty($customer)) {
                throw new TroubleticketBundleException("Cliente não encontrado", 404);
            }

            $manager = $this->getDoctrine()->getManager('troubleticket');
            $reportsRepo = $manager->getRepository('TroubleticketBundle:Reports');

            $qb = $reportsRepo->createQueryBuilder('r');

            $reports = $qb->select('r, pr')
                ->leftJoin('r.parent', 'pr')
                ->where($qb->expr()->in('r.id', ':ids'))
                ->setParameters(array('ids' => $chamadosSearch))
                ->getQuery()
                ->getResult();

            if (empty($reports)) {
                throw new TroubleticketBundleException("Nenhum chamado não encontrado", 404);
            }

            foreach ($reports as $report) {
                $parent = $report->getParent();
                $chamadosResponse[$report->getId()] = array(
                    'id' => $report->getId(),
                    'code' => $report->getCode(),
                    'parent' => array(
                        'id' => (!empty($parent)) ? $parent->getId() : null,
                        'code' => (!empty($parent)) ? $parent->getCode() : null,
                        'type' => (!empty($parent)) ? $parent->getTypeString() : null
                    ),
                    'opening_date' => $report->getInitialDate()->format('Y-m-d\TH:i:s'),
                    'last_followup_date' => $report->getLastUpdate()->format('Y-m-d\TH:i:s'),
                    'status' => $report->getStatusString(),
                    'issue' => $report->getIssueString(),
                    'description' => $report->getDescription()
                );
            }

            $jsonResponse->setData($chamadosResponse);
        } catch (TroubleticketBundleException $e) {
            $jsonResponse->setData(array(
                'fields' => $errors,
                'message' => $e->getMessage()
            ));
            $jsonResponse->setStatusCode($e->getCode()?$e->getCode():400);
        } catch (\Exception $e) {
            $jsonResponse->setData(array(
                'fields' => array(),
                'message' => $e->getMessage()
            ));
            $jsonResponse->setStatusCode($e->getCode()?$e->getCode():400);
        }

        return $jsonResponse;
    }

    /**
     * Retorna os circuitos do cliente
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function chatAction(Request $request)
    {
        $token = $request->cookies->get('session_cookie');

        $jsonResponse = new JsonResponse();

        if (!$this->isLogged($token)) {
            $jsonResponse->setData(array(
                'message' => 'Usuário não logado'
            ));
            $jsonResponse->setStatusCode(403);

            return $jsonResponse;
        }

        $id = $request->get('id');
        $message = $request->get('message');
        $session = $this->get('session');
        //usuário do CRV pode inserir boletins não estando vinculado ao circuito
        $usersException = $this->container->getParameter('troubleticket_user_exception');

        $errors = array();
        if (empty($id) || !is_numeric($id)) {
            $errors[] = array('name' => 'id', 'message' => 'ID do chamado inválido');
        }

        if (empty($message)) {
            $errors[] = array('name' => 'message', 'message' => 'Mensagem inválida');
        }

        if (!empty($errors)) {
            $jsonResponse->setData(array(
                'fields' => $errors,
                'message' => 'Verifique os campos preenchidos'
            ));
            $jsonResponse->setStatusCode(400);

            return $jsonResponse;
        }

        $entityStech = $this->getDoctrine()->getManager('default');
        $entityFinanceiro = $this->getDoctrine()->getManager('financeiro');
        $entityRh = $this->getDoctrine()->getManager('rh');
        $contratoRepository = $entityFinanceiro->getRepository("ServicosFinanceiroBundle:Contrato");
        $manager = $this->getDoctrine()->getManager('troubleticket');
        $manager->getConnection()->beginTransaction();

        try {
            $customer = $entityStech->getRepository('ServicosGcdbBundle:Customers')->findCustomer($session->get('customerId'));
            $customer = reset($customer);
            if (empty($customer)) {
                throw new TroubleticketBundleException("Cliente não encontrado", 404);
            }

            $report = $manager->getRepository('TroubleticketBundle:Reports')->find($id);
            if (empty($report)) {
                throw new TroubleticketBundleException("Número do chamado inválido", 404);
            }

            $where = array(
                array('contPai.contCodigoid', 'IS NOT', 'NULL') // SOMENTE CIRCUITOS
            );
            if (!in_array($session->get('customerId'), $usersException)) {
                $where[] = array('contPai.clieCodigoid', '=', (integer)$session->get('customerId'));
            }
            $where[] = array('cont.contCodigoid', '=', (integer)$report->getCircuitId());
            // $where[] = array('stat.statCodigoid', 'IN', array(1,2,3,10,11,12)); //ATIVOS

            $circuit = $contratoRepository->listCircuito(0, 0, $where, array('cont.contCodigoid' => 'ASC'), array('cont.contCodigoid'));

            if (empty($circuit)) {
                throw new TroubleticketBundleException("Número do chamado inválido", 404);
            }

            $service = new Service\Reports($this->getDoctrine(), $this->container);
            $message = $service->chat($report, $message, $session->get('cadUserId'), 'ServicosGcdbBundle:CadUsers', 'id');

            $jsonResponse->setData(array(
                'fields' => array(),
                'message' => 'Comentário inserido com sucesso'
            ));

            $manager->getConnection()->commit();
        } catch (TroubleticketBundleException $e) {
            $manager->getConnection()->rollback();
            $jsonResponse->setData(array(
                'fields' => $errors,
                'message' => $e->getMessage()
            ));
            $jsonResponse->setStatusCode($e->getCode()?$e->getCode():400);
        } catch (\PDOException $e) {
            $manager->getConnection()->rollback();
            $jsonResponse->setData(array(
                'fields' => array(),
                'message' => 'Erro na chamada da API'
            ));
            $jsonResponse->setStatusCode($e->getCode()?$e->getCode():400);
        } catch (\Exception $e) {
            $manager->getConnection()->rollback();
            $jsonResponse->setData(array(
                'fields' => array(),
                'message' => $e->getMessage()
            ));
            $jsonResponse->setStatusCode($e->getCode()?$e->getCode():400);
        }

        return $jsonResponse;
    }

    /**
     * Fecha um boletim do cliente
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function reportCloseAction(Request $request)
    {
        $token = $request->cookies->get('session_cookie');

        $jsonResponse = new JsonResponse();

        if (!$this->isLogged($token)) {
            $jsonResponse->setData(array(
                'message' => 'Usuário não logado'
            ));
            $jsonResponse->setStatusCode(403);

            return $jsonResponse;
        }

        $id = $request->get('id');
        $session = $this->get('session');

        $errors = array();
        if (empty($id) || !is_numeric($id)) {
            $errors[] = array('name' => 'id', 'message' => 'ID do chamado inválido');
        }

        if (!empty($errors)) {
            $jsonResponse->setData(array(
                'fields' => $errors,
                'message' => 'Verifique os campos preenchidos'
            ));
            $jsonResponse->setStatusCode(400);

            return $jsonResponse;
        }

        $manager = $this->getDoctrine()->getManager('troubleticket');
        $reports_repository = $manager->getRepository('TroubleticketBundle:Reports');
        $time_counters_repository = $manager->getRepository('TroubleticketBundle:TimeCounters');
        $manager->getConnection()->beginTransaction();

        try {

            $reports = $reports_repository->findOneBy(array('id' => $id));

            if (empty($reports)) {
                throw new TroubleticketBundleException('Boletim não encontrado', 404);
            }

            if ($reports->hasOpenedSubcases()) {
                throw new TroubleticketBundleException('Boletim possui subcasos abertos');
            }

            if($reports->getType() != Entity\Reports::TYPE_BA) {
                throw new TroubleticketBundleException('Somente boletins do tipo BA podem ser resolvidos');
            }

            if ($reports->getStatus() != Entity\Reports::RESOLVIDO) {
                throw new TroubleticketBundleException('Status do Boletim impede esta atualização!');
            }

            $time_counters = $time_counters_repository->findOneBy(
                array('report_id' => $reports->getId(),'final_date' => null),
                array('initial_date' => 'DESC'));

            if (empty($time_counters)) {
                throw new TroubleticketBundleException('Erro de consistência no Boletim!');
            }

            $openBS = false;
            $history_comment = $request_comment = 'Fechamento do Boletin através do CRV';

            //é definido porque o serviço utiliza esta session para criar o boletim
            $_SESSION['usr_codigoid'] = $session->get('cadUserId');

            $service = new Service\Reports($this->getDoctrine(), $this->container);
            $report = $service->close($reports,
                $time_counters,
                $history_comment,
                $openBS,
                $request_comment);

            $jsonResponse->setData(array(
                'code' => $report->getCode(),
                'fields' => array(),
                'message' => 'Boletim fechado com sucesso'
            ));

            $manager->getConnection()->commit();
        } catch (TroubleticketBundleException $e) {
            $manager->getConnection()->rollback();
            $jsonResponse->setData(array(
                'fields' => $errors,
                'message' => $e->getMessage()
            ));
            $jsonResponse->setStatusCode($e->getCode()?$e->getCode():400);
        } catch (\Exception $e) {
            $manager->getConnection()->rollback();
            $jsonResponse->setData(array(
                'fields' => array(),
                'message' => $e->getMessage()
            ));
            $jsonResponse->setStatusCode($e->getCode()?$e->getCode():400);
        }

        return $jsonResponse;
    }

    /**
     * Método para marcar BA como não resolvido
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function baUnsolvedAction(Request $request)
    {
        $token = $request->cookies->get('session_cookie');
        $jsonResponse = new JsonResponse();
        $errors = array();
        $reportID = $request->get('id');

        try {

            $manager = $this->getDoctrine()->getManager('troubleticket');
            $manager->getConnection()->beginTransaction();

            if (!$this->isLogged($token)) {
                throw new \Exception('Usuário não logado', 403);
            }

            $reportRepository = $this->getDoctrine()->getRepository('TroubleticketBundle:Reports', 'troubleticket');
            $reports = $reportRepository->findOneBy(
                array(
                    'id' => $reportID,
                    'type' => Entity\Reports::TYPE_BA
                )
            );

            if (empty($reports)) {
                throw new \Exception('BA não encontrado', 403);
            }

            $timeCounterRepository = $this->getDoctrine()->getRepository('TroubleticketBundle:TimeCounters', 'troubleticket');
            $timeCounters = $timeCounterRepository->findOneBy(
                array('report_id' => $reports->getId(),'final_date' => null),
                array('initial_date' => 'DESC')
            );

            if (empty($timeCounters)) {
                throw new \Exception('Erro de consistência no BA!', 403);
            }

            $reportStatus = $reports->getStatus();

            if ($reportStatus != Entity\Reports::RESOLVIDO) {
                throw new \Exception('Status do BA impede esta atualização!', 403);
            }

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
            $service->unsolved($reports, $timeCounters);

            $reportRepository = $this->getDoctrine()->getRepository('TroubleticketBundle:Reports', 'troubleticket');
            $report = $reportRepository->findOneBy(array('id' => $reportID, 'type' => Entity\Reports::TYPE_BA));

            $troubleticketCircuitApi = $this->get('troubleticket.circuit_api');
            $troubleticketCircuitApi->setUrlPath(vsprintf('circuito/%s',array($report->getCircuitId())));
            $troubleticketCircuitApiGet = $troubleticketCircuitApi->get(1, 0, null, null,null);
            $circuit = $troubleticketCircuitApiGet->circuito;

            $jsonResponse = new JsonResponse();
            $jsonResponse->setData(array(
                'cid'   => $circuit->clieCodigoid,
                'message' => "BA marcado como não resolvido. O {$report->getCode()} foi reaberto!",
            ));

            $manager->getConnection()->commit();
        } catch (TroubleticketBundleException $e) {
            $manager->getConnection()->rollback();
            $jsonResponse->setData(array(
                'fields' => $errors,
                'message' => $e->getMessage()
            ));
            $jsonResponse->setStatusCode($e->getCode()?$e->getCode():400);
        } catch (\Exception $e) {
            $manager->getConnection()->rollback();
            $jsonResponse->setData(array(
                'fields' => array(),
                'message' => $e->getMessage()
            ));
            $jsonResponse->setStatusCode($e->getCode()?$e->getCode():400);
        }

        return $jsonResponse;
    }

    private function validaCpf($cpf)
    {
        if (!$cpf) {
            return false;
        }

        $cpf = preg_replace( '/\D/', '', $cpf );
        if (strlen($cpf) != 11) {
            return false;
        }
        elseif ($cpf == '00000000000' ||
                $cpf == '11111111111' ||
                $cpf == '22222222222' ||
                $cpf == '33333333333' ||
                $cpf == '44444444444' ||
                $cpf == '55555555555' ||
                $cpf == '66666666666' ||
                $cpf == '77777777777' ||
                $cpf == '88888888888' ||
                $cpf == '99999999999') {
            return false;
        }
        else {
            for ($t = 9; $t < 11; $t++) {
                for ($d = 0, $c = 0; $c < $t; $c++) {
                    $d += $cpf{$c} * (($t + 1) - $c);
                }
                $d = ((10 * $d) % 11) % 10;
                if ($cpf{$c} != $d) {
                    return false;
                }
            }
            return true;
        }
    }

    private function validaCnpj($cnpj)
    {
        $cnpj = preg_replace('/[^0-9]/', '', (string) $cnpj);
        // Valida tamanho
        if (strlen($cnpj) != 14)
            return false;
        // Valida primeiro dígito verificador
        for ($i = 0, $j = 5, $soma = 0; $i < 12; $i++)
        {
            $soma += $cnpj{$i} * $j;
            $j = ($j == 2) ? 9 : $j - 1;
        }
        $resto = $soma % 11;
        if ($cnpj{12} != ($resto < 2 ? 0 : 11 - $resto))
            return false;
        // Valida segundo dígito verificador
        for ($i = 0, $j = 6, $soma = 0; $i < 13; $i++)
        {
            $soma += $cnpj{$i} * $j;
            $j = ($j == 2) ? 9 : $j - 1;
        }
        $resto = $soma % 11;
        return $cnpj{13} == ($resto < 2 ? 0 : 11 - $resto);
    }
}
