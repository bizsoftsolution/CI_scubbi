<?php
class SAbecomeapartnerModel extends CI_Model {
 function __construct()
    {
              parent::__construct();
              $this->load->database();
    }
    /* function addNew($userData)
	{
      if($this->db->insert('tbl_satellmemore',$userData))
      {
        return "SUCCESS";
      }
      else
      {
        return "FAILED";
      }
	} */
	function becomeapartnerList()
	{
        $this->db->select('b.*,c.country_name,i.island_name');
        $this->db->from('tbl_becomeapartner b');
        $this->db->join('tbl_country c','b.country = c.country_id','left');
        $this->db->join('tbl_island i','b.island = i.island_id','left');
	$this->db->where('status', 'NOT APPROVED');
	$query = $this->db->get();
	return $query->result();
    }
	
	function getapprovelData($id)
	{
    $this->db->select('*');
    $this->db->from('tbl_becomeapartner');
    $this->db->where('id',$id);
    $query = $this->db->get();
    return $query->result();
    }

	function updateApproveldata($data1,$data2,$id)
    {
	$this->db->insert('user', $data1);
	
    $this->db->where('id',$id);  
	$this->db->update('tbl_becomeapartner', $data2);
	
    return "SUCCESS";
    }
	/*
 function deleteData($id)
    {
       $this->db->delete('tbl_satellmemore', array('id' => $id));
	   //unlink(base_url("upload/slider/".$files));
    } */
}
?>