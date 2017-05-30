<footer>
<div class="container">
	<div class="row">
		<div class="col-md-8">
			<ul>
				<li class="col-md-4 col-xs-12"><?php echo $copyright->content; ?></li>
				<li class="col-md-2 col-xs-12"> <a href="<?php echo base_url()?>partners"> Partners</a></li>
				<li class="col-md-2 col-xs-12"><a href="<?php echo base_url()?>career">Careers</a></li>
				<li class="col-md-2 col-xs-12"><a href="<?php echo base_url()?>privacy">Privacy</a></li>
                                <?php if($this->uri->segment(1) == 'partners') { ?>
                                <li class="col-md-1 col-xs-12"><a href="<?php echo base_url()?>faq">FAQ</a></li>
                                <?php } ?>
			</ul>
			<div class="clearfix"></div>
		</div>
		<div class="col-md-4 text-right col-xs-12">
			<a href="<?php echo base_url()?>contact"><button class="contact-footer">Contact</button></a>
		</div>
	</div>
</div>
</footer>
