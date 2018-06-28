<div class="content-wrapper">
<!-- Content area -->
<div class="content">
<div class="breadcrumb-line breadcrumb-line-component">
   <a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a>
   <ul class="breadcrumb">
      <li><a href=""><i class="icon-home2 position-left"></i> Home</a></li>
      <li><a href="">Dashboard</a></li>
      <li class="active">Plan</li>
   </ul>
</div>
<br>
<!-- Main charts -->
<div class="row">
   <div class="col-lg-12">
      <!-- Traffic sources -->
      <div class="panel panel-flat">
        <div class="panel-heading">
           <h2 class="panel-title">Plan List</h2>
           <div style="text-align:right;">
              <a class="btn bg-purple" href="<?php echo  base_url();?>Plan/addNew"><i class="glyphicon glyphicon-plus"></i> Add </a>
              <a href="<?php echo  base_url();?>Plan/planList" class="btn bg-pink"><i class="glyphicon glyphicon-refresh"></i> List</a>
           </div>
           <hr/>
        </div>
         <table class="table datatable-button-print-columns">
            <thead>
               <tr>

                <th>Sno</th>
                <th>Country</th>
				<th>Island</th>
				<th>Per Day Amount</th>
				<th>Image</th>
				<th>Popular Dive Destination</th>
                 <th style="width:150px;">Action </th>
               </tr>
            </thead>
            <tbody>
            <?php
            $i=1;
              foreach($planList as $row) {
            ?>
              <tr>
              <td><?php echo $i; ?></td>
              <td>
			  <?php 
				$cvall = $row->country_id;
				$data1=$this->db->get_where('tbl_country', array('country_id'=>$cvall))->result();
				foreach($data1 as $cval)
				{
					echo $cval->country_name;
				}
				?>
				</td>
              <td>
			  <?php 
				$ivall = $row->island_id;
				$data2=$this->db->get_where('tbl_island', array('island_id'=>$ivall))->result();
				foreach($data2 as $ival)
				{
					echo $ival->island_name;
				}
				?>
			</td>
              <td><?php echo $row->per_day_amount;?></td>
              <td><img src="<?php echo base_url(); ?>upload/plan/<?php echo $row->image;?>" style="width:70px;height:60px;"></td>  
			  <td style="text-align:center"><?php echo $row->popular_dive_destination;?></td>
              <td style="text-align:right">
              <a href="<?php echo base_url(); ?>Plan/editData/<?php echo $row->daily_plan;?>" title="Edit" class="btn bg-success"><i class="glyphicon glyphicon-pencil "></i>
              </a>&nbsp;&nbsp;<a href="<?php echo base_url(); ?>Plan/deleteData/<?php echo $row->daily_plan;?>"  title="Delete" class="btn bg-danger remove" onclick="return confirm('Are You Sure to delete');"><i class="glyphicon glyphicon-remove "></i></a>
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
