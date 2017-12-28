<?php

use Phinx\Migration\AbstractMigration;

class AddListOfMaterialsToSubcases extends AbstractMigration
{
    /**
     *
     */
    public function change()
    {
        $table = $this->table('subcases');
        $table->addColumn('list_of_materials', 'text', array('null' => true))->save();

    }
}
