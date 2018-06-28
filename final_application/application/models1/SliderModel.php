<?php
class SliderModel extends CI_Model {
 function __construct()
    {
              parent::__construct();
              $this->load->database();
    }
    function addNew($userData)
	{
      if($this->db->insert('banner',$userData))
      {
        return "SUCCESS";
      }
      else
      {
        return "FAILED";
      }
	}
	function sliderList()
	{
	$query = $this->db->get('banner');
	return $query->result();
    }
	
	function getEditdata($id){
  //  $sql = "SELECT * FROM employee WHERE id = ?";
    //$query =$this->db->query($sql, array($id));
    $this->db->select('*');
    $this->db->from('banner');
    $this->db->where('banner_id',$id);
    $query = $this->db->get();
    return $query->result();
    }
	
	function updateData($data,$id)
    {
    $this->db->where('banner_id',$id);      //var_dump($id);exit();
	if($this->db->update('banner',$data))
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
       $this->db->delete('banner', array('banner_id' => $id));
	   //unlink(base_url("upload/slider/".$files));
    }
}
?>
