<div class="content-wrapper">
<!-- Content area -->
<div class="content">
<div class="breadcrumb-line breadcrumb-line-component">
   <a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a>
   <ul class="breadcrumb">
      <li><a href=""><i class="icon-home2 position-left"></i> Home</a></li>
      <li><a href="">Dashboard</a></li>
      <li class="active">Popular Diving Destination</li>
   </ul>
</div>
<br>
<!-- Main charts -->
<div class="row">
   <div class="col-lg-12">
      <!-- Traffic sources -->
      <div class="panel panel-flat">
        <div class="panel-heading">
           <h2 class="panel-title">Popular Diving Destination</h2>
           <div style="text-align:right;">
              <!--a class="btn bg-purple" href="<?php echo  base_url();?>SAtellmemore"><i class="glyphicon glyphicon-plus"></i> Add </a-->
              <!--a href="<?php echo  base_url();?>SAslider" class="btn bg-pink"><i class="glyphicon glyphicon-refresh"></i> List</a-->
           </div>
           <hr/>
        </div>
         <table class="table datatable-button-print-columns">
            <thead>
               <tr>

                 <th>Sno</th>
                 <th>Island</th>
                 <th>Image</th>
                 <!--th style="width:150px;">Action </th-->

               </tr>
            </thead>
            <tbody>
            <?php
            $i=1;
              foreach($pddList as $row) {
            ?>
              <tr>
              <td><?php echo $i; ?></td>
              <td>
			  <?php 
				$island = $this->db->get_where('tbl_island', array('island_id'=>$row->island_id))->result();
				foreach($island as $row_island)
				echo $row_island->island_name; ?>
			  </td>
              <td><img src="<?php echo base_url(); ?>upload/tellmemore/<?php echo $row->images; ?>" width="100" height="50" class="img-responsive" /></td>
              <!--td style="text-align:right">
              <!--a href="<?php echo base_url(); ?>SAtellmemore/editData/<?php echo $row->id;?>" title="Edit" class="btn bg-success"><i class="glyphicon glyphicon-pencil "></i>
              </a>&nbsp;&nbsp;<a href="<?php echo base_url(); ?>SAtellmemore/deleteData/<?php echo $row->id;?>"  title="Delete" class="btn bg-danger remove" onclick="return confirm('Are You Sure to delete');"><i class="glyphicon glyphicon-remove "></i></a->
              </td-->
              </tr>
              <?php $i++;}?>


            </tbody>
         </table>
      </div>
      <!-- /traffic sources -->
   </div>
</div>
<!-- /dashboard content -->
