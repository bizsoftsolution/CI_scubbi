<div class="content-wrapper">
<!-- Content area -->
<div class="content">
<div class="breadcrumb-line breadcrumb-line-component">
   <a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a>
   <ul class="breadcrumb">
      <li><a href=""><i class="icon-home2 position-left"></i> Home</a></li>
      <li><a href="<?php echo base_url();?>Dashboard">Dashboard</a></li>
      <li class="active">Booking Policies</li>
   </ul>
</div>
<br>
<!-- Main charts -->
<div class="row">
   <div class="col-lg-12">
      <!-- Traffic sources -->
      <div class="panel panel-flat">
         <div class="panel-heading">
            <h2 class="panel-title">Booking Policies</h2>
            <div style="text-align:right;">
               <a class="btn bg-violet" href="<?php echo  base_url();?>DCpolicies/addNew"><i class="glyphicon glyphicon-plus"></i> Add </a>
               <a href="<?php echo  base_url();?>DCpolicies/DCpolicieslist" class="btn bg-pink"><i class="glyphicon glyphicon-refresh"></i> List</a>
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
			   
               <form name="add" method="POST" action="<?php echo  base_url();?>DCpolicies/addNew" class="form-horizontal form-validate-jquery" 
			   enctype="multipart/form-data">
                  <div class="form-body">
					<div class="form-group">
                        <label class="control-label col-md-3"><b>Booking Policy Name</b> <strong style="color:red;">*</strong></label>
                        <div class="col-md-9">
                           <input name="name" class="form-control" type="text" data-popup="tooltip" title="Booking Policy Name(It is required field)" data-placement="bottom">
                           <span class="help-block"></span>
                        </div>
                     </div>
					 <div class="form-group">
						<label class="control-label col-md-3"><b> Deposit Required </b></label>
						 <div class="col-md-9">
						<label class="checkbox-inline">
						<input type="radio" class="styled" name="depositrequired" value="Yes">YES</label>
						<label class="checkbox-inline"><input type="radio" class="styled" name="depositrequired" value="No" id="depositNo" checked="" >NO</label>
						</div>
					 </div>
			<div id="paymentOption" style="display:none;">
					 <div class="form-group">
						<label class="control-label col-md-3"><b>Amount of Deposit Required Upon Booking</b></label>
						<div class="col-md-9">
							<label class="checkbox-inline">
							<input type="radio" class="styled" name="booking_deposit" id="chkapplypromono" value="Full Prepayment">Full Prepayment</label>
							<label class="checkbox-inline"><input type="radio" class="styled" name="booking_deposit" id="chkapplypromoyes" value="Partial" >Partial</label>
						</div>
					 </div>
					 <div id="dvapplypromo" style="display:none;">
					 <div class="form-group">
						<div class="field_wrapper">
								<div>
						<div class="col-md-12" style="background:whitesmoke;">
							<div class="row">
								<div class="col-md-3">
									<input type="text" name="booking_amount[]" class="form-control" data-popup="tooltip" title="Booking Amount(It is required field)" data-placement="bottom">
								</div>
								
								<div class="col-md-5">
									<select name="booking_total_product[]" class="form-control" data-popup="tooltip" title="Booking Product Type(It is required field)" data-placement="bottom">
										<option value="">--Select Option--</option>
										<option value="Deposit">Deposit</option>
										<option value="% Deposit">% Deposit</option>
										<option value="of Balance Payment">of Balance Payment</option>
										<option value="% of Balance Payment">% of Balance Payment</option>
										<option value="of Payment">of Payment</option>
									</select>
								</div>
								<div class="col-md-3">
									 <select name="booking_charge[]" class="form-control" data-popup="tooltip" title="Please select any one" data-placement="bottom">
										<option value="">--Select Option--</option>
										<option value="Will Be Charged">Will Be Charged</option>
										<option value=" is required"> is required</option>
										<option value="to be paid">to be paid</option>
										
									</select>
								</div>
							</div>
							<div class="row">&nbsp;</div>
							<div class="row">&nbsp;</div>
							<div class="row">
								
								
								<div class="col-md-4">
									<select name="booking_period[]" class="form-control" data-popup="tooltip" title="Booking Period(It is required field)" data-placement="bottom" id="booking_period" onchange="java_script_:show(this.options[this.selectedIndex].value)">
										<option value="">--Select Option--</option>
										<option value="Upon Booking">Upon Booking</option>
										<option value="After Booking Date">After Booking Date</option>
										<option value="Upon Arrival">Upon Arrival</option>
										
										
									</select>
									
									
							
								</div>
								
								<div class="afterBookDiv" style="display:none;">
									<div class="col-md-2">
										<input type="text" name="booking_days[]" class="form-control" data-popup="tooltip" title="Booking Days(It is required field)" data-placement="bottom">
									</div>
									<div class="col-md-1">
										<label class="control-label col-md-12">Days</label>
									</div>
								</div>
									
							</div>
							<div class="row">&nbsp;</div>
							<div class="row">&nbsp;</div>
							<div class="row text-right">
								<a href="javascript:void(0);" class="add_button btn btn-default" title="Add field">
								<i class=" fa fa-plus-square" style="color:green;font-size:25px;"/></i> Click Here Addmore</a>
							</div>	
						</div>
						</div>
							</div>
					 </div>
					 </div>					
					 <!--div id="dvapplypromo1" style="display:none;">
					 <div class="form-group">
						<div class="field_wrapper1">
								<div>
						<div class="col-md-12" style="background:whitesmoke;">
							<div class="row">
								<div class="col-md-3">
									<input type="text" name="" value="100 %" class="form-control" readonly ="" data-popup="tooltip" title="Booking Amount(It is required field)" data-placement="bottom">
								</div>
								
								<div class="col-md-3">
									<select name="" class="form-control" data-popup="tooltip" title="Booking Product Type(It is required field)" data-placement="bottom">
									
										<option value="of Payment">of Payment</option>
									</select>
								</div>
								<div class="col-md-3">
									 <select name="" class="form-control" data-popup="tooltip" title="Please select any one" data-placement="bottom">
										<option value="Will Be Charged">Will Be Charged</option>
										
										
									</select>
								</div>
							
								<div class="col-md-3">
									<select name="" class="form-control" data-popup="tooltip" title="Booking Period(It is required field)" data-placement="bottom" id="booking_period">
										<option value="Upon Booking">Upon Booking</option>
										
									</select>
								</div>
								
						
							</div>
							<div class="row">&nbsp;</div>
							<div class="row">&nbsp;</div>
							<!--<div class="row text-right">
								<a href="javascript:void(0);" class="add_button btn btn-default" title="Add field">
								<img src="<?php echo base_url(); ?>/upload/images/plus.png" style="width:25px; height:25px;"/> Click Here Addmore</a>
							</div>	->
						</div>
						</div>
							</div>
					 </div>
					 </div-->
					 </div>
					 <script type="text/javascript">
					 
							
						
					$(document).ready(function(){
						
						

						$(function() {
							//$('#row_dim').hide(); 
							$('#booking_period').change(function(){
								if($('#booking_period').val() == 'After Booking Date') {
									$('.afterBookDiv').show(); 
								} else {
									$('.afterBookDiv').hide(); 
								} 
							});
						});
						
					});
						$(function () {
							$("input[name='booking_deposit']").click(function () {
								if ($("#chkapplypromoyes").is(":checked")) {
									$("#dvapplypromo").show();
									$("#dvapplypromo1").hide();
								} else {
									$("#dvapplypromo").hide();
									$("#dvapplypromo1").show();
								}
							});
						});						
						$(function () {
							$("input[name='depositrequired']").click(function () {
								if ($("#depositNo").is(":checked")) {
									
									$("#paymentOption").hide();
									
								} else {
									$("#paymentOption").show();
									
								}
							});
						});
						
						$(document).ready(function(){
						var maxField = 10; //Input fields increment limitation
						var addButton = $('.add_button'); //Add button selector
						var wrapper = $('.field_wrapper'); //Input field wrapper
						var fieldHTML = '<div class="addmore"><div class="col-md-12" style="background:whitesmoke;"><div class="row"><div class="col-md-3"><input type="text" name="booking_amount[]" class="form-control" data-popup="tooltip" title="Booking Amount(It is required field)" data-placement="bottom"></div><div class="col-md-5"><select name="booking_total_product[]" class="form-control" data-popup="tooltip" title="Booking Product Type(It is required field)" data-placement="bottom"><option value="">--Select Option--</option><option value="Deposit">Deposit</option><option value="% Deposit">% Deposit</option><option value="of Balance Payment">of Balance Payment</option><option value="% of Balance Payment">% of Balance Payment</option><option value="of Payment">of Payment</option></select></div><div class="col-md-3"><select name="booking_charge[]" class="form-control" data-popup="tooltip" title="Please select any one" data-placement="bottom"><option value="">--Select Option--</option><option value="Will Be Charged">Will Be Charged</option><option value=" is required"> is required</option><option value="to be paid">to be paid</option></select></div></div><div class="row">&nbsp;</div><div class="row">&nbsp;</div><div class="row"><div class="col-md-4"><select name="booking_period[]" class="form-control" data-popup="tooltip" title="Booking Period(It is required field)" data-placement="bottom" id="booking_period121" ><option value="">--Select Option--</option><option value="Upon Booking">Upon Booking</option><option value="After Booking Date">After Booking Date</option><option value="Upon Arrival">Upon Arrival</option></select></div><div id="afterBookDiv1" style="display:none;"><div class="col-md-2"><input type="text" name="booking_days[]" class="form-control" data-popup="tooltip" title="Booking Days(It is required field)" data-placement="bottom"></div><div class="col-md-1"><label class="control-label col-md-12">Days</label></div></div></div><div class="row">&nbsp;</div><div class="row">&nbsp;</div><div class="row text-right"></div><a href="javascript:void(0);" class="remove_button btn btn-default" title="Remove field"><i class="fa fa-remove" style="color:red;font-size:25px;"/></i>Click Here Remove</a></div></div>'; //New input field html 
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
						
						$(wrapper).on('change', '.addmore', function(e){ //Once remove button is clicked
							e.preventDefault();
							var str = $(this).find('#booking_period121').val();
							if(str=="After Booking Date"){
								$(this).find('#afterBookDiv1').show();
							}else{
								$(this).find('#afterBookDiv1').hide();
							}														
						});
						
						
						
						
					});
					</script>
					 
                  </div>

                  <div style="text-align:center">
                     <input type="submit" name="submit_DCpolicies_data" value="Add" class="btn btn-success">
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
