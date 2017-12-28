<?php

use Phinx\Migration\AbstractMigration;

class AddReportStatusToTimeCounters extends AbstractMigration
{
    public function change()
    {
        $table = $this->table('time_counters');
        $table->addColumn('report_status', 'integer', array('default' => 0));
        $table->save();
    }
}
