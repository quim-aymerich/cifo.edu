<div class="container">
    <div class="col-md-offset-3 col-md-5">
        <div class="form-area panel">  
            <form class="panel-body" role="form" method="post">
                <br style="clear:both">
                <?php
                  $error_msg= (isset($error_msg))? $error_msg: '';
                  if($error_msg){
                    ?>
                    <div class="alert alert-danger"> <?php echo $error_msg; ?></div>
                  <?php
                  }
                ?>
                <?php
                $success_msg= (isset($success_msg))? $success_msg : '';
                  if($success_msg){
                    ?>
                    <div class="alert alert-success"> <?php echo $success_msg; ?> </div>
                  <?php
                  }
                ?>
                <h3 style="margin-bottom: 25px; text-align: center;">Formulario de contacto</h3>
                <div class="form-group">
                    <input type="text" value="<?php echo set_value('name'); ?>" class="form-control" id="name" name="name" placeholder="Nombre" >
                    <?php echo form_error('name'); ?>
                </div>
                <div class="form-group">
                   <input type="text" value="<?php echo set_value('email'); ?>" class="form-control" id="email" name="email" placeholder="Email" >
                   <?php echo form_error('email'); ?>
                </div>
                <div class="form-group">
                	<input type="text" value="<?php echo set_value('subject'); ?>" class="form-control" id="subject" name="subject" placeholder="Asunto" >
                <?php echo form_error('subject'); ?>
                </div>
                <div class="form-group">
                <textarea class="form-control"  id="message" name="message" placeholder="Mensaje" maxlength="140" rows="7"><?php echo set_value('message'); ?></textarea>
                    <span class="help-block">
                      <p id="characterLeft" class="help-block ">Has llegado al límite de caracteres</p>
                    </span>
                    <?php echo form_error('message'); ?>                    
                </div>
                <div class="form-group">
                    <div class="text-center">
                        <a href="javascript:void(0);" class="refreshCaptcha"> Refrescar </a>
                      </div>
                     <div id="captImg" class="text-center"><?php echo $captchaImg ?> </div><br>
                <input type="text" class="form-control" id="captcha" name="captcha" placeholder="Código de la imagen" >
                <?php echo form_error('captcha'); ?>
                </div>
                <button type="submit" id="submit" name="submit" class="btn btn-primary pull-right">Enviar</button>
            </form>
        </div>
    </div>
</div>