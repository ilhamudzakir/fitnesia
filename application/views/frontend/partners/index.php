<section id="slider">
    <div class="banner" style="background-image: url(<?php echo 'assets/uploads/banner/'.$partners_banner->id.'/'.$partners_banner->banner ?>); background-size: cover; background-repeat: no-repeat;">
    <div class="box-black">
        <div class="containter content-partner">
    	<h3><?php echo $partners_banner->short_content ?></h3>
        <div id="desc-slide"><span><?php echo $partners_banner->content ?></span></div>
        <button class="btn btn-partner" id="goto-section-unique">See how it works</button>
    </div>
    </div>
    </div>
</section>

<section id="what-is">
    <div class="box-image-partner">
        <div class="box-color">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                <div class="text-center">
                    <h2 class="title-white"><?php echo $partners_content_1->title ?></h2>
                </div>
                   <?php echo $partners_content_1->content ?>
                </div>
            </div>
        </div>
        </div>
    </div>
</section>

<section id="unique" class="fadeInBlock">
	<div class="container">
		<div class="text-center title-unique">
			<h2 class="title-black">Our unique approach is designed to unlock value and mitigate risk.</h2>
		</div>
		<div class="content-unique">
			<div class="row">
				<div class="col-md-4">
					<div class="text-center">
					<img class="img-content-unique" src="<?php echo base_url() ?>assets/frontend_assets/img/accelerate.png" style="width: 100px;">
					<h5><?php echo $partners_icon_1->title ?></h5>
					</div>
					<p><?php echo $partners_icon_1->content ?></p>
				</div>
				<div class="col-md-4">
					<div class="text-center">
					<img class="img-content-unique" src="<?php echo base_url() ?>assets/frontend_assets/img/partners.png" style="width: 100px;">
					<h5><?php echo $partners_icon_2->title ?></h5>
					</div>
					<p><?php echo $partners_icon_2->content ?></p>
				</div>
				<div class="col-md-4">
					<div class="text-center">
					<img class="img-content-unique" src="<?php echo base_url() ?>assets/frontend_assets/img/upfont.png" style="width: 100px;">
					<h5><?php echo $partners_icon_3->title ?></h5>
					</div>
					<p><?php echo $partners_icon_3->content ?></p>
				</div>
			</div>
                        <div class="row text-center" style="padding-top:40px;">
                                <a class="faq-btn" href="faq">Check FAQ for more information</a>
                        </div>
		</div>
	</div>
</section>

<section id="become-partner">
	<div class="container">
	<div class="title-become-partner text-center">
		<h2 class="title-white">Become a Partner, </h2>
		<h2 class="title-white">Get Started on SATUPLATFORM now!</h2>
		<br>
		<h5 class="subtitle-white">Please fill out the form below and our Partner Management Team will contact you</h5>
                <?php if(isset($_GET['submit'])) {
                if($_GET['submit'] == 'success') {
                    ?>
                <div class="alert alert-success">Thank You ! Your form has been submitted. Our Partner Management Team will contact you soon.</div>
                <?php } else { ?>
                <div class="alert alert-danger">Submit form Failed ! Please Try Again</div>
                <?php }} ?>
	</div>
<div id="form-become">
  <form action="partners/submit_form" method="POST">
   <div class="form-group">
    <input placeholder="Company Name" class="form-control" type="text" name="company" required>
  </div>
  <div class="form-group">
    <select class="form-control" name="saas_type" required>
        <option value="" hidden>SAAS Type</option>
        <optgroup label="INDUSTRY SOLUTIONS">
            <option value="Education">Education</option>
            <option value="Healthcare">Healthcare</option>
            <option value="Professional Services">Professional Services</option>
            <option value="Retail">Retail</option>
        </optgroup>
        <optgroup label="BUSINESS SOLUTIONS">
            <option value="Business Process">Business Process</option>
            <option value="Customer Services">Customer Services</option>
            <option value="Procurement & Sourcing">Procurement & Sourcing</option>
            <option value="Supply Chain Management">Supply Chain Management</option>
        </optgroup>
        <optgroup label="TECHNOLOGY SOLUTIONS">
            <option value="Data & Analytics Management">Data & Analytics Management</option>
            <option value="Integration">Integration</option>
            <option value="Security">Security</option>
        </optgroup>
    </select>
  </div>
  <div class="form-group">
    <input placeholder="Full Name" class="form-control" type="text" name="fullname" required>
  </div>
   <div class="form-group">
    <input placeholder="Email" class="form-control" type="email" name="email" required>
  </div>

  <div class="form-group">
    <input placeholder="Phone" class="form-control" type="text" name="phone" required>
  </div>

    <div class="form-group">
    <input placeholder="Website" class="form-control" type="text" name="website">
  </div>
      <!--
  <div class="form-group">
    <input placeholder="Leave your comment" class="form-control" type="text" name="other_saas">
  </div>
      -->
  <div class="form-group">
      <label style="color:white">Couldn't find your businesses / industries? Let us know so we can help you</label>
        <textarea class="form-control" placeholder="Leave a message" name="message" required></textarea>
  </div>

 <div class="form-group">
  <button type="submit" class="btn btn-default">Tell us your concern</button>
  </div>
</form>
</div>
	</div>
		
</section>

<input type="hidden" id="goto_value" value="<?php if(isset($_GET['goto'])) if($_GET['goto'] == 'form') echo $_GET['goto'] ?>" />