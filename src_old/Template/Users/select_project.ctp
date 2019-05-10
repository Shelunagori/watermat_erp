<?= $this->Form->create('',['style'=>'background-color:#fff; padding: 10px;'])?>
	<?= $this->Flash->render() ?>
	<div class="form-actions">
		<table class="table">
			<?php foreach ($projects as $key => $project): ?>
				<tr>
					<td><button type="submit" name="project_id" value="<?= $key ?>" class="btn btn-primary btn-block uppercase"><?= $project ?></button></td>
				</tr>
			<?php endforeach ?>
		</table>
	</div>
<?= $this->Form->end() ?>