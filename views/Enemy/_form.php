<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Enemy */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="enemy-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'enemy_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hp')->textInput() ?>

    <?= $form->field($model, 'attack_feature')->textInput() ?>

    <?= $form->field($model, 'enemy_damage')->textInput() ?>

    <?= $form->field($model, 'count_throw')->textInput() ?>

    <?= $form->field($model, 'tranzit_win')->textInput() ?>

    <?= $form->field($model, 'tranzit_fail')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
