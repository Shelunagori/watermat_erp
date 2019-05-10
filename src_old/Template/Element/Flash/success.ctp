<?php
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<?php echo $this->Html->script('/assets/global/plugins/jquery.min.js'); ?>
<script>
	$(document).ready(function() {
		toastr.success("<?= $message ?>");
	});
</script>