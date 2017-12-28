<?php

namespace Servicos\LumaBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * Description of ProdutoRepository
 *
 * @author flucca
 */
class ProdutoRepository extends EntityRepository {
	/*
	 * Listagem de Produtos
	 * LUMA > ListarProdutos
	 */

	public function getProductList($filter) {

//		$sql = "
//			SELECT
//				p.prod_codigoid,
//				c.cate_codigoid,
//				concat(c.cate_ordem,' - ',c.cate_nome) as categoria,
//				p.prod_nome,
//				IFNULL(valor_lote(l.lote_codigoid),
//					IFNULL(valor_ordem(p.prod_codigoid),
//						IFNULL(valor_cotacao(p.prod_codigoid), 0.00))) AS v ,
//				sum(if((isnull(u.unid_ativo) OR u.unid_ativo=0),0.00,round(if(isnull(p.prod_islance),(IFNULL(ep.estoprod_total,0.00)),(IFNULL(l.lote_quantidade,0.00))),2))) as total,
//				sum(if((isnull(u.unid_ativo) OR u.unid_ativo=0),0.00,round(if(isnull(p.prod_islance),IFNULL((SELECT(v)* ep.estoprod_total),0.00),IFNULL((SELECT(v)* l.lote_quantidade),0.00)),2))) as valor 
//			FROM produto p
//			INNER JOIN categoria c ON c.cate_codigoid=p.cate_codigoid
//			LEFT JOIN estoqueproduto ep ON ep.prod_codigoid=p.prod_codigoid
//			LEFT JOIN estoque e ON e.esto_codigoid= ep.esto_codigoid AND ep.estoprod_total > 0
//			LEFT JOIN unidade u ON u.unid_codigoid=e.unid_codigoid AND u.unid_ativo = 1
//			LEFT JOIN lote l ON (l.estoprod_codigoid = ep.estoprod_codigoid AND l.lote_quantidade > 0.00)
//			WHERE 1=1
//				AND p.prod_ativo = 1
//			AND (u.unid_ativo IS NULL OR u.unid_ativo= 1 )
//			group by p.prod_codigoid
//			order by p.prod_codigoid
//			limit 10
//		";

		$qb = $this->getEntityManager()->createQueryBuilder();
		$qb->select(array(
			/*
			sum(
				if( (isnull(u.unid_ativo) OR u.unid_ativo=0 ),
					0.00,
					round(
						if(isnull(p.prod_islance),(IFNULL(ep.estoprod_total,0.00)),(IFNULL(l.lote_quantidade,0.00))),2)
				)
			) as total
			 */
			"SUM('ep.estoprodTotal') as s1",
			"SUM(l.loteQuantidade)   as s2",
			"c.cateOrdem",
			"c.cateNome",
			"p.prodNome",
			"l.loteCodigoid",
			"p.prodCodigoid",
			"COALESCE(
				valor_lote(l.loteCodigoid),
				COALESCE(
					valor_ordem(p.prodCodigoid),
					COALESCE(
						valor_cotacao(p.prodCodigoid),
						0.00
					)
				)
			) AS HIDDEN v"
		));
		$qb->from('ServicosLumaBundle:Produto', 'p');
		$qb->innerJoin('ServicosLumaBundle:Categoria', 'c','WITH','c.cateCodigoid=p.cateCodigoid');
		$qb->leftJoin('ServicosLumaBundle:Estoqueproduto', 'ep','WITH','ep.prodCodigoid=p.prodCodigoid');
		$qb->leftJoin('ServicosLumaBundle:Estoque', 'e','WITH',$qb->expr()->andX(
			$qb->expr()->eq('e.estoCodigoid','ep.estoCodigoid'),
			$qb->expr()->gt('ep.estoprodTotal','0.00')
			)
		);
		$qb->leftJoin('ServicosLumaBundle:Unidade', 'u','WITH',$qb->expr()->andX(
			$qb->expr()->eq('u.unidCodigoid','e.unidCodigoid'),
			$qb->expr()->eq('u.unidAtivo','1')
			)
		);
		$qb->leftJoin('ServicosLumaBundle:Lote', 'l','WITH',$qb->expr()->andX(
			$qb->expr()->eq('l.estoprodCodigoid','ep.estoprodCodigoid'),
			$qb->expr()->gt('l.loteQuantidade','0.00')
			)
		);
		$qb->where($qb->expr()->andX(
 				$qb->expr()->eq('p.prodAtivo', '1'),
				$qb->expr()->orX(
					$qb->expr()->eq('u.unidAtivo','1'),
					$qb->expr()->isNull('u.unidAtivo')
				)
			)
		);
		$qb->groupBy('p.prodCodigoid');
		$qb->orderBy('p.prodCodigoid');
		
		$rowsTotal = sizeof($qb->getQuery()->getResult());
		
		$qb->setFirstResult(($filter['offset'] * $filter['limit']))->setMaxResults($filter['limit']);
		$rows = $qb->getQuery()->getResult();

		return array(
			'rows' => $rows,
			'rowsShow' => sizeof($rows),
			'rowsTotal' => $rowsTotal
		);
	}

	/*
	 * Visualização de Produto
	 */

	public function getProducView($filter) {
		global $emLuma;

		$repository = $emLuma->getRepository('ServicosLumaBundle:Produto');
		$result = $repository->createQueryBuilder('p')->where("true=true");
		$result->andWhere("p.prodCodigoid = ${filter['codigo']}");
		$result->setMaxResults(1);
		$rows = $result->getQuery()->getResult();
		return $rows[0];
	}

	/**
	* Listagem de produtos para integração de pedido de compras com o Protheus
	*/
	public function getProdutosIntegracaoProtheus($arrayParams = array())
	{
		if(!isset($arrayParams['campos'])){
			throw new \Exception("É Necessário informar campos para a pesquisa.");
		}
		$qb = $this->_em->createQueryBuilder();
		$qb->select($arrayParams['campos'])->
             from('ServicosLumaBundle:Produto', 'p')->
             innerJoin('ServicosLumaBundle:Medida', 'm','WITH','m.mediCodigoid=p.mediCodigoid')->
             leftJoin('ServicosLumaBundle:Ncm', 'n','WITH','n.ncmCodigoid=p.ncmCodigoid')->
             leftJoin('ServicosLumaBundle:Categoria', 'cate', 'WITH', 'cate.cateCodigoid = p.cateCodigoid' )->
             leftJoin('ServicosLumaBundle:Ncm', 'nc','WITH','nc.ncmCodigoid=cate.ncmCodigoid')
        ;
		$qb->where("1=1");
		if(key_exists('where', $arrayParams) && count($arrayParams['where'])){
            foreach($arrayParams['where'] as $key => $filter){
                $qb->andWhere("$filter[0] $filter[1] $filter[2]");
            }
        }

        return $qb->getQuery()->getArrayResult();
	}

}
