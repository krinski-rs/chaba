<?php

namespace TroubleticketBundle\Command;


use TroubleticketBundle\Entity;

/**
 * Comando para realizar a sincronização de clientes dos sitemas da Vogel com o
 * Troubleticket
 *
 * @category Class
 * @package  Command
 * @author Luiz Cunha <luiz.felipe@absoluta.net>
 */
class SynchronizeClientsCommand extends AbstractSynchronizerCommand
{
    /**
     * {@inheritDoc}
     */
    protected function getApi()
    {
        return $this->getContainer()->get('troubleticket.client_api');
    }

    /**
     * {@inheritDoc}
     */
    protected function getAlias()
    {
        return 'clientes';
    }

    /**
     * {@inheritDoc}
     */
    protected function createEntity($data)
    {
        $entity = new Entity\ClientsCache;
        $entity->setId($data->customerid)
            ->setName($data->nomeFantasia)
            ->setNivel($data->nivel);

        return $entity;
    }

    /**
     * {@inheritDoc}
     */
    protected function parseResponse($response)
    {
        return $response->customer;
    }

    /**
     * {@inheritDoc}
     */
    protected function getRemoveQuery(array $ids)
    {
        $manager = $this->getContainer()->get('doctrine')
            ->getManager('troubleticket');

        $builder = $manager->createQueryBuilder();
        $builder->delete('TroubleticketBundle:ClientsCache', 'cc')
            ->where($builder->expr()->in('cc.id', ':ids'))
            ->setParameters(array('ids' => $ids));

        return $builder->getQuery();
    }
}
