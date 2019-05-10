<?php
/**
 * @var \App\View\AppView $this
 */
?>
<!-- BEGIN LOGIN FORM -->
<?= $this->Form->create() ?>
	<?= $this->Flash->render() ?>
	<div class="form-group">
		<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
		<label class="control-label visible-ie8 visible-ie9">Username</label>
		<div class="input-group">
			<span class="input-group-addon input-circle-left">
			<i class="fa fa-user"></i>
			</span>
			<input class="form-control form-control-solid input-circle-right" type="text" autocomplete="nope" placeholder="Username" name="username" />
		</div>
		
	</div>
	<div class="form-group">
		<label class="control-label visible-ie8 visible-ie9">Password</label>
		<div class="input-group">
			<span class="input-group-addon input-circle-left">
			<i class="fa fa-lock"></i>
			</span>
			<input class="form-control form-control-solid input-circle-right" type="password" autocomplete="nope" placeholder="Password" name="password"/>
		</div>
	</div>
	<div class="form-actions">
		<div class="pull-left">
			<label class="rememberme check">
			<input type="checkbox" name="remember" value="1"/>Remember me </label>
		</div>
		<div class="pull-right forget-password-block">
			<a href="#" class="forget-password">Forgot Password?</a>
		</div>
	</div>
	<div class="form-actions">
		<button type="submit" class="btn btn-primary btn-block uppercase">Login</button>
	</div>
<?= $this->Form->end() ?>
<!-- END LOGIN FORM -->
