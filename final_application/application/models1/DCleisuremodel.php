<?php
class DCleisuremodel extends CI_Model {
 function __construct()
    {
	  parent::__construct();
	  $this->load->database();
    }
//**********************************************************************************************************************************************
//                                                                   [ Dive Center Leisure START ] //**********************************************************************************************************************************************
    function addNew($userData)
	{
      if($this->db->insert('tbl_dcleisure',$userData))
      {
        return "SUCCESS";
      }
      else
      {
        return "FAILED";
      }
	}
	function DCleisuredashboard()
	{
	$this->db->where('user_id', $this->session->userdata('user_id'));
	$this->db->where('status', 'ENABLE');
	$this->db->order_by("sequence_number","ASC");
	$query = $this->db->get('tbl_dcleisure');
	return $query->result();
    }
	
	function DCleisurelist()
	{
		$query = "tbl_standard_leisure where id NOT IN (select standard_id from tbl_dcleisure)";
		$result = $this->db->get($query);
		return $result->result();
		
    }
	function disable($data2)
	{
		if($this->db->insert('tbl_dcleisure',$data2))
		{
		 return "SUCCESS";
		}
		else 
		{
			return "FAILED";
		}
	}
	function enable($data2)
	{
		//var_dump($data2);
		//$this->db->where('id',$id);      //var_dump($id);exit();
		if($this->db->insert('tbl_dcleisure',$data2))
		{
		 return "SUCCESS";
		}
		else 
		{
			return "FAILED";
		}
	}
	function getEditdata($id){
  //  $sql = "SELECT * FROM employee WHERE id = ?";
    //$query =$this->db->query($sql, array($id));
    $this->db->select('*');
    $this->db->from('tbl_dcleisure');
    $this->db->where('id',$id);
    $query = $this->db->get();
    return $query->result();
    }
	function updateData($userData,$id)
    {
    $this->db->where('id',$id);      //var_dump($id);exit();
	if($this->db->update('tbl_dcleisure',$userData))
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
       $this->db->delete('tbl_dcleisure', array('id' => $id));
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
//	$this->db->where('user_id', $this->session->userdata('user_id'));
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
