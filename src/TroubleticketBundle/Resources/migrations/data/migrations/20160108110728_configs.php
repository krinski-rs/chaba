<?php

use Phinx\Migration\AbstractMigration;

class Configs extends AbstractMigration
{
    public function up()
    {
        $table = $this->table('configs', array('id' => false, 'primary_key' => array('name')));
        $table->addColumn('name', 'string')
            ->addColumn('value', 'string');
        $table->create();
        $this->execute('INSERT INTO "troubleticket"."configs" VALUES(\'interval_days\', \'30\')');
        $this->execute('INSERT INTO "troubleticket"."configs" VALUES(\'reports_amount\', \'5\')');
    }

    public function down()
    {
        $this->table('configs')->drop();
    }
}
