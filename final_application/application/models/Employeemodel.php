<?php
class Employeemodel extends CI_Model 
{
 function __construct()
    {
              parent::__construct();
              $this->load->database();
    }
    
	function employeeList()
	{
		$query = $this->db->get('tbl_semployee');
		return $query->result();
	}
	function newEmployee($data)
	{
      if($this->db->insert('tbl_semployee',$data))
      {
		  $Linsertid = $this->db->insert_id();
		  $udata = array(
			'first_name'=>$this->input->post('name'),
			'email'=>$this->input->post('username'),
			'password'=>$this->input->post('password'),
			'user_type'=>"CUSTOM",
			'logged_in'=>"FALSE",
			'emp_no'=>$Linsertid
		  );
		$uinsert = $this->db->insert("user", $udata);
		if($uinsert)
		{
			return "SUCCESS";
		}
		else
		{
			return "FAILED";
		}
      }

	}
	function getEmployee($id)
	{
		$this->db->select('*');
		$this->db->from('tbl_semployee');
		$this->db->where('id',$id);
		$query = $this->db->get();
		return $query->result();
    }
	function editEmployee($data,$id)
    {
		$this->db->where('id',$id);      //var_dump($id);exit();
	   if($this->db->update('tbl_semployee',$data))
	   {
			$udata = array(
				'first_name'=>$this->input->post('name'),
				'email'=>$this->input->post('username'),
				'password'=>$this->input->post('password')
			  );
			$this->db->where('emp_no',$id);
			$uupdate = $this->db->update("user", $udata);
			if($uupdate)
			{
				return "SUCCESS";
			}
			else
			{
				return "FAILED";
			}
	   }
	   else 
	   {
		   return "FAILED";
	   }
	}

  
	function deleteEmployee($id)
    {
       $this->db->delete('tbl_semployee', array('id' => $id));
       $this->db->delete('user', array('emp_no' => $id));
    }
}
?>
