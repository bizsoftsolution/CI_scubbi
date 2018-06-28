<script src="<?php echo base_url(); ?>assets/autochange/jquery.min.js"></script>
<script type="text/javascript">
    // <![CDATA[
    $(document).ready(function() {
        $('#scountry').change(function() { //any select change on the dropdown with id country trigger this code
            //	alert("dhngfdhg");
            $("#islands > option").remove(); //first of all clear select items
            var country_id = $('#scountry').val(); // here we are taking country id of the selected one.
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>front/get_island/" + country_id, //here we are calling our user controller and get_cities method with the country_id

                success: function(cities) //we're calling the response json array 'cities'
                    {
                        $.each(cities, function(id, city) //here we're doing a foeach loop round each city with id as the key and city as the value
                            {
                                var opt = $('<option />'); // here we're creating a new select option with for each city
                                opt.val(id);
                                opt.text(city);
                                $('#islands').append(opt); //here we will append these new select options to a dropdown with the id 'cities'
                            });
                    }

            });

        });
    });



    // ]]>
</script>

	
<section class="papular-post-slider">
    <div class="container">
        <div class="row">
            <section class="cat-tabs" style="margin-top:35px;">
                <div class="container">
                    <div class="row">
                        <div class="">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="row">
                                    <div class="panel panel-primary">
                                        <div class="panel-heading">
                                            <!-- Tabs -->
											        <div class="container1">
												<ul class="nav nav-tabs">

													<li class="active"><a data-toggle="tab" href="#menu1">Dive Centers</a>
													</li>
													<li><a data-toggle="tab" href="#menu2">Guided Tour</a>
													</li>
													
												</ul>

												<div class="tab-content">
													<div id="menu1" class="tab-pane fade in active">
														<br>
														  <section class="flate-search">
										<form class="form-inline" action="<?php base_url(); ?>Front/search" method="POST" enctype="multipart/form-data">
										<div class="col-md-2 col-sm-2 col-xs-12 nopadding">
										<style>
										.panel-primary > .panel-heading
										{
											color:#000;
										}
										</style>
																	
								
							
							<div class="col-sm-4">
								
							</div>
							
												<div class="form-group">
													<select class="form-control" name="scountry" id="scountry">
														<option label="Select Option">Select Country</option>
														<?php $data=$this->db->get('tbl_country')->result_array(); foreach ($data as $a) {?>
														<option value="<?php echo $a['country_id'];?>">
															<?php echo $a[ 'country_name'];?>
														</option>
														<?php } ?>
													</select>
												</div>
											</div>
											<div class="col-md-2 col-sm-2 col-xs-12 nopadding">
												<div class="form-group">
													<?php //$cities[ '#']='Please Select' ; 
													$attr=array( 'id'=>'islands', 'class'=>'form-control', 'name'=>'islands'); ?>
													<?php echo form_dropdown($attr, 'Select islands'); ?>
												</div>
											</div>
											
											<!--#########jQuery_Date_Range_Picker##########-->
											<style type="text/css">
											#wrapper
											{
												width:800px;
												margin:0 auto;
												color:#333;
												font-family:Tahoma,Verdana,sans-serif;
												line-height:1.5;
												font-size:14px;
											}
											.demo { margin:30px 0;}
											
											</style>
											
											<div id="wrapper">
											<div class="demo">
											<span id="two-inputs">
											<div class="col-md-2 col-sm-2 col-xs-12 nopadding">
												<div class="form-group">											 
													 <input type="text" id="date-range200" class="form-control" style="height: 50px;" placeholder="Checkin" name="checkin">						 
												</div>
											</div>
											<div class="col-md-2 col-sm-2 col-xs-12 nopadding">
											   <div class="form-group">
													<input type="text" id="date-range201" class="form-control" style="height: 50px;" placeholder="Checkout" name="checkout">
												</div>
											</div> 
											</span>
											</div>
											</div>
											
											<!--#########jQuery_Date_Range_Picker##########-->
											
											<div class="col-md-2 col-sm-2 col-xs-12 nopadding">
												<div class="form-group">
													<div class="form-group" id="">
														<input type="number" class="form-control col-md-5" name="no_of_persons" placeholder="Number" value="1" style="width:70px;height: 50px;"/>
														<label class="col-md-7" style="color:#000;font-size:18px">No of Persons</label>
													</div>
												</div>
											</div>
											<div class="col-md-2 col-sm-2 col-xs-12 ">
												<div class="form-group form-action">
													<input type="submit" class="btn btn-default btn-search-submit fa fa-search" value="Search" name="search_result">
														
												</div>
											</div>
										</form>
										
															
													</div>

													<div id="menu2" class="tab-pane fade">
													<br>
														<form class="form-inline" role="form">

														   <div class="form-group">
																<select id='example3' class="form-control">
																	<option value="">Your Country</option>
																	<option value="1">India</option>
																	<option value="2">Afghanistan.</option>
																	<option value="3">Albania.</option>
																	<option value="4">Algeria.</option>
																	<option value="5">India.</option>
																	<option value="6">Malaysia</option>
																	<option value="7">Maldives</option>
																	<option value="8">Nigeria</option>
																	<option value="9">Philippines</option>
																	<option value="10">Portugal</option>
																	<option value="11">Rwanda</option>
																	<option value="12">Singapore</option>
																</select> 
															</div>
															 <div class="form-group">
																<select id='example4' class="form-control">
																	<option value="">Destination Country</option>
																	<option value="1">India</option>
																	<option value="2">Afghanistan.</option>
																	<option value="3">Albania.</option>
																	<option value="4">Algeria.</option>
																	<option value="5">India.</option>
																	<option value="6">Malaysia</option>
																	<option value="7">Maldives</option>
																	<option value="8">Nigeria</option>
																	<option value="9">Philippines</option>
																	<option value="10">Portugal</option>
																	<option value="11">Rwanda</option>
																	<option value="12">Singapore</option>
																</select> 
															</div>
															
														   <a href="search_result1.html" class="btn btn-danger" > Search </a>
														</form>
													</div>
												</div>
											</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="Heading-title-left black">
                    <h1>Special Offers</h1>
                    <?php //echo $total_row; ?>
                </div>
            </div>
        </div>
    </div>
	<div class="container">
    <div class="featured-slider">
        <?php foreach($specialoffer as $offer) { ?>
        <div class="item">
            <div class="papular-reviews">
                <a href="#">
                    <div class="image">
                        <img alt="Tour Package" src="<?php echo base_url();?>upload/specialoffer/<?php echo $offer->offer_image; ?>" class="img-responsive">
                        <div class="absolute-in-image">
                            <div class="duration" style="color:#fff;">
								<h4 style="color:#fff;"> <?php echo $offer->city; ?>, 
							<?php 
							$cvall = $offer->country_id;
							$data1=$this->db->get_where('tbl_country', array('country_id'=>$cvall))->result();
							foreach($data1 as $cval){ echo $cval->country_name; }
							?>
							<br><?php echo $offer->center_name; ?></h4>
							<h5 style="font-weight: bold;">From Rp.<?php echo $offer->start_km; ?> (<?php echo $offer->offer_period; ?>) </h5>
                            </div>
                        </div>
                    </div>
                   
                </a>
            </div>
        </div>
        <?php } ?>
    </div>
	</div>

	<div class="container">
    <div class="row">


        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="load-more-btn" >
                <p style="border:1px solid #777;">
                    <a href="<?php echo base_url(); ?>Front/splOffer" class="">Click to show more...</a>
                    <!--button class="btn-default"> View All Offers<i class="fa fa-angle-right"></i> </button-->
                </p>
            </div>
        </div>
       
    </div>
	</div>
</section>
<section class="featured-ads light-grey">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12 nopadding">
                <div class="col-md-12 col-sm-12 col-xs-12"> 
                    <div class="Heading-title-left black">
                        <h1>Popular Diving Destinations</h1>
                    </div>
                </div>
                <?php foreach($populardivedestination as $res) { $pdd=$res->popular_dive_destination; if($pdd == 'Yes') {
				?>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="featured-image-box">
                        <div class="img-box"><img src="<?php echo base_url(); ?>upload/plan/<?php echo $res->image; ?>" class="img-responsive center-block" alt="">
						<span style="position: absolute;top: 5px;left: 8px;
    color: #fff;
    font-weight: bold;
    text-transform: uppercase;
    font-size: 23px;"><?php 
									$cpdd = $res->country_id;
									$data_pdd=$this->db->get_where('tbl_country', array('country_id'=>$cpdd))->result();
									foreach($data_pdd as $cval_pdd){ echo $cval_pdd->country_name; }
									?></span>
                        </div>
                       
                    </div>
                </div>
                <?php 
				} } ?>
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="load-more-btn" >
                <p style="border:1px solid #777;">
                    <a href="<?php echo base_url(); ?>Front/get_AllPDD" class="">Click to show more...</a>
                    <!--button class="btn-default"> View All Offers<i class="fa fa-angle-right"></i> </button-->
                </p>
            </div>
        </div>              

			  
            </div>
        </div>
    </div>
</section>

