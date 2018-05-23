<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TranzitSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tranzit-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'paragraph_id') ?>

    <?= $form->field($model, 'tranzit_text') ?>

    <?= $form->field($model, 'tranzit_number') ?>

    <?= $form->field($model, 'condition_feature') ?>

    <?php // echo $form->field($model, 'condition_item') ?>

    <?php // echo $form->field($model, 'feature_change') ?>

    <?php // echo $form->field($model, 'item_change') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
