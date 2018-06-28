<div class="content-wrapper">
<!-- Content area -->
<div class="content">
<div class="breadcrumb-line breadcrumb-line-component">
   <a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a>
   <ul class="breadcrumb">
      <li><a href=""><i class="icon-home2 position-left"></i> Home</a></li>
      <li><a href="">Dashboard</a></li>
      <li class="active">Review List</li>
   </ul>
</div>
<br>

<div class="row">
   <div class="col-md-12">
	<div class="panel panel-flat">
		<div class="panel-heading">
			<h2 class="panel-title">Review List</h2>
			<div class="heading-elements">
				<ul class="icons-list">
					<li><a data-action="collapse"></a></li>
					<li><a data-action="reload"></a></li>
					<!-- <li><a data-action="close"></a></li> -->
				</ul>
			</div>
		</div>

		<div class="panel-body">
			<div class="tabbable">
				<ul class="nav nav-tabs nav-tabs-highlight">
					<li class="active"><a href="" >Review</a></li>
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
					<style>

		.demo-table {
			width: 100%;
			border-spacing: initial;
			margin: 20px 0px;
			word-break: break-word;
			table-layout: auto;
			line-height:1.8em;
			color:#333;
			}
		.demo-table th {
			background: #999;
			padding: 5px;
			text-align: left;
			color:#FFF;
			}
		.demo-table td 
		{
			border-bottom: #f0f0f0 1px solid;
			background-color: #ffffff;
			padding: 5px;
			}
		.demo-table td div.feed_title
		{
			text-decoration: none;
			color:#00d4ff;
			font-weight:bold;
			}
		.demo-table ul
		{
			margin:0;
			padding:0;
			}
		.demo-table li
		{
			cursor:pointer;
			list-style-type: none;
			display: inline-block;
			color: #F0F0F0;
			text-shadow: 0 0 1px #666666;
			font-size:20px;
			}
		.demo-table .highlight, .demo-table .selected 
		{
			color:#F4B30A;
			text-shadow: 0 0 1px #F48F0A;
			}
		</style>
		<?php
								$result1234 = $this->db->get_where('tbl_review', array('divecenter_id' => '67'));
								$result123 = $result1234->result();
								$no_of_rows = $result1234->num_rows(); 
				
					$i=1;
					$p=0;
					$s=0;
					$f=0;
					$e=0;
					
						foreach ($result123 as $tutorial) 
						{
							$p = $p + $tutorial->price_rating;
							$s = $s + $tutorial->services_rating;
							$f = $f + $tutorial->facilities_rating;
							$e = $e + $tutorial->equipment_rating;
							
						$i++;
						}
						$p = $p / $no_of_rows;
						$s = $s / $no_of_rows;
						$f = $f / $no_of_rows;
						$e = $e / $no_of_rows;
						
						$total = ($p + $s + $f + $e )/4;
						
						?>
			<div class="row">
				<div class="col-md-3" style=" font-size:20px;text-align:center;font-weight:bold;">
					<i class="fa fa-users" style="font-size:100px;"></i><br>
					<?php echo $no_of_rows;  ?> People Has<br> Viewed
				</div>
				<div class="col-md-6">
				<table class="demo-table">
								<tbody>
					
						<tr>
							<td valign="top">
								<div id="tutorial-1">
								<div class="price">
									<input type="hidden" name="rating" id="rating" value="<?php echo $p; ?>" />
									<ul onMouseOut="resetRating(1);">
									 <label class="control-label col-sm-3" for="email">Price</label>
										<?php
										for($i=1;$i<=5;$i++)
										{
											$selected = "";
											if(!empty($p) && $i<=$p) 
											{
												$selected = "selected";
											}
											?>
											<li class='<?php echo $selected; ?>' onmouseover="highlightStar(this,1);" onmouseout="removeHighlight(1);" onClick="addRating(this,1);">&#9733;</li>  
										<?php }  ?>
									</ul>
									</div>
									
								
							</td>
						</tr>
						<tr>
							<td valign="top">
								<div id="tutorial-2">
								<div class="price">
									<input type="hidden" name="rating" id="rating" value="<?php echo $s; ?>" />
									<ul onMouseOut="resetRating(2);">
									 <label class="control-label col-sm-3" for="email">Services</label>
										<?php
										for($i=1;$i<=5;$i++)
										{
											$selected = "";
											if(!empty($s) && $i<=$s) 
											{
												$selected = "selected";
											}
											?>
											<li class='<?php echo $selected; ?>' onmouseover="highlightStar(this,2);" onmouseout="removeHighlight(2);" onClick="addRating(this,2);">&#9733;</li>  
										<?php }  ?>
									</ul>
									</div>
									
								
							</td>
						</tr>
						<tr>
							<td valign="top">
								<div id="tutorial-3">
								<div class="price">
									<input type="hidden" name="rating" id="rating" value="<?php echo $f; ?>" />
									<ul onMouseOut="resetRating(3);">
									 <label class="control-label col-sm-3" for="email">Facilities</label>
										<?php
										for($i=1;$i<=5;$i++)
										{
											$selected = "";
											if(!empty($f) && $i<=$f) 
											{
												$selected = "selected";
											}
											?>
											<li class='<?php echo $selected; ?>' onmouseover="highlightStar(this,3);" onmouseout="removeHighlight(3);" onClick="addRating(this,3);">&#9733;</li>  
										<?php }  ?>
									</ul>
									</div>
									
								
							</td>
						</tr>
						<tr>
							<td valign="top">
								<div id="tutorial-4">
								<div class="price">
									<input type="hidden" name="rating" id="rating" value="<?php echo $e; ?>" />
									<ul onMouseOut="resetRating(4);">
									 <label class="control-label col-sm-3" for="email">Equipment</label>
										<?php
										for($i=1;$i<=5;$i++)
										{
											$selected = "";
											if(!empty($e) && $i<=$e) 
											{
												$selected = "selected";
											}
											?>
											<li class='<?php echo $selected; ?>' onmouseover="highlightStar(this,4);" onmouseout="removeHighlight(4);" onClick="addRating(this,4);">&#9733;</li>  
										<?php }  ?>
									</ul>
									</div>
									
										
									</td>
								</tr>
							
						</tbody>
						</table>
				</div>
				<div class="col-md-3">
					<span style="font-size:15px;font-weight:bold; text-align:center;" class="col-md-6">AVERAGE<BR> RATING<br><?php echo $total; ?></span>
					<span class='selected col-md-6' style="font-size:100px;color:#f4b30a;margin: -37px;">&#9733;</span>
				</div>
			</div>
		
          
        <table class="table datatable-button-print-columns">
            <thead>
               <tr>

                <th>ID</th>
				<th>Photo</th>
                <th style="width:300px;">Description</th>
                <th>Start Rating</th>
                <!--th style="width:150px;">Action </th-->

               </tr>
            </thead>
            <tbody>
            <?php
            $i=1;
              foreach($DCreviewlist as $row) {
            ?>
              <tr>
              <td><?php echo $i; ?></td>
              <td>
			  <?php 
					$cus_id = $row->customer_id;	
					$data=$this->db->get_where('tbl_customerprofile', array('user_id'=>$cus_id))->result();
					foreach($data as $data_val)
					{
						if($data_val->photo != NULL)
										{
							?>
							<img src="<?php echo base_url(); ?>upload/customerprofile/<?php echo $data_val->photo; ?>" class="img-circle" width="60px" height="60px" style="border:1px solid gray">
							<?php 
							}
							else
							{
								?>
								<img src="<?php echo base_url(); ?>upload/customerprofile/user.png" class="img-circle" width="60px" height="60px" style="border:1px solid gray">
								
								<?php
							}
					?>
					
					<?php
					}
				?>
			</td>
              <td><?php echo $row->description; ?></td>
			  <td>
			  <?php
						$p = $row->price_rating;
						$s = $row->services_rating;
						$f = $row->facilities_rating;
						$e = $row->equipment_rating;
						
						$tota_rating = ($p + $s + $f + $e)/4;
						?>
						<span style="font-size:15px;font-weight:bold; text-align:center;" class="col-md-6">AVERAGE<BR> RATING<br><?php echo $tota_rating; ?></span>
						<span class='selected col-md-6' style="font-size:100px;color:#f4b30a;margin: -37px;">&#9733;</span>
						
			  </td>
              <!--td style="text-align:right">
              <a href="" title="Edit" class="btn bg-success"><i class="glyphicon glyphicon-pencil "></i>
              </a>&nbsp;&nbsp;<a href=""  title="Delete" class="btn bg-danger remove" onclick="return confirm('Are You Sure to delete');"><i class="glyphicon glyphicon-remove "></i></a>
              </td-->
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
</div>
</div>
<!-- /dashboard content -->


<!-- /dashboard content -->
