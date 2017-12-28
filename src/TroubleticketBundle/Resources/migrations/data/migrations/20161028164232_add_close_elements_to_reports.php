<?php

use Phinx\Migration\AbstractMigration;

class AddCloseElementsToReports extends AbstractMigration
{
    
    public function change()
    {
        $table = $this->table('reports');
        $table->addColumn('closed_symptom', 'integer', array('null' => true));
        $table->addColumn('structure', 'string', array('null' => true));
        $table->addColumn('element', 'string', array('null' => true));
        $table->addColumn('pop_id', 'integer', array('null' => true));
        $table->addColumn('provider_id', 'integer', array('null' => true));
        $table->addColumn('incident', 'string', array('null' => true));
        $table->save();
    }
}