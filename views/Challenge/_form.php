<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Challenge */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="challenge-form">

    <?php $form = ActiveForm::begin(); ?>

    <h2>Основные настройки</h2>
    <?= $form->field($model, 'test_feature')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'player_mod_value')->textInput() ?>

    <?= $form->field($model, 'player_mod_throw')->textInput() ?>

    <?= $form->field($model, 'condition')->dropDownList(['<' => 'Меньше','>' => 'Больше']) ?>

    <?= $form->field($model, 'target_value')->textInput() ?>

    <?= $form->field($model, 'target_mod_throw')->textInput() ?>

    <h2>Успех</h2>
    <?= $form->field($model, 'tranzit_win')->textInput() ?>

    <?= $form->field($model, 'feature_change_win')->textInput(['maxlength' => true]) ?>
    <p class="explanations">Форма ввода: "X,Y,Z", где X - номер характеристики (d - если это наносимый урон), Y - характер изменения (+,-), Z - значение</p>

    <?= $form->field($model, 'item_change_win')->textInput(['maxlength' => true]) ?>
    <p class="explanations">Форма ввода: "+item" или "-item" для добавления или убыли предмета или эффекта</p>

    <h2>Провал</h2>
    <?= $form->field($model, 'tranzit_fail')->textInput() ?>

    <?= $form->field($model, 'feature_change_fail')->textInput(['maxlength' => true]) ?>
    <p class="explanations">Форма ввода: "X,Y,Z", где X - номер характеристики (d - если это наносимый урон), Y - характер изменения (+,-), Z - значение</p>

    <?= $form->field($model, 'item_change_fail')->textInput(['maxlength' => true]) ?>
    <p class="explanations">Форма ввода: "+item" или "-item" для добавления или убыли предмета или эффекта</p>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
