<div class="content-wrapper">
<!-- Content area -->
<div class="content">
<div class="breadcrumb-line breadcrumb-line-component">
   <a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a>
   <ul class="breadcrumb">
      <li><a href=""><i class="icon-home2 position-left"></i> Home</a></li>
      <li><a href="">Dashboard</a></li>
      <li class="active">Cancellation Policies</li>
   </ul>
</div>
<br>
 <script type="text/javascript">
						$(function () {
							$("input[name='cancellation_policy_type']").click(function () {
								if ($("#chkapplypromoyes").is(":checked")) {
									$("#dvapplypromo").show();
								} else {
									$("#dvapplypromo").hide();
								}
							});
						});
						
						$(document).ready(function(){
						var maxField = 10; //Input fields increment limitation
						var addButton = $('.add_button'); //Add button selector
						var wrapper = $('.field_wrapper'); //Input field wrapper
						var fieldHTML = '<div><div class="col-md-12" style="background:whitesmoke;border:1px solid gray;padding:5px;margin:10px 0px;"><div class="row"><div class="col-md-3"><input type="text" name="cancellation_amount[]" class="form-control" data-popup="tooltip" title="Cancellation Amount(It is required field)" data-placement="bottom"></div><div class="col-md-1"><label class="control-label col-md-12">of</label></div><div class="col-md-5"><select name="cancellation_total_product[]" class="form-control" data-popup="tooltip" title="Cancellation Product Type(It is required field)" data-placement="bottom"><option value="">% of Product Total</option><option value="jjj">jjj</option></select></div><div class="col-md-3"><label class="control-label col-md-12">Will Be Charged</label></div></div><div class="row">&nbsp;</div><div class="row">&nbsp;</div><div class="row"><div class="col-md-3"><input type="text" name="cancellation_days[]" class="form-control" data-popup="tooltip" title="Cancellation Days(It is required field)" data-placement="bottom"></div><div class="col-md-1"><label class="control-label col-md-12">Days</label></div><div class="col-md-5"><select name="cancellation_period[]" class="form-control" data-popup="tooltip" title="Cancellation Period(It is required field)" data-placement="bottom"><option>After Booking Date</option><option value="jjj">jjj</option></select></div><div class="col-md-3">&nbsp;</div></div><a href="javascript:void(0);" class="remove_button btn btn-default" title="Remove field"><img src="<?php echo base_url(); ?>/upload/images/minus.png" style="width:25px; height:25px;"/>Click Here Remove</a></div></div>'; //New input field html 
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
					</script>
<!-- Main charts -->
<div class="row">
   <div class="col-lg-12">
      <!-- Traffic sources -->
      <div class="panel panel-flat">
         <div class="panel-heading">
            <h2 class="panel-title">Cancellation Policies</h2>
            <div style="text-align:right;">
               <a class="btn bg-violet" href="<?php echo  base_url();?>DCpolicies/addCancellation"><i class="glyphicon glyphicon-plus"></i> Add </a>
               <a href="<?php echo  base_url();?>DCpolicies/DCcancelpolicieslist" class="btn bg-pink"><i class="glyphicon glyphicon-refresh"></i> List</a>
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
				<form name="add" method="POST" action="<?php echo  base_url();?>DCpolicies/editCancellation/<?php echo $row->id; ?>" class="form-horizontal" 
			   enctype="multipart/form-data">
                  <div class="form-body">
					<div class="form-group">
                        <label class="control-label col-md-3"><b>Cancellation Policy Name</b> <strong style="color:red;">*</strong></label>
                        <div class="col-md-9">
                           <input name="name" class="form-control" type="text" value="<?php echo $row->cancellation_name; ?>">
                           <span class="help-block"></span>
                        </div>
                     </div>
					  <?php 
					 //echo $abcd;
					 $chkbox5 = $row->cancellation_policy_type;
					 if(($chkbox5=='Cancellation with Penalty')?'checked':'')
					 {
					 ?>
					 <div class="form-group">
						<label class="control-label col-md-3"><b>Cancellation Policy Type</b></label>
						<div class="col-md-9">
							<!--label class="checkbox-inline">
							<input type="radio" class="styled" name="booking_deposit" id="chkapplypromono" value="Full Prepayment" <?php echo ($chkbox5=='Cancellation with Penalty')?'checked':'' ?>>Full Prepayment</label-->
							<label class="checkbox-inline"><input type="radio" class="styled" name="cancellation_policy_type" id="chkapplypromoyes" value="Cancellation with Penalty" <?php echo ($chkbox5=='Cancellation with Penalty')?'checked':'' ?>>Cancellation with Penalty</label>
						</div>
					 </div>

					 <div class="form-group">

						<div class="col-md-12" style="background:whitesmoke;">
							<div class="row">
								<?php 
								 $chk003=$row->cancellation_amount;
								 $arr003=explode(",",$chk003);
								 $chk004=$row->cancellation_total_product;
								 $arr004=explode(",",$chk004);
								 $chk005=$row->cancellation_days;
								 $arr005=explode(",",$chk005);
								 $chk006=$row->cancellation_period;
								 $arr006=explode(",",$chk006);
								 $i=0;
								foreach($arr003 as $val003)
								{
								?>
								<div class="col-md-12">
									<div class="col-md-3">								
										<input type="text" name="cancellation_amount[]" class="form-control" value="<?php echo $arr003[$i]; ?>">
									</div>
									<div class="col-md-1">
										<label class="control-label col-md-12"> of </label>
									</div>
					
									<div class="col-md-5">
										<select name="cancellation_total_product[]" class="form-control">
											<option value="<?php echo $arr004[$i]; ?>"><?php echo $arr004[$i]; ?></option>
											<option value="% of Deposit">% of Deposit</option>
										<option value="Amount">Amount</option>
										</select>
									</div>
									<div class="col-md-3">
										<select name="" class="form-control" data-popup="tooltip" title="Cancellation Product Type(It is required field)" data-placement="bottom">
										<option value="Will be charged">Will be charged</option>
										<option value="will be refunded">will be refunded</option>
									</select>
									</div>
								</div>
								<div class="row">&nbsp;</div>
								<div class="row">&nbsp;</div>
								<div class="col-md-12">
									<div class="col-md-3">
										<input type="text" name="booking_days[]" class="form-control" value="<?php echo $arr005[$i]; ?>">
									</div>
									<div class="col-md-1">
										<label class="control-label col-md-12">Days</label>
									</div>
									<div class="col-md-5">
										<select name="booking_period[]" class="form-control">
											<option value="<?php echo $arr006[$i]; ?>"><?php echo $arr006[$i]; ?></option>
											<option value="If Cancelled Before Arrival Date">If Cancelled Before Arrival Date</option>
										</select>
									</div>
									<div class="col-md-3">
									
									</div>
								</div>
								<div class="row">&nbsp;</div>
								<div class="row">&nbsp;</div>
								<div class="row"><hr></div>
								<?php 
								$i++;
								}
					
								?>
							</div>
							<div class="row">&nbsp;</div>
							<div class="row text-right">
								<a href="javascript:void(0);" class="add_button btn btn-default" title="Add field">
								<img src="<?php echo base_url(); ?>/upload/images/plus.png" style="width:25px; height:25px;"/> Click Here Addmore</a>
							</div>
						<div class="field_wrapper">
								<div>
						</div>

					 </div>
					<?php 
					 }
					 elseif(($chkbox5=='Cancellation is Free')?'checked':'')
					 {
					?> 
					<div class="form-group">
						<label class="control-label col-md-3"><b> Cancellation Policy Type </b></label>
						<div class="col-md-9">
							<label class="checkbox-inline">
							<input type="radio" class="styled" name="cancellation_policy_type" id="chkapplypromoyes" value="Cancellation with Penalty">Cancellation with Penalty</label>
							<label class="checkbox-inline"><input type="radio" class="styled" name="cancellation_policy_type" id="chkapplypromono" value="Cancellation is Free">Cancellation is Free</label>
						</div>
					 </div>
					 <div id="dvapplypromo" style="display:none;">
					 <div class="form-group">
						<div class="field_wrapper">
								<div>
						<div class="col-md-12" style="background:whitesmoke;">
							<div class="row">
								<div class="col-md-3">
									<input type="text" name="cancellation_amount[]" class="form-control">
								</div>
								<div class="col-md-1">
									<label class="control-label col-md-12">of</label>
								</div>
								<div class="col-md-5">
									<select name="cancellation_total_product[]" class="form-control">
										<option value="">% of Product Total</option>
										<option value="jjj">jjj</option>
									</select>
								</div>
								<div class="col-md-3">
									 <label class="control-label col-md-12">Will Be Charged</label>
								</div>
							</div>
							<div class="row">&nbsp;</div>
							<div class="row">&nbsp;</div>
							<div class="row">
								<div class="col-md-3">
									<input type="text" name="cancellation_days[]" class="form-control">
								</div>
								<div class="col-md-1">
									<label class="control-label col-md-12">Days</label>
								</div>
								<div class="col-md-5">
									<select name="cancellation_period[]" class="form-control">
										<option>After Booking Date</option>
										<option value="jjj">jjj</option>
									</select>
								</div>
								<div class="col-md-3">
									 &nbsp;
								</div>
							</div>
							<div class="row">&nbsp;</div>
							<div class="row">&nbsp;</div>
							<div class="row text-right">
								<a href="javascript:void(0);" class="add_button btn btn-default" title="Add field">
								<img src="<?php echo base_url(); ?>/upload/images/plus.png" style="width:25px; height:25px;"/> Click Here Addmore</a>
							</div>	
						</div>
						</div>
							</div>
					 </div>
					 </div>
					 <script type="text/javascript">
						$(function () {
							$("input[name='cancellation_policy_type']").click(function () {
								if ($("#chkapplypromoyes").is(":checked")) {
									$("#dvapplypromo").show();
								} else {
									$("#dvapplypromo").hide();
								}
							});
						});
						
						$(document).ready(function(){
						var maxField = 10; //Input fields increment limitation
						var addButton = $('.add_button'); //Add button selector
						var wrapper = $('.field_wrapper'); //Input field wrapper
						var fieldHTML = '<div><div class="col-md-12" style="background:whitesmoke;border:1px solid gray;padding:5px;margin:10px 0px;"><div class="row"><div class="col-md-3"><input type="text" name="cancellation_amount[]" class="form-control" data-popup="tooltip" title="Cancellation Amount(It is required field)" data-placement="bottom"></div><div class="col-md-1"><label class="control-label col-md-12">of</label></div><div class="col-md-5"><select name="cancellation_total_product[]" class="form-control" data-popup="tooltip" title="Cancellation Product Type(It is required field)" data-placement="bottom"><option value="">% of Product Total</option><option value="jjj">jjj</option></select></div><div class="col-md-3"><label class="control-label col-md-12">Will Be Charged</label></div></div><div class="row">&nbsp;</div><div class="row">&nbsp;</div><div class="row"><div class="col-md-3"><input type="text" name="cancellation_days[]" class="form-control" data-popup="tooltip" title="Cancellation Days(It is required field)" data-placement="bottom"></div><div class="col-md-1"><label class="control-label col-md-12">Days</label></div><div class="col-md-5"><select name="cancellation_period[]" class="form-control" data-popup="tooltip" title="Cancellation Period(It is required field)" data-placement="bottom"><option>After Booking Date</option><option value="jjj">jjj</option></select></div><div class="col-md-3">&nbsp;</div></div><a href="javascript:void(0);" class="remove_button btn btn-default" title="Remove field"><img src="<?php echo base_url(); ?>/upload/images/minus.png" style="width:25px; height:25px;"/>Click Here Remove</a></div></div>'; //New input field html 
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
					
					<?php 
					 }
					?>
                  </div>

                  <div style="text-align:center">
                     <input type="submit" name="update_DCcancellationpolicies_data" value="Update" class="btn btn-success">
                     <input type="reset" value="Reset" class="btn btn-danger">
                  </div>
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
   