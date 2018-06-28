<?php
class Bugs extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Bugsmodel');
        $this->load->helper('url');
        $this->load->library('session');
	if (($this->session->userdata('user_type') != 'BUGSDEVELOPER') && ($this->session->userdata('user_type') != 'BUGVIEWER'))
	{
        redirect('login');
	}

    }
    
    //**********************************************************************************************************************************************
    //                                                                   [ Bugs Start] //***********************************************************************************************************************************************

    
    // Dive Master *********
    
    function BugList()
    {
        $data['BugList'] = $this->Bugsmodel->BugList();
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('bugs/List', $data);
        $this->load->view('template/footer');
    }
    function addBug()
    {
        $result = array(
            'message' => ''
        );
        if ($this->input->post('submit_bug_data')) {
            if (!empty($_FILES['image']['name'])) {
                $config['upload_path']   = './upload/bugs/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['file_name']     = $_FILES['image']['name'];
                
                //Load upload library and initialize configuration
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                
                if ($this->upload->do_upload('image')) {
                    $uploadData  = $this->upload->data();
                    $bug_picture1 = $uploadData['file_name'];
                } else {
                    $bug_picture1 = '';
                }
            } else {
                $bug_picture1 = '';
            }
            
            $userData = array(
				'refno'=>$this->input->post('refno'),
				'bug_raised_date' =>date('y-m-d'),
				'bug_raised_by' =>$this->input->post('raised_by'),
				'bug_name' =>$this->input->post('name'),
				'bug_description' =>$this->input->post('description'),
				'bug_priority' =>$this->input->post('priority'),
                'bug_image' => $bug_picture1,
                'bug_module' => $this->input->post('module')
            );
            //Pass user data to model
            $result['message'] = $this->Bugsmodel->addNewBug($userData);
        }
        //$result['department'] = $this->DCprofilemodel->getDepartment();
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('bugs/Add', $result);
        $this->load->view('template/footer');
    }
	function view($id)
	{
		$this->load->view('template/header');
        $this->load->view('template/sidebar');
        //$result['department'] = $this->DCprofilemodel->getDepartment();
        $result['getbugsData'] = $this->Bugsmodel->getbugsData($id);
        $this->load->view('bugs/View', $result);
        $this->load->view('template/footer');
	}
    public function edit($id)
    {
        $result = array(
            'message' => ''
        );
        if ($this->input->post('Update_bug_data')) {
            $data  = array(
				'refno'=>$this->input->post('refno'),
                'bug_raised_date' =>date('y-m-d'),
				'bug_raised_by' =>$this->input->post('raised_by'),
				'bug_name' =>$this->input->post('name'),
				'bug_description' =>$this->input->post('description'),
				'bug_priority' =>$this->input->post('priority'),
                'bug_module' => $this->input->post('module')
            );
            $result['message'] = $this->Bugsmodel->editNewBugs($data, $id);
            if ($result['message'] == 'SUCCESS') {
                $base_url = base_url();
                redirect("$base_url" . "Bugs/BugList");
            }
        }
        
        if ($this->input->post('update_Image_data')) {
            //Check whether user upload picture
            if (!empty($_FILES['edit_photo']['name'])) {
                $config['upload_path']   = './upload/bugs/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['file_name']     = $_FILES['edit_photo']['name'];
                
                //Load upload library and initialize configuration
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                
                if ($this->upload->do_upload('edit_photo')) {
                    $uploadData         = $this->upload->data();
                    $bug_picture1 = $uploadData['file_name'];
                } else {
                    $bug_picture1 = '';
                }
            } else {
                $bug_picture1 = '';
            }
            
            $data = array(
                'bug_image' => $bug_picture1
            );
            $result['message'] = $this->Bugsmodel->editNewBugs($data, $id);
            if ($result['message'] == 'SUCCESS') {
                $base_url = base_url();
                redirect("$base_url" . "Bugs/BugList");
            }
            
        }
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        //$result['department'] = $this->DCprofilemodel->getDepartment();
        $result['getbugsData'] = $this->Bugsmodel->getbugsData($id);
        $this->load->view('bugs/Edit', $result);
        $this->load->view('template/footer');
    }
    
    public function delete($id)
    {
        $this->Bugsmodel->deleteBugs($id);
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $data['BugList'] = $this->Bugsmodel->BugList();
        $this->load->view('bugs/List', $data);
        $this->load->view('template/footer');
    }
    
	function notcompletedList()
	{
		$data['notcompletedList'] = $this->Bugsmodel->notcompletedList();
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('bugs/notcompletedList', $data);
        $this->load->view('template/footer');
	}
	function completedList()
	{
		$data['completedList'] = $this->Bugsmodel->completedList();
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('bugs/completedList', $data);
        $this->load->view('template/footer');
	}
	function done($id)
	{
		 $result = array(
            'message' => ''
        );
		if ($this->input->post('Done_bug_data')) {
            $data  = array(
                'bug_status' => "DONE"
            );
            $result['message'] = $this->Bugsmodel->doneBugs($id,$data);
            if ($result['message'] == 'SUCCESS') {
                $base_url = base_url();
                redirect("$base_url" . "Bugs/notcompletedList");
            }
        }
		$this->load->view('template/header');
        $this->load->view('template/sidebar');
        //$result['department'] = $this->DCprofilemodel->getDepartment();
        $result['getbugsData'] = $this->Bugsmodel->getbugsData($id);
        $this->load->view('bugs/completedUpdate', $result);
        $this->load->view('template/footer');
	}
		function allBugs()
	{
		$data['allBugs'] = $this->Bugsmodel->allBugs();
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('bugs/allBugs', $data);
        $this->load->view('template/footer');
	}
    
    //**********************************************************************************************************************************************
    //                                                                   [ Bugs END ] //***********************************************************************************************************************************************
    
}
?>