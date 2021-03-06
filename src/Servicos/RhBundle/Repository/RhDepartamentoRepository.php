<?php

namespace Servicos\RhBundle\Repository;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\EntityRepository;
use Servicos\RhBundle\Entity\RhDepartamento;

/**
 * RhDepartamentoRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class RhDepartamentoRepository extends EntityRepository
{

    /**
     * @
     * @param $departamentoid
     * @param ArrayCollection $arrayDepartFilhos
     * @return mixed
     */
    public function getDepartamentosFilhos($departamentoid, $arrayDepartFilhos)
    {

        if($arrayDepartFilhos->count()  == 0){
            $filter = array(
                'campos' => 'DISTINCT departamento.idDepartamento, departamento.nome, departamento.staff',
                'where'  => array(array('departamento.idDepartamento', '=', $departamentoid))
            );
            $rowsDptFilho =  self::search($filter);
            if($rowsDptFilho)
            {
                foreach($rowsDptFilho as $item )
                {
                    $item['colaboradores'] = self::colaboradoresDepartamento($item['idDepartamento']);
                    $arrayDepartFilhos->add($item);
                }
            }
        }


        $filter = array(
            'campos' => 'DISTINCT departamento.idDepartamento, departamento.nome, departamento.staff',
            'where'  => array(array('departamentoAsc.idDepartamento', '=', $departamentoid))
        );
        $rowsDptFilho =  self::search($filter);
        if($rowsDptFilho)
        {
            foreach($rowsDptFilho as $item )
            {
                $item['colaboradores'] = self::colaboradoresDepartamento($item['idDepartamento']);
                $arrayDepartFilhos->add($item);
                self::getDepartamentosFilhos($item['idDepartamento'], $arrayDepartFilhos);
            }
        }

        return $arrayDepartFilhos;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function colaboradoresDepartamento($id){
        $filter = array(
            'campos' => 'DISTINCT colaborador.idColaborador, colaborador.nome, altUser.username, altUser.id as idAltUser',
            'where'  => array(array('departamento.idDepartamento', '=', $id))
        );
        return self::search($filter);
    }

    /**
     * @param array $arrayParam
     * @return mixed
     */
    private function search($arrayParam = array())
    {
        $query = $this->_em->createQueryBuilder();
        $query->select($arrayParam['campos'])
                ->from("ServicosRhBundle:RhDepartamento", "departamento")
                ->leftJoin("departamento.colaboradorDepartamento", "colaboradorDept")
                ->leftJoin("colaboradorDept.idColaborador", "colaborador")
                ->leftJoin("colaborador.autUsuarios", "altUser")
                ->leftJoin("departamento.idDepartamentoAsc", "departamentoAsc")
                ->leftJoin("departamentoAsc.colaboradorDepartamento", "colaboradordepartamentoAsc")
                ->leftJoin("colaboradordepartamentoAsc.idColaborador", "colaboradorAsc");

        if (key_exists('where', $arrayParam) && count($arrayParam['where'])) {
            $query->where('1=1');
            foreach ($arrayParam['where'] as $key => $filter) {
                $query->andWhere("$filter[0] $filter[1] $filter[2]");
            }
        }

        if (key_exists('limit', $arrayParam) && is_numeric($arrayParam['limit'])) {
            $query->setMaxResults($arrayParam['limit']);
        }

        if (key_exists('offset', $arrayParam) && is_numeric($arrayParam['offset'])) {
            $query->setFirstResult($arrayParam['offset']);
        }

        if (key_exists('order', $arrayParam) && !is_null($arrayParam['order'])) {
            $query->addOrderBy($arrayParam['sort'], $arrayParam['order']);
        }

        if (key_exists('groupBy', $arrayParam) && !is_null($arrayParam['groupBy'])) {
            $query->groupBy($arrayParam['groupBy']);
        }

       // print_r($query->getQuery()->getSQL());
        return $query->getQuery()->execute();
    }
}
