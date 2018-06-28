<?php
class Chat extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
	$this->load->model('ChatModel');
    $this->load->helper('url');
	  $this->load->library('session');
//	  echo( "Type : " . $this->session->userdata('user_type') . " User:" . $this->session->userdata('user_id') . "<br>");
	if ($this->session->userdata('user_type') != 'DCADMIN')
	{
        redirect('login');
	}
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
  
  public function ajaxInbox()
  {
		$user_id = $this->session->userdata('user_id');
		$inboxMsg = $this->ChatModel->inboxMsg($user_id);
	   $msg = '';
	   $i=1;

            
              foreach($inboxMsg as $row) {
				  $status="";
				if (($row->mcnt > 0) && ($row->scnt > 0)) {
            $msg .= '
              <tr>
              <td>'.$i.'</td>
              <td>';
			 
				$from_id = $row->lfrom;
				$to_id = $row->lto;
				$lid = $row->lid;
				$thread = $row->thread_id;
				
				$crows = $this->db->get_where('messages', array('id'=>$lid))->result();
				$crow = $crows[0];
				$fullname = "";
				$fname=$this->db->get_where('tbl_customerprofile', array('user_id'=>$row->customer_id))->result();
				foreach($fname as $fn)
				{
					$fullname = $fn->firstname . " " . $fn->lastname . ", " . $fn->gender . " [" . $fn->language ."]";
				}
				
				if($from_id == $this->session->userdata('user_id'))
				{	
					//echo "customer $from_id " ;
					$data=$this->db->get_where('tbl_customerprofile', array('user_id'=>$to_id))->result();
					foreach($data as $data_val)
					{
						if($data_val->photo != NULL)
						{
							    $msg .= '
							<img src="'.base_url().'upload/customerprofile/'.$data_val->photo.'" class="img-circle" width="60px" height="60px" style="border:1px solid gray">';
						}
						else{
					    $msg .= '
							<img src="'.base_url().'upload/customerprofile/user.png" style="width:50px;height:50px;" > ';
					
						}
					}
				}
				
				elseif(($from_id == 33) || ($to_id == 33)) // sadmin
				{
					    $msg .= '
							<img src="'.base_url().'upload/customerprofile/user.png" style="width:50px;height:50px;" > ';
					
				}
				elseif($to_id == $this->session->userdata('user_id'))
				{
					//echo "fhdfhdhfh";
					$data1=$this->db->get_where('tbl_customerprofile', array('user_id'=>$from_id))->result();
					foreach($data1 as $data_val1)
					{
						if($data_val1->photo != NULL)
						{   
					$msg .= '
							
							<img src="'.base_url().'upload/customerprofile/'.$data_val1->photo.'" class="img-circle" width="60px" height="60px" style="border:1px solid gray">';
						}
						else{
					    $msg .= '
							<img src="'.base_url().'upload/customerprofile/user.png" style="width:50px;height:50px;" > ';
					
							}
					}
				}
			     $msg .= '
			  </td>
			  
              <td><b>'.$fullname.'</b><br><p>'. $crow->message .'</p>'.'</td>';

              
			  if ($crow->is_read == 0){$status = "New";}else{$status = "Read";}
			      $msg .= '
              <td>'.$status.'</td>
              <td>'.date("d-m-Y h:m:s", strtotime($crow->time)).'</td>
			  
              <td>';
				
				if($from_id == $this->session->userdata('user_id'))
				{	
			    $msg .= '
					<a href="'.base_url().'Chat/new_chat/'.$crow->to.'/'.$thread.'" class="btn btn-success">Reply </a>';
				
				}
				elseif(($from_id == 33) || ($to_id == 33)) // sadmin
				{
					    $msg .= '
					<a href="'.base_url().'Chat/new_chat/'.$crow->from.'/'.$thread.'" class="btn btn-primary">Reply </a>';
					
				}
				elseif($to_id == $this->session->userdata('user_id'))
				{
					$data1=$this->db->get_where('tbl_customerprofile', array('user_id'=>$from_id))->result();
					foreach($data1 as $data_val1)
					{
					    $msg .= '
					<a href="'.base_url().'Chat/new_chat/'.$crow->from.'/'.$thread.'" class="btn btn-primary">Reply </a>';
					
					}
				}
			      $msg .= '
			  </td>
              </tr>';
              }
               $i++;
			   }
			      
		 
		 echo $msg;
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
  function new_chat($to,$conv)
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
		$result['message'] = $this->ChatModel->newChat($data);
	 	if($result['message'] == "SUCCESS")
		{
			$this->load->view('template/header');
			$this->load->view('template/sidebar');
			$user_id = $this->session->userdata('user_id');
			$result['oldConversation']= $this->ChatModel->particularChatList($user_id, $this->input->post('to'),$conv);
			
			redirect(base_url().'Chat/inbox');
			$this->load->view('template/footer');
			exit();
		} 
	  } 
	 
	$this->load->view('template/header');
    $this->load->view('template/sidebar');
	$user_id = $this->session->userdata('user_id');
	$result['oldConversation']= $this->ChatModel->particularChatList($user_id,$to,$conv);
	$result['conv']= $conv;
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
	function findMessageCount()
	{
		$this->db->where('to', $this->session->userdata('user_id'));
		$this->db->where('is_read', 0);
		$query = $this->db->get('messages');
		$notification= $query->num_rows();
		echo $notification;
	}
}
?>
