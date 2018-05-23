<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Tranzit */

$this->title = 'Добавить переход';
$this->params['breadcrumbs'][] = ['label' => 'Параграф №'.$model->paragraph->number, 'url' => ['/paragraph/view', 'id' => $model->paragraph_id]];
$this->params['breadcrumbs'][] = ['label' => 'Переходы', 'url' => ['index?paragraph_id='.$model->paragraph_id.'&paragraphNumber='.$model->paragraph->number]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tranzit-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
