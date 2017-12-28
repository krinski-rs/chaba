<?php

use Phinx\Migration\AbstractMigration;

class AddCodeColumnToReports extends AbstractMigration
{
    /**
     * Migrate Up.
     */
    public function up()
    {
        $table = $this->table('reports');
        $table->addColumn('code', 'string', array('null' => true))->update();

        $rowsBA = $this->fetchAll('SELECT * FROM reports WHERE type = 1 ORDER BY id ASC');

        foreach($rowsBA as $key => $ba){
            $this->execute('UPDATE reports SET code = \'BA'.($key+1).'\' WHERE id = '.$ba['id']);
        }

        $rowsBI = $this->fetchAll('SELECT * FROM reports WHERE type = 2 ORDER BY id ASC');

        foreach($rowsBI as $key => $bi){
            $this->execute('UPDATE reports SET code = \'BI'.($key+1).'\' WHERE id = '.$bi['id']);
        }

        $rowsBS = $this->fetchAll('SELECT * FROM reports WHERE type = 3 ORDER BY id ASC');

        foreach($rowsBS as $key => $bs){
            $this->execute('UPDATE reports SET code = \'BS'.($key+1).'\' WHERE id = '.$bs['id']);
        }

        $table = $this->table('reports');
        $table->changeColumn('code', 'string', array('null' => false));
        $table->addIndex(array('code'), array('unique' => true));
        $table->update();

        $this->execute("
                        CREATE SEQUENCE \"reports_ba_sequence\"
                        START WITH ".(count($rowsBA)+1)."
                        INCREMENT BY 1
                        NO MINVALUE
                        NO MAXVALUE
                        CACHE 1;
                    ");

        $this->execute("
                        CREATE SEQUENCE \"reports_bs_sequence\"
                        START WITH ".(count($rowsBS)+1)."
                        INCREMENT BY 1
                        NO MINVALUE
                        NO MAXVALUE
                        CACHE 1;
                    ");

        $this->execute("
                        CREATE SEQUENCE \"reports_bi_sequence\"
                        START WITH ".(count($rowsBI)+1)."
                        INCREMENT BY 1
                        NO MINVALUE
                        NO MAXVALUE
                        CACHE 1;
                    ");

    }

    /**
     * Migrate Down.
     */
    public function down()
    {
        $table = $this->table('reports');
        $table->removeColumn('code');
        $table->save();

        $this->execute("DROP SEQUENCE IF EXISTS reports_ba_sequence;");

        $this->execute("DROP SEQUENCE IF EXISTS reports_bi_sequence;");

        $this->execute("DROP SEQUENCE IF EXISTS reports_bs_sequence;");
    }
}
