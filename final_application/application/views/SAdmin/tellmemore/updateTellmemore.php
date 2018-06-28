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

<div class="content-wrapper">
<!-- Content area -->
<div class="content">
<div class="breadcrumb-line breadcrumb-line-component">
   <a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a>
   <ul class="breadcrumb">
      <li><a href=""><i class="icon-home2 position-left"></i> Home</a></li>
      <li><a href="">Dashboard</a></li>
      <li class="active">Tell Me More</li>
   </ul>
</div>
<br>
<!-- Main charts -->
<div class="row">
   <div class="col-lg-12">
      <!-- Traffic sources -->
      <div class="panel panel-flat">
         <div class="panel-heading">
            <h2 class="panel-title">Tell Me More</h2>
            <div style="text-align:right;">
               <!--a class="btn bg-violet" href="<?php echo  base_url();?>SAslider/addNew"><i class="glyphicon glyphicon-plus"></i> Add </a-->
               <a href="<?php echo  base_url();?>SAtellmemore" class="btn bg-pink"><i class="glyphicon glyphicon-refresh"></i> List</a>
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
			   <!--form name="add"   method="POST" action="<?php echo  base_url();?>SAtellmemore/editData/<?php echo $row->id;?>" class="form-horizontal" enctype="multipart/form-data">
                  <div class="form-body">
					
				  </div>
				</form-->
               
			 
				<form name="add" method="POST" action="<?php echo  base_url();?>SAtellmemore/editData/<?php echo $row->id;?>" class="form-horizontal form-validate-jquery" 
			   enctype="multipart/form-data">
                  <div class="form-body">
					 <div class="form-group">
                        <label class="control-label col-md-3">Image</label>
						<div class="col-md-9" style="padding: 0px">
						<?php if ($row->images!="") { 
						//echo $row->image;
						$img = explode(',' , trim($row->images, ','));
						foreach($img as $rowimg)
						{
							?>
							<div class="field_wrapper99">
								<div class="col-md-3" style="    padding: 0px 2px;">
							<img src="<?php echo base_url(); ?>upload/tellmemore/<?php echo $rowimg; ?>" class="img-responsive" style="width:180px; height:100px;    padding: 3px;">
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
							</div>
						</div>
						
                     </div>
					<div class="form-group">
						<label class="control-label col-md-3"><b>Country</b></label>
						<div class="col-md-9">
							<select class="form-control" name="edit_dive_center_country" id="scountry">

								<option value="">--------------------------------------------------------------------</option>
								<option label="Select Country"> </option>
								<option value="">--------------------------------------------------------------------</option>
								<?php 
									$S_country=$this->db->get('tbl_country')->result_array();
									foreach ($S_country as $sc) 
									{
										?>
								   <option value="<?php echo $sc['country_id'];?>" <?php if($sc['country_id']==$row->country_id){echo "selected";}?>> <?php echo $sc['country_name'];?></option> 
								   <?php
									}
								?>
							</select>
						   <span class="help-block"></span>
						</div>
					</div>
					 <div class="form-group">
                        <label class="control-label col-md-3">Island Name</label>
                        <div class="col-md-9">
							
                        <select class="form-control" name="edit_dive_center_island" id="islands">

							<option value="">--------------------------------------------------------------------</option>
							<option label="Select Island"></option>
							<option value="">--------------------------------------------------------------------</option>
							<?php 
								$S_island=$this->db->get('tbl_island')->result_array();
								foreach ($S_island as $si) 
								{
									?>
							   <option value="<?php echo $si['island_id'];?>" <?php if($si['island_id']==$row->island_id){echo "selected";}?>><?php echo $si['island_name'];?></option> 
							   <?php
								}
							?>
										
						</select>
                        </div>
                     </div>
					<div class="form-group">
                        <label class="control-label col-md-3">Overview</label>
                        <div class="col-md-9">
                           <textarea class="form-control" name="tellme_overview" rows="7"><?php echo $row->overview; ?></textarea>
                           <span class="help-block"></span>
                        </div>
                     </div>
					 <div class="form-group">
                        <label class="control-label col-md-3">Current</label>
                        <div class="col-md-9">
                           <input name="current" class="form-control" type="text" value="<?php echo $row->current; ?>">
                           <span class="help-block"></span>
                        </div>
                     </div>
					  <div class="form-group">
                        <label class="control-label col-md-3">Water Temperature</label>
                        <div class="col-md-9">
                           <input name="watertemperature" class="form-control" type="text" value="<?php echo $row->water_temperature; ?>">
                           <span class="help-block"></span>
                        </div>
                     </div>
					  <div class="form-group">
                        <label class="control-label col-md-3">Underwater Visibility</label>
                        <div class="col-md-9">
                           <input name="underwater" class="form-control" type="text" value="<?php echo $row->underwater_visibility; ?>">
                           <span class="help-block"></span>
                        </div>
                     </div>
					  <div class="form-group">
                        <label class="control-label col-md-3">Diving Season</label>
                        <div class="col-md-9">
                           <input name="divingseason" class="form-control" type="text" value="<?php echo $row->diving_season; ?>">
                           <span class="help-block"></span>
                        </div>
                     </div>
					 <style>
						.btn-group, .btn-group-vertical
						{
							width:100%;
						}
						.multiselect-container
						{
							min-width: 100%;
						}
						.form-horizontal .radio, .form-horizontal .checkbox, .form-horizontal .radio-inline, .form-horizontal .checkbox-inline
						{
							    padding-top: 0px;
						}
					 </style>
					<div class="form-group">
                        <label class="control-label col-md-3">Diving Sites Link</label>
                        <div class="col-md-9">
                           <select class="form-control multiselect-filtering" name="divingsites[]" multiple="multiple">
                               <?php
								  $split_dsites = explode(',',$row->diving_sites);							   
                              foreach($divepoints as $tmm) {

                                 ?>
                                 <option value="<?php echo $tmm->id;?>" <?php if(in_array($tmm->id,$split_dsites)){echo "selected";}?>
								 ><?php echo ($tmm->name=='' ? $tmm->id : $tmm->name) ;?></option>
                              <?php
									}
                              ?>
                           </select>
                           <span class="help-block"></span>
                        </div>
                     </div>
					 <div class="form-group">
                        <label class="control-label col-md-3">Diving Centers</label>
                        <div class="col-md-9">
                           <input name="divingcenters" class="form-control" type="text" value="<?php echo $row->diving_centers; ?>">
                           <span class="help-block"></span>
                        </div>
                     </div>
					<div class="form-group">
                        <label class="control-label col-md-3">Depth</label>
                        <div class="col-md-9">
                           <input name="depth" class="form-control" type="text" value="<?php echo $row->depth; ?>">
                           <span class="help-block"></span>
                        </div>
                     </div>
					<div class="form-group">
                        <label class="control-label col-md-3">What to Use</label>
                        <div class="col-md-9">
                           <input name="whattouse" class="form-control" type="text" value="<?php echo $row->what_to_see; ?>">
                           <span class="help-block"></span>
                        </div>
                     </div>	
<?php
/*
					 <div class="form-group">
                        <label class="control-label col-md-3">Island</label>
                        <div class="col-md-9">
							<select name="island" class="form-control">
								<?php 
								$get_island = $this->db->get_where('tbl_island', array('island_id'=>$row->island_id))->result();
								foreach($get_island as $get_val)
									{
								?>
								<option value="<?php echo $get_val->island_id; ?>"><?php echo $get_val->island_name; ?></option>
								<?php 
									}
								?>
								<option label=" -- Select island -- "></option>
								<?php 
									$island = $this->db->get('tbl_island')->result();
									foreach($island as $val)
									{
								?>
								<option value="<?php echo $val->island_id; ?>"><?php echo $val->island_name; ?></option>
								
								<?php 
									}
								?>
							</select>
                        </div>
                     </div>	
*/
?>
					 <!--div class="form-group">
						<?php 
							$chkbox2 =$row->popular_diving_destination;
						?>
                        <label class="control-label col-md-3">Popular Diving Destination</label>
                        <div class="col-md-9">
							<label class="checkbox-inline" style="padding-left:0px;"><input type="radio" class="styled" name="popular_diving_destination" value="Yes" <?php echo ($chkbox2=='Yes')?'checked':'' ?>>Yes</label>
							<label class="checkbox-inline"><input type="radio" class="styled" name="popular_diving_destination" value="No" <?php echo ($chkbox2=='No')?'checked':'' ?>>No</label>
                        </div>
                     </div-->	
                  </div>

                  <div style="text-align:center">
                     <input type="submit" name="update_tellmemore_data" value="Update" class="btn btn-success">
                     <input type="reset" value="Reset" class="btn btn-danger">
                  </div>
               </form>
               <?php } ?>
               <br><br>
            </div>
         </div>
      </div>
      <!-- /traffic sources -->
   </div>
</div>
<!-- /dashboard content -->
   