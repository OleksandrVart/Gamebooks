<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Paragraph */

$this->title = 'Редактировать параграф №'.$model->number;
$this->params['breadcrumbs'][] = ['label' => $model->book->tittle, 'url' => ['/book/view?id='.$model->book->id]];
$this->params['breadcrumbs'][] = ['label' => 'Параграфы', 'url' => ['index?book_id='.$model->book->id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="paragraph-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
