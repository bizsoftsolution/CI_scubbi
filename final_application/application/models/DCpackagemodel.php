<?php
class DCpackagemodel extends CI_Model {
 function __construct()
    {
	  parent::__construct();
	  $this->load->database();
    }
//**********************************************************************************************************************************************
//                                                                   [ Dive Center Leisure START ] //**********************************************************************************************************************************************
    function addNew($userData,$single,$double,$triple,$quad,$custom,$single_b1,$double_b1,$triple_b1,$quad_b1,$custom_b1,$apply_promo_bulk_str1,$apply_promo_bulk_endr1)
	{
      if($this->db->insert('tbl_dcpackage',$userData))
      {
       $a=0;
		$prodid = $this->db->insert_id();
		for($i=0;$i<4;$i++)
				{
					$season="";
					if($i==0)
					{
						$season="NM";
					}
					else if($i==1)
					{
						$season = "WE";
					}
					else if($i==2)
					{
						$season = "PK";
					}
					else{
						$season = "SP";
					}
					$roominsert = array(
							'dcid'=>$this->session->userdata('user_id'),
							'season'=>$season,
							'table'=>'tbl_dcpackage',
							'prodid'=>$prodid,
							'single'=>$single[$i],
							'double'=>$double[$i],
							'triple'=>$triple[$i],
							'quad'=>$quad[$i],
							'udefine'=>$custom[$i],
							'status'=>1
						);
						if($this->db->insert('tbl_dcroomrates',$roominsert))
					  {
						$promoroominsert = array(
							'dcid'=>$this->session->userdata('user_id'),
							'table'=>'tbl_dcpackage',
							'prodid'=>$prodid,
							'ap_unit'=>$this->input->post('dcdiscountunit'),
							'ap_rate'=>$this->input->post('apdiscountrate'),
							'ap_start'=>$apply_promo_bulk_str1,
							'ap_end'=>$apply_promo_bulk_endr1,
							'season'=>$season,
							'single'=>$single_b1[$i],
							'double'=>$double_b1[$i],
							'triple'=>$triple_b1[$i],
							'quad'=>$quad_b1[$i],
							'udefine'=>$custom_b1[$i],
							'status'=>1
						  );
						  if($this->db->insert('tbl_dcpromoroomrates',$promoroominsert))
							{
								$bookingpolicy = $this->db->get_where('tbl_booking_policies', array("status"=>"DEFAULT"))->row();
								$cancellationpolicy = $this->db->get_where('tbl_cancellation_policies', array("status"=>"DEFAULT"))->row();
								
								$bookingdata = array(
									'booking_policy'=>$bookingpolicy->id,
									'cancellation_policy'=>$cancellationpolicy->id
								);
								$this->db->where('id', $prodid);
								if($this->db->update('tbl_dcpackage', $bookingdata))
								{
									//return "SUCCESS";
									$a =1;
								}
								
							}
					  }
				}
				if($a == 1)
				{
					return "SUCCESS";
				}
      }
      else
      {
        return "FAILED";
      }
	}
	function DCpackagelist()
	{
	$this->db->where('user_id', $this->session->userdata('user_id'));
	$this->db->order_by("sequence_number","ASC");
	$query = $this->db->get('tbl_dcpackage');
	return $query->result();
    }
	
	function DCpackagedashboard()
	{
	$this->db->where('user_id', $this->session->userdata('user_id'));
	$this->db->order_by("sequence_number","ASC");
	$query = $this->db->get('tbl_dcpackage');
	return $query->result();
    }
	
	function getEditdata($id){
  //  $sql = "SELECT * FROM employee WHERE id = ?";
    //$query =$this->db->query($sql, array($id));
    $this->db->select('*');
    $this->db->from('tbl_dcpackage');
    $this->db->where('id',$id);
    $query = $this->db->get();
    return $query->result();
    }
	function updateData($userData,$id,$single,$double,$triple,$quad,$custom,$single_b1,$double_b1,$triple_b1,$quad_b1,$custom_b1,$apply_promo_bulk_str1,$apply_promo_bulk_endr1)
    {
		$this->db->where('id',$id);      //var_dump($id);exit();
		if($this->db->update('tbl_dcpackage',$userData))
		{
			$this->db->where('prodid', $id);
			$this->db->where('table','tbl_dcpackage');
		  if($this->db->delete('tbl_dcroomrates'))
		  {
			  $a=0;
				$prodid = $id;
				for($i=0;$i<4;$i++)
				{
					$season="";
					if($i==0)
					{
						$season="NM";
					}
					else if($i==1)
					{
						$season = "WE";
					}
					else if($i==2)
					{
						$season = "PK";
					}
					else{
						$season = "SP";
					}
					$roominsert = array(
							'dcid'=>$this->session->userdata('user_id'),
							'season'=>$season,
							'table'=>'tbl_dcpackage',
							'prodid'=>$prodid,
							'single'=>$single[$i],
							'double'=>$double[$i],
							'triple'=>$triple[$i],
							'quad'=>$quad[$i],
							'udefine'=>$custom[$i],
							'status'=>1
						);
						if($this->db->insert('tbl_dcroomrates',$roominsert))
					  {
						$promoroominsert = array(
							'dcid'=>$this->session->userdata('user_id'),
							'table'=>'tbl_dcpackage',
							'prodid'=>$prodid,
							'ap_unit'=>$this->input->post('dcdiscountunit'),
							'ap_rate'=>$this->input->post('apdiscountrate'),
							'ap_start'=>$apply_promo_bulk_str1,
							'ap_end'=>$apply_promo_bulk_endr1,
							'season'=>$season,
							'single'=>$single_b1[$i],
							'double'=>$double_b1[$i],
							'triple'=>$triple_b1[$i],
							'quad'=>$quad_b1[$i],
							'udefine'=>$custom_b1[$i],
							'status'=>1
						  );
						  if($this->db->insert('tbl_dcpromoroomrates',$promoroominsert))
							{
								$a =1;
							}
					  }
				}
				if($a == 1)
				{
					return "SUCCESS";
				}
		  }
		}
		else 
		{
			return "FAILED";
		}
    }
 function deleteData($id)
    {
       $this->db->delete('tbl_dcpackage', array('id' => $id));
	   $this->db->where('prodid', $id);
	   $this->db->where('table','tbl_dcpackage');
	   $this->db->delete('tbl_dcroomrates');
	   $this->db->delete('tbl_dcpromoroomrates', array('prodid' => $id, 'table'=>'tbl_dcpackage'));
	   //unlink(base_url("upload/slider/".$files));
    }
	


}
?>
