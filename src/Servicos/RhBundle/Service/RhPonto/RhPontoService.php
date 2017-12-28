<?php 

namespace Servicos\RhBundle\Service\RhPonto;

use Symfony\Component\DependencyInjection\Container;
use Doctrine\Common\Collections\ArrayCollection;

class RhPontoService 
{

	private $rhManager;
	private $voiceManager;
	private $container;

	public function __construct(Container $container)
	{
		$this->container 	= $container;
		$this->rhManager 	= $container->get('doctrine')->getManager('rh');
		$this->voiceManager = $container->get('doctrine')->getManager('voice');
	}

	public function getOcorrencias($autUsuario)
	{
		$colaborador = $this->rhManager->getRepository('ServicosRhBundle:RhColaborador')
									   ->findOneBy(array(
            								'idAltUsuarioSistech' => $autUsuario->getId(),
            								'ativo' 			  => 1
        								));

		$colaboradorDepartamentoRepository = $this->rhManager->getRepository('ServicosRhBundle:RhColaboradorDepartamento');
		$departamentos = $colaboradorDepartamentoRepository->findBy(array(
										'idColaborador' => $colaborador->getIdColaborador(),
            							'boss' => 1				      		
							      ));

		$holidays = $this->voiceManager->getRepository('ServicosVoiceBundle:Holiday')
									   ->getFields();	

		$arrayRetorno = array(
	        'data'  => array(),
	        'total' => 0
	    );

		 if ($departamentos && count($departamentos)) {

                $dataFirst = new \Datetime();
                $dataFirst->modify("-1 month");
                // Data de fechamento do ponto 20 do mês anterior
                $dataFirst->setDate($dataFirst->format("Y"), $dataFirst->format("m"), 20);
                $dataLast = new \Datetime();
                // Dois dias de prazo para ajustar pendências de ponto
                $dataLast->modify("-2 day"); 

                $aux = 0;
                foreach ($departamentos as $departamento) {

                    $colaboradores = $colaboradorDepartamentoRepository->findBy(array(
                        'idDepartamento' => $departamento->getIdDepartamento()->getIdDepartamento()
                    ));

                    foreach ($colaboradores as $colaborador) {

                        $ativo = 1;
                        $cargo = $colaborador->getIdColaborador()
                            			   	 ->getColaboradorCargo()
                            			   	 ->filter(function ($cargos) use ($ativo) {
                            						if ($cargos->getAtivo() == $ativo) {
                                						return $cargos;
                            						}
                        					 })->first();

                        $listaBatidas = $this->listBatidasByDate($dataFirst, $dataLast, $colaborador->getIdColaborador()->getMatricula());

                        foreach ($listaBatidas as $rowBatida) {

                            $aux = 0;

                            $rowBatida->nome = $colaborador->getIdColaborador()->getNome();

                            $rowBatida->entrada1 ? $aux ++ : 0;
                            $rowBatida->entrada2 ? $aux ++ : 0;
                            $rowBatida->entrada3 ? $aux ++ : 0;
                            $rowBatida->entrada4 ? $aux ++ : 0;
                            $rowBatida->entrada5 ? $aux ++ : 0;

                            $rowBatida->saida1 ? $aux ++ : 0;
                            $rowBatida->saida2 ? $aux ++ : 0;
                            $rowBatida->saida3 ? $aux ++ : 0;
                            $rowBatida->saida4 ? $aux ++ : 0;
                            $rowBatida->saida5 ? $aux ++ : 0;

                            if ($aux && (($aux % 2) != 0)) {
                            	if (!in_array($rowBatida, $arrayRetorno['data'])) {
                                    $arrayRetorno['data'][] = $rowBatida;
                            	}

                            } elseif (($aux > 0 && $aux <= 2)) {
                                $dateOcorrencia = new \DateTime($rowBatida->data);
                                $pendenciaFeriado = 0;
                                foreach ($holidays as $objHoliday) {
                                    if ($objHoliday->getFixed() == 1) {
                                        if ($dateOcorrencia->format('d-m') == $objHoliday->getDay()->format('d-m')) {
                                            $pendenciaFeriado ++;
                                        }
                                    } else {
                                        if ($dateOcorrencia->format('d-m-Y') == $objHoliday->getDay()->format('d-m-Y')) {
                                            $pendenciaFeriado ++;
                                        }
                                    }
                                }
                                $i = $dateOcorrencia->format('N');
                                if (!in_array($cargo->getIdCargo()->getIdCargo(), array(171,284)) && 
                                	!in_array($dateOcorrencia->format('N'), array(6,7)) && 
                                	($pendenciaFeriado == 0)) {
                                    if (!in_array($rowBatida, $arrayRetorno['data'])) {
                                        $arrayRetorno['data'][] = $rowBatida;
                                    }
                                }
                            }
                        }
                    }
                }
            }

            $arrayRetorno['total'] = count($arrayRetorno['data']);
            return $arrayRetorno;
	}

	// Código Legado não foi possível portar para nova estrutura
	public function listBatidasByDate($dtIni, $dtFim, $matricula)
	{
		$user 	  = $this->container->getParameter('secullum.user');
    	$password = $this->container->getParameter('secullum.password');
    	$host 	  = $this->container->getParameter('secullum.host');
    	$db 	  = $this->container->getParameter('secullum.dbname');

		$conn = mssql_connect($host, $user, $password);
		mssql_select_db($db);

		
        $dbsql = " SELECT *
	      	         FROM [PontoSecullum4].[dbo].[vw_batidas] as ponto
				  	WHERE data BETWEEN '".$dtIni->format("Y-m-d")."' AND '".$dtFim->format("Y-m-d")."'";

        if ( $matricula ) {
            $dbsql .= " AND n_folha = " . $matricula;
        }

        $result = mssql_query($dbsql, $conn);

        $lista = new ArrayCollection();
        while ($row = mssql_fetch_object($result)){
            $lista->add($row);
        }

		mssql_close($conn);

		return $lista; 
	}
}