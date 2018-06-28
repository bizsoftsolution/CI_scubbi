<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Promo_code extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// Session checking here 
		if (($this->session->userdata('user_type') != 'SUPERADMIN') && ($this->session->userdata('user_type') != 'CUSTOM')){
			redirect('login');
		}
		$this->load->model('promo_model','promo');
	}

	public function index()
	{	
		$data['promo_codes'] = $this->promo->get_promo_code();
		$this->load->view('template/header',$data);
		$this->load->view('template/sidebar');
		$this->load->view('promo_code/promo_details');
		$this->load->view('template/footer');
	}

	Public function save()
	{
		$this->_validate();
		
		$end_range_ap = $_POST['valid_from'];
		$date6 = str_replace('/', '-', $end_range_ap);
		$end_range3= date('Y-m-d', strtotime($date6));
		
		$end_range_ap1 = $_POST['valid_to'];
		$date61 = str_replace('/', '-', $end_range_ap1);
		$end_range31= date('Y-m-d', strtotime($date61));
			
			
		$data = array(
			'promo_code' =>$_POST['promo_code'],
			'type' =>$_POST['type'],
			'total_count' =>$_POST['total_count'],
			'percentage' =>$_POST['percentage'],
			'amount' =>$_POST['amount'],
			'currency' =>'MYR',
			'valid_from' =>$end_range3,
			'valid_to' =>$end_range31,
			'min_amount' => $_POST['min_amount']
			
				);
		$out = 0;
			if($result = $this->promo->save($data))
			{
				$fk_promo_id = $this->db->insert_id();
				$out = $out + 1;
				$curr = $this->db->get('tbl_multicurrency')->result();
				foreach($curr as $nCurr)
				{
					$data1 = array(
						'promo_code' =>$_POST['promo_code'],
						'type' =>$_POST['type'],
						'total_count' =>$_POST['total_count'],
						'percentage' =>$_POST['percentage'],
						'amount' =>$_POST['amount']/$nCurr->seller_amt,
						'currency' =>$nCurr->from_cur,
						'valid_from' =>$end_range3,
						'valid_to' =>$end_range31,
						'min_amount' => $_POST['min_amount']/$nCurr->seller_amt,
						'fk_promo_id' => $fk_promo_id
							);
					$insert_id ="";
					if($result = $this->promo->save($data1))
					{
						//$insert_id = $this->db->insert_id();
						$out = $out + 1;
					}
				}
				
			}
		
		
		if($out > 0){
		echo json_encode(array("status" => TRUE, "promo_id"=>$fk_promo_id,'promo_code'=>strtoupper(substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, 7))));
			}
	}
	Public function delete_promo(){
		$result = $this->promo->delete_promo();
		if($result){
		echo json_encode(array("status" => TRUE));
			}

	}
	
	Public function get_promo_by_id()
	{
		$result = $this->promo->get_promo_by_id();
		$result->valid_from = date('d-m-Y',strtotime($result->valid_from));
		$result->valid_to = date('d-m-Y',strtotime($result->valid_to));
		echo json_encode($result);
	}
	private function _validate()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if(empty($_POST['promo_code']))
		{
			$data['inputerror'][] = 'promo_code';
			$data['error_string'][] = 'Enter code no';
			$data['status'] = FALSE;
		}
		if(!empty($_POST['promo_code']))
		{
			$where = array('promo_code'=>$_POST['promo_code'],'status'=>1);
			if(!empty($_POST['promo_id'])){
				$where +=array('promo_id !='=>$_POST['promo_id']);
			}
			$count = $this->db->get_where('promo_code_details',$where)->num_rows();
			if($count!=0){
				$data['inputerror'][] = 'promo_code';
				$data['error_string'][] = 'Promo code already assigned';
				$data['status'] = FALSE;		
			}

		}
		if(empty($_POST['valid_from']))
		{
			$data['inputerror'][] = 'valid_from';
			$data['error_string'][] = 'Select from date';
			$data['status'] = FALSE;
		}
		if(empty($_POST['valid_to']))
		{
			$data['inputerror'][] = 'valid_to';
			$data['error_string'][] = 'Select to date';
			$data['status'] = FALSE;
		}
		if(empty($_POST['min_amount']))
		{
			$data['inputerror'][] = 'min_amount';
			$data['error_string'][] = 'Enter minimum amount';
			$data['status'] = FALSE;
		}
		if(empty($_POST['type']))
		{
			$data['inputerror'][] = 'type';
			$data['error_string'][] = 'Select type';
			$data['status'] = FALSE;
		}
		if(!empty($_POST['type']))
		{
			if($_POST['type'] == 'Amount'){

				if($_POST['amount']==''){
					$data['inputerror'][] = 'amount';
					$data['error_string'][] = 'Enter amount';
					$data['status'] = FALSE;
				}
			}else if($_POST['type'] == 'Percentage'){
				if($_POST['percentage']==''){
					$data['inputerror'][] = 'percentage';
					$data['error_string'][] = 'Enter percentage';
					$data['status'] = FALSE;
				}
			}
		}	
		
		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
	
}

	Public function generate_new_promo()
	{
		echo strtoupper(substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, 7));
	}
	
	public function editPromo($promo_id)
	{
		$end_range_ap = $this->input->post('valid_from');
		$date6 = str_replace('/', '-', $end_range_ap);
		$end_range3= date('Y-m-d', strtotime($date6));
		
		$end_range_ap1 = $this->input->post('valid_to');
		$date61 = str_replace('/', '-', $end_range_ap1);
		$end_range31= date('Y-m-d', strtotime($date61));
			
			
		if($this->input->post('update_btn'))
		{	
	
			$data = array(
			
			'percentage' =>$this->input->post('percentage'),
			'amount' =>$this->input->post('amount'),
			'currency' =>$this->input->post('currency'),
			'min_amount' => $this->input->post('min_amount')
			
				);
			$out = 0;
			 
							$this->db->where('promo_id', $promo_id);
			if($result = $this->db->update('promo_code_details', $data))
			{
				//$fk_promo_id = $this->db->insert_id();
				$this->db->where('fk_promo_id', $promo_id);
				$this->db->delete('promo_code_details'); 
				
				$out = $out + 1;
				$curr = $this->db->get('tbl_multicurrency')->result();
				$i = 0;
				foreach($curr as $nCurr)
				{
					$data1 = array(
						
						'percentage' =>$this->input->post('multi_percentage['.$i.']'),
						'amount' =>$this->input->post('multi_amount['.$i.']'),
						'currency' =>$this->input->post('multi_curreny['.$i.']'),
						'min_amount' => $this->input->post('multi_min_amount['.$i.']'),
						'fk_promo_id' => $promo_id
							);
							
					$data1 = array(
						'promo_code' =>$this->input->post('promo_code'),
						'type' =>$this->input->post('type'),
						'percentage' =>$this->input->post('multi_percentage['.$i.']'),
						'amount' =>$this->input->post('multi_amount['.$i.']'),
						'currency' =>$this->input->post('multi_curreny['.$i.']'),
						'valid_from' =>$end_range3,
						'valid_to' =>$end_range31,
						'min_amount' => $this->input->post('multi_min_amount['.$i.']'),
						'fk_promo_id' => $promo_id
							);
						
					if($result = $this->promo->save($data1))
					{
						$out = $out + 1;
					}
					$i++;
				}
				
			}
			if($out > 0)
			{
				redirect('Promo_code');
			}
	
		}
		else
		{
			$data['promo_id'] = $promo_id;
			$this->load->view('template/header');
			$this->load->view('template/sidebar');	
			$this->load->view('promo_code/update_promo',$data);
			$this->load->view('template/footer');
		}
	}

}

/* End of file  */
/* Location: ./application/controllers/ */