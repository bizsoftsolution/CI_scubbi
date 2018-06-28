<?php
class SAReports extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('SAReportsModel');
    $this->load->helper('url');
	  $this->load->library('session');
	if (($this->session->userdata('user_type') != 'SUPERADMIN') && ($this->session->userdata('user_type') != 'CUSTOM'))
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
  function salesReportsList()
  {
    $data['salesReportsList']=$this->SAReportsModel->salesReportsList();
    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $this->load->view('SAdmin/reports/SAreportsList',$data);
    $this->load->view('template/footer');
  }
  function cancelReportsList()
  {
    $data['cancelReportsList']=$this->SAReportsModel->cancelReportsList();
    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $this->load->view('SAdmin/reports/SAcancelreportsList',$data);
    $this->load->view('template/footer');
  }
	function visitList()
	{
		$dcfind1 =""; 
		$dcfind = $this->input->post('get_dcdetails');
		 if(isset($dcfind))
		 {
		$dcfind1 = $this->input->post('get_dcdetails');
		}
		$data['visitList']=$this->SAReportsModel->visitList($dcfind1);
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('SAdmin/reports/DCvisitList',$data);
		$this->load->view('template/footer');
	}
	
//**************************Dive Center Visit Report*******************************************************
	function dcvisitList()
	{
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('SAdmin/reports/DCclickList');
		$this->load->view('template/footer');
	}
	
	
	
	function daterangeList()
	{
		if($this->input->post('submit_daterangedetails'))
		{
			$drfind1 =""; 
			$drfind = $this->input->post('date_range_start');
			 if(isset($drfind))
			 {
			$drfind1 = $this->input->post('date_range_start');
			}
			$drfind2 =""; 
			$drfind_1 = $this->input->post('date_range_end');
			 if(isset($drfind_1))
			 {
			$drfind2 = $this->input->post('date_range_end');
			}
			//echo $drfind;
			
			$data['daterangeList']=$this->SAReportsModel->daterangeList($drfind1,$drfind2);
			$this->load->view('template/header');
			$this->load->view('template/sidebar');
			$this->load->view('SAdmin/reports/DCdaterangeList',$data);
			$this->load->view('template/footer');
		}
		else
		{
			$data['daterangeList']=$this->SAReportsModel->daterangeList1();
			$this->load->view('template/header');
			$this->load->view('template/sidebar');
			$this->load->view('SAdmin/reports/DCdaterangeList',$data);
			$this->load->view('template/footer');
		}
	}
  /* public function editStatus($id)
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
} */
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
