<div class="content-wrapper">
<!-- Content area -->
<div class="content">
<div class="breadcrumb-line breadcrumb-line-component">
   <a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a>
   <ul class="breadcrumb">
      <li><a href=""><i class="icon-home2 position-left"></i> Home</a></li>
      <li><a href="">Dashboard</a></li>
      <li class="active">DC Visit List</li>
   </ul>
</div>
<br><br>			
					<!-- Timeline -->
		<div class="timeline timeline-left">
			<div class="timeline-container">
			
				<?php 
					foreach($visitList as $row_visitList)
					{
				?>
				<!-- Video post -->
				<div class="timeline-row">
					<div class="timeline-icon">
					<?php 
					$data7 = $this->db->get_where('tbl_dcprofile', array('user_id'=>$row_visitList->lv_dcid))->result();
					foreach($data7 as $data7_row)
					{
					?>
						<img src="<?php echo base_url();?>upload/DCprofile/<?php echo $data7_row->dcimage;?>" alt="" style="height:50px;width:50px;" class="img-responsive img-circle">
					<?php
					}
					?>
					</div>

					<div class="row">
						<div class="col-lg-12">
							<div class="panel panel-flat timeline-content">
								<div class="panel-heading">
									<h6 class="panel-title"><?php echo $row_visitList->lv_uri;?></h6>
									<div class="heading-elements">
										<span class="heading-text"><i class="icon-checkmark-circle position-left text-success"></i> <?php echo $row_visitList->lv_date;?></span>
									</div>
								</div>

								<div class="panel-body">
									<p class="content-group"><?php echo $row_visitList->lv_module;?></p>

								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- /video post -->
				<?php 
					}
				?>


			</div>
		</div>
		<!-- /timeline -->