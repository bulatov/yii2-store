<?php

use yii\db\Migration;

/**
 * Handles the creation of table `characteristic`.
 */
class m180703_135440_create_characteristic_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('characteristic', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull()->unique(),
        ], 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('characteristic');
    }
}
