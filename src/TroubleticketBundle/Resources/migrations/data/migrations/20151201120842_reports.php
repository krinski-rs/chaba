<?php

use Phinx\Migration\AbstractMigration;

class Reports extends AbstractMigration
{
    public function change()
    {
        $reports = $this->table('reports');
        $reports->addColumn('parent_id', 'integer',array('null' => true))
            ->addColumn('circuit_id', 'integer')
            ->addColumn('designation', 'string')
            ->addColumn('initial_date', 'datetime')
            ->addColumn('final_date', 'datetime', array('null' => true))
            ->addColumn('type', 'integer')
            ->addColumn('description', 'text', array('null' => true))
            ->addColumn('stack', 'integer')
            ->addColumn('operator_report_identifier', 'string', array('null' => true))
            ->addColumn('responsible', 'string',array('null' => true))
            ->addColumn('requester_name', 'string', array('null' => true))
            ->addColumn('requester_phone', 'string', array('null' => true))
            ->addColumn('requester_email', 'string', array('null' => true))
            ->addColumn('cause', 'string', array('null' => true))
            ->addColumn('failure', 'string', array('null' => true))
            ->addColumn('failure_local', 'string', array('null' => true))
            ->addColumn('problem', 'string', array('null' => true))
            ->addColumn('status', 'integer')
            ->addForeignKey('parent_id', 'reports', 'id');
        $reports->create();
    }
}
