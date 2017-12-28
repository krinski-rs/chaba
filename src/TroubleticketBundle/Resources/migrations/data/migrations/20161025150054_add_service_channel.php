<?php

use Phinx\Migration\AbstractMigration;

class AddServiceChannel extends AbstractMigration
{
    public function change()
    {
        $table = $this->table('reports');
        $table->addColumn('service_channel', 'integer', array('null' => true));
        $table->save();
    }
}
