<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class ChangePassword extends CI_Controller

{
  public function __construct()
    {
    parent::__construct();
    $this->load->model('ChangePasswordModel');
	$this->load->library('session');
    $this->load->helper('url');
    }

  public function index()
    {
	$result = array('message'=>'');
	$this->load->view('template/header');
	$this->load->view('template/sidebar');
	$this->load->view('change_password', $result);
	$this->load->view('template/footer');
    }
    public function pwd_update($id)
  	 {
       $new = array(
		   'password' => $this->input->post('new_password')
		   );
		$result['message'] = $this->ChangePasswordModel->pwd_update($id, $new);
		if($result['message'] == 'SUCCESS')
		{
			redirect('Login/logout');
		}
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('change_password', $result);
		$this->load->view('template/footer');
  	 }
}
