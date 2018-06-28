<?php
class SAleisuremodel extends CI_Model {
 function __construct()
    {
	  parent::__construct();
	  $this->load->database();
    }
//**********************************************************************************************************************************************
//                                                                   [ Dive Center Leisure START ] //**********************************************************************************************************************************************
    function addNew($userData)
	{
      if($this->db->insert('tbl_standard_leisure',$userData))
      {
        return "SUCCESS";
      }
      else
      {
        return "FAILED";
      }
	}
	function SAleisurelist()
	{
	//$this->db->where('user_id', $this->session->userdata('user_id'));
	$this->db->order_by("sequence_number","ASC");
	$query = $this->db->get('tbl_standard_leisure');
	return $query->result();
    }
	
	function getEditdata($id){
  //  $sql = "SELECT * FROM employee WHERE id = ?";
    //$query =$this->db->query($sql, array($id));
    $this->db->select('*');
    $this->db->from('tbl_standard_leisure');
    $this->db->where('id',$id);
    $query = $this->db->get();
    return $query->result();
    }
	function updateData($userData,$id)
    {
    $this->db->where('id',$id);      //var_dump($id);exit();
	if($this->db->update('tbl_standard_leisure',$userData))
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
       $this->db->delete('tbl_standard_leisure', array('id' => $id));
	   //unlink(base_url("upload/slider/".$files));
    }
	
//**********************************************************************************************************************************************
//                                                                   [ Dive Center Keywords START ] //**********************************************************************************************************************************************

	function addKeywords($userData)
	{
      if($this->db->insert('tbl_product_keywords',$userData))
      {
        return "SUCCESS";
      }
      else
      {
        return "FAILED";
      }
	}
	function Keywordlist()
	{
	$this->db->where('user_id', $this->session->userdata('user_id'));
	$query = $this->db->get('tbl_product_keywords');
	return $query->result();
    }
	
	function getKeyword($id){
    $this->db->select('*');
    $this->db->from('tbl_product_keywords');
    $this->db->where('id',$id);
    $query = $this->db->get();
    return $query->result();
    }
	function updateKeyword($userData,$id)
    {
    $this->db->where('id',$id);      //var_dump($id);exit();
	if($this->db->update('tbl_product_keywords',$userData))
	{
     return "SUCCESS";
	}
	else 
	{
		return "FAILED";
	}
    }
 function deleteKeyword($id)
    {
       $this->db->delete('tbl_product_keywords', array('id' => $id));
    }

}
?>
