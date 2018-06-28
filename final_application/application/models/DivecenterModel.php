<?php
class DivecenterModel extends CI_Model {
 function __construct()
    {
	  parent::__construct();
	  $this->load->database();
    }
    function addNew($userData)
	{
      if($this->db->insert('dive_center',$userData))
      {
        return "SUCCESS";
      }
      else
      {
        return "FAILED";
      }
	}
	function divecenterList()
	{
	$query = $this->db->get('dive_center');
	return $query->result();
    }
	
	function getEditdata($id){
  //  $sql = "SELECT * FROM employee WHERE id = ?";
    //$query =$this->db->query($sql, array($id));
    $this->db->select('*');
    $this->db->from('dive_center');
    $this->db->where('dive_center_id',$id);
    $query = $this->db->get();
    return $query->result();
    }
	function updateData($data,$id)
    {
    $this->db->where('dive_center_id',$id);      //var_dump($id);exit();
	if($this->db->update('dive_center',$data))
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
       $this->db->delete('dive_center', array('dive_center_id' => $id));
	   //unlink(base_url("upload/slider/".$files));
    }
}
?>
