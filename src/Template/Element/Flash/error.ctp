<?php
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<!-- <div class="alert alert-danger" onclick="this.classList.add('hidden');"><?= $message ?></div>

<div class="alert alert-warning alert-dismissable">
      <button type="button" class="close" aria-hidden="true">&times;</button>
      <p><?= $message ?></p>
</div>


  -->

<?php echo $this->Html->script('/assets/global/plugins/jquery.min.js'); ?>
<script>
	$(document).ready(function() {
		toastr.error("<?= $message ?>");
	});
</script>