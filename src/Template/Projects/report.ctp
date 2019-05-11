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
            	<div class="row content">
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
								<?= $this->Html->link($project->name,['controller'=>'Projects','action'=>'district'],['class'=>'more','escape'=>false]) ?>
							</div>
						</div>
            			<?php
            		}
            		?>
                    
                    
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
		
		var History = window.History;
		
		if (History.enabled) {
			var page = get_url_value('page');
			var path = page ? page : 'home';
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
		$('body').on('click', 'nav a', function(e) {
			e.preventDefault();
			
			var urlPath = $(this).attr('href');
			var title = $(this).text();	
			
			History.pushState({path: urlPath}, title, './?page=' + urlPath); // When we do this, History.Adapter will also execute its contents. 		
		});
		
		function load_page_content(page) {
			$.ajax({  
				type: 'post',
				url: page + '.html',
				data: {},						
				success: function(response) {
					$('.content').html(response);
				}
			});
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