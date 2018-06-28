<?php
class SAtellmemoreModel extends CI_Model {
 function __construct()
    {
              parent::__construct();
              $this->load->database();
    }
    function addNew($userData)
	{
      if($this->db->insert('tbl_satellmemore',$userData))
      {
        return "SUCCESS";
      }
      else
      {
        return "FAILED";
      }
	}
	function tellmemoreList()
	{
	$query = $this->db->get('tbl_satellmemore');
	return $query->result();
    }
	
	function divepointsList()
	{
	$query = $this->db->get('tbl_divepoints');
	return $query->result();
    }
	
	function getEditdata($id)
	{
    $this->db->select('*');
    $this->db->from('tbl_satellmemore');
    $this->db->where('id',$id);
    $query = $this->db->get();
    return $query->result();
    }
	
	function updateData($data,$id)
    {
    $this->db->where('id',$id);      //var_dump($id);exit();
	if($this->db->update('tbl_satellmemore',$data))
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
       $this->db->delete('tbl_satellmemore', array('id' => $id));
	   //unlink(base_url("upload/slider/".$files));
    }
	function pddList()
	{
		$this->db->where('popular_diving_destination', 'Yes');
		$query = $this->db->get('tbl_satellmemore');
		return $query->result();
	}
}
?>
