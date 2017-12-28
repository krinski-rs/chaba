<?php

use Phinx\Migration\AbstractMigration;

class AddStacksToReports extends AbstractMigration
{
    public function change()
    {
        $table = $this->table('reports');
        $table->addColumn('sn3', 'integer', array('null' => 'true'));
        $table->addColumn('sn3_counter', 'integer', array('null' => 'true'));
        $table->addColumn('voz', 'integer', array('null' => 'true'));
        $table->addColumn('voz_counter', 'integer', array('null' => 'true'));
        $table->save();
    }
}