<?php

namespace backend\repositories;

use backend\models\Product;

interface ProductRepositoryInterface {

    /**
     * Returns an array of active records that specify product characteristics
     *
     * @param Product $product
     * @return array|\yii\db\ActiveRecord[]
     */
    public function getProductCharacteristics(Product $product):array;
}