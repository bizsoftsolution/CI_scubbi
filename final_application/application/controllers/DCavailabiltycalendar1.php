<?php
class DCavailabiltycalendar extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('DCcalendarmodel');
    $this->load->helper('url');
	  $this->load->library('session');
	  $this->load->database();
  }
  
  //**********************************************************************************************************************************************
 //                                                                   [ Dive Center Profile Start] //***********************************************************************************************************************************************
 
 
  
  function index()
  {
 //   $data=$this->DCcalendarmodel->DCcalendarlist1();
 $data = array(
				'table' => '',
				'product_id' => ''
				);
	  if($this->input->post('scountry'))
	  {
		$table = $this->input->post('scountry');
		$product_id = $this->input->post('islands');
		$data = array(
				'table' => $table,
				'product_id' => $product_id
				);
		
	  }
	  
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('mybookings/DCavailability_calendar',$data);
		$this->load->view('template/footer');
  }  
  function datavalue()
  {
    $data=$this->DCcalendarmodel->DCcalendarlist1();
  }
  function get_product($table)
  {
	 $this->load->model('DCcalendarmodel');
	 header('Content-Type: application/x-json; charset=utf-8');
	 echo(json_encode($this->DCcalendarmodel->get_product($table)));
  }
  function search()
  {
	  $data = array(
				'table' => '',
				'product_id' => ''
				);
	  if($this->input->post('scountry'))
	  {
		$table = $this->input->post('scountry');
		$product_id = $this->input->post('islands');
		$data = array(
				'table' => $table,
				'product_id' => $product_id
				);
		
	  }
	  
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('mybookings/DCavailability_calendar',$data);
		$this->load->view('template/footer');
	  
	  
  }
  
  
  
  //**********************************************************************************************************************************************//
 //                                                                   [ Dive Center Profile END] //***********************************************************************************************************************************************//

}
?>
