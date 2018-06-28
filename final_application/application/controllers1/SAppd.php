<?php
class SAppd extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('SAppdModel');
    $this->load->helper('url');
	  $this->load->library('session');
	if (($this->session->userdata('user_type') != 'SUPERADMIN') && ($this->session->userdata('user_type') != 'CUSTOM'))
	{
        redirect('login');
	}
  }
  public function addNew()
  {
    $result = array('message'=>'');	
	if($this->input->post('submit_ppd_data'))
		{	
			$files = $_FILES;
			$images = array();
			$cpt = count($_FILES['file']['name']);
			for($i=0; $i<$cpt; $i++){
			$_FILES['file']['name']= $files['file']['name'][$i];
			$_FILES['file']['type']= $files['file']['type'][$i];
			$_FILES['file']['tmp_name']= $files['file']['tmp_name'][$i];
			$_FILES['file']['error']= $files['file']['error'][$i];
			$_FILES['file']['size']= $files['file']['size'][$i];
			$config['upload_path'] = './upload/ppd/';
			$config['allowed_types'] = '*';
			$config['encrypt_name']=TRUE;
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			
			if ($this->upload->do_upload('file'))
			{
				$upload_file = $this->upload->data();
				$images[] = $upload_file['file_name'];
			}
			}
			$fileName = implode(',',$images);
            $userData = array(
				'country_id' => $this->input->post('scountry'),
				'image' => $fileName
            );          
			//Pass user data to model
			$result['message'] = $this->SAppdModel->addNew($userData);
			if($result['message'] == 'SUCCESS')
			{
				$messge = array('message' => 'Divepoints Created successfully','class' => 'alert alert-success fade in');
				$this->session->set_flashdata('item', $messge);
				//$this->DCleisuredashboard();
				$base_url=base_url();
				redirect("$base_url"."SAppd");
			}
        }		
    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $this->load->view('SAdmin/ppd/newPpd',$result);
    $this->load->view('template/footer');
  }
  function index()
  {
    $data['ppdList']=$this->SAppdModel->ppdList();
    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $this->load->view('SAdmin/ppd/ppdList',$data);
    $this->load->view('template/footer');
  }

  public function editData($id)
  {
		$result = array('message'=>'');
		if($this->input->post('update_ppd_image'))
		{  
			$files = $_FILES;
			$images = array();
			$cpt = count($_FILES['file']['name']);
			for($i=0; $i<$cpt; $i++){
				$_FILES['file']['name']= $files['file']['name'][$i];
				$_FILES['file']['type']= $files['file']['type'][$i];
				$_FILES['file']['tmp_name']= $files['file']['tmp_name'][$i];
				$_FILES['file']['error']= $files['file']['error'][$i];
				$_FILES['file']['size']= $files['file']['size'][$i];
				$config['upload_path'] = './upload/ppd/';
				$config['allowed_types'] = '*';
	$config['encrypt_name']=TRUE;
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
				
				if ($this->upload->do_upload('file'))
				{
					$upload_file = $this->upload->data();
					$images[] = $upload_file['file_name'];
				}
			}
			$fileName = implode(',',$images);
			$already_get_img = $this->input->post('already_img');
			$fileName1 = implode(',',$already_get_img);
			$fileName2 = $fileName.','.$fileName1;
			
				$data = array(
					'image' => $fileName2
				);          
				//Pass user data to model
				$result['message'] = $this->SAppdModel->updateData($data, $id);
				if($result['message'] == 'SUCCESS')
				{
				$base_url=base_url();
				redirect("$base_url"."SAppd");
				}
		}
		
		if($this->input->post('update_ppd_data'))
		{
			$data = array(
				'country_id' => $this->input->post('scountry')
				
            );
			//Pass user data to model
			$result['message'] = $this->SAppdModel->updateData($data, $id);
			if($result['message'] == 'SUCCESS')
			{
			$base_url=base_url();
			redirect("$base_url"."SAppd");
			}
		}
		
    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $result['geteditdata']=$this->SAppdModel->getEditdata($id);
    $this->load->view('SAdmin/ppd/updatePpd',$result);
    $this->load->view('template/footer');
}
  public function deleteData($id)
  {
	$this->SAppdModel->deleteData($id);
    
    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $data['ppdList']=$this->SAppdModel->ppdList();
    $this->load->view('SAdmin/ppd/ppdList',$data);
    $this->load->view('template/footer');
  }

}
?>
