<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Paragraph */

$this->title = 'Параграф №'.$model->number;
$this->params['breadcrumbs'][] = ['label' => $model->book->tittle, 'url' => ['/book/view?id='.$model->book->id]];
$this->params['breadcrumbs'][] = ['label' => 'Параграфы', 'url' => ['index?book_id='.$model->book->id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="paragraph-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы действительно хотите удалить этот параграф?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'number',
            'type',
            'text:ntext',
        ],
    ]) ?>
    <p>
        <?php if ($model->type == 'fight'): ?>
            <?= Html::a('Характеристики противника', ['/enemy', 'paragraph_id' => $model->id], ['class' => 'btn btn-info btn-lg']) ?>
        <?php elseif ($model->type == 'challenge'): ?>
            <?= Html::a('Параметры испытаня', ['/challenge', 'paragraph_id' => $model->id], ['class' => 'btn btn-info btn-lg']) ?>
        <?php else: ?>
            <?= Html::a('Настройка переходов', ['/tranzit', 'paragraph_id' => $model->id, 'paragraphNumber' => $model->number], ['class' => 'btn btn-info btn-lg']) ?>
        <?php endif; ?>
    </p>
</div>
