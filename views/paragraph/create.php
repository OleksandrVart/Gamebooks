<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Paragraph */

$this->title = 'Добавить параграф';
$this->params['breadcrumbs'][] = ['label' => 'Параграфы', 'url' => ['index?book_id='.$model->book_id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="paragraph-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
    
    

</div>
