<!-- START BREADCRUMB -->
<ul class="breadcrumb">
    <li><a href="admin">Home</a></li>                    
    <li><a href="<?php echo $controller; ?>"><?php echo $controller_name; ?></a></li>
    <li class="active"><?php echo $function_name; ?></li>
</ul>
<!-- END BREADCRUMB -->

<!-- PAGE TITLE -->
<div class="page-title">                    
    <h2><?php echo $function_name; ?></h2>
</div>
<!-- END PAGE TITLE -->                

<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">                

    <div class="row">
        <div class="col-md-12">

            <!-- START DEFAULT DATATABLE -->
            <div class="panel panel-default">
                <div class="panel-heading">                                
                    <h3 class="panel-title">Data</h3>                              
                </div>
                <div class="panel-body">
                    <table class="table datatable table-bordered">
                        <thead>
                            <tr>
                                <th width="6%" class="text-center">No</th>
                                <th class="text-center">Company</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($data as $d_row) { ?>
                                <tr>
                                    <td class="text-center"><?php echo $no; ?></td>
                                    <td class="text-center"><?php echo $d_row->company; ?></td>
                                    <td class="text-center"><?php echo $d_row->fullname; ?></td>
                                    <td class="text-center"><?php echo $d_row->email; ?></td>
                                    <td class="text-center">
                                    <?php if($d_row->read_flag == 0) { ?>
                                        <span class="btn btn-danger">Unread</span>
                                    <?php } else { ?>
                                        <span class="btn btn-primary">Read</span>
                                    <?php } ?>
                                    </td>
                                    <td class="text-center">
                                        <a href="admin_contact_us/detail/<?php echo $d_row->id ?>" class="btn btn-info btn-xs" data-original-title="Detail" data-placement="top" data-toggle="tooltip"><i class="fa fa-eye"></i></a>
                                    </td>
                                </tr>
                                <?php $no++;
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- END DEFAULT DATATABLE -->

        </div>
    </div>                                

</div>
<!-- PAGE CONTENT WRAPPER -->

<!-- START SCRIPTS -->               
<!-- THIS PAGE PLUGINS -->
<script type="text/javascript" src="assets/backend_assets/js/plugins/datatables/jquery.dataTables.min.js"></script>
<!-- END PAGE PLUGINS -->
<!-- START TEMPLATE -->
<script type="text/javascript" src="assets/backend_assets/js/settings.js"></script>

<script type="text/javascript" src="assets/backend_assets/js/plugins.js"></script>        
<script type="text/javascript" src="assets/backend_assets/js/actions.js"></script>
<!--  -->
<!-- END SCRIPTS -->   