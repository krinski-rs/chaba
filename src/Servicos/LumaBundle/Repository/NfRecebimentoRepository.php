<?php

namespace Servicos\LumaBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Exception;

class NfRecebimentoRepository extends EntityRepository
{

    public function search($arrayParams = array())
    {
        $query = $this->_em->createQueryBuilder();
        $query->select($arrayParams['campos'])
              ->from('ServicosLumaBundle:NfRecebimento', 'n')
              ->leftJoin('ServicosGcdbBundle:CadUsers', 'c', 'WITH', 'c.cnpj = n.nfCnpj')
              ->leftJoin('ServicosGcdbBundle:CadUsersNome', 'cn', 'WITH', 'c.id = cn.cadUsers and cn.admTipoNome=5');
        if(key_exists('where', $arrayParams) && count($arrayParams['where'])){
            $query->where('1 = 1');
            foreach($arrayParams['where'] as $key => $filter){
                $query->andWhere("$filter[0] $filter[1] $filter[2]");
            }
        }
        if(key_exists('groupBy', $arrayParams)){
            $query->groupby($arrayParams['groupBy']);
        }
        if (key_exists('order', $arrayParams) && trim($arrayParams['order']) != '' && isset($arrayParams['sort'])){
            $query->addOrderBy($arrayParams['sort'], $arrayParams['order']);
        }
        //print_r($query->getQuery()->getSQL());
        return $query->getQuery()->getArrayResult();
    }


    /**
     * Atualiza status da NfRecebimento
     *
     * @param  integer $status
     * @param  array $NfRecebimento
     * @return array
     */
    public function updateStatusNfRecebimento($status, $idsNfRecebimento) {
        $queryBuilder = $this->_em->createQueryBuilder();
        $queryString = $queryBuilder->update('ServicosLumaBundle:NfRecebimento', 'n')
                                    ->set('n.status', $queryBuilder->expr()->literal($status))
                                    ->where($queryBuilder->expr()->in('n.id', $idsNfRecebimento))
                                    ->getQuery();
        //print_r($queryString->getSql());
        return $queryString->execute();
    }



}
