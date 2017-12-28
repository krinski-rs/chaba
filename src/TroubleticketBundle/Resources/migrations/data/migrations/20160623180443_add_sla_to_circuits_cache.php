<?php

use Phinx\Migration\AbstractMigration;

/**
 * Adicionando o sla no cache
 *
 * @category Class
 * @package Migrations
 * @author Matheus S. Fontana <matheus.stein@absoluta.net>
 */
class AddSlaToCircuitsCache extends AbstractMigration
{
    /**
     * {@inheritdoc}
     */
    public function change()
    {
        $table = $this->table('circuits_cache');
        $table->addColumn('sla','string', array('null' => true));
        $table->save();
    }
}
