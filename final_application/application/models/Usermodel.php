<?php

class Usermodel extends CI_Model{

public function login($email,$password)
{
	$this->db->select('*');
	$this->db->from('user t1');
	//$this->db->join('tbl_employee t2', 't1.emp_no = t2.id');
	$this->db->where('t1.email',$email);
	$this->db->where('t1.password',$password);
	$this->db->where('t1.status',"OPEN");
	//$this->db->where('t1.user_type','DCADMIN');
	$this->db->where_not_in('t1.user_type', array('Customer'));
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
				'emp_no'     => $userdata->emp_no,
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
	'user_type'=>'Facebook User',
	'email'=>$userdata['email'],
	'first_name'=>$userdata['first_name'],
	'last_name'=>$userdata['last_name'],		
	'logged_in'=>'FALSE'
	);
	if($this->db->insert('user',$insertdata))
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
	'user_type'=>'Googleplus User',
	'email'=>$data['email'],
	'first_name'=>$data['first_name'],
	'last_name'=>$data['last_name'],		
	'logged_in'=>'FALSE'
	);
	if($this->db->insert('user',$insertdata))
	{
		return true;
	}
	
	}

//*******************************************************	
	
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
}



public function logout($user_id){
$data['logged_in']="FALSE";
$this->db->where('user_id',$user_id);
$this->db->update('user',$data);
$newdata = array(
'user_id'   => '',
'email'     => '',
'emp_no'     => '',
'user_type' => '',
'first_name' => '',
'last_name' => '',
'middle_name' => '',
'password'     => '',
'logged_in' => "FALSE"
);
$this->session->set_userdata($newdata);

}
public function userregister($data){
$this->load->database();
if($this->db->insert('user', $data))
	return true;
else
	return false;
}

public function setLoginTime($user_id){
$data['last_login']=date("Y-m-d H:i:s");
$data['logged_in']="TRUE";
$this->db->where('user_id',$user_id);
$this->db->update('user',$data);
}

}
