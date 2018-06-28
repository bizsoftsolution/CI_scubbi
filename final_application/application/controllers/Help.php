<?php
class Help extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('HelpModel', 'helpModel');
    $this->load->helper('url');
	  $this->load->library('session');
  }
  public function addNew()
  {
    $result = array('message'=>'');
    if($this->input->post('submit_help_desk_data')){
		$data = array(
			'description' => $this->input->post('help_desk_description')		
		);
		$result['message'] = $this->helpModel->addNew($data);
	  }
    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $this->load->view('helpdesk/newHelp',$result);
    $this->load->view('template/footer');
  }
  function helpList()
  {
    $data['helpList']=$this->helpModel->helpList();
    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $this->load->view('helpdesk/helpList',$data);
    $this->load->view('template/footer');
  }

  public function editData($id)
  {
      $result = array('message'=>'');
      if($this->input->post('update_help_data'))
      {
  		  $data = array(
       'description' => $this->input->post('edit_help_description')

  		);
  		$result['message'] = $this->helpModel->updateData($data,$id);
      if($result['message'] == 'SUCCESS')
      {
        $base_url=base_url();
        redirect("$base_url"."Help/helpList");
      }
    }
    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $result['help']=$this->helpModel->editData($id);
    $this->load->view('helpdesk/updateHelp',$result);
    $this->load->view('template/footer');
}
  public function deleteData($id)
  {
    $this->helpModel->deleteData($id);
    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $data['helpList']=$this->helpModel->helpList();
    $this->load->view('helpdesk/helpList',$data);
    $this->load->view('template/footer');
  }

}
?>
