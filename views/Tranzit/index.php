<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TranzitSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Переходы';
$this->params['breadcrumbs'][] = ['label' => 'Параграф №'.Yii::$app->request->get('paragraphNumber'), 'url' => ['/paragraph/view', 'id' => Yii::$app->request->get('paragraph_id')]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tranzit-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить переход', ['create', 'paragraph_id' => $paragraphId], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'paragraph_id',
            'tranzit_text',
            'tranzit_number',
            //'condition_feature',
            //'condition_item',
            //'feature_change',
            //'item_change',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
