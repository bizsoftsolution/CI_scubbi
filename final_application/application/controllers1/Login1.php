<?php
class Login extends CI_Controller {
 
 public function __construct(){
 
 parent::__construct();
 
 parse_str($_SERVER['QUERY_STRING'],$_REQUEST);
 
 $this->load->library('Facebook', array("appId"=>"427844024273920", "secret"=>"28a3dfbe4fbc1c2c5a576bae85f5e673"));
 
 $this->user = $this->facebook->getUser();
 
 }
 
 public function index() {
 
 if($this->user) {
 
 try{
 
 $user_profile = $this->facebook->api('/me');
 
 //echo $user_profile['email'];
 
 echo "<pre>"; print_r($user_profile);
 
 }catch(FacebookApiException $e){
 
 print_r($e);
 
 $user = null;
 
 }
 }
 
 if($this->user){
 
 $logout = $this->facebook->getLogouturl(array("next"=>base_url()."login/logout"));
 
 echo "<a href='$logout'>Logout</a>";
 
 }
 else
 {
 
 $data['url'] = $login = $this->facebook->getLoginUrl(array("scope"=>"email"));
 
 $this->load->view('front/flogin', $data);
 
 }
 
 }
 public function logout() {
 
 session_destroy();
 
 redirect(base_url().'login');
 
 }
}
?>