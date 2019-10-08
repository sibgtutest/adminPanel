<?php

use yii\db\Migration;

/**
 * Handles the creation of table `studentarticles`.
 */
class m191007_145223_create_studentarticles_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $this->createTable('studentarticles', [
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
        $this->dropTable('studentarticles');
    }
}
