<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ParagraphSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Параграфы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="paragraph-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить параграф', ['create', 'book_id' => $bookId], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Назад к книге', ['/book/view', 'id' => $bookId], ['class' => 'btn btn-info']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],


            //'book_id',
            'number',
            'type',
            'text',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
