<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Enemy */

$this->title = 'Создать противника';
$this->params['breadcrumbs'][] = ['label' => 'Параграф №'.$model->paragraph->number, 'url' => ['/paragraph/view', 'id' => $model->paragraph_id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="enemy-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
