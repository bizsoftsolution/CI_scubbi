 		
		<link href='<?php echo base_url(); ?>assets/calendar/css/fullcalendar.css' rel='stylesheet' />
		<link href='<?php echo base_url(); ?>assets/calendar/css/fullcalendar.print.css' rel='stylesheet' media='print' />
		<script src='<?php echo base_url(); ?>assets/calendar/js/moment.min.js'></script>
		<script src='<?php echo base_url(); ?>assets/calendar/js/jquery.min.js1'></script>
		<script src='<?php echo base_url(); ?>assets/calendar/js/jquery-ui.min.js'></script>
		<script src='<?php echo base_url(); ?>assets/calendar/js/fullcalendar.min.js'></script>
		<!--<script>

	$(document).ready(function() {

		var zone = "05:30";  //Change this to your timezone

	
	$.ajax({
		url: '<?php echo base_url('Customer/paymentInfo_details'); ?>',
        type: 'POST', // Send post data
        data: 'type=fetch',
        async: false,
        success: function(s){
        	json_events = s;
        }
	});


		$('#calendar').fullCalendar({
			events: JSON.parse(json_events),
			//events: [{"id":"14","title":"New Event","start":"2015-01-24T16:00:00+04:00","allDay":false}],
			utc: true,
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,agendaWeek,agendaDay'
			},
			editable: true,
			droppable: true, 
			slotDuration: '00:30:00',

		});

	function getFreshEvents(){
		$.ajax({
			url: '<?php echo base_url('Customer/paymentInfo_details'); ?>',
	        type: 'POST', // Send post data
	        data: 'type=fetch',
	        async: false,
	        success: function(s){
	        	freshevents = s;
	        }
		});
		$('#calendar').fullCalendar('addEventSource', JSON.parse(freshevents));
	}
	});

</script> !-->
<?php

		 $this->db->select('count(*) as cnt');
		 $this->db->where('sessionid',$this->session->userdata('scubbi_sessid'));
		 $this->db->from('tbl_dummy_cart_product');
		 $query = $this->db->get();
		 $res = $query->result_array();
		if ($res[0]['cnt'] == 0) {
?>
<script type="text/javascript">
$(document).ready(function(){
	var x = history.length;
    if (x <= 1 ) {
		$("#goback").text("Close!");
	}	
});

function goBack() {
  window.opener.location.reload(true);
  window.close();
}
</script>

            <div class="container" style="margin:10% 0 0 0;">
			
                <div class="col-md-3">
				</div>
               
                <div class="col-md-6">

					<img src="<?php echo base_url(); ?>assets/frontend/nodata-found.jpg" class="img-responsive">
					<br>
            <div style="text-align:center;" >
            There are no products in the cart!<br>&nbsp;<br>
					<button id="goback" class="btn btn-danger" onclick="goBack()"><h3>Close</h3></button><br>&nbsp;<br>&nbsp;
			</div>

<?php

		} else {



$country_code="";
			//--------------------------------- Booking Number Generation------------------------
			$countryrow = $this->db->get_where('tbl_dcprofile', array('user_id' => $diveid))->result();
			foreach($countryrow as $rowCountry)
			{
				$country_id=$rowCountry->dccountry;
				$countryCode = $this->db->get_where('tbl_country', array('country_id' => $country_id))->result();
				foreach($countryCode as $rowCountryCode)
				{
					$country_code = $rowCountryCode->country_code;
				}
			}
			$shortYear = date("y");
			$numericMonth = date("m");
			$alphabet = "0123456789";
			$pass = array(); //remember to declare $pass as an array
			$alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
			for ($i = 0; $i < 6; $i++) 
			{
				$n = rand(0, $alphaLength);
				$pass[] = $alphabet[$n];
			}
			$psw_gen = implode($pass); //turn the array into a string
			$booking_num = "S".$country_code.$shortYear.$numericMonth.$psw_gen;


require_once 'IPay88.class.php';

$ipay88 = new IPay88('M03208');

$ipay88->setMerchantKey('G37SmzdRQ5');

$ipay88->setField('PaymentId', 2);
$ipay88->setField('RefNo', $booking_num);
$ipay88->setField('Amount', '1.00');
$ipay88->setField('Currency', 'myr');
$ipay88->setField('ProdDesc', 'Testing');
$ipay88->setField('UserName', 'Your name');
$ipay88->setField('UserEmail', 'email@example.com');
$ipay88->setField('UserContact', '0123456789');
$ipay88->setField('Remark', 'Some remarks here..');
$ipay88->setField('Lang', 'utf-8');
$ipay88->setField('ResponseURL', 'https://www.scubbi.com/Customer/bookingInfo');

$ipay88->generateSignature();

$ipay88_fields = $ipay88->getFields();

?>		 
		 
		<!--section class="dashboard-menu dashboard-menu-2 light-blue" style="margin: 60px 0 0 0;">
            <div class="container" style="width:100%;padding:5px 0 0 3px">
               <div class="row">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                     <div class="dashboard-menu-container" style="background-color: #66ffff;">
                        <ul>
                           <li>
                              <a href="<?php echo base_url('Customer/customerDashboard'); ?>">
                                 <div class="menue-name"> Home </div>
                              </a>
                           </li>
                           <li>
                              <a href="<?php echo base_url('Customer/customerProfile'); ?>">
                                 <div class="menue-name">Profiles</div>
                              </a>
                           </li>
                           <li>
                              <a href="<?php echo base_url('Customer/customerMydiveTrips'); ?>">
                                 <div class="menue-name">My Dive Trips</div>
                              </a>
                           </li>
                           <li>
                              <a href="<?php echo base_url('Customer/customerDashboard'); ?>">
                                 <div class="menue-name">My Messages</div>
                              </a>
                           </li>
                           <li>
                              <a href="<?php echo base_url('Customer/customerDivecredits'); ?>">
                                 <div class="menue-name">Dive Credits</div>
                              </a>
                           </li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </section-->
			<?php 
				if($this->session->userdata('user_id')!='')
				{
			?>
			<section class="dashboard light-blue" style="margin: 120px 0 0 0;">
			<form class="form-horizontal" action="<?php echo base_url(); ?>Customer/postPayment" method="POST" onsubmit="return check_agree(this);">
            <div class="container-fluid">
               <div class="row" style="background:red;">
					<div class="col-md-12" style="padding:5px 0px;">
						<div class="col-md-4"><p style="color:#fff;font-weight:bold;margin:0 0 0 10px;">Your Diving Trip Travel Date</p></div>
						<div class="col-md-4"><p style="color:#fff;font-weight:bold;"><?php echo $sd; ?> - <?php echo $ed; ?></p></div>
						<div class="col-md-4">&nbsp;</div>
					</div>
			   </div>
			    <?php foreach ($ipay88_fields as $key => $val): ?>
          <tr>
           
            <td><input type="hidden" name="<?php echo $key; ?>" value="<?php echo $val; ?>" /></td>
          </tr>
        <?php endforeach; ?>
			</div><br>
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-8">
						<div class="panel-group">
							<div class="panel panel-default">
							  <div class="panel-heading" style="font-size:17px;font-weight:bold;">
							  Select Leisure Dive Date (Boat night dive 2 trips)</div>
								
							  <div class="panel-body">
								<div class="row">
									<style>
										 table {
										  background: #fff;
										  border-collapse: collapse;
										  color: #222;
										  font-family: 'PT Sans', sans-serif;
										  font-size: 13px;
										  width: 100%;
										}
										td {
										  border: 1px solid #ccc;
										  
										  line-height: 22px;
										 
										}
										tr:first-child td {
										  color: #222;
										  
										}
									</style>
									
									<!--p>
										<div id='calendar'></div>
										<div style='clear:both'></div>
									</p-->
									<div class="table-responsive">
									<table class="table-bordered">
										<tr>
											<td style="color:red;padding:10px;">Start Date : </td>
											<td><?php echo $sd; ?>
											<input type="hidden" value="<?php echo $sd; ?>" name="checkindate" >
											</td>
										</tr>
										<tr>
											<td style="color:red;padding:10px;">End Date : </td>
											<td><?php echo $ed; ?>
											<input type="hidden" value="<?php echo $ed; ?>" name="checkoutdate" >
											</td>
										</tr>
										<tr>
											<td style="color:red;padding:10px;">No of Days : </td>
											<td>
											<?php echo $nod; ?>
											<input type="hidden" value="<?php echo $diveid; ?>" name="diveid" >
											</td>
										</tr>
										<tr>
											<td style="color:red;padding:10px;">No of Person : </td>
											<td><?php echo $np; ?>
											<input type="hidden" value="<?php echo $np; ?>" name="noofperson" >
											</td>
										</tr>
									</table>
									</div>
								</div>
							  </div>
							</div>
						</div>
						<div class="panel-group">
							<div class="panel panel-default">
							  <div class="panel-heading" style="font-size:17px;font-weight:bold;">
							 Passenger Details</div>
								
								<div class="panel-body">
									<div class="row">
									
									<?php 
										$noofpersons = $np;
										for($i=1; $i<=$noofpersons; $i++)
										{
									?>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
										<label class="control-label col-sm-5" for="text">Title:</label>
										<div class="col-sm-7">
										 <select class="form-control" name="title[]">
											<option value="">Select Title</option>
											<option value="Mr">Mr.</option>
											<option value="Mrs">Mrs.</option>
											<option value="Miss">Miss.</option>
										  </select>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-5" for="text">First Name:</label>
										<div class="col-sm-7">
										  <input type="text" class="form-control" id="text" name="firstname[]" value="">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-5" for="text">Surname:</label>
										<div class="col-sm-7">
										  <input type="text" class="form-control" id="text" name="surname[]" value="">
										</div>
									</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label col-sm-5" for="text">Email Address:</label>
												<div class="col-sm-7">
												  <input type="email" class="form-control" id="text" name="email[]" value="">
												</div>
											</div>
											<div class="form-group">
												<label class="control-label col-md-5" for="text">Mobile Number:</label>
												<div class="col-md-2" style="padding:0px;">
												  <select class="form-control" name="countrycode[]">
													<option value="(+60)">+60</option>
												  </select>
												</div>
												<div class="col-md-4" style="padding:0px;">
												 <input type="text" class="form-control" id="text" name="mobilenumber[]" value="">
												</div>
											</div>
											
										</div>
									</div>
									<hr>
									<?php 
										}
									?>
								</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="row" style="background: red;padding:10px 0px;">
							
							<div class="col-md-12"><p style="color:#fff;">Enter Promo Code</p></div>
							<div class="col-md-8"><input type="text" class="form-control" id="text"></div>
							<div class="col-md-4 text-right"><input type="submit" class="btn btn-danger" value="Verify" style="background: #ddd;width:100%;color:#000;"></div>
							
						</div><br>
						<div class="row">
						<table>
						<?php
								$resultOutput = '';
		  $this->db->select('*');
		 $this->db->from('tbl_dummy_cart_product');
		$this->db->where('sessionid',$this->session->userdata('scubbi_sessid'));
		 $query = $this->db->get();
		 $res = $query->result();
		// $res = $query->result();
		 $total = 0;
		 
		//	$resultOutput ='<tr style="color:red;font-weight:bold"><td colspan="4">'.$data1.'</td></tr>'; 
		 
			 $product_id[]="";
			 $table_name[]="";
			 $a = 1;
		 foreach($res as $rrow)
		 {
			 $product_id[$a] = $rrow->product_id;
			 $table_name[$a] = $rrow->table_name;
			 
		 	$dummyid = $rrow->dummy_id;
			 $resultOutput = $resultOutput.'
							<tr>
								<td style="padding:3px;">'.$rrow->diverid.'</td>
								<td style="padding:3px;">'.$rrow->product_name.'</td>
								<td style="padding:3px;">'.$rrow->qty.'&nbsp;X&nbsp;'.$rrow->price.'&nbsp;&nbsp;</td>
								<td style="padding:3px;">'.number_format($rrow->qty * $rrow->price,2).'</td>
								
								
							</tr>
					
			 ';
			 $total=$total + $rrow->qty * $rrow->price;
			$this->db->select('*');
			 $this->db->from('tbl_dummy_cart_product_optional');
			 $this->db->where('dummy_product_id',$rrow->id);
			 $query1 = $this->db->get();
			 $res1 = $query1->result();
			 foreach($res1 as $rrow1)
			 {
				  $resultOutput = $resultOutput.'
							<tr>
								<td style="padding:3px;">'.$rrow1->diverid.'</td>
								<td style="padding:3px;">'.$rrow1->product_name.'</td>
								<td style="padding:3px;">'.$rrow1->qty.'&nbsp;X&nbsp;'.$rrow1->price.'&nbsp;&nbsp;</td>
								<td style="padding:3px;">'.number_format($rrow1->qty * $rrow1->price,2).'</td>
								
							</tr>';
							$total=$total + $rrow1->qty * $rrow1->price;
			 }
			 $resultOutput = $resultOutput.'<tr><td>&nbsp;</td><td>&nbsp;</td><td>'.number_format($total,2).'</td><td>&nbsp;</td></tr>';
			 $a++;
		 }
		 echo $resultOutput;
		 
		 
			 
			 
		?>
		</table>
						</div>
						<div class="row" style="background: red;">
							<div class="col-md-6"><p style="color:#fff;text-align:left;">Promo Code Discount</p></div>
							<div class="col-md-6"><p style="color:#fff;text-align:right;">MYR 0.00 
							<?php 
							//$norows = count($this->cart->contents());
							//echo $norows;
							?>
							</p></div>
						</div>
						<div class="row">&nbsp;</div>
						<div class="row" style="background: red;">
							<div class="col-md-6"><p style="color:#fff;text-align:left;">Total(After Promo) </p></div>
							<div class="col-md-6"><p style="color:#fff;text-align:right;">MYR <?php echo $total; ?></p>
							
							<input type="hidden" value="<?php echo $np; ?>" name="no_of_person" />
							<input type="hidden" value="<?php echo $np; ?>" name="passenger_details" />
							<input type="hidden" value="<?php echo $diveid; ?>" name="divecenter_id" />
							<input type="hidden" value="<?php echo $sd; ?>" name="startdate" />
							<input type="hidden" value="<?php echo $ed; ?>" name="enddate" />
							<input type="hidden" value="<?php echo $nod; ?>" name="noofdays" />
							<input type="hidden" value="<?php echo $dummyid; ?>" name="dummyid" />
							<!--Grand Total under define-->
							
							<input type="hidden" value="<?php echo $total; ?>" name="grandtotal" />
							<input type="hidden" value="<?php echo count($this->cart->contents()); ?>" name="totalcartitems" />
							</div>
						</div>
					</div>
			   </div>
			</div>
			
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<div class="panel-group">
							<div class="panel panel-default">
							  <div class="panel-heading" style="font-size:17px;font-weight:bold;">
							  Cancellation Policy</div>
								
							  <div class="panel-body">
								<div class="row">
									<p style="padding:0% 1%;">The dive center will clearly set out their cancellation policy in the dive center terms.</p>
									<p style="padding:0% 1%;">The dive center will not charge a cancellation fee provided that the reservation is cancel during no charge cancellation period as set out in the dive center terms Scubbi.com as an intermediate platform play as assistance role between you and dive center </p><br>
									<?php
										$this->db->select("*");
										$this->db->from("tbl_dummy_cart_product");
										$this->db->where('sessionid',$this->sessid);
										$query12 = $this->db->get();
										$res12 = $query12->result();
										foreach($res12 as $row34)
										{	
											//echo $row34->product_id."<br>";
											//echo $row34->table_name."<br>";
											$this->db->select("*");
											$this->db->from($row34->table_name);
											$this->db->where('id',$row34->product_id);
											$query123 = $this->db->get();
											$res123 = $query123->result();
											foreach($res123 as $row341)
											{
												$this->db->select("*");
												$this->db->from("tbl_cancellation_policies");
												$this->db->where('id',$row341->cancellation_policy);
												$querya = $this->db->get();
												$resa = $querya->result();
												?>
													<ul>
												<?php
												foreach($resa as $rowa)
												{
													echo "<li><p>".$rowa->cancellation_name."</p></li>";
												}
												?>
													</ul>
												<?php
											}
										}
								
									?>
															
								</div>
							  </div>
							  <div class="panel-heading" style="font-size:17px;font-weight:bold;">
								<div class="row">
<div class="col-md-6">
<input type="checkbox" name="agree" class="agree1" id="chkPassport" value="check1"> I agree to the Cancellation Policy mentioned above and <a href="">Terms of Service.</a>
<br>
<input type="checkbox" name="agree_2" id="chkPassport1" value="check2"> I agree to receive SCUBBI's special offers and newsletter.

</div>
<div class="col-md-6">
<div id="dummy">
<p align="right" style="margin:5px 0 0 0;" class="">
<input type="submit" class="btn btn-danger" name="submit_booking_data" value="PROCEED">
</p>
</div>
</div>
</div>
								
							  </div>
							</div>
						</div>
					</div>
				</div>
			</div>
			</form>
			<script type="text/javascript">
				function check_agree (form) {
					if (form.agree.checked && form.agree_2.checked) {
						return true;
					}
					if (form.agree_2.checked) { 
						alert('I agree to the Cancellation Policy mentioned above and Terms of Service.'); 
					}
					else if (form.agree.checked) {
						alert("I agree to receive SCUBBI's special offers and newsletter.");
					}
					else {
						alert('You must agree to both!');
					}
					return false;
				}
			</script>
		</section>	
		<?php
				}
			else
			{
				?>
				<br>
				<br>
				<br>
				<br>
						<div class="col-md-2"></div>
		<div class="col-md-8">
			<div class="jumbotron text-center">
						<h1 style="text-align:center;">Please Login </h1>
						</div>
						</div>
						</div>
						<br>
				<br>
				<br>
				<br>
				<script>
				$('#login-model').modal('show');
				</script>
				<?php
			}
		}
		?>
		<!--script>
$(document).ready(function(){
var s=0;
//$("#dummy").hide();
$("#chkPassport").click(function () {
if ($(this).is(":checked")) {
//$("#dummy").show();
s = s +1;
//alert(s);
//alert("asdjkfasjkh");
if(s == 2)
{

$('#dummy').show();
}
} 
else
{
s = s - 1;
$('#dummy').hide();
}

});
$("#chkPassport1").click(function () {
if ($(this).is(":checked")) {
//$("#dummy").show();
s = s +1;
if(s == 2)
{

$('#dummy').show();
}
}
else
{
s = s - 1;
$('#dummy').hide();
}
});


});
</script-->