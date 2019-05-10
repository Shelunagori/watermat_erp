<?= $this->Html->script('/assets/global/plugins/jquery-validation/js/jquery.validate.min.js',['block'=>true]) ?>
<?php
$js="

$(document).ready(function(){
	$('form').not('.filter_form').each(function() {
	    $(this).validate({ignoreTitle: true});
	});
    
    $(document).on('submit','form',function(){
        $(this).find('button[type=submit]').addClass('disabled');
        $(this).find('button[type=submit]').text('Please wait...');
    });

});";
$this->Html->scriptBlock($js,['block'=>'scriptBottom']);
?>