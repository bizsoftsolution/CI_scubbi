<?php
class DCBookingModel extends CI_Model {
 function __construct()
    {
              parent::__construct();
              $this->load->database();
				$this->load->helper('file');
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
function dcbookingList($dc_id)
{
	$this->db->where('dive_id',$dc_id);
	$this->db->where_in('status',array("PENDING","CONFIRMED","CANCELLED","DECLINED","COMPLETED","PAYING"));
	$this->db->order_by('id','desc');
 $bookings = $this->db->get('tbl_booking');
  return $bookings->result();
    }

function updateData($data,$id,$status)
    {


      $this->db->where('id',$id);      //var_dump($id);exit();
     // $this->db->from('tbl_country');
   if($this->db->update('tbl_booking',$data))
   {
      $this->db->where('id',$id);      //var_dump($id);exit();
	$bookres = $this->db->get('tbl_booking')->result();
	$cid = 0;
		foreach($bookres as $brow)
		{
			$cid = $brow->customer_id;
			$bid = $brow->booking_no;
		}
	if($cid != 0) {
		$this->putmessage($cid,$bid,$status);
	}


     return "SUCCESS";
   }
   else {
     {
       return "FAILED";
     }
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
  function productList($id){
  //  $sql = "SELECT * FROM employee WHERE id = ?";
    //$query =$this->db->query($sql, array($id));
    $qry = "SELECT diverid, product_name, qty, price, no_of_dive, sub_total, product_id, accom, accom_basis FROM `tbl_booking_product` WHERE booking_id = '$id'
union
SELECT diverid, concat(' &nbsp;&nbsp;Opt:', product_name) as product_name, qty, price, 0 as no_of_dive, total as sub_total, booking_product_id as product_id, 'No',1 FROM `tbl_booking_product_optional` WHERE booking_id = '$id'
order by diverid,product_id";
//echo $qry;
	$query = $this->db->query($qry);
    return $query->result();
    }

 function putmessage($cust_id, $refno, $type) {

		$logmsg = "CustID: $cust_id, RefNo: $refno, Status: $type \n";
		$tid = 0;
		$this->db->where('customer_id',$cust_id);
		$this->db->where('dc_id',$this->session->userdata('user_id'));
		$conres = $this->db->get('tbl_conversation')->result();
		foreach($conres as $crow)
		{
			$tid = $crow->thread_id;
		}
		$logmsg .= "  Thread: $tid \n";

		if ($tid == 0) {
			$conversation = array(
			'topic' => "Booking Ref: $refno",
			'salesrefno' => $refno,
			'dc_id' => $this->session->userdata('user_id'),
			'customer_id' => $cust_id,
			'started' => date("Y-m-d H:i:s"),
			'lastmsg' => date("Y-m-d H:i:s"),
			'lastmsgfrom' => $this->session->userdata('user_id')
			);  
			if ($this->db->insert('tbl_conversation', $conversation)) 
			{
				$threadid = $this->db->insert_id();
			} else {	
				$threadid = $tid;
			}
			$logmsg .= "  Insert Conversation Thread: $threadid \n";

		} else {
			$threadid = $tid;
		}
		if ($threadid != 0) 
		{
			$this->db->select('c.*,(select u1.first_name from user u1 where u1.user_id = c.dc_id) dcname,(select u2.first_name from user u2 where u2.user_id = c.customer_id ) custname');
			$this->db->from('tbl_conversation c');
			$this->db->where('thread_id',$threadid);
			$query = $this->db->get();
			$result = $query->result();
			foreach($result as $row1)
			{
				$custname = $row1->custname;
				$dcname = $row1->dcname;
			}
			$msg="";
			switch($type) {
			case "CONFIRMED":
			$msg = "DC Confirmation ref: " .$refno;
			break;
			case "PENDING":
			$msg = "DC Deferred ref: " .$refno;
			break;
			case "DECLINED":
			$msg = "DC Declined ref: " .$refno;
			break;
			}
			$msgdata = array(
				'from' => $this->session->userdata('user_id'),		
				'to' => $cust_id,		
				'thread_id' => $threadid,	
				'mtype' =>	"STS",
				'message' => $msg,		
				'time' => date("Y-m-d H:i:s"),		
				'to_name' => $custname,		
				'from_name' => $dcname,		
			);
			$this->db->insert('messages', $msgdata);
			$logmsg .= "    Insert message -> $msg \n";

		}

		if ( !write_file('application/models/logdcbookingmsg.txt', $logmsg)){
     		echo 'Unable to write the file';
		}			


 }


/*
 function deleteData($id)
    {
       $this->db->delete('tbl_package', array('id' => $id));
    }
*/
       }
?>
