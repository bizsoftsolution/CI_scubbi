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
	function getDailyplan($curty, $islnd)
	{
		$this->db->select("per_day_amount");
		$this->db->where('country_id', $curty);
		$this->db->where('island_id', $islnd);	
		$query= $this->db->get('daily_plan');
		return $query->result();
	}
	function get_specialoffer($limit, $start)
	{
		/*
		$query = $this->db->get('special_offer');
		$res = $query->result();
		return $res;
		*/
		$this->db->select('*');
		$this->db->from('special_offer');
		//$this->db->join('dive_center', 'tbl_country.country_id = dive_center.country_id'); 
		$this->db->join('dive_center', 'special_offer.dive_center_id = dive_center.dive_center_id'); 
		$this->db->limit($limit, $start);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
		return false;
	}
	public function record_count() {
	return $this->db->count_all("special_offer");
	}
	function get_populardivedestination()
	{
		$this->db->select('*');
		$this->db->from('daily_plan');
		$this->db->order_by('daily_plan', 'desc');
		$this->db->limit(8);
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
	function get_slider()
	{
		$query = $this->db->get('banner');
		$res = $query->result();
		return $res;
	}
	function get_searchdetails()
	{
		$country = $this->input->post('scountry');
		$islands = $this->input->post('islands');
		
		$this->db->select("*");
		$this->db->where('country_id', $country);
		$this->db->where('island_id', $islands);
		
		$query= $this->db->get('dive_center');
		return $query->result();
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
