<style type="text/css">
	.more{
		text-align: center !important;
		font-weight: bold !important;
		font-size: large !important;
	}
	.box-margin{
		margin-bottom: 5px;
	}
</style>
<div class="row">
    <div class="col-md-12">
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-gift"></i>
                    <span class="caption-subject"><?= __('Project Report') ?></span>
                </div>
            </div>
            <div class="portlet-body">
            	<div class="row">
            		<div class="col-md-12">
            			<div class="col-md-3">
            				<div class="form-group">
                                <?= $this->Form->label('district', null, ['class'=>'control-label']) ?>
                                <?php
                                	foreach ($districts as $district) 
                                	{
                                		$districtOptions[]=['text'=>$district->name,'value'=>$district->id,'project_id'=>$district->project_id];
                                	}
                                ?>
                                <?= $this->Form->control('district_id', ['empty'=>'--Select--','label'=>false,'class'=>'form-control select2me input-sm district_id','options' => $districtOptions]); ?>
                            </div>
            			</div>
            			<div class="col-md-3">
            				<div class="form-group">
                                <?= $this->Form->label('division', null, ['class'=>'control-label']) ?>
                                <?php
                                	foreach ($divisions as $division) 
                                	{
                                		$divisionOptions[]=['text'=>$division->name,'value'=>$division->id,'project_id'=>$division->project_id];
                                	}
                                ?>
                                <?= $this->Form->control('division_id', ['empty'=>'--Select--','label'=>false,'class'=>'form-control select2me input-sm division_id','options' => $divisionOptions]); ?>
                            </div>
            			</div>
            			<div class="col-md-3">
            				<div class="form-group">
                                <?= $this->Form->label('block', null, ['class'=>'control-label']) ?>
                                <?php
                                	foreach ($blocks as $block) 
                                	{
                                		$blockOptions[]=['text'=>$block->name,'value'=>$block->id,'project_id'=>$block->project_id];
                                	}
                                ?>
                                <?= $this->Form->control('block_id', ['empty'=>'--Select--','label'=>false,'class'=>'form-control select2me input-sm block_id','options' => $blockOptions]); ?>
                            </div>
            			</div>
            			<div class="col-md-3">
            				<div class="form-group">
                                <?= $this->Form->label('village', null, ['class'=>'control-label']) ?>
                                <?php
                                	foreach ($villages as $village) 
                                	{
                                		$villageOptions[]=['text'=>$village->name,'value'=>$village->id,'project_id'=>$village->project_id];
                                	}
                                ?>
                                <?= $this->Form->control('village_id', ['empty'=>'--Select--','label'=>false,'class'=>'form-control select2me input-sm village_id','options' => $villageOptions]); ?>
                            </div>
            			</div>
            			
            		</div>
            	</div>
            	<div class="row content_data">
                    
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->element('selectpicker') ?>
<?= $this->Html->script("jquery.history.js",['block'=>'historyJS']) ?>
<?php

$js="
$(document).ready(function(){
		
		var History = window.History;
		var url = '".$this->Url->build(['controller'=>'Projects','action'=>'projectReport'])."';
		if (History.enabled) { 
			var page = get_url_value('page');
			var load_page=page;
			var path = page ? page : url;
			// Load the page

			load_page_content(path);
		} else {
			return false;
		}

		// Content update and back/forward button handler
		History.Adapter.bind(window, 'statechange', function() {
			var State = History.getState();
			// Do ajax
			load_page_content(State.data.path);
			// Log the history object to your browser's console
			History.log(State);
		});

		// Navigation link handler
		$('body').on('click', 'a.block_link', function(e) {
			e.preventDefault();
			
			var urlPath = $(this).attr('href');
			var title = $(this).text();	
			
			History.pushState({path: urlPath}, title, './report?page=' + urlPath); // When we do this, History.Adapter will also execute its contents. 		
		});
		
		$(document).on('change', '.district_id', function() {
			var value_id = $(this).val();
			var project_id = $('option:selected',this).attr('project_id');
			var title = $(this).text();
			var urlPath = '".$this->Url->build(['controller'=>'Divisions','action'=>'divisionReport'])."/'+project_id+'/'+value_id;
			load_filter(urlPath,title);
		});
		$(document).on('change', '.division_id', function() {
			var value_id = $(this).val();
			var project_id = $('option:selected',this).attr('project_id');
			var title = $(this).text();
			var urlPath = '".$this->Url->build(['controller'=>'Blocks','action'=>'blockReport'])."/'+project_id+'/'+value_id;
			load_filter(urlPath,title);
		});
		$(document).on('change', '.block_id', function() {
			var value_id = $(this).val();
			var project_id = $('option:selected',this).attr('project_id');
			var title = $(this).text();
			var urlPath = '".$this->Url->build(['controller'=>'Villages','action'=>'villageReport'])."/'+project_id+'/'+value_id;
			load_filter(urlPath,title);
		});
		$(document).on('change', '.village_id', function() {
			var value_id = $(this).val();
			var project_id = $('option:selected',this).attr('project_id');
			var title = $(this).text();
			var urlPath = '".$this->Url->build(['controller'=>'WorkSchedules','action'=>'scheduleReport'])."/'+project_id+'/'+value_id;
			load_filter(urlPath,title);
		});
		function load_filter(urlPath,title)
		{
			History.pushState({path: urlPath}, title, './report?page=' + urlPath); // When we do this, History.Adapter will also execute its contents. 
		}
		
		function load_page_content(page) {
			$.ajax({  
				type: 'post',
				url: page,
				data: {},						
				success: function(response) {
					$('.content_data').html(response);
				}
			});
		}
		if(load_page==false)
		{
			var urlPath = url;
			var title = '';	
			History.pushState({path: urlPath}, title, './report'); 
		}
		
		function get_url_value(variable) {
		   var query = window.location.search.substring(1);
		   var vars = query.split('&');
		   for (var i=0;i<vars.length;i++) {
				   var pair = vars[i].split('=');
				   if(pair[0] == variable){return pair[1];}
		   }
		   return(false);
	    }
});";
$this->Html->scriptBlock($js,['block'=>'scriptBottom']);
?>