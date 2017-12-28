<?php

namespace Servicos\FinanceiroBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * EnderecoentregaatributovalorRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class EnderecoentregaatributovalorRepository extends EntityRepository
{
	private $arrayColumnContrato = array(
			'cont.contCodigoid'
	);

	public function getContrato($contCodigoid){
		try{
			$column = implode(',', $this->arrayColumnContrato);
			$arrayWhere = array(
					array('cont.contCodigoid', '=', (integer)$contCodigoid)
			);
			return $this->findGeral(0, 0, $arrayWhere, array('cont.contCodigoid' => 'ASC'), array('cont.contCodigoid'), $column);
		}catch(Exception $e){
		}
	}
	
	public function countContrato($arrayWhere = array(), $orderBy = array('cont.contCodigoid' => 'ASC'), $groupBy = array()){
		try{
			$column = 'COUNT(DISTINCT cont.contCodigoid) AS total';
			return $this->findGeral(0, 0, $arrayWhere, $orderBy, $groupBy, $column);
		}catch (\Exception $ex){
			throw $ex;
		}
	}
	
	public function listContrato($offset = 0, $limit = 50, $arrayWhere = array(), $orderBy = array('cont.contCodigoid' => 'ASC'), $groupBy = array('cont.contCodigoid')){
		try{
			$column = implode(',', $this->arrayColumnContrato);
			return $this->findGeral($offset, $limit, $arrayWhere, $orderBy, $groupBy, $column);
		}catch (\Exception $ex){
			throw $ex;
		}
	}
	
	private function findGeral($offset = 0, $limit = 100, $arrayWhere = array(), $orderBy = array('cont.contCodigoid' => 'ASC'), $groupBy = array(), $column = 'cont.contCodigoid')
	{
		try {
			$query = $this->_em->createQueryBuilder();
			$query->select($column)
			->from("ServicosFinanceiroBundle:Enderecoentregaatributovalor", "endeentratrivalo")
			->innerJoin("endeentratrivalo.atrivaloCodigoid", "atrivalo")
			->innerJoin("atrivalo.atriCodigoid", "atri")
			->leftJoin("endeentratrivalo.endeentratrivaloPaicodigoid", "endeentratrivaloPai")
			->leftJoin("endeentratrivalo.contCodigoid", "cont")
			//->leftJoin("line.billing", "bill", 'WITH', 'TO_CHAR(bill.billTimeStart, \'YYYY-MM\') = montpaym.usePeriod')
			;
	
			if (count($arrayWhere) > 0) {
				foreach ($arrayWhere as $where) {
					if (count($where) < 3){
						throw new \RuntimeException('Invalid argument');
					}
					$bind_parameter = 'a'.rand(0, 999999);
					if(strtoupper(trim($where[1])) == 'IS NOT'){
						$query->andWhere($where[0].' IS NOT '.$where[2]);
					}elseif (strtoupper(trim($where[1])) == 'IS') {
						$query->andWhere($where[0].' IS '.$where[2]);
					}elseif (strtoupper(trim($where[1])) == 'IN' && (count($where[2]) || count(explode(',', $where[2])))){
						if(!is_array($where[2])){
							$where[2] = explode(',', $where[2]);
						}
						$query->andWhere(trim($where[0]).' '.trim($where[1]).' (:'.$bind_parameter.')');
						$values = array_values($where[2]);
	
						if(is_integer($values[0])){
							$query->setParameter(':'.$bind_parameter, array_values($where[2]), \Doctrine\DBAL\Connection::PARAM_INT_ARRAY);
						}else{
							$query->setParameter(':'.$bind_parameter, array_values($where[2]), \Doctrine\DBAL\Connection::PARAM_STR_ARRAY);
						}
	
					}elseif(strtoupper(trim($where[1])) == 'NOT IN' && (count($where[2]) || count(explode(',', $where[2])))){
						if(!is_array($where[2])){
							$where[2] = explode(',', $where[2]);
						}
						$query->andWhere(trim($where[0]).' '.trim($where[1]).' (:'.$bind_parameter.')');
						$values = array_values($where[2]);
	
						if(is_integer($values[0])){
							$query->setParameter(':'.$bind_parameter, array_values($where[2]), \Doctrine\DBAL\Connection::PARAM_INT_ARRAY);
						}else{
							$query->setParameter(':'.$bind_parameter, array_values($where[2]), \Doctrine\DBAL\Connection::PARAM_STR_ARRAY);
						}
					}else{
						$query->andWhere($where[0].' '.$where[1].' :'.$bind_parameter);
						$query->setParameter($bind_parameter, $where[2]);
					}
				}
			}
	
			if(is_array($groupBy) && count($groupBy)){
				foreach($groupBy as $group){
					$query->addGroupBy($group);
				}
			}
	
			if(is_array($orderBy) && count($orderBy)){
				foreach($orderBy as $order => $sort){
					$query->addOrderBy($order, $sort);
				}
			}
	
			if($offset){
				$query->setFirstResult($offset);
			}
	
			if($limit){
				$query->setMaxResults($limit);
			}
	
			return $query->getQuery()->execute();
	
		}catch (\Exception $e){
			throw new \Exception($e->getMessage(), $e->getCode());
		}
	}
	
}