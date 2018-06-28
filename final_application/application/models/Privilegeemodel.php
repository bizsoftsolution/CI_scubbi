<?php
class Privilegeemodel extends CI_Model 
{
 function __construct()
    {
		  parent::__construct();
		  $this->load->database();
    }
    
	function privilegeList()
	{
		$query = $this->db->get('tbl_privilege');
		return $query->result();
	}
	function privilegeData($data)
	{
      if($this->db->insert('tbl_privilege',$data))
		{
			return "SUCCESS";
		}
		else
		{
			return "FAILED";
		}
    }
	function getPrivilege($id)
	{
		$this->db->select('*');
		$this->db->from('tbl_privilege');
		$this->db->where('id',$id);
		$query = $this->db->get();
		return $query->result();
    }
	function editPrivilege($data,$id)
    {
		$this->db->where('id',$id);      //var_dump($id);exit();
	   if($this->db->update('tbl_privilege',$data))
		{
			return "SUCCESS";
		}
		else
		{
			return "FAILED";
		}
	}

  
	function deletePrivilege($id)
    {
       $this->db->delete('tbl_privilege', array('id' => $id));
       //$this->db->delete('user', array('emp_no' => $id));
    }
}
?>
