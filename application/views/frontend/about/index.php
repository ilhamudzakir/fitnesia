<section id="cover">
     <div class="cover-header" style="background-image: url(<?php echo 'assets/uploads/banner/'.$about_banner->id.'/'.$about_banner->banner ?>);">
        <div class="box-black">
         <div class="container">
           <h3><?php echo $about->title ?></h3>
       </div>
        </div>
    </div>
</section>

<section id="content-statis">
<div class="container">
<?php echo $about->content ?>
</div>
</section>
