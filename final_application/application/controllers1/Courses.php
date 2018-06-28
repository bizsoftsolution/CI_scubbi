<?php
class Courses extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('CoursesModel', 'coursesModel');
    $this->load->helper('url');
	  $this->load->library('session');
  }
  public function addNew()
  {
    $result = array('message'=>'');
    if($this->input->post('submit_courses_specialties_data')){
		$data = array(
			'description' => $this->input->post('courses_specialties_description')		
		);
		$result['message'] = $this->coursesModel->addNew($data);
	  }
    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $this->load->view('courses_specialties/newCourses',$result);
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
