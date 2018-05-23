<?php

use yii\helpers\Html;
use yii\helpers\Url;

?>

<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
    <div class="">
        <?= Html::a(Html::img(Url::to(['/']).$model->cover, ['class' => 'img-responsive  img-thumbnail']), ['onebook', 'id' => $model->id]) ?>
    </div>

    <div class="">
        <?= Html::a($model->tittle, ['onebook', 'id' => $model->id], ['class' => 'btn btn-success1 btn-block']) ?>
    </div>
</div>
        