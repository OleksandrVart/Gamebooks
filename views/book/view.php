<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Book */

$this->title = $model->tittle;
$this->params['breadcrumbs'][] = ['label' => 'Книги', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="book-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены что хотите удалить эту книгу?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <p>
        <?= Html::a('Параграфы', ['/paragraph', 'book_id' => $model->id], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Лист игрока', ['/player-list', 'book_id' => $model->id], ['class' => 'btn btn-success']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [

            'tittle',
            'cover',
            'author',
            'annotation:ntext',
            'min_dice',
            'max_dice',
            'game_model',
            'hiden',

        ],
    ]) ?>

</div>
