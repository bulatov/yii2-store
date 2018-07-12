<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\ProductCharacteristic */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Product Characteristics', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-characteristic-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'attribute' => 'product_id',
                'value' => function($model) {
                    return $model->product->name;
                }
            ],
            [
                'attribute' => 'characteristic_id',
                'value' => function($model) {
                    return $model->characteristic->name;
                }
            ],
            [
                'attribute' => 'characteristic_value_id',
                'value' => function($model) {
                    return $model->characteristicValue->value;
                }
            ],
        ],
    ]) ?>

</div>
