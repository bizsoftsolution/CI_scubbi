<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	
	public $user =null;
	
	public function __construct(){
 
	 parent::__construct();
	 
	 parse_str($_SERVER['QUERY_STRING'],$_REQUEST);
	 
	 $this->load->library('Facebook', array("appId"=>"1025812870882228", "secret"=>"3f7504563bd4006e5302f4c80d901fee"));
	 
	 $this->user = $this->facebook->getUser();
	 
	 }


	public function index()
	{
		$this->load->helper('url');
		
		 if($this->user) {
 
		 try{
		 
		 $user_profile = $this->facebook->api('/me');
		 
		 //echo $user_profile['email'];
		 
		 echo "<pre>"; print_r($user_profile);
		 
		 }
		 catch(FacebookApiException $e){
		 
		 print_r($e);
		 
		 $user = null;
		 
		 }
		 }
		 
		 if($this->user){
		
			$this->load->view('front/flogin');
		 $logout = $this->facebook->getLogouturl(array("next"=>base_url()."Login/logout"));
		 
		 echo "<a href='$logout'>Logout</a>";
		 
		 }
		 else
		 {
		 
		 $data['url'] = $login = $this->facebook->getLoginUrl(array("scope"=>"email"));
		 
		// $this->load->view('login', $data);
		 
		 }
 
		$this->load->view('login', $data);
	}
	public function logout() {
 
	 session_destroy();
	 
	 redirect(base_url().'login');
	 
	 }

}
