<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {

    public function __construct() {
        parent::__construct();
		$this->load->helper('url');
		$this->load->database();
        $this->load->model('Customermodel');
		$this->load->library('session');
		/*cash control*/
		$this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
		$this->output->set_header('Pragma: no-cache');
		$this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");


    }
	
	//Customer Section Start //
	
	function index()
	{
		$this->load->model('Customermodel');
		//$this->load->library('facebook');
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
			$fbinsert=$this->Customermodel->facebookdata($userdata);
			if($fbinsert == 'TRUE')
				{
					$email = $userProfile['first_name'];
					$password = $userProfile['id'];
					$usercheck = $this->Customermodel->login($email,$password);
					if($usercheck == 'TRUE')
					{
						redirect('Front/customerDashboard');
					}
					else
					{
						$truefacebook = $this->Customermodel->newfacebookid($userdata);
						if($truefacebook == "TRUE")
						{
							//echo "hiiiii";
							$email = $userProfile['first_name'];
							$password = $userProfile['id'];
							$usercheck12 = $this->Customermodel->login($email,$password);
							if($usercheck12 == 'TRUE')
							{
								redirect('Front/customerDashboard');
							}
							
						}
					}
					
				}
				
			//$data['logoutUrl'] = $this->facebook->logout_url();
		} */
		 //$data['url'] =  $this->facebook->login_url();
		 $data['login_url'] = $this->googleplus->loginURL();
		$this->load->view('front/header');
		$this->load->view('front/customerLogin', $data);
	}
	function fu_googleplus()
	{
		$this->load->model('Customermodel');
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
				$ginsert=$this->Customermodel->googleplus($data);
				if($ginsert == 'TRUE')
				{
					$email = $data['email'];
					$password = $data['google_id'];
					$usercheck = $this->Customermodel->login($email,$password);
					if($usercheck == 'TRUE')
					{
						redirect('Customer/customerDashboard');
					}
					else
					{
						$truegoogleplus = $this->Customermodel->newgoogleid($data);
						if($truegoogleplus == "TRUE")
						{
							//echo "hiiiii";
							$email = $data['email'];
							$password = $data['google_id'];
							$usercheck1 = $this->Customermodel->login($email,$password);
							if($usercheck1 == 'TRUE')
							{
								redirect('Customer/customerDashboard');
							}
						}
					}
					
				}
			}
			
		} 
		
			
		
	//	$this->load->view('login', $data);
		
	}
	
	function customerSignup()
	{
		$this->load->view('front/header');
		$this->load->view('front/signup');
		//$this->load->view('front/footer');
	}
	function signup()
	{
		if($this->input->post('email'))
		{
			$email_id = $this->input->post('email');
			$chck_mail = $this->Customermodel->email_availabilty_check($email_id);
			if($chck_mail == "SUCCESS")
			{
				$signupdata = array(
				'first_name'=>$this->input->post('fname'),
				'last_name'=>$this->input->post('lname'),
				'email'=>$this->input->post('email'),
				'user_type'=>'Customer',
				'logged_in'=>'False',
				'password'=>$this->input->post('password')
				);
				if($this->Customermodel->signupData($signupdata))
				{
					echo "SUCCESS";
				}
			}
			else
			{
				echo 'FAIL';
			}
			
		//$data['msg'] = $this->Customermodel->signupData($signupdata);
			
		}
	}
	function customerDashboard()
	{
		if ($this->session->userdata('first_name')!=null) {
    	   if($this->session->userdata('user_id')!='')
		   {
			$this->load->view('front/header');
			$this->load->view('front/customer_dashboard');
			$this->load->view('front/footer');
		   }
		   else
		   {
				redirect('Customer');
			}
		}
		else
		{
			redirect('Customer');
		}
		
	}
	function customerProfile()
	{
		$data['get_customerprofile'] = $this->Customermodel->get_customerprofile();
		$this->load->view('front/header');
		$this->load->view('front/customer_profile', $data);
		$this->load->view('front/footer');
	}
	function customereditProfile()
	{
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
		//$result = array('message'=>'');
		if($this->input->post('update_customerprofile_data'))
		{  
			 //Check whether user upload picture
          
			
			 
			
			$country_code = $this->input->post('country_code');
			$contact_number = $this->input->post('contact_number');
			$con12 = $country_code.$contact_number;
			
				$con121 ="";
			if(isset($con12) && is_array($con12)){
				$con121 = implode(",", $con12); 
			}
			
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
            $userData = array(
                'firstname' => $this->input->post('firstname'),
                //'dcimage' => $divecenter_picture,
                'lastname' => $this->input->post('lastname'),
                'gender' => $this->input->post('gender'),
                'dob' => $date_dob,
                'email' => $this->input->post('email'),
                'contactno' => $con121,
                'nationality' => $this->input->post('nationality'),
                'diver_registration_body' => $this->input->post('diver_registration_body'),
                
				'diver_registration_level' => $this->input->post('diver_registration_level'),
				'diver_speciality_skill' => $this->input->post('Specialtiesskill'),
				//'diver_card' => $diver_card,
				'language' => $this->input->post('language'),
				'currency' => $this->input->post('currency'),
				'address1' => $this->input->post('address1'),
				'address2' => $this->input->post('address2'),
				'address3' => $this->input->post('address3'),
				'other_language' => implode(",", $other_language),
				'name' => $this->input->post('name'),
				'contact_no' => $this->input->post('contact_no'),
				'e_mail' => $this->input->post('e_mail'),
				'relationship' => $this->input->post('relationship'),
				'identifiction_passport' =>$identification_passport,
				'diver_card' =>$diver_card 
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
			$data = array(
			'password'=>$this->input->post('newpassword')
			);
			$this->Customermodel->updatePassword($data, $chge_id);
		}
		
		$this->load->view('front/header');
		$this->load->view('front/customer_changepassword');
		$this->load->view('front/footer');
	}
	function customerMydiveTrips()
	{
		$data['past_trips'] = $this->Customermodel->customerPastTrips();
		$data['upcoming_trips'] = $this->Customermodel->customerUpcomingTrips();
		//var_dump($data);
		$this->load->view('front/header');
		$this->load->view('front/customer_mydiveTrips', $data);
		$this->load->view('front/footer');
	}
	function get_Allupcomingtrips()
	{
		$current_checkin = date("Y-m-d");
		$num_rows = $this->db->where('checkin >=',$current_checkin)->count_all("tbl_booking");
		//$num_rows=$this->db->count_all("tbl_booking");
		$config['base_url'] = base_url().'Customer/get_Allupcomingtrips';
		$config['total_rows'] = $num_rows;
		$config['per_page'] = 12;
		$config['num_links'] = $num_rows;
		//$config['use_page_numbers'] = TRUE;
		$config['full_tag_open'] = '<ul class="pagination">';
		 $config['full_tag_close'] = '</ul>';
		 $config['prev_link'] = '&laquo;';
		 $config['prev_tag_open'] = '<li>';
		 $config['prev_tag_close'] = '</li>';
		 $config['next_tag_open'] = '<li>';
		 $config['next_tag_close'] = '</li>';
		 $config['cur_tag_open'] = '<li class="active"><a href="#">';
		 $config['cur_tag_close'] = '</a></li>';
		 $config['num_tag_open'] = '<li>';
		 $config['num_tag_close'] = '</li>';
		$config['next_link'] = '&raquo;';
		
		$this->pagination->initialize($config);
		$data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data["links"] = $this->pagination->create_links();
		
		$data['get_Allupcomingtrips'] = $this->Customermodel->get_Allupcomingtrips($config["per_page"], $data['page']);
		
		$this->load->view('front/header');
		$this->load->view('front/customer_allupcomingTrips', $data);
		$this->load->view('front/footer');
	}
	function get_Allpasttrips()
	{
		$current_checkout = date("Y-m-d");
		$num_rows = $this->db->where('checkin <=',$current_checkout)->count_all("tbl_booking");
		//$num_rows=$this->db->count_all("tbl_booking");
		$config['base_url'] = base_url().'Customer/get_Allpasttrips';
		$config['total_rows'] = $num_rows;
		$config['per_page'] = 12;
		$config['num_links'] = $num_rows;
		//$config['use_page_numbers'] = TRUE;
		$config['full_tag_open'] = '<ul class="pagination">';
		 $config['full_tag_close'] = '</ul>';
		 $config['prev_link'] = '&laquo;';
		 $config['prev_tag_open'] = '<li>';
		 $config['prev_tag_close'] = '</li>';
		 $config['next_tag_open'] = '<li>';
		 $config['next_tag_close'] = '</li>';
		 $config['cur_tag_open'] = '<li class="active"><a href="#">';
		 $config['cur_tag_close'] = '</a></li>';
		 $config['num_tag_open'] = '<li>';
		 $config['num_tag_close'] = '</li>';
		$config['next_link'] = '&raquo;';
		
		$this->pagination->initialize($config);
		$data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data["links"] = $this->pagination->create_links();
		
		$data['get_Allpasttrips'] = $this->Customermodel->get_Allpasttrips($config["per_page"], $data['page']);
		
		$this->load->view('front/header');
		$this->load->view('front/customer_allpastTrips', $data);
		$this->load->view('front/footer');
	}
	function pastTripdetails()
	{
		$this->load->view('front/header');
		$this->load->view('front/pastTripdetails');
		$this->load->view('front/footer');
	}
	
	function paymentInfo()
	{
		$data['np'] = $this->input->post('no_of_person');
		$data['diveid'] = $this->input->post('divecenter_id');
		$data['sd'] = $this->input->post('startdate');
		$data['ed'] = $this->input->post('enddate');
		$data['nod'] = $this->input->post('noofdays');
		$this->load->view('front/header');
		$this->load->view('front/paymentInfo', $data);
		$this->load->view('front/footer');
	}
	
	function bookingInfo()
	{
		//$this->Customermodel->bookingInfo();
		$this->load->view('front/header');
		$this->load->view('front/orderConfirmation');
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
	   public function varifyUser(){
	   $this->load->library('session');
	   	$this->load->helper('url');
        /* if($this->session->userdata('logged_in')==TRUE){
        redirect('Dashboard');
        }  */
        $email=$this->input->post('email',true);
        $password=$this->input->post('password',true);
        if($this->Customermodel->login($email,$password)){
        redirect('Customer/customerDashboard');
        }else{
        redirect('Customer');
        }

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

	   	$this->Customermodel->logout($this->session->userdata('user_id'));
	   redirect(base_url());
	   }
	   public function allMessages()
	   {
			$this->load->view('front/header');
			 $data['message'] = $this->Customermodel->allMessages($this->session->userdata('user_id'));
			$this->load->view('front/messages/allMessages',$data);
			$this->load->view('front/footer');
	   }
	   public function individualMessage($diveId,$thread)
	   {
		   $this->load->view('front/header');
			$user_id = $this->session->userdata('user_id');
			$result['oldConversation']= $this->Customermodel->individualMessage($user_id,$diveId,$thread);
			$result['diveId']=$diveId;
			$this->load->view('front/messages/individualMessage',$result);
			$this->load->view('front/footer');
		   
	   }
	    function new_chat()
		  {
			 
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
		echo $id;
		$data['Cviewreview'] = $this->Customermodel->customerViewmyreview($id);
		$this->load->view('front/header');
		$this->load->view('front/customer_viewMyreview', $data);
		//$this->load->view('front/footer');
	}


    function myCart()
	{
		$this->load->view('front/header');
		$this->load->view('front/myCart');
		$this->load->view('front/footer');
	}	
		function update_star_rating()
	{
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
		//$data['upcomingTripdetails'] = $this->Customermodel->upcomingTripdetails($id);
		$data['itenary_id'] = $id;
		$data['no_of_persons'] = $this->db->get_where('tbl_booking', array('id'=>$id))->result();
		$this->load->view('front/header');
		$this->load->view('front/upcomingTripdetails', $data);
		$this->load->view('front/footer');
	}
	function addPassenger($id)
	{
		$nop = $this->input->post('nop');
		for($i=0; $i<$nop; $i++)
		{
		if($this->input->post('passenger_details'))
		{
			$arr_data = array(
			'title'=>$this->input->post('title['.$i.']'),
			'name'=>$this->input->post('firstname['.$i.']'),
			'surname'=>$this->input->post('surname['.$i.']'),
			'email'=>$this->input->post('email_address['.$i.']'),
			'country_code'=>$this->input->post('countrycode['.$i.']'),
			'phone_no'=>$this->input->post('mobile_number['.$i.']'),
			'booking_id'=>$id
			);
			$arr_update = array(
			'status' =>"COMPLETED",
			'grand_total' =>$this->input->post('grandtotal')
			);
			//var_dump($arr_data);
			$this->Customermodel->addPassenger($arr_data);
			$this->Customermodel->statusUpdated($id, $arr_update);
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
		$data['itenary_id'] = $id;
		//$this->load->view('front/upcomingPrint');
		$data['no_of_persons'] = $this->db->get_where('tbl_booking', array('id'=>$id))->result();
		//$this->load->view('front/header');
		$this->load->view('front/upcomingPrint', $data);
	}
	function viewReceipt($id)
	{
		$data['itenary_id'] = $id;
		$data['grand_total'] = $this->db->get_where('tbl_booking', array('id', $id))->result();
		$this->load->view('front/viewReceipt', $data);
	}
	function cancelTrip($id)
	{
		$data['itenary_id'] = $id;
		$data['no_of_persons'] = $this->db->get_where('tbl_booking', array('id'=>$id))->result();
		//$this->load->view('front/upcomingPrint');
		$this->load->view('front/header');
		$this->load->view('front/cancelTrip', $data);
		$this->load->view('front/footer');
	}
	function confirmCancellation($id)
	{
		$data['itenary_id'] = $id;
		$cancell_data = array(
		'status' => "CANCELLED"
		);
		
		$this->Customermodel->confirmCancellation($id, $cancell_data);
		$data['no_of_persons'] = $this->db->get_where('tbl_booking', array('id'=>$id))->result();
		$this->load->view('front/header');
		$this->load->view('front/upcomingTripdetails', $data);
		$this->load->view('front/footer');
	}	
	
}
