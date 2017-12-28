<?php

namespace Servicos\FinanceiroBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * ModeloRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ModeloRepository extends EntityRepository
{
    public function getInfoModelo($modeCodigoId)
    {
        $manager = $this->getEntityManager();
        $connection = $manager->getConnection();

        $sql = "
            SELECT m.mode_codigoid
                 , c.cont_indisponibilidade AS porcentagem_disponibilidade
                 , COALESCE(dc.duracont_periodo, 24) AS periodo_renovacao
                 , COALESCE(dc.duracont_meses, 1) AS dia_mes
                 , 12 AS status -- sempre entra como Pendente de Ativação
                 , a.ativ_diasapos AS limite_ativacao
                 , s.sla_disponibilidade AS sla
                 , s.sla_codigoid as sla_id
                 , r.rest_contratardeterceiro AS terceiros
                 , r.rest_divulgaramarca AS marca
                 , r.rest_mudarmeiotransmicao AS meio
                 , r.rest_transferirdireitos AS transferir
                 , c.cont_limiteatraso AS limite_atraso
                 , c.cont_prazorescisao AS prazo_recisao
                 , c.cont_indicereajuste AS indice
                 , c.cont_prazoreajuste AS prazo_reajuste
                 , c.cont_menorprazo as menor_prazo
                 , c.mult_codigoid AS multa
              FROM financeiro.modelo m
        INNER JOIN financeiro.contrato c ON m.cont_codigoid = c.cont_codigoid
        INNER JOIN financeiro.sla s ON c.sla_codigoid = s.sla_codigoid
         LEFT JOIN financeiro.restricao r ON c.cont_codigoid = r.cont_codigoid
         LEFT JOIN financeiro.ativacao a ON c.cont_codigoid = a.cont_codigoid
         LEFT JOIN financeiro.duracaocontrato dc ON c.cont_codigoid = dc.cont_codigoid
             WHERE m.mode_codigoid = :id;
        ";

        $query = $connection->executeQuery($sql, array('id' => $modeCodigoId), array());
        
        return $query->fetchAll();
    }
}