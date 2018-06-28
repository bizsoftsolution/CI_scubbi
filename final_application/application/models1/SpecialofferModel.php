<?php
class SpecialofferModel extends CI_Model {
 function __construct()
    {
	  parent::__construct();
	  $this->load->database();
    }
    function addNew($userData)
	{
      if($this->db->insert('special_offer',$userData))
      {
        return "SUCCESS";
      }
      else
      {
        return "FAILED";
      }
	}
	function offerList()
	{
	$query = $this->db->get('special_offer');
	return $query->result();
    }
	
	function getEditdata($id){
  //  $sql = "SELECT * FROM employee WHERE id = ?";
    //$query =$this->db->query($sql, array($id));
    $this->db->select('*');
    $this->db->from('special_offer');
    $this->db->where('special_offer_id',$id);
    $query = $this->db->get();
    return $query->result();
    }
	function updateData($data,$id)
    {
    $this->db->where('special_offer_id',$id);      //var_dump($id);exit();
	if($this->db->update('special_offer',$data))
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
       $this->db->delete('special_offer', array('special_offer_id' => $id));
	   //unlink(base_url("upload/slider/".$files));
    }
}
?>
