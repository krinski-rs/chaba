<?php

use Phinx\Migration\AbstractMigration;

class TimeCounters extends AbstractMigration
{
    public function change()
    {
        $timeCounters = $this->table('time_counters');
        $timeCounters->addColumn('report_id', 'integer')
            ->addColumn('initial_date', 'datetime')
            ->addColumn('final_date', 'datetime', array('null' => true))
            ->addColumn('stack', 'integer')
            ->addColumn('subcase_id', 'integer', array('null' => true))
            ->addColumn('subcase_status', 'integer', array('null' => true))
            ->addForeignKey('report_id', 'reports', 'id')
            ->addForeignKey('subcase_id', 'subcases', 'id');
        $timeCounters->create();
    }
}
