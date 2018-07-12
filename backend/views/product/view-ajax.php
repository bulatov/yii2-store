<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Product */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'description:ntext',
            'price',
            //'category_id',
            [
                'attribute' => 'category_id',
                'value' => function($model) {
                    return $model->category->name;
                }
            ],
            //'subcategory_id',
            [
                'attribute' => 'subcategory_id',
                'value' => function($model) {
                    return $model->subcategory->name;
                }
            ],
            //'status_id',
            [
                'attribute' => 'status_id',
                'value' => function($model) {
                    return $model->status->name;
                }
            ],
        ],
    ]) ?>

</div>
