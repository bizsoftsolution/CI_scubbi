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
              <!--a class="btn bg-purple" href="<?php echo  base_url();?>Bugs/addBug"><i class="glyphicon glyphicon-plus"></i> Add </a-->
              <!--a href="<?php echo  base_url();?>Bugs/BugList" class="btn bg-pink"><i class="glyphicon glyphicon-refresh"></i> List</a-->
           </div>
           <hr/>
        </div>
         <table class="table datatable-button-print-columns">
            <thead>
               <tr>
				<th>Ref No</th>
                 <th>Description</th>
                 <th>Module</th>
                 

               </tr>
            </thead>
            <tbody>
            <?php
            //$i=1;
              foreach($completedList as $row) {
            ?>
              <tr>
              <td><?php echo $row->refno;?></td>
              <td><?php echo $row->bug_description;?></td>
              <td><?php echo $row->bug_module;?></td>
             
             
              </tr>
              <?php
//			  $i++;
			  }?>


            </tbody>
         </table>
      </div>
	
	
   </div>
</div>
<!-- /dashboard content -->