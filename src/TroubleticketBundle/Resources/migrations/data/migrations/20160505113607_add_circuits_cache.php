<?php

use Phinx\Migration\AbstractMigration;

/**
 * Criação da tabela de circuitos
 *
 * @category Class
 * @package  Migrations
 * @author Luiz Cunha <luiz.felipe@absoluta.net>
 */
class AddCircuitsCache extends AbstractMigration
{
    /**
     * {@inheritdoc}
     */
    public function change()
    {
        $table = $this->table('circuits_cache', array('id' => false, 'primary_key' => array('id')));
        $table
            ->addColumn('id', 'integer')
            ->addColumn('designation', 'string')
            ->addColumn('final_client', 'string')
            ->addColumn('uf_ponta_a', 'string')
            ->addColumn('client_id', 'integer', array('null' => true));

        $table->create();
    }
}
