<!DOCTYPE html>
<html lang="<?php echo $this->session->userdata('prefix_lang') ?>">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon"
	href="<?php echo base_url(); ?>assets/site/img/favicon.ico">
    <title><?php echo $title; ?></title>
    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url(); ?>assets/site/vendors/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- font-awesome core CSS -->
    <link href="<?php echo base_url(); ?>assets/site/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="<?php echo base_url(); ?>assets/site/css/core.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
<?php
    /**  -- Meta && CSS s -- */
    if (! empty($meta))
        foreach ($meta as $name => $content) {
            echo "\n\t\t";
            ?><meta name="<?php echo $name; ?>"
    	content="<?php echo $content; ?>" /><?php
        }
    echo "\n";
    
    if (! empty($canonical)) {
        echo "\n\t\t";
        ?><link rel="canonical" href="<?php echo $canonical?>" /><?php
    }
    echo "\n\t";
    
    foreach ($css as $file) {
        echo "\n\t\t";
        ?><link rel="stylesheet" href="<?php echo $file; ?>" type="text/css" /><?php
    }
    echo "\n\t";
    
    /** -- /Meta && CSS --  */
?>
    <!--  JavaScript -->
    <script src="<?php echo base_url(); ?>assets/site/vendors/jquery/jquery.min.js"></script>
   <script src="<?php echo base_url(); ?>assets/site/vendors/bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
 <!-- Begin page content -->
 <?php echo $output;?>
<!-- / Begin page content -->
<!--  JavaScript -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="<?php echo base_url(); ?>assets/site/js/core.js"></script>
   <?php
    foreach ($js as $file) {
        echo "\n\t\t";
        ?><script src="<?php echo $file; ?>"></script><?php
    }
    echo "\n\t";
    ?>
</body>
</html>