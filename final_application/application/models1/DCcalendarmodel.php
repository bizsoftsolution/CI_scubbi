<?php
class DCcalendarmodel extends CI_Model {
 function __construct()
    {
	  parent::__construct();
	  $this->load->database();
    }
    
//**********************************************************************************************************************************************
//                                                                   [ Dive Center Leisure START ] //**********************************************************************************************************************************************

	function DCcalendarlist1()
	{
		$this->db->select("concat('L',id) id, product_name name");
		$this->db->from('tbl_dcleisure');
		 $user_id = $this->session->userdata('user_id');
		$this->db->where('user_id',$user_id);
		//$this->db->join('resources', 'resources.group_id = groups.id'); 
		//$this->db->order_by("name");
		$query = $this->db->get();

		$this->db->select("concat('C',id) id, product_name name");
		$this->db->from('tbl_dccourses');
		 $user_id = $this->session->userdata('user_id');
		$this->db->where('user_id',$user_id);
		//$this->db->join('resources', 'resources.group_id = groups.id'); 
		//$this->db->order_by("name");
		$query1 = $this->db->get();

		$this->db->select("concat('P',id) id, product_name name");
		$this->db->from('tbl_dcpackage');
		 $user_id = $this->session->userdata('user_id');
		$this->db->where('user_id',$user_id);
		//$this->db->join('resources', 'resources.group_id = groups.id'); 
		//$this->db->order_by("name");
		$query2 = $this->db->get();	

		$this->db->select("concat('G',id) id, product_name name");
		$this->db->from('tbl_dcguidedtours');
		 $user_id = $this->session->userdata('user_id');
		$this->db->where('user_id',$user_id);
		//$this->db->join('resources', 'resources.group_id = groups.id'); 
		//$this->db->order_by("name");
		$query3 = $this->db->get();

		$aa =Array
				(
				ARRAY(
						'id' => 'L',
						'name'=> 'Leisure Dive',
						//'expanded'=> 'true',
						'children'=>$query->result_array()
						),
					ARRAY(
						'id' => 'C',
						'name'=> 'Courses & Specialties',
						//'expanded'=> 'true',
						'children'=>$query1->result_array()
						),	
						ARRAY(
						'id' => 'P',
						'name'=> 'Dive Package',
						//'expanded'=> 'true',
						'children'=>$query2->result_array()
						),
						ARRAY(
						'id' => 'G',
						'name'=> 'Guided Tour',
						//'expanded'=> 'true',
						'children'=>$query3->result_array()
						)
					);
		
		
		
		$tquery = array_merge($query->result_array(), $query1->result_array(), $query2->result_array());
		echo json_encode($aa);
	}

	function DCeventslist()
	{
		$this->db->select('b.id id, b.booking_no text, b.checkin start, date_format(DATE_ADD(b.checkout,INTERVAL 1 DAY),\'%Y-%m-%d\') end, concat(\'L\',p.product_id) resource, concat(\'Booking: <br/>\',b.booking_no) bubbleHtml ');
		$this->db->from('tbl_booking_product p');
		$this->db->join('tbl_booking b','p.booking_id = b.id','left');
		 $user_id = $this->session->userdata('user_id');
		$this->db->where('b.dive_id',$user_id);
		$this->db->where('p.table_name','tbl_dcleisure');
		$this->db->where('b.checkout >= NOW()',null);
		//$this->db->join('resources', 'resources.group_id = groups.id'); 
		//$this->db->order_by("name");
		$query = $this->db->get();

		$this->db->select('b.id id, b.booking_no text, b.checkin start, date_format(DATE_ADD(b.checkout,INTERVAL 1 DAY),\'%Y-%m-%d\') end, concat(\'C\',p.product_id) resource, concat(\'Booking: <br/>\',b.booking_no) bubbleHtml ');
		$this->db->from('tbl_booking_product p');
		$this->db->join('tbl_booking b','p.booking_id = b.id','left');
		 $user_id = $this->session->userdata('user_id');
		$this->db->where('b.dive_id',$user_id);
		$this->db->where('p.table_name','tbl_dccourses');
		$this->db->where('b.checkout >= NOW()',null);
		//$this->db->join('resources', 'resources.group_id = groups.id'); 
		//$this->db->order_by("name");
		$query1 = $this->db->get();

		$this->db->select('b.id id, b.booking_no text, b.checkin start, date_format(DATE_ADD(b.checkout,INTERVAL 1 DAY),\'%Y-%m-%d\') end, concat(\'P\',p.product_id) resource, concat(\'Booking: <br/>\',b.booking_no) bubbleHtml ');
		$this->db->from('tbl_booking_product p');
		$this->db->join('tbl_booking b','p.booking_id = b.id','left');
		 $user_id = $this->session->userdata('user_id');
		$this->db->where('b.dive_id',$user_id);
		$this->db->where('p.table_name','tbl_dcpackage');
		$this->db->where('b.checkout >= NOW()',null);
		//$this->db->join('resources', 'resources.group_id = groups.id'); 
		//$this->db->order_by("name");
		$query2 = $this->db->get();

		$tquery = array_merge($query->result_array(), $query1->result_array(), $query2->result_array());
		echo json_encode($tquery);
	}


	function setProdAvailability($sdate,$srctab,$prodid,$dtype) {
	
		 $user_id = $this->session->userdata('user_id');
		$resultDive = 0;
		$this->db->select('*');
		$this->db->from('tbl_booking_availability');
		$this->db->where('bookeddate',$sdate);
		$this->db->where('user_id',$user_id);
		$this->db->where('product_id',$prodid);
		$this->db->where('table_name',$srctab);
		$paquery = $this->db->get();		
		$pares = $paquery->result();
			if($paquery->num_rows() != 0) 
			{
									//echo "1";
				foreach($pares as $upres)
				{
					// echo $upres22->booked_dives;
					$udata=array('day_type'=>$dtype );
					$this->db->where('id',$upres->id);
					if($this->db->update('tbl_booking_availability ',$udata))
					{
						$resultDive = 1;								
					}
				}
			}else{


				$this->db->select('*');
				$this->db->from($srctab);
				$this->db->where('id',$prodid);
				$pdquery = $this->db->get();		
				$pdres = $pdquery->result();
				if($pdquery->num_rows() != 0) 
				{
					foreach($pdres as $proddet)
					
					$inserAvalability = array(
					'bookeddate' => $sdate,
					'booked_dives' => 0,
					'table_name' => $srctab,
					'user_id' => $user_id,
					'product_name' => $proddet->product_name,
					'day_type' => $dtype,
					'day_max' => (is_numeric($proddet->product_max_day) ? $proddet->product_max_day : 999) ,
					'product_id' => $prodid
					); 
					if($this->db->insert('tbl_booking_availability', $inserAvalability))
					{
						$resultDive = 1;
					}


				}
																	//echo "2";
			}
			if($resultDive == 1)
			{
				return "updated";
			}
	
	}


	function get_product($table = null)
	{
	 $this->db->select('id, product_name');
	 
	 if($table != NULL){
		 $user_id = $this->session->userdata('user_id');
			$this->db->where('user_id', $user_id);
	 }
	
	 
	 $query = $this->db->get($table);
	 
	 $cities = array();
	 
	 if($query->result()){
	 foreach ($query->result() as $city) {
	 $cities[$city->id] = $city->product_name;
	 }
	 return $cities;
	 }else{
	 return FALSE;
	 }
	}
	
}
?>
