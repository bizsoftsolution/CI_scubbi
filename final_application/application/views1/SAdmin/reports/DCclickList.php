<div class="content-wrapper">
<!-- Content area -->
<div class="content">
<div class="breadcrumb-line breadcrumb-line-component">
   <a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a>
   <ul class="breadcrumb">
      <li><a href=""><i class="icon-home2 position-left"></i> Home</a></li>
      <li><a href="">Dashboard</a></li>
      <li class="active">Dive Center Click List</li>
   </ul>
</div>
<br>
<!-- Main charts -->
<div class="row">
   <div class="col-lg-12">
      <!-- Traffic sources -->
      <div class="panel panel-flat">
        <div class="panel-heading">
           <h2 class="panel-title">DC List</h2>
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
                 <th>Year</th>
                 <th>Jan</th>
                 <th>Feb</th>
                 <th>Mar</th>
                 <th>Apr</th>
                 <th>May</th>
                 <th>Jun</th>
                 <th>July</th>
                 <th>Aug</th>
                 <th>Sep</th>
                 <th>Oct</th>
                 <th>Nov</th>
                 <th>Dec</th>
				 <th>Created Date</th>
                 <th>Updated Date</th>

               </tr>
            </thead>
            <tbody>
            <?php
			$i=1;
			$data = $this->db->get('tbl_dive_click')->result();
			
              foreach($data as $row) 
			  {
							?>
				<tr>
					<td><?php echo $i; ?></td>
					<td>
						<?php 
						$divename = $this->db->get_where('tbl_dcprofile',array('id'=>$row->dive_id))->result();
							foreach($divename as $divename_row)
							{
								echo $divename_row->dcname;
							}						
						?>
					</td>
					<td><?php echo $row->year; ?></td>
					<td><?php echo $row->month1; ?></td>
					<td><?php echo $row->month2; ?></td>
					<td><?php echo $row->month3; ?></td>
					<td><?php echo $row->month4; ?></td>
					<td><?php echo $row->month5; ?></td>
					<td><?php echo $row->month6; ?></td>
					<td><?php echo $row->month7; ?></td>
					<td><?php echo $row->month8; ?></td>
					<td><?php echo $row->month9; ?></td>
					<td><?php echo $row->month10; ?></td>
					<td><?php echo $row->month11; ?></td>
					<td><?php echo $row->month12; ?></td>
					<td><?php echo $row->created_date; ?></td>
					<td><?php echo $row->updated_date; ?></td>
				</tr>
				<?php        
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
