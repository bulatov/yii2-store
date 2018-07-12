<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\CharacteristicValue */

$this->title = 'Update Characteristic Value: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Characteristic Values', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="characteristic-value-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
