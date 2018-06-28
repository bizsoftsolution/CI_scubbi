<div class="content-wrapper">
<!-- Content area -->
<div class="content">
<div class="breadcrumb-line breadcrumb-line-component">
   <a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a>
   <ul class="breadcrumb">
      <li><a href=""><i class="icon-home2 position-left"></i> Home</a></li>
      <li><a href="<?php echo base_url();?>Dashboard">Dashboard</a></li>
      <li class="active">Cancellation Policies</li>
   </ul>
</div>
<br>
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
            <div class="col-md-1"></div>
            <div class="col-md-10">
               <br>
               <br>
               <?php if($message == "FAILED") { ?>
               <div class="alert alert-danger">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <strong>Action Failed !!! </strong>
               </div>
               <?php } else if($message == "SUCCESS") {  ?>
               <div class="alert alert-success">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <strong>Success !!! </strong> New Data Created successfully
               </div>
               <?php 
			   //redirect(base_url().'slider/sliderList');
			   } ?>
			   
               <form name="add" method="POST" action="<?php echo  base_url();?>DCpolicies/addCancellation" class="form-horizontal form-validate-jquery" 
			   enctype="multipart/form-data">
                  <div class="form-body">
					<div class="form-group">
                        <label class="control-label col-md-3"><b>Cancellation Policy Name</b> <strong style="color:red;">*</strong></label>
                        <div class="col-md-9">
                           <input name="name" class="form-control" type="text" data-popup="tooltip" title="Cancellation Policy Name(It is required field)" data-placement="bottom">
                           <span class="help-block"></span>
                        </div>
                     </div>

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
									<input type="number" name="cancellation_amount[]" class="form-control" data-popup="tooltip" title="Cancellation Amount(It is required field)" data-placement="bottom">
								</div>
								
								<div class="col-md-5">
									<select name="cancellation_total_product[]" class="form-control" data-popup="tooltip" title="Cancellation Product Type(It is required field)" data-placement="bottom">
										
										<option value="Amount">Amount</option>
										<option value="% of Deposit Paid">% of Deposit Paid</option>
										<option value="Cancellation Fee">Cancellation Fee</option>
									</select>
								</div>
								<div class="col-md-3">
									 <select name="cancellation_charged[]" class="form-control" data-popup="tooltip" title="Cancellation Product Type(It is required field)" data-placement="bottom">
										<option value="Will be penalized">Will be penalized</option>
										<option value="will be refunded">will be refunded</option>
									</select>
								</div>
							</div>
							<div class="row">&nbsp;</div>
							<div class="row">&nbsp;</div>
							<div class="row">
								<div class="col-md-3">
									<label class="control-label col-md-12">If Cancelled</label>
								</div>
								<div class="col-md-3">
									<input type="text" placeholder ="No of days" name="cancellation_days[]" class="form-control" data-popup="tooltip" title="Cancellation Days(It is required field)" data-placement="bottom">
								</div>
								<div class="col-md-5">
									<label class="control-label col-md-12">Days Before Arrival Date</label>
								</div>
							</div>
								<div class="row">&nbsp;</div>
								<div class="row">&nbsp;</div>
								<div class="row">
							
							
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
							<div class="col-md-12">
									<input type="text" value="A 10% or minimum MYR 50 will be charged by scubbi for service fee in the event of any cancellation by the user" readonly="" name="cancellation_period[]" class="form-control" data-popup="tooltip" title="Cancellation Days(It is required field)" data-placement="bottom">
									
								</div>
					 </div>
					 </div>
					 <div id="dvapplypromo1" style="display:none;">
					 <div class="form-group">
						<div class="field_wrapper1">
								<div>
						<div class="col-md-12" style="background:whitesmoke;">
							<div class="row">
								<div class="col-md-12 hide">
									<input type="hidden" name="cancellation_amount[]" class="form-control" data-popup="tooltip" title="Cancellation Amount(It is required field)" data-placement="bottom">
									
								</div>
								
								<div class="col-md-5 hide" >
									<select name="cancellation_total_product[]" class="form-control" data-popup="tooltip" title="Cancellation Product Type(It is required field)" data-placement="bottom">
										
										<option value="Amount">Amount</option>
										<option value="% of Deposit Paid">% of Deposit Paid</option>
										<option value="Cancellation Fee">Cancellation Fee</option>
									</select>
								</div>
								<div class="col-md-3 hide">
									 <select name="cancellation_charged[]" class="form-control" data-popup="tooltip" title="Cancellation Product Type(It is required field)" data-placement="bottom">
										<option value="Will be penalized">Will be penalized</option>
										<option value="will be refunded">will be refunded</option>
									</select>
								</div>
							</div>
							<div class="row">&nbsp;</div>
							<div class="row">&nbsp;</div>
							<div class="row">
								<div class="col-md-5 ">
									<label class="control-label col-md-12">Cancellation is free if cancelled</label>
								</div>
								<div class="col-md-3">
									<input type="text" placeholder ="No of days" name="cancellation_days[]" class="form-control" data-popup="tooltip" title="Cancellation Days(It is required field)" data-placement="bottom">
								</div>
								<div class="col-md-4">
									<label class="control-label col-md-12">Days Before Arrival Date</label>
								</div>
							</div>
								<div class="row">&nbsp;</div>
								<div class="row">&nbsp;</div>
								<div class="row">
							
							
							</div>
							<div class="row">&nbsp;</div>
							<div class="row">&nbsp;</div>
							<div class="row text-right">
								<a href="javascript:void(0);" class="add_button1 btn btn-default" title="Add field">
								<img src="<?php echo base_url(); ?>/upload/images/plus.png" style="width:25px; height:25px;"/> Click Here Addmore</a>
							</div>	
						</div>
						</div>
							</div>
							<div class="col-md-12">
									<input type="text" value="A 10% or minimum MYR 50 will be charged by scubbi for service fee in the event of any cancellation by the user" readonly="" name="cancellation_period[]" class="form-control" data-popup="tooltip" title="Cancellation Days(It is required field)" data-placement="bottom">
									
								</div>
					 </div>
					 </div>
					 <script type="text/javascript">
						$(function () {
							$("input[name='cancellation_policy_type']").click(function () {
								if ($("#chkapplypromoyes").is(":checked")) {
									$("#dvapplypromo").show();
									$("#dvapplypromo1").hide();
								} else {
									$("#dvapplypromo").hide();
									$("#dvapplypromo1").show();
								}
							});
						});
						
						$(document).ready(function(){
						var maxField = 10; //Input fields increment limitation
						var addButton = $('.add_button'); //Add button selector
						var wrapper = $('.field_wrapper'); //Input field wrapper
						var fieldHTML = '	<div><div class="col-md-12" style="background:whitesmoke;"><div class="row"><div class="col-md-3"><input type="number" name="cancellation_amount[]" class="form-control" data-popup="tooltip" title="Cancellation Amount(It is required field)" data-placement="bottom"></div><div class="col-md-5"><select name="cancellation_total_product[]" class="form-control" data-popup="tooltip" title="Cancellation Product Type(It is required field)" data-placement="bottom"><option value="Amount">Amount</option><option value="% of Deposit Paid">% of Deposit Paid</option><option value="Cancellation Fee">Cancellation Fee</option></select></div><div class="col-md-3"><select name="cancellation_charged[]" class="form-control" data-popup="tooltip" title="Cancellation Product Type(It is required field)" data-placement="bottom"><option value="Will be penalized">Will be penalized</option><option value="will be refunded">will be refunded</option></select></div></div><div class="row">&nbsp;</div><div class="row">&nbsp;</div><div class="row"><div class="col-md-3"><label class="control-label col-md-12">If Cancelled</label></div><div class="col-md-3"><input type="text" placeholder ="No of days" name="cancellation_days[]" class="form-control" data-popup="tooltip" title="Cancellation Days(It is required field)" data-placement="bottom"></div><div class="col-md-5"><label class="control-label col-md-12">Days Before Arrival Date</label></div></div><div class="row">&nbsp;</div><div class="row">&nbsp;</div><div class="row"><div class="col-md-12"><input type="hidden" value="A 10% or minimum MYR 50 will be charged by scubbi for service fee in the event of any cancellation by the user" readonly="" name="cancellation_period[]" class="form-control" data-popup="tooltip" title="Cancellation Days(It is required field)" data-placement="bottom"></div></div><div class="row">&nbsp;</div><div class="row">&nbsp;</div><a href="javascript:void(0);" class="remove_button btn btn-default" title="Remove field"><img src="<?php echo base_url(); ?>/upload/images/minus.png" style="width:25px; height:25px;"/>Click Here Remove</a></div></div>'; //New input field html 
						var x = 1; //Initial field counter is 1
						$(addButton).click(function(){ //Once add button is clicked
							if(x < maxField){ //Check maximum number of input fields
								x++; //Increment field counter
								$(wrapper).append(fieldHTML); // Add field html
							}
						});
						var addButton1 = $('.add_button1'); //Add button selector
						var wrapper1 = $('.field_wrapper1'); //Input field wrapper
						var fieldHTML1 = '<div><div class="col-md-12" style="background:whitesmoke;"><div class="row"><div class="col-md-12 hide"><input type="hidden" name="cancellation_amount[]" class="form-control" data-popup="tooltip" title="Cancellation Amount(It is required field)" data-placement="bottom"></div><div class="col-md-5 hide" ><select name="cancellation_total_product[]" class="form-control" data-popup="tooltip" title="Cancellation Product Type(It is required field)" data-placement="bottom"><option value="Amount">Amount</option><option value="% of Deposit Paid">% of Deposit Paid</option><option value="Cancellation Fee">Cancellation Fee</option></select></div><div class="col-md-3 hide"><select name="cancellation_charged[]" class="form-control" data-popup="tooltip" title="Cancellation Product Type(It is required field)" data-placement="bottom"><option value="Will be penalized">Will be penalized</option><option value="will be refunded">will be refunded</option></select></div></div><div class="row">&nbsp;</div><div class="row">&nbsp;</div><div class="row"><div class="col-md-5 "><label class="control-label col-md-12">Cancellation is free if cancelled</label></div><div class="col-md-3"><input type="text" placeholder ="No of days" name="cancellation_days[]" class="form-control" data-popup="tooltip" title="Cancellation Days(It is required field)" data-placement="bottom"></div><div class="col-md-4"><label class="control-label col-md-12">Days Before Arrival Date</label></div></div><div class="row">&nbsp;</div><div class="row">&nbsp;</div><div class="row"><div class="col-md-12"><input type="hidden" value="A 10% or minimum MYR 50 will be charged by scubbi for service fee in the event of any cancellation by the user" readonly="" name="cancellation_period[]" class="form-control" data-popup="tooltip" title="Cancellation Days(It is required field)" data-placement="bottom"></div></div><div class="row">&nbsp;</div><div class="row">&nbsp;</div><a href="javascript:void(0);" class="remove_button1 btn btn-default" title="Remove field"><img src="<?php echo base_url(); ?>/upload/images/minus.png" style="width:25px; height:25px;"/>Click Here Remove</a></div></div>'; //New input field html 
						var x = 1; //Initial field counter is 1
						$(addButton1).click(function(){ //Once add button is clicked
							if(x < maxField){ //Check maximum number of input fields
								x++; //Increment field counter
								$(wrapper1).append(fieldHTML1); // Add field html
							}
						});
						$(wrapper).on('click', '.remove_button', function(e){ //Once remove button is clicked
							e.preventDefault();
							$(this).parent('div').remove(); //Remove field html
							x--; //Decrement field counter
						});
						$(wrapper1).on('click', '.remove_button1', function(e){ //Once remove button is clicked
							e.preventDefault();
							$(this).parent('div').remove(); //Remove field html
							x--; //Decrement field counter
						});
					});
					</script>
					 
                  </div>

                  <div style="text-align:center">
                     <input type="submit" name="submit_DCcancellationpolicies_data" value="Add" class="btn btn-success">
                     <input type="reset" value="Reset" class="btn btn-danger">
                  </div>
               </form>
			  
               <br><br>
            </div>
			 <div class="col-md-1"></div>
         </div>
      </div>
      <!-- /traffic sources -->
   </div>
</div>
<!-- /dashboard content -->
