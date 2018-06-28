<?php

require_once 'IPay88.class.php';

$ipay88 = new IPay88('M03209');

$response = $ipay88->getResponse();
//var_dump($response);
$estatus = $_REQUEST["Status"];
echo( "Status:" . $response['status'] . " >> " . $estatus);
?>
<div class="container" style="margin: 140px 0 120px 0;">
	<div class="row">
	 
<div class="col-md-2"></div>
		<div class="col-md-8">
			<div class="jumbotron text-center">
  <?php if ($response['status']): ?>
 <p>Your transaction Success.</p>
	
	
	<?php
		$resultDive = 0;
		$this->db->select('*');
		$this->db->from('tbl_dummy_cart');
		$query = $this->db->get();
		$res = $query->result();
		foreach($res as $rrow)
		{	$booking_num="";
			if ($response){
				//foreach ($response['data'] as $key )
				//{
					$booking_num=$response['data']['RefNo'];
					//echo $booking_num;
				//}
			}
			//--------------------------------- Booking Number Generation------------------------
			$data = array(
				'booking_no' => $booking_num,
				'checkin' => $rrow->check_in,
				'checkout' => $rrow->check_out,
				'no_of_persons' => $rrow->no_of_persons,
				'dive_id' => $rrow->dive_id,
				'grand_total' => $rrow->grand_total,			 
				'customer_id' => $this->session->userdata('user_id')			 
			 );
			 if ($this->db->insert('tbl_booking', $data)) 
			 {
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
						'booking_id' => $rrow1->dummy_id,
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
													'booking_id' => $rrow2->dummy_id,
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