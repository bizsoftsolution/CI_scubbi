<div class="content-wrapper">
<!-- Content area -->
<div class="content">
<div class="breadcrumb-line breadcrumb-line-component">
   <a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a>
   <ul class="breadcrumb">
      <li><a href=""><i class="icon-home2 position-left"></i> Home</a></li>
      <li><a href="">Dashboard</a></li>
      <li class="active">Popular Diving Destinations</li>
   </ul>
</div>
<br>
<!-- Main charts -->
<div class="row">
   <div class="col-lg-12">
      <!-- Traffic sources -->
      <div class="panel panel-flat">
         <div class="panel-heading">
            <h2 class="panel-title">Popular Diving Destinations</h2>
            <div style="text-align:right;">
               <!--a class="btn bg-violet" href="<?php echo  base_url();?>SAslider/addNew"><i class="glyphicon glyphicon-plus"></i> Add </a-->
               <a href="<?php echo  base_url();?>SAppd" class="btn bg-pink"><i class="glyphicon glyphicon-refresh"></i> List</a>
            </div>
            <hr/>
         </div>
         <div class="container-fluid">
            <!-- content Starts Here-->
            <!--div class="col-md-2"></div-->
            <div class="col-md-12">
               <br>
               <?php if($message == "FAILED") { ?>
               <div class="alert alert-danger">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <strong>Action Failed !!! </strong>
               </div>
               <?php } else if($message == "SUCCESS") {  ?>
               <div class="alert alert-success">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <strong>Success !!! </strong> New Group Created successfully
               </div>
               <?php } ?>
               <?php foreach($geteditdata as $row){?>
			   <form name="add"   method="POST" action="<?php echo  base_url();?>SAppd/editData/<?php echo $row->id;?>" class="form-horizontal" enctype="multipart/form-data">
                  <div class="form-body">
					 <div class="form-group">
                        <label class="control-label col-md-3">Image</label>
						<div class="col-md-9" style="padding: 0px">
						<?php if ($row->image) { 
						//echo $row->image;
						$img = explode(',' , $row->image);
						foreach($img as $rowimg)
						{
							?>
							<div class="field_wrapper99">
								<div class="col-md-3" style="    padding: 0px 2px;">
							<img src="<?php echo base_url(); ?>upload/ppd/<?php echo $rowimg; ?>" class="img-responsive" style="width:180px; height:100px;    padding: 3px;">
							<input type="hidden" name="already_img[]" value="<?php echo $rowimg; ?>">
							<a href="javascript:void(0);" class="remove_button2" title="Remove field"
									style="position: absolute;    margin: -24px 0px 0px 32px;
									left: 124px;"
									><img src="<?php echo base_url(); ?>/upload/images/x.jpg" style="width:25px; height:25px;"/></a>
								</div>
							</div>
							<script type="text/javascript">
								$(document).ready(function(){
									//var maxField = 4; //Input fields increment limitation
									//var addButton = $('.add_button2'); //Add button selector
									var wrapper = $('.field_wrapper99'); //Input field wrapper	
									var x = 1; //Initial field counter is 1
									
									$(wrapper).on('click', '.remove_button2', function(e){ //Once remove button is clicked
										e.preventDefault();
										$(this).parent('div').remove(); //Remove field html
										x--; //Decrement field counter
									});
								});
							</script>
							
								
							<?php
						}
						
						?>
							
						<?php }else{ echo(" <h3>Upload Photo</h3>"); } ?>
						</div>
						<div class="row">
							<div class="col-md-3">&nbsp;</div>
							<div class="col-md-4">
								<div >&nbsp;</div>
								<div id="filediv"><input name="file[]" class="form-control" type="file" id="file"></div>
								<input type="button" id="add_more" class="upload" value="Add More Files"/>
								<span class="help-block">Allowed format:jpg, Max file size: 2Mb, Image Resolution : (800 x 600)</span>
								<!--input type="submit" name="submit_updatebgimage" value="Update" class="btn btn-success" id="upload"-->
								<input type="submit" name="update_ppd_image" value="Update" class="btn btn-success" id="upload">
							</div>
						</div>
						
                     </div>
				  </div>
				</form>	
				<hr>
				<form name="add" method="POST" action="<?php echo  base_url();?>SAppd/editData/<?php echo $row->id;?>" class="form-horizontal form-validate-jquery" 
			   enctype="multipart/form-data">
					<div class="form-body">
					<div class="form-group">
						 <label class="control-label col-md-3">Country</label>
						 <div class="col-md-9">
							<select class="form-control" name="scountry" id="scountry" required="">
								<?php 
/*
									$d1 = $this->db->get_where('tbl_country', array('country_id'=>$row->country_id))->result();
									foreach($d1 as $d1_row)
									{
										$selcountry = 
										echo'
										<option value="'.$d1_row->country_id.'">"'.$d1_row->country_name.'"
										</option>';
									}
*/
								?>
								<option value="0" label="Select Country">Select Country</option>
								<?php $data=$this->db->get('tbl_country')->result_array(); foreach ($data as $a) {
									$country_active = $a['is_deactivate'];
									if($country_active == "N")
									{
									?>
								<option value="<?php echo $a['country_id'];?>" <?php if($a['country_id'] == $row->country_id) echo 'selected'; ?> >
									<?php echo $a[ 'country_name'];?>
								</option>
								<?php 
								}
								} ?>
							</select>
						 </div>
					</div>
					

                  <div style="text-align:center">
                     <input type="submit" name="update_ppd_data" value="Update" class="btn btn-success">
                     <input type="reset" value="Reset" class="btn btn-danger">
                  </div>
               </form>
               <?php } ?>
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
               <br><br>
            </div>
         </div>
      </div>
      <!-- /traffic sources -->
   </div>
</div>
<!-- /dashboard content -->
   