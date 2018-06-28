<?php
class SAcoursesmodel extends CI_Model {
 function __construct()
    {
	  parent::__construct();
	  $this->load->database();
    }
    
//**********************************************************************************************************************************************
//                                                                   [ Dive Center Leisure START ] //**********************************************************************************************************************************************
    function addNew($userData)
	{
      if($this->db->insert('tbl_standard_courses',$userData))
      {
        return "SUCCESS";
      }
      else
      {
        return "FAILED";
      }
	}
	function SAcoursesdashboard()
	{
	//$this->db->where('user_id', $this->session->userdata('user_id'));
	//$this->db->where('status', 'ENABLE');
	$this->db->order_by("sequence_number","ASC");
	$query = $this->db->get('tbl_standard_courses');
	return $query->result();
    }
	function SAcourseslist()
	{
		$query = "tbl_standard_courses where id NOT IN (select standard_id from tbl_standard_courses)";
		$result = $this->db->get($query);
		return $result->result();
    }
	
	function getEditdata($id){
  //  $sql = "SELECT * FROM employee WHERE id = ?";
    //$query =$this->db->query($sql, array($id));
    $this->db->select('*');
    $this->db->from('tbl_standard_courses');
    $this->db->where('id',$id);
    $query = $this->db->get();
    return $query->result();
    }
	function updateData($userData,$id)
    {
    $this->db->where('id',$id);      //var_dump($id);exit();
	if($this->db->update('tbl_standard_courses',$userData))
	{
     return "SUCCESS";
	}
	else 
	{
		return "FAILED";
	}
    }
 function deleteData($id)
    {
       $this->db->delete('tbl_standard_courses', array('id' => $id));
	   //unlink(base_url("upload/slider/".$files));
    }
	
}
?>
