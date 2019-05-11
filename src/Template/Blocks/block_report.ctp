<?php
foreach ($blocks as $block) 
{
	?>
	<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
		<div class="dashboard-stat blue-madison">
			<div class="visual">
				
			</div>
			<div class="details">
			
			</div>
			<?= $this->Html->link($block->name,['controller'=>'Villeges','action'=>'villegeReport',$block->project_id,$block->id],['class'=>'more block_link','escape'=>false]) ?>
		</div>
	</div>
	<?php
}
?>