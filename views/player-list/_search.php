<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PlayerListSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="player-list-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'book_id') ?>

    <?= $form->field($model, 'feature1_name') ?>

    <?= $form->field($model, 'feature1_value_basic') ?>

    <?= $form->field($model, 'feature1_mod_throw') ?>

    <?php // echo $form->field($model, 'feature2_name') ?>

    <?php // echo $form->field($model, 'feature2_value_basic') ?>

    <?php // echo $form->field($model, 'feature2_mod_throw') ?>

    <?php // echo $form->field($model, 'feature3_name') ?>

    <?php // echo $form->field($model, 'feature3_value_basic') ?>

    <?php // echo $form->field($model, 'feature3_mod_throw') ?>

    <?php // echo $form->field($model, 'feature4_name') ?>

    <?php // echo $form->field($model, 'feature4_value_basic') ?>

    <?php // echo $form->field($model, 'feature4_mod_throw') ?>

    <?php // echo $form->field($model, 'feature5_name') ?>

    <?php // echo $form->field($model, 'feature5_value_basic') ?>

    <?php // echo $form->field($model, 'feature5_mod_throw') ?>

    <?php // echo $form->field($model, 'feature6_name') ?>

    <?php // echo $form->field($model, 'feature6_value_basic') ?>

    <?php // echo $form->field($model, 'feature6_mod_throw') ?>

    <?php // echo $form->field($model, 'items') ?>

    <?php // echo $form->field($model, 'damage') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
