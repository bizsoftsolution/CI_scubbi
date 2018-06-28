<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Promo_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}
	public function save($data){
		if(empty($_POST['promo_id'])){
			return  $this->db->insert('promo_code_details',$data);
		}else{
			return  $this->db->update('promo_code_details',$data,array('promo_id'=>$_POST['promo_id']));
		}
		
	}
	Public function get_promo_code()
	{
		$where = array('status'=>1,'fk_promo_id'=>0);
		return $this->db->get_where('promo_code_details',$where)->result();
	}
	Public function get_promo_by_id()
	{
		$where = array('promo_id'=>$_POST['promo_id']);
		return $this->db->get_where('promo_code_details',$where)->row();
	}
	Public function delete_promo()
	{
		
		$this->db->where('promo_id', $_POST['promo_id']);
		if($this->db->delete('promo_code_details'))
		{
			$this->db->where('fk_promo_id', $_POST['promo_id']);
			return $this->db->delete('promo_code_details');
		}
		
		/* $data = array('status'=>0);
		return  $this->db->update('promo_code_details',$data,array('promo_id'=>$_POST['promo_id'])); */
	}

}

/* End of file  */
/* Location: ./application/models/ */