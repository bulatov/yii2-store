<?php

namespace backend\repositories;

use backend\models\Product;


class ProductRepository implements ProductRepositoryInterface {
    /**
     * @inheritdoc
     */
    public function getProductCharacteristics(Product $product):array {
        return $product->getProductCharacteristics();
    }
}