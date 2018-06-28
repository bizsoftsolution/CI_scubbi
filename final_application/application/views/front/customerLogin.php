<div class="container">
	<div class="row">
		<div class="col-md-4">
		&nbsp;
		</div>
		<div class="col-md-4">
		<div style="border:2px solid gray;margin:40% 0 0 0;padding:5%;    box-shadow: 1px 2px 3px gray;">
			<h3 align="center">Customer Login</h3>
			<br><div style="text-align: right;"><a href="login">Dive Center Login</a></div>
			<hr style="width:100%;">
			<form role="form" action="<?php echo base_url();?>Customer/varifyUser" method="POST">
				 <div class="form-group">
					<label for="email">Email address:</label>
					<input type="email" class="form-control" id="inputEmail3" placeholder="Enter Email" name="email">
				  </div> 
				  <div class="form-group">
					<label for="email">Password</label>
					<input type="password" class="form-control" id="inputPassword3" placeholder="Enter Password" name="password">
				  </div> 
			  <!--input type="submit" class="btn btn-danger" style="width:100%;" value="Login"-->
			   <input type="submit" class="btn btn-danger" style="width:100%;" value="Log in">
			  <hr style="width:100%;">

			</form>
	<!--a href="<?php echo $url; ?>" class="">
	<img src="<?php echo base_url(); ?>assets/images/sign-in-facebook.png" style="width:100%;height:50px" class="img-responsive"><!--i class="icon-dribbble3"></i-></a-->
	<a href="<?php echo $login_url;?>" class="">
	<img src="<?php echo base_url(); ?>assets/images/google-sign-in.png" style="width:100%;height:50px" class="img-responsive"><!--i class="icon-dribbble3"></i--></a>
	<?php
//	$outputHTML = '<a href="'.$oauthURL.'"><img src="'.base_url().'assets/images/sign-in-with-twitter.png" alt=""/></a>';
//	echo $outputHTML;
	?>
		<hr style="width:100%;">
		<div class="row">
			<div class="col-md-6">Don't have an account?</div>
			<div class="col-md-6"> <a  href="<?php echo base_url('Customer/customerSignup'); ?>" type="submit" class="btn btn-danger" style="width:100%;background:#fff;color:red;">Sign up</a></div>
		</div>
		</div>
		</div>
		<div class="col-md-4">
		&nbsp;
		</div>
	</div>								
	
</div>
								