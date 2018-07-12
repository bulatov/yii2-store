<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use yii\helpers\ArrayHelper;
use backend\models\Characteristic;

/* @var $this yii\web\View */
/* @var $model backend\models\CharacteristicValue */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="characteristic-value-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'characteristic_id')->dropDownList(
            ArrayHelper::map(Characteristic::getCharacteristics(), 'id', 'name'),
            ['prompt' => 'Выберите характеристику']
    ) ?>

    <?= $form->field($model, 'value')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
