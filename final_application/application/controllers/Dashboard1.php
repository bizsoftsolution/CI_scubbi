<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
    }
	public function index()
	{
		if ($this->session->userdata('first_name')!=null) {
    	   if($this->session->userdata('user_id')!='')
		   {
				$this->load->view('template/header');
				$this->load->view('template/sidebar');
				$this->load->view('template/content');
				$this->load->view('template/footer');
		   }
		   else
		   {
				redirect('Login');
			}
		}
		else
		{
			redirect('Login');
		}
	}
}


?>
