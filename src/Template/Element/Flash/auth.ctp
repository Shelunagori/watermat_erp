<?php
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<div class="alert alert-danger">
	<button class="close" data-close="alert"></button>
	<span>
	<?= $message ?> </span>
</div>