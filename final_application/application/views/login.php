<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login - Sucbbi Diving</title>

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url('assets/css/icons/icomoon/styles.css');?>" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url('assets/css/bootstrap.css');?>" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url('assets/css/core.css');?>" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url('assets/css/components.css');?>" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url('assets/css/colors.css');?>" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script type="text/javascript" src="<?php echo base_url('assets/js/plugins/loaders/pace.min.js');?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/js/core/libraries/jquery.min.js');?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/js/core/libraries/bootstrap.min.js');?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/js/plugins/loaders/blockui.min.js');?>"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script type="text/javascript" src="<?php echo base_url('assets/js/plugins/forms/styling/uniform.min.js');?>"></script>

	<script type="text/javascript" src="<?php echo base_url('assets/js/core/app.js');?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/js/pages/login.js');?>"></script>

	<script type="text/javascript" src="<?php echo base_url('assets/js/plugins/ui/ripple.min.js');?>"></script>
	<!-- /theme JS files -->

</head>

<body class="login-container" style="background-color:#545454;">

	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main content -->
			<div class="content-wrapper">

				<!-- Content area -->
				<div class="content pb-20">

					<!-- Tabbed form -->
					<div class="tabbable panel login-form width-400">


						<div class="tab-content panel-body">
							<div class="tab-pane fade in active" id="basic-tab1">
								<form  action="<?php echo base_url();?>User/varifyUser" method="post">
									<div class="text-center">
										<!--img class="img-responsive" src="<?php echo base_url('assets/images/logo.png');?>"-->
										<h1 class="text-blue-600">SCUBBI DIVING</h1>
										<h5 class="content-group">Login to your account <small class="display-block">Your credentials</small></h5>
										<span style="color:red;">
											<?php echo $this->session->flashdata('login_msg');?>
										</span>
									</div>

									<div class="form-group has-feedback has-feedback-left">
										<input type="text" class="form-control" placeholder="Username" name="email" required="required">
										<div class="form-control-feedback">
											<i class="icon-user text-muted"></i>
										</div>
									</div>

									<div class="form-group has-feedback has-feedback-left">
										<input type="password" class="form-control" placeholder="Password" name="password" required="required">
										<div class="form-control-feedback">
											<i class="icon-lock2 text-muted"></i>
										</div>
									</div>
<!--
									<div class="form-group login-options">
										<div class="row">
											<div class="col-sm-6">
												<label class="checkbox-inline">
													<input type="checkbox" class="styled" checked="checked">
													Remember
												</label>
											</div>

											<div class="col-sm-6 text-right">
												<a href="login_password_recover.html">Forgot password?</a>
											</div>
										</div>
									</div> -->

									<div class="form-group">
										<button type="submit" class="btn bg-blue-600 btn-block">Login <i class="icon-arrow-right14 position-right"></i></button>
									</div>
								</form>

								<!--div class="content-divider text-muted form-group"><span>Follow us with</span></div>
								<ul class="list-inline form-group list-inline-condensed text-center">
									
									<li><a href="<?php echo $this->googleplus->loginURL();?>" class="">
									<img src="<?php echo base_url(); ?>assets/images/google-sign-in.png" width="160px" class="img-responsive"><!--i class="icon-dribbble3"></i-></a></li>
									<li><a href="<?php echo $url; ?>" class="">
									<img src="<?php echo base_url(); ?>assets/images/sign-in-facebook.png" width="160px" class="img-responsive">
									<!--i class="icon-facebook"></i-></a></li>
									<!--li><a href="#" class="btn border-slate-600 text-slate-600 btn-flat btn-icon btn-rounded"><i class="icon-github"></i></a></li>
									<li><a href="#" class="btn border-info text-info btn-flat btn-icon btn-rounded"><i class="icon-twitter"></i></a></li->
								</ul-->

								<!-- <span class="help-block text-center no-margin">By continuing, you're confirming that you've read our <a href="#">Terms &amp; Conditions</a> and <a href="#">Cookie Policy</a></span> -->
							</div>


						</div>
					</div>
					<!-- /tabbed form -->

				</div>
				<!-- /content area -->

			</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->

	</div>
	<!-- /page container -->

</body>
</html>
