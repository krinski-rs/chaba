<?php

use Phinx\Migration\AbstractMigration;

class AddCountersIntoReport extends AbstractMigration
{
    public function change()
    {
        $table = $this->table('reports');
        $table->addColumn('tme_counter', 'integer', array('null' => true))
            ->addColumn('paused_counter', 'integer', array('null' => true))
            ->addColumn('solved_counter', 'integer', array('null' => true))
            ->addColumn('tmr_counter', 'integer', array('null' => true))
            ->addColumn('noc_counter', 'integer', array('null' => true))
            ->addColumn('sn1_counter', 'integer', array('null' => true))
            ->addColumn('sn2_counter', 'integer', array('null' => true))
            ->addColumn('coc_counter', 'integer', array('null' => true))
            ->addColumn('displacement_counter', 'integer', array('null' => true))
            ->addColumn('infra_counter', 'integer', array('null' => true))
            ->addColumn('field_counter', 'integer', array('null' => true))
            ->addColumn('client_counter', 'integer', array('null' => true));
        $table->save();
    }
}
