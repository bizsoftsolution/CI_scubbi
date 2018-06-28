<?php
class DCguidedtoursmodel extends CI_Model {
 function __construct()
    {
	  parent::__construct();
	  $this->load->database();
    }
//**********************************************************************************************************************************************
//                                                                   [ Dive Center Leisure START ] //**********************************************************************************************************************************************
    function addNew($userData)
	{
      if($this->db->insert('tbl_dcguidedtours',$userData))
      {
        $insert_id = $this->db->insert_id();
		$bookingpolicy = $this->db->get_where('tbl_booking_policies', array("status"=>"DEFAULT"))->row();
		$cancellationpolicy = $this->db->get_where('tbl_cancellation_policies', array("status"=>"DEFAULT"))->row();
		
		$bookingdata = array(
			'booking_policy'=>$bookingpolicy->id,
			'cancellation_policy'=>$cancellationpolicy->id
		);
		$this->db->where('id', $insert_id);
		if($this->db->update('tbl_dcguidedtours', $bookingdata))
		{
			return "SUCCESS";
		}
        else
		{
			return "FAILED";
		}
      }
	}
	function DCguidedtourslist()
	{
	$this->db->where('user_id', $this->session->userdata('user_id'));
	$this->db->order_by("sequence_number","ASC");
	$query = $this->db->get('tbl_dcguidedtours');
	return $query->result();
    }
	
	function getEditdata($id){
  //  $sql = "SELECT * FROM employee WHERE id = ?";
    //$query =$this->db->query($sql, array($id));
    $this->db->select('*');
    $this->db->from('tbl_dcguidedtours');
    $this->db->where('id',$id);
    $query = $this->db->get();
    return $query->result();
    }
	function updateData($userData,$id)
    {
    $this->db->where('id',$id);      //var_dump($id);exit();
	if($this->db->update('tbl_dcguidedtours',$userData))
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
       $this->db->delete('tbl_dcguidedtours', array('id' => $id));
	   //unlink(base_url("upload/slider/".$files));
    }
	


}
?>
