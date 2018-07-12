<?php

use yii\helpers\Html;
use yii\grid\GridView;

use yii\helpers\ArrayHelper;
use backend\models\Product;
use backend\models\Characteristic;
use backend\models\CharacteristicValue;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ProductCharacteristicSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Product Characteristics';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-characteristic-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Product Characteristic', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute' => 'product_id',
                'value' => function($model) {
                    return $model->product->name;
                },
                'filter' => ArrayHelper::map(Product::getProducts(), 'id', 'name'),
            ],
            [
                'attribute' => 'characteristic_id',
                'value' => function($model) {
                    return $model->characteristic->name;
                },
                'filter' => ArrayHelper::map(Characteristic::getCharacteristics(), 'id', 'name'),
            ],
            [
                'attribute' => 'characteristic_value_id',
                'value' => function($model) {
                    return $model->characteristicValue->value;
                },
                'filter' => ArrayHelper::map(CharacteristicValue::getCharacteristicValues(), 'id', 'value'),
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
