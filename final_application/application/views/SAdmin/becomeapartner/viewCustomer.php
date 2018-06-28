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
		$data1=$this->db->get_where('tbl_customerprofile', array('user_id'=>$dcid))->result();
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
           <!-- <h6 class="panel-title">Dive Center - <?php echo $row2->firstname ?></h6>
			<hr style="width:100%">-->
          </div>
		  
        <div class="container-fluid">
              <div class="row">
			   <?php

				$data = $this->db->get_where('tbl_customerprofile', array('user_id'=>$dcid))->result();
				foreach($data as $row1)
				{
										 ?>
               	  <div class="col-md-4 col-sm-12 col-xs-12 ">
                     <div class="main-box profile-box-contact">
                     	<div class="col-md-12 col-sm-12 col-xs-12 nopadding">
                            <div class="profile-box-header blue-bg">
                                <div class="col-md-12 col-sm-7 col-xs-12">
									<?php
										
										if($row1->profile_pic != "")
										{
									?>
										 <img src="<?php echo $row1->profile_pic;?>" alt="" class="profile-img img-responsive" style="margin: 20px auto;" />
									<?php
										}
										elseif($row1->photo != "")
										{
										?>
										<img src="<?php echo base_url(); ?>/upload/customerprofile/<?php echo $row1->photo;?>" alt="" class="profile-img img-responsive" style="margin: 20px auto;"/>
										<?php	
										}
										else
										{
										?>
										<img src="<?php echo base_url(); ?>/upload/customerprofile/1483346768735.png" alt="" class="profile-img img-responsive" style="margin: 20px auto;"/>
									<?php
										}
									?>
                                  
                                   <h2><?php echo $row1->firstname.'&nbsp;&nbsp;'.$row1->lastname; ?></h2>
                                   <ul class="contact-details" style="list-style: none">
                                     
                                      <li>
                                         <i class="fa fa-envelope"></i> <?php echo $row1->email;?>
                                      </li>
                                      <li>
                                         <i class="fa fa-phone"></i> <?php echo $row1->contactno;
										
										 ?>
                                      </li>
                                      <li>
                                         <i class="fa fa-user"></i> <?php echo $row1->gender;?>
                                      </li>
									  <li>
                                         <i class="fa fa-calendar"></i> <?php echo date("d/m/Y", strtotime($row1->dob)); ?>
                                      </li>
                                   </ul>
            <div style="text-align:center;">
               <!--a class="btn bg-violet" href="<?php echo  base_url();?>DCpackage/addNew"><i class="glyphicon glyphicon-plus"></i> Add </a-->
               <a href="<?php echo  base_url();?>SAbecomeapartner/userDetails/Customer" class="btn bg-pink"><i class="glyphicon glyphicon-refresh"></i> List</a>
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

                <div class="col-lg-8">
					<div class="panel-body" >
<!--					<h5>Profile of <?php echo $row2->firstname.'&nbsp;&nbsp;'.$row2->lastname; ?> </h5>-->
						<?php
					foreach($data1 as $row2)
					{
						?>
					<table class="table table-bordered table-striped">
					
						<tr><th>Nationality</th><td>
						<?php
							if($row2->nationality == 0 || $row2->nationality == NULL || $row2->nationality == "")
							{
								//echo "hhhhhh";
							}
							else
							{
								$data_country =$this->db->get_where('tbl_country', array('country_id'=>$row2->nationality))->row();
								echo $data_country->country_name;
							}
							
						?></td></tr>
						
						<tr><th>Address</th><td>
						<?php echo $row2->address1.', '.$row2->address2.', '.$row2->address3.'<br>'.$row2->state;?></td></tr>
						
						<tr><th>Language</th><td>
						<?php echo $row2->language;?></td></tr>
						<tr><th>Currency</th><td>
						<?php echo $row2->currency;?></td></tr>
						<tr><th>Other Language</th><td>
						<?php echo $row2->other_language;?></td></tr>
						
						<tr><th>Registration body</th><td>
						<?php echo $row2->diver_registration_body;?></td></tr>					
						<tr><th>Registration Level</th><td>
						<?php echo $row2->diver_registration_level;?></td></tr>
						<tr><th>Speciality Skill</th><td>
						<?php echo $row2->diver_speciality_skill;?></td></tr>
						<tr><th>Passport</th><td>
						<img src="<?php echo base_url(); ?>/upload/customerprofile/<?php echo $row2->identifiction_passport;?>" class="img-responsive"></td></tr>	

						<tr><th>Diver Card</th><td>
						<img src="<?php echo base_url(); ?>/upload/customerprofile/<?php echo $row2->diver_card;?>" class="img-responsive"></td></tr>	
						<tr><th colspan='2'><h1>Emergency Contact</h1></th></tr>
						
						
						<tr><th> Name</th><td>
						<?php echo $row2->name;?></td></tr>
						<tr><th>Contact no</th><td>
						<?php echo $row2->contact_no;?></td></tr>
						<tr><th>E-Mail</th><td>
						<?php echo $row2->e_mail;?></td></tr>
						<tr><th>Relationship</th><td>
						<?php echo $row2->relationship;?></td></tr>
					
					</table>
					<?php
					}
					?>
				
					
					
					
					</div>
				</div> 
			</div>
        </div>
	</div>
</div>
</div>
<!-- /dashboard content -->


<!-- /dashboard content -->