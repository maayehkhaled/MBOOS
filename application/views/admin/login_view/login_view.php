<p>Welcome Administrator</p>
<p>Please Log-in</p>

<?php echo validation_errors(); ?>

<form id="admin_login" action="<?php echo base_url(); ?>admin/login/login_validate" method="POST">
	<p>Username: <br /><input class="admin_email" type="text" name="login_username"></p>
	<p>Password: <br /><input class="admin_password" type="password" name="login_password"></p>
	<p><input id="admin_signin_button" type="submit" value="Login"></p>
</form>

 <a href = "<?php echo base_url(); ?>admin/login/forgot_password">Forgot Password?</a> 
 <a href="<?php echo base_url(); ?>admin/login_validation/login_validation">Sign up</a>