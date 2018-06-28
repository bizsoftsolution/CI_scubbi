<style>
#playground-container {
    height: 500px;
    overflow: hidden !important;
    -webkit-overflow-scrolling: touch;
}

.main{
 	margin:50px 15px;
}

h1.title { 
	font-size: 50px;
	font-family: 'Passion One', cursive; 
	font-weight: 400; 
}

hr{
	width: 10%;
	color: #fff;
}

.form-group{
	margin-bottom: 15px;
}

label{
	margin-bottom: 15px;
}

input,
input::-webkit-input-placeholder {
    font-size: 11px;
    padding-top: 3px;
}

.main-login{
 	background-color: #fff;
    /* shadows and rounded borders */
    -moz-border-radius: 2px;
    -webkit-border-radius: 2px;
    border-radius: 2px;
    -moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    -webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);

}
.form-control {
    height: auto!important;
padding: 8px 12px !important;
}
.input-group {
    -webkit-box-shadow: 0px 2px 5px 0px rgba(0,0,0,0.21)!important;
    -moz-box-shadow: 0px 2px 5px 0px rgba(0,0,0,0.21)!important;
    box-shadow: 0px 2px 5px 0px rgba(0,0,0,0.21)!important;
}
#button {
    border: 1px solid #ccc;
    margin-top: 28px;
    padding: 6px 12px;
    color: #666;
    text-shadow: 0 1px #fff;
    cursor: pointer;
    -moz-border-radius: 3px 3px;
    -webkit-border-radius: 3px 3px;
    border-radius: 3px 3px;
    -moz-box-shadow: 0 1px #fff inset, 0 1px #ddd;
    -webkit-box-shadow: 0 1px #fff inset, 0 1px #ddd;
    box-shadow: 0 1px #fff inset, 0 1px #ddd;
    background: #f5f5f5;
    background: -moz-linear-gradient(top, #f5f5f5 0%, #eeeeee 100%);
    background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #f5f5f5), color-stop(100%, #eeeeee));
    background: -webkit-linear-gradient(top, #f5f5f5 0%, #eeeeee 100%);
    background: -o-linear-gradient(top, #f5f5f5 0%, #eeeeee 100%);
    background: -ms-linear-gradient(top, #f5f5f5 0%, #eeeeee 100%);
    background: linear-gradient(top, #f5f5f5 0%, #eeeeee 100%);
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#f5f5f5', endColorstr='#eeeeee', GradientType=0);
}
.main-center{
 	margin-top: 30px;
 	margin: 0 auto;
 	max-width: 650px;
    padding: 10px 40px;
	background:#009edf;
	    color: #FFF;
    text-shadow: none;
	-webkit-box-shadow: 0px 3px 5px 0px rgba(0,0,0,0.31);
-moz-box-shadow: 0px 3px 5px 0px rgba(0,0,0,0.31);
box-shadow: 0px 3px 5px 0px rgba(0,0,0,0.31);

}

.error{
    color: #fb0000;
    font-weight: bold;
    font-size: 16px;
   
    padding: 11px;
}
</style>
<footer class="footer footer-bg">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-2 col-xs-6">
					<div class="footer_block">
						<a href="<?php echo base_url(); ?>" class="f_logo"><img src="<?php echo base_url(); ?>assets/images/logo-new-chrcle-small.jpg" class="img-responsive" alt="logo">
						</a>
						
					</div>
				</div>
				<div class="col-sm-6 col-md-3 col-xs-6">
						
					<div style=" font: 400 40px/0.8 'Cookie', Helvetica, sans-serif; margin-top: 53px;">Connecting Drivers Globally</div>
				</div>
               
				
                <div class="col-sm-6 col-md-3 col-xs-12">
                    <div class="footer_block">
                        <h4>Scubbi</h4>
                        <ul class="footer-links">
                         
                            <li><a href="<?php echo base_url('Front/about'); ?>">About Us</a> </li>
							<li> <a href="<?php echo base_url('Front/contact_us'); ?>">Contact Us</a> </li>
							<li> <a href="#">Help</a> </li>
							  <li> <a href="<?php echo base_url('Front/termsCondition'); ?>">Term & Conditions</a> </li>
                            <li> <a href="<?php echo base_url('Front/privacy'); ?>">Privacy Policy</a> </li>
                            <li> <a href="#">Carrers</a> </li>
                        </ul>
                    </div>
                </div>
				
                <div class="col-sm-6 col-md-4 col-xs-12" style="padding: 0px;">
                    <div class="footer_block dark_gry1">
                        <h4>Follow Us</h4>

                                <ul class="social-network social-circle onwhite ">
                     <li><a href="https://www.facebook.com/scubbi.moments/" class="icoFacebook" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                     <!--<li><a href="#" class="icoTwitter" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                     <li><a href="#" class="icoGoogle" title="Google +"><i class="fa fa-google-plus"></i></a></li>-->
                     <li><a href="https://www.instagram.com/scubbi.moment/" class="icoLinkedin" title="Google +"><i class="fa fa-instagram"></i></a></li>
                  </ul>
                           
                       
                    </div>
					<br>
					<div class="footer_block">
                        <h4>Subscribe for Special deals</h4>
                        <ul class="personal-info">
                            <!-- <li><i class="fa fa-map-marker"></i> 3rd Floor,Link Arcade Model Town, BBL, USA.</li>
                            <li><i class="fa fa-envelope"></i> Support@domain.com</li>
                            <li><i class="fa fa-phone"></i> (0092)+ 124 45 78 678 </li>
                            <li><i class="fa fa-clock-o"></i> Mon - Sun: 8:00 - 16:00</li> -->
                            <form class="form-inline">
                            <span class="col-md-7 col-sm-7 col-xs-7"><input type="email" class="form-control" name="subscribe"/></span><span class="col-md-3 col-sm-3 col-xs-3"><button type="button" id="subscribe" class="btn btn-danger">Subscribe</button></span></form>
                        </ul>
						<br><br>
                    </div>
                </div>
				
             
            </div>
        </div>
    </footer>
	
	<script>
  $( document ).ready(function() {
       $("#subscribe").click(function()
	   {
		    var email_id = $("input[name=subscribe]").val();
			var validate_form = validate_email(email_id);
			if(validate_form == true){
			   $.ajax({
					  url:'<?php echo base_url(); ?>Front/subscribe',
					  type:'POST',
					  data:{ 
							  email_id : email_id 
						   },

					  success: function(data) {
						alert("Thanks for Subscribe us!!!!");
						location.reload();
					  }
					});
			}
			else
			{
				alert("Please enter the Valid email-Id");
			}
		});
		
		 function validate_email(email_id){
			var pattern = new RegExp(/^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i);

			if(email_id.trim() == '' || email_id.length == 0){
			  $('.email-id').show();
			  $('.email-id').text('Please enter email address');
			  return false;
			}else if(!pattern.test(email_id)) {
			  $('.email-id').show();
			  $('.email-id').text('Please enter valid email address');
			  return false;
			} else {
			  $('.email-id').hide();
			  return true;
			}
		  }
   });
</script>
	
    <!-- <section class="footer-bottom-section light-blue">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="footer-bottom">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <p>Copyright ©2017 - All rights Reserved. Designed By <a href="http://denariusoft.com"> Denariusoft </a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>-->
    <a href="#" class="scrollup"><i class="fa fa-chevron-up"></i></a>
 

               </div>
            </div>
        </div>
    </div>
    <!-- JAVASCRIPT JS  -->
   
    <!-- JQUERY MIGRATE  -->
    <script type="text/javascript" src="<?php echo base_url('assets/frontend/js/jquery-migrate-1.2.1.min.js'); ?>"></script>
    
    <!-- JQUERY SELECT -->
    <script type="text/javascript" src="<?php echo base_url('assets/frontend/js/select2.min.js'); ?>"></script>
    <!-- MEGA MENU -->
    <script type="text/javascript" src="<?php echo base_url('assets/frontend/js/bootstrap-dropdownhover.js'); ?>"></script>
    <!-- JQUERY EASING -->
    <script type="text/javascript" src="<?php echo base_url('assets/frontend/js/easing.js'); ?>"></script>
    <!-- JQUERY COUNTERUP -->
    <script type="text/javascript" src="<?php echo base_url('assets/frontend/js/counterup.js'); ?>"></script>
    <!-- JQUERY WAYPOINT -->
    <script type="text/javascript" src="<?php echo base_url('assets/frontend/js/waypoints.min.js'); ?>"></script>
    <!-- JQUERY REVEAL -->
    <script type="text/javascript" src="<?php echo base_url('assets/frontend/js/footer-reveal.min.js'); ?>"></script>
    <!-- Owl Carousel -->
    <script type="text/javascript" src="<?php echo base_url('assets/frontend/js/owl-carousel.js'); ?>"></script>
    <!-- MOBILE MENU JS -->
    <script type="text/javascript" src="<?php echo base_url('assets/frontend/js/jquery.meanmenu.js'); ?>"></script>
    <!--Style Switcher -->
    <script src="<?php echo base_url('assets/frontend/js/color-switcher.js'); ?>"></script>
    <!-- CORE JS -->
    <script type="text/javascript" src="<?php echo base_url('assets/frontend/js/custom.js'); ?>"></script>
    <!-- RANGE SLIDER JS -->
    <script type="text/javascript" src="<?php echo base_url('assets/frontend/js/nouislider.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/frontend/js/wNumb.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/frontend/masterslider/js/masterslider.min.js'); ?>"></script>
	
	 <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDvL6_23zI-1JvUttxkt2K0KO4tfE1SiGk"></script> 
      <script type="text/javascript" src="<?php echo base_url('assets/frontend/js/map-home.js'); ?>"></script>
	    

    <script type="text/javascript">
        (function($) {
            "use strict";
            var slider = new MasterSlider();
            // adds Arrows navigation control to the slider.
            slider.control('arrows');
            slider.control('bullets');

            slider.setup('masterslider', {
                width: 1400, // slider standard width
                height: 625, // slider standard height
                space: 0,
                speed: 45,
                layout: 'fillwidth',
                loop: true,
                preload: 0,
                autoplay: true,
                view: "parallaxMask"
            });
        })(jQuery);
    </script>
    <script type="text/javascript">
        var slider = document.getElementById('keyboard');

        noUiSlider.create(slider, {
            start: 25,
            step: 10,
            connect: [true, false],
            range: {
                'min': 5,
                'max': 50
            },
            format: wNumb({
                decimals: 3,
                thousand: '.',
                prefix: ' Radius  = ',
                postfix: ' (Km) ',
            })
        });

        keyboard.noUiSlider.on('update', function(values, handle) {
            keyboardspan.innerHTML = values[handle];
        });

        var handle = slider.querySelector('.noUi-handle');

        handle.setAttribute('tabindex', 0);

        handle.addEventListener('click', function() {
            this.focus();
        });

        handle.addEventListener('keydown', function(e) {

            var value = Number(slider.noUiSlider.get());

            switch (e.which) {
                case 37:
                    slider.noUiSlider.set(value - 10);
                    break;
                case 39:
                    slider.noUiSlider.set(value + 10);
                    break;
            }
        });
    </script>
	
	
</body>



</html>