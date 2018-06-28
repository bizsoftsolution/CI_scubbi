<?php
class Employee extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('Employeemodel');
    $this->load->helper('url');
	  $this->load->library('session');
	if (($this->session->userdata('user_type') != 'SUPERADMIN') && ($this->session->userdata('user_type') != 'CUSTOM'))
	{
        redirect('login');
	}
  }
  public function newEmployee()
  {
    $result = array('message'=>'');
    if($this->input->post('name')){
		$data = array(
			'name' => $this->input->post('name'),
			'phoneno' => $this->input->post('phoneno'),
			//'email' => $this->input->post('email'),
			'dob' => $this->input->post('dob'),		
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password')     			
		);
		$result['message'] = $this->Employeemodel->newEmployee($data);
	  }
    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $this->load->view('SAdmin/employee/newEmployee',$result);
    $this->load->view('template/footer');
  }
  function employeeList()
  {
    $data['employeeList']=$this->Employeemodel->employeeList();
    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $this->load->view('SAdmin/employee/employeeList',$data);
    $this->load->view('template/footer');
  }

  public function editEmployee($id)
  {
    $result = array('message'=>'');
    if($this->input->post('name'))
    {
  		$data = array(
        'name' => $this->input->post('name'),
		'phoneno' => $this->input->post('phoneno'),
		//'email' => $this->input->post('email'),
        'dob' => $this->input->post('dob'),
        'username' => $this->input->post('username'),
		'password' => $this->input->post('password')
  		);
		$result['message'] = $this->Employeemodel->editEmployee($data,$id);
		  if($result['message'] == 'SUCCESS')
		  {
			$base_url=base_url();
			redirect("$base_url"."Employee/employeeList");
		  }
    }
    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $result['employee']=$this->Employeemodel->getEmployee($id);
    $this->load->view('SAdmin/employee/updateEmployee',$result);
    $this->load->view('template/footer');
}
  public function deleteEmployee($id)
  {
    $this->Employeemodel->deleteEmployee($id);
    $base_url=base_url();
	redirect("$base_url"."Employee/employeeList");
  }

}
?>
