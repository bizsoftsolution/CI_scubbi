<?php 
			if($this->session->userdata('user_id') != '')
			{
		?>		
<!-- mobile-menu-area-end -->
         <section class="dashboard-menu dashboard-menu-2 light-blue" style="margin: 60px 0 0 0;">
            <div class="container" style="width:100%;padding:5px 0 0 3px">
               <div class="row">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                     <div class="dashboard-menu-container" style="background-color: #66ffff;">
                        <ul>
                           <li>
                              <a href="<?php echo base_url('Customer/customerDashboard'); ?>">
                                 <div class="menue-name"> Home </div>
                              </a>
                           </li>
                           <li class="active">
                              <a href="<?php echo base_url('Customer/customerProfile'); ?>">
                                 <div class="menue-name">Profiles</div>
                              </a>
                           </li>
                           <li>
                              <a href="<?php echo base_url('Customer/customerMydiveTrips'); ?>">
                                 <div class="menue-name">My Dive Trips</div>
                              </a>
                           </li>
                           <li>
                              <a href="<?php echo base_url('Customer/allMessages'); ?>">
                                 <div class="menue-name">My Messages</div>
                              </a>
                           </li>
						   <li>
                              <a href="<?php echo base_url('Customer/myCart'); ?>">
                                 <div class="menue-name">My Cart</div>
                              </a>
                           </li>
                           <li>
                              <a href="<?php echo base_url('Customer/customerDivecredits'); ?>">
                                 <div class="menue-name">Dive Credits</div>
                              </a>
                           </li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <section class="dashboard light-blue">
            <div class="container">
               <div class="row" style="background: #FFF;">
			   
			   <?php 
				foreach($edit_customerprofile as $row)
				{
			   ?>
			  
               	  <div class="col-md-3 col-sm-12 col-xs-12">
					
                     <div class="main-box profile-box-contact">
                     	<div class="col-md-12 col-sm-12 col-xs-12 nopadding">
                            <div class="profile-box-header blue-bg">
	<form class="form-horizontal" name="add" method="POST" action="<?php echo  base_url();?>Customer/Updatephoto/<?php echo $row->id; ?>" 
			   enctype="multipart/form-data">
                                <div class="col-md-12 text-center">
									<div id="dvPreview">
									<?php 
										if($row->photo != NULL)
										{
									?>
                                   <img src="<?php echo base_url(); ?>upload/customerprofile/<?php echo $row->photo; ?>" alt="" class="profile-img img-responsive" style="width:100%;height:auto;"/>
								   <?php 
										}
										else
										{
									?>
									 <img src="<?php echo base_url(); ?>upload/customerprofile/user.png" alt="" class="profile-img img-responsive" style="width:100%;height:auto;"/>
									<?php
										}
								   ?>
								   </div>
								   <input id="fileupload" type="file" multiple="multiple" name="cProfile" />
								  
									<script language="javascript" type="text/javascript">
									$(function () {
										$("#fileupload").change(function () {
											if (typeof (FileReader) != "undefined") {
												var dvPreview = $("#dvPreview");
												dvPreview.html("");
												var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.jpg|.jpeg|.gif|.png|.bmp)$/;
												$($(this)[0].files).each(function () {
													var file = $(this);
													if (regex.test(file[0].name.toLowerCase())) {
														var reader = new FileReader();
														reader.onload = function (e) {
															var img = $("<img />");
															img.attr("style", "height:100px;width: 100px");
															img.attr("src", e.target.result);
															dvPreview.append(img);
														}
														reader.readAsDataURL(file[0]);
													} else {
														alert(file[0].name + " is not a valid image file.");
														dvPreview.html("");
														return false;
													}
												});
											} else {
												alert("This browser does not support HTML5 FileReader.");
											}
										});
									});
									</script>
                                   <!--h2>Jessica Daisy</h2>
                                   <ul class="contact-details">
                                      <li>
                                         <i class="fa fa-map-marker"></i> UK London
                                      </li>
                                      <li>
                                         <i class="fa fa-envelope"></i> jessica@admin.com
                                      </li>
                                      <li>
                                         <i class="fa fa-phone"></i> (123) 000-9876
                                      </li>
                                   </ul-->
                               </div>
                               <div class="col-md-12 col-sm-5 col-xs-12">
									<h4 align="center"><?php echo $row->firstname;?></h4>
									<p align="center">Joined since 1st May 2017</p>
                               </div>
							   <h4 align="center">
									<input type="submit" name="update_photo" value="UPLOAD PHOTO" style="border:none;background:none;text-decoration:underline;font-weight:bold;">
							   </h4>
							   </form>
                            </div>
                        </div>
						
                        <!--div class="col-md-12 col-sm-12 col-xs-12 nopadding">
                            <div class="profile-box-footer">
                               <a href="#">
                               <span class="value">783</span>
                               <span class="label">Ads Posted</span>
                               </a>
                               <a href="#">
                               <span class="value">912</span>
                               <span class="label">Followers</span>
                               </a>
                               <a href="#">
                               <span class="value">83</span>
                               <span class="label">Messages</span>
                               </a>
                            </div>
                        </div-->
                     </div>
					 <div class="col-md-12 col-sm-5 col-xs-12">
							
							<p align="center" style="font-weight:bold;text-decoration:underline"><a href="<?php echo base_url('Customer/customerChangepassword'); ?>/<?php echo $row->user_id;?>">CHANGE MY PASSWORD</a></p>
					   </div>
					  
                  </div>
                  <div class="col-md-9 col-sm-12 col-xs-12">
                     <div style="margin:20px 0 0 0;">
						<div class="panel-group">
							<div class="panel panel-default">
							  <div class="panel-heading" style="font-size:19px;font-weight:bold;">
								<div class="row">
									<div class="col-md-6">
										Profile Details
									</div>
									<div class="col-md-6 text-right" >
										<a href="<?php echo base_url('Customer/customerProfile');?>" class="btn btn-success"> Back To Profile</a>
									</div>
								</div>
							  </div>
							  <div class="panel-body">
									 <form class="form-horizontal" name="add" method="POST" action="<?php echo  base_url();?>Customer/Updatecustomerprofile/<?php echo $row->id; ?>" 
			   enctype="multipart/form-data">
									<div class="form-group">
										<label class="control-label col-sm-3" for="text">First Name:</label>
										<div class="col-sm-9">
										  <input type="text" class="form-control" id="text" name="firstname" value="<?php echo $row->firstname; ?>" required="">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3" for="text">Last Name:</label>
										<div class="col-sm-9">
										  <input type="text" class="form-control" id="text" name="lastname" value="<?php echo $row->lastname;?>" required="">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3" for="text">I AM:</label>
										<div class="col-sm-9">
											<?php 
											$chkbox1 = $row->gender; 
											?>
											<label class="radio-inline"><input type="radio" name="gender" value="Male"  <?php echo ($chkbox1=='Male')?'checked':'' ?>>Male</label>
											<label class="radio-inline"><input type="radio" name="gender" value="Female" <?php echo ($chkbox1=='Female')?'checked':'' ?>>Female</label>
										</div>
									</div>
									<div class="form-group">
									  <label class="control-label col-sm-3" for="sel1">Date of Birth:</label>
									  <div class="col-sm-9">
											<?php 
												$start_dd = $row->dob;
												$start_dd_range =date("mm/dd/yyyy", strtotime($start_dd));
											?>
											<input type="date" name="dob" value="<?php echo $start_dd; ?>" required="">
											<!--label class="checkbox-inline"><select class="form-control" >
												<option value="0">Month</option>
												<option value="Jan">Jan</option>
												<option value="Feb">Feb</option>
												<option value="Mar">Mar</option>
												<option value="Apr">Apr</option>
												<option value="May">May</option>
												<option value="Jun">Jun</option>
												<option value="Jul">Jul</option>
												<option value="Aug">Aug</option>
												<option value="Sep">Sep</option>
												<option value="Oct">Oct</option>
												<option value="Nov">Nov</option>
												<option value="Dec">Dec</option>
											</select></label>
											<label class="checkbox-inline">
											<select class="form-control" >
												<option value="0">Date</option>
												<option>1</option>
												<option>2</option>
												<option>3</option>
												<option>4</option>
												<option>5</option>
												<option>6</option>
												<option>7</option>
												<option>8</option>
												<option>9</option>
												<option>10</option>
											</select>
											</label>
											<label class="checkbox-inline">
											<select class="form-control">
												<option value="0">Year</option>
												<option>1985</option>
												<option>1986</option>
												<option>1987</option>
												<option>1988</option>
												<option>1989</option>
												<option>1990</option>
												<option>1991</option>
												<option>1992</option>
												<option>1993</option>
												<option>1994</option>
												<option>1995</option>
												<option>1996</option>
											</select>
											</label-->
									  </div>
									  
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3" for="text">Email Address:</label>
										<div class="col-sm-9">
										  <input type="email" class="form-control" id="text" name="email" value="<?php echo $row->email;?>" required="">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3" for="text">Contact Number:</label>
										<div class="col-md-9">
											<!--div class="col-md-9">
												<div class="table-responsive">
												<table id="TextBoxesGroup" class="table">
													<tr class="type">
														<td>
															<label class="control-label" for="text">Select Country</label>
														</td>
														<td>
															<select name="" style="width:100px;">
																<option value="1">Country</option>
																<?php $data1=$this->db->get('tbl_phonecode')->result(); foreach ($data1 as $a) {?>
																
																<option value="<?php echo $a->country_code_plus;?>"><?php echo $a->name.'('.$a->country_code_plus.')'; ?></option>
																<?php 
																}
																?>
															</select>
														</td>
														<td>
															<label>Phone No</label>
														</td>
														 <td>
															<input type="text" name="name" style="width:150px;"/>
														</td>
														<td>
															<input type="button" id="addButton" value="Add More" />
														</td>
														<td>
															<input type="button" id="removeButton" value="Remove" />
														</td>
													</tr>
													
												</table>
												</div>
											</div-->
											
											

											<!--script>
												$(function () { // Short way for document ready.
												$("#addButton").on("click", function () {
													if ($(".type").length > 2) { // Number of boxes.
														alert("Only 3 textboxes allow");

														return false;
													}

													var newType = $(".type").first().clone().addClass("newAdded"); // Clone the group and add a new class.
													var newName = $(".name").first().clone().addClass("newAdded"); // Clone the group and add a new class.

													newType.appendTo("#TextBoxesGroup"); // Append the new group.
													newName.appendTo("#TextBoxesGroup"); // Append the new group.
												});

												$("#removeButton").on("click", function () {
													if ($(".type").length == 1) { // Number of boxes.
														alert("No more textbox to remove");

														return false;
													}

													$(".type").last().remove(); // Remove the last group.
													$(".name").last().remove(); // Remove the last group.
												});

												$("#resetButton").on("click", function () {
													$(".newAdded").remove(); // Remove all newly added groups.
												});
											});
											</script-->
											<!--div class="field_wrapper">
											<div>
												<a href="javascript:void(0);" class="add_button" title="Add field">
												<img src="<?php echo base_url(); ?>/upload/images/plus.png" style="width:25px; height:25px;"/> Add New Number</a>
											</div>
											</div-->
											
											<?php 
												if($row->contactno != '')
												{
											?>
											<div class="row">
												<?php 
												$fetch_mno = $row->contactno;
												$fetch_number = explode(',', $fetch_mno);
												foreach($fetch_number as $fetch_row)
												{
												
												?>
												<div class="col-md-3">
													<input type="text" value="<?php echo $fetch_row ?>" class="form-control" name="contact_number[]"/>
												</div>
												<?php 
												}
												?>
												
											</div>
											<?php 
												}
												else
												{
													
												}
											?>
											<div class="row">
												&nbsp;
											</div>
											<div class="field_wrapper2">
												<div style="border:1px solid gray;padding:10px;">
													
													<a href="javascript:void(0);" class="add_button2" title="Add field">
													<img src="<?php echo base_url(); ?>/upload/images/plus.png" style="width:25px; height:25px;"/> Add New Number
													</a>
												</div>
											</div>
											<br>
										</div>
									</div>
									<script type="text/javascript">
									$(document).ready(function(){
										
										
										var maxField = 4; //Input fields increment limitation
										var addButton = $('.add_button2'); //Add button selector
										var wrapper = $('.field_wrapper2'); //Input field wrapper
										var fieldHTML = '<div style="border:1px solid gray;padding:10px;">Select Country : <select name="country_code[]" style="width:150px;height:30px;"><option value="0"> Select Country Code</option><option value="+60">Malaysia (+60)</option></select><input type="text" name="contact_number[]" style="width:200px;height:30px;"/><a href="javascript:void(0);" class="remove_button2" title="Remove field"><img src="<?php echo base_url(); ?>/upload/images/minus.png" style="width:25px; height:25px;"/></a></div>'; //New input field html 
										var x = 1; //Initial field counter is 1
										$(addButton).click(function(){ //Once add button is clicked
											if(x < maxField){ //Check maximum number of input fields
												x++; //Increment field counter
												$(wrapper).append(fieldHTML); // Add field html
											}
										});
										$(wrapper).on('click', '.remove_button2', function(e){ //Once remove button is clicked
											e.preventDefault();
											$(this).parent('div').remove(); //Remove field html
											x--; //Decrement field counter
										});
									});
									</script>
									<div class="form-group">
										<label class="control-label col-sm-3" for="text">Nationality :</label>
										<div class="col-sm-9">
										  <select class="form-control" name="nationality" required="">
												<?php
												$nat_1 = $row->nationality;
												$nat = $this->db->get_where('tbl_country', array('country_id'=>$nat_1))->result();
												foreach($nat as $nat_row)
												{
												?>
												<option value="<?php echo $nat_row->country_id; ?>">
												<?php echo $nat_row->country_name; ?></option>
												<?php 
												}
												?>
												<option value="0">---Select Nationality---</option>
												<?php 
												$data=$this->db->get('tbl_country')->result_array(); foreach ($data as $a) {
													//$country_active = $a['is_deactivate'];
													//if($country_active == "N")
													//{
													?>
												<option value="<?php echo $a['country_id'];?>">
													<?php echo $a['country_name'];?>
												</option>
												<?php 
												//}
												} ?>
												
											</select>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3" for="text">Diver Registration Body :</label>
										
										<?php 
										if($row->diver_registration_body != "")
										{
										?>
										<div class="col-sm-9">
											
											<?php 
												$chkbox2 = $row->diver_registration_body;
												if($chkbox2 =='PADI' || $chkbox2 =='SSI')
												{
											?>
											<label class="checkbox-inline" style="padding-left:0px;">
											<input type="radio" class="styled" name="diver_registration_body" value="PADI"
											<?php echo ($chkbox2=='PADI')?'checked':'' ?> >PADI</label>
											<label class="checkbox-inline">
											<input type="radio" class="styled" name="diver_registration_body" value="SSI"
											<?php echo ($chkbox2=='SSI')?'checked':'' ?> >SSI</label>
											<label class="checkbox-inline">
											<input type="radio" class="styled" id="showTextBox2"/>OTHERS</label>
											<label class="checkbox-inline"><input type="text" name="diver_registration_body" id="textBox1" hidden /></label>
											<script type="text/javascript">
												$(function () {
													$("input[name='diver_registration_body']").click(function () {
														if ($("#showTextBox2").is(":checked")) {
															$("#textBox1").show();
														} else {
															$("#textBox1").hide();
														}
													});
												});
											</script>
											
											<?php 
												}
												else
												{
											?>
											<label class="checkbox-inline" style="padding-left:0px;">
											<input type="radio" class="styled" name="diver_registration_body" value="<?php echo $chkbox2; ?>"
											<?php echo ($chkbox2==$chkbox2)?'checked':'' ?> ><?php echo $chkbox2; ?></label>
											<label class="checkbox-inline" style="margin: 0 0 0 10px;">
											<input type="radio" class="styled" name="diver_registration_body" value="PADI" >PADI</label>
											<label class="checkbox-inline">
											<input type="radio" class="styled" name="diver_registration_body" value="SSI" >SSI</label>
											<?php 
												}
											?>						
											
										</div>
										<?php 
										}
										else
										{
										?>
										<div class="col-sm-9">
										<label class="checkbox-inline" style="padding-left:0px;">
											<input type="radio" class="styled" name="diver_registration_body" value="PADI" >PADI</label>
											<label class="checkbox-inline">
											<input type="radio" class="styled" name="diver_registration_body" value="SSI" >SSI</label>
											<label class="checkbox-inline">
											<input type="radio" class="styled showTextBox3" name="diver_registration_body" />OTHERS</label>
											<label class="checkbox-inline"><input type="text" name="diver_registration_body" class="textBox2" hidden /></label>
											<script type="text/javascript">
												$(function () {
													$("input[name='diver_registration_body']").click(function () {
														if ($(".showTextBox3").is(":checked")) {
															$(".textBox2").show();
														} else {
															$(".textBox2").hide();
														}
													});
												});
											</script>
										</div>
										<?php 
										}
										?>
									</div>

									
									<div class="form-group">
										<label class="control-label col-sm-3" for="text">Diver Registration Level :</label>
										<div class="col-sm-9">
										<?php 
											$chkbox3 = $row->diver_registration_level; 
											?>
											<label class="radio-inline"><input type="radio" name="diver_registration_level" value="OWD" <?php echo ($chkbox3=='OWD')?'checked':'' ?>>OWD</label>
											<label class="radio-inline"><input type="radio" name="diver_registration_level" value="AOW" <?php echo ($chkbox3=='AOW')?'checked':'' ?>>AOW</label>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3" for="text">Diver Specialties Skill :</label>
										<div class="col-sm-9">
										<?php 
											$chkbox4 = $row->diver_speciality_skill; 
											?>
											<label class="radio-inline" style="font-size:14px;"><input type="radio" name="Specialtiesskill" value="PEAK PERFORMANCE BOUYANCY" <?php echo ($chkbox4=='PEAK PERFORMANCE BOUYANCY')?'checked':'' ?>>PEAK PERFORMANCE BOUYANCY</label>
											<label class="radio-inline" style="font-size:14px;"><input type="radio" name="Specialtiesskill" value="DEEP DIVING" <?php echo ($chkbox4=='DEEP DIVING')?'checked':'' ?>>DEEP DIVING</label>
											<label class="radio-inline" style="font-size:14px;"><input type="radio" name="Specialtiesskill" value="WRECK DIVING" <?php echo ($chkbox4=='WRECK DIVING')?'checked':'' ?>>WRECK DIVING</label>
											<label class="radio-inline" style="font-size:14px;"><input type="radio" name="Specialtiesskill" value="DRIFT DIVING" <?php echo ($chkbox4=='DRIFT DIVING')?'checked':'' ?>>DRIFT DIVING</label>
										</div>
									</div>
									
									<div class="form-group">
										<label class="control-label col-sm-3" for="text">Preferred Language :</label>
										<div class="col-sm-9">
										  <select class="form-control" name="language" required="">
												<option value="<?php echo $row->language; ?>"><?php echo $row->language; ?></option>
												<option value="0">---Select Language---</option>
												<?php 
													$data1 = $this->db->get('tbl_language')->result();
													foreach($data1 as $data_val1)
													{
												?>
													<option value="<?php echo $data_val1->language; ?>"><?php echo $data_val1->language; ?></option>
												<?php 
													}
												?>
												
											</select>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3" for="text">Preferred Currency :</label>
										<div class="col-sm-9">
										  <select class="form-control" name="currency" required="">
												<option value="<?php echo $row->currency; ?>"><?php echo $row->currency; ?></option>
												<option value="0">---Select Currency---</option>
												<?php 
													$data2 = $this->db->get('tbl_currency')->result();
													foreach($data2 as $data_val2)
													{
												?>
													<option value="<?php echo $data_val2->Currencycode; ?>"><?php echo $data_val2->Currencycode; ?></option>
												<?php 
													}
												?>
												
											</select>
										</div>
									</div>

									<br>
									<hr style="width:100%;">
									<label style="font-size:19px;font-weight:bold;color:#000;" class="col-md-12">Others</label>
									<div class="form-group">
										<label class="control-label col-sm-3" for="text">Residential Address:</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" id="text" name="address1" value="<?php echo $row->address1; ?>"><br>
											<input type="text" class="form-control" id="text" name="address2" value="<?php echo $row->address2; ?>"><br>
											<input type="text" class="form-control" id="text" name="address3" value="<?php echo $row->address3; ?>">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3" for="text">Other Languages:</label>
										<div class="col-sm-9">
											<?php 
												if($row->other_language != '')
												{
											?>
											<div class="row">
												<?php 
												$fetch_other_language = $row->other_language;
												$fetch_other_lang = explode(',', $fetch_other_language);
												foreach($fetch_other_lang as $fetch_row)
												{
												
												?>
												<div class="col-md-3">
													<input type="text" value="<?php echo $fetch_row ?>" class="form-control" name="field_name1[]"/>
												</div>
												<?php 
												}
												?>
												
											</div>
											<?php 
												}
												else
												{
													
												}
											?>
											<div class="row">
												&nbsp;
											</div>
											<?php 
												/* if($row->other_language != '')
												{
												$data1 = explode(',', $row->other_language);
												foreach($data1 as $data1_row)
												{
												?>
													<input type="text" value="<?php echo $data1_row; ?>" name="field_name1[]" class="form-control">
												<?php
														
												}
												} */
											?>
											<link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/multiselect/jquery.multiselect.css">
											<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
											<script src="<?php echo base_url(); ?>assets/frontend/multiselect/jquery.multiselect.js"></script>
											<select name="field_name1[]" class="form-control" multiple>
												<?php 
													//$data1 = explode(',', $row->other_language);
													//foreach($data1 as $data1_row)
													//{
													//$this->db->where_in('language', explode(',', $row->other_language));
													
													$data = $this->db->get('tbl_language')->result();
													foreach($data as $data_val)
													{
												?>
													<option value="<?php echo $data_val->language; ?>"><?php echo $data_val->language; ?></option>
												<?php 
													}
													//}
												?>
												
											</select>
										</div>
									</div>
									<script>
										$('select[multiple]').multiselect({

									// text to use in dummy input

									placeholder   : '',   

									// how many columns should be use to show options

									columns       : 4, 

									// include option search box  

									search        : false,   

									// search filter options

									searchOptions : {
									  default      : 'Search', // search input placeholder text
									  showOptGroups: false     // show option group titles if no options remaining

									},    

									// add select all option

									selectAll     : false,

									// select entire optgroup  

									selectGroup   : false, 

									// minimum height of option overlay

									minHeight     : 200,  

									// maximum height of option overlay

									maxHeight     : null, 

									// display the checkbox to the user

									showCheckbox  : true, 

									// options for jquery.actual

									jqActualOpts  : {},   

									// maximum width of option overlay (or selector)

									maxWidth      : null,

									// minimum number of items that can be selected

									minSelect     : false,

									// maximum number of items that can be selected
									maxSelect     : false,
									});
									</script>
									
									<label style="font-size:19px;font-weight:bold;color:#000;margin:5px 0 10px 0;" class="col-md-12">Emergency Contact</label>
									<div class="form-group">
										<label class="control-label col-sm-3" for="text">Name:</label>
										<div class="col-sm-9">
										  <input type="text" class="form-control" id="text" name="name" value="<?php echo $row->name; ?>">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3" for="text">Contact Number:</label>
										<div class="col-sm-9">
										  <input type="text" class="form-control" id="text" name="contact_no" value="<?php echo $row->contact_no; ?>">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3" for="text">Email Address:</label>
										<div class="col-sm-9">
										  <input type="email" class="form-control" id="text" name="e_mail" value="<?php echo $row->e_mail; ?>">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3" for="text">Relationship:</label>
										<div class="col-sm-9">
										  <input type="text" class="form-control" id="text" name="relationship" value="<?php echo $row->relationship; ?>">
										</div>
									</div>
								
								
								
								<hr>
								
									<?php 
									if($row->identifiction_passport != NULL)
									{
									?>
									<div class="form-group">
										<label class="control-label col-sm-3" for="text">Identification Passport:</label>
										<div class="col-sm-9">
											<label class="btn-file"><!--Browse-->
												 <img src="<?php echo base_url(); ?>/upload/customerprofile/<?php echo $row->identifiction_passport;?>" width="200" height="100"><input type="file" name="identification_passport" hidden>
												 <input type="hidden" value="<?php echo $row->identifiction_passport; ?>" name="identification_passport1">
											</label>
										</div>
									</div>
									<?php 
									}
									else
									{
									?>
									<div class="form-group">
										<label class="control-label col-sm-3" for="text">Identification Passport:</label>
										<div class="col-sm-9">
											<label class="btn-file"><!--Browse-->
												 <input type="file" name="identification_passport" hidden>
											</label>
										</div>
									</div>
									<?php
									}
									?>
									
								 
								<hr>
								
									<?php 
										if($row->diver_card != NULL)
										{
									?>
									<div class="form-group">
										<label class="control-label col-sm-3" for="text">Diver Card:</label>
										<div class="col-sm-9">
											<label class="btn-file"><!--Browse-->
												<img src="<?php echo base_url(); ?>/upload/customerprofile/<?php echo $row->diver_card;?>" width="200" height="100">
												 <input type="file" name="diver_card" hidden>
												 <input type="hidden" value="<?php echo $row->diver_card; ?>" name="diver_card1">
											</label>
										</div>
									</div>
									<?php 
										}
										else
										{
									?>
									<div class="form-group">
										<label class="control-label col-sm-3" for="text">Diver Card:</label>
										<div class="col-sm-9">
											<label class="btn-file"><!--Browse-->
												 <input type="file" name="diver_card" hidden>
											</label>
										</div>
									</div>
									<?php
										}
									?>
										<div class="form-group"> 
										<div class="col-sm-offset-3 col-sm-9">
										 <input type="submit" name="update_customerprofile_data" value="Save" class="btn btn-success">
										  <button type="reset" class="btn btn-danger">Cancel</button>
										</div>
									</div>
								 </form>
							  </div>
							</div>
						</div>
                     </div>
                  </div>
                 
				 <?php 
				}
				 ?> 
				  
               </div>
            </div>
			<div class="container">&nbsp;</div>
			
			
			 
         </section>
		 <hr style="width:100%;border:2px solid #66ffff;">
		 
		 <?php
			}
			else
			{
				redirect(base_url());
			}
		 ?>