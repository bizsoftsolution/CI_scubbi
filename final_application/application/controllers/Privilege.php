<?php
class Privilege extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('Privilegeemodel');
    $this->load->helper('url');
	  $this->load->library('session');
	if (($this->session->userdata('user_type') != 'SUPERADMIN') && ($this->session->userdata('user_type') != 'CUSTOM'))
	{
        redirect('login');
	}
  }
  public function privilegeData()
  {
    $result = array('message'=>'');
    if($this->input->post('employee_id')){
			$module = $this->input->post('module');
			$module1 ="";
			if(isset($module) && is_array($module)){
				$module1 = implode(",", $module); 
			}
			
		$data = array(
			'emp_id' => $this->input->post('employee_id'),
			'module' => $module1   			
		);
		$result['message'] = $this->Privilegeemodel->privilegeData($data);
	  }
    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $this->load->view('SAdmin/privilege/privilegeData',$result);
    $this->load->view('template/footer');
  }
  function privilegeList()
  {
    $data['privilegeList']=$this->Privilegeemodel->privilegeList();
    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $this->load->view('SAdmin/privilege/privilegeList',$data);
    $this->load->view('template/footer');
  }

  public function editPrivilege($id)
	{
    $result = array('message'=>'');
    if($this->input->post('employee_id'))
    {
		$module = $this->input->post('module');
			$module1 ="";
			if(isset($module) && is_array($module)){
				$module1 = implode(",", $module); 
			}
  		$data = array(
			'emp_id' => $this->input->post('employee_id'),
			'module' => $module1
  		);
		$result['message'] = $this->Privilegeemodel->editPrivilege($data,$id);
		  if($result['message'] == 'SUCCESS')
		  {
			$base_url=base_url();
			redirect("$base_url"."Privilege/privilegeList");
		  }
    }
    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $result['privilege']=$this->Privilegeemodel->getPrivilege($id);
    $this->load->view('SAdmin/privilege/updatePrivilege',$result);
    $this->load->view('template/footer');
	}
  public function deletePrivilege($id)
  {
    $this->Privilegeemodel->deletePrivilege($id);
    $base_url=base_url();
	redirect("$base_url"."Privilege/privilegeList");
  }

}
?>
