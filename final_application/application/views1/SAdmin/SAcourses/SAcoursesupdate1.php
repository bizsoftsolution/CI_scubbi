<div class="content-wrapper">
<!-- Content area -->
<div class="content">
<div class="breadcrumb-line breadcrumb-line-component">
   <a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a>
   <ul class="breadcrumb">
      <li><a href=""><i class="icon-home2 position-left"></i> Home</a></li>
      <li><a href="">Dashboard</a></li>
      <li class="active">Courses & Specialties</li>
   </ul>
</div>
<br>
<!-- Main charts -->
<div class="row">
   <div class="col-lg-12">
      <!-- Traffic sources -->
      <div class="panel panel-flat">
         <div class="panel-heading">
            <h2 class="panel-title">Courses & Specialties</h2>
            <div style="text-align:right;">
               <!--a class="btn bg-violet" href="<?php echo  base_url();?>DCcourses/addNew"><i class="glyphicon glyphicon-plus"></i> Add </a-->
               <a href="<?php echo  base_url();?>SAcourses/SAcoursesdashboard" class="btn bg-pink"><i class="glyphicon glyphicon-refresh"></i> List</a>
            </div>
            <hr/>
         </div>
         <div class="container-fluid">
            <!-- content Starts Here-->
			<div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
               <br>
               <?php if($message == "FAILED") { ?>
               <div class="alert alert-danger">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <strong>Action Failed !!! </strong>
               </div>
               <?php } else if($message == "SUCCESS") {  ?>
               <div class="alert alert-success">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <strong>Success !!! </strong> Updated successfully
               </div>
               <?php } ?>
               <?php foreach($getEditdata as $row){?>
				<h3 style="color: #2196f3;font-weight: bold;">Update Contents</h3>
				<hr>
				<form name="add" method="POST" action="<?php echo  base_url();?>SAcourses/edit/<?php echo $row->id; ?>" class="form-horizontal form-validate-jquery stepy-clickable" 
			   enctype="multipart/form-data">
				<fieldset title="1">
				<legend class="text-semibold">General Info</legend>
					<div class="form-group">
                        <label class="control-label col-md-3"><b>Product Name</b> <strong style="color:red;">*</strong></label>
                        <div class="col-md-9">
                           <input name="name" class="form-control" type="text" value="<?php echo $row->product_name; ?>">
                           <span class="help-block"></span>
                        </div>
                     </div>
					 <div class="form-group">
                        <label class="control-label col-md-3"><b>Product Description</b> <strong style="color:red;">*</strong></label>
                        <div class="col-md-9">
						    <textarea name="description" class="form-control" id="editor-full1" required="required"><?php echo $row->product_description; ?></textarea>
                           <span class="help-block"></span>
                        </div>
                     </div>
					<?php 
					if($row->product_includes != "" || $row->product_excludes != "")
					{
						$chkbox100 = $row->product_includes;
						$chkbox99 = explode(',', $chkbox100);
						
						$chkbox98 = $row->product_excludes;
						$chkbox97 = explode(',', $chkbox98);
						$pi=0;
						foreach($chkbox99 as $s1)
						{
						if($s1 != "FULL EQUIPMENT RENTAL" && $s1 != "LUNCH" && $s1 != "DINNER" && $s1 != "TRANSFER FROM JETTY" && $s1 != "TRANSFER FROM HOTEL" && $s1 != "MARINE PARK FEE" && $s1 != "DC TO DIVE SITE")
						{ 
						 $pi = 1;
						}
						
						}
						if($pi==1)
						{
					?>
					 <div class="form-group">
						<label class="control-label col-md-3"><b>Product Includes</b> <strong style="color:red;">*</strong></label>
						<div class="col-md-9">
						   <input name="productincludes1" class="form-control" type="text" value="<?php echo $row->product_includes; ?>">
						   <span class="help-block"></span>
						</div>
					 </div>
					 <?php
						}
						else
						{
					?>
					<div class="form-group">
						<label class="control-label col-md-3"><b>Product Includes</b> <strong style="color:red;">*</strong></label>
						<div class="col-md-9">
						   <input name="productincludes1" class="form-control" type="text">
						   <span class="help-block"></span>
						</div>
					 </div>
					<?php
						}
						
						$pe=0;
						foreach($chkbox97 as $s1)
						{
						if($s1 != "FULL EQUIPMENT RENTAL" && $s1 != "LUNCH" && $s1 != "DINNER" && $s1 != "TRANSFER FROM JETTY" && $s1 != "TRANSFER FROM HOTEL" && $s1 != "MARINE PARK FEE" && $s1 != "DC TO DIVE SITE")
						{ 
						 $pe = 1;
						}
						
						}
						
						if($pe==1)
						{
					 ?>
					  <div class="form-group">
						<label class="control-label col-md-3"><b>Product Excludes</b> <strong style="color:red;">*</strong></label>
						<div class="col-md-9">
							<div class="row">
								<div class="col-md-10">
									<input name="productexcludes1" class="form-control" type="text" value="<?php echo $row->product_excludes; ?>">
									<span class="help-block"></span>
								</div>
								<div class="col-md-2">
									<label class="checkbox-inline"><input type="checkbox" class="styled" name="display" value="display" checked>Display</label>
								</div>
							</div>                     
						</div>
					 </div>
					 <?php 
						}
						else
						{
					?>
					<div class="form-group">
						<label class="control-label col-md-3"><b>Product Excludes</b> <strong style="color:red;">*</strong></label>
						<div class="col-md-9">
							<div class="row">
								<div class="col-md-10">
									<input name="productexcludes1" class="form-control" type="text" data-popup="tooltip" title="Product Excludes(It is required field)" data-placement="bottom">
									<span class="help-block"></span>
								</div>
								<div class="col-md-2">
									<label class="checkbox-inline"><input type="checkbox" class="styled" name="display" value="display" checked>Display</label>
								</div>
							</div>                     
						</div>
					 </div>
					<?php
						}	
					 ?>
					 <div class="form-group">
						<label class="control-label col-md-3"><b>Or Select From a List of Common options</b> <strong style="color:red;">*</strong></label>
						<div class="col-md-9">
							<div class="row">
								<div class="table-responsive">
									<table class="table">
										<tr>
											<td></td>
											<td><b>Includes</b></td>
											<td><b>Excludes</b></td>
											<td></td>
											<td><b>Includes</b></td>
											<td><b>Excludes</b></td>
										</tr>
										
										<tr>
											<td>FULL EQUIPMENT RENTAL</td>
											<td align="center"><input type="checkbox" class="styled" name="productincludes[]" value="FULL EQUIPMENT RENTAL" <?php if(in_array("FULL EQUIPMENT RENTAL",$chkbox99)){echo "checked";}?>></td>
											<td align="center"><input type="checkbox" class="styled" name="productexcludes[]" value="FULL EQUIPMENT RENTAL" <?php if(in_array("FULL EQUIPMENT RENTAL",$chkbox97)){echo "checked";}?>></td>
											<td>LUNCH</td>
											<td align="center"><input type="checkbox" class="styled" name="productincludes[]" value="LUNCH" <?php if(in_array("LUNCH",$chkbox99)){echo "checked";}?>></td>
											<td align="center"><input type="checkbox" class="styled" name="productexcludes[]" value="LUNCH" <?php if(in_array("LUNCH",$chkbox97)){echo "checked";}?>></td>
										</tr>
										<tr>
											<td>DINNER</td>
											<td align="center"><input type="checkbox" class="styled" name="productincludes[]" value="DINNER" <?php if(in_array("DINNER",$chkbox99)){echo "checked";}?>></td>
											<td align="center"><input type="checkbox" class="styled" name="productexcludes[]" value="DINNER" <?php if(in_array("DINNER",$chkbox97)){echo "checked";}?>></td>
											<td>TRANSFER FROM JETTY</td>
											<td align="center"><input type="checkbox" class="styled" name="productincludes[]" value="TRANSFER FROM JETTY" <?php if(in_array("TRANSFER FROM JETTY",$chkbox99)){echo "checked";}?>></td>
											<td align="center"><input type="checkbox" class="styled" name="productexcludes[]" value="TRANSFER FROM JETTY" <?php if(in_array("TRANSFER FROM JETTY",$chkbox97)){echo "checked";}?>></td>
										</tr>
										<tr>
											<td>TRANSFER FROM HOTEL</td>
											<td align="center"><input type="checkbox" class="styled" name="productincludes[]" value="TRANSFER FROM HOTEL" <?php if(in_array("TRANSFER FROM HOTEL",$chkbox99)){echo "checked";}?>></td>
											<td align="center"><input type="checkbox" class="styled" name="productexcludes[]" value="TRANSFER FROM HOTEL" <?php if(in_array("TRANSFER FROM HOTEL",$chkbox97)){echo "checked";}?>></td>
											<td>MARINE PARK FEE</td>
											<td align="center"><input type="checkbox" class="styled" name="productincludes[]" value="MARINE PARK FEE" <?php if(in_array("MARINE PARK FEE",$chkbox99)){echo "checked";}?>></td>
											<td align="center"><input type="checkbox" class="styled" name="productexcludes[]" value="MARINE PARK FEE" <?php if(in_array("MARINE PARK FEE",$chkbox97)){echo "checked";}?>></td>
										</tr>
										<tr>
											<td>DC TO DIVE SITE</td>
											<td align="center"><input type="checkbox" class="styled" name="productincludes[]" value="DC TO DIVE SITE" <?php if(in_array("DC TO DIVE SITE",$chkbox99)){echo "checked";}?>></td>
											<td align="center"><input type="checkbox" class="styled" name="productexcludes[]" value="DC TO DIVE SITE" <?php if(in_array("DC TO DIVE SITE",$chkbox97)){echo "checked";}?>></td>

										</tr>
									</table>
								</div>
							</div>                     
						</div>
					 </div>
					<?php
					}
					else
					{
					?>
					 <div class="form-group">
						<label class="control-label col-md-3"><b>Product Includes</b> <strong style="color:red;">*</strong></label>
						<div class="col-md-9">
						   <input name="productincludes1" class="form-control" type="text" data-popup="tooltip" title="Product Includes(It is required field)" data-placement="bottom">
						   <span class="help-block"></span>
						</div>
					 </div>
					  <div class="form-group">
						<label class="control-label col-md-3"><b>Product Excludes</b> <strong style="color:red;">*</strong></label>
						<div class="col-md-9">
							<div class="row">
								<div class="col-md-10">
									<input name="productexcludes1" class="form-control" type="text" data-popup="tooltip" title="Product Excludes(It is required field)" data-placement="bottom">
									<span class="help-block"></span>
								</div>
								<div class="col-md-2">
									<label class="checkbox-inline"><input type="checkbox" class="styled" name="display" value="display" checked>Display</label>
								</div>
							</div>                     
						</div>
					 </div>
					<div class="form-group">
						<label class="control-label col-md-3"><b>Or Select From a List of Common options</b> <strong style="color:red;">*</strong></label>
						<div class="col-md-9">
							<div class="row">
								<div class="table-responsive">
									<table class="table">
										<tr>
											<td></td>
											<td><b>Includes</b></td>
											<td><b>Excludes</b></td>
											<td></td>
											<td><b>Includes</b></td>
											<td><b>Excludes</b></td>
										</tr>
										
										<tr>
											<td>FULL EQUIPMENT RENTAL</td>
											<td align="center"><input type="checkbox" class="styled" name="productincludes[]" value="FULL EQUIPMENT RENTAL"></td>
											<td align="center"><input type="checkbox" class="styled" name="productexcludes[]" value="FULL EQUIPMENT RENTAL"></td>
											<td>LUNCH</td>
											<td align="center"><input type="checkbox" class="styled" name="productincludes[]" value="LUNCH"></td>
											<td align="center"><input type="checkbox" class="styled" name="productexcludes[]" value="LUNCH"></td>
										</tr>
										<tr>
											<td>DINNER</td>
											<td align="center"><input type="checkbox" class="styled" name="productincludes[]" value="DINNER"></td>
											<td align="center"><input type="checkbox" class="styled" name="productexcludes[]" value="DINNER"></td>
											<td>TRANSFER FROM JETTY</td>
											<td align="center"><input type="checkbox" class="styled" name="productincludes[]" value="TRANSFER FROM JETTY"></td>
											<td align="center"><input type="checkbox" class="styled" name="productexcludes[]" value="TRANSFER FROM JETTY"></td>
										</tr>
										<tr>
											<td>TRANSFER FROM HOTEL</td>
											<td align="center"><input type="checkbox" class="styled" name="productincludes[]" value="TRANSFER FROM HOTEL"></td>
											<td align="center"><input type="checkbox" class="styled" name="productexcludes[]" value="TRANSFER FROM HOTEL"></td>
											<td>MARINE PARK FEE</td>
											<td align="center"><input type="checkbox" class="styled" name="productincludes[]" value="MARINE PARK FEE"></td>
											<td align="center"><input type="checkbox" class="styled" name="productexcludes[]" value="MARINE PARK FEE"></td>
										</tr>
										<tr>
											<td>DC TO DIVE SITE</td>
											<td align="center"><input type="checkbox" class="styled" name="productincludes[]" value="DC TO DIVE SITE"></td>
											<td align="center"><input type="checkbox" class="styled" name="productexcludes[]" value="DC TO DIVE SITE"></td>

										</tr>
									</table>
								</div>
							</div>                     
						</div>
					 </div>
					<?php
					}
					?>
					 <div class="form-group">
                        <label class="control-label col-md-3"><b>Other Information</b> <strong style="color:red;">*</strong></label>
                        <div class="col-md-9">
							<div class="row">
								<div class="col-md-10">
									<input name="otherinformation" class="form-control" type="text" value="<?php echo $row->other_info; ?>">
									<span class="help-block"></span>
								</div>
								<div class="col-md-2">
									<label class="checkbox-inline"><input type="checkbox" class="styled" name="display" value="display" checked>Display</label>
								</div>
							</div>                     
                        </div>
                     </div>
					  <div class="form-group">
						<div class="row">
							<div class="col-md-6">
								<label class="control-label col-md-6"><b>Product Category : </b></label>
								<div class="col-md-6">
									<input name="productcategory" class="form-control" type="text" value="<?php echo $row->product_category; ?>">
								</div>
							</div>
							<div class="col-md-6">
								<label class="control-label col-md-4"><b>Product Keyword : </b></label>
								<div class="col-md-8">
									
									<select name="productkeyword[]" class="form-control multiselect-filtering" data-popup="tooltip" title="Product Keyword(It is required field)" data-placement="bottom" multiple="multiple">
										<?php 
											$aaa =$row->product_keyword;
											$vvv = explode(',', $aaa);
											foreach($vvv as $valll)
											{ ?>
												 <option value="<?php echo $valll; ?>" ><?php echo $valll; ?></option> 
											<?php
											
											}
											$data=$this->db->get_where('tbl_product_keywords', array('user_id'=>$this->session->userdata('user_id')))->result_array();
											foreach ($data as $pk) {?>
										   <option value="<?php echo $pk['keywords'];?>" ><?php echo $pk['keywords'];?></option> 
										   <?php
											}
										  ?>
									</select>
								</div>
							</div>
						</div>					
					 </div>
					 <div class="form-group">
                        <label class="control-label col-md-3"><b>Sequence Number</b></label>
                        <div class="col-md-9">
                           <input name="sequence_number" class="form-control" type="text" value="<?php echo $row->sequence_number; ?>">
                           <span class="help-block"></span>
                        </div>
                     </div>
					 <div class="form-group">
                        <label class="control-label col-md-3"><b>Product Status</b></label>
                        <div class="col-md-9">
							<?php 
								$chkbox1 = $row->product_status;
							?>
                           <label class="checkbox-inline"><input type="radio" class="styled" name="productstatus" value="Available" 
						   <?php echo ($chkbox1=='Available')?'checked':'' ?> >AVAILABLE</label>
							<label class="checkbox-inline"><input type="radio" class="styled" name="productstatus" value="Hidden" 
							<?php echo ($chkbox1=='Hidden')?'checked':'' ?> >HIDDEN</label>
                        </div>
                     </div>
				</fieldset>
				<fieldset title="2">
				<legend class="text-semibold">Pricing Options</legend>
						<div class="form-group">
						<label class="control-label col-md-3"><b>Product Unit :</b> <strong style="color:red;">*</strong></label>
						<div class="col-md-9">
							<?php 
								$chkbox2 = $row->product_unit;
								if($chkbox2 =='Dive' || $chkbox2 =='Pax' || $chkbox2 =='Trip')
								{
							?>
							<label class="checkbox-inline">
							<input type="radio" class="styled" name="productunits" value="Dive"
							<?php echo ($chkbox2=='Dive')?'checked':'' ?>>Dive</label>
							<label class="checkbox-inline">
							<input type="radio" class="styled" name="productunits" value="Pax"
							<?php echo ($chkbox2=='Pax')?'checked':'' ?>>Pax</label>
							<label class="checkbox-inline">
							<input type="radio" class="styled" name="productunits" value="Trip"
							<?php echo ($chkbox2=='Trip')?'checked':'' ?>>Trip</label>						
							<?php 
								}
								else
								{
							?>
							<label class="checkbox-inline">
							<input type="radio" class="styled" name="productunits" value="<?php echo $chkbox2; ?>"
							<?php echo ($chkbox2==$chkbox2)?'checked':'' ?> ><?php echo $chkbox2; ?></label>
							<label class="checkbox-inline" style="margin: 0 0 0 10px;">
							<input type="radio" class="styled" name="productunits" value="Dive" >Dive</label>
							<label class="checkbox-inline">
							<input type="radio" class="styled" name="productunits" value="Pax" >Pax</label>
							<label class="checkbox-inline">
							<input type="radio" class="styled" name="productunits" value="Trip" >Trip</label>
							<?php 
								}
							?>						
						</div>
					 </div>
					 
					  <div class="form-group">
                        <label class="control-label col-md-3"><b>Max Dive/ Day </b></label>
                        <div class="col-md-9">
                           <input name="maxdiveday" class="form-control" type="text" value="<?php echo $row->max_dive_day; ?>">
                           <span class="help-block"></span>
                        </div>
                     </div>
					  <div class="form-group">
                        <label class="control-label col-md-3"><b>Product Max / Day </b></label>
                        <div class="col-md-9">
                           <input name="productmaxday" class="form-control" type="text" value="<?php echo $row->product_max_day; ?>">
                           <span class="help-block"></span>
                        </div>
                     </div>
					 
					 <div class="form-group">
						<label class="control-label col-md-3"><b>Product Price :</b></label>
						<div class="col-md-9">
							<div class="row">
								<div class="col-md-3">Normal Rate</div>
								<div class="col-md-3">Weekend Rate</div>
								<div class="col-md-3">Peak Season Rate</div>
								<div class="col-md-3">Super Peak Season Rate</div>
							</div>
							<div class="row">
								<div class="col-md-2"> 
								<input name="product_normal_price" class="form-control" type="text" value="<?php echo $row->product_normal_rate; ?>">
								</div>
								<div class="col-md-1"> <span class="help-block" style="margin-top: 24px;">MYR/PAX</span></div>
								<div class="col-md-2"> 
								<input name="product_weekend_price" class="form-control" type="text" value="<?php echo $row->product_weekend_rate; ?>">
								</div>
								<div class="col-md-1"> <span class="help-block" style="margin-top: 24px;">MYR/PAX</span></div>
								<div class="col-md-2"> 
								<input name="product_peakseason_price" class="form-control" type="text" value="<?php echo $row->product_peakseason_rate; ?>">
								</div>
								<div class="col-md-1"> <span class="help-block" style="margin-top: 24px;">MYR/PAX</span></div>
								<div class="col-md-2"> 
								<input name="product_super_peakseason_price" class="form-control" type="text" value="<?php echo $row->product_superpeak_rate; ?>">
								</div>
								<div class="col-md-1"> <span class="help-block" style="margin-top: 24px;">MYR/PAX</span></div>
							</div>
						   <!--input name="product_price" class="form-control" type="text"  data-popup="tooltip" title="Product Price(It is required field)" data-placement="bottom">
						   <span class="help-block"></span-->
						</div>
					 </div>
					 
<!--****************************************************************************************************************************************************************************************************************************************************************************************************													START APPLY DISCOUNT FOR BULK PURCHASE *****************************************************************************************************************************************************************************************************************************************************************************************************-->					 	
					<?php
					$chkbox99 = $row->product_inclusive_accomodation;
					if(($chkbox99 == 'Yes')?'checked':'')
					{
					$p_i_a_s=$row->product_inclusive_accomodation_single;	
					 $arr_p_i_a_s=explode(",",$p_i_a_s);
					 $p_i_a_t=$row->product_inclusive_accomodation_twin;	
					 $arr_p_i_a_t=explode(",",$p_i_a_t);
					 $p_i_a_tp=$row->product_inclusive_accomodation_3person;	
					 $arr_p_i_a_tp=explode(",",$p_i_a_tp);
					 $p_i_a_q=$row->product_inclusive_accomodation_quad;	
					 $arr_p_i_a_q=explode(",",$p_i_a_q);
					?>
					<div class="form-group">
						<label class="control-label col-md-3"><b>Is the product inclusive <br>of accomodation? </b></label>
						 <div class="col-md-9">
						<label class="checkbox-inline">
						<input type="radio" class="styled property2" name="dcinclusiveaccomodation" value="Yes" <?php echo ($chkbox99=='Yes')?'checked':'' ?>>YES</label>
						<label class="checkbox-inline"><input type="radio" class="styled property1" name="dcinclusiveaccomodation" value="No" <?php echo ($chkbox99=='No')?'checked':'' ?> >NO</label>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3"><b>Single Room:</b></label>
						<div class="col-md-9">
							<div class="row">
								<?php 
									
									foreach($arr_p_i_a_s as $row_p_i_a_s)
									{
								?>
								<div class="col-md-2"> 
								<input name="product_inclusive_accomodation_single[]" class="form-control product_inclusive_accomodation_clear" type="text" value="<?php echo $row_p_i_a_s; ?>" id="input">
								</div>
								<div class="col-md-1"> <span class="help-block" style="margin-top: 24px;">MYR/PAX</span></div>
								<?php 
									
									}
								?>	
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3"><b>Twin Room:</b></label>
						<div class="col-md-9">
							<div class="row">
								<?php 
									foreach($arr_p_i_a_t as $row_p_i_a_t)
									{
								?>
								<div class="col-md-2"> 
								<input name="product_inclusive_accomodation_twin[]" class="form-control product_inclusive_accomodation_clear" type="text" value="<?php echo $row_p_i_a_t; ?>" id="input1">
								</div>
								<div class="col-md-1"> <span class="help-block" style="margin-top: 24px;">MYR/PAX</span></div>
								<?php 
									}
								?>	
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3"><b>3 Person Room:</b></label>
						<div class="col-md-9">
							<div class="row">
								<?php 
									foreach($arr_p_i_a_tp as $row_p_i_a_tp)
									{
								?>
								<div class="col-md-2"> 
								<input name="product_inclusive_accomodation_threeperson[]" class="form-control product_inclusive_accomodation_clear" type="text" value="<?php echo $row_p_i_a_tp; ?>" id="input1">
								</div>
								<div class="col-md-1"> <span class="help-block" style="margin-top: 24px;">MYR/PAX</span></div>
								<?php 
									}
								?>	
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3"><b>Quad Room:</b></label>
						<div class="col-md-9">
							<div class="row">
								<?php 
									foreach($arr_p_i_a_q as $row_p_i_a_q)
									{
								?>
								<div class="col-md-2"> 
								<input name="product_inclusive_accomodation_quad[]" class="form-control product_inclusive_accomodation_clear" type="text" value="<?php echo $row_p_i_a_q; ?>" id="input1">
								</div>
								<div class="col-md-1"> <span class="help-block" style="margin-top: 24px;">MYR/PAX</span></div>
								<?php 
									}
								?>	
							</div>
						</div>
					</div>
					<script>
						$('.property1').on('click', function() {
						  if ($(this).val() === '') 
						  {
							$('.product_inclusive_accomodation_clear').prop('disabled', false);
						  } 
						  else 
						  {
							$('.product_inclusive_accomodation_clear').prop("disabled", true).val('');
						  }
						});
						$('.property2').on('click', function() {
						  if ($(this).val() === '') 
						  {
							$('.product_inclusive_accomodation_clear').prop('disabled', false);
						  } 
						  else 
						  {
							$('.product_inclusive_accomodation_clear').prop("disabled", false).val('');
						  }
						});
					</script>
					<?php 
					}
					elseif(($chkbox99 == 'No')?'checked':'')
					{
					?>
					<div class="form-group">
						<label class="control-label col-md-3"><b>Is the product inclusive <br>of accomodation? </b></label>
						 <div class="col-md-9">
						<label class="checkbox-inline">
						<input type="radio" class="styled" name="dcinclusiveaccomodation" value="Yes" <?php echo ($chkbox99=='Yes')?'checked':'' ?>onClick="showTextBox100()">YES</label>
						<label class="checkbox-inline"><input type="radio" class="styled" name="dcinclusiveaccomodation" value="No" <?php echo ($chkbox99=='No')?'checked':'' ?> onClick="showTextBox99()">NO</label>
						</div>
					</div>
					<div class="dcinclusiveaccomodationBox1" style="display:none;background:#eeeeee;padding:0% 1%;">
			 <div class="form-group">
				<label class="control-label col-md-3"><b>Single Room:</b></label>
				<div class="col-md-9">
					<div class="row">
						<?php for($i=1; $i<=4; $i++) { ?>
						<div class="col-md-2"> 
						<input name="product_inclusive_accomodation_single[]" class="form-control" type="text" data-popup="tooltip" title="Product Accomodation(It is required field)" data-placement="bottom" id="input1">
						</div>
						<div class="col-md-1"> <span class="help-block" style="margin-top: 24px;">MYR/PAX</span></div>
						<?php } ?>
					</div>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-3"><b>Twin Room:</b></label>
				<div class="col-md-9">
					<div class="row">
						<?php for($i=1; $i<=4; $i++) { ?>
						<div class="col-md-2"> 
						<input name="product_inclusive_accomodation_twin[]" class="form-control" type="text"  data-popup="tooltip" title="Product Accomodation(It is required field)" data-placement="bottom">
						</div>
						<div class="col-md-1"> <span class="help-block" style="margin-top: 24px;">MYR/PAX</span></div>
						<?php } ?>
						
					</div>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-3"><b>3 Person Room:</b></label>
				<div class="col-md-9">
					<div class="row">
						<?php for($i=1; $i<=4; $i++) { ?>
						<div class="col-md-2"> 
						<input name="product_inclusive_accomodation_threeperson[]" class="form-control" type="text"  data-popup="tooltip" title="Product Accomodation(It is required field)" data-placement="bottom">
						</div>
						<div class="col-md-1"> <span class="help-block" style="margin-top: 24px;">MYR/PAX</span></div>
						<?php } ?>
					</div>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-3"><b>Quad Room:</b></label>
				<div class="col-md-9">
					<div class="row">
						<?php for($i=1; $i<=4; $i++) { ?>
						<div class="col-md-2"> 
						<input name="product_inclusive_accomodation_quad[]" class="form-control" type="text"  data-popup="tooltip" title="Product Accomodation(It is required field)" data-placement="bottom">
						</div>
						<div class="col-md-1"> <span class="help-block" style="margin-top: 24px;">MYR/PAX</span></div>
						<?php } ?>
					</div>
				</div>
			</div>
		 </div>
		 <script>
			function showTextBox100() {
					$(".dcinclusiveaccomodationBox1").show();
				}
				function showTextBox99() {
					$(".dcinclusiveaccomodationBox1").hide();
				}
		 </script>
		 <hr style="width:100%;">
					<?php 
					}
					?>
<!--****************************************************************************************************************************************************************************************************************************************************************************************************													END Product Inclusive Accommodation *****************************************************************************************************************************************************************************************************************************************************************************************************-->
					<?php
					$chkbox98 = $row->accomodation_extension;
					if(($chkbox98 == 'Yes')?'checked':'')
					{
					$a_e_s=$row->accomodation_extension_single;	
					 $arr_a_e_s=explode(",",$a_e_s);
					 $a_e_t=$row->accomodation_extension_twin;	
					 $arr_a_e_t=explode(",",$a_e_t);
					 $a_e_tp=$row->accomodation_extension_3person;	
					 $arr_a_e_tp=explode(",",$a_e_tp);
					 $a_e_q=$row->accomodation_extension_quad;	
					 $arr_a_e_q=explode(",",$a_e_q);
					?>
					<div class="form-group">
						<label class="control-label col-md-3"><b>Accommodation <br>Extension </b></label>
						 <div class="col-md-9">
						<label class="checkbox-inline">
						<input type="radio" class="styled property3" name="dcaccommodationextension" value="Yes" <?php echo ($chkbox98=='Yes')?'checked':'' ?>>YES</label>
						<label class="checkbox-inline"><input type="radio" class="styled property4" name="dcaccommodationextension" value="No" <?php echo ($chkbox98=='No')?'checked':'' ?> >NO</label>
						</div>
					 </div>
					<div class="form-group">
						<label class="control-label col-md-3">&nbsp;</label>
						<div class="col-md-9">
							<div class="row">
								<div class="col-md-3">Normal Rate</div>
								<div class="col-md-3">Weekend Rate</div>
								<div class="col-md-3">Peak Season Rate</div>
								<div class="col-md-3">Super Peak Season Rate</div>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3"><b>Single Room:</b></label>
						<div class="col-md-9">
							<div class="row">
								<?php foreach($arr_a_e_s as $row_a_e_s) { ?>
								<div class="col-md-2"> 
								<input name="accommodation_extension_single[]" class="form-control accommodation_extension_single_clear" type="text" value="<?php echo $row_a_e_s; ?>" id="input">
								</div>
								<div class="col-md-1"> <span class="help-block" style="margin-top: 24px;">MYR/NIGHT</span></div>
								<?php } ?>	
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3"><b>Twin Room:</b></label>
						<div class="col-md-9">
							<div class="row">
								<?php foreach($arr_a_e_t as $row_a_e_t) { ?>
								<div class="col-md-2"> 
								<input name="accommodation_extension_twin[]" class="form-control accommodation_extension_single_clear" type="text" value="<?php echo $row_a_e_t; ?>" id="input1">
								</div>
								<div class="col-md-1"> <span class="help-block" style="margin-top: 24px;">MYR/NIGHT</span></div>
								<?php } ?>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3"><b>3 Person Room:</b></label>
						<div class="col-md-9">
							<div class="row">
								<?php foreach($arr_a_e_tp as $row_a_e_tp) { ?>
								<div class="col-md-2"> 
								<input name="accommodation_extension_threeperson[]" class="form-control accommodation_extension_single_clear" type="text" value="<?php echo $row_a_e_tp; ?>" id="input1">
								</div>
								<div class="col-md-1"> <span class="help-block" style="margin-top: 24px;">MYR/NIGHT</span></div>
								<?php } ?>	
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3"><b>Quad Room:</b></label>
						<div class="col-md-9">
							<div class="row">
								<?php foreach($arr_a_e_q as $row_a_e_q) { ?>
								<div class="col-md-2"> 
								<input name="accommodation_extension_quad[]" class="form-control accommodation_extension_single_clear" type="text" value="<?php echo $row_a_e_q; ?>" id="input1">
								</div>
								<div class="col-md-1"> <span class="help-block" style="margin-top: 24px;">MYR/NIGHT</span></div>
								<?php } ?>	
							</div>
						</div>
					</div>
					<script>
						$('.property4').on('click', function() {
						  if ($(this).val() === '') 
						  {
							$('.accommodation_extension_single_clear').prop('disabled', false);
						  } 
						  else 
						  {
							$('.accommodation_extension_single_clear').prop("disabled", true).val('');
						  }
						});
						$('.property3').on('click', function() {
						  if ($(this).val() === '') 
						  {
							$('.accommodation_extension_single_clear').prop('disabled', false);
						  } 
						  else 
						  {
							$('.accommodation_extension_single_clear').prop("disabled", false).val('');
						  }
						});
					</script>
					<?php 
					}
					elseif(($chkbox98 == 'No')?'checked':'')
					{
					?>
					<div class="form-group">
						<label class="control-label col-md-3"><b>Accommodation <br>Extension </b></label>
						 <div class="col-md-9">
						<label class="checkbox-inline">
						<input type="radio" class="styled" name="dcaccommodationextension" value="Yes" <?php echo ($chkbox98=='Yes')?'checked':'' ?>onClick="showTextBox98()">YES</label>
						<label class="checkbox-inline"><input type="radio" class="styled" name="dcaccommodationextension" value="No" <?php echo ($chkbox98=='No')?'checked':'' ?> onClick="showTextBox97()">NO</label>
						</div>
					</div>
					<div class="dcaccommodationextension1" style="display:none;background:#eeeeee;padding:0% 1%;">
			 <div class="form-group">
				<label class="control-label col-md-3"><b>Single Room:</b></label>
				<div class="col-md-9">
					<div class="row">
						<?php for($i=1; $i<=4; $i++) { ?>
						<div class="col-md-2"> 
						<input name="accommodation_extension_single[]" class="form-control" type="text" data-popup="tooltip" title=" Accomodation(It is required field)" data-placement="bottom" id="input1">
						</div>
						<div class="col-md-1"> <span class="help-block" style="margin-top: 24px;">MYR/NIGHT</span></div>
						<?php } ?>
					</div>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-3"><b>Twin Room:</b></label>
				<div class="col-md-9">
					<div class="row">
						<?php for($i=1; $i<=4; $i++) { ?>
						<div class="col-md-2"> 
						<input name="accommodation_extension_twin[]" class="form-control" type="text"  data-popup="tooltip" title=" Accomodation(It is required field)" data-placement="bottom">
						</div>
						<div class="col-md-1"> <span class="help-block" style="margin-top: 24px;">MYR/NIGHT</span></div>
						<?php } ?>
						
					</div>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-3"><b>3 Person Room:</b></label>
				<div class="col-md-9">
					<div class="row">
						<?php for($i=1; $i<=4; $i++) { ?>
						<div class="col-md-2"> 
						<input name="accommodation_extension_threeperson[]" class="form-control" type="text"  data-popup="tooltip" title=" Accomodation(It is required field)" data-placement="bottom">
						</div>
						<div class="col-md-1"> <span class="help-block" style="margin-top: 24px;">MYR/NIGHT</span></div>
						<?php } ?>
					</div>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-3"><b>Quad Room:</b></label>
				<div class="col-md-9">
					<div class="row">
						<?php for($i=1; $i<=4; $i++) { ?>
						<div class="col-md-2"> 
						<input name="accommodation_extension_quad[]" class="form-control" type="text"  data-popup="tooltip" title=" Accomodation(It is required field)" data-placement="bottom">
						</div>
						<div class="col-md-1"> <span class="help-block" style="margin-top: 24px;">MYR/NIGHT</span></div>
						<?php } ?>
					</div>
				</div>
			</div>
		 </div>
		 <script>
			function showTextBox98() {
					$(".dcaccommodationextension1").show();
				}
				function showTextBox97() {
					$(".dcaccommodationextension1").hide();
				}
		 </script>
		 <hr style="width:100%;">
					<?php 
					}
					?>
					
					
					 <?php 
					$chkbox3 = $row->discount_bulk_purchase;
					if(($chkbox3=='Yes')?'checked':'')
					 {
					?>
					 <div class="form-group">
						<label class="control-label col-md-3"><b>Apply Discount for Bulk Purchase? </b></label>
						<div class="col-md-9">
						<label class="checkbox-inline">
						<input type="radio" class="styled" name="dcdiscountpurchase" value="Yes" 
						<?php echo ($chkbox3=='Yes')?'checked':'' ?>>YES</label>
						<label class="checkbox-inline">
						<input type="radio" class="styled" name="dcdiscountpurchase" value="No" 
						<?php echo ($chkbox3=='No')?'checked':'' ?>>NO</label>
						</div>
					 </div>
					 <div class="form-group">
						<label class="control-label col-md-3"><b>Discount Unit : </b></label>
						 <div class="col-md-9">
							<?php 
							$chkbox4 = $row->discount_unit;
							?>
							<label class="checkbox-inline">
							<input type="radio" class="styled" name="dcdiscountunit" value="%" <?php echo ($chkbox4=='%')?'checked':'' ?>>% OR </label>
							<label class="checkbox-inline">
							<input type="radio" class="styled" name="dcdiscountunit" value="$" <?php echo ($chkbox4=='$')?'checked':'' ?>> $ </label>
						</div>
					 </div>
					 <div class="form-group">
						<label class="control-label col-md-3"><b>Range</b></label>
						<div class="col-md-9">
							<?php 
								$strrange1=$row->range_start;
								 $endrange1=$row->range_end;
								 $disrate1=$row->discount_rate;
								 $arr_strrange1=explode(",",$strrange1);	
								 $arr_endrange1=explode(",",$endrange1);	
								 $arr_disrate1=explode(",",$disrate1);
							echo '<div class="col-md-4">';	 
							foreach($arr_strrange1 as $vallllue1)
							{
							?>
							<input name="startrange[]" class="form-control" type="text" value="<?php echo $vallllue1; ?>" style="width:150px;">
							<?php 
							}
							echo '</div>
							<div class="col-md-4">';
							foreach($arr_endrange1 as $vallllue2)
							{
							?>
							<input name="endrange[]" type="text" class="form-control" value="<?php echo $vallllue2; ?>" style="width:150px;">
							<?php 
							}
							echo '</div>
							<div class="col-md-4">';
							foreach($arr_disrate1 as $vallllue3)
							{
							?>
							<input name="field_name[]"  type="text" class="form-control" value="<?php echo $vallllue3; ?>" style="width:150px;">						
							<?php
							}
							echo '</div>';
							?>
							<div class="row" style="margin:1px 0px;">&nbsp;</div>
						</div>
					 </div>
					<?php 
					 }
					 elseif(($chkbox3=='No')?'checked':'')
					 {
					?>
					<div class="form-group">
						<label class="control-label col-md-3"><b>Apply Discount for <br>Bulk Purchase? </b></label>
						 <div class="col-md-9">
						<label class="checkbox-inline">
						<input type="radio" class="styled" name="dcdiscountpurchase" value="Yes" onClick="showTextBox2()" <?php echo ($chkbox3=='Yes')?'checked':'' ?>>YES</label>
						<label class="checkbox-inline"><input type="radio" class="styled" name="dcdiscountpurchase" value="No" onClick="showTextBox3()" <?php echo ($chkbox3=='No')?'checked':'' ?>>NO</label>
						</div>
					 </div>
					 <div class="textBox1" style="display:none;background:#eeeeee;padding:1%;">
						<div class="form-group">
							<label class="control-label col-md-3"><b>Discount Unit : </b></label>
							 <div class="col-md-9">
								<label class="checkbox-inline">
								<input type="radio" class="styled" name="dcdiscountunit" value="%">% OR </label>
								<label class="checkbox-inline"><input type="radio" class="styled" name="dcdiscountunit" value="$"> $ </label>
							</div>
						 </div>
						 <div class="form-group">
							<label class="control-label col-md-3"><b>Range</b></label>
							<div class="col-md-9">
								<div class="field_wrapper">
									<div style="border:1px solid gray;padding:10px;">
										<input type="text" name="startrange[]"/> TO <input type="text" name="endrange[]"/>
										DISCOUNT RATE : <input type="text" name="field_name[]" value="" style="width:100px;"/>
										<a href="javascript:void(0);" class="add_button" title="Add field">
										<img src="<?php echo base_url(); ?>/upload/images/plus.png" style="width:25px; height:25px;"/></a>
										<button type="submit" value="" style="background:#62bd18;border:1px solid #62bd18;color:#fff;">Show new price</button>
									</div>
								</div><br>
							</div>
						 </div>
					 </div>
					<script type="text/javascript">
					
							function showTextBox2() {
								$(".textBox1").show();
							}
							function showTextBox3() {
								$(".textBox1").hide();
							}
						
					$(document).ready(function(){
						var maxField = 10; //Input fields increment limitation
						var addButton = $('.add_button'); //Add button selector
						var wrapper = $('.field_wrapper'); //Input field wrapper
						var fieldHTML = '<div style="border:1px solid gray;padding:10px;"><input type="text" name="startrange[]"> TO <input type="text" name="endrange[]"> DISCOUNT RATE : <input type="text" name="field_name[]" value="" style="width:100px;"/><a href="javascript:void(0);" class="remove_button" title="Remove field"><img src="<?php echo base_url(); ?>/upload/images/minus.png" style="width:25px; height:25px;"/></a><button type="submit" value="" style="background:#62bd18;border:1px solid #62bd18;color:#fff;">Show new price</button></div>'; //New input field html 
						var x = 1; //Initial field counter is 1
						$(addButton).click(function(){ //Once add button is clicked
							if(x < maxField){ //Check maximum number of input fields
								x++; //Increment field counter
								$(wrapper).append(fieldHTML); // Add field html
							}
						});
						$(wrapper).on('click', '.remove_button', function(e){ //Once remove button is clicked
							e.preventDefault();
							$(this).parent('div').remove(); //Remove field html
							x--; //Decrement field counter
						});
					});
					</script>
					 <hr style="width:100%;">
<!--****************************************************************************************************************************************************************************************************************************************************************************************************													END APPLY DISCOUNT FOR BULK PURCHASE *****************************************************************************************************************************************************************************************************************************************************************************************************-->
					<?php 
					 }
					$chkbox5 = $row->apply_promo;
					
					?>
					<div class="form-group">
						<label class="control-label col-md-3"><b>Apply Promo? </b></label>
						<div class="col-md-9">
							<label class="checkbox-inline">
							<input type="radio" class="styled property6" name="dcapplypromo" id="chkapplypromoyes1" value="Yes" <?php echo ($chkbox5=='Yes')?'checked':'' ?>>YES</label>
							<label class="checkbox-inline">
							<input type="radio" class="styled property5" name="dcapplypromo" id="chkapplypromono" value="No" <?php echo ($chkbox5=='No')?'checked':'' ?>>NO</label>
						</div>
					 </div>
					 
					 
					 <div class="property5" style="display:none;">
						<div class="form-group">
							<label class="control-label col-md-3"><b>Start Date : </b></label>
							<div class="col-md-3">
								
								<span class="form-control" id="fromDisplay1" name="from">dd/mm/yyyy</span>
								<input type="hidden" name="applypromo_startdate" value="" id="fromInput1" class="form-control">
								<div class="vf-datepicker" id="startDP1"></div>
													
								<!--input type="date" name="applypromo_startdate" data-popup="tooltip" title="Start Date(It is required field)" data-placement="bottom"-->
							</div>
							<label class="control-label col-md-3"><b>End Date : </b></label>
							<div class="col-md-3">
								<span class="form-control" id="toDisplay1">dd/mm/yyyy</span>
								<input type="hidden" name="applypromo_enddate" value="" id="toInput1" class="form-control">
								<div class="vf-datepicker" id="endDP1"></div>
								
								<!--input type="date" name="applypromo_enddate" data-popup="tooltip" title="End Date(It is required field)" data-placement="bottom"-->
							</div>
							<script>
						var _unavailable = [];
						 var _onrequest = [];
						var dp = new VF_datepicker();
						dp.datepicker({
							'name': 'form1',
							'start': null,
							'end': null,
							'monthNames': ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
							'dayNames': ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
							'startCtrl': $('#fromDisplay1'),
							'endCtrl': $('#toDisplay1'),
							'startDisplay': $('#fromDisplay1'),
							'endDisplay': $('#toDisplay1'),
							'startInput': $('#fromInput1'),
							'endInput': $('#toInput1'),
							'startDP': $('#startDP1'),
							'endDP': $('#endDP1'),
							'clearTxt': 'Clear dates',
							'unavailable': _unavailable,
							'onrequest': _onrequest,

							'positions': ['left', 'right']
						});
					
						</script>
						 </div>
						 <div class="form-group">
							<label class="control-label col-md-3"><b>Discount Unit : </b></label>
							 <div class="col-md-9">
								<label class="checkbox-inline">
								<input type="radio" class="styled" name="apdiscountunit" value="%">% OR </label>
								<label class="checkbox-inline"><input type="radio" class="styled" name="apdiscountunit" value="$"> $ </label>
							</div>
						 </div>
						 <div class="form-group">
							<label class="control-label col-md-3"><b>Discount Rate : </b></label>
							<div class="col-md-9">
							   <input name="apdiscountrate" class="form-control" type="text">
							   <span class="help-block"></span>
							</div>
						 </div>
						 <div class="form-group">
							<label class="control-label col-md-3"><b>Product Price After Promo Discount :</b></label>
							<div class="col-md-9">
								 <button type="submit" value="" style="font-size: 14px;background:#62bd18;border:1px solid #62bd18;color:#fff;">show new price</button>
							</div>
						 </div>
					 </div>
					 <div class="property6">
					 <div class="form-group">
						<?php 
							
							$start_dd = $row->start_date;
							$start_dd_range =date("d/m/Y", strtotime($start_dd));
							$end_dd = $row->end_date;
							$end_dd_range =date("d/m/Y", strtotime($end_dd));
						?>
						<label class="control-label col-md-3"><b> Start Date : </b></label>
						<div class="col-md-3">
							<span class="form-control apply_promo_clear" id="fromDisplay" name="from"><?php echo $start_dd_range; ?></span>
							<input type="hidden" name="applypromo_startdate" value="" id="fromInput" class="form-control apply_promo_clear">
							<div class="vf-datepicker" id="startDP"></div>
						</div>
						<label class="control-label col-md-3"><b>End Date : </b></label>
						<div class="col-md-3">
							<span class="form-control apply_promo_clear" id="toDisplay"><?php echo $end_dd_range; ?></span>
							<input type="hidden" name="applypromo_enddate" value="" id="toInput" class="form-control apply_promo_clear">
							<div class="vf-datepicker" id="endDP"></div>
						</div>
						<script>
						var _unavailable = [];
						 var _onrequest = [];
						var dp = new VF_datepicker();
						dp.datepicker({
							'name': 'form1',
							'start': null,
							'end': null,
							'monthNames': ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
							'dayNames': ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
							'startCtrl': $('#fromDisplay'),
							'endCtrl': $('#toDisplay'),
							'startDisplay': $('#fromDisplay'),
							'endDisplay': $('#toDisplay'),
							'startInput': $('#fromInput'),
							'endInput': $('#toInput'),
							'startDP': $('#startDP'),
							'endDP': $('#endDP'),
							'clearTxt': 'Clear dates',
							'unavailable': _unavailable,
							'onrequest': _onrequest,
							'displayFrom': function(from, to){
								console.log(['from display', from, to]);
							},
							'displayTo': function(from, to){
								console.log(['to display', from, to]);
							},
							'fromChosen': function(from, to){
								console.log(['from chosen', from, to]);
							},
							'toChosen': function(from, to){
								console.log(['to chosen', from, to]);
							},
							'hideFrom': function(from, to){
								console.log(['from hide', from, to]);
							},
							'hideTo': function(from, to){
								console.log(['to hide', from, to]);
							},
							'positions': ['left', 'right']
						});
						
						</script>
					 </div>
					 
					 <div class="form-group">
						<label class="control-label col-md-3"><b>Discount Unit : </b></label>
						 <div class="col-md-9">
							<?php 
							$chkbox6 = $row->ap_discount_unit;
							?>
							<label class="checkbox-inline">
							<input type="radio" class="styled apply_promo_clear" name="apdiscountunit" value="%" <?php echo ($chkbox6=='%')?'checked':'' ?>>% OR </label>
							<label class="checkbox-inline"><input type="radio" class="styled apply_promo_clear" name="apdiscountunit" value="$" <?php echo ($chkbox6=='$')?'checked':'' ?> > $ </label>
						</div>
					 </div>
					 <div class="form-group">
                        <label class="control-label col-md-3"><b>Discount Rate : </b></label>
                        <div class="col-md-9">
                           <input name="apdiscountrate" class="apply_promo_clear form-control" type="text" value="<?php echo $row->ap_discount_rate; ?>">
                           <span class="help-block"></span>
                        </div>
                     </div>
					 <div class="form-group">
						<label class="control-label col-md-3"><b>Product Price After Promo Discount :</b></label>
						<div class="col-md-9">
							 <button type="submit" value="" style="font-size: 14px;background:#62bd18;border:1px solid #62bd18;color:#fff;">show new price</button>
						</div>
					 </div>
					 </div>

					 <script>
						$('.property5').on('click', function() {
							//$(".apply_promo_clear").empty();
							
						  $(".property5").hide();
						   $(".property6").hide();
						});
						$('.property6').on('click', function() {
						  $(".property6").show();
						  $(".property5").hide();
						});
					</script>
					
					 <hr style="width:100%;">
					 
					<div class="form-group">
						<label class="control-label col-md-3"><b>Apply Promo for <br>Bulk Discount? </b></label>
						<div class="col-md-9">
							<label class="checkbox-inline">
							<input type="radio" name="apbulkdiscount" class="styled" onClick="showTextBox96()">YES</label>
							<label class="checkbox-inline"><input type="radio" class="styled" name="apbulkdiscount" onClick="showTextBox95()" value="No" checked>NO</label>
						</div>
					 </div>
					 <div class="apbulkdiscount" style="display:none;background:#eeeeee;padding:1%;">
						<div class="form-group">
							<label class="control-label col-md-3">&nbsp;</label>
							<div class="col-md-9" >
								<div class="table-responsive" style="border:1px solid #ccc;">
									<table class="table">
										<tr>
										<td>Range</td>
										<td><input type="text" value="3" disabled></td>
										<td>To</td>
										<td><input type="text" value="4" disabled></td>
										<td><button type="submit" value="" style="background:#62bd18;border:1px solid #62bd18;color:#fff;">Show new price</button></td>
										</tr>
										<tr>
										<td>Range</td>
										<td><input type="text" value="5" disabled></td>
										<td>To</td>
										<td><input type="text" value="6" disabled></td>
										<td><button type="submit" value="" style="background:#62bd18;border:1px solid #62bd18;color:#fff;">Show new price</button></td>
										</tr>
										<tr>
										<td>Range</td>
										<td><input type="text" value="7" disabled></td>
										<td>To</td>
										<td><input type="text" value="8" disabled></td>
										<td><button type="submit" value="" style="background:#62bd18;border:1px solid #62bd18;color:#fff;">Show new price</button></td>
										</tr>
									</table>
								</div>
							</div>
						 </div>
					 </div>
					 <script>
						function showTextBox96() {
								$(".apbulkdiscount").show();
							}
							function showTextBox95() {
								$(".apbulkdiscount").hide();
							}
					 </script>
					  <hr style="width:100%;">
<!--****************************************************************************************************************************************************************************************************************************************************************************************************																END APPLY PROMO *****************************************************************************************************************************************************************************************************************************************************************************************************-->					<?php 
					
					$chkbox12 = $row->optional_services;
					//if(($chkbox12=='Yes')?'checked':'')
					 //{
					?>	
					 <div class="form-group">
						<label class="control-label col-md-3"><b>Optional Services : </b></label>
						<div class="col-md-9">
							<label class="checkbox-inline">
							<input type="radio" class="styled opt_edit_show" name="optionalservices1" value="Yes" <?php echo ($chkbox12=='Yes')?'checked':'' ?>>YES</label>
							<label class="checkbox-inline"><input type="radio" class="styled opt_edit_hide" name="optionalservices1" value="No" <?php echo ($chkbox12=='No')?'checked':'' ?>>NO</label>
						</div>					
					 </div>
					 
					 <div class="opt_edit_show">
					 <div class="form-group" >
						<div class="row">
						<label class="control-label col-md-3"></label>
						<div class="col-md-9">
						<?php 
							$chkbox33=$row->optional_services_service;
							$arr33=explode(",",$chkbox33);
							$chkbox66=$row->optional_services_price;
							$arr66=explode(",",$chkbox66);
							$chkbox99=$row->optional_service_qty_required;
							$arr99=explode(",",$chkbox99);
						?>
						<div class="field_wrapper2">
							<div style="border:1px solid gray;padding:10px;">
								<div class="row">
								<div class="col-md-3">Services</div>
								<div class="col-md-9">
								<?php foreach($arr33 as $val33)
								{
									echo '<div class="col-md-2"><input type="text" name="services[]" class="form-control" value="'.$val33.'"/></div>';
								} 
								?>
								</div>
								</div><div class="row">
								<div class="col-md-3">Price of Service</div>
								<div class="col-md-9">
								<?php foreach($arr66 as $val66)
								{
									echo '<div class="col-md-2"><input type="text" name="price_of_service[]" class="form-control" value="'.$val66.'"/></div>';
								} 
								?>
								</div>
								</div><div class="row">
								<div class="col-md-3">Quantity Require?</div>
								<div class="col-md-9">
								<?php
								foreach($arr99 as $val99)
								{
								echo'<div class="col-md-2">
								<select name="quantity_require[]" class="form-control">
									<option value='.$val99.'>'.$val99.'</option>
									<option value="0">- Select Quantity Require -</option>
									<option value="N">N</option>
									<option value="Y">Y</option>
								</select></div>';
								}
								?>
								</div>
								</div>
								
							</div>
						</div>
						
						</div>
						</div>
					 </div>
					 </div>
					 
					 <div class="opt_edit_hide" style="display:none;">
						<div class="row">
							<div class="col-md-3">Services</div>
							<div class="col-md-3">Price of Service</div>
							<div class="col-md-3">Quantity Require?</div>
							<div class="col-md-3">&nbsp;</div>
						</div>
						<div class="field_wrapper2">
							<div style="border:1px solid gray;padding:10px;">
								<input type="text" name="services[]" style="width:200px"/> Price : <input type="text" name="price_of_service[]" style="width:170px"/>
								<select name="quantity_require[]" style="width:200px"><option value="N">N</option><option value="Y">Y</option></select>
								<a href="javascript:void(0);" class="add_button2" title="Add field">
								<img src="<?php echo base_url(); ?>/upload/images/plus.png" style="width:25px; height:25px;"/>
								</a>
							</div>
						</div>
					 </div>
					 <script>
						$('.opt_edit_show').on('click', function() {
						  $(".opt_edit_show").show();
						   $(".opt_edit_hide").hide();
						});
						$('.opt_edit_hide').on('click', function() {
						  $(".opt_edit_hide").hide();
						  $(".opt_edit_show").hide();
						});
						
						$(document).ready(function(){
						var maxField = 10; //Input fields increment limitation
						var addButton = $('.add_button2'); //Add button selector
						var wrapper = $('.field_wrapper2'); //Input field wrapper
						var fieldHTML = '<div style="border:1px solid gray;padding:10px;"><input type="text" name="services[]" style="width:200px"/> Price : <input type="text" name="price_of_service[]" style="width:170px"/><select name="quantity_require[]" style="width:200px"><option value="N">N</option><option value="Y">Y</option></select><a href="javascript:void(0);" class="remove_button2" title="Remove field"><img src="<?php echo base_url(); ?>/upload/images/minus.png" style="width:25px; height:25px;"/></a></div>'; //New input field html 
						var x = 1; //Initial field counter is 1
						$(addButton).click(function(){ //Once add button is clicked
							if(x < maxField){ //Check maximum number of input fields
								x++; //Increment field counter
								$(wrapper).append(fieldHTML); // Add field html
							}
						});
						$(wrapper).on('click', '.remove_button2', function(e){ //Once remove button is clicked
							e.preventDefault();
							$(this).parent('div').remove(); //Remove field html
							x--; //Decrement field counter
						});
					});
					</script>
					
<!--****************************************************************************************************************************************************************************************************************************************************************************************************																END OPTIONAL SERVICES *****************************************************************************************************************************************************************************************************************************************************************************************************-->
				</fieldset>
				<fieldset title="3">
				<legend class="text-semibold">Other Details</legend>
					
					<div class="form-group">
						<label class="control-label col-md-12" style="color: #ff5722;"><b>ACCOMMODATION DETAILS</b></label>
					 </div>
					<div class="form-group">
                        <label class="control-label col-md-3"><b>Accommodation Name : </b></label>
                        <div class="col-md-9">
                           <input name="accomodation_name" class="form-control" type="text" value="<?php echo $row->accomodation_name; ?>">
                           <span class="help-block"></span>
                        </div>
                     </div>
					 <div class="form-group">
                        <label class="control-label col-md-3"><b>Accomodates : </b></label>
                        <div class="col-md-9">
                           <div class="row">
								<div class="col-md-12">
									<div class="col-md-3"><span class="help-block">1 Peson/ Room</span></div>
									<div class="col-md-3"><span class="help-block">2 Person/ Room</span></div>
									<div class="col-md-3"><span class="help-block">3 Person/ Room</span></div>
									<div class="col-md-3"><span class="help-block">4 Person/ Room</span></div>
								</div>
							</div>
                        </div>
                     </div>
					 <div class="form-group">
                        <label class="control-label col-md-3"><b>Bed Type : </b></label>
                        <div class="col-md-9">
                           <div class="row">
								<div class="col-md-12">
									<div class="col-md-3"><input name="1person_bed_type" class="form-control" type="text" value="<?php echo $row->oneperson_bed_type; ?>"></div>
									<div class="col-md-3"><input name="2person_bed_type" class="form-control" type="text" value="<?php echo $row->twoperson_bed_type; ?>"></div>
									<div class="col-md-3"><input name="3person_bed_type" class="form-control" type="text" value="<?php echo $row->threeperson_bed_type; ?>"></div>
									<div class="col-md-3"><input name="4person_bed_type" class="form-control" type="text" value="<?php echo $row->fourperson_bed_type; ?>"></div>
								</div>
							</div>
                        </div>
                     </div>
					 <div class="form-group">
						<div class="row">
							<div class="col-md-6">
								<label class="control-label col-md-6"><b>Check In </b></label>
								<div class="col-md-6">
									<input name="checkintime" class="form-control" id="timepicker1" type="text" value="<?php echo $row->checkintime; ?>">
								</div>
							</div>
							<div class="col-md-6">
								<label class="control-label col-md-5"><b>Check Out </b></label>
								<div class="col-md-7">
									<input name="checkouttime" class="form-control" id="timepicker2" type="text" value="<?php echo $row->checkouttime; ?>">
								</div>
							</div>
						</div>	
						<script>
							$('#timepicker1').timepicki();
							$('#timepicker2').timepicki();
						</script>
					 </div>
					 <div class="form-group">
                        <label class="control-label col-md-3"><b>Accommodation Type</b></label>
                        <div class="col-md-9">
						
							<div class="row">
							<?php 
								$chkbox2 = $row->actype;
								if($chkbox2 =='Capsule' || $chkbox2 =='Chalet' || $chkbox2 =='Hotel')
								{
							?>
							<label class="checkbox-inline"><input type="radio" class="styled" name="actype" value="Capsule" <?php echo ($chkbox2=='Capsule')?'checked':'' ?>>Capsule</label>
							<label class="checkbox-inline"><input type="radio" class="styled" name="actype" value="Chalet" <?php echo ($chkbox2=='Chalet')?'checked':'' ?>>Chalet</label>
							<label class="checkbox-inline"><input type="radio" class="styled" name="actype" value="Hotel" <?php echo ($chkbox2=='Hotel')?'checked':'' ?>>Hotel</label>
							<?php 
								}
								else
								{
							?>
							<label class="checkbox-inline">
							<input type="radio" class="styled" name="actype" value="<?php echo $chkbox2; ?>" 
							<?php echo ($chkbox2==$chkbox2)?'checked':'' ?> ><?php echo $chkbox2; ?></label>
							
							<label class="checkbox-inline">
							<input type="radio" class="styled" name="actype" value="Capsule">Capsule</label>
							<label class="checkbox-inline">
							<input type="radio" class="styled" name="actype" value="Chalet">Chalet</label>
							<label class="checkbox-inline">
							<input type="radio" class="styled" name="actype" value="Hotel">Hotel</label>					
							
							<?php 
								}
							?>
							</div>
                        </div>
                     </div>
					 <div class="form-group">
                        <label class="control-label col-md-3"><b>Amenities</b></label>
                        <div class="col-md-9">
							
							<?php 
								$chkbox0051 = $row->amenities;
								$chkbox005=explode(",",$chkbox0051);

							?>
							<div class="row">
							<label class="checkbox-inline"><input type="checkbox" class="styled" name="amenities[]" value="Wi-fi" 
							<?php if(in_array("Wi-fi",$chkbox005)){echo "checked";}?>>Wi-fi</label>
							<label class="checkbox-inline"><input type="checkbox" class="styled" name="amenities[]" value="Television" 
							<?php if(in_array("Television",$chkbox005)){echo "checked";}?>>Television</label>
							<label class="checkbox-inline"><input type="checkbox" class="styled" name="amenities[]" value="Refrigerator" 
							<?php if(in_array("Refrigerator",$chkbox005)){echo "checked";}?>>Refrigerator</label>
							<label class="checkbox-inline"><input type="checkbox" class="styled" name="amenities[]" value="Toiletries" 
							<?php if(in_array("Toiletries",$chkbox005)){echo "checked";}?>>Toiletries</label>
							<label class="checkbox-inline"><input type="checkbox" class="styled" name="amenities[]" value="Fan" 
							<?php if(in_array("Fan",$chkbox005)){echo "checked";}?>>Fan</label>
							</div>
							<div class="row">
							<label class="checkbox-inline"><input type="checkbox" class="styled" name="amenities[]" value="Air-Cond" 
							<?php if(in_array("Air-Cond",$chkbox005)){echo "checked";}?>>Air-Cond</label>
							<label class="checkbox-inline"><input type="checkbox" class="styled" name="amenities[]" value="Locker" 
							<?php if(in_array("Locker",$chkbox005)){echo "checked";}?>>Locker</label>
							</div>

                        </div>
                     </div>
					 
					 <hr style="width:100%;">
					<div class="form-group">
						<label class="control-label col-md-12" style="color: #ff5722;"><b>OTHER INFORMATION TO DISPLAY: </b></label>
					 </div>
					 
					 <div class="form-group">
                        <label class="control-label col-md-3"><b>Diver Certification</b></label>
                        <div class="col-md-9">
						<?php 
						 $chkbox8=$row->diver_certification;
						 $arr1=explode(",",$chkbox8);						 
						 ?>
							<div class="row">
		<label class="checkbox-inline"><input type="checkbox" class="styled" name="divercertification[]" value="Non-Diver" 
		<?php if(in_array("Non-Diver",$arr1)){echo "checked";}?>>NON-DIVER</label>
		<label class="checkbox-inline"><input type="checkbox" class="styled" name="divercertification[]" value="Owd" 
		<?php if(in_array("Owd",$arr1)){echo "checked";}?>>OWD</label>
		<label class="checkbox-inline"><input type="checkbox" class="styled" name="divercertification[]" value="Aow" 
		<?php if(in_array("Aow",$arr1)){echo "checked";}?>>AOW</label>
							</div>
                        </div>
                     </div>
					 <div class="form-group">
                        <label class="control-label col-md-3"><b>Diver Experience</b></label>
                        <div class="col-md-9">
						<?php 
						 $chkbox9=$row->diver_experience;
						 $arr2=explode(",",$chkbox9);						 
						 ?>
							<div class="row">
		<label class="checkbox-inline"><input type="checkbox" class="styled" name="diverexperience[]" value="Novice" 
		<?php if(in_array("Novice",$arr2)){echo "checked";}?>>NOVICE</label>
		<label class="checkbox-inline"><input type="checkbox" class="styled" name="diverexperience[]" value="Advanced" 
		<?php if(in_array("Advanced",$arr2)){echo "checked";}?>>ADVANCED</label>
		<label class="checkbox-inline"><input type="checkbox" class="styled" name="diverexperience[]" value="Experienced" 
		<?php if(in_array("Experienced",$arr2)){echo "checked";}?>>EXPERIENCED</label>
		<label class="checkbox-inline"><input type="checkbox" class="styled" name="diverexperience[]" value="Non-Diver" 
		<?php if(in_array("Non-Diver",$arr2)){echo "checked";}?>>NON-DIVER</label>
							</div>
                        </div>
                     </div>
					 <div class="form-group">
                        <label class="control-label col-md-3"><b>Diver Specialties</b></label>
                        <div class="col-md-9">
						<?php 
						 $chkbox10=$row->diver_specialties;
						 $arr3=explode(",",$chkbox10);						 
						 ?>
							<div class="row">
		<label class="checkbox-inline"><input type="checkbox" class="styled" name="diverspecialties[]" value="Altitude Diver" 
		<?php if(in_array("Altitude Diver",$arr3)){echo "checked";}?>>ALTITUDE DIVER</label>
		<label class="checkbox-inline"><input type="checkbox" class="styled" name="diverspecialties[]" value="Cavern Diver" 
		<?php if(in_array("Cavern Diver",$arr3)){echo "checked";}?>>CAVERN DIVER</label>
		<label class="checkbox-inline"><input type="checkbox" class="styled" name="diverspecialties[]" value="Deep Diver" 
		<?php if(in_array("Deep Diver",$arr3)){echo "checked";}?>>DEEP DIVER</label>
		<label class="checkbox-inline"><input type="checkbox" class="styled" name="diverspecialties[]" value="Wreck Diver" 
		<?php if(in_array("Wreck Diver",$arr3)){echo "checked";}?>>WRECK DIVER</label>
							</div>
                        </div>
                     </div>
				</fieldset>
                  <input type="submit" name="update_SAcourses_data" value="Update" class="btn btn-success stepy-finish">

               </form>				
				
               <?php } ?>
               <br><br>
            </div>
			 <div class="col-md-1"></div>
			</div>
         </div>
      </div>
      <!-- /traffic sources -->
   </div>
</div>
<!-- /dashboard content -->
   