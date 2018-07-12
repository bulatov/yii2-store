<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use yii\helpers\ArrayHelper;
use backend\models\Product;
use backend\models\Characteristic;
use backend\models\CharacteristicValue;

/* @var $this yii\web\View */
/* @var $model backend\models\ProductCharacteristic */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-characteristic-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'product_id')->dropDownList(
            ArrayHelper::map(Product::getProducts(), 'id', 'name'),
            ['prompt' => 'Выберите товар']
    ) ?>

    <?= $form->field($model, 'characteristic_id')->dropDownList(
            ArrayHelper::map(Characteristic::getCharacteristics(), 'id', 'name'),
            ['prompt' => 'Выберите характеристику']
    ) ?>

    <?= $form->field($model, 'characteristic_value_id')->dropDownList(
            ArrayHelper::map(CharacteristicValue::getCharacteristicValues(), 'id', 'value'),
            ['prompt' => 'Выберите значение характеристики']
    ) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
