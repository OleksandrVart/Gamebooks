<?php

use yii\helpers\Html;
use yii\widgets\ListView;

/* @var $this yii\web\View */

$this->title = Yii::$app->name;
?>

<?= ListView::widget([
        'dataProvider' => $dataProvider,
        'itemOptions' => ['class' => 'item'],
        'itemView' => '_view'
    ]) 
?>
