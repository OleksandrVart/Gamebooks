<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PlayerListSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Player Lists';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="player-list-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Player List', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'book_id',
            'feature1_name',
            'feature1_value_basic',
            'feature1_mod_throw',
            //'feature2_name',
            //'feature2_value_basic',
            //'feature2_mod_throw',
            //'feature3_name',
            //'feature3_value_basic',
            //'feature3_mod_throw',
            //'feature4_name',
            //'feature4_value_basic',
            //'feature4_mod_throw',
            //'feature5_name',
            //'feature5_value_basic',
            //'feature5_mod_throw',
            //'feature6_name',
            //'feature6_value_basic',
            //'feature6_mod_throw',
            //'items',
            //'damage',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
