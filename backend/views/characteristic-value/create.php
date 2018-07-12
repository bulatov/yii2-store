<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\CharacteristicValue */

$this->title = 'Create Characteristic Value';
$this->params['breadcrumbs'][] = ['label' => 'Characteristic Values', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="characteristic-value-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
