<?= $this->Form->create('',['style'=>'background-color:#fff; padding: 10px;'])?>
	<?= $this->Flash->render() ?>
	<div class="form-actions">
		<table class="table">
			<?php foreach ($godowns as $key => $godown): ?>
				<tr>
					<td><button type="submit" name="godown_id" value="<?= $key ?>" class="btn btn-primary btn-block uppercase"><?= $godown ?></button></td>
				</tr>
			<?php endforeach ?>
		</table>
	</div>
<?= $this->Form->end() ?>