<div class="content-wrapper">
<!-- Content area -->
<div class="content">
<div class="breadcrumb-line breadcrumb-line-component">
   <a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a>
   <ul class="breadcrumb">
      <li><a href=""><i class="icon-home2 position-left"></i> Home</a></li>
      <li><a href="">Dashboard</a></li>
      <li class="active">Dive Center List</li>
   </ul>
</div>
<br>
<!-- Main charts -->
<div class="row">
   <div class="col-lg-12">
      <!-- Traffic sources -->
      <div class="panel panel-flat">
        <div class="panel-heading">
           <h2 class="panel-title">Dive Center List</h2>
           <div style="text-align:right;">
              <!--a class="btn bg-purple" href="<?php echo  base_url();?>SAbecomeapartner/addNew"><i class="glyphicon glyphicon-plus"></i> Add </a-->
              <!--a href="<?php echo  base_url();?>SAslider" class="btn bg-pink"><i class="glyphicon glyphicon-refresh"></i> List</a-->
           </div>
           <hr/>
        </div>
         <table class="table datatable-button-print-columns">
            <thead>
               <tr>

                 <th>Sno</th>
                 <th>Dive Center Name</th>
                 <th>Contact Address</th>
                 <th>Country</th>
                 <th>Island</th>
                 <th>Messages</th>

               </tr>
            </thead>
            <tbody>
            <?php
            $i=1;
			$data = $this->db->get('tbl_dcprofile')->result();
			
              foreach($data as $row) {
            ?>
              <tr>
              <td><?php echo $i; ?></td>
              <td><?php echo $row->dcname; ?></td>
              <td>
				<b>Address   :</b><?php echo $row->dcbilling_address; ?><br>
				<b>Contact No:</b><?php echo $row->dctelephone_no;?><br>
				<b>Email ID:</b><?php echo $row->dcemailid;?><br>
			  </td>
			  <?php
				$data1 = $this->db->get_where('tbl_country', array('country_id =' => $row->dccountry))->result();
			
				foreach($data1 as $row1){
					?>
              <td><?php echo $row1->country_name; ?></td>
			  
			  <?php
				}
				$data2 = $this->db->get_where('tbl_island', array('island_id =' => $row->dcislands))->result();
			
				foreach($data2 as $row2){
				
			  ?>
              <td><?php echo $row2->island_name; ?></td>
			  <?php
				}
				
				?>
				<td><a class="btn btn-success" href="<?php echo base_url().'SAbecomeapartner/diveCenterCustomerList/'.$row->user_id; ?>"> See Message</a></td>
              </tr>
              <?php $i++;}?>


            </tbody>
         </table>
      </div>
      <!-- /traffic sources -->
   </div>
</div>
<!-- /dashboard content -->
