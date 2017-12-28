<?php

use Phinx\Migration\AbstractMigration;

class AddSymptomToReports extends AbstractMigration
{
    public function change()
    {
        $table = $this->table('reports');
        $table->addColumn('symptom', 'integer', array('null' => true))
            ->save();
    }

}
