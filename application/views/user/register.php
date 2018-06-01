<section class="register-form">
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
	<form method="post" action="/user/register" role="register">
		<div class="row">
			<div class="col-xs-12 text-right">
				<i class="small"><small class="text-danger">*</small> <?php echo $this->lang->line('Views_User_Register_Mandatory');?></i>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12 col-sm-6">
				<div class="form-group">
					<label><?php echo $this->lang->line('Views_User_Register_Name');?>
					<i class="small"><small class="text-danger">*</small></i>
					</label>
					<input type="text" name="nombre"  class="form-control" value="" />
				</div>
				<div class="form-group">
					<label><?php echo $this->lang->line('Views_User_Register_Surname');?>
					<i class="small"><small class="text-danger">*</small></i></label> 
					<input type="text" name="apellidos"  class="form-control" value="" />
				</div>
				<div class="form-group">
					<label><?php echo $this->lang->line('Views_User_Register_Email');?>
					<i class="small"><small class="text-danger">*</small></i></label> 
					<input type="email" name="email"  class="form-control" value="" />
				</div>
			</div>
			<div class="col-xs-12 col-sm-6">
				<div class="form-group">
					<label><?php echo $this->lang->line('Views_User_Register_Password');?>
					<i class="small"><small class="text-danger">*</small></i></label> 
					<input type="password" name="password"  class="form-control" />
				</div>
				<div class="form-group">
					<label><?php echo $this->lang->line('Views_User_Register_RePassword');?></label>
					<input type="password" name="repassword"  class="form-control" />
				</div>
				<div class="form-group">
					<label><?php echo $this->lang->line('Views_User_Register_Captcha');?>
					<i class="small"><small class="text-danger">*</small></i></label> 
					<input type="text" name="captcha"  class="form-control" />
				</div>
			</div>
			<div class="col-xs-12 ">
				<div class="form-group text-center">
					<label> 
						<a href="javascript:void(0);" class="refreshCaptcha">
						<?php echo $this->lang->line('Views_User_Register_Refresh');?>
						</a>
					</label>
					<div id="captImg" style="width: 150px; height: 55px; margin: 0 auto">
						<?php echo $captchaImg ?>
					</div>
				</div>
			</div>
		</div>
		<div class="form-group text-center">
				<input type="checkbox" required name="ok" /> <label><?php echo $this->lang->line('Views_User_Register_Accept');?>
				<i class="small"><small class="text-danger">*</small></i></label>
		</div>
		<div class="form-group text-center">
			<button type="submit" name="go" class="btn btn-primary"><?php echo $this->lang->line('Views_User_Register_Go');?></button>
		</div>
		<div class="form-group text-center">
			<p><?php echo $this->lang->line('Views_User_Register_YetRegistred');?> ? <br>
				<a href="<?php echo base_url('user/login'); ?>"><?php echo $this->lang->line('Views_User_Register_Login');?></a>
			</p>
		</div>
	
	</form>
	<section>
		<a href="/">&larr; <?php echo $this->lang->line('Views_User_Register_GoBack');?>.</a>
	</section>
</section>
    <script type="text/javascript">
        $('.refreshCaptcha').on('click', function(){
        	$.get('<?php echo base_url().'user/refresh'; ?>', function(data){
        		$('#captImg').html(data);
        	});
        });
    </script>