<?php
class Package extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('PackageModel', 'packageModel');
    $this->load->helper('url');
	  $this->load->library('session');
  }
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
  function packageList()
  {
    $data['packageList']=$this->packageModel->packageList();
    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $this->load->view('packages/packageList',$data);
    $this->load->view('template/footer');
  }

  public function editData($id)
  {
      $result = array('message'=>'');
      if($this->input->post('update_package_offers_data'))
      {
  		  $data = array(
       'description' => $this->input->post('edit_package_offers_description')

  		);
  		$result['message'] = $this->packageModel->updateData($data,$id);
      if($result['message'] == 'SUCCESS')
      {
        $base_url=base_url();
        redirect("$base_url"."Package/packageList");
      }
    }
    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $result['package']=$this->packageModel->editData($id);
    $this->load->view('packages/updatePackage',$result);
    $this->load->view('template/footer');
}
  public function deleteData($id)
  {
    $this->packageModel->deleteData($id);
    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $data['packageList']=$this->packageModel->packageList();
    $this->load->view('packages/packageList',$data);
    $this->load->view('template/footer');
  }

}
?>
