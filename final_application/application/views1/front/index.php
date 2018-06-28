<link href="<?php echo base_url(); ?>assets/frontend/jquery-ui.css" rel="stylesheet" type="text/css" />
						<link href="<?php echo base_url(); ?>assets/guidedtour_datepicter/MonthPicker.min.css" rel="stylesheet" type="text/css" />
						<script src="<?php echo base_url(); ?>assets/guidedtour_datepicter/jquery-ui.min.js"></script>
						<script src="<?php echo base_url(); ?>assets/guidedtour_datepicter/jquery.maskedinput.min.js"></script>
						 <script src="<?php echo base_url(); ?>assets/guidedtour_datepicter/MonthPicker.min.js"></script>
						 
						 
						 
<link href="<?php echo base_url('assets/new/css/datepicker.css1');?>" rel="stylesheet">

<script type="text/javascript" src="<?php echo base_url('assets/new/js/bootstrap-datepicker.js1');?>"></script>




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
											$(document).ready(function(){
												 
												
												
												
												
												$("#hideSplOfferDiv").hide();
												$("#hidePopularDestinations").hide();
												$("#popularLoadLessDiv").hide();
												$("#popularViewAllDiv").hide();
												
												$(".load-less-btn").hide();
												$("#showMoreSpcl").click(function(){
													$("#hideSplOfferDiv").show();
													$(".load-less-btn").show();
													$(".load-more-btn").hide();
												});
												$("#showLessSpcl").click(function(){
													$("#hideSplOfferDiv").hide();
													$(".load-less-btn").hide();
													$(".load-more-btn").show();
												});
												
												//View all special offer START
												$("#showViewall").click(function(){
													$("#hideSplOfferDiv").hide();
													$("#ViewAll").show();
													$(".load-less-btn").hide();
													$(".load-more-btn").hide();
													$(".addNewspl").hide();
													$(".lessOnlyshow").show();
												});
												
												$(".lessOnlyshow").click(function(){
													$("#hideSplOfferDiv").hide();
													$(".load-less-btn").hide();
													$(".load-more-btn").show();
													$("#showMoreSpcl").show();
													$("#ViewAll").hide();
													$("#showViewall").show();
													$(".addNewspl").show();
													$(".lessOnlyshow").hide();
												});
												//View all special offer END
												
												$("#popularLoadMore").click(function(){
													$("#hidePopularDestinations").show();
													$("#popularLoadLessDiv").show();
													$("#popularViewAllDiv").show();
													$("#popularLoadMoreDiv").hide();
												});
												$("#popularLoadLess").click(function(){
													$("#hidePopularDestinations").hide();
													$("#popularLoadLessDiv").hide();
													$("#popularViewAllDiv").hide();
													$("#popularLoadMoreDiv").show();
												});
												
												//View all popular destination START
												$("#popularViewAllDiv").click(function(){
													$(".hideOldpopular").hide();
													$("#popularLoadLessDiv").hide();
													$(".lessOnlyshowpop").show();
													$("#popularViewAllDiv").hide();
													$(".hidePopular").show();
												});
												
												$(".lessOnlyshowpop").click(function(){
													$(".hideOldpopular").show();
													$("#hidePopularDestinations").hide();
													$("#popularLoadLessDiv").hide();
													$(".hidePopular").hide();
													$("#popularLoadMoreDiv").show();
													$(".lessOnlyshowpop").hide();
												});
												
											   //View all popular destination END
											   
											});
											      
		
		
		
		
		

											</script>	
											
	<!--script type="text/javascript">
    $(document).ready(function() {
        
        $('#scountry').gentleSelect({ 
            columns: 4,
            itemWidth: 100,
            openEffect: "fade",
            openSpeed: "slow"
        });
		$('#islands').gentleSelect({ 
            columns: 4,
            itemWidth: 100,
            openEffect: "fade",
            openSpeed: "slow"
        });
		 
    });
    </script-->
	
<script src="<?php echo base_url(); ?>assets/autochange/jquery.min.js"></script>
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

	<style>
		.nav-tabs>li>a {
    margin-right: 2px;
    line-height: 1.42857143;
    border: 1px solid transparent;
    /*border-radius: 4px 4px 0 0;*/
	font-size: 16px;
    padding-left: 20px;
    font-weight: bold;
}
	</style>

<section class="papular-post-slider" style="padding: 45px 0px 0px 0px;">
    <div class="container">
	
        <div class="row">
		
            <section class="cat-tabs" style="margin-top:25px;">
                <div class="container">
                    <div class="row">
                        
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="row">
                                    <div class="panel panel-primary">
                                        <div class="panel-heading">
                                            <!-- Tabs -->
											        <div class="container1">
												<ul class="nav nav-tabs">

													<li class="active"><a data-toggle="tab" href="#menu1">Dive Centers</a>
													</li>
													<!--<li><a data-toggle="tab" href="#menu2">Guided Tour</a>
													</li>-->
													
												</ul>

												<div class="tab-content">
													<br>
													<div id="menu1" class="tab-pane fade in active">
										<div class="container">
											<div class="row">
											
										<form class="form-inline" action="<?php base_url(); ?>Front/search" method="POST" enctype="multipart/form-data">
										
										<div class="form-group col-md-2" style="padding:0px;">
											<select class="form-control" name="scountry" id="scountry" style="height: 40px;" required >
												<option value="" label="Select Country">Select Country</option>
												<?php $data=$this->db->get('tbl_country')->result_array(); foreach ($data as $a) {
													$country_active = $a['is_deactivate'];
													if($country_active == "N")
													{
													?>
												<option value="<?php echo $a['country_id'];?>">
													<?php echo $a[ 'country_name'];?>
												</option>
												<?php 
												}
												} ?>
											</select>
											
										</div>
										<div class="form-group col-md-2" style="padding:0px;">
										<select  name ="islands" class="form-control" id="islands" style="height:40px;" required>
											<option>Select Islands</option>
										</select>

										</div>
										<!--#########jQuery_Date_Range_Picker##########-->
										
										<div class="form-group col-md-2" style="padding:0px;position:none !important;">											 
											 <input type="text"  class="form-control" id="dpd1" style="height: 40px;width:100%;" placeholder="Checkin" name="checkin" required="" >						 
										</div>
										<div class="form-group col-md-2" style="padding:0px;">
											<input type="text"  class="form-control" id="dpd2" style="height: 40px;width:100%;" placeholder="Checkout" name="checkout" required="" >
										</div>
											
										<!--#########jQuery_Date_Range_Picker##########-->
										<div class="form-group col-md-2" style="padding:0px;">
											<div class="input-group">
											  <input type="number" class="form-control" name="no_of_persons" value="1" min="1" style="height: 40px;position:static;margin-top:0px;" required>
											  <span class="input-group-addon">No of Persons</span>
											</div>
											
										</div>
										<div class="form-group form-action col-md-2" style="padding:0px;">
											<input type="submit" class="btn btn-success btn-search-submit fa fa-search" value="Search" name="search_result" style="height: 40px;width:100%;">											
										</div>
										</form>
										
										
											</div>
											<div class="row">
												<br>
												<div class="separator"></div>
											</div>
											
											<div class="row">
												<div class="col-md-12">
													<h1 style="font-size: 24px;font-weight: bold;color:#000;">Special Offers</h1>
												</div>
												<?php 
												$i=1;
												$j=0;
												foreach($specialoffer as $offer) {
												?>
												<style type="text/css">

												.ribbon {
													position: absolute;
													z-index: 1;
													overflow: hidden;
													width: 75px;
													height: 75px;
													text-align: center;
												  
													bottom:0%;
													right:0%
												}

												.ribbon span{
													font-size: 10px;
													font-weight: 700;
													color: #FFF;
													text-transform: uppercase;
													line-height: 20px;
													transform: rotate(-45deg);
													-webkit-transform: rotate(-45deg);
													width: 100px;
													display: block;
													background: #f94141;
													background: linear-gradient(#f94141 0,#f94141 100%);
													text-shadow: 1px 1px 2px rgba(0,0,0,.25);
													position: absolute;
													top: 35px;
													/* left: -6px; */
												}
												.item {
													/*padding-left: 10px;
													padding-right: 10px;*/
													}
													.grid-item-inner {
													position: relative;
													overflow: hidden;
													color: #fff;
												}
												.grid-margin{margin-left: -10px;margin-right: -10px;}
												.grid-item{margin-bottom: 20px;padding-right: 10px;padding-left: 10px;}
												.grid-item-inner{position: relative;overflow: hidden;color: #fff;}
												.grid-content{background-color: rgba(0,0,0,0.3);position:absolute;top:0;left:0;width:100%;height:100%;pointer-events: none;}
												.grid-text{position:absolute;bottom:0;left:0;padding: 15px;width:100%;}
												.place-name {display: inline-block;padding: 5px 7px;font-size: 12px;line-height: 10px;background-color: #f94141;}
												.travel-times h4{font-size:16px;color: #fff;}
												.travel-times span {position: relative;top: 10px;}
												.grid-price{float:right;padding-top: 22px;font-weight: 700;padding: 15px;display:inline-block;transform:scale(0);-webkit-transform:scale(0);-moz-transform:scale(0);-o-transform:scale(0);transition:all 0.3s ease-in-out;-webkit-transition:all 0.3s ease-in-out;-moz-transition:all 0.3s ease-in-out;-o-transition:all 0.3s ease-in-out;}
												.grid-price  span{font-size:28px;color: #fec107;}
												.grid-price  span sub{font-size:14px;position: relative;top: 0px;}
												.grid-item-inner:hover .grid-price{transform:scale(1);-webkit-transform:scale(1);-moz-transform:scale(1);-o-transform:scale(1);}
												</style>
												<div class="addNewspl">
												
												<div class="col-md-3 col-sm-6 col-xs-12">
												  <div class="item" style="margin: 15px 0;">
													<div class="grid-item-inner">
														<div class="grid-img-thumb">
															<!-- ribbon -->
															<div class="ribbon"><span>Offer</span></div>
															<a href="<?php echo base_url();?>Front/divecenter/8/24-05-2017/26-05-2017/1"><img src="<?php echo base_url();?>upload/specialoffer/<?php echo $offer->offer_image; ?>" alt="1" class="img-responsive" width="100%" height="100%" /></a>
														</div>
														<div class="grid-content">
															<div class="grid-price text-right">
																From Rp.<?php echo $offer->start_km; ?> (<?php echo $offer->offer_period; ?>)
															</div>
															<div class="grid-text">
																<div class="place-name"><?php echo $offer->city; ?>, 
																<?php 
																$cvall = $offer->country_id;
																$data1=$this->db->get_where('tbl_country', array('country_id'=>$cvall))->result();
																foreach($data1 as $cval){ echo $cval->country_name; }
																?></div>
																<div class="travel-times">
																	<h4 class="pull-left"><?php echo $offer->center_name; ?></h4>
																	
																</div>
															</div>
														</div>
													</div>
												</div>
												</div>
		
												</div>
												
												<?php
													if($i == 4)
													{
														$j=1;
														?>
														<div id="hideSplOfferDiv">						
									<?php			}
												
												$i++;												
												}
													if($j == 1)
													{
														?>
														</div>
								<?php				}
												?>
												
												
												
												<div id="ViewAll" style="display:none;">
												<?php 
												$this->db->select('*');
												$this->db->from('special_offer'); 
												$this->db->join('dive_center', 'special_offer.dive_center_id = dive_center.dive_center_id'); 
												$query = $this->db->get()->result();
												foreach($query as $offer)
												{
												?>
												
												<div class="col-md-3 col-sm-6 col-xs-12 ">
												  <div class="item" style="margin: 15px 0;">
													<div class="grid-item-inner">
														<div class="grid-img-thumb">
															<!-- ribbon -->
															<div class="ribbon"><span>Offer</span></div>
															<a href="<?php echo base_url();?>Front/divecenter/8/24-05-2017/26-05-2017/1"><img src="<?php echo base_url();?>upload/specialoffer/<?php echo $offer->offer_image; ?>" alt="1" class="img-responsive" width="100%" height="100%" /></a>
														</div>
														<div class="grid-content">
															<div class="grid-price text-right">
																From Rp.<?php echo $offer->start_km; ?> (<?php echo $offer->offer_period; ?>)
															</div>
															<div class="grid-text">
																<div class="place-name"><?php echo $offer->city; ?>, 
																<?php 
																$cvall = $offer->country_id;
																$data1=$this->db->get_where('tbl_country', array('country_id'=>$cvall))->result();
																foreach($data1 as $cval){ echo $cval->country_name; }
																?></div>
																<div class="travel-times">
																	<h4 class="pull-left"><?php echo $offer->center_name; ?></h4>
																	
																</div>
															</div>
														</div>
													</div>
												</div>
												</div>
												<?php 
												}
												?>
												
												</div>
												
												
												
												<div class="col-md-12">
													<div class="load-more-btn" >
														<p style="border:1px solid #777;">
															<label id="showMoreSpcl" style="cursor:pointer;color: #635d5d;
    font-size: 14px;
    line-height: 14px;">Click to show more...</label>
															<!--button class="btn-default"> View All Offers<i class="fa fa-angle-right"></i> </button-->
														</p>
													</div>
													<div class="load-less-btn" style="text-align:center;">
														<p style="border:1px solid #777;">
															<label id="showLessSpcl" style="cursor:pointer;color: #635d5d;
    font-size: 14px;
    line-height: 14px;">Click to show less...</label>
															<!--button class="btn-default"> View All Offers<i class="fa fa-angle-right"></i> </button-->
														</p>
														<p style="border:1px solid #777;">
														<label id="showViewall" style="cursor:pointer;color: #635d5d;
	font-size: 14px;
	line-height: 14px;">View All...</label>
										<!--a href="<?php echo base_url(); ?>Front/get_Allspecialoffer" id="" style="color: #635d5d;
    font-size: 14px;
    line-height: 14px;">View All...</a-->
															<!--button class="btn-default"> View All Offers<i class="fa fa-angle-right"></i> </button-->
														</p>
													</div>
													
													
													<div class="lessOnlyshow" style="text-align:center;display:none;">
														<p style="border:1px solid #777;">
															<label style="cursor:pointer;color: #635d5d;
    font-size: 14px;
    line-height: 14px;">Click to show less...</label>
															<!--button class="btn-default"> View All Offers<i class="fa fa-angle-right"></i> </button-->
														</p>
													</div>
													
												</div>
												
												
											</div>
											<div class="separator"></div>
											
											<div class="row">
												<div class="col-md-12">
													<h1 style="font-size: 24px;font-weight: bold;color:#000;">Popular Diving Destinations</h1>
												</div>
												<?php 
												$a=1;
												$b=0;
												foreach($populardivedestination as $res) 
												{ $pdd=$res->popular_diving_destination; 
												if($pdd == 'Yes') { 
												
												$pdd_img = explode(',',$res->image);
														
														foreach($pdd_img as $pdd_row)
												?>
												<div class="hideOldpopular">
												<div class="col-md-3 col-sm-6 col-xs-12" style="margin-top:3%">
													
														
														<a href="<?php echo base_url('Front/pdd_overview'); ?>/<?php echo $res->country_id; ?>">
															<img src="<?php echo base_url(); ?>upload/ppd/<?php echo $pdd_row; ?>" class="img-responsive center-block" alt="" style="height:200px;width:100%">
															
															<span style="position: absolute;top: 6%;left: 20%;color: #fff;font-weight: bold;text-transform: uppercase;font-size: 23px;">
																<?php 
																$cpdd = $res->country_id;
																$data_pdd=$this->db->get_where('tbl_country', array('country_id'=>$cpdd))->result();
																foreach($data_pdd as $cval_pdd){ echo $cval_pdd->country_name; }
																?>
															</span>
														</a>
														                  
													
												</div>
												</div>
												
												<?php 
												if($a == 8)
												{
													$b=1;?>
													<div id="hidePopularDestinations">
										<?php		}
												}$a++;
												}
												if($b == 1)
												{?>
													
													</div>
										<?php		}
												?>
												
											<div class="hidePopular" style="display:none;">
												
												<?php 
													$this->db->select('*');
													$this->db->from('tbl_populardivingdestination');
													$query1 = $this->db->get()->result();
												foreach($query1 as $res) 
												{ 
												$pdd=$res->popular_diving_destination; 
												if($pdd == 'Yes') 
												{ 
												$pdd_img = explode(',',$res->image);
														
														foreach($pdd_img as $pdd_row)
												?>
												<div class="col-md-3">
													<div class="col-md-3 col-sm-6 col-xs-6" style="margin-top:3%">
														
														<a href="<?php echo base_url('Front/pdd_overview'); ?>/<?php echo $res->country_id; ?>">
															<img src="<?php echo base_url(); ?>upload/ppd/<?php echo $pdd_row; ?>" class="img-responsive center-block" alt="" style="height:200px;width:300px">
															
															<span style="position: absolute;top: 6%;left: 20%;color: #fff;font-weight: bold;text-transform: uppercase;font-size: 23px;">
																<?php 
																$cpdd = $res->country_id;
																$data_pdd=$this->db->get_where('tbl_country', array('country_id'=>$cpdd))->result();
																foreach($data_pdd as $cval_pdd){ echo $cval_pdd->country_name; }
																?>
															</span>
														</a>
														                 
													</div>
												</div>
												<?php 
												}
												}
												?>
											</div>	
												
											</div>
											<div class="row">
												<div class="col-md-12">
													
													<div class="load-more-btn1" id="popularLoadMoreDiv"  style="text-align:center;margin-top: 15px;">
														<p style="border:1px solid #777;">
															
															<label id="popularLoadMore" style="cursor:pointer;color: #635d5d;font-size: 14px;line-height: 14px;">Click to show more...</label>
															<!--button class="btn-default"> View All Offers<i class="fa fa-angle-right"></i> </button-->
														</p>
													</div>
													<div class="load-more-btn1" id="popularLoadLessDiv"  style="text-align:center;margin-top: 15px;">
														<p style="border:1px solid #777;">
															<label id="popularLoadLess" style="cursor:pointer;color: #635d5d;font-size: 14px;line-height: 14px;">Click to show Less...</label>
															<!--button class="btn-default"> View All Offers<i class="fa fa-angle-right"></i> </button-->
														</p>
													</div>
													<div id="popularViewAllDiv" class="ViewhidePopular1" style="text-align:center;">
														<p style="border:1px solid #777;margin-top: 15px;">
															<label style="cursor:pointer;color: #635d5d;font-size: 14px;line-height: 14px;">View All...</label>
															<!--a href="<?php echo base_url(); ?>Front/get_AllPDD" id="popularViewAll" style="cursor:pointer;color: #635d5d;font-size: 14px;line-height: 14px;">View All</a-->
															
														</p>
													</div>
													<br>
													<div class="lessOnlyshowpop" style="text-align:center;display:none;">
														<p style="border:1px solid #777;">
															<label style="cursor:pointer;color: #635d5d;
														font-size: 14px;
														line-height: 14px;">Click to show less...</label>
															<!--button class="btn-default"> View All Offers<i class="fa fa-angle-right"></i> </button-->
														</p>
													</div>
													
												</div>    	
											</div>
										</div>
													
													</div>

													<div id="menu2" class="tab-pane fade">
													<br>
													<div class="container1">
														<div class="row">
															<form class="form-inline" action="<?php base_url(); ?>" method="POST" enctype="multipart/form-data">
															<div class="form-group col-md-3" >
																<select class="form-control" name="scountry" style="height:40px;width:100%;">
																	<option label="Your Country">Your Country</option>
																	<?php $data=$this->db->get('tbl_country')->result_array(); foreach ($data as $a) {?>
																	<option value="<?php echo $a['country_id'];?>">
																		<?php echo $a[ 'country_name'];?>
																	</option>
																	<?php } ?>
																</select>
															</div>
															<div class="form-group col-md-3" >
																<select class="form-control" name="scountry" style="height:40px;width:100%;">
																	<option label="Destination Country">Destination Country</option>
																	<?php $data1=$this->db->get('tbl_country')->result_array(); foreach ($data1 as $a) {?>
																	<option value="<?php echo $a['country_id'];?>">
																		<?php echo $a[ 'country_name'];?>
																	</option>
																	<?php } ?>
																</select>
															</div>
															<style>
															.month-picker-open-button
															{
																    height: 36px;
																	width: 60px;
																	vertical-align: baseline;
															}
															</style>
															<div class="form-group col-md-3" style="vertical-align: baseline;">
															<input id="YearAndAHalfDeom" type="text" style="color: #000;height: 40px;" class="form-control" placeholder="Travel Period" />
															</div>
															<script type="text/javascript">
																$(document).ready(function() {
																$('#YearAndAHalfDeom').MonthPicker({
																   MinMonth:0,
																   MaxMonth: '+2y',
																   MonthFormat: 'M yy'
																   
																 });
																 });
															</script>
														   
															<div class="form-group col-md-3" style="">
																<input type="submit" class="btn btn-danger btn-search-submit fa fa-search" value="Search" name="search_result2" style="height: 36px;width:100%;">
															</div>
															</form>	
														</div>
														
		<div class="row">
		<div class="row">&nbsp;</div>
		<div class="row">&nbsp;</div>
				
				<?php 
				if($guidedtour != false)
				{
				foreach($guidedtour as $guided) {
				?>
				<div class="col-md-3">
					<div class="papular-reviews">
						<a href="#">
							<div class="image">
								<img alt="Tour Package" src="<?php echo base_url();?>upload/DCguidedtours/<?php echo $guided->photo; ?>" class="img-responsive">
								<span style="position: absolute;top: 10px;right:10px;color: #fff;font-weight: bold;text-transform: captalize;font-size: 18px;">
								<?php $myvalue = $guided->dcname; 
								$arr = explode(' ',trim($myvalue));
								echo $arr[0].' '.'Island';
								?>
								</span>
								<div class="absolute-in-image" style="bottom: -20px;">
									<div class="duration" style="color:#fff;">
										<h6 style="color:#fff;"> <?php echo $guided->dcname; ?>
									<br>Travel Peroid : 
									<?php 
									$stDate = $guided->travel_period_start_date;
									$startDate = date("d", strtotime($stDate));
									
									$enDate = $guided->travel_period_end_date;
									$endDate = date("d M", strtotime($enDate));
									echo $startDate.' ~ '.$endDate; ?><br>
									Price : MYR </h6>
									</div>
								</div>
							</div>
						   
						</a>
					</div>
				</div>
					

						
		<?php	}
					}
					?>
			</div>															
															<div class="col-md-12">
																<div class="load-more-btn" >
																	<p style="border:1px solid #777;">
																		
																		<label id="popularLoadMore1" style="cursor:pointer;color: #635d5d;font-size: 14px;line-height: 14px;">Click to show more...</label>
																		<!--button class="btn-default"> View All Offers<i class="fa fa-angle-right"></i> </button-->
																	</p>
																</div>
																
															</div>
														</div>
													</div>
													</div>
												</div>
											</div>
                                        </div>
                                    </div>
                                </div>
                            </div>                   
                    </div>
                </div>         
        </div>
    </div>

</section>
<div class="separator"></div>
<br>


