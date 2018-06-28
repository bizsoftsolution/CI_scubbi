
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
	<!--Date picker search bar start-->
<link href="<?php echo base_url('assets/new/css/datepicker.css1');?>" rel="stylesheet">
<script type="text/javascript" src="<?php echo base_url('assets/new/js/bootstrap-datepicker.js1');?>"></script>
<link href="https://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url(); ?>assets/guidedtour_datepicter/MonthPicker.min.css" rel="stylesheet" type="text/css" />
	<script src="<?php echo base_url(); ?>assets/guidedtour_datepicter/jquery-ui.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/guidedtour_datepicter/jquery.maskedinput.min.js"></script>
	 <script src="<?php echo base_url(); ?>assets/guidedtour_datepicter/MonthPicker.min.js"></script>
	 
	<!--Date picker search bar end-->
<style>
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
	   width: 50%;
    height: 100%;
	bottom:0;
   }
   .nopstyle
   {
	   width:100%;
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
	   width: 50%;
    height: 100%;
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

    // ]]>
</script>

</head>

<body>


      <header class="index4-header">
         <a class="navbar-brand visible-xs" id="navbar-logo-mobile" href=""><img src="<?php echo base_url(); ?>assets/images/logo-new-chrcle-small.jpg" alt="" class="img-responsive"></a>
         <a href="" class=" visible-xs " style=" font: 400 30px/0.8 'Cookie', Helvetica, sans-serif; padding:30px 15px;">Connecting Drivers Globally </a>
         <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="container-fluid" style="padding-right: 37px!important;">
               <div class="navbar-header col-md-4">
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  </button>
                  <a class="navbar-brand" id="navbar-logo" href="<?php echo base_url(); ?>">
				  <img src="<?php echo base_url(); ?>assets/images/logo-new-chrcle-small.jpg" alt="" class="img-responsive"></a>
				  <div  style=" font: 400 30px/0.8 'Cookie', Helvetica, sans-serif; padding:30px 15px;margin-top: 13px;">Connecting Drivers Globally</div>
				  
               </div>
				<?php 
				foreach($search as $rowsearch)
				//{
				?>
                <div class="col-md-4">
                    <div style="padding:38px 0px;">
					<?php
					$DCsearch = $rowsearch->dccountry;
					
					$query=$this->db->get_where('tbl_country', array('country_id' =>$DCsearch));
					foreach($query->result_array() as $row1)
					{
					echo $row1['country_name']; 
					}
					
					?>
					>
					<?php 
					$DCsearch1 = $rowsearch->dcislands;
					$query=$this->db->get_where('tbl_island', array('island_id' =>$DCsearch1));
					foreach($query->result_array() as $row2)
					{
					echo $row2['island_name']; 
					}
					?>
					>
					<span style="border: 1px solid #000;padding: 10px 2px;"> 
					<a href="<?php echo base_url();?>Front/tellmemore/<?php echo $rowsearch->dcislands."/".$rowsearch->dccountry;?>" target="_blank">Tell Me more</a></span>
					
                    </div>
                </div>
				<?php 
				//}
				?>
               <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" data-hover="dropdown" data-animations="fadeInDown fadeInRight fadeInUp fadeInLeft">
				<?php 
					if($this->session->userdata('user_id')!='')
					{
						if($this->session->userdata('user_type') == 'Customer')
						{
				?>
                  <ul class="nav navbar-nav navbar-right" id="menu-right">
 
                     <li>
                        <a href="<?php echo base_url('Front/becomeapartner');?>" >Become a Partner </a>
					</li>
					<li>
                        <a href="" >Help</a>
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
						}else
						{
							
					?>
					<ul class="nav navbar-nav navbar-right" id="menu-right">
 
                     <li>
                        <a href="<?php echo base_url('Front/becomeapartner');?>" >Become a Partner </a>
					</li>
					<li>
                        <a href="" >Help</a>
					</li>
					<li>						
                        <a href="<?php echo base_url('Customer/customerSignup'); ?>" >Sign Up</a>
					</li>
					<li>						
                        <a href="<?php echo base_url('Customer'); ?>" >Login</a>
                     </li>
                    
                  </ul>
					<?php
						}
						
					}
					else
						{
							
					?>
					<ul class="nav navbar-nav navbar-right" id="menu-right">
 
                     <li>
                        <a href="<?php echo base_url('Front/becomeapartner');?>" >Become a Partner </a>
					</li>
					<li>
                        <a href="" >Help</a>
					</li>
					<li>						
                        <a href="<?php echo base_url('Customer/customerSignup'); ?>" >Sign Up</a>
					</li>
					<li>						
                        <a href="<?php echo base_url('Customer'); ?>" >Login</a>
                     </li>
                    
                  </ul>
					<?php
						}
					
				?>
               </div>
            </div>
        </nav>
    </header>
    <!-- mobile-menu-area-start -->
    
    <!-- mobile-menu-area-end -->
    <!-- mobile-menu-area-end -->

		
        <section class="benifts light-blue">
            <div class="container-fluid">
			
                <div class="col-md-8">
					<div class="row1">
                    <div class="flate-search" style="background-color:#f4f7fa ;margin: 65px 0 0 0;">
						<!--position: fixed;z-index: 9999;box-shadow: 2px 2px 2px 0 rgba(0, 0, 0, 0.1);margin: 8px 0 0 0;-->
                       <style>
					   .table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th
					   {
						      padding: 1px; 
					   }
					   </style>
						<div class="row">
						    <form class="form-inline" role="form" action="<?php echo base_url(); ?>Front/search" method="POST" enctype="multipart/form-data">
								<!--#########jQuery_Date_Range_Picker##########-->
									<div class="row">
										<div class="table-responsive">
											<table class="table">
												<tr>
													<td><b>Dates</b></td>
													<td width="120px">
													<div class="form-group">
													<select class="form-control" name="scountry" id="scountry" required="">
														<?php 
														
														$data1=$this->db->get_where('tbl_country', array('country_id'=>$country))->result_array(); 
														foreach ($data1 as $a) {
															$country_active = $a['is_deactivate'];
															if($country_active == "N")
															{
															?>
														<option class="<?php echo $a['country_id'];?>"><?php echo $a[ 'country_name'];?></option>
														<?php 
														}
														}
															
														?>
														<option label="Select Country">Select Country</option>
														<?php 
														$this->db->select('*');
														$this->db->where('country_id !=' ,$country);
														$data = $this->db->get('tbl_country')->result_array();
														//$data=$this->db->get('tbl_country')->result_array(); 
														foreach ($data as $a) {
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
													</td>
													<td width="150px">
														<div class="form-group">
															<select class="form-control" name="islands" id="islands" required="">
																<?php 
																$data2=$this->db->get_where('tbl_island', array('island_id'=>$islands))->result_array(); foreach ($data2 as $a) {
															
																	?>
																<option class="<?php echo $a['island_id'];?>"><?php echo $a[ 'island_name'];?></option>
																<?php 
																}
																?>
																<option label="Select islands">Select islands</option>
																<?php
															//$data123=$this->db->get_where('tbl_island',array('country_id'=>$country))->result_array(); 
															$this->db->select('*');
															$this->db->where('country_id',$country);
															$data123 = $this->db->get('tbl_island')->result_array();
															
															foreach ($data123 as $ab) {
															
															
															?>
														<option value="<?php echo $ab['island_id'];?>">
															<?php echo $ab['island_name'];?>
														</option>
														<?php 
														
														} ?>
															</select>
														 

														</div>
													</td>
													<td width="110px">
														<div class="form-group">											 
													 <input type="text" id="dpd1" class="form-control"  value="<?php echo $Sdate; ?>" name="checkin">						 
												</div>
													</td>
													<td width="110px">
														<div class="form-group">
															<input type="text" id="dpd2" class="form-control" value="<?php echo $Edate; ?>" name="checkout">
														</div>
													</td>
													<td>
														<link rel="stylesheet" href="https://cdn.rawgit.com/tonystar/bootstrap-float-label/v4.0.1/dist/bootstrap-float-label.min.css"/>
														<div class="form-group input-group">
															
															<label class="has-float-label">
															 <input type="number" class="form-control nopstyle" name="no_of_persons" placeholder="Check Out" value="<?php echo $Noofpersons; ?>" style="" min="1"/>
															</label>
															<span class="input-group-addon">No of Persons</span>
														</div>
													</td>
													<td>
														<input type="submit" class="btn btn-default form-control" value="Search" name="search_result" style="padding:0px 20px;">
													</td>
													<td>&nbsp;</td>
												</tr>
											</table>
										</div>
										<style>
									
										#scountry
													{
														height:35px;
													}
										#islands
													{
														height:35px;
													}
													
													.form-inline .form-control {
														    display: inline-block;
																width: 100%!important;
																vertical-align: middle;
													}
										</style>
									</div>

											
										
											
											<!--#########jQuery_Date_Range_Picker##########-->
                           

                           </form>
						</div>
                       
						<div class="row">
						
                        <br>
                        <button class="btn" id="filter" style="margin: 0 0 0 28px;">Filter</button>
						
                        <script>
                            $(document).ready(function() {
                                $("#filter").click(function() {
                                    $("#filter_div").toggle();
                                });
                            });
                        </script>
						
                        <div id="filter_div" style="display:none;    margin: 15px 0 0 15px;">
                            <form class="form-inline">
                                <!-- Multiple Checkboxes (inline) -->
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="checkboxes">Languages</label>
                                    <div class="col-md-8">
										<?php $fil_lan=$this->db->get('filter_language')->result_array(); foreach ($fil_lan as $fl) {?>
                                        <label class="checkbox-inline" for="checkboxes-0">
                                            <input type="checkbox" name="checkboxes[]" id="<?php echo $fl['id']; ?>" value="<?php echo $fl['name']; ?>" class="ids"> <?php echo ucwords(strtolower($fl['name'])); ?>
                                        </label>
										<?php 
										}
										?>
                                        
                                    </div>
                                </div>
                               <div style="margin:15px 0 0 0;"></div>
                                <!-- Multiple Checkboxes (inline) -->
                                								<style>
								.checkbox-inline + .checkbox-inline, .radio-inline + .radio-inline
								{
										margin-left:0px;
										padding-right:10px;
								}
								</style>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="checkboxes">Infrastructure</label>
                                    <div class="col-md-9">
										<?php $fil_infra=$this->db->get('filter_infrastructure')->result_array(); foreach ($fil_infra as $fi) {?>
                                        <label class="checkbox-inline col-md-3" for="checkboxes-0" >
                                            <input type="checkbox" name="checkboxes" id="<?php echo $fi['id']; ?>" value="<?php echo $fi['name']; ?>"> <?php echo ucwords(strtolower($fi['name'])); ?>
                                        </label>
										<?php } ?>
                                        
                                    </div>
                                </div>

                            </form>
                        </div>


                        <br>
                        <div style="padding-bottom:20px;padding-top:10px;    margin: 0 0 0 15px;">
                            <div class="col-md-6">
                                Additional fees apply. Taxes may be added
                            </div>
                            <div class="col-md-6" style="text-align:right;">
							
                                <?php 
								echo $num_rows; 
								?> Dive Centers
                            </div>
                        </div>
						
					</div>	
						
                    </div>
					</div>
                    <br>
					<!--div class="row wrapper" style="overflow-y: scroll;">
						
							<div id="country_table">
								
							</div>
							<div align="right" id="pagination_link"></div>


						<script>
						$(document).ready(function(){

						 function load_country_data(page)
						 {
						  $.ajax({
						   url:"<?php echo base_url(); ?>Front/pagination/"+page,
						   method:"GET",
						   dataType:"json",
						   success:function(data)
						   {
							$('#country_table').html(data.country_table);
							$('#pagination_link').html(data.pagination_link);
						   }
						  });
						 }
						 
						 load_country_data(1);

						 $(document).on("click", ".pagination li a", function(event){
						  event.preventDefault();
						  var page = $(this).data("ci-pagination-page");
						  load_country_data(page);
						 });

						});
						</script>
					</div-->
                    <div class="row wrapper" style="overflow-y: scroll;">
						<?php 
						foreach($search as $rowsearch)
						{
						?>
                        <div class="col-md-6" >
                            <div class="row" >
								<div class="ajax_result">
									<div class="col-md-12">
										<div class="thumbnail" style="border:1px solid #000;">
										<?php

										$date = new DateTime(str_replace("/","-",$Sdate));
										$newStart = $date->format('d-m-Y');
										
										$date1 = new DateTime(str_replace("/","-",$Edate));
										$newEnd = $date1->format('d-m-Y');
										
										?>
											<a href="<?php echo base_url(); ?>Front/divecenter/<?php echo $rowsearch->id;?>/<?php echo $newStart."/".$newEnd."/".$Noofpersons; ?>" target="_blank">
											  <img src="<?php echo base_url();?>upload/DCprofile/<?php echo $rowsearch->dcimage;?>" alt="Nature" style="width:350px;height:200px;">
											  <div class="caption">
												<div class="row">
												<div class="col-md-6" style="font-size: 11px;padding-bottom: 10px;">
													<a target="_blank" href="<?php echo base_url(); ?>Front/divecenter/<?php echo $rowsearch->id;?>/<?php echo $newStart."/".$newEnd."/".$Noofpersons; ?>" style="font-size:13px;">
													<?php echo $rowsearch->dcname; ?><br>
													From MYR 316(2 Dives/day)</a>
												</div>
												<div class="col-md-6" style="font-size: 11px;">
													<?php 
														$dcaffliation = $rowsearch->dcaffiliation; 
														$fetch_dcaffliation = explode(",",$dcaffliation);
														
														$dclanguage = $rowsearch->dclanguage; 
														$fetch_dclang = explode(",",$dclanguage);
													?>
													
													<?php 
													foreach($fetch_dcaffliation as $fvdc)
													{
													echo '<span style="margin: 0px;text-align: right;float: right;padding-bottom: 0px;">';
													echo $fvdc.' | ';
													echo '</span>';
													}
													
													foreach($fetch_dclang as $fvdclang)
													{
													echo '<input type="hidden" name="language" value="'.$fvdclang.'">';
													}
													?>
													<BR>
													<span style="">4.6 <i class="fa fa-star" aria-hidden="true" style="color:#ffe63b;"></i> 23 Reviews</span>
												</div>
												</div>
											  </div>
											</a>
										</div>
									</div>
								</div>
                            </div>
                        </div>

                        <?php 
						}// ?>
                       
                    </div>
					<div id="getdata" style="border:2px dotted #ededed;height:auto;"></div>
					<div class="row">
						<div class="col-md-12">
							<?php echo $page; ?> - <?php echo $per_page; ?> of <?php echo $num_rows; ?> Dive Center
							<nav aria-label="...">
							   <?php echo $links; ?>
							</nav>
						</div>
                        
					</div>
						
                </div>
				<?php 
				//$g++;
				//} ?>
				
                
                <div class="col-md-4" style="padding:0px;">
				<div id="overlay">
					<div class="wrapper1">
						<?php 
				foreach($search as $get_val)
				{
				$get_id = $get_val->id;
				$data=$this->db->get_where('tbl_dcprofile', array('id' => $get_id));
				//$this->db->get('tbl_dcprofile')->result_array(); 
					foreach ($data->result_array() as $a) {
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
<div id="dvMap" style="height: 100%;width:100%;"></div>
<!--iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d127521.05457601185!2d104.10029351132222!3d2.806480406382707!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31c51b92f94cd239%3A0xb7b7e438fc01e28e!2sTioman+Island!5e0!3m2!1sen!2sin!4v1491202602826" width="400" height="650" frameborder="0" style="border:0" allowfullscreen></iframe-->
<!--iframe width="400" height="780" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?q=11.0168,76.9558&hl=es;z=14&amp;output=embed"></iframe><br /><small><a href="https://maps.google.com/maps?q='+data.lat+','+data.lon+'&hl=es;z=14&amp;output=embed" style="color:#0000FF;text-align:left" target="_blank">See map bigger</a></small-->
					</div>
				</div>
				
                </div>


            </div>



        </section>
		
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