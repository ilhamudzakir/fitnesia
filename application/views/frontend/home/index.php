<section id="slider">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">

            <div class="item active">
                <div class="banner" style="background-image: url(<?php echo 'assets/uploads/banner/'.$home_banner->id.'/'.$home_banner->banner ?>);  background-size: cover; background-repeat: no-repeat;">
                    <div class="box-black">
                        <div class="containter content-silde">
                            <h3><?php echo $home_banner->short_content ?></h3>
                            <div id="desc-slide"><span><?php echo $home_banner->content ?></span></div>
                            <a href="partners/help"><button class="btn btn-slide">See how it works</button></a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<section id="solution">
    <div class="container">
        <div class="text-center header-solutions">
            <h2 class="title-black">Solutions for Your Business Problems</h2>
            <!-- <h5 class="title-grey">SatuPlatform is the go to platform for your work needs</h5> -->
        </div>

        <div class="row sec-solution">
            <div class="col-md-4 text-center row-sec">
                <img src="<?php echo base_url() ?>assets/frontend_assets/img/efective.png">
                <h5 class="header-text"><?php echo $home_icon_1->title ?></h5>
                <span><?php echo $home_icon_1->content ?></span>
            </div>
            <div class="col-md-4 text-center row-sec">
                <img src="<?php echo base_url() ?>assets/frontend_assets/img/support.png">
                <h5 class="header-text"><?php echo $home_icon_2->title ?></h5>
                <span><?php echo $home_icon_2->content ?></span>
            </div>

            <div class="col-md-4 text-center row-sec">
                <img src="<?php echo base_url() ?>assets/frontend_assets/img/dollar.png">
                <h5 class="header-text"><?php echo $home_icon_3->title ?></h5>
                <span><?php echo $home_icon_3->content ?></span>
            </div>
        </div>
    </div>
</section>

<section class="fadeInBlock">
    <div class="box-image">
        <div class="box-color">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h2 class="title-white"><?php echo $home_content_1->title ?></h2>
                        <h4 style="line-height: 35px;"><?php echo $home_content_1->content ?></h4>
                        <a href="<?php echo base_url() ?>home/learn"><button class="btn btn-learn">learn more</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>