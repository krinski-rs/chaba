<?php

namespace TroubleticketBundle\Command;


use TroubleticketBundle\Entity;

/**
 * Comando para realizar a sincronização de pop's dos sitemas da Vogel com o
 * Troubleticket
 *
 * @category Class
 * @package  Command
 * @author Rodrigo Gattermann <rodrigo.gattermann@deliverit.com.br>
 */
class SynchronizePopsCommand extends AbstractSynchronizerCommand
{
    /**
     * {@inheritDoc}
     */
    protected function getApi()
    {
        return $this->getContainer()->get('troubleticket.pop_api');
    }

    /**
     * {@inheritDoc}
     */
    protected function getAlias()
    {
        return 'pop';
    }

    /**
     * {@inheritDoc}
     */
    protected function createEntity($data)
    {
        $entity = new Entity\PopsCache;
        $entity->setId($data->id)
               ->setName($data->nome);

        return $entity;
    }

    /**
     * {@inheritDoc}
     */
    protected function parseResponse($response)
    {
        return $response->pop;
    }

    /**
     * {@inheritDoc}
     */
    protected function getRemoveQuery(array $ids)
    {
        $manager = $this->getContainer()->get('doctrine')
            ->getManager('troubleticket');

        $builder = $manager->createQueryBuilder();
        $builder->delete('TroubleticketBundle:PopsCache', 'pops_c')
            ->where($builder->expr()->in('pops_c.id', ':ids'))
            ->setParameters(array('ids' => $ids));

        return $builder->getQuery();
    }
}
