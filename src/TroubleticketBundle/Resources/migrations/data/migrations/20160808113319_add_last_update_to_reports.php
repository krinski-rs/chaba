<?php

use Phinx\Migration\AbstractMigration;

class AddLastUpdateToReports extends AbstractMigration
{   
    public function up()
    {
        $table = $this->table('reports');
        $table->addColumn('last_update', 'datetime', array('null' => 'true'));
        $table->save();

        $this->execute('CREATE OR REPLACE FUNCTION last_update_reports() RETURNS trigger AS $$
DECLARE
    stInsert VARCHAR;
BEGIN
    UPDATE troubleticket.reports SET last_update = NEW.date WHERE reports.id = NEW.report_id;

    RETURN NEW;
END;
$$ LANGUAGE plpgsql');

        $this->execute('CREATE OR REPLACE FUNCTION last_update_update() RETURNS BOOLEAN AS $$
DECLARE
    stSelect VARCHAR;
    reResult RECORD;
BEGIN
    stSelect := \'
        SELECT MAX(date) AS data
             , report_id
          FROM troubleticket.history
      GROUP BY report_id
    \';

    FOR reResult IN EXECUTE stSelect
    LOOP
        RAISE NOTICE \'Executando boletim: %\', reResult.report_id::varchar;
        UPDATE troubleticket.reports SET last_update = reResult.data WHERE reports.id = reResult.report_id;
    END LOOP;

    RETURN TRUE;
END;
$$ LANGUAGE plpgsql');

        $this->execute('CREATE TRIGGER last_update_reports_trigger AFTER INSERT OR UPDATE ON troubleticket.history FOR EACH ROW EXECUTE PROCEDURE last_update_reports();');

        $this->execute('SELECT last_update_update()');
    }

    /**
     * Migrate Down.
     */
    public function down()
    {
        $this->execute('DROP TRIGGER last_update_reports_trigger ON troubleticket.history');
        $this->execute('DROP FUNCTION last_update_update()');

        $table = $this->table('reports');
        $table->removeColumn('last_update');
        $table->save();
    }
}