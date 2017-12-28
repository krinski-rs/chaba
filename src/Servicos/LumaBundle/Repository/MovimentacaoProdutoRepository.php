<?php

namespace Servicos\LumaBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Servicos\LumaBundle\Entity\MovimentacaoProduto;
use Exception;

class MovimentacaoProdutoRepository extends EntityRepository
{
    public function getProdutosRecebidosIntegracaoProtheus(array $parameters)
    {
        // TIPO_LIBERADO_RECEBIMENTO = 80;
        // TIPO_RECEBIDO_FINALIZADO = 53
        // TIPO_PARCIALMENTE_RECEBIDO = 52;
        // TIPO_APROVADO = 47
        try {
            $queryBuilder = $this->_em->createQueryBuilder();
            $queryBuilder->select($parameters['campos'])
                ->from('ServicosLumaBundle:Ordemcotacaounidadeproduto', 'ocup') //CadUser Cliente
                ->innerJoin('ServicosLumaBundle:Ordem', 'oc', 'WITH', 'ocup.ordeCodigoid = oc.ordeCodigoid AND oc.tipoCodigoid in(80,53,52,47)')
                ->innerJoin('ServicosLumaBundle:Cotacaounidadeproduto', 'cup', 'WITH', 'cup.cotaunidprodCodigoid = ocup.cotaunidprodCodigoid')
                ->innerJoin('ServicosLumaBundle:Produto', 'prod', 'WITH', 'prod.prodCodigoid = cup.prodCodigoid')
                ->innerJoin('ServicosLumaBundle:Cotacaounidade', 'cunid', 'WITH', 'cunid.cotaunidCodigoid = cup.cotaunidCodigoid')
                ->leftJoin('ServicosLumaBundle:Cotacaounidadeformapagamento', 'cufp', 'WITH', 'cufp.cotaunidCodigoid = cunid.cotaunidCodigoid')
                ->leftJoin('ServicosLumaBundle:CondicaoPagamento', 'condUnidPag', 'WITH', 'condUnidPag.id = cufp.idCondicaoPagamento ')
                ->innerJoin('ServicosLumaBundle:Cotacao', 'cota', 'WITH', 'cota.cotaCodigoid = cunid.cotaCodigoid')
                ->innerJoin('ServicosLumaBundle:Cotacaosolicitacao', 'cotaSolit', 'WITH', 'cotaSolit.cotaCodigoid = cota.cotaCodigoid')
                ->innerJoin('ServicosLumaBundle:Solicitacao', 'soli', 'WITH', 'soli.soliCodigoid = cotaSolit.soliCodigoid')
                ->leftJoin('ServicosGcdbBundle:CadUsers', 'cad_user', 'WITH', 'cad_user.id = soli.cadUserFilial')
                ->leftJoin('ServicosGcdbBundle:CadLigacaoU2u', 'u2u', 'WITH', '(cad_user.id = u2u.cadUsers OR cad_user.id = u2u.cadUsers2) and u2u.admTipoLigacao = 13')
                ->leftJoin('ServicosGcdbBundle:CadUsers', 'cad_user_matriz', 'WITH', 'cad_user_matriz.id = soli.cadUserFilial')
                ->leftJoin('ServicosLumaBundle:Unidade', 'unidForn', 'WITH', 'unidForn.unidCodigoid = cunid.unidCodigoid')
                ->leftJoin('ServicosGcdbBundle:CadUsers', 'cad_user_forn', 'WITH', 'cad_user_forn.id = unidForn.unidStechcodigoid')
                ->innerJoin('ServicosLumaBundle:OrdemNfEntrada', 'ocnf', 'WITH', 'ocnf.ordeCodigoid = oc.ordeCodigoid')
                ->innerJoin('ServicosLumaBundle:Ordemmovimentacao', 'om', 'WITH', 'om.ordeCodigoid = oc.ordeCodigoid')
                ->innerJoin('ServicosLumaBundle:Movimentacao', 'm', 'WITH', 'om.moviCodigoid = m.moviCodigoid')
                ->innerJoin('ServicosLumaBundle:Movimentacaoproduto', 'mp', 'WITH', 'mp.moviCodigoid = m.moviCodigoid')
                ->where('mp.statusIntegracao = '.Movimentacaoproduto::STATUS_AGUARDANDO_INTEGRACAO)
                ->andWhere('ocnf.nfStatus = \'A\'')
                ->groupby('cup.cotaunidprodCodigoid');

            if(key_exists('where', $parameters) && count($parameters['where'])) {
                foreach($parameters['where'] as $key => $filter) {
                    $queryBuilder->andWhere("$filter[0] $filter[1] $filter[2]");
                }
            }

            return $queryBuilder->getQuery()->getArrayResult();

        } catch (Exception $ex) {
            throw $ex;
        }
    }

    public function search($arrayParams = array())
    {
        $query = $this->_em->createQueryBuilder();
        $query->select($arrayParams['campos'])
              ->from('ServicosLumaBundle:Movimentacao', 'm')
              ->innerJoin('ServicosLumaBundle:Movimentacaoproduto', 'mp', 'WITH', 'mp.moviCodigoid = m.moviCodigoid')
              ->innerJoin('ServicosLumaBundle:Estoqueproduto', 'ep', 'WITH', 'ep.estoprodCodigoid = mp.estoprodCodigoid')
              ->innerJoin('ServicosLumaBundle:Produto', 'prod', 'WITH', 'prod.prodCodigoid = ep.prodCodigoid');
        if(key_exists('where', $arrayParams) && count($arrayParams['where'])){
            $query->where('1 = 1');
            foreach($arrayParams['where'] as $key => $filter){
                $query->andWhere("$filter[0] $filter[1] $filter[2]");
            }
        }
        if(key_exists('groupBy', $arrayParams)){
            $query->groupby($arrayParams['groupBy']);
        }
        return $query->getQuery()->getArrayResult();
    }

    public function getItensIntegracaoProtheus($arrayParams = array())
    { 

        $query = $this->_em->createQueryBuilder();
        $query->select($arrayParams['campos'])
              ->from('ServicosLumaBundle:Movimentacao', 'm')
              ->innerJoin('ServicosLumaBundle:Movimentacaoproduto', 'mp', 'WITH', 'mp.moviCodigoid = m.moviCodigoid')
              ->innerJoin('ServicosLumaBundle:Estoqueproduto', 'ep', 'WITH', 'ep.estoprodCodigoid = mp.estoprodCodigoid')
              ->innerJoin('ServicosLumaBundle:Produto', 'prod', 'WITH', 'prod.prodCodigoid = ep.prodCodigoid')
              ->innerJoin('ServicosGcdbBundle:CadUsers', 'c_origem', 'WITH', 'c_origem.id = m.cadUserOrigem')
              ->innerJoin('ServicosGcdbBundle:CadUsers', 'c_destino', 'WITH', 'c_destino.id = m.cadUserDestino')
              ->leftJoin('ServicosGcdbBundle:Customers2users', 'c2u_destino', 'WITH', 'c_destino.id= c2u_destino.idUsers')
              ->leftJoin('ServicosGcdbBundle:Customers', 'customer', 'WITH', 'customer.customerid= c2u_destino.idCustomers')
             ;
        if(key_exists('where', $arrayParams) && count($arrayParams['where'])){
            $query->where('1 = 1');
            foreach($arrayParams['where'] as $key => $filter){
                $query->andWhere("$filter[0] $filter[1] $filter[2]");
            }
        }
        if(key_exists('groupBy', $arrayParams)){
            $query->groupby($arrayParams['groupBy']);
        }

        if (key_exists('order', $arrayParams)) {
            $query->addOrderBy($arrayParams['sort'], $arrayParams['order']);
        }

        return $query->getQuery()->getArrayResult();
    }


    /**
     * Atualiza status das invoices
     *
     * @param  integer $status
     * @param  array $idsInvoice
     * @return array
     */
    public function updateStatusMovimentacoesIntegracaoProtheus($status, $idsMovimentacoes) {
        $queryBuilder = $this->_em->createQueryBuilder();
        $queryString = $queryBuilder->update('ServicosLumaBundle:Movimentacao', 'm')
                                    ->set('m.moviStatusIntegracao', $queryBuilder->expr()->literal($status))
                                    ->where($queryBuilder->expr()->in('m.moviCodigoid', $idsMovimentacoes))
                                    ->getQuery();
        //print_r($queryString->getSql());
        return $queryString->execute();
    }

    public function logs($arrayParams)
    {
        $query = $this->_em->createQueryBuilder();
        $query->select($arrayParams['campos'])
            ->from('ServicosLumaBundle:RemessamoviMovimentacaoLog', 'rml')
            ->innerJoin('ServicosLumaBundle:RemessamoviMovimentacao', 'rm', 'WITH', 'rml.idRemessamoviMovimentacao = rm.id')
            ->innerJoin('ServicosLumaBundle:Movimentacao' , 'm', 'WITH', 'm.moviCodigoid = rm.moviCodigoid');

        if(key_exists('where', $arrayParams) && count($arrayParams['where'])) {
            $query->where('1 = 1');
            foreach($arrayParams['where'] as $key => $filter) {
                $query->andWhere("$filter[0] $filter[1] $filter[2]");
            }
        }

        if (key_exists('limit', $arrayParams) && is_numeric($arrayParams['limit'])){
            $query->getMaxResults($arrayParams['limit']);

            if (key_exists('ofset', $arrayParams) && is_numeric($arrayParams['ofset'])){
                $query->getFirstResult($arrayParams['ofset']);
            }
        }

        if (key_exists('order', $arrayParams) && trim($arrayParams['order']) != '' && isset($arrayParams['sort'])){
            $query->addOrderBy($arrayParams['sort'], $arrayParams['order']);
        }

        return $query->getQuery()->getArrayResult();
    }


}
