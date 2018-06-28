<?php
class Front_model extends CI_Model {
	function __construct()
    {
	  parent::__construct();
	  $this->load->database();
    }
	
	 
	function get_island($country = null)
	{
	 $this->db->select('island_id, island_name');
	 
	 if($country != NULL){
	 $this->db->where('country_id', $country);
	 }
	
	 
	 $query = $this->db->get('tbl_island');
	 
	 $cities = array();
	 
	 if($query->result()){
	 foreach ($query->result() as $city) {
		 $cities[0]="Select Islands";
	 $cities[$city->island_id] = $city->island_name;
	 }
	 return $cities;
	 }else{
	 return FALSE;
	 }
	}
	function insertReview($data)
	{
		if($this->db->insert('tbl_review', $data))
		{
		return true;
		}
		
	}
	function countryname($curty)
	{
		$this->db->select('country_name');
		$this->db->from('tbl_country');
		$this->db->where('country_id', $curty);
		$query = $this->db->get();
		return $query->result();
	}
	function islandname($islnd)
	{
		$this->db->select('island_name');
		$this->db->from('tbl_island');
		$this->db->where('island_id', $islnd);
		$query = $this->db->get();
		return $query->result();
	}
	function get_searchdetails($limit, $start)
	{
		$country = $this->input->post('scountry');
		$islands = $this->input->post('islands');
		//$checkindd = $this->input->post('checkin');
		//$checkoutdd = $this->input->post('checkout');
		//$noofpersons = $this->input->post('no_of_persons');
		
		$this->db->select("*");
		$this->db->from('tbl_dcprofile');
		$this->db->where('dccountry', $country);
		$this->db->where('dcislands', $islands);
		//$this->db->group_by('tbl_dcprofile.id');
		$this->db->limit($limit, $start);
		$query= $this->db->get();
		if ($query->num_rows() > 0) {
            //foreach ($query->result() as $row) {
               // $data[] = $row;
            //}
            return $query->result();
        }
		else{
		return "fail";
		}
	}
	
	function get_tellmemore($id)
	{
		$this->db->select('*');
		$this->db->from('tbl_island_overview');
		$this->db->where('island_id', $id);
		$query = $this->db->get();
		//return $query->result();
		if ($query->num_rows() > 0) {
            //foreach ($query->result() as $row) {
               // $data[] = $row;
            //}
            return $query->result();
        }
		else{
		return "fail";
		}
	}
	function filter_language($brandii)
	{
		$this->db->select('*');
		$this->db->from('tbl_dcprofile');
		$this->db->where_in('dclanguage',$brandii);
		//$this->db->join('resources', 'resources.group_id = groups.id'); 
		//$this->db->order_by("name");
		$query = $this->db->get();
		return $query->result();
	}
	
	function get_allDetails($id)
	{
		$this->db->select('*');
		$this->db->from('tbl_dcprofile');
		$this->db->join('tbl_dcleisure', 'tbl_dcleisure.user_id = tbl_dcprofile.user_id'); 
		$this->db->join('tbl_dccourses', 'tbl_dccourses.user_id = tbl_dcprofile.user_id'); 
		//$this->db->join('tbl_gallery', 'tbl_gallery.user_id = tbl_dcprofile.user_id'); 
		$this->db->join('tbl_dcpackage', 'tbl_dcpackage.user_id = tbl_dcprofile.user_id', 'left'); 
		$this->db->where('tbl_dcprofile.id', $id);
		$this->db->group_by('tbl_dcprofile.id');
		$result = $this->db->get();
		if ($result->num_rows() > 0) {
		return $result->result();
		}
		else
		{
			return "fail";
		}
	}
	function getDailyplan($curty, $islnd)
	{
		$this->db->select("per_day_amount");
		$this->db->where('country_id', $curty);
		$this->db->where('island_id', $islnd);	
		$query= $this->db->get('daily_plan');
		return $query->result();
	}
	
	function get_specialoffer()
	{
		$this->db->select('*');
		$this->db->from('special_offer'); 
		$this->db->join('dive_center', 'special_offer.dive_center_id = dive_center.dive_center_id'); 
		$this->db->limit(8);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
		return false;
	}
	function get_specialoffer_all()
	{
		$this->db->select('*');
		$this->db->from('special_offer'); 
		$this->db->join('dive_center', 'special_offer.dive_center_id = dive_center.dive_center_id'); 
		//$this->db->limit(8);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
		return false;
	}
	function get_splOffer()
	{
		$this->db->select('*');
		$this->db->from('special_offer'); 
		$this->db->join('dive_center', 'special_offer.dive_center_id = dive_center.dive_center_id'); 
		$this->db->limit(8);
		$query = $this->db->get();
		return $query->result();
	}
	/* public function record_count() {
	return $this->db->count_all("special_offer");
	} */

	function get_ppldestination()
	{
		$this->db->select('*');
		$this->db->from('daily_plan');
		$this->db->limit(12);
		$query = $this->db->get();
		$res = $query->result();
		return $res;	
	}
	
	function get_popularpagination($limit, $start)
	{
		$this->db->limit($limit, $start);
		$query = $this->db->get('daily_plan');
		$res = $query->result();
		return $res;
		
	}
	
	function get_guidedtour()
	{
		$this->db->select('*');
		$this->db->from('tbl_dcguidedtours'); 
		$this->db->join('tbl_dcprofile', 'tbl_dcguidedtours.user_id = tbl_dcprofile.user_id'); 
		$this->db->limit(12);
		$query = $this->db->get();
		return $query->result();
	}
	function get_slider()
	{
		$query = $this->db->get('tbl_saslider');
		$res = $query->result();
		return $res;
	}
	
	function get_divecenter()
	{
		$query = $this->db->get('product');
		$res = $query->result();
		return $res;
	}
	function get_generalinfo()
	{
		$query = $this->db->get('tbl_generalinfo');
		$res = $query->result();
		return $res;
	}
	function get_fundive()
	{
		$query = $this->db->get('tbl_fundive');
		$res = $query->result();
		return $res;
	}
	function get_courses_specialties()
	{
		$query = $this->db->get('tbl_courses');
		$res = $query->result();
		return $res;
	}
	function get_packages()
	{
		$query = $this->db->get('tbl_package');
		$res = $query->result();
		return $res;
	}
    function get_help()
	{
		$query = $this->db->get('tbl_help');
		$res = $query->result();
		return $res;
	}
	 function fetchProductDetails($data)
	 {
		$this->db->select('*');
		$this->db->from($data['table']);
		$this->db->where('id',$data['id']);
		$query = $this->db->get();
		$res = $query->result();
		return $res;
	 }
	 function checkAvalability($date,$table_name,$user_id,$product_id)
	 {
		 $this->db->select('*');
		 $this->db->from('tbl_booking_availability');
		 $this->db->where('bookeddate',$date);
		 $this->db->where('table_name',$table_name);
		 $this->db->where('user_id',$user_id);
		 $this->db->where('product_id',$product_id);
		 $query = $this->db->get();
		 $res = $query->result();
		 if ($query->num_rows() == 0) 
		 {
			 return 1;
		 }
		 else
		 {
			 
			return $res;
		 }			
	 }
	 function insertDummyProduct($data,$dummyProduct)
	 {
		 $this->db->select('*');
		 $this->db->from('tbl_dummy_cart');
		 $this->db->where('dive_id',$dummyProduct['user_id']);		
		 $query = $this->db->get();
		 $res = $query->result();
		 if ($query->num_rows() > 0) 
		 {
			  foreach ($res as $row)
			  {
				  $id= $row->id;
				  
				 //If Data Found				 
				 
				 $this->db->select('*');
				 $this->db->from('tbl_dummy_cart_product');
				 $this->db->where('table_name',$dummyProduct['table_name']);
				 $this->db->where('user_id',$dummyProduct['user_id']);		
				 $query1 = $this->db->get();
				 if ($query1->num_rows() > 0)
				 {
					 
					 //data found in same table
					 $this->db->select('*');
					 $this->db->from('tbl_dummy_cart_product');
					 $this->db->where('product_id',$dummyProduct['product_id']);
					 $this->db->where('table_name',$dummyProduct['table_name']);
					 $this->db->where('user_id',$dummyProduct['user_id']);		
					 $query2 = $this->db->get();
					 $res2 = $query2->result();
					 if ($query2->num_rows() > 0)
					 {
						  //data found in same product
						  
						foreach($res2 as $row1)
						{
							$newQty = $row1->qty + 1 ; 
							$data=array('qty'=>$newQty);
							$this->db->where('id',$row1->id);
							if($this->db->update('tbl_dummy_cart_product',$data))
							{
								return array(
								'dummy_id' => $id,
								'dummy_product_id' => $row1->id,
								'status' => '2'
							);
								
							}
						}
					}
					else
					{
						return array(
								
								'status' => '1'
							);
					}
				 }
				 else
				 {
					 //No same Table
					
					$inserProduct = array(
					'product_id' => $dummyProduct['product_id'],
					'product_name' => $dummyProduct['product_name'],
					'qty' => $dummyProduct['qty'],
					'price' => $dummyProduct['price'],
					'table_name' => $dummyProduct['table_name'],
					'total' => $dummyProduct['qty'] * $dummyProduct['price'],
					'user_id' => $dummyProduct['user_id'],
					'dummy_id' => $id
					);
					
						if($this->db->insert('tbl_dummy_cart_product', $inserProduct))
						{
							$dummy_product_id= $this->db->insert_id();
							return array(
								'dummy_id' => $id,
								'dummy_product_id' => $dummy_product_id,
								'status' => '12'
							);
						}
					 
					}
				 }
			 }
		 else
		 {
			 if($this->db->insert('tbl_dummy_cart', $data))
			{
				$id= $this->db->insert_id();
				$inserProduct = array(
							'product_id' => $dummyProduct['product_id'],
							'product_name' => $dummyProduct['product_name'],
							'qty' => $dummyProduct['qty'],
							'price' => $dummyProduct['price'],
							'table_name' => $dummyProduct['table_name'],
							'total' => $dummyProduct['qty'] * $dummyProduct['price'],
							'user_id' => $dummyProduct['user_id'],
							'dummy_id' => $id
							);
				
				if($this->db->insert('tbl_dummy_cart_product', $inserProduct))
				{
					$dummy_product_id= $this->db->insert_id();
					return array(
						'dummy_id' => $id,
						'dummy_product_id' => $dummy_product_id,
						'status' => '12'
					);
				}
			}
		 }

		 
	 }
	
	
	//---------------------------------Popular Diving Destination------------------------
	function addBecomeapartner($data)
	{
		if($this->db->insert('tbl_becomeapartner', $data))
		{
			return true;
		}
	}
		function get_populardivedestination()
	{
		$this->db->select('*');
		$this->db->from('tbl_populardivingdestination');
		$this->db->limit(12);
		$query = $this->db->get();
		$res = $query->result();
		return $res;	
	}
	function get_pdd_overview($country_id)
	{
		$this->db->select('*');
		$this->db->from('tbl_satellmemore');
		$this->db->where('country_id', $country_id);
		$query = $this->db->get();
		if($res = $query->result())
		{
			return $res;
		}
		else
		{
			return "fail";
		}
	}
	function get_divepointcoordinates($country_id)
	 {
	 $return = array();
	 $this->db->select("*");
	 $this->db->from("tbl_divepoints");
	 $this->db->join('tbl_satellmemore', 'tbl_satellmemore.country_id = tbl_divepoints.country_id');
	 //$this->db->join('tbl_satellmemore')
	 $this->db->where('tbl_divepoints.country_id', $country_id);
	 $query = $this->db->get();
	 if ($query->num_rows()>0) {
	 foreach ($query->result() as $row) {
	 array_push($return, $row);
	 }
	 }
	 return $return;
	 }
	 
	function get_divesitesOverview($id)
	{
		$this->db->select('*');
		$this->db->from('tbl_divepoints');
//		$this->db->where('island_id', $id);
		$this->db->where('id', $id);
		$query = $this->db->get();
		//return $query->result();
		if ($query->num_rows() > 0) {
            //foreach ($query->result() as $row) {
               // $data[] = $row;
            //}
            return $query->result();
        }
		else{
		return "fail";
		}
	} 
	function send_DivecenterData()
	{
		$insertdata = array(
		'topic'=>"Contact Dive Center",
		'dc_id'=>$this->input->post('dcid_popup'),
		'customer_id'=>$this->session->userdata('user_id'),
		'started'=>date("Y-m-d h:i:s"),
		'lastmsg'=>"",		
		'lastmsgfrom'=>$this->input->post('dcid_popup')
		);
		
		$this->db->insert('tbl_conversation',$insertdata);
		$id_user = $this->db->insert_id();
		//return true;
		
		$insertdata1 = array(
		'from'=>$this->input->post('dcid_popup'),
		'to'=>$this->session->userdata('user_id'),
		'thread_id'=>$id_user,
		'message'=>$this->input->post('messages_popup'),
		'time'=>date("Y-m-d h:i:s"),
		'to_name'=>$this->input->post('dcfrom_popup'),
		'from_name'=>$this->session->userdata('first_name')
		);
		
		if($this->db->insert('messages',$insertdata1))
		{
			return true;
		}
	}	
}
?>
