<?php

use yii\db\Migration;

/**
 * Handles the creation of table `studentssocialachievements`.
 */
class m191007_145724_create_studentssocialachievements_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $this->createTable('studentssocialachievements', [
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
        $this->dropTable('studentssocialachievements');
    }
}
