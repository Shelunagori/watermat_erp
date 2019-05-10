<?php echo $this->Html->css('/assets/global/plugins/bootstrap-datepicker/css/datepicker3.css',['block' => true]);?>
<?php echo $this->Html->css('/assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css',['block' => true]);?>
<?php echo $this->Html->css('/assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css',['block' => true]);?>



<?php echo $this->Html->script('/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js', ['block' => true]); ?>
<?php echo $this->Html->script('/assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js', ['block' => true]); ?>


<?php echo $this->Html->script('/assets/admin/pages/scripts/components-pickers.js', ['block' => true]); ?>
<?php 
$js="
$(document).ready(function(){
	ComponentsPickers.init();
	$('.datepicker').datepicker({format: 'dd-M-yyyy', autoclose: true });
});";
$this->Html->scriptBlock($js,['block'=>'scriptBottom']);
?>