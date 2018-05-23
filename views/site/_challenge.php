<?php

use yii\helpers\Html;

?>

<?php $challenge = $paragraph->challenge; ?>
<?php $route = $challenge->runChallenge($save); ?>
<?php $ident = $route['0']; ?>
<?= html::button('Проверить', ['class' => 'btn-challenge']); ?>
    <div class="message"></div>
<?= Html::beginForm('', 'post', ['class' => 'tranzitform']); ?>
<?= html::hiddenInput('number', $value = $route['1']); ?>
<?= html::hiddenInput('feature', $value = $route['2']); ?>
<?= html::hiddenInput('item', $value = $route['3']); ?>
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
    
    $('.btn-challenge').click(function() {
        var chall = <?= $ident; ?>;
        if (chall) {
            $('.message').css('color', 'green').html('успех');
        } else {
            $('.message').css('color', 'red').html('провал');
        }
        $('.btn-challenge').hide();
        $('.tranzitform').show();
    });
</script>