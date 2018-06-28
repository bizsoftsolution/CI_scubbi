	<link href="<?php echo base_url('assets/new/css/datepicker.css');?>" rel="stylesheet">
	<script type="text/javascript" src="<?php echo base_url('assets/new/js/bootstrap-datepicker.js');?>"></script>
<div class="content-wrapper">  
<div class="content">
  <div class="breadcrumb-line breadcrumb-line-component">
   <a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a>
   <ul class="breadcrumb">
    <li><a href="#"><i class="icon-home2 position-left"></i> Home</a></li>      
    <li class="active">Promo code</li>
  </ul>
</div>
<div class="row">
 <div class="col-lg-12">    
  <div class="panel panel-flat">
    <div class="panel-body">
      <ul class="nav nav-tabs nav-tabs-highlight">
        <li class="active" id="add_li"><a data-toggle="tab" href="#add"><span class="temp">Add</span></a></li>
        <li id="view_li"><a data-toggle="tab" href="#view">View</a></li>
      </ul>
      <div class="tab-content">
        <div id="add" class="tab-pane fade in active">
          <h4><span class="temp">Add</span> Promo code</h4>  
          <div class="notify"></div>
          <form  method="post" action="<?php echo  base_url();?>promo_code/add" class="form-horizontal" id="new_form">

            <div class="form-group">
              <label class="control-label col-md-3"><b>Promo code</b> <strong style="color:red;">*</strong>
              </label>                    
              <div class="col-md-3">
                <input  class="form-control" type="text" name="promo_code" id="promo_code" value="">
                <span class="help-block"></span>
              </div>
              <div class="col-md-3" id="btn_div">
                <button type="button" class="btn btn-primary btn-xs" id="generate">Generate New </button>                                                                      
              </div>
            </div>
            <div class="clear-fix"></div>
            <div class="form-group">
              <label class="control-label col-md-3"><b>Validity</b> <strong style="color:red;">*</strong>
              </label>                    
              <div class="col-md-3">
                <input  class="form-control" type="text" name="valid_from" id="valid_from" readonly="" placeholder="Valid from " value="<?php echo date('d-m-Y'); ?>">
                <span class="help-block"></span>
              </div>
              <div class="col-md-3">
                <input  class="form-control" type="text" name="valid_to" id="valid_to" readonly="" placeholder="Valid to " value="<?php echo date('d-m-Y'); ?>">
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
            <div class="clear-fix"></div>
            <div class="form-group">
              <label class="control-label col-md-3"><b>Total count</b> <strong style="color:red;">*</strong>
              </label>
              <div class="col-md-3">                      
                <input type="text" name="total_count" class="form-control" id="total_count" onkeypress="return isNumber(event)">
                <span class="help-block"></span>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3"><b>Minimum Amount</b> <strong style="color:red;">*</strong>
              </label>
              <div class="col-md-3">                      
                <input type="text" name="min_amount" class="form-control" id="min_amount" onkeypress="return isNumber(event)">
                <span class="help-block"></span>
              </div>
            </div>
            
            <div class="form-group">
              <label class="control-label col-md-3"><b>Select type</b> <strong style="color:red;">*</strong>
              </label>
              <div class="col-md-3">                      
                <select name="type" class="form-control" id="type">
                  <option value="">--Select --</option>                          
                  <option value="Percentage">Percentage</option>                          
                  <option value="Amount">Amount</option>                          
                </select>
                <span class="help-block"></span>
              </div>
            </div>
            <div class="form-group" id="amount">
              <label class="control-label col-md-3"><b>Amount</b> <strong style="color:red;">*</strong>
              </label>
              <div class="col-md-3">                      
                <input  class="form-control" type="text" name="amount" id="amt_txt" onkeypress="return isNumber(event)" >                        
                <span class="help-block"></span>
              </div>
            </div>
            <div class="form-group" id="percentage">
              <label class="control-label col-md-3"><b>Percentage</b> <strong style="color:red;">*</strong>
              </label>
              <div class="col-md-3">                      
                <input  class="form-control" type="text" name="percentage" id="per_txt" onkeypress="return isNumber(event)">                        
                <span class="help-block"></span>
              </div>
            </div>
            <div class="modal-footer" >
              <div class="col-md-4" >
                <input type="hidden" name="promo_id"  id="promo_id">
                <input type="submit" value="Save" class="btn btn-success" id="btnSave">
                <input type="reset" value="Reset" class="btn btn-danger" onclick="cancel()">
              </div>
            </div>
          </form>
        </div>
        <div id="view" class="tab-pane fade">
          <h4>View Promo code</h4>
          <div id="delete_notify"></div>
          <table class="table datatable-button-print-columns">
            <thead>
              <th>#</th>
              <th>Date</th>
              <th>Promo Code</th>
              <th>Total Count</th>
              <th>Balance Count</th>
              <th>Valid From</th>
              <th>Valid To</th>
              <th>Min Amount</th>                
              <th>Type</th>
              <th>Amount </th>
              <th>Percentage </th>
              <th width="15%">Action </th>
            </thead>
            <tbody>
              <?php  if(!empty($promo_codes)){
                $i = 1;

                foreach($promo_codes as $p){
                  $date = date('d-m-Y',strtotime($p->date_created));
                  $valid_from = date('d-m-Y',strtotime($p->valid_from));
                  $valid_to = date('d-m-Y',strtotime($p->valid_to));

                  $amount = ($p->amount)?$p->amount:'-';
                  $percentage = ($p->percentage)?$p->percentage:'-';
				  $bcount = $p->total_count - $p->used_count;
				  $testpc="";
				  if($bcount == 0)
				  {
					  $testpc = 0;
				  }
				  else
				  {
					$testpc = $bcount;  
				  }
            echo '<tr>
					  <td>'.$i++.'</td>
					  <td>'.$date.'</td>
					  <td>'.$p->promo_code.'</td>
					  <td>'.$p->total_count.'</td>
					  <td>'.$testpc.'</td>
					  <td>'.$valid_from.'</td>
					  <td>'.$valid_to.'</td>
					  <td>'.$p->min_amount.'</td>
					  <td>'.$p->type.'</td>
					  <td>'.$amount.'</td>
					  <td>'.$percentage.'</td>
					  <td id="row_'.$p->promo_id.'">
						<a class="btn btn-success btn-xs" href="'.base_url().'Promo_code/editPromo/'.$p->promo_id.'" ><i class="glyphicon glyphicon-pencil"></i></a>
						<button class="btn btn-danger btn-xs" onclick="delete_promo('.$p->promo_id.')"><i class="glyphicon glyphicon-trash"></i></button>
					  </td>
                  </tr>';
                }
              } ?>

            </tbody>
          </table>
        </div>
      </div>

    </div>
  </div>
</div>
</div> 
</div>
</div>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js1"></script>
<script type="text/javascript">

	
$('document').ready(function(){

	
	$('#generate').click(function(){
		$('#generate').text('Please wait. .');
		$.get('<?php echo base_url(); ?>promo_code/generate_new_promo',function(res){
			$('#promo_code').val(res);
			$('#generate').text('Generate New ');
		});
	});	
	$('#amount,#percentage').hide(); 
	$('#type').change(function(){            
		var type = $(this).val();
		if(type!=''){ // type not null 
		if(type == 'Amount'){
			$('#amount').show();
			$('#percentage').hide();
			$('#per_txt').val('');
		}else{
			$('#amount').hide();
			$('#percentage').show();
			$('#amt_txt').val('');
		} 
		}else{
			$('#amount,#percentage').hide();         
			$('#per_txt,#amt_txt').val('');
		}
	});
	$('#new_form').submit(function(){

		$('#btnSave').text('saving...'); //change button text
		$('#btnSave').attr('disabled',true); //set button disable 
		var promo_id = $('#promo_id').val();
		//var url = '<?php echo base_url(); ?>promo_code/save';
		var url = '<?php echo base_url(); ?>promo_code/save';

		$.ajax({
			url : url,
			type: "POST",
			data: $(this).serialize(),
			dataType: "JSON",
			success: function(data)
			{
				if(data.status) //if success close modal and reload ajax table
				{
					var promo_code = data.promo_id;
					window.location.href = "Promo_code/editPromo/"+promo_code;
					/* $('.temp').text('Add');
					$('#new_form')[0].reset();
					$('#promo_code').val(data.promo_code);
					$('.notify').html('<div class="alert alert-success">Promo Code saved successfully</div>');
					setTimeout(function() {
					$('.notify').html('');
					window.location.reload();
					}, 1000); */
				}
				else
				{
					for (var i = 0; i < data.inputerror.length; i++) 
					{
						$('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
						$('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
					}
				}
				$('#btnSave').text('save'); //change button text
				$('#btnSave').attr('disabled',false); //set button enable 
			},
			error: function (jqXHR, textStatus, errorThrown)
			{
				$('.notify').html('<div class="alert alert-danger">Some problem occurs ! please try again</div>');
				setTimeout(function() {
					$('.notify').html('');
				}, 3000);
				$('#btnSave').text('save'); //change button text
				$('#btnSave').attr('disabled',false); //set button enable 
			}
		});

		$("input,textarea,select").on('change,keyup,blur',function(){
		$(this).parent().parent().removeClass('has-error');
		$(this).next().empty();
		}); 
		return false;
	});
	
	$('#per_txt').on('keyup',function(){        
		var per = $(this).val();
		if(per!=''){
			if(per>100){
				$(this).val('100');
			}
		}
	});
	
	$("input,textarea,select").change(function(){
		$(this).parent().parent().removeClass('has-error');
		$(this).next().empty();
	}); 
	
	function isNumber(evt) {
		evt = (evt) ? evt : window.event;
		var charCode = (evt.which) ? evt.which : evt.keyCode;
		if (charCode > 31 && (charCode < 48 || charCode > 57)) {
		  return false;
		}
		return true;
	}
	
	
});
	function delete_promo(promo_id){
		if(confirm('Are you sure to delete this promo code ?')){
			var url1 = '<?php echo base_url(); ?>promo_code/delete_promo';
			$.ajax({
				url : url1,
				type: "POST",
				data: {promo_id:promo_id},
				dataType: "JSON",
				success: function(res)
				{
					$('#row_'+promo_id).parents('tr').remove();
					$('#delete_notify').html('<div class="alert alert-success">Promo Code deleted successfully</div>');        
					setTimeout(function() {
					$('#delete_notify').html('');

					}, 1000);
				}
			});
		}
	}


	function edit(promo_id)
	{
		$("input,textarea,select").parent().parent().removeClass('has-error');
		$("input,textarea,select").next().empty();

		$('.temp').text('Edit');
		$('#view,#view_li').removeClass('in active');
		$('#add,#add_li').addClass('in active');
		$.ajax({
				url : '<?php echo base_url(); ?>promo_code/get_promo_by_id',
				type: "POST",
				data: {promo_id:promo_id},
				dataType: "JSON",
				success: function(res)
				{
					if(res){
						//alert(res.type);
						//var obj = jQuery.parseJSON(res);
						
						$('#type').val(res.type);
						if(res.type=='Amount'){
						  $('#amt_txt').val(res.amount); 
						  $('#amount').show();
						  $('#percentage').hide();
						  $('#per_txt').val(''); 
						}else if(res.type =='Percentage'){
						  $('#per_txt').val(res.percentage);  
						  $('#amount').hide();
						  $('#percentage').show();
						  $('#amt_txt').val('');
						}else{
						  $('#amount,#percentage').hide();         
						  $('#per_txt,#amt_txt').val('');
						}
						$('#valid_from').val(res.valid_from);
						$('#valid_to').val(res.valid_to)
						$('#min_amount').val(res.min_amount);
						$('#promo_code').val(res.promo_code);
						$('#promo_id').val(res.promo_id);
					}
				}
		});
	} 
	
function cancel()
{
$('.temp').text('Add');
}

	


</script>