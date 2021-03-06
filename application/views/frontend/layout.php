<!DOCTYPE html>
<html>

<head>

    <title><?php echo $app_title; ?> - <?php echo $controller_name; ?></title>
    <meta name="keyword" content="<?php echo $meta_data->meta_key; ?>">
    <meta name="description" content="<?php echo $meta_data->description; ?>">
    <base href="<?php echo base_url() ?>" />
    <link rel="shortcut icon" href="assets/uploads/app_settings/<?php echo $app_favicon_logo; ?>" type="image/x-icon" />
    <link rel="apple-touch-icon" href="assets/uploads/app_settings/<?php echo $app_favicon_logo; ?>">
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <?php if(($this->uri->segment(2) == 'detail') && ($this->uri->segment(1) == 'blog')) { ?>
    <meta property="og:image" content="<?php echo base_url(); ?>assets/uploads/news/<?php echo $blog->id ?>/<?php echo $blog->photo ?>" />
    <meta property="og:title" content="<?php echo $blog->title ?>" />
    <meta property="og:description" content="<?php echo $blog->short_desc ?>" />
    <?php } ?>
    <!--style-->
    <link rel="stylesheet" type="text/css" id="theme" href="<?php echo base_url() ?>assets/frontend_assets/css/bootstrap.css"/>
    <link rel="stylesheet" type="text/css" id="theme" href="<?php echo base_url() ?>assets/frontend_assets/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" id="theme" href="<?php echo base_url() ?>assets/frontend_assets/css/fitnesia.css"/>
    <link rel="stylesheet" type="text/css" id="theme" href="<?php echo base_url() ?>assets/backend_assets/css/fontawesome/font-awesome.min.css"/>
    <!-- end style -->
</head>
<?php $this->load->view('frontend/header') ?>
<body>
<?php if($this->uri->segment(1)!='blog'){ ?>
<div class="se-pre-con"></div>
<?php } ?>
<?php echo $page ?>

</body>
	
<?php $this->load->view('frontend/footer') ?>

	<!--js-->
	<script type="text/javascript" src="<?php echo base_url() ?>assets/frontend_assets/js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>assets/frontend_assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>assets/frontend_assets/js/core.js"></script>
	<!-- end js -->

</body>
</html>
