<?php

namespace TroubleticketBundle\Command;


use TroubleticketBundle\Entity;

/**
 * Comando para realizar a sincronização de circuitos dos sitemas da Vogel com o
 * Troubleticket
 *
 * @category Class
 * @package  Command
 * @author Luiz Cunha <luiz.felipe@absoluta.net>
 */
class SynchronizeCircuitsCommand extends AbstractSynchronizerCommand
{

    /**
     * {@inheritDoc}
     */
    protected function getApi()
    {
        return $this->getContainer()->get('troubleticket.circuit_api');
    }

    /**
     * {@inheritDoc}
     */
    protected function getAlias()
    {
        return 'circuitos';
    }

    /**
     * {@inheritDoc}
     */
    protected function createEntity($data)
    {
        $clientId = null;
        if (isset($data->clieCodigoid)) {
            $clientId = $data->clieCodigoid;
        }

        $entity = new Entity\CircuitsCache;
        $entity->setId($data->contCodigoid)
            ->setDesignation($data->designador)
            ->setFinalClient($data->clienteFinal->nome)
            ->setUfPontaA($data->siglaUf)
            ->setClientId($clientId)
            ->setSla($data->sla->disponibilidade)
            ->setCity($data->nomeCidade);

        return $entity;
    }

    /**
     * {@inheritDoc}
     */
    protected function parseResponse($response)
    {
        return $response->circuito;
    }

    /**
     * {@inheritDoc}
     */
    protected function getRemoveQuery(array $ids)
    {
        $manager = $this->getContainer()->get('doctrine')
            ->getManager('troubleticket');

        $builder = $manager->createQueryBuilder();
        $builder->delete('TroubleticketBundle:CircuitsCache', 'cc')
            ->where($builder->expr()->in('cc.id', ':ids'))
            ->setParameters(array('ids' => $ids));

        return $builder->getQuery();
    }

}
