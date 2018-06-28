<?php
class SAbecomeapartner extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('SAbecomeapartnerModel');
    $this->load->helper('url');
	  $this->load->library('session');
	if (($this->session->userdata('user_type') != 'SUPERADMIN') && ($this->session->userdata('user_type') != 'CUSTOM'))
	{
        redirect('login');
	}
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
		$email = $this->input->post('email_address');
		if($this->input->post('update_Approved_data'))
		{
			$data1 = array(
				'password' => $psw_gen,
				'user_type' => "DCADMIN",
				'email' => $this->input->post('email_address'),
				'logged_in' => "FALSE",
				'modified' => date("Y-m-d H:i:s"),		
				'first_name' => $this->input->post('dive_center_name')
            );
			$data2 = array(
			'status' => $this->input->post('status_update')
			);
			//Pass user data to model
			$result['message'] = $this->SAbecomeapartnerModel->updateApproveldata($data1,$data2,$id);
			if($result['message'] == 'SUCCESS')
			{
				$this->load->library('email');

					$subject = 'Confirmation for a Became a partner ';
					//$message = '<p>Hi.</p>';

					// Get full html:
						$body = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "https://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
						<html xmlns="https://www.w3.org/1999/xhtml">
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
								<br>
								<br>
									You have been successfully registered as one of Scubbi Partners.
									<br>
									<br>
									We would like to extend our appreciation and looking forward to your participation in our growing list of partners offering their services to the community of www.scubbi.com
									<br><br>
									Please find your login credentials as listed below:
									<br><br>
									<table border="10">
										<tr>
											<td> User name : </td>
											<td> '.$email.' </td>
										</tr>
										<tr>
											<td> Password : </td>
											<td> '.$psw_gen.' </td>
										</tr>
										<tr>
											<td> Url : </td>
											<td> https://www.scubbi.com/login </td>
										</tr>
									</table>
								<br>
								<br>
								If you are in need of any assistance, do contact us at  
								
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

					//var_dump($result);
					//echo '<br />';
					//echo $this->email->print_debugger();
				
				
			$base_url=base_url();
			redirect("$base_url"."SAbecomeapartner");
			}
			$base_url=base_url();
			redirect("$base_url"."SAbecomeapartner");
		}
	$this->load->view('template/header');
    $this->load->view('template/sidebar');
    $result['getapprovelData']=$this->SAbecomeapartnerModel->getapprovelData($id);
    $this->load->view('SAdmin/becomeapartner/updateBecomeapartner',$result);
    $this->load->view('template/footer');
  }
	
	function userDetails($type)
  {
	$data['utype']=$type;
    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $this->load->view('SAdmin/becomeapartner/userList',$data);
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
  function DCinbox($dive_id)
  {
    $result = array('message'=>'');
	 
    $this->load->view('template/header');
    $this->load->view('template/sidebar');
	$user_id = $this->session->userdata('user_id');

	$result['inboxMsg']= $this->SAbecomeapartnerModel->DCinboxMsg($dive_id);
	$this->session->set_userdata("dive_id",$dive_id);
//	echo( "dive_id $dive_id>");
//	$result['dive_id']= $dive_id;
	
    $this->load->view('SAdmin/becomeapartner/SAchat_index',$result);
    $this->load->view('template/footer');
  }
  function DCview($user_id)
  {
    $this->load->view('template/header');
    $this->load->view('template/sidebar');
	//$user_id = $this->session->userdata('user_id');
	//$this->session->set_userdata("dive_id",$dive_id);
	$data['user_id'] = $user_id;
    $this->load->view('SAdmin/becomeapartner/viewdiveCenter',$data);
    $this->load->view('template/footer');
  }
  function Adminview($user_id)
  {
    $this->load->view('template/header');
    $this->load->view('template/sidebar');
	//$user_id = $this->session->userdata('user_id');
	//$this->session->set_userdata("dive_id",$dive_id);
	$data['user_id'] = $user_id;
    $this->load->view('SAdmin/becomeapartner/viewAdmin',$data);
    $this->load->view('template/footer');
  }
  function Customerview($user_id)
  {
    $this->load->view('template/header');
    $this->load->view('template/sidebar');
	$data['user_id']=$user_id;
	//$user_id = $this->session->userdata('user_id');
	//$this->session->set_userdata("dive_id",$dive_id);
    $this->load->view('SAdmin/becomeapartner/viewCustomer',$data);
    $this->load->view('template/footer');
  }
  function SAnew_chat($to,$conv)
  {
	 // echo $to;
	$result = array('message'=>'');
	 if($this->input->post('submit_new_chat')){
		$data = array(
			'from' => $this->input->post('from'),		
			'to' => $this->input->post('to'),		
			'thread_id' => $this->input->post('thread_id'),		
			'message' => $this->input->post('new_msg'),		
			'time' => date("Y-m-d H:i:s"),		
			'to_name' => $this->input->post('to_name'),		
			'from_name' => $this->input->post('from_name'),		
		);
		$result['message'] = $this->SAbecomeapartnerModel->newChat($data);
	 	if($result['message'] == "SUCCESS")
		{
			$this->load->view('template/header');
			$this->load->view('template/sidebar');
			$user_id = $this->session->userdata('user_id');
			$result['oldConversation']= $this->SAbecomeapartnerModel->particularChatList($user_id, $this->input->post('to'),$conv);
			
			redirect(base_url().'SAbecomeapartner/diveCenterDetails');
			$this->load->view('template/footer');
			exit();
		} 
	  } 
	 
	$this->load->view('template/header');
    $this->load->view('template/sidebar');
	$user_id = $this->session->userdata('user_id');
	$result['oldConversation']= $this->SAbecomeapartnerModel->particularChatList($user_id,$to,$conv);
	$result['conv']= $conv;
	//$result['sentItems']= $this->ChatModel->sentItems($user_id);
    $this->load->view('SAdmin/becomeapartner/SAnew_chat',$result);
    $this->load->view('template/footer');
	  
  }
  public function suspend($id)
  {
	  $suspend = array(
	  'status'=>'SUSPEND',
	  'logged_in'=>'FALSE',
		'modified' => date("Y-m-d H:i:s")		
	  );
    $this->SAbecomeapartnerModel->suspend($id, $suspend);
	
	redirect(base_url().'SAbecomeapartner/userDetails/Customer');
  }
  public function Reinstate($id)
  {
	  $open = array(
	  'status'=>'OPEN',
	  'logged_in'=>'FALSE',
		'modified' => date("Y-m-d H:i:s")		
	  );
    $this->SAbecomeapartnerModel->Reinstate($id, $open);
	
	redirect(base_url().'SAbecomeapartner/userDetails/Customer');
  }

 
}
?>
