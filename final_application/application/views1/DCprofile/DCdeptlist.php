<div class="content-wrapper">
<!-- Content area -->
<div class="content">
<div class="breadcrumb-line breadcrumb-line-component">
   <a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a>
   <ul class="breadcrumb">
      <li><a href=""><i class="icon-home2 position-left"></i> Home</a></li>
      <li><a href="">Dashboard</a></li>
      <li class="active">Department</li>
   </ul>
</div>
<br>
<!-- Main charts -->
<div class="row">
   <div class="col-md-12">
   
		<div class="panel panel-flat">
		<div class="panel-heading">
			<h2 class="panel-title">Department List</h2>
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
						<li><a href="<?php echo base_url(); ?>DCprofile/DCmasterList">Dive Master & Instructor Details</a></li>
						<li class="active"><a href="<?php echo base_url(); ?>DCprofile/deptList">Department</a></li>
					</ul>
				</div>
				<div class="col-md-4">
					<div style="text-align:right;">
					  <a class="btn bg-purple" href="<?php echo  base_url();?>DCprofile/addDept"><i class="glyphicon glyphicon-plus"></i> Add </a>
              <a href="<?php echo  base_url();?>DCprofile/deptList" class="btn bg-pink"><i class="glyphicon glyphicon-refresh"></i> List</a>
				   </div>
				</div>
			</div>
			
           <hr/>
         <table class="table datatable-button-print-columns">
            <thead>
               <tr>

                <th>Sno</th>
                <th>Department Name</th>
                 <th style="width:150px;">Action </th>

               </tr>
            </thead>
            <tbody>
				<tr>
					<td>1</td>
					<td>Reservation</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td>2</td>
					<td>Billing & Settlement</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td>3</td>
					<td>Dive center manager</td>
					<td>&nbsp;</td>
				</tr>
            <?php
            $i=4;
              foreach($department as $row) {
            ?>
              <tr>
              <td><?php echo $i; ?></td>
              <td><?php echo $row->dept_name;?></td>
              <td style="text-align:right">
              <a href="<?php echo base_url(); ?>DCprofile/departedit/<?php echo $row->id;?>" title="Edit" class="btn bg-success"><i class="glyphicon glyphicon-pencil "></i>
              </a>&nbsp;&nbsp;<a href="<?php echo base_url(); ?>DCprofile/departdelete/<?php echo $row->id;?>"  title="Delete" class="btn bg-danger remove" onclick="return confirm('Are You Sure to delete');"><i class="glyphicon glyphicon-remove "></i></a>
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