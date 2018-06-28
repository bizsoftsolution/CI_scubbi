<?php
class Bugsmodel extends CI_Model {
 function __construct()
    {
	  parent::__construct();
	  $this->load->database();
    }
//**********************************************************************************************************************************************
//                                                                   [ Dive Center Profile START ] //**********************************************************************************************************************************************

	function BugList()
	{
	$this->db->order_by('refno', 'ASC');
	$query = $this->db->get('tbl_bugs');
	return $query->result();
    }
	
	function addNewBug($userData)
	{
      if($this->db->insert('tbl_bugs',$userData))
      {
        return "SUCCESS";
      }
      else
      {
        return "FAILED";
      }
	}
	function getbugsData($id)
	{
		$this->db->select('*');
		$this->db->from('tbl_bugs');
		$this->db->where('bug_no',$id);
		$query = $this->db->get();
		return $query->result();
	}
	function editNewBugs($data,$id)
    {
      $this->db->where('bug_no',$id);      //var_dump($id);exit();
     // $this->db->from('tbl_country');
	   if($this->db->update('tbl_bugs',$data))
		{
			return "SUCCESS";
		}
	   else
		{
			return "FAILED";
		}
    }
	function deleteBugs($id)
    {
       $this->db->delete('tbl_bugs', array('bug_no' => $id));
	   //unlink(base_url("upload/slider/".$files));
    }
	
	function notcompletedList()
	{
		$this->db->select('*');
		$this->db->from('tbl_bugs');
		$this->db->where('bug_status !=', 'DONE');
		$query = $this->db->get();
		return $query->result();
	}
	function completedList()
	{
		$this->db->select('*');
		$this->db->from('tbl_bugs');
		$this->db->where('bug_status', 'DONE');
		$query = $this->db->get();
		return $query->result();
	}
	function doneBugs($id,$data)
	{
		$this->db->where('bug_no',$id);      //var_dump($id);exit();
     // $this->db->from('tbl_country');
	   if($this->db->update('tbl_bugs',$data))
		{
			return "SUCCESS";
		}
	   else
		{
			return "FAILED";
		}
	}
		function allBugs()
	{
		$this->db->select('*');
		$this->db->from('tbl_bugs');
		//$this->db->where('bug_status !=', 'DONE');
		$query = $this->db->get();
		return $query->result();
	}
//**********************************************************************************************************************************************
//                                                                   [ CONTACTS DIVE MASTER END ] //**********************************************************************************************************************************************



}
?>
