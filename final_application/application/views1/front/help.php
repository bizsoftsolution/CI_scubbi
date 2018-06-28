	<section class="ad-breadcrumb parallex">
            <div class="container page-banner">
            	<div class="row">
                   <div class="col-sm-6 col-md-6">
                      <h1>Help Desk</h1>
                   </div>
                   <div class="col-sm-6 col-md-6">
                      <ol class="breadcrumb pull-right">
                         <li><a href="<?php echo base_url(); ?>">Home</a></li>
                         <li class="active">Help</li>
                      </ol>
                   </div>
                </div>
            </div>
         </section>
		<section class="featured-ads light-grey">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 nopadding">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="Heading-title black">
                            <h1>Help Desk</h1>
                        </div>
                    </div>
                </div>
            </div>
			<div class="row">
				<?php 
					foreach($help as $row)
					{
					?>
					<div class="col-md-12" style="padding:0 5%;text-align:justify;">
						<?php echo $row->description; ?>
					</div>
					<?php 
					}
					?>
			</div>
        </div>
    </section>