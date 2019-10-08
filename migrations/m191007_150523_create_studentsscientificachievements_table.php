<?php

use yii\db\Migration;

/**
 * Handles the creation of table `studentsscientificachievements`.
 */
class m191007_150523_create_studentsscientificachievements_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $this->createTable('studentsscientificachievements', [
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
        $this->dropTable('studentsscientificachievements');
    }
}
