<?php

use yii\db\Migration;

/**
 * Handles the creation of table `product`.
 * Has foreign keys to the tables:
 *
 * - `category`
 */
class m180703_135439_create_product_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('product', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull()->unique(),
            'description' => $this->text(),
            'price' => $this->integer()->notNull(),
            'category_id' => $this->integer()->notNull(),
            'subcategory_id' => $this->integer()->notNull(),
            'status_id' => $this->integer()->notNull()
        ], 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB');

        // creates index for column `category_id`
        $this->createIndex(
            'idx-product-category_id',
            'product',
            'category_id'
        );

        // add foreign key for table `category`
        $this->addForeignKey(
            'fk-product-category_id',
            'product',
            'category_id',
            'category',
            'id',
            'CASCADE'
        );

        // creates index for column `subcategory_id`
        $this->createIndex(
            'idx-product-subcategory_id',
            'product',
            'subcategory_id'
        );

        // add foreign key for table `subcategory`
        $this->addForeignKey(
            'fk-product-subcategory_id',
            'product',
            'subcategory_id',
            'subcategory',
            'id',
            'CASCADE'
        );

        // creates index for column `status_id`
        $this->createIndex(
            'idx-product-status_id',
            'product',
            'status_id'
        );

        // add foreign key for table `status`
        $this->addForeignKey(
            'fk-product-status_id',
            'product',
            'status_id',
            'status',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `category`
        $this->dropForeignKey(
            'fk-product-category_id',
            'product'
        );

        // drops index for column `category_id`
        $this->dropIndex(
            'idx-product-category_id',
            'product'
        );

        // drops foreign key for table `subcategory`
        $this->dropForeignKey(
            'fk-product-subcategory_id',
            'product'
        );

        // drops index for column `subcategory_id`
        $this->dropIndex(
            'idx-product-subcategory_id',
            'product'
        );

        // drops foreign key for table `status`
        $this->dropForeignKey(
            'fk-product-status_id',
            'product'
        );

        // drops index for column `status`
        $this->dropIndex(
            'idx-product-status_id',
            'product'
        );

        $this->dropTable('product');
    }
}
