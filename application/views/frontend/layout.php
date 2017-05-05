<!DOCTYPE html>
<html>

<head>

    <title><?php echo $controller_name ?> - Fitnesia</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name='robots' content='noindex, nofollow' />
    <meta content="" name="title" />
    <meta content="" name="author" />
    <link rel="shortcut icon" href="" type="image/x-icon" />
    <link rel="apple-touch-icon" href="">
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <!--style-->
    <link rel="stylesheet" type="text/css" id="theme" href="<?php echo base_url() ?>assets/frontend_assets/css/bootstrap.css"/>
    <link rel="stylesheet" type="text/css" id="theme" href="<?php echo base_url() ?>assets/frontend_assets/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" id="theme" href="<?php echo base_url() ?>assets/frontend_assets/css/fitnesia.css"/>
    <!-- end style -->
</head>
<?php $this->load->view('frontend/header') ?>
<body>
<div class="se-pre-con"></div>
<?php echo $page ?>

</body>
	
<?php $this->load->view('frontend/footer') ?>

	<!--js-->
	<script type="text/javascript" src="<?php echo base_url() ?>assets/frontend_assets/js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/frontend_assets/js/modernizr.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>assets/frontend_assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>assets/frontend_assets/js/core.js"></script>
	<!-- end js -->

</body>
</html>
