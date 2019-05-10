<?= $this->Html->css('/assets/css/timepicker/bootstrap-timepicker.min.css',['block'=>'true']) ?>
<?= $this->Html->script('/assets/js/plugins/timepicker/bootstrap-timepicker.min.js',['block'=>'true']) ?>
<?php
$js="
$(document).ready(function(){

	$('.timepicker').timepicker({
      showInputs: false
    });

});";
$this->Html->scriptBlock($js,['block'=>'scriptBottom']);
?>