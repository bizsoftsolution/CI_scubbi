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
	 $cities[$city->island_id] = $city->island_name;
	 }
	 return $cities;
	 }else{
	 return FALSE;
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
		$this->db->join('tbl_dcpackage', 'tbl_dcpackage.user_id = tbl_dcprofile.user_id', 'left'); 
		$this->db->where('tbl_dcprofile.id', $id);
		$this->db->group_by('tbl_dcprofile.id');
		$result = $this->db->get();
		return $result->result();
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
		$this->db->limit(4);
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
	function get_populardivedestination()
	{
		$this->db->select('*');
		$this->db->from('daily_plan');
		$this->db->limit(8);
		$query = $this->db->get();
		$res = $query->result();
		return $res;	
	}
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
		$query = $this->db->get('banner');
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
}
?>
