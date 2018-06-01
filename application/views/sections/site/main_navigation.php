<!-- Fixed navbar -->
<nav class="navbar navbar-default navbar-fixed-top navbar-inverse">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed"
				data-toggle="collapse" data-target="#navbar" aria-expanded="false"
				aria-controls="navbar">
				<span class="sr-only">Toggle navigation</span> <span
					class="icon-bar"></span> <span class="icon-bar"></span> <span
					class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="/"> <img
				style="height: 35px; margin-top: -5px"
				src="<?php echo base_url(); ?>assets/site/img/ecifo.jpg" alt="..."
				class="img-circle ">
			</a>
		</div>
		<div id="navbar" class="collapse navbar-collapse">
			<ul class="nav navbar-nav">
				<li class="active"><a href="/"><?php echo $this->lang->line('Views_Sections_Site_Navigation_Home');?></a></li>
				<li><a href="#about"><?php echo $this->lang->line('Views_Sections_Site_Navigation_About');?></a></li>
				<li><a href="/contact"><?php echo $this->lang->line('Views_Sections_Site_Navigation_Contact');?></a></li>
				<li class="dropdown"><a href="#" class="dropdown-toggle"
					data-toggle="dropdown" role="button" aria-haspopup="true"
					aria-expanded="false"><?php echo $this->lang->line('Views_Sections_Site_Navigation_Sections');?> <span
						class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="#"><?php echo $this->lang->line('Views_Sections_Site_Navigation_Centers');?></a></li>
						<li><a href="#"><?php echo $this->lang->line('Views_Sections_Site_Navigation_Training_Area');?></a></li>
						<li><a href="#"><?php echo $this->lang->line('Views_Sections_Site_Navigation_Administration');?></a></li>
						<li role="separator" class="divider"></li>
						<li class="dropdown-header"><?php echo $this->lang->line('Views_Sections_Site_Navigation_Search_Course');?></li>
						<li><a href="#"><?php echo $this->lang->line('Views_Sections_Site_Navigation_Calendar');?></a></li>
						<li><a href="#"><?php echo $this->lang->line('Views_Sections_Site_Navigation_Personal_Area');?></a></li>
					</ul></li>
<?php
if ($this->session->userdata('user')) {
    $user = $this->session->userdata('user');
    ?>
<li class="dropdown"><a href="#" class="dropdown-toggle"
					data-toggle="dropdown" role="button" aria-haspopup="true"
					aria-expanded="false"><i class="fa fa-user"></i> <?php echo $user['nombre'] ?> <?php echo $user['apellidos'] ?><span
						class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="/user/profile/<?php echo $user['id'] ?>">Perfil</a></li>
						<li><a href="/user/logout">Logout</a></li>
					</ul></li>
<?php }else{ ?>
<li><a href="/user/login"><?php echo $this->lang->line('Views_Sections_Site_Navigation_Login');?></a></li>
<?php } ?>
<li class="dropdown"><a href="#" class="dropdown-toggle"
					data-toggle="dropdown" role="button" aria-haspopup="true"
					aria-expanded="false"><?php echo $this->lang->line('Views_Sections_Site_Navigation_Language');?> <span
						class="caret"></span></a>
					<ul class="dropdown-menu">
						<li
							class=" <?php if($this->session->userdata('site_lang') == 'catalan') echo 'active'; ?> "><a
							href="<?php echo base_url(); ?>LanguageSwitcher/switchLang/catalan">Català</a></li>
						<li
							class=" <?php if($this->session->userdata('site_lang') == 'spanish') echo 'active'; ?> "><a
							href="<?php echo base_url(); ?>LanguageSwitcher/switchLang/spanish">Español</a></li>
						<li
							class=" <?php if($this->session->userdata('site_lang') == 'english') echo 'active'; ?> "><a
							href="<?php echo base_url(); ?>LanguageSwitcher/switchLang/english">English</a></li>
					</ul></li>
			</ul>
		</div>
		<!--/.nav-collapse -->
	</div>
</nav>