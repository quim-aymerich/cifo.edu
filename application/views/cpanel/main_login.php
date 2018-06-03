<div>
  <a class="hiddenanchor" id="signup"></a> <a class="hiddenanchor" id="signin"></a>
  <div class="login_wrapper">
    <div class=" form login_form">
      <section class="login_content">
        <form method="post" action="/cpanel/login/" >
          <h1>Cpanel</h1>
          <?php
              $error_msg= $this->session->flashdata('error_msg');
              if($error_msg){
                ?>
                <div class="alert alert-danger">
                  <?php echo $error_msg; ?>
                </div>
              <?php
              }
            ?>
          <div>
            <input name="email" type="text" class="form-control" placeholder="Direcció de correu" required />
          </div>
          <div>
            <input name="password" type="password" class="form-control" placeholder="Contrasenya" required />
          </div>
          <div>
            <input type="submit" class="btn btn-default submit"  value="Entrar">  
            <a class="reset_pass" href="#">Has oblidat la contrasenya?</a>
          </div>
          <div class="clearfix"></div>
          <div class="separator">
            <div class="clearfix"></div>
            <br />
            <div>
              <h1>
                <img style="height: 35px"
                  src="<?php echo base_url(); ?>assets/cpanel/build/images/ecifo.jpg"
                  alt="..." class="img-circle "> e-CIFO
              </h1>
              <p>
                &copy; 2018 All Rights Reserved. <br>e-CIFO Departament de la
                Generalitat. Privacitat &amp; Termes
              </p>
            </div>
          </div>
        </form>
      </section>
    </div>
  </div>
</div>