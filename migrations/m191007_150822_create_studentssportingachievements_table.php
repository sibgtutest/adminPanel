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
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        } 

        $this->createTable('studentssportingachievements', [
            'id' => $this->primaryKey(),
            'userid' => $this->integer()->notNull(),
            'filename' => $this->string()->notNull(),
            'description' => $this->string()->notNull(),
            'status' => $this->string()->notNull()->defaultValue(0),
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
