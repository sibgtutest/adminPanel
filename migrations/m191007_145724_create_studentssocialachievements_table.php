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
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        } 

        $this->createTable('studentssocialachievements', [
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
        $this->dropTable('studentssocialachievements');
    }
}
