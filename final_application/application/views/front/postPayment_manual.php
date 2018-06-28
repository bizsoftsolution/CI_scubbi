		<script>

</script>
<?php

require_once 'IPay88.class.php';

$ipay88 = new IPay88('M03209');

$ipay88->setMerchantKey('cr7kIrLF98');

$ipay88->setField('PaymentId', 2);
$ipay88->setField('RefNo', $this->input->post('RefNo'));
$ipay88->setField('Amount', '1.00');
$ipay88->setField('Currency', 'MYR');
$ipay88->setField('ProdDesc', 'Testing');
$ipay88->setField('UserName', 'Your name');
$ipay88->setField('UserEmail', 'email@example.com');
$ipay88->setField('UserContact', '0123456789');
$ipay88->setField('Remark', 'Some remarks here..');
$ipay88->setField('Lang', 'utf-8');
$ipay88->setField('ResponseURL', 'http://scubbidivingportal.tk/Customer/bookingInfo2');

$ipay88->generateSignature();

$ipay88_fields = $ipay88->getFields();

print_r($_REQUEST);
echo( '<br> User:' . $this->session->userdata('user_id'));
//echo("<br>Dummy Rec:" . $dummyrec . " > ");

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
		<body>
			<form class="form-horizontal" name="iPay" action="<?php echo Ipay88::$epayment_url; ?>" method="POST" >
            <div class="container-fluid">
			    <?php foreach ($ipay88_fields as $key => $val): ?>
          <tr>
           
            <td><input type="hidden" name="<?php echo $key; ?>" value="<?php echo $val; ?>" /></td>
          </tr>
        <?php endforeach; ?>
					<input type="submit" class="btn btn-danger" name="submit_booking_data" value="PROCEED">
					</div>
				</div>
			</div>
			</form>
		</body>	
		<?php
				}
			else
			{
				redirect('Customer');
			}
		?>
		