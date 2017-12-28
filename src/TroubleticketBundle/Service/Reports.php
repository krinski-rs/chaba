<?php

namespace TroubleticketBundle\Service;

use Exception;
use DateTime;

use TroubleticketBundle\Entity;
use TroubleticketBundle\Twig;
use TroubleticketBundle\Exception\TroubleticketBundleException;

use Doctrine\Bundle\DoctrineBundle\Registry;
use Doctrine\ORM\Id\SequenceGenerator;
use Doctrine\ORM\Tools\Pagination\Paginator;

use Symfony\Component\Yaml\Parser;

use Servicos\LumaBundle;
use Servicos\LumaBundle\Entity as EntitiesLuma;

/**
 * Serviço de Boletins
 */
class Reports
{

    /**
     * Objeto do doctrine
     *
     * @var mixed
     * @access protected
     */
    protected $doctrine;

    /**
     * Container do Symfony
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
     * Create a new report
     *
     * @param array $data
     * @access public
     * @return Entity\Reports
     */
    public function create(array $data, $comment = null)
    {

        if ($data['type'] == Entity\Reports::TYPE_BA
           && $this->designationHasOpenedTickets($data['designation'], $data['type'])) {
            throw new TroubleticketBundleException('O designador informado já possui um incidente em atendimento.');
        }

        $manager = $this->getDoctrine()->getManager('troubleticket');
        $manager->getConnection()->beginTransaction();

        try {
            $currentDate = new DateTime;
            $circuitCache = $this->updateCache($data['circuit_id']);
            if ($data['responsible']) {
                $colaboratorCache = $this->updateCacheColaborator($data['responsible']);
            }

            $report = new Entity\Reports();
            $report->setCircuitCache($circuitCache)
                ->setDesignation($data['designation'])
                ->setInitialDate($currentDate)
                ->setStack($data['stack'])
                ->setStatus($report::INATIVO)
                ->setType($data['type'])
                ->setResponsible($data['responsible'])
                ->setCreatedBySystem(Entity\Reports::SYSTEM_TROUBLETICKET);

            if (isset($data['parent_id'])) {
                $report->setParent($data['parent_id']);
            }

            $report_stack = $report->getStack();
            $report_responsible = $report->getResponsible();

            if ($report_stack == Entity\Reports::STACK_SN1) {
                $report->setSn1($report_responsible);
            } else if ($report_stack == Entity\Reports::STACK_SN2) {
                $report->setSn2($report_responsible);
            } else if ($report_stack == Entity\Reports::STACK_SN3) {
                $report->setSn3($userId);
            } else if ($report_stack == Entity\Reports::STACK_VOZ) {
                $report->setVoz($userId);
            }

            //Creating report code retrieving the nextvalue from the sequence created for each report type
            $typeReport = $report->getTypeString();
            $sequence = 'troubleticket."reports_'.strtolower($typeReport).'_sequence"';
            $sequenceGenerator = new SequenceGenerator($sequence, 1);
            $report->setCode($typeReport.$sequenceGenerator->generate($manager, $report));

            $manager->persist($report);
            $manager->flush();

            $this->createHistory($report, $comment, $currentDate, null, null);

            $manager->getConnection()->commit();
        } catch (Exception $e) {
            $manager->getConnection()->rollback();
            throw $e;
        }

        return $report;
    }

    /**
     * Atualiza as entradas de cache para prover pesquisas através das mesmas.
     *
     * @param integer $circuitId Identificador do circuito
     * @access public
     * @return Entity\CircuitsCache
     */
    public function updateCacheColaborator($colaboratorId)
    {
        $colaboradorApi = $this->container->get('troubleticket.colaborador_api');
        $colaboradorApi->setUrlPath(vsprintf('colaborador/%s',array($colaboratorId)));
        $colaborator = $colaboradorApi->get();
        $colaborator = $colaborator->colaborador;
        $cache = $this->doctrine->getRepository('TroubleticketBundle:ColaboratorsCache', 'troubleticket')->find($colaboratorId);
        if (!$cache) {
            $cache = new Entity\ColaboratorsCache;
        }

        $cache->setId($colaboratorId)
              ->setName($colaborator->nome);

        $manager = $this->doctrine->getManager('troubleticket');
        $manager->persist($cache);
        $manager->flush();

        return $cache;
    }

    /**
     * Atualiza as entradas de cache para prover pesquisas através das mesmas.
     *
     * @param integer $circuitId Identificador do circuito
     * @access public
     * @return Entity\CircuitsCache
     */
    public function updateCache($circuitId)
    {
        $circuitApi = $this->container->get('troubleticket.circuit_api');
        $circuitApi->setUrlPath('circuito/'.$circuitId);
        $circuit = $circuitApi->get();
        $circuit = $circuit->circuito;
        $cache = $this->doctrine->getRepository('TroubleticketBundle:CircuitsCache', 'troubleticket');
        $circuitCache = $cache->find($circuitId);
        if (!$circuitCache) {
            $circuitCache = new Entity\CircuitsCache;
        }

        $clientId = null;
        if (isset($circuit->clieCodigoid)) {
            $clientId = $circuit->clieCodigoid;
        }

        $circuitCache->setId($circuitId)
            ->setDesignation($circuit->designador)
            ->setFinalClient($circuit->clienteFinal->nome)
            ->setUfPontaA($circuit->siglaUf)
            ->setClientId($clientId)
            ->setSla($circuit->sla->disponibilidade)
            ->setCity($circuit->nomeCidade);
        $manager = $this->doctrine->getManager('troubleticket');
        $manager->persist($circuitCache);
        $manager->flush();

        // client
        if ($clientId) {
            $clientApi = $this->container->get('troubleticket.client_api');
            $clientApi->setUrlPath('cliente/'.$clientId);
            $client = $clientApi->get();
            $client = $client->customer;

            $cache = $this->doctrine->getRepository('TroubleticketBundle:ClientsCache', 'troubleticket');

            $clientCache = $cache->find($clientId);
            if (!$clientCache) {
                $clientCache = new Entity\ClientsCache;
            }
            $clientCache->setId($client->customerid)
                ->setName($client->nomeFantasia)
                ->setNivel($client->nivel);
            $manager->persist($clientCache);
            $manager->flush();
        }

        return $circuitCache;
    }

    /**
     * Atualiza as entradas de cache do fornecedor para prover pesquisas através das mesmas.
     *
     * @param integer $providerId Identificador do pop
     * @access public
     * @return Entity\ProvidersCache
     */
    public function updateCacheProvider($providerId)
    {
        $providerApi = $this->container->get('troubleticket.provider_api');
        $providerApi->setUrlPath(vsprintf('fornecedor/%s', array($providerId)));
        $provider = $providerApi->get();
        $provider = $provider->provider;

        $cache = $this->doctrine->getRepository('TroubleticketBundle:ProvidersCache', 'troubleticket')->find($providerId);

        if (!$cache) {
            $cache = new Entity\ProvidersCache;
        }

        $cache->setId($providerId)
               ->setCnpj($provider->cnpj)
               ->setNomeFantasia($provider->nome_fantasia)
               ->setRazaoSocial($provider->razao_social);

        $manager = $this->doctrine->getManager('troubleticket');
        $manager->persist($cache);
        $manager->flush();

        return $cache;
    }

    /**
     * Atualiza as entradas de cache do pop para prover pesquisas através das mesmas.
     *
     * @param integer $popId Identificador do pop
     * @access public
     * @return Entity\PopsCache
     */
    public function updateCachePop($popId)
    {
        $popApi = $this->container->get('troubleticket.pop_api');
        $popApi->setUrlPath(vsprintf('pop/%s', array($popId)));
        $pop = $popApi->get();
        $pop = $pop->pop;
        $cache = $this->doctrine->getRepository('TroubleticketBundle:PopsCache', 'troubleticket')->find($popId);

        if (!$cache) {
            $cache = new Entity\PopsCache;
        }

        $cache->setId($popId)
              ->setName($pop->nome);

        $manager = $this->doctrine->getManager('troubleticket');
        $manager->persist($cache);
        $manager->flush();

        return $cache;
    }

    /**
     * Update report
     *
     * @param object Reports
     * @param string $history_comment
     * @access public
     * @return Entity\Reports
     */
    public function update(Entity\Reports $reports,$history_comment = null)
    {
        $manager = $this->getDoctrine()->getManager('troubleticket');
        $manager->getConnection()->beginTransaction();

        $currentDate = new DateTime;

        try {

            $manager->persist($reports);
            $manager->flush();

            $history = new Entity\History();

            $history->setReportId($reports);
            $history->setDate($currentDate);
            $history->setReportStatus($reports->getStatus());

            $this->createHistory($reports, $history_comment, $currentDate, null);

            $manager->getConnection()->commit();
        } catch (Exception $e) {
            $manager->getConnection()->rollback();
            throw $e;
        }

        return $reports;
    }

    /**
     * Checks if a ticket is already opened for a certain designation
     *
     * @param string $designation
     * @access public
     * @return Entity\Reports
     */
    public function getRelapsedTicketsByDesignation($designation, $type)
    {
        $repository = $this->getDoctrine()->getRepository('TroubleticketBundle:Reports', 'troubleticket');

        $lessThirty = strtotime("-30 days");

        $qb = $repository->createQueryBuilder('r');
        $qb->where('r.designation = :designation')
           ->setParameter('designation', $designation)
           ->andWhere('r.type = :type')
           ->setParameter('type', $type)
           ->andWhere('r.initial_date >= :lessThirty')
           ->setParameter('lessThirty', date('Y-m-d', $lessThirty));

        return $qb->getQuery()->getResult();
    }

    /**
     * Pause report
     *
     * @param object Reports
     * @param object TimeCounters
     * @param string $history_comment
     * @param string $history_reason
     * @access public
     * @return Entity\Reports
     */
    public function pause(Entity\Reports $reports,Entity\TimeCounters $time_counters,$history_comment = null,$history_reason = null)
    {
        $manager = $this->getDoctrine()->getManager('troubleticket');
        $manager->getConnection()->beginTransaction();

        $currentDate = new DateTime;
        $reports_status = Entity\Reports::PAUSADO;

        try {
            $reports->setStatus($reports_status);

            $manager->persist($reports);
            $manager->flush();

            $time_counters->setFinalDate($currentDate);

            $manager->persist($time_counters);
            $manager->flush();

            $this->createTimeCounter($reports,$currentDate);

            $this->createHistory($reports,$history_comment,$currentDate,$history_reason);

            $manager->getConnection()->commit();
        } catch (Exception $e) {
            $manager->getConnection()->rollback();
            throw $e;
        }

        return $reports;
    }

    /**
     * Restart report
     *
     * @param object Reports
     * @param object TimeCounters
     * @param string $history_comment
     * @access public
     * @return Entity\Reports
     */
    public function restart(Entity\Reports $reports,Entity\TimeCounters $time_counters,$history_comment = null)
    {
        $manager = $this->getDoctrine()->getManager('troubleticket');
        $manager->getConnection()->beginTransaction();

        $currentDate = new DateTime;
        $reports_status = Entity\Reports::EM_ATENDIMENTO;

        try {
            $reports->setStatus($reports_status);

            $manager->persist($reports);
            $manager->flush();

            $time_counters->setFinalDate($currentDate);

            $manager->persist($time_counters);
            $manager->flush();

            $this->createTimeCounter($reports,$currentDate);

            $this->createHistory($reports,$history_comment,$currentDate,null);

            $manager->getConnection()->commit();
        } catch (Exception $e) {
            $manager->getConnection()->rollback();
            throw $e;
        }

        return $reports;
    }

    /**
     * Solve report
     *
     * @param object Reports
     * @param object TimeCounters
     * @access public
     * @return Entity\Reports
     */
    public function solve(Entity\Reports $reports,
        Entity\TimeCounters $time_counters,
        $history_comment = null,
        $openBS = null,
        $reason = null)
    {
        if ($reports->hasOpenedSubcases()) {
            throw new Exception(sprintf('O boletim %s não pode ser resolvido pois possui subcasos em aberto', $reports->getCode()));
        }
        $manager = $this->getDoctrine()->getManager('troubleticket');
        $manager->getConnection()->beginTransaction();

        $currentDate = new DateTime;
        $reports_status = Entity\Reports::RESOLVIDO;

        try {
            if ($reports->getPopId()) {
                $popCache = $this->updateCachePop($reports->getPopId());
                $reports->setPopCache($popCache);
            }

            if ($reports->getProviderId()) {
                $providerCache = $this->updateCacheProvider($reports->getProviderId());
                $reports->setProviderCache($providerCache);
            }

            if($reason) {
                $reports->setCloseReason($reason);
            }

            $reports->setStatus($reports_status);

            $manager->persist($reports);
            $manager->flush();

            $time_counters->setFinalDate($currentDate);

            $manager->persist($time_counters);
            $manager->flush();

            $this->createTimeCounter($reports,$currentDate);

            if(!$history_comment) {
                $history_comment = $reports->getTypeString() . ' marcado como Resolvido';
            }

            $this->createHistory($reports, $history_comment, $currentDate ,$reason);

            if ($openBS && $openBS != 'Não') {
                $bsData = array(
                    'circuit_id' => $reports->getCircuitId(),
                    'designation' => $reports->getDesignation(),
                    'stack' => Entity\Reports::STACK_NONE,
                    'type' => Entity\Reports::TYPE_BS,
                    'responsible' => null,
                    'parent_id' => $reports,
                );
                $bs = $this->create($bsData, 'BS Criado');
                if (!$bs) {
                    throw new Exception('Não foi possível criar o BS');
                }

                $bs->setDescription($openBS);

                if (!$this->open($bs, 'BS aberto')) {
                    throw new Exception('Ocorreu um erro ao abrir o BS');
                }
            }

            $manager->getConnection()->commit();
        } catch (Exception $e) {
            $manager->getConnection()->rollback();
            throw $e;
        }

        return $reports;
    }

    /**
     * Unsolved report
     *
     * @param object Reports
     * @param object TimeCounters
     * @access public
     * @return Entity\Reports
     */
    public function unsolved(Entity\Reports $reports,Entity\TimeCounters $time_counters)
    {
        $manager = $this->getDoctrine()->getManager('troubleticket');
        $manager->getConnection()->beginTransaction();

        $currentDate = new DateTime;
        $reports_status = Entity\Reports::EM_ATENDIMENTO;
        $history_comment = $reports->getTypeString() . ' reaberto';

        try {
            $reports->setStatus($reports_status);

            $manager->persist($reports);
            $manager->flush();

            $time_counters->setFinalDate($currentDate);

            $manager->persist($time_counters);
            $manager->flush();

            $this->createTimeCounter($reports,$currentDate);

            $this->createHistory($reports,$history_comment,$currentDate,null);

            $manager->getConnection()->commit();
        } catch (Exception $e) {
            $manager->getConnection()->rollback();
            throw $e;
        }

        return $reports;
    }

    /**
     * Close report
     *
     * @param object Reports
     * @param object TimeCounters
     * @param string $history_comment
     * @param boolean $openBS
     * @param string $reason
     * @access public
     * @return Entity\Reports
     */
    public function close(
        Entity\Reports $reports,
        Entity\TimeCounters $time_counters,
        $history_comment = null,
        $openBS = null,
        $reason = null,
        $date = null)
    {

        if ($reports->hasOpenedSubcases()) {
            throw new Exception(sprintf('O boletim %s não pode ser fechado pois possui subcasos em aberto', $reports->getCode()));
        }
        $manager = $this->getDoctrine()->getManager('troubleticket');
        $manager->getConnection()->beginTransaction();

        $currentDate = new DateTime;

        if(!is_null($date)){
            $currentDate = $date;
        }

        $reports_status = Entity\Reports::FECHADO;


        try {
            if ($reports->getPopId()) {
                $popCache = $this->updateCachePop($reports->getPopId());
                $reports->setPopCache($popCache);
            }

            if ($reports->getProviderId()) {
                $providerCache = $this->updateCacheProvider($reports->getProviderId());
                $reports->setProviderCache($providerCache);
            }

            $reports->setStatus($reports_status);
            $reports->setFinalDate($currentDate);
            $reports->setCloseReason($reason);

            $reports_type = $reports->getType();

            if ($reports_type == $reports::TYPE_BI) {
                $reports_children = $reports->getOpenedChildren();

                $reports_children_list = array();

                if (!empty($reports_children)) {
                    foreach ($reports_children as $child) {
                        $repository = $this->getDoctrine()->getRepository('TroubleticketBundle:TimeCounters', 'troubleticket');
                        $timeCounterChild = $repository->findOneBy(
                            array('report_id' => $child->getId(),'final_date' => null, 'subcase_id' => null),
                            array('initial_date' => 'DESC')
                        );

                        if (empty($timeCounterChild)) {
                            throw new Exception('Erro de consistência no fechamento de BA, procedimento efetuado pelo fechamendo de BI!');
                        }

                        $child->setIncident($reports->getIncident());
                        $child->setClosedSymptom($reports->getClosedSymptom());
                        $child->setProviderId($reports->getProviderId());
                        $child->setPopId($reports->getPopId());
                        $child->setStructure($reports->getStructure());
                        $child->setElement($reports->getElement());
                        $child->setCause($reports->getCause());
                        $child->setFailureLocal($reports->getFailureLocal());
                        $child->setProblem($reports->getProblem());
                        $child->setSolution($reports->getSolution());

                        $this->solve($child, $timeCounterChild );
                    }
                }
            }

            $time_counters->setFinalDate($currentDate);

            $manager->persist($time_counters);
            $manager->flush();

            $this->createHistory($reports,$history_comment,$currentDate,$reason);

            if ($openBS && $openBS != 'Não') {
                $bsData = array(
                    'circuit_id' => $reports->getCircuitId(),
                    'designation' => $reports->getDesignation(),
                    'stack' => Entity\Reports::STACK_NONE,
                    'type' => Entity\Reports::TYPE_BS,
                    'responsible' => null,
                    'parent_id' => $reports,
                );
                $bs = $this->create($bsData, 'BS Criado');
                if (!$bs) {
                    throw new Exception('Não foi possível criar o BS');
                }

                $bs->setDescription($openBS);

                if (!$this->open($bs, 'BS aberto')) {
                    throw new Exception('Ocorreu um erro ao abrir o BS');
                }
            }

            $this->createTimes($reports);
            $manager->persist($reports);
            $manager->flush();

            $manager->getConnection()->commit();
            if ($reports->getType() == Entity\Reports::TYPE_BA) {
                $mailData = array(
                    'route' => 'fechar',
                    'mail_to' => $reports->getRequesterEmail(),
                    'type' => $reports->getTypeString(),
                    'subject' => sprintf("Troubleticket - Fechamento do %s ", $reports->getCode()),
                    'body' => sprintf("%s foi fechado", $reports->getCode()),
                );

                $this->vogelSendMail($mailData);

                //envio de email para ev e supervisor
                // if ($reports->getCircuitCache() && $reports->getCircuitCache()->getClientId()) {
                //     $clientApi = $this->container->get('troubleticket.client_api');
                //     $clientApi->setUrlPath('cliente/ev/'.$reports->getCircuitCache()->getClientId());
                //     $ev = $clientApi->get();

                //     $ev = reset($ev->evs);

                //     if ($ev) {
                //         //email para o ev
                //         $this->vogelSendMail(array_merge($mailData, array('mail_to' => $ev->email)));

                //         //email para o supervisor do ev
                //         $this->vogelSendMail(array_merge($mailData, array('mail_to' => $ev->supervisor->email)));
                //     }
                // }
            }
        } catch (Exception $e) {
            $manager->getConnection()->rollback();
            throw $e;
        }

        return $reports;
    }

    /**
     * Cancel report
     *
     * @param object Reports
     * @param object TimeCounters
     * @param string $history_comment
     * @access public
     * @return Entity\Reports
     */
    public function cancel(Entity\Reports $reports,Entity\TimeCounters $time_counters)
    {
        $manager = $this->getDoctrine()->getManager('troubleticket');
        $manager->getConnection()->beginTransaction();

        $currentDate = new DateTime;
        $reports_status = Entity\Reports::CANCELADO;
        $history_comment = 'Ba cancelado';

        try {
            $reports->setStatus($reports_status);
            $reports->setFinalDate($currentDate);


            $time_counters->setFinalDate($currentDate);

            $manager->persist($time_counters);
            $manager->flush();

            $this->createTimes($reports);

            $manager->persist($reports);
            $manager->flush();

            $this->createHistory($reports,$history_comment,$currentDate,null);

            $manager->getConnection()->commit();
        } catch (Exception $e) {
            $manager->getConnection()->rollback();
            throw $e;
        }

        return $reports;
    }

    /**
     * Open a report
     *
     * @param Entity\Reports $report
     * @access public
     * @return Entity\Reports
     */
    public function open($report, $comment = null)
    {
        $manager = $this->getDoctrine()->getManager('troubleticket');
        $manager->getConnection()->beginTransaction();
        try {

            $report->setStatus($report::EM_ATENDIMENTO);
            $manager->persist($report);
            $manager->flush();

            $this->createHistory($report, $comment, null, null);

            $this->createTimeCounter($report, $report->getInitialDate());

            $manager->getConnection()->commit();
            if ($report->getType() == Entity\Reports::TYPE_BA) {
                $mailData = array(
                    'route' => 'novo',
                    'mail_to' => $report->getRequesterEmail(),
                    'type' => $report->getTypeString(),
                    'subject' => sprintf("Troubleticket - Novo %s inserido", $report->getTypeString()),
                    'body' => sprintf("%s inserido", $report->getCode()),
                );

                $this->vogelSendMail($mailData);

                //envio de email para ev e supervisor
                // if ($report->getCircuitCache() && $report->getCircuitCache()->getClientId()) {
                //     $clientApi = $this->container->get('troubleticket.client_api');
                //     $clientApi->setUrlPath('cliente/ev/'.$report->getCircuitCache()->getClientId());
                //     $ev = $clientApi->get();

                //     $ev = reset($ev->evs);
                //     if ($ev) {
                //         //email para o ev
                //         $this->vogelSendMail(array_merge($mailData, array('mail_to' => $ev->email)));

                //         //email para o supervisor do ev
                //         $this->vogelSendMail(array_merge($mailData, array('mail_to' => $ev->supervisor->email)));
                //     }
                // }
            }
        } catch (TroubleticketBundleException $e) {
            throw $e;
        } catch (Exception $e) {
            $manager->getConnection()->rollback();
            throw $e;
        }

        return $report;
    }

    /**
     * Create a Time Counter
     *
     * @param Entity\Reports $report
     * @param DateTime $date
     * @access protected
     * @return Entity\TimeCounters
     */
    protected function createTimeCounter($report, $date = null)
    {
        if (is_null($date)) {
            $date = new DateTime;
        }

        $manager = $this->getDoctrine()->getManager('troubleticket');
        $time = new Entity\TimeCounters();
        $time->setReport($report)
            ->setInitialDate($date)
            ->setStack($report->getStack());

        $manager->persist($time);
        $manager->flush();

        return $time;
    }

    /**
     * Cancel report
     *
     * @param object Reports
     * @param object TimeCounters
     * @param string $history_comment
     * @access public
     * @return Entity\Reports
     */
    public function chat(Entity\Reports $report, $message, $userId, $referenceRepository = 'ServicosGcdbBundle:AutUsuarios', $referenceId = 'id', $viewedBy = null)
    {
        $date = new DateTime;

        $manager = $this->getDoctrine()->getManager('troubleticket');
        $messages = new Entity\Messages();
        $messages->setReport($report)
            ->setCreatedAt($date)
            ->setMessage($message)
            ->setUser($userId)
            ->setViewedBy($viewedBy)
            ->setReferenceRepository($referenceRepository)
            ->setReferenceId($referenceId);

        $manager->persist($messages);
        $manager->flush();

        return $messages;
    }

    /**
     * Retorna os boletins para a chamada do app
     *
     * @param type $reportType
     * @param array $circuitsIdList
     * @param integer $page
     * @param integer $limit
     * @param integer $status
     * @return array
     */
    public function getAppReports($reportType, $circuitsIdList = array(), $page = 1, $limit = 10, $status = 1)
    {
        $offset = ($page - 1) * $limit;

        $qb = $this->getDoctrine()->getRepository('TroubleticketBundle:Reports', 'troubleticket')->createQueryBuilder('r');

        $qb->select($qb->expr()->countDistinct('r.id'))
           ->andWhere('r.type = :type')
           ->setParameter('type',$reportType);

        if (!empty($circuitsIdList)) {
            $qb->andWhere($qb->expr()->in('r.circuit_id', ':circuitIdList'))
               ->setParameter('circuitIdList',$circuitsIdList);
        }

        $arStatus = array();
        if ($status == 2) {
            $arStatus = array(
                Entity\Reports::CANCELADO,
                Entity\Reports::FECHADO
            );
        } else {
            $arStatus = array(
                Entity\Reports::EM_ATENDIMENTO,
                Entity\Reports::PAUSADO,
                Entity\Reports::RESOLVIDO
            );
        }
        $qb->andWhere($qb->expr()->in('r.status', ':status'))
               ->setParameter('status',$arStatus);

        $query = $qb->getQuery();
        $countResult = $query->getResult();

        $query = $qb
            ->select('r.id, r.code, r.initial_date, r.circuit_id, r.last_update')
            ->setFirstResult($offset)
            ->setMaxResults($limit)
            ->addOrderBy('r.last_update', 'DESC')
            ->getQuery();
        $result = $query->getResult();

        $result = array(
            'reports' => $result,
            'total' => $countResult[0][1],
            'page' => (int)$page,
            'limit' => (int)$limit
        );

        return $result;
    }

    /**
     * Filter Reports
     *
     * @param mixed report_type
     * @param mixed page
     * @param mixed page_limit
     * @param mixed offset
     * @param mixed reports_id
     * @param mixed circuito_list
     * @param mixed reports_designation
     * @param mixed reports_stack
     * @param mixed reports_initial_date
     * @param mixed reports_status
     * @param mixed reports_final_date
     * @access public
     * @return array $paginator
     */
    public function filter(
        $report_type,
        $page = null,
        $page_limit = null,
        $offset = null,
        $reports_id = null,
        $circuito_list = null,
        $reports_designation = null,
        $reports_stack = null,
        $reports_initial_date = null,
        $reports_status = null,
        $reports_final_date = null,
        $reports_open_subcases = null,
        $reports_severity = null,
        $reports_closed = false,
        $reports_canceled = false,
        $final_client = null,
        $uf = null,
        $client = null,
        $order = null,
        $vip = null,
        $bi_id = null,
        $initial_last_update = null,
        $final_last_update = null,
        $responsible = null
    ) {

        if (empty($page) || !is_int($page) || $page < 1) {
            $page = 1;
        }

        if (empty($page_limit) || !is_int($page_limit) || $page_limit < 1) {
            $page_limit = 10;
        }

        if (empty($offset)) {
            $offset = ($page - 1) * $page_limit;
        }

        $history_repository = $this->getDoctrine()->getRepository('TroubleticketBundle:History', 'troubleticket');
        $repository_reports = $this->getDoctrine()->getRepository('TroubleticketBundle:Reports', 'troubleticket');

        $query_builder = $repository_reports->createQueryBuilder('r');

        $query_builder_and = $query_builder->expr()->andX();
        $query_builder_and->add($query_builder->expr()->eq('r.type',':type'));

        if (!empty($reports_id)) {
            $query_builder_and->add($query_builder->expr()->eq('r.code',':reports_id'));
            $query_builder->setParameter('reports_id', strtoupper($reports_id));
        }

        if (!empty($bi_id)) {
            // $query_builder->join('TroubleticketBundle:Reports', 'p', 'WITH', 'r.parent_id = p.id');
            $query_builder_and->add($query_builder->expr()->eq('p.code',':bi_id'));
            $query_builder->setParameter('bi_id', strtoupper($bi_id));
        }

        if (!empty($circuito_list)) {
            $query_builder_and->add($query_builder->expr()->in('r.circuit_id',':circuito_list'));
            $query_builder->setParameter('circuito_list',$circuito_list);
        }

        if (!empty($reports_designation)) {
            $query_builder_and->add($query_builder->expr()->eq('r.designation',':reports_designation'));
            $query_builder->setParameter('reports_designation',$reports_designation);
        }

        if (!empty($reports_stack) || preg_match('/^([\d])$/',$reports_stack,$matches)) {
            $query_builder_and->add($query_builder->expr()->eq('r.stack',':reports_stack'));
            $query_builder->setParameter('reports_stack',intval($reports_stack));
        }

        if (!empty($reports_initial_date)) {
            $query_builder_and->add('r.initial_date >= :reports_initial_date');
            $query_builder->setParameter('reports_initial_date',vsprintf('%s 00:00:00',array($reports_initial_date)));
        }

        if (!empty($reports_final_date)) {
            $query_builder_and->add('r.initial_date <= :reports_final_date');
            $query_builder->setParameter('reports_final_date',vsprintf('%s 23:59:59',array($reports_final_date)));
        }

        if (!empty($initial_last_update) || !empty($final_last_update)) {
            $query_builder_history = $history_repository->createQueryBuilder('h');
            $query_builder_history->select('rr.id');
            $query_builder_history->innerJoin('h.report_id', 'rr');
            $query_builder_history->andWhere($query_builder->expr()->eq('rr.type',':type'));
            $query_builder_history->groupBy('rr.id');
            if (!empty($initial_last_update)) {
                $query_builder_history->having($query_builder_history->expr()->gte($query_builder_history->expr()->max('h.date'), '\''.$initial_last_update . ' 00:00:00\''));
            }
            if (!empty($final_last_update)) {
                $query_builder_history->andHaving($query_builder_history->expr()->gte('\''.$final_last_update . ' 23:59:59\'', $query_builder_history->expr()->max('h.date')));
            }

            $query_builder_and->add($query_builder->expr()->in('r.id', $query_builder_history->getDQL()));
        }

        if ($reports_closed == true || $reports_canceled == true) {
            $arrayStatuses = array();

            if ($reports_closed == true) {
                $arrayStatuses[] = Entity\Reports::FECHADO;
            }

            if ($reports_canceled == true) {
                $arrayStatuses[] = Entity\Reports::CANCELADO;
            }

            $query_builder_and->add($query_builder->expr()->in('r.status',':reports_status'));
            $query_builder->setParameter('reports_status', $arrayStatuses);

        } else if (!empty($reports_status) || preg_match('/^([\d])$/',$reports_status,$matches)) {
            $query_builder_and->add($query_builder->expr()->eq('r.status',':reports_status'));
            $query_builder->setParameter('reports_status',intval($reports_status));

        } else {
            $query_builder_and->add($query_builder->expr()->in('r.status',':reports_status'));
            $query_builder->setParameter('reports_status',array(Entity\Reports::EM_ATENDIMENTO,Entity\Reports::PAUSADO,Entity\Reports::RESOLVIDO));
        }

        if (!empty($reports_severity) || preg_match('/^([\d])$/', $reports_severity, $matches)) {
            $query_builder_and->add($query_builder->expr()->in('r.symptom',':reports_severity'));
            $query_builder->setParameter('reports_severity',intval($reports_severity));
        }

        // if (!empty($reports_open_subcases)) {
        //     $query_builder_and->add('s.type = :subcases_type');
        //     $query_builder->setParameter('subcases_type',$reports_open_subcases);
        // }
        $query_builder->leftJoin('r.circuitCache', 'c');
        $query_builder->join('TroubleticketBundle:ClientsCache', 'cli', 'WITH', 'c.clientId = cli.id');
        if (!empty($final_client) || !empty($uf) || !empty($client) || !empty($vip)) {
            if (!empty($final_client)) {
                $query_builder_and->add('UPPER(c.finalClient) LIKE :final_client');
                $query_builder->setParameter('final_client', strtoupper("%$final_client%"));
            }
            if (!empty($uf)) {
                $query_builder_and->add('UPPER(c.ufPontaA) LIKE :uf');
                $query_builder->setParameter('uf', strtoupper($uf));
            }

            if (!empty($client) || !empty($vip)) {
                if (!empty($client)) {
                    $query_builder_and->add('UPPER(cli.name) LIKE :client_name');
                    $query_builder->setParameter('client_name', strtoupper("%$client%"));
                }
                if (!empty($vip)) {
                    $query_builder_and->add('UPPER(cli.nivel) LIKE :client_nivel');
                    $query_builder->setParameter('client_nivel', strtoupper("%$vip%"));
                }
            }
        }

        $query_builder->leftJoin('TroubleticketBundle:ColaboratorsCache', 'col', 'WITH', 'CAST(r.responsible as int) = col.id AND TRIM(r.responsible) != \'\'');
        if (!empty($responsible)) {
            $query_builder_and->add('UPPER(col.name) LIKE :col_name');
            $query_builder->setParameter('col_name', strtoupper("%$responsible%"));
        }

        $query_builder
            ->select($query_builder->expr()->countDistinct('r.id'))
            ->leftJoin('r.subcases','s', 'WITH', $query_builder->expr()->not($query_builder->expr()->eq('s.status', ':notStatus')))
            ->setParameter('notStatus', Entity\Subcases::FECHADO)
            ->leftJoin('r.parent','p')
            ->andWhere($query_builder_and)
            ->setParameter('type',$report_type);

        $query = $query_builder->getQuery();

        $result_total_register = $query->getSingleScalarResult();
        if (!empty($order)) {
            foreach ($order as $value) {
                switch ($value['column']) {
                    case 'code': // código BA
                        $query_builder->addOrderBy('r.code', $value['dir']);
                        break;
                    case 'initial_date': //data abertura
                        $query_builder->addOrderBy('r.initial_date', $value['dir']);
                        break;
                    case 'status': //status
                        $query_builder->addOrderBy('r.status', $value['dir']);
                        break;
                    case 'designator': //Designador
                        $query_builder->addOrderBy('r.designation', $value['dir']);
                        break;
                    case 'severity': //Severidade
                        $query_builder->addOrderBy('r.symptom', $value['dir']);
                        break;
                    case 'stack': //fila
                        $query_builder->addOrderBy('r.stack', $value['dir']);
                        break;
                    case 'nivel': //vip
                        $query_builder->addOrderBy('cli.nivel', $value['dir']);
                        $query_builder->addGroupBy('cli');
                        break;
                    case 'uf': //vip
                        $query_builder->addOrderBy('c.ufPontaA', $value['dir']);
                        break;
                    case 'city': //city
                        $query_builder->addOrderBy('c.city', $value['dir']);
                        break;
                    case 'client': //city
                        $query_builder->addOrderBy('cli.name', $value['dir']);
                        $query_builder->addGroupBy('cli');
                        break;
                    case 'final_client': //city
                        $query_builder->addOrderBy('c.finalClient', $value['dir']);
                        break;
                    case 'tme': //city
                        if ($value['dir'] == 'asc') {
                            $sort = 'desc';
                        } else {
                            $sort = 'asc';
                        }
                        $query_builder->addOrderBy('r.initial_date', $sort);
                        break;
                    case 'responsible': //city
                        $query_builder->addOrderBy('col.name', $value['dir']);
                        $query_builder->addGroupBy('col');
                        break;
                    case 'last_update': //city
                        $query_builder->addOrderBy('r.last_update', $value['dir']);
                        break;
                    case 'subcase':
                        $query_builder->addOrderBy('sid', $value['dir']);
                        break;
                    case 'stretch':
                        $query_builder->addOrderBy('r.stretch', $value['dir']);
                        break;
                }
            }
        } else {
            $query_builder->orderBy('r.initial_date','DESC');
        }

        $query = $query_builder
            ->select('r, p, COUNT(s) sid')
            ->addGroupBy('r')
            ->addGroupBy('p')
            ->addGroupBy('c')
            ->setFirstResult($offset)
            ->setMaxResults($page_limit)
            ->getQuery();
        $result_data = $query->getResult();

        $result_data = array_map(function($element){
            return $element[0];
        }, $result_data);

        $page_first = 1;
        $page_last = ceil($result_total_register / $page_limit);

        $page_previous = $page_first;

        if ($page > $page_first) {
            $page_previous = $page - 1;
        }

        $page_next = $page_last;

        if ($page < $page_last) {
            $page_next = $page + 1;
        }

        $circuit_id_list = array();
        $responsibles = array();

        foreach ($result_data as $index => $reports) {
            $circuit_id_list[] = $reports->getCircuitId();
            $responsible = $reports->getResponsible();
            if ($responsible) {
                $responsibles[] = $responsible;
            }
        }

        $circuit_id_listring = vsprintf('[%s]',implode(',',$circuit_id_list));

        $troubleticket_circuit_api = $this->container->get('troubleticket.circuit_api');

        $troubleticket_circuit_api_get = array();

        if (!empty($circuit_id_list)) {
            try {
                $troubleticket_circuit_api_get = $troubleticket_circuit_api->get(null,null,null,null,$circuit_id_listring);

            } catch (TroubleticketBundleException $error) {
                throw new Exception($error->getMEssage());
            }
        }

        $circuito = array();

        if (!empty($troubleticket_circuit_api_get)) {
            $circuito = $troubleticket_circuit_api_get->circuito;
        }

        $colaboradorApi = $this->container->get('troubleticket.colaborador_api');
        $colaboradores = $colaboradorApi->getByIds($responsibles);
        if (!empty($colaboradores->colaborador)) {
            $colaboradores = $colaboradores->colaborador;
        } else {
            $colaboradores = array();
        }

        $client_api = $this->container->get('troubleticket.client_api');

        $client_cid_list = array();

        if (!empty($circuito)) {
            foreach ($circuito as $circuito_data) {
                $client_cid_list[] = $circuito_data->clieCodigoid;
            }
        }

        $client_cid_list_count = count($client_cid_list);

        $client_api_list = array();

        if ($client_cid_list_count > 0) {
            $client_cid_list = vsprintf('[%s]',implode(',',$client_cid_list));

            try {
                $client_api_get = $client_api->get($client_cid_list_count,0,null,null,$client_cid_list);

            } catch (TroubleticketBundleException $error) {
                throw new Exception($error->getMessage());

            }

            if (!empty($client_api_get) && !empty($client_api_get->customer)) {
                $customer_list = $client_api_get->customer;

                foreach ($customer_list as $customer) {
                    $client_api_list[] = array(
                        'customerid' => $customer->customerid,
                        'nomeFantasia' => $customer->nomeFantasia,
                        'vip' => (isset($customer->nivel) ? $customer->nivel : null)
                    );
                }
            }
        }

        $result_data_list = array();


        $yaml_options_sintoma = __DIR__.'/../Resources/config/BA/options_sintoma.yaml';

        $yaml_parser = new Parser();

        $severidade_sintoma = $yaml_parser->parse(file_get_contents($yaml_options_sintoma));

        $router = $this->container->get('router');
        if ($report_type == Entity\Reports::TYPE_BA) {
            $timeExtension = new Twig\TimeExtension;

            foreach ($result_data as $index => $reports) {
                $circuit_id = $reports->getCircuitId();

                $severidade = null;
                if (!is_null($reports->getSymptom())) {
                    $severidade = $severidade_sintoma[$reports->getSymptom()]['severidade'];
                }

                $cliente_nomefantasia = '';
                $circuito_cliente_final_nome = '';
                $circuito_sigla_uf = '';
                $circuito_cidade = '';
                $circuit_vip = '';

                if (!empty($circuito)) {
                    foreach ($circuito as $value) {
                        if ($circuit_id == $value->contCodigoid) {
                            $circuito_sigla_uf = $value->siglaUf;
                            $circuito_cidade = $value->nomeCidade;
                            $circuito_cliente_final_nome = $value->clienteFinal->nome;

                            if (!empty($client_api_list)) {
                                foreach ($client_api_list as $client) {
                                    if ($client['customerid'] == $value->clieCodigoid) {
                                        $cliente_nomefantasia = $client['nomeFantasia'];
                                        $circuit_vip = $client['vip'];
                                    }
                                }
                            }
                        }
                    }
                }

                foreach ($colaboradores as $colaborador) {
                    if ($reports->getResponsible() == $colaborador->id) {
                        $reports->setResponsibleData($colaborador);
                        break;
                    }
                }

                $reports_parent_id = $reports->getParentId();

                $reports_parent_id_btn = '';

                if (!empty($reports_parent_id)) {
                    $reports_parent_id_btn = '<a href="'.$router->generate('troubleticket_bi_main', array('report_id' => $reports_parent_id)).'" class="btn btn-primary" target="_blank" style="color: white">' . $reports->getParent()->getCode(). '</a>';
                }

                $reports_subcase_type_1 = $reports->getOpenSubcaseByType(1);
                $reports_subcase_type_1_status = $reports_subcase_type_1->getStatusString();
                $reports_subcase_type_1 = $reports_subcase_type_1->getId();

                $reports_subcase_type_1_btn = '';

                if (!empty($reports_subcase_type_1)) {
                    $reports_subcase_type_1_btn = '<a href="'.$router->generate('troubleticket_ba_subcase_main', array('subcaseId' => $reports_subcase_type_1)).'" class="btn btn-primary" target="_blank" style="color: white">COC('.$reports_subcase_type_1_status.')</a>';
                }

                $reports_subcase_type_2 = $reports->getOpenSubcaseByType(2);
                $reports_subcase_type_2_status = $reports_subcase_type_2->getStatusString();
                $reports_subcase_type_2 = $reports_subcase_type_2->getId();

                $reports_subcase_type_2_btn = '';

                if (!empty($reports_subcase_type_2)) {
                    $reports_subcase_type_2_btn = '<a href="'.$router->generate('troubleticket_ba_subcase_main', array('subcaseId' => $reports_subcase_type_2)).'" class="btn btn-primary" target="_blank" style="color: white">Maintainer('.$reports_subcase_type_2_status.')</a>';
                }

                $history_last = $history_repository->findOneBy(
                    array('report_id' => $reports->getId()),
                    array('id' => 'DESC'));

                $time = $reports->getTME();
                $tme = $timeExtension->timeFilter($time);

                if ($this->isOverdueTME($time)) {
                    $tme = '<span style="color:red;">'.$tme.'</span>';
                }

                $lastUpdate = $history_last->getDate()->format('d/m/Y H:i:s');
                if ($this->isOverdueLastUpdate($history_last->getDate()->format('U'))) {
                    $lastUpdate = '<span style="color:red;">'.$lastUpdate.'</span>';
                }

                $comment_badge = $this->getCountChatUnviewed($reports->getId());
                $class_bage = ($comment_badge > 0) ? 'badge' : '';

                $data_aux = array(
                    $reports_parent_id_btn,
                    $reports->getCode(),
                    $reports->getInitialDate()->format('d/m/Y H:i:s'),
                    $reports->getResponsible() ? $reports->getResponsibleData()->nome : '',
                    $lastUpdate,
                    $tme,
                    $reports->getStatusString(),
                    $cliente_nomefantasia,
                    $circuito_cliente_final_nome,
                    $circuito_sigla_uf,
                    $circuito_cidade,
                    $reports->getDesignation(),
                    $severidade,
                    $reports->getStackString(),
                    $reports_subcase_type_1_btn.$reports_subcase_type_2_btn,
                    $circuit_vip,
                    '<a href="'.$router->generate('troubleticket_ba_main', array('report_id' => $reports->getId())).'" class="btn btn-primary '.$class_bage.'" target="_blank" style="color: white" data-badge="'.$comment_badge.'">Visualizar</a>'
                );

                $result_data_list[] = $data_aux;
            }

        } else if ($report_type == Entity\Reports::TYPE_BI) {
            foreach ($result_data as $index => $reports) {
                $history_last = $history_repository->findOneBy(
                    array('report_id' => $reports->getId()),
                    array('id' => 'DESC'));

                $circuit_id = $reports->getCircuitId();

                $severidade = null;
                if (!is_null($reports->getSymptom())) {
                    $severidade = $severidade_sintoma[$reports->getSymptom()]['severidade'];
                }

                $cliente_nomefantasia = '';
                $circuito_cliente_final_nome = '';
                $circuito_sigla_uf = '';
                $circuito_cidade = '';

                if (!empty($circuito)) {
                    foreach ($circuito as $value) {
                        if ($circuit_id == $value->contCodigoid) {
                            $circuito_sigla_uf = $value->siglaUf;
                            $circuito_cidade = $value->nomeCidade;
                        }
                    }
                }

                foreach ($colaboradores as $colaborador) {
                    if ($reports->getResponsible() == $colaborador->id) {
                        $reports->setResponsibleData($colaborador);
                        break;
                    }
                }

                $reports_subcase_type_1 = $reports->getSubcaseByType(1);
                $reports_subcase_type_1_status = $reports_subcase_type_1->getStatusString();
                $reports_subcase_type_1 = $reports_subcase_type_1->getId();

                $reports_subcase_type_1_btn = '';

                if (!empty($reports_subcase_type_1)) {
                    $reports_subcase_type_1_btn = '<a href="'.$router->generate('troubleticket_bi_subcase_main', array('subcaseId' => $reports_subcase_type_1)).'" class="btn btn-primary" target="_blank" style="color: white">COC('.$reports_subcase_type_1_status.')</a>';
                }

                $reports_subcase_type_2 = $reports->getSubcaseByType(2);
                $reports_subcase_type_2_status = $reports_subcase_type_2->getStatusString();
                $reports_subcase_type_2 = $reports_subcase_type_2->getId();

                $reports_subcase_type_2_btn = '';

                if (!empty($reports_subcase_type_2)) {
                    $reports_subcase_type_2_btn = '<a href="'.$router->generate('troubleticket_bi_subcase_main', array('subcaseId' => $reports_subcase_type_2)).'" class="btn btn-primary" target="_blank" style="color: white">Maintainer('.$reports_subcase_type_2_status.')</a>';
                }

                $incidentes_url = $router->generate('troubleticket_bi_related_ba', array('report_id' => $reports->getId()), true);

                $data_aux = array(
                    $reports->getCode(),
                    $reports->getStatusString(),
                    $reports->getInitialDate()->format('d/m/Y H:i:s'),
                    $reports->getResponsible() ? $reports->getResponsibleData()->nome : '',
                    $history_last->getDate()->format('d/m/Y H:i:s'),
                    $circuito_sigla_uf,
                    $circuito_cidade,
                    $reports->getStretch(),
                    $reports_subcase_type_1_btn.$reports_subcase_type_2_btn,
                    '<a href="'.$incidentes_url.'" target="_blank"><button class="btn btn-primary">Visualizar incidentes</button></a>',
                    '<a href="'.$router->generate('troubleticket_bi_main', array('report_id' => $reports->getId())).'" class="btn btn-primary" target="_blank" style="color: white">Visualizar</a>',
                    $reports->getId()
                );

                $result_data_list[] = $data_aux;
            }
        }

        $paginator = array(
            'page' => $page,
            'page_limit' => $page_limit,
            'page_first' => $page_first,
            'page_last' => $page_last,
            'page_previous' => $page_previous,
            'page_next' => $page_next,
            'data_total' => $result_total_register,
            // 'data_object' => $result_data,
            'data_list' => $result_data_list);

        return $paginator;
    }

    public function getQtBaOpen()
    {
        $history_repository = $this->getDoctrine()->getRepository('TroubleticketBundle:History', 'troubleticket');
        $repository_reports = $this->getDoctrine()->getRepository('TroubleticketBundle:Reports', 'troubleticket');

        $query_builder = $repository_reports->createQueryBuilder('r');

        $query_builder_and = $query_builder->expr()->andX();
        $query_builder_and->add($query_builder->expr()->eq('r.type',':type'));

        $query_builder_and->add($query_builder->expr()->in('r.status',':reports_status'));
        $query_builder->setParameter('reports_status',array(Entity\Reports::EM_ATENDIMENTO,Entity\Reports::PAUSADO,Entity\Reports::RESOLVIDO));

        $query_builder->leftJoin('r.circuitCache', 'c');
        $query_builder->join('TroubleticketBundle:ClientsCache', 'cli', 'WITH', 'c.clientId = cli.id');
        $query_builder->leftJoin('TroubleticketBundle:ColaboratorsCache', 'col', 'WITH', 'CAST(r.responsible as int) = col.id AND TRIM(r.responsible) != \'\'');

        $query_builder->select($query_builder->expr()->countDistinct('r.id'))
                     ->leftJoin('r.subcases','s', 'WITH', $query_builder->expr()->not($query_builder->expr()->eq('s.status', ':notStatus')))
                     ->setParameter('notStatus', Entity\Subcases::FECHADO)
                     ->leftJoin('r.parent','p')
                     ->andWhere($query_builder_and)
                     ->setParameter('type', Entity\Reports::TYPE_BA);

        $query = $query_builder->getQuery();
        return $query->getSingleScalarResult();
    }

    /**
     * filterBaRelatedBi
     *
     * @param mixed $report
     * @param mixed $page
     * @param mixed $page_limit
     * @param mixed $offset
     * @param mixed $reports_designation
     * @param mixed $reports_stack
     * @param mixed $reports_id
     * @param mixed $reports_responsible
     * @param mixed $reports_status
     * @access public
     * @return null
     */
    public function filterBaRelatedBi($report,$page = null,$page_limit = null,$offset = null,$reports_designation = null,$reports_stack = null,$reports_id = null,$reports_responsible = null,$reports_status = null)
    {
        if (empty($page) || !is_int($page) || $page < 1) {
            $page = 1;
        }

        if (empty($page_limit) || !is_int($page_limit) || $page_limit < 1) {
            $page_limit = 10;
        }

        if (empty($offset)) {
            $offset = ($page - 1) * $page_limit;
        }

        $repository_reports = $this->getDoctrine()->getRepository('TroubleticketBundle:Reports', 'troubleticket');

        $query_builder = $repository_reports->createQueryBuilder('r');

        $query_builder_and = $query_builder->expr()->andX();
        $query_builder_and->add($query_builder->expr()->eq('r.type',':type'));
        $query_builder_and->add($query_builder->expr()->eq('r.parent_id',':parent_id'));

        if (!empty($reports_id)) {
            $query_builder_and->add($query_builder->expr()->eq('r.id',':reports_id'));
            $query_builder->setParameter('reports_id', (int)$reports_id);
        }

        if (!empty($reports_designation)) {
            $query_builder_and->add($query_builder->expr()->eq('r.designation',':reports_designation'));
            $query_builder->setParameter('reports_designation',$reports_designation);
        }

        if (!empty($reports_stack) || preg_match('/^([\d])$/',$reports_stack,$matches)) {
            $query_builder_and->add($query_builder->expr()->eq('r.stack',':reports_stack'));
            $query_builder->setParameter('reports_stack',intval($reports_stack));
        }

        if (!empty($reports_responsible)) {
            $colaboradorApi = $this->container->get('troubleticket.colaborador_api');
            $colaborador_api_get = $colaboradorApi->get(1,0,null,$reports_responsible);

            if (!empty($colaborador_api_get->colaborador)) {
                $colaborador_api_get = $colaborador_api_get->colaborador;
                $colaborador_api_list = array();

                foreach ($colaborador_api_get as $colaborador_api) {
                    $colaborador_api_list[] = $colaborador_api->id;
                }

            } else {
                $colaborador_api_list = array();
            }

            $query_builder_and->add($query_builder->expr()->in('r.responsible',':reports_responsible'));
            $query_builder->setParameter('reports_responsible',$colaborador_api_list);
        }

        if (!empty($reports_status) || preg_match('/^([\d])$/',$reports_status,$matches)) {
            $query_builder_and->add($query_builder->expr()->eq('r.status',':reports_status'));
            $query_builder->setParameter('reports_status',intval($reports_status));

        } else {
            $query_builder_and->add($query_builder->expr()->in('r.status',':reports_status'));
            $query_builder->setParameter('reports_status',array(Entity\Reports::EM_ATENDIMENTO,Entity\Reports::PAUSADO,Entity\Reports::RESOLVIDO));
        }

        $query_builder
            ->select('count(r.id)')
            ->andWhere($query_builder_and)
            ->setParameter('type',Entity\Reports::TYPE_BA)
            ->setParameter('parent_id',$report->getId());

        $query = $query_builder->getQuery();

        $result_total_register = $query->getSingleScalarResult();

        $query = $query_builder
            ->select(array('r','p','s'))
            ->leftJoin('r.parent','p')
            ->leftJoin('r.subcases','s')
            ->orderBy('r.status','ASC')
            ->setFirstResult($offset)
            ->setMaxResults($page_limit)
            ->getQuery();

        $result_data = $query->getResult();

        $page_first = 1;
        $page_last = ceil($result_total_register / $page_limit);

        $page_previous = $page_first;

        if ($page > $page_first) {
            $page_previous = $page - 1;
        }

        $page_next = $page_last;

        if ($page < $page_last) {
            $page_next = $page + 1;
        }

        $responsibles = array();
        $circuit_id_list = array();

        foreach ($result_data as $reports) {
            $circuit_id_list[] = $reports->getCircuitId();

            $responsible = $reports->getResponsible();

            if ($responsible) {
                $responsibles[] = $responsible;
            }
        }

        $circuit_id_listring = vsprintf('[%s]',implode(',',$circuit_id_list));

        $troubleticket_circuit_api = $this->container->get('troubleticket.circuit_api');

        $troubleticket_circuit_api_get = array();

        if (!empty($circuit_id_list)) {
            try {
                $troubleticket_circuit_api_get = $troubleticket_circuit_api->get(null,null,null,null,$circuit_id_listring);

            } catch (TroubleticketBundleException $error) {
                throw new Exception($error->getMEssage());
            }
        }

        $circuito = array();

        if (!empty($troubleticket_circuit_api_get)) {
            $circuito = $troubleticket_circuit_api_get->circuito;
        }

        $colaboradorApi = $this->container->get('troubleticket.colaborador_api');
        $colaboradores = $colaboradorApi->getByIds($responsibles);

        if (!empty($colaboradores->colaborador)) {
            $colaboradores = $colaboradores->colaborador;

        } else {
            $colaboradores = array();
        }

        $client_api = $this->container->get('troubleticket.client_api');

        $client_cid_list = array();

        if (!empty($circuito)) {
            foreach ($circuito as $circuito_data) {
                $client_cid_list[] = $circuito_data->clieCodigoid;
            }
        }

        $client_cid_list_count = count($client_cid_list);

        $client_api_list = array();

        if ($client_cid_list_count > 0) {
            $client_cid_list = vsprintf('[%s]',implode(',',$client_cid_list));

            try {
                $client_api_get = $client_api->get($client_cid_list_count,0,null,null,$client_cid_list);

            } catch (TroubleticketBundleException $error) {
                throw new Exception($error->getMessage());

            }

            if (!empty($client_api_get) && !empty($client_api_get->customer)) {
                $customer_list = $client_api_get->customer;

                foreach ($customer_list as $customer) {
                    $client_api_list[] = array(
                        'customerid' => $customer->customerid,
                        'nomeFantasia' => $customer->nomeFantasia);
                }
            }
        }

        $result_data_list = array();

        foreach ($result_data as $reports) {
            $circuit_id = $reports->getCircuitId();

            $history_repository = $this->getDoctrine()->getRepository('TroubleticketBundle:History', 'troubleticket');
            $history_last = $history_repository->findOneBy(
                array('report_id' => $reports->getId()),
                array('id' => 'DESC'));

            $circuito_sigla_uf = '';
            $cliente_nomefantasia = '';
            $circuito_cliente_final_nome = '';

            if (!empty($circuito)) {
                foreach ($circuito as $value) {
                    if ($circuit_id == $value->contCodigoid) {
                        $circuito_sigla_uf = $value->siglaUf;
                        $circuito_cliente_final_nome = $value->clienteFinal->nome;

                        if (!empty($client_api_list)) {
                            foreach ($client_api_list as $client) {
                                if ($client['customerid'] == $value->clieCodigoid) {
                                    $cliente_nomefantasia = $client['nomeFantasia'];
                                }
                            }
                        }
                    }
                }
            }

            foreach ($colaboradores as $colaborador) {
                if ($reports->getResponsible() == $colaborador->id) {
                    $reports->setResponsibleData($colaborador);

                    break;
                }
            }

            $data_aux = array(
                '<input type="checkbox" class="input_ba_related" value="'.$reports->getId().'"/>',
                $reports->getCode(),
                $cliente_nomefantasia,
                $circuito_sigla_uf,
                $reports->getResponsible() ? $reports->getResponsibleData()->nome : '',
                $reports->getDesignation(),
                $reports->getStackString(),
                $reports->getStatusString(),
                $history_last->getComment(),
                '<button type="button" class="btn btn-primary btn_ba_main" data-id="'.$reports->getId().'">Visualizar</button>');

            $result_data_list[] = $data_aux;
        }

        $paginator = array(
            'page' => $page,
            'page_limit' => $page_limit,
            'page_first' => $page_first,
            'page_last' => $page_last,
            'page_previous' => $page_previous,
            'page_next' => $page_next,
            'data_total' => $result_total_register,
            'data_list' => $result_data_list);

        return $paginator;
    }

    /**
     * Envia um boletim para a fila de SN1
     *
     * @param Entity\Reports $report
     * @access public
     * @return Entity\Reports
     */
    public function sendToSn1(Entity\Reports $report)
    {
        if (!$report->canSendToSN1()) {
            return false;
        }

        if ($report->getStack() != $report::STACK_SN1) {
            $manager = $this->getDoctrine()->getManager('troubleticket');
            $manager->beginTransaction();
            try {

                $report->setStack($report::STACK_SN1);
                $report->setResponsible(null);

                $manager->persist($report);
                $manager->flush();

                if (!$report->hasOpenedSubcases()) {
                    $time = $this->closeLastTime($report);
                    $this->createTimeCounter($report, $time->getFinalDate());
                }
                $this->createHistory($report, 'Enviado para fila SN1');
                $manager->commit();
            } catch (Exception $e) {
                $manager->rollback();
                throw $e;
            }
        }

        return $report;
    }

    /**
     * Envia um boletim para a fila de SN2
     *
     * @param Entity\Reports $report
     * @access public
     * @return Entity\Reports
     */
    public function sendToSn2(Entity\Reports $report)
    {
        if (!$report->canSendToSN2()) {
            return false;
        }

        if ($report->getStack() != $report::STACK_SN2) {
            $manager = $this->getDoctrine()->getManager('troubleticket');
            $manager->beginTransaction();
            try {

                $report->setStack($report::STACK_SN2);
                $report->setResponsible(null);

                $manager->persist($report);
                $manager->flush();

                if (!$report->hasOpenedSubcases()) {
                    $time = $this->closeLastTime($report);
                    $this->createTimeCounter($report, $time->getFinalDate());
                }
                $this->createHistory($report, 'Enviado para fila SN2');
                $manager->commit();
            } catch (Exception $e) {
                $manager->rollback();
                throw $e;
            }
        }

        return $report;
    }

    /**
     * Envia um boletim para a fila de SN3
     *
     * @param Entity\Reports $report
     * @access public
     * @return Entity\Reports
     */
    public function sendToSn3(Entity\Reports $report)
    {
        if (!$report->canSendToSN3()) {
            return false;
        }

        if ($report->getStack() != $report::STACK_SN3) {
            $manager = $this->getDoctrine()->getManager('troubleticket');
            $manager->beginTransaction();
            try {

                $report->setStack($report::STACK_SN3);
                $report->setResponsible(null);

                $manager->persist($report);
                $manager->flush();

                if (!$report->hasOpenedSubcases()) {
                    $time = $this->closeLastTime($report);
                    $this->createTimeCounter($report, $time->getFinalDate());
                }
                $this->createHistory($report, 'Enviado para fila SN3');
                $manager->commit();
            } catch (Exception $e) {
                $manager->rollback();
                throw $e;
            }
        }

        return $report;
    }

    /**
     * Envia um boletim para a fila de SN3
     *
     * @param Entity\Reports $report
     * @access public
     * @return Entity\Reports
     */
    public function sendToVoz(Entity\Reports $report)
    {
        if (!$report->canSendToVoz()) {
            return false;
        }

        if ($report->getStack() != $report::STACK_VOZ) {
            $manager = $this->getDoctrine()->getManager('troubleticket');
            $manager->beginTransaction();
            try {

                $report->setStack($report::STACK_VOZ);
                $report->setResponsible(null);

                $manager->persist($report);
                $manager->flush();

                if (!$report->hasOpenedSubcases()) {
                    $time = $this->closeLastTime($report);
                    $this->createTimeCounter($report, $time->getFinalDate());
                }
                $this->createHistory($report, 'Enviado para fila Voz');
                $manager->commit();
            } catch (Exception $e) {
                $manager->rollback();
                throw $e;
            }
        }

        return $report;
    }

    /**
     * Envia um boletim para a fila de SN2
     *
     * @param Entity\Reports $report
     * @access public
     * @return Entity\Reports
     */
    public function changeStack(Entity\Reports $report, $stack)
    {
        $return = false;
        switch ($stack) {
            case $report::STACK_SN1:
                $return = $this->sendToSn1($report);
                break;
            case $report::STACK_SN2:
                $return = $this->sendToSn2($report);
                break;
            case $report::STACK_SN3:
                $return = $this->sendToSn3($report);
                break;
            case $report::STACK_VOZ:
                $return = $this->sendToVoz($report);
                break;
        }

        return $return;
    }

    /**
     * Fecha o ultimo tempo aberto
     *
     * @param Entity\Reports $report
     * @access public
     * @return Entity\TimeCounters
     */
    public function closeLastTime(Entity\Reports $report)
    {
        $repository = $this->getDoctrine()->getRepository('TroubleticketBundle:TimeCounters', 'troubleticket');
        $time = $repository->findOneBy(array('report_id' => $report->getId(), 'final_date' => null));

        $time->setFinalDate(new DateTime);
        $manager = $this->getDoctrine()->getManager('troubleticket');
        $manager->persist($time);
        $manager->flush();

        return $time;

    }

    /**
     * Realiza um comentário no boletim
     *
     * @param Entity\Reports $report
     * @param mixed $comment
     * @access public
     * @return Entity\Reports
     */
    public function comment(Entity\Reports $report, $comment)
    {
        if (!$report->canComment()) {
            return false;
        }

        $manager = $this->getDoctrine()->getManager('troubleticket');
        $manager->beginTransaction();
        try {
            $this->createHistory($report, $comment);
            $manager->commit();
        } catch (Exception $e) {
            $manager->rollback();
            throw $e;
        }

        return $report;
    }

    /**
     * Vincula um boletim a um BI
     *
     * @param Entity\Reports $report
     * @param mixed $biId
     * @access public
     * @return Entity\Reports
     */
    public function linkToBi(Entity\Reports $report, $biId)
    {
        if (!$report->canLinkToBi()) {
            return false;
        }
        $manager = $this->getDoctrine()->getManager('troubleticket');
        $repository = $this->getDoctrine()->getRepository('TroubleticketBundle:Reports', 'troubleticket');
        $bi = $repository->findOneBy(array(
            'id' => $biId,
            'type' => Entity\Reports::TYPE_BI
        ));

        if (!$bi) {
            return false;
        }

        $report->setParent($bi);

        $manager->beginTransaction();
        try {
            $manager->persist($report);
            $manager->flush();
            $comment = sprintf('Vinculado ao %s - %s', $bi->getCode(), $bi->getDesignation());
            $this->createHistory($report, $comment);
            $manager->commit();
        } catch (Exception $e) {
            $manager->rollback();
        }

        return $report;
    }

    /**
     * Desvincula um boletim de um BI
     *
     * @param Entity\Reports $report
     * @access public
     * @return Entity\Reports
     */
    public function unlinkBi(Entity\Reports $report)
    {
        if (!$report->canLinkToBi()) {
            return false;
        }

        $manager = $this->getDoctrine()->getManager('troubleticket');

        $oldBi = $report->getParent();

        $report->setParent(null);

        $manager->beginTransaction();
        try {
            $manager->persist($report);
            $manager->flush();
            $comment = sprintf('Removido o vinculo com o %s - %s', $oldBi->getCode(), $oldBi->getDesignation());
            $this->createHistory($report, $comment);
            $manager->commit();
        } catch (Exception $e) {
            $manager->rollback();
        }

        return $report;
    }

    /**
     * Assume a reponsabilidade por um boletim
     *
     * @param Entity\Reports $report
     * @param mixed $userId
     * @access public
     * @return Entity\Reports
     */
    public function takeOn(Entity\Reports $report, $userId)
    {
        if (!$report->canTakeOn()) {
            return false;
        }

        if ($report->getResponsible() != $userId) {
            $manager = $this->getDoctrine()->getManager('troubleticket');
            $report->setResponsible($userId);

            $report_stack = $report->getStack();

            if ($report_stack == Entity\Reports::STACK_SN1) {
                $report->setSn1($userId);
            } else if ($report_stack == Entity\Reports::STACK_SN2) {
                $report->setSn2($userId);
            } else if ($report_stack == Entity\Reports::STACK_SN3) {
                $report->setSn3($userId);
            } else if ($report_stack == Entity\Reports::STACK_VOZ) {
                $report->setVoz($userId);
            }

            $manager->beginTransaction();
            try {
                $manager->persist($report);
                $manager->flush();

                $comment = sprintf('%s assumido por %s - %d', $report->getTypeString(), $this->getResponsibleData($report)->nome, $userId);
                $this->createHistory($report, $comment);
                $manager->commit();
            } catch (Exception $e) {
                $manager->rollback();
                throw $e;
            }
        }

        return $report;
    }

    /**
     * Get responsible data
     *
     * @return string
     */
    public function getResponsibleData(Entity\Reports $report)
    {
        $this->loadResponsibleData($report);
        return $report->getResponsibleData();
    }

    /**
     * Carrega os dados do responsável no boletim
     *
     * @param Entity\Reports $report
     * @access public
     * @return $this
     */
    public function loadResponsibleData(Entity\Reports $report)
    {
        if ($report->getResponsible() && !$report->getResponsibleData()) {
            $api = $this->container->get('troubleticket.colaborador_api');
            $api->setUrlPath('colaborador/'.$report->getResponsible());
            $data = $api->get(1);
            if ($data && $data->msg == 'ok') {
                $report->setResponsibleData($data->colaborador);
            }
        }
        return $this;
    }

    /**
     * Obtem os dados da fila de BS
     *
     * @param int $limit
     * @param int $offset
     * @param array $filters
     * @access public
     * @return array
     */
    public function getBSStack($limit, $offset, array $filters = array())
    {
        $repository = $this->getDoctrine()->getRepository('TroubleticketBundle:Reports', 'troubleticket');

        $builder = $repository->createQueryBuilder('r');

        $where = $builder->expr()->andX();
        $where
            ->add('r.status = :status')
            ->add('r.type = :type');

        $parameters = array(
            'status' => Entity\Reports::EM_ATENDIMENTO,
            'type'   => Entity\Reports::TYPE_BS,
        );

        foreach ($filters as $filter => $value) {
            switch ($filter) {
                case 'cid':
                    $api = $this->container->get('troubleticket.circuit_api');
                    $data = $api->getAll(array('cid' => $value), array('limit' => 500));
                    $circuits = array_map(function($a) {
                        return $a->contCodigoid;
                    }, $data);
                    $where->add('r.circuit_id IN(:circuits)');
                    $parameters['circuits'] = $circuits;
                    break;
                case 'initial_date':
                    $where->add('r.initial_date >= :initial_date');
                    $parameters['initial_date'] = $value;
                    break;
                case 'final_date':
                    $where->add('r.initial_date <= :final_date');
                    $parameters['final_date'] = vsprintf('%s 23:59:59',array($value));
                    break;
                case 'id':
                    $where->add('r.code = :code');
                    $parameters['code'] = strtoupper($value);
                    break;
                default:
                    $where->add("r.$filter = :$filter");
                    $parameters[$filter] = $value;
            }
        }

       $builder
            ->where($where)
            ->setParameters($parameters);

        $countBuilder = clone $builder;
        $total = $countBuilder->select('COUNT(r.id)')->getQuery()->getSingleScalarResult();

        $builder
            ->setFirstResult($offset)
            ->setMaxResults($limit)
            ->orderBy('r.initial_date', 'DESC');

        $reports = $builder->getQuery()->getResult();

        $responsibles = array();
        foreach ($reports as $report) {
            $responsible = $report->getResponsible();
            if (!empty($responsible)) {
                $responsibles[$responsible] = $responsible;
            }
        }

        $colaboradorApi = $this->container->get('troubleticket.colaborador_api');
        $colaboradores = $colaboradorApi->getByIds($responsibles);
        if ($colaboradores) {
            $colaboradores = $colaboradores->colaborador;
        } else {
            $colaboradores = array();
        }

        $router = $this->container->get('router');

        $result = array(
            'reports' => array(),
            'total' => $total,
        );
        foreach ($reports as $report)
        {
            $parent = null;
            $responsibleName = '';
            if ($report->getResponsible()) {
                foreach ($colaboradores as $colaborador) {
                    if ($report->getResponsible() == $colaborador->id) {
                        $responsibleName = $colaborador->nome;
                        break;
                    }
                }
            }
            if (!is_null($report->getParent())) {
                $parent = $router->generate('troubleticket_'.strtolower($report->getParent()->getTypeString()).'_main', array('report_id' => $report->getParent()->getId()), true);
                $parent = "<a href=\"".$parent."\" target=\"_blank\">
                                    <button class=\"btn btn-primary full-width\">Visualizar ".$report->getParent()->getCode()."</button>
                                </a>";
            }
            $result['reports'][] = array(
                $report->getCode(),
                $report->getStatusString(),
                $report->getDescription(),
                $report->getDesignation(),
                $responsibleName,
                $report->getInitialDate()->format('d/m/Y H:i:s'),
                $parent,
                '<a href="'.$router->generate('troubleticket_bs_main', array('id' => $report->getId())).'" class="btn btn-primary" target="_blank" style="color: white">Visualizar</a>'
            );
        }
        return $result;
    }

    /**
     * Create a history
     *
     * @param Entity\Reports $report
     * @param string $comment
     * @param DateTime $date
     * @access protected
     * @return Entity\History
     */
    public function createHistory($report, $comment, $date = null, $reason = null)
    {
        if (is_null($date)) {
            $date = new DateTime;
        }

        $manager = $this->getDoctrine()->getManager('troubleticket');
        $history = new Entity\History();
        $history->setReportId($report)
            ->setDate($date)
            ->setComment($comment)
            ->setReportStatus($report->getStatus())
            ->setUsuario((isset($_SESSION) ? $_SESSION['usr_codigoid'] : null));

        if ($report->getType() == $report::TYPE_BI) {
            $children = $report->getChildren();
            foreach ($children as $child) {
                $this->createHistory($child, "Ação realizada pelo ({$report->getCode()}) associado: $comment");
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
     * Obtem os dados de configuração dos BSs
     *
     * @param bool $asArray
     * @access public
     * @return mixed
     */
    public function getBSConfigs($asArray = true)
    {
        $repository = $this->getDoctrine()->getRepository('TroubleticketBundle:Configs', 'troubleticket');
        $data = $repository->findAll();
        $result = $data;
        if ($asArray) {
            $result = array();
            foreach ($data as $config) {
                $result[$config->getName()] = $config->getValue();
            }
        }
        return $result;
    }

    /**
     * Salva as configurações de BS
     *
     * @param mixed $data
     * @access public
     * @return bool
     */
    public function saveBSConfig($data)
    {
        $configs = $this->getBSConfigs(false);
        $manager = $this->getDoctrine()->getManager('troubleticket');
        $manager->getConnection()->beginTransaction();
        foreach ($configs as $config) {
            foreach ($data as $key => $value) {
                if ($config->getName() == $key) {
                    $config->setValue($value);
                    $manager->persist($config);
                    $manager->flush();
                    unset($data[$key]);
                    break;
                }
            }
        }
        $manager->getConnection()->commit();

        return true;
    }

    /**
     * Cria os contadores do boletim
     *
     * @param Entity\Reports $report
     * @access protected
     * @return $this
     */
    protected function createTimes(Entity\Reports $report)
    {
        $initialDate = $report->getInitialDate();
        $finalDate = $report->getfinalDate();
        $times = array(
            'tme_counter' => $finalDate->getTimestamp() - $initialDate->getTimestamp(),
            'paused_counter' => 0,
            'solved_counter' => 0,
            'tmr_counter' => 0,
            'noc_counter' => 0,
            'sn1_counter' => 0,
            'sn2_counter' => 0,
            'sn3_counter' => 0,
            'voz_counter' => 0,
            'coc_counter' => 0,
            'displacement_counter' => 0,
            'infra_counter' => 0,
            'field_counter' => 0,
            'client_counter' => 0,
        );
        $repository = $this->getDoctrine()->getRepository('TroubleticketBundle:TimeCounters', 'troubleticket');
        $builder = $repository->createQueryBuilder('tc');
        $builder->select(array('tc', 's'));
        $builder->leftJoin('tc.subcase', 's');
        $builder->where('tc.report_id = :id');
        $builder->setParameter('id', $report->getId());

        $timeCounters = $builder->getQuery()->getResult();

        foreach ($timeCounters as $timeCounter) {
            $initialDate = $timeCounter->getInitialDate();
            $finalDate = $timeCounter->getfinalDate();

            $subcase = $timeCounter->getSubcase();

            $diff = $finalDate->getTimestamp() - $initialDate->getTimestamp();

            if ($subcase) {
                if ($subcase->getType() == $subcase::TYPE_COC) {
                    if ($timeCounter->getSubcaseStatus() != $subcase::PAUSADO) {
                        $times['coc_counter'] += $diff;
                        switch($timeCounter->getSubcaseStatus()) {
                            case $subcase::EM_DESLOCAMENTO:
                                $times['displacement_counter'] += $diff;
                                break;
                            case $subcase::EM_ATENDIMENTO_INFRA:
                                $times['infra_counter'] += $diff;
                                break;
                            case $subcase::EM_ATENDIMENTO_CAMPO:
                                $times['field_counter'] += $diff;
                                break;
                            case $subcase::EM_ATENDIMENTO_CLIENTE:
                                $times['client_counter'] += $diff;
                                break;
                        }
                    }
                }
            } else {
                if ($timeCounter->getReportStatus() == $report::EM_ATENDIMENTO) {
                    $times['tmr_counter'] += $diff;
                    if ($timeCounter->getStack() == $report::STACK_SN1) {
                        $times['sn1_counter'] += $diff;
                        $times['noc_counter'] += $diff;
                    } else if ($timeCounter->getStack() == $report::STACK_SN2) {
                        $times['sn2_counter'] += $diff;
                        $times['noc_counter'] += $diff;
                    } else if ($timeCounter->getStack() == $report::STACK_SN3) {
                        $times['sn3_counter'] += $diff;
                        $times['noc_counter'] += $diff;
                    } else if ($timeCounter->getStack() == $report::STACK_VOZ) {
                        $times['voz_counter'] += $diff;
                        $times['noc_counter'] += $diff;
                    }
                } else if ($timeCounter->getReportStatus() == $report::PAUSADO) {
                    $times['paused_counter'] += $diff;
                } else if ($timeCounter->getReportStatus() == $report::RESOLVIDO) {
                    $times['solved_counter'] += $diff;
                }
            }
        }
        $report->setTimes($times);

        return $this;
    }

    /**
     * Verifica se os filhos de um boletim possuem sub casos abertos
     *
     * @param Entity\Reports $report
     * @access public
     * @return bool
     */
    public function childrenHasOpenedSubcases($report) {
        $repository = $this->getDoctrine()->getRepository('TroubleticketBundle:Subcases', 'troubleticket');
        $builder = $repository->createQueryBuilder('s');
        $builder
            ->select('COUNT(s.id)')
            ->join('s.report_id', 'r');
        $parameters = array(
            'parent' => $report->getId(),
            'status' => Entity\Subcases::FECHADO,
        );
        $where = $builder->expr()->andX();
        $where->add('r.parent_id = :parent')
            ->add('s.status != :status');
        $builder->setParameters($parameters);

        return (bool)$builder->where($where)->getQuery()->getSingleScalarResult();
    }

    /**
     * Stores a mail into vogel send mail stack in the DB
     *
     * @access public
     */
    public function vogelSendMail($mailData)
    {
        $entityLuma = $this->getDoctrine()->getManager('luma');

        $entityLuma->getConnection()->beginTransaction();

        try {
            $objEmail = new EntitiesLuma\Email;

            $objEmail->setEmailAssunto($mailData['subject']);
            $objEmail->setEmailCorpo($mailData['body']);
            $objEmail->setEmailDataenvio(new DateTime());
            $objEmail->setEmailDatainc(new DateTime());
            $objEmail->setEmailDe('sistemas@stech.net.br');
            $objEmail->setEmailPagina(strtolower($mailData['type']).'/'.$mailData['route']);
            $objEmail->setEmailPara($mailData['mail_to']);
            $objEmail->setEmailIdoperacao(1);
            $objEmail->setEmailTipooperacao(strtolower($mailData['type']).'_troubleticket');
            $objEmail->setTipoCodigoid(54); //pendente
            $objEmail->setEmailPrioridade(10); //default

            $entityLuma->persist($objEmail);
            $entityLuma->flush();
            $entityLuma->getConnection()->commit();
        } catch (Exception $e) {
            $entityLuma->getConnection()->rollback();
            throw $e;
        }
    }

    public function isOverdueTME($time)
    {
        $limit = $this->container->getParameter('troubleticket_overdue_limit');

        return (strtotime('+'.$limit.' hours') - strtotime('now')) <= $time;
    }

    public function isOverdueLastUpdate($time)
    {
        // $limit = $this->container->getParameter('troubleticket_overdue_last_update');

        return (strtotime('+30 minutes') - strtotime('now')) <= (strtotime('now') - $time);
    }

    public function getAllVIP()
    {
        $stQuery = '
            SELECT DISTINCT UPPER(nivel) AS nivel
              FROM troubleticket.clients_cache
          ORDER BY nivel
        ';

        $manager = $this->getDoctrine()->getManager('troubleticket');
        $query = $manager->getConnection()->prepare($stQuery);
        $query->execute();

        $result = array();
        while ($row = $query->fetch(\PDO::FETCH_ASSOC)) {
            if ($row['nivel']) {
                $result[] = $row['nivel'];
            }
        }

        return $result;
    }

    /**
     * Checks if a ticket is already opened for a certain designation
     *
     * @param string $designation
     * @access public
     * @return Entity\Reports
     */
    public function designationHasOpenedTickets($designation, $type)
    {
        $repository = $this->getDoctrine()->getRepository('TroubleticketBundle:Reports', 'troubleticket');
        $qb = $repository->createQueryBuilder('r');
        $qb->select($qb->expr()->count('r.id'));
        $qb->where('r.designation = :designation')
           ->setParameter('designation', $designation)
           ->andWhere('r.type = :type')
           ->setParameter('type', $type)
           ->andWhere($qb->expr()->notIn('r.status', ':status'))
           ->setParameter('status', array(Entity\Reports::FECHADO, Entity\Reports::INATIVO, Entity\Reports::CANCELADO));
        $tickets = $qb->getQuery()->getResult();
        $ticketsCount = reset($tickets[0]);

        if ($ticketsCount > 0) {
            return true;
        }
        return false;
    }

    /**
     * Return the number of unviewed chat by report
     *
     * @param string $designation
     * @access public
     * @return Entity\Reports
     */
    public function getCountChatUnviewed($report_id)
    {
        $messageRepository = $this->getDoctrine()->getRepository('TroubleticketBundle:Messages', 'troubleticket');
        $qb = $messageRepository->createQueryBuilder('m');
        $qb->select($qb->expr()->count('m.id'));
        $qb->where($qb->expr()->isNull('m.viewedBy'));
        $qb->andWhere('m.report = :report_id');
        $qb->setParameter('report_id', $report_id);

        $comment_badge = $qb->getQuery()->getResult();

        while(is_array($comment_badge)) {
            $comment_badge = reset($comment_badge);
        }

        return $comment_badge;
    }
}
