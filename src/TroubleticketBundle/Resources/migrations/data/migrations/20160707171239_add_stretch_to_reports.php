<?php

use Phinx\Migration\AbstractMigration;

class AddStretchToReports extends AbstractMigration
{
    /**
     *
     */
    public function change()
    {
        $table = $this->table('reports');
        $table->addColumn('stretch', 'text', array('null' => 'true'))->save();
    }
}
