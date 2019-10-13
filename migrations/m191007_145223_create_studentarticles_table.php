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
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        } 

        $this->createTable('studentarticles', [
            'id' => $this->primaryKey(),
            'userid' => $this->integer()->notNull(),
            'filename' => $this->string(),
            'description' => $this->string(),
            'status' => $this->string(64)->defaultValue(0),
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
