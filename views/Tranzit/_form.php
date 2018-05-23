<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Tranzit */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tranzit-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tranzit_text')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tranzit_number')->textInput() ?>
    
    <h2>Условия появления перехода:</h2>
    <?= $form->field($model, 'condition_feature')->textInput(['maxlength' => true]) ?>
    <p class="explanations">Форма ввода: "X,Y,Z", где X - номер характеристики (d - если это наносимый урон), Y - знак условия (<,>,=), Z - требуемое значение</p>

    <?= $form->field($model, 'condition_item')->textInput(['maxlength' => true]) ?>
    <p class="explanations">Форма ввода: "+item" или "-item" для наличия или отсутствия предмета или эффекта</p>

    <h2>Влияние перехода</h2>
    <?= $form->field($model, 'feature_change')->textInput(['maxlength' => true]) ?>
    <p class="explanations">Форма ввода: "X,Y,Z", где X - номер характеристики (d - если это наносимый урон), Y - характер изменения (+,-), Z - значение</p>

    <?= $form->field($model, 'item_change')->textInput(['maxlength' => true]) ?>
    <p class="explanations">Форма ввода: "+item" или "-item" для добавления или убыли предмета или эффекта</p>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
