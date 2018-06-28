<div class="content-wrapper">
<!-- Content area -->
<div class="content">
<div class="breadcrumb-line breadcrumb-line-component">
   <a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a>
   <ul class="breadcrumb">
      <li><a href=""><i class="icon-home2 position-left"></i> Home</a></li>
      <li><a href="">Dashboard</a></li>
      <li class="active">Country</li>
   </ul>
</div>
<br>
<!-- Main charts -->
<div class="row">
   <div class="col-lg-12">
      <!-- Traffic sources -->
      <div class="panel panel-flat">
		
		<div class="panel-body">
			<div class="tabbable">
				<ul class="nav nav-tabs nav-tabs-highlight">
					<li class="active"><a href="<?php echo base_url(); ?>country/countryList" >Enable Country List</a></li>
					<li ><a href="<?php echo base_url(); ?>country/dcountryList" >Disable Country List</a></li>
				</ul>

				<div class="tab-content">
					<div class="active">
      <!-- Traffic sources -->
			<div class="row">
				<div class="col-md-12">
					<div style="text-align:right;">
					  <a class="btn bg-purple" href="<?php echo  base_url();?>country/newCountry"><i class="glyphicon glyphicon-plus"></i> Add </a>
						<a href="<?php echo  base_url();?>country/countryList" class="btn bg-pink"><i class="glyphicon glyphicon-refresh"></i> List</a>
				   </div>
				</div>
			</div>
			
           <hr/>
         <table class="table datatable-button-print-columns">
            <thead>
               <tr>

                 <th>Sno</th>
                 <th>Country Name</th>
                 <th>Country Description</th>
                
                 <th style="width:180px;">Action </th>

               </tr>
            </thead>
            <tbody>
            <?php
            $i=1;
              foreach($countryList as $row) {
            ?>
              <tr>
              <td><?php echo $i; ?></td>
              <td><?php echo $row->country_name;?></td>
              <td><?php echo $row->country_desc;?></td>
             
              <td style="text-align:right">
              <a href="<?php echo base_url(); ?>country/editCountry/<?php echo $row->country_id;?>" title="Edit" class="btn bg-success"><i class="glyphicon glyphicon-pencil "></i>
              </a>&nbsp;<a href="<?php echo base_url(); ?>country/disableCountry/<?php echo $row->country_id;?>"  title="Disable" class="btn bg-danger remove" onclick="return confirm('Are You Sure want to Disable');"><!--i class="glyphicon glyphicon-remove "></i-->Disable</a>
              </td>
              </tr>
              <?php $i++;}?>


            </tbody>
         </table>
      <!-- /traffic sources -->
					</div>
				</div>
			</div>
		</div>
		
      </div>
      <!-- /traffic sources -->
   </div>
</div>
<!-- /dashboard content -->
