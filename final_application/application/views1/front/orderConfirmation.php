<?php

require_once 'IPay88.class.php';

$ipay88 = new IPay88('M03209');

$response = $ipay88->getResponse();

$merchantcode= $_REQUEST["MerchantCode"];
$paymentid= $_REQUEST["PaymentId"];
$refno= $_REQUEST["RefNo"];
$amount= $_REQUEST["Amount"];
$ecurrency= $_REQUEST["Currency"];
$remark= $_REQUEST["Remark"];
$transid= $_REQUEST["TransId"];
$authcode= $_REQUEST["AuthCode"];
$estatus= $_REQUEST["Status"];
$errdesc= $_REQUEST["ErrDesc"];
$signature= $_REQUEST["Signature"];

echo( "Status:" . $estatus);
?>
<div class="container" style="margin: 140px 0 120px 0;">
	<div class="row">
	 
<div class="col-md-2"></div>
		<div class="col-md-8">
			<div class="jumbotron text-center">
  <?php if ($estatus==1): ?>
 <p>Your transaction Success.</p>
	
	
	<?php
		$resultDive = 0;
		$this->db->select('*');
		$this->db->from('tbl_dummy_cart');
		$query = $this->db->get();
		$res = $query->result();
		foreach($res as $rrow)
		{	$booking_num="";
			if  ($estatus==1) { //($response){
				//foreach ($response['data'] as $key )
				//{
					$booking_num=$refno;  //$response['data']['RefNo'];
					//echo $booking_num;
				//}
			}
			//--------------------------------- Booking Number Generation------------------------
			$dc_id = $rrow->dive_id;
			$data = array(
				'booking_no' => $booking_num,
				'checkin' => $rrow->check_in,
				'checkout' => $rrow->check_out,
				'no_of_persons' => $rrow->no_of_persons,
				'dive_id' => $rrow->dive_id,
				'grand_total' => $rrow->grand_total,			 
				'customer_id' => $this->session->userdata('user_id'),
				'pg_paymentid' => $paymentid,
				'pg_refno' => $refno,
				'pg_amount' => $amount,
				'pg_currency' => $ecurrency,
				'pg_remark' => $remark,
				'pg_transid' => $transid,
				'pg_authcode' => $authcode,
				'pg_status' => $estatus,
				'pg_errdesc' => $errdesc,
				'pg_signature' => $signature			 
			 );
			 if ($this->db->insert('tbl_booking', $data)) 
			 {
				$bookingrecid = $this->db->insert_id();
				//Booking Product Insert------------------
				$this->db->select('*');
				$this->db->from('tbl_dummy_cart_product');
				$this->db->where('dummy_id',$rrow->id);
				$query1 = $this->db->get();
				$res1 = $query1->result();
				//var_dump($res1);
				foreach($res1 as $rrow1)
				{
					 $data1 = array(
						'product_id' => $rrow1->product_id,
						'product_name' => $rrow1->product_name,
						'qty' => $rrow1->qty,
						'price' => $rrow1->price,
						'no_of_dive' => $rrow1->no_of_dive,
						'table_name' => $rrow1->table_name,
						'booking_id' => $bookingrecid, //$rrow1->dummy_id,
						'user_id' => $rrow1->user_id
					 );
					 
					  if ($this->db->insert('tbl_booking_product', $data1)) 
					  {
						 
							$this->db->select('*');
							$this->db->from('tbl_dummy_cart_product_optional');
							$this->db->where('dummy_id',$rrow->id);
							$this->db->where('dummy_product_id	',$rrow1->id);
							$query2 = $this->db->get();
							$count_rows = $query2->num_rows();
							if($count_rows >0)
							{
								$res2 = $query2->result();
								foreach($res2 as $rrow2)
								{
									$data2 = array(
													'product_id' => $rrow2->product_id,
													'product_name' => $rrow2->product_name,
													'qty' => $rrow2->qty,
													'price' => $rrow2->price,
													'total' => $rrow2->total,
													'booking_id' => $bookingrecid, //$rrow2->dummy_id,
													'booking_product_id' => $rrow2->dummy_product_id,
													);
										if ($this->db->insert('tbl_booking_product_optional', $data2)) 
										{

											$resultDive = 2;
										}
								}
							}
							else
							{
								$resultDive = 2;
							}
						  
					  }
///-----------------Insert message conversation----------------------------------					  
					$conversation = array(
					'topic' => "Booking Ref: $refno",
					'salesrefno' => $refno,
					'dc_id' => $dc_id,
					'customer_id' => $this->session->userdata('user_id'),
					'started' => date("Y-m-d H:i:s"),
					'lastmsg' => date("Y-m-d H:i:s"),
					'lastmsgfrom' => $dc_id
					);  
					if ($this->db->insert('tbl_conversation', $conversation)) 
					{
						$threadid = $this->db->insert_id();
						$this->db->select('c.*,(select u1.first_name from user u1 where u1.user_id = c.dc_id) dcname,(select u2.first_name from user u2 where u2.user_id = c.customer_id ) custname');
						$this->db->from('tbl_conversation c');
						$this->db->where('thread_id',$threadid);
						$query = $this->db->get();
						$result = $query->result();
						foreach($result as $row1)
						{
							$custname = $row1->custname;
							$dcname = $row1->dcname;
						}
						$msgdata = array(
							'from' => $dc_id,		
							'to' => $this->session->userdata('user_id'),		
							'thread_id' => $threadid,		
							'message' => "This is a confirmation of payment received for booking ref: $refno. Reply to this conversation thread for any inquiries. Thank you for booking with us.",		
							'time' => date("Y-m-d H:i:s"),		
							'to_name' => $custname,		
							'from_name' => $dcname,		
						);
						$this->db->insert('messages', $msgdata);

					}
					  
///-----------------Insert into Tbl_booking_avalability----------------------------------					  
					  $max_product="";
					 $this->db->select('*');
					 $this->db->from($rrow1->table_name);
					 $this->db->where('id',$rrow1->product_id);
					 $no_of_dive = $this->db->get();
					 $no_of_dive1 = $no_of_dive->result();
					// var_dump($no_of_dive1);
					 foreach($no_of_dive1 as $no_of_dive2)
					 {
						if($rrow1->table_name == 'tbl_dcpackage')	
						{
							$max_product = 1;
						}
						else
						{
							
							$max_product = $no_of_dive2->max_dive_day;
						}
					 }
					 
					 
					 $this->db->select('*');
					 $this->db->from('tbl_booking_availability');
					 $this->db->where('table_name',$rrow1->table_name);
					 $this->db->where('user_id',$rrow1->user_id);
					 $this->db->where('product_id',$rrow1->product_id);
					 $query21 = $this->db->get();
					 $res21 = $query21->result(); 
					// var_dump($res21);
					if($query21->num_rows() != 0) 
					{
						
						$checkin = $rrow->check_in;
						$checkout = $rrow->check_out;

//---------------------Date Difference----------------------------------------------------

						$date1 = strtotime($checkin);
						$date2 = strtotime($checkout);
						$datediff = $date2 - $date1;
						$days_between = floor($datediff / (60 * 60 * 24));

						//echo $days_between;		
						$checkin1 = $rrow->check_in;
						$checkin1 = strtotime($checkin1);
						$slt_value =0;
						for($i=1;$i<=$days_between;$i++)
						{
						
							
							$newCheckin = date('Y-m-d', $checkin1);

							$this->db->select('*');
							$this->db->from('tbl_booking_availability');
							$this->db->where('bookeddate',$newCheckin);
							$query22 = $this->db->get();
							$res22 = $query22->result();
							if($query22->num_rows() != 0) 
							{
									//echo "1";
								foreach($res22 as $upres22)
								{
									// echo $upres22->booked_dives;
									$data22=array('booked_dives'=>$upres22->booked_dives +$max_product );
									$this->db->where('id',$upres22->id);
									if($this->db->update('tbl_booking_availability ',$data22))
									{
										$resultDive = 1;								
									}
								}
							}
							else
							{

																	//echo "2";
								$inserAvalability1 = array(
									'bookeddate' => $newCheckin,
									'booked_dives' => $max_product,
									'table_name' => $rrow1->table_name,
									'user_id' => $rrow1->user_id,
									'product_id' => $rrow1->product_id
								); 
								if($this->db->insert('tbl_booking_availability', $inserAvalability1))
								{
									$resultDive = 1;
								}
							}
							$checkin1 = strtotime("+1 day", $checkin1);

						}

						
						
						
					}
					else
					{
						
						$checkin = $rrow->check_in;
						$checkout = $rrow->check_out;
//---------------------Date Difference--------------------------------------------

						$date1 = strtotime($checkin);
						$date2 = strtotime($checkout);
						$datediff = $date2 - $date1;
						$days_between = floor($datediff / (60 * 60 * 24));

						//echo $days_between;		
						$checkin1 = $rrow->check_in;
						$checkin1 = strtotime($checkin1);
						$slt_value =0;
						for($i=1;$i<=$days_between;$i++)
						{		
							
							$newCheckin = date('Y-m-d', $checkin1);
							$inserAvalability = array(
									'bookeddate' => $newCheckin,
									'booked_dives' => $max_product,
									'table_name' => $rrow1->table_name,
									'user_id' => $rrow1->user_id,
									'product_id' => $rrow1->product_id
							); 
							if($this->db->insert('tbl_booking_availability', $inserAvalability))
							{
								$resultDive = 1;	
							}
							$checkin1 = strtotime("+1 day", $checkin1);
						}
						//echo "Row Found";

						
					}
		 
					 
				}
			}
		}
 if($resultDive == 1)
		 {
			 if($this->db->truncate('tbl_dummy_cart'))
				{
					if($this->db->truncate('tbl_dummy_cart_product'))
					{
						if($this->db->truncate('tbl_dummy_cart_product_optional'))
						{

							
							
							
							
							
							
							
						}
					}
				}
		 }
		 
	?>
	
	
	
	
	
	
	
	
  <?php else: ?>
    <p>Your transaction failed.</p>
	<?php
	if($this->db->truncate('tbl_dummy_cart'))
				{
					if($this->db->truncate('tbl_dummy_cart_product'))
					{
						if($this->db->truncate('tbl_dummy_cart_product_optional'))
						{

							
						}
					}
				}
				?>
	
  <?php endif; ?>


 
		
	
				<a href="<?php echo base_url(); ?>" class="btn btn-success" >GO Home</a>
			</div>
		</div>
		<div class="col-md-2"></div>
	</div>
</div>