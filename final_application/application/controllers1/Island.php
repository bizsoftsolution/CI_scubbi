<?php
class Island extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('IslandModel', 'islandModel');
    $this->load->helper('url');
	  $this->load->library('session');
	if (($this->session->userdata('user_type') != 'SUPERADMIN') && ($this->session->userdata('user_type') != 'CUSTOM'))
	{
        redirect('login');
	}
  }
  public function newIsland()
  {
    $result = array('message'=>'');
    $result['countryList'] = $this->islandModel->countryList();
//    $result['island']=$this->islandModel->getIsland(0);
    $result['islandGroup']=$this->islandModel->getIslandGroup();
    $result['tellmemore']=$this->islandModel->TellmemoreList();
    if($this->input->post('name')){
		$data = array(
			'island_name' => $this->input->post('name'),
			'description' => $this->input->post('description'),
        'group_id' => $this->input->post('group_id'),
		'modified' => date("Y-m-d H:i:s"),		
        'tellmemore_id' => $this->input->post('tellmemore_id'),
      'country_id' => $this->input->post('country_id')     			
		);
		$result['message'] = $this->islandModel->newIsland($data);
	  }
    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $this->load->view('island/newIsland',$result);
    $this->load->view('template/footer');
  }
  function islandList()
  {
    $data['islandList']=$this->islandModel->islandList();
    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $this->load->view('island/islandList',$data);
    $this->load->view('template/footer');
  }

  public function editIsland($id)
  {
      $result = array('message'=>'');
      if($this->input->post('name'))
      {
  		  $data = array(
        'island_name' => $this->input->post('name'),
		'description' => $this->input->post('description'),
        'group_id' => $this->input->post('group_id'),
        'tellmemore_id' => $this->input->post('tellmemore_id'),
		'modified' => date("Y-m-d H:i:s"),		
        'country_id' => $this->input->post('country_id')
  		);
  		$result['message'] = $this->islandModel->editIsland($data,$id);
      if($result['message'] == 'SUCCESS')
      {
        $base_url=base_url();
        redirect("$base_url"."Island/islandList");
      }
    }
    $this->load->view('template/header');
    $this->load->view('template/sidebar');
	$result['countryList'] = $this->islandModel->countryList();
    $result['island']=$this->islandModel->getIsland($id);
    $result['islandGroup']=$this->islandModel->getIslandGroup();
    $result['tellmemore']=$this->islandModel->TellmemoreList();
    $this->load->view('island/updateIsland',$result);
    $this->load->view('template/footer');
}
  public function deleteIsland($id)
  {
    $this->islandModel->deleteIsland($id);
    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $data['islandList']=$this->islandModel->islandList();
    $this->load->view('island/islandList',$data);
    $this->load->view('template/footer');
  }

}
?>
