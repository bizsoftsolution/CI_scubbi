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
<div >
<div class="container">
	<div class="row main" style="margin:7% 0 0 0;">
		<div class="main-login main-center">
		<h3>Sign up </h3>
			<form name="Add" method="POST" action="" enctype="multipart/form-data">
				
				<div class="form-group">
					<label for="name" class="cols-sm-2 control-label">First Name</label>
					<div class="cols-sm-10">
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
							<input type="text" class="form-control" name="fname" id="fname"  placeholder="Enter your First Name"/>
							<span id="fnameError" class="error">
							
							</span>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="name" class="cols-sm-2 control-label">Last Name</label>
					<div class="cols-sm-10">
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
							<input type="text" class="form-control" name="lname" id="lname"  placeholder="Enter your Last Name"/>
							<span id="lnameError" class="error">
							
							</span>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label cols-sm-2" for="text">Gender</label>
					<div class="cols-sm-10">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-genderless" aria-hidden="true"></i></span>
						<label class="radio-inline" style="margin: 3px 0 0 10px;"><input type="radio" name="gender" id="gender" value="Male">Male</label>
						<label class="radio-inline"><input type="radio" name="gender" value="Female" id="gender">Female</label>
						</div>
					</div>
				</div>
				

				<link href="<?php echo base_url('assets/new/css/datepicker.css');?>" rel="stylesheet">
					<script type="text/javascript" src="<?php echo base_url('assets/new/js/bootstrap-datepicker.js');?>"></script>
						<script>
							$(document).ready(function(){

									$('#dob').datepicker();

								
									
							});
						</script>
						
				<div class="form-group">
					<label for="name" class="cols-sm-2 control-label">Date of Birth</label>
					<div class="cols-sm-10">
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-birthday-cake" aria-hidden="true"></i></span>
							<input type="text" class="form-control" name="dob" id="dob" maxlength="10" />
						</div>
					</div>
				</div>
				<!--script>
					$("#dob").datepicker({
						//inline: true
						showButtonPanel: true
					});
				</script-->
				<div class="form-group">
					<label for="email" class="cols-sm-2 control-label">Your Email</label>
					<div class="cols-sm-10">
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
							<input type="email" class="form-control" name="email" id="email"  placeholder="Enter your Email" />
							<span id="email_addressError" class="error">
							
							</span>
						</div>
					</div>
				</div>

				<div class="form-group">
					<label for="password" class="cols-sm-2 control-label">Password</label>
					<div class="cols-sm-10">
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
							<input type="password" class="form-control" name="password" id="password"  placeholder="Enter your Password" required=""/>
						</div>
						<span id="passwordError" class="error">
							
							</span>
					</div>
				</div>
				<div class="form-group">
					<label for="name" class="cols-sm-2 control-label">Phone Number</label>
					<div class="cols-sm-10">
						<div class="input-group">
							<span class="input-group-addon">
								<select name="countrycode" id="countrycode" style="width:180px;">
									
									<option value="0">Select Country Code</option>
									<?php 
									$data=$this->db->get('tbl_phonecode')->result_array(); foreach ($data as $a) {
										//$country_active = $a['is_deactivate'];
										//if($country_active == "N")
										//{
										?>
									<option value="<?php echo $a['country_code_plus'];?>">
										<?php echo $a['name'];?>(<?php echo $a['country_code_plus'];?>)
									</option>
									<?php 
									//}
									} ?>
									
								</select>
							</span>
							<input type="text" class="form-control" name="pnumber" id="pnumber"  placeholder="Enter your Phone Number"/>
						</div>
					</div>
				</div>
				<div class="form-group ">
					<input type="submit" name="submit_register_form" value="Register" class="btn btn-success btn-lg btn-block login-button submit_register_form">
					<!--a href="" target="_blank" type="button" id="button" class="btn btn-primary btn-lg btn-block login-button">Register</a-->
				</div>
				<div id="flash"></div>
			</form>
			<script type="text/javascript">
				$(function() {
					
					var result=0;
					$('#lname').focus(function () {
						if ($('#fname').val() == '') {
							$('#fnameError').html("First Name Is required");
						}
						else{
							$('#fnameError').html("");
						}

					});
					 $('#email').focus(function () {
						 if ($('#lname').val() == '') {
							$('#lnameError').html("Last  Name Is required");
						}
						else{
							$('#lnameError').html("");
						}
						if ($('#fname').val() == '') {
							$('#fnameError').html("First Name Is required");
						}
						else{
							$('#fnameError').html("");
						}

					});
					$('#password').focus(function () {
						 if ($('#lname').val() == '') {
							$('#lnameError').html("Last  Name Is required");
						}
						else{
							$('#lnameError').html("");
						}
						if ($('#fname').val() == '') {
							$('#fnameError').html("First Name Is required");
						}
						else{
							$('#fnameError').html("");
						}
						if ($('#email').val() == '') {
							$('#email_addressError').html("Email Id is Required");
						}
						else{
							$('#email_addressError').html("");
						}

					});
					 $('#email').blur(function () {
						  var email = $('#email').val();
							 var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
            
							if (reg.test(email) == false) 
							{
								 $('#email_addressError').html("Invalid Email Format");
								
							}
							else
							{
								var dataString = 'email='+ email ;
								$.ajax({
								type: "POST",
								url: "<?php echo base_url('Front/CheckEmailAvalabilitySignUp'); ?>",
								data: dataString,
								cache: true,
								success: function(html){
									
										if(html == 1)
										{
											 result=1;
											 $('#email_addressError').html("");
										}
										else
										{
											$('#email_addressError').html(html);
										}
	
								}  
								});
							}
						});
				$(".submit_register_form").click(function() {
				var textdcn = $("#fname").val();
				var textcp = $("#lname").val();
				var textbrn = $("#gender").val();
				var textsc = $("#dob").val();
				var texti = $("#email").val();
				var textea = $("#password").val();
				var textcc = $("#countrycode").val();
				var textpn = $("#pnumber").val();
				var dataString = 'fname='+ textdcn + '&lname='+ textcp + '&gender=' + textbrn + '&dob=' + textsc + '&email=' + texti + '&password=' + textea + '&pnumber=' + textpn + '&countrycode=' + textcc;
				
					
					if(result != 1)
					{
						$("#flash").show();
						$("#flash").fadeIn(400).html('<span class="load" style="color:white;font-weight: bold; border: 2px solid red;padding: 8px;font-size: 16px;}">Please Fill All the Required Columns</span>');
					
					}
					else
					{
						$.ajax({
						type: "POST",
						url: "<?php echo base_url('Customer/signup'); ?>",
						data: dataString,
						cache: true,
						success: function(html){
							
						//	$("#show").after(html);
							/* dialog.alert({
								//title: "Alert example",
								message: "Thank you for registration, Our services team will contact you shortly",
								button: "Ok",
								animation: "fade",
								callback: function(value){
									console.log(value);
								}
							}); */
							if(html == 'SUCCESS')
							{
							alert("Thank you for registration");
							window.location.href = "<?php echo base_url('Customer'); ?>";
							}
							else
							{
								alert("Already Email is Subscribe!!!");
							}
						}  
						});
					}
			
			
				
				return false;
				});
				});
				</script>
		</div>
	</div>
</div>
</div>