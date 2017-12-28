<?php

namespace TroubleticketBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputOption;

use TroubleticketBundle\Service;
use TroubleticketBundle\Entity;

use DateTime;
use Exception;

/**
 * Comando de verificação de circuitos problemáticos
 */
class CloseReportCommand extends ContainerAwareCommand
{
    /**
     * {@inheritDoc}
     */
    protected function configure()
    {
        $this->setName('troubleticket:fecha_boletim')
            ->setDescription('Fecha um boletim com uma data especifica informada.')
            ->addOption('report_id', null, InputOption::VALUE_REQUIRED, 'Identificador do boletim')
            ->addOption('date', null, InputOption::VALUE_OPTIONAL, 'Data de fechamento');
    }

    /**
     * {@inheritDoc}
     */
    public function execute(InputInterface $input, OutputInterface $output)
    {
        session_start();
        $_SESSION['usr_codigoid'] = 423;

        $container = $this->getContainer();
        $doctrine = $container->get('doctrine');

        $reportId = $input->getOption('report_id');
        $date = $input->getOption('date');

        if(!is_null($date)){
            if(preg_match('/\d{4}-\d{2}-\d{2} \d{2}:\d{2}:\d{2}/', $date) != 1){
                throw new \Exception("Formato de data inválida. ", 1);
            }

            $date = new \DateTime($date);
        }

        $service = new Service\Reports($doctrine, $container);
        $repository = $doctrine->getRepository('TroubleticketBundle:Reports', 'troubleticket');

        $report = $repository->findOneBy(
            array(
                'id' => $reportId,
                'status' => Entity\Reports::RESOLVIDO,
            )
        );

        if(!$report){
            throw new \Exception("Boletim não existe ou não está resolvido.", 1);
        }

        $timeCounter = $report->getLastTimeCounter(true);

        $output->writeln('Fechando boletim['.$report->getId().']  -> data de fechamento: '.(!$date ?: $date->format('Y-m-d H:i:s')));
        $service->close($report, $timeCounter, 'Boletim fechado por motivo de correção de sistema', null, null, $date);

    }
}
