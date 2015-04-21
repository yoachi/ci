<script>
$(document).ready(function(){
	$("[type=radio]").click(function(){
		var clicked = $(this);
		if(clicked.val()==1){
			$('#myform').attr('action', 'login/login_run'); //this fails silently
		}else if(clicked.val()==2){
			$('#myform').attr('action', '/join'); //this fails silently
		}
	});
});
</script>
<?php 
$attributes = array('name' => 'myform','id' => 'myform');
?>
<div id="content" style="margin-top:100px;">
	<div class="signup_wrap" style="width:100%;" align="center">
		<div class="signin_form" style="width:52%;max-width:550px;border:1px solid #ccc;margin: 0 auto;text-align:left;">
			<div class="signin_form" style="width:100%;max-width:500px;margin: 0 auto;text-align:left;padding:15px;">
				
				<?php echo form_open("login/login_run", $attributes); ?>
				<label for="text">Sign in</label><p>
				<label for="text">What is your e-mail address</label><p>
				<label for="email">My e-mail address is:</label>
				<input type="text" id="email_address" name="email_address" value="" /><p>
				
				<label for="text">Do you have an Amazon.com password?</label><p>
				<label for="password"><input type="radio" name="new_chk[]" id="new_chk" value="2">No, I am a new customer.<BR>
					<BR><input type="radio" name="new_chk[]" id="new_chk" value="1" checked>Yes, I have a password:</label>
				<input type="password" id="pass" name="pass" value="" /><p>
				<input type="submit" class="" value="Sign in using our secure server" />
				<?php echo form_close(); ?>
			</div><!--<div class="signin_form">-->
		</div>
	</div><!--<div class="signup_wrap">-->
</div>