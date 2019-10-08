<?php

use yii\db\Migration;

/**
 * Handles the creation of table `studentssportingachievements`.
 */
class m191007_150822_create_studentssportingachievements_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $this->createTable('studentssportingachievements', [
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
        $this->dropTable('studentssportingachievements');
    }
}
