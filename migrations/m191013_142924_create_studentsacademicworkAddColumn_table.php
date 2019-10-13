<?php

use yii\db\Migration;

/**
 * Handles the creation of table `studentsacademicworkAddColumn`.
 */
class m191013_142924_create_studentsacademicworkAddColumn_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $this->addColumn('studentsacademicwork', 'status', 'VARCHAR(64) DEFAULT 0');
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        $this->dropColumn('studentsacademicwork', 'status');
    }
}
