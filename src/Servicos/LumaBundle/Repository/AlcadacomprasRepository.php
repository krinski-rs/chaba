<?php

namespace Servicos\LumaBundle\Repository;

use Doctrine\ORM\EntityRepository;

class AlcadacomprasRepository extends EntityRepository
{
	public function listarAlcadaAprovacao($where = null, $sort = "cola.nome", $order = "ASC", $offset=null, $limit=null)
	{		
		
		$mes = date('m');
		$ano = date('Y');
		$totalDias  = cal_days_in_month(CAL_GREGORIAN, $mes, $ano);

		
		$dataInicio = implode('-',array($ano,$mes,"01"));
		$dataFinal  = implode('-',array($ano,$mes,$totalDias));
		// Query
		$strQuery = 'SELECT cola.unid_codigoid,
                            cola.nome,
                            cola.id_alt_usuario_sistech,
                            carg.cargo,
                            carg.id_cargo,
                            COALESCE(alca.alca_valormaximo, 0) as alcada,
                            COALESCE(alca.alca_valormaximolimite, 0) as limite,
                            CASE  WHEN alca.alca_valormaximo > 0 AND alca.alca_valormaximolimite > 0
                                  THEN COALESCE((SELECT (alca.alca_valormaximolimite -  IFNULL(Sum(cota.cotaunidprod_valortotal),0))
                                           FROM luma.ordem AS orde
                                               left  join luma.tipo AS tipo on(orde.tipo_codigoid = tipo.tipo_codigoid)
                                               left  join luma.ordemcotacaounidadeproduto AS ordcota on(ordcota.orde_codigoid = orde.orde_codigoid)
                                               left  join luma.cotacaounidadeproduto AS cota on(cota.cotaunidprod_codigoid = ordcota.cotaunidprod_codigoid)
                                           WHERE orde.usua_aprovador = cola.id_alt_usuario_sistech
                                             AND tipo.tipo_tipo = 13
                                             AND orde.orde_dataentrega between \'' . $dataInicio . '\' AND \'' . $dataFinal . '\'), 0)

                                  ELSE 0
                              END AS saldo,

                                CASE WHEN alca.alca_valormaximo > 0 AND alca.alca_valormaximolimite > 0
                                 THEN COALESCE((SELECT sum(cota.cotaunidprod_valortotal)                               
                                                FROM luma.ordem AS orde
                                                 left join luma.tipo AS tipo on(orde.tipo_codigoid = tipo.tipo_codigoid)
                                                 left join luma.ordemcotacaounidadeproduto AS ordcota on(ordcota.orde_codigoid = orde.orde_codigoid)
                                                 left join luma.cotacaounidadeproduto AS cota on(cota.cotaunidprod_codigoid = ordcota.cotaunidprod_codigoid)
                                                WHERE orde.usua_aprovador = cola.id_alt_usuario_sistech
                                                  AND tipo.tipo_tipo = 13
                                                   AND orde.orde_dataentrega between \'' . $dataInicio . '\' AND \'' . $dataFinal . '\'), 0)

                                 ELSE 0
                              END AS total_aprovado
                        FROM  rh.rh_colaborador AS cola
                              inner join rh.rh_colaborador_cargo AS coca using(id_colaborador)
                              inner join rh.rh_cargo AS carg using (id_cargo)
                              left  join luma.alcadacompras AS alca on(alca.unid_codigoid = cola.unid_codigoid)
                        WHERE cola.ativo = 1
                          AND coca.ativo = 1
                          AND cola.id_tipo_colaborador = 1';
		if($where)
		{
			$strQuery .= ' '.$where.' ';
		}
		if($sort && $order){
			$strQuery .= " ORDER BY $sort $order ";
		}
		if(!is_null($limit) && strlen($limit) > 0){
			$strQuery .= " LIMIT $offset, $limit ";
		}
		//var_dump($where);
		//echo '<pre>'.$strQuery; die;
		$cmd = $this->_em->getConnection()->prepare($strQuery);
		$cmd->execute();
		return $cmd->fetchAll();
			// Configura o mês atual
	}
}