<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ChallengeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Challenges';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="challenge-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Challenge', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'paragraph_id',
            'test_feature',
            'condition',
            'target_value',
            //'target_mod_throw',
            //'player_mod_value',
            //'player_mod_throw',
            //'tranzit_win',
            //'feature_change_win',
            //'item_change_win',
            //'tranzit_fail',
            //'feature_change_fail',
            //'item_change_fail',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
