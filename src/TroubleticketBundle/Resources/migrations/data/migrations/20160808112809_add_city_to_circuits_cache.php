<?php

use Phinx\Migration\AbstractMigration;

class AddCityToCircuitsCache extends AbstractMigration
{
    public function change()
    {
        $table = $this->table('circuits_cache');
        $table->addColumn('city', 'string', array('null' => true, 'length' => 255));
        $table->save();
    }
}