<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Product */
/* @var $characteristics array */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php
        $attributes = [
            'id',
            'name',
            'description:ntext',
            'price',
            [
                'attribute' => 'category_id',
                'value' => $model->category->name
            ],
            [
                'attribute' => 'subcategory_id',
                'value' => $model->subcategory->name
            ],
            [
                'attribute' => 'status_id',
                'value' => $model->status->name
            ]
        ];

        foreach($model->getProductCharacteristics() as $productCharacteristic) {
            $attributes[] = [
                'label' => $productCharacteristic->characteristic->name,
                'value' => $productCharacteristic->characteristicValue->value
            ];
        }

        echo DetailView::widget([
            'model' => $model,
            'attributes' => $attributes
        ]);
    ?>

</div>
