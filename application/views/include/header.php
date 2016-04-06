<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="content-type" content="text/html">
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="description" content="Xenon Boostrap Admin Panel" />
	<meta name="author" content="" />
	
	<title><?php  if(!empty($this->currentsession)){ print_r($this->currentsession[0]->SchoolName);}else{ echo "School Management";} ?></title>

	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Arimo:400,700,400italic">
	<link rel="stylesheet" href="<?=base_url();?>assets/css/fonts/linecons/css/linecons.css">
	<link rel="stylesheet" href="<?=base_url();?>assets/css/fonts/fontawesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?=base_url();?>assets/css/bootstrap.css">
	<link rel="stylesheet" href="<?=base_url();?>assets/css/xenon-core.css">
	<link rel="stylesheet" href="<?=base_url();?>assets/css/xenon-forms.css">
	<link rel="stylesheet" href="<?=base_url();?>assets/css/xenon-components.css">
	<link rel="stylesheet" href="<?=base_url();?>assets/css/xenon-skins.css">
	<link rel="stylesheet" href="<?=base_url();?>assets/css/custom.css">
	<link rel="stylesheet" href="<?=base_url();?>assets/css/clockface.css">
	<link rel="stylesheet" href="<?=base_url();?>assets/css/fonts/elusive/css/elusive.css">
	<link rel="shortcut icon" href="<?=base_url();?>assets/images/junctionerplogo.png">
	<script src="<?=base_url();?>assets/js/jquery-1.11.1.min.js"></script>
	 <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
     <script type="text/javascript" src="<?php echo base_url(); ?>js/common_functions.js"></script>
 <script type="text/javascript" src="<?php echo base_url(); ?>js/script.js"></script>

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	
	
</head>