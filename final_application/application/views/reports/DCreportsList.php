<div class="content-wrapper">
<!-- Content area -->
<div class="content">
<div class="breadcrumb-line breadcrumb-line-component">
   <a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a>
   <ul class="breadcrumb">
      <li><a href=""><i class="icon-home2 position-left"></i> Home</a></li>
      <li><a href="">Dashboard</a></li>
      <li class="active">DC Sales List</li>
   </ul>
</div>
<br>
<!-- Main charts -->
<div class="row">
   <div class="col-lg-12">
      <!-- Traffic sources -->
      <div class="panel panel-flat">
        <div class="panel-heading">
           <h2 class="panel-title">Sales List</h2>
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
                 <th>Dive Center</th>
                 <th>Transaction ID</th>
				 <th>Date</th>
                 <th>Amount</th>

               </tr>
            </thead>
            <tbody>
            <?php
			$i=1;
//			$data = $this->db->get('tbl_booking')->result();
			
              foreach($salesReportsList as $row) {
				 $data7 = $this->db->get_where('tbl_dcprofile', array('user_id'=>$row->dive_id))->result();
				 foreach($data7 as $val)
				 {
            ?>
              <tr>
              <td><?php echo $i; ?></td>
              
              <td><?php echo $val->dcname; ?>
              </td>
			 <td><?php echo $row->pg_transid; ?></td>
              <td>
			<?php 
				$date_create = date('d M Y', strtotime($row->created));
				echo $date_create; 
			?>
			  </td>
			 
			  
              <td><?php echo $row->grand_total; ?></td>
              
              </tr>
<?php   
				 }     
$i++;
}
?>      

            </tbody>
         </table>
      </div>
      <!-- /traffic sources -->
   </div>
</div>
<!-- /dashboard content -->
