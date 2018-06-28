<?php
class SAtellmemore extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('SAtellmemoreModel');
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
	$result['divepoints']=$this->SAtellmemoreModel->divepointsList();
	if($this->input->post('submit_tellmemore_data'))
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
			$config['upload_path'] = './upload/tellmemore/';
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
			$dive_sites_new = "";
			$dive_sites = $this->input->post('divingsites');
			
			if(isset($dive_sites) && is_array($dive_sites))
			{ 
				$dive_sites_new = implode(",", $dive_sites); 
			}
			else
			{
				$dive_sites_new = "";
			}
			
			$island_name = $this->input->post('islands');
			$is_data = $this->db->get_where('tbl_island', array('island_id'=>$island_name))->result();
			foreach($is_data as $row_isdata)
			
            //Prepare array of user data
            $userData = array(
				'name' => $row_isdata->island_name,
				'overview' => $this->input->post('tellme_overview'),
				'current' => $this->input->post('current'),
				'water_temperature' => $this->input->post('watertemperature'),
				'underwater_visibility' => $this->input->post('underwater'),
				'diving_season' => $this->input->post('divingseason'),
				'diving_sites' => $dive_sites_new,
				'diving_centers' => $this->input->post('divingcenters'),
				'depth' => $this->input->post('depth'),
				'what_to_see' => $this->input->post('whattouse'),
                'images' => $fileName,
				'country_id' => $this->input->post('scountry'),
				'island_id' => $this->input->post('islands'),
				'modified' => date("Y-m-d H:i:s"),		
				//'popular_diving_destination' => $this->input->post('popular_diving_destination')
            );          
			//Pass user data to model
			$result['message'] = $this->SAtellmemoreModel->addNew($userData);
        }		
    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $this->load->view('SAdmin/tellmemore/newTellmemore',$result);
    $this->load->view('template/footer');
  }
  function index()
  {
    $data['tellmemoreList']=$this->SAtellmemoreModel->tellmemoreList();
    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $this->load->view('SAdmin/tellmemore/tellmemoreList',$data);
    $this->load->view('template/footer');
  }

  public function editData($id)
  {
		$result = array('message'=>'');
		$result['divepoints']=$this->SAtellmemoreModel->divepointsList();
		/* if($this->input->post('submit_updatebgimage'))
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
			$config['upload_path'] = './upload/tellmemore/';
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
                'images' => $fileName2
            );          
			//Pass user data to model
			$result['message'] = $this->SAtellmemoreModel->updateData($data, $id);
			if($result['message'] == 'SUCCESS')
			{
			$base_url=base_url();
			redirect("$base_url"."SAtellmemore");
			}
		} */
		
		
		$divingsites1="";
		$divingsites = $this->input->post('divingsites');
		if(isset($divingsites) && is_array($divingsites))
		{ 
		$divingsites1 = implode(",", $divingsites); 
		}
		
		$island_name = $this->input->post('edit_dive_center_island');
			$is_data = $this->db->get_where('tbl_island', array('island_id'=>$island_name))->result();
			foreach($is_data as $row_isdata)
		if($this->input->post('update_tellmemore_data'))
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
			$config['upload_path'] = './upload/tellmemore/';
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
				'name' => $row_isdata->island_name,
				'overview' => $this->input->post('tellme_overview'),
				'current' => $this->input->post('current'),
				'water_temperature' => $this->input->post('watertemperature'),
				'underwater_visibility' => $this->input->post('underwater'),
				'diving_season' => $this->input->post('divingseason'),
				'diving_sites' => $divingsites1,
				'diving_centers' => $this->input->post('divingcenters'),
				'depth' => $this->input->post('depth'),
				'what_to_see' => $this->input->post('whattouse'),
				'images' => $fileName2,
				'country_id' => $this->input->post('edit_dive_center_country'),
				'island_id' => $this->input->post('edit_dive_center_island'),
				'modified' => date("Y-m-d H:i:s"),		
				//'popular_diving_destination' => $this->input->post('popular_diving_destination')
            );
			//Pass user data to model
			$result['message'] = $this->SAtellmemoreModel->updateData($data, $id);
			if($result['message'] == 'SUCCESS')
			{
			$base_url=base_url();
			redirect("$base_url"."SAtellmemore");
			}
		}
		
    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $result['geteditdata']=$this->SAtellmemoreModel->getEditdata($id);
    $this->load->view('SAdmin/tellmemore/updateTellmemore',$result);
    $this->load->view('template/footer');
}
  public function deleteData($id)
  {
	$this->SAtellmemoreModel->deleteData($id);
    
    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $data['tellmemoreList']=$this->SAtellmemoreModel->tellmemoreList();
    $this->load->view('SAdmin/tellmemore/tellmemoreList',$data);
    $this->load->view('template/footer');
  }
  
  function popularDivingDestination()
  {
    $data['pddList']=$this->SAtellmemoreModel->pddList();
    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $this->load->view('SAdmin/pdd/pddList',$data);
    $this->load->view('template/footer');
  }
  

}
?>
