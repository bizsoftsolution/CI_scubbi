<?php
class DCreview extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('DCreviewmodel');
    $this->load->helper('url');
	  $this->load->library('session');
	if ($this->session->userdata('user_type') != 'DCADMIN')
	{
        redirect('login');
	}
  }
  
  //**********************************************************************************************************************************************
 //                                                                   [ Dive Center Leisure Start] //***********************************************************************************************************************************************
 


  function index()
  {
	$user_id = $this->session->userdata('user_id');
    $data['DCreviewlist']=$this->DCreviewmodel->DCreviewlist($user_id);
    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $this->load->view('DCreview/DCreview',$data);
    $this->load->view('template/footer');
  }
  
 
  
 
}
?>
