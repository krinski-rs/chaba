<?php

use Phinx\Migration\AbstractMigration;

class AddIssueAndClientFlagToReports extends AbstractMigration
{
    public function up()
    {
        $reports = $this->table('reports');
        $reports->addColumn('issue', 'decimal', array('length' => 1, 'null' => false, 'default' => 0));
        $reports->addColumn('created_by_client', 'boolean', array('null' => true, 'default' => false));
        $reports->save();

        $this->execute('UPDATE reports SET created_by_client = false');

        $reports->changeColumn('created_by_client', 'boolean', array('null' => false, 'default' => false));
    }

    public function down()
    {
        $reports = $this->table('reports');
        $reports->removeColumn('issue');
        $reports->removeColumn('created_by_client');
        $reports->save();
    }
}