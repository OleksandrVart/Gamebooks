<?php

use yii\helpers\Html;
use yii\helpers\Url;

?>

<div class="row container">
    <div class="gamelist col-12 col-sm-3">
        <h4>Характеристики:</h4>
        <p>
            <?php foreach ($playerList->featureList($save) as $row): ?>
            <?= $row; ?>
            <?php endforeach; ?>
        </p>
        <p>Наносимый урон - <?= $save->damage; ?></p>
        <h4>Предметы и эффекты:</h4>
        <p>
            <?php foreach ($save->getItem() as $item): ?>
            <?= $item .'<br>'; ?>
            <?php endforeach ?>
        </p>
        <div>
        <?= Html::a('Новая игра', ['newgame', 'id' => $paragraph->book_id], ['class' => 'btn btn-success']) ?>
        </div>
    </div>
    
    <div class="col-12 col-sm-9 par-text">
        <p> <?= $paragraph->text; ?></p>
    </div>
    
    <div class="col-12 col-sm-9 activzone">
        <?php if ($paragraph->type == 'walk'): ?>
            <?= $this->render('_walk', compact('save', 'paragraph')) ?>
        <?php elseif ($paragraph->type == 'challenge'): ?>
            <?= $this->render('_challenge', compact('save', 'paragraph')) ?>
        <?php elseif ($paragraph->type == 'fight'): ?>
            <?= $this->render('_fight', compact('save', 'paragraph')) ?>
        <?php endif; ?>
    </div>

</div>

