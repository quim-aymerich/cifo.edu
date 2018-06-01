<section class="login-form">
	<section>
		<img class="img-rounded" src="/assets/site/img/ecifo.jpg" alt="" />
	</section>
<?php
    $error_msg = $this->session->flashdata('error_msg');
    if ($error_msg) {
?>
        <div class="alert alert-danger">
        <?php echo $error_msg; ?>
        </div>
<?php
    }
?>
<?php
    $success_msg = $this->session->flashdata('success_msg');
    if ($success_msg) {
?>
    <div class="alert alert-success">
    <?php echo $success_msg; ?>
    </div>
<?php
    }
?>
<form method="post" action="/user/login" role="login">
		<div class="form-group">
			<label><?php echo $this->lang->line('Views_User_Login_Email');?></label>
			<input type="email" name="email" required class="form-control" />
		</div>
		<div class="form-group">
			<label><?php echo $this->lang->line('Views_User_Login_Password');?></label>
			<input type="password" name="password" required class="form-control" />
			<a href="#"><?php echo $this->lang->line('Views_User_Login_ForgotPassword');?> ?</a>
		</div>
		<div class="form-group text-center">
			<button type="submit" name="go" class="btn btn-primary"><?php echo $this->lang->line('Views_User_Login_Go');?></button>
		</div>
		<div class="form-group text-center">
			<p><?php echo $this->lang->line('Views_User_Login_NotRegistred');?> ? <br>
				<a href="<?php echo base_url('user/register'); ?>"><?php echo $this->lang->line('Views_User_Login_Registrer');?></a>
			</p>
		</div>
	</form>
	<section>
		<a href="/">&larr; <?php echo $this->lang->line('Views_User_Login_GoBack');?>.</a>
	</section>
</section>