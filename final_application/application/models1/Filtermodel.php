<?php
class Filtermodel extends CI_Model {
	function __construct()
    {
	  parent::__construct();
	  $this->load->database();
    }
	
	function get_divecenter1()
	{
	$size = $this->input->post('size');
	$this->db->from('dive_center');
	$this->db->where_in('country_id','".implode("','",$size)."');
	$query = $this->db->get(); 
		$res = $query->result();
		var_dump( $res);
	} 
	function get_divecenter()
	{
	//$size = $this->input->post('size');
	$this->db->from('dive_center');
	//$this->db->where_in('country_id');
	$query = $this->db->get(); 
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
