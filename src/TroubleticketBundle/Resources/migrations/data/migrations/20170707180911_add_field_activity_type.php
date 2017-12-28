<?php

use Phinx\Migration\AbstractMigration;

class AddFieldActivityType extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     *
     * Uncomment this method if you would like to use it.
     *
    public function change()
    {
    }
    */
    
    /**
     * Migrate Up.
     */
    public function up()
    {
        $table = $this->table('subcases');
        $table->addColumn('activity_type','string',array('limit'=> 12,'null' => true));
        $table->save();
    }

    /**
     * Migrate Down.
     */
    public function down()
    {
        $table = $this->table('subcases');
        $table->removeColumn('activity_type');
        $table->save();
    }
}