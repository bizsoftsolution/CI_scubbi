<script type="application/javascript">
/** After windod Load */
$(window).bind("load", function() {
  window.setTimeout(function() {
    $(".alert").fadeTo(300, 0).slideUp(500, function(){
        $(this).remove();
    });
}, 4000);
});

</script>
<div class="content-wrapper">
<!-- Content area -->
<div class="content">
<div class="breadcrumb-line breadcrumb-line-component">
   <a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a>
   <ul class="breadcrumb">
      <li><a href=""><i class="icon-home2 position-left"></i> Home</a></li>
      <li><a href="">Dashboard</a></li>
      <li class="active">Courses & Specialties List</li>
   </ul>
</div>
<br>

<div class="row">
   <div class="col-md-12">
	<div class="panel panel-flat">
		<div class="panel-heading">
			<h2 class="panel-title">Courses & Specialties List</h2>
			<div class="heading-elements">
				<ul class="icons-list">
					<li><a data-action="collapse"></a></li>
					<li><a data-action="reload"></a></li>
					<!-- <li><a data-action="close"></a></li> -->
				</ul>
			</div>
		</div>

		<div class="panel-body">
    <?php

        if($this->session->flashdata('item')) {
        $message = $this->session->flashdata('item');
        ?>
        <div class="<?php echo $message['class'] ?>"><?php echo $message['message']; ?>

        </div>
        <?php
        }
        ?>
			<div class="tabbable">
				<ul class="nav nav-tabs nav-tabs-highlight">
					<li class="active"><a href="<?php echo base_url(); ?>SAcourses/SAcoursesdashboard" >Dashboard</a></li>
					<li ><a href="<?php echo base_url(); ?>SAcourses/addNew" >Add Standard Product</a></li>
					
				</ul>

				<div class="tab-content">
					<div class="active">
      <!-- Traffic sources -->
			<!--div class="row">
				<!--div class="col-md-6">
					<ul class="nav nav-tabs nav-tabs-bottom bottom-divided">
						<li class="active"><a href="<?php echo base_url(); ?>SAprofile/SAstaffList">Administration Staff</a></li>
						<li><a href="<?php echo base_url(); ?>SAprofile/SAmasterList">Dive Master & Instructor Details</a></li>
					</ul>
				</div->
				<div class="col-md-12">
					<div style="text-align:right;">
					  <a class="btn bg-purple" href="<?php echo  base_url();?>SAleisure/addNew"><i class="glyphicon glyphicon-plus"></i> Add </a>
              <a href="<?php echo  base_url();?>SAleisure/SAleisurelist" class="btn bg-pink"><i class="glyphicon glyphicon-refresh"></i> List</a>
				   </div>
				</div>
			</div-->
			
          
        <table class="table datatable-button-print-columns">
            <thead>
               <tr>

                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Keywords</th>
                <th>Sequence</th>
                <th>Status</th>
                <th style="width:150px;">Action </th>

               </tr>
            </thead>
            <tbody>
            <?php
            $i=1;
              foreach($SAcoursesdashboard as $row) {
            ?>
              <tr>
              <td><?php echo sprintf('%03d',$row->id); ?></td>
              <td><?php echo $row->product_name;?></td>
              <td><?php echo $row->product_description;?></td>
              <td><?php echo $row->product_keyword;?></td>
              <td><?php echo $row->sequence_number;?></td>
              <td><?php echo $row->product_status;?></td>
              <td style="text-align:right">
              <a href="<?php echo base_url(); ?>SAcourses/edit/<?php echo $row->id;?>" title="Edit" class="btn bg-success"><i class="glyphicon glyphicon-pencil "></i>
              </a>&nbsp;&nbsp;<a href="<?php echo base_url(); ?>SAcourses/delete/<?php echo $row->id;?>"  title="Delete" class="btn bg-danger remove" onclick="return confirm('Are You Sure to delete');"><i class="glyphicon glyphicon-remove "></i></a>
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


<!-- /dashboard content -->