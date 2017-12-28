<?php

use Phinx\Migration\AbstractMigration;

class AddSolutionReports extends AbstractMigration
{
    public function change()
    {
        $reports = $this->table('reports');
        $reports->addColumn('solution', 'string', array('null' => true));
        $reports->save();
    }
}