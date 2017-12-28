<?php

use Phinx\Migration\AbstractMigration;

class History extends AbstractMigration
{
    public function change()
    {
        $history = $this->table('history');
        $history->addColumn('report_id', 'integer')
            ->addColumn('subcase_id', 'integer', array('null' => true))
            ->addColumn('comment', 'text')
            ->addColumn('date', 'datetime')
            ->addColumn('reason', 'text', array('null' => true))
            ->addColumn('support_level', 'string',array('null' => true))
            ->addColumn('report_status', 'integer')
            ->addColumn('usuario', 'string',array('null' => true))
            ->addForeignKey('report_id', 'reports', 'id')
            ->addForeignKey('subcase_id', 'subcases', 'id');
        $history->create();
    }
}
