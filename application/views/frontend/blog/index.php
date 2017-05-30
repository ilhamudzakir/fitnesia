<section id="cover">
    <div class="container">
        <h3 class="title-black"></h3>
    </div>
</section>

<section id="content-blog">
<div class="">
    <div class="row" id="content-row">
        <?php
        $no=0;
        foreach($blog as $data_row) {
        $no++;
        if ($no==4){
            echo"<div class='row'>";
        }
        ?>
    	<div class="box-blog col-md-3">
    		<a href="blog/detail/<?php echo $data_row->id ?>"><img src="<?php echo 'assets/uploads/news/'.$data_row->id.'/'.$data_row->photo ?>"></a>
    		<div class="isi-blog">
    		<!-- <span class="date-blog"><?php echo time_elapsed_string($data_row->date_created); ?></span> -->
                <a href="blog/detail/<?php echo $data_row->id ?>" style="color:black"><p class="title-blog"><?php echo $data_row->title ?></p></a>
    		<a class="read-more" href="blog/detail/<?php echo $data_row->id ?>"><span >Read More ></span></a>
    		</div>
    	</div>
        <?php 
        if ($no==4){ 
            echo"</div>";
        }
        } ?>
    </div>
    <?php if($count_blog>8){ ?>
    <div class="row">
        <div class="col-md-12">
        <div style="margin-bottom:100px;" class="text-center">
           <button class="get-start" id="loadMore" offset="8" total="<?php echo $count_blog ?>">Load More</button>
        </div>
        </div>
    </div>
    <?php } ?>
</div>
<input type="hidden" name="base_url" id="base_url" value="<?php echo base_url() ?>">
</section>
