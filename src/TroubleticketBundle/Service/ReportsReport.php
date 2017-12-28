<?php

namespace TroubleticketBundle\Service;

use TroubleticketBundle\Entity;
use TroubleticketBundle\Twig;

use Doctrine\Bundle\DoctrineBundle\Registry;
use Doctrine\ORM\Query\ResultSetMappingBuilder;

/**
 * Serviço para relatórios de boletins
 *
 * @category Class
 * @package  Service
 * @author Luiz Cunha <luiz.felipe@absoluta.net>
 */
class ReportsReport
{
    /**
     * Construtor
     *
     * @param Registry $doctrine Doctrine
     * @param mixed $container   Container de serviços do symfony
     * @access public
     */
    public function __construct(Registry $doctrine, $container)
    {
        $this->doctrine = $doctrine;
        $this->container = $container;
    }

    /**
     * Obtem o doctrine
     *
     * @access public
     * @return Registry
     */
    public function getDoctrine()
    {
        return $this->doctrine;
    }

    /**
     * Relatório de incidentes de BA
     *
     * @param array $filters Conjunto de filtros
     * @access public
     * @return array
     */
    public function incidentsBAReport(array $filters)
    {
        $data = $this->getData(Entity\Reports::TYPE_BA, $filters);
        $result = array();
        foreach ($data as $report) {
            $initialDate = new \DateTime($report['initial_date']);
            $finalDate = new \DateTime($report['final_date']);

            $result[] = array(
                'code' => $report['code'],
                'parent_code' => $report['parent_code'],
                'designation' => $report['designation'],
                'client' => $report['client_name'],
                'final_client' => $report['final_client'],
                'uf_ponta_a' => $report['uf_ponta_a'],
                'coc_subcases' => $report['coc_total'],
                'mantainer_subcases' => $report['mantainer_total'],
                'initial_date' => $initialDate->format('d/m/Y'),
                'initial_time' => $initialDate->format('H:i:s'),
                'final_date' => $finalDate->format('d/m/Y'),
                'final_time' => $finalDate->format('H:i:s'),
                'sn1_responsible' => $report['sn1_responsible'],
                'sn2_responsible' => $report['sn2_responsible'],
                'sn3_responsible' => $report['sn3_responsible'],
                'voz_responsible' => $report['voz_responsible'],
                'incident' => $report['incident'],
                'closed_symptom' => $report['closed_symptom'],
                'structure' => (empty($report['structure'])) ? $report['incident'] : $report['structure'],
                'element' => $report['element'],
                'cause' => $report['cause'],
                'problem' => $report['problem'],
                'solution' => $report['solution'],
                'failure_local' => $report['failure_local'],
                'failure' => $report['failure'],
                'reason' => $report['close_reason'],
                'status' => Entity\Reports::translateStatusCode($report['status']),
                'pop_name' => $report['pop_name'],
                'provider_nome_fantasia' => $report['provider_nome_fantasia']
            );
        }

        return $result;
    }

    /**
     * Relatório de performance de BA
     *
     * @param array $filters Conjunto de filtros
     * @access public
     * @return array
     */
    public function performanceBAReport(array $filters)
    {
        $data = $this->getData(Entity\Reports::TYPE_BA, $filters);
        $result = array();
        foreach ($data as $report) {
            $initialDate = new \DateTime($report['initial_date']);
            $finalDate = new \DateTime($report['final_date']);

            $result[] = array(
                'code' => $report['code'],
                'parent_code' => $report['parent_code'],
                'designation' => $report['designation'],
                'client' => $report['client_name'],
                'final_client' => $report['final_client'],
                'uf_ponta_a' => $report['uf_ponta_a'],
                'coc_subcases' => $report['coc_total'],
                'mantainer_subcases' => $report['mantainer_total'],
                'initial_date' => $initialDate->format('d/m/Y'),
                'initial_time' => $initialDate->format('H:i:s'),
                'final_date' => $finalDate->format('d/m/Y'),
                'final_time' => $finalDate->format('H:i:s'),
                'tme_counter' => $report['tme_counter'],
                'paused_counter' => $report['paused_counter'],
                'solved_counter' => $report['solved_counter'],
                'tmr_counter' => $report['tmr_counter'],
                'noc_counter' => $report['noc_counter'],
                'sn1_counter' => $report['sn1_counter'],
                'sn2_counter' => $report['sn2_counter'],
                'sn3_counter' => $report['sn3_counter'],
                'voz_counter' => $report['voz_counter'],
                'coc_counter' => $report['coc_counter'],
                'displacement_counter' => $report['displacement_counter'],
                'infra_counter' => $report['infra_counter'],
                'field_counter' => $report['field_counter'],
                'client_counter' => $report['client_counter'],
                'status' => Entity\Reports::translateStatusCode($report['status']),
                'reason' => $report['close_reason'],
            );
        }

        return $result;
    }

    /**
     * Relatório de incidentes de BI
     *
     * @param array $filters Conjunto de filtros
     * @access public
     * @return array
     */
    public function incidentsBIReport(array $filters)
    {
        $data = $this->getData(Entity\Reports::TYPE_BI, $filters);
        $result = array();
        foreach ($data as $report) {
            $initialDate = new \DateTime($report['initial_date']);
            $finalDate = new \DateTime($report['final_date']);

            $result[] = array(
                'code' => $report['code'],
                'designation' => $report['designation'],
                'ba_total' => $report['children_total'],
                'uf_ponta_a' => $report['uf_ponta_a'],
                'coc_subcases' => $report['coc_total'],
                'mantainer_subcases' => $report['mantainer_total'],
                'initial_date' => $initialDate->format('d/m/Y'),
                'initial_time' => $initialDate->format('H:i:s'),
                'final_date' => $finalDate->format('d/m/Y'),
                'final_time' => $finalDate->format('H:i:s'),
                'sn2_responsible' => $report['sn2_responsible'], //$row_sn2,
                'incident' => $report['incident'],
                'closed_symptom' => $report['closed_symptom'],
                'structure' => (empty($report['structure'])) ? $report['incident'] : $report['structure'],
                'element' => $report['element'],
                'cause' => $report['cause'],
                'problem' => $report['problem'],
                'solution' => $report['solution'],
                'failure' => $report['failure'],
                'failure_local' => $report['failure_local'],
                'status' => Entity\Reports::translateStatusCode($report['status']),
                'reason' => $report['close_reason'],
                'pop_name' => $report['pop_name'],
                'provider_nome_fantasia' => $report['provider_nome_fantasia']
            );
        }

        return $result;
    }

    /**
     * Relatório de performance de BI
     *
     * @param array $filters Conjunto de filtros
     * @access public
     * @return array
     */
    public function performanceBIReport(array $filters)
    {
        $data = $this->getData(Entity\Reports::TYPE_BI, $filters);
        $result = array();
        foreach ($data as $report) {
            $initialDate = new \DateTime($report['initial_date']);
            $finalDate = new \DateTime($report['final_date']);

            $result[] = array(
                'code' => $report['code'],
                'designation' => $report['designation'],
                'children_total' => $report['children_total'],
                'uf_ponta_a' => $report['uf_ponta_a'],
                'coc_subcases' => $report['coc_total'],
                'mantainer_subcases' => $report['mantainer_total'],
                'initial_date' => $initialDate->format('d/m/Y'),
                'initial_time' => $initialDate->format('H:i:s'),
                'final_date' => $finalDate->format('d/m/Y'),
                'final_time' => $finalDate->format('H:i:s'),
                'tmr_counter' => $report['tmr_counter'],
                'noc_counter' => $report['noc_counter'],
                'sn2_counter' => $report['sn2_counter'],
                'coc_counter' => $report['coc_counter'],
                'displacement_counter' => $report['displacement_counter'],
                'infra_counter' => $report['infra_counter'],
                'field_counter' => $report['field_counter'],
                'client_counter' => $report['client_counter'],
                'status' => Entity\Reports::translateStatusCode($report['status']),
                'reason' => $report['close_reason'],
            );
        }

        return $result;
    }

    /**
     * Relatório de Bs
     *
     * @param array $filters Conjunto de filtros
     * @access public
     * @return array
     */
    public function BSReport(array $filters)
    {
        $data = $this->getData(Entity\Reports::TYPE_BS, $filters);
        $result = array();
        $timeExtension = new Twig\TimeExtension;

        $history_repository = $this->getDoctrine()->getRepository('TroubleticketBundle:History', 'troubleticket');

        foreach ($data as $report) {
            $history_last = $history_repository->findOneBy(
                array('report_id' => $report['id']),
                array('id' => 'DESC'));

            $initialDate = new \DateTime($report['initial_date']);
            $finalDate = new \DateTime($report['final_date']);

            $tme = $timeExtension->timeFilter($report['tme_counter']);

            $result[] = array(
                'code' => $report['code'],
                'status' => Entity\Reports::translateStatusCode($report['status']),
                'bs_responsible' => $report['bs_responsible'],
                'elapsed_time' => $tme,
                'sla' => $report['sla'],
                'request' => $report['description'],
                'comment' => $history_last->getComment(),
                'initial_date' => $initialDate->format('d/m/Y'),
                'initial_time' => $initialDate->format('H:i:s'),
                'final_date' => $finalDate->format('d/m/Y'),
                'final_time' => $finalDate->format('H:i:s'),
                'incident' => $report['incident'],
                'closed_symptom' => $report['closed_symptom'],
                'structure' => (empty($report['structure'])) ? $report['incident'] : $report['structure'],
                'element' => $report['element'],
                'cause' => $report['cause'],
                'problem' => $report['problem'],
                'solution' => $report['solution'],
                'failure_local' => $report['failure_local'],
                'failure' => $report['failure'],
                'reason' => $report['close_reason'],
                'designation' => $report['designation'],
                'pop_name' => $report['pop_name'],
                'provider_nome_fantasia' => $report['provider_nome_fantasia']
            );
        }

        return $result;
    }

    /**
     * Normaliza os dados passados para a filtragem
     *
     * @param array $filters Conjunto de filtros
     * @access protected
     * @return array
     */
    protected function parseFilters(array $filters)
    {
        if (!isset($filters['initial_date']) || !isset($filters['final_date'])) {
            throw new \Exception('Data de início e fim são requeridas');
        }
        $filters['initial_date'] = "{$filters['initial_date']} 00:00:00";
        $filters['final_date'] = "{$filters['final_date']} 23:59:59";

        return $filters;
    }


    /**
     * Obtem os dados para montagem do relatório
     *
     * @param string $type   Tipo do boletim BA ou BI
     * @param array $filters Conjunto de filtros
     * @access protected
     * @return array
     */
    protected function getData($type, array $filters)
    {
        $sql = $this->getBaseSqlString();

        $statusCondition = Entity\Reports::FECHADO . ', '. Entity\Reports::CANCELADO;
        $parsedFilters = $this->parseFilters($filters);

        $where = array(
            "r.status IN ($statusCondition)",
            "r.type = :type",
            "r.final_date >= :initial_date",
            "r.final_date <= :final_date"
        );

        $parameters = array(
            'type' => $type,
            'initial_date' => $parsedFilters['initial_date'],
            'final_date' => $parsedFilters['final_date']
        );

        if (!empty($parsedFilters['final_client_name'])) {
            $where[] = 'circ.final_client = :final_client';
            $parameters['final_client'] = "%{$parsedFilters['final_client_name']}%";
        }

        if (!empty($parsedFilters['client_name'])) {
            $where[] = 'cli.name LIKE :client_name';
            $parameters['client_name'] = "%{$parsedFilters['client_name']}%";
        }

        if (!empty($parsedFilters['client_uf'])) {
            $where[] = 'circ.uf_ponta_a = :client_uf';
            $parameters['client_uf'] = $parsedFilters['client_uf'];
        }

        $sql = str_replace('{{where}}', implode(' AND ', $where), $sql);

        $manager = $this->getDoctrine()->getManager('troubleticket');
        $stmt = $manager->getConnection()->prepare($sql);

        foreach ($parameters as $key => $value) {
            $stmt->bindValue($key, $value);
        }
        $stmt->execute();

        return $stmt->fetchAll();
    }

    /**
     * Obtem a string de SQL base para geração dos relatórios
     *
     * @access protected
     * @return string
     */
    protected function getBaseSqlString()
    {
        $coc = Entity\Subcases::TYPE_COC;
        $mantainer = Entity\Subcases::TYPE_MANTAINER;

        // Por limitações do Doctrine com relação a relacionamentos fracos está
        // sendo utilizada a contrução de SQL manualmente
        $sql = <<<SQL
SELECT
    r.id,
    r.circuit_id,
    r.code,
    r.parent_id,
    r.id,
    r.designation,
    r.description,
    r.initial_date,
    r.final_date,
    r.type,
    r.cause,
    r.failure,
    r.failure_local,
    r.problem,
    r.status,
    r.solution,
    r.close_reason,
    r.tme_counter,
    r.paused_counter,
    r.solved_counter,
    r.tmr_counter,
    r.noc_counter,
    r.sn1_counter,
    r.sn2_counter,
    r.sn3_counter,
    r.voz_counter,
    r.coc_counter,
    r.displacement_counter,
    r.infra_counter,
    r.field_counter,
    r.client_counter,
    p.id as parent_id,
    p.code as parent_code,
    COALESCE(circ.designation, 'NOVO') as designation,
    COALESCE(circ.final_client, 'NOVO') as final_client,
    COALESCE(circ.uf_ponta_a, 'NOVO') as uf_ponta_a,
    COALESCE(cli.name, 'NOVO') as client_name,
    COALESCE(coc.total, 0) as coc_total,
    COALESCE(man.total, 0) as mantainer_total,
    COALESCE(sn1.name, 'NOVO') as sn1_responsible,
    CASE
        WHEN r.sn2 IS NULL THEN NULL
        ELSE
            COALESCE(sn2.name, 'NOVO')
    END as sn2_responsible,
    CASE
        WHEN r.sn3 IS NULL THEN NULL
        ELSE
            COALESCE(sn3.name, 'NOVO')
    END as sn3_responsible,
    CASE
        WHEN r.voz IS NULL THEN NULL
        ELSE
            COALESCE(voz.name, 'NOVO')
    END as voz_responsible,
    COALESCE(children.total, 0) as children_total,
    COALESCE(bs.name, 'NOVO') as bs_responsible,
    COALESCE(circ.sla, 'SLA') as sla,
    r.closed_symptom,
    r.structure,
    r.element,
    pop.name as pop_name,
    provider.nome_fantasia as provider_nome_fantasia,
    r.incident
FROM
    troubleticket.reports r
    LEFT JOIN troubleticket.reports p ON p.id = r.parent_id
    LEFT JOIN troubleticket.circuits_cache circ ON circ.id = r.circuit_id
    LEFT JOIN troubleticket.clients_cache cli ON cli.id = circ.client_id
    LEFT JOIN (
        SELECT
            report_id, COUNT(id) as total
        FROM
            troubleticket.subcases
        WHERE
            type = $coc
        GROUP BY report_id, type
    ) coc ON coc.report_id = r.id
    LEFT JOIN (
        SELECT
            report_id, COUNT(id) as total
        FROM
            troubleticket.subcases
        WHERE
            type = $mantainer
        GROUP BY report_id, type
    ) man ON man.report_id = r.id
    LEFT JOIN troubleticket.colaborators_cache sn1 ON sn1.id::int = r.sn1
    LEFT JOIN troubleticket.colaborators_cache sn2 ON sn2.id::int = r.sn2
    LEFT JOIN troubleticket.colaborators_cache sn3 ON sn3.id::int = r.sn3
    LEFT JOIN troubleticket.colaborators_cache voz ON voz.id::int = r.voz
    LEFT JOIN troubleticket.colaborators_cache bs  ON bs.id::int = r.responsible::int
    LEFT JOIN (
        SELECT parent_id, COUNT(*) as total
        FROM
            troubleticket.reports
        WHERE parent_id IS NOT NULL
        GROUP BY parent_id
    ) as children ON children.parent_id = r.id
    LEFT JOIN troubleticket.pops_cache pop ON pop.id::int = r.pop_id
    LEFT JOIN troubleticket.providers_cache provider ON provider.id::int = r.provider_id
WHERE
    {{where}}
ORDER BY r.status ASC, r.final_date DESC

SQL;

        return $sql;
    }

}
