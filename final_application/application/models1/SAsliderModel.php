<?php
class SAsliderModel extends CI_Model {
 function __construct()
    {
              parent::__construct();
              $this->load->database();
    }
    function addNew($userData)
	{
      if($this->db->insert('tbl_saslider',$userData))
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
	$query = $this->db->get('tbl_saslider');
	return $query->result();
    }
	
	function getEditdata($id)
	{
    $this->db->select('*');
    $this->db->from('tbl_saslider');
    $this->db->where('id',$id);
    $query = $this->db->get();
    return $query->result();
    }
	
	function updateData($data,$id)
    {
    $this->db->where('id',$id);      //var_dump($id);exit();
	if($this->db->update('tbl_saslider',$data))
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
       $this->db->delete('tbl_saslider', array('id' => $id));
	   //unlink(base_url("upload/slider/".$files));
    }
}
?>
