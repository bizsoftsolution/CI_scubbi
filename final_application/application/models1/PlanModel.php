<?php
class PlanModel extends CI_Model {
 function __construct()
    {
	  parent::__construct();
	  $this->load->database();
    }
    function addNew($userData)
	{
      if($this->db->insert('daily_plan',$userData))
      {
        return "SUCCESS";
      }
      else
      {
        return "FAILED";
      }
	}
	function planList()
	{
	$query = $this->db->get('daily_plan');
	return $query->result();
    }
	
	function getEditdata($id){
  //  $sql = "SELECT * FROM employee WHERE id = ?";
    //$query =$this->db->query($sql, array($id));
    $this->db->select('*');
    $this->db->from('daily_plan');
    $this->db->where('daily_plan',$id);
    $query = $this->db->get();
    return $query->result();
    }
	function updateData($data,$id)
    {
    $this->db->where('daily_plan',$id);      //var_dump($id);exit();
	if($this->db->update('daily_plan',$data))
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
       $this->db->delete('daily_plan', array('daily_plan' => $id));
	   //unlink(base_url("upload/slider/".$files));
    }
}
?>
