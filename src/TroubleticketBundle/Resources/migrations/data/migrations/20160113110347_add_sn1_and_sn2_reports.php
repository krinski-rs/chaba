<?php

use Phinx\Migration\AbstractMigration;

class AddSn1AndSn2Reports extends AbstractMigration
{
    public function change()
    {
        $reports = $this->table('reports');
        $reports->addColumn('sn1', 'integer', array('null' => true));
        $reports->addColumn('sn2', 'integer', array('null' => true));
        $reports->save();
    }
}