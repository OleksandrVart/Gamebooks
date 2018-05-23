<?php

use yii\helpers\Html;

?>

<?php $route = $paragraph->showTranzit($save); ?>

<?php foreach ($route as $k => $r): ?>
    <?= Html::beginForm('', 'post', ['class' => 'form-tranzit']); ?>
    <?= html::hiddenInput('number', $value = $r->tranzit_number); ?>
    <?= html::hiddenInput('feature', $value = $r->feature_change); ?>
    <?= html::hiddenInput('item', $value = $r->item_change); ?>
    <?= Html::submitButton($r->tranzit_text, ['class' => 'route', 'name' => $k]).'<br>'; ?>
    <?= Html::endForm(); ?>
<?php endforeach; ?>

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
    
   
</script>