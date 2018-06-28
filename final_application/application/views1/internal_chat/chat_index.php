<div class="content-wrapper">
<!-- Content area -->
<div class="content">
<div class="breadcrumb-line breadcrumb-line-component">
   <a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a>
   <ul class="breadcrumb">
      <li><a href=""><i class="icon-home2 position-left"></i> Home</a></li>
      <li><a href="">Dashboard</a></li>
      <li class="active">Message </li>
   </ul>
</div>
<br>

<div class="row">
   <div class="col-md-12">
	<div class="panel panel-flat">
		<div class="panel-heading">
			<h2 class="panel-title">Message </h2>
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
					<li class="active" ><a href="<?php echo base_url(); ?>Chat/inbox" >Messages</a></li>
					<!--li><a href="<?php echo base_url(); ?>Chat/sentItems" >Sent Items</a></li-->
					
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
			
          <div id="message1">
		  <table class="table datatable-button-print-columns" >
            <thead>
               <tr>

                <th>ID</th>
                <th>Sender Name</th>
                <th>Message</th>
                <th>Status</th>
                <th>Time</th>
                <th>Action</th>

               </tr>
            </thead>
            <tbody id="message">
            <?php
            $i=1;
              foreach($inboxMsg as $row) {
				  $status="";
				if (($row->mcnt > 0) && ($row->scnt > 0)) {
            ?>
              <tr>
              <td><?php echo $i; ?></td>
              <td>
			  <?php 
				$from_id = $row->lfrom;
				$to_id = $row->lto;
				$lid = $row->lid;
				$thread = $row->thread_id;
				
				$crows = $this->db->get_where('messages', array('id'=>$lid))->result();
				$crow = $crows[0];
				$fullname = "";
				$fname=$this->db->get_where('tbl_customerprofile', array('user_id'=>$row->customer_id))->result();
				foreach($fname as $fn)
				{
					$fullname = $fn->firstname . " " . $fn->lastname . ", " . $fn->gender . " [" . $fn->language ."]";
				}
				
				if($from_id == $this->session->userdata('user_id'))
				{	
					//echo "customer $from_id " ;
					$data=$this->db->get_where('tbl_customerprofile', array('user_id'=>$to_id))->result();
					foreach($data as $data_val)
					{
						if($data_val->photo != NULL)
						{?>
							
							<img src="<?php echo base_url(); ?>upload/customerprofile/<?php echo $data_val->photo; ?>" class="img-circle" width="60px" height="60px" style="border:1px solid gray">
					<?php	}
						else{
					?>
							<img src="<?php echo base_url();?>upload/customerprofile/user.png" style="width:50px;height:50px;" > 
					<?php
						}
					}
				}
				
				elseif(($from_id == 33) || ($to_id == 33)) // sadmin
				{
					//echo $from_id;
					
					//echo "Admin";
					?>
							<img src="<?php echo base_url();?>upload/customerprofile/user.png" style="width:50px;height:50px;" > 
					<?php
				}
				elseif($to_id == $this->session->userdata('user_id'))
				{
					//echo "fhdfhdhfh";
					$data1=$this->db->get_where('tbl_customerprofile', array('user_id'=>$from_id))->result();
					foreach($data1 as $data_val1)
					{
						if($data_val1->photo != NULL)
						{?>
							
							<img src="<?php echo base_url(); ?>upload/customerprofile/<?php echo $data_val1->photo; ?>" class="img-circle" width="60px" height="60px" style="border:1px solid gray">
					<?php	}
						else{
					?>
							<img src="<?php echo base_url();?>upload/customerprofile/user.png" style="width:50px;height:50px;" > 
					<?php
							}
					}
				}
			  ?>
			  </td>
			  <?php
			   
			  ?>
              <td><?php echo "<b>" . $fullname . "</b><br><p>" . $crow->message . "</p>";?></td>
<?php 
/*
			  <td>
			  <?php 
				$title = $this->db->get_where('tbl_conversation', array('thread_id'=>$thread))->result();
			  foreach($title as $tT)
			  {
				  echo $tT->topic;
			  }?>
			  
			  
			  </td>
*/
?>
              
			  <?php  if ($crow->is_read == 0){$status = "New";}else{$status = "Read";} ?>
              <td><?php echo $status;?></td>
              <td><?php echo date("d-m-Y h:m:s", strtotime($crow->time)); ?></td>
			  
              <td>
				<?php
				if($from_id == $this->session->userdata('user_id'))
				{	
					//$data=$this->db->get_where('tbl_customerprofile', array('user_id'=>$to_id))->result();
					//foreach($data as $data_val)
					//{
					?>
					<a href="<?php echo base_url(); ?>Chat/new_chat/<?php echo $crow->to;?>/<?php echo $thread;?>" class="btn btn-success">Reply </a>
				<?php
					//}
				}
				elseif(($from_id == 33) || ($to_id == 33)) // sadmin
				{
					?>
					<a href="<?php echo base_url(); ?>Chat/new_chat/<?php echo $crow->from;?>/<?php echo $thread;?>" class="btn btn-primary">Reply </a>
					<?php
				}
				elseif($to_id == $this->session->userdata('user_id'))
				{
					$data1=$this->db->get_where('tbl_customerprofile', array('user_id'=>$from_id))->result();
					foreach($data1 as $data_val1)
					{
					?>
					<a href="<?php echo base_url(); ?>Chat/new_chat/<?php echo $crow->from;?>/<?php echo $thread;?>" class="btn btn-primary">Reply </a>
					<?php
					}
				}
			  ?>
			  </td>
              </tr>
              <?php }
               $i++;}?>
            </tbody>
         </table>
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
		<script>
			function executeQuery() {
			  $.ajax({
				url: '<?php echo base_url(); ?>Chat/ajaxInbox',
				success: function(data) {
				  // do something with the return value here if you like
				  
					  $('#message').html(data);
				  
				  
				}
			  });
			  setTimeout(executeQuery, 5000); // you could choose not to continue on failure...
			}

			$(document).ready(function() {
			  // run the first time; all subsequent calls will take care of themselves
			  setTimeout(executeQuery, 5000);
			});		
		</script>

