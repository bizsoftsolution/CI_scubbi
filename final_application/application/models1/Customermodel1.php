<?php

class Customermodel extends CI_Model{

	public function login($email,$password)
	{
	$this->db->select('*');
	$this->db->from('user t1');
	//$this->db->join('tbl_employee t2', 't1.emp_no = t2.id');
	$this->db->where('t1.email',$email);
	$this->db->where('t1.password',$password);
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
			$this->session->set_userdata($newdata);
			$this->setLoginTime($userdata->user_id);
			return true;
            //return $newdata;
		}
	return false;
	}

// **********************************************
	function facebookdata($userdata)
	{
    if($this->db->insert('facebook_user',$userdata))
      {
        return TRUE;
      }
      else
      {
        return FALSE;
      } 

	}

	function newfacebookid($userdata)
	{
	$insertdata = array(
	'password'=>$userdata['oauth_uid'],
	'user_type'=>'Customer',
	'email'=>$userdata['email'],
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
//***********************************************
	function googleplus($data)
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
	
	}

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

	function signupData($signupdata,$signupdata1)
	{
		$dob = $this->input->post('dob');
		$date_dob =date("Y-m-d", strtotime($dob));
		$gender = $this->input->post('gender');
		$contactno= $this->input->post('pnumber');
		$email= $this->input->post('email');
		$firstname= $this->input->post('fname');
		$lastname= $this->input->post('lname');
		
		$this->db->insert('user', $signupdata);
		$id_user = $this->db->insert_id(); 
		
		//$this->db->insert('Table1',$values);    
		//$id_user=$this->db->insert_id();
		$otherValues=array(
		'firstname'=>$firstname,
		'lastname'=>$lastname,
		'gender'=>$gender,
		'dob'=>$date_dob,
		'email'=>$email,
		'contactno'=>$contactno,
		'user_id'=>$id_user
		);
		$this->db->insert('tbl_customerprofile',$otherValues);
		return true;
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
		$this->db->where('checkout <=', $current_checkout);
		$this->db->limit(4);
		$query = $this->db->get('tbl_booking');
		$result = $query->result();
		return $result;
	}
	
	function get_Allpasttrips($limit, $start)
	{
		$current_checkout = date("Y-m-d");
		$this->db->where('checkin <=', $current_checkout);
		$this->db->limit($limit, $start);
		$query = $this->db->get('tbl_booking');
		$res = $query->result();
		return $res;
		
	}
	
	function customerUpcomingTrips()
	{
		$current_checkin = date("Y-m-d");
		//$newDate = date("d-m-Y", strtotime($current_checkin));
		$this->db->where('checkin >=', $current_checkin);
		$this->db->limit(4);
		$query = $this->db->get('tbl_booking');
		$result = $query->result();
		return $result;
	}
	function get_Allupcomingtrips($limit, $start)
	{
		$current_checkin = date("Y-m-d");
		$this->db->where('checkin >=', $current_checkin);
		$this->db->limit($limit, $start);
		$query = $this->db->get('tbl_booking');
		$res = $query->result();
		return $res;
		
	}
	
	function addPassenger($arr_data)
	{
		$this->db->insert('tbl_passenger', $arr_data);
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
		$this->db->where('from',$customerId);
		$this->db->or_where('to',$customerId);
		$this->db->order_by('id','DESC');
		$query = $this->db->get('messages');
		$result = $query->result();
		return $result;
	}
	public function individualMessage($user_id,$customer_id)
	{
		 $this->db->where('from', $user_id);
        $this->db->where('to', $customer_id);
        $this->db->or_where('from', $customer_id);
        $this->db->where('to', $user_id);
        $this->db->order_by('id', 'asc');
        $messages = $this->db->get('messages');
        
         return $messages->result(); 
	}
		function newChat($data)
    {
        if ($this->db->insert('messages', $data)) {
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
