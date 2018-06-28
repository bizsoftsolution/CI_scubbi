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
      <li class="active">Leisure List</li>
   </ul>
   
				
</div>
<br>

<div class="row">
   <div class="col-md-12">
	<div class="panel panel-flat">
		<div class="panel-heading">
			<h2 class="panel-title">Leisure List</h2>
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
					<li class="active"><a href="<?php echo base_url(); ?>DCleisure/DCleisuredashboard" >Dashboard</a></li>
					<li ><a href="<?php echo base_url(); ?>DCleisure/DCleisurelist" >Add Standard Product</a></li>
					<li ><a href="<?php echo base_url(); ?>DCleisure/addNew" >Add Customized Product</a></li>
				</ul>

				<div class="tab-content">
					<div class="active">
      <!-- Traffic sources -->
			<!--div class="row">
				<!--div class="col-md-6">
					<ul class="nav nav-tabs nav-tabs-bottom bottom-divided">
						<li class="active"><a href="<?php echo base_url(); ?>DCprofile/DCstaffList">Administration Staff</a></li>
						<li><a href="<?php echo base_url(); ?>DCprofile/DCmasterList">Dive Master & Instructor Details</a></li>
					</ul>
				</div->
				<div class="col-md-12">
					<div style="text-align:right;">
					  <a class="btn bg-purple" href="<?php echo  base_url();?>DCleisure/addNew"><i class="glyphicon glyphicon-plus"></i> Add </a>
              <a href="<?php echo  base_url();?>DCleisure/DCleisurelist" class="btn bg-pink"><i class="glyphicon glyphicon-refresh"></i> List</a>
				   </div>
				</div>
			</div-->
										<div class="panel-body">
									<div class="tabbable">
										<ul class="nav nav-tabs">
											<li class="active"><a href="#basic-tab1" data-toggle="tab">All Products</a></li>
											<li><a href="#basic-tab2" data-toggle="tab">Disabled Product</a></li>
										
										</ul>

										<div class="tab-content">
											<div class="tab-pane active" id="basic-tab1">
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
              foreach($DCleisuredashboard as $row) {
            ?>
              <tr>
              <td><?php echo $i; ?></td>
              <td><?php echo $row->product_name;?></td>
              <td><?php echo $row->product_description;?></td>
              <td><?php echo $row->product_keyword;?></td>
              <td><?php echo $row->sequence_number;?></td>
              <td><?php echo $row->product_status;?></td>
              <td style="text-align:right">
              <a href="<?php echo base_url(); ?>DCleisure/edit/<?php echo $row->id;?>" title="Edit" class="btn bg-success"><i class="glyphicon glyphicon-pencil "></i>
              </a>&nbsp;&nbsp;<a href="<?php echo base_url(); ?>DCleisure/delete/<?php echo $row->id;?>"  title="Delete" class="btn bg-danger remove" onclick="return confirm('Are You Sure to delete');"><i class="glyphicon glyphicon-remove "></i></a>
              </td>
              </tr>
              <?php $i++;}?>
            </tbody>
         </table>
											</div>

											<div class="tab-pane" id="basic-tab2">
											<?php
                                                                                        $this->db->select('*');
                                                                                        $this->db->where('user_id',$this->session->userdata('user_id'));
                                                                                        $this->db->where('status', 'DISABLE');
                                                                                        $que = $this->db->get('tbl_dcleisure')->result();
                                                                                        ?>
                                                                                           <table class="table datatable-button-print-columns">
            <thead>
               <tr>

                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Keywords</th>
                <th>Sequence</th>
                
                <th style="width:150px;">Action </th>

               </tr>
            </thead>
            <tbody>
            <?php
            $i=1;
              foreach($que as $row1) {
            ?>
              <tr>
              <td><?php echo $i; ?></td>
              <td><?php echo $row1->product_name;?></td>
              <td><?php echo $row1->product_description;?></td>
              <td><?php echo $row1->product_keyword;?></td>
              <td><?php echo $row1->sequence_number;?></td>
              
              <td style="text-align:right">
                  <a href="<?php echo base_url(); ?>DCleisure/enableProduct/<?php echo $row1->id;?>" title="Edit" class="btn bg-success">ENABLE</a>
              
              </td>
              </tr>
              <?php $i++;}?>
            </tbody>
         </table> 
                                                                                            
                                                                                            
                                                                                            
                                                                                            
                                                                                            
                                                                                            
                                                                                            
                                                                                            
                                                                                            
                                                                                                
											</div>

											
										</div>
									</div>
								</div>	
          

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
