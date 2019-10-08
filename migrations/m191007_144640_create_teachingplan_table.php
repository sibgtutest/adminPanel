<?php

use yii\db\Migration;

/**
 * Handles the creation of table `teachingplan`.
 */
class m191007_144640_create_teachingplan_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $this->createTable('teachingplan', [
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
        $this->dropTable('teachingplan');
    }
}
