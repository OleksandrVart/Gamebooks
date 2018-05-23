<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ChallengeSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="challenge-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'paragraph_id') ?>

    <?= $form->field($model, 'test_feature') ?>

    <?= $form->field($model, 'condition') ?>

    <?= $form->field($model, 'target_value') ?>

    <?php // echo $form->field($model, 'target_mod_throw') ?>

    <?php // echo $form->field($model, 'player_mod_value') ?>

    <?php // echo $form->field($model, 'player_mod_throw') ?>

    <?php // echo $form->field($model, 'tranzit_win') ?>

    <?php // echo $form->field($model, 'feature_change_win') ?>

    <?php // echo $form->field($model, 'item_change_win') ?>

    <?php // echo $form->field($model, 'tranzit_fail') ?>

    <?php // echo $form->field($model, 'feature_change_fail') ?>

    <?php // echo $form->field($model, 'item_change_fail') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
