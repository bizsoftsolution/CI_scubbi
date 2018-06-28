<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="author" content="ScriptsBundle">
		<title>Scubbi Diving Portal</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
		
		<link rel="stylesheet" href="<?php echo base_url('assets/css/datepicker.css'); ?>">
		<link rel="stylesheet" href="<?php echo base_url('assets/css/daterangepicker.css'); ?>">
		<link href='http://fonts.googleapis.com/css?family=Cookie' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="<?php echo base_url('assets/frontend/css/bootstrap.min.css'); ?>">
		<!-- JQUERY SELECT -->
		<link href="<?php echo base_url('assets/frontend/css/select2.min.css'); ?>" rel="stylesheet" />
		<!-- JQUERY MENU -->
		<link rel="stylesheet" href="<?php echo base_url('assets/frontend/css/bootstrap-dropdownhover.css'); ?>">
		<!-- ANIMATION -->
		<link rel="stylesheet" href="<?php echo base_url('assets/frontend/css/animate.min.css'); ?>">
		<!-- OWl  CAROUSEL-->
		<link rel="stylesheet" href="<?php echo base_url('assets/frontend/css/owl.carousel.css'); ?>">
		<link rel="stylesheet" href="<?php echo base_url('assets/frontend/css/owl.style.css'); ?>">
		<!-- TEMPLATE CORE CSS -->
		<link rel="stylesheet" href="<?php echo base_url('assets/frontend/css/style.css'); ?>">
		<!-- MOBILE MENU CSS -->
		<link href="<?php echo base_url('assets/frontend/css/meanmenu.min.css'); ?>" rel="stylesheet">
		<!-- FONT AWESOME -->
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/frontend/css/font-awesome.min.css'); ?>">
		<link rel="stylesheet" href="<?php echo base_url('assets/frontend/css/et-line-fonts.css'); ?>" type="text/css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/frontend/fonts/classified/flaticon.css'); ?>">
		<!--  MASTER SLIDER -->
		<link rel="stylesheet" href="<?php echo base_url('assets/frontend/masterslider/css/masterslider.css'); ?>" />
		<link href="<?php echo base_url('assets/frontend/masterslider/css/style.css'); ?>" rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="<?php echo base_url('assets/frontend/masterslider/css/layer-style.css'); ?>">
		<link href="<?php echo base_url('assets/frontend/masterslider/css/ms-staff-style.css'); ?>" rel='stylesheet' type='text/css'>
		<!-- Google Fonts -->
		<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,900%7cOpen+Sans:400,600,700" rel="stylesheet" type="text/css">
		<link href="<?php echo base_url('assets/frontend/css/nouislider.min.css'); ?>" rel="stylesheet">
		<!-- Theme Color -->
		<link rel="stylesheet" id="color" href="<?php echo base_url('assets/frontend/css/colors/defualt.css'); ?>">
		<!-- For Style Switcher -->
		<link rel="stylesheet" id="theme-color" type="text/css" href="#" />
		<!-- JavaScripts -->
		
		<script src="<?php echo base_url('assets/frontend/js/modernizr.js'); ?>"></script>
		<script type="text/javascript" src="<?php echo base_url('assets/frontend/js/jquery-3.1.1.js'); ?>"></script>
		<script type="text/javascript" src="<?php echo base_url('assets/frontend/js/owl-carousel.js'); ?>"></script>
		<!-- MOBILE MENU JS -->
		<!-- BOOTSTRAP CORE JS -->
		<script type="text/javascript" src="<?php echo base_url('assets/frontend/js/bootstrap.min.js'); ?>"></script>
		<script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap-datepicker.js'); ?>"></script>
		<!--Date picker search bar start-->
		<link href="<?php echo base_url('assets/new/css/datepicker.css1');?>" rel="stylesheet">
		<script type="text/javascript" src="<?php echo base_url('assets/new/js/bootstrap-datepicker.js1');?>"></script>
		<link href="<?php echo base_url(); ?>assets/frontend/jquery-ui.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url(); ?>assets/guidedtour_datepicter/MonthPicker.min.css" rel="stylesheet" type="text/css" />
	<script src="<?php echo base_url(); ?>assets/guidedtour_datepicter/jquery-ui.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/guidedtour_datepicter/jquery.maskedinput.min.js"></script>
	 <script src="<?php echo base_url(); ?>assets/guidedtour_datepicter/MonthPicker.min.js"></script>
	 
	 	  
		  
		 
			<script type="text/javascript" src="<?php echo base_url();?>assets/spinner/src/jquery.spinner.js"></script>
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
span.input-group-addon i {
    color: #009edf;
    font-size: 17px;
}

.login-button{
	margin-top: 5px;
}

.login-register{
	font-size: 11px;
	text-align: center;
	

}

.error{
    color: #fb0000;
    font-weight: bold;
    font-size: 16px;
   
    padding: 11px;
}
</style>
		<!--Date picker search bar end-->
		<style>
			.carousel-control {
			padding-top: 10%;
			width: 5%;
			}
			td {
			padding: 20px;
			}
			ul {
			list-style-type: none;
			}
			.fixed {
			position: relative;
			background-color: #f5f5f5;
			padding: 15px;
			color: #000;
			height: auto;
			overflow: scroll;
			height: 250px;
			}
			@media (min-width: 768px) {
			.fixed {
			position: fixed;
			background-color: #f5f5f5;
			padding: 15px;
			color: #000;
			height: auto;
			overflow: scroll;
			height: 250px;
			width: 256px;
			}
			}
			.wrapper {
    min-width:100%;
    max-width: 100%;
}
#overlay {
    position: fixed;
    top: 103;
    width: 50%;
    height: 100%;
}
#overlay .wrapper {
    height: 100%;
}

@media screen and (max-width: 480px) and (min-width: 320px) {
   #dvMap
   {
	      width: 100%!important;
	   height:auto;
   }
   #overlay
   {
	   position:relative;
	   width: 100%;
    height: 100%;
	bottom:0;
	padding:0 15px;
   }
   .nopstyle
   {
	   width:100%;
   }
   .cart_align
   {
	  width: 100%!important;
	  bottom:0;
   }
   
}
@media screen and (max-width: 1000px) and (min-width: 481px) {
   #dvMap
   {
	       width: 100%!important;
	   height:auto;
   }
   #overlay
   {
	   position:relative;
	   width: 100%;
    height: 100%;
	bottom:0;
	padding:0 15px;
   }
   .cart_align
   {
	  width: 100%!important;
	  bottom:0;
   }
   
}

@media screen and (max-width: 1000px) and (min-width: 600px) {
	#dvMap
   {
	       width: 100%!important;
	   height:auto;
   }
	.flate-search
   {
	   margin:125px 0 0 0;
		min-width:100%;
		max-width: 100%;
   }
   #wrapper {
    /* width: 800px; */
    /* margin: 0 auto; */
    color: #333;
    font-family: Tahoma,Verdana,sans-serif;
    line-height: 1.5;
    font-size: 14px;
}
#dvMap
   {
	   width:100%;
	   height:auto;
   }

			}
		</style>
		<script>
			jQuery(function($) {
  // The initial datepicker load
 // $('#datepicker').datepicker({
   // numberOfMonths: 3
 // });

 $( "#dpd1" ).datepicker({
	 showAnim:'slideDown',
	numberOfMonths:2,
	minDate:0,
	dateFormat:'dd-mm-yy',
	
	onClose: function(selectedDate){
    /* var date = jQuery(this).datepicker('getDate');
    if (date) {
        date.setDate(date.getDate() + 1);
    } */
    jQuery('#dpd2').datepicker('option', 'minDate', selectedDate);
    jQuery('#dpd2').datepicker('show');
	}
	
	
	//inline: true
});

$( "#dpd2" ).datepicker({
	showAnim:'slideDown',
	numberOfMonths:2,
	dateFormat:'dd-mm-yy',
	onClose:function(selectedDate){
	$('#dpd1').datepicker("option", "maxDate", selectedDate);
	}
	//inline: true
});

  // We're going to "debounce" the resize, to prevent the datePicker
  // from being called a thousand times.  This will help performance
  // and ensure the datepicker change is only called once (ideally)
  // when the resize is OVER
  var debounce;
  // Your window resize function
  $(window).resize(function() {
    // Clear the last timeout we set up.
    clearTimeout(debounce);
    // Your if statement
    if ($(window).width() < 768) {
      // Assign the debounce to a small timeout to "wait" until resize is over
      debounce = setTimeout(function() {
        // Here we're calling with the number of months you want - 1
        debounceDatepicker(1);
      }, 250);
    // Presumably you want it to go BACK to 2 or 3 months if big enough
    // So set up an "else" condition
    } else {
      debounce = setTimeout(function() {
        // Here we're calling with the number of months you want - 3?
        debounceDatepicker(2)
      }, 250);
    }
  // To be sure it's the right size on load, chain a "trigger" to the
  // window resize to cause the above code to run onload
  }).trigger('resize');

  // our function we call to resize the datepicker
  function debounceDatepicker(no) {
    $("#dpd1").datepicker("option", "numberOfMonths", no);
  }
  
  
  
  var debounce1;
  // Your window resize function
  $(window).resize(function() {
    // Clear the last timeout we set up.
    clearTimeout(debounce1);
    // Your if statement
    if ($(window).width() < 768) {
      // Assign the debounce to a small timeout to "wait" until resize is over
      debounce1 = setTimeout(function() {
        // Here we're calling with the number of months you want - 1
        debounceDatepicker1(1);
      }, 250);
    // Presumably you want it to go BACK to 2 or 3 months if big enough
    // So set up an "else" condition
    } else {
      debounce1 = setTimeout(function() {
        // Here we're calling with the number of months you want - 3?
        debounceDatepicker1(2)
      }, 250);
    }
  // To be sure it's the right size on load, chain a "trigger" to the
  // window resize to cause the above code to run onload
  }).trigger('resize');

  // our function we call to resize the datepicker
  function debounceDatepicker1(no) {
    $("#dpd2").datepicker("option", "numberOfMonths", no);
  }
  

});
		</script>
		
		

				

		<script type="text/javascript">
$(function() {
	
    var action;
    //$("#number-spinner button").mousedown(function () {
		$(document).on('click', '.number-spinner a', function() {
		
        btn = $(this);
        input = btn.closest('.number-spinner').find('input');
        btn.closest('.number-spinner').find('a').prop("disabled", false);
		
		 //var term = $('.inc').data('dir');
		 //alert(term);
		

    	if (btn.attr('data-dir') == 'up') {
			
			var newVal = parseInt($('.qty').val())+1;
			//alert(newVal);
			$('.qty').val(newVal);
            //alert(newVal);
			
            
    	} else {
            var newVal = parseInt($('.qty').val())-1;
			$('.qty').val(newVal);
           // alert(newVal);
    	}
    }).mouseup(function(){
        clearInterval(action);
    });
});

$(document).ready(function(){
    $('input[type="checkbox"]').click(function(){
        var inputValue = $(this).attr("value");
        $("." + inputValue).toggle();
    });
});

			$(document).ready(function() {


				$('#LeisureDive').hide();
				$('#CoursesSpecialties').hide();
				$('#PackageOffer').hide();
				$('#Review').hide();
				
				
				$(document).on('click', '#LeisureDiveTab', function() {
					$('#generalInfo').hide();
					$('#LeisureDive').show();
					$('#CoursesSpecialties').hide();
					$('#PackageOffer').hide();
					$('#Review').hide();
					$('.product_details_courses').empty();
					$('.product_details_package').empty();
					
				});
					
				$(document).on('click', '#GeneralInfoTab', function() {
					$('#generalInfo').show();
					$('#LeisureDive').hide();
					$('#CoursesSpecialties').hide();
					$('#PackageOffer').hide();
					$('#Review').hide();
					$('.product_details_courses').empty();
					$('.product_details_package').empty();
					$('.product_details').empty();
					
				});
				$(document).on('click', '#CoursesSpecialtiesTab', function() {
					$('#generalInfo').hide();
					$('#LeisureDive').hide();
					$('#CoursesSpecialties').show();
					$('#PackageOffer').hide();
					$('#Review').hide();
					
					$('.product_details_package').empty();
					$('.product_details').empty();
					
				});
				
				$(document).on('click', '#PackageOfferTab', function() {
					$('#generalInfo').hide();
					$('#LeisureDive').hide();
					$('#CoursesSpecialties').hide();
					$('#PackageOffer').show();
					$('#Review').hide();
					$('.product_details_courses').empty();
					
					$('.product_details').empty();
					
				});
				
				$(document).on('click', '#ReviewTab', function() {
					$('#generalInfo').hide();
					$('#LeisureDive').hide();
					$('#CoursesSpecialties').hide();
					$('#PackageOffer').hide();
					$('#Review').show();
					$('.product_details_courses').empty();
					$('.product_details_package').empty();
					$('.product_details').empty();
					
				});
				
				
				
				$('.expandLeisureDive').click(function() {
					var checkin = $('#dpd1').val();
					var checkout = $('#dpd2').val();
					var noofPerson = $('#noofPerson').val();
					//alert(noofPerson);
					var clicked = $(this);
					var product_id = $(this).data("productid");
					var dive_id = $(this).data("diveid");
					var table_name = $(this).data("table");
					//var quantity = 1;
					//alert(table_name);
					
					if(table_name == 'tbl_dcleisure')
					{
						 $.ajax({
							url: "<?php echo base_url(); ?>Front/fetchProductDetails",
							method: "POST",
							data: {
								product_id: product_id,
								dive_id: dive_id,
								table: table_name,
								checkin: checkin,
								checkout: checkout,
								noofPerson: noofPerson
							},
							success: function(data) {
								//alert("jdfsgj");
								$('.product_details').html(data);
								
							}
						});
					}
					else if(table_name == 'tbl_dccourses')
					{
						$.ajax({
							url: "<?php echo base_url(); ?>Front/fetchProductDetails",
							method: "POST",
							data: {
								product_id: product_id,
								dive_id: dive_id,
								table: table_name,
								checkin: checkin,
								checkout: checkout,
								noofPerson: noofPerson
							},
							success: function(data) {
								//alert("jdfsgj");
								$('.product_details_courses').html(data);
								
							}
						});
					}
					else if(table_name == 'tbl_dcpackage')
					{
						
						$.ajax({
							url: "<?php echo base_url(); ?>Front/fetchProductDetails",
							method: "POST",
							data: {
								product_id: product_id,
								dive_id: dive_id,
								table: table_name,
								checkin: checkin,
								checkout: checkout,
								noofPerson: noofPerson
							},
							success: function(data) {
								//alert("jdfsgj");
								$('.product_details_package').html(data);
								
							}
						});
					}
						
						
						
						
						
					 
				});
				//$('.addCart').click(function() {
				$(document).on('click', '.addCart', function() {
					//alert("jjhj");
					dataString = $(".cartForm").serialize();
					$.ajax({
						url: "<?php echo base_url(); ?>Front/addToCart",
						method: "POST",
						data: $('.cartForm').serialize(),
						success: function(data) {
							//alert(data);
							$('#cart_details').html(data);
							
						}
					});
				});
				$(document).on('click', '.addCart2', function() {
					//alert("jjhj");
					
					$.ajax({
						url: "<?php echo base_url(); ?>Front/addToCart",
						method: "POST",
						data: $('.cartForm2').serialize(),
						success: function(data) {
							//alert(data);
							$('#cart_details').html(data);
							
						}
					});
				});
				$(document).on('click', '.addCart1', function() {
					//alert("jjhj");
					
					$.ajax({
						url: "<?php echo base_url(); ?>Front/addToCart",
						method: "POST",
						data: $('.cartForm1').serialize(),
						success: function(data) {
							//alert(data);
							$('#cart_details').html(data);
							
						}
					});
				});
				$(document).on('click', '.removeCart1', function() {
					
					var product_id = $(this).data("pk");
					//var table = $(this).data("tbl");
					
					//var quantity = 1;
					//alert(product_id);
					 $.ajax({
						url: "<?php echo base_url(); ?>Front/removeCartDetails",
						method: "POST",
						data: {
							product_id: product_id,
						},
						success: function(data) {
							//alert("jdfsgj");
							$('#cart_details').html(data);
							
						}
					}); 
					
				});
				
				$(document).on('click', '.removeCart', function() {
					
					var product_id = $(this).data("pk");
					//var table = $(this).data("tbl");
					
					//var quantity = 1;
					//alert(product_id);
					 $.ajax({
						url: "<?php echo base_url(); ?>Front/removeCartDetails1",
						method: "POST",
						data: {
							product_id: product_id,
						},
						success: function(data) {
							//alert("jdfsgj");
							$('#cart_details').html(data);
							
						}
					}); 
					
				});
				
				
				$(document).on('click', '.remove_inventory', function() {
					var row_id = $(this).attr("id");
					if (confirm("Are you sure you want to remove this?")) {
						$.ajax({
							url: "<?php echo base_url(); ?>Front/remove",
							method: "POST",
							data: {
								row_id: row_id
							},
							success: function(data) {
								alert("Product removed from Cart");
								$('#cart_details').html(data);
							}
						});
					} else {
						return false;
					}
				});
				$(document).on('click', '#clear_cart', function() {
					if (confirm("Are you sure you want to clear cart?")) {
						$.ajax({
							url: "<?php echo base_url(); ?>Front/clear",
							success: function(data) {
								alert("Your cart has been clear...");
								$('#cart_details').html(data);
							}
						});
					} else {
						return false;
					}
				});
				$('#myCarousel').carousel({
					interval: 10000
				})
				$('#example1').gentleSelect({
					columns: 3,
					itemWidth: 100,
					title: "Select a Country",
					hideOnMouseOut: true
				});
				$('#example2').gentleSelect({
					columns: 3,
					itemWidth: 100,
					title: "Select a Island",
					hideOnMouseOut: true
				});
				var start = moment();
				var mindate = moment();
				var end = moment().add(2, 'days');
				function cb(start, end) {
					$('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
				}
				$('input[name="daterange"]').daterangepicker({
					startDate: start,
					endDate: end,
					minDate: mindate,
					locale: {
						format: 'DD-MM-YYYY'
					}
				});
				
			
				
			});
		</script>
	</head>
	<style>
		.optionservice tr>td
		{
			padding : 5px;
		}
		
	</style>
	<body>
		<header class="index4-header">
			<a class="navbar-brand visible-xs" id="navbar-logo-mobile" href=""><img src="<?php echo base_url(); ?>assets/images/logo-new-chrcle-small.jpg" alt="" class="img-responsive"></a>
			<a href="" class=" visible-xs " style=" font: 400 30px/0.8 'Cookie', Helvetica, sans-serif; padding:30px 15px;">Connecting Drivers Globally </a>
			<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
				<div class="container-fluid" style="padding-right: 37px!important;">
					<div class="navbar-header col-md-2">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" id="navbar-logo" href="<?php echo base_url(); ?>">
						<img src="<?php echo base_url(); ?>assets/images/logo-new-chrcle-small.jpg" alt="" class="img-responsive"></a>
					</div>
					<div class="col-md-5" style="padding:17px 15px">
						<div class="text-center1" style="padding-top:25px;font-weight:20px;">
							<b style="font-size:18px;">
								<?php
								foreach ($divecenterpage as $countryIsland)
								{
									$query = $this->db->get_where('tbl_country', array('country_id' => $countryIsland->dccountry));
									foreach ($query->result_array() as $row2)
									{
										echo $row2['country_name'] . " > ";
									}
									$query1 = $this->db->get_where('tbl_island', array('island_id' => $countryIsland->dcislands));
									foreach ($query1->result_array() as $row3)
									{
										echo $row3['island_name'];
									}
								}
								?>
							</b>
						<span style="float:right;">
							<form class="form-inline">
								<div class="form-group">
									<select id='' class="form-control">
										<option value="1">MYR</option>
										<option value="2">AFN</option>
										<option value="3">ARS</option>
										<option value="4">BRL</option>
										<option value="5">EUR</option>
										<option value="6">JPY</option>
										<option value="7">KES</option>
										<option value="8">KPW</option>
										<option value="9">KRW</option>	
									</select> 
								</div>	
								<div class="form-group">
									<select id='' class="form-control">
										<option value="1">English</option>
										<option value="2">Chinese</option>
										<option value="3">Spanish</option>
										<option value="4">Hindi</option>
										<option value="5">Arabic</option>
										<option value="6">Portuguese</option>
										<option value="7">Bengali</option>
										<option value="8">Russian</option>
										<option value="9">Japanese</option>	
									</select> 
								</div>	
							</form>
						</span>
						</div>
					</div>
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" data-hover="dropdown" data-animations="fadeInDown fadeInRight fadeInUp fadeInLeft">
						<?php 
						if($this->session->userdata('user_id')!='')
						{
							if($this->session->userdata('user_type') == 'Customer')
							{
							?>
								<ul class="nav navbar-nav navbar-right" id="menu-right">
									<li>
										<a href="<?php echo base_url('Front/becomeapartner');?>">Become a Partner </a>
									</li>
									<li>
										<a href="">Help</a>
									</li>
									<li class="dropdown">
									<?php
										$u_id = $this->session->userdata('user_id');
										$data1=$this->db->get_where('tbl_customerprofile', array('user_id'=>$u_id))->result();
										foreach ($data1 as $a1) 
										{
										if($a1->photo != NULL)
										{
							?>
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" style="padding: 0px 0px;border-radius:50%">
							<img src="<?php echo base_url();?>upload/customerprofile/<?php echo $a1->photo; ?>" style="width:50px;height:50px;" class="profile-image img-circle"> <!--Username <b class="caret"></b--></a>
							<?php 
							}
							else
							{
								?>
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" style="padding: 0px 0px;border-radius:50%">
							<img src="<?php echo base_url();?>upload/customerprofile/user.png" style="width:50px;height:50px;" class="profile-image img-circle"> <!--Username <b class="caret"></b--></a>
								<?php
							}
										}
										?>
										<ul class="dropdown-menu">
											<li><a href="<?php echo base_url('Customer/customerDashboard'); ?>"><i class="fa fa-home"></i> My Dashboard</a></li>
											<li class="divider"></li>
											<li><a href="<?php echo base_url('Customer/customerProfile'); ?>"> Profile</a></li>
											<li class="divider"></li>
											<li><a href="<?php echo base_url('Customer/customerMydiveTrips'); ?>"> My Dive Trips</a></li>
											<li class="divider"></li>
											<li><a href="<?php echo base_url('Customer/customerDashboard'); ?>"> My Message</a></li>
											<li class="divider"></li>
											<li><a href="<?php echo base_url('Customer/myCart'); ?>"> My Cart</a></li>
											<li class="divider"></li>
											<li><a href="<?php echo base_url('Customer/customerDashboard'); ?>"> Dive Credits</a></li>
											<li class="divider"></li>
											<li><a href="<?php echo base_url('Customer/logout'); ?>"> Sign out</a></li>
											<li class="divider"></li>
										</ul>
									</li>
								</ul>
							<?php 
							}
							else
							{
							?>
								<ul class="nav navbar-nav navbar-right" id="menu-right">
									<li>
									<a href="<?php echo base_url('Front/becomeapartner');?>">Become a Partner </a>
									</li>
									<li>
									<a href="">Help</a>
									</li>
									<li><a href="#" data-toggle="modal" data-target=".register-model"> Sign Up</a></li>
					<li><a href="#" data-toggle="modal" data-target=".login-model"> Login</a></li>
								</ul>
							<?php
							}
						}
						else
						{
						?>
							<ul class="nav navbar-nav navbar-right" id="menu-right">
								<li>
									<a href="<?php echo base_url('Front/becomeapartner');?>">Become a Partner </a>
								</li>
								<li>
									<a href="">Help</a>
								</li>
								<li><a href="#" data-toggle="modal" data-target=".register-model"> Sign Up</a></li>
					<li><a href="#" data-toggle="modal" data-target=".login-model"> Login</a></li>
							</ul>
						<?php
						}
						?>
					</div>
				</div>
				<div class="separator"></div>
			</nav>
		</header>
		<div class="container-fluid" >
			<div class="row">
				<div class="col-md-8" style="margin: 108px 0 0 0;" >
				<?php
					foreach ($divecenterpage as $divecenterval)
					{
					?>
						<div class="col-md-12">
							<div class="featured-slider">
								<?php
								$carouseldive = $divecenterval->user_id;
								$data124 = $this->db->get_where('tbl_gallery', array('user_id' => $carouseldive))->result();
								foreach ($data124 as $cval24)
								{
								?>
									<div class="item">
										<div class="papular-reviews">
											<a href="#">
												<div class="image">
													<img alt="Tour Package" src="<?php echo base_url(); ?>upload/DCprofile/gallery/<?php echo $cval24->gallery; ?>" class="img-responsive" >
													
												</div>
											</a>
										</div>
									</div>
								<?php
								} ?>
							</div>
						</div>
						<div class="col-md-12">&nbsp;</div>
						<!-- LOGIN MODEL  -->
						<?php 
						$this->db->where('customer_id',$this->session->user_id);
						$this->db->where('dc_id',$divecenterval->user_id);
				$custid = $this->session->userdata('user_id');
				$dcid = $divecenterval->user_id;
				$crows = $this->db->get_where('tbl_conversation', array('customer_id'=>$custid,'dc_id'=>$dcid))->result();
				if (count($crows) > 0 ) {
					$crow = $crows[0];
					$tid = $crow->thread_id;
				} else {
					$tid = 0;
				}
								   

?>
						<div class="modal fade login-model5" id="login-model5" tabindex="-1" role="dialog">
							 <div class="modal-dialog modal-lg" role="document">
								<div class="modal-content">
								   <div class="login-logo">
									  <h2>Contact Dive Center</h2>
									  
								   </div>
								   
								   <div class="login-box-inner">
										<div class="row">
			   <?php
					if($this->session->userdata('user_id') != null)
					{ 
													$data = $this->db->get_where('tbl_dcprofile', array('user_id'=>$dcid))->result();
											foreach($data as $row1)
											{
										 ?>
							
               	  <div class="col-md-4 col-sm-12 col-xs-12 ">
                     <div class="main-box profile-box-contact">
                     	<div class="col-md-12 col-sm-12 col-xs-12 nopadding">
                            <div class="profile-box-header blue-bg">
                                <div class="col-md-12 col-sm-7 col-xs-12">
                                   <img src="<?php echo base_url(); ?>/upload/DCprofile/<?php echo $row1->dcimage;?>" alt="" class="profile-img img-responsive" />
                                   <h2><?php echo $row1->dcname; ?></h2>
                                   <ul class="contact-details">
                                      <li>
									   <?php

									$island = $this->db->get_where('tbl_island', array('island_id'=>$row1->dcislands))->result();
											foreach($island as $island1)
											{
										 ?>
							
                                         <i class="fa fa-map-marker"></i><?php echo $island1->island_name;?>
										 <?php
										 
											}
											?>
                                      </li>
                                      <li>
                                         <i class="fa fa-envelope"></i> <?php echo $row1->dcemailid;?>
                                      </li>
                                      <li>
                                         <i class="fa fa-phone"></i> <?php echo $row1->dctelephone_no;?>
                                      </li>
                                   </ul>
                               </div>
                              
                            </div>
                        </div>
                        
                     </div>
                  </div>
				  <?php
											}
										//	}
					
				  ?>
                  <div class="col-md-8 col-sm-8 col-xs-12 ">
                     <div class="dashboard-main-disc">
                        <div class="heading-inner">
                           <p class="title">Send message to Dive Center</p>
                        </div>
                     
                        <div class="">
                           <ul class="followers">
						  <form action="<?php echo base_url(); ?>Front/divecenterPopup" method="POST">
								<div class="form-group">
									<input type="hidden" value="<?php echo $dcid; ?>" name="dcid_popup"/>
									<input type="hidden" value="<?php echo $row1->dcname; ?>" name="dcfrom_popup"/>
									<textarea cols="6" rows="8" placeholder="" name="messages_popup" class="form-control"></textarea>
								 </div>
								 <div class="col-md-12 col-sm-12" style="background-color: #48f5e2;padding: 11px;">
									<input type="submit" class="btn  pull-right" value="Send Message" name="submit_new_chat"/>
								 </div>
							  </form>
                           </ul>
						   
                        </div>
                     </div>
                  </div>
<?php				
				}
					else
					{?>
				<br>
				<br>
				<br>
				<br>
						<h1 style="text-align:center;">Please Login to Send Message</h1>
						<br>
				<br>
				<br>
				<br>
				  <?php
				  }
				  ?>
               </div>
								   </div>
								  
								</div>
							 </div>
						  </div>
						<div class="row1">
							<?php
							//$date = new DateTime(str_replace("-","/",$sDate));
							//$newStart = $date->format('d-m-Y');
							//$date1 = new DateTime(str_replace("/","-",$eDate));
							//$newEnd = $date1->format('d-m-Y');
							?>
							<div class="container1" >
								<div class="row1">
									<div class="col-md-12">
										<form class="form-inline" role="form" action="<?php echo base_url(); ?>Front/divecenter_search" method="POST">
										<div class="form-group col-md-2" style="padding: 5px 0px;">
											<span style="font-size:14px;font-family: serif;"><b><?php echo $divecenterval->dcname; ?></b></span>
										</div>
										<div class="form-group col-md-3" style="    padding: 0px;">
											<div class="input-group" >
													<input type="number" name="no_of_persons" value="<?php echo $no_of_persons; ?>" min="1" class="form-control" style="height: 50px;" id="noofPerson"/>
													<span class="input-group-addon">No. of Person</span>
												</div>
										</div>
										<div class="form-group col-md-2" style="    padding: 0px;">
											 
												<input type="text" id="dpd1" class="form-control" style="height: 50px;width: 100%;" name="checkin" value="<?php echo $sDate; ?>">						 

														
											</div>
											<div class="form-group col-md-2" style="    padding: 0px;">

													<input type="text" id="dpd2" class="form-control" style="height: 50px;width: 100%;" name="checkout" value="<?php echo $eDate; ?>">
													<input type="hidden" name="diveid" value="<?php echo $d_id; ?>">

												</div>	
										
											<div class="">
											
												
											
																							
												<div class=""><div class="form-group col-md-3" style="    padding: 0px;">
												<input type="submit" class="btn btn-danger" value="Search" name="dive_search" style="height: 38px;padding: 0px 6px;">

						
								
								<!--a href="<?php echo base_url();?>Front/contactDiveCenter/<?php echo $dcid; ?>" class="btn btn-success" target="_blank"  style="height: 38px;    padding: 8px 5px;">Contact Dive Center</a-->
							
					<a href="#" data-toggle="modal" data-target=".login-model5" class="btn btn-success" style="height: 38px;    padding: 8px 5px;">Contact Dive Center </a>

						
												
												
												
												<!--a href="" class="btn btn-success" style="height: 50px;line-height:35px;">Contact Dive Center </a-->
											</div></div>
												
											</div>
											
											
											
											
										</form>
									</div>
								</div>
							</div>
						</div>
						<br>
						<div class="separator"></div>
						
<!--------------------------------Tab Content Starts-------------------------------------------------------------------->
						<style>
							section.dashboard-menu-2 .dashboard-menu-container ul li.active .menue-name {
								background-color: #ccc;
								color: #000;
							}
							.dashboard-menu-container ul li {
								 border-top: 1px solid #ccc;
								 border-right: 1px solid #ccc;
								display: block;
								float: left;
								text-align: center;
								width: 20%;
								 
							}
							.dashboard-menu-container ul li .menue-name {
								
								text-transform: capitalize;
							}
							.dashboard-menu-container {
								padding: 20px 0;
								background-color: #fff;
								box-shadow: None; 
								position: relative;
								overflow: hidden;
								border-bottom: 3px solid #ccc;
							}

						</style>
						
<!--------------------------------General Info Tab Starts-------------------------------------------------------------------->	


						<div class="generalInfo" id="generalInfo">
							<div class="col-md-12">
								 <section class="dashboard-menu dashboard-menu-2 " style="border-top: none;padding: 15px 0px 0px 0px">
									<div class="container" style="width:100%;padding:0px;">
									   <div class="row">
										  <div class="">
											 <div class="dashboard-menu-container" style="">
												<ul>
												   <li class="active" id="GeneralInfoTab">
													  
														 <div class="menue-name"> General Info </div>
													  
												   </li>
												   <li id="LeisureDiveTab">
													  
														 <div class="menue-name">Leisure Dive </div>
													 
												   </li>
												   <li id="CoursesSpecialtiesTab">
													  
														 <div class="menue-name">Courses & Specialties</div>
													 
												   </li>
												   <li id="PackageOfferTab">
													  
														 <div class="menue-name">Package Offers</div>
													  
												   </li>
												   <li id="ReviewTab">
													  
														 <div class="menue-name">Review</div>
													  
												   </li>
												</ul>
											 </div>
										  </div>
									   </div>
									</div>
								 </section>
								 <section style="border:2px solid #ccc;padding:10px;margin:0px -15px;">
									<div class="row" style="padding-bottom: 8%;">
										<div class="col-md-4">
											<img src="<?php echo base_url(); ?>upload/DCprofile/<?php echo $divecenterval->dcimage; ?>" class="img-responsive" style="width:100%;height:150px;" />
										</div>
										<div class="col-md-8" style="text-align: justify;font-family: initial;font-size: 17px;LINE-HEIGHT: 1.8;word-spacing: 1px;">
											<?php echo $divecenterval->dcdescription; ?>
										</div>
									</div>
									<div class="row">
										<table class="table" style="text-align: justify;font-family: initial;font-size: 15px;LINE-HEIGHT: 1.8;word-spacing: 1px;">
											<tr>
												<td>Address</td>
												<td>
												<?php echo $divecenterval->dcaddress; ?></td>
											</tr>
											<tr>
												<td>Affiliation</td>
												<td><?php echo $divecenterval->dcaffiliation_padi.', '; ?><?php echo str_replace(',', ', ', $divecenterval->dcaffiliation); ?></td>
											</tr>
											<tr>
												<td>Membership</td>
												<td>
												<?php 
													$hpa="";
													if($divecenterval->hundredpercentage_aware != NULL)
													{
														$hpa = "100% AWARE".", ";
													}
													$gsa="";
													if($divecenterval->green_star_award != NULL)
													{
														$gsa = "GREEN STAR AWARD".", ";
													}
													$ngc="";
													if($divecenterval->national_geographic_center != NULL)
													{
														$ngc = "NATIONAL GEOGRAPHIC CENTER".", ";
													}
													$pfcc="";
													if($divecenterval->padi_five_cdc_center != NULL)
													{
														$pfcc = "PADI 5* CDC CENTER".", ";
													}
													$pfdr="";
													if($divecenterval->padi_five_dive_resort != NULL)
													{
														$pfdr = "PADI 5* DIVE RESORT".", ";
													}
													$pfdc="";
													if($divecenterval->padi_five_dive_center != NULL)
													{
														$pfdc = "PADI 5* DIVE CENTER".", ";
													}
													$pfidc="";
													if($divecenterval->padi_five_instructor_development_center != NULL)
													{
														$pfidc = "PADI 5* INSTRUCTOR DEVELOPMENT CENTER".", ";
													}
													$pdc="";
													if($divecenterval->padi_dive_center != NULL)
													{
														$pdc = "PADI DIVE CENTER".", ";
													}
													$pfidr="";
													if($divecenterval->padi_five_instructor_development_resort != NULL)
													{
														$pfidr = "PADI 5* INSTRUCTOR DEVELOPMENT RESORT".", ";
													}
													$pdr="";
													if($divecenterval->padi_dive_resort != NULL)
													{
														$pdr = "PADI DIVE RESORT".", ";
													}
													$ptc="";
													if($divecenterval->padi_tecrec_center != NULL)
													{
														$ptc = "PADI TECREC CENTER".", ";
													}
													
													
													echo $hpa.$gsa.$ngc.$pfcc.$pfdr.$pfdc.$pfidc.$pdc.$pfidr.$pdr.$ptc;
												?>
												
												
												</td>
											</tr>
											<tr>
												<td>Languages</td>
												<td style="text-transform:capitalize">
												<?php echo ucfirst(strtolower(str_replace(',', ', ', $divecenterval->dclanguage))); ?>
												</td>
											</tr>
											<tr>
												<td>Infrastructure</td>
												<td style="text-transform:capitalize">
												<?php echo ucfirst(strtolower(str_replace(',', ' | ', $divecenterval->dcfacilities))); ?>
												</td>
											</tr>
										</table>
									</div>
								 </section>
							</div>
						</div>
<!--------------------------------General Info Tab Ends------------------------------------------------------------------->
<!--------------------------------Leisure Dive Tab Starts-------------------------------------------------------------------->	
						<div class="LeisureDive" id="LeisureDive">
							<div class="col-md-12">
								 <section class="dashboard-menu dashboard-menu-2 " style="border-top: none;padding: 15px 0px 0px 0px">
									<div class="container" style="width:100%;padding:0px;">
									   <div class="row">
										  <div class="">
											 <div class="dashboard-menu-container" style="">
												<ul>
												   <li  id="GeneralInfoTab">
													
														 <div class="menue-name"> General Info </div>
													
												   </li >
												   <li class="active" id="LeisureDiveTab">
													  
														 <div class="menue-name">Leisure Dive </div>
													 
												   </li>
												   <li id="CoursesSpecialtiesTab">
													 
														 <div class="menue-name">Courses & Specialties</div>
													 
												   </li>
												   <li id="PackageOfferTab">
													 
														 <div class="menue-name">Package Offers</div>
													  
												   </li>
												   <li id="ReviewTab">
													  
														 <div class="menue-name">Review</div>
													  
												   </li>
												</ul>
											 </div>
										  </div>
									   </div>
									</div>
								 </section>
								 <section style="border:2px solid #ccc;margin:0px -15px;">
								<?php
										$lesuiredive = $divecenterval->user_id;
										$data121 = $this->db->get_where('tbl_dcleisure', array('user_id' => $lesuiredive, 'product_status' => 'AVAILABLE'))->result();
										$no_of_rows = count($data121);
										if($no_of_rows < 3)
										{
											foreach ($data121 as $cval21)
												{
													
													$date1 = strtotime($sDate);
													$date2 = strtotime($eDate);
													$datediff = $date2 - $date1;
													$days_between = floor($datediff / (60 * 60 * 24));
													$maxdive_day = $cval21->max_dive_day;
													$product_max_day = $cval21->product_max_day;
													$dd=0;
													?>
														<div class="row1" style="padding-bottom: 15px; border-bottom:1px solid #ccc; padding-top:20px; ">
															<button type="button" name="add_cart" class="expandLeisureDive"  data-productid="<?php echo $cval21->id; ?>" data-table="tbl_dcleisure" data-diveid="<?php echo $lesuiredive; ?>"  style="background-color: #fff;border: none;width: 100%;"/>
																<a href="">
																<div class="col-md-4" style="text-align: left;">
																	<a class="col-md-offset-2" data-toggle="collapse" data-parent="#accordion" href="#<?php echo $cval21->id; ?>" > <?php echo $cval21->product_name; ?>&nbsp;&nbsp;
																	<i class="fa fa-sort-desc"></i></a>
																</div>
																
																<?php
																if($product_max_day == 'No Limit'){
																?>
																<div class="col-md-4">
																	<a class="col-md-offset-2" data-toggle="collapse" data-parent="#accordion" href="#<?php echo $cval21->id; ?>" style="color:#00db00;font-weight:bold;">AVAILABLE</a>
																</div>
																<?php 
																}
																else
																{
																	
																	$date1 = strtotime($sDate);
																	$date2 = strtotime($eDate);
																	$datediff = $date2 - $date1;
																	$days_between = floor($datediff / (60 * 60 * 24));
																			
																	//echo $days_between;		
																	$checkin1 = $date1;
																	$checkin1 = strtotime($checkin1);
																	$slt_value =0;
																	for($i=1;$i<=$days_between;$i++)
																	{
																		//echo "hiii";															
																		//---------------------------Dive --------------------------
																			$checkin1 = strtotime("+1 day", $checkin1);
																			$newCheckin = date('Y-m-d', $checkin1);
																			
																			//$avalabile=$this->front_model->checkAvalability($newCheckin,'tbl_dcleisure',$lesuiredive,$cval21->id);
		//Check Availability--------------------------------------------------------------------------																	
																			 $this->db->from('tbl_booking_availability');
																			 $this->db->where('bookeddate',$newCheckin);
																			 $this->db->where('table_name','tbl_dcleisure');
																			 $this->db->where('user_id',$lesuiredive);
																			 $this->db->where('product_id',$cval21->id);
																			 $query = $this->db->get();
																			 $avalabile = $query->result();

					//------------------------------------------
																		 if ($query->num_rows() == 0) 
																			{
																				
																				$dd=1;

																			}
																			else 
																			{
																				foreach($avalabile as $rowAvalable)
																				{
																					 $booked_dive = $rowAvalable->booked_dives;	
																					 $max_dive_day = $row->product_max_day;
																					 $per_day_dive = $row->max_dive_day;
																					 $check_ava = $max_dive_day - $booked_dive;
																					 
																					 if($check_ava >= $per_day_dive)
																					 {
																						
																					 } 
																					 else{
																						 $dd=1;
																					 }
																				}
																			}

																	}
																	if($dd==1)
																	{
																	
																?>
																<div class="col-md-4">
																	<a class="col-md-offset-2" data-toggle="collapse" data-parent="#accordion" href="#<?php echo $cval21->id; ?>" style="color:#00db00;font-weight:bold;">AVAILABLE</a>
																</div>
																<?php
																	}
																	else{?>
																	<div class="col-md-4">
																	<a class="col-md-offset-2" data-toggle="collapse" data-parent="#accordion" href="#<?php echo $cval21->id; ?>" style="color:red;font-weight:bold;">UNAVAILABLE</a>
																</div>	
																	
																	<?php
																	}
																}
																?>
																<div class="col-md-4">
																	<a class="col-md-offset-2" data-toggle="collapse" data-parent="#accordion" href="#<?php echo $cval21->id; ?>"><b><?php echo ucwords(strtoupper($divecenterval->dccurrency));?>&nbsp;&nbsp;<?php echo $cval21->product_price; ?></b>&nbsp;&nbsp;Per&nbsp;&nbsp;<?php echo $cval21->product_unit;?></a>
																</div>
																</a>
															</button>
														</div>
															
															
															
															
															
														
												<?php
											
												}
												?>
												<div class="product_details"></div>
												<?php 
										}
// --------------------if the product details is greater than 6 ---- end ---/>						
										else
										{		
												$li=1;
												foreach ($data121 as $cval21)
												{
													
													$date1 = strtotime($sDate);
													$date2 = strtotime($eDate);
													$datediff = $date2 - $date1;
													$days_between = floor($datediff / (60 * 60 * 24));
													$maxdive_day = $cval21->max_dive_day;
													$product_max_day = $cval21->product_max_day;
													$dd=0;
													?>
														<div class="row1" style="padding-bottom: 15px; border-bottom:1px solid #ccc; padding-top:20px; ">
															<button type="button" name="add_cart" class="expandLeisureDive"  data-productid="<?php echo $cval21->id; ?>" data-table="tbl_dcleisure" data-diveid="<?php echo $lesuiredive; ?>"  style="background-color: #fff;border: none;width: 100%;"/>
																<a href="">
																<div class="col-md-4" style="text-align: left;">
																	<a class="col-md-offset-2" data-toggle="collapse" data-parent="#accordion" href="#<?php echo $cval21->id; ?>" > <?php echo $cval21->product_name; ?>&nbsp;&nbsp;
																	<i class="fa fa-sort-desc"></i></a>
																</div>
																
																<?php
																if($product_max_day == 'No Limit'){
																?>
																<div class="col-md-4">
																	<a class="col-md-offset-2" data-toggle="collapse" data-parent="#accordion" href="#<?php echo $cval21->id; ?>" style="color:#00db00;font-weight:bold;">AVAILABLE</a>
																</div>
																<?php 
																}
																else
																{
																	
																	$date1 = strtotime($sDate);
																	$date2 = strtotime($eDate);
																	$datediff = $date2 - $date1;
																	$days_between = floor($datediff / (60 * 60 * 24));
																			
																	//echo $days_between;		
																	$checkin1 = $date1;
																	$checkin1 = strtotime($checkin1);
																	$slt_value =0;
																	for($i=1;$i<=$days_between;$i++)
																	{
																		//echo "hiii";															
																		//---------------------------Dive --------------------------
																			$checkin1 = strtotime("+1 day", $checkin1);
																			$newCheckin = date('Y-m-d', $checkin1);
																			
																			//$avalabile=$this->front_model->checkAvalability($newCheckin,'tbl_dcleisure',$lesuiredive,$cval21->id);
		//Check Availability--------------------------------------------------------------------------																	
																			 $this->db->from('tbl_booking_availability');
																			 $this->db->where('bookeddate',$newCheckin);
																			 $this->db->where('table_name','tbl_dcleisure');
																			 $this->db->where('user_id',$lesuiredive);
																			 $this->db->where('product_id',$cval21->id);
																			 $query = $this->db->get();
																			 $avalabile = $query->result();

					//------------------------------------------
																		 if ($query->num_rows() == 0) 
																			{
																				
																				$dd=1;

																			}
																			else 
																			{
																				foreach($avalabile as $rowAvalable)
																				{
																					 $booked_dive = $rowAvalable->booked_dives;	
																					 $max_dive_day = $row->product_max_day;
																					 $per_day_dive = $row->max_dive_day;
																					 $check_ava = $max_dive_day - $booked_dive;
																					 
																					 if($check_ava >= $per_day_dive)
																					 {
																						
																					 } 
																					 else{
																						 $dd=1;
																					 }
																				}
																			}

																	}
																	if($dd==1)
																	{
																	
																?>
																<div class="col-md-4">
																	<a class="col-md-offset-2" data-toggle="collapse" data-parent="#accordion" href="#<?php echo $cval21->id; ?>" style="color:#00db00;font-weight:bold;">AVAILABLE</a>
																</div>
																<?php
																	}
																	else{?>
																	<div class="col-md-4">
																	<a class="col-md-offset-2" data-toggle="collapse" data-parent="#accordion" href="#<?php echo $cval21->id; ?>" style="color:red;font-weight:bold;">UNAVAILABLE</a>
																</div>	
																	
																	<?php
																	}
																}
																?>
																<div class="col-md-4">
																	<a class="col-md-offset-2" data-toggle="collapse" data-parent="#accordion" href="#<?php echo $cval21->id; ?>"><b><?php echo ucwords(strtoupper($divecenterval->dccurrency));?>&nbsp;&nbsp;<?php echo $cval21->product_price; ?></b>&nbsp;&nbsp;Per&nbsp;&nbsp;<?php echo $cval21->product_unit;?></a>
																</div>
																</a>
															</button>
														</div>
															
															
															<?php
															if($li == 3)
															{
																?>
																<div class="product_details"></div>
																<?php
															}
?>															
														
												<?php
												$li++;
												}
												?>
												
												
										<?php
										}
// --------------------if the product details is greater than 6 ---- end ---/>										
											?>
										
								 </section>
							</div>
						</div>
<!--------------------------------Leisure Dive Tab Ends------------------------------------------------------------------->
						
<!--------------------------------Courses And Specialties Dive Tab Ends---------------------------------------------------->
						<div class="CoursesSpecialties" id="CoursesSpecialties">
							<div class="col-md-12">
								 <section class="dashboard-menu dashboard-menu-2 " style="border-top: none;padding: 15px 0px 0px 0px">
									<div class="container" style="width:100%;padding:0px;">
									   <div class="row">
										  <div class="">
											 <div class="dashboard-menu-container" style="">
												<ul>
												   <li  id="GeneralInfoTab">
													
														 <div class="menue-name"> General Info </div>
													
												   </li >
												   <li  id="LeisureDiveTab">
													  
														 <div class="menue-name">Leisure Dive </div>
													 
												   </li>
												   <li id="CoursesSpecialtiesTab" class="active">
													 
														 <div class="menue-name">Courses & Specialties</div>
													 
												   </li>
												   <li id="PackageOfferTab">
													 
														 <div class="menue-name">Package Offers</div>
													  
												   </li>
												   <li id="ReviewTab">
													  
														 <div class="menue-name">Review</div>
													  
												   </li>
												</ul>
											 </div>
										  </div>
									   </div>
									</div>
								 </section>
								 <section style="border:2px solid #ccc;margin:0px -15px;">
								<?php
										$lesuiredive = $divecenterval->user_id;
										$data121 = $this->db->get_where('tbl_dccourses', array('user_id' => $lesuiredive, 'product_status' => 'AVAILABLE'))->result();
										$no_of_rows = count($data121);
										if($no_of_rows < 3)
										{
												foreach ($data121 as $cval21)
												{
													$date1 = strtotime($sDate);
													$date2 = strtotime($eDate);
													$datediff = $date2 - $date1;
													$days_between = floor($datediff / (60 * 60 * 24));
													$maxdive_day = $cval21->max_dive_day;
													$product_max_day = $cval21->product_max_day;
													$dd=0;
													?>
														<div class="row1" style="padding-bottom: 15px; border-bottom:1px solid #ccc; padding-top:20px; ">
															<button type="button" name="add_cart" class="expandLeisureDive"  data-productid="<?php echo $cval21->id; ?>" data-table="tbl_dccourses" data-diveid="<?php echo $lesuiredive; ?>"  style="background-color: #fff;border: none;width: 100%;"/>
																<a href="">
																<div class="col-md-4" style="text-align: left;">
																	<a class="col-md-offset-2" data-toggle="collapse" data-parent="#accordion" href="#<?php echo $cval21->id; ?>" > <?php echo $cval21->product_name; ?>&nbsp;&nbsp;
																	<i class="fa fa-sort-desc"></i></a>
																</div>
																
																<?php
																if($product_max_day == 'No Limit'){
																?>
																<div class="col-md-4">
																	<a class="col-md-offset-2" data-toggle="collapse" data-parent="#accordion" href="#<?php echo $cval21->id; ?>" style="color:#00db00;font-weight:bold;">AVAILABLE</a>
																</div>
																<?php 
																}
																else
																{
																	$date1 = strtotime($sDate);
													$date2 = strtotime($eDate);
																	$datediff = $date2 - $date1;
																	$days_between = floor($datediff / (60 * 60 * 24));
																			
																	//echo $days_between;		
																	$checkin1 = $date1;
																	$checkin1 = strtotime($checkin1);
																	$slt_value =0;
																	for($i=1;$i<=$days_between;$i++)
																	{
																			$newCheckin = date('Y-m-d', $checkin1);														
				//---------------------------Dive --------------------------
																			
		//Check Availability--------------------------------------------------------------------------																	
																			 $this->db->from('tbl_booking_availability');
																			 $this->db->where('bookeddate',$newCheckin);
																			 $this->db->where('table_name','tbl_dccourses');
																			 $this->db->where('user_id',$lesuiredive);
																			 $this->db->where('product_id',$cval21->id);
																			 $query = $this->db->get();
																			 $avalabile = $query->result();

					//------------------------------------------

																			if ($query->num_rows() == 0) 
																			{
																				
																				$dd=1;

																			}
																			else 
																			{
																				foreach($avalabile as $rowAvalable)
																				{
																					 $booked_dive = $rowAvalable->booked_dives;	
																					 $max_dive_day = $row->product_max_day;
																					 $per_day_dive = $row->max_dive_day;
																					 $check_ava = $max_dive_day - $booked_dive;
																					 
																					 if($check_ava >= $per_day_dive)
																					 {
																						
																					 } 
																					 else{
																						 $dd=1;
																					 }
																				}
																			}
																			$checkin1 = strtotime("+1 day", $checkin1);
																			
																			

																	}
																	if($dd==1)
																	{
																	
																?>
																<div class="col-md-4">
																	<a class="col-md-offset-2" data-toggle="collapse" data-parent="#accordion" href="#<?php echo $cval21->id; ?>" style="color:#00db00;font-weight:bold;">AVAILABLE</a>
																</div>
																<?php
																	}
																	else{?>
																	<div class="col-md-4">
																	<a class="col-md-offset-2" data-toggle="collapse" data-parent="#accordion" href="#<?php echo $cval21->id; ?>" style="color:red;font-weight:bold;">UNAVAILABLE</a>
																</div>	
																	
																	<?php
																	}
																}
																?>
																<div class="col-md-4">
																	<a class="col-md-offset-2" data-toggle="collapse" data-parent="#accordion" href="#<?php echo $cval21->id; ?>"><b><?php echo ucwords(strtoupper($divecenterval->dccurrency));?>&nbsp;&nbsp;<?php echo $cval21->product_normal_rate; ?></b>&nbsp;&nbsp;Per&nbsp;&nbsp;<?php echo $cval21->product_unit;?></a>
																</div>
																</a>
															</button>
														</div>
															
															
															
															
															
														
												<?php
												}
												?>
												<div class="product_details_courses"></div>
										<?php
										}
										else
										{
											$ci=1;
												foreach ($data121 as $cval21)
												{
													$date1 = strtotime($sDate);
													$date2 = strtotime($eDate);
													$datediff = $date2 - $date1;
													$days_between = floor($datediff / (60 * 60 * 24));
													$maxdive_day = $cval21->max_dive_day;
													$product_max_day = $cval21->product_max_day;
													$dd=0;
													?>
														<div class="row1" style="padding-bottom: 15px; border-bottom:1px solid #ccc; padding-top:20px; ">
															<button type="button" name="add_cart" class="expandLeisureDive"  data-productid="<?php echo $cval21->id; ?>" data-table="tbl_dccourses" data-diveid="<?php echo $lesuiredive; ?>"  style="background-color: #fff;border: none;width: 100%;"/>
																<a href="">
																<div class="col-md-4" style="text-align: left;">
																	<a class="col-md-offset-2" data-toggle="collapse" data-parent="#accordion" href="#<?php echo $cval21->id; ?>" > <?php echo $cval21->product_name; ?>&nbsp;&nbsp;
																	<i class="fa fa-sort-desc"></i></a>
																</div>
																
																<?php
																if($product_max_day == 'No Limit'){
																?>
																<div class="col-md-4">
																	<a class="col-md-offset-2" data-toggle="collapse" data-parent="#accordion" href="#<?php echo $cval21->id; ?>" style="color:#00db00;font-weight:bold;">AVAILABLE</a>
																</div>
																<?php 
																}
																else
																{
																	$date1 = strtotime($sDate);
													$date2 = strtotime($eDate);
																	$datediff = $date2 - $date1;
																	$days_between = floor($datediff / (60 * 60 * 24));
																			
																	//echo $days_between;		
																	$checkin1 = $date1;
																	$checkin1 = strtotime($checkin1);
																	$slt_value =0;
																	for($i=1;$i<=$days_between;$i++)
																	{
																			$newCheckin = date('Y-m-d', $checkin1);														
				//---------------------------Dive --------------------------
																			
		//Check Availability--------------------------------------------------------------------------																	
																			 $this->db->from('tbl_booking_availability');
																			 $this->db->where('bookeddate',$newCheckin);
																			 $this->db->where('table_name','tbl_dccourses');
																			 $this->db->where('user_id',$lesuiredive);
																			 $this->db->where('product_id',$cval21->id);
																			 $query = $this->db->get();
																			 $avalabile = $query->result();

					//------------------------------------------

																			if ($query->num_rows() == 0) 
																			{
																				
																				$dd=1;

																			}
																			else 
																			{
																				foreach($avalabile as $rowAvalable)
																				{
																					 $booked_dive = $rowAvalable->booked_dives;	
																					 $max_dive_day = $row->product_max_day;
																					 $per_day_dive = $row->max_dive_day;
																					 $check_ava = $max_dive_day - $booked_dive;
																					 
																					 if($check_ava >= $per_day_dive)
																					 {
																						
																					 } 
																					 else{
																						 $dd=1;
																					 }
																				}
																			}
																			$checkin1 = strtotime("+1 day", $checkin1);
																			
																			

																	}
																	if($dd==1)
																	{
																	
																?>
																<div class="col-md-4">
																	<a class="col-md-offset-2" data-toggle="collapse" data-parent="#accordion" href="#<?php echo $cval21->id; ?>" style="color:#00db00;font-weight:bold;">AVAILABLE</a>
																</div>
																<?php
																	}
																	else{?>
																	<div class="col-md-4">
																	<a class="col-md-offset-2" data-toggle="collapse" data-parent="#accordion" href="#<?php echo $cval21->id; ?>" style="color:red;font-weight:bold;">UNAVAILABLE</a>
																</div>	
																	
																	<?php
																	}
																}
																?>
																<div class="col-md-4">
																	<a class="col-md-offset-2" data-toggle="collapse" data-parent="#accordion" href="#<?php echo $cval21->id; ?>"><b><?php echo ucwords(strtoupper($divecenterval->dccurrency));?>&nbsp;&nbsp;<?php echo $cval21->product_normal_rate; ?></b>&nbsp;&nbsp;Per&nbsp;&nbsp;<?php echo $cval21->product_unit;?></a>
																</div>
																</a>
															</button>
														</div>
															
														<?php 
															if($ci == 3)
															{
																?>
															
														<div class="product_details_courses"></div>	
															
														<?php
															}
															?>
												<?php
												$ci++;;
												}
												?>
												
												<?php
										}
										?>
								 </section>
							</div>
						</div>
<!--------------------------------Courses And Specialties Dive Tab Ends---------------------------------------------------->						
						
<!--------------------------------Package Dive Tab Ends---------------------------------------------------->
						<div class="PackageOffer" id="PackageOffer">
							<div class="col-md-12">
								 <section class="dashboard-menu dashboard-menu-2 " style="border-top: none;padding: 15px 0px 0px 0px">
									<div class="container" style="width:100%;padding:0px;">
									   <div class="row">
										  <div class="">
											 <div class="dashboard-menu-container" style="">
												<ul>
												   <li  id="GeneralInfoTab">
													
														 <div class="menue-name"> General Info </div>
													
												   </li >
												   <li  id="LeisureDiveTab">
													  
														 <div class="menue-name">Leisure Dive </div>
													 
												   </li>
												   <li id="CoursesSpecialtiesTab" >
													 
														 <div class="menue-name">Courses & Specialties</div>
													 
												   </li>
												   <li id="PackageOfferTab" class="active">
													 
														 <div class="menue-name">Package Offers</div>
													  
												   </li>
												   <li id="ReviewTab">
													  
														 <div class="menue-name">Review</div>
													  
												   </li>
												</ul>
											 </div>
										  </div>
									   </div>
									</div>
								 </section>
								 <section style="border:2px solid #ccc;margin:0px -15px;">
								<?php
										$lesuiredive = $divecenterval->user_id;
										$data121 = $this->db->get_where('tbl_dcpackage', array('user_id' => $lesuiredive, 'product_status' => 'AVAILABLE'))->result();
										$no_of_rows = count($data121);
										if($no_of_rows < 3)
										{
												foreach ($data121 as $cval21)
												{
													$date1 = strtotime($sDate);
													$date2 = strtotime($eDate);
													$datediff = $date2 - $date1;
													$days_between = floor($datediff / (60 * 60 * 24));
													//$maxdive_day = $cval21->max_dive_day;
													$product_max_day = $cval21->product_max_day;
													$dd=0;
													?>
														<div class="row1" style="padding-bottom: 15px; border-bottom:1px solid #ccc; padding-top:20px; ">
															<button type="button" name="add_cart" class="expandLeisureDive"  data-productid="<?php echo $cval21->id; ?>" data-table="tbl_dcpackage" data-diveid="<?php echo $lesuiredive; ?>"  style="background-color: #fff;border: none;width: 100%;"/>
																<a href="">
																<div class="col-md-4" style="text-align: left;">
																	<a class="col-md-offset-2" data-toggle="collapse" data-parent="#accordion" href="#<?php echo $cval21->id; ?>" > <?php echo $cval21->product_name; ?>&nbsp;&nbsp;
																	<i class="fa fa-sort-desc"></i></a>
																</div>
																
																<?php
																if($product_max_day == 'No Limit'){
																?>
																<div class="col-md-4">
																	<a class="col-md-offset-2" data-toggle="collapse" data-parent="#accordion" href="#<?php echo $cval21->id; ?>" style="color:#00db00;font-weight:bold;">AVAILABLE</a>
																</div>
																<?php 
																}
																else
																{
																	$date1 = strtotime($sDate);
																$date2 = strtotime($eDate);
																	$datediff = $date2 - $date1;
																	$days_between = floor($datediff / (60 * 60 * 24));
																			
																	//echo $days_between;		
																	$checkin1 = $date1;
																	$checkin1 = strtotime($checkin1);
																	$slt_value =0;
																	for($i=1;$i<=$days_between;$i++)
																	{
																			$newCheckin = date('Y-m-d', $checkin1);
																				
				//---------------------------Dive --------------------------
																			
		//Check Availability--------------------------------------------------------------------------																	
																			 $this->db->from('tbl_booking_availability');
																			 $this->db->where('bookeddate',$newCheckin);
																			 $this->db->where('table_name','tbl_dcpackage');
																			 $this->db->where('user_id',$lesuiredive);
																			 $this->db->where('product_id',$cval21->id);
																			 $query = $this->db->get();
																			 $avalabile = $query->result();
																		//---------------------------Dive --------------------------
																	

																			if ($query->num_rows() == 0) 
																			{																		
																				$dd=1;

																			}
																			else 
																			{
																				
																				foreach($avalabile as $rowAvalable)
																				{
																						
																					 $booked_dive = $rowAvalable->booked_dives;	
																					 $max_dive_day = $row->product_max_day;
																					 $per_day_dive = $row->max_dive_day;
																					 $check_ava = $max_dive_day - $booked_dive;
																					 
																					 if($check_ava >= $per_day_dive)
																					 {
																						
																					 } 
																					 else{
																						 $dd=1;
																					 }
																				}
																			}
													$checkin1 = strtotime("+1 day", $checkin1);
																	}
																	if($dd==1)
																	{
																	
																?>
																<div class="col-md-4">
																	<a class="col-md-offset-2" data-toggle="collapse" data-parent="#accordion" href="#<?php echo $cval21->id; ?>" style="color:#00db00;font-weight:bold;">AVAILABLE</a>
																</div>
																<?php
																	}
																	else{?>
																	<div class="col-md-4">
																	<a class="col-md-offset-2" data-toggle="collapse" data-parent="#accordion" href="#<?php echo $cval21->id; ?>" style="color:red;font-weight:bold;">UNAVAILABLE</a>
																</div>	
																	
																	<?php
																	}
																}
																if($cval21->product_normal_rate == '0.00')
																{
																	$amt[] = explode(',',$cval21->single_room);
																	$t=1;
																	foreach($amt as $newamt)
																	{
																		if($t==1)
																		{
																?>
																<div class="col-md-4">
																	<a class="col-md-offset-2" data-toggle="collapse" data-parent="#accordion" href="#<?php echo $cval21->id; ?>"><b><?php echo ucwords(strtoupper($divecenterval->dccurrency));?>&nbsp;&nbsp;<?php echo $newamt[$t]; ?></b>&nbsp;&nbsp;Per&nbsp;&nbsp;<?php echo $cval21->product_unit;?></a>
																</div>
																<?php
																		}
																$t++;
																	}
																}
																else
																{
																	?>
																	
																	<div class="col-md-4">
																	<a class="col-md-offset-2" data-toggle="collapse" data-parent="#accordion" href="#<?php echo $cval21->id; ?>"><b><?php echo ucwords(strtoupper($divecenterval->dccurrency));?>&nbsp;&nbsp;<?php echo $cval21->product_normal_rate; ?></b>&nbsp;&nbsp;Per&nbsp;&nbsp;<?php echo $cval21->product_unit;?></a>
																</div>
																<?php
																}
																
																?>
																</a>
															</button>
														</div>
															
															
															
															
															
														
												<?php
												}
												?>
												<div class="product_details_package"></div>
										<?php
										}
										else
										{
											$pi=1;
													foreach ($data121 as $cval21)
												{
													$date1 = strtotime($sDate);
													$date2 = strtotime($eDate);
													$datediff = $date2 - $date1;
													$days_between = floor($datediff / (60 * 60 * 24));
													//$maxdive_day = $cval21->max_dive_day;
													$product_max_day = $cval21->product_max_day;
													$dd=0;
													?>
														<div class="row1" style="padding-bottom: 15px; border-bottom:1px solid #ccc; padding-top:20px; ">
															<button type="button" name="add_cart" class="expandLeisureDive"  data-productid="<?php echo $cval21->id; ?>" data-table="tbl_dcpackage" data-diveid="<?php echo $lesuiredive; ?>"  style="background-color: #fff;border: none;width: 100%;"/>
																<a href="">
																<div class="col-md-4" style="text-align: left;">
																	<a class="col-md-offset-2" data-toggle="collapse" data-parent="#accordion" href="#<?php echo $cval21->id; ?>" > <?php echo $cval21->product_name; ?>&nbsp;&nbsp;
																	<i class="fa fa-sort-desc"></i></a>
																</div>
																
																<?php
																if($product_max_day == 'No Limit'){
																?>
																<div class="col-md-4">
																	<a class="col-md-offset-2" data-toggle="collapse" data-parent="#accordion" href="#<?php echo $cval21->id; ?>" style="color:#00db00;font-weight:bold;">AVAILABLE</a>
																</div>
																<?php 
																}
																else
																{
																	$date1 = strtotime($sDate);
																$date2 = strtotime($eDate);
																	$datediff = $date2 - $date1;
																	$days_between = floor($datediff / (60 * 60 * 24));
																			
																	//echo $days_between;		
																	$checkin1 = $date1;
																	$checkin1 = strtotime($checkin1);
																	$slt_value =0;
																	for($i=1;$i<=$days_between;$i++)
																	{
																			$newCheckin = date('Y-m-d', $checkin1);
																				
				//---------------------------Dive --------------------------
																			
		//Check Availability--------------------------------------------------------------------------																	
																			 $this->db->from('tbl_booking_availability');
																			 $this->db->where('bookeddate',$newCheckin);
																			 $this->db->where('table_name','tbl_dcpackage');
																			 $this->db->where('user_id',$lesuiredive);
																			 $this->db->where('product_id',$cval21->id);
																			 $query = $this->db->get();
																			 $avalabile = $query->result();
																		//---------------------------Dive --------------------------
																	

																			if ($query->num_rows() == 0) 
																			{																		
																				$dd=1;

																			}
																			else 
																			{
																				
																				foreach($avalabile as $rowAvalable)
																				{
																						
																					 $booked_dive = $rowAvalable->booked_dives;	
																					 $max_dive_day = $row->product_max_day;
																					 $per_day_dive = $row->max_dive_day;
																					 $check_ava = $max_dive_day - $booked_dive;
																					 
																					 if($check_ava >= $per_day_dive)
																					 {
																						
																					 } 
																					 else{
																						 $dd=1;
																					 }
																				}
																			}
													$checkin1 = strtotime("+1 day", $checkin1);
																	}
																	if($dd==1)
																	{
																	
																?>
																<div class="col-md-4">
																	<a class="col-md-offset-2" data-toggle="collapse" data-parent="#accordion" href="#<?php echo $cval21->id; ?>" style="color:#00db00;font-weight:bold;">AVAILABLE</a>
																</div>
																<?php
																	}
																	else{?>
																	<div class="col-md-4">
																	<a class="col-md-offset-2" data-toggle="collapse" data-parent="#accordion" href="#<?php echo $cval21->id; ?>" style="color:red;font-weight:bold;">UNAVAILABLE</a>
																</div>	
																	
																	<?php
																	}
																}
																if($cval21->product_normal_rate == '0.00')
																{
																	$amt[] = explode(',',$cval21->single_room);
																	$t=1;
																	foreach($amt as $newamt)
																	{
																		if($t==1)
																		{
																?>
																<div class="col-md-4">
																	<a class="col-md-offset-2" data-toggle="collapse" data-parent="#accordion" href="#<?php echo $cval21->id; ?>"><b><?php echo ucwords(strtoupper($divecenterval->dccurrency));?>&nbsp;&nbsp;<?php echo $newamt[$t]; ?></b>&nbsp;&nbsp;Per&nbsp;&nbsp;<?php echo $cval21->product_unit;?></a>
																</div>
																<?php
																		}
																$t++;
																	}
																}
																else
																{
																	?>
																	
																	<div class="col-md-4">
																	<a class="col-md-offset-2" data-toggle="collapse" data-parent="#accordion" href="#<?php echo $cval21->id; ?>"><b><?php echo ucwords(strtoupper($divecenterval->dccurrency));?>&nbsp;&nbsp;<?php echo $cval21->product_normal_rate; ?></b>&nbsp;&nbsp;Per&nbsp;&nbsp;<?php echo $cval21->product_unit;?></a>
																</div>
																<?php
																}
																
																?>
																</a>
															</button>
														</div>
															
															
													<?php
													if($pi==3)
													{
													?>													
														<div class="product_details_package"></div>	
													<?php
													}
?>													
														
												<?php
												$pi++;
												}
												
											
										}
										?>
								 </section>
							</div>
						</div>
<!--------------------------------Packages Dive Tab Ends---------------------------------------------------->						
<!--------------------------------ReviewDive Tab Ends---------------------------------------------------->
						<div class="Review" id="Review">
							<div class="col-md-12">
								 <section class="dashboard-menu dashboard-menu-2 " style="border-top: none;padding: 15px 0px 0px 0px">
									<div class="container" style="width:100%;padding:0px;">
									   <div class="row">
										  <div class="">
											 <div class="dashboard-menu-container" style="">
												<ul>
												   <li  id="GeneralInfoTab">
													
														 <div class="menue-name"> General Info </div>
													
												   </li >
												   <li  id="LeisureDiveTab">
													  
														 <div class="menue-name">Leisure Dive </div>
													 
												   </li>
												   <li id="CoursesSpecialtiesTab" >
													 
														 <div class="menue-name">Courses & Specialties</div>
													 
												   </li>
												   <li id="PackageOfferTab" >
													 
														 <div class="menue-name">Package Offers</div>
													  
												   </li>
												   <li id="ReviewTab" class="active">
													  
														 <div class="menue-name">Review</div>
													  
												   </li>
												</ul>
											 </div>
										  </div>
									   </div>
									</div>
								 </section>
								 <style>

		.demo-table {
			width: 100%;
			border-spacing: initial;
			margin: 20px 0px;
			word-break: break-word;
			table-layout: auto;
			line-height:1.8em;
			color:#333;
			}
		.demo-table th {
			background: #999;
			padding: 5px;
			text-align: left;
			color:#FFF;
			}
		.demo-table td 
		{
			border-bottom: #f0f0f0 1px solid;
			background-color: #ffffff;
			padding: 5px;
			}
		.demo-table td div.feed_title
		{
			text-decoration: none;
			color:#00d4ff;
			font-weight:bold;
			}
		.demo-table ul
		{
			margin:0;
			padding:0;
			}
		.demo-table li
		{
			cursor:pointer;
			list-style-type: none;
			display: inline-block;
			color: #F0F0F0;
			text-shadow: 0 0 1px #666666;
			font-size:20px;
			}
		.demo-table .highlight, .demo-table .selected 
		{
			color:#F4B30A;
			text-shadow: 0 0 1px #F48F0A;
			}
		</style>
								 <section style="border:2px solid #ccc;margin:0px -15px;">
										<div class="row">
										<?php
											$u_id = $divecenterval->user_id;
											$result1234 = $this->db->get_where('tbl_review', array('divecenter_id' => $u_id));
											
											$result123 = $result1234->result();
											$no_of_rows = $result1234->num_rows(); 
											if($no_of_rows != 0)
											{
							
								$i=1;
								$p=0;
								$s=0;
								$f=0;
								$e=0;
								
									foreach ($result123 as $tutorial) 
									{
										$p = $p + $tutorial->price_rating;
										$s = $s + $tutorial->services_rating;
										$f = $f + $tutorial->facilities_rating;
										$e = $e + $tutorial->equipment_rating;
										
									$i++;
									}
									$p = $p / $no_of_rows;
									$s = $s / $no_of_rows;
									$f = $f / $no_of_rows;
									$e = $e / $no_of_rows;
									
									$total = ($p + $s + $f + $e )/4;
									
									?>
											<div class="col-md-3">
												<h2><?php echo $no_of_rows;  ?> Reviews</h2>
											</div>
											<div class="col-md-6">
												<table class="demo-table">
													<tbody>
					
														<tr>
															<td valign="top">
																<div id="tutorial-1">
																<div class="price">
																	<input type="hidden" name="rating" id="rating" value="<?php echo $p; ?>" />
																	<ul onMouseOut="resetRating(1);">
																	 <label class="control-label col-sm-3" for="email">Price</label>
																		<?php
																		for($i=1;$i<=5;$i++)
																		{
																			$selected = "";
																			if(!empty($p) && $i<=$p) 
																			{
																				$selected = "selected";
																			}
																			?>
																			<li class='<?php echo $selected; ?>' onmouseover="highlightStar(this,1);" onmouseout="removeHighlight(1);" onClick="addRating(this,1);">&#9733;</li>  
																		<?php }  ?>
																	</ul>
																	</div>
																	</div>
																
															</td>
														</tr>
														<tr>
															<td valign="top">
																<div id="tutorial-2">
																<div class="price">
																	<input type="hidden" name="rating" id="rating" value="<?php echo $s; ?>" />
																	<ul onMouseOut="resetRating(2);">
																	 <label class="control-label col-sm-3" for="email">Services</label>
																		<?php
																		for($i=1;$i<=5;$i++)
																		{
																			$selected = "";
																			if(!empty($s) && $i<=$s) 
																			{
																				$selected = "selected";
																			}
																			?>
																			<li class='<?php echo $selected; ?>' onmouseover="highlightStar(this,2);" onmouseout="removeHighlight(2);" onClick="addRating(this,2);">&#9733;</li>  
																		<?php }  ?>
																	</ul>
																	</div>
																</div>	
																
															</td>
														</tr>
														<tr>
															<td valign="top">
																<div id="tutorial-3">
																<div class="price">
																	<input type="hidden" name="rating" id="rating" value="<?php echo $f; ?>" />
																	<ul onMouseOut="resetRating(3);">
																	 <label class="control-label col-sm-3" for="email">Facilities</label>
																		<?php
																		for($i=1;$i<=5;$i++)
																		{
																			$selected = "";
																			if(!empty($f) && $i<=$f) 
																			{
																				$selected = "selected";
																			}
																			?>
																			<li class='<?php echo $selected; ?>' onmouseover="highlightStar(this,3);" onmouseout="removeHighlight(3);" onClick="addRating(this,3);">&#9733;</li>  
																		<?php }  ?>
																	</ul>
																	</div>
																</div>	
																
															</td>
														</tr>
														<tr>
															<td valign="top">
																<div id="tutorial-4">
																<div class="price">
																	<input type="hidden" name="rating" id="rating" value="<?php echo $e; ?>" />
																	<ul onMouseOut="resetRating(4);">
																	 <label class="control-label col-sm-3" for="email">Equipment</label>
																		<?php
																		for($i=1;$i<=5;$i++)
																		{
																			$selected = "";
																			if(!empty($e) && $i<=$e) 
																			{
																				$selected = "selected";
																			}
																			?>
																			<li class='<?php echo $selected; ?>' onmouseover="highlightStar(this,4);" onmouseout="removeHighlight(4);" onClick="addRating(this,4);">&#9733;</li>  
																		<?php }  ?>
																	</ul>
																	</div>
																	</div>
																		
																	</td>
																</tr>
															
														</tbody>
													</table>
												</div>
											<div class="col-md-3">
												<span style="font-size:15px;font-weight:bold; text-align:center;" class="col-md-6">AVERAGE<BR> RATING<br><?php echo $total; ?></span>
												<span class='selected col-md-6' style="font-size:100px;color:#f4b30a;margin: -37px;">&#9733;</span>
											</div>
										</div>
										<hr>
										<?php
										$u_id = $divecenterval->user_id;
										$data3 = $this->db->get_where('tbl_review', array('divecenter_id'=>$u_id))->result();
										foreach($data3 as $dd3)
										{
										?>
											<div class="row">
												<div class="col-md-2">
													<?php 
													$userid = $dd3->customer_id;
													$data4 = $this->db->get_where('tbl_customerprofile', array('user_id'=>$userid))->result();
													foreach($data4 as $dd4)
													{
														$customer_photo = $dd4->photo;
														if($customer_photo != null)
														{
														?>
															<img src="<?php echo base_url(); ?>upload/customerprofile/<?php echo $dd4->photo; ?>" class="img-responsive img-circle">
														<?php
														}
														else
														{
														?>
															<img src="<?php echo base_url(); ?>upload/1483346768735.png" class="img-responsive img-circle">
														<?php
														}
													}
													?>
												</div>
												<div class="col-md-6">
												<?php 
													echo $dd3->description;
												?>
												</div>
												<div class="col-md-4">
													<?php
													$rdate = $dd3->date;
													$yrdata= strtotime($rdate);
													$rdd = date('F Y', $yrdata);
													echo '<b>on'.'  '.$rdd.'</b>';
													?>
													<br> <?php
						$p = $dd3->price_rating;
						$s = $dd3->services_rating;
						$f = $dd3->facilities_rating;
						$e = $dd3->equipment_rating;
						
						$tota_rating = ($p + $s + $f + $e)/4;
						?>
						<span style=" text-align:center;" class="col-md-8">AVERAGE RATING<br><?php echo $tota_rating; ?></span>
						<span class='selected col-md-4' style="font-size:30px;color:#f4b30a;">&#9733;</span>
												</div>
											</div>
											<hr>
										<?php
										}
										?>
								<?php
											}
											else{?>
											<div class="row">
												<h1 style="padding:50px;">No Review Found</h1>
												</div>
										<?php	}
									?>

								 </section>
							</div>
						</div>
<!--------------------------------Review Dive Tab Ends---------------------------------------------------->						
						
						
<!--------------------------------Tab Content Ends-------------------------------------------------------------------->						
					<?php
					}
					?>
				</div>


				<script type="text/javascript" src="<?php echo base_url(); ?>assets/frontend/js/theia-sticky-sidebar.js"></script> 
				 <script>
					$(document).ready(function() {
						$('#sticky-ad')
					.theiaStickySidebar({
					additionalMarginTop: 80
					});
					$('#sticky-ad2')
					.theiaStickySidebar({
					additionalMarginTop: 80
					});
					});
				 </script>
 <div class="col-md-4" style="padding:0px;">
				<div id="overlay">
					<div class="wrapper1">
							<?php
							foreach ($divecenterpage as $get_dc)
							{
								$get_id = $get_dc->user_id;
								$data = $this->db->get_where('tbl_dcprofile', array('user_id' => $get_id));
								//$this->db->get('tbl_dcprofile')->result_array();
								foreach ($data->result_array() as $a)
								{
									$markers[] = array(
									'lat' => $a['dcgps_x'],
									'lng' => $a['dcgps_y'],
									'description' => $a['dcname']
									);
								}
							}
							?>
							<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyBLorhG6yww2PIYnW-C_d-D2MTmoZfa33w" type="text/javascript"></script>
		<script type="text/javascript">// <![CDATA[
		var markers = <?php echo json_encode($markers); ?>;
		window.onload = function () {
		var mapOptions = {
		center: new google.maps.LatLng(markers[0].lat, markers[0].lng),
		minZoom: 4,
        maxZoom: 7,
		mapTypeId: google.maps.MapTypeId.ROADMAP
		};
		var map = new google.maps.Map(document.getElementById("dvMap"), mapOptions);
		var infoWindow = new google.maps.InfoWindow();
		var lat_lng = new Array();
		var latlngbounds = new google.maps.LatLngBounds();
		for (i = 0; i < markers.length; i++) {
		var data = markers[i]
		var myLatlng = new google.maps.LatLng(data.lat, data.lng);
		lat_lng.push(myLatlng);
		var marker = new google.maps.Marker({
		position: myLatlng,
		map: map,
		title: data.title,
		//label: data.label
		});
		latlngbounds.extend(marker.position);
		(function (marker, data) {
		google.maps.event.addListener(marker, "click", function (e) {
		infoWindow.setContent(data.description);
		infoWindow.open(map, marker);
		});
		})(marker, data);
		}
		map.setCenter(latlngbounds.getCenter());
		map.fitBounds(latlngbounds);

		}

// ]]></script>
<div id="dvMap" style="height: 1000px;width:100%;"></div>
							<div class="fixed affix-top cart_align" style="bottom: 0px;width:350px;">
								<h4 class="text-center">My Dive Cart</h4>
								<div class="separator"></div>
								
								<table class="table table-striped" id="cart_details">
									<?php
										 $this->db->select('*');
										 $this->db->from('tbl_dummy_cart');
		 								 $this->db->where('sessionid',$this->session->userdata('scubbi_sessid'));
										 $query890 = $this->db->get();
											$data1  ="";
											$resultOutput = '';
											if($query890->num_rows() != 0)
											{
											
												$resultOutput = '';
													 $this->db->select('*');
													 $this->db->from('tbl_dummy_cart_product');
		 								 			$this->db->where('sessionid',$this->session->userdata('scubbi_sessid'));
													 $query = $this->db->get();
													 $res = $query->result();
													 $total = 0;
													 
														$resultOutput ='<tr style="color:red;font-weight:bold"><td colspan="5">'.$data1.'</td></tr>'; 
													 
														$i=1; 
													 foreach($res as $rrow)
													 {
														 $resultOutput = $resultOutput.'
																		<tr>
																			<td style="padding:3px;">'.$rrow->diverid.'</td>
																			<td style="padding:3px;">'.$rrow->product_name.'</td>
																			<td style="padding:3px;">'.$rrow->qty.'&nbsp;X&nbsp;'.$rrow->price.'&nbsp;&nbsp;</td>
																			<td style="padding:3px;">'.number_format($rrow->qty * $rrow->price,2).'</td>
																			<td style="padding:3px;color:red;" class="removeCart1" data-pk="'.$rrow->id.'" data-tbl="tbl_dummy_cart_product"><i class="fa fa-remove"></i></td>
																			
																		</tr>
																
														 ';
														 $total=$total + $rrow->qty * $rrow->price;
														 $this->db->select('*');
														 $this->db->from('tbl_dummy_cart_product_optional');
														 $this->db->where('dummy_product_id',$rrow->id);
														 $query1 = $this->db->get();
														 $res1 = $query1->result();
														 foreach($res1 as $rrow1)
														 {
															  $resultOutput = $resultOutput.'
															  <hr>
																		<tr>
																			<td style="padding:3px;">'.$rrow1->diverid.'</td>
																			<td style="padding:3px;">'.$rrow1->product_name.'</td>
																			<td style="padding:3px;">'.$rrow1->qty.'&nbsp;X&nbsp;'.$rrow1->price.'&nbsp;&nbsp;</td>
																			<td style="padding:3px;">'.number_format($rrow1->qty * $rrow1->price,2).'</td>
																			<td style="padding:3px;color:red;width:10px;" class="removeCart" data-pk="'.$rrow1->id.'" data-tbl="tbl_dummy_cart_product_optional"><i class="fa fa-remove"></a></td>
																		</tr>';
																		$total=$total + $rrow1->qty * $rrow1->price;
														 }
														 $i++;
													 }
													 $resultOutput = $resultOutput.'<tr><td>&nbsp;</td><td>&nbsp;</td><td><b>Total</b></td><td>'.number_format($total,2).'</td><td>&nbsp;</td></tr>';
														
												 echo $resultOutput;
											}
											
										?>
								</table>
								
								<?php
								foreach ($divecenterpage as $divecenter)
								{
								?>
									<form action="<?php echo base_url(); ?>Customer/paymentInfo" method="POST">
										<input type="hidden" value=" 	<?php echo $no_of_persons; ?>" id="no_of_person" name="no_of_person">
										<input type="hidden" value="<?php echo $divecenter->user_id;?>" id="divecenter_id" name="divecenter_id">
										<input type="hidden" value="<?php echo $sDate; ?>" name="startdate" id="startdate">
										<input type="hidden" value="<?php echo $eDate; ?>" name="enddate" id="enddate">
										<input type="hidden" value="<?php
											$date = new DateTime(str_replace(" / ","- ",$sDate));
											$newStart = $date->format('d-m-Y');
											$date1 = new DateTime(str_replace("/ ","- ",$eDate));
											$newEnd = $date1->format('d-m-Y');
											$date1 = strtotime($newStart); //strtotime($sDate);
											$date2 = strtotime($newEnd); //strtotime($eDate);
											$datediff = $date2 - $date1;
											$days_between =  round($datediff / 86400)+1;;
											echo $days_between;
										?>" name="noofdays">
										<!--div id="flash"></div>
										<div id="show"></div-->
										<p style="text-align:center">
											<input type="submit" class="btn btn-success submit_button1" formtarget="_blank" value="Checkout">
										</p>
										
									</form>
									<p style="text-align:center">
											<button class="btn btn-danger" id="clear_cart">Empty the carts</button>
										</p>
								<?php
								}
								?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<hr>
		
    <!-- JAVASCRIPT JS  -->
 		<!-- footer starts-->
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
		
		<script type="text/javascript" src="<?php echo base_url('assets/frontend/js/jquery.meanmenu.js'); ?>"></script>
		<!--Style Switcher -->
		<script src="<?php echo base_url('assets/frontend/js/color-switcher.js'); ?>"></script>
		<!-- CORE JS -->
		<script type="text/javascript" src="<?php echo base_url('assets/frontend/js/custom.js'); ?>"></script>
		<!-- RANGE SLIDER JS -->
		<script type="text/javascript" src="<?php echo base_url('assets/frontend/js/nouislider.min.js'); ?>"></script>
		<script type="text/javascript" src="<?php echo base_url('assets/frontend/js/wNumb.js'); ?>"></script>
	</body>
</html>