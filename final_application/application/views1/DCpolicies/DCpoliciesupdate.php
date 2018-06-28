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
			      <?php foreach($getEditdata as $row){?>
               <form name="add" method="POST" action="<?php echo  base_url();?>DCpolicies/edit/<?php echo $row->id; ?>" class="form-horizontal form-validate-jquery" 
			   enctype="multipart/form-data">
                  <div class="form-body">
					<div class="form-group">
                        <label class="control-label col-md-3"><b>Booking Policy Name</b> <strong style="color:red;">*</strong></label>
                        <div class="col-md-9">
                           <input name="name" class="form-control" type="text" data-popup="tooltip" title="Booking Policy Name(It is required field)" data-placement="bottom" value="<?php echo $row->booking_name; ?>">
                           <span class="help-block"></span>
                        </div>
                     </div>
					 <div class="form-group">
						<label class="control-label col-md-3"><b> Deposit Required </b></label>
						 <div class="col-md-9">
						<label class="checkbox-inline">
						<input type="radio" class="styled" name="depositrequired" value="Yes" <?php if($row->deposit_required == 'Yes'){echo "checked";}?>>YES</label>
						<label class="checkbox-inline"><input type="radio" class="styled" name="depositrequired" value="No" id="depositNo" <?php if($row->deposit_required == 'No'){echo "checked";}?> >NO</label>
						</div>
					 </div>
			<div id="paymentOption" <?php if($row->deposit_required == 'No'){?> style="display:none;"<?php }?> >
					 <div class="form-group">
						<label class="control-label col-md-3"><b>Amount of Deposit Required Upon Booking</b></label>
						<div class="col-md-9">
							<label class="checkbox-inline">
							<input type="radio" class="styled" name="booking_deposit" id="chkapplypromono" value="Full Prepayment" <?php if($row->booking_deposit == 'Full Prepayment'){echo "checked";}?> >Full Prepayment</label>
							<label class="checkbox-inline"><input type="radio" class="styled" name="booking_deposit" id="chkapplypromoyes" value="Partial" <?php if($row->booking_deposit == 'Partial'){echo "checked";}?>>Partial</label>
						</div>
					 </div>
					 <div id="dvapplypromo" <?php if($row->booking_deposit == 'Full Prepayment'){?> style="display:none;" <?php } ?>>
					 <div class="form-group">
						<div class="field_wrapper">
						<?php 
								 $chk003=$row->booking_amount;
								 $arr003=explode(",",$chk003);
								 $chk004=$row->booking_total_product;
								 $arr004=explode(",",$chk004);
								 $chk007=$row->booking_charge;
								 $arr007=explode(",",$chk007);
								 $chk005=$row->booking_days;
								 $arr005=explode(",",$chk005);
								 $chk006=$row->booking_period;
								 $arr006=explode(",",$chk006);
								 $i=0;
								foreach($arr004 as $val003)
								{
									?>
									
								<div>
						<div class="col-md-12" style="background:whitesmoke;">
						
							<div class="row">
								<div class="col-md-3">
									<input type="text" name="booking_amount[]" class="form-control" data-popup="tooltip" title="Booking Amount(It is required field)" data-placement="bottom" value="<?php echo $arr003[$i];?>">
								</div>
								
								<div class="col-md-5">
									<select name="booking_total_product[]" class="form-control" data-popup="tooltip" title="Booking Product Type(It is required field)" data-placement="bottom">
										<option value="">--Select Option--</option>
										<option value="Deposit" <?php if('Deposit'==$arr004[$i]){echo "selected";}?>>Deposit</option>
										<option value="% Deposit" <?php if('% Deposit'==$arr004[$i]){echo "selected";}?> >% Deposit</option>
										<option value="of Balance Payment" <?php if('of Balance Payment'==$arr004[$i]){echo "selected";}?> >of Balance Payment</option>
										<option value="% of Balance Payment" <?php if('% of Balance Payment'==$arr004[$i]){echo "selected";}?> >% of Balance Payment</option>
										<option value="of Payment" <?php if('of Payment'==$arr004[$i]){echo "selected";}?> >of Payment</option>
									</select>
								</div>
								<div class="col-md-3">
									 <select name="booking_charge[]" class="form-control" data-popup="tooltip" title="Please select any one" data-placement="bottom">
										<option value="">--Select Option--</option>
										<option value="Will Be Charged" <?php if('Will Be Charged'==$arr007[$i]){echo "selected";}?> >Will Be Charged</option>
										<option value="is required" <?php if('is required'==$arr007[$i]){echo "selected";}?> > is required</option>
										<option value="to be paid" <?php if('to be paid'==$arr007[$i]){echo "selected";}?>  >to be paid</option>
										
									</select>
								</div>
							</div>
							<div class="row">&nbsp;</div>
							<div class="row">&nbsp;</div>
							<div class="row">
								
								
								<div class="col-md-4">
									<select name="booking_period[]" class="form-control" data-popup="tooltip" title="Booking Period(It is required field)" data-placement="bottom" id="booking_period">
										<option value="">--Select Option--</option>
										<option value="Upon Booking"  <?php if('Upon Booking'==$arr006[$i]){echo "selected";}?>  >Upon Booking</option>
										<option value="After Booking Date"  <?php if('After Booking Date'==$arr006[$i]){echo "selected";}?>  >After Booking Date</option>
										<option value="Upon Arrival"  <?php if('Upon Arrival'==$arr006[$i]){echo "selected";}?>  >Upon Arrival</option>
									</select>
								</div>
								<?php 
							//	var_dump($arr006[0]);
								if('After Booking Date' == $arr006[$i]){
								
								
									?>
								<div id="afterBookDiv" >
									<div class="col-md-2">
										<input type="text" name="booking_days[]" class="form-control" data-popup="tooltip" title="Booking Days(It is required field)" value="<?php echo $arr005[$i]; ?>" data-placement="bottom">
									</div>
									<div class="col-md-1">
										<label class="control-label col-md-12">Days</label>
									</div>
								</div>
							<?php
									//echo "selected";
								}
								else
								{
									?>
								<div id="afterBookDiv" style="display:none;">
									<div class="col-md-2">
										<input type="text" name="booking_days[]" class="form-control" data-popup="tooltip" title="Booking Days(It is required field)" data-placement="bottom">
									</div>
									<div class="col-md-1">
										<label class="control-label col-md-12">Days</label>
									</div>
								</div>
								<?php
								}
								?>
								
							<!--div id="afterBookDiv" style="display:none;">
								<div class="col-md-2">
									<input type="text" name="booking_days[]" class="form-control" data-popup="tooltip" title="Booking Days(It is required field)" value="<?php echo $arr005[$i]; ?>" data-placement="bottom">
								</div>
								<div class="col-md-1">
									<label class="control-label col-md-12">Days</label>
								</div>
							</div-->
							</div>
							<div class="row">&nbsp;</div>
							<div class="row">&nbsp;</div>
							
								<a href="javascript:void(0);" class="remove_button btn btn-default" title="Remove field"><i class="fa fa-remove" style="color:red;font-size:25px;"/></i>Click Here Remove</a>
							
						</div>
						</div>
						
						<?php
						$i++;
								}
								?>
						</div>	
					 </div>
					 <div class="row text-right">
								<a href="javascript:void(0);" class="add_button btn btn-default" title="Add field">
								<i class=" fa fa-plus-square" style="color:green;font-size:25px;"/></i> Click Here Addmore</a>
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
									//alert("fghjgf");
						$('#booking_period').on('change', function() {
						
						  if (this.value == 'Upon Booking')
						  {
							$("#afterBookDiv").hide();
						  }
						  else if(this.value == 'Upon Arrival')
						  {
							  $("#afterBookDiv").hide();
						  }
						  else
						  {
							$("#afterBookDiv").show();
						  }
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
						var fieldHTML = '<div class="addmore"><div class="col-md-12" style="background:whitesmoke;"><div class="row"><div class="col-md-3"><input type="text" name="booking_amount[]" class="form-control" data-popup="tooltip" title="Booking Amount(It is required field)" data-placement="bottom"></div><div class="col-md-5"><select name="booking_total_product[]" class="form-control" data-popup="tooltip" title="Booking Product Type(It is required field)" data-placement="bottom"><option value="">--Select Option--</option><option value="Deposit">Deposit</option><option value="% Deposit">% Deposit</option><option value="of Balance Payment">of Balance Payment</option><option value="% of Balance Payment">% of Balance Payment</option><option value="of Payment">of Payment</option></select></div><div class="col-md-3"><select name="booking_charge[]" class="form-control" data-popup="tooltip" title="Please select any one" data-placement="bottom"><option value="">--Select Option--</option><option value="Will Be Charged">Will Be Charged</option><option value=" is required"> is required</option><option value="to be paid">to be paid</option></select></div></div><div class="row">&nbsp;</div><div class="row">&nbsp;</div><div class="row"><div class="col-md-4"><select name="booking_period[]" class="form-control" data-popup="tooltip" title="Booking Period(It is required field)" data-placement="bottom" id="booking_period121"><option value="">--Select Option--</option><option value="Upon Booking">Upon Booking</option><option value="After Booking Date">After Booking Date</option><option value="Upon Arrival">Upon Arrival</option></select></div><div id="afterBookDiv1" style="display:none;"><div class="col-md-2"><input type="text" name="booking_days[]" class="form-control" data-popup="tooltip" title="Booking Days(It is required field)" data-placement="bottom"></div><div class="col-md-1"><label class="control-label col-md-12">Days</label></div></div></div><div class="row">&nbsp;</div><div class="row">&nbsp;</div><div class="row text-right"></div><a href="javascript:void(0);" class="remove_button btn btn-default" title="Remove field"><i class="fa fa-remove" style="color:red;font-size:25px;"/></i>Click Here Remove</a></div></div>'; //New input field html 
						var x = 1; //Initial field counter is 1
						$(addButton).click(function(){ //Once add button is clicked
							if(x < maxField){ //Check maximum number of input fields
								x++; //Increment field counter
								$(wrapper).append(fieldHTML); // Add field html
							}
						});
						$(wrapper).on('click', '.remove_button', function(e){ //Once remove button is clicked
							e.preventDefault();
							$(this).parent('div').remove();//Remove field html
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
                     <input type="submit" name="update_DCpolicies_data" value="Update" class="btn btn-success">
                     <input type="reset" value="Reset" class="btn btn-danger">
                  </div>
               </form>
			   <?php
				  }
				  ?>
			  
               <br><br>
            </div>
			 <div class="col-md-1"></div>
         </div>
      </div>
      <!-- /traffic sources -->
   </div>
</div>
<!-- /dashboard content -->
