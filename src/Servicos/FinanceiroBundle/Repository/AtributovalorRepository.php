<?php

namespace Servicos\FinanceiroBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * AtributovalorRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class AtributovalorRepository extends EntityRepository
{
	private function getAtributoValorAPIFilters(array $params) 
	{
        $where = '';
        $parameters = array();
        if (isset($params['id']) && !empty($params['id'])) {
            $where .= '';
            $parameters['id'] = $params['id'];
        }

        return array(
            'parameters' => $parameters,
            'where' => $where
        );
    }

    public function getDadosAtributoByCodigoId($codigoId)
    {
      $manager = $this->getEntityManager();
      $connection = $manager->getConnection();

      $params = array('id' => $codigoId);
      $filters = $this->getAtributoValorAPIFilters($params);

      $sql = "
		    SELECT *
		      FROM atributovalor attrvalor
		INNER JOIN atributo attr
		        ON attr.atri_codigoid = attrvalor.atri_codigoid
		     WHERE attrvalor.atrivalo_codigoid = :id
		           %s
      ";

      $sql = sprintf($sql, $filters['where']);

      $inParameters = array();
      foreach ($filters['parameters'] as $key => $filter) {
          if (is_array($filter)) {
              $inParameters[$key] =\Doctrine\DBAL\Connection::PARAM_INT_ARRAY;
          }
      }

      $query = $connection->executeQuery($sql, $filters['parameters'], $inParameters);

      return $query->fetchAll();
    }
}
