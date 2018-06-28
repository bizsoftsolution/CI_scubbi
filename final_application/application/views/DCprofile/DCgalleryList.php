<div class="content-wrapper">
<!-- Content area -->
<div class="content">
<div class="breadcrumb-line breadcrumb-line-component">
   <a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a>
   <ul class="breadcrumb">
      <li><a href=""><i class="icon-home2 position-left"></i> Home</a></li>
      <li><a href="">Dashboard</a></li>
      <li class="active">Gallery</li>
   </ul>
</div>
<br>
<!-- Main charts -->
<div class="row">
   <div class="col-md-12">
	<div class="panel panel-flat">
		<div class="panel-heading">
			<h2 class="panel-title">Gallery</h2>
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
				<?php 
					if($this->session->userdata('user_type') == 'SUPERADMIN')
					{
				?>
					<li class="active"><a href="<?php echo base_url(); ?>DCprofile/DCgalleryList" >Gallery</a></li>
					<?php 
					}
					elseif($this->session->userdata('user_type') == 'DCADMIN')
					{
					?>
						<li><a href="<?php echo base_url(); ?>DCprofile/addNew" >Details</a></li>
						<li><a href="<?php echo base_url(); ?>DCprofile/DCstaffList" >Contacts</a></li>
						<li class="active"><a href="<?php echo base_url(); ?>DCprofile/DCgalleryList" >Gallery</a></li>
					<?php 
					}
					?>
				</ul>

				<div class="tab-content">
					<div class="active">
           <div style="text-align:right;">
              <a class="btn bg-purple" href="<?php echo  base_url();?>DCprofile/addGallery"><i class="glyphicon glyphicon-plus"></i> Add </a>
              <a href="<?php echo  base_url();?>DCprofile/DCgalleryList" class="btn bg-pink"><i class="glyphicon glyphicon-refresh"></i> List</a>
           </div>
           <hr/>

		<div class="container-fluid">
			<div class="row">
				 <?php
				  if($DCgallerylist != false)
				 {
              foreach($DCgallerylist as $row) 
			  {
            ?>
			<div class="col-md-4">
				<div class="thumbnail" style="border: 2px solid #f4f4f4; border-radius: 5px;">
					<div class="thumb" >
						<img src="<?php echo base_url(); ?>upload/DCprofile/gallery/<?php echo $row->gallery; ?>" alt="" style="height:200px;" class="img-responsive">
						<div class="caption-overflow">
							<span>
								<a href="<?php echo base_url(); ?>upload/DCprofile/gallery/<?php echo $row->gallery; ?>" data-popup="lightbox" class="btn border-white text-white btn-flat btn-icon btn-rounded"><i class="icon-plus3"></i></a>
							</span>
						</div>
					</div>
					<div class="caption" style="background:#f5f5f5;padding-top: 10px;">
						<h6 class="no-margin">
						<a href="<?php echo base_url(); ?>DCprofile/editGallery/<?php echo $row->id;?>" class="" style="color:green;"><i class="glyphicon glyphicon-pencil "></i></a>
						<span class="pull-right">
						<a href="<?php echo base_url(); ?>DCprofile/deleteGallery/<?php echo $row->id;?>" class="remove" style="color:red;" onclick="return confirm('Are You Sure to delete');"><i class="glyphicon glyphicon-remove "></i></a>
						</span>
						<!--i class="icon-three-bars pull-right"></i--></h6>
					</div>
				</div>
			</div>
			<?php 
			  }
				 }
			?>
			</div>
			<div class="row">&nbsp;</div>
			<div class="row">&nbsp;</div>
			<div class="row text-right" style="padding:0 15px;">
				<?php echo $links; ?>
			</div>
		</div>
		<br><br>
		
		
         <!--table class="table datatable-button-print-columns">
            <thead>
               <tr>

                <th>Sno</th>
                <th>Gallery</th>
                <th style="width:150px;">Action </th>

               </tr>
            </thead>
            <tbody>
            <?php
            $i=1;
              foreach($DCgallerylist as $row) {
            ?>
              <tr>
              <td><?php echo $i; ?></td>
              <td><img src="<?php echo base_url(); ?>/upload/DCprofile/gallery/<?php echo $row->gallery; ?>" width="70px" height="50px"></td>
              <td style="text-align:right">
              <a href="<?php echo base_url(); ?>DCprofile/editGallery/<?php echo $row->id;?>" title="Edit" class="btn bg-success"><i class="glyphicon glyphicon-pencil "></i>
              </a>&nbsp;&nbsp;<a href="<?php echo base_url(); ?>DCprofile/deleteGallery/<?php echo $row->id;?>"  title="Delete" class="btn bg-danger remove" onclick="return confirm('Are You Sure to delete');"><i class="glyphicon glyphicon-remove "></i></a>
              </td>
              </tr>
              <?php $i++;}?>


            </tbody>
         </table-->

					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
<!-- /dashboard content -->
