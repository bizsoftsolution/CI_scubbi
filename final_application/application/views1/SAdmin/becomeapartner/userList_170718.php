<div class="content-wrapper">
<!-- Content area -->
<div class="content">
<div class="breadcrumb-line breadcrumb-line-component">
   <a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a>
   <ul class="breadcrumb">
      <li><a href=""><i class="icon-home2 position-left"></i> Home</a></li>
      <li><a href="">Dashboard</a></li>
      <li class="active">User List</li>
   </ul>
</div>
<br>
<!-- Main charts -->
<div class="row">
   <div class="col-lg-12">
      <!-- Traffic sources -->
      <div class="panel panel-flat">
        <div class="panel-heading">
           <h2 class="panel-title">User List</h2>

					<ul class="nav nav-tabs nav-tabs-bottom bottom-divided">
						<li <?php echo ($utype=='Customer' ? 'class="active"' : '') ?>><a href="<?php echo base_url(); ?>SAbecomeapartner/userDetails/Customer">Customers</a></li>
						<li <?php echo ($utype=='DCAdmin' ? 'class="active"' : '') ?>><a href="<?php echo base_url(); ?>SAbecomeapartner/userDetails/DCAdmin">Dive Centers</a></li>
						<li <?php echo ($utype=='Admin' ? 'class="active"' : '') ?>><a href="<?php echo base_url(); ?>SAbecomeapartner/userDetails/Admin">Admins</a></li>
					</ul>
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
                 <th>User Type</th>
                 <th>User Name</th>
                 <th>Last login</th>

               </tr>
            </thead>
            <tbody>
            <?php
            $i=1;
            switch ($utype){
			case 'Admin':
            $this->db->where_in('user_type',array('SUPERADMIN','ADMIN','MARKETINGPERSON','BUGVIEWER'));
			break;
			case 'DCAdmin':
            $this->db->where('user_type','DCADMIN');
			break;
			default:
            $this->db->where('user_type','Customer');
			break;
            }
			$data = $this->db->get('user')->result();
			
              foreach($data as $row) {
            ?>
              <tr>
              <td><?php echo $i; ?></td>
              <td><?php echo $row->user_type; ?></td>
              <td><?php echo $row->email; ?></td>
              <td><?php echo $row->last_login; ?></td>
            
              </tr>
              <?php $i++;}?>


            </tbody>
         </table>
      </div>
      <!-- /traffic sources -->
   </div>
</div>
<!-- /dashboard content -->
