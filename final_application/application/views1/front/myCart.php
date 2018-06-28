<!-- mobile-menu-area-end -->
         <section class="dashboard-menu dashboard-menu-2 light-blue" style="margin: 60px 0 0 0;">
            <div class="container" style="width:100%;padding:5px 0 0 3px">
               <div class="row">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                     <div class="dashboard-menu-container" style="background-color: #66ffff;">
                        <ul>
                           <li class="active">
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
                              <a href="<?php echo base_url('Customer/allMessages'); ?>">
                                 <div class="menue-name">My Messages</div>
                              </a>
                           </li>
                         
                           <li>
                              <a href="<?php echo base_url('Customer/customerDivecredits'); ?>">
                                 <div class="menue-name">Dive Credits</div>
                              </a>
                           </li>
<li class="signup_display" style="display:none;">
                              <a href="<?php echo base_url('Customer/logout'); ?>">
                                 <div class="menue-name">Sign out</div>
                              </a>
                           </li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </section>
		 <style>
										h1, table { text-align: center; }

table {border-collapse: collapse;  width: 70%; margin: 0 auto 5rem;}

th, td { padding: 1.5rem; font-size: 1.8rem; }

tr {background: #ddd; }

tr, td { transition: .4s ease-in; } 

tr:first-child {background: #f00;color:#fff;font-weight:bold;text-align:center; }

tr:nth-child(even) { background: #fff; }



tr:hover:not(#firstrow), tr:hover td:empty {background: #ff0; pointer-events: visible;}
tr:hover:not(#firstrow) { transform: scale(1.2); font-weight: 700; box-shadow: 0px 3px 7px rgba(0, 0, 0, 0.5);}
									</style>
         <section class="dashboard light-blue">
            <div class="container">
               <div class="row" style="background: #FFF;">
			   <h1 style="text-align:center;color: red;font-weight: 900;">My Dive Cart</h1>
			   <form action="<?php echo base_url(); ?>Customer/paymentInfo" method="POST">
			   <?php
			    $this->db->select('*');
				$this->db->from('tbl_dummy_cart');
				$query1 = $this->db->get();
				$res1 = $query1->result();
				foreach($res1 as $roww1)
				{
			   ?>
			   
			   <input type="hidden" value=" 	<?php echo $roww1->no_of_persons; ?>" id="no_of_person" name="no_of_person">
			  <input type="hidden" value="<?php echo $roww1->dive_id;?>" id="divecenter_id" name="divecenter_id">
				<input type="hidden" value="<?php echo $roww1->check_in; ?>" name="startdate" id="startdate">
				<input type="hidden" value="<?php echo $roww1->check_out; ?>" name="enddate" id="enddate">
				<input type="hidden" value="<?php echo $roww1->id; ?>" name="dummyid" id="dummyid">
				<input type="hidden" value="<?php
					$date = new DateTime(str_replace(" / ","- ",$roww1->check_in));
					$newStart = $date->format('d-m-Y');
					$date1 = new DateTime(str_replace("/ ","- ",$roww1->check_out));
					$newEnd = $date1->format('d-m-Y');
					$date1 = strtotime($newStart); //strtotime($sDate);
					$date2 = strtotime($newEnd); //strtotime($eDate);
					$datediff = $date2 - $date1;
					$days_between =  round($datediff / 86400);;
					echo $days_between;
				?>" name="noofdays">
			   
			   <?php 
			   
				}
				?>
					<table class="table" >
					
					<?php 
								
								$resultOutput = '';
								$resultOutput = $resultOutput.'
									<tr>
										<th>Product Details</th>
										<th>Qty</th>
										<th>Price</th>
										<th>Total</th>
									</tr>
								';
		 $this->db->select('*');
		 $this->db->from('tbl_dummy_cart_product');
		 $query = $this->db->get();
		 $res = $query->result();
		 $total = 0;
		 
		//	$resultOutput ='<tr style="color:red;font-weight:bold"><td colspan="4">'.$data1.'</td></tr>'; 
		 
			 
		 foreach($res as $rrow)
		 {
			 $resultOutput = $resultOutput.'
							<tr>
								<td style="padding:3px;text-align:center;">'.$rrow->product_name.'</td>
								<td style="padding:3px;text-align:center;">'.$rrow->qty.'</td>
								<td style="padding:3px;text-align:center;">'.$rrow->price.'</td>
								<td style="padding:3px;text-align:center;">'.number_format($rrow->qty * $rrow->price,2).'</td>
								
								
							</tr>
					
			 ';
			 $total=$total + $rrow->qty * $rrow->price;
			 $this->db->select('*');
			 $this->db->from('tbl_dummy_cart_product_optional');
			 $this->db->where('dummy_id',$rrow->id);
			 $query1 = $this->db->get();
			 $res1 = $query1->result();
			 foreach($res1 as $rrow1)
			 {
				  $resultOutput = $resultOutput.'
							<tr>
								<td style="padding:3px;text-align:center;">'.$rrow1->product_name.'</td>
								<td style="padding:3px;text-align:center;">'.$rrow1->qty.'</td>
								<td style="padding:3px;text-align:center;">'.$rrow1->price.'</td>
								<td style="padding:3px;text-align:center;">'.number_format($rrow1->qty * $rrow1->price,2).'</td>
								
							</tr>';
							$total=$total + $rrow1->qty * $rrow1->price;
			 }
			
		 } $resultOutput = $resultOutput.'<tr><td>&nbsp;</td><td>&nbsp;</td><td style="text-align:center;"><b>Total</b></td><td style="text-align:center;">'.number_format($total,2).'</td></tr>';
		 echo $resultOutput;
		?>	
		</table>
		
		
		
								<p style="text-align:center">
											<input type="submit" class="btn btn-success submit_button1" formtarget="_blank" value="Checkout">
										</p>
										
										</form>
							
  
                  
               </div>
            </div>
			

			 
         </section>
		 <hr style="width:100%;border:2px solid #66ffff;">