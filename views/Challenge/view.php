<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Challenge */

$this->title = 'Параметры импытания';
$this->params['breadcrumbs'][] = ['label' => 'Параграф №'.$model->paragraph->number, 'url' => ['/paragraph/view', 'id' => $model->paragraph_id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="challenge-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы действительно хотите удалить текущие настройки?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            //'paragraph_id',
            'test_feature',
            'player_mod_value',
            'player_mod_throw',
            'condition',
            'target_value',
            'target_mod_throw',
            'tranzit_win',
            'feature_change_win',
            'item_change_win',
            'tranzit_fail',
            'feature_change_fail',
            'item_change_fail',
        ],
    ]) ?>

</div>
