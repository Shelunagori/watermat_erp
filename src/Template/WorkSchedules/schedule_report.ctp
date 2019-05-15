<?php
foreach ($workSchedules as $workSchedule) 
{
	if($workSchedule->id == 1)
	{
		$controller='SiteSelections';
		$action='siteReport';
	}
	else if($workSchedule->id == 2)
	{
		$controller='WorkSchedules';
		$action='civilReport';
	}
	else if($workSchedule->id == 3)
	{
		$controller='Shelters';
		$action='shelterReport';
	}
	else if($workSchedule->id == 4)
	{
		$controller='Plants';
		$action='plantReport';
	}
	else if($workSchedule->id == 5)
	{
		$controller='TankReceives';
		$action='tankReport';
	}
	else if($workSchedule->id == 6)
	{
		$controller='GlowSignBoards';
		$action='glowReport';
	}
	else if($workSchedule->id == 7)
	{
		$controller='WorkSchedules';
		$action='installationReport';
	}
	else if($workSchedule->id == 8)
	{
		$controller='WorkSchedules';
		$action='commissioningReport';
	}
	else if($workSchedule->id == 9)
	{
		$controller='OmSchedules';
		$action='omReport';
	}
	?>
	<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 box-margin" style="color:#FFF;">
		<?= $this->Html->link('
			<div class="dashboard-stat blue-madison" style="border-radius:4px !important;">
				<div class="visual">
					<p style="font-size: 18px;">'.h($workSchedule->name).'</p>
					<br/>
					<p>Scheduled Date</p>
					<p>'.h($workSchedule->village_work_report->schedule_date).'</p>
				</div>
				<div class="visual">
					<br/>
					<br/>
					<br/>
					<p>Complation Date</p>
					<p>'.h($workSchedule->village_work_report->schedule_date).'</p>
				</div>
			</div>',['controller'=>$controller,'action'=>$action,$workSchedule->village_work_report->id,$workSchedule->id,$workSchedule->village_work_report->village_id],['class'=>'more block_link','escape'=>false]); ?>
	</div>
	<?php
}
?>
<style type="text/css">
	a .dashboard-stat .visual
	{
		width: inherit !important;
		font-size: 14px !important;
		line-height: 10px !important;
		color:#FFF;
	}
</style>