	<br>

		<section class="featured-ads light-grey" style="margin:5% 0 0 0;">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 nopadding">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="Heading-title black">
                            <h1>Special Offer</h1>
                        </div>
                    </div>
					<div class="featured-slider1">
					<?php 
					foreach($offerpagination as $offer)
					{
					?>
						<style type="text/css">

						.ribbon {
							position: absolute;
							z-index: 1;
							overflow: hidden;
							width: 75px;
							height: 75px;
							text-align: center;
						  
							bottom:0%;
							right:0%
						}

						.ribbon span{
							font-size: 10px;
							font-weight: 700;
							color: #FFF;
							text-transform: uppercase;
							line-height: 20px;
							transform: rotate(-45deg);
							-webkit-transform: rotate(-45deg);
							width: 100px;
							display: block;
							background: #f94141;
							background: linear-gradient(#f94141 0,#f94141 100%);
							text-shadow: 1px 1px 2px rgba(0,0,0,.25);
							position: absolute;
							top: 35px;
							/* left: -6px; */
						}
						.item {
							/*padding-left: 10px;
							padding-right: 10px;*/
							}
							.grid-item-inner {
							position: relative;
							overflow: hidden;
							color: #fff;
						}
						.grid-margin{margin-left: -10px;margin-right: -10px;}
						.grid-item{margin-bottom: 20px;padding-right: 10px;padding-left: 10px;}
						.grid-item-inner{position: relative;overflow: hidden;color: #fff;}
						.grid-content{background-color: rgba(0,0,0,0.3);position:absolute;top:0;left:0;width:100%;height:100%;pointer-events: none;}
						.grid-text{position:absolute;bottom:0;left:0;padding: 15px;width:100%;}
						.place-name {display: inline-block;padding: 5px 7px;font-size: 12px;line-height: 10px;background-color: #f94141;}
						.travel-times h4{font-size:16px;color: #fff;}
						.travel-times span {position: relative;top: 10px;}
						.grid-price{float:right;padding-top: 22px;font-weight: 700;padding: 15px;display:inline-block;transform:scale(0);-webkit-transform:scale(0);-moz-transform:scale(0);-o-transform:scale(0);transition:all 0.3s ease-in-out;-webkit-transition:all 0.3s ease-in-out;-moz-transition:all 0.3s ease-in-out;-o-transition:all 0.3s ease-in-out;}
						.grid-price  span{font-size:28px;color: #fec107;}
						.grid-price  span sub{font-size:14px;position: relative;top: 0px;}
						.grid-item-inner:hover .grid-price{transform:scale(1);-webkit-transform:scale(1);-moz-transform:scale(1);-o-transform:scale(1);}
						</style>
						<div class="col-md-3 ">
						  <div class="item" style="margin: 5% 0;">
							<div class="grid-item-inner">
								<div class="grid-img-thumb">
									<!-- ribbon -->
									<div class="ribbon"><span>Offer</span></div>
									<a href="<?php echo base_url();?>Front/divecenter/8/24-05-2017/26-05-2017/1"><img src="<?php echo base_url();?>upload/specialoffer/<?php echo $offer->offer_image; ?>" alt="1" class="img-responsive" width="100%" height="100%" /></a>
								</div>
								<div class="grid-content">
									<div class="grid-price text-right">
										From Rp.<?php echo $offer->start_km; ?> (<?php echo $offer->offer_period; ?>)
									</div>
									<div class="grid-text">
										<div class="place-name"><?php echo $offer->city; ?>, 
										<?php 
										$cvall = $offer->country_id;
										$data1=$this->db->get_where('tbl_country', array('country_id'=>$cvall))->result();
										foreach($data1 as $cval){ echo $cval->country_name; }
										?></div>
										<div class="travel-times">
											<h4 class="pull-left"><?php echo $offer->center_name; ?></h4>
											
										</div>
									</div>
								</div>
							</div>
						</div>
						</div>
						
					<?php 
					}
					?>
				   </div>
					<div class="col-md-12 text-center">
					<?php echo $links; ?>
					</div>
                </div>
            </div>
        </div>
    </section>
	<div class="separator"></div>
	<br><br>