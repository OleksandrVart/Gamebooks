<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EnemySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Enemies';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="enemy-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Enemy', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'paragraph_id',
            'enemy_name',
            'hp',
            'attack_feature',
            //'enemy_damage',
            //'count_throw',
            //'tranzit_win',
            //'tranzit_fail',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
