<div class="content-wrapper">
<!-- Content area -->
<div class="content">
<div class="breadcrumb-line breadcrumb-line-component">
   <a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a>
   <ul class="breadcrumb">
      <li><a href=""><i class="icon-home2 position-left"></i> Home</a></li>
      <li><a href="">Dashboard</a></li>
<?php
//print_r($inboxMsg);
//    foreach($dcid as $hrow) {
		$dcid = $user_id;
//		echo("DC $dcid");
		$data1=$this->db->get_where('tbl_semployee', array('id'=>$dcid))->result();
		//$row2 = $data1[0];
//		$dcid = $row2->user_id;
//	}
?>
      
      <li class="active">Profile </li>
   </ul>
</div>
<br>

<div class="row">
   <div class="col-md-12">
	<div class="panel panel-flat">
          <div class="panel-heading" style="margin: 0px 0 -39px 0;">
           <!-- <h6 class="panel-title">Dive Center - <?php echo $row2->name ?></h6>
			<hr style="width:100%">-->
          </div>
		  
        <div class="container-fluid">
              <div class="row">
			  <div class="col-md-3 col-sm-12 col-xs-12 ">
			  </div>
			   <?php

				$data = $this->db->get_where('tbl_semployee', array('id'=>$dcid))->result();
				foreach($data as $row1)
				{
										 ?>
               	  <div class="col-md-5 col-sm-12 col-xs-12 ">
                     <div class="main-box profile-box-contact">
                     	<div class="col-md-12 col-sm-12 col-xs-12 nopadding">
                            <div class="profile-box-header blue-bg">
                                <div class="col-md-12 col-sm-7 col-xs-12">
                                   <img src="<?php echo base_url(); ?>/upload/user.png" alt="" class="profile-img img-responsive" />
                                   <h2><?php echo $row1->name; ?></h2>
                                   <ul class="contact-details">
                                     
                                      <li>
                                         <i class="fa fa-envelope"></i> <?php echo $row1->email;?>
                                      </li>
                                      <li>
                                         <i class="fa fa-phone"></i> <?php echo $row1->phoneno;?>
                                      </li>
									  <li>
                                         <i class="fa fa-calendar"></i> <?php echo $row1->dob;?>
                                      </li>
                                   </ul>
            <div style="text-align:center;">
               <!--a class="btn bg-violet" href="<?php echo  base_url();?>DCpackage/addNew"><i class="glyphicon glyphicon-plus"></i> Add </a-->
               <a href="<?php echo  base_url();?>SAbecomeapartner/userDetails/Admin" class="btn bg-pink"><i class="glyphicon glyphicon-refresh"></i> List</a>
            </div>
                               </div>
<!--
                               <div class="col-md-12 col-sm-5 col-xs-12">
                                   <div class="profile-btn">
                                      <a class="btn" href="#"> <i class="fa fa-envelope-o"></i> Message </a>
                                      <a href="#" class="btn"> <i class="fa fa-star"></i> Review </a>
                                   </div>

                               </div>-->
                            </div>
                        </div>
                      </div>
                    </div>
<?php
									}
?>

			</div>
        </div>
	</div>
</div>
</div>
<!-- /dashboard content -->


<!-- /dashboard content -->