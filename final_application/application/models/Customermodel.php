<?php

class Customermodel extends CI_Model{

	public function login($email,$password)
	{
	$this->db->select('*');
	$this->db->from('user t1');
	//$this->db->join('tbl_employee t2', 't1.emp_no = t2.id');
	$this->db->where('t1.email',$email);
	$this->db->where('t1.password',$password);
	$this->db->where('t1.user_type','Customer');
	$this->db->where('t1.status','OPEN');
	$query=$this->db->get();
	$row_count=$query->num_rows();
	//var_dump($email.'-'.$password.'-'.$row_count);exit();
		if($row_count>0){
			$userdata=$query->row();
			$newdata = array(
				'user_id'  => $userdata->user_id,
				'user_type' => $userdata->user_type,
				'first_name' => $userdata->first_name,
				'last_name' => $userdata->last_name,
				'middle_name' => $userdata->middle_name,
				'email'     => $userdata->email,
				'last_login'     => $userdata->last_login,
				'password'     => $userdata->password,
				
				'logged_in' => "TRUE"
				);
			$logdata = array(
				'user_id'  => $userdata->user_id,
				'status' => "SUCCESS"
			);
			$this->session->set_userdata($newdata);
			$this->setLoginTime($userdata->user_id);
			return true;
            //return $newdata;
		}
	return false;
	}

// **********************************************
	/* function facebookdata($userdata)
	{
    if($this->db->insert('facebook_user',$userdata))
      {
        return TRUE;
      }
      else
      {
        return FALSE;
      } 

	} */

	function newtruetwitterid($userdata)
	{
		$insertdata = array(
		'source'=>"TWITTER",
		'password'=>$userdata['oauth_uid'],
		'user_type'=>$userdata['oauth_provider'],
		'profile_pic'=>$userdata['profile_pic'],
		'email'=>$userdata['oauth_uid'],
		'first_name'=>$userdata['first_name'],
		'last_name'=>$userdata['last_name'],		
		'logged_in'=>'FALSE'
		);
	
		$this->db->insert('user',$insertdata);
		$id_user = $this->db->insert_id();
		//return true;
		
		$insertdata1 = array(
		'firstname'=>$userdata['first_name'],
		'lastname'=>$userdata['last_name'],
		'email'=>$userdata['email'],
		'profile_pic'=>$userdata['profile_pic'],
		'user_id'=>$id_user
		);
	
		if($this->db->insert('tbl_customerprofile',$insertdata1))
		{
			return true;
		}
	
	}
	function newtruefacebookid($userdata)
	{
		$insertdata = array(
		'source'=>"FACEBOOK",
		'password'=>$userdata['oauth_uid'],
		'user_type'=>$userdata['oauth_provider'],
		'profile_pic'=>$userdata['profile_pic'],
		'email'=>$userdata['oauth_uid'],
		'first_name'=>$userdata['first_name'],
		'last_name'=>$userdata['last_name'],		
		'logged_in'=>'FALSE'
		);
	
		$this->db->insert('user',$insertdata);
		$id_user = $this->db->insert_id();
		//return true;
		
		$insertdata1 = array(
		'firstname'=>$userdata['first_name'],
		'lastname'=>$userdata['last_name'],
		'email'=>$userdata['email'],
		'dob'=>$userdata['dob'],
		'gender'=>$userdata['gender'],
		'profile_pic'=>$userdata['profile_pic'],
		'user_id'=>$id_user
		);
	
		if($this->db->insert('tbl_customerprofile',$insertdata1))
		{
			return true;
		}
	
	}
	/* function newtruegoogleid($userdata)
	{
		$insertdata = array(
		'oauth_uid'=>"GOOGLE PLUS",
		'password'=>$userdata['oauth_uid'],
		'user_type'=>$userdata['oauth_provider'],
		'email'=>$userdata['oauth_uid'],
		'first_name'=>$userdata['first_name'],
		'last_name'=>$userdata['last_name'],		
		'logged_in'=>'FALSE'
		);
	
		$this->db->insert('user',$insertdata);
		$id_user = $this->db->insert_id();
		//return true;
		
		$insertdata1 = array(
		'firstname'=>$userdata['first_name'],
		'lastname'=>$userdata['last_name'],
		'email'=>$userdata['email'],
		'user_id'=>$id_user
		);
	
		if($this->db->insert('tbl_customerprofile',$insertdata1))
		{
			return true;
		}
	
	}
	function newtruelinkedid($userdata)
	{
		$insertdata = array(
		'oauth_uid'=>"LINKEDIN",
		'password'=>$userdata['oauth_uid'],
		'user_type'=>$userdata['oauth_provider'],
		'email'=>$userdata['oauth_uid'],
		'first_name'=>$userdata['first_name'],
		'last_name'=>$userdata['last_name'],		
		'logged_in'=>'FALSE'
		);
	
		$this->db->insert('user',$insertdata);
		$id_user = $this->db->insert_id();
		//return true;
		
		$insertdata1 = array(
		'firstname'=>$userdata['first_name'],
		'lastname'=>$userdata['last_name'],
		'email'=>$userdata['email'],
		'user_id'=>$id_user
		);
	
		if($this->db->insert('tbl_customerprofile',$insertdata1))
		{
			return true;
		}
	
	} */
//***********************************************
/* 	function googleplus($data)
	{
    if($this->db->insert('googleplus_user',$data))
      {
        return TRUE;
      }
      else
      {
        return FALSE;
      } 

	}
	
	function googleid_exists($data)
	{
	$gid = $data['google_id'];
    $this->db->where('password',$gid);
    $query = $this->db->get('user');
    if ($query->num_rows() > 0){
        return true;
    }
	else
	{
		return false;
	}
	}
	
	function newgoogleid($data)
	{
	$insertdata = array(
	'password'=>$data['google_id'],
	'user_type'=>'Customer',
	'email'=>$data['email'],
	'first_name'=>$data['first_name'],
	'last_name'=>$data['last_name'],		
	'logged_in'=>'FALSE'
	);
	
	$this->db->insert('user',$insertdata);
	$id_user = $this->db->insert_id();
	//return true;
	
	$insertdata1 = array(
	'firstname'=>$data['first_name'],
	'lastname'=>$data['last_name'],
	'email'=>$data['email'],
	'user_id'=>$id_user
	);
	
	if($this->db->insert('tbl_customerprofile',$insertdata1))
	{
		return true;
	}
	
	} */

//*******************************************************	
/*	
public function loginapi($email,$password)
{
	$this->db->select('*');
	$this->db->from('user');
	$this->db->where('email',$email);
	$this->db->where('password',$password);
	$query=$this->db->get();
	$row_count=$query->num_rows();
	//var_dump($email.'-'.$password.'-'.$row_count);exit();
		if($row_count>0){
			 $userdata=$query->row();
			$newdata = array(
				'user_id'  => $userdata->user_id,
				'user_type' => $userdata->user_type,
				'first_name' => $userdata->first_name,
				'last_name' => $userdata->last_name,
				'middle_name' => $userdata->middle_name,
				'email'     => $userdata->email,
//				'password'     => $userdata->password,
				'logged_in' => "TRUE",
				'login_permission'=>"GRANTED"
				);
//			return $this->session->set_userdata($newdata);
			return json_encode($newdata);
// return true;
		} else {
					$newdata = array(
				'user_id'  => '',
				'user_type' => '',
				'first_name' => '',
				'last_name' => '',
				'middle_name' => '',
				'email'     => '',
//				'password'     => $userdata->password,
				'logged_in' => "FALSE",
				'login_permission'=>"DENIED"
				);

	return json_encode($newdata);
	}
} */

// Customer Details //

	function email_availabilty_check($email_id)
	{
		$this->db->where('email',$email_id);
		$query = $this->db->get('tbl_customerprofile');
		if ($query->num_rows() == 0)
		{
			//return "SUCCESS";
			return "SUCCESS";
		}
	}
	function signupData($signupdata)
	{
		$dob = $this->input->post('dob');
		$date1 = str_replace('/', '-', $dob);
		$d_o_b= date('Y-m-d', strtotime($date1));
			
		//$day = date("Y-m-d", strtotime($this->input->post('dob')));
		//$month = date("m", strtotime($this->input->post('month')));
		//$year = date("Y", strtotime($this->input->post('year')));
		
		//$dmy = $year.'-'.$month.'-'.$day;
		$gender = $this->input->post('gender');
		$contactno= $this->input->post('pnumber');
		$email= $this->input->post('email');
		$firstname= $this->input->post('fname');
		$lastname= $this->input->post('lname');
		$cc = $this->input->post('countrycode');
		$this->db->insert('user', $signupdata);
		$id_user = $this->db->insert_id(); 
		
		$cc_mn = $cc.$contactno;
		//$this->db->insert('Table1',$values);    
		//$id_user=$this->db->insert_id();
		$otherValues=array(
		'firstname'=>$firstname,
		'lastname'=>$lastname,
		'gender'=>$gender,
		'dob'=>$d_o_b,
		'email'=>$email,
		'contactno'=>$cc_mn,
		'user_id'=>$id_user
		);
		if($this->db->insert('tbl_customerprofile',$otherValues)){
		return true;
		}
	}
	function get_customerprofile()
	{
		$query = $this->db->get('tbl_customerprofile');
		$result = $query->result();
		return $result;
	}
	function edit_customerprofile($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->get('tbl_customerprofile');
		$result = $query->result();
		return $result;
	}
	
	function updatePhoto($userData,$id)
    {
    $this->db->where('id',$id);      //var_dump($id);exit();
	if($this->db->update('tbl_customerprofile',$userData))
	{
     return true;
	}
    }
	function updateData($userData,$id)
    {
    $this->db->where('id',$id);      //var_dump($id);exit();
	if($this->db->update('tbl_customerprofile',$userData))
	{
     return true;
	}
    }
	
	function updatePassword($data, $chge_id)
	{
		$this->db->where('user_id', $chge_id);
		if($this->db->update('user', $data))
		{
			return true;
		}
	}
	
	function customerPastTrips()
	{
		$current_checkout = date("Y-m-d");
		//$newDate = date("d-m-Y", strtotime($current_checkin));
		$this->db->where('checkout <', $current_checkout);
		$this->db->where_in('status', array('COMPLETED','CONFIRMED'));
		$this->db->where('customer_id', $this->session->userdata('user_id'));
		$this->db->limit(4);
		$this->db->order_by('checkin','DESC');
		$query = $this->db->get('tbl_booking');
		$result = $query->result();
		return $result;
	}
	
	/* function get_Allpasttrips($limit, $start)
	{
		$current_checkout = date("Y-m-d");
		$this->db->where('checkout <', $current_checkout);
		$this->db->where_in('status', array('COMPLETED','CONFIRMED'));
		$this->db->where('customer_id', $this->session->userdata('user_id'));
		$this->db->limit($limit, $start);
		$this->db->order_by('checkin','ASC');
		$query = $this->db->get('tbl_booking');
		$res = $query->result();
		return $res;
		
	} */
	
	function customerUpcomingTrips()
	{
		$current_checkin = date("Y-m-d");
		//$newDate = date("d-m-Y", strtotime($current_checkin));
		$this->db->where('checkin >=', $current_checkin);
		//$this->db->where_in('status', array('CANCELLED','FAILED','PENDING','DECLINED'));
		$this->db->where_in('status', array('PENDING','PAYING','CANCELLED','CONFIRMED','COMPLETED'));
		$this->db->where('customer_id', $this->session->userdata('user_id'));
		$this->db->limit(4);
		$this->db->order_by('checkin','DESC');
		$query = $this->db->get('tbl_booking');
		$result = $query->result();
		return $result;
	}
	/* function get_Allupcomingtrips($limit, $start)
	{
		$current_checkin = date("Y-m-d");
		$this->db->where('checkin >=', $current_checkin);
		$this->db->where_in('status', array('CANCELLED','FAILED','DECLINED','PENDING','CONFIRMED'));
		//$this->db->where_not_in('status', array('CANCELLED','FAILED','DECLINED','PENDING'));
		$this->db->where('customer_id', $this->session->userdata('user_id'));
		$this->db->limit($limit, $start);
		$this->db->order_by('checkin','ASC');
		$query = $this->db->get('tbl_booking');
		$res = $query->result();
		return $res;
		
	} */
	
	function updateAvailability($bid) 
	{
	
	$this->db->select('p.*,b.checkin,b.checkout,b.dive_id,b.status');
	$this->db->from('tbl_booking_product p');
    $this->db->join('tbl_booking b','b.id = p.booking_id','left');
	$this->db->where('p.booking_id',$bid);
	$this->db->where('b.status','CONFIRMED');
	$prodlist = $this->db->get();
	foreach($prodlist as $proditem)
	{
			
		$max_product="";
		$this->db->select('*');
		$this->db->from($proditem->table_name);
		$this->db->where('id',$proditem->product_id);
		$this->db->where('user_id',$proditem->dive_id);
		$no_of_dive = $this->db->get();
		$no_of_dive1 = $no_of_dive->result();
			//var_dump($no_of_dive1);
		foreach($no_of_dive1 as $no_of_dive2)
		{
			if($rrow1->table_name == 'tbl_dcpackage')	
			{
				$max_product = 1; // no max
			}else{
							
				$max_product = $no_of_dive2->max_dive_day;
			}
		}
					 
/* removed for logic inconsistencies					 
			$this->db->select('*');
			$this->db->from('tbl_booking_availability');
			$this->db->where('table_name',$rrow1->table_name);
			$this->db->where('user_id',$rrow1->user_id);
			$this->db->where('product_id',$rrow1->product_id);
			$query21 = $this->db->get();
			$res21 = $query21->result(); 
					// var_dump($res21);
			if($query21->num_rows() != 0) 
			{

*/
		$checkin = $proditem->checkin;
		$checkout = $proditem->checkout;

//---------------------Date Difference----------------------------------------------------

		$date1 = strtotime($checkin);
		$date2 = strtotime($checkout);
		$datediff = $date2 - $date1;
		$days_between = floor($datediff / (60 * 60 * 24));

		//echo $days_between;		
		$checkin1 = $this->input->post('checkindate');
		$checkin1 = strtotime($checkin1);
		$slt_value =0;
		for($i=0;$i<=$days_between;$i++)
		{
						
							
			$newCheckin = date('Y-m-d', $checkin1);

			$this->db->select('*');
			$this->db->from('tbl_booking_availability');
			$this->db->where('bookeddate',$newCheckin);
			$this->db->where('user_id',$proditem->dive_id);
			$this->db->where('product_id',$proditem->product_id);
			$this->db->where('table_name',$proditem->table_name);
			$query22 = $this->db->get();
			$res22 = $query22->result();
			if($query22->num_rows() != 0) 
			{
									//echo "1";
				foreach($res22 as $upres22)
				{
					// echo $upres22->booked_dives;
					$data22=array('booked_dives'=>$upres22->booked_dives +$max_product );
					$this->db->where('id',$upres22->id);
					if($this->db->update('tbl_booking_availability ',$data22))
					{
						$resultDive = 1;								
					}
				}
			}else{

																	//echo "2";
				$inserAvalability1 = array(
				'bookeddate' => $newCheckin,
				'booked_dives' => $max_product,
				'table_name' => $proditem->table_name,
				'user_id' => $proditem->user_id,
				'product_name' => $rrow1->product_name,
				'product_id' => $rrow1->product_id
				); 
				if($this->db->insert('tbl_booking_availability', $inserAvalability1))
				{
					$resultDive = 1;
				}
			}
			$checkin1 = strtotime("+1 day", $checkin1);

		}

	}						
						
						

	
	}

	function addPassenger($arr_data)
	{
		$this->db->insert('tbl_passenger', $arr_data);
		return true;
	}
	function updatePassenger($id,$arr_data)
	{
		$this->db->where('id', $id);
		$this->db->update('tbl_passenger', $arr_data);
		return true;
	}
	function statusUpdated($id, $arr_update)
	{
		$this->db->where('id', $id);
		$this->db->update('tbl_booking', $arr_update);
		return true;
	}
	function confirmCancellation($id, $cancell_data)
	{
		$this->db->where('id', $id);
		$this->db->update('tbl_booking', $cancell_data);
		
		return true;
	}	
// Customer Details End //

	public function logout($user_id){
	$data['logged_in']="FALSE";
	$this->db->where('user_id',$user_id);
	$this->db->update('user',$data);
	$newdata = array(
	'user_id'   => '',
	'email'     => '',
	'user_type' => '',
	'first_name' => '',
	'last_name' => '',
	'middle_name' => '',
	'password'     => '',
	'logged_in' => "FALSE"
	);
	$this->session->set_userdata($newdata);

	}
	/* public function userregister($data){
	$this->load->database();
	if($this->db->insert('user', $data))
		return true;
	else
		return false;
	} */

	public function setLoginTime($user_id){
	$data['last_login']=date("Y-m-d H:i:s");
	$data['logged_in']="TRUE";
	$this->db->where('user_id',$user_id);
	$this->db->update('user',$data);
	}
	public function allMessages($customerId)
	{
		$this->db->select('c.*,(select m1.to from messages m1 where m1.thread_id = c.thread_id order by id desc limit 1) lto,(select m2.from from messages m2 where m2.thread_id = c.thread_id order by id desc limit 1) lfrom,(select m3.to_name from messages m3 where m3.thread_id = c.thread_id order by id desc limit 1) ltoname,(select m4.from_name from messages m4 where m4.thread_id = c.thread_id order by id desc limit 1) lfromname,(select m5.id from messages m5 where m5.thread_id = c.thread_id order by id desc limit 1) lid');
		$this->db->from('tbl_conversation as c');
//		$this->db->from('tbl_messages as m');
		
		$this->db->where('c.customer_id', $customerId);

		//$this->db->where('from',$customerId);
		//$this->db->or_where('to',$customerId);
		$this->db->order_by('c.lastmsg','DESC');
//		$query = $this->db->get('messages');
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
	public function individualMessage($user_id,$customer_id,$thread)
	{
		$data1 = array('is_read'=>1);
		$this->db->where('thread_id', $thread);
		if($this->db->update('messages', $data1))
		{
			//		 $this->db->where('from', $user_id);
        $this->db->where('thread_id', $thread);
       // $this->db->where('is_read', 0);
//        $this->db->where('to', $customer_id);
 //       $this->db->or_where('from', $customer_id);
//        $this->db->where('thread_id', $thread);
//        $this->db->where('to', $user_id);
        $this->db->order_by('id', 'desc');
        $messages = $this->db->get('messages');
        
         return $messages->result(); 
		}
	}
		function newChat($data)
    {
        if ($this->db->insert('messages', $data)) {
			$udata = array(
			"lastmsg" => $data["time"],
			"lastmsgfrom" => $data["from"]
			);
			$uwhere = array("thread_id"=>$data["thread_id"]);
			$this->db->update('tbl_conversation', $udata,$uwhere);
            return "SUCCESS";
        } else {
            return "FAILED";
        }
        
    }
	function insertReview($data)
	{
		if($this->db->insert('tbl_review', $data))
		{
		return true;
		}
		
	}
	
	function customerViewmyreview($id)
	{
		$usid = $this->session->userdata('user_id');
		$this->db->where('divecenter_id', $id);
		$this->db->where('customer_id', $usid);
		$this->db->order_by('id', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get('tbl_review');
		$result = $query->result();
		return $result;
	}
function bookingInfo()
	{
		$data1 = array(
		'checkin'=>$this->input->post('checkindate'),
		'checkout'=>$this->input->post('checkoutdate'),
		'no_of_persons'=>$this->input->post('noofperson'),
		'dive_id'=>$this->input->post('diveid'),
		'grand_total'=>$this->input->post('grandtotal')
		);
		$this->db->insert('tbl_booking', $data1);
		$id_user = $this->db->insert_id(); 
		//total cart items
		//$dive_id = $this->input->post('diveid');
		//$numofcartitems = $this->input->post('totalcartitems');
		$this->load->library("cart");
		foreach($this->cart->contents() as $items)
		{	 
			//echo $items["name"]."<br>";
			$data2 = array(
			'product_id'=>$items["id"],
			'product_name'=>$items["name"],
			'qty'=>$items["qty"],
			'price'=>$items["price"],
			'sub_total'=>$items["subtotal"],
			'dive_id'=>$this->input->post('diveid'),
			'tab_name'=>"",
			'booking_id'=>$id_user
			);
				
			$this->db->insert('tbl_booking_product', $data2);		
		}
		
		$nop = $this->input->post('noofperson');
		
		for($i=0; $i<=$nop; $i++)
		{
			$title = $this->input->post('title['.$i.']');
			$fname = $this->input->post('firstname['.$i.']');
			$fullname = $title.' '.$fname;
			$countrycode = $this->input->post('countrycode['.$i.']');
			$phoneno = $this->input->post('mobilenumber['.$i.']');
			$fullphnumber = $countrycode.' '.$phoneno;
			$surname = $this->input->post('lastname['.$i.']');
			$email = $this->input->post('email['.$i.']');
		
			$data3 = array(
			'name'=>$fullname,
			'surname'=>$surname,
			'email'=>$email,
			'phone_no'=>$fullphnumber,
			'booking_id'=>$id_user
			);
			$this->db->insert('tbl_passenger', $data3);	
		}
		return true;	
	}


	
}
