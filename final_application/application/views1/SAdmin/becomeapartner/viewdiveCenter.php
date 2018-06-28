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
		$data1=$this->db->get_where('tbl_dcprofile', array('user_id'=>$dcid))->result();
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
           <!-- <h6 class="panel-title">Dive Center - <?php echo $row2->dcname ?></h6>
			<hr style="width:100%">-->
          </div>
		  
        <div class="container-fluid">
              <div class="row">
			   <?php

							$data = $this->db->get_where('tbl_dcprofile', array('user_id'=>$dcid))->result();
											foreach($data as $row1)
											{
										 ?>
               	  <div class="col-md-4 col-sm-12 col-xs-12 ">
                     <div class="main-box profile-box-contact">
                     	<div class="col-md-12 col-sm-12 col-xs-12 nopadding">
                            <div class="profile-box-header blue-bg">
                                <div class="col-md-12 col-sm-7 col-xs-12">
                                   <img src="<?php echo base_url(); ?>/upload/DCprofile/<?php echo $row1->dcimage;?>" alt="" class="profile-img img-responsive" />
                                   <h2><?php echo $row1->dcname; ?></h2>
                                   <ul class="contact-details" style="list-style: none">
                                      <li>
									   <?php

									$country = $this->db->get_where('tbl_country', array('country_id'=>$row1->dccountry))->result();
											foreach($country as $country1)
											{
										 ?>
							
                                         <i class="fa fa-map-marker"></i>&nbsp;<?php echo $country1->country_name;?>
										 <?php
										 
											}
									$island = $this->db->get_where('tbl_island', array('island_id'=>$row1->dcislands))->result();
											foreach($island as $island1)
											{
										 ?>
							
                                         <?php echo ' , '.$island1->island_name;?>
										 <?php
										 
											}
											?>
                                      </li>
                                      <li>
                                         <i class="fa fa-envelope"></i> <?php echo $row1->dcemailid;?>
                                      </li>
                                      <li>
                                         <i class="fa fa-phone"></i> <?php echo $row1->dctelephone_no;?>
                                      </li>
                                   </ul>
            <div style="text-align:center;">
               <!--a class="btn bg-violet" href="<?php echo  base_url();?>DCpackage/addNew"><i class="glyphicon glyphicon-plus"></i> Add </a-->
               <a href="<?php echo  base_url();?>SAbecomeapartner/userDetails/DCAdmin" class="btn bg-pink"><i class="glyphicon glyphicon-refresh"></i> List</a>
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
					<?php
					foreach($data1 as $row2)
					{
					?>
<!--					<h5>Profile of <?php echo $row2->dcname; ?> </h5>-->
					<table class="table table-bordered table-striped">
							
						<tr><th>GPS Coordinates</th><td>
						<?php echo $row2->dcgps_x.','.$row2->dcgps_y;?></td></tr>	
							
						<tr><th>Registered Company Name</th><td>
						<?php echo $row2->dcreg_co_name;?></td></tr>	
							
						<tr><th>Business Registration No</th><td>
						<?php echo $row2->dcbusiness_reg_no;?></td></tr>	
							
						<tr><th>Telephone NO</th><td>
						<?php echo $row2->dcbusi_telephone_no;?></td></tr>	
							
						<tr><th>Billing Address</th><td>
						<?php echo $row2->dcbilling_address;?></td></tr>	

						<tr><th>Address</th><td>
						<?php echo $row2->dcaddress;?></td></tr>

						<tr><th>Telephone No</th><td>
						<?php echo $row2->dctelephone_no;?></td></tr>

						<tr><th>Email ID</th><td>
						<?php echo $row2->dcemailid;?></td></tr>
						
						<tr><th>Description</th><td>
						<?php echo $row2->dcdescription;?></td></tr>					
						<tr><th>Web Site</th><td>
						<?php echo $row2->dcsiteurl;?></td></tr>					
						<tr><th>Capacity</th><td>
						Dive Masters: <b><?php echo $row2->dcno_of_divemaster;?></b>, 
						Boats: <b><?php echo $row2->dcno_boats;?></b>, 
						Daily Capacity: <b><?php echo $row2->dcdaily_capacity;?></b></td></tr>					
						<tr><th>Language</th><td>
						<?php echo $row2->dclanguage;?></td></tr>					
						<tr><th>Facilities</th><td>
						<?php echo $row2->dcfacilities;?></td></tr>					
						<tr><th>Affiliation(s)</th><td>
						<?php 
						if($row2->dcaffiliation_padi !="" || $row2->dcaffiliation_padi !=NULL)
						{
						?>
							<p><?php echo $row2->dcaffiliation_padi; ?> : <?php echo $row2->padi_member_no; ?> </p>
							
							<ul>
							<?php 
							if($row2->hundredpercentage_aware !="" || $row2->hundredpercentage_aware !=NULL)
							{
								echo '<li>100% AWARE : '.$row2->hundredpercentage_aware.'</li>';
							}
							if($row2->green_star_award !="" || $row2->green_star_award != NULL)
							{
								echo '<li>GREEN STAR AWARD : '.$row2->green_star_award.'</li>';
							}
							if($row2->national_geographic_center !="" || $row2->national_geographic_center != NULL)
							{
								echo '<li>NATIONAL GEOGRAPHIC CENTER : '.$row2->national_geographic_center.'</li>';
							}
							if($row2->padi_five_cdc_center !="" || $row2->padi_five_cdc_center != NULL)
							{
								echo '<li>PADI 5* CDC CENTER : '.$row2->padi_five_cdc_center.'</li>';
							}
							if($row2->padi_five_dive_resort !="" || $row2->padi_five_dive_resort != NULL)
							{
								echo '<li>PADI 5* DIVE RESORT : '.$row2->padi_five_dive_resort.'</li>';
							}
							if($row2->padi_five_dive_center !="" || $row2->padi_five_dive_center != NULL)
							{
								echo '<li>PADI 5* DIVE CENTER : '.$row2->padi_five_dive_center.'</li>';
							}
							if($row2->padi_five_instructor_development_center !="" || $row2->padi_five_instructor_development_center != NULL)
							{
								echo '<li>PADI 5* INSTRUCTOR DEVELOPMENT CENTER : '.$row2->padi_five_instructor_development_center.'</li>';
							}
							if($row2->padi_dive_center !="" || $row2->padi_dive_center != NULL)
							{
								echo '<li>PADI DIVE CENTER : '.$row2->padi_dive_center.'</li>';
							}
							if($row2->padi_five_instructor_development_resort !="" || $row2->padi_five_instructor_development_resort != NULL)
							{
								echo '<li>PADI 5* INSTRUCTOR DEVELOPMENT RESORT : '.$row2->padi_five_instructor_development_resort.'</li>';
							}
							if($row2->padi_dive_resort !="" || $row2->padi_dive_resort != NULL)
							{
								echo '<li>PADI DIVE RESORT : '.$row2->padi_dive_resort.'</li>';
							}
							if($row2->padi_tecrec_center !="" || $row2->padi_tecrec_center != NULL)
							{
								echo '<li>PADI TECREC CENTER : '.$row2->padi_five_cdc_center.'</li>';
							}
							?>
								
							</ul>
						<?php	
						}
						$affliation = explode(",",$row2->dcaffiliation);
						foreach($affliation as $res123)
						{
							if($res123 =="SSI")
							{
								echo '<p> '.$res123.' : '.$row2->ssi_member_no.'</p>';
								
							}
							if($res123 =="SDI")
							{
								echo '<p> '.$res123.' : '.$row2->sdi_member_no.'</p>';
								
							}
							if($res123 =="HEPCA")
							{
								echo '<p> '.$res123.' : '.$row2->hepca_member_no.'</p>';
								
							}
							if($res123 =="ANDI")
							{
								echo '<p> '.$res123.' : '.$row2->andi_member_no.'</p>';
								
							}
							if($res123 =="BIS")
							{
								echo '<p> '.$res123.' : '.$row2->bis_member_no.'</p>';
								
							}
							if($res123 =="NAUI")
							{
								echo '<p> '.$res123.' : '.$row2->naui_member_no.'</p>';
								
							}
							if($res123 =="TDI")
							{
								echo '<p> '.$res123.' : '.$row2->tdi_member_no.'</p>';
								
							}
						}
						
						?>
						</td></tr>					
						<tr><th>Dive Season</th><td>
						<?php echo $row2->dcseason;?></td></tr>					
						<tr><th>Information and Documents Required of Diver</th><td>
						<?php echo $row2->dcdocument_required;?></td></tr>					
						<tr><th>Currency of Dive Center</th><td>
						<?php echo $row2->dccurrency;?></td></tr>					
					</table>
					<?php
					}
					?>
					<h1>Administration Staff</h1>
						<table class="table table-bordered table-striped">
					<?php
						$admindetail = $this->db->get_where('tbl_contacts_staffdetails',array('user_id'=>$dcid))->result();
						$i=1;
						foreach($admindetail as $admin1)
						{							
							?>
							<tr><td colspan='2'><center><h3>Employee - <?php echo $i; ?></h3></center></td></tr>
							<tr>
								<th>Department Name</th>
								<td>
								<?php
								$dept = $this->db->get_where('tbl_department',array('id'=>$admin1->dept_name))->row();
								echo $dept->dept_name;
								?>
								
								
								</td>
							</tr>
							<tr>
								<th>Name</th>
								<td><?php echo $admin1->name;?></td>
							</tr>
							<tr>
								<th>Contact No</th>
								<td><?php echo $admin1->contact_no;?></td>
							</tr>
							<tr>
								<th>Email</th>
								<td><?php echo $admin1->email;?></td>
							</tr>
							
							<?php
							$i++;
						}
					?>
					</table>
					</div>
				</div> 
			</div>
        </div>
	</div>
</div>
</div>
<!-- /dashboard content -->


<!-- /dashboard content -->