<?php

use yii\db\Migration;

/**
 * Handles the creation of table `contactdetails`.
 */
class m191006_124139_create_contactdetails_table extends Migration
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

        $this->createTable('contactdetails', [
            'id' => $this->primaryKey(),
            'userid' => $this->integer()->notNull()->unique(),
            'studname' => $this->string(),
            'middlename' => $this->string(),
            'familyname' => $this->string(),
            'birthdate' => $this->integer(),
            'yearset' => $this->integer(),
            'formeducation' => $this->string(),
            'lineeducation' => $this->string(),
            'status' => $this->string(),
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        $this->dropTable('{{%contactdetails}}');
    }
}
