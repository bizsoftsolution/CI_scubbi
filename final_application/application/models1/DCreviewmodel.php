<?php
class DCreviewmodel extends CI_Model {
 function __construct()
    {
	  parent::__construct();
	  $this->load->database();
    }
//**********************************************************************************************************************************************
//                                                                   [ Dive Center Leisure START ] //**********************************************************************************************************************************************

	function DCreviewlist($user_id)
	{
	$this->db->where('divecenter_id', $user_id);
	//$this->db->order_by("sequence_number","ASC");
	$query = $this->db->get('tbl_review');
	return $query->result();
    }

}
?>
