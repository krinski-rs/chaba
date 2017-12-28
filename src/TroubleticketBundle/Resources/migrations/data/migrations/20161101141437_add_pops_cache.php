<?php

use Phinx\Migration\AbstractMigration;

/**
 * Criação da tabela de pop's
 *
 * @category Class
 * @package Migrations
 * @author Rodrigo Gattermann <rodrigo.gattermann@deliverit.com.br>
 */
class AddPopsCache extends AbstractMigration
{
    /**
     * {@inheritdoc}
     */
    public function change()
    {
        $table = $this->table('pops_cache', array('id' => false, 'primary_key' => array('id')));
        $table
            ->addColumn('id', 'integer')
            ->addColumn('name', 'string');

        $table->create();
    }
}
