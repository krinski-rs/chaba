<?php

namespace TroubleticketBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

use TroubleticketBundle\Service;
use TroubleticketBundle\Entity;

use DateTime;
use Exception;

/**
 * Comando de verificação de circuitos problemáticos
 */
class BSCommand extends ContainerAwareCommand
{
    /**
     * {@inheritDoc}
     */
    protected function configure()
    {
        $this->setName('troubleticket:bs_analise_problemas')
            ->setDescription('Cria novos Boletins de Serviço quando identificado problemas reincidentes');
    }

    /**
     * {@inheritDoc}
     */
    public function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('Procurando por circuitos problemáticos...');
        $container = $this->getContainer();
        $doctrine = $container->get('doctrine');

        $service = new Service\Reports($doctrine, $container);
        $repository = $doctrine->getRepository('TroubleticketBundle:Reports', 'troubleticket');
        $builder = $repository->createQueryBuilder('r');

        $builder->select(array('r.circuit_id', 'r.designation'));


        // busca todos os circuitos que possuam um número mínimo de BAs no período determinado
        $where = $builder->expr()->andX();
        $where->add('r.initial_date >= :initial_date')
            ->add('r.type = :type');
        $builder
            ->addGroupBy('r.circuit_id')
            ->addGroupBy('r.designation')
            ->having('COUNT(r.circuit_id) > :total');

        $config = $service->getBSConfigs();
        $date = new DateTime;
        $date->modify('-'.$config['interval_days'].'days');

        $parameters = array(
            'initial_date' => $date,
            'type' => Entity\Reports::TYPE_BA,
            'type2' => Entity\Reports::TYPE_BS,
            'stack' => Entity\Reports::STACK_ANALISE_PROBLEMAS,
            'total' => $config['reports_amount'],
            'statuses' => array(
                Entity\Reports::FECHADO,
                Entity\Reports::INATIVO,
                Entity\Reports::CANCELADO,
            ),
        );

        $subQueryBuilder = $repository->createQueryBuilder('r2');

        $or = $subQueryBuilder->expr()->orX();
        $or->add($subQueryBuilder->expr()->notIn('r.status', ':statuses'))
            ->add('r2.initial_date >= :initial_date');

        $whereSub = $subQueryBuilder->expr()->andX();
        $whereSub->add('r2.type = :type2')
            ->add('r2.circuit_id = r.circuit_id')
            ->add('r2.stack = :stack')
            ->add($or);
        $subQueryBuilder->where($whereSub);

        $dql = $subQueryBuilder->getDql();
        $exists = $builder->expr()->exists($dql);

        $where->add($builder->expr()->not($exists));

        $builder->where($where)->setParameters($parameters);

        $circuits = $builder->getQuery()->getResult();
        $total = count($circuits);
        $output->writeln(sprintf('Foram encontrados %s circuitos reincidentes', $total));
        $connection = $doctrine->getManager('troubleticket')->getConnection();
        foreach ($circuits as $circuit) {
            $output->writeln(sprintf('Abrindo BS para o circuito %s [%s]', $circuit['designation'], $circuit['circuit_id']));
            $circuit['stack'] = Entity\Reports::STACK_ANALISE_PROBLEMAS;
            $circuit['type'] = Entity\Reports::TYPE_BS;
            $circuit['responsible'] = null;
            try {
                $connection->beginTransaction();

                $report = $service->create($circuit, 'BS Criado');
                if (!$report) {
                    throw new Exception('Erro ao criar o BS para o circuito');
                }

                $report->setDescription('Boletim de Serviço para análise de problemas');

                if (!$service->open($report, 'BS de análise de problemas aberto')) {
                    throw new Exception('Erro ao abrir o BS do circuito');
                }
                $connection->commit();
            } catch(Exception $e) {
                $output->writeln(sprintf('Abortada a criação do BS para o circuito %s [%s]: %s', $circuit['designation'], $circuit['circuit_id'], $e->getMessage()));
                $connection->rollback();
            }
        }
    }
}
