<?php

use yii\helpers\Html;
use yii\grid\GridView;

use yii\helpers\ArrayHelper;
use backend\models\Characteristic;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\CharacteristicValueSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Characteristic Values';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="characteristic-value-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Characteristic Value', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            'id',
            //'characteristic_id',
            [
                'attribute' => 'characteristic_id',
                'value' => function($model) {
                    return $model->characteristic->name;
                },
                'filter' => ArrayHelper::map(Characteristic::getCharacteristics(), 'id', 'name')
            ],
            'value',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
