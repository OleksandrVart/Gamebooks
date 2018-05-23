<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PlayerList */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="player-list-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'feature1_name')->textInput(['maxlength' => true]) ?>
    <p class="explanations">В модели 'WithDeath' отвечает за жизнь персонажа</p>

    <?= $form->field($model, 'feature1_value_basic')->textInput() ?>

    <?= $form->field($model, 'feature1_mod_throw')->textInput() ?>

    <?= $form->field($model, 'feature2_name')->textInput(['maxlength' => true]) ?>
    <p class="explanations">В модели 'WithDeath' отвечает за атаку персонажа</p>

    <?= $form->field($model, 'feature2_value_basic')->textInput() ?>

    <?= $form->field($model, 'feature2_mod_throw')->textInput() ?>

    <?= $form->field($model, 'feature3_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'feature3_value_basic')->textInput() ?>

    <?= $form->field($model, 'feature3_mod_throw')->textInput() ?>

    <?= $form->field($model, 'feature4_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'feature4_value_basic')->textInput() ?>

    <?= $form->field($model, 'feature4_mod_throw')->textInput() ?>

    <?= $form->field($model, 'feature5_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'feature5_value_basic')->textInput() ?>

    <?= $form->field($model, 'feature5_mod_throw')->textInput() ?>

    <?= $form->field($model, 'feature6_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'feature6_value_basic')->textInput() ?>

    <?= $form->field($model, 'feature6_mod_throw')->textInput() ?>

    <?= $form->field($model, 'items')->textInput(['maxlength' => true]) ?>
    <p class="explanations">Форма ввода: "item1;item2;item3..."</p>

    <?= $form->field($model, 'damage')->textInput() ?>
    <p class="explanations">Наносимый урон за одну атаку</p>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
