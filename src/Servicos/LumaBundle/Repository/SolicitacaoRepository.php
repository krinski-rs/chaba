<?php 

namespace Servicos\LumaBundle\Repository;

use Doctrine\ORM\EntityRepository;

class SolicitacaoRepository extends EntityRepository 
{
	public function getByTipoSolicitacaoAprovacao($tipo)
	{
		$select     = array('soli, unid, unidPai, centroCusto');
		$parameters = array('tipo' => $tipo);
		$query 	    = $this->_em->createQueryBuilder();
		return $query->select($select)
			  		 ->distinct('soli')
			  		 ->from("ServicosLumaBundle:Solicitacao", "soli")
			  		 ->innerJoin("soli.solicitacaoaprovacao", "soliapro")
			  		 ->innerJoin("soli.unidCodigoid", "unid")
			  		 ->leftJoin("unid.unidPaicodigoid", "unidPai")
			  		 ->leftJoin("soli.centroCusto", "centroCusto")
			  		 ->where('soliapro.tipoCodigoid = :tipo ')
			  		 ->getQuery()
			  		 ->setParameters($parameters)
			  		 ->execute();
	}
}