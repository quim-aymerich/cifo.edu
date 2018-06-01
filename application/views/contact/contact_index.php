<div>
    <?php 
    $success_msg=$this->session->flashdata('success_msg');
    if($success_msg){
        echo $success_msg;
    }
    ?>
</div>

<form action="" method="post">
    <div class="form-group">
    	<label>Nombre</label>
    	<input class="form-control" type="text" name="name" value="<?php echo set_value('name'); ?>" >
    	<?php echo form_error('name'); ?>
    </div>
    <div class="form-group">
    	<label>Dirección de correo</label>
    	<input class="form-control" type="text" name="email" value="<?php echo set_value('email'); ?>" >
    	<?php echo form_error('email'); ?>
    </div>
    <div class="form-group">
    	<label>Asunto</label>
    	<input class="form-control" type="text" name="subject" value="<?php echo set_value('subject'); ?>" >
    	<?php echo form_error('subject'); ?>
    </div>
    <div class="form-group">
    	<label>Mensaje</label>
    	<textarea class="form-control" name="message"><?php echo set_value('message'); ?></textarea>
    	<?php echo form_error('message'); ?>
    </div>
    <div class="form-group">
    	<div class="text-block text-center"><?php echo $captcha_image ?></div>
    	<input class="form-control" type="text" name="captcha" >
    	<?php echo form_error('captcha'); ?>
    </div>
    <div class="form-group">
    	<input class="btn btn-primary" type="submit" name="Enviar" value="Enviar"> 
    </div>
</form>