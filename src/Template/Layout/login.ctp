<!DOCTYPE html>
<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.1
Version: 3.3.0
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
<title>Watermate | Login</title>
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
	"/assets/global/css/components.css",
	"/assets/global/css/plugins.css",
	"/assets/admin/layout/css/layout.css",
	"/assets/admin/layout/css/themes/darkblue.css",
	"/assets/admin/pages/css/login2.css",
	"/assets/admin/layout/css/custom.css"
]) ?>

<?= $this->Html->css('/assets/global/plugins/bootstrap-toastr/toastr.min.css'); ?>

</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="login" style="background: url('<?= $this->Url->build('/bg.jpg',true); ?>') no-repeat center center fixed;background-size: 100% 100%;">
<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
<div class="menu-toggler sidebar-toggler">
</div>
<!-- END SIDEBAR TOGGLER BUTTON -->
<!-- BEGIN LOGO -->
<div class="logo">
	<a href="#">
		<?= $this->Html->image('logo2.png') ?>
	</a>
</div>
<!-- END LOGO -->
<!-- BEGIN LOGIN -->
<div class="content">
	<?= $this->fetch('content') ?>
</div>
<div class="copyright hide">
	 2019 © PHP Poets IT Solution.
</div>
<!-- END LOGIN -->
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
	"/assets/global/plugins/jquery-migrate.min.js",
	"/assets/global/plugins/bootstrap/js/bootstrap.min.js",
	"/assets/global/plugins/jquery.blockui.min.js",
	"/assets/global/plugins/uniform/jquery.uniform.min.js",
	"/assets/global/plugins/jquery.cokie.min.js",
	"/assets/global/plugins/jquery-validation/js/jquery.validate.min.js",
	"/assets/global/scripts/metronic.js",
	"/assets/admin/layout/scripts/layout.js",
	"/assets/admin/layout/scripts/demo.js",
	"/assets/admin/pages/scripts/login.js"
]) ?>
<?= $this->Html->script("/assets/global/plugins/bootstrap-toastr/toastr.min.js") ?>
<!-- END PAGE LEVEL SCRIPTS -->
<script>
jQuery(document).ready(function() {     
	Metronic.init(); // init metronic core components
	Layout.init(); // init current layout
	Login.init();
	Demo.init();
});
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>