<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	
	
	public function __construct(){
 
	 parent::__construct();
	 
	  //$this->load->model('GoogleplusModel');
	$this->load->model('Usermodel');
		
	//$this->load->library('facebook');
	
	 }


	public function index()
	{
		$this->load->helper('url');
		
		/* if($this->facebook->is_authenticated()){
			// Get user facebook profile details
			//$this->session->set_userdata('user_profile',$this->googleplus->getUserInfo());
			
			$userProfile = $this->facebook->request('get', '/me?fields=id,first_name,last_name,email,gender,locale,picture');
			
			$userdata = array(
			'oauth_provider'=>'facebook',
			'oauth_uid'=>$userProfile['id'],
			'first_name'=>$userProfile['first_name'],
			'last_name'=>$userProfile['last_name'],
			'email'=>$userProfile['first_name'],
			'gender'=>$userProfile['gender'],
			'locale'=>$userProfile['locale'],
			'profile_url'=>'https://www.facebook.com/'.$userProfile['id'],
			'picture_url'=>$userProfile['picture']['data']['url']
			);
			$fbinsert=$this->Usermodel->facebookdata($userdata);
			if($fbinsert == 'TRUE')
				{
					$email = $userProfile['first_name'];
					$password = $userProfile['id'];
					$usercheck = $this->Usermodel->login($email,$password);
					if($usercheck == 'TRUE')
					{
						redirect('Dashboard');
					}
					else
					{
						$truefacebook = $this->Usermodel->newfacebookid($userdata);
						if($truefacebook == "TRUE")
						{
							//echo "hiiiii";
							$email = $userProfile['first_name'];
							$password = $userProfile['id'];
							$usercheck12 = $this->Usermodel->login($email,$password);
							if($usercheck12 == 'TRUE')
							{
								redirect('Dashboard');
							}
							
						}
					}
					
				}
				
			//$data['logoutUrl'] = $this->facebook->logout_url();
		}
		 $data['url'] =  $this->facebook->login_url();
		 $data['login_url'] = $this->googleplus->loginURL(); */
		 $this->load->view('login');
		 
		
		//$this->load->view('login', $data);
		
		// *********************************************


		
	}
	/* function fu_googleplus()
	{
		if(isset($_GET['code'])) {
			
			if($this->googleplus->getAuthenticate())
			{
		
				$this->session->set_userdata('user_profile',$this->googleplus->getUserInfo());
				
				$contents1 = $this->googleplus->getUserInfo();
				$data = array(
				'google_id'=>$contents1['id'],
				'name'=>$contents1['name'],
				'first_name'=>$contents1['given_name'],
				'last_name'=>$contents1['family_name'],
				'email'=>$contents1['email'],
				//'gender'=>$contents1['gender'],
				'photo'=>$contents1['picture']
				);
				$ginsert=$this->Usermodel->googleplus($data);
				if($ginsert == 'TRUE')
				{
					$email = $data['email'];
					$password = $data['google_id'];
					$usercheck = $this->Usermodel->login($email,$password);
					if($usercheck == 'TRUE')
					{
						redirect('Dashboard');
					}
					else
					{
						$truegoogleplus = $this->Usermodel->newgoogleid($data);
						if($truegoogleplus == "TRUE")
						{
							//echo "hiiiii";
							$email = $data['email'];
							$password = $data['google_id'];
							$usercheck1 = $this->Usermodel->login($email,$password);
							if($usercheck1 == 'TRUE')
							{
								redirect('Dashboard');
							}
						}
					}
					
				}
			}
			
		} 
		
			
		
	//	$this->load->view('login', $data);
		
	} */
	
	public function logout() {
		
		/* $this->facebook->destroy_session();
		// Remove user data from session
		$this->session->unset_userdata(); */
		session_destroy();	
		$this->Usermodel->logout($this->session->userdata('user_id'));
		redirect(base_url().'login');
	 
	 }

}
