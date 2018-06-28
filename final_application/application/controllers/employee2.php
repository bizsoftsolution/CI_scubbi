<?php
class employee extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('Employeemodel', 'employeemodel');
    $this->load->helper('url');
	  $this->load->library('session');
  }
  public function add()
  {
    $result = array('message'=>'');
    if($this->input->post('name')){

  	 $data = array(
			'name' => $this->input->post('name'),
      'gender' => $this->input->post('gender'),
//			'photo' => $this->input->post('photo')
		);
    if($_FILES['photo']['name'])
     {
          $upload = $this->_do_upload();
          $data['photo'] = $upload;
      }
  
		$result['message'] = $this->employeemodel->add_employee($data);
	  }
    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $this->load->view('emp/employeeadd',$result);
    $this->load->view('template/footer');
  }
  function allemployee()
  {
    $data['employeelist']=$this->employeemodel->get_entries();
    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $this->load->view('emp/employeelist',$data);
    $this->load->view('template/footer');
  }

  public function edit($id)
  {
      $result = array('message'=>'');
      if($this->input->post('name'))
      {
  		  $data = array(
        'name' => $this->input->post('name'),
  			'gender' => $this->input->post('gender')
  		);
  		$result['message'] = $this->employeemodel->update_entry($data,$id);
      if($result['message'] == 'SUCCESS')
      {
        $base_url=base_url();
        redirect("$base_url"."employee/allemployee");
      }
    }
    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $result['employee']=$this->employeemodel->get($id);
    $this->load->view('emp/employeeupdate',$result);
    $this->load->view('template/footer');
}
  public function delete($id)
  {
    $this->employeemodel->delete_entry($id);
    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $data['employeelist']=$this->employeemodel->get_entries();
    $this->load->view('emp/employeelist',$data);
      $this->load->view('template/footer');
  }
  private function _do_upload()
  {
      $config['upload_path']          = 'upload/';
      $config['allowed_types']        = 'gif|jpg|png';
      $config['max_size']             = 100; //set max size allowed in Kilobyte
      $config['max_width']            = 1000; // set max width image allowed
      $config['max_height']           = 1000; // set max height allowed
      $config['file_name']            = round(microtime(true) * 1000); //just milisecond timestamp fot unique name

      $this->load->library('upload', $config);

      if(!$this->upload->do_upload('photo')) //upload and validate
      {
          $data['inputerror'][] = 'photo';
          $data['error_string'][] = 'Upload error: '.$this->upload->display_errors('',''); //show ajax error
          $data['status'] = FALSE;
          echo json_encode($data);
          exit();
      }
      return $this->upload->data('file_name');
  }

}
?>
