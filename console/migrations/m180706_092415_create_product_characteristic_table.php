<?php

use yii\db\Migration;

/**
 * Handles the creation of table `product_characteristic`.
 * Has foreign keys to the tables:
 *
 * - `characteristic`
 * - `characteristic_value`
 */
class m180706_092415_create_product_characteristic_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('product_characteristic', [
            'id' => $this->primaryKey(),
            'product_id' => $this->integer()->notNull(),
            'characteristic_id' => $this->integer()->notNull(),
            'characteristic_value_id' => $this->integer()->notNull(),
        ], 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB');

        // creates index for column `product_id`
        $this->createIndex(
            'idx-product_characteristic-product_id',
            'product_characteristic',
            'product_id'
        );

        // add foreign key for table `product`
        $this->addForeignKey(
            'fk-product_characteristic-product_id',
            'product_characteristic',
            'product_id',
            'product',
            'id',
            'CASCADE'
        );

        // creates index for column `characteristic_id`
        $this->createIndex(
            'idx-product_characteristic-characteristic_id',
            'product_characteristic',
            'characteristic_id'
        );

        // add foreign key for table `characteristic`
        $this->addForeignKey(
            'fk-product_characteristic-characteristic_id',
            'product_characteristic',
            'characteristic_id',
            'characteristic',
            'id',
            'CASCADE'
        );

        // creates index for column `characteristic_value_id`
        $this->createIndex(
            'idx-product_characteristic-characteristic_value_id',
            'product_characteristic',
            'characteristic_value_id'
        );

        // add foreign key for table `characteristic_value`
        $this->addForeignKey(
            'fk-product_characteristic-characteristic_value_id',
            'product_characteristic',
            'characteristic_value_id',
            'characteristic_value',
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
            'fk-product_characteristic-characteristic_id',
            'product_characteristic'
        );

        // drops index for column `characteristic_id`
        $this->dropIndex(
            'idx-product_characteristic-characteristic_id',
            'product_characteristic'
        );

        // drops foreign key for table `characteristic_value`
        $this->dropForeignKey(
            'fk-product_characteristic-characteristic_value_id',
            'product_characteristic'
        );

        // drops index for column `characteristic_value_id`
        $this->dropIndex(
            'idx-product_characteristic-characteristic_value_id',
            'product_characteristic'
        );

        // drops foreign key for table `product`
        $this->dropForeignKey(
            'fk-product_characteristic-product_id',
            'product_characteristic'
        );

        // drops index for column `product_id`
        $this->dropIndex(
            'idx-product_characteristic-product_id',
            'product_characteristic'
        );

        $this->dropTable('product_characteristic');
    }
}
