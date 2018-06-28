<?php defined('BASEPATH') OR exit('No direct script access allowed');
		class Front extends CI_Controller
		{
			public $sessid = "";
			public $module = "";

			public function __construct()
			{		
				parent::__construct();

				// Load linkedin config
				$this->load->config('linkedin');

				// Facebook Library 
				$this->load->library('facebook');
				 //load google login library
				$this->load->library('google');

				$this->load->helper('url');
				$this->load->helper('file');
				//$this->load->library('session');
				$this->load->model('Front_model', 'front_model');
				$this->load->database();
				$this->load->library('googlemaps');
				//$this->load->library('session');
		//		$this->session->unset_userdata('scubbi_sessid');
				
					/* $ip = $_SERVER['REMOTE_ADDR'];			
					$timZone = json_decode(file_get_contents("http://ip-api.com/json/$ip"));

					//echo $timZone->timezone;
					date_default_timezone_set($timZone->timezone); */
				
				if ($this->session->userdata('scubbi_sessid')) {
					$sessupd = array(
						'is_lastacty' => date("Y-m-d H:i:s"),		
					);
					$this->sessid = $this->session->userdata('scubbi_sessid');
					$this->db->where('is_uid',$this->session->userdata('scubbi_sessid'));
					if($this->db->update('lg_isessions',$sessupd))
					{
		//     		return "SUCCESS";
		//		}else{
		//			return "FAILED";
					}

				} 
				else 
				{
					$sessp1 = uniqid(rand(), TRUE);
					$this->sessid = md5($sessp1);
					$uip = '';

					if (isset($_SERVER['HTTP_CLIENT_IP']) && $_SERVER['HTTP_CLIENT_IP'] != '')
						$uip = $_SERVER['HTTP_CLIENT_IP'];

					else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']) && $_SERVER['HTTP_X_FORWARDED_FOR'] != '')
						$uip = $_SERVER['HTTP_X_FORWARDED_FOR'];
					else if(isset($_SERVER['HTTP_X_FORWARDED']) && $_SERVER['HTTP_X_FORWARDED'] != '')
						$uip = $_SERVER['HTTP_X_FORWARDED'];
					else if(isset($_SERVER['HTTP_FORWARDED_FOR']) && $_SERVER['HTTP_FORWARDED_FOR'] != '')
						$uip = $_SERVER['HTTP_FORWARDED_FOR'];
					else if(isset($_SERVER['HTTP_FORWARDED']) && $_SERVER['HTTP_FORWARDED'] != '')
						$uip = $_SERVER['HTTP_FORWARDED'];
					else if(isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] != '')
						$uip = $_SERVER['REMOTE_ADDR'];
					else
						$uip = 'UNKNOWN';

				//$uip = $_SERVER["REMOTE_ADDR"];
				//echo $uip;
				//$uip = "49.206.253.21";
					if($uip != 'UNKNOWN')
					{
						$details = json_decode(file_get_contents("https://ipinfo.io/$uip/json"));
				/* foreach($details as $ky => $det) {
					echo($ky . "->" . $det . " ");
				}*/
				$remote_addr="No Data";
				$is_browser="No Data";
				$is_iniuri="No Data";
				$is_country="No Data";
				$is_city="No Data";
				$is_region="No Data";
				$is_org="No Data";
				$is_loc="No Data";
				$is_postal="No Data";

				$details_country ="";
				if(isset($details->country)){
					$details_country = $details->country; 
				}
				$details_city ="";
				if(isset($details->city)){
					$details_city = $details->city; 
				}
				$details_region ="";
				if(isset($details->region)){
					$details_region = $details->region; 
				}
				$details_org ="";
				if(isset($details->org)){
					$details_org = $details->org; 
				}
				$details_loc ="";
				if(isset($details->loc)){
					$details_loc = $details->loc; 
				}
				$details_postal ="";
				if(isset($details->postal)){
					$details_postal = $details->postal; 
				}

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
				if($details_country != 'NULL')
				{
					$is_country = $details_country;
				}
				if($details_city != 'NULL')
				{
					$is_city = $details_city;
				}
				if($details_region != 'NULL')
				{
					$is_region = $details_region;
				}
				if($details_org != 'NULL')
				{
					$is_org = $details_org;
				}
				if($details_loc != 'NULL')
				{
					$is_loc = $details_loc;
				}
				if($details_postal != 'NULL')
				{
					$is_postal = $details_postal;
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


		}

		 //Redirect url for fb

		Public function check_lnk_in()
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
				$email = $userInfo->emailAddress;



				$where = array('email' => $email,'status'=>'OPEN');
				$check_data = $this->db->get_where('user',$where)->row();	
				
				$data = array(
					'source'=> 'linkedin',			
					'first_name' 	=> $first_name,
					'last_name' 	=> $last_name,
					'email' 		=> $email,                    
					'logged_in'=>'TRUE',
					'user_type' => 'Customer',
					'profile_pic' 	=> $userInfo->pictureUrl
				);  




				if(isset($check_data)!=''){           		
					$this->db->update('user',$data,$where);
					$datas = array(
						'firstname' 	=> $first_name,
						'email' 		=> $email,
						'profile_pic' 	=> $userInfo->pictureUrl
					);
					$user_id = $check_data->user_id;
					$where = array('user_id'=>$user_id);
					$this->db->update('tbl_customerprofile',$datas,$where);


				}else{           		
					$this->db->insert('user',$data);
					$user_id = $this->db->insert_id();
					$datas = array(
						'firstname' 	=> $first_name,
						'email' 		=> $email,
						'profile_pic' 	=> $userInfo->pictureUrl,
						'user_id' =>$user_id
					);
					$this->db->insert('tbl_customerprofile',$datas);

				}
				$this->session->set_userdata(array('user_id'=>$user_id));
				$password  = '';
				$this->load->model('Customermodel');
				$this->Customermodel->login($email,$password);
				redirect(base_url());

			}else{
				
				redirect(base_url());
			}




		}


		Public function check_fb()
		{
			$userData = array();

				// Check if user is logged in
			if($this->facebook->is_authenticated()){
					// Get user facebook profile details
				$userProfile = $this->facebook->request('get', '/me?fields=id,first_name,last_name,email,gender,locale,picture');

				echo '<pre>';
				print_r($userProfile);
				exit;
					// Preparing data for database insertion
					// $userData['oauth_provider'] = 'facebook';
					// $userData['oauth_uid'] = $userProfile['id'];
					// $userData['first_name'] = $userProfile['first_name'];
					// $userData['last_name'] = $userProfile['last_name'];
					// $userData['email'] = $userProfile['email'];
					// $userData['gender'] = $userProfile['gender'];
					// $userData['locale'] = $userProfile['locale'];
					// $userData['profile_url'] = 'https://www.facebook.com/'.$userProfile['id'];
					// $userData['picture_url'] = $userProfile['picture']['data']['url'];


			}

				// Load login & profile view

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
				"lv_dcid" => (is_null($dcid) ? "0":$dcid),
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

		public function index()
		{	

			//Include the linkedin api php libraries
			include_once APPPATH."libraries/linkedin-oauth-client/http.php";
			include_once APPPATH."libraries/linkedin-oauth-client/oauth_client.php";




				// Get login URL
			$data['authUrl'] =  $this->facebook->login_url();
			$data['google_login_url'] = $this->google->get_login_url();
			$data['linked_url'] = base_url().$this->config->item('linkedin_redirect_url').'?oauth_init=1';


			$scountry = $this->input->post('scountry');
			$travel_period = $this->input->post('travel_period');
			$tp = date("Y-m", strtotime($travel_period));
			$this->module = "Front/index";
			$this->putvlog($this->session->userdata('user_type'),0,0,0,$scountry,0);

				//$data['total_rows'] = $this->db->count_all('special_offer');
			$data['specialoffer'] = $this->front_model->get_specialoffer();	
			$data['populardivedestination'] = $this->front_model->get_populardivedestination();
			$data['guidedtour'] = $this->front_model->get_guidedtour($scountry, $tp);
			$data['slider'] = $this->front_model->get_slider();
				//var_dump($data['guidedtour']);
			$this->load->view('front/header',$data);
			$this->load->view('front/slider');
			$this->load->view('front/index');
			$this->load->view('front/loginModel');
			$this->load->view('front/footer');	 
				//$this->load->view('front/loginModel');			

		}


		Public function check_gmail()
		{
			$google_data=$this->google->validate();
			$where = array('email' => $google_data['email'],'status'=>'OPEN');
			$check_data = $this->db->get_where('user',$where)->row();	
			$data = array(
				'first_name'=>$google_data['name'],
				'email'=>$google_data['email'],
				'user_type' => 'Customer',
				'source'=>'google',
				'logged_in'=>'TRUE',
				'profile_pic'=>$google_data['profile_pic']

			);

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


			}else{           		
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
			$email = $google_data['email'];
			$password  = '';
			$this->load->model('Customermodel');
			$this->Customermodel->login($email,$password);
			redirect(base_url());
		}

		public function splOffer(){

			$data['specialoffer'] = $this->front_model->get_splOffer();
			$data['populardivedestination'] = $this->front_model->get_populardivedestination();
			$data['slider'] = $this->front_model->get_slider();
			$this->module = "Front/splOffer";
			$this->putvlog($this->session->userdata('user_type'),0,0,0,0,0);

			$this->load->view('front/header');
			$this->load->view('front/slider', $data);
			$this->load->view('front/sploffer', $data);
			$this->load->view('front/loginModel');
			$this->load->view('front/footer');
		}

		function get_Allspecialoffer()
		{
			$config['base_url'] = base_url('Front/get_Allspecialoffer');
			$config['total_rows'] = $this->db->count_all('special_offer');
			$config['per_page'] = "12";
			$config["uri_segment"] = 3;
			$choice = $config["total_rows"] / $config["per_page"];
			$config["num_links"] = floor($choice);
				//config for bootstrap pagination class integration
			$config['full_tag_open'] = '<ul class="pagination">';
			$config['full_tag_close'] = '</ul>';
			$config['first_link'] = false;
			$config['last_link'] = false;
			$config['first_tag_open'] = '<li>';
			$config['first_tag_close'] = '</li>';
			$config['prev_link'] = '&laquo';
			$config['prev_tag_open'] = '<li class="prev">';
			$config['prev_tag_close'] = '</li>';
			$config['next_link'] = '&raquo';
			$config['next_tag_open'] = '<li>';
			$config['next_tag_close'] = '</li>';
			$config['last_tag_open'] = '<li>';
			$config['last_tag_close'] = '</li>';
			$config['cur_tag_open'] = '<li class="active"><a href="#">';
			$config['cur_tag_close'] = '</a></li>';
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';
			$this->pagination->initialize($config);
			$data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			$data["links"] = $this->pagination->create_links();
			$data['offerpagination'] = $this->front_model->get_specialoffer_all($config["per_page"], $data['page']);
			$this->module = "Front/getAllSpecialOffer";
			$this->putvlog($this->session->userdata('user_type'),0,0,0,0,0);

			$this->load->view('front/header');
			$this->load->view('front/viewmoreOffer', $data);
			$this->load->view('front/loginModel');
			$this->load->view('front/footer');
		}

		public function popularDestination()
		{	
			$data['specialoffer'] = $this->front_model->get_specialoffer();
			$data['populardivedestination'] = $this->front_model->get_ppldestination();
			$data['slider'] = $this->front_model->get_slider();
			$this->module = "Front/PDD";
			$this->putvlog($this->session->userdata('user_type'),0,0,0,0,0);

			$this->load->view('front/header');
			$this->load->view('front/slider', $data);
			$this->load->view('front/popularDestination', $data);
			$this->load->view('front/loginModel');
			$this->load->view('front/footer');	   
		}

		function get_AllPDD()
		{
			$config['base_url'] = base_url('Front/get_AllPDD');
			$config['total_rows'] = $this->db->count_all('daily_plan');
			$config['per_page'] = "12";
			$config["uri_segment"] = 3;
			$choice = $config["total_rows"] / $config["per_page"];
			$config["num_links"] = floor($choice);
				//config for bootstrap pagination class integration
			$config['full_tag_open'] = '<ul class="pagination">';
			$config['full_tag_close'] = '</ul>';
			$config['first_link'] = false;
			$config['last_link'] = false;
			$config['first_tag_open'] = '<li>';
			$config['first_tag_close'] = '</li>';
			$config['prev_link'] = '&laquo';
			$config['prev_tag_open'] = '<li class="prev">';
			$config['prev_tag_close'] = '</li>';
			$config['next_link'] = '&raquo';
			$config['next_tag_open'] = '<li>';
			$config['next_tag_close'] = '</li>';
			$config['last_tag_open'] = '<li>';
			$config['last_tag_close'] = '</li>';
			$config['cur_tag_open'] = '<li class="active"><a href="#">';
			$config['cur_tag_close'] = '</a></li>';
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';
			$this->pagination->initialize($config);
			$data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			$data["links"] = $this->pagination->create_links();
			$data['populardivedestination'] = $this->front_model->get_popularpagination($config["per_page"], $data['page']);
			$this->module = "Front/getAllPDD";
			$this->putvlog($this->session->userdata('user_type'),0,0,0,0,0);
			$this->load->view('front/header');
			$this->load->view('front/viewmorePopular', $data);
			$this->load->view('front/loginModel');
			$this->load->view('front/footer');	   
		}

		function get_island($country)
		{
			$this->load->model('front_model');
			$this->module = "Front/getIsland";
			$this->putvlog($this->session->userdata('user_type'),0,0,0,$country,0);

			header('Content-Type: application/x-json; charset=utf-8');
			echo(json_encode($this->front_model->get_island($country)));
		}

		function search()
		{	
				//if($this->input->post('search_result'))
				//{
			$country = $this->input->post('scountry');
			$islands = $this->input->post('islands');
			$this->module = "Front/search";
			$this->putvlog($this->session->userdata('user_type'),0,0,0,$country,$islands);

			$config['base_url'] = base_url('index.php/Front/search');
			$query = $this->db->where('dccountry', $country)->where('dcislands', $islands)->get('tbl_dcprofile');
			$config['total_rows'] = $query->num_rows();

				//$config['total_rows'] = $this->db->count_all('tbl_dcprofile');
			$config['per_page'] = "10";
			$config["uri_segment"] = 3;
			   // $choice = $config["total_rows"] / $config["per_page"];
				//$config["num_links"] = floor($choice);
			$config["num_links"] =  $config['total_rows'];
				//config for bootstrap pagination class integration
			$config['use_page_numbers']  = TRUE;
			$config['full_tag_open'] = '<ul class="pagination">';
			$config['full_tag_close'] = '</ul>';
			$config['first_link'] = false;
			$config['last_link'] = false;
			$config['first_tag_open'] = '<li>';
			$config['first_tag_close'] = '</li>';
			$config['prev_link'] = '&laquo';
			$config['prev_tag_open'] = '<li class="page-item disabled">';
			$config['prev_tag_close'] = '</li>';
			$config['next_link'] = '&raquo';
			$config['next_tag_open'] = '<li>';
			$config['next_tag_close'] = '</li>';
			$config['last_tag_open'] = '<li>';
			$config['last_tag_close'] = '</li>';
			$config['cur_tag_open'] = '<li class="active"><a href="#">';
			$config['cur_tag_close'] = '</a></li>';
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';
			$this->pagination->initialize($config);

			$data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			$data["links"] = $this->pagination->create_links();
				//$cin = $this->input->post('checkin');
			$data['Sdate']= $this->input->post('checkin');
				//$cout = $this->input->post('checkout');
			$data['Edate']= $this->input->post('checkout');

			$data['country']= $this->input->post('scountry');	
			$data['islands']= $this->input->post('islands');	
			$data['Noofpersons']= $this->input->post('no_of_persons');	
				//}
			$data['per_page'] = $config['per_page'];
			$data['search'] = $this->front_model->get_searchdetails($config["per_page"], $data['page']);

			$data['num_rows'] = count($data['search']);
			if($data['search'] == 'fail')
			{
				$data['num_rows'] = 0;
						//  redirect('front/error_page');
				$this->load->view('front/search',$data);
				$this->load->view('front/loginModel');
			}
			else
			{
				$this->load->view('front/search', $data);
				$this->load->view('front/loginModel');
			}


		}

		function error_page()
		{
			$this->module = "Front/error";
			$this->putvlog($this->session->userdata('user_type'),0,0,0,0,0);
			$this->load->view('front/error_page');
			$this->load->view('front/loginModel');
			$this->load->view('front/footer');
		}
		function filter_language()
		{
			if($this->input->post('brandss')){
					//$brandis=array();
					//parse_str($this->input->post('brandss'),$brandis); //changing string into array 
					//split 1st array elements
					//foreach($brandis as $ids)
					//{
					//$ids;
					//}
					//$brandii=implode("','",$ids);
				$brandii=$this->input->post('brandss');
				$fll = $this->front_model->filter_language($brandii);
					//foreach($fll as $farrayval)
					//{
						//echo $farrayval['dcname'];
					//}
			}
			$this->module = "Front/filterlanguage";
			$this->putvlog($this->session->userdata('user_type'),0,0,0,0,0);
		}
		function divecenter($id,$sDate,$eDate,$no_of_persons)
		{

			/* if($this->session->userdata('dccurreny'))
			{
				$this->clear();
				$this->session->unset_userdata('dccurreny');
			}
		 */

				if ($this->session->userdata('noofperson')) {
					if ($this->session->userdata('noofperson') != $no_of_persons) {
						$sessid = $this->session->userdata('scubbi_sessid');
						$this->front_model->clearcart($sessid);

						$this->session->set_userdata('noofperson',$no_of_persons);
					}
				} else {
					$this->session->set_userdata('noofperson',$no_of_persons);
				}
				//$datatable = array('leisure'=>'tbl_dcleisure', 'courses'=>'tbl_dccourses', 'packages'=>'tbl_dcpackage');
				$data['divecenterpage'] = $this->front_model->get_allDetails($id);
				//$newDate = date('d-m-Y', strtotime($sDate));
				$data['sDate1'] = $sDate;
				$data['eDate1'] = $eDate;
				$data['no_of_persons'] = $no_of_persons;
				$data['d_id'] = $id;
				//$data['dc_cur'] = $dccurrency;
				//$this->load->view('front/dive_center', $data);
				//$this->load->view('front/footer');
				$this->module = "Front/divecenter";
				$this->putvlog($this->session->userdata('user_type'),0,$id,0,0,0);
				if($data['divecenterpage'] == 'fail')
				{
					redirect('front/error_page');
						//$this->load->view('front/error_page');
				}
				else
				{
					$this->load->view('front/dive_center', $data);
					$this->load->view('front/loginModel');
				}
			}
		function pre_divecenter($id,$sDate,$eDate,$no_of_persons)
		{
			$this->session->unset_userdata('dccurreny');
			$this->clear();
			//$this->divecenter($id,$sDate,$eDate,$no_of_persons);
			$year = date('Y');
			$month = date('m');
			$data = "";
			$dbdata = $this->db->get_where('tbl_dive_click', array('dive_id'=>$id))->row();
			$dbdata_num = $this->db->get_where('tbl_dive_click', array('dive_id'=>$id))->num_rows();
			
			if($dbdata_num > 0)
			{
				//data alraedy find.
				
					if($month == 01)
					{
						$data = array(
						'updated_date'=> date('Y-m-d H:i:s'),
						'month1'=>$dbdata->month1+1
						);
					}
					
					elseif($month == 02)
					{
						$data = array(
						'updated_date'=> date('Y-m-d H:i:s'),
						'month2'=>$dbdata->month2+1
						);
					}
					elseif($month == 03)
					{
						$data = array(
						'updated_date'=> date('Y-m-d H:i:s'),
						'month3'=>$dbdata->month3+1
						);
					}
					elseif($month == 04)
					{
						$data = array(
						'updated_date'=> date('Y-m-d H:i:s'),
						'month4'=>$dbdata->month4+1
						);
					}
					elseif($month == 05)
					{
						$data = array(
						'updated_date'=> date('Y-m-d H:i:s'),
						'month5'=>$dbdata->month5+1
						);
					}
					elseif($month == 06)
					{
						$data = array(
						'updated_date'=> date('Y-m-d H:i:s'),
						'month6'=>$dbdata->month6+1
						);
					}
					elseif($month == 07)
					{
						$vv = $dbdata->month7+1;
						$data = array(
						'updated_date'=> date('Y-m-d H:i:s'),
						'month7'=>$vv
						);
					}
					elseif($month == 08)
					{
						$data = array(
						'updated_date'=> date('Y-m-d H:i:s'),
						'month8'=>$dbdata->month8+1
						);
					}
					elseif($month == 09)
					{
						$data = array(
						'updated_date'=> date('Y-m-d H:i:s'),
						'month9'=>$dbdata->month9+1
						);
					}
					elseif($month == 10)
					{
						$data = array(
						'updated_date'=> date('Y-m-d H:i:s'),
						'month10'=>$dbdata->month10+1
						);
					}
					elseif($month == 11)
					{
						$data = array(
						'updated_date'=> date('Y-m-d H:i:s'),
						'month11'=>$dbdata->month11+1
						);
					}
					elseif($month == 12)
					{
						$data = array(
						'updated_date'=> date('Y-m-d H:i:s'),
						'month12'=>$dbdata->month12+1
						);
					}
					$this->db->where('dive_id', $id);
					$this->db->update('tbl_dive_click', $data);
					redirect('front/divecenter/'.$id.'/'.strtotime($sDate).'/'.strtotime($eDate).'/'.$no_of_persons);
			}
			else
			{
				if($month == 01)
				{
					$data1 = array(
					'dive_id'=>$id,
					'created_date'=> date('Y-m-d H:i:s'),
					'year'=> $year,
					'month1'=>1
					);
				}
				elseif($month == 02)
				{
					$data1 = array(
					'dive_id'=>$id,
					'created_date'=> date('Y-m-d H:i:s'),
					'year'=> $year,
					'month2'=>1
					);
				}
				elseif($month == 03)
				{
					$data1 = array(
					'dive_id'=>$id,
					'created_date'=> date('Y-m-d H:i:s'),
					'year'=> $year,
					'month3'=>1
					);
				}
				elseif($month == 04)
				{
					$data1 = array(
					'dive_id'=>$id,
					'created_date'=> date('Y-m-d H:i:s'),
					'year'=> $year,
					'month4'=>1
					);
				}
				elseif($month == 05)
				{
					$data1 = array(
					'dive_id'=>$id,
					'created_date'=> date('Y-m-d H:i:s'),
					'year'=> $year,
					'month5'=>1
					);
				}
				elseif($month == 06)
				{
					$data1 = array(
					'dive_id'=>$id,
					'created_date'=> date('Y-m-d H:i:s'),
					'year'=> $year,
					'month6'=>1
					);
				}
				elseif($month == 07)
				{
					$data1 = array(
					'dive_id'=>$id,
					'created_date'=> date('Y-m-d H:i:s'),
					'year'=> $year,
					'month7'=>1
					);
				}
				elseif($month == 08)
				{
					$data1 = array(
					'dive_id'=>$id,
					'created_date'=> date('Y-m-d H:i:s'),
					'year'=> $year,
					'month8'=>1
					);
				}
				elseif($month == 09)
				{
					$data1 = array(
					'dive_id'=>$id,
					'created_date'=> date('Y-m-d H:i:s'),
					'year'=> $year,
					'month9'=>1
					);
				}
				elseif($month == 10)
				{
					$data1 = array(
					'dive_id'=>$id,
					'created_date'=> date('Y-m-d H:i:s'),
					'year'=> $year,
					'month10'=>1
					);
				}
				elseif($month == 11)
				{
					$data1 = array(
					'dive_id'=>$id,
					'created_date'=> date('Y-m-d H:i:s'),
					'year'=> $year,
					'month11'=>1
					);
				}
				elseif($month == 12)
				{
					$data1 = array(
					'dive_id'=>$id,
					'created_date'=> date('Y-m-d H:i:s'),
					'year'=> $year,
					'month12'=>1
					);
				}
				$this->db->insert('tbl_dive_click', $data1);
				redirect('front/divecenter/'.$id.'/'.strtotime($sDate).'/'.strtotime($eDate).'/'.$no_of_persons);
				
			}
			
		}
		function divecenter_search()
		{
			if($this->input->post('dive_search'))
			{
				$no_of_persons = $this->input->post('no_of_persons');

				if ($this->session->userdata('noofperson')) {
					if ($this->session->userdata('noofperson') != $no_of_persons) {
						$sessid = $this->session->userdata('scubbi_sessid');
						$this->front_model->clearcart($sessid);

						$this->session->set_userdata('noofperson',$no_of_persons);
					}
				} else {
					$this->session->set_userdata('noofperson',$no_of_persons);
				}		

				$var1 = $this->input->post('checkin');
				$startdate = str_replace('/', '-', $var1);
				$sDate = date('d-m-Y', strtotime($startdate));

				$var2 = $this->input->post('checkout');
				$enddate = str_replace('/', '-', $var2);
				$eDate = date('d-m-Y', strtotime($enddate));

			//$sDate = $this->input->post('checkin');
			//$eDate = $this->input->post('checkout');
				$id = $this->input->post('diveid');
				$this->module = "Front/divecentersearch";
				$this->putvlog($this->session->userdata('user_type'),0,$id,0,0,0);
				return $this->divecenter($id,strtotime($sDate),strtotime($eDate),$no_of_persons);
			}
		}
		function divecurrency()
		{ 
			
				$this->clear();
				$this->session->unset_userdata('dccurreny');
			
			
			$dccurr = $_POST['dccurr'];
			$this->session->set_userdata('dccurreny',$dccurr);
			$dcc = $this->session->userdata('dccurreny'); 
			echo $dccurr;
		
		}
		function tellmemore($id,$iid)
		{
			$data['tellmemore'] = $this->front_model->get_tellmemore($id);
			$data['iid'] = $id;
			$data['cid'] = $iid;
			//$this->load->view('front/tellmemore', $data);
			$this->module = "Front/TellMeMore";
			$this->putvlog($this->session->userdata('user_type'),0,0,0,$iid,$id);
			if($data['tellmemore'] == 'fail')
			{
				redirect('front/error_page');
					//$this->load->view('front/error_page');
			}
			else
			{
				$this->load->view('front/tellmemore', $data);
				$this->load->view('front/loginModel');
			}
		}
		function help()
		{
			$data['help'] = $this->front_model->get_help();
			$this->module = "Front/Hemp";
			$this->putvlog($this->session->userdata('user_type'),0,0,0,0,0);
			$this->load->view('front/header');
			$this->load->view('front/help', $data);
			$this->load->view('front/loginModel');
			$this->load->view('front/footer');
		}
		function clear()
		{
			$sessid = $this->session->userdata('scubbi_sessid');
		// echo $sessid;
			$this->front_model->clearcart($sessid);
			

		/*
			$this->db->where('sessionid', $sessid);
			 if($this->db->delete('tbl_dummy_cart'))
			{
				$this->db->where('sessionid', $sessid);
				if($this->db->delete('tbl_dummy_cart_product'))
				{
					$this->db->where('sessionid', $sessid);
					if($this->db->delete('tbl_dummy_cart_product_optional'))
					{
						echo "cart is empty";
					}
				}
			} 
		*/
		/* if($this->db->truncate('tbl_dummy_cart'))
		{
			if($this->db->truncate('tbl_dummy_cart_product'))
			{
				if($this->db->truncate('tbl_dummy_cart_product_optional'))
				{
					echo "Cart is Empty";
				}
			}
		} */
		//$data1  ="Kindly click [Add to My Dive Cart] for each diver if you are booking for a group.";
		$this->module = "Front/clearCart";
		$this->putvlog($this->session->userdata('user_type'),0,0,0,0,0);
		//echo $this->view_cart();
	}
		function checkout()
		{
			$this->module = "Front/checkout";
			$this->putvlog($this->session->userdata('user_type'),0,0,0,0,0);
			$this->load->view('front/header');
			$this->load->view('front/checkout');
			$this->load->view('front/loginModel');
			$this->load->view('front/footer');
		}
		function insertReview()
		{
			$this->module = "Front/insertReview";
			$this->putvlog($this->session->userdata('user_type'),0,0,0,0,0);
			if($this->input->post('content'))
			{
				$review_date = date("Y-m-d H:i:s");
				$data = array(
					'description'=>$this->input->post('content'),
					'divecenter_id'=>$this->input->post('diveid'),
					'customer_id'=>$this->input->post('uuuid'),
					'date'=>$review_date
				);
				$this->front_model->insertReview($data);
			}


				//if($ir == 'true')
				//{
					//echo json_encode(array('status'=>TRUE));
				//}
		}
		function get_dccur()
		{
			$id = $_POST['dccurr'];
			$val_ret = $this->db->get_where('tbl_multicurrency', array('from_cur'=>$id))->row();
			//var_dump($val_ret);
			echo $val_ret->buyer_amt;
			//$data1
			
		}
		function fetchProductDetails()
		{

			$this->module = "Front/fetchProductDetail/" . $_POST["table"] . "/" . $_POST["product_id"];
			$this->putvlog($this->session->userdata('user_type'),0,$_POST["dive_id"],0,0,0);
			$insert = array(
				"id"  => $_POST["product_id"],
				"dive_id"  => $_POST["dive_id"],
				"table"  => $_POST["table"],
				"availability"  => $_POST["availability"],
				"checkin"  => $_POST["checkin"],
				"checkout"  => $_POST["checkout"],
				"noofPerson"  => $_POST["noofPerson"]
			);
			$data = $this->front_model->fetchProductDetails($insert);
					//var_dump($insert);
			if($_POST["table"] == 'tbl_dcleisure')
			{
						//echo "dsjfdjfhdjfh";
				echo $this->leisureProduct($data,$insert);
			}
			elseif($_POST["table"] == 'tbl_dccourses')
			{
						//echo "dsjfdjfhdjfh";
				echo $this->courseProduct($data,$insert);
			}
			elseif($_POST["table"] == 'tbl_dcpackage')
			{
						//echo "dsjfdjfhdjfh";
				echo $this->packageOffer($data,$insert);
			}
		}
		function leisureProduct($data,$insert)
		{
			$this->module = "Front/leisureProduct";
			$this->putvlog($this->session->userdata('user_type'),0,0,0,0,0);

				//var_dump(data);
			foreach($data as $row)
			{
				
				$amount = 0;
				if($row->apply_promo == 'Yes')
				{
					$promoStartDate = $row->start_date;
					$promoEndDate = $row->end_date;
					$current_date = new DateTime();
					$cDate = $current_date->format("Y-m-d");
					if($cDate >= $promoStartDate && $cDate <= $promoEndDate)
					{
						if($row->apply_promo_bulk_discount == "Yes")
						{
							$Srange = explode(',',trim($row->range_start,','));
							$Drange = explode(',',trim($row->range_end,','));
							$promoRangeDiscount = explode(',',trim($row->apb_amount,','));
							$i = 0;
							foreach($Srange as $start_range)
							{
								if($insert['noofPerson'] >= $start_range && $insert['noofPerson'] <= $Drange[$i] )
								{
									$amount = $promoRangeDiscount[$i];
								}
								$i++;
							}
							if($amount > 0)
							{
								$newAmount = "";
								$selectProfile = $this->db->get_where('tbl_dcprofile', array('user_id'=>$row->user_id))->row();
								$profileCurrency = ucwords(strtoupper($selectProfile->dccurrency));
								// the Dive center Currency is Also MYR
								if($profileCurrency == 'MYR')
								{
									//check wherether the Session is Created
									if($this->session->userdata('dccurreny'))
									{
										$sessionCurrency = $this->session->userdata('dccurreny');
										//Check wherether the Session Currency is also MYR
										if($sessionCurrency == 'MYR')
										{
											$newAmount = $amount;
										}
										else
										{
											$curencyTableValue = $this->db->get_where('tbl_multicurrency',array('from_cur'=>$sessionCurrency, 'to_cur'=>'MYR'))->row();
											
											$newAmount = $amount / $curencyTableValue->seller_amt;
										}
										
									}
									else
									{
										$newAmount = $amount;
									}
								}
								// the Dive center Currency is Not MYR
								else
								{
									$myrValueFetch = $this->db->get_where('tbl_multicurrency',array('from_cur'=>$profileCurrency, 'to_cur'=>'MYR'))->row(); 
									
									$myrValue = $amount * $myrValueFetch->buyer_amt;
									// check wherether session is created or not
									if($this->session->userdata('dccurreny'))
									{
										$sessionCurrency = $this->session->userdata('dccurreny');
										//Check wherether the Session Currency is also MYR
										if($sessionCurrency == 'MYR')
										{
											$newAmount = $myrValue;
										}
										elseif($profileCurrency == $this->session->userdata('dccurreny'))
										{
											$newAmount = $amount;
										}
										else
										{
											$curencyTableValue = $this->db->get_where('tbl_multicurrency',array('from_cur'=>$sessionCurrency, 'to_cur'=>'MYR'))->row();
											
											$newAmount = $myrValue / $curencyTableValue->seller_amt;
										}
									}
									else
									{
										$newAmount = $myrValue;
									}
								}
								$accom = "No";
								$disprice = $newAmount;
							}
							else
							{
								$amount1 = $row->ap_discount_amount;
								$newAmount = "";
								$selectProfile = $this->db->get_where('tbl_dcprofile', array('user_id'=>$row->user_id))->row();
								$profileCurrency = ucwords(strtoupper($selectProfile->dccurrency));
								// the Dive center Currency is Also MYR
								if($profileCurrency == 'MYR')
								{
									//check wherether the Session is Created
									if($this->session->userdata('dccurreny'))
									{
										$sessionCurrency = $this->session->userdata('dccurreny');
										//Check wherether the Session Currency is also MYR
										if($sessionCurrency == 'MYR')
										{
											$newAmount = $amount1;
										}
										else
										{
											$curencyTableValue = $this->db->get_where('tbl_multicurrency',array('from_cur'=>$sessionCurrency, 'to_cur'=>'MYR'))->row();
											
											$newAmount = $amount1 / $curencyTableValue->seller_amt;
										}
									}
									else
									{
										$newAmount = $amount1;
									}
								}
								// the Dive center Currency is Not MYR
								else
								{
									$myrValueFetch = $this->db->get_where('tbl_multicurrency',array('from_cur'=>$profileCurrency, 'to_cur'=>'MYR'))->row(); 
									
									$myrValue = $amount1 * $myrValueFetch->buyer_amt;
									// check wherether session is created or not
									if($this->session->userdata('dccurreny'))
									{
										$sessionCurrency = $this->session->userdata('dccurreny');
										//Check wherether the Session Currency is also MYR
										if($sessionCurrency == 'MYR')
										{
											$newAmount = $myrValue;
										}
										elseif($profileCurrency == $this->session->userdata('dccurreny'))
										{
											$newAmount = $amount1;
										}
										else
										{
											$curencyTableValue = $this->db->get_where('tbl_multicurrency',array('from_cur'=>$sessionCurrency, 'to_cur'=>'MYR'))->row();
											
											$newAmount = $myrValue / $curencyTableValue->seller_amt;
										}
									}
									else
									{
										$newAmount = $myrValue;
									}
								}
								$accom = "No";
								$disprice = $newAmount;
							}
						}
						else
						{
							$amount1 = $row->ap_discount_amount;
							$newAmount = "";
							$selectProfile = $this->db->get_where('tbl_dcprofile', array('user_id'=>$row->user_id))->row();
								$profileCurrency = ucwords(strtoupper($selectProfile->dccurrency));
								// the Dive center Currency is Also MYR
								if($profileCurrency == 'MYR')
								{
									//check wherether the Session is Created
									if($this->session->userdata('dccurreny'))
									{
										$sessionCurrency = $this->session->userdata('dccurreny');
										//Check wherether the Session Currency is also MYR
										if($sessionCurrency == 'MYR')
										{
											$newAmount = $amount1;
										}
										else
										{
											$curencyTableValue = $this->db->get_where('tbl_multicurrency',array('from_cur'=>$sessionCurrency, 'to_cur'=>'MYR'))->row();
											
											$newAmount = $amount1 / $curencyTableValue->seller_amt;
										}
									}
									else
									{
										$newAmount = $amount1;
									}
								}
								// the Dive center Currency is Not MYR
								else
								{
									$myrValueFetch = $this->db->get_where('tbl_multicurrency',array('from_cur'=>$profileCurrency, 'to_cur'=>'MYR'))->row(); 
									
									$myrValue = $amount1 * $myrValueFetch->buyer_amt;
									// check wherether session is created or not
									if($this->session->userdata('dccurreny'))
									{
										$sessionCurrency = $this->session->userdata('dccurreny');
										//Check wherether the Session Currency is also MYR
										if($sessionCurrency == 'MYR')
										{
											$newAmount = $myrValue;
										}
										elseif($profileCurrency == $this->session->userdata('dccurreny'))
										{
											$newAmount = $amount1;
										}
										else
										{
											$curencyTableValue = $this->db->get_where('tbl_multicurrency',array('from_cur'=>$sessionCurrency, 'to_cur'=>'MYR'))->row();
											
											$newAmount = $myrValue / $curencyTableValue->seller_amt;
										}
									}
									else
									{
										$newAmount = $myrValue;
									}
								}
							$accom = "No";
							$disprice = $newAmount;
						}

					}
					else
					{
						if($row->discount_bulk_purchase == 'Yes')
						{
							$Srange = explode(',',trim($row->range_start,','));
							$Drange = explode(',',trim($row->range_end,','));
							$dBPAmount = explode(',',trim($row->discount_bulk_purchase_amount,','));
							
							$i = 0;
							foreach($Srange as $start_range)
							{
								if($insert['noofPerson'] >= $start_range && $insert['noofPerson'] <= $Drange[$i] )
								{
									$amount = $dBPAmount[$i];
								}
								$i++;
							}
							if($amount > 0)
							{
								$newAmount = "";
								$selectProfile = $this->db->get_where('tbl_dcprofile', array('user_id'=>$row->user_id))->row();
								$profileCurrency = ucwords(strtoupper($selectProfile->dccurrency));
								// the Dive center Currency is Also MYR
								if($profileCurrency == 'MYR')
								{
									//check wherether the Session is Created
									if($this->session->userdata('dccurreny'))
									{
										$sessionCurrency = $this->session->userdata('dccurreny');
										//Check wherether the Session Currency is also MYR
										if($sessionCurrency == 'MYR')
										{
											$newAmount = $amount;
										}
										else
										{
											$curencyTableValue = $this->db->get_where('tbl_multicurrency',array('from_cur'=>$sessionCurrency, 'to_cur'=>'MYR'))->row();
											
											$newAmount = $amount / $curencyTableValue->seller_amt;
										}
									}
									else
									{
										$newAmount = $amount;
									}
								}
								// the Dive center Currency is Not MYR
								else
								{
									$myrValueFetch = $this->db->get_where('tbl_multicurrency',array('from_cur'=>$profileCurrency, 'to_cur'=>'MYR'))->row(); 
									
									$myrValue = $amount * $myrValueFetch->buyer_amt;
									// check wherether session is created or not
									if($this->session->userdata('dccurreny'))
									{
										$sessionCurrency = $this->session->userdata('dccurreny');
										//Check wherether the Session Currency is also MYR
										if($sessionCurrency == 'MYR')
										{
											$newAmount = $myrValue;
										}
										elseif($profileCurrency == $this->session->userdata('dccurreny'))
										{
											$newAmount = $amount;
										}
										else
										{
											$curencyTableValue = $this->db->get_where('tbl_multicurrency',array('from_cur'=>$sessionCurrency, 'to_cur'=>'MYR'))->row();
											
											$newAmount = $myrValue / $curencyTableValue->seller_amt;
										}
									}
									else
									{
										$newAmount = $myrValue;
									}
								}											
								$accom = "No";
								$disprice = $newAmount;
							}
							else
							{
								$newAmount = "";
								$amount2 = $row->product_price;
								$selectProfile = $this->db->get_where('tbl_dcprofile', array('user_id'=>$row->user_id))->row();
								$profileCurrency = ucwords(strtoupper($selectProfile->dccurrency));
								// the Dive center Currency is Also MYR
								if($profileCurrency == 'MYR')
								{
									//check wherether the Session is Created
									if($this->session->userdata('dccurreny'))
									{
										$sessionCurrency = $this->session->userdata('dccurreny');
										//Check wherether the Session Currency is also MYR
										if($sessionCurrency == 'MYR')
										{
											$newAmount = $amount2;
										}
										else
										{
											$curencyTableValue = $this->db->get_where('tbl_multicurrency',array('from_cur'=>$sessionCurrency, 'to_cur'=>'MYR'))->row();
											
											$newAmount = $amount2 / $curencyTableValue->seller_amt;
										}
									}
									else
									{
										$newAmount = $amount2;
									}
								}
								// the Dive center Currency is Not MYR
								else
								{
									$myrValueFetch = $this->db->get_where('tbl_multicurrency',array('from_cur'=>$profileCurrency, 'to_cur'=>'MYR'))->row(); 
									
									$myrValue = $amount2 * $myrValueFetch->buyer_amt;
									// check wherether session is created or not
									if($this->session->userdata('dccurreny'))
									{
										$sessionCurrency = $this->session->userdata('dccurreny');
										//Check wherether the Session Currency is also MYR
										if($sessionCurrency == 'MYR')
										{
											$newAmount = $myrValue;
										}
										elseif($profileCurrency == $this->session->userdata('dccurreny'))
										{
											$newAmount = $amount2;
										}
										else
										{
											$curencyTableValue = $this->db->get_where('tbl_multicurrency',array('from_cur'=>$sessionCurrency, 'to_cur'=>'MYR'))->row();
											
											$newAmount = $myrValue / $curencyTableValue->seller_amt;
										}
									}
									else
									{
										$newAmount = $myrValue;
									}
								}
								$accom = "No";
								$disprice = $newAmount;
							}
						}
						else
						{
							$newAmount = "";
							$amount2 = $row->product_price;
							$selectProfile = $this->db->get_where('tbl_dcprofile', array('user_id'=>$row->user_id))->row();
								$profileCurrency = ucwords(strtoupper($selectProfile->dccurrency));
								// the Dive center Currency is Also MYR
								if($profileCurrency == 'MYR')
								{
									//check wherether the Session is Created
									if($this->session->userdata('dccurreny'))
									{
										$sessionCurrency = $this->session->userdata('dccurreny');
										//Check wherether the Session Currency is also MYR
										if($sessionCurrency == 'MYR')
										{
											$newAmount = $amount2;
										}
										else
										{
											$curencyTableValue = $this->db->get_where('tbl_multicurrency',array('from_cur'=>$sessionCurrency, 'to_cur'=>'MYR'))->row();
											
											$newAmount = $amount2 / $curencyTableValue->seller_amt;
										}
										
									}
									else
									{
										$newAmount = $amount2;
									}
								}
								// the Dive center Currency is Not MYR
								else
								{
									$myrValueFetch = $this->db->get_where('tbl_multicurrency',array('from_cur'=>$profileCurrency, 'to_cur'=>'MYR'))->row(); 
									
									$myrValue = $amount2 * $myrValueFetch->buyer_amt;
									// check wherether session is created or not
									if($this->session->userdata('dccurreny'))
									{
										$sessionCurrency = $this->session->userdata('dccurreny');
										//Check wherether the Session Currency is also MYR
										if($sessionCurrency == 'MYR')
										{
											$newAmount = $myrValue;
										}
										elseif($profileCurrency == $this->session->userdata('dccurreny'))
										{
											$newAmount = $amount2;
										}
										else
										{
											$curencyTableValue = $this->db->get_where('tbl_multicurrency',array('from_cur'=>$sessionCurrency, 'to_cur'=>'MYR'))->row();
											
											$newAmount = $myrValue / $curencyTableValue->seller_amt;
										}
									}
									else
									{
										$newAmount = $myrValue;
									}
								}
							$accom = "No";
							$disprice = $newAmount;
						}
					}
				}
				else if($row->discount_bulk_purchase == 'Yes')
				{
					$Srange = explode(',',trim($row->range_start,','));
					$Drange = explode(',',trim($row->range_end,','));
					$dBPAmount = explode(',',trim($row->discount_bulk_purchase_amount,','));
					
					$i = 0;
					foreach($Srange as $start_range)
					{
						if($insert['noofPerson'] >= $start_range && $insert['noofPerson'] <= $Drange[$i] )
						{
							$amount = $dBPAmount[$i];
						}
						$i++;
					}
					if($amount > 0)
					{
						$newAmount = "";
						$selectProfile = $this->db->get_where('tbl_dcprofile', array('user_id'=>$row->user_id))->row();
								$profileCurrency = ucwords(strtoupper($selectProfile->dccurrency));
								// the Dive center Currency is Also MYR
								if($profileCurrency == 'MYR')
								{
									//check wherether the Session is Created
									if($this->session->userdata('dccurreny'))
									{
										$sessionCurrency = $this->session->userdata('dccurreny');
										//Check wherether the Session Currency is also MYR
										if($sessionCurrency == 'MYR')
										{
											$newAmount = $amount;
										}
										else
										{
											$curencyTableValue = $this->db->get_where('tbl_multicurrency',array('from_cur'=>$sessionCurrency, 'to_cur'=>'MYR'))->row();
											
											$newAmount = $amount / $curencyTableValue->seller_amt;
										}
										
									}
									else
									{
										$newAmount = $amount;
									}
								}
								// the Dive center Currency is Not MYR
								else
								{
									$myrValueFetch = $this->db->get_where('tbl_multicurrency',array('from_cur'=>$profileCurrency, 'to_cur'=>'MYR'))->row(); 
									
									$myrValue = $amount * $myrValueFetch->buyer_amt;
									// check wherether session is created or not
									if($this->session->userdata('dccurreny'))
									{
										$sessionCurrency = $this->session->userdata('dccurreny');
										//Check wherether the Session Currency is also MYR
										if($sessionCurrency == 'MYR')
										{
											$newAmount = $myrValue;
										}
										elseif($profileCurrency == $this->session->userdata('dccurreny'))
										{
											$newAmount = $amount;
										}
										else
										{
											$curencyTableValue = $this->db->get_where('tbl_multicurrency',array('from_cur'=>$sessionCurrency, 'to_cur'=>'MYR'))->row();
											
											$newAmount = $myrValue / $curencyTableValue->seller_amt;
										}
									}
									else
									{
										$newAmount = $myrValue;
									}
								}															
						$accom = "No";
						$disprice = $newAmount;
					}
					else
					{
						$newAmount= "";
						$amount2 = $row->product_price;
						$selectProfile = $this->db->get_where('tbl_dcprofile', array('user_id'=>$row->user_id))->row();
								$profileCurrency = ucwords(strtoupper($selectProfile->dccurrency));
								// the Dive center Currency is Also MYR
								if($profileCurrency == 'MYR')
								{
									//check wherether the Session is Created
									if($this->session->userdata('dccurreny'))
									{
										$sessionCurrency = $this->session->userdata('dccurreny');
										//Check wherether the Session Currency is also MYR
										if($sessionCurrency == 'MYR')
										{
											$newAmount = $amount2;
										}
										else
										{
											$curencyTableValue = $this->db->get_where('tbl_multicurrency',array('from_cur'=>$sessionCurrency, 'to_cur'=>'MYR'))->row();
											
											$newAmount = $amount2 / $curencyTableValue->seller_amt;
										}
										
									}
									else
									{
										$newAmount = $amount2;
									}
								}
								// the Dive center Currency is Not MYR
								else
								{
									$myrValueFetch = $this->db->get_where('tbl_multicurrency',array('from_cur'=>$profileCurrency, 'to_cur'=>'MYR'))->row(); 
									
									$myrValue = $amount2 * $myrValueFetch->buyer_amt;
									// check wherether session is created or not
									if($this->session->userdata('dccurreny'))
									{
										$sessionCurrency = $this->session->userdata('dccurreny');
										//Check wherether the Session Currency is also MYR
										if($sessionCurrency == 'MYR')
										{
											$newAmount = $myrValue;
										}
										elseif($profileCurrency == $this->session->userdata('dccurreny'))
										{
											$newAmount = $amount2;
										}
										else
										{
											$curencyTableValue = $this->db->get_where('tbl_multicurrency',array('from_cur'=>$sessionCurrency, 'to_cur'=>'MYR'))->row();
											
											$newAmount = $myrValue / $curencyTableValue->seller_amt;
										}
									}
									else
									{
										$newAmount = $myrValue;
									}
								}
						$accom = "No";
						$disprice = $newAmount;
					}
				}
				else
				{
					$amount2 = $row->product_price;
					$newAmount = "";
									$selectProfile = $this->db->get_where('tbl_dcprofile', array('user_id'=>$row->user_id))->row();
								$profileCurrency = ucwords(strtoupper($selectProfile->dccurrency));
								// the Dive center Currency is Also MYR
								if($profileCurrency == 'MYR')
								{
									//check wherether the Session is Created
									if($this->session->userdata('dccurreny'))
									{
										$sessionCurrency = $this->session->userdata('dccurreny');
										//Check wherether the Session Currency is also MYR
										if($sessionCurrency == 'MYR')
										{
											$newAmount = $amount2;
										}
										else
										{
											$curencyTableValue = $this->db->get_where('tbl_multicurrency',array('from_cur'=>$sessionCurrency, 'to_cur'=>'MYR'))->row();
											
											$newAmount = $amount2 / $curencyTableValue->seller_amt;
										}
										
									}
									else
									{
										$newAmount = $amount2;
									}
								}
								// the Dive center Currency is Not MYR
								else
								{
									$myrValueFetch = $this->db->get_where('tbl_multicurrency',array('from_cur'=>$profileCurrency, 'to_cur'=>'MYR'))->row(); 
									
									$myrValue = $amount2 * $myrValueFetch->buyer_amt;
									// check wherether session is created or not
									if($this->session->userdata('dccurreny'))
									{
										$sessionCurrency = $this->session->userdata('dccurreny');
										//Check wherether the Session Currency is also MYR
										if($sessionCurrency == 'MYR')
										{
											$newAmount = $myrValue;
										}
										elseif($profileCurrency == $this->session->userdata('dccurreny'))
										{
											$newAmount = $amount2;
										}
										else
										{
											$curencyTableValue = $this->db->get_where('tbl_multicurrency',array('from_cur'=>$sessionCurrency, 'to_cur'=>'MYR'))->row();
											
											$newAmount = $myrValue / $curencyTableValue->seller_amt;
										}
									}
									else
									{
										$newAmount = $myrValue;
									}
								}
					$accom = "No";
					$disprice = $newAmount;
				}
				 $dateCheck = date('Y-m-d',strtotime($insert['checkin']));
				$status = "";
				$this->db->select('*');
				$this->db->where('table_name','tbl_dcleisure');
				$this->db->where('bookeddate',$dateCheck);
				$this->db->where('user_id',$row->user_id);
				$this->db->where('product_id',$row->id);
				$this->db->where('day_type','NA');
				$data = $this->db->get('tbl_booking_availability');
				$nu_count = $data->num_rows();
				If($nu_count > 0)
				{
					$status = 'UNAVAILABLE';
				}
				//echo $status;
					
				$output = '
				<form action="" method="post" class="cartForm">
				<div class="col-md-12" style="background-color:#ccc;padding-top:20px;padding-bottom:20px;border:1px solid #000;">
				<div class="row">
				<div class="col-md-3">
				<b style="font-size:20px;">'.$row->product_name.'</b>
				<input type="hidden" value="'.$disprice.'" name="price"/>
				<input type="hidden" value="'.$row->product_name.'" name="product_name"/>
				<input type="hidden" value="'.$insert['table'].'" name="table_name"/>
				<input type="hidden" value="'.$insert['id'].'" name="product_id"/>
				<input type="hidden" value="'.$insert['dive_id'].'" name="dive_id"/>
				<input type="hidden" value="'.$row->product_unit.'" name="product_unit"/>
				<input type="hidden" value="'.$insert['checkin'].'" name="checkin"/>
				<input type="hidden" value="'.$insert['checkout'].'" name="checkout"/>
				<input type="hidden" value="'.$insert['noofPerson'].'" name="no_of_persons"/>
				</div>
				<div class="col-md-4">
				<div class="col-md-6">
				<b>Select Person</b>
				<select name="diverid" class="form-control">
				';
				for ($p=1;$p<=$insert['noofPerson'];$p++){
					$output .= '				<option value="P'.$p.'">P'.$p.'</option>
					';
				}
				$output .= '
				</select>
				</div>
				<div class="col-md-6">';

				$checkin = $insert['checkin'];
				$checkout = $insert['checkout'];

					//---------------------Date Difference-----------------------------------------------------------------------
				$dbegin = new DateTime( $insert['checkin'] );
				$dend   = new DateTime( $insert['checkout'] );
				$idate = $dbegin;

		//									$date1 = strtotime($checkin);
		//									$date2 = strtotime($checkout);
		//									$datediff = $date2 - $date1;
		//									$days_between = floor($datediff / (60 * 60 * 24));

											//echo $days_between;		
				$checkin1 = $insert['checkin'];
				$checkin1 = strtotime($checkin1);
				$slt_value =0;
				$renderqty = 0;
				$daytype = "NM";
				$loglqdata = "";
			
		//									for($i=0;$i<=$days_between;$i++)
		//									{
				$cnt = 0;
				for($i = $dbegin; $i <= $dend; $i->modify('+1 day'))
				{
					$cnt++;
					$idate = $i->format("Y-m-d");
					$loglqdata .= "Processing " . $row->product_name . "\n". "Iterate: $cnt  " . $idate . " for " .$insert['noofPerson'] . " pax \n";
												// ----------------------No Limit----------------------------------
					if($row->product_max_day == 'No Limit')
					{
						if (intval($row->max_dive_day) >0 ){
														$slt_value = $slt_value + intval($row->max_dive_day); // * $insert['noofPerson'];
													} else {
														$slt_value = $slt_value + 1; // * $insert['noofPerson'];
													}
													$avail = $this->front_model->checkAvalability($idate,$insert['table'],$insert['dive_id'],$insert['id']);

													if (is_array($avail)) {
														$daytype =  $avail[0]['day_type'];
													} else {
														$daytype =  'NM';
													}
													$loglqdata .= "  - No max \n";
												}
												else
												{

													if($row->product_unit == 'Dive')
													{
												//---------------------------Dive --------------------------
		//												$checkin1 = strtotime("+1 day", $checkin1);
		//												$newCheckin = date('Y-m-d', $checkin1);
		//												$avalabile=$this->front_model->checkAvalability($newCheckin,$insert['table'],$insert['dive_id'],$insert['id']);


														$avail = $this->front_model->checkAvalability($idate,$insert['table'],$insert['dive_id'],$insert['id']);

														if (is_array($avail)) {
															$davail = $avail[0]["day_max"] - $avail[0]["booked_dives"];
															$daytype =  $avail[0]['day_type'];
															if ($daytype == 'NA') {
																$davail = 0;
															}
														} else {
															$davail = $row->product_max_day;
															$daytype =  'NM';
														}
														if (($davail - $row->max_dive_day) > 0) {
															$slt_value = $slt_value + intval($row->max_dive_day);
														} else {
															$slt_value = $slt_value + intval($davail);
														}

														//$loglqdata .= "  - $slt_value Dive \n";
														$loglqdata .= "  - $cnt - $idate Rendering Dives $slt_value qty >> check " . $row->max_dive_day . " avail $davail \n";

													}
													else
													{
														
														$avail = $this->front_model->checkAvalability($idate,$insert['table'],$insert['dive_id'],$insert['id']);

														if (is_array($avail)) {
															$davail = $avail[0]["day_max"] - $avail[0]["booked_dives"];
															$daytype =  $avail[0]['day_type'];
															if ($daytype == 'NA') {
																$davail = 0;
															}
														} else {
															$davail = $insert['noofPerson']; // $product_max_day;
															$daytype =  'NM';
														}
														if (($davail - $insert['noofPerson']) > 0) {
															$slt_value = intval($slt_value) + intval($insert['noofPerson']);
														} else {
															$slt_value = intval($slt_value) + intval($davail);
														}
		//												$slt_value = $slt_value + $davail;
														$loglqdata .= "  - $cnt - $idate Rendering Pax $slt_value qty >> check " . $insert['noofPerson'] . " avail $davail \n";

													}

												}
		/*
													$output=$output.'
														<option value="'.$slt_value.'">'.$slt_value.'</option>
														';	
		*/
														$renderqty = $slt_value;
														$loglqdata .= "  - Rendering $slt_value qty \n";

													}

													if($row->product_unit == 'Dive')
													{
														$output .= '							
														<b>Select Qty</b> <input type="hidden" name="daytype" value="' . $daytype . '"><br>
														<select name="no_of_dive_slt" class="form-control">';
														for($j=$renderqty;$j>=1;$j--)
														{
															$output=$output.'
															<option value="'.$j.'">'.$j.'</option>
															';	
														}
														$output .= '
														</select>';
													} else {
														$output .= '<input type="hidden" name="daytype" value="' . $daytype . '"><input type="hidden" name="no_of_dive_slt" value="1">';
		//												&nbsp;1 Pax';
													}
													$checkin = strtotime($checkin);
													$checkin = strtotime("+1 day", $checkin);

											//echo date('d-m-Y', $checkin);



													$output=$output.'								
													</div>
													</div>
													<div class="col-md-2">';
													$dive_user_id = $row->user_id;
													$currency = $this->db->get_where('tbl_dcprofile', array('user_id' => $dive_user_id))->result();
													$discurrency = "";
													$custom_room = "";
													foreach($currency as $rowcurrency)
													{
		//									$output= $output.$rowcurrency->dccurrency.'&nbsp;&nbsp;';
														$discurrency = $rowcurrency->dccurrency;
														$custom_room = $rowcurrency->custom_accom;
													}

													if ($accom == 'Yes') {
														$rmrate = $this->db->get_where('tbl_dcroomrates', array('dcid' => $dive_user_id, 'table'=>'tbl_dcleisure', 'prodid' => $row->id,'season'=>$daytype ))->result();
														foreach($rmrate as $irate) {
															$output .= '<input type="hidden" name="accom" value="Yes">
															<b>SG&nbsp;' . $discurrency . '&nbsp;&nbsp;' .$irate->single.'</b><br>
															TW&nbsp;' . $discurrency . '&nbsp;&nbsp;' .$irate->double.'</b><br>
															TR&nbsp;' . $discurrency . '&nbsp;&nbsp;' .$irate->triple.'</b><br>
															QD&nbsp;' . $discurrency . '&nbsp;&nbsp;' .$irate->quad.'</b><br>
															SP&nbsp;' . $discurrency . '&nbsp;&nbsp;' .$irate->udefine.'</b><br>';
														}

													} else {
														$output .= '<input type="hidden" name="accom" value="No">';
														//[' . $daytype . ']&nbsp;<b>' . $discurrency . '&nbsp;&nbsp;' .$disprice.'</b>';
													}		
													$output .= '
													</div>
													<div class="col-md-3">';
													if ($insert['availability'] == "AVAILABLE") {	
															if($status != 'UNAVAILABLE')
															{
																$output.= '
																	<button type="button" class="btn addCart" id="addCart" style="background-color:red;color:#fff;margin-top:20px;">Add to My Dive Cart</button>';
															}
													} else {
														$output.= $insert['availability'];
													}
													$output.= '
													</div>
													</div>
													<div class="col-md-12">&nbsp;</div>
													<div class="col-md-12">
													<div class="table-responsive">
													<table class="table">
														

														<tr>
															<td ><b>Included</b></td>
															<td >';
															if($row->product_include_display =="TRUE")
															{
																if($row->product_includes != '')
																{
																	$includes = explode('|',$row->product_includes);
																	foreach($includes as $row_includes)
																	{
																		$output=$output.$row_includes.'<br>';	
																	}
																}
																else
																{
																	$output=$output.'<p>No Includes is Available for this product</p>';
																}
															}
															else
															{
																$output=$output.'<p>No Includes is Available for this product</p>';
															}
											$output=$output.'</td></tr>';
											if($row->product_excludes != '')
											{				
											$output=$output.'<tr>
															<td><b>Excluded</b></td>
															<td>';
															if($row->product_exclude_display =="TRUE")
															{
															if($row->product_excludes != '')
																{
																	$includes = explode('|',$row->product_excludes);
																	foreach($includes as $row_includes)
																	{
																		$output=$output.$row_includes.'<br>';	
																	}
																}
																else
																{
																	$output=$output.'No Excludes is Available for this product ';
																}
															}
															else
															{
																$output=$output.'No Excludes is Available for this product';
															}
												$output=$output.'</td>
														</tr>';
											}
											else
											{
												
											}
											if($row->other_info_display == 'TRUE')
											{
												if($row->other_info !="")
												{
											$output=$output.'	
												<tr>
													<td>
														<b >Other Information</b>
													</td>
													<td>'.$row->other_info.'</td>
												</tr>';
												}
											}
											if($row->optional_services == 'YES')
											{
												$output=$output.'<tr>
													<td style="width:20%;"><b>Optional Servies : </b></td>
													<td colspan="3">';
														if($row->optional_services == 'YES')
														{
															$output=$output.'
															<table class="optionservice">';
															$optional_services1 = explode(',',$row->optional_services_service);
															$i=1;
															$option_service_name[]="";
															foreach($optional_services1 as $row_optional_services)
															{
													//$output=$output.$row_optional_services.'<br>';	
																$option_service_name[$i]=$row_optional_services;
																$i++;
															}

															$j=1;
															$optional_services_price1 = explode(',',$row->optional_services_price);

															foreach($optional_services_price1 as $row_optional_services_price)
															{
																$dive_user_id = $row->user_id;
																$currency = $this->db->get_where('tbl_dcprofile', array('user_id' => $dive_user_id))->result();

																$optional_services_required1 = explode(',',$row->optional_service_qty_required);
																$k=1;
																$option_service_qty_req[]="";
																foreach($optional_services_required1 as $row_optional_services_required)
																{
																	$option_service_qty_req[$k]=$row_optional_services_required;
																	$k++;
																}

																foreach($currency as $rowcurrency)
																{
																	$optional_services_price_con[$i]=$row_optional_services_price;

																	$newAmount = "";
																	$selectProfile = $this->db->get_where('tbl_dcprofile', array('user_id'=>$row->user_id))->row();
																	$profileCurrency = ucwords(strtoupper($selectProfile->dccurrency));
																	// the Dive center Currency is Also MYR
																	if($profileCurrency == 'MYR')
																	{
																		//check wherether the Session is Created
																		if($this->session->userdata('dccurreny'))
																		{
																			$sessionCurrency = $this->session->userdata('dccurreny');
																			//Check wherether the Session Currency is also MYR
																			if($sessionCurrency == 'MYR')
																			{
																				$newAmount = $optional_services_price_con[$i];
																			}
																			else
																			{
																				$curencyTableValue = $this->db->get_where('tbl_multicurrency',array('from_cur'=>$sessionCurrency, 'to_cur'=>'MYR'))->row();
																				
																				$newAmount = $optional_services_price_con[$i] / $curencyTableValue->seller_amt;
																			}
																			
																		}
																		else
																		{
																			$newAmount = $optional_services_price_con[$i];
																		}
																	}
																	// the Dive center Currency is Not MYR
																	else
																	{
																		$myrValueFetch = $this->db->get_where('tbl_multicurrency',array('from_cur'=>$profileCurrency, 'to_cur'=>'MYR'))->row(); 
																		
																		$myrValue = $optional_services_price_con[$i] * $myrValueFetch->buyer_amt;
																		// check wherether session is created or not
																		if($this->session->userdata('dccurreny'))
																		{
																			$sessionCurrency = $this->session->userdata('dccurreny');
																			//Check wherether the Session Currency is also MYR
																			if($sessionCurrency == 'MYR')
																			{
																				$newAmount = $myrValue;
																			}
																			elseif($profileCurrency == $this->session->userdata('dccurreny'))
																			{
																				$newAmount = $optional_services_price_con[$i];
																			}
																			else
																			{
																				$curencyTableValue = $this->db->get_where('tbl_multicurrency',array('from_cur'=>$sessionCurrency, 'to_cur'=>'MYR'))->row();
																				
																				$newAmount = $myrValue / $curencyTableValue->seller_amt;
																			}
																		}
																		else
																		{
																			$newAmount = $myrValue;
																		}
																	}
																	$row_optional_services_price1 = $newAmount ;
																	$optional_concat_name[$j] = $option_service_name[$j]."-".$newAmount;
																	
																	
															//$output= $output.$rowcurrency->dccurrency.'&nbsp;'.$row_optional_services_price.'&nbsp;<input type="checkbox" name="optional_service_chk[]" value="'.$optional_concat_name[$j].'"/><br>';
																	$output=$output.'<tr>
																	<td>'.$option_service_name[$j].'</td>
																	<td><b>';
																	
																	if($this->session->userdata('dccurreny')!=""){ $output=$output.$this->session->userdata('dccurreny');}else{ $output=$output."MYR";}
																	
																	$output=$output.'</b></td>
																	<td><b>'.(number_format($row_optional_services_price1,2)).'</b><input type="hidden" name="optprd[]" value="' . $j . '/' . $option_service_name[$j] . '/' . $row_optional_services_price1 . '"></td>
																	<td><input type="checkbox" name="optional_service_chk[]" class="optional_service" value="'.$optional_concat_name[$j].'"/></td>';
																	if($option_service_qty_req[$j] == "Y")
																	{
																//echo $option_service_qty_req[$j];
																		$output=$output.'
																		<td><input type="number" name="qty[]" style="width:50px;" min="1" value="1" onkeydown="return false"/></td>';
																	}
																	else
																	{
																		$output=$output.'<td><input type="hidden" name="qty[]" style="width:50px;" value="1"/></td>';
																	}
																	$output=$output.'</tr>';
																}
																$j++;
															}
															$output=$output.'
															</table>';

														}
														else
														{
															$output=$output.' No Optional Service is avalabile for this Product';
														}
													$output=$output.'
													</td>
												</tr>';
											}
											else
											{
												
											}
											if($row->displaydiverexperience =='TRUE')
											{
												if($row->diver_experience != '')
												{
												$output=$output.'<tr>
													<td><b >Diver Level : </b></td>
													<td >';
													if($row->diver_experience != '')
														{
															$diver_level = explode(',',$row->diver_experience);
															foreach($diver_level as $row_diver_level)
															{
																$output=$output.'&#10148; '.$row_diver_level.'<br>';	
															}
															
														}
														else
														{
															$output=$output.'Its not provided for this product';
														}	
													$output=$output.'</td>
												</tr>';
												}
												else
												{
													
												}
											}
											if($row->displaydivercertification =='TRUE')
											{
												if($row->diver_certification != '')
												{
													$output=$output.'<tr>
														<td><b >Diver Skill</b></td>
														<td>';
														if($row->diver_certification != '')
														{
															$diver_skill = explode(',',$row->diver_certification);
															foreach($diver_skill as $row_diver_skill)
															{
																$output=$output.'&#10148; '.$row_diver_skill.'<br>';	
															}
														}
														else
														{
															$output=$output.'Its not provided for this product';
														}
														$output=$output.'</td>
														</tr>';
												}
												else
												{
													
												}
											}
											if($row->displaydiverspecialties =='TRUE')
											{
												if($row->diver_specialties != '')
												{
													$output=$output.'<tr>
														<td><b >Diver Specialties</b></td>
														<td>';
														if($row->diver_specialties != '')
														{
															$diver_specialties1 = explode(',',$row->diver_specialties);
															foreach($diver_specialties1 as $row_diver_specialties)
															{
																$output=$output.'&#10148; '.$row_diver_specialties.'<br>';	
															}
														} 
														else
														{
															$output=$output.'Its not provided for this product';
														}
														$output=$output.'
														</td>
													</tr>';
												}
												else
												{
													
														}
											}
												
												if($row->booking_policy != 0)
												{
													$output .='
													<tr>
														<td style="width:20%;"><b>Booking Policy</b></td>
														<td colspan="3">';
														if($row->booking_policy != 0)
														{
															$loglqdata .= "Booking Policy\n";

															$output .= $this->renderBooking($row->booking_policy);
														}
														$output .='
														</td>
													</tr>
													';
												}
												else
												{
													$output .='
													<tr>
														<td><b style="margin: 7px;">Booking Policy</b></td>
														<td colspan="5"> 
														No Booking policy for this product
														</td>
													</tr>
													';
												}
												if($row->cancellation_policy != 0)
												{
													$output .='
													<tr>
														<td style="width:20%;"><b>Cancellation Policy</b></td>
														<td colspan="3">';
														if($row->cancellation_policy != 0)
														{
															$loglqdata .= "Cancellation Policy\n";

															$output .= $this->renderCancellation($row->cancellation_policy);
														}
														$output .='
														</td>
													</tr>
													';
												}
												else
												{
													$output .='
													<tr>
														<td><b style="margin: 7px;">Cancellation Policy</b></td>
														<td colspan="5">
														No Cancellation Policy Available for this Product
														</td>
													</tr>
													';
												}
													
														
														$output=$output.'
													</table>
													</div>
													</div>

											</div>
											</form>
											';
											if ( !write_file('application/controllers/logrenderLeisureqty.txt', $loglqdata)){
												echo 'Unable to write the file';
											}			

										}
										return $output;

									}	
		//*************************************************************************************************************************************************Course Product Start *************************************************************************************************************
		function courseProduct($data,$insert)
		{
			$disprice="";
			$this->module = "Front/courseProduct";
			$this->putvlog($this->session->userdata('user_type'),0,0,0,0,0);
	//var_dump(data);
			foreach($data as $row)
			{
				$data116 = $this->db->get_where('tbl_dcprofile', array('user_id'=>$row->user_id))->row();
				$dccur = $data116->dccurrency;
				$checkin = $insert['checkin'];
				$checkout = $insert['checkout'];
				
	//---------------------Date Difference-----------------------------------------------------------------------
				$dbegin = new DateTime( $insert['checkin'] );
				$dend   = new DateTime( $insert['checkout'] );
				$idate = $dbegin;
				

				$checkin1 = $insert['checkin'];
				$checkin1 = strtotime($checkin1);
				$slt_value =0;
				$renderqty = 0;
				$logcqdata = "";
				$daytype = "NM";
				

				$cnt = 0;
				for($i = $dbegin; $i <= $dend; $i->modify('+1 day'))
				{
					$cnt++;
					$idate = $i->format("Y-m-d");
					$logcqdata .= "Processing " . $row->product_name . "\n". "Iterate: $cnt  " . $idate . " for " .$insert['noofPerson'] . " pax \n";
					// ----------------------No Limit----------------------------------
					if($row->product_max_day == 'No Limit')
					{
						if (intval($row->max_dive_day) >0 ){
							$slt_value = $slt_value + intval($row->max_dive_day); // * $insert['noofPerson'];
						} else {
							$slt_value = $slt_value + 1; // * $insert['noofPerson'];
						}
					//	echo $insert['dive_id'];
						$avail = $this->front_model->checkAvalability($idate,$insert['table'],$insert['dive_id'],$insert['id']);
	//var_dump($avail);
						//var_dump($idate);
						if (is_array($avail)) {
							$daytype =  $avail[0]['day_type'];
						} else {
							$daytype =  'NM';
						}
	//echo $daytype;
						$logcqdata .= "  - No max, season $daytype \n";
					}
					else
					{

						if($row->product_unit == 'Dive')
						{
					//---------------------------Dive --------------------------
							$avail = $this->front_model->checkAvalability($idate,$insert['table'],$insert['dive_id'],$insert['id']);

							if (is_array($avail)) {
								$davail = $avail[0]["day_max"] - $avail[0]["booked_dives"];
								$daytype =  $avail[0]['day_type'];
							} else {
								$davail = $row->product_max_day;
								$daytype =  'NM';
							}
							if (($davail - $row->max_dive_day) > 0) {
								$slt_value = $slt_value + intval($row->max_dive_day);
							} else {
								$slt_value = $slt_value + intval($davail);
							}

							//$loglqdata .= "  - $slt_value Dive \n";
							$logcqdata .= "  - $cnt - $idate Rendering Dives $slt_value qty >> check " . $row->max_dive_day . " avail $davail \n";

							
						}
						else
						{

							$avail = $this->front_model->checkAvalability($idate,$insert['table'],$insert['dive_id'],$insert['id']);

							if (is_array($avail)) {
								$davail = $avail[0]["day_max"] - $avail[0]["booked_dives"];
								 $daytype =  $avail[0]['day_type'];
							} else {
								$davail = $insert['noofPerson']; // $product_max_day;
								$daytype =  'NM';
							}
							if (($davail - $insert['noofPerson']) > 0) {
								$slt_value = intval($slt_value) + intval($insert['noofPerson']);
							} else {
								$slt_value = intval($slt_value) + intval($davail);
							}
	//												$slt_value = $slt_value + $davail;
							$logcqdata .= "  - $cnt - $idate Rendering Pax $slt_value qty >> check " . $insert['noofPerson'] . " avail $davail \n";
							
						}

					}
				
					$renderqty = $slt_value;
					$logcqdata .= "  - Rendering $slt_value qty \n";
	/*											
						$output=$output.'
							<option value="'.$slt_value.'">'.$slt_value.'</option>
							';	
	*/
				}
	// check product price.
	//	echo $daytype;
	$amount =0;
				$disprice= 0;
				$accom = "";
			//$result1 = $this->courseRoomrates($data , $daytype , '1' ,$insert['noofPerson']);
			$result1 = $this->currencyConversation($data , $daytype , '1' ,$insert['noofPerson'],'courseRoomrates' ,0.00);
			
				$disprice= $result1['disprice'];
				$accom = $result1['accom'];
			

				$output = '
				<form action="" method="post" class="cartForm1">
				<div class="col-md-12" style="background-color:#ccc;padding-top:20px;border:1px solid #000;">
				<div class="row">
				<div class="col-md-3">
				<b style="font-size:20px;">'.$row->product_name.'</b>
				
				<input type="hidden" value="'.$disprice.'" name="price"/>
				<input type="hidden" value="'.$accom.'" name="accom"/>
				<input type="hidden" value="'.$row->product_name.'" name="product_name"/>
				<input type="hidden" value="'.$insert['table'].'" name="table_name"/>
				<input type="hidden" value="'.$insert['id'].'" name="product_id"/>
				<input type="hidden" value="'.$insert['dive_id'].'" name="dive_id"/>
				<input type="hidden" value="'.$row->product_unit.'" name="product_unit"/>
				<input type="hidden" value="'.$insert['checkin'].'" name="checkin"/>
				<input type="hidden" value="'.$insert['checkout'].'" name="checkout"/>
				<input type="hidden" value="'.$insert['noofPerson'].'" name="no_of_persons"/>
				</div>		
				<div class="col-md-3">
					<div class="col-md-12">
					<b>Select Person</b>
					<select name="diverid" class="form-control">
					';
					for ($p=1;$p<=$insert['noofPerson'];$p++){
						$output .= '				<option value="P'.$p.'">P'.$p.'</option>
						';
					}
					$output .= '
					</select>
					</div>
				<div class="col-md-12">';
						

						if($row->product_unit == 'Dive')
						{
							$output .= '							
							<b>Select Qty</b><input type="hidden" name="daytype" value="' . $daytype . '"><br>
							<select name="no_of_dive_slt" class="form-control">';
							for($j=$renderqty;$j>=1;$j--)
							{
								$output=$output.'
								<option value="'.$j.'">'.$j.'</option>
								';	
							}
							$output .= '
							</select>';
							$logcqdata .= "  - Writing dive uom, season $daytype \n";
						} else {
							$output .= '<input type="hidden" name="daytype" value="' . $daytype .'"><br><input type="hidden" name="no_of_dive_slt" value="1">';
	//												&nbsp;1 Pax';
							$logcqdata .= "  - Writing non dive uom, season $daytype \n";
						}
						$logcqdata .= "  - Writing season $daytype \n";
						$checkin = strtotime($checkin);
						$checkin = strtotime("+1 day", $checkin);

				//echo date('d-m-Y', $checkin);								

						$output=$output.'								
						</div>
						</div>
						<div class="col-md-3">';
							if ($accom == 'Yes') 
							{
								$output=$output.'
								<b>Select Room Type</b>
								<select name="accommodation_type" class="form-control">
									<option value="1">Single</option>
									<option value="2" ' . ($insert['noofPerson'] <2 ? 'disabled':'') .'>Twin Sharing</option>
									<option value="3" ' . ($insert['noofPerson'] <3 ? 'disabled':'') .'>Tripple Sharing</option>
									<option value="4" ' . ($insert['noofPerson'] <4 ? 'disabled':'') .'>Quad Sharing</option>
								
								
								</select>';
							}
							$output=$output.'
						</div>
						';
						/* $dive_user_id = $row->user_id;
						$currency = $this->db->get_where('tbl_dcprofile', array('user_id' => $dive_user_id))->result();
						$discurrency = "";
						$custom_room = "";
						foreach($currency as $rowcurrency)
						{
	//									$output= $output.$rowcurrency->dccurrency.'&nbsp;&nbsp;';
							$discurrency = $rowcurrency->dccurrency;
							$custom_room = $rowcurrency->custom_accom;
						}

						if ($accom == 'Yes') {
							$rmrate = $this->db->get_where('tbl_dcroomrates', array('dcid' => $dive_user_id, 'table'=>'tbl_dccourses', 'prodid' => $row->id,'season'=>$daytype ))->result();
							foreach($rmrate as $irate) {
								$output .= '<input type="hidden" name="accom" value="Yes">
								
								<b>SG&nbsp;' . $discurrency . '&nbsp;&nbsp;' .$irate->single.'</b><br>
								<b>TW&nbsp;' . $discurrency . '&nbsp;&nbsp;' .$irate->double.'</b><br>
								<b>TR&nbsp;' . $discurrency . '&nbsp;&nbsp;' .$irate->triple.'</b><br>
								<b>QD&nbsp;' . $discurrency . '&nbsp;&nbsp;' .$irate->quad.'</b><br>
								<b>SP&nbsp;' . $discurrency . '&nbsp;&nbsp;' .$irate->udefine.'</b><br>';
							}
							$logcqdata .= "  - Writing accom yes \n";

						} else {
							$output .= '<input type="hidden" name="accom" value="No">';
	//												[' . $daytype . ']&nbsp;<b>' . $discurrency . '&nbsp;&nbsp;' .$disprice.'</b>';
							$logcqdata .= "  - Writing accom no \n";
						}		

						$output=$output.' */								
						$output=$output.'
						<div class="col-md-3">';
							//if($disprice != '0.00')
							//{
								if ($insert['availability'] == "AVAILABLE") {							
									$output.= '
									<button type="button" class="btn addCart1" id="addCart" style="background-color:red;color:#fff;margin-top:20px;">Add to My Dive Cart</button>';
								} else {
									$output.= $insert['availability'];
								}
						//	}
						//	else
						//	{
						//		$output.= '<h4 style="color:#f50c05;font-weight:bold;">Not Available</h4>';
						//	}
						
						$output.= '
						</div>
						<div class="col-md-12">
						<div class="table-responsive"> 
						<table class="table">
							';
							$extension_amount = 0.00;
							$select_exten = $this->db->get_where('tbl_dccourses' , array('id'=>$row->id))->row();
							$arrayValExten = explode(',',$select_exten->accomodation_extension_single);
							if($daytype == 'WE')
							{
								$extension_amount = $arrayValExten[1];
							}
							else if($daytype == 'PK')
							{
								$extension_amount = $arrayValExten[2];
							}
							else if($daytype == 'SP')
							{
								$extension_amount = $arrayValExten[3];
							}
							else if($daytype == 'NA')
							{
								$extension_amount = 0.00;
							}
							else
							{
								$extension_amount = $arrayValExten[0];
							}
							$newExtenAmount = "";
							$selectProfile1 = $this->db->get_where('tbl_dcprofile', array('user_id'=>$row->user_id))->row();
							$profileCurrency1 = ucwords(strtoupper($selectProfile1->dccurrency));
							// the Dive center Currency is Also MYR
							if($profileCurrency1 == 'MYR')
							{
								//check wherether the Session is Created
								if($this->session->userdata('dccurreny'))
								{
									$sessionCurrency = $this->session->userdata('dccurreny');
									//Check wherether the Session Currency is also MYR
									if($sessionCurrency == 'MYR')
									{
										$newExtenAmount = $extension_amount;
									}
									
									else
									{
										$curencyTableValue = $this->db->get_where('tbl_multicurrency',array('from_cur'=>$sessionCurrency, 'to_cur'=>'MYR'))->row();
										
										$newExtenAmount = $extension_amount / $curencyTableValue->seller_amt;
									}
									
								}
								else
								{
									$newExtenAmount = $extension_amount;
								}
							}
							// the Dive center Currency is Not MYR
							else
							{
								$myrValueFetch = $this->db->get_where('tbl_multicurrency',array('from_cur'=>$profileCurrency1, 'to_cur'=>'MYR'))->row(); 
								
								$myrValue = $extension_amount * $myrValueFetch->buyer_amt;
								// check wherether session is created or not
								if($this->session->userdata('dccurreny'))
								{
									$sessionCurrency = $this->session->userdata('dccurreny');
									//Check wherether the Session Currency is also MYR
									if($sessionCurrency == 'MYR')
									{
										$newExtenAmount = $myrValue;
									}
									elseif($profileCurrency1 == $this->session->userdata('dccurreny'))
									{
										$newExtenAmount = $extension_amount;
									}
									else
									{
										$curencyTableValue = $this->db->get_where('tbl_multicurrency',array('from_cur'=>$sessionCurrency, 'to_cur'=>'MYR'))->row();
										
										$newExtenAmount = $myrValue / $curencyTableValue->seller_amt;
									}
								}
								else
								{
									$newExtenAmount = $myrValue;
								}
							}

							
							
							
							if($row->accomodation_extension == "Yes")
							{
								$output=$output.'<tr>
								<td ><b style="margin:7px;">Extension Night: </b></td>
								<td>
								<table><tr>
								<td>';if($this->session->userdata('dccurreny') != ""){ $output=$output.$this->session->userdata('dccurreny') ; }else{ $output=$output.'MYR'; } $output=$output.'&nbsp;&nbsp;&nbsp;'.number_format($newExtenAmount,2).'&nbsp;&nbsp;Per night</td>
								<td><input type="checkbox" name="acco_exten" class="" value="1"/></td>
								<td><input type="number" name="accomvalue" style="width:50px;" min="1" value="1" onkeydown="return false"></td>
								</tr></table>
								</td>
								
								</tr>';
								
							}
							if($row->product_includes != '')
							{
								$output=$output.'<tr>
									<td style="width:28%;"><b style="margin:7px;">Included</b></td>
									<td>';
								if($row->product_include_display =="TRUE")
								{
									if($row->product_includes != '')
									{
										$includes = explode('|',$row->product_includes);
										foreach($includes as $row_includes)
										{
											$output=$output.$row_includes.'<br>';	
										}
									}
									else
									{
										$output = $output.'No Includes is Available for this product';
									}
								}
								else
								{
									$output = $output.'No Includes is Available for this product';
								}
									$output=$output.'</td>
								</tr>';
							}
							else
							{
								$output=$output.'<tr>
									<td style="width:28%;"><b style="margin:7px;">Included</b></td>
									<td>';
								$output = $output.'No Includes is Available for this product</td>';
							}
							if($row->product_excludes != '')
							{
								$output=$output.'<tr>
									<td><b style="margin:7px;">Excluded</b></td>
									<td>';
								if($row->product_exclude_display =="TRUE")
								{
									if($row->product_excludes != '')
									{
										$excludes = explode('|',$row->product_excludes);
										foreach($excludes as $row_excludes)
										{
											$output=$output.$row_excludes.'<br>';	
										}
									}
									else
									{
										$output = $output.'No Excludes is Available for this product';
									}
								}
								else
								{
									$output = $output.'No Excludes is Available for this product';
								}
								$output=$output.'
									</td>
								</tr>';
							}
							else
							{
								
							}
							if($row->other_info_display == 'TRUE')
							{
								if($row->other_info !="")
								{
							$output=$output.'	
								<tr>
									<td>
										<b style="margin:7px;">Other Information</b>
									</td>
									<td>'.$row->other_info.'</td>
								</tr>';
								}
							}
							
							if($row->optional_services == "Yes")
							{
								$output=$output.'<tr>
									<td><b style="margin:7px;">Optional Service : </b></td>
									<td>';
										$output=$output.'<table class="optionservice">';
									$optional_services1 = explode(',',$row->optional_services_service);
									$i=1;
	//									var_dump( $optional_services1);
									$option_service_name[]="";
									foreach($optional_services1 as $row_optional_services)
									{
								//$output=$output.$row_optional_services.'aaaa<br>';	
										$option_service_name[$i]=$row_optional_services;
										$i++;
									}

									$optional_services_required1 = explode(',',$row->optional_service_qty_required);
									$k=1;
									$option_service_qty_req[]="";
									foreach($optional_services_required1 as $row_optional_services_required)
									{
										$option_service_qty_req[$k]=$row_optional_services_required;
										$k++;
									}

									$j=1;
									$optional_services_price1 = explode(',',$row->optional_services_price);
									foreach($optional_services_price1 as $row_optional_services_price)
									{
										$dive_user_id = $row->user_id;
										$currency = $this->db->get_where('tbl_dcprofile', array('user_id' => $dive_user_id))->result();
										foreach($currency as $rowcurrency)
										{
											$optional_services_price_con[$i]=$row_optional_services_price;
										$newAmount = "";
										$selectProfile = $this->db->get_where('tbl_dcprofile', array('user_id'=>$row->user_id))->row();
										$profileCurrency = ucwords(strtoupper($selectProfile->dccurrency));
										// the Dive center Currency is Also MYR
										if($profileCurrency == 'MYR')
										{
											//check wherether the Session is Created
											if($this->session->userdata('dccurreny'))
											{
												$sessionCurrency = $this->session->userdata('dccurreny');
												//Check wherether the Session Currency is also MYR
												if($sessionCurrency == 'MYR')
												{
													$newAmount = $optional_services_price_con[$i];
												}
												
												else
												{
													$curencyTableValue = $this->db->get_where('tbl_multicurrency',array('from_cur'=>$sessionCurrency, 'to_cur'=>'MYR'))->row();
													
													$newAmount = $optional_services_price_con[$i] / $curencyTableValue->seller_amt;
												}
												
											}
											else
											{
												$newAmount = $optional_services_price_con[$i];
											}
										}
										// the Dive center Currency is Not MYR
										else
										{
											$myrValueFetch = $this->db->get_where('tbl_multicurrency',array('from_cur'=>$profileCurrency, 'to_cur'=>'MYR'))->row(); 
											
											$myrValue = $optional_services_price_con[$i] * $myrValueFetch->buyer_amt;
											// check wherether session is created or not
											if($this->session->userdata('dccurreny'))
											{
												$sessionCurrency = $this->session->userdata('dccurreny');
												//Check wherether the Session Currency is also MYR
												if($sessionCurrency == 'MYR')
												{
													$newAmount = $myrValue;
												}
												elseif($profileCurrency == $this->session->userdata('dccurreny'))
												{
													$newAmount = $optional_services_price_con[$i];
												}
												else
												{
													$curencyTableValue = $this->db->get_where('tbl_multicurrency',array('from_cur'=>$sessionCurrency, 'to_cur'=>'MYR'))->row();
													
													$newAmount = $myrValue / $curencyTableValue->seller_amt;
												}
											}
											else
											{
												$newAmount = $myrValue;
											}
										}
										$row_optional_services_price1 = $newAmount ;
										$optional_concat_name[$j] = $option_service_name[$j]."-".$newAmount;
											
										//$output= $output.$rowcurrency->dccurrency.'&nbsp;'.$row_optional_services_price.'&nbsp;<input type="checkbox" name="optional_service_chk[]" value="'.$optional_concat_name[$j].'"/><br>';
											$output=$output.'<tr>
											<td>'.$option_service_name[$j].'</td>
											<td><b>';
											if($this->session->userdata('dccurreny')!=""){ $output=$output.$this->session->userdata('dccurreny');}else{ $output=$output."MYR";}
											$output=$output.'</b></td>
											<td><b>'.number_format($row_optional_services_price1,2).'</b><input type="hidden" name="optprd[]" value="' . $j . '/' . $option_service_name[$j] . '/' . $row_optional_services_price1 . '"></td>
											<td><input type="checkbox" name="optional_service_chk[]" class="optional_service" value="'.$optional_concat_name[$j].'"/></td>';
											if($option_service_qty_req[$j] == "Y")
											{
										//echo $option_service_qty_req[$j];
												$output=$output.'
												<td>
												<input type="number" name="qty[]" style="width:50px;" min="1" value="1" onkeydown="return false"/></td>';
											}
											else
											{
												$output=$output.'<td><input type="hidden" name="qty[]" style="width:50px;" value="1"/></td>';
											}
											$output=$output.'</tr>';

										}
										$j++;
									}

									$output=$output.'
									</table></div></div>';
									$output=$output.'
									</span>
									</td>
								</tr>';
							}
							else
							{
								
							}
								
				if($row->displaydiverexperience =='TRUE')
				{
					if($row->diver_experience != '')
					{
					$output=$output.'<tr>
						<td><b style="margin: 7px;">Diver Level : </b></td>
						<td >';
						if($row->diver_experience != '')
							{
								$diver_level = explode(',',$row->diver_experience);
								foreach($diver_level as $row_diver_level)
								{
									$output=$output.'&#10148; '.$row_diver_level.'<br>';	
								}
								
							}
							else
							{
								$output=$output.'Its not provided for this product';
							}	
						$output=$output.'</td>
					</tr>';
					}
					else
					{
						
					}
				}
				if($row->displaydivercertification =='TRUE')
				{
					if($row->diver_certification != '')
					{
						$output=$output.'<tr>
							<td><b style="margin: 7px;">Diver Skill</b></td>
							<td>';
							if($row->diver_certification != '')
							{
								$diver_skill = explode(',',$row->diver_certification);
								foreach($diver_skill as $row_diver_skill)
								{
									$output=$output.'&#10148; '.$row_diver_skill.'<br>';	
								}
							}
							else
							{
								$output=$output.'Its not provided for this product';
							}
							$output=$output.'</td>
							</tr>';
					}
					else
					{
						
					}
				}
				if($row->displaydiverspecialties =='TRUE')
				{
					if($row->diver_specialties != '')
					{
						$output=$output.'<tr>
							<td><b style="margin: 7px;">Diver Specialties</b></td>
							<td>';
							if($row->diver_specialties != '')
							{
								$diver_specialties1 = explode(',',$row->diver_specialties);
								foreach($diver_specialties1 as $row_diver_specialties)
								{
									$output=$output.'&#10148; '.$row_diver_specialties.'<br>';	
								}
							} 
							else
							{
								$output=$output.'Its not provided for this product';
							}
							$output=$output.'
							</td>
						</tr>';
					}
					else
					{
						
					}
				}
				
							if($row->displayaccommodation == "Yes")
							{
								$output=$output.'<tr><td colspan="2"><table class="table"><tr>
									<td colspan="5"><b style="margin: 7px;font-size:20px;    font-weight: 550;">Accommodation Info</b></td>
								</tr>
								<tr>
									<td><b style="margin: 7px;">Accommodation  Name</b></td>
									<td colspan="4">';
										$output=$output.$row->accomodation_name.'
									</td>
								</tr>
								<tr>
									<td><b style="margin: 7px;">Room Type :</b></td>
									<td>
										Single
									</td>
									<td>
									Twin Sharing
									</td>
									<td>
										Tripple Sharing
									</td>
									<td>
										Quad Sharing
									</td>
								</tr>
								<tr>
									<td><b style="margin: 7px;">Bed Type</b></td>
									<td>';
										$output=$output.$row->oneperson_bed_type.'</td>
									<td>';
										$output=$output.$row->twoperson_bed_type.'</td>
									<td>';
										$output=$output.$row->threeperson_bed_type.'</td>
									<td>';
										$output=$output.$row->fourperson_bed_type.'</td>
								</tr>
								
								<tr>
									<td><b style="margin: 7px;">Check In Time :</b></td>
									<td colspan="2">';
										$output=$output.$row->checkintime.'</td>
									<td><b>Check Out Time :</b></td>
									<td>';
										$output=$output.$row->checkouttime.'</td>
								</tr>';
								
								if($row->amenities != '')
						{
						$output=$output.'<tr>
							<td><b style="margin: 7px;">Room Amenities</b></td>
							<td colspan="4">';
									$amenities = explode(',', trim($row->amenities, ','));
									foreach($amenities as $rowamenities)
									{
										$output=$output.'
										<div class="col-md-4" style="padding:0px;">';
											$output=$output.'&#10148; '.$rowamenities;
										$output=$output.'</div>';
										
									}
									//$output=$output.';	
									
								
							$output=$output.'</td>
						</tr>';
						}
						if($row->accommodation_facilities != '')
						{
						$output=$output.'<tr>
							<td><b style="margin: 7px;">Facilities / Services</b></td>
							<td colspan="4">';
								
									$accommodation_facilities1 = explode(',', trim($row->accommodation_facilities, ','));
									foreach($accommodation_facilities1 as $row_accommodation_facilities)
									{
										$output=$output.'
										<div class="col-md-4" style="padding:0px;">';
											$output=$output.'&#10148; '.$row_accommodation_facilities;
										$output=$output.'</div>';
											
									}
								//$output=$output.'	
								
							$output=$output.'</td>
						</tr>';
						}
						$output=$output.'</table></td></tr>
						';
						}if($row->booking_policy != 0)
						{
							$output .='
							<tr>
								<td><b style="margin: 7px;">Booking Policy</b></td>
								<td colspan="5">';
								if($row->booking_policy != 0)
								{
									$logcqdata .= "Booking Policy\n";

									$output .= $this->renderBooking($row->booking_policy);
									
								}
								$output .='
								</td>
							</tr>
							';
						}
						else
						{
							$output .='
							<tr>
								<td><b style="margin: 7px;">Booking Policy</b></td>
								<td colspan="5">
									No Booking policy for this Product
								</td>
							</tr>
							';
						}
						if($row->cancellation_policy != 0)
						{
							$output .='
							<tr>
								<td><b style="margin: 7px;">Cancellation Policy</b></td>
								<td colspan="5">';
								if($row->cancellation_policy != 0)
								{
									$logcqdata .= "Cancellation Policy\n";

									$output = $output. $this->renderCancellation($row->cancellation_policy);
									
								}
								$output .='
								</td>
							</tr>
							';
						}
						else
						{
							$output .='
							<tr>
								<td><b style="margin: 7px;">Cancellation Policy</b></td>
								<td colspan="5">
								No Cancellation policy for this Product
								</td>
							</tr>
							';
						}
							$output .='
						<table>
					</div>

				</div>
				</form>
				';
				if ( !write_file('application/controllers/logrenderCoursesqty.txt', $logcqdata)){
					echo 'Unable to write the file';
				}			
			}
			
				return $output;
			
			

		}
		function packageOffer($data,$insert)
		{
			$this->module = "Front/packageProduct";
			$this->putvlog($this->session->userdata('user_type'),0,0,0,0,0);
	//			$this->load->helper('file');
	//var_dump(data);
			foreach($data as $row)
			{
				$data116 = $this->db->get_where('tbl_dcprofile', array('user_id'=>$row->user_id))->row();
				$dccur = $data116->dccurrency;
				$checkin = $insert['checkin'];
				$checkout = $insert['checkout'];

				$dbegin = new DateTime( $insert['checkin'] );
				$dend   = new DateTime( $insert['checkout'] );
				$idate = $dbegin;
				
	//---------------------Date Difference-----------------------------------------------------------------------
				
				$checkin1 = $insert['checkin'];
				$checkin1 = strtotime($checkin1);

				$slt_value =0;
				$renderqty = 0;
				$logoqdata = "";
				$cnt = 0;
				$daytype = "";
				
				// Availability only based on first day
				$sdate = $dbegin->format("Y-m-d");

				$avail = $this->front_model->checkAvalability($sdate,$insert['table'],$insert['dive_id'],$insert['id']);
				//var_dump($);
			
				if (is_array($avail)) {
					$davail = $avail[0]["day_max"] - $avail[0]["booked_dives"];
					$daytype =  $avail[0]['day_type'];
				} else {
					$davail = $row->product_max_day;
					$daytype =  "NM";
				}
				
				//echo $daytype; 
				
				if ($davail >= $insert['noofPerson']) {
					$slt_value = $insert['noofPerson'] ;
				} else {
					$slt_value =0; 
				}
				$logoqdata .= "  - $sdate Rendering $slt_value qty >> check " . $insert['noofPerson'] . " avail $davail \n";

	/*									
				for($i = $dbegin; $i <= $dend; $i->modify('+1 day'))
				{
					$sdate = $i->format("Y-m-d");
					$cnt++;
					$avail = $this->front_model->checkAvalability($sdate,$insert['table'],$insert['dive_id'],$insert['id']);
					if (is_array($avail)) {
					$davail = $avail[0]["day_max"] - $avail[0]["booked_dives"];
					} else {
					$davail = $row->product_max_day;
					}
					// ----------------------No Limit----------------------------------
						if ($row->product_unit == "Dive" ) {  // Normally check for Dives
							if ($davail >= $insert['noofPerson']) {
								$slt_value =$slt_value + $insert['noofPerson'] ;
							} else {
								$slt_value =$slt_value + $davail ;
							}
						} else {											
							if ($davail >= $insert['noofPerson']) {
								$slt_value =$slt_value + $insert['noofPerson'] ;
							} else {
								$slt_value =$slt_value + $davail ;
							}
						}
						$logoqdata .= "  - $cnt - $sdate Rendering $slt_value qty >> check " . $insert['noofPerson'] . " avail $davail \n";

				}
	*/									
				$renderqty = $slt_value;
				$logoqdata .= "  - Rendering total $renderqty selects \n";
	/*
				$output .= '
		<b>Select Dive</b>
			<select name="no_of_dive_slt" class="form-control">';
				for($j=$renderqty;$j>=1;$j--)
				{
						$output=$output.'
							<option value="'.$j.'">'.$j.'</option>
							';	
				}
	*/
				$checkin = strtotime($checkin);
				$checkin = strtotime("+1 day", $checkin);
	// check product price.
	$amount=0;
					$disprice= 0;
				$accom = "";
			//$result1 = $this->packageRoomrates($data , $daytype , '1' ,$insert['noofPerson']);
			$result1 = $this->currencyConversation($data , $daytype , '1' ,$insert['noofPerson'],'packageRoomrates' ,0.00);
			
				$disprice= $result1['disprice'];
				$accom = $result1['accom'];
				
				$output = '
				<form action="" method="post" class="cartForm2">
				<div class="col-md-12" style="background-color:#ccc;padding-top:20px;padding-bottom:20px;border:1px solid #000;">
				<div class="row">
				<div class="col-md-3">
				<b style="font-size:20px;">'.$row->product_name.'</b>
				<input type="hidden" value="'.$disprice.'" name="price"/>
				<input type="hidden" value="'.$row->product_name.'" name="product_name"/>
				<input type="hidden" value="'.$insert['table'].'" name="table_name"/>
				<input type="hidden" value="'.$insert['id'].'" name="product_id"/>
				<input type="hidden" value="'.$insert['dive_id'].'" name="dive_id"/>
				<input type="hidden" value="'.$row->product_unit.'" name="product_unit"/>
				<input type="hidden" value="'.$insert['checkin'].'" name="checkin"/>
				<input type="hidden" value="'.$insert['checkout'].'" name="checkout"/>
				<input type="hidden" value="'.$insert['noofPerson'].'" name="no_of_persons"/>
				</div>
				<div class="col-md-3">
				<div class="col-md-12">
				<b>Select Person</b>
				<select name="diverid" class="form-control">
				';
				for ($p=1;$p<=$insert['noofPerson'];$p++){
					$output .= '				<option value="P'.$p.'">P'.$p.'</option>
					';
				}
				$output .= '
				</select>
				</div>
				<div class="col-md-12">';
				
				$checkin = $insert['checkin'];
				$checkout = $insert['checkout'];

				$dbegin = new DateTime( $insert['checkin'] );
				$dend   = new DateTime( $insert['checkout'] );
				$idate = $dbegin;
				
	//---------------------Date Difference-----------------------------------------------------------------------
				
				$checkin1 = $insert['checkin'];
				$checkin1 = strtotime($checkin1);

				$slt_value =0;
				$renderqty = 0;
				$logoqdata = "";
				$cnt = 0;
				$daytype = "NM";
				
				// Availability only based on first day
				$sdate = $dbegin->format("Y-m-d");

				$avail = $this->front_model->checkAvalability($sdate,$insert['table'],$insert['dive_id'],$insert['id']);
				if (is_array($avail)) {
					$davail = $avail[0]["day_max"] - $avail[0]["booked_dives"];
					$daytype =  $avail[0]['day_type'];
				} else {
					$davail = $row->product_max_day;
					$daytype =  "NM";
				}
				if ($davail >= $insert['noofPerson']) {
					$slt_value = $insert['noofPerson'] ;
				} else {
					$slt_value =0; 
				}
				$logoqdata .= "  - $sdate Rendering $slt_value qty >> check " . $insert['noofPerson'] . " avail $davail \n";

	/*									
				for($i = $dbegin; $i <= $dend; $i->modify('+1 day'))
				{
					$sdate = $i->format("Y-m-d");
					$cnt++;
					$avail = $this->front_model->checkAvalability($sdate,$insert['table'],$insert['dive_id'],$insert['id']);
					if (is_array($avail)) {
					$davail = $avail[0]["day_max"] - $avail[0]["booked_dives"];
					} else {
					$davail = $row->product_max_day;
					}
					// ----------------------No Limit----------------------------------
						if ($row->product_unit == "Dive" ) {  // Normally check for Dives
							if ($davail >= $insert['noofPerson']) {
								$slt_value =$slt_value + $insert['noofPerson'] ;
							} else {
								$slt_value =$slt_value + $davail ;
							}
						} else {											
							if ($davail >= $insert['noofPerson']) {
								$slt_value =$slt_value + $insert['noofPerson'] ;
							} else {
								$slt_value =$slt_value + $davail ;
							}
						}
						$logoqdata .= "  - $cnt - $sdate Rendering $slt_value qty >> check " . $insert['noofPerson'] . " avail $davail \n";

				}
	*/									
				$renderqty = $slt_value;
				$logoqdata .= "  - Rendering total $renderqty selects \n";
	/*
				$output .= '
		<b>Select Dive</b>
			<select name="no_of_dive_slt" class="form-control">';
				for($j=$renderqty;$j>=1;$j--)
				{
						$output=$output.'
							<option value="'.$j.'">'.$j.'</option>
							';	
				}
	*/
				$checkin = strtotime($checkin);
				$checkin = strtotime("+1 day", $checkin);
				switch($daytype) {
					case "WE":
					$logoqdata .= "Product price ......\n Weekend Price:" . $row->product_weekend_rate ."\n" .
					"Accomodations => " . $row->disaccomodation . " \n Prices: " . $row->single_room . "\n";
				//	$disprice = $row->product_weekend_rate;
					break;
					case "PK":
					$logoqdata .= "Product price ......\n Peak Price:" . $row->product_peakseason_rate ."\n" .
					"Accomodations => " . $row->disaccomodation . " \n Prices: " . $row->single_room . "\n";
					//$disprice = $row->product_peakseason_rate;
					break;
					case "SP":
					$logoqdata .= "Product price ......\n Superpeak Price:" . $row->product_superpeak_rate ."\n" .
					"Accomodations => " . $row->disaccomodation . " \n Prices: " . $row->single_room . "\n";
				//	$disprice = $row->product_superpeak_rate;
					break;
					default:
					$logoqdata .= "Product price ......\n Normal Price:" . $row->product_normal_rate ."\n" .
					"Accomodations => " . $row->disaccomodation . " \n Prices: " . $row->single_room . "\n";
					break;
				//	$disprice = $row->product_normal_rate;
				}
				//echo date('d-m-Y', $checkin);

	//						$output .='								
	//								</select>
	//						';																	
				$output .= '<input type="hidden" name="daytype" value="' . $daytype . '"><br><input type="hidden" name="no_of_dive_slt" value=1>';
	//									&nbsp;' . $insert['noofPerson'] . ' Pax';
				
				$output=$output.'								
				</div>
				</div>
				<div class="col-md-2">';
					if ($accom == 'Yes') {
						$output=$output.'
								<b>Select Room Type</b>
								<select name="accommodation_type" class="form-control">
									<option value="1">Single</option>
									<option value="2" ' . ($insert['noofPerson'] <2 ? 'disabled':'') .'>Twin Sharing</option>
									<option value="3" ' . ($insert['noofPerson'] <3 ? 'disabled':'') .'>Tripple Sharing</option>
									<option value="4" ' . ($insert['noofPerson'] <4 ? 'disabled':'') .'>Quad Sharing</option>
								
								
								</select>';
					}
				$output= $output.'	 
				</div>
				<div class="col-md-2">';
				$dive_user_id = $row->user_id;
				$currency = $this->db->get_where('tbl_dcprofile', array('user_id' => $dive_user_id))->result();
				$discurrency = "";
				$custom_room = "";
				foreach($currency as $rowcurrency)
				{
	//									$output= $output.$rowcurrency->dccurrency.'&nbsp;&nbsp;';
					$discurrency = $rowcurrency->dccurrency;
					$custom_room = $rowcurrency->custom_accom;
				}

				if ($accom == 'Yes') {
					$rmrate = $this->db->get_where('tbl_dcroomrates', array('dcid' => $dive_user_id, 'table'=>'tbl_dcpackage' ,'prodid' => $row->id,'season'=>$daytype ))->result();
					foreach($rmrate as $irate) {
						$output .= '<input type="hidden" name="accom" value="Yes">
						<b style="display:none;">SG&nbsp;' . $discurrency . '&nbsp;&nbsp;' .$irate->single.'</b><br>
						<b style="display:none;">TW&nbsp;' . $discurrency . '&nbsp;&nbsp;' .$irate->double.'</b><br>
						<b style="display:none;">TR&nbsp;' . $discurrency . '&nbsp;&nbsp;' .$irate->triple.'</b><br>
						<b style="display:none;">QD&nbsp;' . $discurrency . '&nbsp;&nbsp;' .$irate->quad.'</b><br>
						<b style="display:none;">SP&nbsp;' . $discurrency . '&nbsp;&nbsp;' .$irate->udefine.'</b><br>';
					}

				} else {
					$output .= '<input type="hidden" name="accom" value="No">';
	//										. $discurrency . '&nbsp;&nbsp;' .$disprice.'</b>';
				}		

				$output .= '
				</div>
				
				<div class="col-md-2 text-center" style="padding-left:0px;">';
				//$datetime = date('Y-m-d');
				$product_max_day = $row->product_max_day;
				$availstatus = "";
				$availstatus1 = "";
				
				
				if($product_max_day == 'No Limit')
				{
					//$availstatus = "AVAILABLE";	
					$bkdate = date('Y-m-d');
					
					if ((($row->booking_period_start_date == '1970-01-01') && ($row->booking_period_end_date == '1970-01-01' ))|| (($row->travel_period_start_date == '1970-01-01') && ($row->travel_period_end_date == '1970-01-01')))
					{
						$availstatus = "AVAILABLE";	
$availstatus1 = "AVAILABLE";							
					}
				
					else
					{
						if (($bkdate >= $row->booking_period_start_date) && ($bkdate <= $row->booking_period_end_date)) {
							$availstatus = "AVAILABLE";										
							//echo "1";
						} 
						else { 
							$availstatus = "OFF SEASON";
							//echo "2";
						}
						$didate = $dbegin->format("Y-m-d");
						if (($didate >= $row->travel_period_start_date) && ($didate <= $row->travel_period_end_date)) {
							$availstatus1 = "AVAILABLE";
							//echo "3";
						} else {
							$availstatus1 = "OFF SEASON";
							//echo "4";
						}
					}
				}
				elseif($product_max_day > 0)
				{
					if ((($row->booking_period_start_date == '1970-01-01') && ($row->booking_period_end_date == '1970-01-01' ))|| (($row->travel_period_start_date == '1970-01-01') && ($row->travel_period_end_date == '1970-01-01')))
					{
						$availstatus = "AVAILABLE";	
						$availstatus1 = "AVAILABLE";						
					}
				
					else
					{
					//$availstatus = "AVAILABLE";
						$bkdate = date('Y-m-d');
						if (($bkdate >= $row->booking_period_start_date) && ($bkdate <= $row->booking_period_end_date)) {
							$availstatus = "AVAILABLE";										
							//echo "5";
						} 
						else { 
							$availstatus = "OFF SEASON";
							//echo "6";
						}
						$didate = $dbegin->format("Y-m-d");
						if (($didate >= $row->travel_period_start_date) && ($didate <= $row->travel_period_end_date)) {
							$availstatus1 = "AVAILABLE";
							//echo "7";
						} else {
							$availstatus1 = "OFF SEASON";
							//echo "8";
						}
					}
				}
				else
				{
					if ((($row->booking_period_start_date == '1970-01-01') && ($row->booking_period_end_date == '1970-01-01' ))|| (($row->travel_period_start_date == '1970-01-01') && ($row->travel_period_end_date == '1970-01-01')))
					{
						$availstatus = "AVAILABLE";	
						$availstatus1 = "AVAILABLE";						
					}
				
					else
					{
					//$availstatus = "AVAILABLE";
						$bkdate = date('Y-m-d');
						if (($bkdate >= $row->booking_period_start_date) && ($bkdate <= $row->booking_period_end_date)) {
							$availstatus = "AVAILABLE";										
							//echo "9";
						} 
						else { 
							$availstatus = "OFF SEASON";
							//echo "10";
						}
						$didate = $dbegin->format("Y-m-d");
						if (($didate >= $row->travel_period_start_date) && ($didate <= $row->travel_period_end_date)) {
							$availstatus1 = "AVAILABLE";
							//echo "11";
						} else {
							$availstatus1 = "OFF SEASON";
							//echo "12";
						}
					}
				}
				
				
				/* if($insert['availability'] == "AVAILABLE") {
					$availstatus = "AVAILABLE";
					
				} 
				else {
					$output.= $insert['availability'];
				} */
				switch ($availstatus) {
					case "BOOKING CLOSED":
					break;
					case "OFF SEASON":
					break;
					case "AVAILABLE":
					
					//	if($disprice != '0.00')
					//	{
							if($availstatus1 == 'AVAILABLE')
							{
								$output.= '
									<button type="button" class="btn addCart2" id="addCart" style="background-color:red;color:#fff;margin-top:20px;">Add to My Dive Cart</button>';
							}
					//	}
						
					break;
				}
				
				$output .='							
				</div>
				</div>
				<div class="col-md-12">
				<div class="table-responsive">
				<table class="table">
					';
					$extension_amount = 0.00;
							$select_exten = $this->db->get_where('tbl_dcpackage' , array('id'=>$row->id))->row();
							$arrayValExten = explode(',',$select_exten->accomodation_extension_single);
							if($daytype == 'WE')
							{
								$extension_amount = $arrayValExten[1];
							}
							else if($daytype == 'PK')
							{
								$extension_amount = $arrayValExten[2];
							}
							else if($daytype == 'SP')
							{
								$extension_amount = $arrayValExten[3];
							}
							else if($daytype == 'NA')
							{
								$extension_amount = 0.00;
							}
							else
							{
								$extension_amount = $arrayValExten[0];
							}
								$newExtenAmount = "";
							$selectProfile1 = $this->db->get_where('tbl_dcprofile', array('user_id'=>$row->user_id))->row();
							$profileCurrency1 = ucwords(strtoupper($selectProfile1->dccurrency));
							// the Dive center Currency is Also MYR
							if($profileCurrency1 == 'MYR')
							{
								//check wherether the Session is Created
								if($this->session->userdata('dccurreny'))
								{
									$sessionCurrency = $this->session->userdata('dccurreny');
									//Check wherether the Session Currency is also MYR
									if($sessionCurrency == 'MYR')
									{
										$newExtenAmount = $extension_amount;
									}
									
									else
									{
										$curencyTableValue = $this->db->get_where('tbl_multicurrency',array('from_cur'=>$sessionCurrency, 'to_cur'=>'MYR'))->row();
										
										$newExtenAmount = $extension_amount / $curencyTableValue->seller_amt;
									}
									
								}
								else
								{
									$newExtenAmount = $extension_amount;
								}
							}
							// the Dive center Currency is Not MYR
							else
							{
								$myrValueFetch = $this->db->get_where('tbl_multicurrency',array('from_cur'=>$profileCurrency1, 'to_cur'=>'MYR'))->row(); 
								
								$myrValue = $extension_amount * $myrValueFetch->buyer_amt;
								// check wherether session is created or not
								if($this->session->userdata('dccurreny'))
								{
									$sessionCurrency = $this->session->userdata('dccurreny');
									//Check wherether the Session Currency is also MYR
									if($sessionCurrency == 'MYR')
									{
										$newExtenAmount = $myrValue;
									}
									elseif($profileCurrency1 == $this->session->userdata('dccurreny'))
									{
										$newExtenAmount = $extension_amount;
									}
									else
									{
										$curencyTableValue = $this->db->get_where('tbl_multicurrency',array('from_cur'=>$sessionCurrency, 'to_cur'=>'MYR'))->row();
										
										$newExtenAmount = $myrValue / $curencyTableValue->seller_amt;
									}
								}
								else
								{
									$newExtenAmount = $myrValue;
								}
							}

							
							
							if($row->accomodation_extension == "Yes")
							{
								$output=$output.'<tr>
								<td ><b style="margin:7px;">Extension Night: </b></td>
								<td>
								<table><tr>
								<td>';if($this->session->userdata('dccurreny') != ""){ $output=$output.$this->session->userdata('dccurreny') ; }else{ $output=$output.'MYR'; } $output=$output.'&nbsp;&nbsp;&nbsp;'.number_format($newExtenAmount,2).'&nbsp;&nbsp;Per night</td>
								<td><input type="checkbox" name="acco_exten" class="" value="1"/></td>
								<td><input type="number" name="accomvalue" style="width:50px;" min="1" value="1" onkeydown="return false"></td>
								</tr></table>
								</td>
								
								</tr>';
								
							}

					if($row->product_includes != '')
					{
						$output=$output.'<tr>
							<td style="width:28%;"><b>Included :</b></td>
							<td>';
							if($row->product_include_display =="TRUE")
								{
									if($row->product_includes != "")
									{
										
										$includes = explode('|',$row->product_includes);
										foreach($includes as $row_includes)
										{
											$output=$output.$row_includes.'<br>';	
										}
										
									}
									else
									{
										$output = $output.'No Includes is Available for this product';
									}
								}
								else
								{
									$output = $output.'No Includes is Available for this product';
								}
									$output=$output.'
								</td>
						</tr>';
					}
					else
					{
						$output=$output.'<tr>
							<td style="width:28%;"><b>Included :</b></td>
							<td>No includes Available for this product</td>';
					}
					if($row->product_excludes != '')
					{
						$output=$output.'<tr>
							<td><b>Excluded :</b></td>
							<td>';
						if($row->product_exclude_display =="TRUE")
							{
								if($row->product_excludes != "")
								{
									$excludes = explode('|',$row->product_excludes);
									foreach($excludes as $row_excludes)
									{
										$output=$output.$row_excludes.'<br>';	
									}
								}
								else
								{
									$output = $output.'No Excludes is Available for this product';
								}
							}
							else
							{
								$output = $output.'No Excludes is Available for this product';
							}
								$output=$output.'
							</td>
						</tr>';
					}
					else
					{
						
					}
					if($row->other_info_display == 'TRUE')
					{
						if($row->other_info !="")
						{
					$output=$output.'	
						<tr>
							<td>
								<b>Other Information :</b>
							</td>
							<td>'.$row->other_info.'</td>
						</tr>';
						}
					}
					if($row->optional_services == "Yes")
					{
						$output=$output.'<tr>
							<td><b>Optional Service :</b></td>
							<td>';
								$output=$output.'
									<table class="optionservice">';
								$optional_services1 = explode(',',$row->optional_services_service);
								$i=1;
								$option_service_name[]="";
								foreach($optional_services1 as $row_optional_services)
								{
								//$output=$output.$row_optional_services.'<br>';	
									$option_service_name[$i]=$row_optional_services;
									$i++;
								}

								$j=1;
								$optional_services_price1 = explode(',',$row->optional_services_price);
								
								foreach($optional_services_price1 as $row_optional_services_price)
								{
									$dive_user_id = $row->user_id;
									$currency = $this->db->get_where('tbl_dcprofile', array('user_id' => $dive_user_id))->result();
									
									$optional_services_required1 = explode(',',$row->optional_service_qty_required);
									$k=1;
									$option_service_qty_req[]="";
									foreach($optional_services_required1 as $row_optional_services_required)
									{
										$option_service_qty_req[$k]=$row_optional_services_required;
										$k++;
									}
									
									foreach($currency as $rowcurrency)
									{
										$optional_services_price_con[$i]=$row_optional_services_price;
										
	$newAmount = "";
										$selectProfile = $this->db->get_where('tbl_dcprofile', array('user_id'=>$row->user_id))->row();
										$profileCurrency = ucwords(strtoupper($selectProfile->dccurrency));
										// the Dive center Currency is Also MYR
										if($profileCurrency == 'MYR')
										{
											//check wherether the Session is Created
											if($this->session->userdata('dccurreny'))
											{
												$sessionCurrency = $this->session->userdata('dccurreny');
												//Check wherether the Session Currency is also MYR
												if($sessionCurrency == 'MYR')
												{
													$newAmount = $optional_services_price_con[$i];
												}
												else
												{
													$curencyTableValue = $this->db->get_where('tbl_multicurrency',array('from_cur'=>$sessionCurrency, 'to_cur'=>'MYR'))->row();
													
													$newAmount = $optional_services_price_con[$i] / $curencyTableValue->seller_amt;
												}
												
											}
											else
											{
												$newAmount = $optional_services_price_con[$i];
											}
										}
										// the Dive center Currency is Not MYR
										else
										{
											$myrValueFetch = $this->db->get_where('tbl_multicurrency',array('from_cur'=>$profileCurrency, 'to_cur'=>'MYR'))->row(); 
											
											$myrValue = $optional_services_price_con[$i] * $myrValueFetch->buyer_amt;
											// check wherether session is created or not
											if($this->session->userdata('dccurreny'))
											{
												$sessionCurrency = $this->session->userdata('dccurreny');
												//Check wherether the Session Currency is also MYR
												if($sessionCurrency == 'MYR')
												{
													$newAmount = $myrValue;
												}
												elseif($profileCurrency == $this->session->userdata('dccurreny'))
												{
													$newAmount = $optional_services_price_con[$i];
												}
												else
												{
													$curencyTableValue = $this->db->get_where('tbl_multicurrency',array('from_cur'=>$sessionCurrency, 'to_cur'=>'MYR'))->row();
													
													$newAmount = $myrValue / $curencyTableValue->seller_amt;
												}
											}
											else
											{
												$newAmount = $myrValue;
											}
										}
										$row_optional_services_price1 = $newAmount ;
										$optional_concat_name[$j] = $option_service_name[$j]."-".$newAmount;
									
										//$output= $output.$rowcurrency->dccurrency.'&nbsp;'.$row_optional_services_price.'&nbsp;<input type="checkbox" name="optional_service_chk[]" value="'.$optional_concat_name[$j].'"/><br>';
										$output=$output.'<tr>
										<td>'.$option_service_name[$j].'</td>
										<td><b>';
										if($this->session->userdata('dccurreny')!=""){ $output=$output.$this->session->userdata('dccurreny');}else{ $output=$output."MYR";}
										$output=$output.'</b></td>
										<td><b>'.number_format($row_optional_services_price1,2).'</b><input type="hidden" name="optprd[]" value="' . $j . '/' . $option_service_name[$j] . '/' . $row_optional_services_price1 . '"></td>
										<td><input type="checkbox" name="optional_service_chk[]" class="optional_service" value="'.$optional_concat_name[$j].'"/></td>';
										if($option_service_qty_req[$j] == "Y")
										{
											//echo $option_service_qty_req[$j];
											$output=$output.'
											<td><input type="number" name="qty[]" style="width:50px;" min="1" value="1" onkeydown="return false"/></td>';
										}
										else
										{
											$output=$output.'<td><input type="hidden" name="qty[]" style="width:50px;" value="1"/></td>';
										}
										$output=$output.'</tr>';
									}
									$j++;
								}
								$output=$output.'
								</table>
							</td>
						</tr>';
					}
					else
					{
						
					}
					if($row->displaydiverexperience =='TRUE')
				{
					if($row->diver_experience != '')
					{
					$output=$output.'<tr>
						<td><b >Diver Level : </b></td>
						<td >';
						if($row->diver_experience != '')
							{
								$diver_level = explode(',',$row->diver_experience);
								foreach($diver_level as $row_diver_level)
								{
									$output=$output.'&#10148; '.$row_diver_level.'<br>';	
								}
								
							}
							else
							{
								$output=$output.'Its not provided for this product';
							}	
						$output=$output.'</td>
					</tr>';
					}
					else
					{
						
					}
				}
				if($row->displaydivercertification =='TRUE')
				{
					if($row->diver_certification != '')
					{
						$output=$output.'<tr>
							<td><b>Diver Skill</b></td>
							<td>';
							if($row->diver_certification != '')
							{
								$diver_skill = explode(',',$row->diver_certification);
								foreach($diver_skill as $row_diver_skill)
								{
									$output=$output.'&#10148; '.$row_diver_skill.'<br>';	
								}
							}
							else
							{
								$output=$output.'Its not provided for this product';
							}
							$output=$output.'</td>
							</tr>';
					}
					else
					{
						
					}
				}
				if($row->displaydiverspecialties =='TRUE')
				{
					if($row->diver_specialties != '')
					{
						$output=$output.'<tr>
							<td><b >Diver Specialties</b></td>
							<td>';
							if($row->diver_specialties != '')
							{
								$diver_specialties1 = explode(',',$row->diver_specialties);
								foreach($diver_specialties1 as $row_diver_specialties)
								{
									$output=$output.'&#10148; '.$row_diver_specialties.'<br>';	
								}
							} 
							else
							{
								$output=$output.'Its not provided for this product';
							}
							$output=$output.'
							</td>
						</tr>';
					}
					else
					{
						
					}
				}
					if($row->dive_sites != "")
					{
						$output=$output.'
						<tr>
							<td>
								<b>DIVE SITES</b></td>
								<td>
								';
									$diver_sites = explode(',',$row->dive_sites);
									foreach($diver_sites as $row_diver_sites)
									{
										$output=$output.$row_diver_sites.'<br>';	
									}
									$output=$output.'
								</td>
						</tr>';
					}
					if($row->displayaccommodation == "Yes")
					{
						$output=$output.'<tr><td colspan="2"><table class="table"><tr>
							<td colspan="5"><b style="margin: 7px;font-size:20px;    font-weight: 550;">Accommodation Info</b></td>
						</tr>
						<tr>
							<td><b style="margin: 7px;">Accommodation  Name</b></td>
							<td colspan="4">';
								$output=$output.$row->accomodation_name.'
							</td>
						</tr>';
						if($row->oneperson_bed_type != '' || $row->twoperson_bed_type != '' || $row->threeperson_bed_type != '' || $row->fourperson_bed_type != '')
						{
						$output=$output.'<tr>
							<td><b style="margin: 7px;">Room Type :</b></td>
							<td>
								Single
							</td>
							<td>
								Twin Sharing
							</td>
							<td>
								Tripple Sharing
							</td>
							<td>
								Quad Sharing
							</td>
						</tr>
						
						<tr>
							<td><b style="margin: 7px;">Bed Type</b></td>
							<td>';
								$output=$output.$row->oneperson_bed_type.'</td>
							<td>';
								$output=$output.$row->twoperson_bed_type.'</td>
							<td>';
								$output=$output.$row->threeperson_bed_type.'</td>
							<td>';
								$output=$output.$row->fourperson_bed_type.'</td>
						</tr>';
						}
						$output=$output.'<tr>
							<td><b style="margin: 7px;">Check In Time :</b></td>
							<td colspan="2">';
								$output=$output.$row->checkintime.'</td>
							<td><b>Check Out Time :</b></td>
							<td>';
								$output=$output.$row->checkouttime.'</td>
						</tr>';
						if($row->actype != '')
						{
							$output=$output.'<tr>
							<td><b style="margin: 7px;">Accommodation Type</b></td>
							<td colspan="4">';
							$output=$output.$row->actype.'</td>
							</tr>';	
						}
						if($row->amenities != '')
						{
						$output=$output.'<tr>
							<td><b style="margin: 7px;">Room Amenities</b></td>
							<td colspan="4">';
									$amenities = explode(',', trim($row->amenities, ','));
									foreach($amenities as $rowamenities)
									{
										$output=$output.'
										<div class="col-md-4" style="padding:0px;">';
											$output=$output.'&#10148; '.$rowamenities;
										$output=$output.'</div>';
										
									}
									//$output=$output.';	
									
								
							$output=$output.'</td>
						</tr>';
						}
						if($row->accommodation_facilities != '')
						{
						$output=$output.'<tr>
							<td><b style="margin: 7px;">Facilities / Services</b></td>
							<td colspan="4">';
								
									$accommodation_facilities1 = explode(',', trim($row->accommodation_facilities, ','));
									foreach($accommodation_facilities1 as $row_accommodation_facilities)
									{
										$output=$output.'
										<div class="col-md-4" style="padding:0px;">';
											$output=$output.'&#10148; '.$row_accommodation_facilities;
										$output=$output.'</div>';
											
									}
								//$output=$output.'	
								
							$output=$output.'</td>
						</tr>';
						}
						$output=$output.'</table></td></tr>
						';
					}
					else
					{
						
					}
					if($row->booking_policy != 0)
					{
						$output .='
						<tr>
							<td><b>Booking Policy</b></td>
							<td colspan="5">';
							if($row->booking_policy != 0)
							{
								$logoqdata .= "Booking Policy\n";

								$output .= $this->renderBooking($row->booking_policy);
							}
							$output .='
							</td>
						</tr>
						';
					}
					else
					{
						$output .='
						<tr>
							<td><b>Booking Policy</b></td>
							<td colspan="5"> 
							No Booking policy for this product
							</td>
						</tr>
						';
					}
					if($row->cancellation_policy != 0)
					{
						$output .='
						<tr>
							<td><b>Cancellation Policy</b></td>
							<td colspan="5">';
							if($row->cancellation_policy != 0)
							{
								$logoqdata .= "Cancellation Policy\n";

								$output .= $this->renderCancellation($row->cancellation_policy);
							}
							$output .='
							</td>
						</tr>
						';
					}
					else
					{
						$output .='
						<tr>
							<td><b>Cancellation Policy</b></td>
							<td colspan="5">
							No Cancellation Policy Available for this Product
							</td>
						</tr>
						';
					}
					$output=$output.'
				</table>
				</div>
				</div>

				<div class="col-md-12">
				<div class="featured-slider">';

				$data124 = explode(',',$row->photo);
				foreach ($data124 as $cval24)
				{
					if($cval24 != "")
					{
					$output=$output.'<div class="col-md-3" style="padding: 0px;">
					<div class="papular-reviews">

					<div class="image">
					<img  src="'.base_url().'upload/DCpackage/'.$cval24.'" class="img-responsive" style="height:150px;width:200px;">
					</div>

					</div>
					</div>';
					}

				} 

				if ( !write_file('application/controllers/logrenderOfferqty.txt', $logoqdata)){
					echo 'Unable to write the file';
				}			

				$output=$output.'</div></div></div>
				
				</form>
				';
			}
			return $output;

		}
		function renderBooking($bid) 
		{
			$output = "<p><ul>";
			$logoqdata = "";
			$booking = $this->db->get_where('tbl_booking_policies', array('id' => $bid))->result();
			foreach($booking as $rowbooking)
			{
				if ($rowbooking->deposit_required == "Yes") {
					if ($rowbooking->booking_deposit == "Full Prepayment" ) {
						//$output .= '<li>Full payment required for booking.</li>';
						$output .= '<li>100% of Payment Will Be Charged Upon Booking.</li>';
						$logoqdata .= " > Full Booking Payment required \n";

					} else {
						$partb1 = explode(",",$rowbooking->booking_amount);
						if (is_array($partb1) ) {
							$partb2 = explode(",",$rowbooking->booking_total_product);
							$partb3 = explode(",",$rowbooking->booking_charge);
							$partb4 = explode(",",$rowbooking->booking_period);
							$partb4123 = explode(",",$rowbooking->booking_days);
							for ($b=0;$b<count($partb1);$b++) { 
								$logoqdata .= " $b, ";
								if (intval($partb1[$b]) > 0) {
									
									$partb412 ="";	
									
									if($partb4[$b] == "After Booking Date")
									{
										$partb412 = $partb4123[$b]. "&nbsp;&nbsp;Days"; 
									}
									
									$fmttext = $partb1[$b]."&nbsp;&nbsp;" . $partb2[$b] . " " . $partb3[$b] . " " . $partb4[$b]." ".$partb412;
									
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
		function renderCancellation($cid) 
		{

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
									$fmttext = $part1[$i] ." ". $part2[$i] . " " . $part3[$i] . " if cancelled " . $part4[$i] . " days before arrival date.";
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
					
				}
				$output .= "<li>A 10% or minimum MYR 50 will be charged by scubbi for service fee in the event of any cancellation by the user</li></ul>";
			}
			return $output . "</p>";
		}
		function addToCart()
		{
			$displayCart="";
			$this->module = "Front/addtoCart";
			$this->putvlog($this->session->userdata('user_type'),0,0,0,0,0);

			$no_of_dive = $this->input->post('no_of_dive_slt');
			$optional_service = $this->input->post('optional_service_chk');
			$opt_chk = json_decode(json_encode($this->input->post('optional_service_chk')), True);
			$opt_prop = json_decode(json_encode($this->input->post('optprd')), True);
			$opt_qty = json_decode(json_encode($this->input->post('qty')), True);
			$optional_service1 ="";
			
			$checkin1=$this->input->post('checkin');
			$checkout1=$this->input->post('checkout');
			$newCheckin = date('Y-m-d', strtotime($checkin1));
			$newCheckout = date('Y-m-d', strtotime($checkout1));
			$data = array(
				'sessionid' => $this->session->userdata('scubbi_sessid'),
				'check_in' => $newCheckin,
				'check_out' => $newCheckout,
				'no_of_persons' => $this->input->post('no_of_persons'),
				'dive_id' => $this->input->post('dive_id'),
				//'room_type'=>$room_type1,
				//'no_of_rooms'=>$no_of_rooms_person
			);
			$accoe_amt = 0.00;
			$newExtenAmount = "";
										//echo $this->input->post('acco_exten');
										
			//if($this->input->post('acco_exten') == 1)
			if (isset($_POST['acco_exten']) == 1 ) 
			{
				if($this->input->post('table_name') == "tbl_dccourses")
				{
					//echo $this->input->post('table_name');
					
					$getDccourseE = $this->db->get_where('tbl_dccourses', array('id'=>$this->input->post('product_id')))->result();
					foreach($getDccourseE as $aerate)
					{
						//echo $aerate->accomodation_extension_single;
						//echo $this->input->post('daytype');
						switch($this->input->post('daytype'))
						{
							case 'NM':
							if($this->input->post('accom') == "Yes")
							{
								//echo $this->input->post('accom');
								
								if($this->input->post('accommodation_type') == 1)
								{
									$acexten = explode(',',$aerate->accomodation_extension_single);
									$price = $acexten[0];
									$accoe_amt = $this->input->post('accomvalue') * $price;
									
								}
								else if($this->input->post('accommodation_type') == 2)
								{
									$acexten = explode(',',$aerate->accomodation_extension_twin);
									$price = $acexten[0];
									$accoe_amt = $this->input->post('accomvalue') * $price;
								}
								else if($this->input->post('accommodation_type') == 3)
								{
									$acexten = explode(',',$aerate->accomodation_extension_3person);
									$price = $acexten[0];
									$accoe_amt = $this->input->post('accomvalue') * $price;
								}
								else
								{
									$acexten = explode(',',$aerate->accomodation_extension_quad);
									$price = $acexten[0];
									$accoe_amt = $this->input->post('accomvalue') * $price;
								}
							}
							else
							{
								$acexten = explode(',',$aerate->accomodation_extension_single);
								$price = $acexten[0];
								$accoe_amt = $this->input->post('accomvalue') * $price;
							}
								
							break;
							
							case 'WE':
							if($this->input->post('accom') == "Yes")
							{
								
								if($this->input->post('accommodation_type') == 1)
								{
									$acexten = explode(',',$aerate->accomodation_extension_single);
									$price = $acexten[1];
									$accoe_amt = $this->input->post('accomvalue') * $price;
								}
								else if($this->input->post('accommodation_type') == 2)
								{
									$acexten = explode(',',$aerate->accomodation_extension_twin);
									$price = $acexten[1];
									$accoe_amt = $this->input->post('accomvalue') * $price;
								}
								else if($this->input->post('accommodation_type') == 3)
								{
									$acexten = explode(',',$aerate->accomodation_extension_3person);
									$price = $acexten[1];
									$accoe_amt = $this->input->post('accomvalue') * $price;
								}
								else
								{
									$acexten = explode(',',$aerate->accomodation_extension_quad);
									$price = $acexten[1];
									$accoe_amt = $this->input->post('accomvalue') * $price;
								}
							}
							else
							{
								$acexten = explode(',',$aerate->accomodation_extension_single);
								$price = $acexten[1];
								$accoe_amt = $this->input->post('accomvalue') * $price;
							}	
							break;
							
							case 'PK':
							if($this->input->post('accom') == "Yes")
							{
								
								if($this->input->post('accommodation_type') == 1)
								{
									$acexten = explode(',',$aerate->accomodation_extension_single);
									$price = $acexten[2];
									$accoe_amt = $this->input->post('accomvalue') * $price;
								}
								else if($this->input->post('accommodation_type') == 2)
								{
									$acexten = explode(',',$aerate->accomodation_extension_twin);
									$price = $acexten[2];
									$accoe_amt = $this->input->post('accomvalue') * $price;
								}
								else if($this->input->post('accommodation_type') == 3)
								{
									$acexten = explode(',',$aerate->accomodation_extension_3person);
									$price = $acexten[2];
									$accoe_amt = $this->input->post('accomvalue') * $price;
								}
								else
								{
									$acexten = explode(',',$aerate->accomodation_extension_quad);
									$price = $acexten[2];
									$accoe_amt = $this->input->post('accomvalue') * $price;
								}
							}
							else
							{
								$acexten = explode(',',$aerate->accomodation_extension_single);
								$price = $acexten[1];
								$accoe_amt = $this->input->post('accomvalue') * $price;
							}	
							break;
							case 'SP':
							if($this->input->post('accom') == "Yes")
							{
								
								if($this->input->post('accommodation_type') == 1)
								{
									$acexten = explode(',',$aerate->accomodation_extension_single);
									$price = $acexten[3];
									$accoe_amt = $this->input->post('accomvalue') * $price;
								}
								else if($this->input->post('accommodation_type') == 2)
								{
									$acexten = explode(',',$aerate->accomodation_extension_twin);
									$price = $acexten[3];
									$accoe_amt = $this->input->post('accomvalue') * $price;
								}
								else if($this->input->post('accommodation_type') == 3)
								{
									$acexten = explode(',',$aerate->accomodation_extension_3person);
									$price = $acexten[3];
									$accoe_amt = $this->input->post('accomvalue') * $price;
								}
								else
								{
									$acexten = explode(',',$aerate->accomodation_extension_quad);
									$price = $acexten[3];
									$accoe_amt = $this->input->post('accomvalue') * $price;
								}
							}
							else
							{
								$acexten = explode(',',$aerate->accomodation_extension_single);
								$price = $acexten[3];
								$accoe_amt = $this->input->post('accomvalue') * $price;
							}	
							break;
							
							default:
							break;
						}
						
					}
					//echo $accoe_amt;
									$selectProfile1 = $this->db->get_where('tbl_dcprofile', array('user_id'=>$this->input->post('dive_id')))->row();

						$profileCurrency1 = ucwords(strtoupper($selectProfile1->dccurrency));
						// the Dive center Currency is Also MYR
						if($profileCurrency1 == 'MYR')
						{
							//check wherether the Session is Created
							if($this->session->userdata('dccurreny'))
							{
								$sessionCurrency = $this->session->userdata('dccurreny');
								//Check wherether the Session Currency is also MYR
								if($sessionCurrency == 'MYR')
								{
									$newExtenAmount = $accoe_amt;
								}
								
								else
								{
									$curencyTableValue = $this->db->get_where('tbl_multicurrency',array('from_cur'=>$sessionCurrency, 'to_cur'=>'MYR'))->row();
									
									$newExtenAmount = $accoe_amt / $curencyTableValue->seller_amt;
								}
								
							}
							else
							{
								$newExtenAmount = $accoe_amt;
							}
						}
						// the Dive center Currency is Not MYR
						else
						{
							$myrValueFetch = $this->db->get_where('tbl_multicurrency',array('from_cur'=>$profileCurrency1, 'to_cur'=>'MYR'))->row(); 
							
							$myrValue = $accoe_amt * $myrValueFetch->buyer_amt;
							// check wherether session is created or not
							if($this->session->userdata('dccurreny'))
							{
								$sessionCurrency = $this->session->userdata('dccurreny');
								//Check wherether the Session Currency is also MYR
								if($sessionCurrency == 'MYR')
								{
									$newExtenAmount = $myrValue;
								}
								elseif($profileCurrency1 == $this->session->userdata('dccurreny'))
								{
									$newExtenAmount = $accoe_amt;
								}
								else
								{
									$curencyTableValue = $this->db->get_where('tbl_multicurrency',array('from_cur'=>$sessionCurrency, 'to_cur'=>'MYR'))->row();
									
									$newExtenAmount = $myrValue / $curencyTableValue->seller_amt;
								}
							}
							else
							{
								$newExtenAmount = $myrValue;
							}
						}


				}
				else
				{
					$accoe_amt = 0.00;
					//echo $this->input->post('table_name');
					
					$getDcpackageE = $this->db->get_where('tbl_dcpackage', array('id'=>$this->input->post('product_id')))->result();
					foreach($getDcpackageE as $aerate)
					{
						//echo $aerate->accomodation_extension_single;
						//echo $this->input->post('daytype');
						switch($this->input->post('daytype'))
						{
							case 'NM':
							if($this->input->post('accom') == "Yes")
							{
								//echo $this->input->post('accom');
								
								if($this->input->post('accommodation_type') == 1)
								{
									$acexten = explode(',',$aerate->accomodation_extension_single);
									$price = $acexten[0];
									$accoe_amt = $price;
									
								}
								else if($this->input->post('accommodation_type') == 2)
								{
									$acexten = explode(',',$aerate->accomodation_extension_twin);
									$price = $acexten[0];
									$accoe_amt = $price;
								}
								else if($this->input->post('accommodation_type') == 3)
								{
									$acexten = explode(',',$aerate->accomodation_extension_3person);
									$price = $acexten[0];
									$accoe_amt =  $price;
								}
								else
								{
									$acexten = explode(',',$aerate->accomodation_extension_quad);
									$price = $acexten[0];
									$accoe_amt = $price;
								}
							}
							else
							{
								$acexten = explode(',',$aerate->accomodation_extension_single);
								$price = $acexten[0];
								$accoe_amt = $price;
							}
								
							break;
							
							case 'WE':
							if($this->input->post('accom') == "Yes")
							{
								
								if($this->input->post('accommodation_type') == 1)
								{
									$acexten = explode(',',$aerate->accomodation_extension_single);
									$price = $acexten[1];
									$accoe_amt = $price;
								}
								else if($this->input->post('accommodation_type') == 2)
								{
									$acexten = explode(',',$aerate->accomodation_extension_twin);
									$price = $acexten[1];
									$accoe_amt = $price;
								}
								else if($this->input->post('accommodation_type') == 3)
								{
									$acexten = explode(',',$aerate->accomodation_extension_3person);
									$price = $acexten[1];
									$accoe_amt = $price;
								}
								else
								{
									$acexten = explode(',',$aerate->accomodation_extension_quad);
									$price = $acexten[1];
									$accoe_amt = $price;
								}
							}
							else
							{
								$acexten = explode(',',$aerate->accomodation_extension_single);
								$price = $acexten[1];
								$accoe_amt = $price;
							}	
							break;
							
							case 'PK':
							if($this->input->post('accom') == "Yes")
							{
								
								if($this->input->post('accommodation_type') == 1)
								{
									$acexten = explode(',',$aerate->accomodation_extension_single);
									$price = $acexten[2];
									$accoe_amt = $price;
								}
								else if($this->input->post('accommodation_type') == 2)
								{
									$acexten = explode(',',$aerate->accomodation_extension_twin);
									$price = $acexten[2];
									$accoe_amt =  $price;
								}
								else if($this->input->post('accommodation_type') == 3)
								{
									$acexten = explode(',',$aerate->accomodation_extension_3person);
									$price = $acexten[2];
									$accoe_amt = $price;
								}
								else
								{
									$acexten = explode(',',$aerate->accomodation_extension_quad);
									$price = $acexten[2];
									$accoe_amt =  $price;
								}
							}
							else
							{
								$acexten = explode(',',$aerate->accomodation_extension_single);
								$price = $acexten[1];
								$accoe_amt =  $price;
							}	
							break;
							case 'SP':
							if($this->input->post('accom') == "Yes")
							{
								
								if($this->input->post('accommodation_type') == 1)
								{
									$acexten = explode(',',$aerate->accomodation_extension_single);
									$price = $acexten[3];
									$accoe_amt = $price;
								}
								else if($this->input->post('accommodation_type') == 2)
								{
									$acexten = explode(',',$aerate->accomodation_extension_twin);
									$price = $acexten[3];
									$accoe_amt =  $price;
								}
								else if($this->input->post('accommodation_type') == 3)
								{
									$acexten = explode(',',$aerate->accomodation_extension_3person);
									$price = $acexten[3];
									$accoe_amt = $price;
								}
								else
								{
									$acexten = explode(',',$aerate->accomodation_extension_quad);
									$price = $acexten[3];
									$accoe_amt = $price;
								}
							}
							else
							{
								$acexten = explode(',',$aerate->accomodation_extension_single);
								$price = $acexten[3];
								$accoe_amt = $price;
							}	
							break;
							
							default:
							break;
						}
						// echo $accoe_amt;
					}
						
						$selectProfile1 = $this->db->get_where('tbl_dcprofile', array('user_id'=>$this->input->post('dive_id')))->row();

						$profileCurrency1 = ucwords(strtoupper($selectProfile1->dccurrency));
						// the Dive center Currency is Also MYR
						if($profileCurrency1 == 'MYR')
						{
							//check wherether the Session is Created
							if($this->session->userdata('dccurreny'))
							{
								$sessionCurrency = $this->session->userdata('dccurreny');
								//Check wherether the Session Currency is also MYR
								if($sessionCurrency == 'MYR')
								{
									$newExtenAmount = $accoe_amt;
								}
								
								else
								{
									$curencyTableValue = $this->db->get_where('tbl_multicurrency',array('from_cur'=>$sessionCurrency, 'to_cur'=>'MYR'))->row();
									
									$newExtenAmount = $accoe_amt / $curencyTableValue->seller_amt;
								}
								
							}
							else
							{
								$newExtenAmount = $accoe_amt;
							}
						}
						// the Dive center Currency is Not MYR
						else
						{
							$myrValueFetch = $this->db->get_where('tbl_multicurrency',array('from_cur'=>$profileCurrency1, 'to_cur'=>'MYR'))->row(); 
							
							$myrValue = $accoe_amt * $myrValueFetch->buyer_amt;
							// check wherether session is created or not
							if($this->session->userdata('dccurreny'))
							{
								$sessionCurrency = $this->session->userdata('dccurreny');
								//Check wherether the Session Currency is also MYR
								if($sessionCurrency == 'MYR')
								{
									$newExtenAmount = $myrValue;
								}
								elseif($profileCurrency1 == $this->session->userdata('dccurreny'))
								{
									$newExtenAmount = $accoe_amt;
								}
								else
								{
									$curencyTableValue = $this->db->get_where('tbl_multicurrency',array('from_cur'=>$sessionCurrency, 'to_cur'=>'MYR'))->row();
									
									$newExtenAmount = $myrValue / $curencyTableValue->seller_amt;
								}
							}
							else
							{
								$newExtenAmount = $myrValue;
							}
						}


			//	echo $accoe_amt;
				}
	
			}
			
							
				
			$dummyProduct ="";

			$dummyProduct = array(
				'product_id' => $this->input->post('product_id'),
				'sessionid' => $this->session->userdata('scubbi_sessid'),
				'diverid' => $this->input->post('diverid'),
				'uom' => $this->input->post('product_unit'),
				'product_name' => $this->input->post('product_name'),
				'accom' => $this->input->post('accom'),
				'qty' => $no_of_dive,
				'base_price' => $this->input->post('price'),
				'price' => $this->input->post('price'),
				'season' => $this->input->post('daytype'),
				'no_of_dive' => $no_of_dive,
				'table_name' => $this->input->post('table_name'),
				'user_id' => $this->input->post('dive_id')				
			);
			//echo $accoe_amt;
			$rmrate = 0.0;
			if ($this->input->post('accom') == "Yes")
			{
				

					$rmrate = $this->input->post('price');
					
				$this->db->select('*');
				$this->db->from($this->input->post('table_name'));
				$this->db->where('id',$this->input->post('product_id'));
				$qrm = $this->db->get();
				$resrm = $qrm->result();
				
				
				if($this->input->post('table_name') == 'tbl_dccourses')
				{
					//$r12 = $this->courseRoomrates($resrm , $this->input->post('daytype') , $this->input->post('accommodation_type') , $this->input->post('no_of_persons'));
					
					$r12 = $this->currencyConversation($resrm , $this->input->post('daytype') , $this->input->post('accommodation_type') , $this->input->post('no_of_persons') ,'courseRoomrates' , 0.00);
					$rmrate = $r12['disprice'];
					
				}
				else
				{
				//	$r12 = $this->packageRoomrates($resrm , $this->input->post('daytype') , $this->input->post('accommodation_type') , $this->input->post('no_of_persons'));
				
				$r12 = $this->currencyConversation($resrm , $this->input->post('daytype') , $this->input->post('accommodation_type') , $this->input->post('no_of_persons'),'packageRoomrates' ,0.00);
					$rmrate = $r12['disprice'];
				}

				$dummyProduct["accom_qty"] = 1;
				$dummyProduct["accom_type"] = $this->input->post('accommodation_type');	
				$dummyProduct["price"] = $rmrate;
				$dummyProduct["extension_nights"] = $newExtenAmount;
				$dummyProduct["accomvalue"] = $this->input->post('accomvalue');
						//		echo 	$accoe_amt;				
				$dummyProduct["base_price"] = $rmrate;		
				$dummyAccom = array(
					'product_id' => $this->input->post('product_id'),
					'accom_id' => $this->input->post('product_id'),
					'sessionid' => $this->session->userdata('scubbi_sessid'),
					'diverid' => $this->input->post('diverid'),
					'product_name' => $this->input->post('product_name'),
					'qty' => 1,
					'accom_qty' => 1,
					'accom_basis' => $this->input->post('accommodation_type'),
					//'extension_nights' => $accoe_amt,
					'base_price' => $rmrate,
					'price' => $rmrate,
					'season' => $this->input->post('daytype'),
					'table_name' => $this->input->post('table_name'),
					'user_id' => $this->input->post('dive_id')				
				);
				
				//var_dump($dummyAccom);
				//echo $accoe_amt;
				//exit();
			} 
			else {
				//echo $accoe_amt;
				$rmrate = $this->input->post('price');
				
				$this->db->select('*');
				$this->db->from($this->input->post('table_name'));
				$this->db->where('id',$this->input->post('product_id'));
				$qrm = $this->db->get();
				$resrm = $qrm->result();
				
				if($this->input->post('table_name') == 'tbl_dccourses')
				{
					//echo $accoe_amt;
					//$r12 = $this->courseRoomrates($resrm , $this->input->post('daytype') , $this->input->post('accommodation_type') , $this->input->post('no_of_persons'));
					
					$r12 = $this->currencyConversation($resrm , $this->input->post('daytype') , $this->input->post('accommodation_type') , $this->input->post('no_of_persons') ,'courseRoomrates' , 0.00);
					$rmrate = $r12['disprice'];
					
				}
				else if($this->input->post('table_name') == 'tbl_dcpackage')
				{
					//echo $accoe_amt;
				//	$r12 = $this->packageRoomrates($resrm , $this->input->post('daytype') , $this->input->post('accommodation_type') , $this->input->post('no_of_persons'));
				
				$r12 = $this->currencyConversation($resrm , $this->input->post('daytype') , $this->input->post('accommodation_type') , $this->input->post('no_of_persons'),'packageRoomrates' ,0.00);
					 $rmrate = $r12['disprice'];
				}
				
				$dummyProduct["accom_qty"] = 1;
				$dummyProduct["accom_type"] = $this->input->post('accommodation_type');	
				$dummyProduct["price"] = $rmrate;
				$dummyProduct["extension_nights"] = $newExtenAmount;		
				$dummyProduct["accomvalue"] = $this->input->post('accomvalue');				
				$dummyProduct["base_price"] = $rmrate;		
				$dummyAccom = array(
					'product_id' => $this->input->post('product_id'),
					'accom_id' => $this->input->post('product_id'),
					'sessionid' => $this->session->userdata('scubbi_sessid'),
					'diverid' => $this->input->post('diverid'),
					'product_name' => $this->input->post('product_name'),
					'qty' => 1,
					'accom_qty' => 1,
					'accom_basis' => $this->input->post('accommodation_type'),
					//'extension_nights' => $accoe_amt,
					'base_price' => $rmrate,
					'price' => $rmrate,
					'season' => $this->input->post('daytype'),
					'table_name' => $this->input->post('table_name'),
					'user_id' => $this->input->post('dive_id')				
				);
			}

			$logaddcartdata = "";
			$logaddcartdata .= "Check-in:" . $this->input->post('checkin') . ", Check-out:" . $this->input->post('checkout') . ", Session:". $this->sessid . ", DiverID: " . $this->input->post('diverid') . "\n" .
			"  - ProductID: " . $this->input->post('product_id') . " [" . $this->input->post('product_name') . "], No of Dives:" . $no_of_dive . ", UOM: ". $this->input->post('product_unit') .
			", Unit Price:" . $this->input->post('price') . "\n Accomodation [" . $this->input->post('accom')  . 
			( $this->input->post('accom') == "Yes" ? "], season >>" . $this->input->post('daytype') . " Room selected:" . $this->input->post('accommodation_type') . ", Room rate:" . $rmrate: "] ").
			"\n from table:" . $this->input->post('table_name') . ", dive id:" . 
			$this->input->post('dive_id') ."\n";

			if ( !write_file('application/controllers/logcartpreupdate.txt', $logaddcartdata)){
				echo 'Unable to write the file';
			}	
			$result = "";
			/* if(($this->input->post('table_name') == "tbl_dccourses") || ($this->input->post('table_name') == "tbl_dcpackage"))
			{ */
				if($rmrate > 0.0)
				{
					$result = $this->front_model->insertDummyProduct($data,$dummyProduct,$dummyAccom);
				}
				else
				{
					$this->front_model->clearcart($this->sessid);
					$data1 = "This Room Type is Not Available";
					echo $this->viewCart($data1);
				}	
			/* }
			else
			{
				$result = $this->front_model->insertDummyProduct($data,$dummyProduct,$dummyAccom);
			} */
			
			//$result = $this->front_model->insertDummyProduct($data,$dummyProduct,$dummyAccom);
			
			if(!empty($result))
			{
				if($result['status'] == 1)
				{
					$data1 = "You cannot add more than one product on the same tab";
					echo $this->viewCart($data1);
				}
				else
				{
					$displayCart = 1;
					//echo "djfdgjfdgjf";
					$dummy_id = $result['dummy_id'];
					$dummy_product_id = $result['dummy_product_id'];
					
					if (isset($_POST['acco_exten']) == 1 ) 
					{
						$selectExtenData = $this->db->get_where('tbl_dummy_cart_product_extend',array('dummy_product_id' => $dummy_product_id))->num_rows();
						if($selectExtenData > 0)
						{
							$selectExtenDataRow = $this->db->get_where('tbl_dummy_cart_product_extend',array('dummy_product_id' => $dummy_product_id))->row();
							 
								$this->db->where('id', $selectExtenDataRow->id);
								if($this->db->delete('tbl_dummy_cart_product_extend'))
								{
									$insertExtend = array(
										'product_id' =>$this->input->post('product_id'),
										'diverid' => $this->input->post('diverid'),
										'sessionid' => $this->session->userdata('scubbi_sessid'),
										'product_name' =>"Extend Night",
										'qty' => $this->input->post('accomvalue'),
										'price' => $newExtenAmount,
										'total' => $this->input->post('accomvalue') * $newExtenAmount,
										'dummy_id' => $dummy_id,
										'dummy_product_id' => $dummy_product_id
										);
									if($this->db->insert('tbl_dummy_cart_product_extend', $insertExtend))
									{
										$displayCart = 1;
										
									}
								}
						}
						else
						{
							$insertExtend = array(
								'product_id' =>$this->input->post('product_id'),
								'diverid' => $this->input->post('diverid'),
								'sessionid' => $this->session->userdata('scubbi_sessid'),
								'product_name' =>"Extend Night",
								'qty' => $this->input->post('accomvalue'),
								'price' => $newExtenAmount,
								'total' => $this->input->post('accomvalue') * $newExtenAmount,
								'dummy_id' => $dummy_id,
								'dummy_product_id' => $dummy_product_id
								);
							if($this->db->insert('tbl_dummy_cart_product_extend', $insertExtend))
							{
								$displayCart = 1;
								
							}
						}
					}
					else
					{
						$selectExtenData = $this->db->get_where('tbl_dummy_cart_product_extend',array('dummy_product_id' => $dummy_product_id))->num_rows();
						if($selectExtenData > 0)
						{
							$selectExtenDataRow = $this->db->get_where('tbl_dummy_cart_product_extend',array('dummy_product_id' => $dummy_product_id))->row();

							$this->db->where('id', $selectExtenDataRow->id);
							$this->db->delete('tbl_dummy_cart_product_extend');
						}
								
					}
				}
				
			}
			
			if(!empty($result))
			{				
				if($result['status'] == 1)
				{
					$data1 = "You cannot add more than one product on the same tab";
					echo $this->viewCart($data1);
				}
				else if($result['status'] == 2)
				{
					$displayCart = 1;

					$dummy_id = $result['dummy_id'];
					$dummy_product_id = $result['dummy_product_id'];
					if(isset($optional_service) && is_array($optional_service))
					{
						//echo "djfdgjfdgjf";
						$option_name_chk[]="";
						$option_price_chk[]="";
						$j=0;
						$this->db->where('sessionid',$this->session->userdata('scubbi_sessid'));
						$this->db->where('diverid',$this->input->post('diverid'));
						$this->db->where('dummy_product_id',$dummy_product_id);
						$this->db->where('dummy_id',$dummy_id);
						$this->db->delete('tbl_dummy_cart_product_optional');

						foreach($optional_service as $row_option)
						{
							$explode_data = explode('-',$row_option);
							$i=1;
							foreach($explode_data as $row_explode)
							{
								 // echo $row_explode."<br>";
								if($i == 1) 
								{
									$option_name_chk[$j]=$row_explode;
								}
								else
								{
									//$
									
									$option_price_chk[$j]=$row_explode;
								}
								$i++;
							}
								//var_dump( $explode_data);
							$d = 0;
							$sel = 0;
							foreach($opt_prop as $prod) {
								$prodpart = explode('/',$prod);
								$logaddcartdata .= "  ~ comparing " . $prodpart[1] . " with " . $option_name_chk[$j] . " >>" ;
								if ($prodpart[1]==$option_name_chk[$j]) {
									$sel = $d;
									$logaddcartdata .= " [$d] $sel \n";
								} else {
									$logaddcartdata .= " $sel \n";
								}
								$d++;
							}

							$qty = $opt_qty[$sel]; //1;

							$logaddcartdata .= "   - Optional " . $option_name_chk[$j] . " >" . $sel . " qty " . $qty . " X " . $option_price_chk[$j] . "\n";
							
							$insertOptional = array(
								'product_id' =>$this->input->post('product_id'),
								'diverid' => $this->input->post('diverid'),
								'sessionid' => $this->session->userdata('scubbi_sessid'),
								'product_name' =>$option_name_chk[$j],
								'qty' => $qty,
								'price' => $option_price_chk[$j],
								'total' => $qty * $option_price_chk[$j],
								'dummy_id' => $dummy_id,
								'dummy_product_id' => $dummy_product_id
							);
							if($this->db->insert('tbl_dummy_cart_product_optional', $insertOptional))
							{
								$displayCart = 1;
								
							}
							$j++;

						}
						
					}//$data1 = "Cart successfully updated";
	//echo $this->viewCart($data1);
				}
				else
				{
					$displayCart = 1;
					//echo "djfdgjfdgjf";
					$dummy_id = $result['dummy_id'];
					$dummy_product_id = $result['dummy_product_id'];
					if(isset($optional_service) && is_array($optional_service))
					{
						//echo "djfdgjfdgjf";
						$option_name_chk[]="";
						$option_price_chk[]="";
						$j=0;
						$this->db->where('sessionid',$this->session->userdata('scubbi_sessid'));
						$this->db->where('diverid',$this->input->post('diverid'));
						$this->db->where('dummy_product_id',$this->input->post('dummy_product_id'));
						$this->db->where('dummy_id',$this->input->post('dummy_id'));
						$this->db->delete('tbl_dummy_cart_product_optional');

						foreach($optional_service as $row_option)
						{
							$explode_data = explode('-',$row_option);
							$i=1;
							foreach($explode_data as $row_explode)
							{
								 // echo $row_explode."<br>";
								if($i == 1) 
								{
									$option_name_chk[$j]=$row_explode;
								}
								else
								{
									//$
									
									$option_price_chk[$j]=$row_explode;
								}
								$i++;
							}
								//var_dump( $explode_data);
							$d = 0;
							$sel = 0;
							foreach($opt_prop as $prod) {
								$prodpart = explode('/',$prod);
								$logaddcartdata .= "  ~ comparing " . $prodpart[1] . " with " . $option_name_chk[$j] . " >>" ;
								if ($prodpart[1]==$option_name_chk[$j]) {
									$sel = $d;
									$logaddcartdata .= " [$d] $sel \n";
								} else {
									$logaddcartdata .= " $sel \n";
								}
								$d++;
							}

							$qty = $opt_qty[$sel]; //1;

							$logaddcartdata .= "   - Optional " . $option_name_chk[$j] . " >" . $sel . " qty " . $qty . " X " . $option_price_chk[$j] . "\n";
							
							$insertOptional = array(
								'product_id' =>$this->input->post('product_id'),
								'diverid' => $this->input->post('diverid'),
								'sessionid' => $this->session->userdata('scubbi_sessid'),
								'product_name' =>$option_name_chk[$j],
								'qty' => $qty,
								'price' => $option_price_chk[$j],
								'total' => $qty * $option_price_chk[$j],
								'dummy_id' => $dummy_id,
								'dummy_product_id' => $dummy_product_id
							);
							if($this->db->insert('tbl_dummy_cart_product_optional', $insertOptional))
							{
								$displayCart = 1;
								
							}
							$j++;

						}
						
					}
					
					$q = 0;
					if (isset($opt_qty)) {
						foreach($opt_qty as $iqty) {
							$logaddcartdata .= "   >> $q > $iqty " . $opt_prop[$q] . " \n";
							$q++;
						}
					}
					///
					if ( !write_file('application/controllers/logaddtocart.txt', $logaddcartdata)){
						echo 'Unable to write the file';
					}	
					
					
				}
			}
			if($displayCart == 1)
			{
				//$data1 = "Product added to your Cart";
				$data1 = "Kindly click [Add to My Dive Cart] for each diver if you are booking for a group.";
				echo $this->viewCart($data1);
			}

		}
		function viewCart($data1)
		{
			$this->module = "Front/viewCart";
			$this->putvlog($this->session->userdata('user_type'),0,0,0,0,0);
			$resultOutput = '';
			$this->db->select('*');
			$this->db->where('sessionid',$this->sessid);
			$this->db->from('tbl_dummy_cart_product');
			$query = $this->db->get();
			$res = $query->result();
			$total = 0;

			$resultOutput ='<table class="table table-striped" id="cart_details"><tr style="color:red;font-weight:bold"><td colspan="5">'.$data1.'</td></tr>'; 

			$i=1; 
			foreach($res as $rrow)
			{
				$resultOutput = $resultOutput.'
				<tr>
					<td style="padding:3px;">'.$rrow->diverid.'</td>
					<td colspan="4" style="padding:3px;">'.$rrow->product_name.'</td>
				</tr>';
				

			// Accomodation List
				$this->db->select('*');
				$this->db->from('tbl_dummy_cart_product_accomodation');
			// $this->db->where('sessionid',$this->sessid);
				$this->db->where('dummy_product_id',$rrow->id);
				$qacc = $this->db->get();
				$resacc = $qacc->result();
				foreach($resacc as $arow1)
				{
					$resultOutput .= '
					
					<tr>
					<td></td>
					<td style="padding:3px;" > Accomodation - </td>
					<td style="padding:3px;" colspan="2">';
					switch($arow1->accom_basis) {
						case 1:
						$resultOutput .= ' Single';
						break;
						case 2:
						$resultOutput .= ' Twin';
						break;
						case 3:
						$resultOutput .= ' Triple';
						break;
						case 4:
						$resultOutput .= ' Quad';
						break;
					}

					$resultOutput .= '</td>
					<td style="padding:3px;color:red;width:10px;" >&nbsp;</td>
					</tr>';
					
					

				}
				
				$resultOutput .= '<tr>
				<td style="padding:3px;"></td>
				<td style="padding:3px;" colspan="2"><b>'.$rrow->currency.'</b>&nbsp;&nbsp;'.$rrow->price.'&nbsp;X&nbsp;'.$rrow->qty.'&nbsp;&nbsp;</td>
				<td style="padding:3px;">'.number_format($rrow->qty * $rrow->price,2).'</td>
				<td style="padding:3px;color:red;" class="removeCart1" data-pk="'.$rrow->id.'" data-tbl="tbl_dummy_cart_product"><i class="fa fa-remove"></i></td>

				</tr>
				
				';
				$total=$total + $rrow->qty * $rrow->price;
				
				
			//	Extend Night
				$this->db->select('*');
				$this->db->from('tbl_dummy_cart_product_extend');
			// $this->db->where('sessionid',$this->sessid);
				$this->db->where('dummy_product_id',$rrow->id);
				$query5 = $this->db->get();
				$res5 = $query5->result();
				foreach($res5 as $rrow5)
				{
					$resultOutput .= '<tr>
					<td style="padding:3px;">Extend Night</td>
					<td style="padding:3px;" colspan="2"><b>'.$rrow->currency.'</b>&nbsp;&nbsp;'.$rrow5->price.'&nbsp;X&nbsp;'.$rrow5->qty.'&nbsp;&nbsp;</td>
					<td style="padding:3px;">'.number_format($rrow5->qty * $rrow5->price,2).'</td>
					<td style="padding:3px;color:red;" class="removeCart2" data-pk="'.$rrow5->id.'" data-tbl="tbl_dummy_cart_product"><i class="fa fa-remove"></i></td>

					</tr>
					
					';
					$total=$total + $rrow5->qty * $rrow5->price;
				}
			// Optional Product List
				$this->db->select('*');
				$this->db->from('tbl_dummy_cart_product_optional');
			// $this->db->where('sessionid',$this->sessid);
				$this->db->where('dummy_product_id',$rrow->id);
				$query1 = $this->db->get();
				$res1 = $query1->result();
				foreach($res1 as $rrow1)
				{
					$resultOutput = $resultOutput.'
					
					<tr>
						<td style="padding:3px;">'.$rrow1->diverid.'</td>
						<td colspan="4" style="padding:3px;">'.$rrow1->product_name.'</td>
					</tr>
					<tr>
						<td style="padding:3px;"></td>
						<td style="padding:3px;" colspan="2"><b>'.$rrow->currency.'</b>&nbsp;&nbsp;'.$rrow1->price.'&nbsp;X&nbsp;'.$rrow1->qty.'&nbsp;&nbsp;</td>
						<td style="padding:3px;">'.number_format($rrow1->qty * $rrow1->price,2).'</td>
						<td style="padding:3px;color:red;width:10px;" class="removeCart" data-pk="'.$rrow1->id.'" data-tbl="tbl_dummy_cart_product_optional"><i class="fa fa-remove"></a></td>
					</tr>';
					$total=$total + $rrow1->qty * $rrow1->price;
				}
				$i++;
			}
			$chkq = $this->db->query("SELECT sessionid,product_name,sum(accom_qty/accom_basis) as basis, count(accom_basis) as cnt, accom_basis FROM `tbl_dummy_cart_product` WHERE sessionid = '". $this->sessid ."' group by sessionid, product_id, product_name, accom_basis");
			$debug="No";
			$comp = 0;
			$count=0;
			$basis=0;
			$mod=0;
			$bchk = 0;
			$icnt = 0;
			$chkres = $chkq->result();
			foreach($chkres as $crow) {
				$comp += round($crow->basis * 10) / 10;
				$count += $crow->cnt;
				$basis += $crow->accom_basis;
				$mod = fmod($comp,1);
				$bchk += $crow->accom_basis * (round($crow->basis * 10) / 10);
				$icnt++;
			}

			$resultOutput = $resultOutput.'<tr><td>&nbsp;</td><td>&nbsp;</td><td><b>Total</b>&nbsp;'.($debug=="Yes" ? $comp.','.$count.','.$basis.','.$mod.','.$bchk : "").'</td><td>'.number_format($total,2).'</td><td>'. (($count >= $bchk) && ($count >= $this->session->userdata('noofperson')) ? '√<input type="hidden" value="GOOD" name="verify"/>' : '<input type="hidden" value="BAD" name="verify"/>') . ( $debug=="Yes" ? ',' . $icnt . ',' . $this->session->userdata('noofperson') : '') .'</td></tr></table>';
			return $resultOutput;
		}
		function removeCartDetails()
		{
			$this->module = "Front/removeCartDetails";
			$this->putvlog($this->session->userdata('user_type'),0,0,0,0,0);
			$id = $_POST['product_id'];
		//$table = $_POST['table'];
		//echo "product removed".$id;
		//echo $this->viewCart($data);
			$this->db->select('*');
			$this->db->from('tbl_dummy_cart_product');
			$this->db->where('id', $id);
			$query = $this->db->get();
			$res = $query->result();
			foreach($res as $prdt_row)
			{
				$Qty = $prdt_row->qty;
				$newqty = $Qty-1;
				if($newqty > 0)
				{
					$data_val = array('qty'=>$newqty);
					$this->db->where('id', $prdt_row->id);
					if($this->db->update('tbl_dummy_cart_product', $data_val))
					{ 
						$opt_table = $this->db->get_where('tbl_dummy_cart_product_optional', array('dummy_product_id', $id));
						if($opt_table->num_rows() > 0)
						{	
							foreach($opt_table->result() as $opt_table_row)
							{
						//echo "hai";
								$qty_opt = $opt_table_row->qty;

								if($qty_opt <= $newqty)
								{

									$abd = "Deleted Successfully";
									echo $this->viewCart($abd);
								}
								else
								{	

									$qtty_opt = $qty_opt - 1;
									$qtty_opt12 = array('qty'=>$qtty_opt);
									$this->db->where('id', $opt_table_row->id);
									if($this->db->update('tbl_dummy_cart_product_optional', $qtty_opt12))
									{
										$data = "Deleted Successfully!";
										echo $this->viewCart($data);
									}
								} 
							}
						}
						else
						{
							$data = "Deleted Successfully!";
							echo $this->viewCart($data);
						}

					}
				}
				else
				{
					if($this->db->delete('tbl_dummy_cart_product', array('id'=>$id)))
					{
						if($this->db->delete('tbl_dummy_cart_product_optional', array('dummy_product_id'=>$id)))
						{
							$data = "Deleted Successfully!";
							echo $this->viewCart($data);
						}
					}

				}
			//echo $this->viewCart($abc);
			}
		}
		function removeCartDetails2()
		{
			$this->module = "Front/removeCartDetails2";
			$this->putvlog($this->session->userdata('user_type'),0,0,0,0,0);
			$id = $_POST['product_id'];

			$this->db->select('*');
			$this->db->from('tbl_dummy_cart_product_extend');
			$this->db->where('id', $id);
			$query = $this->db->get();
			$res = $query->result();
			foreach($res as $prdt_row)
			{
				$qty_extn = $prdt_row->qty;
				$qty_del_extn = $qty_extn - 1;
				if($qty_del_extn > 0)
				{
					$new_qty_extn = array('qty'=>$qty_del_extn);
					$this->db->where('id', $prdt_row->id);
					$this->db->update('tbl_dummy_cart_product_extend', $new_qty_extn);
					$data = "Deleted Successfully";
					echo $this->viewCart($data);
				}
				else
				{
					if($this->db->delete('tbl_dummy_cart_product_extend', array('id'=>$id)))
					{
						$data = "Deleted Successfully!";
						echo $this->viewCart($data);
					}
				}
			}
		}
		function removeCartDetails1()
		{
			$this->module = "Front/removeCartDetails1";
			$this->putvlog($this->session->userdata('user_type'),0,0,0,0,0);
			$id = $_POST['product_id'];

			$this->db->select('*');
			$this->db->from('tbl_dummy_cart_product_optional');
			$this->db->where('id', $id);
			$query = $this->db->get();
			$res = $query->result();
			foreach($res as $prdt_row)
			{
				$qty_optl = $prdt_row->qty;
				$qty_del_optl = $qty_optl - 1;
				if($qty_del_optl > 0)
				{
					$new_qty_optl = array('qty'=>$qty_del_optl);
					$this->db->where('id', $prdt_row->id);
					$this->db->update('tbl_dummy_cart_product_optional', $new_qty_optl);
					$data = "Deleted Successfully";
					echo $this->viewCart($data);
				}
				else
				{
					if($this->db->delete('tbl_dummy_cart_product_optional', array('id'=>$id)))
					{
						$data = "Deleted Successfully!";
						echo $this->viewCart($data);
					}
				}
			}
		}
		function becomeapartner()
		{
			$this->module = "Front/becomePartner";
			$this->putvlog($this->session->userdata('user_type'),0,0,0,0,0);
		//$data['help'] = $this->front_model->get_help();
		//$this->load->view('front/header');
			$this->load->view('front/becomea_partner');
			$this->load->view('front/loginModel');
			$this->load->view('front/footer');
		}
		function addBecomeapartner()
		{
			$this->module = "Front/addBecomePartner";
			$this->putvlog($this->session->userdata('user_type'),0,0,0,0,0);
			if($this->input->post('textdcn'))
			{
				$email = $this->input->post('textea');
				$data = array(
					'dive_center_name'=>$this->input->post('textdcn'),
					'contact_person'=>$this->input->post('textcp'),
					'business_registration_no'=>$this->input->post('textbrn'),
					'country'=>$this->input->post('textsc'),
					'island'=>$this->input->post('texti'),
					'email_address'=>$this->input->post('textea'),
					'phone_no'=>$this->input->post('textpn')
				);
				if($this->front_model->addBecomeapartner($data))
				{
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
							Dear Partner,
							<br><br>
							Thank you for expressing your interest in joining our growing network of partners in www.scubbi.com -Asia&#39;s leading marketplace for dive centres & resorts. 
								<br><br>
								Our marketing team will be in touch with you shortly to assist you in your on boarding process.

								<br>
								If you did not make this request, please ignore this message.
								<br>
								<a href="mailto:partnersupport@scubbi.com">partnersupport@scubbi.com.</a>
								<br><br>
								Thank you.
								<br><br>
								Sincerely,<br><br>
								Scubbi Marketing Team<br><br>
								<img src="https://www.scubbi.com/assets/images/logo-new-chrcle-small.jpg" alt="" class="img-responsive" width="100px" height="100px">
												
						</body>
						</html>';
					// Also, for getting full html you may use the following internal method:
					//$body = $this->email->full_html($subject, $message);

					$result = $this->email
							->from('enquiry@scubbi.com')
							->reply_to('enquiry@scubbi.com')    // Optional, an account where a human being reads.
							->to($email)
							->subject($subject)
							->message($body)
							->send();

					var_dump($result);
					echo '<br />';
					echo $this->email->print_debugger();
				}
			}
		}
		public function pdd_overview($country_id)
		{

			$this->module = "Front/PDDoverview";
			$this->putvlog($this->session->userdata('user_type'),0,0,0,0,0);
			$config1['zoom'] = "13";
			
			$this->googlemaps->initialize($config1);
			//$coords = $this->front_model->get_divepointcoordinates($country_id);
			$aa = $this->db->get_where('tbl_island',array('country_id'=>$country_id))->result();
					//$markers = "";
			foreach($aa as $islands)
			{
			
				$this->db->select('*');
				//$this->db->where('country_id',$country);
				$this->db->where('island_id',$islands->island_id);
				$numb_rows = $this->db->get('tbl_divepoints')->num_rows();
				$coords = $this->db->get('tbl_divepoints')->result();
					
				if($numb_rows > 0)
				{
					foreach ($coords as $coordinate) {
						$marker = array();
						$marker1 = array();
						//$marker['position'] = $coordinate->coords_x.','.$coordinate->coords_y;
						$marker['position'] = $coordinate->coords_x.','.$coordinate->coords_y;
						$marker['title'] = $coordinate->name;
						$marker['description'] = $coordinate->name;
						$marker['infowindow_content'] = $coordinate->name;
					}
					//$marker1['position'] = '4.2105, 101.9758';
					//$marker1['icon'] = 'http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=|9999FF|000000';
					//$this->googlemaps->add_marker($marker1);
				
				
					$icon = base_url('upload/2.png');
						//$get_id = $get_val->id;
						$data1=$this->db->get_where('tbl_dcprofile', array('dcislands' => $islands->island_id));
					//$this->db->get('tbl_dcprofile')->result_array(); 
						foreach ($data1->result() as $a) 
						{
							$marker1['position'] = $a->dcgps_x.','.$a->dcgps_y;
							$marker1['icon'] = $icon;
							$marker1['infowindow_content'] = $a->dcname;
							$marker1['title'] = $a->dcname;
					//
						}
						
						
						$this->googlemaps->add_marker($marker);
						$this->googlemaps->add_marker($marker1);
				}
				else
				{
					$marker = array();
					$marker['position'] = '4.2105, 101.9758';
					$this->googlemaps->add_marker($marker);
				}
			}
		 // Create the map
			$data['map'] = $this->googlemaps->create_map();
		//$data['total_rows'] = $this->db->count_all('special_offer');
			$data['cid_dive'] = $country_id;
			$data['populardivedestination'] = $this->front_model->get_pdd_overview($country_id);

			if($data['populardivedestination'] == 'fail')
			{
				redirect('front/error_page');
				//$this->load->view('front/error_page');
			}
			else
			{
				$this->load->view('front/populardivingOverview', $data);
				$this->load->view('front/loginModel');
			}

		}
		function divesitesOverview($id)
		{
			$this->module = "Front/DiveSiteOverview";
			$this->putvlog($this->session->userdata('user_type'),0,0,0,0,0);
			$data['divesitesOverview'] = $this->front_model->get_divesitesOverview($id);
		//$this->load->view('front/tellmemore', $data);
			if($data['divesitesOverview'] == 'fail')
			{
				redirect('front/error_page');
				//$this->load->view('front/error_page');
			}
			else
			{
				$this->load->view('front/divesitesOverview', $data);
				$this->load->view('front/loginModel');
			}
		} 
		public function contactDiveCenter($dcid)
		{

			$this->module = "Front/contactDiveCenter";
			$this->putvlog($this->session->userdata('user_type'),0,$dcid,0,0,0);
			$data['dcid']= $dcid;
			$this->load->view('front/header');
			$this->load->view('front/contact_dive_center',$data);
			$this->load->view('front/loginModel');
			$this->load->view('front/footer');

		}
		function CheckEmailAvalability()
		{
			$this->module = "Front/checkEmailAvail";
			$this->putvlog($this->session->userdata('user_type'),0,0,0,0,0);
			$email = $this->input->post('email');
			$emailCheck = $this->db->get_where('tbl_becomeapartner',array('email_address' =>$email));
			if($emailCheck->num_rows() == 0)
			{
			//echo $emailCheck->num_rows();
				echo "1";
			}
			else
			{
			//echo $emailCheck->num_rows();
				echo "Email-id already exist, please use another";
			}
			
		}
		function CheckEmailAvalabilitySignUp()
		{
			$this->module = "Front/checkEmailAvailSU";
			$this->putvlog($this->session->userdata('user_type'),0,0,0,0,0);
			$email = $this->input->post('email');
			$emailCheck = $this->db->get_where('tbl_customerprofile',array('email' =>$email));
			if($emailCheck->num_rows() == 0)
			{
			//echo $emailCheck->num_rows();
				echo "1";
			}
			else
			{
			//echo $emailCheck->num_rows();
				echo "Email-id already exist, please use another";
			}
			
		}
		function divecenterPopup()
		{
			$this->module = "Front/DiveCenterPopup";
			$this->putvlog($this->session->userdata('user_type'),0,0,0,0,0);

			$sDate =  $this->input->post('sdate_popup');
			$eDate =$this->input->post('edate_popup');
			$no_of_persons = $this->input->post('nop_popup');
			$id = $this->input->post('diveid');

			if($this->front_model->send_DivecenterData())
			{
				redirect(base_url('Front/divecenter/'.$id.'/'.$sDate.'/'.$eDate.'/'.$no_of_persons));
				//echo base_url()."divecenter(".$id.",".$sDate.",".$eDate.",".$no_of_persons.")";
				//echo $id."/".$sDate."/".$eDate."/".$no_of_persons;
			}

		}				
		function displayDiveFilter()
		{
			$a="";
			$country_id = $this->input->post('country_id');
			$island_id = $this->input->post('island_id');
			$Sdate = $this->input->post('Sdate');
			$Edate = $this->input->post('Edate');
			$country = $this->input->post('country');
			$islands = $this->input->post('islands');
			$Noofpersons = $this->input->post('Noofpersons');
			$language = $this->input->post('checkboxes');
			$infrastructure = $this->input->post('checkboxes1');
			$language_chk[]="";	


			$this->db->select('*');
			$this->db->from('tbl_dcprofile');
			$this->db->where('dccountry', $country);
			$this->db->where('dcislands', $islands);
			//$this->db->where_in('dclanguage', $language_chk);
			$query = $this->db->get();
			$q1 = $query->result();
			$lan[] = "";
			$i=0;

			$arrayVal[]="";
			$ddd="";
			$j=1;
			$d=1;
			foreach($q1 as $row1)
			{
				$dclanguage = $row1->dclanguage;
				$lan = explode(",",$dclanguage);
				
				foreach($lan as $lan1)
				{
				//echo $j;
					if(isset($language) && is_array($language))
					{ 
					//var_dump($language);

						foreach($language as $lat1)
						{

							if($lan1 == $lat1)
							{
								$this->db->select('*');
								$this->db->from('tbl_dcprofile');
								$this->db->where('id', $row1->id);
								$this->db->where('dccountry', $country);
								$this->db->where('dcislands', $islands);
								$query = $this->db->get();
								$data = $query->result();

								foreach($data as $rowsearch1)
								{
									$arrayVal[$j] = $rowsearch1->id;
									//$a = $rowsearch->id;
								//	if()
									//echo $j;
									//var_dump($arrayVal);
									
									
								}

								
								//echo $j."<br>";
								$k=1;

								
								
								
							}
							
							$j++;
						}
						

					}
					$dcinfra = $row1->dcfacilities;
					$infra = explode(",",$dcinfra);

					foreach($infra as $infra1)
					{
				//echo $j;
						if(isset($infrastructure) && is_array($infrastructure))
						{ 
					//var_dump($language);

							foreach($infrastructure as $infrastructure1)
							{

								if($infra1 == $infrastructure1)
								{
									$this->db->select('*');
									$this->db->from('tbl_dcprofile');
									$this->db->where('id', $row1->id);
									$query2 = $this->db->get();
									$data2 = $query2->result();

									foreach($data2 as $rowsearch2)
									{
										$arrayVal[$d] = $rowsearch2->id;
									//$a = $rowsearch->id;
								//	if()
									//echo $j;
									//var_dump($arrayVal);


									}


								//echo $j."<br>";
									$k=1;




								}

								$d++;
							}


						}


					}
				}

			}

			$q=1;
			$xx[]="";
			foreach(array_unique($arrayVal) as $tt)
			{
				$xx[$q]= $tt;
				$q++;
			//echo $tt."<br>";
				$this->db->select("*");
				$this->db->where('id' ,$tt);
				$this->db->where('dccountry', $country);
				$this->db->where('dcislands', $islands);
				$getv = $this->db->get('tbl_dcprofile');
				$rs = $getv->result();
				foreach($rs as $rowsearch)
				{
					$result='
					<div class="col-md-6" >
					<div class="row" >
					<div class="ajax_result">
					<div class="col-md-12">
					<div class="thumbnail" style="border:3px solid #000;height: 300px;">
					';

					$date = new DateTime(str_replace("/","-",$Sdate));
					$newStart = $date->format('d-m-Y');

					$date1 = new DateTime(str_replace("/","-",$Edate));
					$newEnd = $date1->format('d-m-Y');

										// Check for product from Leisure Dive
					$this->db->where('user_id',$rowsearch->user_id);
					$this->db->where('product_status','Available');
					$this->db->order_by('product_price','asc');
					$dclprod = $this->db->get('tbl_dcleisure')->result_array();
										//$data=$this->db->get('tbl_country')->result_array(); 
					$pdesc = "";
					foreach ($dclprod as $dcp) {
						$pdesc = "From RM" . $dcp['product_price'] . ($dcp['max_dive_day'] == 0 ? "" : " (" .$dcp['max_dive_day'] . " dives/day)");
					}
					if ($pdesc == "") {
						$this->db->where('user_id',$rowsearch->user_id);
						$this->db->where('product_status','Available');
						$this->db->order_by('product_normal_rate','asc');
						$dccprod = $this->db->get('tbl_dccourses')->result_array();
						foreach ($dccprod as $dcp) {
							$pdesc = "From RM" . $dcp['product_normal_rate'] . ($dcp['max_dive_day'] == 0 ? "" : " (" .$dcp['max_dive_day'] . " dives/day)");
						}
					}
					if ($pdesc == "") {
						$pdesc = "Coming soon!";
					}										

					$result =$result.'
					<a href="'.base_url().'Front/divecenter/'.$rowsearch->id.'/'. $newStart.'/'.$newEnd.'/'.$Noofpersons .'" target="_blank">
					<img src="'.base_url().'upload/DCprofile/'. $rowsearch->dcimage.'" alt="Nature" style="width:350px;height:200px;">
					<div class="caption">
					<div class="row">
					<div class="col-md-6" style="font-size: 11px;padding-bottom: 10px;">
					<a target="_blank" href="'. base_url().'Front/divecenter/'.$rowsearch->id.'/'. $newStart.'/'.$newEnd.'/'.$Noofpersons.'" style="font-size:13px;">
					'.$rowsearch->dcname.'<br>
					'.$pdesc.'</a>
					</div>
					<div class="col-md-6" style="font-size: 11px;">
					';
					$dcaffliation = $rowsearch->dcaffiliation; 
					$fetch_dcaffliation = explode(",",$dcaffliation);

					$dclanguage = $rowsearch->dclanguage; 
					$fetch_dclang = explode(",",$dclanguage);

					foreach($fetch_dcaffliation as $fvdc)
					{
						$result =$result.'<span style="margin: 0px;text-align: right;float: right;padding-bottom: 0px;">';
						$result =$result.$fvdc.' | ';
						$result =$result. '</span>';
					}

					foreach($fetch_dclang as $fvdclang)
					{
						$result =$result. '<input type="hidden" name="language" value="'.$fvdclang.'">';
					}
					$result =$result.'
					<BR>
					';

					$this->db->select('round(avg((`price_rating`+ `services_rating` + `facilities_rating` + `equipment_rating`)/4),1) as arating, count(*) cnt');
					$this->db->where('divecenter_id',$rowsearch->user_id);
					$dcrev = $this->db->get('tbl_review')->result_array();
					$rdesc = "";
					$rcnt = "";
					foreach ($dcrev as $dcr) {
						if ($dcr['cnt']  == 0) {
							$rdesc = "no rating yet.";
						} else {
							$rdesc = $dcr['arating'];
							$rcnt = $dcr['cnt'];
						}
					}


					$result =$result.'<span style="">'.$rdesc; if ($rdesc != 'no rating yet.'){ $result =$result.' <i class="fa fa-star" aria-hidden="true" style="color:#ffe63b;"></i>'.$rcnt . ' Reviews"' ; } $result =$result.'</span>
					</div>
					</div>
					</div>
					</a>
					</div>
					</div>
					</div>
					</div>
					</div>';

					echo $result;
				}

			}
		//var_dump($xx);
//var_dump(uni);		


		//print_r( $arrayVal);

		//echo $ddd;
		//var_dump( $language_chk);



		}
		function subscribe()
		{
			$email = $this->input->post('email_id');
			$data = array(
					'email_id'=> $this->input->post('email_id'),
				);
			if($this->db->insert('tbl_subscribe', $data))
			{
				$this->load->library('email');

				$subject = 'Confirm your subscription to the Scubbi Diving Portal News email list';
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
						You received this message because someone requested an email subscription for '.$email.' to a Scubbi Diving Portal.  If you did not make this request, please ignore the rest of this message.
							<br><br>
							Hello there,
							<br>
							You recently requested an email subscription to Scubbi Diving Portal . We cant wait to send the updates you want via email.
							<br>
							https://www.scubbi.com
							<br><br>
							--
							This message was sent to you by Scubbi diving Portal (https://www.scubbi.com)
							You received this message because someone requested a subscription to the feed.
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
		}
		function courseRoomrates($data , $daytype , $accom_type , $no_of_persons)
		{
			
			foreach($data as $row)
			{
				$data116 = $this->db->get_where('tbl_dcprofile', array('user_id'=>$row->user_id))->row();
				$dccur = $data116->dccurrency;
				$amount_type ="";
				$amount = 0;
				$disprice = 0;
				$accom = "";
				$dBPAmount = 0;
				
				switch($daytype) 
				{
					case "WE":
						If ($row->product_inclusive_accomodation == "Yes") 
						{
							//Accommodation Rates
							if($row->apply_promo == 'Yes')
							{
								$promoStartDate = $row->start_date;
								$promoEndDate = $row->end_date;
								$current_date = new DateTime();
								$cDate = $current_date->format("Y-m-d");
								if($cDate >= $promoStartDate && $cDate <= $promoEndDate)
								{
	//if the Promo is Applied means then to check whether the apply_promo_bilk_discount  
									if($row->apply_promo_bilk_discount == 'Yes')
									{
										$Srange = explode(',',trim($row->range_start,','));
										$Drange = explode(',',trim($row->range_end, ','));
										$dBPAmount ="";
										if($accom_type == 1)
										{
											$dBPAmount = explode(',',trim($row->apply_promo_bulk_single_room, ','));
										}
										else if($accom_type == 2)
										{
											$dBPAmount = explode(',',trim($row->apply_promo_bulk_twin_room, ','));
										}
										else if($accom_type == 3)
										{
											$dBPAmount = explode(',',trim($row->apply_promo_bulk_three_person_room, ','));
										}
										else
										{
											$dBPAmount = explode(',',trim($row->apply_promo_bulk_quad_room, ','));
										}
										$i = 1;
										$j = 0;
										foreach($Srange as $start_range)
										{
											if($no_of_persons >= $start_range && $no_of_persons <= $Drange[$j] )
											{
												$amount = $dBPAmount[$i];
											}
											$i += 4;
											$j++;
										}
										if($amount > 0)
										{
											
											//$amount_type = "apply_promo_bilk_discount";
											return array(
												'accom' => "Yes",
												'disprice' => $amount,
											);
											
										}
										else
										{
											
											$accom = "Yes";
											$amt1 = '';
											//$amount_type = "apply_promo";
											if($accom_type == 1)
											{
												$amt1 = explode(',',trim($row->apply_promo_single_room, ','));
											}
											else if($accom_type == 2)
											{
												$amt1 = explode(',',trim($row->apply_promo_twin_room, ','));
											}
											else if($accom_type == 3)
											{
												$amt1 = explode(',',trim($row->apply_promo_three_person_room, ','));
											}
											else
											{
												$amt1 = explode(',',trim($row->apply_promo_quad_room, ','));
											}
											
											$amt1 = explode(',',trim($row->apply_promo_single_room,','));
											$disprice = $amt1[1];
											
											return array(
												'accom' => $accom,
												'disprice' => $disprice,
											);
										}
										
									}
									else
									{
										
										if($row->discount_bulk_purchase == 'Yes')
										{
											$Srange = explode(',',trim($row->range_start,','));
											$Drange = explode(',',trim($row->range_end, ','));
											$dBPAmount = 0;	
											
											if($accom_type == 1)
											{
												$dBPAmount = explode(',',trim($row->apply_discount_single_room, ','));
											}
											else if($accom_type == 2)
											{
												$dBPAmount = explode(',',trim($row->apply_discount_twin_room, ','));
											}
											else if($accom_type == 3)
											{
												$dBPAmount = explode(',',trim($row->apply_discount_three_person_room, ','));
											}
											else
											{
												$dBPAmount = explode(',',trim($row->apply_discount_quad_room, ','));
											}
												
											
											$i = 1;
											$j = 0;
											foreach($Srange as $start_range)
											{
												if($no_of_persons >= $start_range && $no_of_persons <= $Drange[$j] )
												{
													$amount = $dBPAmount[$i];
												}
												$i += 4;
												$j++;
											}
											if($amount > 0)
											{
												
												$accom = "Yes";
												$disprice = $amount;
												return array(
													'accom' => $accom,
													'disprice' => $disprice,
												);
											}
											else
											{
												$accom = "Yes";
												$amt1 = "";
												if($accom_type == 1)
												{
													$amt1 = explode(',',trim($row->apply_promo_single_room, ','));
												}
												else if($accom_type == 2)
												{
													$amt1 = explode(',',trim($row->apply_promo_twin_room, ','));
												}
												else if($accom_type == 3)
												{
													$amt1 = explode(',',trim($row->apply_promo_three_person_room, ','));
												}
												else
												{
													$amt1 = explode(',',trim($row->apply_promo_quad_room, ','));
												}
												
												//$amt1 = explode(',',trim($row->apply_promo_single_room,','));
												$disprice = $amt1[1];
												
												return array(
														'accom' => $accom,
														'disprice' => $disprice,
													);
											}
										}
										else
										{
											$accom = "Yes";
											$amt1 = "";
											if($accom_type == 1)
											{
												$amt1 = explode(',',trim($row->apply_promo_single_room, ','));
											}
											else if($accom_type == 2)
											{
												$amt1 = explode(',',trim($row->apply_promo_twin_room, ','));
											}
											else if($accom_type == 3)
											{
												$amt1 = explode(',',trim($row->apply_promo_three_person_room, ','));
											}
											else
											{
												$amt1 = explode(',',trim($row->apply_promo_quad_room, ','));
											}
											
											//$amt1 = explode(',',trim($row->apply_promo_single_room,','));
											$disprice = $amt1[1];
											
											return array(
													'accom' => $accom,
													'disprice' => $disprice,
												);
										}
									}
								}
								else
								{
	// if promo is not applicable means next check the Bulk discount
									if($row->discount_bulk_purchase == 'Yes')
									{
										$Srange = explode(',',trim($row->range_start,','));
										$Drange = explode(',',trim($row->range_end, ','));
										$dBPAmount = 0;	
										
										if($accom_type == 1)
										{
											$dBPAmount = explode(',',trim($row->apply_discount_single_room, ','));
										}
										else if($accom_type == 2)
										{
											$dBPAmount = explode(',',trim($row->apply_discount_twin_room, ','));
										}
										else if($accom_type == 3)
										{
											$dBPAmount = explode(',',trim($row->apply_discount_three_person_room, ','));
										}
										else
										{
											$dBPAmount = explode(',',trim($row->apply_discount_quad_room, ','));
										}
											
										
										$i = 1;
										$j = 0;
										foreach($Srange as $start_range)
										{
											if($no_of_persons >= $start_range && $no_of_persons <= $Drange[$j] )
											{
												$amount = $dBPAmount[$i];
											}
											$i += 4;
											$j++;
										}
										if($amount > 0)
										{
											
											$accom = "Yes";
											$disprice = $amount;
											return array(
												'accom' => $accom,
												'disprice' => $disprice,
											);
										}
										else
										{
											$parray = "";
											if($accom_type == 1)
											{
												$parray = explode(',',trim($row->product_inclusive_accomodation_single, ','));
											}
											else if($accom_type == 2)
											{
												$parray = explode(',',trim($row->product_inclusive_accomodation_twin, ','));
											}
											else if($accom_type == 3)
											{
												$parray = explode(',',trim($row->product_inclusive_accomodation_3person, ','));
											}
											else
											{
												$parray = explode(',',trim($row->product_inclusive_accomodation_quad, ','));
											}
											
											//$parray = explode(',',$row->product_inclusive_accomodation_single);
											$accom = "Yes";
											$disprice = $parray[1];
											
											return array(
												'accom' => $accom,
												'disprice' => $disprice,
											);
										}
									}
									else
									{
									// Display the normal  Single room Rate 
										
											$parray = "";
											if($accom_type == 1)
											{
												$parray = explode(',',trim($row->product_inclusive_accomodation_single, ','));
											}
											else if($accom_type == 2)
											{
												$parray = explode(',',trim($row->product_inclusive_accomodation_twin, ','));
											}
											else if($accom_type == 3)
											{
												$parray = explode(',',trim($row->product_inclusive_accomodation_3person, ','));
											}
											else
											{
												$parray = explode(',',trim($row->product_inclusive_accomodation_quad, ','));
											}
										$accom = "Yes";
										$disprice = $parray[1];
										
										return array(
												'accom' => $accom,
												'disprice' => $disprice,
											);
									}
								}
							}
							else if($row->discount_bulk_purchase == 'Yes')
							{
								$Srange = explode(',',trim($row->range_start,','));
								$Drange = explode(',',trim($row->range_end, ','));
								$dBPAmount = 0;	

								if($accom_type == 1)
								{
									$dBPAmount = explode(',',trim($row->apply_discount_single_room, ','));
								}
								else if($accom_type == 2)
								{
									$dBPAmount = explode(',',trim($row->apply_discount_twin_room, ','));
								}
								else if($accom_type == 3)
								{
									$dBPAmount = explode(',',trim($row->apply_discount_three_person_room, ','));
								}
								else
								{
									$dBPAmount = explode(',',trim($row->apply_discount_quad_room, ','));
								}
								//$dBPAmount = explode(',',trim($row->apply_discount_single_room, ','));
								
								$i = 1;
								$j = 0;
								foreach($Srange as $start_range)
								{
									if($no_of_persons >= $start_range && $no_of_persons <= $Drange[$j] )
									{
										$amount = $dBPAmount[$i];
									}
									$i += 4;
									$j++;
								}
								if($amount > 0)
								{
									$accom = "Yes";
									$disprice = $amount;
									
									return array(
												'accom' => $accom,
												'disprice' => $disprice,
											);
								}
								else
								{
									
											$parray = "";
											if($accom_type == 1)
											{
												$parray = explode(',',trim($row->product_inclusive_accomodation_single, ','));
											}
											else if($accom_type == 2)
											{
												$parray = explode(',',trim($row->product_inclusive_accomodation_twin, ','));
											}
											else if($accom_type == 3)
											{
												$parray = explode(',',trim($row->product_inclusive_accomodation_3person, ','));
											}
											else
											{
												$parray = explode(',',trim($row->product_inclusive_accomodation_quad, ','));
											}
									$accom = "Yes";
									$disprice = $parray[1];
									
									return array(
												'accom' => $accom,
												'disprice' => $disprice,
											);
								}
							}
							else
							{
							// Display the normal  Single room Rate 
								
											$parray = "";
											if($accom_type == 1)
											{
												$parray = explode(',',trim($row->product_inclusive_accomodation_single, ','));
											}
											else if($accom_type == 2)
											{
												$parray = explode(',',trim($row->product_inclusive_accomodation_twin, ','));
											}
											else if($accom_type == 3)
											{
												$parray = explode(',',trim($row->product_inclusive_accomodation_3person, ','));
											}
											else
											{
												$parray = explode(',',trim($row->product_inclusive_accomodation_quad, ','));
											}
								$disprice = $parray[1];
								
								return array(
												'accom' => $accom,
												'disprice' => $disprice,
											);
							}
						}
						else
						{
							//Normal Rates
							if($row->apply_promo == 'Yes')
							{
								$promoStartDate = $row->start_date;
								$promoEndDate = $row->end_date;
								$current_date = new DateTime();
								$cDate = $current_date->format("Y-m-d");
								if($cDate >= $promoStartDate && $cDate <= $promoEndDate)
								{
	//if the Promo is Applied means then to check whether the apply_promo_bilk_discount  
									if($row->apply_promo_bilk_discount == 'Yes')
									{
										$Srange = explode(',',trim($row->range_start,','));
										$Drange = explode(',',trim($row->range_end, ','));
										
										$dBPAmount = explode(',',trim($row->apply_promo_bulk_wr, ','));
										
										$i = 0;
										foreach($Srange as $start_range)
										{
											if($no_of_persons >= $start_range && $no_of_persons <= $Drange[$i] )
											{
												$amount = $dBPAmount[$i];
											}
											$i++;
										}
										if($amount > 0)
										{
											
											$accom = "No";
											$disprice = $amount;
											return array(
												'accom' => $accom,
												'disprice' => $disprice,
											);
										}
										else
										{
											$accom = "No";
											//$amt1 = explode(',',trim(,','));
											$disprice = $row->apply_promo_wr;
											
											return array(
												'accom' => $accom,
												'disprice' => $disprice,
											);
										}
										
									}
									else
									{
										if($row->discount_bulk_purchase == 'Yes')
										{
											$Srange = explode(',',trim($row->range_start,','));
											$Drange = explode(',',trim($row->range_end, ','));
											$dBPAmount = 0;	

											$dBPAmount = explode(',',trim($row->apply_discount_wr, ','));
											
											$i = 0;
											foreach($Srange as $start_range)
											{
												if($no_of_persons >= $start_range && $no_of_persons <= $Drange[$i] )
												{
													$amount = $dBPAmount[$i];
												}
												$i++;
											}
											if($amount > 0)
											{
												$accom = "No";
												$disprice = $amount;
												
												return array(
													'accom' => $accom,
													'disprice' => $disprice,
												);
											}
											else
											{
												$accom = "No";
												//$amt1 = explode(',',trim($row->apply_promo_wr,','));
												$disprice = $row->apply_promo_wr;
												
												return array(
														'accom' => $accom,
														'disprice' => $disprice,
												);
											}
										}

										else
										{
											$accom = "No";
											//$amt1 = explode(',',trim($row->apply_promo_wr,','));
											$disprice = $row->apply_promo_wr;
											
											return array(
													'accom' => $accom,
													'disprice' => $disprice,
											);
										}
									}
								}
								else
								{
	// if promo is not applicable means next check the Bulk discount
									if($row->discount_bulk_purchase == 'Yes')
									{
										$Srange = explode(',',trim($row->range_start,','));
										$Drange = explode(',',trim($row->range_end, ','));
										$dBPAmount = 0;	

										$dBPAmount = explode(',',trim($row->apply_discount_wr, ','));
										
										$i = 0;
										foreach($Srange as $start_range)
										{
											if($no_of_persons >= $start_range && $no_of_persons <= $Drange[$i] )
											{
												$amount = $dBPAmount[$i];
											}
											$i++;
										}
										if($amount > 0)
										{
											$accom = "No";
											$disprice = $amount;
											
											return array(
												'accom' => $accom,
												'disprice' => $disprice,
											);
										}
										else
										{
											$parray = explode(',',$row->product_weekend_rate);
											$accom = "No";
											$disprice = $parray[1];
											
											return array(
												'accom' => $accom,
												'disprice' => $disprice,
											);
										}
									}
									else
									{
									// Display the normal  Single room Rate 
										//$parray = explode(',',$row->product_weekend_rate);
										$accom = "No";
										$disprice = $row->product_weekend_rate;
										
										return array(
												'accom' => $accom,
												'disprice' => $disprice,
											);
									}
								}
							}
							else if($row->discount_bulk_purchase == 'Yes')
							{
								$Srange = explode(',',trim($row->range_start,','));
								$Drange = explode(',',trim($row->range_end, ','));
								$dBPAmount = 0;	

								$dBPAmount = explode(',',trim($row->apply_discount_wr, ','));
								
								$i = 0;
								foreach($Srange as $start_range)
								{
									if($no_of_persons >= $start_range && $no_of_persons <= $Drange[$i] )
									{
										$amount = $dBPAmount[$i];
									}
									$i++;
								}
								if($amount > 0)
								{
									$accom = "No";
									$disprice = $amount;
									return array(
												'accom' => $accom,
												'disprice' => $disprice,
											);
								}
								else
								{
								//	$parray = explode(',',$row->product_normal_rate);
									$accom = "No";
									$disprice = $row->product_weekend_rate;
									
									return array(
												'accom' => $accom,
												'disprice' => $disprice,
											);
								}
							}
							else
							{
							// Display the normal  Single room Rate 
								//$parray = explode(',',$row->product_normal_rate);
								$accom = "No";
								$disprice = $row->product_weekend_rate;
								
								return array(
												'accom' => $accom,
												'disprice' => $disprice,
											);
							}
							
						}

					break;
					case "PK":

						If ($row->product_inclusive_accomodation == "Yes") 
						{
							//Accommodation Rates
							if($row->apply_promo == 'Yes')
							{
								$promoStartDate = $row->start_date;
								$promoEndDate = $row->end_date;
								$current_date = new DateTime();
								$cDate = $current_date->format("Y-m-d");
								if($cDate >= $promoStartDate && $cDate <= $promoEndDate)
								{
	//if the Promo is Applied means then to check whether the apply_promo_bilk_discount  
									if($row->apply_promo_bilk_discount == 'Yes')
									{
										$Srange = explode(',',trim($row->range_start,','));
										$Drange = explode(',',trim($row->range_end, ','));
										
										if($accom_type == 1)
										{
											$dBPAmount = explode(',',trim($row->apply_promo_bulk_single_room, ','));
										}
										else if($accom_type == 2)
										{
											$dBPAmount = explode(',',trim($row->apply_promo_bulk_twin_room, ','));
										}
										else if($accom_type == 3)
										{
											$dBPAmount = explode(',',trim($row->apply_promo_bulk_three_person_room, ','));
										}
										else
										{
											$dBPAmount = explode(',',trim($row->apply_promo_bulk_quad_room, ','));
										}
										//$dBPAmount = explode(',',trim($row->apply_promo_bulk_single_room, ','));
										
										$i = 2;
										$j = 0;
										foreach($Srange as $start_range)
										{
											if($no_of_persons >= $start_range && $no_of_persons <= $Drange[$j] )
											{
												$amount = $dBPAmount[$i];
											}
											$i += 4;
											$j++;
										}
										if($amount > 0)
										{
											
											$accom = "Yes";
											$disprice = $amount;
											
											return array(
												'accom' => $accom,
												'disprice' => $disprice,
											);
										}
										else
										{
											$accom = "Yes";
											$amt1 = "";
											if($accom_type == 1)
											{
												$amt1 = explode(',',trim($row->apply_promo_single_room, ','));
											}
											else if($accom_type == 2)
											{
												$amt1 = explode(',',trim($row->apply_promo_twin_room, ','));
											}
											else if($accom_type == 3)
											{
												$amt1 = explode(',',trim($row->apply_promo_three_person_room, ','));
											}
											else
											{
												$amt1 = explode(',',trim($row->apply_promo_quad_room, ','));
											}
											//$amt1 = explode(',',trim($row->apply_promo_single_room,','));
											$disprice = $amt1[2];
											
											return array(
												'accom' => $accom,
												'disprice' => $disprice,
											);
										}
										
									}
									else
									{
										if($row->discount_bulk_purchase == 'Yes')
										{
											$Srange = explode(',',trim($row->range_start,','));
											$Drange = explode(',',trim($row->range_end, ','));
											$dBPAmount = 0;	
												
												if($accom_type == 1)
												{
													$dBPAmount = explode(',',trim($row->apply_discount_single_room, ','));
												}
												else if($accom_type == 2)
												{
													$dBPAmount = explode(',',trim($row->apply_discount_twin_room, ','));
												}
												else if($accom_type == 3)
												{
													$dBPAmount = explode(',',trim($row->apply_discount_three_person_room, ','));
												}
												else
												{
													$dBPAmount = explode(',',trim($row->apply_discount_quad_room, ','));
												}
											//$dBPAmount = explode(',',trim($row->apply_discount_single_room, ','));
											
											$i = 2;
											$j = 0;
											foreach($Srange as $start_range)
											{
												if($no_of_persons >= $start_range && $no_of_persons <= $Drange[$j] )
												{
													$amount = $dBPAmount[$i];
												}
												$i += 4;
												$j++;
											}
											if($amount > 0)
											{
												$accom = "Yes";
												$disprice = $amount;
												return array(
													'accom' => $accom,
													'disprice' => $disprice,
												);
											}
											else
											{
												$accom = "Yes";
												$amt1 = "";
												if($accom_type == 1)
												{
													$amt1 = explode(',',trim($row->apply_promo_single_room, ','));
												}
												else if($accom_type == 2)
												{
													$amt1 = explode(',',trim($row->apply_promo_twin_room, ','));
												}
												else if($accom_type == 3)
												{
													$amt1 = explode(',',trim($row->apply_promo_three_person_room, ','));
												}
												else
												{
													$amt1 = explode(',',trim($row->apply_promo_quad_room, ','));
												}
												$disprice = $amt1[2];
											
												return array(
													'accom' => $accom,
													'disprice' => $disprice,
												);
											}
										}
										else
										{
											$accom = "Yes";
											$amt1 = "";
											if($accom_type == 1)
											{
												$amt1 = explode(',',trim($row->apply_promo_single_room, ','));
											}
											else if($accom_type == 2)
											{
												$amt1 = explode(',',trim($row->apply_promo_twin_room, ','));
											}
											else if($accom_type == 3)
											{
												$amt1 = explode(',',trim($row->apply_promo_three_person_room, ','));
											}
											else
											{
												$amt1 = explode(',',trim($row->apply_promo_quad_room, ','));
											}
											$disprice = $amt1[2];
										
											return array(
												'accom' => $accom,
												'disprice' => $disprice,
											);
										}
									}
								}
								else
								{
	// if promo is not applicable means next check the Bulk discount
									if($row->discount_bulk_purchase == 'Yes')
									{
										$Srange = explode(',',trim($row->range_start,','));
										$Drange = explode(',',trim($row->range_end, ','));
										$dBPAmount = 0;	
											
											if($accom_type == 1)
											{
												$dBPAmount = explode(',',trim($row->apply_discount_single_room, ','));
											}
											else if($accom_type == 2)
											{
												$dBPAmount = explode(',',trim($row->apply_discount_twin_room, ','));
											}
											else if($accom_type == 3)
											{
												$dBPAmount = explode(',',trim($row->apply_discount_three_person_room, ','));
											}
											else
											{
												$dBPAmount = explode(',',trim($row->apply_discount_quad_room, ','));
											}
										//$dBPAmount = explode(',',trim($row->apply_discount_single_room, ','));
										
										$i = 2;
										$j = 0;
										foreach($Srange as $start_range)
										{
											if($no_of_persons >= $start_range && $no_of_persons <= $Drange[$j] )
											{
												$amount = $dBPAmount[$i];
											}
											$i += 4;
											$j++;
										}
										if($amount > 0)
										{
											$accom = "Yes";
											$disprice = $amount;
											return array(
												'accom' => $accom,
												'disprice' => $disprice,
											);
										}
										else
										{
											$parray = "";
											if($accom_type == 1)
											{
												$parray = explode(',',trim($row->product_inclusive_accomodation_single, ','));
											}
											else if($accom_type == 2)
											{
												$parray = explode(',',trim($row->product_inclusive_accomodation_twin, ','));
											}
											else if($accom_type == 3)
											{
												$parray = explode(',',trim($row->product_inclusive_accomodation_3person, ','));
											}
											else
											{
												$parray = explode(',',trim($row->product_inclusive_accomodation_quad, ','));
											}
											
											//$parray = explode(',',$row->product_inclusive_accomodation_single);
											$accom = "Yes";
											$disprice = $parray[2];
											
											return array(
												'accom' => $accom,
												'disprice' => $disprice,
											);
										}
									}
									else
									{
									// Display the normal  Single room Rate 
										$parray = "";
											if($accom_type == 1)
											{
												$parray = explode(',',trim($row->product_inclusive_accomodation_single, ','));
											}
											else if($accom_type == 2)
											{
												$parray = explode(',',trim($row->product_inclusive_accomodation_twin, ','));
											}
											else if($accom_type == 3)
											{
												$parray = explode(',',trim($row->product_inclusive_accomodation_3person, ','));
											}
											else
											{
												$parray = explode(',',trim($row->product_inclusive_accomodation_quad, ','));
											}
										$accom = "Yes";
										$disprice = $parray[2];
										
										return array(
												'accom' => $accom,
												'disprice' => $disprice,
											);
									}
								}
							}
							else if($row->discount_bulk_purchase == 'Yes')
							{
								$Srange = explode(',',trim($row->range_start,','));
								$Drange = explode(',',trim($row->range_end, ','));
								$dBPAmount = 0;	

								
								if($accom_type == 1)
								{
									$dBPAmount = explode(',',trim($row->apply_discount_single_room, ','));
								}
								else if($accom_type == 2)
								{
									$dBPAmount = explode(',',trim($row->apply_discount_twin_room, ','));
								}
								else if($accom_type == 3)
								{
									$dBPAmount = explode(',',trim($row->apply_discount_three_person_room, ','));
								}
								else
								{
									$dBPAmount = explode(',',trim($row->apply_discount_quad_room, ','));
								}
											
								//$dBPAmount = explode(',',trim($row->apply_discount_single_room, ','));
								
								$i = 2;
								$j = 0;
								foreach($Srange as $start_range)
								{
									if($no_of_persons >= $start_range && $no_of_persons <= $Drange[$j] )
									{
										$amount = $dBPAmount[$i];
									}
									$i += 4;
									$j++;
								}
								if($amount > 0)
								{
									$accom = "Yes";
									$disprice = $amount;
									return array(
												'accom' => $accom,
												'disprice' => $disprice,
											);
								}
								else
								{
									$parray = "";
									
									if($accom_type == 1)
									{
										$parray = explode(',',trim($row->product_inclusive_accomodation_single, ','));
									}
									else if($accom_type == 2)
									{
										$parray = explode(',',trim($row->product_inclusive_accomodation_twin, ','));
									}
									else if($accom_type == 3)
									{
										$parray = explode(',',trim($row->product_inclusive_accomodation_3person, ','));
									}
									else
									{
										$parray = explode(',',trim($row->product_inclusive_accomodation_quad, ','));
									}
									
									//$parray = explode(',',$row->product_inclusive_accomodation_single);
									$accom = "Yes";
									$disprice = $parray[2];
									
									return array(
												'accom' => $accom,
												'disprice' => $disprice,
											);
								}
							}
							else
							{
							// Display the normal  Single room Rate 
							
								$parray = "";
								if($accom_type == 1)
								{
									$parray = explode(',',trim($row->product_inclusive_accomodation_single, ','));
								}
								else if($accom_type == 2)
								{
									$parray = explode(',',trim($row->product_inclusive_accomodation_twin, ','));
								}
								else if($accom_type == 3)
								{
									$parray = explode(',',trim($row->product_inclusive_accomodation_3person, ','));
								}
								else
								{
									$parray = explode(',',trim($row->product_inclusive_accomodation_quad, ','));
								}
							//	$parray = explode(',',$row->product_inclusive_accomodation_single);
								$accom = "Yes";
								$disprice = $parray[2];
								
								return array(
												'accom' => $accom,
												'disprice' => $disprice,
											);
							}
						}
						else
						{
							//Normal Rates
							if($row->apply_promo == 'Yes')
							{
								$promoStartDate = $row->start_date;
								$promoEndDate = $row->end_date;
								$current_date = new DateTime();
								$cDate = $current_date->format("Y-m-d");
								if($cDate >= $promoStartDate && $cDate <= $promoEndDate)
								{
	//if the Promo is Applied means then to check whether the apply_promo_bilk_discount  
									if($row->apply_promo_bilk_discount == 'Yes')
									{
										$Srange = explode(',',trim($row->range_start,','));
										$Drange = explode(',',trim($row->range_end, ','));
										
										$dBPAmount = explode(',',trim($row->apply_promo_bulk_psr, ','));
										
										$i = 0;
										foreach($Srange as $start_range)
										{
											if($no_of_persons >= $start_range && $no_of_persons <= $Drange[$i] )
											{
												$amount = $dBPAmount[$i];
											}
											$i++;
										}
										if($amount > 0)
										{
											
											$accom = "No";
											$disprice = $amount;
											return array(
												'accom' => $accom,
												'disprice' => $disprice,
											);
										}
										else
										{
											$accom = "No";
											//$amt1 = explode(',',trim($row->apply_promo_psr,','));
											$disprice = $row->apply_promo_psr;
											
											return array(
												'accom' => $accom,
												'disprice' => $disprice,
											);
										}
										
									}
									else
									{
										if($row->discount_bulk_purchase == 'Yes')
										{
											$Srange = explode(',',trim($row->range_start,','));
											$Drange = explode(',',trim($row->range_end, ','));
											$dBPAmount = 0;	

											$dBPAmount = explode(',',trim($row->apply_discount_psr, ','));
											
											$i = 0;
											foreach($Srange as $start_range)
											{
												if($no_of_persons >= $start_range && $no_of_persons <= $Drange[$i] )
												{
													$amount = $dBPAmount[$i];
												}
												$i++;
											}
											if($amount > 0)
											{
												$accom = "No";
												$disprice = $amount;
												return array(
													'accom' => $accom,
													'disprice' => $disprice,
												);
											}
											else
											{
												$accom = "No";
											//	$amt1 = explode(',',trim($row->apply_promo_psr,','));
												//var_dump($amt1);
												$disprice = $row->apply_promo_psr;
												
												return array(
														'accom' => $accom,
														'disprice' => $disprice,
													);
											}
										}

										else
										{
											$accom = "No";
										//	$amt1 = explode(',',trim($row->apply_promo_psr,','));
											//var_dump($amt1);
											$disprice = $row->apply_promo_psr;
											
											return array(
													'accom' => $accom,
													'disprice' => $disprice,
												);
										}
									}
								}
								else
								{
	// if promo is not applicable means next check the Bulk discount
									if($row->discount_bulk_purchase == 'Yes')
									{
										$Srange = explode(',',trim($row->range_start,','));
										$Drange = explode(',',trim($row->range_end, ','));
										$dBPAmount = 0;	

										$dBPAmount = explode(',',trim($row->apply_discount_psr, ','));
										
										$i = 0;
										foreach($Srange as $start_range)
										{
											if($no_of_persons >= $start_range && $no_of_persons <= $Drange[$i] )
											{
												$amount = $dBPAmount[$i];
											}
											$i++;
										}
										if($amount > 0)
										{
											$accom = "No";
											$disprice = $amount;
											return array(
												'accom' => $accom,
												'disprice' => $disprice,
											);
										}
										else
										{
											$parray = explode(',',$row->product_peakseason_rate);
											$accom = "No";
											$disprice = $parray[0];
											
											return array(
												'accom' => $accom,
												'disprice' => $disprice,
											);
										}
									}
									else
									{
									// Display the normal  Single room Rate 
										//$parray = explode(',',$row->product_normal_rate);
										$accom = "No";
										$disprice = $row->product_peakseason_rate;
										
										return array(
												'accom' => $accom,
												'disprice' => $disprice,
											);
									}
								}
							}
							else if($row->discount_bulk_purchase == 'Yes')
							{
								$Srange = explode(',',trim($row->range_start,','));
								$Drange = explode(',',trim($row->range_end, ','));
								$dBPAmount = 0;	

								$dBPAmount = explode(',',trim($row->apply_discount_psr, ','));
							//	var_dump($dBPAmount);
								$i = 0;
								foreach($Srange as $start_range)
								{
									if($no_of_persons >= $start_range && $no_of_persons <= $Drange[$i] )
									{
										$amount = $dBPAmount[$i];
									}
									$i++;
								}
								if($amount > 0)
								{
									$accom = "No";
									$disprice = $amount;
									return array(
												'accom' => $accom,
												'disprice' => $disprice,
											);
								}
								else
								{
									//$parray = explode(',',$row->product_normal_rate);
									$accom = "No";
									$disprice = $row->product_peakseason_rate;
									
									return array(
												'accom' => $accom,
												'disprice' => $disprice,
											);
								}
							}
							else
							{
							// Display the normal  Single room Rate 
								//$parray = explode(',',$row->product_normal_rate);
								//var_dump($parray);
								$accom = "No";
								$disprice = $row->product_peakseason_rate;
								
								return array(
												'accom' => $accom,
												'disprice' => $disprice,
											);
							}
							
						}
					break;
					case "SP":
					/* $logoqdata .= "Product price ......\n Superpeak Price:" . $row->product_superpeak_rate ."\n" .
					"Accomodations => " . $row->disaccomodation . " \n Prices: " . $row->single_room . "\n"; */
						If ($row->product_inclusive_accomodation == "Yes") 
						{
							//Accommodation Rates
							if($row->apply_promo == 'Yes')
							{
								$promoStartDate = $row->start_date;
								$promoEndDate = $row->end_date;
								$current_date = new DateTime();
								$cDate = $current_date->format("Y-m-d");
								if($cDate >= $promoStartDate && $cDate <= $promoEndDate)
								{
	//if the Promo is Applied means then to check whether the apply_promo_bilk_discount  
									if($row->apply_promo_bilk_discount == 'Yes')
									{
										$Srange = explode(',',trim($row->range_start,','));
										$Drange = explode(',',trim($row->range_end, ','));
										
										$dBPAmount = "";
										if($accom_type == 1)
										{
											$dBPAmount = explode(',',trim($row->apply_promo_bulk_single_room, ','));
										}
										else if($accom_type == 2)
										{
											$dBPAmount = explode(',',trim($row->apply_promo_bulk_twin_room, ','));
										}
										else if($accom_type == 3)
										{
											$dBPAmount = explode(',',trim($row->apply_promo_bulk_three_person_room, ','));
										}
										else
										{
											$dBPAmount = explode(',',trim($row->apply_promo_bulk_quad_room, ','));
										}
									//	$dBPAmount = explode(',',trim($row->apply_promo_bulk_single_room, ','));
										
										$i = 3;
										$j = 0;
										foreach($Srange as $start_range)
										{
											if($no_of_persons >= $start_range && $no_of_persons <= $Drange[$j] )
											{
												$amount = $dBPAmount[$i];
											}
											$i += 4;
											$j++;
										}
										if($amount > 0)
										{
											
											$accom = "Yes";
											$disprice = $amount;
											return array(
												'accom' => $accom,
												'disprice' => $disprice,
											);
										}
										else
										{
											$accom = "Yes";
											$amt1 = "";
											
											if($accom_type == 1)
											{
												$amt1 = explode(',',trim($row->apply_promo_single_room, ','));
											}
											else if($accom_type == 2)
											{
												$amt1 = explode(',',trim($row->apply_promo_twin_room, ','));
											}
											else if($accom_type == 3)
											{
												$amt1 = explode(',',trim($row->apply_promo_three_person_room, ','));
											}
											else
											{
												$amt1 = explode(',',trim($row->apply_promo_quad_room, ','));
											}
											
											//$amt1 = explode(',',trim($row->apply_promo_single_room,','));
											$disprice = $amt1[3];
											
											return array(
												'accom' => $accom,
												'disprice' => $disprice,
											);
										}
										
									}
									else
									{
										if($row->discount_bulk_purchase == 'Yes')
										{
											$Srange = explode(',',trim($row->range_start,','));
											$Drange = explode(',',trim($row->range_end, ','));
											$dBPAmount = 0;	
											
											if($accom_type == 1)
											{
												$dBPAmount = explode(',',trim($row->apply_discount_single_room, ','));
											}
											else if($accom_type == 2)
											{
												$dBPAmount = explode(',',trim($row->apply_discount_twin_room, ','));
											}
											else if($accom_type == 3)
											{
												$dBPAmount = explode(',',trim($row->apply_discount_three_person_room, ','));
											}
											else
											{
												$dBPAmount = explode(',',trim($row->apply_discount_quad_room, ','));
											}
											
											//$dBPAmount = explode(',',trim($row->apply_discount_single_room, ','));
											
											$i = 3;
											$j = 0;
											foreach($Srange as $start_range)
											{
												if($no_of_persons >= $start_range && $no_of_persons <= $Drange[$j] )
												{
													$amount = $dBPAmount[$i];
												}
												$i += 4;
												$j++;
											}
											if($amount > 0)
											{
												$accom = "Yes";
												$disprice = $amount;
												return array(
													'accom' => $accom,
													'disprice' => $disprice,
												);
											}
											else
											{
												$accom = "Yes";
												$amt = "";
												
												if($accom_type == 1)
												{
													$amt1 = explode(',',trim($row->apply_promo_single_room, ','));
												}
												else if($accom_type == 2)
												{
													$amt1 = explode(',',trim($row->apply_promo_twin_room, ','));
												}
												else if($accom_type == 3)
												{
													$amt1 = explode(',',trim($row->apply_promo_three_person_room, ','));
												}
												else
												{
													$amt1 = explode(',',trim($row->apply_promo_quad_room, ','));
												}
												//$amt1 = explode(',',trim($row->apply_promo_single_room,','));
												$disprice = $amt1[3];
												
												return array(
														'accom' => $accom,
														'disprice' => $disprice,
													);
											}
										}

										else
										{
											$accom = "Yes";
											$amt = "";
											
											if($accom_type == 1)
											{
												$amt1 = explode(',',trim($row->apply_promo_single_room, ','));
											}
											else if($accom_type == 2)
											{
												$amt1 = explode(',',trim($row->apply_promo_twin_room, ','));
											}
											else if($accom_type == 3)
											{
												$amt1 = explode(',',trim($row->apply_promo_three_person_room, ','));
											}
											else
											{
												$amt1 = explode(',',trim($row->apply_promo_quad_room, ','));
											}
											//$amt1 = explode(',',trim($row->apply_promo_single_room,','));
											$disprice = $amt1[3];
											
											return array(
													'accom' => $accom,
													'disprice' => $disprice,
												);
										}
									}
								}
								else
								{
	// if promo is not applicable means next check the Bulk discount
									if($row->discount_bulk_purchase == 'Yes')
									{
										$Srange = explode(',',trim($row->range_start,','));
										$Drange = explode(',',trim($row->range_end, ','));
										$dBPAmount = 0;	
										
										if($accom_type == 1)
										{
											$dBPAmount = explode(',',trim($row->apply_discount_single_room, ','));
										}
										else if($accom_type == 2)
										{
											$dBPAmount = explode(',',trim($row->apply_discount_twin_room, ','));
										}
										else if($accom_type == 3)
										{
											$dBPAmount = explode(',',trim($row->apply_discount_three_person_room, ','));
										}
										else
										{
											$dBPAmount = explode(',',trim($row->apply_discount_quad_room, ','));
										}
										
										//$dBPAmount = explode(',',trim($row->apply_discount_single_room, ','));
										
										$i = 3;
										$j = 0;
										foreach($Srange as $start_range)
										{
											if($no_of_persons >= $start_range && $no_of_persons <= $Drange[$j] )
											{
												$amount = $dBPAmount[$i];
											}
											$i += 4;
											$j++;
										}
										if($amount > 0)
										{
											$accom = "Yes";
											$disprice = $amount;
											return array(
												'accom' => $accom,
												'disprice' => $disprice,
											);
										}
										else
										{
											$parray = "";
											
											if($accom_type == 1)
											{
												$parray = explode(',',trim($row->product_inclusive_accomodation_single, ','));
											}
											else if($accom_type == 2)
											{
												$parray = explode(',',trim($row->product_inclusive_accomodation_twin, ','));
											}
											else if($accom_type == 3)
											{
												$parray = explode(',',trim($row->product_inclusive_accomodation_3person, ','));
											}
											else
											{
												$parray = explode(',',trim($row->product_inclusive_accomodation_quad, ','));
											}
										
											//$parray = explode(',',$row->product_inclusive_accomodation_single);
											$accom = "Yes";
											$disprice = $parray[3];
											
											return array(
												'accom' => $accom,
												'disprice' => $disprice,
											);
										}
									}
									else
									{
									// Display the normal  Single room Rate 
										$parray = "";
											
											if($accom_type == 1)
											{
												$parray = explode(',',trim($row->product_inclusive_accomodation_single, ','));
											}
											else if($accom_type == 2)
											{
												$parray = explode(',',trim($row->product_inclusive_accomodation_twin, ','));
											}
											else if($accom_type == 3)
											{
												$parray = explode(',',trim($row->product_inclusive_accomodation_3person, ','));
											}
											else
											{
												$parray = explode(',',trim($row->product_inclusive_accomodation_quad, ','));
											}
										$accom = "Yes";
										$disprice = $parray[3];
									
										return array(
												'accom' => $accom,
												'disprice' => $disprice,
											);
									}
								}
							}
							else if($row->discount_bulk_purchase == 'Yes')
							{
								$Srange = explode(',',trim($row->range_start,','));
								$Drange = explode(',',trim($row->range_end, ','));
								$dBPAmount = 0;	
								$parray = "";
											
								if($accom_type == 1)
								{
									$parray = explode(',',trim($row->apply_discount_single_room, ','));
								}
								else if($accom_type == 2)
								{
									$parray = explode(',',trim($row->apply_discount_twin_room, ','));
								}
								else if($accom_type == 3)
								{
									$parray = explode(',',trim($row->apply_discount_three_person_room, ','));
								}
								else
								{
									$parray = explode(',',trim($row->apply_discount_quad_room, ','));
								}
								
								//$dBPAmount = explode(',',trim($row->apply_discount_single_room, ','));
								
								$i = 0;
								$j = 3;
								foreach($Srange as $start_range)
								{
									if($no_of_persons >= $start_range && $no_of_persons <= $Drange[$i] )
									{
										$amount = $dBPAmount[$j];
									}
									$j += 4;
									$i++;
								}
								if($amount > 0)
								{
									$accom = "Yes";
									$disprice = $amount;
									return array(
												'accom' => $accom,
												'disprice' => $disprice,
											);
								}
								else
								{
									$parray = "";
											
											if($accom_type == 1)
											{
												$parray = explode(',',trim($row->product_inclusive_accomodation_single, ','));
											}
											else if($accom_type == 2)
											{
												$parray = explode(',',trim($row->product_inclusive_accomodation_twin, ','));
											}
											else if($accom_type == 3)
											{
												$parray = explode(',',trim($row->product_inclusive_accomodation_3person, ','));
											}
											else
											{
												$parray = explode(',',trim($row->product_inclusive_accomodation_quad, ','));
											}
									$accom = "Yes";
									$disprice = $parray[3];
									
									return array(
												'accom' => $accom,
												'disprice' => $disprice,
											);
								}
							}
							else
							{
							// Display the normal  Single room Rate 
								$parray = "";
											
											if($accom_type == 1)
											{
												$parray = explode(',',trim($row->product_inclusive_accomodation_single, ','));
											}
											else if($accom_type == 2)
											{
												$parray = explode(',',trim($row->product_inclusive_accomodation_twin, ','));
											}
											else if($accom_type == 3)
											{
												$parray = explode(',',trim($row->product_inclusive_accomodation_3person, ','));
											}
											else
											{
												$parray = explode(',',trim($row->product_inclusive_accomodation_quad, ','));
											}
								$accom = "Yes";
								$disprice = $parray[3];
								
								return array(
												'accom' => $accom,
												'disprice' => $disprice,
											);
							}
						}
						else
						{
							//Normal Rates
							if($row->apply_promo == 'Yes')
							{
								$promoStartDate = $row->start_date;
								$promoEndDate = $row->end_date;
								$current_date = new DateTime();
								$cDate = $current_date->format("Y-m-d");
								if($cDate >= $promoStartDate && $cDate <= $promoEndDate)
								{
	//if the Promo is Applied means then to check whether the apply_promo_bilk_discount  
									if($row->apply_promo_bilk_discount == 'Yes')
									{
										$Srange = explode(',',trim($row->range_start,','));
										$Drange = explode(',',trim($row->range_end, ','));
										
										$dBPAmount = explode(',',trim($row->apply_promo_bulk_spsr, ','));
										
										$i = 0;
										foreach($Srange as $start_range)
										{
											if($no_of_persons >= $start_range && $no_of_persons <= $Drange[$i] )
											{
												$amount = $dBPAmount[$i];
											}
											$i++;
										}
										if($amount > 0)
										{
											
											return array(
												'accom' => $accom,
												'disprice' => $amount,
											);
										}
										
									}
									else
									{
										if($row->discount_bulk_purchase == 'Yes')
										{
											$Srange = explode(',',trim($row->range_start,','));
											$Drange = explode(',',trim($row->range_end, ','));
											$dBPAmount = 0;	

											$dBPAmount = explode(',',trim($row->apply_discount_spsr, ','));
											
											$i = 0;
											foreach($Srange as $start_range)
											{
												if($no_of_persons >= $start_range && $no_of_persons <= $Drange[$i] )
												{
													$amount = $dBPAmount[$i];
												}
												$i++;
											}
											if($amount > 0)
											{
												$accom = "No";
												$disprice = $amount;
												return array(
													'accom' => $accom,
													'disprice' => $disprice,
												);
											}
											else
											{
												//$parray = explode(',',$row->product_normal_rate);
												$accom = "No";
												//$amt1 = explode(',',trim($row->apply_promo_spsr,','));
												$disprice = $row->apply_promo_spsr;
												
												return array(
														'accom' => $accom,
														'disprice' => $disprice,
													);
											}
										}

										else
										{
											$accom = "No";
											//$amt1 = explode(',',trim($row->apply_promo_spsr,','));
											$disprice = $row->apply_promo_spsr;
											
											return array(
													'accom' => $accom,
													'disprice' => $disprice,
												);
										}
									}
								}
								else
								{
	// if promo is not applicable means next check the Bulk discount
									if($row->discount_bulk_purchase == 'Yes')
									{
										$Srange = explode(',',trim($row->range_start,','));
										$Drange = explode(',',trim($row->range_end, ','));
										$dBPAmount = 0;	

										$dBPAmount = explode(',',trim($row->apply_discount_spsr, ','));
										
										$i = 0;
										foreach($Srange as $start_range)
										{
											if($no_of_persons >= $start_range && $no_of_persons <= $Drange[$i] )
											{
												$amount = $dBPAmount[$i];
											}
											$i++;
										}
										if($amount > 0)
										{
											$accom = "No";
											$disprice = $amount;
											return array(
												'accom' => $accom,
												'disprice' => $disprice,
											);
										}
										else
										{
											//$parray = explode(',',$row->product_normal_rate);
											$accom = "No";
											$disprice = $row->product_superpeak_rate;
											
											return array(
												'accom' => $accom,
												'disprice' => $disprice,
											);
										}
									}
									else
									{
									// Display the normal  Single room Rate 
									//	$parray = explode(',',$row->product_normal_rate);
										$accom = "No";
										$disprice = $row->product_superpeak_rate;
										
										return array(
												'accom' => $accom,
												'disprice' => $disprice,
											);
									}
								}
							}
							else if($row->discount_bulk_purchase == 'Yes')
							{
								$Srange = explode(',',trim($row->range_start,','));
								$Drange = explode(',',trim($row->range_end, ','));
								$dBPAmount = 0;	

								$dBPAmount = explode(',',trim($row->apply_discount_spsr, ','));
								
								$i = 0;
								foreach($Srange as $start_range)
								{
									if($no_of_persons >= $start_range && $no_of_persons <= $Drange[$i] )
									{
										$amount = $dBPAmount[$i];
									}
									$i++;
								}
								if($amount > 0)
								{
									$accom = "No";
									$disprice = $amount;
									return array(
												'accom' => $accom,
												'disprice' => $disprice,
											);
								}
								else
								{
									//$parray = explode(',',$row->product_normal_rate);
									$accom = "No";
									$disprice = $row->product_superpeak_rate;
									
									return array(
												'accom' => $accom,
												'disprice' => $disprice,
											);
								}
							}
							else
							{
							// Display the normal  Single room Rate 
								//$parray = explode(',',$row->product_normal_rate);
								$accom = "No";
								$disprice = $row->product_superpeak_rate;
								
								return array(
												'accom' => $accom,
												'disprice' => $disprice,
											);
							}
							
						}
					break;
					//default:
					/*  */
					case "NM":
						If ($row->product_inclusive_accomodation == "Yes") 
						{
							//Accommodation Rates
							if($row->apply_promo == 'Yes')
							{
								$promoStartDate = $row->start_date;
								$promoEndDate = $row->end_date;
								$current_date = new DateTime();
								$cDate = $current_date->format("Y-m-d");
								if($cDate >= $promoStartDate && $cDate <= $promoEndDate)
								{
	//if the Promo is Applied means then to check whether the apply_promo_bilk_discount  
									if($row->apply_promo_bilk_discount == 'Yes')
									{
										$Srange = explode(',',trim($row->range_start,','));
										$Drange = explode(',',trim($row->range_end, ','));
										
										
										if($accom_type == 1)
										{
											$dBPAmount = explode(',',trim($row->apply_promo_bulk_single_room, ','));
										}
										else if($accom_type == 2)
										{
											$dBPAmount = explode(',',trim($row->apply_promo_bulk_twin_room, ','));
										}
										else if($accom_type == 3)
										{
											$dBPAmount = explode(',',trim($row->apply_promo_bulk_three_person_room, ','));
										}
										else
										{
											$dBPAmount = explode(',',trim($row->apply_promo_bulk_quad_room, ','));
										}
										//$dBPAmount = explode(',',trim($row->apply_promo_bulk_single_room, ','));
										
										$i = 0;
										$j = 0;
										foreach($Srange as $start_range)
										{
											if($no_of_persons >= $start_range && $no_of_persons <= $Drange[$j] )
											{
												$amount = $dBPAmount[$i];
											}
											$i += 4;
											$j++;
										}
										if($amount > 0)
										{
											
											$accom = "Yes";
											$disprice = $amount;
											return array(
												'accom' => $accom,
												'disprice' => $disprice,
											);
										}
										else
										{
											$accom = "Yes";
											$amt1 = "";
											if($accom_type == 1)
											{
												$amt1 = explode(',',trim($row->apply_promo_single_room, ','));
											}
											else if($accom_type == 2)
											{
												$amt1 = explode(',',trim($row->apply_promo_twin_room, ','));
											}
											else if($accom_type == 3)
											{
												$amt1 = explode(',',trim($row->apply_promo_three_person_room, ','));
											}
											else
											{
												$amt1 = explode(',',trim($row->apply_promo_quad_room, ','));
											}
											
											///$amt1 = explode(',',trim($row->apply_promo_single_room,','));
											$disprice = $amt1[0];
											
											return array(
												'accom' => $accom,
												'disprice' => $disprice,
											);
										}
										
									}
									else
									{
										if($row->discount_bulk_purchase == 'Yes')
										{
											$Srange = explode(',',trim($row->range_start,','));
											$Drange = explode(',',trim($row->range_end, ','));
											$dBPAmount = 0;	
											
										
												if($accom_type == 1)
												{
													$dBPAmount = explode(',',trim($row->apply_discount_single_room, ','));
												}
												else if($accom_type == 2)
												{
													$dBPAmount = explode(',',trim($row->apply_discount_twin_room, ','));
												}
												else if($accom_type == 3)
												{
													$dBPAmount = explode(',',trim($row->apply_discount_three_person_room, ','));
												}
												else
												{
													$dBPAmount = explode(',',trim($row->apply_discount_quad_room, ','));
												}
											
											$i = 0;
											$j = 0;
											foreach($Srange as $start_range)
											{
												if($no_of_persons >= $start_range && $no_of_persons <= $Drange[$j] )
												{
													 $amount = $dBPAmount[$i];
												}
												$i += 4;
												$j++;
											}
											if($amount > 0)
											{
												$accom = "Yes";
												$disprice = $amount;
												return array(
													'accom' => $accom,
													'disprice' => $disprice,
												);
											}
											else
											{
												
												$accom = "Yes";
												$amt1 = "";
												if($accom_type == 1)
												{
													$amt1 = explode(',',trim($row->apply_promo_single_room, ','));
												}
												else if($accom_type == 2)
												{
													$amt1 = explode(',',trim($row->apply_promo_twin_room, ','));
												}
												else if($accom_type == 3)
												{
													$amt1 = explode(',',trim($row->apply_promo_three_person_room, ','));
												}
												else
												{
													$amt1 = explode(',',trim($row->apply_promo_quad_room, ','));
												}
												
												//$parray = explode(',',$row->product_inclusive_accomodation_single);
												$accom = "Yes";
												$disprice = $amt1[0];
												
												return array(
													'accom' => $accom,
													'disprice' => $disprice,
												);
											}
										}

										else
										{
											$accom = "Yes";
											$amt1 = "";
											if($accom_type == 1)
											{
												$amt1 = explode(',',trim($row->apply_promo_single_room, ','));
											}
											else if($accom_type == 2)
											{
												$amt1 = explode(',',trim($row->apply_promo_twin_room, ','));
											}
											else if($accom_type == 3)
											{
												$amt1 = explode(',',trim($row->apply_promo_three_person_room, ','));
											}
											else
											{
												$amt1 = explode(',',trim($row->apply_promo_quad_room, ','));
											}
											
											//$parray = explode(',',$row->product_inclusive_accomodation_single);
											$accom = "Yes";
											$disprice = $amt1[0];
											
											return array(
												'accom' => $accom,
												'disprice' => $disprice,
											);
										}
									}
								}
								else
								{
	// if promo is not applicable means next check the Bulk discount
									if($row->discount_bulk_purchase == 'Yes')
									{
										$Srange = explode(',',trim($row->range_start,','));
										$Drange = explode(',',trim($row->range_end, ','));
										$dBPAmount = 0;	
										
									
											if($accom_type == 1)
											{
												$dBPAmount = explode(',',trim($row->apply_discount_single_room, ','));
											}
											else if($accom_type == 2)
											{
												$dBPAmount = explode(',',trim($row->apply_discount_twin_room, ','));
											}
											else if($accom_type == 3)
											{
												$dBPAmount = explode(',',trim($row->apply_discount_three_person_room, ','));
											}
											else
											{
												$dBPAmount = explode(',',trim($row->apply_discount_quad_room, ','));
											}
										
										$i = 0;
										$j = 0;
										foreach($Srange as $start_range)
										{
											if($no_of_persons >= $start_range && $no_of_persons <= $Drange[$j] )
											{
												 $amount = $dBPAmount[$i];
											}
											$i += 4;
											$j++;
										}
										if($amount > 0)
										{
											$accom = "Yes";
											$disprice = $amount;
											return array(
												'accom' => $accom,
												'disprice' => $disprice,
											);
										}
										else
										{
											$parray = "";
											if($accom_type == 1)
											{
												$parray = explode(',',trim($row->product_inclusive_accomodation_single, ','));
											}
											else if($accom_type == 2)
											{
												$parray = explode(',',trim($row->product_inclusive_accomodation_twin, ','));
											}
											else if($accom_type == 3)
											{
												$parray = explode(',',trim($row->product_inclusive_accomodation_3person, ','));
											}
											else
											{
												$parray = explode(',',trim($row->product_inclusive_accomodation_quad, ','));
											}
											
											//$parray = explode(',',$row->product_inclusive_accomodation_single);
											$accom = "Yes";
											$disprice = $parray[0];
											
											return array(
												'accom' => $accom,
												'disprice' => $disprice,
											);
										}
									}
									else
									{
									// Display the normal  Single room Rate

										$parray = "";
											if($accom_type == 1)
											{
												$parray = explode(',',trim($row->product_inclusive_accomodation_single, ','));
											}
											else if($accom_type == 2)
											{
												$parray = explode(',',trim($row->product_inclusive_accomodation_twin, ','));
											}
											else if($accom_type == 3)
											{
												$parray = explode(',',trim($row->product_inclusive_accomodation_3person, ','));
											}
											else
											{
												$parray = explode(',',trim($row->product_inclusive_accomodation_quad, ','));
											}
										//$parray = explode(',',$row->product_inclusive_accomodation_single);
										$accom = "Yes";
										$disprice = $parray[0];
										
										return array(
												'accom' => $accom,
												'disprice' => $disprice,
											);
									}
								}
							}
							else if($row->discount_bulk_purchase == 'Yes')
							{
								$Srange = explode(',',trim($row->range_start,','));
								$Drange = explode(',',trim($row->range_end, ','));
								$dBPAmount = 0;	
								
								if($accom_type == 1)
								{
									$dBPAmount = explode(',',trim($row->apply_discount_single_room, ','));
								}
								else if($accom_type == 2)
								{
									$dBPAmount = explode(',',trim($row->apply_discount_twin_room, ','));
								}
								else if($accom_type == 3)
								{
									$dBPAmount = explode(',',trim($row->apply_discount_three_person_room, ','));
								}
								else
								{
									$dBPAmount = explode(',',trim($row->apply_discount_quad_room, ','));
								}
								//$dBPAmount = explode(',',trim($row->apply_discount_single_room, ','));
								
								$i = 0;
								$j = 0;
								foreach($Srange as $start_range)
								{
									if($no_of_persons >= $start_range && $no_of_persons <= $Drange[$j] )
									{
										$amount = $dBPAmount[$i];
									}
									$i += 4;
									$j++;
								}
								if($amount > 0)
								{
									$accom = "Yes";
									$disprice = $amount;
									return array(
												'accom' => $accom,
												'disprice' => $disprice,
											);
								}
								else
								{
									$parray = "";
											if($accom_type == 1)
											{
												$parray = explode(',',trim($row->product_inclusive_accomodation_single, ','));
											}
											else if($accom_type == 2)
											{
												$parray = explode(',',trim($row->product_inclusive_accomodation_twin, ','));
											}
											else if($accom_type == 3)
											{
												$parray = explode(',',trim($row->product_inclusive_accomodation_3person, ','));
											}
											else
											{
												$parray = explode(',',trim($row->product_inclusive_accomodation_quad, ','));
											} 
									//$parray = explode(',',$row->product_inclusive_accomodation_single);
									$accom = "Yes";
									$disprice = $parray[0];
									
									return array(
												'accom' => $accom,
												'disprice' => $disprice,
											);
								}
							}
							
							else
							{
							// Display the normal  Single room Rate 
							$parray = "";
											if($accom_type == 1)
											{
												$parray = explode(',',trim($row->product_inclusive_accomodation_single, ','));
											}
											else if($accom_type == 2)
											{
												$parray = explode(',',trim($row->product_inclusive_accomodation_twin, ','));
											}
											else if($accom_type == 3)
											{
												$parray = explode(',',trim($row->product_inclusive_accomodation_3person, ','));
											}
											else
											{
												$parray = explode(',',trim($row->product_inclusive_accomodation_quad, ','));
											}
								//$parray = explode(',',$row->product_inclusive_accomodation_single);
								$accom = "Yes";
								$disprice = $parray[0];
								
								return array(
												'accom' => $accom,
												'disprice' => $disprice,
											);
							}
						}
						else
						{
							//Normal Rates
							if($row->apply_promo == 'Yes')
							{
								$promoStartDate = $row->start_date;
								$promoEndDate = $row->end_date;
								$current_date = new DateTime();
								$cDate = $current_date->format("Y-m-d");
								if($cDate >= $promoStartDate && $cDate <= $promoEndDate)
								{
	//if the Promo is Applied means then to check whether the apply_promo_bilk_discount  
									if($row->apply_promo_bilk_discount == 'Yes')
									{
										$Srange = explode(',',trim($row->range_start,','));
										$Drange = explode(',',trim($row->range_end, ','));
										
										$dBPAmount = explode(',',trim($row->apply_promo_bulk_nr, ','));
										
										$i = 0;
										foreach($Srange as $start_range)
										{
											if($no_of_persons >= $start_range && $no_of_persons <= $Drange[$i] )
											{
												$amount = $dBPAmount[$i];
											}
											$i++;
										}
										if($amount > 0)
										{
											
											$accom = "No";
											$disprice = $amount;
											return array(
												'accom' => $accom,
												'disprice' => $disprice,
											);
										}
										else
										{
											$accom = "No";
											//$amt1 = explode(',',trim($row->apply_promo_nr,','));
											$disprice = $row->apply_promo_nr;
											
											return array(
												'accom' => $accom,
												'disprice' => $disprice,
											);
										}
										
									}
									else
									{
										if($row->discount_bulk_purchase == 'Yes')
										{
											$Srange = explode(',',trim($row->range_start,','));
											$Drange = explode(',',trim($row->range_end, ','));
											$dBPAmount = 0;	

											$dBPAmount = explode(',',trim($row->apply_discount_nr, ','));
											
											$i = 0;
											foreach($Srange as $start_range)
											{
												if($no_of_persons >= $start_range && $no_of_persons <= $Drange[$i] )
												{
													$amount = $dBPAmount[$i];
												}
												$i++;
											}
											if($amount > 0)
											{
												$accom = "No";
												$disprice = $amount;
												return array(
													'accom' => $accom,
													'disprice' => $disprice,
												);
											}
											else
											{
												//$parray = explode(',',$row->product_normal_rate);
												$accom = "No";
												//$amt1 = explode(',',trim($row->apply_promo_nr,','));
												$disprice = $row->apply_promo_nr;
												
												return array(
														'accom' => $accom,
														'disprice' => $disprice,
													);
											}
										}

										else
										{
											$accom = "No";
											//$amt1 = explode(',',trim($row->apply_promo_nr,','));
											$disprice = $row->apply_promo_nr;
											
											return array(
													'accom' => $accom,
													'disprice' => $disprice,
												);
										}
									}
								}
								else
								{
	// if promo is not applicable means next check the Bulk discount
									if($row->discount_bulk_purchase == 'Yes')
									{
										$Srange = explode(',',trim($row->range_start,','));
										$Drange = explode(',',trim($row->range_end, ','));
										$dBPAmount = 0;	

										$dBPAmount = explode(',',trim($row->apply_discount_nr, ','));
										
										$i = 0;
										foreach($Srange as $start_range)
										{
											if($no_of_persons >= $start_range && $no_of_persons <= $Drange[$i] )
											{
												$amount = $dBPAmount[$i];
											}
											$i++;
										}
										if($amount > 0)
										{
											$accom = "No";
											$disprice = $amount;
											return array(
												'accom' => $accom,
												'disprice' => $disprice,
											);
										}
										else
										{
											//$parray = explode(',',$row->product_normal_rate);
											$accom = "No";
											$disprice = $row->product_normal_rate;
											
											return array(
												'accom' => $accom,
												'disprice' => $disprice,
											);
										}
									}
									else
									{
									// Display the normal  Single room Rate 
										//$parray = explode(',',$row->product_normal_rate);
										$accom = "No";
										$disprice = $row->product_normal_rate;
										
										return array(
												'accom' => $accom,
												'disprice' => $disprice,
											);
									}
								}
							}
							else if($row->discount_bulk_purchase == 'Yes')
							{
								$Srange = explode(',',trim($row->range_start,','));
								$Drange = explode(',',trim($row->range_end, ','));
								$dBPAmount = 0;	

								$dBPAmount = explode(',',trim($row->apply_discount_nr, ','));
								
								$i = 0;
								foreach($Srange as $start_range)
								{
									if($no_of_persons >= $start_range && $no_of_persons <= $Drange[$i] )
									{
										$amount = $dBPAmount[$i];
									}
									$i+3;
								}
								if($amount > 0)
								{
									$accom = "No";
									$disprice = $amount;
									return array(
												'accom' => $accom,
												'disprice' => $disprice,
											);
								}
								else
								{
									//$parray = explode(',',$row->product_normal_rate);
									$accom = "No";
									$disprice = $row->product_normal_rate;
									
									return array(
												'accom' => $accom,
												'disprice' => $disprice,
											);
								}
							}
							else
							{
							// Display the normal  Single room Rate 
								//$parray = explode(',',$row->product_normal_rate);
								$accom = "No";
								$disprice = $row->product_normal_rate;
								
								return array(
												'accom' => $accom,
												'disprice' => $disprice,
											);
							}
							
						}
					break;
					
					case "NA":
						return array(
									'accom' => 'No',
									'disprice' => '0.00',
								);
					
					break;
					default:
					
					break;
			}		
		
			}
		}
		function packageRoomrates($data , $daytype , $accom_type , $no_of_persons)
		{
			foreach($data as $row)
			{
				$data116 = $this->db->get_where('tbl_dcprofile', array('user_id'=>$row->user_id))->row();
				$dccur = $data116->dccurrency;
				$amount_type ="";
				$amount = 0;
				$disprice = 0;
				$accom = "";
				$dBPAmount = 0;
				
				switch($daytype) 
				{
					case "WE":
						
						If ($row->disaccomodation == "Yes") 
						{
							//Accommodation Rates
							if($row->apply_promo == 'Yes')
							{
								$promoStartDate = $row->start_date;
								$promoEndDate = $row->end_date;
								$current_date = new DateTime();
								$cDate = $current_date->format("Y-m-d");
								if($cDate >= $promoStartDate && $cDate <= $promoEndDate)
								{
	//if the Promo is Applied means then to check whether the apply_promo_bilk_discount  
									if($row->apply_promo_bilk_discount == 'Yes')
									{
										$Srange = explode(',',trim($row->range_start,','));
										$Drange = explode(',',trim($row->range_end, ','));
										
										$dBPAmount = "";
										if($accom_type == 1)
										{
											$dBPAmount = explode(',',trim($row->apply_promo_bulk_single_room, ','));
										}
										else if($accom_type == 2)
										{
											$dBPAmount = explode(',',trim($row->apply_promo_bulk_twin_room, ','));
										}
										else if($accom_type == 3)
										{
											$dBPAmount = explode(',',trim($row->apply_promo_bulk_three_person_room, ','));
										}
										else
										{
											$dBPAmount = explode(',',trim($row->apply_promo_bulk_quad_room, ','));
										}
										$i = 1;
										$j = 0;
										foreach($Srange as $start_range)
										{
											if($no_of_persons >= $start_range && $no_of_persons <= $Drange[$j] )
											{
												$amount = $dBPAmount[$i];
											}
											$i +=  4;
											$j++;
										}
										if($amount > 0)
										{
											//$amount_type = "apply_promo_bilk_discount";
											return array(
												'accom' => "Yes",
												'disprice' => $amount,
											);
											
										}
										else
										{
											$amt1 =0;
											if($accom_type == 1)
											{
												$amt1 = explode(',',trim($row->apply_promo_single_room,','));
											}
											else if($accom_type == 2)
											{
												$amt1 = explode(',',trim($row->apply_promo_twin_room,','));
											}
											else if($accom_type == 3)
											{
												$amt1 = explode(',',trim($row->apply_promo_three_person_room,','));
											}
											else
											{
												$amt1 = explode(',',trim($row->apply_promo_quad_room,','));
											}
										
										
											$accom = "Yes";
											//$amount_type = "apply_promo";
										//	$amt1 = explode(',',trim($row->apply_promo_single_room,','));
											$disprice = $amt1[1];
											
											return array(
												'accom' => $accom,
												'disprice' => $disprice,
											);
										}
										
									}
									else
									{
										if($row->discount_bulk_purchase == 'Yes')
										{
											$Srange = explode(',',trim($row->range_start,','));
											$Drange = explode(',',trim($row->range_end, ','));
											$dBPAmount = 0;	
											
											if($accom_type == 1)
											{
												$dBPAmount = explode(',',trim($row->apply_discount_single_room, ','));
											}
											else if($accom_type == 2)
											{
												$dBPAmount = explode(',',trim($row->apply_discount_twin_room, ','));
											}
											else if($accom_type == 3)
											{
												$dBPAmount = explode(',',trim($row->apply_discount_three_person_room, ','));
											}
											else
											{
												$dBPAmount = explode(',',trim($row->apply_discount_quad_room, ','));
											}
												
											
											$i = 1;
											$j = 0;
											foreach($Srange as $start_range)
											{
												if($no_of_persons >= $start_range && $no_of_persons <= $Drange[$j] )
												{
													$amount = $dBPAmount[$i];
												}
												$i += 4;
												$j++;
											}
											if($amount > 0)
											{
												
												$accom = "Yes";
												$disprice = $amount;
												return array(
													'accom' => $accom,
													'disprice' => $disprice,
												);
											}
											else
											{
												$accom = "Yes";
												$amt1 =0;
													if($accom_type == 1)
													{
														$amt1 = explode(',',trim($row->apply_promo_single_room,','));
													}
													else if($accom_type == 2)
													{
														$amt1 = explode(',',trim($row->apply_promo_twin_room,','));
													}
													else if($accom_type == 3)
													{
														$amt1 = explode(',',trim($row->apply_promo_three_person_room,','));
													}
													else
													{
														$amt1 = explode(',',trim($row->apply_promo_quad_room,','));
													}
												
												$disprice = $amt1[1];
												
												return array(
														'accom' => $accom,
														'disprice' => $disprice,
													);
											}
										}

										else
										{
											$accom = "Yes";
											$amt1 =0;
												if($accom_type == 1)
												{
													$amt1 = explode(',',trim($row->apply_promo_single_room,','));
												}
												else if($accom_type == 2)
												{
													$amt1 = explode(',',trim($row->apply_promo_twin_room,','));
												}
												else if($accom_type == 3)
												{
													$amt1 = explode(',',trim($row->apply_promo_three_person_room,','));
												}
												else
												{
													$amt1 = explode(',',trim($row->apply_promo_quad_room,','));
												}
											
											$disprice = $amt1[1];
											
											return array(
													'accom' => $accom,
													'disprice' => $disprice,
												);
										}
									}
								}
								else
								{
	// if promo is not applicable means next check the Bulk discount
									if($row->discount_bulk_purchase == 'Yes')
									{
										$Srange = explode(',',trim($row->range_start,','));
										$Drange = explode(',',trim($row->range_end, ','));
										$dBPAmount = 0;	
										
										if($accom_type == 1)
										{
											$dBPAmount = explode(',',trim($row->apply_discount_single_room, ','));
										}
										else if($accom_type == 2)
										{
											$dBPAmount = explode(',',trim($row->apply_discount_twin_room, ','));
										}
										else if($accom_type == 3)
										{
											$dBPAmount = explode(',',trim($row->apply_discount_three_person_room, ','));
										}
										else
										{
											$dBPAmount = explode(',',trim($row->apply_discount_quad_room, ','));
										}
											
										
										$i = 1;
										$j = 0;
										foreach($Srange as $start_range)
										{
											if($no_of_persons >= $start_range && $no_of_persons <= $Drange[$j] )
											{
												$amount = $dBPAmount[$i];
											}
											$i += 4;
											$j++;
										}
										if($amount > 0)
										{
											
											$accom = "Yes";
											$disprice = $amount;
											return array(
												'accom' => $accom,
												'disprice' => $disprice,
											);
										}
										else
										{
											$parray="";
											if($accom_type == 1)
											{
												$parray = explode(',',$row->single_room);
											}
											else if($accom_type == 2)
											{
												$parray = explode(',',$row->twin_room);
											}
											else if($accom_type == 3)
											{
												$parray = explode(',',$row->three_person_room);
											}
											else
											{
												$parray = explode(',',$row->quad_room);
											}
											
											$accom = "Yes";
											$disprice = $parray[1];
											
											return array(
												'accom' => $accom,
												'disprice' => $disprice,
											);
										}
									}
									else
									{
									// Display the normal  Single room Rate 
									$parray="";
											if($accom_type == 1)
											{
												$parray = explode(',',$row->single_room);
											}
											else if($accom_type == 2)
											{
												$parray = explode(',',$row->twin_room);
											}
											else if($accom_type == 3)
											{
												$parray = explode(',',$row->three_person_room);
											}
											else
											{
												$parray = explode(',',$row->quad_room);
											}
										//$parray = explode(',',$row->single_room);
										$accom = "Yes";
										$disprice = $parray[1];
									
										return array(
												'accom' => $accom,
												'disprice' => $disprice,
											);
									}
								}
							}
							else if($row->discount_bulk_purchase == 'Yes')
							{
								$Srange = explode(',',trim($row->range_start,','));
								$Drange = explode(',',trim($row->range_end, ','));
								$dBPAmount = 0;	

								if($accom_type == 1)
								{
									$dBPAmount = explode(',',trim($row->apply_discount_single_room, ','));
								}
								else if($accom_type == 2)
								{
									$dBPAmount = explode(',',trim($row->apply_discount_twin_room, ','));
								}
								else if($accom_type == 3)
								{
									$dBPAmount = explode(',',trim($row->apply_discount_three_person_room, ','));
								}
								else
								{
									$dBPAmount = explode(',',trim($row->apply_discount_quad_room, ','));
								}
								//$dBPAmount = explode(',',trim($row->apply_discount_single_room, ','));
								
								$i = 1;
								$j = 0;
								foreach($Srange as $start_range)
								{
									if($no_of_persons >= $start_range && $no_of_persons <= $Drange[$j] )
									{
										$amount = $dBPAmount[$i];
									}
									$i += 4;
									$j++;
								}
								if($amount > 0)
								{
									$accom = "Yes";
									$disprice = $amount;
									
									return array(
												'accom' => $accom,
												'disprice' => $disprice,
											);
								}
								else
								{
									$parray="";
											if($accom_type == 1)
											{
												$parray = explode(',',$row->single_room);
											}
											else if($accom_type == 2)
											{
												$parray = explode(',',$row->twin_room);
											}
											else if($accom_type == 3)
											{
												$parray = explode(',',$row->three_person_room);
											}
											else
											{
												$parray = explode(',',$row->quad_room);
											}
								//	$parray = explode(',',$row->single_room);
									$accom = "Yes";
									$disprice = $parray[1];
									
									return array(
												'accom' => $accom,
												'disprice' => $disprice,
											);
								}
							}
							else
							{
							// Display the normal  Single room Rate 
							$parray="";
											if($accom_type == 1)
											{
												$parray = explode(',',$row->single_room);
											}
											else if($accom_type == 2)
											{
												$parray = explode(',',$row->twin_room);
											}
											else if($accom_type == 3)
											{
												$parray = explode(',',$row->three_person_room);
											}
											else
											{
												$parray = explode(',',$row->quad_room);
											}
								$accom = "Yes";
								$disprice = $parray[1];
							
								return array(
												'accom' => $accom,
												'disprice' => $disprice,
											);
							}
						}
						else
						{
							//Normal Rates
							if($row->apply_promo == 'Yes')
							{
								$promoStartDate = $row->start_date;
								$promoEndDate = $row->end_date;
								$current_date = new DateTime();
								$cDate = $current_date->format("Y-m-d");
								if($cDate >= $promoStartDate && $cDate <= $promoEndDate)
								{
	//if the Promo is Applied means then to check whether the apply_promo_bilk_discount  
									if($row->apply_promo_bilk_discount == 'Yes')
									{
										$Srange = explode(',',trim($row->range_start,','));
										$Drange = explode(',',trim($row->range_end, ','));
										
										$dBPAmount = explode(',',trim($row->apply_promo_bulk_wr, ','));
										
										$i = 0;
										foreach($Srange as $start_range)
										{
											if($no_of_persons >= $start_range && $no_of_persons <= $Drange[$i] )
											{
												$amount = $dBPAmount[$i];
											}
											$i++;
										}
										if($amount > 0)
										{
											
											$accom = "No";
											$disprice = $amount;
											return array(
												'accom' => $accom,
												'disprice' => $disprice,
											);
										}
										else
										{
											$accom = "No";
											//$amt1 = explode(',',trim(,','));
											$disprice = $row->apply_promo_wr;
											
											return array(
												'accom' => $accom,
												'disprice' => $disprice,
											);
										}
										
									}
									else
									{
										if($row->discount_bulk_purchase == 'Yes')
										{
											$Srange = explode(',',trim($row->range_start,','));
											$Drange = explode(',',trim($row->range_end, ','));
											$dBPAmount = 0;	

											$dBPAmount = explode(',',trim($row->apply_discount_wr, ','));
											
											$i = 0;
											foreach($Srange as $start_range)
											{
												if($no_of_persons >= $start_range && $no_of_persons <= $Drange[$i] )
												{
													$amount = $dBPAmount[$i];
												}
												$i++;
											}
											if($amount > 0)
											{
												$accom = "No";
												$disprice = $amount;
												
												return array(
													'accom' => $accom,
													'disprice' => $disprice,
												);
											}
											else
											{
												$accom = "No";
												//$amt1 = explode(',',trim($row->apply_promo_wr,','));
												$disprice = $row->apply_promo_wr;
												
												return array(
														'accom' => $accom,
														'disprice' => $disprice,
													);
											}
										}

										else
										{
											$accom = "No";
											//$amt1 = explode(',',trim($row->apply_promo_wr,','));
											$disprice = $row->apply_promo_wr;
											
											return array(
													'accom' => $accom,
													'disprice' => $disprice,
												);
										}
									}
								}
								else
								{
	// if promo is not applicable means next check the Bulk discount
									if($row->discount_bulk_purchase == 'Yes')
									{
										$Srange = explode(',',trim($row->range_start,','));
										$Drange = explode(',',trim($row->range_end, ','));
										$dBPAmount = 0;	

										$dBPAmount = explode(',',trim($row->apply_discount_wr, ','));
										
										$i = 0;
										foreach($Srange as $start_range)
										{
											if($no_of_persons >= $start_range && $no_of_persons <= $Drange[$i] )
											{
												$amount = $dBPAmount[$i];
											}
											$i++;
										}
										if($amount > 0)
										{
											$accom = "No";
											$disprice = $amount;
											
											return array(
												'accom' => $accom,
												'disprice' => $disprice,
											);
										}
										else
										{
											//$parray = explode(',',$row->product_weekend_rate);
											$accom = "No";
											$disprice = $row->product_weekend_rate;
											
											
											return array(
												'accom' => $accom,
												'disprice' => $disprice,
											);
										}
									}
									else
									{
									// Display the normal  Single room Rate 
										//$parray = explode(',',$row->product_weekend_rate);
										$accom = "No";
										$disprice = $row->product_weekend_rate;
										
										return array(
												'accom' => $accom,
												'disprice' => $disprice,
											);
									}
								}
							}
							else if($row->discount_bulk_purchase == 'Yes')
							{
								$Srange = explode(',',trim($row->range_start,','));
								$Drange = explode(',',trim($row->range_end, ','));
								$dBPAmount = 0;	

								$dBPAmount = explode(',',trim($row->apply_discount_wr, ','));
								
								$i = 0;
								foreach($Srange as $start_range)
								{
									if($no_of_persons >= $start_range && $no_of_persons <= $Drange[$i] )
									{
										$amount = $dBPAmount[$i];
									}
									$i++;
								}
								if($amount > 0)
								{
									$accom = "No";
									$disprice = $amount;
									return array(
												'accom' => $accom,
												'disprice' => $disprice,
											);
								}
								else
								{
								//	$parray = explode(',',$row->product_normal_rate);
									$accom = "No";
									$disprice = $row->product_weekend_rate;
									
									return array(
												'accom' => $accom,
												'disprice' => $disprice,
											);
								}
							}
							else
							{
							// Display the normal  Single room Rate 
								//$parray = explode(',',$row->product_normal_rate);
								$accom = "No";
								$disprice = $row->product_weekend_rate;
								
								return array(
												'accom' => $accom,
												'disprice' => $disprice,
											);
							}
							
						}

					break;
					case "PK":

						If ($row->disaccomodation == "Yes") 
						{
							//Accommodation Rates
							if($row->apply_promo == 'Yes')
							{
								$promoStartDate = $row->start_date;
								$promoEndDate = $row->end_date;
								$current_date = new DateTime();
								$cDate = $current_date->format("Y-m-d");
								if($cDate >= $promoStartDate && $cDate <= $promoEndDate)
								{
	//if the Promo is Applied means then to check whether the apply_promo_bilk_discount  
									if($row->apply_promo_bilk_discount == 'Yes')
									{
										$Srange = explode(',',trim($row->range_start,','));
										$Drange = explode(',',trim($row->range_end, ','));
										
										$dBPAmount = "";
										if($accom_type == 1)
										{
											$dBPAmount = explode(',',trim($row->apply_promo_bulk_single_room, ','));
										}
										else if($accom_type == 2)
										{
											$dBPAmount = explode(',',trim($row->apply_promo_bulk_twin_room, ','));
										}
										else if($accom_type == 3)
										{
											$dBPAmount = explode(',',trim($row->apply_promo_bulk_three_person_room, ','));
										}
										else
										{
											$dBPAmount = explode(',',trim($row->apply_promo_bulk_quad_room, ','));
										}
										$i = 2;
										$j = 0;
										foreach($Srange as $start_range)
										{
											if($no_of_persons >= $start_range && $no_of_persons <= $Drange[$j] )
											{
												$amount = $dBPAmount[$i];
											}
											$i += 4;
											$j++;
										}
										if($amount > 0)
										{
											
											$accom = "Yes";
											$disprice = $amount;
											
											return array(
												'accom' => $accom,
												'disprice' => $disprice,
											);
										}
										else
										{
											$accom = "Yes";
												$amt1 =0;
											if($accom_type == 1)
											{
												$amt1 = explode(',',trim($row->apply_promo_single_room,','));
											}
											else if($accom_type == 2)
											{
												$amt1 = explode(',',trim($row->apply_promo_twin_room,','));
											}
											else if($accom_type == 3)
											{
												$amt1 = explode(',',trim($row->apply_promo_three_person_room,','));
											}
											else
											{
												$amt1 = explode(',',trim($row->apply_promo_quad_room,','));
											}
										
											$disprice = $amt1[2];
											
											return array(
												'accom' => $accom,
												'disprice' => $disprice,
											);
										}
										
									}
									else
									{
										if($row->discount_bulk_purchase == 'Yes')
										{
											$Srange = explode(',',trim($row->range_start,','));
											$Drange = explode(',',trim($row->range_end, ','));
											$dBPAmount = 0;	
											
											if($accom_type == 1)
											{
												$dBPAmount = explode(',',trim($row->apply_discount_single_room, ','));
											}
											else if($accom_type == 2)
											{
												$dBPAmount = explode(',',trim($row->apply_discount_twin_room, ','));
											}
											else if($accom_type == 3)
											{
												$dBPAmount = explode(',',trim($row->apply_discount_three_person_room, ','));
											}
											else
											{
												$dBPAmount = explode(',',trim($row->apply_discount_quad_room, ','));
											}
										//	$dBPAmount = explode(',',trim($row->apply_discount_single_room, ','));
											
											$i = 2;
											$j = 0;
											foreach($Srange as $start_range)
											{
												if($no_of_persons >= $start_range && $no_of_persons <= $Drange[$j] )
												{
													$amount = $dBPAmount[$i];
												}
												$i += 4;
												$j++;
											}
											if($amount > 0)
											{
												
												$accom = "Yes";
												$disprice = $amount;
												return array(
													'accom' => $accom,
													'disprice' => $disprice,
												);
											}
											else
											{
												$accom = "Yes";
												$amt1 =0;
												if($accom_type == 1)
												{
													$amt1 = explode(',',trim($row->apply_promo_single_room,','));
												}
												else if($accom_type == 2)
												{
													$amt1 = explode(',',trim($row->apply_promo_twin_room,','));
												}
												else if($accom_type == 3)
												{
													$amt1 = explode(',',trim($row->apply_promo_three_person_room,','));
												}
												else
												{
													$amt1 = explode(',',trim($row->apply_promo_quad_room,','));
												}
											
												$disprice = $amt1[2];
												
												return array(
														'accom' => $accom,
														'disprice' => $disprice,
													);
											}
										}
										else
										{
											$accom = "Yes";
												$amt1 =0;
												if($accom_type == 1)
												{
													$amt1 = explode(',',trim($row->apply_promo_single_room,','));
												}
												else if($accom_type == 2)
												{
													$amt1 = explode(',',trim($row->apply_promo_twin_room,','));
												}
												else if($accom_type == 3)
												{
													$amt1 = explode(',',trim($row->apply_promo_three_person_room,','));
												}
												else
												{
													$amt1 = explode(',',trim($row->apply_promo_quad_room,','));
												}
											
											$disprice = $amt1[2];
											
											return array(
													'accom' => $accom,
													'disprice' => $disprice,
												);
										}
									}
								}
								else
								{
	// if promo is not applicable means next check the Bulk discount
									if($row->discount_bulk_purchase == 'Yes')
									{
										$Srange = explode(',',trim($row->range_start,','));
										$Drange = explode(',',trim($row->range_end, ','));
										$dBPAmount = 0;	
										
										if($accom_type == 1)
										{
											$dBPAmount = explode(',',trim($row->apply_discount_single_room, ','));
										}
										else if($accom_type == 2)
										{
											$dBPAmount = explode(',',trim($row->apply_discount_twin_room, ','));
										}
										else if($accom_type == 3)
										{
											$dBPAmount = explode(',',trim($row->apply_discount_three_person_room, ','));
										}
										else
										{
											$dBPAmount = explode(',',trim($row->apply_discount_quad_room, ','));
										}
									//	$dBPAmount = explode(',',trim($row->apply_discount_single_room, ','));
										
										$i = 2;
										$j = 0;
										foreach($Srange as $start_range)
										{
											if($no_of_persons >= $start_range && $no_of_persons <= $Drange[$j] )
											{
												$amount = $dBPAmount[$i];
											}
											$i += 4;
											$j++;
										}
										if($amount > 0)
										{
											
											$accom = "Yes";
											$disprice = $amount;
											return array(
												'accom' => $accom,
												'disprice' => $disprice,
											);
										}
										else
										{
											$parray="";
											if($accom_type == 1)
											{
												$parray = explode(',',$row->single_room);
											}
											else if($accom_type == 2)
											{
												$parray = explode(',',$row->twin_room);
											}
											else if($accom_type == 3)
											{
												$parray = explode(',',$row->three_person_room);
											}
											else
											{
												$parray = explode(',',$row->quad_room);
											}
											//$parray = explode(',',$row->single_room);
											$accom = "Yes";
											$disprice = $parray[2];
											
											return array(
												'accom' => $accom,
												'disprice' => $disprice,
											);
										}
									}
									else
									{
									// Display the normal  Single room Rate 
										//$parray = explode(',',$row->single_room);
										$parray="";
											if($accom_type == 1)
											{
												$parray = explode(',',$row->single_room);
											}
											else if($accom_type == 2)
											{
												$parray = explode(',',$row->twin_room);
											}
											else if($accom_type == 3)
											{
												$parray = explode(',',$row->three_person_room);
											}
											else
											{
												$parray = explode(',',$row->quad_room);
											}
										$accom = "Yes";
										$disprice = $parray[2];
									
										return array(
												'accom' => $accom,
												'disprice' => $disprice,
											);
									}
								}
							}
							else if($row->discount_bulk_purchase == 'Yes')
							{
								$Srange = explode(',',trim($row->range_start,','));
								$Drange = explode(',',trim($row->range_end, ','));
								$dBPAmount = 0;	

								
								if($accom_type == 1)
								{
									$dBPAmount = explode(',',$row->apply_discount_single_room);
								}
								else if($accom_type == 2)
								{
									$dBPAmount = explode(',',$row->apply_discount_twin_room);
								}
								else if($accom_type == 3)
								{
									$dBPAmount = explode(',',$row->apply_discount_three_person_room);
								}
								else
								{
									$dBPAmount = explode(',',$row->apply_discount_quad_room);
								}
											
											
								//$dBPAmount = explode(',',trim($row->apply_discount_single_room, ','));
								
								$i = 2;
								$j = 0;
								foreach($Srange as $start_range)
								{
									if($no_of_persons >= $start_range && $no_of_persons <= $Drange[$j] )
									{
										$amount = $dBPAmount[$i];
									}
									$i += 4;
									$j++;
								}
								if($amount > 0)
								{
									
									$accom = "Yes";
									$disprice = $amount;
									return array(
												'accom' => $accom,
												'disprice' => $disprice,
											);
								}
								else
								{
									$parray="";
											if($accom_type == 1)
											{
												$parray = explode(',',$row->single_room);
											}
											else if($accom_type == 2)
											{
												$parray = explode(',',$row->twin_room);
											}
											else if($accom_type == 3)
											{
												$parray = explode(',',$row->three_person_room);
											}
											else
											{
												$parray = explode(',',$row->quad_room);
											}
								//	$parray = explode(',',$row->single_room);
									$accom = "Yes";
									$disprice = $parray[2];
									
									return array(
												'accom' => $accom,
												'disprice' => $disprice,
											);
								}
							}
							else
							{
							// Display the normal  Single room Rate 
								//$parray = explode(',',$row->single_room);
								$parray="";
											if($accom_type == 1)
											{
												$parray = explode(',',$row->single_room);
											}
											else if($accom_type == 2)
											{
												$parray = explode(',',$row->twin_room);
											}
											else if($accom_type == 3)
											{
												$parray = explode(',',$row->three_person_room);
											}
											else
											{
												$parray = explode(',',$row->quad_room);
											}
								$accom = "Yes";
								$disprice = $parray[2];
								
								return array(
												'accom' => $accom,
												'disprice' => $disprice,
											);
							}
						}
						else
						{
							//Normal Rates
							if($row->apply_promo == 'Yes')
							{
								$promoStartDate = $row->start_date;
								$promoEndDate = $row->end_date;
								$current_date = new DateTime();
								$cDate = $current_date->format("Y-m-d");
								if($cDate >= $promoStartDate && $cDate <= $promoEndDate)
								{
	//if the Promo is Applied means then to check whether the apply_promo_bilk_discount  
									if($row->apply_promo_bilk_discount == 'Yes')
									{
										$Srange = explode(',',trim($row->range_start,','));
										$Drange = explode(',',trim($row->range_end, ','));
										
										$dBPAmount = explode(',',trim($row->apply_promo_bulk_psr, ','));
										
										$i = 0;
										foreach($Srange as $start_range)
										{
											if($no_of_persons >= $start_range && $no_of_persons <= $Drange[$i] )
											{
												$amount = $dBPAmount[$i];
											}
											$i++;
										}
										if($amount > 0)
										{
											
											$accom = "No";
											$disprice = $amount;
											return array(
												'accom' => $accom,
												'disprice' => $disprice,
											);
										}
										else
										{
											$accom = "No";
											//$amt1 = explode(',',trim($row->apply_promo_psr,','));
											$disprice = $row->apply_promo_psr;
										
											return array(
												'accom' => $accom,
												'disprice' => $disprice,
											);
										}
										
									}
									else
									{
										if($row->discount_bulk_purchase == 'Yes')
										{
											$Srange = explode(',',trim($row->range_start,','));
											$Drange = explode(',',trim($row->range_end, ','));
											$dBPAmount = 0;	

											$dBPAmount = explode(',',trim($row->apply_discount_psr, ','));
											
											$i = 0;
											foreach($Srange as $start_range)
											{
												if($no_of_persons >= $start_range && $no_of_persons <= $Drange[$i] )
												{
													$amount = $dBPAmount[$i];
												}
												$i++;
											}
											if($amount > 0)
											{
												
												$accom = "No";
												$disprice = $amount;
												return array(
													'accom' => $accom,
													'disprice' => $disprice,
												);
											}
											else
											{
												$accom = "No";
											//	$amt1 = explode(',',trim($row->apply_promo_psr,','));
												//var_dump($amt1);
												$disprice = $row->apply_promo_psr;
												
												return array(
														'accom' => $accom,
														'disprice' => $disprice,
												);
											}
										}

										else
										{
											$accom = "No";
										//	$amt1 = explode(',',trim($row->apply_promo_psr,','));
											//var_dump($amt1);
											$disprice = $row->apply_promo_psr;
											
											return array(
													'accom' => $accom,
													'disprice' => $disprice,
											);
										}
									}
								}
								else
								{
	// if promo is not applicable means next check the Bulk discount
									if($row->discount_bulk_purchase == 'Yes')
									{
										$Srange = explode(',',trim($row->range_start,','));
										$Drange = explode(',',trim($row->range_end, ','));
										$dBPAmount = 0;	

										$dBPAmount = explode(',',trim($row->apply_discount_psr, ','));
										
										$i = 0;
										foreach($Srange as $start_range)
										{
											if($no_of_persons >= $start_range && $no_of_persons <= $Drange[$i] )
											{
												$amount = $dBPAmount[$i];
											}
											$i++;
										}
										if($amount > 0)
										{
											
											$accom = "No";
											$disprice = $amount;
											return array(
												'accom' => $accom,
												'disprice' => $disprice,
											);
										}
										else
										{
											$parray = explode(',',$row->product_peakseason_rate);
											$accom = "No";
											$disprice = $parray[2];
											
											return array(
												'accom' => $accom,
												'disprice' => $disprice,
											);
										}
									}
									else
									{
									// Display the normal  Single room Rate 
										//$parray = explode(',',$row->product_normal_rate);
										$accom = "No";
										$disprice = $row->product_peakseason_rate;
										
										return array(
												'accom' => $accom,
												'disprice' => $disprice,
											);
									}
								}
							}
							else if($row->discount_bulk_purchase == 'Yes')
							{
								$Srange = explode(',',trim($row->range_start,','));
								$Drange = explode(',',trim($row->range_end, ','));
								$dBPAmount = 0;	

								$dBPAmount = explode(',',trim($row->apply_discount_psr, ','));
							//	var_dump($dBPAmount);
								$i = 0;
								foreach($Srange as $start_range)
								{
									if($no_of_persons >= $start_range && $no_of_persons <= $Drange[$i] )
									{
										$amount = $dBPAmount[$i];
									}
									$i++;
								}
								if($amount > 0)
								{
									
									$accom = "No";
									$disprice = $amount;
									return array(
												'accom' => $accom,
												'disprice' => $disprice,
											);
								}
								else
								{
									//$parray = explode(',',$row->product_normal_rate);
									$accom = "No";
									$disprice = $row->product_peakseason_rate;
									
									return array(
												'accom' => $accom,
												'disprice' => $disprice,
											);
								}
							}
							else
							{
							// Display the normal  Single room Rate 
								//$parray = explode(',',$row->product_normal_rate);
								//var_dump($parray);
								$accom = "No";
								$disprice = $row->product_peakseason_rate;
								
								return array(
												'accom' => $accom,
												'disprice' => $disprice,
											);
							}
							
						}
					break;
					case "SP":
					/* $logoqdata .= "Product price ......\n Superpeak Price:" . $row->product_superpeak_rate ."\n" .
					"Accomodations => " . $row->disaccomodation . " \n Prices: " . $row->single_room . "\n"; */
						If ($row->disaccomodation == "Yes") 
						{
							//Accommodation Rates
							if($row->apply_promo == 'Yes')
							{
								$promoStartDate = $row->start_date;
								$promoEndDate = $row->end_date;
								$current_date = new DateTime();
								$cDate = $current_date->format("Y-m-d");
								if($cDate >= $promoStartDate && $cDate <= $promoEndDate)
								{
	//if the Promo is Applied means then to check whether the apply_promo_bilk_discount  
									if($row->apply_promo_bilk_discount == 'Yes')
									{
										$Srange = explode(',',trim($row->range_start,','));
										$Drange = explode(',',trim($row->range_end, ','));
										
										//$dBPAmount = explode(',',trim($row->apply_promo_bulk_single_room, ','));
											if($accom_type == 1)
											{
												$dBPAmount = explode(',',trim($row->apply_promo_bulk_single_room,','));
											}
											else if($accom_type == 2)
											{
												$dBPAmount = explode(',',trim($row->apply_promo_bulk_twin_room,','));
											}
											else if($accom_type == 3)
											{
												$dBPAmount = explode(',',trim($row->apply_promo_bulk_three_person_room,','));
											}
											else
											{
												$dBPAmount = explode(',',trim($row->apply_promo_bulk_quad_room,','));
											}
											
										$i = 3;
										$j = 0;
										foreach($Srange as $start_range)
										{
											if($no_of_persons >= $start_range && $no_of_persons <= $Drange[$j] )
											{
												$amount = $dBPAmount[$i];
											}
											$i += 4;
											$j++;
										}
										if($amount > 0)
										{
											
											$accom = "Yes";
											$disprice = $amount;
											return array(
												'accom' => $accom,
												'disprice' => $disprice,
											);
										}
										else
										{
											$accom = "Yes";
												$amt1 =0;
											if($accom_type == 1)
											{
												$amt1 = explode(',',trim($row->apply_promo_single_room,','));
											}
											else if($accom_type == 2)
											{
												$amt1 = explode(',',trim($row->apply_promo_twin_room,','));
											}
											else if($accom_type == 3)
											{
												$amt1 = explode(',',trim($row->apply_promo_three_person_room,','));
											}
											else
											{
												$amt1 = explode(',',trim($row->apply_promo_quad_room,','));
											}
										
											$disprice = $amt1[3];
											
											return array(
												'accom' => $accom,
												'disprice' => $disprice,
											);
										}
										
									}
									else
									{
										if($row->discount_bulk_purchase == 'Yes')
										{
											$Srange = explode(',',trim($row->range_start,','));
											$Drange = explode(',',trim($row->range_end, ','));
											$dBPAmount = 0;	

											
											if($accom_type == 1)
											{
												$dBPAmount = explode(',',$row->apply_discount_single_room);
											}
											else if($accom_type == 2)
											{
												$dBPAmount = explode(',',$row->apply_discount_twin_room);
											}
											else if($accom_type == 3)
											{
												$dBPAmount = explode(',',$row->apply_discount_three_person_room);
											}
											else
											{
												$dBPAmount = explode(',',$row->apply_discount_quad_room);
											}
									
										//	$dBPAmount = explode(',',trim($row->apply_discount_single_room, ','));
											
											$i = 3;
											$j = 0;
											foreach($Srange as $start_range)
											{
												if($no_of_persons >= $start_range && $no_of_persons <= $Drange[$j] )
												{
													$amount = $dBPAmount[$i];
												}
												$i += 4;
												$j++;
											}
											if($amount > 0)
											{
												
												$accom = "Yes";
												$disprice = $amount;
												return array(
													'accom' => $accom,
													'disprice' => $disprice,
												);
											}
											else
											{
												$accom = "Yes";
												$amt1 =0;
												if($accom_type == 1)
												{
													$amt1 = explode(',',trim($row->apply_promo_single_room,','));
												}
												else if($accom_type == 2)
												{
													$amt1 = explode(',',trim($row->apply_promo_twin_room,','));
												}
												else if($accom_type == 3)
												{
													$amt1 = explode(',',trim($row->apply_promo_three_person_room,','));
												}
												else
												{
													$amt1 = explode(',',trim($row->apply_promo_quad_room,','));
												}
												
												$disprice = $amt1[3];
												
													
												return array(
														'accom' => $accom,
														'disprice' => $disprice,
													);
											}
										}

										else
										{
											$accom = "Yes";
											$amt1 =0;
											if($accom_type == 1)
											{
												$amt1 = explode(',',trim($row->apply_promo_single_room,','));
											}
											else if($accom_type == 2)
											{
												$amt1 = explode(',',trim($row->apply_promo_twin_room,','));
											}
											else if($accom_type == 3)
											{
												$amt1 = explode(',',trim($row->apply_promo_three_person_room,','));
											}
											else
											{
												$amt1 = explode(',',trim($row->apply_promo_quad_room,','));
											}
											
											$disprice = $amt1[3];
											
												
											return array(
													'accom' => $accom,
													'disprice' => $disprice,
												);
										}
									}
								}
								else
								{
	// if promo is not applicable means next check the Bulk discount
									if($row->discount_bulk_purchase == 'Yes')
									{
										$Srange = explode(',',trim($row->range_start,','));
										$Drange = explode(',',trim($row->range_end, ','));
										$dBPAmount = 0;	

										
										if($accom_type == 1)
										{
											$dBPAmount = explode(',',$row->apply_discount_single_room);
										}
										else if($accom_type == 2)
										{
											$dBPAmount = explode(',',$row->apply_discount_twin_room);
										}
										else if($accom_type == 3)
										{
											$dBPAmount = explode(',',$row->apply_discount_three_person_room);
										}
										else
										{
											$dBPAmount = explode(',',$row->apply_discount_quad_room);
										}
								
									//	$dBPAmount = explode(',',trim($row->apply_discount_single_room, ','));
										
										$i = 3;
										$j = 0;
										foreach($Srange as $start_range)
										{
											if($no_of_persons >= $start_range && $no_of_persons <= $Drange[$j] )
											{
												$amount = $dBPAmount[$i];
											}
											$i += 4;
											$j++;
										}
										if($amount > 0)
										{
											
											$accom = "Yes";
											$disprice = $amount;
											return array(
												'accom' => $accom,
												'disprice' => $disprice,
											);
										}
										else
										{
											$parray="";
											if($accom_type == 1)
											{
												$parray = explode(',',$row->single_room);
											}
											else if($accom_type == 2)
											{
												$parray = explode(',',$row->twin_room);
											}
											else if($accom_type == 3)
											{
												$parray = explode(',',$row->three_person_room);
											}
											else
											{
												$parray = explode(',',$row->quad_room);
											}
											//$parray = explode(',',$row->single_room);
											$accom = "Yes";
											$disprice = $parray[3];
											
											return array(
												'accom' => $accom,
												'disprice' => $disprice,
											);
										}
									}
									else
									{
									// Display the normal  Single room Rate 
									$parray="";
											if($accom_type == 1)
											{
												$parray = explode(',',$row->single_room);
											}
											else if($accom_type == 2)
											{
												$parray = explode(',',$row->twin_room);
											}
											else if($accom_type == 3)
											{
												$parray = explode(',',$row->three_person_room);
											}
											else
											{
												$parray = explode(',',$row->quad_room);
											}
										//$parray = explode(',',$row->single_room);
										$accom = "Yes";
										$disprice = $parray[3];
										
										return array(
												'accom' => $accom,
												'disprice' => $disprice,
											);
									}
								}
							}
							else if($row->discount_bulk_purchase == 'Yes')
							{
								$Srange = explode(',',trim($row->range_start,','));
								$Drange = explode(',',trim($row->range_end, ','));
								$dBPAmount = 0;	

								if($accom_type == 1)
								{
									$dBPAmount = explode(',',$row->apply_discount_single_room);
								}
								else if($accom_type == 2)
								{
									$dBPAmount = explode(',',$row->apply_discount_twin_room);
								}
								else if($accom_type == 3)
								{
									$dBPAmount = explode(',',$row->apply_discount_three_person_room);
								}
								else
								{
									$dBPAmount = explode(',',$row->apply_discount_quad_room);
								}
								//$dBPAmount = explode(',',trim($row->apply_discount_single_room, ','));
								
								$i = 3;
								$j = 0;
								foreach($Srange as $start_range)
								{
									if($no_of_persons >= $start_range && $no_of_persons <= $Drange[$j] )
									{
										$amount = $dBPAmount[$i];
									}
									$i += 4;
									$j++;
								}
								if($amount > 0)
								{
									
									$accom = "Yes";
									$disprice = $amount;
									return array(
												'accom' => $accom,
												'disprice' => $disprice,
											);
								}
								else
								{
									$parray="";
											if($accom_type == 1)
											{
												$parray = explode(',',$row->single_room);
											}
											else if($accom_type == 2)
											{
												$parray = explode(',',$row->twin_room);
											}
											else if($accom_type == 3)
											{
												$parray = explode(',',$row->three_person_room);
											}
											else
											{
												$parray = explode(',',$row->quad_room);
											}
									$accom = "Yes";
									$disprice = $parray[3];
								
									return array(
												'accom' => $accom,
												'disprice' => $disprice,
											);
								}
							}
							else
							{
							// Display the normal  Single room Rate 
								$parray="";
											if($accom_type == 1)
											{
												$parray = explode(',',$row->single_room);
											}
											else if($accom_type == 2)
											{
												$parray = explode(',',$row->twin_room);
											}
											else if($accom_type == 3)
											{
												$parray = explode(',',$row->three_person_room);
											}
											else
											{
												$parray = explode(',',$row->quad_room);
											}
								$accom = "Yes";
								$disprice = $parray[3];
								
								return array(
												'accom' => $accom,
												'disprice' => $disprice,
											);
							}
						}
						else
						{
							//Normal Rates
							if($row->apply_promo == 'Yes')
							{
								$promoStartDate = $row->start_date;
								$promoEndDate = $row->end_date;
								$current_date = new DateTime();
								$cDate = $current_date->format("Y-m-d");
								if($cDate >= $promoStartDate && $cDate <= $promoEndDate)
								{
	//if the Promo is Applied means then to check whether the apply_promo_bilk_discount  
									if($row->apply_promo_bilk_discount == 'Yes')
									{
										$Srange = explode(',',trim($row->range_start,','));
										$Drange = explode(',',trim($row->range_end, ','));
										
										$dBPAmount = explode(',',trim($row->apply_promo_bulk_spsr, ','));
										
										$i = 0;
										foreach($Srange as $start_range)
										{
											if($no_of_persons >= $start_range && $no_of_persons <= $Drange[$i] )
											{
												$amount = $dBPAmount[$i];
											}
											$i++;
										}
										if($amount > 0)
										{
											
											return array(
												'accom' => $accom,
												'disprice' => $amount,
											);
										}
										
									}
									else
									{
										if($row->discount_bulk_purchase == 'Yes')
										{
											$Srange = explode(',',trim($row->range_start,','));
											$Drange = explode(',',trim($row->range_end, ','));
											$dBPAmount = 0;	

											$dBPAmount = explode(',',trim($row->apply_discount_spsr, ','));
											
											$i = 0;
											foreach($Srange as $start_range)
											{
												if($no_of_persons >= $start_range && $no_of_persons <= $Drange[$i] )
												{
													$amount = $dBPAmount[$i];
												}
												$i++;
											}
											if($amount > 0)
											{
												$accom = "No";
												$disprice = $amount;
												return array(
													'accom' => $accom,
													'disprice' => $disprice,
												);
											}
											else
											{
												//$parray = explode(',',$row->product_normal_rate);
												$accom = "No";
												$disprice = $row->apply_promo_spsr;
												
												return array(
													'accom' => $accom,
													'disprice' => $disprice,
												);
											}
										}

										else
										{
											$accom = "No";
											//$amt1 = explode(',',trim($row->apply_promo_spsr,','));
											$disprice = $row->apply_promo_spsr;
										
											return array(
												'accom' => $accom,
												'disprice' => $disprice,
											);
										}
									}
								}
								else
								{
	// if promo is not applicable means next check the Bulk discount
									if($row->discount_bulk_purchase == 'Yes')
									{
										$Srange = explode(',',trim($row->range_start,','));
										$Drange = explode(',',trim($row->range_end, ','));
										$dBPAmount = 0;	

										$dBPAmount = explode(',',trim($row->apply_discount_spsr, ','));
										
										$i = 0;
										foreach($Srange as $start_range)
										{
											if($no_of_persons >= $start_range && $no_of_persons <= $Drange[$i] )
											{
												$amount = $dBPAmount[$i];
											}
											$i++;
										}
										if($amount > 0)
										{
											$accom = "No";
											$disprice = $amount;
											return array(
												'accom' => $accom,
												'disprice' => $disprice,
											);
										}
										else
										{
											//$parray = explode(',',$row->product_normal_rate);
											$accom = "No";
											$disprice = $row->product_superpeak_rate;
											
											return array(
												'accom' => $accom,
												'disprice' => $disprice,
											);
										}
									}
									else
									{
									// Display the normal  Single room Rate 
									//	$parray = explode(',',$row->product_normal_rate);
										$accom = "No";
										$disprice = $row->product_superpeak_rate;
										
										return array(
												'accom' => $accom,
												'disprice' => $disprice,
											);
									}
								}
							}
							else if($row->discount_bulk_purchase == 'Yes')
							{
								$Srange = explode(',',trim($row->range_start,','));
								$Drange = explode(',',trim($row->range_end, ','));
								$dBPAmount = 0;	

								$dBPAmount = explode(',',trim($row->apply_discount_spsr, ','));
								
								$i = 0;
								foreach($Srange as $start_range)
								{
									if($no_of_persons >= $start_range && $no_of_persons <= $Drange[$i] )
									{
										$amount = $dBPAmount[$i];
									}
									$i++;
								}
								if($amount > 0)
								{
									
									$accom = "No";
									$disprice = $amount;
									return array(
												'accom' => $accom,
												'disprice' => $disprice,
											);
								}
								else
								{
									//$parray = explode(',',$row->product_normal_rate);
									$accom = "No";
									$disprice = $row->product_superpeak_rate;
									
									return array(
												'accom' => $accom,
												'disprice' => $disprice,
											);
								}
							}
							else
							{
							// Display the normal  Single room Rate 
								//$parray = explode(',',$row->product_normal_rate);
								$accom = "No";
								$disprice = $row->product_superpeak_rate;
							
								return array(
												'accom' => $accom,
												'disprice' => $disprice,
											);
							}
							
						}
					break;
					case "NA":
						return array(
								'accom' => 'No',
								'disprice' => '0.00',
							);
					break;
					default:
					/*  */
					
						If ($row->disaccomodation == "Yes") 
						{
							//Accommodation Rates
							if($row->apply_promo == 'Yes')
							{
								$promoStartDate = $row->start_date;
								$promoEndDate = $row->end_date;
								$current_date = new DateTime();
								$cDate = $current_date->format("Y-m-d");
								if($cDate >= $promoStartDate && $cDate <= $promoEndDate)
								{
	//if the Promo is Applied means then to check whether the apply_promo_bilk_discount  
									if($row->apply_promo_bilk_discount == 'Yes')
									{
										$Srange = explode(',',trim($row->range_start,','));
										$Drange = explode(',',trim($row->range_end, ','));
										$dBPAmount = "";
										//$dBPAmount = explode(',',trim($row->apply_promo_bulk_single_room, ','));
										if($accom_type == 1)
										{
											$dBPAmount = explode(',',trim($row->apply_promo_bulk_single_room, ','));
										}
										else if($accom_type == 2)
										{
											$dBPAmount = explode(',',trim($row->apply_promo_bulk_twin_room, ','));
										}
										else if($accom_type == 3)
										{
											$dBPAmount = explode(',',trim($row->apply_promo_bulk_three_person_room, ','));
										}
										else
										{
											$dBPAmount = explode(',',trim($row->apply_promo_bulk_quad_room, ','));
										}
										$i = 0;
										$j = 0;
										foreach($Srange as $start_range)
										{
											if($no_of_persons >= $start_range && $no_of_persons <= $Drange[$j] )
											{
												$amount = $dBPAmount[$i];
											}
											$i += 4;
											$j++;
										}
										if($amount > 0)
										{
											
											$accom = "Yes";
											$disprice = $amount;
											return array(
												'accom' => $accom,
												'disprice' => $disprice,
											);
										}
										else
										{
											$accom = "Yes";
												$amt1 =0;
											if($accom_type == 1)
											{
												$amt1 = explode(',',trim($row->apply_promo_single_room,','));
											}
											else if($accom_type == 2)
											{
												$amt1 = explode(',',trim($row->apply_promo_twin_room,','));
											}
											else if($accom_type == 3)
											{
												$amt1 = explode(',',trim($row->apply_promo_three_person_room,','));
											}
											else
											{
												$amt1 = explode(',',trim($row->apply_promo_quad_room,','));
											}
										
											$disprice = $amt1[0];
											
											return array(
												'accom' => $accom,
												'disprice' => $disprice,
											);
										}
										
									}
									else
									{
										if($row->discount_bulk_purchase == 'Yes')
										{
											$Srange = explode(',',trim($row->range_start,','));
											$Drange = explode(',',trim($row->range_end, ','));
											$dBPAmount = 0;	

											if($accom_type == 1)
											{
												$dBPAmount = explode(',',trim($row->apply_discount_single_room, ','));
											}
											else if($accom_type == 2)
											{
												$dBPAmount = explode(',',trim($row->apply_discount_twin_room, ','));
											}
											else if($accom_type == 3)
											{
												$dBPAmount = explode(',',trim($row->apply_discount_three_person_room, ','));
											}
											else
											{
												$dBPAmount = explode(',',trim($row->apply_discount_quad_room, ','));
											}
											//$dBPAmount = explode(',',trim($row->apply_discount_single_room, ','));
											
											$i = 0;
											$j = 0;
											foreach($Srange as $start_range)
											{
												if($no_of_persons >= $start_range && $no_of_persons <= $Drange[$j] )
												{
													$amount = $dBPAmount[$i];
												}
												$i += 4;
												$j++;
											}
											if($amount > 0)
											{
												
												$accom = "Yes";
												$disprice = $amount;
												return array(
													'accom' => $accom,
													'disprice' => $disprice,
												);
											}
											else
											{
												$accom = "Yes";
												$amt1 =0;
												if($accom_type == 1)
												{
													$amt1 = explode(',',trim($row->apply_promo_single_room,','));
												}
												else if($accom_type == 2)
												{
													$amt1 = explode(',',trim($row->apply_promo_twin_room,','));
												}
												else if($accom_type == 3)
												{
													$amt1 = explode(',',trim($row->apply_promo_three_person_room,','));
												}
												else
												{
													$amt1 = explode(',',trim($row->apply_promo_quad_room,','));
												}
											
												$disprice = $amt1[0];
											
												return array(
													'accom' => $accom,
													'disprice' => $disprice,
												);
											}
										}

										else
										{
											$accom = "Yes";
											$amt1 =0;
											if($accom_type == 1)
											{
												$amt1 = explode(',',trim($row->apply_promo_single_room,','));
											}
											else if($accom_type == 2)
											{
												$amt1 = explode(',',trim($row->apply_promo_twin_room,','));
											}
											else if($accom_type == 3)
											{
												$amt1 = explode(',',trim($row->apply_promo_three_person_room,','));
											}
											else
											{
												$amt1 = explode(',',trim($row->apply_promo_quad_room,','));
											}
										
											$disprice = $amt1[0];
										
											return array(
												'accom' => $accom,
												'disprice' => $disprice,
											);
										}
									}
								}
								else
								{
	// if promo is not applicable means next check the Bulk discount
									if($row->discount_bulk_purchase == 'Yes')
									{
										$Srange = explode(',',trim($row->range_start,','));
										$Drange = explode(',',trim($row->range_end, ','));
										$dBPAmount = 0;	

										if($accom_type == 1)
										{
											$dBPAmount = explode(',',trim($row->apply_discount_single_room, ','));
										}
										else if($accom_type == 2)
										{
											$dBPAmount = explode(',',trim($row->apply_discount_twin_room, ','));
										}
										else if($accom_type == 3)
										{
											$dBPAmount = explode(',',trim($row->apply_discount_three_person_room, ','));
										}
										else
										{
											$dBPAmount = explode(',',trim($row->apply_discount_quad_room, ','));
										}
										//$dBPAmount = explode(',',trim($row->apply_discount_single_room, ','));
										
										$i = 0;
										$j = 0;
										foreach($Srange as $start_range)
										{
											if($no_of_persons >= $start_range && $no_of_persons <= $Drange[$j] )
											{
												$amount = $dBPAmount[$i];
											}
											$i += 4;
											$j++;
										}
										if($amount > 0)
										{
											
											$accom = "Yes";
											$disprice = $amount;
											return array(
												'accom' => $accom,
												'disprice' => $disprice,
											);
										}
										else
										{
											$parray="";
											if($accom_type == 1)
											{
												$parray = explode(',',$row->single_room);
											}
											else if($accom_type == 2)
											{
												$parray = explode(',',$row->twin_room);
											}
											else if($accom_type == 3)
											{
												$parray = explode(',',$row->three_person_room);
											}
											else
											{
												$parray = explode(',',$row->quad_room);
											}
											$accom = "Yes";
											$disprice = $parray[0];
											
											return array(
												'accom' => $accom,
												'disprice' => $disprice,
											);
										}
									}
									else
									{
									// Display the normal  Single room Rate 
										$parray="";
											if($accom_type == 1)
											{
												$parray = explode(',',$row->single_room);
											}
											else if($accom_type == 2)
											{
												$parray = explode(',',$row->twin_room);
											}
											else if($accom_type == 3)
											{
												$parray = explode(',',$row->three_person_room);
											}
											else
											{
												$parray = explode(',',$row->quad_room);
											}
										$accom = "Yes";
										$disprice = $parray[0];
										
										return array(
												'accom' => $accom,
												'disprice' => $disprice,
											);
									}
								}
							}
							else if($row->discount_bulk_purchase == 'Yes')
							{
								$Srange = explode(',',trim($row->range_start,','));
								$Drange = explode(',',trim($row->range_end, ','));
								$dBPAmount = 0;	
								
								if($accom_type == 1)
								{
									$dBPAmount = explode(',',trim($row->apply_discount_single_room, ','));
								}
								else if($accom_type == 2)
								{
									$dBPAmount = explode(',',trim($row->apply_discount_twin_room, ','));
								}
								else if($accom_type == 3)
								{
									$dBPAmount = explode(',',trim($row->apply_discount_three_person_room, ','));
								}
								else
								{
									$dBPAmount = explode(',',trim($row->apply_discount_quad_room, ','));
								}
								//$dBPAmount = explode(',',trim($row->apply_discount_single_room, ','));
								
								$i = 0;
								$j = 0;
								foreach($Srange as $start_range)
								{
									if($no_of_persons >= $start_range && $no_of_persons <= $Drange[$j] )
									{
										$amount = $dBPAmount[$i];
									}
									$i += 4;
									$j++;
								}
								if($amount > 0)
								{
									
									$accom = "Yes";
									$disprice = $amount;
									return array(
												'accom' => $accom,
												'disprice' => $disprice,
											);
								}
								else
								{
									$parray="";
											if($accom_type == 1)
											{
												$parray = explode(',',$row->single_room);
											}
											else if($accom_type == 2)
											{
												$parray = explode(',',$row->twin_room);
											}
											else if($accom_type == 3)
											{
												$parray = explode(',',$row->three_person_room);
											}
											else
											{
												$parray = explode(',',$row->quad_room);
											}
									$accom = "Yes";
									$disprice = $parray[0];
									
									return array(
												'accom' => $accom,
												'disprice' => $disprice,
											);
								}
							}
							else
							{
							// Display the normal  Single room Rate 
								$parray="";
											if($accom_type == 1)
											{
												$parray = explode(',',$row->single_room);
											}
											else if($accom_type == 2)
											{
												$parray = explode(',',$row->twin_room);
											}
											else if($accom_type == 3)
											{
												$parray = explode(',',$row->three_person_room);
											}
											else
											{
												$parray = explode(',',$row->quad_room);
											}
								$accom = "Yes";
								$disprice = $parray[0];
								
								return array(
												'accom' => $accom,
												'disprice' => $disprice,
											);
							}
						}
						else
						{
							//Normal Rates
							if($row->apply_promo == 'Yes')
							{
								$promoStartDate = $row->start_date;
								$promoEndDate = $row->end_date;
								$current_date = new DateTime();
								$cDate = $current_date->format("Y-m-d");
								if($cDate >= $promoStartDate && $cDate <= $promoEndDate)
								{
	//if the Promo is Applied means then to check whether the apply_promo_bilk_discount  
									if($row->apply_promo_bilk_discount == 'Yes')
									{
										$Srange = explode(',',trim($row->range_start,','));
										$Drange = explode(',',trim($row->range_end, ','));
										
										$dBPAmount = explode(',',trim($row->apply_promo_bulk_nr, ','));
										
										$i = 0;
										foreach($Srange as $start_range)
										{
											if($no_of_persons >= $start_range && $no_of_persons <= $Drange[$i] )
											{
												$amount = $dBPAmount[$i];
											}
											$i++;
										}
										if($amount > 0)
										{
											
											$accom = "No";
											$disprice = $amount;
											return array(
												'accom' => $accom,
												'disprice' => $disprice,
											);
										}
										else
										{
											$accom = "No";
											//$amt1 = explode(',',trim($row->apply_promo_nr,','));
											$disprice = $row->apply_promo_nr;
											
											return array(
												'accom' => $accom,
												'disprice' => $disprice,
											);
										}
										
									}
									else
									{
										if($row->discount_bulk_purchase == 'Yes')
										{
											$Srange = explode(',',trim($row->range_start,','));
											$Drange = explode(',',trim($row->range_end, ','));
											$dBPAmount = 0;	

											$dBPAmount = explode(',',trim($row->apply_discount_nr, ','));
											
											$i = 0;
											foreach($Srange as $start_range)
											{
												if($no_of_persons >= $start_range && $no_of_persons <= $Drange[$i] )
												{
													$amount = $dBPAmount[$i];
												}
												$i++;
											}
											if($amount > 0)
											{
												
												$accom = "No";
												$disprice = $amount;
												return array(
													'accom' => $accom,
													'disprice' => $disprice,
												);
											}
											else
											{
												//$parray = explode(',',$row->product_normal_rate);
												$accom = "No";
												$disprice = $row->apply_promo_nr;
												
												return array(
													'accom' => $accom,
													'disprice' => $disprice,
												);
											}
										}

										else
										{
											$accom = "No";
											//$amt1 = explode(',',trim($row->apply_promo_nr,','));
											$disprice = $row->apply_promo_nr;
										
											return array(
												'accom' => $accom,
												'disprice' => $disprice,
											);
										}
									}
								}
								else
								{
	// if promo is not applicable means next check the Bulk discount
									if($row->discount_bulk_purchase == 'Yes')
									{
										$Srange = explode(',',trim($row->range_start,','));
										$Drange = explode(',',trim($row->range_end, ','));
										$dBPAmount = 0;	

										$dBPAmount = explode(',',trim($row->apply_discount_nr, ','));
										
										$i = 0;
										foreach($Srange as $start_range)
										{
											if($no_of_persons >= $start_range && $no_of_persons <= $Drange[$i] )
											{
												$amount = $dBPAmount[$i];
											}
											$i++;
										}
										if($amount > 0)
										{
											
											$accom = "No";
											$disprice = $amount;
											return array(
												'accom' => $accom,
												'disprice' => $disprice,
											);
										}
										else
										{
											//$parray = explode(',',$row->product_normal_rate);
											$accom = "No";
											$disprice = $row->product_normal_rate;
											
											return array(
												'accom' => $accom,
												'disprice' => $disprice,
											);
										}
									}
									else
									{
									// Display the normal  Single room Rate 
										//$parray = explode(',',$row->product_normal_rate);
										$accom = "No";
										$disprice = $row->product_normal_rate;
										
										return array(
												'accom' => $accom,
												'disprice' => $disprice,
											);
									}
								}
							}
							else if($row->discount_bulk_purchase == 'Yes')
							{
								$Srange = explode(',',trim($row->range_start,','));
								$Drange = explode(',',trim($row->range_end, ','));
								$dBPAmount = 0;	

								$dBPAmount = explode(',',trim($row->apply_discount_nr, ','));
								
								$i = 0;
								foreach($Srange as $start_range)
								{
									if($no_of_persons >= $start_range && $no_of_persons <= $Drange[$i] )
									{
										$amount = $dBPAmount[$i];
									}
									$i++;
								}
								if($amount > 0)
								{
									
									$accom = "No";
									$disprice = $amount;
									return array(
												'accom' => $accom,
												'disprice' => $disprice,
											);
								}
								else
								{
									//$parray = explode(',',$row->product_normal_rate);
									$accom = "No";
									$disprice = $row->product_normal_rate;
								
											
									return array(
												'accom' => $accom,
												'disprice' => $disprice,
											);
								}
							}
							else
							{
							// Display the normal  Single room Rate 
								//$parray = explode(',',$row->product_normal_rate);
								$accom = "No";
								$disprice = $row->product_normal_rate;
			
								return array(
										'accom' => $accom,
										'disprice' => $disprice,
									);
							}
							
						}
					break;
			}		
		
			}
		}
		function currencyConversation($data , $daytype , $accom_type , $no_of_persons , $functionType , $accoe_amt)
		{
		
			$disprice = "";
			$result = "";
			$newAmount = "";
			if($functionType == 'courseRoomrates')
			{
				$result = $this->courseRoomrates($data , $daytype , $accom_type , $no_of_persons);
			}
			else
			{
				$result = $this->packageRoomrates($data , $daytype , $accom_type , $no_of_persons);
			}
			
			if($accoe_amt == 0.00)
			{
				$disprice= $result['disprice'];
			}
			else
			{
				$disprice = $accoe_amt;
			}
			
			foreach($data as $row)
			{
				$selectProfile = $this->db->get_where('tbl_dcprofile', array('user_id'=>$row->user_id))->row();
				$profileCurrency = ucwords(strtoupper($selectProfile->dccurrency));
				// the Dive center Currency is Also MYR
				if($profileCurrency == 'MYR')
				{
					//check wherether the Session is Created
					if($this->session->userdata('dccurreny'))
					{
						$sessionCurrency = $this->session->userdata('dccurreny');
						//Check wherether the Session Currency is also MYR
						if($sessionCurrency == 'MYR')
						{
							$newAmount = $disprice;
						}
						else
						{
							$curencyTableValue = $this->db->get_where('tbl_multicurrency',array('from_cur'=>$sessionCurrency, 'to_cur'=>'MYR'))->row();
							
							$newAmount = $disprice / $curencyTableValue->seller_amt;
						}
						
					}
					else
					{
						$newAmount = $disprice;
					}
				}
				// the Dive center Currency is Not MYR
				else
				{
					$myrValueFetch = $this->db->get_where('tbl_multicurrency',array('from_cur'=>$profileCurrency, 'to_cur'=>'MYR'))->row(); 
					
					$myrValue = $disprice * $myrValueFetch->buyer_amt;
					// check wherether session is created or not
					if($this->session->userdata('dccurreny'))
					{
						$sessionCurrency = $this->session->userdata('dccurreny');
						//Check wherether the Session Currency is also MYR
						if($sessionCurrency == 'MYR')
						{
							$newAmount = $myrValue;
						}
						elseif($profileCurrency == $this->session->userdata('dccurreny'))
						{
							$newAmount = $disprice;
						}
						else
						{
							$curencyTableValue = $this->db->get_where('tbl_multicurrency',array('from_cur'=>$sessionCurrency, 'to_cur'=>'MYR'))->row();
							
							$newAmount = $myrValue / $curencyTableValue->seller_amt;
						}
					}
					else
					{
						$newAmount = $myrValue;
					}
				}
			}
			return array(
					'accom' => $result['accom'],
					'disprice' => $newAmount,
				);
			
		}
		function about()
		{
			$this->load->view('front/header');
			$this->load->view('front/about');
			$this->load->view('front/loginModel');
			$this->load->view('front/footer');
		}
		function privacy()
		{
			$this->load->view('front/header');
			$this->load->view('front/privacy_policy');
			$this->load->view('front/loginModel');
			$this->load->view('front/footer');
		}
		function termsCondition()
		{
			$this->load->view('front/header');
			$this->load->view('front/terms_and_condition');
			$this->load->view('front/loginModel');
			$this->load->view('front/footer');
		}
		function findMessageCount()
		{
		$this->db->where('to', $this->session->userdata('user_id'));
		$this->db->where('is_read', 0);
		$query = $this->db->get('messages');
		$notification= $query->num_rows();
		echo $notification;
		}
		function contact_us()
		{
			$this->load->view('front/header');
			$this->load->view('front/contact_us');
			$this->load->view('front/footer');
		}
		function contact_mail()
		{
			if($this->input->post('submit_contact_mail'))
			{
					$Name = $this->input->post('contact_name');
					$Email = $this->input->post('contact_email');
					$Phone = $this->input->post('contact_phone');
					$CSubject = $this->input->post('contact_subject');
					$Message = $this->input->post('contact_message');
					
						$this->module = "Front/contact_mail";
						$this->putvlog($this->session->userdata('user_type'),0,0,0,0,0);
						//echo "SUCCESS";
					
						$this->load->library('email');

						$subject = 'Thank you for Contact Us';
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
								<table border="2">
									<tr>
										<td> Name : </td><td>'.$Name.'</td>
									</tr>
									<tr>
										<td> Email : </td><td>'.$Email.'</td>
									</tr>
									<tr>
										<td> Phone No : </td><td>'.$Phone.'</td>
									</tr>
									<tr>
										<td> Subject: </td><td>'.$CSubject.'</td>
									</tr>
									<tr>
										<td> Message : </td><td>'.$Message.'</td>
									</tr>
								</table>			
							</body>
							</html>';
						// Also, for getting full html you may use the following internal method:
						//$body = $this->email->full_html($subject, $message);

						$result = $this->email
								->from('enquiry@scubbi.com')
								->reply_to('enquiry@scubbi.com')    // Optional, an account where a human being reads.
								//->reply_to('enquiry@scubbi.com')    // Optional, an account where a human being reads.
								//->to('rajkumar.bizsoft@gmail.com')
								->to('enquiry@scubbi.com')
								->cc('anitha.bizsoft@gmail.com')
								//->cc('govindarajselvam90@gmail.com')
								->cc('zt.fong@scubbi.com')
								->subject($subject)
								->message($body)
								->send();
						if($result)
						{
							$messge = array('message' => 'Successfully Mail Sent !!!','class' => 'alert alert-success fade in');
							$this->session->set_flashdata('item', $messge);
							//$this->SAleisuredashboard();
							$base_url=base_url();
							redirect("$base_url"."Front/contact_us");
							//echo '<script>alert("You Have Successfully updated this Record!");</script>';
							//redirect('Front');
						}
						else
						{
							echo $this->email->print_debugger();
						}
						//var_dump($result);
						//echo '<br />';
				
			}
		}
		public function tabTest()
		{
			$this->load->view('front/tabTest');
                        echo date('Y-m-d H:i:s'); 
       echo strtotime(date('Y-m-d H:i:s'));     
		}		
	}
?>	 