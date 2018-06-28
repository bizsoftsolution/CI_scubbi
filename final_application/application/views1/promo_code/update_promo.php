	<div class="content-wrapper">
<!-- Content area -->
<div class="content">
<div class="breadcrumb-line breadcrumb-line-component">
   <a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a>
   <ul class="breadcrumb">
      <li><a href=""><i class="icon-home2 position-left"></i> Home</a></li>
      <li><a href="<?php echo base_url();?>Dashboard">Dashboard</a></li>
      <li class="active">Promo Details</li>
   </ul>
</div>
<br>
<!-- Main charts -->
<div class="row">
   <div class="col-lg-12">
      <!-- Traffic sources -->
      <div class="panel panel-flat">
         <div class="panel-heading">
            <h2 class="panel-title">Edit Promo</h2>
            <div style="text-align:right;">
              
               <a href="<?php echo  base_url();?>/promo_code" class="btn bg-pink"><i class="glyphicon glyphicon-refresh"></i> Go Back</a>
            </div>
            <hr/>
         </div>
         <div class="container-fluid">
            <!-- content Starts Here-->
           
            <div class="col-md-12">
           
               
               <form name="add"   method="POST" action="<?php echo  base_url();?>Promo_code/editPromo/<?php echo $promo_id; ?>" class="form-horizontal ">
                  <div class="form-body">
				  <?php 
					$cDet = $this->db->get_where('promo_code_details',array('promo_id'=>$promo_id))->row();
					
					$end_range_ap = $cDet->valid_from;
					$date6 = str_replace('-', '/', $end_range_ap);
					$end_range3= date('d/m/Y', strtotime($date6));


					$end_range_ap1 = $cDet->valid_to;
					$date61 = str_replace('-', '/', $end_range_ap1);
					$end_range31 = date('d/m/Y', strtotime($date61));
				  ?>
				  
                     <div class="form-group col-md-6">
                        <label class="control-label col-md-3"><b>Valid From</b> </label>
                        <div class="col-md-9">
                           <input id="valid_from" name="valid_from" class="form-control" type="text" required="" readonly="" value="<?php echo $end_range3;?>">
                           <input name="promo_code" class="form-control" type="hidden" required="" readonly="" value="<?php echo $cDet->promo_code;?>">
                           <input name="type" class="form-control" type="hidden" required="" readonly="" value="<?php echo $cDet->type;?>">
                           <span class="help-block"></span>
                        </div>
                     </div>
					 <div class="form-group col-md-6">
                        <label class="control-label col-md-3"><b>Valid To</b></label>
                        <div class="col-md-9">
						    <input name="valid_to" id="valid_to" class="form-control" type="text" required="" readonly="" value="<?php echo $end_range31;?>">
							<span class="help-block"></span>
                        </div>
                     </div> 
					 <script>
				$(document).ready(function(){
					
					// Booking peroid
					
					  var nowTemp = new Date();
						var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);

						var checkin = $('#valid_from').datepicker({
						
							onRender: function(date) {
								return date.valueOf() < now.valueOf() ? '' : '';
							}
						}).on('changeDate', function(ev) {
							if (ev.date.valueOf() > checkout.date.valueOf()) {
								var newDate = new Date(ev.date)
								newDate.setDate(newDate.getDate() + 1);
								checkout.setValue(newDate);
							}
							checkin.hide();
							$('#valid_to')[0].focus();
						}).data('datepicker');
						var checkout = $('#valid_to').datepicker({
							onRender: function(date) {
								return date.valueOf() < checkin.date.valueOf() ? 'disabled' : '';
							}
						}).on('changeDate', function(ev) {
							checkout.hide();
						}).data('datepicker');
						
						// Travel peroid	
				});
			</script>
					 <div class="form-group col-md-6">
                        <label class="control-label col-md-3"><b>Base Currency</b> </label>
                        <div class="col-md-9">
                           <input name="currency" class="form-control" type="text" required="" value="<?php echo $cDet->currency;?>">
                           <span class="help-block"></span>
                        </div>
                     </div>
					 <div class="form-group col-md-6">
                        <label class="control-label col-md-3"><b>Minimum Amount</b> </label>
                        <div class="col-md-9">
                           <input name="min_amount" class="form-control" type="text" required=""value="<?php echo $cDet->min_amount;?>">
                           <span class="help-block"></span>
                        </div>
                     </div>
					 <div class="form-group col-md-6">
                        <label class="control-label col-md-3"><b>Amount</b></label>
                        <div class="col-md-9">
						    <input name="amount" class="form-control" type="text"  value="<?php echo $cDet->amount;?>">
							<span class="help-block"></span>
                        </div>
                     </div>
					 <div class="form-group col-md-6">
                        <label class="control-label col-md-3"><b>Percentage</b></label>
                        <div class="col-md-9">
						    <input name="percentage" class="form-control" type="text"  value="<?php echo $cDet->percentage;?>">
							<span class="help-block"></span>
                        </div>
                     </div>
					 <table class="table table-bordered">
						<thead>
							<tr>
								<th>Currency</td>
								<th>Min Amount</td>
								<th>Amount</td>
								<th>Percentage</td>
								
							</tr>
						</thead>

						<tbody>
						<?php 
							$cuu = $this->db->get_where('promo_code_details',array('fk_promo_id'=>$promo_id))->result();
							foreach($cuu as $row)
							{
						?>
						
								<tr>
									<td><input type="text" class="form-control" value="<?php echo $row->currency; ?>" name='multi_curreny[]'></td>
									<td><input type="text" class="form-control" value="<?php echo $row->min_amount; ?>" name='multi_min_amount[]'></td>
									<td><input type="text" class="form-control" value="<?php echo $row->amount; ?>" name='multi_amount[]'></td>
									<td><input type="text" class="form-control" value="<?php echo $row->percentage; ?>" name='multi_percentage[]'></td>
								<tr>
							<?php
							}
							?>
						</tbody>
					 
					 </table>
					 
					 
					 
					 
					 
                  </div>
<br>
<br>
<br>
                  <div style="text-align:center">
                     <input type="submit" name="update_btn" value="Update" class="btn btn-success">
                     <input type="reset" value="Reset" class="btn btn-danger">
                  </div>
               </form>

               <br><br>
            </div>
         </div>
      </div>
      <!-- /traffic sources -->
   </div>
</div>
<!-- /dashboard content -->
