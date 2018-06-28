         <script type="application/javascript">
/** After windod Load */
$(window).bind("load", function() {
  window.setTimeout(function() {
    $(".alert").fadeTo(300, 0).slideUp(500, function(){
        $(this).remove();
    });
}, 4000);
});

</script>
<style>
.contact-us input {
	text-transform: none;
}
</style>
		 <section class="contact-us light-grey" style="margin:70px 0 0 0">
            <div class="container">
               <div class="row">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                     <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="Heading-title black">
                           <h1>Contact Us</h1>
                           <!--p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor.At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium</p-->
                        </div>
                     </div>
					 
                     <div class="col-md-8 col-sm-8 col-xs-12">
					 <div class="row">
						<div class="col-md-12">
							<?php

								if($this->session->flashdata('item')) {
								$message = $this->session->flashdata('item');
								?>
								<div class="<?php echo $message['class'] ?>"><?php echo $message['message']; ?>

								</div>
								<?php
								}
								?>
						</div>
					 </div>
                        <form class="row" action="<?php echo base_url(); ?>Front/contact_mail" method="POST">
                           <div class="col-md-6 col-sm-12">
                              <div class="form-group">
                                 <label>Name <span class="required">*</span></label>
                                 <input placeholder="" class="form-control" type="text" name="contact_name" required>
                              </div>
                           </div>
                           <div class="col-md-6 col-sm-12">
                              <div class="form-group">
                                 <label>Email <span class="required">*</span></label>
                                 <input placeholder="" class="form-control" type="email" name="contact_email" required>
                              </div>
                           </div>
                           <div class="col-md-6 col-sm-12">
                              <div class="form-group">
                                 <label>Phone <span class="required">*</span></label>
                                 <input placeholder="" class="form-control" type="number" name="contact_phone" required>
                              </div>
                           </div>
                           <div class="col-md-6 col-sm-12">
                              <div class="form-group">
                                 <label>Subject <span class="required">*</span></label>
                                 <input placeholder="" class="form-control" type="text" name="contact_subject">
                              </div>
                           </div>
                           <div class="col-md-12 col-sm-12">
                              <div class="form-group">
                                 <label>Message <span class="required">*</span></label>
                                 <textarea cols="6" rows="8" placeholder="" class="form-control" name="contact_message"></textarea>
                              </div>
                           </div>
                           <div class="col-md-12 col-sm-12">
                              <!--a href="#" class="btn btn-default"> Send Message <i class="fa fa-angle-double-right"></i> </a-->
							  <input type="submit" class="btn btn-default" value="Send Message" name="submit_contact_mail">
                           </div>
                        </form>
                     </div>
                     <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="contact_block">
                           <h4>Contact Information</h4>
                           <ul class="personal-info">
                              <li><i class="fa fa-map-marker"></i> No. 16-1, Jalan 6/38D, Taman Sri Sinar, Segambut, 51200 Kuala Lumpur.</li>
                              <li><i class="fa fa-envelope"></i> enquiry@scubbi.com</li>
                              <li><i class="fa fa-phone"></i> +6016 2096463 / +6016 2583798</li>
                              <li><i class="fa fa-clock-o"></i> Mon - Sun 8:30 AM - 10:00 PM</li>
                           </ul>
                         
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>
<div class="separator"></div>