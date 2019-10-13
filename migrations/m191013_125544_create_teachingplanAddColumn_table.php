<?php

use yii\db\Migration;

/**
 * Handles the creation of table teachingplanAddColumn.
 */
class m191013_125544_create_teachingplanAddColumn_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $this->addColumn('teachingplan', 'status', 'VARCHAR(64) DEFAULT 0');
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        $this->dropColumn('teachingplan', 'status');
    }
}
