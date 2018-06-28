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
		$this->db->select('*');
		$this->db->from('groups');
		//$this->db->join('resources', 'resources.group_id = groups.id'); 
		//$this->db->order_by("name");
		$query = $this->db->get();
		echo json_encode($query->result_array());
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
