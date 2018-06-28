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
		if(empty($islands))
		{
			$this->db->select("*");
			$this->db->from('tbl_dcprofile');
			$this->db->where('dccountry', $country);
			
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
		else
		{
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
	}
	
	function get_tellmemore($id)
	{
		$this->db->select('*');
		$this->db->from('tbl_satellmemore');
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
		//$this->db->join('tbl_dcleisure', 'tbl_dcleisure.user_id = tbl_dcprofile.user_id'); 
		//$this->db->join('tbl_dccourses', 'tbl_dccourses.user_id = tbl_dcprofile.user_id'); 
		//$this->db->join('tbl_gallery', 'tbl_gallery.user_id = tbl_dcprofile.user_id'); 
		//$this->db->join('tbl_dcpackage', 'tbl_dcpackage.user_id = tbl_dcprofile.user_id', 'left'); 
		$this->db->where('tbl_dcprofile.id', $id);
		//$this->db->group_by('tbl_dcprofile.id');
		$result = $this->db->get(); 
		/* if ($result->num_rows() > 0) { */
			$get_user_id = $result->row();
			//echo $get_user_id->user_id;
			//exit();
			$lnrows = $this->db->get_where('tbl_dcleisure', array('user_id'=>$get_user_id->user_id, 'product_status'=>"Available"));
			$cnrows = $this->db->get_where('tbl_dccourses', array('user_id'=>$get_user_id->user_id, 'product_status'=>"Available"));
			$pnrows = $this->db->get_where('tbl_dcpackage', array('user_id'=>$get_user_id->user_id, 'product_status'=>"Available"));
			if($lnrows->num_rows() > 0 || $cnrows->num_rows() > 0 || $pnrows->num_rows() > 0)
			{
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
	
	function get_guidedtour($scountry, $tp)
	{
		if($this->input->post('search_result2'))
		{
			$this->db->select('*');
			$this->db->from('tbl_dcguidedtours');
			$this->db->join('tbl_dcprofile', 'tbl_dcguidedtours.user_id = tbl_dcprofile.user_id');
			$this->db->where('tbl_dcguidedtours.country', $scountry);
			$query = $this->db->get();
			//return $query->result();
			//return $query;
			//$travel_date="";
			//$dummy[] = "";
			foreach($query->result() as $row_query)
			{
				$travel_date = $row_query->travel_period_start_date;
				$travel_date_split = substr($travel_date, 0,7);
				//echo $travel_date_split
				//echo $tp;
				if($travel_date_split == $tp)
				{
					//echo "hai";
					//$dummy = $row_query;	
					$this->db->select('*');
					$this->db->from('tbl_dcguidedtours');
					$this->db->join('tbl_dcprofile', 'tbl_dcguidedtours.user_id = tbl_dcprofile.user_id');
					//$this->db->where('tbl_dcguidedtours.id', $row_query->id);
					$query1 = $this->db->get();
					if($query1->num_rows() > 0)
					{
						return $query1->result();
					}
					//else
					//{
						//echo "No records";
					//}
				}
				return false;
			}
		
			//return $dummy;
		}
		else
		{
			$this->db->select('*');
			$this->db->from('tbl_dcguidedtours');
			$this->db->join('tbl_dcprofile', 'tbl_dcguidedtours.user_id = tbl_dcprofile.user_id');
			//$this->db->where('tbl_dcguidedtours.country', $scountry);
			$query3 = $this->db->get();
			return $query3->result();
		}
		
		//$this->db->where('travel_period_start_date', $tp);
		//$this->db->limit(12);
		//$query = $this->db->get();
		
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
/* Dive Center Page functions */
	function getproductattr($prodid,$prefix)
	{
		switch($prefix) {
		case "L":
			$this->db->select('product_unit,max_dive_day,product_max_day,product_price');
			$this->db->from('tbl_dcleisure');
		break;
		case "C":
			$this->db->select('product_unit,max_dive_day,product_max_day,product_price');
			$this->db->from('tbl_dccourses');
		break;
		case "P":
			$this->db->select('product_unit,0,product_max_day,product_price');
			$this->db->from('tbl_dcpackage');
		break;
		}
	
		$this->db->where('id', $prodid);
		$query = $this->db->get();
		return $query->result();
	}

	function clearcart($sessid)
	{
		$this->db->where('sessionid', $sessid);
		 if($this->db->delete('tbl_dummy_cart'))
		{
			$this->db->where('sessionid', $sessid);
			if($this->db->delete('tbl_dummy_cart_product'))
			{
				$this->db->where('sessionid', $sessid);
				if($this->db->delete('tbl_dummy_cart_product_accomodation'))
				{
					$this->db->where('sessionid', $sessid);
					if($this->db->delete('tbl_dummy_cart_product_optional'))
					{
						return "cart is empty";
					}
				}
			}
		} 
	
	}

/* End Dive Center Page functions */


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
		 $res = $query->result_array();
		 if ($query->num_rows() == 0) 
		 {
			 return 1;
		 }
		 else
		 {
			 
			return $res;
		 }			
	 }
	function insertDummyProduct($data,$dummyProduct,$dummyAccom)
	{
		$currency ="";
		if($this->session->userdata('dccurreny'))
		{
			$currency  = $this->session->userdata('dccurreny');
		}
		else
		{
			$currency = "MYR";
		}
		$logtext = "Insert Cart Product \n";
		$this->db->select('*');
		$this->db->from('tbl_dummy_cart');
		$this->db->where('sessionid',$this->session->userdata('scubbi_sessid'));		
		$this->db->where('dive_id',$dummyProduct['user_id']);		
		$query = $this->db->get();
		$res = $query->result();
		if ($query->num_rows() > 0) 
		{
			//Datas in Cart 
			$logtext .= "  Cart Exist... \n";
			foreach ($res as $row)
			{
				$id= $row->id;
				$logtext .= "   checking ". $dummyProduct['table_name'] ." items ... ";
				$this->db->select('*');
				$this->db->from('tbl_dummy_cart_product');
				$this->db->where('table_name',$dummyProduct['table_name']);
				//$this->db->where('product_id',$dummyProduct['product_id']);
				$this->db->where('user_id',$dummyProduct['user_id']);		
				$this->db->where('sessionid',$this->session->userdata('scubbi_sessid'));		
				$query1 = $this->db->get();
				if ($query1->num_rows() > 0)
				{
					//data found in Same Table
					$this->db->select('*');
					$this->db->from('tbl_dummy_cart_product');
					$this->db->where('product_id',$dummyProduct['product_id']);
					$this->db->where('user_id',$dummyProduct['user_id']);		
					$this->db->where('sessionid',$this->session->userdata('scubbi_sessid'));		
					$query2 = $this->db->get();
					if ($query2->num_rows() > 0)
					{
						//data found in same table same Product 
						$this->db->select('*');
						$this->db->from('tbl_dummy_cart_product');
						$this->db->where('diverid',$dummyProduct['diverid']);
						$this->db->where('user_id',$dummyProduct['user_id']);		
						$this->db->where('sessionid',$this->session->userdata('scubbi_sessid'));		
						$res2 = $this->db->get();
						$resfin = $res2->result();
						if ($res2->num_rows() > 0)
						{
							// same Table Same Product and same Diver
							// update tbl_dummy_cart_product
							foreach($resfin as $row1)
							{
								$logtext .= "   found! Updating qty " . $dummyProduct['qty'] . " \n";
								
								$newQty = $dummyProduct['qty'] ; 
								$newTotal = $dummyProduct['qty'] * $dummyProduct['price'];
								
								$data=array('qty'=>$newQty, 'price'=>$dummyProduct['price'], 'total'=>$newTotal, 'no_of_dive' =>$dummyProduct['no_of_dive'],
								'accom_basis' => ($dummyProduct['accom']=="Yes" ? $dummyAccom['accom_basis'] : 1), 'season' => $dummyProduct['season']);
								
								$this->db->where('id',$row1->id);
								
								if($this->db->update('tbl_dummy_cart_product',$data))
								{
									if ( !write_file('application/controllers/logcartupdate.txt', $logtext))
									{
									echo 'Unable to write the file';
									}	
									if ($dummyProduct['accom']=="Yes") 
									{
										$logtext .= $this->updateAccom($dummyProduct,$dummyAccom,$id,$row1->id);

										$logtext .= "Inserted accom.... \n";
									} 
									else 
									{
										$logtext .= "No accom.... \n";
									}
									if ( !write_file('application/controllers/logcartupdate.txt', $logtext))
									{
										echo 'Unable to write the file';
									}	

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
							//same table same product and different diver
							//add tbl_dummy_cart_product
							$inserProduct = array(
								'product_id' => $dummyProduct['product_id'],
								'sessionid' => $dummyProduct['sessionid'],
								'diverid' => $dummyProduct['diverid'],
								'product_name' => $dummyProduct['product_name'],
								'qty' => $dummyProduct['qty'],
								'uom' => $dummyProduct['uom'],
								'accom' => $dummyProduct['accom'],
								'extension_nights' => $dummyProduct['extension_nights'],
								'extn_qty' => $dummyProduct['accomvalue'],
								'accom_qty' => 1,
								'currency' => $currency,
								'accom_basis' => ($dummyProduct['accom']=="Yes" ? $dummyAccom['accom_basis'] : 1),
								'season' => $dummyProduct['season'],
								'no_of_dive' => $dummyProduct['no_of_dive'],
								'price' => $dummyProduct['price'],
								'base_price' => $dummyProduct['price'],
								'table_name' => $dummyProduct['table_name'],
								'total' => $dummyProduct['qty'] * $dummyProduct['price'],
								'user_id' => $dummyProduct['user_id'],
								'dummy_id' => $id
								);

							if($this->db->insert('tbl_dummy_cart_product', $inserProduct))
							{
								$dummy_product_id= $this->db->insert_id();
								
								$logtext .= "     Insert product " . $dummyProduct['product_name'] . ", qty " . $dummyProduct['qty'] . ", accom " . $dummyProduct['accom'] . " ID: $dummy_product_id\n
								Proceeding to insert Accommodation (existing cart) ....
								";
									/*
									'sessionid' => ". $dummyAccom['sessionid'] . ",
									'diverid' => " .$dummyAccom['diverid'] . ", 
									'product_id' => " .$dummyAccom['product_id'] .",
									'product_name' => " .$dummyAccom['product_name'] . ",
									'season' => " .$dummyAccom['season'].",
									'qty' => ".$dummyAccom['qty'].",
									'base_price' => ".$dummyAccom['base_price'].",
									'price' => ".$dummyAccom['price'].",
									'total' => ".$dummyAccom['qty']*$dummyAccom['price'].",
									'accom_qty' => ".$dummyAccom['accom_qty'].",
									'accom_basis' => ".$dummyAccom['accom_basis'].",
									'user_id' => ".$dummyAccom['user_id'].",
									'dummy_id' => $id,
									'dummy_product_id' => $dummy_product_id
									";
									*/
								if ($dummyProduct['accom']=="Yes") 
								{
									$logtext .= $this->updateAccom($dummyProduct,$dummyAccom,$id,$dummy_product_id);

									$logtext .= "Inserted accom.... \n";
								} 
								else 
								{
									$logtext .= "No accom.... \n";
								}
							}
							return array(
								'dummy_id' => $id,
								'dummy_product_id' => $dummy_product_id,
								'status' => '12'
								);
							
						}
					}
					else
					{
						//same table but different product 
						// display error message
						$logtext .= " not found! \n";
						return array(
							'status' => '1'
							);
					}
				}
				else
				{
					$logtext .= " not found! \n";
						return array(
							'status' => '1'
							);
					//NO data in same Table  so insert all the details
					/* $inserProduct = array(
						'product_id' => $dummyProduct['product_id'],
						'sessionid' => $dummyProduct['sessionid'],
						'diverid' => $dummyProduct['diverid'],
						'product_name' => $dummyProduct['product_name'],
						'qty' => $dummyProduct['qty'],
						'uom' => $dummyProduct['uom'],
						'accom' => $dummyProduct['accom'],
						'accom_qty' => 1,
						'currency' => $currency,
						'accom_basis' => ($dummyProduct['accom']=="Yes" ? $dummyAccom['accom_basis'] : 1),
						'season' => $dummyProduct['season'],
						'no_of_dive' => $dummyProduct['no_of_dive'],
						'price' => $dummyProduct['price'],
						'base_price' => $dummyProduct['price'],
						'table_name' => $dummyProduct['table_name'],
						'total' => $dummyProduct['qty'] * $dummyProduct['price'],
						'user_id' => $dummyProduct['user_id'],
						'dummy_id' => $id
						);

					if($this->db->insert('tbl_dummy_cart_product', $inserProduct))
					{
						$dummy_product_id= $this->db->insert_id();
						
						$logtext .= "     Insert product " . $dummyProduct['product_name'] . ", qty " . $dummyProduct['qty'] . ", accom " . $dummyProduct['accom'] . " ID: $dummy_product_id\n
						Proceeding to insert Accommodation (existing cart) ....
						"; */
							/*
							'sessionid' => ". $dummyAccom['sessionid'] . ",
							'diverid' => " .$dummyAccom['diverid'] . ", 
							'product_id' => " .$dummyAccom['product_id'] .",
							'product_name' => " .$dummyAccom['product_name'] . ",
							'season' => " .$dummyAccom['season'].",
							'qty' => ".$dummyAccom['qty'].",
							'base_price' => ".$dummyAccom['base_price'].",
							'price' => ".$dummyAccom['price'].",
							'total' => ".$dummyAccom['qty']*$dummyAccom['price'].",
							'accom_qty' => ".$dummyAccom['accom_qty'].",
							'accom_basis' => ".$dummyAccom['accom_basis'].",
							'user_id' => ".$dummyAccom['user_id'].",
							'dummy_id' => $id,
							'dummy_product_id' => $dummy_product_id
							";
							*/
/* 						if ($dummyProduct['accom']=="Yes") 
						{
							$logtext .= $this->updateAccom($dummyProduct,$dummyAccom,$id,$dummy_product_id);

							$logtext .= "Inserted accom.... \n";
						} 
						else 
						{
							$logtext .= "No accom.... \n";
						}
					}
					return array(
						'dummy_id' => $id,
						'dummy_product_id' => $dummy_product_id,
						'status' => '12'
						); */
				}
			}
		}
		else
		{
			// new Dummy Cart
			if($this->db->insert('tbl_dummy_cart', $data))
			{
				$id= $this->db->insert_id();
				
				$inserProduct = array(
						'product_id' => $dummyProduct['product_id'],
						'sessionid' => $dummyProduct['sessionid'],
						'diverid' => $dummyProduct['diverid'],
						'product_name' => $dummyProduct['product_name'],
						'qty' => $dummyProduct['qty'],
						'uom' => $dummyProduct['uom'],
						'accom' => $dummyProduct['accom'],
						'accom_qty' => 1,
						'extension_nights' => $dummyProduct['extension_nights'],
						'extn_qty' => $dummyProduct['accomvalue'],
						'currency' => $currency,
						'accom_basis' => ($dummyProduct['accom']=="Yes" ? $dummyAccom['accom_basis'] : "1"),
						'season' => $dummyProduct['season'],
						'no_of_dive' => $dummyProduct['no_of_dive'],
						'price' => $dummyProduct['price'],
						'base_price' => $dummyProduct['price'],
						'table_name' => $dummyProduct['table_name'],
						'total' => $dummyProduct['qty'] * $dummyProduct['price'],
						'user_id' => $dummyProduct['user_id'],
						'dummy_id' => $id
						);

				if($this->db->insert('tbl_dummy_cart_product', $inserProduct))
				{
					$dummy_product_id= $this->db->insert_id();
					
					$logtext .= "     Insert product " . $dummyProduct['product_name'] . ", qty " . $dummyProduct['qty'] . ", accom " . $dummyProduct['accom'] . " ID: $dummy_product_id\n
					";
					/*
					Proceeding to insert Accommodation (new cart) ....
					'sessionid' => ". $dummyAccom['sessionid'] . ",
					'diverid' => " .$dummyAccom['diverid'] . ", 
					'product_id' => " .$dummyAccom['product_id'] .",
					'product_name' => " .$dummyAccom['product_name'] . ",
					'season' => " .$dummyAccom['season'].",
					'qty' => ".$dummyAccom['qty'].",
					'base_price' => ".$dummyAccom['base_price'].",
					'price' => ".$dummyAccom['price'].",
					'total' => ".$dummyAccom['qty']*$dummyAccom['price'].",
					'accom_qty' => ".$dummyAccom['accom_qty'].",
					'accom_basis' => ".$dummyAccom['accom_basis'].",
					'user_id' => ".$dummyAccom['user_id'].",
					'dummy_id' => $id,
					'dummy_product_id' => $dummy_product_id
					";*/

					if ($dummyProduct['accom']=="Yes") 
					{
						$logtext .= $this->updateAccom($dummyProduct,$dummyAccom,$id,$dummy_product_id);

						$logtext .= "Inserted accom.... \n";
					} 
					else 
					{
						$logtext .= "No accom.... \n";
					}
					if ( !write_file('application/controllers/logcartupdate.txt', $logtext))
					{
						echo 'Unable to write the file';
					}	
				}
				return array(
					'dummy_id' => $id,
					'dummy_product_id' => $dummy_product_id,
					'status' => '12'
					);
			}
		}
	}
	function insertDummyProduct_3_1_18($data,$dummyProduct,$dummyAccom)
	{
		$logtext = "Insert Cart Product \n";
		$this->db->select('*');
		$this->db->from('tbl_dummy_cart');
		$this->db->where('sessionid',$this->session->userdata('scubbi_sessid'));		
		$this->db->where('dive_id',$dummyProduct['user_id']);		
		$query = $this->db->get();
		$res = $query->result();
		if ($query->num_rows() > 0) 
		{
			//Datas in Cart 
			$logtext .= "  Cart Exist... \n";
			foreach ($res as $row)
			{
				$id= $row->id;
				$logtext .= "   checking ". $dummyProduct['table_name'] ." items ... ";
				$this->db->select('*');
				$this->db->from('tbl_dummy_cart_product');
				$this->db->where('table_name',$dummyProduct['table_name']);
				$this->db->where('user_id',$dummyProduct['user_id']);		
				$this->db->where('sessionid',$this->session->userdata('scubbi_sessid'));		
				$query1 = $this->db->get();
				if ($query1->num_rows() > 0)
				{
					//data found in Same Table
					$this->db->select('*');
					$this->db->from('tbl_dummy_cart_product');
					$this->db->where('product_id',$dummyProduct['product_id']);
					$this->db->where('user_id',$dummyProduct['user_id']);		
					$this->db->where('sessionid',$this->session->userdata('scubbi_sessid'));		
					$query2 = $this->db->get();
					if ($query2->num_rows() > 0)
					{
						//data found in same table same Product 
						$this->db->select('*');
						$this->db->from('tbl_dummy_cart_product');
						$this->db->where('diverid',$dummyProduct['diverid']);
						$this->db->where('user_id',$dummyProduct['user_id']);		
						$this->db->where('sessionid',$this->session->userdata('scubbi_sessid'));		
						$res2 = $this->db->get()->result();
						if ($res2->num_rows() > 0)
						{
							// same Table Same Product and same Diver
							// update tbl_dummy_cart_product
							foreach($res2 as $row1)
							{
								$logtext .= "   found! Updating qty " . $dummyProduct['qty'] . " \n";
								
								$newQty = $dummyProduct['qty'] ; 
								$newTotal = $dummyProduct['qty'] * $dummyProduct['price'];
								
								$data=array('qty'=>$newQty, 'price'=>$dummyProduct['price'], 'total'=>$newTotal, 'no_of_dive' =>$dummyProduct['no_of_dive'],
								'accom_basis' => ($dummyProduct['accom']=="Yes" ? $dummyAccom['accom_basis'] : 1), 'season' => $dummyProduct['season']);
								
								$this->db->where('id',$row1->id);
								
								if($this->db->update('tbl_dummy_cart_product',$data))
								{
									if ( !write_file('application/controllers/logcartupdate.txt', $logtext))
									{
									echo 'Unable to write the file';
									}	
									if ($dummyProduct['accom']=="Yes") 
									{
										$logtext .= $this->updateAccom($dummyProduct,$dummyAccom,$id,$row1->id);

										$logtext .= "Inserted accom.... \n";
									} 
									else 
									{
										$logtext .= "No accom.... \n";
									}
									if ( !write_file('application/controllers/logcartupdate.txt', $logtext))
									{
										echo 'Unable to write the file';
									}	

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
							//same table same product and different diver
							//add tbl_dummy_cart_product
							$inserProduct = array(
								'product_id' => $dummyProduct['product_id'],
								'sessionid' => $dummyProduct['sessionid'],
								'diverid' => $dummyProduct['diverid'],
								'product_name' => $dummyProduct['product_name'],
								'qty' => $dummyProduct['qty'],
								'uom' => $dummyProduct['uom'],
								'accom' => $dummyProduct['accom'],
								'accom_qty' => 1,
								'accom_basis' => ($dummyProduct['accom']=="Yes" ? $dummyAccom['accom_basis'] : 1),
								'season' => $dummyProduct['season'],
								'no_of_dive' => $dummyProduct['no_of_dive'],
								'price' => $dummyProduct['price'],
								'base_price' => $dummyProduct['price'],
								'table_name' => $dummyProduct['table_name'],
								'total' => $dummyProduct['qty'] * $dummyProduct['price'],
								'user_id' => $dummyProduct['user_id'],
								'dummy_id' => $id
								);

							if($this->db->insert('tbl_dummy_cart_product', $inserProduct))
							{
								$dummy_product_id= $this->db->insert_id();
								
								$logtext .= "     Insert product " . $dummyProduct['product_name'] . ", qty " . $dummyProduct['qty'] . ", accom " . $dummyProduct['accom'] . " ID: $dummy_product_id\n
								Proceeding to insert Accommodation (existing cart) ....
								";
									/*
									'sessionid' => ". $dummyAccom['sessionid'] . ",
									'diverid' => " .$dummyAccom['diverid'] . ", 
									'product_id' => " .$dummyAccom['product_id'] .",
									'product_name' => " .$dummyAccom['product_name'] . ",
									'season' => " .$dummyAccom['season'].",
									'qty' => ".$dummyAccom['qty'].",
									'base_price' => ".$dummyAccom['base_price'].",
									'price' => ".$dummyAccom['price'].",
									'total' => ".$dummyAccom['qty']*$dummyAccom['price'].",
									'accom_qty' => ".$dummyAccom['accom_qty'].",
									'accom_basis' => ".$dummyAccom['accom_basis'].",
									'user_id' => ".$dummyAccom['user_id'].",
									'dummy_id' => $id,
									'dummy_product_id' => $dummy_product_id
									";
									*/
								if ($dummyProduct['accom']=="Yes") 
								{
									$logtext .= $this->updateAccom($dummyProduct,$dummyAccom,$id,$dummy_product_id);

									$logtext .= "Inserted accom.... \n";
								} 
								else 
								{
									$logtext .= "No accom.... \n";
								}
							}
							return array(
								'dummy_id' => $id,
								'dummy_product_id' => $dummy_product_id,
								'status' => '12'
								);
							
						}
					}
					else
					{
						//same table but different product 
						// display error message
						$logtext .= " not found! \n";
						return array(
							'status' => '1'
							);
					}
				}
				else
				{
					//NO data in same Table  so insert all the details
					$inserProduct = array(
						'product_id' => $dummyProduct['product_id'],
						'sessionid' => $dummyProduct['sessionid'],
						'diverid' => $dummyProduct['diverid'],
						'product_name' => $dummyProduct['product_name'],
						'qty' => $dummyProduct['qty'],
						'uom' => $dummyProduct['uom'],
						'accom' => $dummyProduct['accom'],
						'accom_qty' => 1,
						'accom_basis' => ($dummyProduct['accom']=="Yes" ? $dummyAccom['accom_basis'] : 1),
						'season' => $dummyProduct['season'],
						'no_of_dive' => $dummyProduct['no_of_dive'],
						'price' => $dummyProduct['price'],
						'base_price' => $dummyProduct['price'],
						'table_name' => $dummyProduct['table_name'],
						'total' => $dummyProduct['qty'] * $dummyProduct['price'],
						'user_id' => $dummyProduct['user_id'],
						'dummy_id' => $id
						);

					if($this->db->insert('tbl_dummy_cart_product', $inserProduct))
					{
						$dummy_product_id= $this->db->insert_id();
						
						$logtext .= "     Insert product " . $dummyProduct['product_name'] . ", qty " . $dummyProduct['qty'] . ", accom " . $dummyProduct['accom'] . " ID: $dummy_product_id\n
						Proceeding to insert Accommodation (existing cart) ....
						";
							/*
							'sessionid' => ". $dummyAccom['sessionid'] . ",
							'diverid' => " .$dummyAccom['diverid'] . ", 
							'product_id' => " .$dummyAccom['product_id'] .",
							'product_name' => " .$dummyAccom['product_name'] . ",
							'season' => " .$dummyAccom['season'].",
							'qty' => ".$dummyAccom['qty'].",
							'base_price' => ".$dummyAccom['base_price'].",
							'price' => ".$dummyAccom['price'].",
							'total' => ".$dummyAccom['qty']*$dummyAccom['price'].",
							'accom_qty' => ".$dummyAccom['accom_qty'].",
							'accom_basis' => ".$dummyAccom['accom_basis'].",
							'user_id' => ".$dummyAccom['user_id'].",
							'dummy_id' => $id,
							'dummy_product_id' => $dummy_product_id
							";
							*/
						if ($dummyProduct['accom']=="Yes") 
						{
							$logtext .= $this->updateAccom($dummyProduct,$dummyAccom,$id,$dummy_product_id);

							$logtext .= "Inserted accom.... \n";
						} 
						else 
						{
							$logtext .= "No accom.... \n";
						}
					}
					return array(
						'dummy_id' => $id,
						'dummy_product_id' => $dummy_product_id,
						'status' => '12'
						);
				}
			}
		}
		else
		{
			// new Dummy Cart
			if($this->db->insert('tbl_dummy_cart', $data))
			{
				$id= $this->db->insert_id();
				
				$inserProduct = array(
						'product_id' => $dummyProduct['product_id'],
						'sessionid' => $dummyProduct['sessionid'],
						'diverid' => $dummyProduct['diverid'],
						'product_name' => $dummyProduct['product_name'],
						'qty' => $dummyProduct['qty'],
						'uom' => $dummyProduct['uom'],
						'accom' => $dummyProduct['accom'],
						'accom_qty' => 1,
						'accom_basis' => ($dummyProduct['accom']=="Yes" ? $dummyAccom['accom_basis'] : "1"),
						'season' => $dummyProduct['season'],
						'no_of_dive' => $dummyProduct['no_of_dive'],
						'price' => $dummyProduct['price'],
						'base_price' => $dummyProduct['price'],
						'table_name' => $dummyProduct['table_name'],
						'total' => $dummyProduct['qty'] * $dummyProduct['price'],
						'user_id' => $dummyProduct['user_id'],
						'dummy_id' => $id
						);

				if($this->db->insert('tbl_dummy_cart_product', $inserProduct))
				{
					$dummy_product_id= $this->db->insert_id();
					
					$logtext .= "     Insert product " . $dummyProduct['product_name'] . ", qty " . $dummyProduct['qty'] . ", accom " . $dummyProduct['accom'] . " ID: $dummy_product_id\n
					";
					/*
					Proceeding to insert Accommodation (new cart) ....
					'sessionid' => ". $dummyAccom['sessionid'] . ",
					'diverid' => " .$dummyAccom['diverid'] . ", 
					'product_id' => " .$dummyAccom['product_id'] .",
					'product_name' => " .$dummyAccom['product_name'] . ",
					'season' => " .$dummyAccom['season'].",
					'qty' => ".$dummyAccom['qty'].",
					'base_price' => ".$dummyAccom['base_price'].",
					'price' => ".$dummyAccom['price'].",
					'total' => ".$dummyAccom['qty']*$dummyAccom['price'].",
					'accom_qty' => ".$dummyAccom['accom_qty'].",
					'accom_basis' => ".$dummyAccom['accom_basis'].",
					'user_id' => ".$dummyAccom['user_id'].",
					'dummy_id' => $id,
					'dummy_product_id' => $dummy_product_id
					";*/

					if ($dummyProduct['accom']=="Yes") 
					{
						$logtext .= $this->updateAccom($dummyProduct,$dummyAccom,$id,$dummy_product_id);

						$logtext .= "Inserted accom.... \n";
					} 
					else 
					{
						$logtext .= "No accom.... \n";
					}
					if ( !write_file('application/controllers/logcartupdate.txt', $logtext))
					{
						echo 'Unable to write the file';
					}	
				}
				return array(
					'dummy_id' => $id,
					'dummy_product_id' => $dummy_product_id,
					'status' => '12'
					);
			}
		}
	}
		function updateAccom($dummyProduct,$dummyAccom,$did,$itemid)
		{
		$logtext = "Start ... \n DummyProduct : \n";
			foreach($dummyProduct as $ky => $vl) {
				$logtext .= "  - $ky ==> [$vl] \n";
			}
		$logtext .= " DummyAccom : \n";
			foreach($dummyAccom as $ky => $vl) {
				$logtext .= "  - $ky ==> [$vl] \n";
			}
			if ( !write_file('application/controllers/logupdateaccom.txt', $logtext)){
     		echo 'Unable to write the file';
			}	
//		if (trim($dummyProduct['accom'])=="Yes") {

			$this->db->select('*');
			$this->db->from('tbl_dummy_cart_product_accomodation');
			$this->db->where('product_id',$dummyProduct['product_id']);
			$this->db->where('dummy_id',$did);
			$this->db->where('dummy_product_id',$itemid);
			$this->db->where('diverid',$dummyProduct['diverid']);		
			$this->db->where('user_id',$dummyProduct['user_id']);
			$this->db->where('sessionid',$dummyProduct['sessionid']);		
			$queryacc = $this->db->get();
			$resacc = $queryacc->result();
			
			$num_of_rows = $queryacc->num_rows();
			

			$logtext .= "     checking diver/product ". $dummyProduct['diverid'] . ":" .$dummyProduct['product_id'] ." ... ".$queryacc->num_rows();
			if ( !write_file('application/controllers/logupdateaccom.txt', $logtext)){
     		//echo 'Unable to write the file';
			}	
			if ($num_of_rows != 0)
			{
				foreach($resacc as $acc1)
				{
					$recid = $acc1->id;
				}

				$inserAccom = array(
				'product_id' => $dummyAccom['product_id'],
				'dummy_product_id' => $itemid,
				'product_name' => $dummyAccom['product_name'],
				'season' => $dummyAccom['season'],
				'qty' => $dummyAccom['qty'],
				'base_price' => $dummyAccom['base_price'],
				'price' => $dummyAccom['price'],
				'total' => $dummyAccom['qty']*$dummyAccom['price'],
				'accom_qty' => $dummyAccom['accom_qty'],
				'accom_basis' => $dummyAccom['accom_basis'],
				);

				$this->db->where('id',$recid);
									
				if($this->db->update('tbl_dummy_cart_product_accomodation',$inserAccom))
				{
					$logtext .= "    Update Accomodation successful!";
				} else {
					$logtext .= "    Update Accomodation fail!";
				}

 			} else {

				$inserAccom = array(
				'itemid'=> $itemid,
				'sessionid' => $dummyAccom['sessionid'],
				'diverid' => $dummyAccom['diverid'],
				'product_id' => $dummyAccom['product_id'],
				'product_name' => $dummyAccom['product_name'],
				'season' => $dummyAccom['season'],
				'qty' => $dummyAccom['qty'],
				'base_price' => $dummyAccom['base_price'],
				'price' => $dummyAccom['price'],
				'total' => $dummyAccom['qty']*$dummyAccom['price'],
				'accom_qty' => $dummyAccom['accom_qty'],
				'accom_basis' => $dummyAccom['accom_basis'],
				'user_id' => $dummyAccom['user_id'],
				'dummy_id' => $did,
				'dummy_product_id' => $itemid
				);
				//$this->db->insert('tbl_dummy_cart_product_accomodation', $inserAccom);
				if($this->db->insert('tbl_dummy_cart_product_accomodation', $inserAccom))
				{
					$logtext .= "    Insert Accomodation successful!";
				} else {
					$logtext .= "    Insert Accomodation fail!";
				}
				//return $logtext;
			}
			$logtext .="jsy";
			if ( !write_file('application/controllers/logupdateaccom.txt', $logtext)){
     		echo 'Unable to write the file';
			}	
//		}
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
		$this->db->select('*');
		$this->db->from('tbl_conversation');
//		$this->db->where('topic',"Contact Dive Center");
		$this->db->where('dc_id',$this->input->post('diveid_popup'));
		$this->db->where('customer_id',$this->session->userdata('user_id'));
		$row7 = $this->db->get();
		if($row7->num_rows()>0) {
			foreach ($row7->result() as $row) 
			{
				$insertdata1 = array(
				'from'=>$this->session->userdata('user_id'),
				'to'=>$this->input->post('diveid_popup'),
				'thread_id'=>$row->thread_id,
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
		else
		{	
			$insertdata = array(
			'topic'=>"Contact Dive Center",
			'dc_id'=>$this->input->post('diveid_popup'),
			'customer_id'=>$this->session->userdata('user_id'),
			'started'=>date("Y-m-d h:i:s"),
			'lastmsg'=>"",		
			'lastmsgfrom'=>$this->input->post('diveid_popup')
			);
			
			$this->db->insert('tbl_conversation',$insertdata);
			$id_user = $this->db->insert_id();
			//return true;
			
			$insertdata1 = array(
			'from'=>$this->session->userdata('user_id'),
			'to'=>$this->input->post('diveid_popup'),
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
}
?>