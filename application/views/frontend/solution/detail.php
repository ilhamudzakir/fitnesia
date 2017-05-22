

<section id="content-solution">
    <div class="row">
        <div class="col-md-4 img-responsive img-detail">
            <img src="assets/uploads/solution_list/<?php echo $solution->id.'/'.$solution->photo ?>" width="100%">
        </div>
        <div class="col-md-8 isi-solution">
            <h3 class="title-black"><?php echo $solution->title ?></h3>
            <h5 class="title-grey transform"><?php echo $solution->category ?></h5>
            <div class="desc-solution">
                <?php echo $solution->content ?>
                <br>
                <span class="talk">Talk to us for more information</span>
            </div>
        </div>

    </div>
</section>
