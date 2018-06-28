<?php
class Currencymodel extends CI_Model 
{
 function __construct()
    {
	  parent::__construct();
	  $this->load->database();
    }
    
	function cList()
	{
		$query = $this->db->get('tbl_multicurrency');
		return $query->result();
	}
	function newCurrency($data)
	{
		if($this->db->insert('tbl_multicurrency',$data))
		{

			return "SUCCESS";
		}
		else
		{
			return "FAILED";
		}
	}
	function getCurrency($id)
	{
		$this->db->select('*');
		$this->db->from('tbl_multicurrency');
		$this->db->where('c_id',$id);
		$query = $this->db->get();
		return $query->result();
    }
	function editCurrency($data,$id)
    {
		$this->db->where('c_id',$id);      //var_dump($id);exit();
		if($this->db->update('tbl_multicurrency',$data))
		{
			return "SUCCESS";
		}
		else 
		{
		   return "FAILED";
		}
	}
	function deleteCurrency($id)
    {
       $this->db->delete('tbl_multicurrency', array('c_id' => $id));
    }
}
?>
