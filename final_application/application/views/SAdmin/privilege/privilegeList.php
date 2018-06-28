<div class="content-wrapper">
<!-- Content area -->
<div class="content">
<div class="breadcrumb-line breadcrumb-line-component">
   <a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a>
   <ul class="breadcrumb">
      <li><a href=""><i class="icon-home2 position-left"></i> Home</a></li>
      <li><a href="">Dashboard</a></li>
      <li class="active">Privilege List</li>
   </ul>
</div>
<br>
<!-- Main charts -->
<div class="row">
   <div class="col-lg-12">
      <!-- Traffic sources -->
      <div class="panel panel-flat">
        <div class="panel-heading">
           <h2 class="panel-title">Privilege Details</h2>
           <div style="text-align:right;">
              <a class="btn bg-purple" href="<?php echo  base_url();?>Privilege/privilegeData"><i class="glyphicon glyphicon-plus"></i> Add </a>
              <!--a href="<?php echo  base_url();?>island/islandList" class="btn bg-pink"><i class="glyphicon glyphicon-refresh"></i> List</a-->
           </div>
           <hr/>
        </div>
         <table class="table datatable-button-print-columns">
            <thead>
               <tr>

                 <th>Sno</th>
                 <th>Employee Name</th>
                 <th>Modules</th>
                
                 <th style="width:150px;">Action </th>

               </tr>
            </thead>
            <tbody>
            <?php
            $i=1;
              foreach($privilegeList as $row) {
            ?>
              <tr>
              <td><?php echo $i; ?></td>
              <td>
			  <?php 
				$data5 = $this->db->get_where("tbl_semployee", array("id"=>$row->emp_id))->result();
				foreach($data5 as $data5_row)
				{
					echo $data5_row->name;
				}
			  ?></td>
              <td>
			  <?php 
				$mod = explode(",", trim($row->module, ','));
					$j = 1;
					foreach($mod as $mod_row)
					{
						if($mod_row == "Country/countryList")
						{
							echo $j.' ) '.'Country Details'.'<br>';
						}
						if($mod_row == "SAtellmemore")
						{
							echo $j.' ) '.'Tell Me More'.'<br>';
						}
						if($mod_row == "Island/islandList")
						{
							echo $j.' ) '.'Island Details'.'<br>';
						}
						if($mod_row == "DCleisure/Keywordlist")
						{
							echo $j.' ) '.'Product Keywords'.'<br>';
						}
						if($mod_row == "SAppd")
						{
							echo $j.' ) '.'Popular Diving Destinations'.'<br>';
						}
						if($mod_row == "SAdivepoint")
						{
							echo $j.' ) '.'Dive Points'.'<br>';
						}
						if($mod_row == "SAleisure/SAleisuredashboard")
						{
							echo $j.' ) '.'Leisure Dive'.'<br>';
						}
						if($mod_row == "SAcourses/SAcoursesdashboard")
						{
							echo $j.' ) '.'Courses & Specialties'.'<br>';
						}
						if($mod_row == "SAReports/salesReportsList")
						{
							echo $j.' ) '.'Sales Report'.'<br>';
						}
						if($mod_row == "SAReports/cancelReportsList")
						{
							echo $j.' ) '.'Cancel Report'.'<br>';
						}
						if($mod_row == "SAReports/visitList")
						{
							echo $j.' ) '.'Visit Report'.'<br>';
						}
						if($mod_row == "SAReports/daterangeList")
						{
							echo $j.' ) '.'Date Range Report'.'<br>';
						}
						if($mod_row == "DCprofile/DCgalleryList")
						{
							echo $j.' ) '.'Gallery'.'<br>';
						}
						if($mod_row == "SAslider")
						{
							echo $j.' ) '.'Slider Details'.'<br>';
						}
						if($mod_row == "SABooking/bookingList")
						{
							echo $j.' ) '.'Dive Center Booking Details'.'<br>';
						}
						if($mod_row == "SAbecomeapartner")
						{
							echo $j.' ) '.'Become a Partner'.'<br>';
						}
						if($mod_row == "SAbecomeapartner/userDetails/Customer")
						{
							echo $j.' ) '.'User Details'.'<br>';
						}
						if($mod_row == "SAbecomeapartner/diveCenterDetails")
						{
							echo $j.' ) '.'Dive Center Details'.'<br>';
						}
						if($mod_row == "Subscribe")
						{
							echo $j.' ) '.'Subscriber Details'.'<br>';
						}
						if($mod_row == "promo_code")
						{
							echo $j.' ) '.'Promo Code'.'<br>';
						}
						$j++;
					}
			  ?></td>
             
              <td style="text-align:right">
              <a href="<?php echo base_url(); ?>Privilege/editPrivilege/<?php echo $row->id;?>" title="Edit" class="btn bg-success"><i class="glyphicon glyphicon-pencil "></i>
              </a>&nbsp;&nbsp;<a href="<?php echo base_url(); ?>Privilege/deletePrivilege/<?php echo $row->id;?>"  title="Delete" class="btn bg-danger remove" onclick="return confirm('Are You Sure to delete');"><i class="glyphicon glyphicon-remove "></i></a>
              </td>
              </tr>
              <?php $i++;}?>


            </tbody>
         </table>
      </div>
      <!-- /traffic sources -->
   </div>
</div>
<!-- /dashboard content -->
