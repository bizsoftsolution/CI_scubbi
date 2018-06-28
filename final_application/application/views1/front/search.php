<?php 
if($country == "")
{
	redirect('Front');
}
?>
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
<link href="<?php echo base_url(); ?>assets/frontend/jquery-ui.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url(); ?>assets/guidedtour_datepicter/MonthPicker.min.css" rel="stylesheet" type="text/css" />
	<script src="<?php echo base_url(); ?>assets/guidedtour_datepicter/jquery-ui.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/guidedtour_datepicter/jquery.maskedinput.min.js"></script>
	 <script src="<?php echo base_url(); ?>assets/guidedtour_datepicter/MonthPicker.min.js"></script>
	<style> 
	<!--Date picker search bar end-->
	playground-container {
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
.thumbnail .caption
{
	    border-top: 2px solid #6ff;
}
</style>
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
	   width: 100%;
    height: 100%;
	bottom:0;
	padding:0 15px;
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
	    width: 100%;
    height: 100%;
	bottom:0;
	padding:0 15px;
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
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window,document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
 fbq('init', '529670250723692'); 
fbq('track', 'PageView');
</script>
<noscript>
 <img height="1" width="1" 
src="https://www.facebook.com/tr?id=529670250723692&ev=PageView
&noscript=1"/>
</noscript>
<script src="<?php echo base_url(); ?>assets/autochange/jquery.min.js1"></script>

		<script>
			function executeQuery() {
			  $.ajax({
				url: '<?php echo base_url(); ?>Front/findMessageCount',
				success: function(data) {
				  // do something with the return value here if you like
				  if(data > 0)
				  {
					  $('#messageCountSpan').html(data);
				  }
				  else
				  {
					  $('#messageCountSpan').html('');
				  }
				  
				}
			  });
			  setTimeout(executeQuery, 5000); // you could choose not to continue on failure...
			}

			$(document).ready(function() {
			  // run the first time; all subsequent calls will take care of themselves
			  setTimeout(executeQuery, 5000);
			});		
		</script>



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
<script>

			localStorage.LoginID='<?php echo $this->session->userdata('user_id'); ?>';
			sessionStorage.LoginID='<?php echo $this->session->userdata('user_id'); ?>';
			function page_onfocus()
			{		
				if(localStorage.LoginID!=sessionStorage.LoginID)
				{
					location.reload();
				}
			}
		</script>
</head>

<body onfocus='page_onfocus()'>


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
		//		foreach($search as $rowsearch)
				//{
				?>
                <div class="col-md-3" style="padding:0px;">
                    <div style="padding:38px 0px;">
					<?php
					$DCsearch = $country; //$rowsearch->dccountry;
					//echo("C: $country");
					$query=$this->db->get_where('tbl_country', array('country_id' =>$DCsearch));
					foreach($query->result_array() as $row1)
					{
					echo $row1['country_name']; 
					}
					
					?>
					>
					<?php 
					$DCsearch1 = $islands; //$rowsearch->dcislands;
					$query=$this->db->get_where('tbl_island', array('island_id' =>$DCsearch1));
					foreach($query->result_array() as $row2)
					{
					echo $row2['island_name']; 
					}
					?>
					>
					<span style="border: 1px solid #000;padding: 10px 2px;"> 
					<a href="<?php echo base_url();?>Front/tellmemore/<?php echo  $islands."/".$country;?>" target="_blank">Tell Me more</a></span>
					
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
			    
<?php 

						$this->db->where('to', $this->session->userdata('user_id'));
						$this->db->where('is_read', 0);
						$query = $this->db->get('messages');
						$notification= $query->num_rows();
?>
                <a href="<?php echo base_url('Customer/allMessages');?>" ><i class="fa fa-envelope-o" style="color:#000;"><span id="messageCountSpan" class="badge badge-danger" style="background-color: red;position: absolute;top: 0px;left: 0px;"><?php if($notification != 0) { echo $notification; ?> <?php } else {	
					}?></span></i></a>
              </li>
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
							<a href="<?php echo base_url('Customer/customerDashboard');?>" class="dropdown-toggle1" data-toggle="dropdown1" style="padding: 0px 0px;border-radius:50%">
							<img src="<?php echo base_url();?>upload/customerprofile/<?php echo $a1->photo; ?>" style="width:50px;height:50px;" class="profile-image img-circle"> <!--Username <b class="caret"></b--></a>
							<?php 
							}
							else
							{
								?>
								<a href="<?php echo base_url('Customer/customerDashboard');?>" class="dropdown-toggle1" data-toggle="dropdown1" style="padding: 0px 0px;border-radius:50%">
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
					<li><a href="#" data-toggle="modal" data-target=".register-model">Signup/Register</a></li>
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
                        <a href="<?php echo base_url('Front/becomeapartner');?>" >Become a Partner </a>
					</li>
					<li>
                        <a href="" >Help</a>
					</li>
					<li><a href="#" data-toggle="modal" data-target=".register-model">Signup/Register</a></li>
					<li><a href="#" data-toggle="modal" data-target=".login-model"> Login</a></li>
                    
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
                    <div class="" style="background-color:#f4f7fa ;margin: 65px 0 0 0;">
						<!--position: fixed;z-index: 9999;box-shadow: 2px 2px 2px 0 rgba(0, 0, 0, 0.1);margin: 8px 0 0 0;-->
                       <style>
					   .table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th
					   {
						      padding: 1px; 
					   }
					   </style>
					   <div class="mbl_search_responsive">
						<div class="row">
						    <form class="form-inline" role="form" action="<?php echo base_url(); ?>Front/search" method="POST" enctype="multipart/form-data">
								<!--#########jQuery_Date_Range_Picker##########-->
									<div class="form-group col-md-2" style=" padding: 0px;">
										<select class="form-control" name="scountry" id="scountry" required="">
														<?php 
/*														
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
*/															
														?>
														<option label="Select Country">Select Country</option>
														<?php 
														$this->db->select('*');
														$this->db->where('is_deactivate' ,'N');
														$data = $this->db->get('tbl_country')->result_array();
														//$data=$this->db->get('tbl_country')->result_array(); 
														foreach ($data as $a) {
//															$country_active = $a['is_deactivate'];
//															if($country_active == "N")
//															{
															?>
														<option value=<?php echo '"' . $a['country_id'] . ($a['country_id'] == $country ? '" selected' : '"') ; ?>>
															<?php echo $a['country_name'];?>
														</option>
														<?php 
//														}
														} ?>
													</select>
									</div>
									<div class="form-group col-md-2" style=" padding: 0px;">
															<select class="form-control" name="islands" id="islands" required="">
																<?php 
/*
																$data2=$this->db->get_where('tbl_island', array('island_id'=>$islands))->result_array(); foreach ($data2 as $a) {
															
																	?>
																<option class="<?php echo $a['island_id'];?>"><?php echo $a[ 'island_name'];?></option>
																<?php 
																}
*/
																?>
																<option label="Select islands">Select islands</option>
																<?php
															//$data123=$this->db->get_where('tbl_island',array('country_id'=>$country))->result_array(); 
															$this->db->select('*');
															$this->db->where('country_id',$country);
															$data123 = $this->db->get('tbl_island')->result_array();
															
															foreach ($data123 as $ab) {
															
															
															?>
														<option value=<?php echo '"' . $ab['island_id'] .'"' . ($ab['island_id']==$islands ? ' selected':'' );?>>
															<?php echo $ab['island_name'];?>
														</option>
														<?php 
														
														} ?>
															</select>
														 

														</div>
									<div class="form-group col-md-2" style=" padding: 0px;">											 
													 <input type="text" id="dpd1" class="form-control"  value="<?php echo $Sdate; ?>" name="checkin" style="float:none;">						 
												</div>
									<div class="form-group col-md-2" style=" padding: 0px;">
															<input type="text" id="dpd2" class="form-control" value="<?php echo $Edate; ?>" name="checkout" style="float:none;">
														</div>
									<div class="form-group col-md-3" style=" padding: 0px;">
											<div class="input-group" >
													<input type="number" class="form-control nopstyle" name="no_of_persons" placeholder="Check Out" value="<?php echo $Noofpersons; ?>"  min="1" style="margin-top:0px;z-index: 1;"/>
													<span class="input-group-addon">No. of Person</span>
												</div>
										</div>
										
									<!--div class="form-group input-group col-md-2">
										<link rel="stylesheet" href="https://cdn.rawgit.com/tonystar/bootstrap-float-label/v4.0.1/dist/bootstrap-float-label.min.css"/>
										<label class="has-float-label">
															 <input type="number" class="form-control nopstyle" name="no_of_persons" placeholder="Check Out" value="<?php echo $Noofpersons; ?>"  min="1"/>
															</label>
															<span class="input-group-addon">No of Persons</span>
													</div-->
									<div class="form-group col-md-1" style=" padding: 0px;">
									<input type="submit" class="btn btn-default form-control" value="Search" name="search_result" style="padding:0px 10px;">
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
								

											
										
											
											<!--#########jQuery_Date_Range_Picker##########-->
                           

                           </form>
						</div>
						</div>
                    <div class="row">
					   <div id="demo" class="box jplist" style="margin: 20px 0 50px 0">
					   
						<div class="row">
							
							<!-- ios button: show/hide panel -->
							<div class="jplist-ios-button">
								<i class="fa fa-sort"></i>
								Scubbi Filter
							</div>
							
							<!-- panel -->
					<div class="jplist-panel box panel-top">						
						
						<div class="row">
							<button class="btn" id="filter" style="margin: 10px 0 0 28px;">Filter</button>
						</div>
						
						<div class="row">
						<div id="filter_div" style="display:none;margin: 15px 0px 0px 30px;">
								<div class="table-responsive">
								<table class="table">
									<tr>
										<td><label class="col-md-12 control-label" for="checkboxes">Languages : </label></td>
										<td>
										<label class="col-md-12 control-label" for="checkboxes">
											<div
										   class="jplist-group"
										   data-control-type="checkbox-text-filter"
										   data-control-action="filter"
										   data-control-name="keywords"
										   data-path=".keywords"
										   data-logic="or">
										   
										<?php $fil_lan=$this->db->get('filter_language')->result_array(); foreach ($fil_lan as $fl) {?>	
										<input 
										  value="<?php echo $fl['name']; ?>" 
										  id="<?php echo $fl['name']; ?>" 
										  type="checkbox" 									
										/> 
						   
										<label for="<?php echo $fl['name']; ?>"><?php echo ucwords(strtolower($fl['name'])); ?></label>
										<?php 
										}
										?>
										</div>
										</label>
										</td>
									</tr>
									<tr>
										<td><label class="col-md-12 control-label" for="checkboxes">Infrastructure : </label></td>
										<td>
										<label class="col-md-12 control-label" for="checkboxes">
											<div
										   class="jplist-group"
										   data-control-type="checkbox-text-filter"
										   data-control-action="filter"
										   data-control-name="keywords1"
										   data-path=".keywords1"
										   data-logic="or">
										<?php $fil_infra=$this->db->get('filter_infrastructure')->result_array(); foreach ($fil_infra as $fi) {?>   
										  <input 
										  value="<?php echo $fi['name']; ?>" 
										  id="<?php echo $fi['name']; ?>" 
										  type="checkbox" 									
										/> 
						   
										<label for="<?php echo $fi['name']; ?>"> <?php echo ucwords(strtolower($fi['name'])); ?></label>
										<?php 
										}
										?>
										</div>
										</label>
										</td>
									</tr>
								</table>
								</div>
                                <!-- Multiple Checkboxes (inline) -->
                               
                               <div style="margin:15px 0 0 0;"></div>
                                <!-- Multiple Checkboxes (inline) -->
                                <style>
								.checkbox-inline + .checkbox-inline, .radio-inline + .radio-inline
								{
										margin-left:0px;
										padding-right:10px;
								}
								</style>
                                

                            
                        </div>
						</div>
						
                        <div class="row" style="padding-bottom:20px;padding-top:10px;">
                            <div class="col-md-5">
								<p style="margin: 15px 15px;">
                                Additional fees apply. Taxes may be added
								</p>
                            </div>
                            <div class="col-md-7">
								<p>
								
								<div 
								   class="jplist-label" 
								   data-type="{start} - {end} of {all}"
								   data-control-type="pagination-info" 
								   data-control-name="paging" 
								   data-control-action="paging"
								   style="float: right;margin: 15px 25px;"
								   >
								</div>
								
                                </p>
								<!--p style="float:right;"> <?php 
								echo $num_rows; 
								?> Dive Centers &nbsp; </p-->
                            </div>
							
                        </div>
						
						
						
						<!-- checkbox filters -->
						
						
					</div>
						</div>
							
					
					
					
					<div class="row">
							<div class="list box text-shadow">
								<!-- item 1 -->
							
							
								<?php
							
						foreach($search as $rowsearch)
						{
						?>
							<div class="list-item box">						
                        <div class="col-md-6" >

                            <div class="row" >
								<div class="ajax_result">
									<div class="col-md-12">
										<div class="thumbnail" style="border:3px solid #000;height: 300px;">
										<?php

										$date = new DateTime(str_replace("/","-",$Sdate));
										$newStart = $date->format('d-m-Y');
										
										$date1 = new DateTime(str_replace("/","-",$Edate));
										$newEnd = $date1->format('d-m-Y');

										// Check for product from Leisure Dive
										$this->db->where('user_id',$rowsearch->user_id);
										$this->db->where('product_status','Available');
										$this->db->order_by('product_price','asc');
										$dclprod = $this->db->get('tbl_dcleisure')->result_array();
										//$data=$this->db->get('tbl_country')->result_array(); 
										$pdesc = "";
										foreach ($dclprod as $dcp) {
											$pdesc = "From RM" . $dcp['product_price'] . ($dcp['max_dive_day'] == 0 ? "" : " (" .$dcp['max_dive_day'] . " dives/day)");
										}
										if ($pdesc == "") {
											$this->db->where('user_id',$rowsearch->user_id);
											$this->db->where('product_status','Available');
											$this->db->order_by('product_normal_rate','asc');
											$dccprod = $this->db->get('tbl_dccourses')->result_array();
											foreach ($dccprod as $dcp) {
												$pdesc = "From RM" . $dcp['product_normal_rate'] . ($dcp['max_dive_day'] == 0 ? "" : " (" .$dcp['max_dive_day'] . " dives/day)");
											}
										}
										if ($pdesc == "") {
											$pdesc = "Coming soon!";
										}										
										
										?>
											<a href="<?php echo base_url(); ?>Front/pre_divecenter/<?php echo $rowsearch->id;?>/<?php echo $newStart."/".$newEnd."/".$Noofpersons; ?>" target="_blank">
											<?php 
												if($rowsearch->dcimage == "")
												{
											?>
												<img src="<?php echo base_url();?>upload/DCprofile/default-logo.png" alt="Nature" style="width:350px;height:200px;">
											<?php											
													
												}
												else
												{
													
											?>
											  <img src="<?php echo base_url();?>upload/DCprofile/<?php echo $rowsearch->dcimage;?>" alt="Nature" style="width:350px;height:200px;">
											  <?php
												}
												
												?>
											  <div class="caption">
												<div class="row">
												<div class="col-md-6" style="font-size: 11px;padding-bottom: 10px;">
													<a target="_blank" href="<?php echo base_url(); ?>Front/pre_divecenter/<?php echo $rowsearch->id;?>/<?php echo $newStart."/".$newEnd."/".$Noofpersons; ?>" style="font-size:13px;">
													<?php echo $rowsearch->dcname; ?><br>
													<?php echo $pdesc; ?></a>
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
													<?php
													
														$this->db->select('round(avg((`price_rating`+ `services_rating` + `facilities_rating` + `equipment_rating`)/4),1) as arating, count(*) cnt');
														$this->db->where('divecenter_id',$rowsearch->user_id);
														$dcrev = $this->db->get('tbl_review')->result_array();
														$rdesc = "";
														$rcnt = "";
														foreach ($dcrev as $dcr) {
															if ($dcr['cnt']  == 0) {
																$rdesc = "no rating yet.";
															} else {
																$rdesc = $dcr['arating'];
																$rcnt = $dcr['cnt'];
															}
														}

													?>
													<span style=""><?php echo $rdesc; if ($rdesc != 'no rating yet.'){ ?> <i class="fa fa-star" aria-hidden="true" style="color:#ffe63b;"></i> <?php echo $rcnt . " Reviews" ; } ?></span>
												</div>
												</div>
											  </div>
											</a>
										</div>
									</div>
								</div>
                            </div>
							<p class="keywords" style="display:none;">
								<?php 
									$dclanguage = $rowsearch->dclanguage; 
									$fetch_dclanguage = explode(',', trim($dclanguage, ','));
									
									$dcfacilities = $rowsearch->dcfacilities; 
									$fetch_dcfacilities = explode(',', trim($dcfacilities, ','));
									
									
									
									echo $test = implode(",", $fetch_dclanguage);
									
								?>	
							</p>
							<p class="keywords1" style="display:none;">
								<?php echo $test1 = implode(",", $fetch_dcfacilities); ?>
							</p>
                        </div>
						</div>
                        <?php 
						}
						?>
	
							
							
							</div>
						</div>
						<div class="row">	
						<div class="box jplist-no-results text-shadow align-center">
							<p>No results found</p>
						</div>	
						
						</div>
						<hr style="width:100%;">
						<div class="row">
						<!-- ios button: show/hide panel -->
						<div class="jplist-ios-button">
							<i class="fa fa-sort"></i>
							Scubbi Filter
						</div>
						<div class="jplist-panel box panel-top">						
						
                        <!-- items per page dropdown -->
                        <div 
                           class="jplist-drop-down" 
                           data-control-type="items-per-page-drop-down" 
                           data-control-name="paging" 
                           data-control-action="paging"
							style="margin: 15px 15px;"
						   >

                           <ul>
                             <li><span data-number="3"> 3 per page </span></li>
                             <li><span data-number="5"> 5 per page </span></li>
                             <li><span data-number="10" data-default="true"> 10 per page </span></li>
                             <li><span data-number="all"> View All </span></li>
                           </ul>
                        </div>
                        
						<div 
						   class="jplist-label" 
						   data-type="Page {current} of {pages}" 
						   data-control-type="pagination-info" 
						   data-control-name="paging" 
						   data-control-action="paging"
						    style="float:right;margin: 25px 25px;"
						   >
						</div>	

						<div 
						   class="jplist-pagination" 
						   data-control-type="pagination" 
						   data-control-name="paging" 
						   data-control-action="paging"
						    style="float:right;margin: 15px 25px;"
						   >
						</div>			
						
					</div>
						
						</div>
						</div>
						
						</div>
						<script>
                            $(document).ready(function() {
                                $("#filter").click(function() {
                                    $("#filter_div").toggle();
                                });
                               
                            });
                        </script>
						
						
                    </div>
					</div>
                    
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
                    
						
                </div>
				<?php 
				//$g++;
				//} ?>
				
                
                <div class="col-md-4" style="padding:0px;background:#fff;">
				<div id="overlay">
					<div class="wrapper1">
					
						<?php 
						
				if ($search =='fail') {
					$markers[] = array(
					'lat' => '3.157',
					'lng' => '101.712',
					'title' => 'None' 
					);
				} else {
					//$markers = "";
				foreach($search as $get_val)
				{
					$this->db->select('*');
					//$this->db->where('country_id',$country);
					$this->db->where('island_id',$islands);
					$dpdata = $this->db->get('tbl_divepoints')->result_array();
					foreach($dpdata as $dp)
					{
						$markers[] = array(
						'lat' => $dp['coords_x'],
						'lng' => $dp['coords_y'],
						'description' => $dp['name'],
						'title' => $dp['name']
						//'icon' => 'https://cdn2.iconfinder.com/data/icons/social-media-8/512/pointer.png'
						);
					}
					
					$icon = base_url('upload/2.png');
					$get_id = $get_val->id;
					$data=$this->db->get_where('tbl_dcprofile', array('id' => $get_id));
				//$this->db->get('tbl_dcprofile')->result_array(); 
					foreach ($data->result_array() as $a) {
						$markers[] = array(
						'lat' => $a['dcgps_x'],
						'lng' => $a['dcgps_y'],
						'description' => $a['dcname'],
						'title' => $a['dcname'],
						'icon' => $icon 
						);
				}
				//$markers = array_merge($markers1,$markers2);
				}
				}
				?>
				

		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBLorhG6yww2PIYnW-C_d-D2MTmoZfa33w" type="text/javascript"></script>
		<script type="text/javascript">// <![CDATA[
		var markers = <?php echo json_encode($markers); ?>;
		window.onload = function () {
		var mapOptions = {
		center: new google.maps.LatLng(markers[0].lat, markers[0].lng),
		minZoom: 1,
        maxZoom: 19,
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
		icon: data.icon,
		//label: data.title
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