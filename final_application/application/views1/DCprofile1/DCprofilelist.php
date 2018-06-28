<div class="content-wrapper">
<!-- Content area -->
<div class="content">
<div class="breadcrumb-line breadcrumb-line-component">
   <a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a>
   <ul class="breadcrumb">
      <li><a href=""><i class="icon-home2 position-left"></i> Home</a></li>
      <li><a href="">Dashboard</a></li>
      <li class="active">Dive Center Profile</li>
   </ul>
</div>
<br>
<!-- Main charts -->
<div class="row">
   <div class="col-lg-12">
      <!-- Traffic sources -->
      <div class="panel panel-flat">
        <div class="panel-heading">
           <h2 class="panel-title">Dive Center Profile List</h2>
           <div style="text-align:right;">
              <!--a class="btn bg-purple" href="<?php echo  base_url();?>DCprofile/addNew"><i class="glyphicon glyphicon-plus"></i> Add </a-->
              <a href="<?php echo  base_url();?>DCprofile/DClist" class="btn bg-pink"><i class="glyphicon glyphicon-refresh"></i> List</a>
           </div>
           <hr/>
        </div>
         <table class="table datatable-button-print-columns">
            <thead>
               <tr>

                <th>Sno</th>
                <th>Dive Center Name</th>
				<th>Country</th>
				<th>Island</th>
				<th>Dive Center GPS x</th>
				<th>Dive Center GPS y</th>
                 <th style="width:150px;">Action </th>

               </tr>
            </thead>
            <tbody>
            <?php
            $i=1;
              foreach($DClist as $row) {
            ?>
              <tr>
              <td><?php echo $i; ?></td>
              <td><?php echo $row->dcname;?></td>
              <td>
			  <?php 
				$cvall = $row->dccountry;
				$data1=$this->db->get_where('tbl_country', array('country_id'=>$cvall))->result();
				foreach($data1 as $cval)
				{
					echo $cval->country_name;
				}
				?>
			  </td>
              <td>
			  <?php 
				$ivall = $row->dcislands;
				$data2=$this->db->get_where('tbl_island', array('island_id'=>$ivall))->result();
				foreach($data2 as $ival)
				{
					echo $ival->island_name;
				}
				?>
				</td>
              <td><?php echo $row->dcgps_x;?></td>
              <td><?php echo $row->dcgps_y;?></td>
              <!--td><img src="<?php echo base_url(); ?>upload/dive_center/<?php echo $row->center_image;?>" style="width:60px; height:40px"></td-->
             
              <td style="text-align:right">
              <a href="<?php echo base_url(); ?>DCprofile/edit/<?php echo $row->id;?>" title="Edit" class="btn bg-success"><i class="glyphicon glyphicon-pencil "></i>
              </a>&nbsp;&nbsp;<a href="<?php echo base_url(); ?>DCprofile/delete/<?php echo $row->id;?>"  title="Delete" class="btn bg-danger remove" onclick="return confirm('Are You Sure to delete');"><i class="glyphicon glyphicon-remove "></i></a>
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