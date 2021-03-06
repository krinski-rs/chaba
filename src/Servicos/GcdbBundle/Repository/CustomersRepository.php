<?php

namespace Servicos\GcdbBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * CustomersRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class CustomersRepository extends EntityRepository
{
	private $arrayColumnCustomer = array(
		'cust.customerid',
		'cadUser.id',
		'IF(cadUser.tipo = \'J\', cadNomeRazao.nome, \'\') AS razaoSocial',
		'IF(cadUser.tipo = \'J\', cadNomeFantasia.nome, \'\') AS nomeFantasia',
		'IF(cadUser.tipo = \'F\', REPLACE(GROUP_CONCAT(cadNome.nome), \';\', \'\'), \'\') AS nomeCliente',
		'cadUser.tipo',
		'cadUser.cnpj',
		'cadUser.cpf',
		//'cadUser.inscEst',
		//'cadUser.inscMun',
		//'cadUser.senha',
		'cadUser.dtAbertura',
		'cadUser.cep',
		'cadUser.endereco',
		'cadUser.numero',
		'cadUser.bairro',
		//'cadUser.site',
		//'cadUser.dtCadastro',
		'cadUser.latitude',
		'cadUser.longitude',
		'segmento.descricao AS segmentoInterno',
		//'cadUser.simples',
		//'cust.atpass',
		//'cust.tributaicms',
		//'cust.delin',
		//'cust.obs'
		'priori.nivel'
	);
	
	public function getCustomer($cid){
		try{
			$arrayWhere = array(array('cust.customerid', '=', (integer)$cid));
			$orderBy = array('cust.customerid' => 'ASC');
			$groupBy = array('cust.customerid');
			$column = implode(',', $this->arrayColumnCustomer);
			return $this->findGeral(0, 0, $arrayWhere, $orderBy, array(), $column);
		}catch (\Exception $ex){
			throw $ex;
		}
	}

	public function countCustomer($arrayWhere = array(), $orderBy = array('cust.customerid' => 'ASC'), $groupBy = array()){
		try{
			$column = 'COUNT(DISTINCT cust.customerid) AS total';
			return $this->findGeral(0, 0, $arrayWhere, $orderBy, $groupBy, $column);
		}catch (\Exception $ex){
			throw $ex;
		}
	}

	public function listCustomer($offset = 0, $limit = 50, $arrayWhere = array(), $orderBy = array('cust.customerid' => 'ASC'), $groupBy = array('cust.customerid')){
		try{
			$column = implode(',', $this->arrayColumnCustomer);
			return $this->findGeral($offset, $limit, $arrayWhere, $orderBy, $groupBy, $column);
		}catch (\Exception $ex){
			throw $ex;
		}
	}

	public function listColumns($offset = 0, $limit = 50, $arrayWhere = array(), $orderBy = array('cust.customerid' => 'ASC'), $groupBy = array('cust.customerid'),  $column = 'cust.customerid'){
		try{
			return $this->findGeral($offset, $limit, $arrayWhere, $orderBy, $groupBy, $column);
		}catch (\Exception $ex){
			throw $ex;
		}
	}
	
	private function findGeral($offset = 0, $limit = 100, $arrayWhere = array(), $orderBy = array('cust.customerid' => 'ASC'), $groupBy = array(), $column = 'cust.customerid')
	{
		try {
			$query = $this->_em->createQueryBuilder();
			$query->select($column)
			->from("ServicosGcdbBundle:Customers", "cust")
 			->innerJoin("cust.cadUser", "cadUser")
 			
 			->leftJoin("cadUser.cadUsersNome", "cadNomeRazao")
 			->leftJoin("cadNomeRazao.admTipoNome", "tipoNomeRazao", 'WITH', 'tipoNomeRazao.id = 5 AND cadUser.tipo = \'J\'')
 			
 			->leftJoin("cadUser.cadUsersNome", "cadNomeFantasia")
 			->leftJoin("cadNomeFantasia.admTipoNome", "tipoNomeFantasia", 'WITH', 'tipoNomeFantasia.id = 6 AND cadUser.tipo = \'J\'')
 			
 			->leftJoin("cadUser.cadUsersNome", "cadNome")
 			->leftJoin("cadNome.admTipoNome", "tipoNome", 'WITH', 'tipoNome.id IN (1,2,3) AND cadUser.tipo = \'F\'')
 			
 			->leftJoin("cadUser.admLogradouro", "admLogr")
 			->leftJoin("cadUser.segmento", "segmento")
 			->leftJoin("cadUser.admPais", "admPais")
 			->leftJoin("cadUser.admUf", "admUf")
 			->leftJoin("cadUser.admCidades", "admCida")
 			->leftJoin("cust.cadLigacaoC2u", "cust2user")
 			->leftJoin("cust2user.cadUsers2", "cadUsersRela")
 			->leftJoin("cadUsersRela.admLogradouro", "admLogrRela")
 			->leftJoin("cadUsersRela.admPais", "admPaisRela")
 			->leftJoin("cadUsersRela.admUf", "admUfRela")
 			->leftJoin("cadUsersRela.admCidades", "admCidaRela")
 			->leftJoin("cadUsersRela.cadUsersNome", "cadNomeRela")
 			->leftJoin("cadNomeRela.admTipoNome", "tipoNomeRela")
 			->leftJoin("cust.prioridade", "priori")
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

	public function buscaCustomerPorCID(array $cids)
	{
		try{
			$query = $this->_em->createQueryBuilder();
				
			$columns = array(
				'cust.customerid as customerid',
				'ev.id as codigo_executivo_vendas',
				'ev.username as executivo_vendas',
				'segmento.descricao as nome_segmento',
				'IF(cadUser.tipo = \'J\', cadNomeRazao.nome, REPLACE(GROUP_CONCAT(cadNome.nome),\';\',\'\')) AS razaoSocial',
				'IF(cadUser.tipo = \'J\', cadUser.cnpj, cadUser.cpf) as cnpj_cpf'
			);

			$query->select($columns)
			->from("ServicosGcdbBundle:Customers", "cust")
 			->innerJoin("cust.cadUser", "cadUser")
 			->leftJoin('cust.relGn', 'vendedor')
 			->leftJoin('vendedor.usuarioid', 'ev')

 			->leftJoin("cadUser.cadUsersNome", "cadNomeRazao")
 			->leftJoin("cadNomeRazao.admTipoNome", "tipoNomeRazao", 'WITH', 'tipoNomeRazao.id = 5')

 			->leftJoin("cadUser.cadUsersNome", "cadNomeFantasia")
 			->leftJoin("cadNomeFantasia.admTipoNome", "tipoNomeFantasia", 'WITH', 'tipoNomeFantasia.id = 6 ')

 			->leftJoin("cadUser.cadUsersNome", "cadNome")
 			->leftJoin("cadNome.admTipoNome", "tipoNome", 'WITH', 'tipoNome.id IN (1,2,3)')
 			->leftJoin("cadUser.segmento", "segmento")
 			->where('vendedor.revogado IS NULL')
 			->andWhere('cust.customerid IN (:custumers)')
 			->groupBy('cust.customerid')
 			->setParameter('custumers', $cids);

			return $query->getQuery()->execute();
		} catch (\Exception $e){
			throw new \Exception($e->getMessage(), $e->getCode());
		}
	}

	public function findCustomer($customerid)
	{
		try{
			$columns = array(
				'cust.customerid',
				'cadUser.id',
				'IF(cadUser.tipo = \'J\', cadNomeRazao.nome, \'\') AS razaoSocial',
				'IF(cadUser.tipo = \'J\', cadNomeFantasia.nome, \'\') AS nomeFantasia',
				'IF(cadUser.tipo = \'F\', REPLACE(GROUP_CONCAT(cadNome.nome), \';\', \'\'), \'\') AS nomeCliente',
				'cadUser.tipo',
				'cadUser.cnpj',
				'cadUser.cpf',
				'cadUser.dtAbertura',
				'cadUser.cep',
				'cadUser.endereco',
				'cadUser.numero',
				'cadUser.bairro',
				'cadUser.latitude',
				'cadUser.longitude',
				'fone.ddd',
				'fone.telefone',
				'email.email',
			);

			$query = $this->_em->createQueryBuilder();
			$query->select($columns)
			->from("ServicosGcdbBundle:Customers", "cust")
 			->innerJoin("cust.cadUser", "cadUser")

 			->leftJoin("cadUser.cadUsersNome", "cadNomeRazao")
 			->leftJoin("cadNomeRazao.admTipoNome", "tipoNomeRazao", 'WITH', 'tipoNomeRazao.id = 5 AND cadUser.tipo = \'J\'')

 			->leftJoin("cadUser.cadUsersNome", "cadNomeFantasia")
 			->leftJoin("cadNomeFantasia.admTipoNome", "tipoNomeFantasia", 'WITH', 'tipoNomeFantasia.id = 6 AND cadUser.tipo = \'J\'')

 			->leftJoin("cadUser.cadUsersNome", "cadNome")
 			->leftJoin("cadNome.admTipoNome", "tipoNome", 'WITH', 'tipoNome.id IN (1,2,3) AND cadUser.tipo = \'F\'')

 			->leftJoin('cadUser.cadUsersTelefone', 'fone', 'WITH', 'fone.principal = 1')
 			->leftJoin('cadUser.cadUsersEmail', 'email', 'WITH', 'email.principal = 1')

 			->where('cust.customerid = :customerid')
 			->setParameter('customerid', $customerid)

 			->addGroupBy('cust.customerid')
 			->addOrderBy('cust.customerid', 'ASC');

			return $query->getQuery()->execute();
		} catch (\Exception $e){
			throw new \Exception($e->getMessage(), $e->getCode());
		}
	}

	public function getUserNameById($cid)
    {
        try {
            $query = $this->createQueryBuilder('c');
            $user = $query->where('c.customerid = :id')
                  ->setParameter('id', $cid)
                  ->getQuery()
                  ->getOneOrNullResult();

            if (null === $user) {
                return '';
            }
        } catch (\Exception $ex) {
            throw $ex;
        }

        return $user->getFirst();
    }
}