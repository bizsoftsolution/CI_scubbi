<div class="content-wrapper">
<!-- Content area -->
<div class="content">
<div class="breadcrumb-line breadcrumb-line-component">
   <a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a>
   <ul class="breadcrumb">
      <li><a href=""><i class="icon-home2 position-left"></i> Home</a></li>
      <li><a href="">Dashboard</a></li>
      <li class="active">General Info</li>
   </ul>
</div>
<br>
<!-- Main charts -->
<div class="row">
   <div class="col-lg-12">
      <!-- Traffic sources -->
      <div class="panel panel-flat">
         <div class="panel-heading">
            <h2 class="panel-title">General Info</h2>
            <div style="text-align:right;">
               <a class="btn bg-violet" href="<?php echo  base_url();?>Generalinfo/addNew"><i class="glyphicon glyphicon-plus"></i> Add </a>
               <a href="<?php echo  base_url();?>Generalinfo/generalinfoList" class="btn bg-pink"><i class="glyphicon glyphicon-refresh"></i> List</a>
            </div>
            <hr/>
         </div>
         <div class="container-fluid">
            <!-- content Starts Here-->
            <div class="col-md-1"></div>
            <div class="col-md-11">
               <br>
               <?php if($message == "FAILED") { ?>
               <div class="alert alert-danger">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <strong>Action Failed !!! </strong>
               </div>
               <?php } else if($message == "SUCCESS") {  ?>
               <div class="alert alert-success">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <strong>Success !!! </strong> Updated successfully
               </div>
               <?php } ?>
               <?php foreach($generalinfo as $row){?>
               <form name="add"   method="POST" action="<?php echo  base_url();?>Generalinfo/editData/<?php echo $row->id;?>" class="form-horizontal">
				  <div class="form-body">
                     <div class="form-group">
                        <label class="control-label col-md-2">Description</label>
                        <div class="col-md-10">
                           <textarea name="edit_general_info_description" class="form-control" id="editor-full" ><?php echo $row->description;?></textarea>
                        </div>
                     </div>
                  </div>
                  

                  <div style="text-align:center">
                     <input type="submit" name="update_genetalinfo_data" value="Update" class="btn btn-success">
                     <input type="reset" value="Reset" class="btn btn-danger">
                  </div>
               </form>
               <?php } ?>
			   <!--CKeditor-->
				<script type="text/javascript" src="<?php echo base_url('assets/js/core/libraries/jquery.min.js');?>"></script>
				<script type="text/javascript" src="<?php echo base_url('assets/ckeditor/ckeditor.js');?>"></script>
				<script type="text/javascript" src="<?php echo base_url('assets/js/pages/editor_ckeditor.js');?>"></script>
               <br><br>
            </div>
         </div>
      </div>
      <!-- /traffic sources -->
   </div>
</div>
<!-- /dashboard content -->
   