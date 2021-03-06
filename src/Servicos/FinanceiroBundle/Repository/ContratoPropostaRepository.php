<?php

namespace Servicos\FinanceiroBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * ContratoPropostaRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ContratoPropostaRepository extends EntityRepository
{
    public function getUnidadeContratoByProposta($propostaId) {
        try {
            $strQuery = <<<SQL
SELECT
    c.cnpj,
    u.unid_nome as unidade,
    contr.unid_codigoid as codigo_unidade
FROM financeiro.contratoproposta cp
    INNER JOIN financeiro.contrato contr ON contr.cont_codigoid = cp.idcontrato
    INNER JOIN gcdb.Customers2users c2u ON contr.clie_codigoid = c2u.id_customers
    INNER JOIN gcdb.cad_users c ON c.id = c2u.id_users
    INNER JOIN luma.unidade u ON u.unid_codigoid = contr.unid_codigoid
    INNER JOIN luma.tipounidade tu ON tu.unid_codigoid = u.unid_codigoid AND tu.tipo_codigoid = 1
WHERE cp.idproposal = :proposal
SQL;
            $query = $this->_em->getConnection()->prepare($strQuery);
            $query->execute(array('proposal' => $propostaId));

            return $query->fetchAll();
        } catch (exception $ex) {
            throw $ex;
        }
    }

    public function getUltimoContratoProposta($proposalId)
    {
        $sql = "SELECT cont_codigoid as id, cont_numero as numero FROM contrato c"
        . " JOIN contratoproposta cp ON cp.idcontrato = c.cont_codigoid"
        . " WHERE cp.idproposal = :proposalId"
        . " ORDER BY id DESC"
        . " LIMIT 1";

        $query = $this->_em->getConnection()->prepare($sql);

        $query->execute(array('proposalId' => $proposalId));

        return $query->fetch();
    }

    public function removeVinculoContratoInexistente($proposalId)
    {
        $qb = $this->_em->createQueryBuilder();

        $qb->select('cp.id as contratoPropostaId, c.contCodigoid as contratoId')
            ->from ('ServicosFinanceiroBundle:Contratoproposta', 'cp')
            ->leftJoin('ServicosFinanceiroBundle:Contrato', 'c', 'WITH', 'c.contCodigoid = cp.idcontrato')
            ->where('cp.idproposal = :proposalId')
            ->orderBy('cp.id', 'DESC')
            ->setMaxResults(1)
            ->setParameter('proposalId', $proposalId);

        $result = $qb->getQuery()->getOneOrNullResult();

        if (is_null($result) || ! is_null($result['contratoId'])) {
            return;
        }

        $this->remove($this->find($result['contratoPropostaId']));

        $this->flush();
    }
}
