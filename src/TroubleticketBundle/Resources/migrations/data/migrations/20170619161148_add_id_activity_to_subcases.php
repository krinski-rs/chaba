<?php

use Phinx\Migration\AbstractMigration;

class AddIdActivityToSubcases extends AbstractMigration
{

    /**
     * Migrate Up.
     */
    public function up()
    {
    	$table = $this->table('subcases');
    	$table->addColumn('id_activity','integer',array('null'=> true));
    	$table->save();
    }

    /**
     * Migrate Down.
     */
    public function down()
    {
    	$table = $this->table('subcases');
    	$table->removeColumn('id_activity');
    	$table->save();
    }
}