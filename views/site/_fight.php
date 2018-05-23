<?php

use yii\helpers\Html;

?>

<?php $enemy = $paragraph->enemy ?>

<div class="fightlist">
    <?php $route = $enemy->fight($save); ?>
</div>
<?php $ident = $route['0']; ?>

<?= html::button('БОЙ', ['class' => 'btn-fight']); ?>
<?= Html::beginForm('', 'post', ['class' => 'tranzitform']); ?>
<?= html::hiddenInput('number', $value = $route['1']); ?>
<?= html::hiddenInput('feature', $value = $route['2']); ?>

<?= Html::submitButton('Далее', ['class' => 'route']).'<br>'; ?>
<?= Html::endForm(); ?>

<script lang="javascript">

    $('form').submit(function() {
        var bookId = <?= $_GET['id']; ?>;
        var data = $(this).serialize();
        
        $.ajax({
            url: '/site/page?id=' + bookId,
            type: 'POST',
            data: data,
            success: function(res){
                $('.book-page').html(res);
                },
            error: function(){
                alert('Error!');
                }
        });
        return false;
    });
    
    
    $('.tranzitform').hide();
    $('.fightlist').hide();
    
    $('.btn-fight').click(function() {
        var fig = <?= $ident; ?>;
        if (fig) {
            $('.message').css('color', 'green');
        } else {
            $('.message').css('color', 'red');
        }
        $('.btn-fight').hide();
        $('.fightlist').show();
        $('.tranzitform').show();
    });
</script>

