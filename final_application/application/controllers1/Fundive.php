<?php
class Fundive extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('FundiveModel', 'fundiveModel');
    $this->load->helper('url');
	  $this->load->library('session');
  }
  public function addNew()
  {
    $result = array('message'=>'');
    if($this->input->post('submit_fundive_data')){
		$data = array(
			'description' => $this->input->post('fun_dive_description')		
		);
		$result['message'] = $this->fundiveModel->addNew($data);
	  }
    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $this->load->view('fundive/newFundive',$result);
    $this->load->view('template/footer');
  }
  function fundiveList()
  {
    $data['fundiveList']=$this->fundiveModel->fundiveList();
    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $this->load->view('fundive/fundiveList',$data);
    $this->load->view('template/footer');
  }

  public function editData($id)
  {
      $result = array('message'=>'');
      if($this->input->post('update_fundive_data'))
      {
  		  $data = array(
       'description' => $this->input->post('edit_fun_dive_description')

  		);
  		$result['message'] = $this->fundiveModel->updateData($data,$id);
      if($result['message'] == 'SUCCESS')
      {
        $base_url=base_url();
        redirect("$base_url"."Fundive/fundiveList");
      }
    }
    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $result['fundive']=$this->fundiveModel->editData($id);
    $this->load->view('fundive/updateFundive',$result);
    $this->load->view('template/footer');
}
  public function deleteData($id)
  {
    $this->fundiveModel->deleteData($id);
    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $data['fundiveList']=$this->fundiveModel->fundiveList();
    $this->load->view('fundive/fundiveList',$data);
    $this->load->view('template/footer');
  }

}
?>
