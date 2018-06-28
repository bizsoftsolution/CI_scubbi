<?php
class SAbecomeapartner extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('SAbecomeapartnerModel');
    $this->load->helper('url');
	  $this->load->library('session');
  }
  /* public function addNew()
  {
    $result = array('message'=>'');	
	if($this->input->post('submit_tellmemore_data'))
		{  
            //Check whether user upload picture
            if(!empty($_FILES['tellmemore_file']['name'])){
                $config['upload_path'] = './upload/tellmemore/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['file_name'] = $_FILES['tellmemore_file']['name'];
                
                //Load upload library and initialize configuration
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                
                if($this->upload->do_upload('tellmemore_file')){
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
				'overview' => $this->input->post('tellme_overview'),
				'current' => $this->input->post('current'),
				'water_temperature' => $this->input->post('watertemperature'),
				'underwater_visibility' => $this->input->post('underwater'),
				'diving_season' => $this->input->post('divingseason'),
				'diving_sites' => $this->input->post('divingsites'),
				'diving_centers' => $this->input->post('divingcenters'),
				'depth' => $this->input->post('depth'),
				'what_to_see' => $this->input->post('whattouse'),
                'images' => $bg_picture,
				'island_id' => $this->input->post('island'),
				'popular_diving_destination' => $this->input->post('popular_diving_destination')
            );          
			//Pass user data to model
			$result['message'] = $this->SAtellmemoreModel->addNew($userData);
        }		
    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $this->load->view('SAdmin/tellmemore/newTellmemore',$result);
    $this->load->view('template/footer');
  } */
  function index()
  {
    $data['becomeapartnerList']=$this->SAbecomeapartnerModel->becomeapartnerList();
    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $this->load->view('SAdmin/becomeapartner/becomeapartnerList',$data);
    $this->load->view('template/footer');
  }
	

  function approvelData($id)
  {
	// PASSWORD GENRATOR 
	
	$alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    $psw_gen = implode($pass); //turn the array into a string
	
	// PASSWORD GENRATOR 
	
	$result = array('message'=>'');
	if($this->input->post('update_Approved_data'))
		{
			$data1 = array(
				'password' => $psw_gen,
				'user_type' => "DCADMIN",
				'email' => $this->input->post('email_address'),
				'logged_in' => "FALSE",
				'first_name' => $this->input->post('dive_center_name')
            );
			$data2 = array(
			'status' => "APPROVED"
			);
			//Pass user data to model
			$result['message'] = $this->SAbecomeapartnerModel->updateApproveldata($data1,$data2,$id);
			if($result['message'] == 'SUCCESS')
			{
			$base_url=base_url();
			redirect("$base_url"."SAbecomeapartner");
			}
		}
	$this->load->view('template/header');
    $this->load->view('template/sidebar');
    $result['getapprovelData']=$this->SAbecomeapartnerModel->getapprovelData($id);
    $this->load->view('SAdmin/becomeapartner/updateBecomeapartner',$result);
    $this->load->view('template/footer');
  }
	
	function userDetails()
  {
    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $this->load->view('SAdmin/becomeapartner/userList');
    $this->load->view('template/footer');
  }
  	function diveCenterDetails()
  {
    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $this->load->view('SAdmin/becomeapartner/diveCenterList');
    $this->load->view('template/footer');
  }
  function diveCenterCustomerList($dive_id)
  {
	 $data['dive_id']=$dive_id;
	 $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $this->load->view('SAdmin/becomeapartner/diveCenterCustomerList',$data);
    $this->load->view('template/footer');
  }
  
 
}
?>
