 		
<!--link href='<?php echo base_url(); ?>assets/calendar/css/fullcalendar.css' rel='stylesheet' />
<link href='<?php echo base_url(); ?>assets/calendar/css/fullcalendar.print.css' rel='stylesheet' media='print' />
<script src='<?php echo base_url(); ?>assets/calendar/js/moment.min.js1'></script>
<script src='<?php echo base_url(); ?>assets/calendar/js/jquery.min.js1'></script>
<script src='<?php echo base_url(); ?>assets/calendar/js/jquery-ui.min.js1'></script>
<script src='<?php echo base_url(); ?>assets/calendar/js/fullcalendar.min.js'></script-->

<link href="<?php echo base_url(); ?>assets/frontend/jquery-ui.css" rel="stylesheet" type="text/css" />
						<link href="<?php echo base_url(); ?>assets/guidedtour_datepicter/MonthPicker.min.css" rel="stylesheet" type="text/css" />
						<script src="<?php echo base_url(); ?>assets/guidedtour_datepicter/jquery-ui.min.js"></script>
						<script src="<?php echo base_url(); ?>assets/guidedtour_datepicter/jquery.maskedinput.min.js"></script>
						 <script src="<?php echo base_url(); ?>assets/guidedtour_datepicter/MonthPicker.min.js"></script>


<!-- sweet alert  -->

<script src='<?php echo base_url(); ?>assets/sweet/sweet-alert.js'></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/sweet/sweet-alert.css">

<script type="text/javascript">






// 	swal("A wild Pikachu appeared! What do you want to do?", {
//   buttons: {
//     cancel: "Run away!",
//     catch: {
//       text: "Throw Pokéball!",
//       value: "catch",
//     },
//     defeat: true,
//   },
// })
// .then((value) => {
//   switch (value) {

//     case "defeat":
//       swal("Pikachu fainted! You gained 500 XP!");
//       break;

//     case "catch":
//       swal("Gotcha!", "Pikachu was caught!", "success");
//       break;

//     default:
//       swal("Got away safely!");
//   }
// });
</script>

<!-- Sweet alert  -->
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

$chkq = $this->db->query("SELECT sessionid,product_name,sum(accom_qty/accom_basis) as basis, count(accom_basis) as cnt, accom_basis FROM `tbl_dummy_cart_product` WHERE sessionid = '". $this->sessid ."' group by sessionid, product_id, product_name, accom_basis");

$debug="No";
$comp = 0;
$count=0;
$basis=0;
$mod=0;
$bchk = 0;
$icnt = 0;
$chkres = $chkq->result();
foreach($chkres as $crow) 
{
	$comp += round($crow->basis * 10) / 10;
	$count += $crow->cnt;
	$basis += $crow->accom_basis;
	$mod = fmod($comp,1);
	$bchk += $crow->accom_basis * (round($crow->basis * 10) / 10);
	$icnt++;
}
if($count >= $this->session->userdata('noofperson'))

{

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
			$ipay88->setField('ResponseURL', 'www.scubbi.com/Customer/bookingInfo');

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
				<script src="<?php echo base_url(); ?>assets/validation.min.js"></script>
        		<form class="form-horizontal" action="<?php echo base_url(); ?>Customer/postPayment" method="POST" onsubmit="return check_agree(this);" id="register-form">
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
        								Dive Details</div>

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
										if($i == 1)
										{
										?>
										<style>
											.error {
												border: 2px solid #f00;
											}

											.valid {
												border: 2px solid #0ff;
											}
											label.error
											{
												display:none!important;
											}
										</style>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label class="control-label col-sm-5" for="text">Title:</label>
													<div class="col-sm-7">
														<select class="form-control" name="title[]" >
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
														<input type="text" class="form-control" id="text" name="firstname[]" value="" id="firstname1">
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
													<div class="col-md-3" >
														<select class="form-control" name="countrycode[]">
															<option value="(+60)">+60</option>
														</select>
													</div>
													<div class="col-md-4" >
														<input type="text" class="form-control" id="text" name="mobilenumber[]" value="">
													</div>
												</div>

											</div>
										</div>
										<hr>
										<?php 
										}
										else
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
													<label class="control-label col-sm-5" for="text">Mobile Number:</label>
													<div class="col-sm-3">
														<select class="form-control" name="countrycode[]">
															<option value="">Code</option>
															<option value="(+60)">+60</option>
														</select>
													</div>
													<div class="col-sm-4" >
														<input type="text" class="form-control" id="text" name="mobilenumber[]" value="">
													</div>
												</div>

											</div>
										</div>
										<hr>
									<?php										
										}
									}
									?>
								</div>
							</div>
						</div>
					</div>
				</div>


				<!-- Promo code  -->
				<div class="col-md-4">
					<div class="row" style="background: red;padding:10px 0px;">
						<div class="col-md-12">
							<p style="color:#fff;">Enter Promo Code</p>
						</div>
						
						<div class="col-md-8">
							<input type="text" class="form-control" id="promo_code" name="promo_code">
						</div>
						<div class="col-md-4 text-right">
							<input type="button" class="btn btn-danger" value="Verify" style="background: #ddd;width:100%;color:#000;" id="promo_button">
						</div>						
					</div>
					<br>
					<!-- Promo code ends   -->









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
							$currency="";
							foreach($res as $rrow)
							{
								$total1 = 0;
								$currency = $rrow->currency;
								$product_id[$a] = $rrow->product_id;
								$table_name[$a] = $rrow->table_name;

								$dummyid = $rrow->dummy_id;
								$resultOutput = $resultOutput.'
								<tr>
								<td style="padding:3px;">'.$rrow->diverid.'</td>
								<td style="padding:3px;">'.$rrow->product_name.'</td>
								<td style="padding:3px;">'.$rrow->qty.'&nbsp;X&nbsp;'.$rrow->price.'&nbsp;&nbsp;</td>
								<td style="padding:3px;">'.number_format($rrow->qty * $rrow->price,2).'</td>
								
								
								</tr>';
								
								$total=$total + $rrow->qty * $rrow->price;
								$total1 = $rrow->qty * $rrow->price;
								
								$this->db->select('*');
								$this->db->from('tbl_dummy_cart_product_extend');
								$this->db->where('dummy_product_id',$rrow->id);
								$query5 = $this->db->get();
								$res5 = $query5->result();
								foreach($res5 as $rrow5)
								{
									$resultOutput = $resultOutput.'<tr>
										<td style="padding:3px;">'.$rrow5->diverid.'</td>
										<td style="padding:3px;">Extend Night</td>
										<td style="padding:3px;">'.$rrow5->qty.'&nbsp;X&nbsp;'.$rrow5->price.'&nbsp;&nbsp;</td>
										<td style="padding:3px;">'.number_format($rrow5->qty * $rrow5->price,2).'</td>

									</tr>';
									$total=$total + $rrow5->qty * $rrow5->price;
									$total1=$total1 + $rrow5->qty * $rrow5->price;
								}
								
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
									$total1=$total1 + $rrow1->qty * $rrow1->price;
									 
								}
								$resultOutput = $resultOutput.'<tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>'.number_format($total1,2).'</td></tr>';
							
								$a++;
							}
							$resultOutput = $resultOutput.'<tr><td>&nbsp;</td><td>&nbsp;</td><td><b>Sub Total</b></td><td>'.number_format($total,2).'</td></tr>';
							echo $resultOutput;




							?>
						</table>
					</div>
					<div class="row" style="background: red;">
						<div class="col-md-6"><p style="color:#fff;text-align:left;">Promo Code Discount</p></div>
						<div class="col-md-6"><p style="color:#fff;text-align:right;" ><?php echo $currency; ?> <span id="disc_amount">0.00</span>
							<?php 
							//$norows = count($this->cart->contents());
							//echo $norows;
							?>
						</p></div>
					</div>
					<div class="row">&nbsp;</div>
					<div class="row" style="background: red;">
						<div class="col-md-6"><p style="color:#fff;text-align:left;">Gst Tax Value (+)</p></div>
						<div class="col-md-6"><p style="color:#fff;text-align:right;"><?php echo $currency; ?> <?php echo number_format($total * (6/100),2); ?>
							<?php 
							//$norows = count($this->cart->contents());
							//echo $norows;
							?>
						</p></div>
					</div>
					<div class="row">&nbsp;</div>
					<div class="row" style="background: red;">
						<div class="col-md-6"><p style="color:#fff;text-align:left;">Total(After Promo) </p></div>
						<div class="col-md-6"><p style="color:#fff;text-align:right;"><?php echo $currency; ?> <span id="after_promo_amount"><?php echo number_format(($total + ($total * (6/100))),2); ?></p>
							
							<input type="hidden" value="<?php echo $np; ?>" name="no_of_person" />
							<input type="hidden" value="<?php echo $np; ?>" name="passenger_details" />
							<input type="hidden" value="<?php echo $diveid; ?>" name="divecenter_id" />
							<input type="hidden" value="<?php echo $sd; ?>" name="startdate" />
							<input type="hidden" value="<?php echo $ed; ?>" name="enddate" />
							<input type="hidden" value="<?php echo $nod; ?>" name="noofdays" />
							<input type="hidden" value="<?php echo $dummyid; ?>" name="dummyid" />
							<!--Grand Total under define-->


							<!-- Promo code fields  -->
							
							<input type="hidden" value="<?php echo $total?>"  id="grand_total"/>
							<input type="hidden"  name="used_promo" id="used_promo" value="0"/>
							<input type="hidden" name="used_promo_code" id="used_promo_code"/>
							<input type="hidden" name="discount_amount" id="discount_amount"/>
							<!-- Promo code fields  -->
							<?php
							$nCurrency = "";
							$nAmount = "";
							if($this->session->userdata('dccurreny'))
							{
								$nCurrency = $this->session->userdata('dccurreny');
							}
							else
							{
								$nCurrency = "MYR";
							}
							if($nCurrency == 'MYR')
							{
								$nAmount=0;
							}
							else
							{
								$myrValueFetch = $this->db->get_where('tbl_multicurrency',array('from_cur'=>$nCurrency, 'to_cur'=>'MYR'))->row();
								
								$nAmount = $myrValueFetch->seller_amt;
							}
							?>
							<input type="hidden" value="<?php echo $nCurrency; ?>" id="currency" name="currency" />
							<input type="hidden" value="<?php echo $nAmount; ?>" id="currencyAmt" name="currency" />
							<input type="hidden" value="<?php echo $total; ?>" name="total" />
							<input type="hidden" value="<?php echo ($total * (6/100)); ?>" name="gst" />
							<input type="hidden" value="<?php echo $total + ($total * (6/100)); ?>" name="grandtotal" id="grand_total_gst"/>
							<input type="hidden" value="<?php echo count($this->cart->contents()); ?>" name="totalcartitems" />
						</div>
					</div>
					
					<div class="row" style="background-color:#c3baba;margin-top:30px;padding:10px;">
						<table class="table">
							<tr>
								<td>Price<br>(Your Currency)</td>
								<td style="text-align:right;"><span style="font-size: 18px;font-weight: bold;"><?php  echo $nCurrency; ?> <span id="totalPricetoDisplay"><?php echo number_format(($total + ($total * (6/100))),2); ?></span>*</span></td>
								
							</tr>
							<?php
							if($nCurrency !=  'MYR')
							{
								
							?>
								<tr>
									<td>Scubbi Currency<br>(in MYR)</td>
									<td  style="text-align:right;"><span style="font-size: 18px;font-weight: bold;">MYR <input type="hidden" id="currencyAfterMyrTf" name="paymentToGateway" value="<?php echo (($total + ($total * (6/100))) * $nAmount); ?>"><span id="currencyAfterMyr"><?php echo number_format((($total + ($total * (6/100))) * $nAmount),2); ?></span>*</span></td>
									
								</tr>
							<?php
							}
							?>
						</table>
						<?php
						if($nCurrency !=  'MYR')
						{
						?>
							<p style="color:#fff;">
								You'll pay in MYR currency . The Exact amount in your currency depends on when you pay, <b>Today's exchange rate: <?php  echo $nCurrency; ?> <span id="totalPricetoDisplay2"><?php echo number_format(($total + ($total * (6/100))),2); ?></span> = MYR <span id="currencyAfterMyr2"><?php echo number_format((($total + ($total * (6/100))) * $nAmount),2); ?></span></b><br>Your card issuer may change you a foreign transaction fee.
							</p>
						<?php
						}
						?>
					</div>
				</div>
			</div>
		</div>

		<script type="text/javascript">
			$(document).ready(function(){
				$('#promo_button').click(function(){

					var promo_code = $('#promo_code').val();
					var grand_total = $('#grand_total').val();
					var used_promo = $('#used_promo').val();
					var used_promo_code = $('#used_promo_code').val();
					var currency = $('#currency').val();
					var currencyAmt = $('#currencyAmt').val();
					
					
					if(used_promo == 1){						

						swal(
							'Oops...',
							"You already used "+used_promo_code+" !",
							'error'
							);

						return false;
					}


					if(promo_code == ''){					      	

						
						swal(
							'Warning !',
							"Please enter valid promo code !",
							'error'
							);


					}else{
						
						$.post('<?php echo base_url(); ?>Customer/chk_promo',
						{
							promo_code:promo_code,currency:currency
						},
						function(res){
							//alert(res);
							var obj = jQuery.parseJSON(res);
									if(obj.length==0){ // No matched data 
										
										swal(
											'Warning !',
											"Promo code you enetered is invalid!",
											'error'
											);

									}else{
										// Minimum amount validation 
										var currency = $('#currency').val();
										var amount1 ="";
										
										amount1 = (parseFloat(obj.min_amount)).toFixed(2);
										
										
										if(parseFloat(obj.min_amount) > parseFloat(grand_total) ){
											swal(
												'Warning !',
												"This promo code valid for above "+obj.min_amount+" "+currency+ "!",
												'error'
												);
										}else{
											//alert(grand_total);
											// Percentage 
											if(obj.type == 'Percentage'){

												var discount = obj.percentage;

												var discount_amount = grand_total * discount/100;
												var gst = (grand_total * 6/100);
												
												
												$('#disc_amount').text(Math.round(discount_amount* 100) / 100);
												var total_amount = parseFloat(grand_total) - parseFloat(discount_amount);
												
												var grand_to = parseFloat(gst) + parseFloat(total_amount);
												var currencyAfterMyrTf = grand_to * currencyAmt;
												
												$('#after_promo_amount').text(Math.round(grand_to * 100) / 100);
												$('#grand_total_gst').val(Math.round(grand_to * 100) / 100);
												
												$('#totalPricetoDisplay').html(Math.round(grand_to * 100) / 100);
												$('#totalPricetoDisplay2').html(Math.round(grand_to  * 100) / 100);
												$('#currencyAfterMyrTf').val(Math.round(currencyAfterMyrTf * 100) / 100 );
												$('#currencyAfterMyr').html(Math.round(currencyAfterMyrTf * 100) / 100);
												$('#currencyAfterMyr2').html(Math.round(currencyAfterMyrTf * 100) / 100);
												
												
												
												$('#discount_amount').val(Math.round(discount_amount * 100) / 100);
												$('#used_promo').val('1');
												$('#used_promo_code').val(promo_code);
												$('#promo_code').val('');
												
												swal("Success!", "Promo code "+promo_code+" applied "+discount+" % amount reduced !", "success");


											}else if(obj.type == 'Amount'){
												var discount_amount = 0;
												
													discount_amount = (parseFloat(obj.amount));
												
												
												var gst = grand_total * 6/100;
												
												$('#disc_amount').text(Math.round(discount_amount * 100) / 100);
												var total_amount = parseFloat(grand_total) - parseFloat(discount_amount);
												var grand_to = parseFloat(gst) + parseFloat(total_amount);
												
												var currencyAfterMyrTf = grand_to * currencyAmt;
												$('#currencyAfterMyrTf').val(Math.round(currencyAfterMyrTf * 100) / 100);
												$('#currencyAfterMyr').html(Math.round(currencyAfterMyrTf * 100) / 100);
												$('#currencyAfterMyr2').html(Math.round(currencyAfterMyrTf * 100) / 100);

												 //console.log('total_amount '+grand_to);
												 $('#after_promo_amount').text(Math.round(grand_to * 100) / 100);
												 $('#grand_total_gst').val(Math.round(grand_to * 100) / 100);
												 $('#totalPricetoDisplay').html(Math.round(grand_to * 100) / 100);
												 $('#totalPricetoDisplay2').html(Math.round(grand_to * 100) / 100);
												 $('#discount_amount').val(Math.round(discount_amount * 100) / 100);

												 $('#used_promo').val('1');
												 $('#used_promo_code').val(promo_code);
												 $('#promo_code').val('');

												 swal("Success!", "Promo code "+promo_code+" applied "+Math.round(discount_amount * 100) / 100+"  amount reduced !", "success");

												}
											}
										}
									// var obj = jQuery.parseJSON(res);

								});

					}
				});
			});
		</script>





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
									$res12 = $this->db->query('select product_id, table_name, count(*) as cnt from tbl_dummy_cart_product where sessionid = \'' . $this->sessid . '\' group by product_id, table_name')->result();
										/*
										$this->db->select("*");
										$this->db->from("tbl_dummy_cart_product");
										$this->db->where('sessionid',$this->sessid);
										$query12 = $this->db->get();
										$res12 = $query12->result();
										*/
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
												/*
												$cpolicy = $this->
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
												*/
												$CI =& get_instance();
												$output = $CI->rendercancellation($row341->cancellation_policy);
												echo $output;
										?>
										<input type="hidden" value="<?php echo $output; ?>" name="cancellation_policy_ipay">
										<?php
											}
										}

										?>
									
									<?php
									$res1235 = $this->db->query('select product_id, table_name, count(*) as cnt from tbl_dummy_cart_product where sessionid = \'' . $this->sessid . '\' group by product_id, table_name')->result();
										/*
										$this->db->select("*");
										$this->db->from("tbl_dummy_cart_product");
										$this->db->where('sessionid',$this->sessid);
										$query12 = $this->db->get();
										$res12 = $query12->result();
										*/
										foreach($res1235 as $row34)
										{	
											//echo $row34->product_id."<br>";
											//echo $row34->table_name."<br>";
											$this->db->select("*");
											$this->db->from($row34->table_name);
											$this->db->where('id',$row34->product_id);
											$query1234 = $this->db->get();
											$res1234 = $query1234->result();
											foreach($res1234 as $row341)
											{
												/*
												$cpolicy = $this->
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
												*/
												$CI =& get_instance();
												$output1 = $CI->renderBooking($row341->booking_policy);
												//echo $output1;
										?>
											<input type="hidden" value="<?php echo $output1; ?>" name="booking_policy_ipay">
										<?php
											}
										}

										?>
										
									</div>
								</div>
								<div class="panel-heading" style="font-size:17px;font-weight:bold;">
									<div class="row">
										<div class="col-md-6">
											
											<input type="checkbox" name="agree" class="agree1" id="chkPassport" value="check1" > Please read the terms of Service and check to agree.
											
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
		
		<script>
		$('document').ready(function() {
			
			$( "#register-form" ).validate({

			rules: {
			'title[]':{
				required: true
			},
				'firstname[]': {
			required: true,
			minlength: 3
			},
			'surname[]': {
			required: true,
			minlength: 3
			//maxlength: 15
			},
			
			'mobilenumber[]': {
			required: true,
			minlength: 9,
			//digits: true
			number: true
			},
			'email[]': {
			required: true,
			email: true
			},
			
			
			agree: {
						//digits: true,
						//required: $('#agree1').is(':checked')
						required: true,
						}
			
			
			  },
			messages: {
            'title[]': "Enter the Title",
			'firstname[]': "Enter the First Name",
			'surname[]': "Enter the Surname",
			'mobilenumber[]': "Enter the Mobile Number",
            'email[]': {
                required: "Enter your Email",
                'email[]': "Please enter a valid email address.",

            }
			}
			});

			
	});
	</script>
	
		<script type="text/javascript">
		$( "#chkPassport" ).click(function() {
			if(this.checked){
				$('#myModal').modal('show');
			}
			if(!this.checked){
				alert('Please read the terms of Service and check to agree.'); 
			}
		});
			function check_agree (form) {
				if (form.agree.checked) {
					return true;
				}
				else {
					alert('Please read the terms of Service and check to agree.'); 
				}
				return false;
			}
		</script>
	</section>	
	<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h2 class="modal-title">Terms And Conditions</h2>
        </div>
        <div class="modal-body" style="text-align:justify;">
          <p>Scubbi.com is a web base marketplace between diver and dive center, you is diver or user, dive center can be the host of provide dive service/training course/guidance tour/liveaboard package.</p>
		  <p>READ THESE TERM AND CONDITION BEFORE USING THIS WEBSITE TO BOOK AN ONLINE RESERVATION. YOUR ACTION TO USE OUR WEBSITE AND ONLINE RESERVATION SYSTEM HAVE CONFIRMS THAT YOU HAVE AGREED AND ACCEPTED THESE TERMS AND CONDITIONS. IF YOU DO NOT AGREE WITH ANY PART OF THESE TERMS AND CONDITIONS, YOU MAY NOT PROCEED TO USE ANY SERVICE OR ONLINE RESERVATION SYSTEM FROM THIS WEBSITE.</p>
		  <p>SCUBBI.COM RESERVES THE RIGHT TO AMEND OR CHANGE THESE TERMS AND CONDITIONS AT ANY TIME BY POSTING THE UPDATE TERMS ON OUR WEBSITE.THOSE AMENDMENTS WILL BECOME EFFECTIVE IMMEDIATELY UPON POSTING.</p>
		  <h4 style="color:red;font-weight:bold;">Background</h4>
		  
			<p> I) Scubbi Sdn Bhd (“Scubbi”) has developed a website (“www.scubbi.com”) and an online reservation system (“Online Reservation System”) which allow individuals (“Users”) to browse, compare, book and reserve (“Reservation”) directly with a dive center or liveaboard (“Dive Center”) including dives, diving packages, guided tours, accommodation, courses and equipments (“Diving Services”).</p>
			<p> II) By browsing, using the www.scubbi,com and its Online Reservation System, you acknowledge and agree that you have read, understood, agreed to these terms and conditions.</p>
		  <h4 style="color:red;font-weight:bold;">Scope of service</h4>
		  
		  <p>www.scubbi.com is an intermediary platform between Users and Dive Center, that allow Users to directly book any Diving Services with Dive Center through our Online Reservation System. With features list down as below:</p>
		  <p>&nbsp;&nbsp;1)&nbsp;&nbsp;Reservation that have been made through Online Reservation System will constitute a direct contract between Users and Dive Center in accordance with the terms and conditions list out in the Reservation, including but not limited to fees, cost, charge and taxes and any cancellation or other fees from Dive Center. Users are responsible for reading and understanding the Dive Center terms and conditions before Users decide to make a Reservation with the particular Dive Center</p>
		  
		  <p>&nbsp;&nbsp;2)&nbsp;&nbsp;Scubbi will not charge you for the use of our website or any of its services unless specified so.</p>
		  
		  <p>&nbsp;&nbsp;3)&nbsp;&nbsp;Information display on the website is based on the information provided by the Dive Center. The Dive Center will confirm these information provided is accurate, up-to-date and will not be misleading in any ways. Scubbi does not guarantee that all the information is accurate, complete or free from errors.</p>
		  
		  <p>&nbsp;&nbsp;4)&nbsp;&nbsp;Scubbi is not a representative of any Dive Center in our platform, Scubbi will not be responsible for all the quality, safety, suitability, affordability and service delivery from Dive Center.</p>
		 
		 <p>&nbsp;&nbsp;5)&nbsp;&nbsp;Scubbi will ask Users to comment on all aspects of the service provide by Dive Center and may post the reviews on the website</p>
		 
		 <h4 style="color:red;font-weight:bold;">Privacy</h4>
		  <p>Scubbi is committed to protect Users personal information. Scubbi will only collect, use and disclose Users personal information in accordance with the Privacy Policy. By using the www.scubbbi.com and its Online Reservation System Users confirm that they have go through the Scubbi terms and conditions and agree and confirm that term of the privacy policy is reasonable.</p>
		  <h4 style="color:red;font-weight:bold;">Prices*</h4>
		  <p>Dive Center ensure that Diving Services showed on www.scubbi.com are offered at the most affordable price available through any booking or reservation method with respect to the applicable dates, booking terms and inclusions in the Diving Services at the time of booking. Unless otherwise indicated in the Dive Center terms, all rates and prices listed through Online Reservation System include the entire cost for all services and charges related to the Diving Services, including but not limited to all surcharges, taxes and levies.</p>
		  <p>The price of Diving Services listed in www.scubbi.com is decided by Dive Center, Scubbi represents as an intermediate platform to connect both Dive Center and Users by providing an online marketplace, support, payment solution to them. In the event of any cancellation of bookings by the Users, Scubbi reserves the right to charge service fee on your total payment to cover Scubbi operations expenses.</p>
		  <p>The exchange rate on www.scubbi.com is determined on the date of payment made and will be vary due the daily fluctuation of different currency exchange rate.</p>
		  <h4 style="color:red;font-weight:bold;">Availability*</h4>
		  <p>Diving Services displayed in www.scubbi.com is available for Users to book immediately and confirm upon completing the booking process through the Online Reservation System, and</p>
		  <p>&nbsp;&nbsp;1)&nbsp;&nbsp;For Diving Services qualified in the date Users book, Dive Center agrees to provide such service only in strict accordance to the specific date Users book before.</p>
		  <p>&nbsp;&nbsp;2)&nbsp;&nbsp;Dive Center have the right to reserve to confirm the availability on specific dates with the range upon the booking request for Dive Services expressed in units other than days.</p>
		  <p>&nbsp;&nbsp;3)&nbsp;&nbsp;If Dive Center has limited availability during the date range specified in the booking, said availability will show up on a particular Dive Center page inside www.scubbi.com and Users will be notify immediately about the availability of Diving Services on the specific dates within the range so that Users can plan or choose an alternative arrangement accordingly.</p>
		  <h4 style="color:red;font-weight:bold;">Payment*</h4>
		  <p>All payment policies and its terms are set by the Dive Center. Scubbi will help facilitate the payments to the Dive Center and to its best of ability to protect and secure the payments made via our Online Reservation System.</p>
		  <h4 style="color:red;font-weight:bold;">Cancellation and booking policy*</h4>
		  <p>The Dive Center will clearly set out their own cancellation and booking policy in the Dive Center terms and condition.</p>
		  <p>During booking session, a certain percentage for deposit or full amount will be required to be paid to Dive Center to lock down the Dive Services for Users. Users upon confirmation of reservation on our Online Reservation System, Users are required to make payment to Scubbi, wherein the payment will be deposited by Scubbi to the by Dive Center.</p>
		  <p>Cancellation policy listed in www.cubbi.com also set by Dive Center. The cancellation period, amount and term & condition are all determined individually by each Dive Center. Scubbi will play as a middle role between Users and Dive Center to make sure that both party will not encounter any loss from that particular transaction.</p>
		  <p>For your information, Scubbi will charge a certain percentage of service fee on your cancellation in order to cover the Scubbi daily operation cost.</p>
		  <p>The amount that will be refunded Users by Dive Center will be limited to the payment that Users has paid to the Dive Center less any cancellation penalty and service fees due to Scubbi or Dive Center. Dive Center and Scubbi will not be responsible for other costs such as airfare, boat transportation fee, accommodation fee or any other costs that is not directly or included in the Dive Services.</p>
		  <h4 style="color:red;font-weight:bold;">Special cases</h4>
		  <p>Dive Center may reserve the right to cancel or offer an alternative date at their own discretion in the event that weather conditions on the date of the booking period is nor permissible for diving due to safety concerns.</p>
		  <p>In the event that the Dive Center is unavailable to provide the Diving Services as a result of natural disaster, tornado, volcano eruption, tsunami, flood, earthquake, or act of war, riot, and etc; the Dive Center will to the best of its abilities attempt to notify all Users of any cancellations. The Dive Center also reserves the right to any cancellation or refund terms it deems to exercise due to such act of god events and completely beyond their control.</p>
		  <h4 style="color:red;font-weight:bold;">Responsibility</h4>
		  <p>Since Users are booking the Diving Services through the Online Reservation System, Users hereby agreed that Users have reviewed all the standard and requirements of Dive Center, including minimum diving certificate requirement, diving insurance requirement, personal information that Dive Center need Users to provide and forms that Dive Center requests Users to sign such as medical statement, liability release or assumption of risk agreement forms. As a diver you are responsible for understanding and complying with all the requirements stated by Dive Center before you make a reservation.</p>
		  <p>Anyone who failed to comply with the requirements may lead to your inability to enjoy the dive service and may cause late cancellation fee to be charge to Users.</p>
		  <h4 style="color:red;font-weight:bold;">Communication</h4>
		  
		  <p>www.scubbi.com provides a direct communication tool to allow Users to communicate with Dive Center to request additional information/inquiry, or to confirm reservation details. Scubbi is not responsible for verifying the accuracy of information provided by the Dive Center. Scubbi has a customer support team, which Users may contact or send their enquiry via our customer support email (email address) or online chat.</p>
		  
		  <h4 style="color:red;font-weight:bold;">Promotion</h4>
		  <p>Scubbi may issue promotion codes applicable to eligible Diving Services from time to time. Promotion codes can be redeemed by entering the code in the appropriate field during the booking procedure. If the promotion code does not apply on the Diving Services selected during the reservation process, a message will be display and outline the limit of the use of the promotion code.</p>
		  <p>Scubbi reserve the right to modify, cancel or postpone the promotion code at any time. Discounts and rebate are applicable only to the service provided by Scubbi. The promotion may be provided directly by Dive Center or from Scubbi.</p>
		  
		  <h4 style="color:red;font-weight:bold;">Disclaimer</h4>
		  <p>Scubbi have no warranty, representation, guarantee, expressed, implied or statutory with respect to the website, Online Reservation System, Dive Center information, Dive Center terms or others.</p>
		  <p>Scubbi will not be responsible or any entities affiliated with such as companies, directors, employees or agents be liable for any cost, loss, damage or injury for anyone, including without limiting the foregoing, cost, loss, damage or injury related to:</p>
		  <p>&nbsp;&nbsp;1)&nbsp;&nbsp;viruses or harmful components in software on the website, interruption, delay, or fail to use the website or system, and damage to computer equipment.</p>
		  <p>&nbsp;&nbsp;2)&nbsp;&nbsp;Inaccurate, incomplete, unreliable and misleading Dive Center information .</p>
		  <p>&nbsp;&nbsp;3)&nbsp;&nbsp;Implied of warranties and conditions of merchantability, fitness for a particular purpose.</p>
		  <p>&nbsp;&nbsp;4)&nbsp;&nbsp;Any act or omission of the Dive Center or its directors, officers, agents and employees including but not limited to any and all claim related to reservation or Dive Center Diving Services.</p>
		  
		  
		  <h4 style="color:red;font-weight:bold;">Personal use only</h4>
		  <p>Users agree that Users will not use www.scubbi.com or Online Reservation System for any purpose other than personal, non-commercial use. Users will not use the information for a competitive use and will not copy, display, download, re-sell, or deep link any information, content, service, product, image or software on the website without permission from Scubbi.</p>
		  <h4 style="color:red;font-weight:bold;">Intellectual Property</h4>
		  <p>Scubbi is the exclusive owner of all the right, title, content and interest in and all intellectual property with respect to the www.scubbi.com and its Online Reservation System. Scubbi reserve the right to remove Users reviews or comments form www.scubbi.com in such event that may be misleading or deemed to be offensive.</p>
		  <h4 style="color:red;font-weight:bold;">Legal structure and law</h4>
		  <p>Scubbi is a company that comply with the laws of Malaysia. These terms and conditions shall be applied in accordance with the law and regulation in Malaysia.</p>
		  
		  
		  
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  </div>
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
}
else
{
	?>
	<script>
		var x=confirm('Please Select Products for All the persons');
		if(x){
			window.opener.location.reload(true);
			window.close();
		}
					 //alert("count");
					 
					</script>

					<?php
			
				}
				?>
