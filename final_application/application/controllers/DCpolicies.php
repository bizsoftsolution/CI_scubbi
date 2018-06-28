<?php
class DCpolicies extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('DCpoliciesmodel');
    $this->load->helper('file');
    $this->load->database();
    $this->load->helper('url');
	  $this->load->library('session');
	if ($this->session->userdata('user_type') != 'DCADMIN')
	{
        redirect('login');
	}
  }
  
  //**********************************************************************************************************************************************
 //                                                                   [ Dive Center Profile Start] //***********************************************************************************************************************************************
 
 function DCpoliciesdashboardlist()
  {
    //$data['DCpoliciesdashboardlist']=$this->DCpoliciesmodel->DCpoliciesdashboardlist();
    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $this->load->view('DCpolicies/DCpoliciesdashboard');
    $this->load->view('template/footer');
  }
  
  
  public function addNew()
  {
    $result = array('message'=>'');	
	if($this->input->post('submit_DCpolicies_data'))
		{  
            //Prepare array of user data
			if($this->input->post('depositrequired') == 'No')
			{
					
					$booking_amount1 = "100 %";
					$booking_total_product1="of Payment";
					$booking_charge1="Will Be Charged";
					$booking_period1="Upon Booking";
					
					$userData = array(
						'booking_name' => $this->input->post('name'),
						'deposit_required' => $this->input->post('depositrequired'),
						'booking_deposit' => $this->input->post('booking_deposit'),
						'booking_amount' => $booking_amount1,
						'booking_total_product' => $booking_total_product1,
						'booking_charge' => $booking_charge1,
						'booking_period' => $booking_period1,
						'modified' => date("Y-m-d H:i:s"),		
						'user_id' => $this->session->userdata('user_id')
					);          
					//Pass user data to model
					$result['message'] = $this->DCpoliciesmodel->addNew($userData);
					if($result['message'] == 'SUCCESS')
					{
						$messge = array('message' => 'Booking Policy is Created successfully','class' => 'alert alert-success fade in');
						$this->session->set_flashdata('item', $messge);
						$base_url=base_url();
						redirect("$base_url"."DCpolicies/DCpolicieslist");
						//$this->DCpolicieslist();
					}
			}
			else
			{
				$booking_amount = $this->input->post('booking_amount');
					$booking_amount1 ="";
					if(isset($booking_amount) && is_array($booking_amount)){
						$booking_amount1 = implode(",", $booking_amount); 
					}
					else
					{
						$booking_amount1 = "100 %";
					}
					$booking_total_product = $this->input->post('booking_total_product');
					$booking_total_product1 ="";
					if(isset($booking_total_product) && is_array($booking_total_product)){
						$booking_total_product1 = implode(",", $booking_total_product); 
					}
					else
					{
						$booking_total_product1="of Payment";
					}
					
					$booking_charge = $this->input->post('booking_charge');
					$booking_charge1 ="";
					if(isset($booking_charge) && is_array($booking_charge)){
						$booking_charge1 = implode(",", $booking_charge); 
					}
					else
					{
						$booking_charge1="Will Be Charged";
					}
					
					$booking_days = $this->input->post('booking_days');
					$booking_days1 ="";
					if(isset($booking_days) && is_array($booking_days)){
						$booking_days1 = implode(",", $booking_days); 
					}
					$booking_period = $this->input->post('booking_period');
					$booking_period1 ="";
					if(isset($booking_period) && is_array($booking_period)){
						$booking_period1 = implode(",", $booking_period); 
					}
					else
					{
						$booking_period1="Upon Booking";
					}
					$userData = array(
						'booking_name' => $this->input->post('name'),
						'deposit_required' => $this->input->post('depositrequired'),
						'booking_deposit' => $this->input->post('booking_deposit'),
						'booking_amount' => $booking_amount1,
						'booking_total_product' => $booking_total_product1,
						'booking_charge' => $booking_charge1,
						'booking_days' => $booking_days1,
						'booking_period' => $booking_period1,
						'modified' => date("Y-m-d H:i:s"),		
						'user_id' => $this->session->userdata('user_id')
					);          
					//Pass user data to model
					$result['message'] = $this->DCpoliciesmodel->addNew($userData);
					if($result['message'] == 'SUCCESS')
					{
						$messge = array('message' => 'Booking Policy is Created successfully','class' => 'alert alert-success fade in');
						$this->session->set_flashdata('item', $messge);
						$base_url=base_url();
						redirect("$base_url"."DCpolicies/DCpolicieslist");
						//$this->DCpolicieslist();
					}
			}
        }
	//$result['currency'] = $this->DCleisuremodel->getcurrency();
    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $this->load->view('DCpolicies/DCpoliciesadd', $result);
    $this->load->view('template/footer');
  }
  function DCpolicieslist()
  {
    $data['DCpolicieslist']=$this->DCpoliciesmodel->DCpolicieslist();
    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $this->load->view('DCpolicies/DCpolicieslist',$data);
    $this->load->view('template/footer');
  }
  function viewBookingPolicy($id)
  {
		$data['id'] = $id;
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('DCpolicies/viewBookingPolicy',$data);
		$this->load->view('template/footer');
  }

  function edit($id)
  {
    $result = array('message'=>'');

	if($this->input->post('update_DCpolicies_data'))
		{  
			//Prepare array of user data
			if($this->input->post('depositrequired') == 'No')
			{
					
					$booking_amount1 = "100 %";
					$booking_total_product1="of Payment";
					$booking_charge1="Will Be Charged";
					$booking_period1="Upon Booking";
					
					$userData = array(
						'booking_name' => $this->input->post('name'),
						'deposit_required' => $this->input->post('depositrequired'),
						'booking_deposit' => $this->input->post('booking_deposit'),
						'booking_amount' => $booking_amount1,
						'booking_total_product' => $booking_total_product1,
						'booking_charge' => $booking_charge1,
						'booking_period' => $booking_period1,
						'modified' => date("Y-m-d H:i:s"),		
						'user_id' => $this->session->userdata('user_id')
					);          
					//Pass user data to model
					$result['message'] = $this->DCpoliciesmodel->updateData($userData,$id);
					if($result['message'] == 'SUCCESS')
					{
						$messge = array('message' => 'Booking Policy is Created successfully','class' => 'alert alert-success fade in');
						$this->session->set_flashdata('item', $messge);
						$base_url=base_url();
						redirect("$base_url"."DCpolicies/DCpolicieslist");
						//$this->DCpolicieslist();
					}
			}
			else
			{
				$booking_amount = $this->input->post('booking_amount');
					$booking_amount1 ="";
					if(isset($booking_amount) && is_array($booking_amount)){
						$booking_amount1 = implode(",", $booking_amount); 
					}
					else
					{
						$booking_amount1 = "100 %";
					}
					$booking_total_product = $this->input->post('booking_total_product');
					$booking_total_product1 ="";
					if(isset($booking_total_product) && is_array($booking_total_product)){
						$booking_total_product1 = implode(",", $booking_total_product); 
					}
					else
					{
						$booking_total_product1="of Payment";
					}
					
					$booking_charge = $this->input->post('booking_charge');
					$booking_charge1 ="";
					if(isset($booking_charge) && is_array($booking_charge)){
						$booking_charge1 = implode(",", $booking_charge); 
					}
					else
					{
						$booking_charge1="Will Be Charged";
					}
					
					$booking_days = $this->input->post('booking_days');
					$booking_days1 ="";
					if(isset($booking_days) && is_array($booking_days)){
						$booking_days1 = implode(",", $booking_days); 
					}
					$booking_period = $this->input->post('booking_period');
					$booking_period1 ="";
					if(isset($booking_period) && is_array($booking_period)){
						$booking_period1 = implode(",", $booking_period); 
					}
					else
					{
						$booking_period1="Upon Booking";
					}
					$userData = array(
						'booking_name' => $this->input->post('name'),
						'deposit_required' => $this->input->post('depositrequired'),
						'booking_deposit' => $this->input->post('booking_deposit'),
						'booking_amount' => $booking_amount1,
						'booking_total_product' => $booking_total_product1,
						'booking_charge' => $booking_charge1,
						'booking_days' => $booking_days1,
						'booking_period' => $booking_period1,
						'modified' => date("Y-m-d H:i:s"),		
						'user_id' => $this->session->userdata('user_id')
					);          
					//Pass user data to model
					$result['message'] = $this->DCpoliciesmodel->updateData($userData,$id);
					if($result['message'] == 'SUCCESS')
					{
						$messge = array('message' => 'Booking Policy is updated successfully','class' => 'alert alert-success fade in');
						$this->session->set_flashdata('item', $messge);
						$base_url=base_url();
						redirect("$base_url"."DCpolicies/DCpolicieslist");
						//$this->DCpolicieslist();
					}
				}
			
		}
    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $result['getEditdata']=$this->DCpoliciesmodel->getEditdata($id);
    $this->load->view('DCpolicies/DCpoliciesupdate',$result);
    $this->load->view('template/footer');
	}
  public function delete($id)
  {
    $this->DCpoliciesmodel->deleteData($id);
    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $data['DCpolicieslist']=$this->DCpoliciesmodel->DCpolicieslist();
    $this->load->view('DCpolicies/DCpolicieslist',$data);
    $this->load->view('template/footer');
  }
  
  //**********************************************************************************************************************************************//
 //                                                                   [ Dive Center Profile END] //***********************************************************************************************************************************************//

  //**********************************************************************************************************************************************
 //                                                                   [ Dive Cancellation Policy Start] //***********************************************************************************************************************************************
 public function addCancellation()
  {
    $result = array('message'=>'');	
	if($this->input->post('submit_DCcancellationpolicies_data'))
		{  
            //Prepare array of user data
			$cancellation_amount = $this->input->post('cancellation_amount');
			$cancellation_amount1 ="";
			if(isset($cancellation_amount) && is_array($cancellation_amount)){
				$cancellation_amount1 = implode(",", $cancellation_amount); 
			}
			$cancellation_total_product = $this->input->post('cancellation_total_product');
			$cancellation_total_product1 ="";
			if(isset($cancellation_total_product) && is_array($cancellation_total_product)){
				$cancellation_total_product1 = implode(",", $cancellation_total_product); 
			}
			$cancellation_charged = $this->input->post('cancellation_charged');
			$cancellation_charged1 ="";
			if(isset($cancellation_charged) && is_array($cancellation_charged)){
				$cancellation_charged1 = implode(",", $cancellation_charged); 
			}
			
			$cancellation_days = $this->input->post('cancellation_days');
			$cancellation_days1 ="";
			if(isset($cancellation_days) && is_array($cancellation_days)){
				$cancellation_days1 = implode(",", $cancellation_days); 
			}
			$cancellation_period = $this->input->post('cancellation_period');
			$cancellation_period1 ="";
			if(isset($cancellation_period) && is_array($cancellation_period)){
				$cancellation_period1 = implode(",", $cancellation_period); 
			}
            $userData = array(
                'cancellation_name' => $this->input->post('name'),
                'cancellation_policy_type' => $this->input->post('cancellation_policy_type'),
                'cancellation_amount' => $cancellation_amount1,
                'cancellation_total_product' => $cancellation_total_product1,
                'cancellation_charged' => $cancellation_charged1,
                'cancellation_days' => $cancellation_days1,
                'cancellation_period' => $cancellation_period1,
				'modified' => date("Y-m-d H:i:s"),		
				'user_id' => $this->session->userdata('user_id')
            );          
			//Pass user data to model
			$result['message'] = $this->DCpoliciesmodel->addCancellation($userData);
			 if($result['message'] == 'SUCCESS')
			{
				$messge = array('message' => 'Cancellation Policy is Created successfully','class' => 'alert alert-success fade in');
				$this->session->set_flashdata('item', $messge);
				$base_url=base_url();
				redirect("$base_url"."DCpolicies/DCcancelpolicieslist");
				//$this->DCcancelpolicieslist();
			}
        }
		else
		{
	//$result['currency'] = $this->DCleisuremodel->getcurrency();
    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $this->load->view('DCpolicies/DCcancelpoliciesadd', $result);
    $this->load->view('template/footer');
		}
  }
  function DCcancelpolicieslist()
  {
    $data['DCcancelpolicieslist']=$this->DCpoliciesmodel->DCcancelpolicieslist();
    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $this->load->view('DCpolicies/DCcancelpolicieslist',$data);
    $this->load->view('template/footer');
  }
  
  
  function viewCancellationPolicy($id)
  {
    $data['id']=$id;
    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $this->load->view('DCpolicies/viewCancellationPolicy',$data);
    $this->load->view('template/footer');
  }
  
  
  
  function editCancellation($id)
  {
    $result = array('message'=>'');

	if($this->input->post('update_DCcancellationpolicies_data'))
		{  
			 //Prepare array of user data
			$cancellation_amount = $this->input->post('cancellation_amount');
			$cancellation_amount1 ="";
			if(isset($cancellation_amount) && is_array($cancellation_amount)){
				$cancellation_amount1 = implode(",", $cancellation_amount); 
			}
			$cancellation_total_product = $this->input->post('cancellation_total_product');
			$cancellation_total_product1 ="";
			if(isset($cancellation_total_product) && is_array($cancellation_total_product)){
				$cancellation_total_product1 = implode(",", $cancellation_total_product); 
			}
			$cancellation_days = $this->input->post('cancellation_days');
			$cancellation_days1 ="";
			if(isset($cancellation_days) && is_array($cancellation_days)){
				$cancellation_days1 = implode(",", $cancellation_days); 
			}
			$cancellation_period = $this->input->post('cancellation_period');
			$cancellation_period1 ="";
			if(isset($cancellation_period) && is_array($cancellation_period)){
				$cancellation_period1 = implode(",", $cancellation_period); 
			}
			$cancellation_charged = $this->input->post('cancellation_charged');
			$cancellation_charged1 ="";
			if(isset($cancellation_charged) && is_array($cancellation_charged)){
				$cancellation_charged1 = implode(",", $cancellation_charged); 
			}
            $userData = array(
                'cancellation_name' => $this->input->post('name'),
                'cancellation_policy_type' => $this->input->post('cancellation_policy_type'),
                'cancellation_amount' => $cancellation_amount1,
                'cancellation_total_product' => $cancellation_total_product1,
				'cancellation_charged' => $cancellation_charged1,
                'cancellation_days' => $cancellation_days1,
                'cancellation_period' => $cancellation_period1,
				'modified' => date("Y-m-d H:i:s"),		
				'user_id' => $this->session->userdata('user_id')
            );          
			//Pass user data to model
			$result['message'] = $this->DCpoliciesmodel->updatecancelData($userData, $id);
			if($result['message'] == 'SUCCESS')
			{
			$base_url=base_url();
			redirect("$base_url"."DCpolicies/DCcancelpolicieslist");
			}
		}
    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $result['getEditdata']=$this->DCpoliciesmodel->getCanceldata($id);
    $this->load->view('DCpolicies/DCcancelpoliciesupdate',$result);
    $this->load->view('template/footer');
	}
  public function deleteCancellation($id)
  {
    $this->DCpoliciesmodel->deleteCancellation($id);
    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $data['DCcancelpolicieslist']=$this->DCpoliciesmodel->DCcancelpolicieslist();
    $this->load->view('DCpolicies/DCcancelpolicieslist',$data);
    $this->load->view('template/footer');
  }
  public function editCancellationInline()
  {

   
    $this->db->where('id', $this->input->post('pk'));
    $this->db->update('tbl_cancellation_policies' , array('cancellation_total_product' => $this->input->post('value')));
   
          
      
  }

  public function assignPolicy($id)
  {
      $result = array('message'=>'');
      $prefix = substr($id,0,1);
      $pid = intval(substr($id,1));
      if($this->input->post('postpolicy'))
      {
  		  $data = array(
        'booking_policy' => $this->input->post('booking_policy'),
		'cancellation_policy' => $this->input->post('cancellation_policy'),
  		);
  		$result['message'] = $this->DCpoliciesmodel->applyPolicy($prefix,$data,$pid);
      if($result['message'] == 'SUCCESS')
      {
        $base_url=base_url();
        redirect("$base_url"."DCpolicies/DCpoliciesdashboardlist");
      }
    }
    $this->load->view('template/header');
    $this->load->view('template/sidebar');
	$result['productpolicy'] = $this->DCpoliciesmodel->getproduct($prefix,$pid);
    $result['bpolicyList']=$this->DCpoliciesmodel->getBpolicy();
    $result['cpolicyList']=$this->DCpoliciesmodel->getCpolicy();
    $this->load->view('DCpolicies/applypolicy',$result);
    $this->load->view('template/footer');
}

  public function editProduct($id)
  {
    
    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    
    $this->load->view('DCpolicies/AssignProduct');
    $this->load->view('template/footer');
      
  }
  public function editProduct1($id)
  {
    
    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    
    $this->load->view('DCpolicies/AssignProductCancel');
    $this->load->view('template/footer');
      
  }
  function fetchProduct($country)
  {
      //$this->load->model('front_model');
	// $this->module = "Front/getIsland";
	 //$this->putvlog($this->session->userdata('user_type'),0,0,0,$country,0);
    
        header("Content-type: application/json; charset=utf-8");
        echo(json_encode($this->DCpoliciesmodel->fetchProduct($country)));
	  
       
        // return $cities;
  }
  function  updateProduct()
  {
      if($this->input->post('update_bookig_product'))
		{  
                    $tab = $this->input->post('tab');
                    $product_name = $this->input->post('product_name');
                    $id = $this->input->post('id');
                    $product_name1="";
                    if(isset($product_name) && is_array($product_name))
                    { 
                     $product_name1 = implode(",", $product_name); 
                    }
                    $res = 0;
                    if($tab == 'tbl_dcleisure')
                    {
                        $this->db->where('id',$id);      //var_dump($id);exit();
                        if($this->db->update('tbl_booking_policies',array('tbl_dcleisure' => $product_name1))) 
                        {
                             $res = 1;
                        }
                    }
                    else if($tab == 'tbl_dcpackage')
                    {
                        $this->db->where('id',$id);      //var_dump($id);exit();
                        if($this->db->update('tbl_booking_policies',array('tbl_dcpackage' => $product_name1))) 
                        {
                                $res = 1;
                        }
                    }
                    else
                    {
                        $this->db->where('id',$id);      //var_dump($id);exit();
                       if($this->db->update('tbl_booking_policies',array('tbl_dccourses' => $product_name1)))
                        {
                             $res = 1;
                        }
                    }
                    if($res == 1)
                    {
                       $this->load->view('template/header');
                        $this->load->view('template/sidebar');
                        $this->load->view('DCpolicies/DCpoliciesdashboard');
                        $this->load->view('template/footer');   
                    }
                }

  }
  function  updateProduct1()
  {
      if($this->input->post('update_bookig_product1'))
		{  
                    $tab = $this->input->post('tab');
                    $product_name = $this->input->post('product_name');
                    $id = $this->input->post('id');
                    $product_name1="";
                    if(isset($product_name) && is_array($product_name))
                    { 
                     $product_name1 = implode(",", $product_name); 
                    }
                    $res = 0;
                    if($tab == 'tbl_dcleisure')
                    {
                        $this->db->where('id',$id);      //var_dump($id);exit();
                        if($this->db->update('tbl_cancellation_policies',array('tbl_dcleisure' => $product_name1))) 
                        {
                             $res = 1;
                        }
                    }
                    else if($tab == 'tbl_dcpackage')
                    {
                        $this->db->where('id',$id);      //var_dump($id);exit();
                        if($this->db->update('tbl_cancellation_policies',array('tbl_dcpackage' => $product_name1))) 
                        {
                                $res = 1;
                        }
                    }
                    else
                    {
                        $this->db->where('id',$id);      //var_dump($id);exit();
                       if($this->db->update('tbl_cancellation_policies',array('tbl_dccourses' => $product_name1)))
                        {
                             $res = 1;
                        }
                    }
                    if($res == 1)
                    {
                       $this->load->view('template/header');
                        $this->load->view('template/sidebar');
                        $this->load->view('DCpolicies/DCpoliciesdashboard');
                        $this->load->view('template/footer');   
                    }
                }

  } 
  function updateProductNew()
  {
      if($this->input->post('update_bookig_product12'))
		{  
                    $tab = $this->input->post('tab');
                    $product_name = $this->input->post('product_name');
                    $booking_policy = $this->input->post('booking_no');
                    $cancellation_policy = $this->input->post('cancellation_no');
                    
                     
                    $product_name1="";
                    if(isset($product_name) && is_array($product_name))
                    { 
                     $product_name1 = implode(",", $product_name); 
                    }
                    $aaa = explode(",", $product_name1);
                    $res12=0;
                    foreach ($aaa as $row)
                    {
                        //echo "dhfvdshfv";
                        $userData = array(
                            'category' => $tab,
                            'product_id' => $row,
                             'cancellation_policy' => $cancellation_policy,
                             'booking_policy' => $booking_policy

                          );          
                        if($this->db->insert('tbl_policy_product',$userData))
                        {
                           $res12 = 1;

                        }
                    }
                    if($res12 == 1)
                    {
                         $this->load->view('template/header');
                        $this->load->view('template/sidebar');
                        $this->load->view('DCpolicies/DCpoliciesdashboard');
                        $this->load->view('template/footer'); 
                    }
                    
                }
  }
  
}
?>
