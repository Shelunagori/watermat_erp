<?php
foreach ($workSchedules as $workSchedule) 
{
	?>
	<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 box-margin" style="color:#FFF;">
		<div class="dashboard-stat blue-madison" style="border-radius:4px !important;">
			<div class="visual">
				<p style="font-size: 18px;"><?= h($workSchedule->name) ?></p>
				<br/>
				<p>Scheduled Date</p>
				<p><?= h($workSchedule->village_work_report->schedule_date) ?></p>
			</div>
			<div class="visual">
				<br/>
				<br/>
				<br/>
				<p>Complation Date</p>
				<p><?= h($workSchedule->village_work_report->schedule_date) ?></p>
			</div>
			<!-- <?= $this->Html->link($workSchedule->name,['controller'=>'Districts','action'=>'districtReport',$workSchedule->id],['class'=>'more block_link','escape'=>false]) ?> -->
		</div>
	</div>
	<?php
}
?>
<style type="text/css">
	.dashboard-stat .visual
	{
		width: inherit !important;
		font-size: 14px !important;
		line-height: 10px !important;
	}
</style>