<?php

namespace TroubleticketBundle\Command;


use TroubleticketBundle\Entity;

/**
 * Comando para realizar a sincronização de colaboradores dos sitemas da Vogel com o
 * Troubleticket
 *
 * @category Class
 * @package  Command
 * @author Luiz Cunha <luiz.felipe@absoluta.net>
 */
class SynchronizeColaboratorsCommand extends AbstractSynchronizerCommand
{
    /**
     * {@inheritDoc}
     */
    protected function getApi()
    {
        return $this->getContainer()->get('troubleticket.colaborador_api');
    }

    /**
     * {@inheritDoc}
     */
    protected function getAlias()
    {
        return 'colaboradores';
    }

    /**
     * {@inheritDoc}
     */
    protected function createEntity($data)
    {
        $entity = new Entity\ColaboratorsCache;
        $entity->setId($data->id)
            ->setName($data->nome);

        return $entity;
    }

    /**
     * {@inheritDoc}
     */
    protected function parseResponse($response)
    {
        return $response->colaborador;
    }

    /**
     * {@inheritDoc}
     */
    protected function getRemoveQuery(array $ids)
    {
        $manager = $this->getContainer()->get('doctrine')
            ->getManager('troubleticket');

        $builder = $manager->createQueryBuilder();
        $builder->delete('TroubleticketBundle:ColaboratorsCache', 'cc')
            ->where($builder->expr()->in('cc.id', ':ids'))
            ->setParameters(array('ids' => $ids));

        return $builder->getQuery();
    }
}
