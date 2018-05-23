<?php

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = $model->tittle;
?>
<div style="padding: 10px">
    <div class="row text-justify">
        <h1><?= $model->tittle ?></h1>
        <?= Html::img(Url::to(['/']).$model->cover, ['class' => 'col-lg-4 col-md-4 col-sm-6 col-xs-12']) ?>
        <h4>Автор: <?= $model->author ?></h4>
        <h4>Жанр: <?= $model->author ?></h4>
        <p> </p>
        <span class="text-justify abzac"><?= $model->annotation ?></span>
        <div class="text-justify abzac">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt, architecto, iusto, est nulla natus vitae porro quasi deleniti voluptatibus et nostrum quisquam aperiam laudantium. Sunt, facilis quae id assumenda autem.</div>
        <div>Perferendis, ex aliquam voluptatem omnis accusantium impedit. Quaerat, provident, aperiam, aliquam enim debitis voluptatem earum veniam nisi vero quibusdam illum distinctio tempore sed quae odio nihil nemo corporis excepturi incidunt?</div>
        <div>Obcaecati, laboriosam, ad veniam reiciendis ipsum magni aperiam repellat eveniet ullam velit adipisci voluptate tempore provident quia natus dignissimos suscipit totam minus quos consectetur. Praesentium, inventore cum aliquam consequuntur neque.</div>
        <div>Voluptatem, accusantium, rem voluptatibus a dicta aspernatur obcaecati modi voluptate dolorum sapiente perferendis voluptates quaerat soluta nihil quos accusamus iure? Soluta, blanditiis facilis inventore voluptatibus magni dicta nulla tenetur laboriosam.</div>
        <div>Consequatur, asperiores qui dolorem eum expedita. Perspiciatis, vitae, esse, minima vel officiis cum quos sequi dignissimos aliquam est cumque officia enim beatae tenetur incidunt hic sint consequuntur impedit. Voluptas, architecto.</div>
        <div>Natus, mollitia reprehenderit repellat qui debitis cum perferendis ipsam quas soluta. Aliquam, alias, inventore, ex voluptatem eos nesciunt aut quos rem dolore ratione delectus qui debitis officia atque vero hic.</div>
        <div>Iusto, consectetur, enim quis quibusdam tempora sapiente cum accusamus veritatis esse minus facere maiores quo fugiat vel optio accusantium soluta beatae ex minima ad aperiam sunt assumenda illo. Reiciendis, quaerat.</div>
        <div>Esse, ratione, accusantium officiis impedit ex consequuntur ducimus optio cupiditate ad eos a ea unde sapiente! Accusantium, aperiam, esse impedit libero sunt fugit reprehenderit possimus molestias officia animi quisquam temporibus.</div>
    </div>
    <div class="otstup">
        <?= Html::a('Играть', ['page', 'id' => $model->id], ['class' => 'btn btn-success btn-block']) ?>
    </div>
</div>


