<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Category */
$this->registerJsFile('@web/js/product-create.js');
?>
<div class="category-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="category-form">

        <?php $form = ActiveForm::begin(['options' => ['class' => 'category-create-form-ajax']]); ?>

        <?= $form->field($model, 'name')->textInput(['maxlength' => true])->label('Название категории') ?>

        <div class="form-group">
            <?= Html::button('Создать', ['class' => 'btn btn-success category-create-button']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>

</div>
