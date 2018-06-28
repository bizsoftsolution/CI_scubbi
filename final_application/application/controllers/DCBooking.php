<?php
class DCBooking extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('DCBookingModel', 'DCbookingModel');
    $this->load->helper('url');
	  $this->load->library('session');
	if (($this->session->userdata('user_type') != 'SUPERADMIN') && ($this->session->userdata('user_type') != 'CUSTOM') && ($this->session->userdata('user_type') != 'DCADMIN'))
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
  function bookingList($dc_id)
  {
    $data['bookingList']=$this->DCbookingModel->dcbookingList($dc_id);
	//var_dump($data);
     $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $this->load->view('booking/bookingList',$data);
    $this->load->view('template/footer'); 
  }

  public function editStatus($id,$dc_id)
  {
      $result = array('ibooking'=>'');
	 // echo $this->input->post('booking_no'); exit();
      if($this->input->post('booking_no'))
      {
  		  $data = array(
       'status' => $this->input->post('status')

  		);
  		$result['ibooking'] = $this->DCbookingModel->updateData($data,$id, $this->input->post('status'));
      if($result['ibooking'] == 'SUCCESS')
      {
        $base_url=base_url();
        redirect("$base_url"."DCBooking/bookingList/$dc_id");
      }
    }
    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $result['ibooking']=$this->DCbookingModel->editStatus($id);
  	$result['iproduct'] = $this->DCbookingModel->productlist($id);
  	$result['booking_id'] = $id;
    $result['dc_id'] = $dc_id;
    $this->load->view('booking/updateBookingStatus',$result);
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
