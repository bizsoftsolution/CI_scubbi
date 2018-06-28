<?php
class Country extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
	
	$ip = $_SERVER['REMOTE_ADDR'];			
		$timZone = json_decode(file_get_contents("http://ip-api.com/json/$ip"));
		//echo $timZone->timezone;
		date_default_timezone_set($timZone->timezone);
		
    $this->load->model('CountryModel', 'countryModel');
    $this->load->helper('url');
	  $this->load->library('session');
	if (($this->session->userdata('user_type') != 'SUPERADMIN') && ($this->session->userdata('user_type') != 'CUSTOM'))
	{
        redirect('login');
	}
  }
  public function newCountry()
  {
    $result = array('message'=>'');
    if($this->input->post('name')){
		$data = array(
			'country_name' => $this->input->post('name'),			
			'country_desc' => $this->input->post('description')			
		);
		$result['message'] = $this->countryModel->newCountry($data);
	  }
    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $this->load->view('country/newCountry',$result);
    $this->load->view('template/footer');
  }
  function countryList()
  {
    $data['countryList']=$this->countryModel->countryList();
    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $this->load->view('country/countryList',$data);
    $this->load->view('template/footer');
  }
  
  function dcountryList()
  {
    $data['dcountryList']=$this->countryModel->dcountryList();
    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $this->load->view('country/dcountryList',$data);
    $this->load->view('template/footer');
  }

  public function editCountry($id)
  {
      $result = array('message'=>'');
      if($this->input->post('name'))
      {
  		  $data = array(
        'country_name' => $this->input->post('name'),
        'country_desc' => $this->input->post('description'),
		'modified' => date("Y-m-d H:i:s"),		

  		);
  		$result['message'] = $this->countryModel->editCountry($data,$id);
      if($result['message'] == 'SUCCESS')
      {
        $base_url=base_url();
        redirect("$base_url"."Country/countryList");
      }
    }
    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $result['country']=$this->countryModel->getCountry($id);
    $this->load->view('country/updateCountry',$result);
    $this->load->view('template/footer');
}
 public function disableCountry($id)
  {
	  $disable = array(
	  'is_deactivate'=>'Y',
		'modified' => date("Y-m-d H:i:s")		
	  );
    $this->countryModel->disableCountry($id, $disable);
	
    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $data['countryList']=$this->countryModel->countryList();
    $this->load->view('country/countryList',$data);
    $this->load->view('template/footer');
  }
  public function enableCountry($id)
  {
	  $enable = array(
	  'is_deactivate'=>'N',
		'modified' => date("Y-m-d H:i:s")		
	  );
    $this->countryModel->enableCountry($id, $enable);
	
    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $data['dcountryList']=$this->countryModel->dcountryList();
    $this->load->view('country/dcountryList',$data);
    $this->load->view('template/footer');
  }
  
  /* public function deleteCountry($id)
  {
    $this->countryModel->deleteCountry($id);
    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $data['countryList']=$this->countryModel->countryList();
    $this->load->view('country/countryList',$data);
    $this->load->view('template/footer');
  } */
/*  function enableCountry()
 {
	if($this->input->post('textdcn'))
	{
		$data = array(
		'view'=>$this->input->post('textdcn'),
		'country_id'=>$this->input->post('textcp')
		);
		if($this->Country->enableCountry($data))
		{
			echo "success";
		}
	}
 } */
}
?>
