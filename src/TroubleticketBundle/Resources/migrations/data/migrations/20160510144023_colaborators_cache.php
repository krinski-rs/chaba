<?php

use Phinx\Migration\AbstractMigration;

/**
 * Cache de colaboradores
 *
 * @category Class
 * @package  Migrations
 * @author Luiz Cunha <luiz.felipe@absoluta.net>
 */
class ColaboratorsCache extends AbstractMigration
{
    /**
     * {@inheritdoc}
     */
    public function change()
    {
        $table = $this->table(
            'colaborators_cache',
            array('id' => false, 'primary_key' => array('id'))
        );
        $table->addColumn('id', 'integer')
            ->addColumn('name', 'string');

        $table->create();
    }
}
