		<script>

</script>
<?php
$bpolicy = 'BOOKING POLICY: '.strip_tags($booking_policy_ipay); 
$cpolicy = 'CANCELLATION POLICY: '.strip_tags($cancellation_policy_ipay); 
$policy = $bpolicy.$cpolicy;
require_once 'IPay88.class.php';

			$ipay88 = new IPay88('M03208');

			$ipay88->setMerchantKey('G37SmzdRQ5');

			$ipay88->setField('PaymentId', 2);
			$ipay88->setField('RefNo', $booking_no);
			$ipay88->setField('Amount', '1.00');
			$ipay88->setField('Currency', 'myr');
			$ipay88->setField('ProdDesc', $product_desc);
			$ipay88->setField('UserName', $customer_name);
			$ipay88->setField('UserEmail', $customer_email);
			$ipay88->setField('UserContact', $customer_phone);
			$ipay88->setField('Remark', $policy);
			$ipay88->setField('Lang', 'utf-8');
			
$ipay88->setField('ResponseURL', 'https://www.scubbi.com/Customer/bookingInfo2');

$ipay88->generateSignature();

$ipay88_fields = $ipay88->getFields();
//var_dump($ipay88_fields);
//print_r($_REQUEST);
//echo( '<br> User:' . $this->session->userdata('user_id'));
//echo("<br>Dummy Rec:" . $dummyrec . " > ");
echo("<br> If the page does not automatically advance to payment gateway, please press [iPay] ...");
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
/*
		<body onload="setTimeout(function() { document.iPay.submit() }, 500)">

*/
			?>
		<body onload="setTimeout(function() { document.iPay.submit() }, 2)">
		<div class="row" style="margin:150px">
			<div class="col-md-4">
			</div>
			<div class="col-md-4">
				<form class="form-horizontal" name="iPay" action="<?php echo Ipay88::$epayment_url; ?>" method="POST" >
					<div class="container-fluid">
						<?php foreach ($ipay88_fields as $key => $val): ?>
							<tr>
								<td><input type="hidden" name="<?php echo $key; ?>" value="<?php echo $val; ?>" /></td>
							</tr>
						<?php endforeach; ?>
						
					</div>
				</form>
			</div>
			<div class="col-md-4">
			</div>
			<hr>
			</div>
			<div class="separator"></div>
		</body>		
		<?php
				}
			else
			{
				redirect('Customer');
			}
		?>
		