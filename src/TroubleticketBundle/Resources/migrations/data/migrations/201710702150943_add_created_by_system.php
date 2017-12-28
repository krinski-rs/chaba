<?php

use Phinx\Migration\AbstractMigration;

/**
 * Criação do campo para armazenar o sistema que criou o boletim
 *
 * @category Class
 * @package Migrations
 * @author Rodrigo Gattermann <rodrigo.gattermann@deliverit.com.br>
 */
class AddCreatedBySystem extends AbstractMigration
{
    /**
     * {@inheritdoc}
     */
    public function change()
    {
        $table = $this->table('reports');
        $table->addColumn('created_by_system', 'integer', array('null' => true));
        $table->save();

        $this->execute('UPDATE "troubleticket"."reports" SET created_by_system = 1 WHERE created_by_client = false');
        $this->execute('UPDATE "troubleticket"."reports" SET created_by_system = 2 WHERE created_by_client = true');
    }
}
