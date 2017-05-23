<!-- START BREADCRUMB -->
<ul class="breadcrumb">
	<li><a href="#">Home</a></li>                    
	<li class="active">Dashboard</li>
</ul>
<!-- END BREADCRUMB -->                       

<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">
	
	<!-- START WIDGETS -->                    
	<div class="row">
		<div class="col-md-3">
			
			<!-- START WIDGET SLIDER -->
			<div class="widget widget-default widget-carousel">
				<div class="owl-carousel" id="owl-example">
					<div>                                    
						<div class="widget-title">Total Website Access</div>                                                                        
						<div class="widget-subtitle">All</div>
						<div class="widget-int"><?php echo number_format($total_access, 0, '', '.') ?></div>
					</div>
					<div>                                    
						<div class="widget-title">Total Visitors</div>
						<div class="widget-subtitle">Unique</div>
						<div class="widget-int"><?php echo number_format($total_visitor, 0, '', '.') ?></div>
					</div>
				</div>                            
			</div>         
			<!-- END WIDGET SLIDER -->
			
		</div>
		<div class="col-md-3">
			
			<!-- START WIDGET MESSAGES -->
                        <a href="admin_contact_us">
			<div class="widget widget-default widget-item-icon">
				<div class="widget-item-left">
					<span class="fa fa-phone"></span>
				</div>                             
				<div class="widget-data">
					<div class="widget-int num-count"><?php echo number_format($total_contact_us, 0, '', '.') ?></div>
					<div class="widget-title">Contact US</div>
					<div class="widget-subtitle">Unread</div>
				</div>
			</div>
                        </a>
			<!-- END WIDGET MESSAGES -->
			
		</div>
		<div class="col-md-3">
			
			<!-- START WIDGET REGISTRED -->
                        <a href="admin_become_partners">
			<div class="widget widget-default widget-item-icon">
				<div class="widget-item-left">
					<span class="fa fa-users"></span>
				</div>
				<div class="widget-data">
					<div class="widget-int num-count"><?php echo number_format($total_become_partners, 0, '', '.') ?></div>
					<div class="widget-title">Become Partners</div>
					<div class="widget-subtitle">Unread</div>
				</div>                            
			</div>
                        </a>
			<!-- END WIDGET REGISTRED -->
			
		</div>
		<div class="col-md-3">
			
			<!-- START WIDGET CLOCK -->
			<div class="widget widget-danger widget-padding-sm">
				<div class="widget-big-int plugin-clock">00:00</div>                            
				<div class="widget-subtitle plugin-date">Loading...</div>
				<div class="widget-controls">                                
					<a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="left" title="Remove Widget"><span class="fa fa-times"></span></a>
				</div>                            
				<div class="widget-buttons widget-c3">
					Hallo <?php echo $this->session_admin['realname']; ?>
					<div class="col hidden">
						<a href="#"><span class="fa fa-clock-o"></span></a>
					</div>
					<div class="col hidden">
						<a href="#"><span class="fa fa-bell"></span></a>
					</div>
					<div class="col hidden">
						<a href="#"><span class="fa fa-calendar"></span></a>
					</div>
				</div>                            
			</div>                        
			<!-- END WIDGET CLOCK -->
			
		</div>
	</div>
	<!-- END WIDGETS -->                    
	<div class="row">
		<div class="col-md-6">
                    <div class="panel panel-default">
                            <div class="panel-heading">
                                    <div class="panel-title-box">
                                            <h3>Total Access</h3>
                                            <span id="report-text-access">Monthly</span>
                                    </div>
                                    <ul class="panel-controls" style="margin-top: 2px;">
                                            <li class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span><i class="fa fa-calendar"></i></span></a>                                        
                                                    <ul class="dropdown-menu">
                                                            <li><a href="#" class="panel-refresh change-chart-access" data-status="1"><span class="fa fa-angle-down"></span> All Time</a></li>
                                                            <li><a href="#" class="panel-refresh change-chart-access" data-status="0"><span class="fa fa-angle-down"></span> Monthly</a></li>
                                                            <li><a href="#" class="panel-refresh change-chart-access" data-status="2"><span class="fa fa-angle-down"></span> Daily</a></li>
                                                    </ul>                                        
                                            </li>                                       
                                    </ul>
                            </div>
                            <div class="panel-body padding-0">
                                    <div class="chart-holder" id="dashboard-access" style="height: 200px;"></div>
                            </div>
                    </div>
		</div>
                <div class="col-md-6">
                    <div class="panel panel-default">
                            <div class="panel-heading">
                                    <div class="panel-title-box">
                                            <h3>Total Visitor (Unique)</h3>
                                            <span id="report-text-visitor">Monthly</span>
                                    </div>
                                    <ul class="panel-controls" style="margin-top: 2px;">
                                            <li class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span><i class="fa fa-calendar"></i></span></a>                                        
                                                    <ul class="dropdown-menu">
                                                            <li><a href="#" class="panel-refresh change-chart-visitor" data-status="1"><span class="fa fa-angle-down"></span> All Time</a></li>
                                                            <li><a href="#" class="panel-refresh change-chart-visitor" data-status="0"><span class="fa fa-angle-down"></span> Monthly</a></li>
                                                            <li><a href="#" class="panel-refresh change-chart-visitor" data-status="2"><span class="fa fa-angle-down"></span> Daily</a></li>
                                                    </ul>                                        
                                            </li>                                       
                                    </ul>
                            </div>
                            <div class="panel-body padding-0">
                                    <div class="chart-holder" id="dashboard-visitor" style="height: 200px;"></div>
                            </div>
                    </div>
		</div>
	</div>
	
</div>
<!-- END PAGE CONTENT WRAPPER -->                 

<!-- START SCRIPTS -->
<!-- START THIS PAGE PLUGINS--> 
<script type="text/javascript" src="assets/backend_assets/js/plugins/morris/raphael-min.js"></script>
<script type="text/javascript" src="assets/backend_assets/js/plugins/morris/morris.min.js"></script>       
<script type="text/javascript" src="assets/backend_assets/js/plugins/rickshaw/d3.v3.js"></script>
<script type="text/javascript" src="assets/backend_assets/js/plugins/rickshaw/rickshaw.min.js"></script>
<script type='text/javascript' src='assets/backend_assets/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js'></script>
<script type='text/javascript' src='assets/backend_assets/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js'></script>                
<script type='text/javascript' src='assets/backend_assets/js/plugins/bootstrap/bootstrap-datepicker.js'></script>                
<script type="text/javascript" src="assets/backend_assets/js/plugins/owl/owl.carousel.min.js"></script>
<script type="text/javascript" src="assets/backend_assets/js/plugins/moment.min.js"></script>
<script type="text/javascript" src="assets/backend_assets/js/plugins/daterangepicker/daterangepicker.js"></script>
<!-- END THIS PAGE PLUGINS-->        

<!-- START TEMPLATE -->
<script type="text/javascript" src="assets/backend_assets/js/settings.js"></script>

<script type="text/javascript" src="assets/backend_assets/js/plugins.js"></script>        
<script type="text/javascript" src="assets/backend_assets/js/actions.js"></script>

<script type="text/javascript" src="assets/backend_assets/page/dashboard/dashboard.js"></script>
<!-- END TEMPLATE -->
<!-- END SCRIPTS -->  