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
                 <th>Sender</th>
                 <th>Reciver</th>
                 <th>Messages</th>
                 
               </tr>
            </thead>
            <tbody>
            <?php
            $i=1;
			$this->db->select('*');
			$this->db->from('messages as t1');
			
			$this->db->where('t1.to', $dive_id);
			 $this->db->or_where('t1.from', $dive_id);
			$query = $this->db->get();
			$data = $query->result();
			
			//var_dump($data);
              foreach($data as $row) {
            ?>
              <tr>
				<td><?php echo $i; ?></td>
				<td><?php echo $row->from_name; ?></td>
				<td><?php echo $row->to_name; ?></td>
				<td><?php echo $row->message; ?></td>
			  
              </tr>
              <?php $i++;}?>


            </tbody>
         </table>
      </div>
      <!-- /traffic sources -->
   </div>
</div>
<!-- /dashboard content -->
