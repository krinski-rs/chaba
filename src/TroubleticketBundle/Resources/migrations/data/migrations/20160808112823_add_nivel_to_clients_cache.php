<?php

use Phinx\Migration\AbstractMigration;

class AddNivelToClientsCache extends AbstractMigration
{
    public function change()
    {
        $table = $this->table('clients_cache');
        $table->addColumn('nivel', 'string', array('null' => true, 'length' => 255));
        $table->save();

        $this->execute('UPDATE troubleticket.clients_cache SET nivel = \'\'');

        $table->changeColumn('nivel', 'string', array('null' => false, 'length' => 255));
        $table->save();
    }
}