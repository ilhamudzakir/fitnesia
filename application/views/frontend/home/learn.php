<section id="cover">
    <div class="banner" style="background-image: url(<?php echo 'assets/uploads/banner/' . $home_banner_2->id . '/' . $home_banner_2->banner ?>);">
        <div class="box-black">
            <div class="containter">
                <h3 style="font-weight: bold;"><?php echo $home_banner_2->short_content ?></h3>
            </div>
        </div>
    </div>
</section>

<section id="content-home">
    <div class="box-home-grey">
        <div class="container">
            <div class="row">
                <div class="col-md-4 picture-box" style="">
                    <img src="<?php echo base_url() ?>assets/frontend_assets/img/walker.png">
                </div>
                <div class="col-md-8">
                    <h2 class="title-box"><?php echo $home_learn_1->title ?></h2>
                    <span class="desc"><?php echo $home_learn_1->content ?></span>
                </div>
            </div>
        </div>
    </div>

    <div class="fadeInBlock box-home-white">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="col-md-4 picture-box picture-box-none" style="">
                        <img src="<?php echo base_url() ?>assets/frontend_assets/img/infras.png">
                    </div>
                    <h2 class="title-box"><?php echo $home_learn_2->title ?></h2>
                    <span class="desc"><?php echo $home_learn_2->content ?></span>
                </div>
                <div class="col-md-4 picture-box picture-box-none2" style="">
                    <img src="<?php echo base_url() ?>assets/frontend_assets/img/infras.png">
                </div>
            </div>
        </div>
    </div>
    <div class="fadeInBlock box-home-grey">
        <div class="container">
            <div class="row">
                <div class="col-md-4 picture-box" style="">
                    <img src="<?php echo base_url() ?>assets/frontend_assets/img/security.png">
                </div>
                <div class="col-md-8">
                    <h2 class="title-box"><?php echo $home_learn_3->title ?></h2>
                    <span class="desc"><?php echo $home_learn_3->content ?></span>
                </div>
            </div>
        </div>
    </div>
    <div class="fadeInBlock box-home-white">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="col-md-4 picture-box picture-box-none" style="">
                        <img src="<?php echo base_url() ?>assets/frontend_assets/img/price.png">
                    </div>
                    <h2 class="title-box"><?php echo $home_learn_4->title ?></h2>
                    <span class="desc"><?php echo $home_learn_4->content ?></span>
                </div>
                <div class="col-md-4 picture-box picture-box-none2" style="">
                    <img src="<?php echo base_url() ?>assets/frontend_assets/img/price.png">
                </div>
            </div>
        </div>
    </div>
</section>
