<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

use kartik\widgets\DepDrop;
use backend\models\Category;
use backend\models\Status;

use yii\widgets\Pjax;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $model backend\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'category_id')->dropDownList(
            ArrayHelper::map(Category::getCategories(), 'id', 'name'),
            ['prompt' => 'Выберите категорию', 'id' => 'category-id']
    ) ?>

    <?= $form->field($model, 'subcategory_id')->widget(
            DepDrop::classname(),
            [
                'options' => ['id' => 'subcategory-id'],
                'pluginOptions' => [
                    'depends' => ['category-id'],
                    'placeholder' => 'Выберите подкатегорию',
                    'url' => Url::to(['/api/subcategories'])
                ]
            ]
    ) ?>

    <?= $form->field($model, 'status_id')->dropDownList(
            ArrayHelper::map(Status::getStatuses(), 'id', 'name'),
            ['prompt' => 'Выберите статус']
    ) ?>
    <div class="form-group">
        <?= Html::button('Создать категорию', ['class' => 'btn btn-primary', 'data-pjax' => 0, 'href'=> '/category/create-ajax']) ?>
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

    <?php
        Pjax::begin();
            Modal::begin(['id'=>'pModal']);
            Modal::end();
        Pjax::end();
    ?>

</div>
