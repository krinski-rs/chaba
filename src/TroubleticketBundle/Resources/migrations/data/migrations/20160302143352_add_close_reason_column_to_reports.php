<?php

use Phinx\Migration\AbstractMigration;

class AddCloseReasonColumnToReports extends AbstractMigration
{
    public function change()
    {
        $table = $this->table('reports');
        $table->addColumn('close_reason', 'text', array('null' => true))->save();
    }
}
