<?php

use Phinx\Migration\AbstractMigration;

/**
 * Criação da tabela de providers
 *
 * @category Class
 * @package Migrations
 * @author Rodrigo Gattermann <rodrigo.gattermann@deliverit.com.br>
 */
class AddProvidersCache extends AbstractMigration
{
    /**
     * {@inheritdoc}
     */
    public function change()
    {
        $table = $this->table('providers_cache', array('id' => false, 'primary_key' => array('id')));
        $table
            ->addColumn('id', 'integer')
            ->addColumn('cnpj', 'string')
            ->addColumn('razao_social', 'string', array('null' => true))
            ->addColumn('nome_fantasia', 'string', array('null' => true));

        $table->create();
    }
}
