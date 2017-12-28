<?php

use Phinx\Migration\AbstractMigration;

class AddCodeColumnToSubcases extends AbstractMigration
{
    /**
     * Migrate Up.
     */
    public function up()
    {
        $table = $this->table('subcases');
        $table->addColumn('code', 'string', array('null' => true))->update();

        $row = $this->fetchAll('SELECT report_id, id FROM subcases ORDER BY report_id, id ASC');
        if(!empty($row)){
            $arrayReports = array();
            foreach($row as $key => $value){
                $reportKey = $value['report_id'];
                if(array_key_exists($reportKey, $arrayReports)){
                    array_push($arrayReports[$reportKey], $value['id']);
                }else{
                    $arrayReports[$reportKey] = array($value['id']);
                }
            }

            if(!empty($arrayReports)){
                foreach($arrayReports as $key => $arraySubcases){
                    $reportCode = $this->fetchRow('SELECT code FROM reports where id = '.$key);
                    foreach($arraySubcases as $chave => $valor){
                        $subcaseCode = $reportCode['code'].'.'.($chave+1);
                        $this->execute('UPDATE subcases SET code = \''.$subcaseCode.'\' WHERE id = \''.$valor.'\'');
                    }
                }
            }
        }

        $table = $this->table('subcases');
        $table->changeColumn('code', 'string', array('null' => false));
        $table->addIndex(array('code'), array('unique' => true));
        $table->update();

    }

    /**
     * Migrate Down.
     */
    public function down()
    {
        $table = $this->table('subcases');
        $table->removeColumn('code');
        $table->save();
    }
}
