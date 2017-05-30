<header>

    <nav class="navbar nabvar-white nabvar-white-fixed">
        <div class="container">
            <div class="navbar-header">
                <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".js-navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a  id="logo-mobile" class="navbar-brand" href="<?php echo base_url() ?>" style=""><img src="<?php echo base_url() ?>assets/frontend_assets/img/logo.png"></a>
            </div>

            <div class="collapse navbar-collapse js-navbar-collapse">
                <div class="row">
                    <div class="col-md-2 col-lg-2 text-left logo-desktop">
                        <a class="navbar-brand" href="<?php echo base_url() ?>" style=""><img src="<?php echo base_url() ?>assets/frontend_assets/img/logo.png"></a>
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-7 col-md-offset-2 menu-top">
                        <ul class="nav navbar-nav">
                            <li id="toogle-menu" class="dropdown mega-dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Solutions <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu mega-dropdown-menu">
                                    <li class="ccol-sm-12 col-xs-12 col-md-4">
                                        <ul>
                                            <li class="dropdown-header">Business</li>
                                            <li class="divider"></li>
                                            <?php foreach($solution_menu_business as $data_row) { ?>
                                            <li><a href="solution/detail/<?php echo $data_row->id ?>"><?php echo $data_row->menu_title ?></a></li>
                                            <?php } ?>
                                            <li class="divider"></li>
                                        </ul>
                                    </li>
                                    <li class="col-sm-12  col-xs-12 col-md-4">
                                        <ul>
                                            <li class="dropdown-header">Industry</li>
                                            <li class="divider"></li>
                                            <?php foreach($solution_menu_industry as $data_row) { ?>
                                            <li><a href="solution/detail/<?php echo $data_row->id ?>"><?php echo $data_row->menu_title ?></a></li>
                                            <?php } ?>
                                            <li class="divider"></li>
                                        </ul>
                                    </li>
                                    <li class="col-sm-12 col-xs-12 col-md-4">
                                        <ul>
                                            <li class="dropdown-header">Technology</li>
                                            <li class="divider"></li>
                                            <?php foreach($solution_menu_technology as $data_row) { ?>
                                            <li><a href="solution/detail/<?php echo $data_row->id ?>"><?php echo $data_row->menu_title ?></a></li>
                                            <?php } ?>
                                            <li class="divider"></li>
                                        </ul>
                                    </li>
                                </ul>       
                            </li>
                            <li><a href="<?php echo base_url() ?>about">About</a></li>
                            <li><a href="<?php echo base_url() ?>blog">Blog</a></li>
                            <li><a href="<?php echo base_url() ?>support">Support</a></li>
                        </ul>
                    </div>
                    <div class="col-md-2  col-sm-3 col-lg-2 text-right no-padding get-start-col">
                        <?php if($this->uri->segment(1) == 'partners') { ?>
                        <a href="<?php echo base_url() ?>partners?goto=form"> <button class="get-start">Get Started</button></a>
                        <?php } else { ?>
                        <button class="get-start" style="width:175px"><span class="fa fa-phone"></span> +6221 351 7984</button>
                        <?php } ?>
                    </div>
                </div>
            </div><!-- /.nav-collapse -->
    </nav>
</div>
</header>