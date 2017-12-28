<?php 

namespace Servicos\LumaBundle\Repository;

use Doctrine\ORM\EntityRepository;

class SolicitacaoaprovacaoRepository extends EntityRepository 
{
	public function validApprovals($soliCodigoid, $tipos)
	{
		$select = $this->getApprovalsColumns();
		$parameters = array(
			"id"   => $soliCodigoid,
			"tipo" => $tipos
		);
		$query = $this->_em->createQueryBuilder();
		return $query->select($select)
			  		 ->distinct('soliapro.soliaproCodigoid')
			  		 ->from("ServicosLumaBundle:Solicitacaoaprovacao", "soliapro")
					 ->innerJoin("soliapro.tipoAprovacaoId", "tipoAprovacao")
					 ->innerJoin("soliapro.soliCodigoid", "soli")
					 ->innerJoin("soliapro.tipoCodigoid", "tipo")
					 ->innerJoin("soli.unidCodigoid", "unid")
					 ->leftJoin("unid.unidPaicodigoid", "unidPai")
					 ->where("soli.soliCodigoid = :id")
					 ->andWhere("tipo.tipoCodigoid IN (:tipo)")
					 ->getQuery()
					 ->setParameters($parameters)
					 ->execute();		 
	}

	private function getApprovalsColumns()
	{
		return array(
			'soliapro.soliaproCodigoid',
			'soli.soliCodigoid',
            'soli.cadUserFilial',
			'tipo.tipoCodigoid',
			'tipo.tipoNome',
			'unid.unidNome',
			'unidPai.unidNome AS paiNome',
			'soli.soliDatainc',
			'soli.usuaCodigoid',
			'soli.soliPrazoentrerga',
			'soli.soliAtivo',
			'soli.soliObservacao',
			'soli.soliObservacaofornecedor',
			'tipoAprovacao.descricao AS descricaoTipoAprovacao',
			'tipoAprovacao.id AS idTipoAprovacao'
		);
	}

	public function getBySolitacaoIdAndTipo($soliCodigoid, $tipoId)
	{
		$parameters = array(
			"soliCodigoid" => $soliCodigoid,
			"tipoId" => !is_array($tipoId) ? array($tipoId) : $tipoId
		);

		$queryBuilder = $this->_em->createQueryBuilder();
		return $queryBuilder->select(array('soliapro', 'soli', 'tipo', 'tipoAprovacao', 'unid', 'unidPai'))
							->distinct("soliapro.soliaproCodigoid")
							->from("ServicosLumaBundle:Solicitacaoaprovacao", "soliapro")
							->innerJoin("soliapro.soliCodigoid", "soli")
							->innerJoin("soliapro.tipoCodigoid", "tipo")
							->innerJoin("soliapro.tipoAprovacaoId", "tipoAprovacao")
							->innerJoin("soli.unidCodigoid", "unid")
							->leftJoin("unid.unidPaicodigoid", "unidPai")
							->where("soli.soliCodigoid = :soliCodigoid")
							->andWhere("tipo.tipoCodigoid IN (:tipoId)")
							->getQuery()
							->setParameters($parameters)
							->execute();
	}
}