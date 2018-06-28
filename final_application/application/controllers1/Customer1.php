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
		if($this->input->post('submit_register_form'))
		{
			$signupdata = array(
			'first_name'=>$this->input->post('fname'),
			'last_name'=>$this->input->post('lname'),
			'email'=>$this->input->post('email'),
			'user_type'=>'Customer',
			'password'=>$this->input->post('password')
			);
			
		$this->Customermodel->signupData($signupdata);
		$base_url=base_url();
		redirect("$base_url"."Customer");
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
	function Updatecustomerprofile($id)
	{
		//$result = array('message'=>'');
		if($this->input->post('update_customerprofile_data'))
		{  
			 //Check whether user upload picture
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
			
			$con = $this->input->post('field_name');
			$other_language = $this->input->post('field_name1');
			$dob = $this->input->post('dob');
			$date_dob =date("Y-m-d", strtotime($dob));
			
            $userData = array(
                'firstname' => $this->input->post('firstname'),
                //'dcimage' => $divecenter_picture,
                'lastname' => $this->input->post('lastname'),
                'gender' => $this->input->post('gender'),
                'dob' => $date_dob,
                'email' => $this->input->post('email'),
                'contactno' => implode(",", $con),
                'nationality' => $this->input->post('nationality'),
                'diver_registration_body' => $this->input->post('diver_registration_body'),
                'identifiction_passport' =>$identification_passport ,
				'diver_registration_level' => $this->input->post('diver_registration_level'),
				'diver_speciality_skill' => $this->input->post('Specialtiesskill'),
				'diver_card' => $diver_card,
				'language' => $this->input->post('language'),
				'currency' => $this->input->post('currency'),
				'address1' => $this->input->post('address1'),
				'address2' => $this->input->post('address2'),
				'address3' => $this->input->post('address3'),
				'other_language' => implode(",", $other_language),
				'name' => $this->input->post('name'),
				'contact_no' => $this->input->post('contact_no'),
				'e_mail' => $this->input->post('e_mail'),
				'relationship' => $this->input->post('relationship')
            );          
			//Pass user data to model
			$this->Customermodel->updateData($userData, $id);
			$base_url=base_url();
			redirect("$base_url"."Customer/customerDashboard");
		}
	}
	function customerChangepassword()
	{
		$this->load->view('front/header');
		$this->load->view('front/customer_changepassword');
		$this->load->view('front/footer');
	}
	function customerMydiveTrips()
	{
		$this->load->view('front/header');
		$this->load->view('front/customer_mydiveTrips');
		$this->load->view('front/footer');
	}
	function paymentInfo()
	{
		$this->load->view('front/header');
		$this->load->view('front/paymentInfo');
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


}
