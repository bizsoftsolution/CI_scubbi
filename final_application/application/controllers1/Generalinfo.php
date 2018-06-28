<?php
class Generalinfo extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('GeneralinfoModel', 'generalinfoModel');
    $this->load->helper('url');
	  $this->load->library('session');
  }
  public function addNew()
  {
    $result = array('message'=>'');
    if($this->input->post('submit_generalinfo_data')){
		$data = array(
			'description' => $this->input->post('general_info_description')		
		);
		$result['message'] = $this->generalinfoModel->addNew($data);
	  }
    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $this->load->view('generalinfo/newGeneralinfo',$result);
    $this->load->view('template/footer');
  }
  function generalinfoList()
  {
    $data['generalinfoList']=$this->generalinfoModel->generalinfoList();
    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $this->load->view('generalinfo/generalinfoList',$data);
    $this->load->view('template/footer');
  }

  public function editData($id)
  {
      $result = array('message'=>'');
      if($this->input->post('update_genetalinfo_data'))
      {
  		  $data = array(
       'description' => $this->input->post('edit_general_info_description')

  		);
  		$result['message'] = $this->generalinfoModel->updateData($data,$id);
      if($result['message'] == 'SUCCESS')
      {
        $base_url=base_url();
        redirect("$base_url"."Generalinfo/generalinfoList");
      }
    }
    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $result['generalinfo']=$this->generalinfoModel->editData($id);
    $this->load->view('generalinfo/updateGeneralinfo',$result);
    $this->load->view('template/footer');
}
  public function deleteData($id)
  {
    $this->generalinfoModel->deleteData($id);
    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $data['generalinfoList']=$this->generalinfoModel->generalinfoList();
    $this->load->view('generalinfo/generalinfoList',$data);
    $this->load->view('template/footer');
  }

}
?>
