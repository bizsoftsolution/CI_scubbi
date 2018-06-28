<?php
class Chat extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
	$this->load->model('ChatModel');
    $this->load->helper('url');
	  $this->load->library('session');
  }
  public function inbox()
  {
    $result = array('message'=>'');
	 
    $this->load->view('template/header');
    $this->load->view('template/sidebar');
	$user_id = $this->session->userdata('user_id');

	$result['inboxMsg']= $this->ChatModel->inboxMsg($user_id);
	
    $this->load->view('internal_chat/chat_index',$result);
    $this->load->view('template/footer');
  }
  public function sentItems()
  {
    $result = array('message'=>'');
   /*  if($this->input->post('submit_courses_specialties_data')){
		$data = array(
			'description' => $this->input->post('courses_specialties_description')		
		);
		$result['message'] = $this->coursesModel->addNew($data);
	  } */
	 
    $this->load->view('template/header');
    $this->load->view('template/sidebar');
	$user_id = $this->session->userdata('user_id');
	//$result['oldConversation']= $this->ChatModel->particularChatList($user_id,'43');
	$result['sentItems']= $this->ChatModel->sentItems($user_id);
    $this->load->view('internal_chat/chatSentItems',$result);
    $this->load->view('template/footer');
  }
  function new_chat($to)
  {
	 // echo $to;
	$result = array('message'=>'');
	 if($this->input->post('submit_new_chat')){
		$data = array(
			'from' => $this->input->post('from'),		
			'to' => $this->input->post('to'),		
			'message' => $this->input->post('new_msg'),		
			'time' => date("Y-m-d H:i:s"),		
			'to_name' => $this->input->post('to_name'),		
			'from_name' => $this->input->post('from_name'),		
		);
		$result['message'] = $this->ChatModel->newChat($data);
	 	if($result['message'] == "SUCCESS")
		{
			$this->load->view('template/header');
			$this->load->view('template/sidebar');
			$user_id = $this->session->userdata('user_id');
			$result['oldConversation']= $this->ChatModel->particularChatList($user_id, $this->input->post('to'));
			
			redirect(base_url().'Chat/inbox');
			$this->load->view('template/footer');
			exit();
		} 
	  } 
	 
	$this->load->view('template/header');
    $this->load->view('template/sidebar');
	$user_id = $this->session->userdata('user_id');
	$result['oldConversation']= $this->ChatModel->particularChatList($user_id,$to);
	//$result['sentItems']= $this->ChatModel->sentItems($user_id);
    $this->load->view('internal_chat/new_chat',$result);
    $this->load->view('template/footer');
	  
  }
	  
  
  function coursesList()
  {
    $data['coursesList']=$this->coursesModel->coursesList();
    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $this->load->view('courses_specialties/coursesList',$data);
    $this->load->view('template/footer');
  }

  public function editData($id)
  {
      $result = array('message'=>'');
      if($this->input->post('update_courses_specialties_data'))
      {
  		  $data = array(
       'description' => $this->input->post('edit_courses_specialties_description')

  		);
  		$result['message'] = $this->coursesModel->updateData($data,$id);
      if($result['message'] == 'SUCCESS')
      {
        $base_url=base_url();
        redirect("$base_url"."Courses/coursesList");
      }
    }
    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $result['courses']=$this->coursesModel->editData($id);
    $this->load->view('courses_specialties/updateCourses',$result);
    $this->load->view('template/footer');
}
  public function deleteData($id)
  {
    $this->coursesModel->deleteData($id);
    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $data['coursesList']=$this->coursesModel->coursesList();
    $this->load->view('courses_specialties/coursesList',$data);
    $this->load->view('template/footer');
  }

}
?>
