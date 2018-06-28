<?php
class Currency extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('Currencymodel');
    $this->load->helper('url');
	  $this->load->library('session');
	if (($this->session->userdata('user_type') != 'SUPERADMIN') && ($this->session->userdata('user_type') != 'CUSTOM'))
	{
        redirect('login');
	}
  }
  public function newCurrency()
  {
    $result = array('message'=>'');
    if($this->input->post('submit')){
		$data = array(
			'from_cur' => $this->input->post('from_currency'),
			'to_cur' => $this->input->post('to_currency'),
			'buyer_amt' => $this->input->post('buyer_amt'),		
			'seller_amt' => $this->input->post('seller_amt')   			
		);
		$result['message'] = $this->Currencymodel->newCurrency($data);
	  }
    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $this->load->view('SAdmin/currency/newCurrency',$result);
    $this->load->view('template/footer');
  }
  function index()
  {
    $data['cList']=$this->Currencymodel->cList();
    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $this->load->view('SAdmin/currency/cList',$data);
    $this->load->view('template/footer');
  }

  public function editCurrency($id)
  {
    $result = array('message'=>'');
    if($this->input->post('submit'))
    {
  		$data = array(
			'from_cur' => $this->input->post('from_currency'),
			'to_cur' => $this->input->post('to_currency'),
			'buyer_amt' => $this->input->post('buyer_amt'),		
			'seller_amt' => $this->input->post('seller_amt')
  		);
		$result['message'] = $this->Currencymodel->editCurrency($data,$id);
		if($result['message'] == 'SUCCESS')
		{
			$base_url=base_url();
			redirect("$base_url"."Currency");
		}
    }
    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $result['currency']=$this->Currencymodel->getCurrency($id);
    $this->load->view('SAdmin/currency/updateCurrency',$result);
    $this->load->view('template/footer');
  }
  public function deleteCurrency($id)
  {
    $this->Currencymodel->deleteCurrency($id);
    $base_url=base_url();
	redirect("$base_url"."Currency");
  }

}
?>
