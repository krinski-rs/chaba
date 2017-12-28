<?php

namespace TroubleticketBundle\Command;


use TroubleticketBundle\Entity;

/**
 * Comando para realizar a sincronização de fornecedores dos sitemas da Vogel com o
 * Troubleticket
 *
 * @category Class
 * @package  Command
 * @author Rodrigo Gattermann <rodrigo.gattermann@deliverit.com.br>
 */
class SynchronizeProvidersCommand extends AbstractSynchronizerCommand
{
    /**
     * {@inheritDoc}
     */
    protected function getApi()
    {
        return $this->getContainer()->get('troubleticket.provider_api');
    }

    /**
     * {@inheritDoc}
     */
    protected function getAlias()
    {
        return 'fornecedores';
    }

    /**
     * {@inheritDoc}
     */
    protected function createEntity($data)
    {
        $entity = new Entity\ProvidersCache;
        $entity->setId($data->id)
               ->setCnpj($data->cnpj)
               ->setNomeFantasia($data->nome_fantasia)
               ->setRazaoSocial($data->razao_social);

        return $entity;
    }

    /**
     * {@inheritDoc}
     */
    protected function parseResponse($response)
    {
        return $response->provider;
    }

    /**
     * {@inheritDoc}
     */
    protected function getRemoveQuery(array $ids)
    {
        $manager = $this->getContainer()->get('doctrine')
            ->getManager('troubleticket');

        $builder = $manager->createQueryBuilder();
        $builder->delete('TroubleticketBundle:ProvidersCache', 'provicers_c')
            ->where($builder->expr()->in('provicers_c.id', ':ids'))
            ->setParameters(array('ids' => $ids));

        return $builder->getQuery();
    }
}
