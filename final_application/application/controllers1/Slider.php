<?php
class Slider extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('SliderModel', 'sliderModel');
    $this->load->helper('url');
	  $this->load->library('session');
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
			// 2nd img upload
			if(!empty($_FILES['banner_img1']['name'])){
                $config['upload_path'] = './upload/slider/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['file_name'] = $_FILES['banner_img1']['name'];
                
                //Load upload library and initialize configuration
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                
                if($this->upload->do_upload('banner_img1')){
                    $uploadData = $this->upload->data();
                    $banner_img1 = $uploadData['file_name'];
                }else{
                    $banner_img1 = '';
                }
            }else{
                $banner_img1 = '';
            }
			// 3rd img upload
			if(!empty($_FILES['banner_img2']['name'])){
                $config['upload_path'] = './upload/slider/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['file_name'] = $_FILES['banner_img2']['name']; 
                //Load upload library and initialize configuration
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                
                if($this->upload->do_upload('banner_img2')){
                    $uploadData = $this->upload->data();
                    $banner_img2 = $uploadData['file_name'];
                }else{
                    $banner_img2 = '';
                }
            }else{
                $banner_img2 = '';
            }
            //Prepare array of user data
            $userData = array(
                'banner_background' => $bg_picture,
                'image1' => $banner_img1,
                'image2' => $banner_img2
            );          
			//Pass user data to model
			$result['message'] = $this->sliderModel->addNew($userData);
        }		
    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $this->load->view('slider/newSlider',$result);
    $this->load->view('template/footer');
  }
  function sliderList()
  {
    $data['sliderList']=$this->sliderModel->sliderList();
    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $this->load->view('slider/sliderList',$data);
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
                'banner_background' => $edit_bg_picture
            );          
			//Pass user data to model
			$result['message'] = $this->sliderModel->updateData($data, $id);
			if($result['message'] == 'SUCCESS')
			{
			$base_url=base_url();
			redirect("$base_url"."Slider/sliderList");
			}
		}
		// 2nd update
		if($this->input->post('submit_updatebnimage1'))
		{  
		if(!empty($_FILES['edit_bn_image1']['name'])){
			$config['upload_path'] = './upload/slider/';
			$config['allowed_types'] = 'jpg|jpeg|png|gif';
			$config['file_name'] = $_FILES['edit_bn_image1']['name']; 
			//Load upload library and initialize configuration
			$this->load->library('upload',$config);
			$this->upload->initialize($config);
			
			if($this->upload->do_upload('edit_bn_image1')){
				$uploadData = $this->upload->data();
				$edit_bn_picture = $uploadData['file_name'];
			}else{
				$edit_bn_picture = '';
			}
		}else{
			$edit_bn_picture = '';
		}
			$data = array(
                'image1' => $edit_bn_picture
            );          
			//Pass user data to model
			$result['message'] = $this->sliderModel->updateData($data, $id);
			if($result['message'] == 'SUCCESS')
			{
			$base_url=base_url();
			redirect("$base_url"."Slider/sliderList");
			}
		}
		// 3rd update
		if($this->input->post('submit_updatebnimage2'))
		{  
		if(!empty($_FILES['edit_bn_image2']['name'])){
			$config['upload_path'] = './upload/slider/';
			$config['allowed_types'] = 'jpg|jpeg|png|gif';
			$config['file_name'] = $_FILES['edit_bn_image2']['name']; 
			//Load upload library and initialize configuration
			$this->load->library('upload',$config);
			$this->upload->initialize($config);
			
			if($this->upload->do_upload('edit_bn_image2')){
				$uploadData = $this->upload->data();
				$edit_bn2_picture = $uploadData['file_name'];
			}else{
				$edit_bn2_picture = '';
			}
		}else{
			$edit_bn2_picture = '';
		}
			$data = array(
                'image2' => $edit_bn2_picture
            );          
			//Pass user data to model
			$result['message'] = $this->sliderModel->updateData($data, $id);
			if($result['message'] == 'SUCCESS')
			{
			$base_url=base_url();
			redirect("$base_url"."Slider/sliderList");
			}
		}
			
    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $result['geteditdata']=$this->sliderModel->getEditdata($id);
    $this->load->view('Slider/updateSlider',$result);
    $this->load->view('template/footer');
}
  public function deleteData($id)
  {
	$this->sliderModel->deleteData($id);
    
    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $data['sliderList']=$this->sliderModel->sliderList();
    $this->load->view('slider/sliderList',$data);
    $this->load->view('template/footer');
  }

}
?>
