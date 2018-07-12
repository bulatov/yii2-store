<?php

use yii\helpers\Html;
use yii\grid\GridView;

use yii\helpers\ArrayHelper;
use backend\models\Category;
use backend\models\Subcategory;
use backend\models\Status;

use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Product', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'description:ntext',
            'price',
            [
                'attribute' => 'category_id',
                'value' => function($model) {
                    return $model->category->name;
                },
                'filter' => ArrayHelper::map(Category::getCategories(), 'id', 'name'),
            ],
            [
                'attribute' => 'subcategory_id',
                'value' => function($model) {
                    return $model->subcategory->name;
                },
                'filter' => ArrayHelper::map(SubCategory::getSubcategories(), 'id', 'name'),
            ],
            [
                'attribute' => 'status_id',
                'value' => function($model) {
                    return $model->status->name;
                },
                'filter' => ArrayHelper::map(Status::getStatuses(), 'id', 'name'),
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'buttons' => [
                    'view' => function($url, $model) {
                        return Html::a(
                            '<span class="glyphicon glyphicon-eye-open"></span>',
                            str_replace('view', 'view-ajax', $url),
                            ['class' => 'view', 'data-pjax' => '0']
                        );
                    },
                ]
            ],
        ],
    ]); ?>

    <?php
        $this->registerJs(
        "$('.view').click(function(e){
               e.preventDefault();      
               $('#pModal').modal('show')
                          .find('.modal-content')
                          .load($(this).attr('href'));  
           });",
    \yii\web\View::POS_LOAD
        );

        Pjax::begin();
            yii\bootstrap\Modal::begin(['id'=>'pModal',]);
            yii\bootstrap\Modal::end();
        Pjax::end();
    ?>
</div>
