<div class="content-wrapper">
<!-- Content area -->
<div class="content">
<div class="breadcrumb-line breadcrumb-line-component">
   <a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a>
   <ul class="breadcrumb">
      <li><a href=""><i class="icon-home2 position-left"></i> Home</a></li>
      <li><a href="">Dashboard</a></li>
      <li class="active">Message Inbox</li>
   </ul>
</div>
<br>

<div class="row">
   <div class="col-md-12">
	<div class="panel panel-flat">
		<div class="panel-heading">
			<h2 class="panel-title">Message Inbox</h2>
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
					<li ><a href="<?php echo base_url(); ?>Chat/inbox" >Inbox</a></li>
					<li class="active" ><a href="<?php echo base_url(); ?>Chat/sentItems" >Sent Items</a></li>
					
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
			
          
        <table class="table datatable-button-print-columns">
            <thead>
               <tr>

                <th>ID</th>
                <th>Sender Name</th>
                <th>Message</th>
                
                <th>Time</th>
                

               </tr>
            </thead>
            <tbody>
            <?php
            $i=1;
              foreach($sentItems as $row) {
            ?>
              <tr>
              <td><a href="<?php echo base_url(); ?>Chat/new_chat/<?php echo $row->to;?>" ><?php echo $i; ?></a></td>
              <td><a href="<?php echo base_url(); ?>Chat/new_chat/<?php echo $row->to;?>" ><?php echo $row->to_name;?></a></td>
              <td><a href="<?php echo base_url(); ?>Chat/new_chat/<?php echo $row->to;?>" ><?php echo $row->message;?></a></td>
            
              <td><a href="<?php echo base_url(); ?>Chat/new_chat/<?php echo $row->to;?>" ><?php echo $row->time;?></a></td>
              
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