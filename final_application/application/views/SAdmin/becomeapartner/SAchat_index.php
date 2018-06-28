<div class="content-wrapper">
<!-- Content area -->
<div class="content">
<div class="breadcrumb-line breadcrumb-line-component">
   <a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a>
   <ul class="breadcrumb">
      <li><a href=""><i class="icon-home2 position-left"></i> Home</a></li>
      <li><a href="">Dashboard</a></li>
<?php
//print_r($inboxMsg);
//    foreach($dcid as $hrow) {
		$dcid = $this->session->userdata("dive_id");
//		echo("DC $dcid");
		$data1=$this->db->get_where('tbl_dcprofile', array('user_id'=>$dcid))->result();
		$row2 = $data1[0];
//		$dcid = $row2->user_id;
//	}
?>
      <li><a href="">DC <?php echo $row2->dcname ?> </a></li>
      <li class="active">Message </li>
   </ul>
</div>
<br>

<div class="row">
   <div class="col-md-12">

	<div class="panel panel-flat">
		<div class="panel-heading">
			<h2 class="panel-title">Messages - <?php echo $row2->dcname ?></h2>
			<div class="heading-elements">
				<ul class="icons-list">
                    <li><a href="<?php echo  base_url();?>SAbecomeapartner/diveCenterDetails" class="btn bg-pink"><i class="glyphicon glyphicon-refresh"></i> List</a>
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
			
          
        <table class="table datatable-button-print-columns">
            <thead>
               <tr>

                <th>ID</th>
                <th>Customer</th>
                <th>Message</th>
                
                <th>Time</th>
                <th>Action</th>

               </tr>
            </thead>
            <tbody>
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
					$custphoto = $fn->photo;
				}
/*
				if($from_id == $row->dc_id)
				{	
					//echo "from dc >> ";
					$data=$this->db->get_where('tbl_dcprofile', array('user_id'=>$from_id))->result();
					foreach($data as $data_val)
					//$data=$this->db->get_where('tbl_customerprofile', array('user_id'=>$to_id))->result();
					//foreach($data as $data_val)
					{
						if($data_val->dcimage != NULL)
						{?>
							
							<img src="<?php echo base_url(); ?>upload/DCprofile/<?php echo $data_val->dcimage; ?>" class="img-circle" width="60px" height="60px" style="border:1px solid gray">
					<?php	}
						else{
					?>
							<img src="<?php echo base_url();?>upload/customerprofile/user.png" style="width:50px;height:50px;" > 
					<?php
						}
					}
				}
				elseif(($from_id == 33) ) // sadmin
				{
					echo "Admin";
					?>
							<img src="<?php echo base_url();?>upload/customerprofile/user.png" style="width:50px;height:50px;" > 
					<?php
				}
				else //if($to_id == $row->dc_id)
				{
					//echo "to dc>> ";
					$data1=$this->db->get_where('tbl_customerprofile', array('user_id'=>$from_id))->result();
					foreach($data1 as $data_val1)
					{
*/
						if($custphoto != NULL)
						{?>
							
							<img src="<?php echo base_url(); ?>upload/customerprofile/<?php echo $custphoto; ?>" class="img-circle" width="60px" height="60px" style="border:1px solid gray">
					<?php	}
						else{
					?>
							<img src="<?php echo base_url();?>upload/customerprofile/user.png" class="img-circle" width="60px" height="60px" style="border:1px solid gray"> 
					<?php
							}
//					}
//				}
			  ?>
			  </td>
              <td><?php echo "<b>" . $fullname . "</b><br><p>" . $crow->message . "</p>";?></td>
			  <?php  if ($crow->is_read == 0){$status = "New";}else{$status = "Read";} ?>
              <!--td><?php echo $status;?></td-->
              <td><span  class="testDt" value=<?php echo strtotime($crow->time) * 1000; ?>></span></td>
			  
              <td>
				
				<?php
					//echo $from_id;
					//echo $dcid;
					//echo $to_id;
				if($from_id == $dcid)
				{	
					//$data=$this->db->get_where('tbl_customerprofile', array('user_id'=>$to_id))->result();
					//foreach($data as $data_val)
					//{
					?>
					<a href="<?php echo base_url(); ?>SAbecomeapartner/SAnew_chat/<?php echo $crow->to;?>/<?php echo $thread;?>" class="btn btn-primary">View </a>
				<?php
					//}
				}
				elseif($from_id == 33) // sadmin
				{
					?>
					<a href="<?php echo base_url(); ?>SAbecomeapartner/SAnew_chat/<?php echo $crow->from;?>/<?php echo $thread;?>" class="btn btn-primary">View </a>
					<?php
				}
				else //if($to_id == $dcid)
				{
					$data1=$this->db->get_where('tbl_customerprofile', array('user_id'=>$from_id))->result();
					foreach($data1 as $data_val1)
					{
					?>
					<a href="<?php echo base_url(); ?>SAbecomeapartner/SAnew_chat/<?php echo $crow->from;?>/<?php echo $thread;?>" class="btn btn-primary">View </a>
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