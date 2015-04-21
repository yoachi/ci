
<div id="content" style="margin-top:100px;">
	<div class="signup_wrap" style="width:100%;" align="center">
		<div class="reg_form" style="width:52%;max-width:550px;border:1px solid #ccc;margin: 0 auto;text-align:left;">
			<div class="signin_form" style="width:100%;max-width:500px;margin: 0 auto;text-align:left;padding:15px;">
				 <?php echo validation_errors('<p class="error">'); ?>
				<?php echo form_open("join/join_run"); ?>
				<label for="text">Registration</label><p>
				<label for="text">New to Amazon.com? Register Below.</label><p>
				<label for="email">My name is:</label>
				<input type="text" id="user_name" name="user_name" value="<?php echo set_value('user_name'); ?>"  /><p>

				<label for="email">My e-mail address is:</label>
				<input type="text" id="email_address" name="email_address" value="<?php echo set_value('email_address'); ?>" /><p>

				<label for="email">Type it again:</label>
				<input type="text" id="con_email_address" name="con_email_address" value="" /><p>

				<label for="email">My mobile phone number is:</label>
				<input type="text" id="phone" name="phone" value="" /><p>
				
				<label for="text">Protect your information with a password</label><p>
				<label for="text">This will be your only Amazon.com password.</label><p>
				<label for="password">Enter a new password:</label>
				<input type="password" id="password" name="password" value="" /><p>
				<label for="password">Type it again:</label>
				<input type="password" id="con_password" name="con_password" value="" /><p>
				<input type="submit" class="" value="Create account" />
				<?php echo form_close(); ?>
			</div>
		</div>
	</div>
</div>
