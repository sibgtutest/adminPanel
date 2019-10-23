<?php

use yii\db\Migration;

/**
 * Handles the creation of table `group`.
 */
class m191021_045840_create_group_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $this->createTable('group', [
            'id' => $this->primaryKey(),
            'number' => $this->string(10)->notNull()->unique(),
            'year' => $this->integer()->notNull(),
            'form' => $this->text()->notNull(),
            'direction' => $this->text()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        $this->dropTable('group');
    }
}
