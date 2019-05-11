<style type="text/css">
	.more{
		text-align: center !important;
		font-weight: bold !important;
		font-size: large !important;
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
            	<div class="row content_data">
                    
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->Html->script("jquery.history.js",['block'=>'historyJS']) ?>
<?php

$js="
$(document).ready(function(){
	$(function(){
		var i=0;
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
			History.pushState({path: urlPath}, title, './report?page=' + urlPath); 
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
	});
});";
$this->Html->scriptBlock($js,['block'=>'scriptBottom']);
?>