<?php

namespace backend\services;

use yii\helpers\ArrayHelper;
use backend\repositories\ProductRepository;
use backend\models\Product;

class ProductReadService {
    private $productRepository;

    /**
     * ProductReadService constructor.
     * @param ProductRepository $productRepository
     */
    public function __construct(ProductRepository $productRepository) {
        $this->productRepository = $productRepository;
    }

    /**
     * Returns an array of characteristic`s name and values
     *
     * @param Product $product
     * @return array
     */
    public function getProductCharacteristics(Product $product):array {
        return ArrayHelper::map(
            $this->productRepository->getProductCharacteristics($product),
            'characteristic.name',
            'characteristicValue.value'
        );
    }
}