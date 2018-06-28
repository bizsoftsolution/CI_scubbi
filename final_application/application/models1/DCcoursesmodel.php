<?php
class DCcoursesmodel extends CI_Model {
 function __construct()
    {
	  parent::__construct();
	  $this->load->database();
    }
    
//**********************************************************************************************************************************************
//                                                                   [ Dive Center Leisure START ] //**********************************************************************************************************************************************
    function addNew($userData,$single,$double,$triple,$quad,$custom,$single_b1,$double_b1,$triple_b1,$quad_b1,$custom_b1,$apply_promo_bulk_str1,$apply_promo_bulk_endr1)
	{
		
     if($this->db->insert('tbl_dccourses',$userData))
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
							'table'=>'tbl_dccourses',
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
							'table'=>'tbl_dccourses',
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
      else
      {
        return "FAILED";
      }
	}
	function DCcoursesdashboard()
	{
	$this->db->where('user_id', $this->session->userdata('user_id'));
	$this->db->where('status', 'ENABLE');
	$this->db->order_by("sequence_number","ASC");
	$query = $this->db->get('tbl_dccourses');
	return $query->result();
    }
	function DCcourseslist()
	{
		$query = "tbl_standard_courses where id NOT IN (select standard_id from tbl_dccourses)";
		$result = $this->db->get($query);
		return $result->result();
    }
	function enable($data2)
	{
		//var_dump($data2);
		//$this->db->where('id',$id);      //var_dump($id);exit();
		if($this->db->insert('tbl_dccourses',$data2))
		{
		 return "SUCCESS";
		}
		else 
		{
			return "FAILED";
		}
	}
	function disable($data2)
	{
		if($this->db->insert('tbl_dccourses',$data2))
		{
		 return "SUCCESS";
		}
		else 
		{
			return "FAILED";
		}
	}
	function getEditdata($id){
  //  $sql = "SELECT * FROM employee WHERE id = ?";
    //$query =$this->db->query($sql, array($id));
    $this->db->select('*');
    $this->db->from('tbl_dccourses');
    $this->db->where('id',$id);
    $query = $this->db->get();
    return $query->result();
    }
	function updateData($userData,$id,$single,$double,$triple,$quad,$custom,$single_b1,$double_b1,$triple_b1,$quad_b1,$custom_b1,$apply_promo_bulk_str1,$apply_promo_bulk_endr1)
    {
    $this->db->where('id',$id);      //var_dump($id);exit();
	if($this->db->update('tbl_dccourses',$userData))
	{
		  if($this->db->delete('tbl_dcroomrates', array('prodid' => $id, 'table'=>'tbl_dccourses')))
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
							'table'=>'tbl_dccourses',
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
							'table'=>'tbl_dccourses',
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
       $this->db->delete('tbl_dccourses', array('id' => $id));
	   $this->db->delete('tbl_dcroomrates', array('prodid' => $id, 'table'=>'tbl_dccourses'));
	   $this->db->delete('tbl_dcpromoroomrates', array('prodid' => $id, 'table'=>'tbl_dccourses'));
	   //unlink(base_url("upload/slider/".$files));
    }
	
}
?>
