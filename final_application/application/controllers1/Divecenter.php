<?php
class Divecenter extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('DivecenterModel', 'divecenterModel');
    $this->load->helper('url');
	  $this->load->library('session');
  }
  public function addNew()
  {
    $result = array('message'=>'');
	
	if($this->input->post('submit_dive_center'))
		{  
            //Check whether user upload picture
            if(!empty($_FILES['dive_center_image']['name'])){
                $config['upload_path'] = './upload/dive_center/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['file_name'] = $_FILES['dive_center_image']['name'];
                
                //Load upload library and initialize configuration
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                
                if($this->upload->do_upload('dive_center_image')){
                    $uploadData = $this->upload->data();
                    $divecenter_picture = $uploadData['file_name'];
                }else{
                    $divecenter_picture = '';
                }
            }else{
                $divecenter_picture = '';
            }
            //Prepare array of user data
            $userData = array(
                'center_name' => $this->input->post('dive_center_name'),
                'address1' => $this->input->post('dive_center_address1'),
                'address2' => $this->input->post('dive_center_address2'),
                'city' => $this->input->post('dive_center_city'),
                'state' => $this->input->post('dive_center_state'),
                'country_id' => $this->input->post('dive_center_country'),
                'island_id' => $this->input->post('dive_center_island'),
                'contact_person_name' => $this->input->post('dive_center_cpn'),
                'contact_no' => $this->input->post('dive_center_cn'),
                'email_id' => $this->input->post('dive_center_emailid'),
				'center_image' => $divecenter_picture
            );          
			//Pass user data to model
			$result['message'] = $this->divecenterModel->addNew($userData);
        }
    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $this->load->view('divecenter/newDivecenter',$result);
    $this->load->view('template/footer');
  }
  function divecenterList()
  {
    $data['divecenterList']=$this->divecenterModel->divecenterList();
    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $this->load->view('divecenter/divecenterList',$data);
    $this->load->view('template/footer');
  }

  public function editData($id)
  {
    $result = array('message'=>'');
	
	// Image update part
	if($this->input->post('update_dive_center_image'))
		{  
		if(!empty($_FILES['edit_divecenter_image']['name'])){
			$config['upload_path'] = './upload/dive_center/';
			$config['allowed_types'] = 'jpg|jpeg|png|gif';
			$config['file_name'] = $_FILES['edit_divecenter_image']['name']; 
			//Load upload library and initialize configuration
			$this->load->library('upload',$config);
			$this->upload->initialize($config);
			
			if($this->upload->do_upload('edit_divecenter_image')){
				$uploadData = $this->upload->data();
				$edit_divecenter_picture = $uploadData['file_name'];
			}else{
				$edit_divecenter_picture = '';
			}
		}else{
			$edit_divecenter_picture = '';
		}
			$data = array(
                'center_image' => $edit_divecenter_picture
            );          
			//Pass user data to model
			$result['message'] = $this->divecenterModel->updateData($data, $id);
			if($result['message'] == 'SUCCESS')
			{
			$base_url=base_url();
			redirect("$base_url"."Divecenter/divecenterList");
			}
		}
	if($this->input->post('update_dive_center'))
		{  
			$data = array(
                'center_name' => $this->input->post('edit_dive_center_name'),
                'address1' => $this->input->post('edit_dive_center_address1'),
                'address2' => $this->input->post('edit_dive_center_address2'),
                'city' => $this->input->post('edit_dive_center_city'),
                'state' => $this->input->post('edit_dive_center_state'),
                'country_id' => $this->input->post('edit_dive_center_country'),
                'island_id' => $this->input->post('edit_dive_center_island'),
                'contact_person_name' => $this->input->post('edit_dive_center_cpn'),
                'contact_no' => $this->input->post('edit_dive_center_cn'),
                'email_id' => $this->input->post('edit_dive_center_emailid')
            );          
			//Pass user data to model
			$result['message'] = $this->divecenterModel->updateData($data, $id);
			if($result['message'] == 'SUCCESS')
			{
			$base_url=base_url();
			redirect("$base_url"."Divecenter/divecenterList");
			}
		}
    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $result['getEditdata']=$this->divecenterModel->getEditdata($id);
    $this->load->view('divecenter/updateDivecenter',$result);
    $this->load->view('template/footer');
	}
  public function deleteData($id)
  {
    $this->divecenterModel->deleteData($id);
    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $data['divecenterList']=$this->divecenterModel->divecenterList();
    $this->load->view('divecenter/divecenterList',$data);
    $this->load->view('template/footer');
  }

}
?>
