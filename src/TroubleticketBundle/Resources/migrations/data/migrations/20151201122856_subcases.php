<?php

use Phinx\Migration\AbstractMigration;

class Subcases extends AbstractMigration
{
    public function change()
    {
        $subcases = $this->table('subcases');
        $subcases->addColumn('team', 'string', array('null' => true))
            ->addColumn('forecast', 'time', array('null' => true))
            ->addColumn('status', 'integer')
            ->addColumn('type', 'integer')
            ->addColumn('report_id', 'integer')
            ->addForeignKey('report_id', 'reports', 'id');
        $subcases->create();
    }
}
