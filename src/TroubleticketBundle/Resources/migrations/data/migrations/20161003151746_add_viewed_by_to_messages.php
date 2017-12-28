<?php

use Phinx\Migration\AbstractMigration;

class AddViewedByToMessages extends AbstractMigration
{
    public function change()
    {
        $table = $this->table('messages');
        $table->addColumn('viewed_by', 'integer', array('null' => true));
        $table->save();
    }
}