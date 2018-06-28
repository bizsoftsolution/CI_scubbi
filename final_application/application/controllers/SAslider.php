<?php
class SAslider extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('SAsliderModel');
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
	if($this->input->post('submit_slider'))
		{  
            //Check whether user upload picture
            if(!empty($_FILES['bg_banner']['name'])){
                $config['upload_path'] = './upload/slider/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['file_name'] = $_FILES['bg_banner']['name'];
                
                //Load upload library and initialize configuration
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                
                if($this->upload->do_upload('bg_banner')){
                    $uploadData = $this->upload->data();
                    $bg_picture = $uploadData['file_name'];
                }else{
                    $bg_picture = '';
                }
            }else{
                $bg_picture = '';
            }
            //Prepare array of user data
            $userData = array(
                'slider' => $bg_picture
            );          
			//Pass user data to model
			$result['message'] = $this->SAsliderModel->addNew($userData);
        }		
    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $this->load->view('SAdmin/slider/newSlider',$result);
    $this->load->view('template/footer');
  }
  function index()
  {
    $data['sliderList']=$this->SAsliderModel->sliderList();
    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $this->load->view('SAdmin/slider/sliderList',$data);
    $this->load->view('template/footer');
  }

  public function editData($id)
  {
		$result = array('message'=>'');
		if($this->input->post('submit_updatebgimage'))
		{  
		if(!empty($_FILES['edit_bg_image']['name'])){
			$config['upload_path'] = './upload/slider/';
			$config['allowed_types'] = 'jpg|jpeg|png|gif';
			$config['file_name'] = $_FILES['edit_bg_image']['name']; 
			//Load upload library and initialize configuration
			$this->load->library('upload',$config);
			$this->upload->initialize($config);
			
			if($this->upload->do_upload('edit_bg_image')){
				$uploadData = $this->upload->data();
				$edit_bg_picture = $uploadData['file_name'];
			}else{
				$edit_bg_picture = '';
			}
		}else{
			$edit_bg_picture = '';
		}
			$data = array(
                'slider' => $edit_bg_picture
            );          
			//Pass user data to model
			$result['message'] = $this->SAsliderModel->updateData($data, $id);
			if($result['message'] == 'SUCCESS')
			{
			$base_url=base_url();
			redirect("$base_url"."SAslider");
			}
		}
		
		
    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $result['geteditdata']=$this->SAsliderModel->getEditdata($id);
    $this->load->view('SAdmin/slider/updateSlider',$result);
    $this->load->view('template/footer');
}
  public function deleteData($id)
  {
	$this->SAsliderModel->deleteData($id);
    
    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $data['sliderList']=$this->SAsliderModel->sliderList();
    $this->load->view('SAdmin/slider/sliderList',$data);
    $this->load->view('template/footer');
  }

}
?>
