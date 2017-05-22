<section id="content-blog">
    <div class="container">
        <h1><?php echo $blog->title ?></h1>
        <div class="post-date">By <span class="autor"><?php echo $blog->author ?></span> on <?php echo $blog->date_created ?></div>
        <div class="content-blog" style="padding-top:30px;">
            <?php echo $blog->content ?>
        </div>
        <div class="tags-share">
            <div class="row">
                <div class="col-md-6 col-xs-12 tags">
                    <span class="title">Tags: </span> <span class="tag-content"><?php echo $blog->tags ?></span>
                </div>
                <div class="col-md-6 col-xs-12 tags text-right">
                    <span class="title">Share this post: </span> <img src="assets/frontend_assets/img/fb.png" width="30px"> <img src="assets/frontend_assets/img/twit.png" width="30px"> <img src="assets/frontend_assets/img/email.png" width="30px">
                </div>
            </div>
        </div>
        <div class="next-article text-right">
            <?php if($prev_blog->num_rows() == 1) { ?>
            <a href="blog/detail/<?php echo $prev_blog->row()->id ?>"><button class="b-page">Previous</button></a>
            <?php } if($next_blog->num_rows() == 1) { ?>
            <a href="blog/detail/<?php echo $next_blog->row()->id ?>"><button class="b-page">Next</button></a>
            <?php } ?>
        </div>
        <div class="related-article">
        <h3 class="related-title">Related Post</h3>
            <div class="row">
                <?php foreach($related_blog as $data_row) { ?>
                <div class="col-md-6">
                    <a href="blog/detail/<?php echo $data_row->id ?>"><img class="img-responsive" src="assets/uploads/news/<?php echo $data_row->id.'/'.$data_row->photo ?>"></a>
                    <h4 class="days-ago">
                        <?php echo time_elapsed_string($data_row->date_created); ?>
                    </h4>
                    <a href="" class="article-title-related"><h3><?php echo $data_row->title; ?></h3></a>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>