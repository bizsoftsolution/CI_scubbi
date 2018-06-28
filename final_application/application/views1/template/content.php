<div class="content-wrapper">

  <!-- Content area -->
  <div class="content">
    <div class="breadcrumb-line breadcrumb-line-component"><a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a>
			 <ul class="breadcrumb">
					<li><a href=""><i class="icon-home2 position-left"></i> Home</a></li>
					<li class="active"><a href="">Dashboard</a></li>
					<!--li class="active">Basic inputs</li-->
				</ul>
    	</div>
      <br>
    <!-- Main charts -->
    <div class="row">
      <div class="col-lg-12">
		
        <!-- Traffic sources -->
	<?php 
	if($this->session->userdata('user_type') == 'DCADMIN')
	{
	?>
		<div class="panel panel-flat">
          <div class="panel-heading" style="margin: 0px 0 -39px 0;">
            <h6 class="panel-title">Dive Center Dashboard</h6>
			<hr style="width:100%">
          </div>
		  
        <div class="container-fluid">
              <div class="row">
                <div class="col-lg-12">
					<div class="panel-body" >
					<h5>Welcome to Dive Center Profile Page</h5>
					<h5>Please Use the Left Side Menu to Navigate Between Sections</h5>
					<h5>If You Need Any Assistance, Please Do Not Hesitate to Contact our Team at DCSUPPOR@SCUBBI.COM</h5>
					<p>To View Our Terms & Conditions Please <a href="<?php echo base_url('Dashboard/termsCondition'); ?>">Click Here</a></p>
					</div>
				</div> 
			</div>
        </div>
        <!-- /traffic sources -->

      </div>
		<div class="panel panel-flat">
          <div class="panel-heading">
            <h6 class="panel-title">Booking Details</h6>
          </div>
          <div class="container-fluid">

<!-- content Starts Here-->

                <!-- Quick stats boxes -->
              <div class="row">
                <div class="col-lg-4">
                  <div class="panel bg-pink">
                    <div class="panel-body">
                        <div class="col-md-12">
                           <h1 class="">Today Booking</h1><hr>
                        </div>
                        <div class="col-md-6" >
                        <i class="icon-calendar22" style="font-size: 66px;"></i>
                        </div>
                        <div class="col-md-6">
                         
                        <span class="" style="font-size: 50px;"> 23 </span>  

                        </div>
                        <div class="col-md-12">
                            <hr>
                            <h5>View Details&nbsp;&nbsp;&nbsp;&nbsp;<i class="icon-arrow-right7" style="font-size: 25px;"></i></h5>
                        </div>

                    <div class="container-fluid">
                      <div id="members-online"></div>
                    </div>
                  </div>
                </div>
              </div>
                <div class="col-lg-4">
                  <div class="panel bg-orange">
                    <div class="panel-body">
                        <div class="col-md-12">
                           <h1 class="">Today Review</h1><hr>
                        </div>
                        <div class="col-md-6" >
                        <i class="icon-medal-star" style="font-size: 66px;"></i>
                        </div>
                        <div class="col-md-6">
                         
                        <span class="" style="font-size: 50px;"> 11 </span>  

                        </div>
                        <div class="col-md-12">
                            <hr>
                            <h5>View Details&nbsp;&nbsp;&nbsp;&nbsp;<i class="icon-arrow-right7" style="font-size: 25px;"></i></h5>
                        </div>

                    <div class="container-fluid">
                      <div id="members-online"></div>
                    </div>
                  </div>
                </div>
              </div>
                                           
              <div class="col-lg-4">
                  <div class="panel bg-violet">
                    <div class="panel-body">
                        <div class="col-md-12">
                           <h1 class="">New Messages</h1><hr>
                        </div>
                        <div class="col-md-6" >
                        <i class="icon-comment-discussion" style="font-size: 66px;"></i>
                        </div>
                        <div class="col-md-6">
                         
                        <span class="" style="font-size: 50px;"> 52 </span>  

                        </div>
                        <div class="col-md-12">
                            <hr>
                            <h5>View Details&nbsp;&nbsp;&nbsp;&nbsp;<i class="icon-arrow-right7" style="font-size: 25px;"></i></h5>
                        </div>

                    <div class="container-fluid">
                      <div id="members-online"></div>
                    </div>
                  </div>
                </div>
              </div>
              
          </div>

          <!-- Simple line chart -->
          <div class="panel panel-flat">
            <div class="panel-heading">
              <h5 class="panel-title">Booking & Cancellationchart</h5>
              <div class="heading-elements">
                <ul class="icons-list">
                          <li><a data-action="collapse"></a></li>
                          <li><a data-action="reload"></a></li>
                          <li><a data-action="close"></a></li>
                        </ul>
                      </div>
            </div>

            <div class="panel-body">
             
              <div class="chart-container">
                <div class="chart" id="google-line"></div>
              </div>
            </div>
          </div>
          <!-- /simple line chart -->
  

        </div>
        <!-- /traffic sources -->

      </div>
        
	  <?php 
	}
	elseif($this->session->userdata('user_type') == 'BUGSDEVELOPER')
	{
	  ?>
	  <div class="panel panel-flat">
          <div class="panel-heading" style="margin: 0px 0 -39px 0;">
            <h6 class="panel-title">Bugs</h6>
			<hr style="width:100%">
          </div>
		  
          <div class="container-fluid">

<!-- content Starts Here-->

                <!-- Quick stats boxes -->
              <div class="row">
                <div class="col-lg-12">
					<div class="panel-body" >
					
					</div>

              </div> 
          </div>
        </div>
        <!-- /traffic sources -->

      </div>
	  
	  <?php 
	}
	elseif($this->session->userdata('user_type') == 'BUGVIEWER')
	{
		echo'<div class="panel panel-flat">
          <div class="panel-heading" style="margin: 0px 0 -39px 0;">
            <h6 class="panel-title">Bugs</h6>
			<hr style="width:100%">
          </div>
		  
          <div class="container-fluid">

<!-- content Starts Here-->

                <!-- Quick stats boxes -->
              <div class="row">
                <div class="col-lg-12">
					<div class="panel-body" >
					
					</div>

              </div> 
          </div>
        </div>
        <!-- /traffic sources -->

      </div>';
	}
	elseif($this->session->userdata('user_type') == 'CUSTOM')
	{
	  ?>
	  <div class="panel panel-flat">
          <div class="panel-heading" style="margin: 0px 0 -39px 0;">
            <h6 class="panel-title">Custom</h6>
			<hr style="width:100%">
          </div>
		  
          <div class="container-fluid">

<!-- content Starts Here-->

                <!-- Quick stats boxes -->
              <div class="row">
                <div class="col-lg-12">
					<div class="panel-body" >
					
					</div>

              </div> 
          </div>
        </div>
        <!-- /traffic sources -->

      </div>
	 <?php 
	}
	 ?>
    </div>
    <!-- /dashboard content -->
