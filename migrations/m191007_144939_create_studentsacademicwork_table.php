<?php

use yii\db\Migration;

/**
 * Handles the creation of table `studentsacademicwork`.
 */
class m191007_144939_create_studentsacademicwork_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $this->createTable('studentsacademicwork', [
            'id' => $this->primaryKey(),
            'userid' => $this->integer()->notNull()->unique(),
            'filename' => $this->string(),
            'description' => $this->string()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        $this->dropTable('studentsacademicwork');
    }
}
