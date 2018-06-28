<?php
class Specialoffer extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('SpecialofferModel', 'specialofferModel');
    $this->load->helper('url');
	  $this->load->library('session');
  }
  public function addNew()
  {
    $result = array('message'=>'');
	
	if($this->input->post('submit_special_offer'))
		{  
            //Check whether user upload picture
            if(!empty($_FILES['spl_offer_image']['name'])){
                $config['upload_path'] = './upload/specialoffer/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['file_name'] = $_FILES['spl_offer_image']['name'];
                
                //Load upload library and initialize configuration
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                
                if($this->upload->do_upload('spl_offer_image')){
                    $uploadData = $this->upload->data();
                    $spl_picture = $uploadData['file_name'];
                }else{
                    $spl_picture = '';
                }
            }else{
                $spl_picture = '';
            }
            //Prepare array of user data
            $userData = array(
                'offer_image' => $spl_picture,
                'offer_period' => $this->input->post('spl_offer_period'),
                'price' => $this->input->post('spl_offer_price'),
                'starting_place_id' => $this->input->post('spl_offer_start_place'),
                'destination_place_id' => $this->input->post('spl_offer_end_place'),
                'start_km' => $this->input->post('spl_offer_start_km'),
                'note' => $this->input->post('spl_offer_notes'),
                'dive_center_id' => $this->input->post('spl_offer_dcn')
            );          
			//Pass user data to model
			$result['message'] = $this->specialofferModel->addNew($userData);
        }
    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $this->load->view('specialoffer/newOffer',$result);
    $this->load->view('template/footer');
  }
  function offerList()
  {
    $data['offerList']=$this->specialofferModel->offerList();
    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $this->load->view('specialoffer/specialofferList',$data);
    $this->load->view('template/footer');
  }

  public function editData($id)
  {
    $result = array('message'=>'');
	
	// Image update part
	if($this->input->post('update_spl_offer_image'))
		{  
		if(!empty($_FILES['edit_offer_image']['name'])){
			$config['upload_path'] = './upload/specialoffer/';
			$config['allowed_types'] = 'jpg|jpeg|png|gif';
			$config['file_name'] = $_FILES['edit_offer_image']['name']; 
			//Load upload library and initialize configuration
			$this->load->library('upload',$config);
			$this->upload->initialize($config);
			
			if($this->upload->do_upload('edit_offer_image')){
				$uploadData = $this->upload->data();
				$edit_offer_picture = $uploadData['file_name'];
			}else{
				$edit_offer_picture = '';
			}
		}else{
			$edit_offer_picture = '';
		}
			$data = array(
                'offer_image' => $edit_offer_picture
            );          
			//Pass user data to model
			$result['message'] = $this->specialofferModel->updateData($data, $id);
			if($result['message'] == 'SUCCESS')
			{
			$base_url=base_url();
			redirect("$base_url"."Specialoffer/offerList");
			}
		}
	if($this->input->post('update_special_offer'))
		{  
			$data = array(
                'offer_period' => $this->input->post('edit_spl_offer_period'),
                'price' => $this->input->post('edit_spl_offer_price'),
                'starting_place_id' => $this->input->post('edit_spl_offer_start_place'),
                'destination_place_id' => $this->input->post('edit_spl_offer_end_place'),
                'start_km' => $this->input->post('edit_spl_offer_start_km'),
                'note' => $this->input->post('edit_spl_offer_notes'),
                'dive_center_id' => $this->input->post('edit_spl_offer_dcn')
            );          
			//Pass user data to model
			$result['message'] = $this->specialofferModel->updateData($data, $id);
			if($result['message'] == 'SUCCESS')
			{
			$base_url=base_url();
			redirect("$base_url"."Specialoffer/offerList");
			}
		}
    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $result['getEditdata']=$this->specialofferModel->getEditdata($id);
    $this->load->view('specialoffer/updateOffer',$result);
    $this->load->view('template/footer');
	}
  public function deleteData($id)
  {
    $this->specialofferModel->deleteData($id);
    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $data['offerList']=$this->specialofferModel->offerList();
    $this->load->view('specialoffer/specialofferList',$data);
    $this->load->view('template/footer');
  }

}
?>
