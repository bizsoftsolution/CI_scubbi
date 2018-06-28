<?php
class SABooking extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('SABookingModel', 'SAbookingModel');
    $this->load->helper('url');
	  $this->load->library('session');
	if ($this->session->userdata('user_type') != 'SUPERADMIN')
	{
        redirect('login');
	}
  }
/*
  public function addNew()
  {
    $result = array('message'=>'');
    if($this->input->post('submit_package_offers_data')){
		$data = array(
			'description' => $this->input->post('package_offers_description')		
		);
		$result['message'] = $this->packageModel->addNew($data);
	  }
    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $this->load->view('packages/newPackage',$result);
    $this->load->view('template/footer');
  }
*/
  function bookingList()
  {
    $data['bookingList']=$this->SAbookingModel->bookingList();
    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $this->load->view('SAdmin/booking/SAbookingList',$data);
    $this->load->view('template/footer');
  }

  public function editStatus($id)
  {
//	echo( "Status: " . $this->input->post('status') .", ID:" . $id . " > Form:" .$this->input->post('booking_no') );
      $result = array('ibooking'=>'');
      if($this->input->post('booking_no'))
      {
//		echo("  inside");
  		  $data = array(
       'status' => $this->input->post('status'),
		'modified' => date("Y-m-d H:i:s")		

  		);

  		$result['ibooking'] = $this->SAbookingModel->updateData($data,$id);
      if($result['ibooking'] == 'SUCCESS')
      {
        $base_url=base_url();
        redirect("$base_url"."SABooking/bookingList");
      }
    }
    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $result['ibooking']=$this->SAbookingModel->editStatus($id);
    $this->load->view('SAdmin/booking/updateBooking',$result);
    $this->load->view('template/footer');
}
/*
  public function deleteData($id)
  {
    $this->packageModel->deleteData($id);
    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $data['packageList']=$this->packageModel->packageList();
    $this->load->view('packages/packageList',$data);
    $this->load->view('template/footer');
  }
*/
}
?>
