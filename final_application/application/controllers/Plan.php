<?php
class Plan extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('PlanModel', 'planModel');
    $this->load->helper('url');
	  $this->load->library('session');
  }
  public function addNew()
  {
    $result = array('message'=>'');
	
	if($this->input->post('submit_plan_data'))
		{  
            //Check whether user upload picture
            if(!empty($_FILES['plan_image']['name'])){
                $config['upload_path'] = './upload/plan/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['file_name'] = $_FILES['plan_image']['name'];
                
                //Load upload library and initialize configuration
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                
                if($this->upload->do_upload('plan_image')){
                    $uploadData = $this->upload->data();
                    $pln_picture = $uploadData['file_name'];
                }else{
                    $pln_picture = '';
                }
            }else{
                $pln_picture = '';
            }
            //Prepare array of user data
            $userData = array(
                'country_id' => $this->input->post('scountry'),
                'island_id' => $this->input->post('plan_island'),
                'per_day_amount' => $this->input->post('plan_perdayamount'),
				 'image' => $pln_picture,
                'popular_dive_destination' => $this->input->post('plan_pdd')
            );          
			//Pass user data to model
			$result['message'] = $this->planModel->addNew($userData);
        }
    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $this->load->view('plan/newPlan',$result);
    $this->load->view('template/footer');
  }
  function planList()
  {
    $data['planList']=$this->planModel->planList();
    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $this->load->view('plan/planList',$data);
    $this->load->view('template/footer');
  }

  public function editData($id)
  {
    $result = array('message'=>'');
	
	// Image update part
	if($this->input->post('update_plan_image'))
		{  
		if(!empty($_FILES['edit_plan_image']['name'])){
			$config['upload_path'] = './upload/plan/';
			$config['allowed_types'] = 'jpg|jpeg|png|gif';
			$config['file_name'] = $_FILES['edit_plan_image']['name']; 
			//Load upload library and initialize configuration
			$this->load->library('upload',$config);
			$this->upload->initialize($config);
			
			if($this->upload->do_upload('edit_plan_image')){
				$uploadData = $this->upload->data();
				$edit_plan_picture = $uploadData['file_name'];
			}else{
				$edit_plan_picture = '';
			}
		}else{
			$edit_plan_picture = '';
		}
			$data = array(
                'image' => $edit_plan_picture
            );          
			//Pass user data to model
			$result['message'] = $this->planModel->updateData($data, $id);
			if($result['message'] == 'SUCCESS')
			{
			$base_url=base_url();
			redirect("$base_url"."Plan/planList");
			}
		}
	if($this->input->post('update_plan'))
		{  
			$data = array(
                'country_id' => $this->input->post('update_scountry'),
                'island_id' => $this->input->post('update_islands'),
                'per_day_amount' => $this->input->post('edit_spl_offer_period'),
                'popular_dive_destination' => $this->input->post('edit_plan_PDD')
            );          
			//Pass user data to model
			$result['message'] = $this->planModel->updateData($data, $id);
			if($result['message'] == 'SUCCESS')
			{
			$base_url=base_url();
			redirect("$base_url"."Plan/planList");
			}
		}
    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $result['getEditdata']=$this->planModel->getEditdata($id);
    $this->load->view('plan/updatePlan',$result);
    $this->load->view('template/footer');
	}
  public function deleteData($id)
  {
    $this->planModel->deleteData($id);
    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $data['offerList']=$this->planModel->offerList();
    $this->load->view('specialoffer/specialofferList',$data);
    $this->load->view('template/footer');
  }

}
?>
