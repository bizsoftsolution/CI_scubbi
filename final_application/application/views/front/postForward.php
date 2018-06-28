		<script>

</script>
<?php

$formValues = $this->input->post(NULL, TRUE);
//foreach($formValues as $key => $value)
//{
//}
//echo( '<br> User:' . $this->session->userdata('user_id'));
//echo("<br>Dummy Rec:" . $dummyrec . " > ");
echo("<br> If the page does not automatically advance to payment gateway, please press [Next] ...");
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
		<body onload="setTimeout(function() { document.iPay.submit() }, 500)">
			<form class="form-horizontal" name="forward" action="<?php echo $forward; ?>" method="POST" >
            <div class="container-fluid">
			    <?php foreach ($ipay88_fields as $key => $val): ?>
          <tr>
           
            <td><input type="hidden" name="<?php echo $key; ?>" value="<?php echo $val; ?>" /></td>
          </tr>
        <?php endforeach; ?>
					<input type="submit" class="btn btn-danger" name="submit_forward_data" value="PROCEED">
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
		