<div class="content-wrapper">
<!-- Content area -->
<div class="content">
<div class="breadcrumb-line breadcrumb-line-component">
   <a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a>
   <ul class="breadcrumb">
      <li><a href=""><i class="icon-home2 position-left"></i> Home</a></li>
      <li><a href="">Bugs</a></li>
      <li class="active">Bugs</li>
   </ul>
</div>
<br>
<!-- Main charts -->
<div class="row">
   <div class="col-md-12">
   
		<div class="panel panel-flat">
        <div class="panel-heading">
           <h2 class="panel-title">Bugs List</h2>
           <div style="text-align:right;">
              <a class="btn bg-purple" href="<?php echo  base_url();?>Bugs/addBug"><i class="glyphicon glyphicon-plus"></i> Add </a>
              <!--a href="<?php echo  base_url();?>Bugs/BugList" class="btn bg-pink"><i class="glyphicon glyphicon-refresh"></i> List</a-->
           </div>
           <hr/>
        </div>
         <table class="table datatable-button-print-columns">
            <thead>
               <tr>
				<th>RefNo</th>
                 <th>Bug</th>
                 <th>Priority</th>
                 <th>Status</th>
                 <th style="width:250px;">Action </th>

               </tr>
            </thead>
            <tbody>
            <?php
            //$i=1;
              foreach($BugList as $row) {
            ?>
              <tr>
              <td><?php echo $row->refno;?></td>
              <td><?php echo $row->bug_description;?></td>
              <td><?php echo $row->bug_priority;?></td>
              <td><?php echo $row->bug_status;?></td>
             
              <td style="text-align:right;">
			  <a href="<?php echo base_url(); ?>Bugs/view/<?php echo $row->bug_no;?>" title="View" class="btn bg-primary"><i class="glyphicon glyphicon-eye-open"></i>
              </a>&nbsp;&nbsp;
              <a href="<?php echo base_url(); ?>Bugs/edit/<?php echo $row->bug_no;?>" title="Edit" class="btn bg-success"><i class="glyphicon glyphicon-pencil "></i>
              </a>&nbsp;&nbsp;<a href="<?php echo base_url(); ?>Bugs/delete/<?php echo $row->bug_no;?>"  title="Delete" class="btn bg-danger remove" onclick="return confirm('Are You Sure to delete');"><i class="glyphicon glyphicon-remove "></i></a>
              </td>
              </tr>
              <?php 
			  //$i++;
			  }?>


            </tbody>
         </table>
      </div>
	
	
   </div>
</div>
<!-- /dashboard content -->