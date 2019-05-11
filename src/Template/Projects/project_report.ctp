<?php
foreach ($projects as $project) 
{
	?>
	<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
		<div class="dashboard-stat blue-madison">
			<div class="visual">
				
			</div>
			<div class="details">
			
			</div>
			<?= $this->Html->link($project->name,['controller'=>'Districts','action'=>'districtReport',$project->id],['class'=>'more block_link','escape'=>false]) ?>
		</div>
	</div>
	<?php
}
?>