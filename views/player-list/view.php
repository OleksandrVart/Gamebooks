<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\PlayerList */

$this->title = 'Базовый лист персонажа';
$this->params['breadcrumbs'][] = ['label' => $model->book->tittle, 'url' => ['/book/view', 'id' => $model->book_id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="player-list-view">

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
            //'book_id',
            'feature1_name',
            'feature1_value_basic',
            'feature1_mod_throw',
            'feature2_name',
            'feature2_value_basic',
            'feature2_mod_throw',
            'feature3_name',
            'feature3_value_basic',
            'feature3_mod_throw',
            'feature4_name',
            'feature4_value_basic',
            'feature4_mod_throw',
            'feature5_name',
            'feature5_value_basic',
            'feature5_mod_throw',
            'feature6_name',
            'feature6_value_basic',
            'feature6_mod_throw',
            'items',
            'damage',
        ],
    ]) ?>

</div>
