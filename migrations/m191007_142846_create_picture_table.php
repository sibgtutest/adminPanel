<?php

use yii\db\Migration;

/**
 * Handles the creation of table `picture`.
 */
class m191007_142846_create_picture_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $this->createTable('picture', [
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
        $this->dropTable('picture');
    }
}
