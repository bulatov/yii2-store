<?php

use yii\db\Migration;

/**
 * Handles the creation of table `characteristic_value`.
 */
class m180703_135442_create_characteristic_value_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('characteristic_value', [
            'id' => $this->primaryKey(),
            'characteristic_id' => $this->integer()->notNull(),
            'value' => $this->string()->notNull(),
        ], 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB');

        // creates index for column `characteristic_id`
        $this->createIndex(
            'idx-characteristic_value-characteristic_id',
            'characteristic_value',
            'characteristic_id'
        );

        // add foreign key for table `characteristic`
        $this->addForeignKey(
            'fk-characteristic_value-characteristic_id',
            'characteristic_value',
            'characteristic_id',
            'characteristic',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `characteristic`
        $this->dropForeignKey(
            'fk-characteristic_value-characteristic_id',
            'characteristic_value'
        );

        // drops index for column `characteristic_id`
        $this->dropIndex(
            'idx-characteristic_value-characteristic_id',
            'characteristic_value'
        );

        $this->dropTable('characteristic_value');
    }
}
