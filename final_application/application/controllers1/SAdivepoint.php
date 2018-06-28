<?php
class SAdivepoint extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('SAdivepointModel');
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
	if($this->input->post('submit_divepoint_data'))
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
			$config['upload_path'] = './upload/divepoint/';
			$config['allowed_types'] = 'gif|jpg|png';
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
				'island_id' => $this->input->post('islands'),
				'name' => $this->input->post('name'),
				'overview' => $this->input->post('overview'),
				'current' => $this->input->post('current'),
				'underwater' => $this->input->post('underwater'),
				'depth' => $this->input->post('depth'),
				'water_temprature' => $this->input->post('watertemperature'),
				'diving_season' => $this->input->post('divingseason'),
				'what_to_use' => $this->input->post('whattouse'),
				'coords_x' => $this->input->post('coords_x'),
				'coords_y' => $this->input->post('coords_y'),
				'modified' => date("Y-m-d H:i:s"),		
				'image' => $fileName
            );          
			//Pass user data to model
			$result['message'] = $this->SAdivepointModel->addNew($userData);
			if($result['message'] == 'SUCCESS')
			{
				$messge = array('message' => 'Divepoints Created successfully','class' => 'alert alert-success fade in');
				$this->session->set_flashdata('item', $messge);
				//$this->DCleisuredashboard();
				$base_url=base_url();
				redirect("$base_url"."SAdivepoint");
			}
        }		
    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $this->load->view('SAdmin/divepoint/newDivepoint',$result);
    $this->load->view('template/footer');
  }
  function index()
  {
    $data['divepointList']=$this->SAdivepointModel->divepointList();
    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $this->load->view('SAdmin/divepoint/divepointList',$data);
    $this->load->view('template/footer');
  }

  public function editData($id)
  {
		$result = array('message'=>'');
		if($this->input->post('update_divepoints_image'))
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
				$config['upload_path'] = './upload/divepoint/';
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
				$result['message'] = $this->SAdivepointModel->updateData($data, $id);
				if($result['message'] == 'SUCCESS')
				{
				$base_url=base_url();
				redirect("$base_url"."SAdivepoint");
				}
				
		}
		
		if($this->input->post('update_divepoint_data'))
		{
			$data = array(
				'country_id' => $this->input->post('scountry'),
				'island_id' => $this->input->post('islands'),
				'name' => $this->input->post('name'),
				'overview' => $this->input->post('overview'),
				'current' => $this->input->post('current'),
				'underwater' => $this->input->post('underwater'),
				'depth' => $this->input->post('depth'),
				'water_temprature' => $this->input->post('watertemperature'),
				'diving_season' => $this->input->post('divingseason'),
				'what_to_use' => $this->input->post('whattouse'),
				'coords_x' => $this->input->post('coords_x'),
				'modified' => date("Y-m-d H:i:s"),		
				'coords_y' => $this->input->post('coords_y')
            );
			//Pass user data to model
			$result['message'] = $this->SAdivepointModel->updateData($data, $id);
			if($result['message'] == 'SUCCESS')
			{
			$base_url=base_url();
			redirect("$base_url"."SAdivepoint");
			}
		}
		
    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $result['geteditdata']=$this->SAdivepointModel->getEditdata($id);
    $this->load->view('SAdmin/divepoint/updateDivepoint',$result);
    $this->load->view('template/footer');
}
  public function deleteData($id)
  {
	$this->SAdivepointModel->deleteData($id);
    
    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $data['divepointList']=$this->SAdivepointModel->divepointList();
    $this->load->view('SAdmin/divepoint/divepointList',$data);
    $this->load->view('template/footer');
  }

}
?>
