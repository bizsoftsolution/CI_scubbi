
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class ChangePasswordModel extends CI_Model

	{

	public function __construct()
		{
		parent::__construct();
		$this->load->database();
		}
	public function pwd_update($id,$new)
	{
	  $this->db->where('user_id',$id);
	  if($this->db->update('user',$new))
		{
			return "SUCCESS";
		}
		else 
		{
			return "FAILED";
		}
	}
}
