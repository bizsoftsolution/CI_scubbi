<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {

    public function __construct() {
        parent::__construct();
		$this->load->helper('url');
		$this->load->database();
		//load google login library
        $this->load->library('google');
		// Load linkedin config
		$this->load->config('linkedin');
        $this->load->model('Customermodel');
		$this->load->library('session');
		/*cash control*/
		$this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
		$this->output->set_header('Pragma: no-cache');
		$this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");

		if ($this->session->userdata('scubbi_sessid')) {
			$sessupd = array(
			'is_lastacty' => date("Y-m-d H:i:s"),		
			);
			$this->db->where('is_uid',$this->session->userdata('scubbi_sessid'));
			if($this->db->update('lg_isessions',$sessupd))
			{
//     		return "SUCCESS";
//		}else{
//			return "FAILED";
			}

		} else {
		$sessp1 = uniqid(rand(), TRUE);
		$this->sessid = md5($sessp1);
			 $uip = '';
		 
			if ($_SERVER['HTTP_CLIENT_IP'] != Null)
				$uip = $_SERVER['HTTP_CLIENT_IP'];
			else if($_SERVER['HTTP_X_FORWARDED_FOR'])
				$uip = $_SERVER['HTTP_X_FORWARDED_FOR'];
			else if($_SERVER['HTTP_X_FORWARDED'])
				$uip = $_SERVER['HTTP_X_FORWARDED'];
			else if($_SERVER['HTTP_FORWARDED_FOR'])
				$uip = $_SERVER['HTTP_FORWARDED_FOR'];
			else if($_SERVER['HTTP_FORWARDED'])
				$uip = $_SERVER['HTTP_FORWARDED'];
			else if($_SERVER['REMOTE_ADDR'])
				$uip = $_SERVER['REMOTE_ADDR'];
			else
				$uip = 'UNKNOWN';
		$details = json_decode(file_get_contents("https://ipinfo.io/{$uip}/json"));
//		foreach($details as $ky => $det) {
//			echo($ky . "->" . $det . " ");
//		}
		                $remote_addr="No Data";
                $is_browser="No Data";
                $is_iniuri="No Data";
                $is_country="No Data";
                $is_city="No Data";
                $is_region="No Data";
                $is_org="No Data";
                $is_loc="No Data";
                $is_postal="No Data";
              
                
                if($_SERVER["REMOTE_ADDR"] != 'NULL')
                {
                    $remote_addr = $_SERVER["REMOTE_ADDR"];
                }
                if($_SERVER["HTTP_USER_AGENT"] != 'NULL')
                {
                    $is_browser = $_SERVER["HTTP_USER_AGENT"];
                }
                if($_SERVER["REQUEST_URI"] != 'NULL')
                {
                    $is_iniuri = $_SERVER["REQUEST_URI"];
                }
                if($details->country != 'NULL')
                {
                    $is_country = $details->country;
                }
                if($details->city != 'NULL')
                {
                    $is_city = $details->city;
                }
                if($details->region != 'NULL')
                {
                    $is_region = $details->region;
                }
                if($details->org != 'NULL')
                {
                    $is_org = $details->org;
                }
                if($details->loc != 'NULL')
                {
                    $is_loc = $details->loc;
                }
                if($details->postal != 'NULL')
                {
                    $is_postal = $details->postal;
                }
             
                
		$sess = array(
			"is_uid" => $this->sessid,
			"is_remoteip" =>$remote_addr,
			"is_browser" => $is_browser,
			"is_iniuri" => $is_iniuri,
			"is_country" => $is_country,
			"is_city" => $is_city,
			"is_region" => $is_region,
			"is_org" => $is_org,
			"is_loc" => $is_loc,
			"is_postal" => $is_postal,
//			"is_hostname" => (is_null($details->hostname) ? "N/A" : $details->hostname)
		);
      if($this->db->insert('lg_isessions',$sess))
      {

//        return "SUCCESS";
  //    }
    //  else
      //{
        //return "FAILED";
      }

		$this->session->set_userdata('scubbi_sessid',$this->sessid);
		}
		$this->sessid = $this->session->userdata('scubbi_sessid');
		if ($this->uri->segment(1)) {
			$this->module = $this->uri->segment(1);
			if ($this->uri->segment(2)) {
				$this->module .= "/" .$this->uri->segment(2);
			}
		} else {
			$this->module = $_SERVER["REQUEST_URI"];
		}


    }
	
	public function putvlog($utype,$usrid,$dcid,$admid,$country,$island)
	{
			//echo($utype);
			switch($utype) 
			{ 
			case "Customer":
				$usrid = ($this->session->userdata('user_id') ? $this->session->userdata('user_id') : 0);
				$dcid = $dcid;
				$admid = $admid;
			break;
			case "DCADMIN":
				$usrid = $usrid;
				$dcid = ($this->session->userdata('user_id') ? $this->session->userdata('user_id') : 0);
				$admid = $admid;
			break;
			case "SUPERADMIN":
				$usrid = $usrid;
				$dcid = $dcid;
				$admid = ($this->session->userdata('user_id') ? $this->session->userdata('user_id') : 0);
			break;
			default:
				$usrid = $usrid;
				$dcid = $dcid;
				$admid = $admid;
			break;
			}
			$vlog = array(
				"lv_uid" => $this->sessid,
				"lv_uri" => $_SERVER["REQUEST_URI"],
				"lv_module" => $this->module,
				"lv_userid" => $usrid,
				"lv_dcid" => $dcid,
				"lv_adminid" => $admid,
				"lv_country" => (is_null($country) ? "0":$country),
				"lv_island" => (is_null($island) ? "0":$island)
			);
      if($this->db->insert('lg_visits',$vlog))
      {

//        return "SUCCESS";
  //    }
    //  else
      //{
        //return "FAILED";
      }
	} 
	//Customer Section Start //
	
	function index()
	{
		$this->load->model('Customermodel');
		$this->module = "Customer/index";
		$this->putvlog($this->session->userdata('user_type'),0,0,0,0,0);
		//$this->load->view('front/header');
		//$this->load->view('front/loginModel');
		//$this->load->view('front/customerLogin', $data);
		redirect('Front');
	}
public function check_lnk_in()
	{
		$userData = array();
		//Include the linkedin api php libraries
		include_once APPPATH."libraries/linkedin-oauth-client/http.php";
		include_once APPPATH."libraries/linkedin-oauth-client/oauth_client.php";
		$client = new oauth_client_class;
		$client->client_id = $this->config->item('linkedin_api_key');
		$client->client_secret = $this->config->item('linkedin_api_secret');
		$client->redirect_uri = base_url().$this->config->item('linkedin_redirect_url');
		$client->scope = $this->config->item('linkedin_scope');
		$client->debug = false;
		$client->debug_http = true;
		$application_line = __LINE__;
		
		//If authentication returns success
		
		if($success = $client->Initialize()){
			if(($success = $client->Process())){
				if(strlen($client->authorization_error)){
					$client->error = $client->authorization_error;
					$success = false;
				}elseif(strlen($client->access_token)){
					$success = $client->CallAPI('http://api.linkedin.com/v1/people/~:(id,email-address,first-name,last-name,location,picture-url,public-profile-url,formatted-name)', 
						'GET',
						array('format'=>'json'),
						array('FailOnAccessError'=>true), $userInfo);
				}
			}
			$success = $client->Finalize($success);
		}
	
		if($success){
		//Preparing data for database insertion
			$first_name = !empty($userInfo->firstName)?$userInfo->firstName:'';
			$last_name = !empty($userInfo->lastName)?$userInfo->lastName:'';
			//var_dump($email = $userInfo->id);
			//exit;
			$email = $userInfo->id;
			$where = array('email' => $email,'status'=>'OPEN');
			$check_data = $this->db->get_where('user',$where)->row();	
			$data = array(
				'source'=> 'LINKEDIN',			
				'first_name' 	=> $first_name,
				'last_name' 	=> $last_name,
				'password' 		=> $email,                    
				'email' 		=> $email,                    
				'logged_in'=>'TRUE',
				'user_type' => 'Customer',
				'profile_pic' 	=> $userInfo->pictureUrl
			);  
			if(isset($check_data)!=''){           		
				$this->db->update('user',$data,$where);
				$datas = array(
					'firstname' 	=> $first_name,
					'email' 		=> $userInfo->emailAddress,
					'profile_pic' 	=> $userInfo->pictureUrl
				);
				$user_id = $check_data->user_id;
				$where = array('user_id'=>$user_id);
				$this->db->update('tbl_customerprofile',$datas,$where);
			}
			else{           		
				$this->db->insert('user',$data);
				$user_id = $this->db->insert_id();
				$datas = array(
					'firstname' 	=> $first_name,
					'email' 		=> $userInfo->emailAddress,
					'profile_pic' 	=> $userInfo->pictureUrl,
					'user_id' =>$user_id
				);
				$this->db->insert('tbl_customerprofile',$datas);
			}
			$this->session->set_userdata(array('user_id'=>$user_id));
			$password  = $userInfo->id;
			$this->load->model('Customermodel');
			$this->Customermodel->login($email,$password);
			redirect(base_url('Customer'));
		}
		else{
			
			redirect(base_url());
		}
	}

	public function check_gmail()
	{
		$google_data=$this->google->validate();
		$where = array('email' => $google_data['id'],'status'=>'OPEN');
		$check_data = $this->db->get_where('user',$where)->row();	
		$data = array(
	//'oauth_id'=>$google_data['id'],
			'first_name'=>$google_data['name'],
			'email'=>$google_data['id'],
			'password'=>$google_data['id'],
			'user_type' => 'Customer',
			'source'=>'GOOGLEPLUS',
			'logged_in'=>'TRUE',
			'profile_pic'=>$google_data['profile_pic']

		);
	//var_dump($data);
	//exit;
		if(isset($check_data)!=''){           		
			$this->db->update('user',$data,$where);
			$datas = array(
				'firstname'=>$google_data['name'],
				'email'=>$google_data['email'],				
				'profile_pic'=>$google_data['profile_pic']
			);
			$user_id = $check_data->user_id;
			$where = array('user_id'=>$user_id);
			$this->db->update('tbl_customerprofile',$datas,$where);
		}
		else{           		
		$this->db->insert('user',$data);
		$user_id = $this->db->insert_id();
		$datas = array(
			'firstname'=>$google_data['name'],
			'email'=>$google_data['email'],				
			'profile_pic'=>$google_data['profile_pic'],
			'user_id' =>$user_id
		);
		$this->db->insert('tbl_customerprofile',$datas);
		}
		$this->session->set_userdata(array('user_id'=>$user_id));
		$email = $google_data['id'];
		$password  = $google_data['id'];
		$this->load->model('Customermodel');
		$this->Customermodel->login($email,$password);
		redirect(base_url());
	}

	
	public function sociallogin($provider)
	{
		log_message('debug', "controllers.Customer.sociallogin($provider) called");

		try
		{
			log_message('debug', 'controllers.Customer.sociallogin: loading HybridAuthLib');
			$this->load->library('HybridAuthLib');

			if ($this->hybridauthlib->providerEnabled($provider))
			{
				log_message('debug', "controllers.Customer.sociallogin: service $provider enabled, trying to authenticate.");
				$service = $this->hybridauthlib->authenticate($provider);

				if ($service->isUserConnected())
				{
					log_message('debug', 'controller.Customer.sociallogin: user authenticated.');

					$user_profile = $service->getUserProfile();

					log_message('info', 'controllers.Customer.sociallogin: user profile:'.PHP_EOL.print_r($user_profile, TRUE));

					$data['user_profile'] = $user_profile;
					
					if($provider == "Twitter")
					{
						$userdata = array(
						'oauth_provider'=>'Customer',
						'oauth_uid'=>$user_profile->identifier,
						'profile_pic'=>$user_profile->photoURL,
						'first_name'=>$user_profile->firstName,
						'last_name'=>$user_profile->lastName,
						'email'=>$user_profile->email
						);
						$email = $user_profile->identifier;
						$password = $user_profile->identifier;
						$usercheck = $this->Customermodel->login($email,$password);
						if($usercheck == 'TRUE')
						{
							redirect('Customer');
						}
						else
						{
							$truetwitter = $this->Customermodel->newtruetwitterid($userdata);
							if($truetwitter == "TRUE")
							{
								//echo "hiiiii";
								$email = $user_profile->identifier;
								$password = $user_profile->identifier;
								$usercheck12 = $this->Customermodel->login($email,$password);
								if($usercheck12 == 'TRUE')
								{
									redirect('Customer');
								}
								
							}
						}
						
					}
					elseif($provider == "Facebook")
					{
						$userdata = array(
						'oauth_provider'=>'Customer',
						'oauth_uid'=>$user_profile->identifier,
						'profile_pic'=>$user_profile->photoURL,
						'first_name'=>$user_profile->displayName,
						'last_name'=>$user_profile->lastName,
						'email'=>$user_profile->email,
						'dob'=>$user_profile->dob,
						'gender'=>$user_profile->gender
						);
						$email = $user_profile->identifier;
						$password = $user_profile->identifier;
						$usercheck = $this->Customermodel->login($email,$password);
						if($usercheck == 'TRUE')
						{
							redirect('Customer');
						}
						else
						{
							$truefacebook = $this->Customermodel->newtruefacebookid($userdata);
							if($truefacebook == "TRUE")
							{
								//echo "hiiiii";
								$email = $user_profile->identifier;
								$password = $user_profile->identifier;
								$usercheck12 = $this->Customermodel->login($email,$password);
								if($usercheck12 == 'TRUE')
								{
									redirect('Customer');
								}
								
							}
						}
						
					}
					
					//$this->load->view('hauth/done',$data);

					//$this->load->view('HAuth/done',$data);
				}
				else // Cannot authenticate user
				{
					show_error('Cannot authenticate user');
				}
			}
			else // This service is not enabled.
			{
				log_message('error', 'controllers.Customer.sociallogin: This provider is not enabled ('.$provider.')');
				show_404($_SERVER['REQUEST_URI']);
			}
		}
		catch(Exception $e)
		{
			$error = 'Unexpected error';
			switch($e->getCode())
			{
				case 0 : $error = 'Unspecified error.'; break;
				case 1 : $error = 'Hybriauth configuration error.'; break;
				case 2 : $error = 'Provider not properly configured.'; break;
				case 3 : $error = 'Unknown or disabled provider.'; break;
				case 4 : $error = 'Missing provider application credentials.'; break;
				case 5 : log_message('debug', 'controllers.Customer.sociallogin: Authentification failed. The user has canceled the authentication or the provider refused the connection.');
				         //redirect();
				         if (isset($service))
				         {
				         	log_message('debug', 'controllers.Customer.sociallogin: logging out from service.');
				         	$service->logout();
				         }
				         show_error('User has cancelled the authentication or the provider refused the connection.');
				         break;
				case 6 : $error = 'User profile request failed. Most likely the user is not connected to the provider and he should to authenticate again.';
				         break;
				case 7 : $error = 'User not connected to the provider.';
				         break;
			}

			if (isset($service))
			{
				$service->logout();
			}

			log_message('error', 'controllers.Customer.sociallogin: '.$error);
			show_error('Error authenticating user.');
		}
	}
	public function endpoint()
	{

		log_message('debug', 'controllers.Customer.endpoint called.');
		log_message('info', 'controllers.Customer.endpoint: $_REQUEST: '.print_r($_REQUEST, TRUE));

		if ($_SERVER['REQUEST_METHOD'] === 'GET')
		{
			log_message('debug', 'controllers.Customer.endpoint: the request method is GET, copying REQUEST array into GET array.');
			$_GET = $_REQUEST;
		}

		log_message('debug', 'controllers.Customer.endpoint: loading the original HybridAuth endpoint script.');
		require_once APPPATH.'/third_party/hybridauth/index.php';

	}
	
	function customerSignup()
	{
		$this->module = "Customer/customersignup";
		$this->putvlog($this->session->userdata('user_type'),0,0,0,0,0);
		$this->load->view('front/header');
		$this->load->view('front/signup');
		//$this->load->view('front/footer');
	}
	function signup()
	{
		if($this->input->post('email'))
		{
				$email = $this->input->post('email');
				$signupdata = array(
				'first_name'=>$this->input->post('fname'),
				'last_name'=>$this->input->post('lname'),
				'email'=>$this->input->post('email'),
				'user_type'=>'Customer',
				'logged_in'=>'False',
				'password'=>$this->input->post('password')
				);
				//var_dump($signupdata);
				if($this->Customermodel->signupData($signupdata))
				{
					$this->module = "Customer/signupSuccess";
					$this->putvlog($this->session->userdata('user_type'),0,0,0,0,0);
					//echo "SUCCESS";
					$this->load->library('email');

					$subject = 'Thank you for registration';
					//$message = '<p>Hi.</p>';

					// Get full html:
						$body = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
						<html xmlns="http://www.w3.org/1999/xhtml">
						<head>
							<meta http-equiv="Content-Type" content="text/html; charset=' . strtolower(config_item('charset')) . '" />
							<title>' . html_escape($subject) . '</title>
							<style type="text/css">
								body {
									font-family: Arial, Verdana, Helvetica, sans-serif;
									font-size: 16px;
								}
							</style>
						</head>
						<body>
							Hi
							<br><br>
							You received this message because someone requested an customer  for '.$email.' to a Scubbi Diving Portal.  If you did not make this request, please ignore the rest of this message.
								<br><br>
								Hello there,
								<br>
								You recently requested  to registered in Scubbi Diving Portal ,Thank you for registration, Our services team will contact you shortly
								<br>
								https://www.scubbi.com
								<br><br>
								--
								This message was sent to you by Scubbi diving Portal (https://www.scubbi.com)
								You received this message because someone requested  to Registered with Scubbi.
								If you received this in error, please disregard.  Do not reply directly to this email.
												
						</body>
						</html>';
					// Also, for getting full html you may use the following internal method:
					//$body = $this->email->full_html($subject, $message);

					$result = $this->email
							->from('sendmailbiz@gmail.com')
							->reply_to('sendmailbiz@gmail.com')    // Optional, an account where a human being reads.
							->to($email)
							->subject($subject)
							->message($body)
							->send();

					var_dump($result);
					echo '<br />';
					echo $this->email->print_debugger();
				}
				else{
					$this->module = "Customer/signupFail";
					$this->putvlog($this->session->userdata('user_type'),0,0,0,0,0);
					echo "fail";
				}
			
		//$data['msg'] = $this->Customermodel->signupData($signupdata);
			
		} else {
			$this->module = "Customer/signupfail";
			$this->putvlog($this->session->userdata('user_type'),0,0,0,0,0);
		}
	}
	function customerDashboard()
	{
		if ($this->session->userdata('first_name')!=null) {
    	   if(($this->session->userdata('user_id')!='') && ($this->session->userdata('user_type') == 'Customer'))
		   {
			$this->module = "Customer/Dashboard";
			$this->putvlog($this->session->userdata('user_type'),0,0,0,0,0);
			$this->load->view('front/header');
			$this->load->view('front/customer_dashboard');
			$this->load->view('front/footer');
		   }
		   else
		   {
				//$url= $_SERVER['HTTP_REFERER'];
				$this->session->set_userdata('forward_page',base_url().'Customer/customerDashboard');
				redirect('Customer');
			}
		}
		else
		{
			//$url= $_SERVER['HTTP_REFERER'];
			$this->session->set_userdata('forward_page',base_url().'Customer/customerDashboard');
			redirect('Customer');
		}
		
	}
	function customerProfile()
	{
		if($this->session->userdata('user_type') != 'Customer')
		{ 
		//$url= $_SERVER['HTTP_REFERER'];
		$this->session->set_userdata('forward_page',base_url().'Customer/customerProfile');
		redirect('Customer');
		}
		$this->module = "Customer/Profile";
		$this->putvlog($this->session->userdata('user_type'),0,0,0,0,0);
		$data['get_customerprofile'] = $this->Customermodel->get_customerprofile();
		$this->load->view('front/header');
		$this->load->view('front/customer_profile', $data);
		$this->load->view('front/footer');
	}
	function customereditProfile()
	{
		if($this->session->userdata('user_type') != 'Customer')
		{ 
		$this->session->set_userdata('forward_page',base_url().'Customer/customereditProfile');
		redirect('Customer');
		}
		$this->module = "Customer/EditProfile";
		$this->putvlog($this->session->userdata('user_type'),0,0,0,0,0);
		$id = $this->uri->segment(3);
		$data['edit_customerprofile'] = $this->Customermodel->edit_customerprofile($id);
		$this->load->view('front/header');
		$this->load->view('front/customer_editprofile', $data);
		$this->load->view('front/footer');
	}
	function Updatephoto($id)
	{
		if($this->input->post('update_photo'))
		{  
			$this->module = "Customer/Updatephoto";
			$this->putvlog($this->session->userdata('user_type'),0,0,0,0,0);
			 //Check whether user upload picture
            if(!empty($_FILES['cProfile']['name'])){
                $config['upload_path'] = './upload/customerprofile/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['file_name'] = $_FILES['cProfile']['name'];
                
                //Load upload library and initialize configuration
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                
                if($this->upload->do_upload('cProfile')){
                    $uploadData = $this->upload->data();
                    $cProfile = $uploadData['file_name'];
                }else{
                    $cProfile = '';
                }
            }else{
                $cProfile = '';
            }
			$userData = array(
                'photo' => $cProfile
            );          
			//Pass user data to model
			$this->Customermodel->updatePhoto($userData, $id);
			$base_url=base_url();
			redirect("$base_url"."Customer/customerProfile");
		}
	}
function Updatecustomerprofile($id)
	{
		if($this->session->userdata('user_type') != 'Customer')
		{ 
		$this->session->set_userdata('forward_page',base_url().'Customer/Updatecustomerprofile');
		redirect('Customer');
		}
		//$result = array('message'=>'');
		$this->module = "Customer/UpdateCustProfile";
		$this->putvlog($this->session->userdata('user_type'),$id,0,0,0,0);
		if($this->input->post('update_customerprofile_data'))
		{  
			 //Check whether user upload picture
          
			$this->load->helper('file');

			 
			$dss = $this->input->post('Specialtiesskill');
			$dss1 ="";
			if(isset($dss) && is_array($dss)){
			$dss1 = implode(",", $dss);
			}			
			$country_code = $this->input->post('country_code');
			$contact_number = $this->input->post('contact_number');
			$logtxt = "";
			if(isset($contact_number) && is_array($contact_number)){
				$i = 0;
				$con121 = "";
				$contacts = count($contact_number);
				if(isset($country_code) && is_array($country_code)){
					$ccode=count($country_code);
				} else {
					$ccode = 0;
				}
				$logtxt .= "Contacts: $contacts, CCodes: $ccode \n";
				$offset = $ccode - $contacts; 
				foreach($contact_number as $cn) {
					$con121 .= ($i == 0 ? "" : ",") . ($offset + $i < 0  ? "" : $country_code[$i+$offset]) . $cn;
					$i++;
				}
			}
			if ( !write_file('application/controllers/logcon121.txt', $logtxt . $con121)){
     			echo 'Unable to write the file';
			}			

//			$con12 = $country_code.$contact_number;
			
//				$con121 ="";
//			if(isset($con12) && is_array($con12)){
//				$con121 = implode(",", $con12); 
//			}
			
			$other_language = $this->input->post('field_name1');
			$dob = $this->input->post('dob');
			$date_dob =date("Y-m-d", strtotime($dob));
			$identification_passport="";
			if(!empty($_FILES['identification_passport']['name'])){
                $config['upload_path'] = './upload/customerprofile/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['file_name'] = $_FILES['identification_passport']['name'];
                
                //Load upload library and initialize configuration
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                
                if($this->upload->do_upload('identification_passport')){
                    $uploadData = $this->upload->data();
                    $identification_passport = $uploadData['file_name'];
                }else{
                    $identification_passport = '';
                }
            }
			else
			{
				$identification_passport=$this->input->post('identification_passport1');
			}
			$diver_card="";
			if(!empty($_FILES['diver_card']['name'])){
                $config['upload_path'] = './upload/customerprofile/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['file_name'] = $_FILES['diver_card']['name'];
                
                //Load upload library and initialize configuration
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                
                if($this->upload->do_upload('diver_card')){
                    $uploadData = $this->upload->data();
                    $diver_card = $uploadData['file_name'];
                }else{
                    $diver_card = '';
                }
            }
		else
			{
				$diver_card=$this->input->post('diver_card1');
			}
			
			$$registration_body1 = "";
			$registration_body = $this->input->post('diver_registration_body');
			if($registration_body == 'PADI' || $registration_body == 'SSI')
			{
				$registration_body1 = $this->input->post('diver_registration_body');
			}
			else
			{
				$registration_body1 = $this->input->post('diver_registration_body1');
			}
			
			
			
            $userData = array(
                'firstname' => $this->input->post('firstname'),
                //'dcimage' => $divecenter_picture,
                'lastname' => $this->input->post('lastname'),
                'gender' => $this->input->post('gender'),
                'dob' => $date_dob,
                'email' => $this->input->post('email'),
                'contactno' => $con121,
                'nationality' => $this->input->post('nationality'),
                'diver_registration_body' => $registration_body1,
                
				'diver_registration_level' => $this->input->post('diver_registration_level'),
				'diver_speciality_skill' => $dss1,
				//'diver_card' => $diver_card,
				'language' => $this->input->post('language'),
				'currency' => $this->input->post('currency'),
				'address1' => $this->input->post('address1'),
				'address2' => $this->input->post('address2'),
				'address3' => $this->input->post('address3'),
				'state' => $this->input->post('state'),
				'other_language' => implode(",", $other_language),
				'name' => $this->input->post('name'),
				'contact_no' => $this->input->post('contact_no'),
				'e_mail' => $this->input->post('e_mail'),
				'relationship' => $this->input->post('relationship'),
				'identifiction_passport' =>$identification_passport,
				'diver_card' =>$diver_card, 
				'modified' => date("Y-m-d H:i:s")
            );          
			//Pass user data to model
			$this->Customermodel->updateData($userData, $id);
			$base_url=base_url();
			redirect("$base_url"."Customer/customereditProfile/$id");
		}
		if($this->input->post('update_customerprofile_file'))
		{
			  if(!empty($_FILES['identification_passport']['name'])){
                $config['upload_path'] = './upload/customerprofile/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['file_name'] = $_FILES['identification_passport']['name'];
                
                //Load upload library and initialize configuration
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                
                if($this->upload->do_upload('identification_passport')){
                    $uploadData = $this->upload->data();
                    $identification_passport = $uploadData['file_name'];
                }else{
                    $identification_passport = '';
                }
            }else{
                $identification_passport = '';
            }
			 $userData = array(
			 'identifiction_passport' =>$identification_passport 
			 );
			 $this->Customermodel->updateData($userData, $id);
			$base_url=base_url();
			redirect("$base_url"."Customer/customereditProfile/$id");
		}
		if($this->input->post('update_customerprofile_file1'))
		{
			  if(!empty($_FILES['diver_card']['name'])){
                $config['upload_path'] = './upload/customerprofile/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['file_name'] = $_FILES['diver_card']['name'];
                
                //Load upload library and initialize configuration
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                
                if($this->upload->do_upload('diver_card')){
                    $uploadData = $this->upload->data();
                    $diver_card = $uploadData['file_name'];
                }else{
                    $diver_card = '';
                }
            }else{
                $diver_card = '';
            }
			 $userData = array(
			 'diver_card' =>$diver_card 
			 );
			 $this->Customermodel->updateData($userData, $id);
			$base_url=base_url();
			redirect("$base_url"."Customer/customereditProfile/$id");
		}
	}
	function customerChangepassword($chge_id)
	{
		if($this->input->post('update_change_password'))
		{
			$this->module = "Customer/chgpwd/" . $chge_id . "/" . $this->input->post('newpassword') ;
			$this->putvlog($this->session->userdata('user_type'),0,0,0,0,0);
			$data = array(
			'password'=>$this->input->post('newpassword')
			);
			$this->Customermodel->updatePassword($data, $chge_id);
	   		$this->Customermodel->logout($this->session->userdata('user_id'));
			redirect("$base_url");
			
		}
		
		$this->load->view('front/header');
		$this->load->view('front/customer_changepassword');
		$this->load->view('front/footer');
	}
	function customerMydiveTrips()
	{
		if($this->session->userdata('user_type') != 'Customer')
		{ 
		$this->session->set_userdata('forward_page',base_url().'Customer/customerMydiveTrips');
		redirect('Customer');
		}
		$this->module = "Customer/CustMyDiveTrips";
		$this->putvlog($this->session->userdata('user_type'),0,0,0,0,0);
		$data['past_trips'] = $this->Customermodel->customerPastTrips();
		$data['upcoming_trips'] = $this->Customermodel->customerUpcomingTrips();
		//var_dump($data);
		$this->load->view('front/header');
		$this->load->view('front/customer_mydiveTrips', $data);
		$this->load->view('front/footer');
	}
	function get_Allupcomingtrips()
	{
		if($this->session->userdata('user_type') != 'Customer')
		{ 
		$this->session->set_userdata('forward_page',base_url().'Customer/get_Allupcommingtrips');

		redirect('Customer');
		}
		$this->module = "Customer/AllUpcomingTrips";
		$this->putvlog($this->session->userdata('user_type'),0,0,0,0,0);
		/* $current_checkin = date("Y-m-d");
//		$this->db->where('checkin >=', $current_checkin);
//		$this->db->where_not_in('status', array('CANCELLED','FAILED','PAYING','DECLINED','PENDING'));
//		$this->db->where('customer_id', $this->session->userdata('user_id'));
		$qry = "select * from tbl_booking where checkin >= '$current_checkin' and customer_id = " . $this->session->userdata('user_id') . 
		" and status not in ('CANCELLED','FAILED','PAYING','DECLINED','PENDING')";
		$qres = $this->db->query($qry);
		$num_rows = $qres->num_rows();
		//$num_rows=$this->db->count_all("tbl_booking");
		$config['base_url'] = base_url().'Customer/get_Allupcomingtrips';
		$config['total_rows'] = $num_rows+1;
		$config['per_page'] = 4;
		$config['num_links'] = $num_rows+1;
		//$config['use_page_numbers'] = TRUE;
		$config['full_tag_open'] = '<ul class="pagination">';
		 $config['full_tag_close'] = '</ul>';
		 $config['prev_link'] = '&laquo;';
		 $config['prev_tag_open'] = '<li>';
		 $config['prev_tag_close'] = '</li>';
		 $config['next_tag_open'] = '<li>';
		 $config['next_tag_close'] = '</li>';
		 $config['last_tag_open'] = '<li>';
		 $config['last_tag_close'] = '</li>';
		 $config['cur_tag_open'] = '<li class="active"><a href="#">';
		 $config['cur_tag_close'] = '</a></li>';
		 $config['num_tag_open'] = '<li>';
		 $config['num_tag_close'] = '</li>';
		$config['next_link'] = '&raquo;';
		
		$this->pagination->initialize($config);
		$data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data["links"] = $this->pagination->create_links();
		$data['numrows'] = $num_rows;
		
		$data['get_Allupcomingtrips'] = $this->Customermodel->get_Allupcomingtrips($config["per_page"], $data['page']); */
		
		$this->load->view('front/header');
//		echo("Record Count .. $num_rows <br>");
		$this->load->view('front/customer_allupcomingTrips');
		$this->load->view('front/footer');
	}
	function get_Allpasttrips()
	{
		if($this->session->userdata('user_type') != 'Customer')
		{ 
		$this->session->set_userdata('forward_page',base_url().'Customer/get_Allpasttrips');
		redirect('Customer');
		}
		$this->module = "Customer/AllPastTrips";
		$this->putvlog($this->session->userdata('user_type'),0,0,0,0,0);
		/* $current_checkout = date("Y-m-d");
		$this->db->where('checkout <', $current_checkout);
		$this->db->where('customer_id', $this->session->userdata('user_id'));
		$this->db->where_in('status', array('COMPLETED','CONFIRMED'));
//		$num_rows = $this->db->where('checkin <=',$current_checkout)->count_all("tbl_booking");
		$qres = $this->db->get("tbl_booking");
		$num_rows=$qres->num_rows();
		$config['base_url'] = base_url().'Customer/get_Allpasttrips';
		$config['total_rows'] = $num_rows+1;
		$config['per_page'] = 4;
		$config['num_links'] = $num_rows+1;
		//$config['use_page_numbers'] = TRUE;
		$config['full_tag_open'] = '<ul class="pagination">';
		 $config['full_tag_close'] = '</ul>';
		 $config['prev_link'] = '&laquo;';
		 $config['prev_tag_open'] = '<li>';
		 $config['prev_tag_close'] = '</li>';
		 $config['next_tag_open'] = '<li>';
		 $config['next_tag_close'] = '</li>';
//		 $config['last_tag_open'] = '<li>';
//		 $config['last_tag_close'] = '</li>';
		 $config['cur_tag_open'] = '<li class="active"><a href="#">';
		 $config['cur_tag_close'] = '</a></li>';
		 $config['num_tag_open'] = '<li>';
		 $config['num_tag_close'] = '</li>';
		$config['next_link'] = '&raquo;';
		
		$this->pagination->initialize($config);
		$data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data["links"] = $this->pagination->create_links();
		
		$data['get_Allpasttrips'] = $this->Customermodel->get_Allpasttrips($config["per_page"], $data['page']); */
		
		$this->load->view('front/header');
		$this->load->view('front/customer_allpastTrips');
		$this->load->view('front/footer');
	}
	
	function pastTripdetails()
	{
		$this->module = "Customer/PastTripDetails";
		$this->putvlog($this->session->userdata('user_type'),0,0,0,0,0);
		$this->load->view('front/header');
		$this->load->view('front/pastTripdetails');
		$this->load->view('front/footer');
	}
	
	function paymentInfo()
	{
//		$datein = $roww1->check_in->format('Y-m-d');
//		$dateout = $roww1->check_out->format('Y-m-d');
		

		$this->module = "Customer/PaymentInfo";
		$this->putvlog($this->session->userdata('user_type'),0,0,0,0,0);
		$data['np'] = $this->input->post('no_of_person');
		$data['diveid'] = $this->input->post('divecenter_id');
		$data['sd'] = date("Y-m-d", strtotime($this->input->post('startdate')));
		$data['ed'] = date("Y-m-d", strtotime($this->input->post('enddate')));
		$data['nod'] = $this->input->post('noofdays');
		$this->load->view('front/header');
		$this->load->view('front/loginModel');
		$this->load->view('front/paymentInfo2', $data);
		$this->load->view('front/footer');
	}


	function postPayment()
	{
		$resultDive = 0;
		
		$dummy_id = $this->input->post('dummyid');
		$this->module = "Customer/pastPayment";
		$this->putvlog($this->session->userdata('user_type'),0,0,0,0,0);
/*
		$cust_id = $this->session->userdata('user_id');
		$dummycart = $this->db->get_where('tbl_dummy_cart', array('customer_id' => $cust_id))->result();
		$dummyrec = count($dummycart);
		foreach($dummycart as $dcart)
			{
				$dummy_id=$dcart->id;
			}

			$this->db->select('*');
			$this->db->from('tbl_dummy_cart');
			$this->db->where('customer_id',$this->session->userdata('user_id'));
			$dummyq = $this->db->get();
			$dummyr = $dummyq->result();
			foreach($dummyr as $drow) {
				$dummy_id = $drow->id;
			}
*/

//		$dummy_id = $this->input->post('dummyid');	 
		// Posting Booking Data
		//$total = $this->input->post('grandtotal') + ($this->input->post('grandtotal') * (6/100));
		
		//echo $dbValue = "SC".str_pad($dbValue, 6, "0", STR_PAD_LEFT); // it will produce F-0000001;
		$currency ="";
		$converted_currency ="";
		if($this->session->userdata('dccurreny'))
		{
			$currency = $this->session->userdata('dccurreny');
			$converted_currency = $this->input->post('currencyAfterMyrTf');
		}
		else
		{
			$currency = 'MYR';
			$converted_currency = $this->input->post('grandtotal');
		}
		
		$myr_currency = "";
		if($this->input->post('paymentToGateway'))
		{
			$myr_currency = $this->input->post('paymentToGateway');
		}
		else
		{
			$myr_currency = $this->input->post('grandtotal');
		}
		
		$data['product_desc'] ="";
		$cartData = array(
			'booking_no' => $this->input->post('RefNo'),
			'sessionid' => $this->session->userdata('scubbi_sessid'),
			'checkin' => $this->input->post('checkindate'),
			'checkout' => $this->input->post('checkoutdate'),
			'no_of_persons' => $this->input->post('noofperson'),
			'dive_id' => $this->input->post('divecenter_id'),
			'total' => $this->input->post('total'),
			'gst' => $this->input->post('gst'),
			'grand_total' => $this->input->post('grandtotal'),			 
			'currency' => $currency,			 
			'promo_code' => $this->input->post('used_promo_code'),			 
			'promo_code_discount' => $this->input->post('discount_amount'),			 
			'myr_currency' => $myr_currency,			 
			'converted_currency_amount' => $converted_currency,			 
			'customer_id' => $this->session->userdata('user_id'),
			'created' => date('Y-m-d H:i:s'),
			'status' => "PAYING"
		);
		$dc_id = $this->input->post('divecenter_id');
		if ($this->db->insert('tbl_booking', $cartData)) {
			$bookid = $this->db->insert_id();
			if($this->input->post('used_promo_code') != "")
			{
				$tstt = $this->db->get_where("promo_code_details", array('promo_code'=>$this->input->post('used_promo_code'), 'fk_promo_id'=>0))->row();
				$tsttid = $tstt->promo_id;
				$used_count = $tstt->used_count + 1;
				
				$whereup = array("used_count"=>$used_count);
				$this->db->where("promo_id", $tsttid);
				$this->db->update("promo_code_details", $whereup);
			}
			$this->db->select('*');
			$this->db->from('tbl_dummy_cart_product');
			$this->db->where('dummy_id',$dummy_id);
			$query1 = $this->db->get();
			$res1 = $query1->result();
			foreach($res1 as $rrow1)
			{
				$data['product_desc'] .= $rrow1->product_name."-";
				 $data1 = array(
					'product_id' => $rrow1->product_id,
					'diverid' => $rrow1->diverid,
					'product_name' => $rrow1->product_name,
					'qty' => $rrow1->qty,
					'uom' => $rrow1->uom,
					'base_price' => $rrow1->base_price,
					'price' => $rrow1->price,
					'extn_qty' => $rrow1->extn_qty,
					'extension_nights' => $rrow1->extension_nights,
					'no_of_dive' => $rrow1->no_of_dive,
					'accom' => $rrow1->accom,
					'accom_qty' => $rrow1->accom_qty,
					'accom_basis' => $rrow1->accom_basis,
					'season' => $rrow1->season,
					'table_name' => $rrow1->table_name,
					'booking_id' => $bookid, //$rrow1->dummy_id,
					'user_id' => $this->session->userdata('user_id')
					 );
				if ($this->db->insert('tbl_booking_product', $data1)) 
				{
					
					$bookrecid = $this->db->insert_id();	 
					// Accom Product
					$this->db->select('*');
					$this->db->from('tbl_dummy_cart_product_accomodation');
					$this->db->where('dummy_id',$dummy_id);
					$this->db->where('dummy_product_id	',$rrow1->id);
					$aquery = $this->db->get();
					$acc_count_rows = $aquery->num_rows();
					if($acc_count_rows >0)
					{
						
						$ares2 = $aquery->result();
						foreach($ares2 as $arow2)
						{
							$accdata = array(
							'diverid' => $arow2->diverid,
							'product_id' => $arow2->product_id,
							'product_name' => $arow2->product_name,
							'room_type' => $arow2->room_type,
							'season' => $arow2->season,
							'qty' => $arow2->qty,
							'base_price' => $arow2->base_price,
							'price' => $arow2->price,
							'total' => $arow2->total,
							'accom_basis' => $arow2->accom_basis,
							'accom_qty' => $arow2->accom_qty,
							'user_id' => $this->session->userdata('user_id'),
							'booking_id' => $bookid, //$rrow2->dummy_id,
							'booking_product_id' => $bookrecid //$rrow2->dummy_product_id,
							);
							
							if ($this->db->insert('tbl_booking_product_accomodation', $accdata)) 
							{
								
								$resultDive = 2;
							}
						}
					} else {
						$resultDive = 2;
					}

					// Optional Product
					$this->db->select('*');
					$this->db->from('tbl_dummy_cart_product_optional');
					$this->db->where('dummy_id',$dummy_id);
					$this->db->where('dummy_product_id	',$rrow1->id);
					$query2 = $this->db->get();
					$count_rows = $query2->num_rows();
					if($count_rows >0)
					{
						$res2 = $query2->result();
						foreach($res2 as $rrow2)
						{
							$data2 = array(
							'product_id' => $rrow2->product_id,
							'diverid' => $rrow2->diverid,
							'product_name' => $rrow2->product_name,
							'qty' => $rrow2->qty,
							'price' => $rrow2->price,
							'total' => $rrow2->total,
							'booking_id' => $bookid, //$rrow2->dummy_id,
							'booking_product_id' => $bookrecid //$rrow2->dummy_product_id,
							);
							if ($this->db->insert('tbl_booking_product_optional', $data2)) 
							{
								
								$resultDive = 2;
							}
						}
					} else {
						$resultDive = 2;
					}
					
					// Extend Night
					$this->db->select('*');
					$this->db->from('tbl_dummy_cart_product_extend');
					$this->db->where('dummy_id',$dummy_id);
					$this->db->where('dummy_product_id	',$rrow1->id);
					$query5 = $this->db->get();
					$count_rows5 = $query5->num_rows();
					if($count_rows5 >0)
					{
						$res5 = $query5->result();
						foreach($res5 as $rrow5)
						{
							$data5 = array(
							'product_id' => $rrow5->product_id,
							'diverid' => $rrow5->diverid,
							'product_name' => $rrow5->product_name,
							'qty' => $rrow5->qty,
							'price' => $rrow5->price,
							'total' => $rrow5->total,
							'booking_id' => $bookid, //$rrow2->dummy_id,
							'booking_product_id' => $bookrecid //$rrow2->dummy_product_id,
							);
							if ($this->db->insert('tbl_booking_product_extend', $data5)) 
							{
								
								$resultDive = 2;
							}
						}
					} else {
						$resultDive = 2;
					}
				}
			}
//			$refno= $this->input->post('RefNo');
			// Handling removel of record from dummy cart
			$this->db->where('customer_id',$this->session->userdata('user_id'));
			$this->db->delete('tbl_dummy_cart');
			$this->db->where('dummy_id',$dummy_id);
			$this->db->delete('tbl_dummy_cart_product');
			$this->db->where('dummy_id',$dummy_id);
			$this->db->delete('tbl_dummy_cart_product_accomodation');
			$this->db->where('dummy_id',$dummy_id);
			$this->db->delete('tbl_dummy_cart_product_optional');
			$this->db->where('dummy_id',$dummy_id);
			$this->db->delete('tbl_dummy_cart_product_extend');
								

			// Insert Passengers
			$nop = $this->input->post('no_of_person');
			$cust_name = "";
			$cust_email = "";
			$cust_phone = "";
			for($i=0; $i<$nop; $i++)
			{
			if($this->input->post('passenger_details'))
			{
				$cust_name = $this->input->post('firstname[0]');
				$cust_email = $this->input->post('email[0]');
				$cust_phone = $this->input->post('mobilenumber[0]');
				
				$arr_data = array(
				'title'=>$this->input->post('title['.$i.']'),
				'name'=>$this->input->post('firstname['.$i.']'),
				'surname'=>$this->input->post('surname['.$i.']'),
				'email'=>$this->input->post('email['.$i.']'),
				'country_code'=>$this->input->post('countrycode['.$i.']'),
				'phone_no'=>$this->input->post('mobilenumber['.$i.']'),
				'booking_id'=>$bookid
				);
			//var_dump($arr_data);
			$this->Customermodel->addPassenger($arr_data);
			}
			}
			
		}
		// Inserted Booking Cart information with Pending status 
$data['cancellation_policy_ipay'] = $this->input->post('cancellation_policy_ipay');
		$data['booking_policy_ipay'] = $this->input->post('booking_policy_ipay');
		$data['np'] = $this->input->post('no_of_person');
		$data['booking_no'] = $this->input->post('RefNo');
		$data['customer_name'] = $cust_name;
		$data['customer_email'] = $cust_email;
		$data['customer_phone'] = $cust_phone;
		$this->load->view('front/header');
		$this->load->view('front/postPayment', $data);
		$this->load->view('front/footer');
	}
	
	
	function bookingInfo()
	{
		$this->module = "Customer/bookingInfo";
		$this->putvlog($this->session->userdata('user_type'),0,0,0,0,0);
		//$this->Customermodel->bookingInfo();
		$this->load->view('front/header');
		$this->load->view('front/orderConfirmation2');
		$this->load->view('front/footer');
	}

	function bookingInfo2()
	{
		$this->module = "Customer/bookingInfo2";
		$this->putvlog($this->session->userdata('user_type'),0,0,0,0,0);
		//$this->Customermodel->bookingInfo();
		$this->load->view('front/header');
		$this->load->view('front/orderConfirmation2');
		$this->load->view('front/footer');
	}
	
	//Customer Section End //

		/* //Method for view login page
		public function index(){
		$this->load->library('session');
				$this->load->helper('url');
	    if($this->session->userdata('logged_in')==TRUE){
        redirect('Dashboard');
        }
        $data=array();
		$this->load->view('Login');
	   } */

	   //Method for varify login information
	   public function varifyUser()
	   {
	  
	  $this->load->library('session');
	   	$this->load->helper('url');
        /* if($this->session->userdata('logged_in')==TRUE){
        redirect('Dashboard');
        }  
		$this->load->library('user_agent');
		if ($this->agent->is_referral())
		{
    		$refer =  $this->agent->referrer();
		}*/
        $email=$this->input->post('email',true);
        $password=$this->input->post('password',true);

        if($this->Customermodel->login($email,$password)){
			if($this->session->userdata('forward_page') != '') {
				$forward = $this->session->userdata('forward_page');
				$this->session->unset_userdata('forward_page');
				$this->module = "Customer/verifyUser/" . $email . "/F:" . $forward;
				$this->putvlog($this->session->userdata('user_type'),0,0,0,0,0);
        		redirect($forward);
			} else {
				$this->module = "Customer/verifyUser/" . $email . "/NoForward";
				$this->putvlog($this->session->userdata('user_type'),0,0,0,0,0);
//        		redirect(base_url());
        		
				//echo 1;
			}
			echo 1;
        }
		else{
			$this->module = "Customer/verifyUser/" . $email . "/Failed!" ;
			$this->putvlog($this->session->userdata('user_type'),0,0,0,0,0);
			
		}
		//echo "jfddjfdhgf";

	   }

	  /*  public function verify(){
//		$this->load->library('session');
		$this->load->helper('url');
        $email1=$this->input->post('email',true);
		$email = urldecode($email1);
        $password=$this->input->post('password',true);

		echo $this->Usermodel->loginapi($email,$password);

		/*
		//$this->Usermodel->login_api($email,$password);
         if($this->Usermodel->loginapi($email,$password)){

		echo $this->session->userdata('user_type');
		// echo "SUCCESS";
		}
		else {
        echo "FAILED";
        }
	
        } */
	   //Method for logout
	   public function logout(){
	   $this->load->library('session');
		$this->module = "Customer/logout";
		$this->putvlog($this->session->userdata('user_type'),0,0,0,0,0);

	   	$this->Customermodel->logout($this->session->userdata('user_id'));
	   redirect(base_url());
	   }
	   public function allMessages()
	   {
		if($this->session->userdata('user_type') != 'Customer')
		{ 
		$this->session->set_userdata('forward_page',base_url().'Customer/allMessages');
		redirect('Customer');
		}
			$this->module = "Customer/allMessages";
			$this->putvlog($this->session->userdata('user_type'),0,0,0,0,0);
			$this->load->view('front/header');
			 $data['message'] = $this->Customermodel->allMessages($this->session->userdata('user_id'));
			$this->load->view('front/messages/allMessages',$data);
			$this->load->view('front/footer');
	   }
	   public function individualMessage($diveId,$thread)
	   {
		if($this->session->userdata('user_type') != 'Customer')
		{ 
		redirect('Customer');
		}
			$this->module = "Customer/individualMessages";
			$this->putvlog($this->session->userdata('user_type'),0,$diveId,0,0,0);
		   $this->load->view('front/header');
			$user_id = $this->session->userdata('user_id');
			$result['oldConversation']= $this->Customermodel->individualMessage($user_id,$diveId,$thread);
			$result['diveId']=$diveId;
			$this->load->view('front/messages/individualMessage',$result);
			$this->load->view('front/footer');
		   
	   }
	    function new_chat()
		  {
			 
		if($this->session->userdata('user_type') != 'Customer')
		{ 
		$this->session->set_userdata('forward_page',base_url().'Customer/new_chat');
		redirect('Customer');
		}
			$this->module = "Customer/newChat/" . $this->input->post('from_name') . "/" . $this->input->post('to_name');
			$this->putvlog($this->session->userdata('user_type'),0,0,0,0,0);
			$result = array('message'=>'');
			 if($this->input->post('submit_new_chat')){
				$data = array(
					'from' => $this->input->post('from'),		
					'to' => $this->input->post('to'),		
					'message' => $this->input->post('new_msg'),		
					'thread_id' => $this->input->post('thread_id'),		
					'time' => date("Y-m-d H:i:s"),		
					'to_name' => $this->input->post('to_name'),		
					'from_name' => $this->input->post('from_name'),		
				);
				$result['message'] = $this->Customermodel->newChat($data);
				if($result['message'] == "SUCCESS")
				{
					redirect(base_url().'Customer/allMessages');
				} 
			  } 
		  }
	   
function customerWritemyreview($id,$booking_id)
	{
		if($this->session->userdata('user_type') != 'Customer')
		{ 
		$this->session->set_userdata('forward_page',base_url().'Customer/customerWritemyreview/' . $id . '/' . $booking_id);
		redirect('Customer');
		}
		$this->module = "Customer/WriteReview/" . $booking_id;
		$this->putvlog($this->session->userdata('user_type'),0,0,0,0,0);
		$data['id']=$id;
		$data['booking_id']=$booking_id;
		$this->load->view('front/header');
		$this->load->view('front/customer_writeMyreview',$data);
		//$this->load->view('front/footer');
	}
	
	function insertReview()
	{
		if($this->input->post('content'))
		{
			$this->module = "Customer/insertReview";
			$this->putvlog($this->session->userdata('user_type'),0,0,0,0,0);
			$review_date = date("Y-m-d H:i:s");
			$data = array(
			'title'=>$this->input->post('title'),
			'description'=>$this->input->post('content'),
			'price_rating'=>$this->input->post('price_rating'),
			'services_rating'=>$this->input->post('services_rating'),
			'facilities_rating'=>$this->input->post('facilities_rating'),
			'equipment_rating'=>$this->input->post('equipment_rating'),
			'divecenter_id'=>$this->input->post('diveid'),
			'customer_id'=>$this->input->post('uuuid'),
			'booking_id'=>$this->input->post('booking_id'),
			'date'=>$review_date
			);
		$this->Customermodel->insertReview($data);
		}
		
		
		//if($ir == 'true')
		//{
			//echo json_encode(array('status'=>TRUE));
		//}
	}
	
	function customerViewmyreview($id)
	{
		if($this->session->userdata('user_type') != 'Customer')
		{ 
		$this->session->set_userdata('forward_page',base_url().'Customer/customerViewMyreview/' . $id);
		redirect('Customer');
		}
		$this->module = "Customer/ViewMyReview/" . $id;
		$this->putvlog($this->session->userdata('user_type'),0,0,0,0,0);
//		echo $id;
		$data['Cviewreview'] = $this->Customermodel->customerViewmyreview($id);
		$this->load->view('front/header');
		$this->load->view('front/customer_viewMyreview', $data);
		//$this->load->view('front/footer');
	}


    function myCart()
	{
		if($this->session->userdata('user_type') != 'Customer')
		{ 
		$this->session->set_userdata('forward_page',base_url().'Customer/myCart');
		redirect('Customer');
		}
		$this->module = "Customer/MyCart";
		$this->putvlog($this->session->userdata('user_type'),0,0,0,0,0);
		$this->load->view('front/header');
		$this->load->view('front/myCart');
		$this->load->view('front/footer');
	}	
		function update_star_rating()
	{
		$this->module = "Customer/UpdStarRating";
		$this->putvlog($this->session->userdata('user_type'),0,0,0,0,0);
		$dive_id=$_POST["id"];
		$rating=$_POST["rating"];
		$star_id=$_POST["star_id"];
		if($star_id == 1)
		{
			$data = array('price_rating'=>$rating);
		}
		elseif($star_id ==2)
		{
			$data = array('services_rating'=>$rating);
		}
		elseif($star_id == 3)
		{
			$data = array('facilities_rating'=>$rating);
		}
		else
		{
			$data = array('equipment_rating'=>$rating);
		}
			
		
		if($this->db->update('tbl_dummy_rating', $data))
		{
			echo "SUCCESS";
		}
		
	}
function upcomingTripdetails($id)
	{
		if($this->session->userdata('user_type') != 'Customer')
		{ 
		$this->session->set_userdata('forward_page',base_url().'Customer/upcomingTripdetails/' . $id);
		redirect('Customer');
		}
		$this->module = "Customer/UpcomingTripDetails/" . $id;
		$this->putvlog($this->session->userdata('user_type'),0,0,0,0,0);
		//$data['upcomingTripdetails'] = $this->Customermodel->upcomingTripdetails($id);
		$data['itenary_id'] = $id;
		$data['no_of_persons'] = $this->db->get_where('tbl_booking', array('id'=>$id))->result();
		$this->load->view('front/header');
		$this->load->view('front/upcomingTripdetails', $data);
		$this->load->view('front/footer');
	}

	function renderBooking($bid) {

	$output = "<p><ul>";
	$logoqdata = "";
	$booking = $this->db->get_where('tbl_booking_policies', array('id' => $bid))->result();
	foreach($booking as $rowbooking)
	{
		if ($rowbooking->deposit_required == "Yes") {
			if ($rowbooking->booking_deposit == "Full Prepayment" ) {
				$output .= '<li>Full payment required for booking.</li>';
				$logoqdata .= " > Full Booking Payment required \n";

			} else {
				$partb1 = explode(",",$rowbooking->booking_amount);
				if (is_array($partb1) ) {
					$partb2 = explode(",",$rowbooking->booking_total_product);
					$partb3 = explode(",",$rowbooking->booking_charge);
					$partb4 = explode(",",$rowbooking->booking_period);
					for ($b=0;$b<count($partb1);$b++) { 
						$logoqdata .= " $b, ";
						if (intval($partb1[$b]) > 0) {
							$fmttext = $partb1[$b] . $partb2[$b] . " " . $partb3[$b] . " " . $partb4[$b];
							$output .= "<li>" .$fmttext ."</li>";
						} else {
							$fmttext = " Not well defined parameters.";
						}
						$logoqdata .= " > Array B line $b - $fmttext \n";
					}

				} else {
					$fmttext = "(Partial) " . $rowbooking->booking_amount . $rowbooking->booking_total_product . " " . $rowbooking->booking_charge . " " . $rowbooking->booking_period;
					$output .= "<li>".$fmttext . "</li>";
					$logoqdata .= " > Booking $fmttext \n";
				}
			}
		} else {
			$output .= '<li>No deposits required for booking.</li>';
			$logoqdata .= " > No Booking Deposits required \n";
		}
	}
	return $output . "</ul></p>";
	
	}

	function renderCancellation($cid) {

	$output = "<p>";
	$logoqdata = "";
	$cancellation = $this->db->get_where('tbl_cancellation_policies', array('id' => $cid))->result();
	foreach($cancellation as $rowcancellation)
	{
		$output .= " &nbsp;" .$rowcancellation->cancellation_policy_type . "<br><ul>";
		if ($rowcancellation->cancellation_policy_type == "Cancellation is Free") {
			$logoqdata .= "Cancellation is Free \n";
			$output .= "<li>Cancellation is free if cancelled " . $rowcancellation->cancellation_days . " Days Before Arrival Date</li>";
		} else {
									
			$part1 = explode(",",$rowcancellation->cancellation_amount);

			if (is_array($part1) ) {
				$logoqdata .= "Cancellation is an array with " . count($part1) . " item(s) \n";
				$part2 = explode(",",$rowcancellation->cancellation_total_product);
				$part3 = explode(",",$rowcancellation->cancellation_charged);
				$part4 = explode(",",$rowcancellation->cancellation_days);
				$part5 = explode(",",$rowcancellation->cancellation_period);
				for ($i=0;$i<count($part1);$i++) { 
					$logoqdata .= " $i, ";
					if (substr($part2[$i],0,6) == "Amount") {
						if (intval($part1[$i]) > 0 ) {
							$fmttext = "Amount " . $part1[$i] . " " . $part3[$i] . " if cancelled " . $part4[$i] . " days before arrival date.";
							$output .= "<li>$fmttext </li>";
						} else {
							$fmttext = " Not well defined parameters.";
						}
						$logoqdata .= " > Array line $i - $fmttext \n";
					} else {
						if (intval($part1[$i]) > 0 ) {
							$fmttext = $part1[$i] . $part2[$i] . " " . $part3[$i] . " if cancelled " . $part4[$i] . " days before arrival date.";
							$output .=  "<li>$fmttext </li>";
						} else {
							$fmttext = " Not well defined parameters.";
						}
						$logoqdata .= " > Array line $i - $fmttext \n";
					}
				}
			} else {
				if (substr($rowcancellation->cancellation_total_product,0,6) == "Amount") {
					$fmttext = "Amount " . substr($rowcancellation->cancellation_amount,0,-1). " " . substr($rowcancellation->cancellation_charged,0,-1) . " if cancelled " . substr($rowcancellation->cancellation_days,0,-1) . " days before arrival date.";
					$output .= "<li>" .$fmttext .'</li>';
					$logoqdata .= " > $fmttext \n";
				} else {
					$fmttext = substr($rowcancellation->cancellation_amount,0,-1). substr($rowcancellation->cancellation_total_product,0,-1) ." ". substr($rowcancellation->cancellation_charged,0,-1) . " if cancelled " . substr($rowcancellation->cancellation_days,0,-1) . " days before arrival date.";
					$output .= "<li>" .$fmttext .'</li>';
					$logoqdata .= " > $fmttext \n";
				}
			}
			$output .= "<li>A 10% or minimum MYR 50 will be charged by scubbi for service fee in the event of any cancellation by the user</li></ul>";
		}
	}
	return $output . "</p>";
	}

	function addPassenger($id)
	{
		$this->module = "Customer/addPassenger/$id";
		$this->putvlog($this->session->userdata('user_type'),0,0,0,0,0);
		$nop = $this->input->post('nop');
		for($i=0; $i<$nop; $i++)
		{
		if($this->input->post('passenger_details'))
		{
			//echo("Checking rid " . $this->input->post('rid['.$i.']') . " >>> ");
			if ($this->input->post('rid['.$i.']') != 0) {
			//echo("Updating " . $this->input->post('rid['.$i.']') . "! ");
			$arr_data = array(
			'title'=>$this->input->post('title['.$i.']'),
			'name'=>$this->input->post('firstname['.$i.']'),
			'surname'=>$this->input->post('surname['.$i.']'),
			'email'=>$this->input->post('email_address['.$i.']'),
			'country_code'=>$this->input->post('countrycode['.$i.']'),
			'phone_no'=>$this->input->post('mobile_number['.$i.']')
			);
			$this->Customermodel->updatePassenger($this->input->post('rid['.$i.']'),$arr_data);

			} else {
			//echo("Inserting!");
			$arr_data = array(
			'title'=>$this->input->post('title['.$i.']'),
			'name'=>$this->input->post('firstname['.$i.']'),
			'surname'=>$this->input->post('surname['.$i.']'),
			'email'=>$this->input->post('email_address['.$i.']'),
			'country_code'=>$this->input->post('countrycode['.$i.']'),
			'phone_no'=>$this->input->post('mobile_number['.$i.']'),
			'booking_id'=>$id
			);
			$this->Customermodel->addPassenger($arr_data);

			}
//			$arr_update = array(
//			'status' =>"COMPLETED",
//			'grand_total' =>$this->input->post('grandtotal')
//			);
			//var_dump($arr_data);
		//	$this->Customermodel->statusUpdated($id, $arr_update);
		}
		}
		$data['itenary_id'] = $id;
		$data['no_of_persons'] = $this->db->get_where('tbl_booking', array('id'=>$id))->result();
		$this->load->view('front/header');
		$this->load->view('front/upcomingTripdetails', $data);
		$this->load->view('front/footer');
	}
	function upcomingPrint($id)
	{
		$this->module = "Customer/upcomingPrint/$id";
		$this->putvlog($this->session->userdata('user_type'),0,0,0,0,0);
		$data['itenary_id'] = $id;
		//$this->load->view('front/upcomingPrint');
		$data['no_of_persons'] = $this->db->get_where('tbl_booking', array('id'=>$id))->result();
		//$this->load->view('front/header');
		$this->load->view('front/upcomingPrint', $data);
	}
	function upcomingPDF($id)
	{
		$this->module = "Customer/upcomingPDF/$id";
		$this->putvlog($this->session->userdata('user_type'),0,0,0,0,0);
		if(isset($_POST["create_pdf1"]))  
		{
			$this->load->library('pdf');
			$pdf = $this->pdf->load();
			
			$data['itenary_id'] = $id;
			//$this->load->view('front/upcomingPrint');
			$data['no_of_persons'] = $this->db->get_where('tbl_booking', array('id'=>$id))->result();
			//$this->load->view('front/header');
			$html1 = $this->load->view('front/upcomingPDF', $data,TRUE);
		
			$pdf->WriteHTML($html1);
			// write the HTML into the PDF
			$output1 = 'upcomingPDF' . date('Y_m_d_H_i_s') . '_.pdf';
			$pdf->Output("$output1", 'I');
		} 
	}
	function viewReceiptPDF($id)
	{
		$this->module = "Customer/viewReceiptPDF/$id";
		$this->putvlog($this->session->userdata('user_type'),0,0,0,0,0);
		if(isset($_POST["create_pdf"]))  
		{ 
			$this->load->library('pdf');
			$pdf = $this->pdf->load();
			//$id=$this->session->userdata('id');
			$data['itenary_id'] = $id;
			$data['grand_total'] = $this->db->get_where('tbl_booking', array('id', $id))->result();
			$html = $this->load->view('front/viewReceiptPDF', $data,TRUE);
			
		    //$data['otDetails'] = $this->NubeEmployeeModel->get_adminAcceptedOT($id);
			
			//$html =	$this->load->view('NubeEmployee/adminAcceptedOT', $data,TRUE);
			//	$this->load->view('template/footer');    
			$pdf->WriteHTML($html);
			// write the HTML into the PDF
			$output = 'viewReceipt' . date('Y_m_d_H_i_s') . '_.pdf';
			$pdf->Output("$output", 'I');

		}  
		 
		else
		{
			$data['itenary_id'] = $id;
			$data['grand_total'] = $this->db->get_where('tbl_booking', array('id', $id))->result();
			$this->load->view('front/viewReceipt', $data);
		}
		
		
	}
	function cancelTrip($id)
	{
		$this->module = "Customer/CancelTrip/$id";
		$this->putvlog($this->session->userdata('user_type'),0,0,0,0,0);
		$data['itenary_id'] = $id;
		$data['no_of_persons'] = $this->db->get_where('tbl_booking', array('id'=>$id))->result();
		//$this->load->view('front/upcomingPrint');
		$this->load->view('front/header');
		$this->load->view('front/cancelTrip', $data);
		$this->load->view('front/footer');
	}
	function confirmCancellation($id)
	{
		$this->module = "Customer/ConfirmCancellation/$id";
		$this->putvlog($this->session->userdata('user_type'),0,0,0,0,0);
		$data['itenary_id'] = $id;
		$cancell_data = array(
		'modified' => date("Y-m-d H:i:s"),		
		'status' => "CANCELLED"
		);
		$this->Customermodel->confirmCancellation($id, $cancell_data);
		$data['no_of_persons'] = $this->db->get_where('tbl_booking', array('id'=>$id))->result();
/*
		$msgdata = array(
			'from' => $this->input->post('from'),		
			'to' => $this->input->post('to'),		
			'message' => $this->input->post('new_msg'),		
			'thread_id' => $this->input->post('thread_id'),		
			'time' => date("Y-m-d H:i:s"),		
			'to_name' => $this->input->post('to_name'),		
			'from_name' => $this->input->post('from_name'),		
		);
		$result['message'] = $this->Customermodel->newChat($msgdata);
*/		
		$this->load->view('front/header');
		$this->load->view('front/upcomingTripdetails', $data);
		$this->load->view('front/footer');
	}	


	public function chk_promo()
	{
		$date = date('Y-m-d');
		$promo_code = $_POST['promo_code'];
		$currency = $_POST['currency'];
		//$promo_code = 'F3EFNS6';
		
	$sql ="SELECT * FROM `promo_code_details` WHERE `promo_code` = '$promo_code' AND `currency`= '$currency'     AND `status` = 1 AND (`valid_from` >= '$date' OR `valid_to` >= '$date' ) AND (total_count > used_count)";
		
		$data = $this->db->query($sql)->row();
		$result = ($data)?$data:array();
		echo json_encode($result);
	 	
	}
	Public function check_promocode()
	{
		$date = date('Y-m-d');
		$promo_code = 'T8X0IYF';
		$currency = 'MYR';
		//$promo_code = 'F3EFNS6';
		
	$sql ="SELECT * FROM `promo_code_details` WHERE `promo_code` = '$promo_code' AND `currency`= '$currency'     AND `status` = 1 AND (`valid_from` >= '$date' OR `valid_to` >= '$date' ) AND (total_count > used_count)";
		
		$data = $this->db->query($sql)->row();
		$result = ($data)?$data:array();
		echo json_encode($result);
		
	}
	Public function test_time()
	{
		echo date('H:i:s');
	}
}
