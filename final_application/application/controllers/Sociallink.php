<?php
class Sociallink extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('SociallinkModel', 'sociallinkModel');
    $this->load->helper('url');
	  $this->load->library('session');
  }
  /*
  public function addNew()
  {
    $result = array('message'=>'');
    if($this->input->post('name')){
		$data = array(
			'name' => $this->input->post('name'),			
			'links' => $this->input->post('link')			
		);
		$result['message'] = $this->sociallinkModel->addNew($data);
	  }
    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $this->load->view('sociallink/newSociallink',$result);
    $this->load->view('template/footer');
  }
  */
  function socialList()
  {
    $data['socialList']=$this->sociallinkModel->socialList();
    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $this->load->view('sociallink/sociallinkList',$data);
    $this->load->view('template/footer');
  }

  public function editData($id)
  {
      $result = array('message'=>'');
      if($this->input->post('edit_name'))
      {
  		  $data = array(
        'name' => $this->input->post('edit_name'),
        'links' => $this->input->post('edit_link')

  		);
  		$result['message'] = $this->sociallinkModel->updateData($data,$id);
      if($result['message'] == 'SUCCESS')
      {
        $base_url=base_url();
        redirect("$base_url"."Sociallink/socialList");
      }
    }
    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $result['sociallink']=$this->sociallinkModel->editData($id);
    $this->load->view('sociallink/updateSociallink',$result);
    $this->load->view('template/footer');
}
  public function deleteData($id)
  {
    $this->sociallinkModel->deleteData($id);
    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $data['socialList']=$this->sociallinkModel->socialList();
    $this->load->view('sociallink/sociallinkList',$data);
    $this->load->view('template/footer');
  }

}
?>
