  <div class="left_col scroll-view">
    <div class="navbar nav_title" style="border: 0;">
      <a href="/cpanel" class="site_title">
       <img style="height:35px" src="<?php echo base_url(); ?>assets/cpanel/build/images/ecifo.jpg" alt="..." class="img-circle ">
       <span> e-CIFO </span>
       </a>
    </div>

    <div class="clearfix"></div>

    <!-- menu profile quick info -->
    <div class="profile clearfix">
      <div class="profile_pic">
        <img src="<?php echo base_url(); ?>assets/media/users/<?php echo $foto ?>" alt="..." class="img-circle profile_img">
      </div>
      <div class="profile_info">
        <span>Benvingut,</span>
        <h2><?php echo $name?></h2>
      </div>
    </div>
    <!-- /menu profile quick info -->

    <br />

    <!-- sidebar menu -->
    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    
      <div class="menu_section">
        <h3>General</h3>
        <ul class="nav side-menu">
          <li>
            <a><i class="fa fa-home"></i> Centres <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="/cpanel/centres"> Llistat </a></li>
              <li><a href="index2.html"> Estadístiques </a></li>
            </ul>
          </li>
          <li><a><i class="fa fa-graduation-cap"></i> Formació <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="form.html"> Àrees de formació </a></li>
              <li><a href="form_advanced.html"> Ofertes</a></li>
              <li><a href="form_validation.html"> Cursos</a></li>
              <li><a href="form_validation.html"> Professors </a></li>
            </ul>
          </li>
          <li><a><i class="fa fa-users"></i> Alumnes <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="general_elements.html"> Llistat </a></li>
              <li><a href="media_gallery.html"> Matrícules </a></li>
            </ul>
          </li>
          
          
        </ul>
      </div>
      
      <div class="menu_section">
        <h3>Biblioteca</h3>
        <ul class="nav side-menu">
          <li><a><i class="fa fa-book"></i> Libres <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="contacts.html">Llistat</a></li>
              <li><a href="e_commerce.html">Disponibles</a></li>
              <li><a href="projects.html">Prestats</a></li>
              <li><a href="project_detail.html">Reserves</a></li>
              <li><a href="contacts.html"> Temes </a></li>
              
            </ul>
          </li>
          <li><a><i class="fa fa-edit"></i> Autors <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="page_403.html"> Llistat </a></li>
              <li><a href="page_404.html"> Nou Autor </a></li>
             
            </ul>
          </li>
          <li><a><i class="fa fa-building"></i> Editorials <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
                <li><a href="#level1_1"> Llistat </a></li>
                <li><a href="#level1_1"> Nova editorial </a></li>
            </ul>
          </li>
          <!-- <li><a><i class="fa fa-sitemap"></i> Editorials <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
                <li><a href="#level1_1">Level One</a>
                <li><a>Level One<span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li class="sub_menu"><a href="level2.html">Level Two</a>
                    </li>
                    <li><a href="#level2_1">Level Two</a>
                    </li>
                    <li><a href="#level2_2">Level Two</a>
                    </li>
                  </ul>
                </li>
                <li><a href="#level1_2">Level One</a>
                </li>
            </ul>
          </li>-->                  
          <!-- <li><a href="javascript:void(0)"><i class="fa fa-laptop"></i> Landing Page <span class="label label-success pull-right">Coming Soon</span></a></li> -->
        </ul>
      </div>

    </div>
    <!-- /sidebar menu -->

    <!-- /menu footer buttons -->
    <!-- <div class="sidebar-footer hidden-small">
      <a data-toggle="tooltip" data-placement="top" title="Settings">
        <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
      </a>
      <a data-toggle="tooltip" data-placement="top" title="FullScreen">
        <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
      </a>
      <a data-toggle="tooltip" data-placement="top" title="Lock">
        <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
      </a>
      <a data-toggle="tooltip" data-placement="top" title="Logout" href="/cpanel/logout">
        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
      </a>
    </div>-->
    <!-- /menu footer buttons -->
  </div>