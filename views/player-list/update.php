<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PlayerList */

$this->title = 'Изменить базовый лист персонажа';
$this->params['breadcrumbs'][] = ['label' => $model->book->tittle, 'url' => ['/book/view', 'id' => $model->book_id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="player-list-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
