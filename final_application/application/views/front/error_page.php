
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="ScriptsBundle">
    
    <!--link rel="icon" href="images/favicon.ico" type="image/x-icon" /-->
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <!-- BOOTSTRAPE STYLESHEET CSS FILES -->
   <?php 
	$this->load->view('front/header');
	?>

<style>
.wrapper {
    min-width:100%;
    max-width: 100%;
}
#overlay {
    position: fixed;
    top: 150;
    width: 100%;
    height: 100%;
}
#overlay .wrapper {
    height: 100%;
}
</style>

<script src="<?php echo base_url(); ?>assets/autochange/jquery.min.js1"></script>
<script type="text/javascript">
    // <![CDATA[
    $(document).ready(function() {
        $('#scountry').change(function() { //any select change on the dropdown with id country trigger this code
            //	alert("dhngfdhg");
            $("#islands > option").remove(); //first of all clear select items
            var country_id = $('#scountry').val(); // here we are taking country id of the selected one.
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>front/get_island/" + country_id, //here we are calling our user controller and get_cities method with the country_id

                success: function(cities) //we're calling the response json array 'cities'
                    {
                        $.each(cities, function(id, city) //here we're doing a foeach loop round each city with id as the key and city as the value
                            {
                                var opt = $('<option />'); // here we're creating a new select option with for each city
                                opt.val(id);
                                opt.text(city);
                                $('#islands').append(opt); //here we will append these new select options to a dropdown with the id 'cities'
                            });
                    }

            });

        });
    });



    // ]]>
</script>

</head>

<body>



    <!-- mobile-menu-area-end -->
    <!-- mobile-menu-area-end -->

            <div class="container" style="margin:10% 0 0 0;">
			
                <div class="col-md-3">
				</div>
               
                <div class="col-md-6">

					<img src="<?php echo base_url(); ?>assets/frontend/nodata-found.jpg" class="img-responsive">
					<br>
            <div style="text-align:center;" >
					<button id="goback" class="btn btn-danger" onclick="goBack()"><h3>Back to Previous</h3></button><br>&nbsp;<br>&nbsp;
			</div>

<script type="text/javascript">

$(document).ready(function(){
	var x = history.length;
    if (x <= 1 ) {
		$("#goback").text("Close tab!");
	}	
});

function goBack() {
	var x = history.length;
    if (x > 1 ) {
    window.history.back();
	} else {
	window.close();
	}
}
</script>
						
                </div>
 <div class="col-md-3">
				</div>
            </div>


		
       <!--  end  Special offer -->
<!-- Owl CAROUSEL -->
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