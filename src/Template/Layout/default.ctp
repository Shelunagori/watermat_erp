<!DOCTYPE html>
<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.1
Version: 3.6
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8"/>
<title><?= preg_replace('/([a-z])([A-Z])/s','$1 $2', $this->fetch('title')) ?></title>

<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta http-equiv="Content-type" content="text/html; charset=utf-8">
<meta content="" name="description"/>
<meta content="" name="author"/>
<?= $this->Html->css([
	"http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all",
	"/assets/global/plugins/font-awesome/css/font-awesome.min.css",
	"/assets/global/plugins/simple-line-icons/simple-line-icons.min.css",
	"/assets/global/plugins/bootstrap/css/bootstrap.min.css",
	"/assets/global/plugins/uniform/css/uniform.default.css",
	"/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css",
	"/assets/global/css/components.css",
	"/assets/global/css/plugins.css",
	"/assets/admin/layout/css/layout.css",
	"/assets/admin/layout/css/themes/darkblue.css",
	"/assets/admin/layout/css/custom.css"
]) ?>

<?= $this->Html->css('/assets/global/plugins/bootstrap-toastr/toastr.min.css'); ?>
<?= $this->fetch('css') ?>
<style type="text/css">
	.loader {
	  position: relative;
	  text-align: center;
	  margin: 15px auto 35px auto;
	  z-index: 9999;
	  display: block;
	  width: 80px;
	  height: 80px;
	  border: 10px solid rgba(0, 0, 0, .3);
	  border-radius: 50% !important;
	  border-top-color: #000;
	  animation: spin 1s ease-in-out infinite;
	  -webkit-animation: spin 1s ease-in-out infinite;
	}
	@keyframes spin {
	  to {
	    -webkit-transform: rotate(360deg);
	  }
	}

	@-webkit-keyframes spin {
	  to {
	    -webkit-transform: rotate(360deg);
	  }
	}
	.modal-dialog-centered {
		top: 20%;
 	}
 	.modal-content {
  border-radius: 0px;
  box-shadow: 0 0 20px 8px rgba(0, 0, 0, 0.7);
}

.modal-backdrop.show {
  opacity: 0.75;
}
</style>
<!-- END THEME STYLES -->
<link rel="shortcut icon" href="favicon.ico"/>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<!-- DOC: Apply "page-header-fixed-mobile" and "page-footer-fixed-mobile" class to body element to force fixed header or footer in mobile devices -->
<!-- DOC: Apply "page-sidebar-closed" class to the body and "page-sidebar-menu-closed" class to the sidebar menu element to hide the sidebar by default -->
<!-- DOC: Apply "page-sidebar-hide" class to the body to make the sidebar completely hidden on toggle -->
<!-- DOC: Apply "page-sidebar-closed-hide-logo" class to the body element to make the logo hidden on sidebar toggle -->
<!-- DOC: Apply "page-sidebar-hide" class to body element to completely hide the sidebar on sidebar toggle -->
<!-- DOC: Apply "page-sidebar-fixed" class to have fixed sidebar -->
<!-- DOC: Apply "page-footer-fixed" class to the body element to have fixed footer -->
<!-- DOC: Apply "page-sidebar-reversed" class to put the sidebar on the right side -->
<!-- DOC: Apply "page-full-width" class to the body element to have full width page without the sidebar menu -->
<body class="page-header-fixed page-quick-sidebar-over-content ">
<!-- BEGIN HEADER -->
<div class="page-header navbar navbar-fixed-top">
	<!-- BEGIN HEADER INNER -->
	<div class="page-header-inner">
		<!-- BEGIN LOGO -->
		<div class="page-logo">
			<a href="javascript:;">
				<?= $this->Html->image('logo.png',['class'=>'','width'=>'100%']) ?>
			</a>
			<div class="menu-toggler sidebar-toggler hide">
				<!-- DOC: Remove the above "hide" to enable the sidebar toggler button on header -->
			</div>
		</div>
		<!-- END LOGO -->
		<!-- BEGIN RESPONSIVE MENU TOGGLER -->
		<a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
		</a>
		<!-- END RESPONSIVE MENU TOGGLER -->
		<!-- BEGIN TOP NAVIGATION MENU -->
		<div class="top-menu">
			<ul class="nav navbar-nav pull-right">
				<?php if(!empty($this->session->read('project_name'))) { ?>
				<li class="dropdown dropdown-user">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
						<!--<?= $this->Html->image('/assets/admin/layout/img/avatar3_small.jpg',['class'=>'img-circle']) ?>-->
						<span class="username username-hide-on-mobile">
							<?= @$this->session->read('project_name') ?> 
						</span>
					</a>
				</li>
				
				<li class="dropdown dropdown-user">
					<?= $this->Html->link(__("Change Project"), ['action' => 'select-project'],['style'=>'padding-top: 10px;
				padding-bottom: 10px;','class'=>'btn btn-sm btn-success','escape'=>false]) ?>
				</li>
				<?php } ?>
				<!-- END USER LOGIN DROPDOWN -->
					</a>
				</li>
				<!-- END QUICK SIDEBAR TOGGLER -->
			</ul>
		</div>
		<!-- END TOP NAVIGATION MENU -->
	</div>
	<!-- END HEADER INNER -->
</div>
<!-- END HEADER -->
<div class="clearfix">
</div>
<!-- BEGIN CONTAINER -->
<div class="page-container">
	<!-- BEGIN SIDEBAR -->
	<div class="page-sidebar-wrapper">
		
			<!-- BEGIN SIDEBAR MENU -->

			<?= $this->element('user_menu') ?>
			
			<!-- END SIDEBAR MENU -->
	</div>
	<!-- END SIDEBAR -->
	<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">
			<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
				<div class="modal-dialog modal-lg">
					<div class="modal-content" id="myModal-content">
						
					</div>
					<!-- /.modal-content -->
				</div>
				<!-- /.modal-dialog -->
			</div>
			<!-- /.modal -->
			<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->

			<!-- BEGIN LOADING MODAL -->
			<div class="modal fade" id="loadMe" tabindex="-1" role="dialog" aria-labelledby="loadMeLabel">
			 	<div class="modal-dialog modal-sm modal-dialog-centered" role="document">
			    	<div class="modal-content">
			    		<div class="modal-body text-center">
			    			<div class="loader"></div>
					        <div clas="loader-txt">
					         	<h4><strong>Please Wait..</strong></h4>
					        </div>
			    		</div>
			    	</div>
			  	</div>
			</div>
			<!-- /.modal -->
			<!-- END LOADING MODAL-->

			<!-- BEGIN PAGE HEADER-->
			<h4 style="margin-top: 0px;"> <strong class="text-capitalize"><?= preg_replace('/([a-z])([A-Z])/s','$1 $2', $this->fetch('title')) ?></strong></h4>
			<!-- END PAGE HEADER-->
			<?= $this->Flash->render() ?>
			<!-- BEGIN PAGE CONTENT-->
			<div class="row">
				<div class="col-md-12">
					<?= $this->fetch('content') ?>
				</div>
			</div>
			<!-- END PAGE CONTENT-->
		</div>
		<!-- BEGIN CONTENT -->
	</div>
	<!-- END CONTENT -->

</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
<div class="page-footer">
	<div class="page-footer-inner">
		 2019 &copy; PHP Poets IT Solution.
	</div>
	<div class="scroll-to-top">
		<i class="icon-arrow-up"></i>
	</div>
</div>
<!-- END FOOTER -->

<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->

<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<?= $this->Html->script([
	"/assets/global/plugins/respond.min.js",
	"/assets/global/plugins/excanvas.min.js"
]) ?>
<![endif]-->
<?= $this->Html->script([
	"/assets/global/plugins/jquery.min.js",
	"/assets/global/plugins/jquery-migrate.min.js"
]) ?>
<!-- IMPORTANT! Load jquery-ui-1.10.3.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<?= $this->Html->script([
	"/assets/global/plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js",
	"/assets/global/plugins/bootstrap/js/bootstrap.min.js",
	"/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js",
	"/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js",
	"/assets/global/plugins/jquery.blockui.min.js",
	"/assets/global/plugins/jquery.cokie.min.js",
	"/assets/global/plugins/uniform/jquery.uniform.min.js",
	"/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js"
]) ?>

<?= $this->fetch('historyJS') ?>
<!-- END CORE PLUGINS -->
<?= $this->Html->script([
	"/assets/global/scripts/metronic.js",
	"/assets/admin/layout/scripts/layout.js",
	"/assets/admin/layout/scripts/quick-sidebar.js",
	"/assets/admin/layout/scripts/demo.js"
]) ?>
<?= $this->Html->script("/assets/global/plugins/bootstrap-toastr/toastr.min.js") ?>

<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>

<?= $this->fetch('script') ?>

<?= $this->fetch('scriptBottom') ?>

<script>

var csrf = <?=json_encode($this->request->getParam('_csrfToken'))?>;
$.ajaxSetup({
    headers: { 'X-CSRF-Token': csrf },
    error: function(){$('#loadMe').modal('hide');}
});

window.addEventListener("error", handleError, true);

function handleError(evt) { $('#loadMe').modal('hide'); }

jQuery(document).ready(function() {    
	Metronic.init(); // init metronic core components
	Layout.init(); // init current layout
	QuickSidebar.init(); // init quick sidebar
	Demo.init(); // init demo features
});

$(window).load(function(){
    var menuSelect=$("a[href='<?php echo $this->request->getAttribute('here');  ?>']");
    menuSelect.parent().addClass('active');
    menuSelect.parents('.sub-menu').show('active');
    menuSelect.parents('li').addClass('open');
    menuSelect.parents('li').find('.arrow').addClass('open');
});

$(document).ready(function(){

	$('.numberOnly').live('keyup',function(e)
	{
	   	var ex = /^[0-9]+\.?[0-9]*$/;
		var evt=$(this).val();
		if(!evt.match(ex) && evt)
		{
			$(this).val('1');
		}
	});
	
	$("#myModal").on("hidden.bs.modal", function () {
		var img = '<div class="text-center"><?= $this->Html->image('loading.gif') ?></div>';
		$('#myModal-content').html(img);
	});

	$(document).on('click','.modal_btn',function(e){
		e.preventDefault();
		var url = $(this).attr('href');
		$.get(url,function(result){
			$('#myModal-content').html(result);
			$('.select2me').select2();
			$('form').validate();
			$('.date-picker').datepicker({autoclose: true});
		});
		$('#myModal').modal('show');
	});
	$(document).on('click','.modal_btn_view',function(e){
		e.preventDefault();
		var url = $(this).attr('href');
		$.get(url,function(result){
			$('#myModal-content').html(result);
		});
		$('#myModal').modal('show');
	});

	// $('select')
 //          .append($('<option>', { value : 0 })
 //          .text('Add New'));
});
</script>
<!-- END JAVASCRIPTS -->

</body>
<!-- END BODY -->
</html>