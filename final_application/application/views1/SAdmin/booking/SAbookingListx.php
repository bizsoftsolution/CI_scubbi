<div class="content-wrapper">
<!-- Content area -->
<div class="content">
<div class="breadcrumb-line breadcrumb-line-component">
   <a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a>
   <ul class="breadcrumb">
      <li><a href=""><i class="icon-home2 position-left"></i> Home</a></li>
      <li><a href="">Dashboard</a></li>
      <li class="active">Scubbi Booking List</li>
   </ul>
</div>
<br>
<!-- Main charts -->
<div class="row">
   <div class="col-lg-12">
      <!-- Traffic sources -->
      <div class="panel panel-flat">
        <div class="panel-heading">
           <h2 class="panel-title">Booking List</h2>
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
                 <th>Date</th>
                 <th>Dive Center</th>
                 <th>Booking No</th>
                 <th>Customer</th>
                 <th>Timestamp</th>
                 <th>Amount</th>
                 <th>Status</th>

               </tr>
            </thead>
            <tbody>
            <?php
            $i=1;
//			$data = $this->db->get('tbl_booking')->result();
			
              foreach($bookingList as $row) {
            ?>
              <tr>
              <td><?php echo $i; ?></td>
              <td><b>Checkin:</b> <?php echo $row->checkin; ?><br>
				<b>Checkout:</b> <?php echo $row->checkout; ?>
              </td>
			  <?php
				$data5 = $this->db->get_where('tbl_dcprofile', array('user_id =' => $row->dive_id))->result();
			
				foreach($data5 as $row5){
					?>
              <td>[<?php echo $row5->user_id; ?>]: <?php echo $row5->dcname ; ?><br><b>email:</b> <?php echo $row5->dcemailid; ?>
<?php        }
?>      
              </td>
              <td><b><?php echo $row->booking_no; ?> for <?php echo $row->no_of_persons; ?> Pax</b><br><?php echo $row->country_name; ?> / <?php echo $row->island_name; ?>
			  </td>
			  <?php
				$data1 = $this->db->get_where('user', array('user_id =' => $row->customer_id))->result();
			
				foreach($data1 as $row1){
					?>
              <td>[<?php echo $row1->user_id; ?>]: <?php echo $row1->first_name . " " . $row1->last_name ; ?><br><b>email:</b> <?php echo $row1->email; ?>
<?php        }
?>      
              </td>
			  
              <td><?php echo $row->created; ?></td>
              <td><?php echo $row->grand_total; ?></td>
				<td><a class="btn btn-success" href="<?php echo base_url().'SABooking/editStatus/'.$row->id . '/' . $row->dive_id; ?> "><?php echo $row->status; ?></a></td>
              </tr>
<?php      $i++;  }
?>      

            </tbody>
         </table>
      </div>
      <!-- /traffic sources -->
   </div>
</div>
<!-- /dashboard content -->
