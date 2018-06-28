
		<section class="featured-ads light-grey" style="padding:10% 0 0 0;">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 nopadding">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="Heading-title black">
                            <h1>Popular Diving Destinations</h1>
                        </div>
                    </div>
					<?php 
					foreach($populardivedestination as $res)
					{
						$pdd = $res->popular_dive_destination;
						if($pdd == 'Yes')
						{
					?>
					<div class="col-md-3">
						<div class="featured-image-box" style="margin-top:5%;">
							<div class="img-box"><img src="<?php echo base_url(); ?>upload/plan/<?php echo $res->image; ?>" class="img-responsive center-block" alt="">
							<span style="position: absolute;top: 10px;left: 25px;color: #fff;font-weight: bold;text-transform: uppercase;font-size: 23px;"><?php 
							$cpdd = $res->country_id;
							$data_pdd=$this->db->get_where('tbl_country', array('country_id'=>$cpdd))->result();
							foreach($data_pdd as $cval_pdd){ echo $cval_pdd->country_name; }
							?></span>
							</div>                    
						</div>
					</div>
                  
					<?php 
						}
					}
					?>
					<div class="col-md-12 text-center">
					<?php echo $links; ?>
					</div>
                </div>
            </div>
        </div>
    </section>
	<div class="separator"></div>
	<br>