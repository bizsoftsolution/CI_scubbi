<div class="content-wrapper">
<!-- Content area -->
<div class="content">
<div class="breadcrumb-line breadcrumb-line-component">
   <a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a>
   <ul class="breadcrumb">
      <li><a href=""><i class="icon-home2 position-left"></i> Home</a></li>
      <li><a href="">Dashboard</a></li>
      <li class="active">Dive Master Instructor</li>
   </ul>
</div>
<br>
<div class="row">
   <div class="col-md-12">
   
   
	<div class="panel panel-flat">
		<div class="panel-heading">
			<h2 class="panel-title">Dive Master Instructor</h2>
			<div class="heading-elements">
				<ul class="icons-list">
					<li><a data-action="collapse"></a></li>
					<li><a data-action="reload"></a></li>
					<!-- <li><a data-action="close"></a></li> -->
				</ul>
			</div>
		</div>

		<div class="panel-body">
			<div class="tabbable">
				<ul class="nav nav-tabs nav-tabs-highlight">
					<li ><a href="<?php echo base_url(); ?>DCprofile/addNew" >Details</a></li>
					<li class="active"><a href="<?php echo base_url(); ?>DCprofile/DCstaffList" >Contacts</a></li>
					<li><a href="<?php echo base_url(); ?>DCprofile/DCgalleryList" >Gallery</a></li>
				</ul>

				<div class="tab-content">
					<div class="active">
      <!-- Traffic sources -->
			<div class="row">
				<div class="col-md-8">
					<ul class="nav nav-tabs nav-tabs-bottom bottom-divided">
						<li><a href="<?php echo base_url(); ?>DCprofile/DCstaffList">Administration Staff</a></li>
						<li class="active"><a href="<?php echo base_url(); ?>DCprofile/DCmasterList">Dive Master & Instructor Details</a></li>
						<li><a href="<?php echo base_url(); ?>DCprofile/deptList">Department</a></li>
					</ul>
				</div>
				<div class="col-md-4">
					<div style="text-align:right;">
					  <a class="btn bg-purple" href="<?php echo  base_url();?>DCprofile/addDivemaster"><i class="glyphicon glyphicon-plus"></i> Add </a>
              <a href="<?php echo  base_url();?>DCprofile/DCmasterList" class="btn bg-pink"><i class="glyphicon glyphicon-refresh"></i> List</a>
				   </div>
				</div>
			</div>
			
           <hr/>
        <table class="table datatable-button-print-columns">
            <thead>
               <tr>

                <th>Sno</th>
                <th>Photo</th>
				<th>Name</th>
				<th>Position</th>
				<!--th>Cert Body</th-->
				<th>ID No</th>
                 <th style="width:150px;">Action </th>

               </tr>
            </thead>
            <tbody>
            <?php
            $i=1;
              foreach($DCmasterlist as $row) {
            ?>
              <tr>
              <td><?php echo $i; ?></td>
              <td><img src="<?php echo base_url(); ?>upload/DCprofile/<?php echo $row->images; ?>" class="img-responsive" style="width:100px;"/></td>
              <td><?php echo $row->name; ?></td>
              <td><?php echo $row->position;?></td>
              <!--td><?php echo $row->cert_body;?></td-->
              <td><?php echo $row->id_no;?></td>
              <td style="text-align:right">
              <a href="<?php echo base_url(); ?>DCprofile/editDivemaster/<?php echo $row->id;?>" title="Edit" class="btn bg-success"><i class="glyphicon glyphicon-pencil "></i>
              </a>&nbsp;&nbsp;<a href="<?php echo base_url(); ?>DCprofile/deleteDivemaster/<?php echo $row->id;?>"  title="Delete" class="btn bg-danger remove" onclick="return confirm('Are You Sure to delete');"><i class="glyphicon glyphicon-remove "></i></a>
              </td>
              </tr>
              <?php $i++;}?>


            </tbody>
         </table>
      <!-- /traffic sources -->
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>

<!-- /dashboard content -->
