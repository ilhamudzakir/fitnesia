<section id="cover">
    <div class="cover-header" style="background-image: url(<?php echo 'assets/uploads/banner/' . $faq_banner->id . '/' . $faq_banner->banner ?>);">
        <div class="box-black">
            <div class="container text-center">
                <h3><?php echo $faq_banner->short_content ?></h3>
                <h5><?php echo $faq_banner->content ?></h5>
            </div>
        </div>
    </div>
</section>

<section id="content-faq">
    <div class="container">
        <?php foreach($faq as $data_row) { ?>
        <div id="sec-faq">
            <h5 class="title"><?php echo $data_row->title ?></h5>
            <h5 class="desc"><strong><?php echo $data_row->subtitle ?></strong></h5>
            <div class="content-faq">
                <?php echo $data_row->content ?>
            </div>
        </div>
        <?php } ?>
        <div id="sec-faq">
            <h5 class="title-low">Do you still have questions? Send us an email to <span class="color-orange">info@satuplatform.com</span>
            </h5>
        </div>
    </div>
</section>
