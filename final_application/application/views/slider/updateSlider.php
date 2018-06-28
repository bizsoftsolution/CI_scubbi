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
               <a class="btn bg-violet" href="<?php echo  base_url();?>Slider/addNew"><i class="glyphicon glyphicon-plus"></i> Add </a>
               <a href="<?php echo  base_url();?>Slider/sliderList" class="btn bg-pink"><i class="glyphicon glyphicon-refresh"></i> List</a>
            </div>
            <hr/>
         </div>
         <div class="container-fluid">
            <!-- content Starts Here-->
            <!--div class="col-md-2"></div-->
            <div class="col-md-12">
               <br>
               <?php if($message == "FAILED") { ?>
               <div class="alert alert-danger">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <strong>Action Failed !!! </strong>
               </div>
               <?php } else if($message == "SUCCESS") {  ?>
               <div class="alert alert-success">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <strong>Success !!! </strong> New Group Created successfully
               </div>
               <?php } ?>
               <?php foreach($geteditdata as $row){?>
               <form name="add"   method="POST" action="<?php echo  base_url();?>slider/editData/<?php echo $row->banner_id;?>" class="form-horizontal" enctype="multipart/form-data">
                  <div class="form-body">
                     <div class="form-group">
                        <label class="control-label col-md-3">BG Image</label>
						<div class="col-md-3">
						<img src="<?php echo base_url(); ?>upload/slider/<?php echo $row->banner_background; ?>" class="img-responsive" style="width:180px; height:100px;">
						</div>
                        <div class="col-md-3">	
                           <input name="edit_bg_image" class="form-control" type="file">
                        </div>
						<div class="col-md-3"> <input type="submit" name="submit_updatebgimage" value="Update" class="btn btn-success"></div>
                     </div>
                  </div>
               </form>
			   <hr>
			   <form name="add"   method="POST" action="<?php echo  base_url();?>slider/editData/<?php echo $row->banner_id;?>" class="form-horizontal" enctype="multipart/form-data">
                  <div class="form-body">
                     <div class="form-group">
                        <label class="control-label col-md-3">Banner Image1</label>
						<div class="col-md-3">
						<img src="<?php echo base_url(); ?>upload/slider/<?php echo $row->image1; ?>" class="img-responsive" style="width:180px; height:100px;">
						</div>
                        <div class="col-md-3">	
                           <input name="edit_bn_image1" class="form-control" type="file">
                        </div>
						<div class="col-md-3"> <input type="submit" name="submit_updatebnimage1" value="Update" class="btn btn-success"></div>
                     </div>
                  </div>
               </form>
			    <hr>
			   <form name="add"   method="POST" action="<?php echo  base_url();?>slider/editData/<?php echo $row->banner_id;?>" class="form-horizontal" enctype="multipart/form-data">
                  <div class="form-body">
                     <div class="form-group">
                        <label class="control-label col-md-3">Banner Image2</label>
						<div class="col-md-3">
						<img src="<?php echo base_url(); ?>upload/slider/<?php echo $row->image2; ?>" class="img-responsive" style="width:180px; height:100px;">
						</div>
                        <div class="col-md-3">	
                           <input name="edit_bn_image2" class="form-control" type="file">
                        </div>
						<div class="col-md-3"> <input type="submit" name="submit_updatebnimage2" value="Update" class="btn btn-success"></div>
                     </div>
                  </div>
               </form>
               <?php } ?>
               <br><br>
            </div>
         </div>
      </div>
      <!-- /traffic sources -->
   </div>
</div>
<!-- /dashboard content -->
   