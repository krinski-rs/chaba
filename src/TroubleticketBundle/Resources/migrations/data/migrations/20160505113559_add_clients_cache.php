<?php

use Phinx\Migration\AbstractMigration;

/**
 * Criação da tabela para cache de clientes
 *
 * @category Class
 * @package  Migration
 * @author Luiz Cunha <luiz.felipe@absoluta.net>
 */
class AddClientsCache extends AbstractMigration
{
    /**
     * {@inheritdoc}
     */
    public function change()
    {
        $table = $this->table(
            'clients_cache',
            array('id' => false, array('primary_key' => array('id')))
        );
        $table->addColumn('id', 'integer')
            ->addColumn('name', 'string');

        $table->create();
    }
}
