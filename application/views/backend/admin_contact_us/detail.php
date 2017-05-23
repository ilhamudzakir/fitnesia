<ul class="breadcrumb">
    <li><a href="admin">Home</a></li>                    
    <li><a href="<?php echo $controller; ?>"><?php echo $controller_name; ?></a></li>
    <li class="active"><?php echo $function_name; ?> Detail</li>
</ul>

<div class="page-title">                    
    <h2><?php echo $function_name; ?></h2>
</div>

<div class="page-content-wrap">                

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">                                
                    <h3 class="panel-title"><?php echo $data->fullname.' ('.$data->company.')' ?></h3>
                    <h3 class="panel-title pull-right"><?php echo $data->date_created ?> WIB</h3>
                </div>
                <ul class="nav nav-tabs faq-cat-tabs">
                    <li class="active"><a href="#tab-1" data-toggle="tab">Detail</a></li>
                </ul>
                <div class="tab-content faq-cat-content">
                    <!-- TAB ORDER SUMMARY -->
                    <div class="tab-pane active in fade" id="tab-1">
                        <form class="form-horizontal">
                            <div class="panel-body">
                                <div class="form-group">
                                    <label class="col-md-2 col-xs-12 control-label">Company</label>
                                    <div class="col-md-9 col-xs-12">
                                        <span class="form-control"><?php echo $data->company ?></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 col-xs-12 control-label">Full Name</label>
                                    <div class="col-md-9 col-xs-12">
                                        <span class="form-control"><?php echo $data->fullname ?></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 col-xs-12 control-label">Email</label>
                                    <div class="col-md-9 col-xs-12">
                                        <span class="form-control"><?php echo $data->email ?></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 col-xs-12 control-label">Phone</label>
                                    <div class="col-md-9 col-xs-12">
                                        <span class="form-control"><?php echo $data->phone ?></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 col-xs-12 control-label">SAAS Type</label>
                                    <div class="col-md-9 col-xs-12">
                                        <span class="form-control"><?php echo $data->saas_type ?></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 col-xs-12 control-label">Message</label>
                                    <div class="col-md-9 col-xs-12">
                                        <span class="form-control" style="height:100%;"><?php echo $data->message ?></span>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>                                

</div>
<!-- PAGE CONTENT WRAPPER -->
<!-- END PAGE PLUGINS -->
<!-- START TEMPLATE -->
<script type="text/javascript" src="assets/backend_assets/js/settings.js"></script>

<script type="text/javascript" src="assets/backend_assets/js/plugins.js"></script>        
<script type="text/javascript" src="assets/backend_assets/js/actions.js"></script>