<div class="content-wrapper">
<!-- Content area -->
<div class="content">
<div class="breadcrumb-line breadcrumb-line-component">
   <a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a>
   <ul class="breadcrumb">
      <li><a href=""><i class="icon-home2 position-left"></i> Home</a></li>
      <li><a href="">Dashboard</a></li>
      <li class="active">Slider</li>
   </ul>
</div>
<br>
<!-- Main charts -->
<div class="row">
   <div class="col-lg-12">
      <!-- Traffic sources -->
      <div class="panel panel-flat">
        <div class="panel-heading">
           <h2 class="panel-title">Slider Details</h2>
           <div style="text-align:right;">
              <a class="btn bg-purple" href="<?php echo  base_url();?>Slider/addNew"><i class="glyphicon glyphicon-plus"></i> Add </a>
              <a href="<?php echo  base_url();?>Slider/sliderList" class="btn bg-pink"><i class="glyphicon glyphicon-refresh"></i> List</a>
           </div>
           <hr/>
        </div>
         <table class="table datatable-button-print-columns">
            <thead>
               <tr>

                 <th>Sno</th>
                 <th>BG Image</th>
				<th>Banner Image1</th>
				<th>Banner Image2</th>
                 <th style="width:150px;">Action </th>

               </tr>
            </thead>
            <tbody>
            <?php
            $i=1;
              foreach($sliderList as $row) {
            ?>
              <tr>
              <td><?php echo $i; ?></td>
              <td><img src="<?php echo base_url(); ?>upload/slider/<?php echo $row->banner_background;?>" style="width:100px;height:60px;"/></td>
              <td><img src="<?php echo base_url(); ?>upload/slider/<?php echo $row->image1;?>" style="width:100px;height:60px;"/></td>
              <td><img src="<?php echo base_url(); ?>upload/slider/<?php echo $row->image2;?>" style="width:100px;height:60px;"/></td>
             
              <td style="text-align:right">
              <a href="<?php echo base_url(); ?>Slider/editData/<?php echo $row->banner_id;?>" title="Edit" class="btn bg-success"><i class="glyphicon glyphicon-pencil "></i>
              </a>&nbsp;&nbsp;<a href="<?php echo base_url(); ?>Slider/deleteData/<?php echo $row->banner_id;?>"  title="Delete" class="btn bg-danger remove" onclick="return confirm('Are You Sure to delete');"><i class="glyphicon glyphicon-remove "></i></a>
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
