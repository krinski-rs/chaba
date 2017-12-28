<?php

use Phinx\Migration\AbstractMigration;

class Messages extends AbstractMigration
{
    public function change()
    {
        $messages = $this->table('messages');
        $messages->addColumn('report_id', 'integer')
            ->addColumn('message', 'text')
            ->addColumn('created_at', 'datetime')
            ->addColumn('user_id', 'integer')
            ->addColumn('reference_repository', 'string')
            ->addColumn('reference_id', 'string')
            ->addForeignKey('report_id', 'reports', 'id');
        $messages->create();
    }
}