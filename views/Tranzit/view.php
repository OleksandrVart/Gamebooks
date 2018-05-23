<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Tranzit */

$this->title = 'Переход';
$this->params['breadcrumbs'][] = ['label' => 'Параграф №'.$model->paragraph->number, 'url' => ['/paragraph/view', 'id' => $model->paragraph_id]];
$this->params['breadcrumbs'][] = ['label' => 'Переходы', 'url' => ['index?paragraph_id='.$model->paragraph_id.'&paragraphNumber='.$model->paragraph->number]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tranzit-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы действительно хотите удалить этот переход?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            //'paragraph_id',
            'tranzit_text',
            'tranzit_number',
            'condition_feature',
            'condition_item',
            'feature_change',
            'item_change',
        ],
    ]) ?>

</div>
