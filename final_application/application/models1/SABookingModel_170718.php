<?php
class SABookingModel extends CI_Model {
 function __construct()
    {
              parent::__construct();
              $this->load->database();
    }
/*
    function addNew($data)
{
      if($this->db->insert('tbl_package',$data))
      {
        return "SUCCESS";
      }
      else
      {
        return "FAILED";
      }

}
*/
function bookingList()
{
//	$this->db->where('dive_id',$dc_id);
	$this->db->select('b.*,c.country_name,i.island_name');
    $this->db->from('tbl_booking b');
    $this->db->join('tbl_dcprofile d','b.dive_id = d.user_id','left');
    $this->db->join('tbl_country c','d.dccountry = c.country_id','left');
    $this->db->join('tbl_island i','d.dcislands = i.island_id','left');
	$this->db->where_in('status',array("PENDING","CONFIRMED","CANCELLED","DECLINED","COMPLETED"));
  $this->db->order_by('id','desc');
 $bookings = $this->db->get();
  return $bookings->result();
    }

function updateData($data,$id)
    {

      $this->db->where('id',$id);      //var_dump($id);exit();
     // $this->db->from('tbl_country');
   if($this->db->update('tbl_booking',$data))
   {
     return "SUCCESS";
   }
   else {
     
       return "FAILED";
     
   }
        }

  function editStatus($id){
  //  $sql = "SELECT * FROM employee WHERE id = ?";
    //$query =$this->db->query($sql, array($id));
	$this->db->select('b.*,c.country_name,i.island_name,p.email,p.firstname,p.lastname,p.contactno,p.language,n.country_name as nationality,p.diver_registration_level, p.diver_speciality_skill,p.diver_card,floor(datediff(curdate(),dob)/365) as age,d.dcname,dcemailid,d.dctelephone_no');
    $this->db->from('tbl_booking b');
    $this->db->join('tbl_dcprofile d','b.dive_id = d.user_id','left');
    $this->db->join('tbl_customerprofile p','b.customer_id = p.user_id','left');
    $this->db->join('tbl_country c','d.dccountry = c.country_id','left');
    $this->db->join('tbl_island i','d.dcislands = i.island_id','left');
    $this->db->join('tbl_country n','p.nationality = n.country_id','left');
    $this->db->where('b.id',$id);
    $query = $this->db->get();
    return $query->result();
    }
/*
 function deleteData($id)
    {
       $this->db->delete('tbl_package', array('id' => $id));
    }
*/
       }
?>
