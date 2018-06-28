<?php
class SAleisure extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('SAleisuremodel');
    $this->load->helper('url');
	  $this->load->library('session');
	if (($this->session->userdata('user_type') != 'SUPERADMIN') && ($this->session->userdata('user_type') != 'CUSTOM')) {
		redirect('login');
	}
  }
  
  //**********************************************************************************************************************************************
 //                                                                   [ Dive Center Leisure Start] //***********************************************************************************************************************************************
 
  public function addNew()
  {
    $result = array('message'=>'');	
	if($this->input->post('submit_SAleisure_data'))
		{  
            //Prepare array of user data
			$productincludes1 ="";
			if($this->input->post('productincludes1') !="")
			{
				$productincludes1 = $this->input->post('productincludes1');
			}
			else
			{
				$productincludes = $this->input->post('productincludes');
				if(isset($productincludes) && is_array($productincludes))
				{ 
				$productincludes1 = implode("|", $productincludes); 
				}
			}
			
			$productexcludes1 ="";
			if($this->input->post('productexcludes1') !="")
			{
				$productexcludes1 = $this->input->post('productexcludes1');
			}
			else
			{
				$productexcludes = $this->input->post('productexcludes');
				if(isset($productexcludes) && is_array($productexcludes))
				{ 
				$productexcludes1 = implode("|", $productexcludes); 
				}
			}
			// newly added 1 Nov 2017
			$display_product_includes = "";
			if($this->input->post('display_product_includes') !="")
			{
				$display_product_includes = "TRUE";
			}
			else
			{
				$display_product_includes = "FALSE";
			}
			
			$display_product_excludes = "";
			if($this->input->post('display_product_excludes') !="")
			{
				$display_product_excludes = "TRUE";
			}
			else
			{
				$display_product_excludes = "FALSE";
			}
			//" END " newly added 1 Nov 2017
				
			$other_info_display = "";
			if($this->input->post('other_info_display') !="")
			{
				$other_info_display = "TRUE";
			}
			else
			{
				$other_info_display = "FALSE";
			}
				
			
			
			$product_keyword = $this->input->post('productkeyword');
			$product_keyword1 = "";
			if(isset($product_keyword) && is_array($product_keyword)){ $product_keyword1 = implode(",", $product_keyword); }
			
			$productinit = $this->input->post('productunits');
			$productinit1 = "";
			if(isset($productinit)) { $productinit1 = $this->input->post('productunits'); }
			
			$discount_unit = $this->input->post('dcdiscountunit');
			
			$range_start = $this->input->post('startrange');
			$range_start1 ="";
			if(isset($range_start) && is_array($range_start)){ $range_start1 = implode(",", $range_start); }
			
			$discount_bulk_purchase_amount = $this->input->post('discount_bulk_purchase_amount');
			$discount_bulk_purchase_amount1 ="";
			if(isset($discount_bulk_purchase_amount) && is_array($discount_bulk_purchase_amount)){ $discount_bulk_purchase_amount1 = implode(",", $discount_bulk_purchase_amount); }
			
			
			$range_end = $this->input->post('endrange');
			$range_end1 ="";
			if(isset($range_end) && is_array($range_end)){ $range_end1 = implode(",", $range_end); }
			
			$discount_rate = $this->input->post('field_name');
			$discount_rate1 ="";
			if(isset($discount_rate) && is_array($discount_rate)){ $discount_rate1 = implode(",", $discount_rate); }
			
			$ap_discount_unit = $this->input->post('apdiscountunit');
			$optional_services = $this->input->post('optionalservices');
			$divercertification = $this->input->post('divercertification');
			$divercertification1 ="";
			if(isset($divercertification) && is_array($divercertification)){ $divercertification1 = implode(",", $divercertification); }
			$diverexperience = $this->input->post('diverexperience');
			$diverexperience1 ="";
			if(isset($diverexperience) && is_array($diverexperience)){ $diverexperience1 = implode(",", $diverexperience); }
			$diverspecialties = $this->input->post('diverspecialties');
			$diverspecialties1 ="";
			if(isset($diverspecialties) && is_array($diverspecialties)){ $diverspecialties1 = implode(",", $diverspecialties); }
			
			$start_range = $this->input->post('applypromo_startdate');
			$date2 = str_replace('/', '-', $start_range);
			$start_date_range= date('Y-m-d', strtotime($date2));
			//$start_date_range =date("d-m-Y", strtotime($start_range));
			
			
			$end_range = $this->input->post('applypromo_enddate');
			$date1 = str_replace('/', '-', $end_range);
			$end_date_range= date('Y-m-d', strtotime($date1));
			
			
			$services = $this->input->post('services');
			$services1 ="";
			if(isset($services) && is_array($services)){
				$services1 = implode(",", $services); 
			}
			$price_of_service = $this->input->post('price_of_service');
			$price_of_service1 ="";
			if(isset($price_of_service) && is_array($price_of_service)){
				$price_of_service1 = implode(",", $price_of_service); 
			}
			$quantity_require = $this->input->post('quantity_require');
			$quantity_require1 ="";
			if(isset($quantity_require) && is_array($quantity_require)){
				$quantity_require1 = implode(",", $quantity_require); 
			}
			$displaydivercertification = "";
			if($this->input->post('displaydivercertification') !="")
			{
				$displaydivercertification = "TRUE";
			}
			else
			{
				$displaydivercertification = "FALSE";
			}
			$displaydiverexperience = "";
			if($this->input->post('displaydiverexperience') !="")
			{
				$displaydiverexperience = "TRUE";
			}
			else
			{
				$displaydiverexperience = "FALSE";
			}
			$displaydiverspecialties = "";
			if($this->input->post('displaydiverspecialties') !="")
			{
				$displaydiverspecialties = "TRUE";
			}
			else
			{
				$displaydiverspecialties = "FALSE";
			}
			$apply_promo_bulk_amt = $this->input->post('apbdl');
			$apply_promo_bulk_amt1 ="";
			if(isset($apply_promo_bulk_amt) && is_array($apply_promo_bulk_amt)){
				$apply_promo_bulk_amt1 = implode(",", $apply_promo_bulk_amt); 
			}
            $userData = array(
                'product_name' => $this->input->post('name'),
                //'dcimage' => $divecenter_picture,
                'product_description' => $this->input->post('description'),
				'product_include_display' => $display_product_includes,
                'product_includes' => $productincludes1,
				'product_exclude_display' => $display_product_excludes,
                'product_excludes' => $productexcludes1,
                //'product_include_exclude_display' => $display,
                'other_info_display' => $other_info_display,
                //'common_options' =>$commonoptions1,
                'other_info' => $this->input->post('otherinformation'),
                'product_category' => $this->input->post('productcategory'),
                'product_keyword' => $product_keyword1,
                'sequence_number' => $this->input->post('sequence_number'),
                'product_status' => $this->input->post('productstatus'),
				'product_unit' => $productinit1,
				'max_dive_day' => $this->input->post('maxdiveday'),
				'product_max_day' => $this->input->post('productmaxday'),
				'product_price' => $this->input->post('product_price'),
				
				'discount_bulk_purchase' => $this->input->post('dcdiscountpurchase'),
				'discount_unit' =>$discount_unit,
				'range_start' => $range_start1,
				'range_end' => $range_end1,
				'discount_rate' => $discount_rate1,
				'discount_bulk_purchase_amount' => $discount_bulk_purchase_amount1,

				'apply_promo' => $this->input->post('dcapplypromo'),
				'start_date' => $start_date_range,
				'end_date' => $end_date_range,
				'ap_discount_unit' => $ap_discount_unit,
				'ap_discount_rate' => $this->input->post('apdiscountrate'),
				'ap_discount_amount' => $this->input->post('afterpromo_discount'),
				'apply_promo_bulk_discount' => $this->input->post('apbulkdiscount'),
				'apb_amount' => $apply_promo_bulk_amt1,
				'optional_services' =>$this->input->post('optionalservices1'),
				
				'optional_services_service' =>$services1,
				'optional_services_price' =>$price_of_service1,
				'optional_service_qty_required' =>$quantity_require1,

				'diver_certification' => $divercertification1,
				'displaydivercertification' => $displaydivercertification,
				'diver_experience' => $diverexperience1,
				'displaydiverexperience' => $displaydiverexperience,
				'diver_specialties' => $diverspecialties1,
				'displaydiverspecialties' => $displaydiverspecialties,
				
				'user_id' => $this->session->userdata('user_id')
            );           
			//Pass user data to model
			$result['message'] = $this->SAleisuremodel->addNew($userData);
			if($result['message'] == 'SUCCESS')
			{
				$messge = array('message' => 'Product is Created successfully','class' => 'alert alert-success fade in');
				$this->session->set_flashdata('item', $messge);
				//$this->SAleisuredashboard();
				$base_url=base_url();
				redirect("$base_url"."SAleisure/SAleisuredashboard");
			}
        }
		
	//$result['currency'] = $this->SAleisuremodel->getcurrency();
	//$result['DCleisuredashboard']=$this->SAleisuremodel->DCleisurelist();
    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $this->load->view('SAdmin/SAleisure/SAleisureadd');
    $this->load->view('template/footer');
  }
  function SAleisuredashboard()
  {
	 // $data = array('message'=>'');
    $data['SAleisuredashboard']=$this->SAleisuremodel->SAleisurelist();
    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $this->load->view('SAdmin/SAleisure/SAleisuredashboard',$data);
    $this->load->view('template/footer');
  }

  
  public function edit($id)
  {
    $result = array('message'=>'');

	if($this->input->post('update_SAleisure_data'))
		{  
			$productincludes1 ="";
			if($this->input->post('productincludes1') !="")
			{
				$productincludes1 = $this->input->post('productincludes1');
			}
			else
			{
				$productincludes = $this->input->post('productincludes');
				if(isset($productincludes) && is_array($productincludes))
				{ 
				$productincludes1 = implode("|", $productincludes); 
				}
			}
			
			$productexcludes1 ="";
			if($this->input->post('productexcludes1') !="")
			{
				$productexcludes1 = $this->input->post('productexcludes1');
			}
			else
			{
				$productexcludes = $this->input->post('productexcludes');
				if(isset($productexcludes) && is_array($productexcludes))
				{ 
				$productexcludes1 = implode("|", $productexcludes); 
				}
			}
			// newly added 1 Nov 2017
			$display_product_includes = "";
			if($this->input->post('display_product_includes') !="")
			{
				$display_product_includes = "TRUE";
			}
			else
			{
				$display_product_includes = "FALSE";
			}
			
			$display_product_excludes = "";
			if($this->input->post('display_product_excludes') !="")
			{
				$display_product_excludes = "TRUE";
			}
			else
			{
				$display_product_excludes = "FALSE";
			}
			//" END " newly added 1 Nov 2017
				
			$other_info_display = "";
			if($this->input->post('other_info_display') !="")
			{
				$other_info_display = "TRUE";
			}
			else
			{
				$other_info_display = "FALSE";
			}

			$product_keyword = $this->input->post('productkeyword');
			$product_keyword1 = "";
			if(isset($product_keyword) && is_array($product_keyword)){ $product_keyword1 = implode(",", $product_keyword); }
			
			$productinit = $this->input->post('productunits');
			$productinit1 = "";
			if(isset($productinit)) { $productinit1 = $this->input->post('productunits'); }
			
			$discount_unit = $this->input->post('dcdiscountunit');
			
			$range_start = $this->input->post('startrange');
			$range_start1 ="";
			if(isset($range_start) && is_array($range_start)){ $range_start1 = implode(",", $range_start); }
			
			$discount_bulk_purchase_amount = $this->input->post('discount_bulk_purchase_amount');
			$discount_bulk_purchase_amount1 ="";
			if(isset($discount_bulk_purchase_amount) && is_array($discount_bulk_purchase_amount)){ $discount_bulk_purchase_amount1 = implode(",", $discount_bulk_purchase_amount); }
			
			
			$range_end = $this->input->post('endrange');
			$range_end1 ="";
			if(isset($range_end) && is_array($range_end)){ $range_end1 = implode(",", $range_end); }
			
			$discount_rate = $this->input->post('field_name');
			$discount_rate1 ="";
			if(isset($discount_rate) && is_array($discount_rate)){ $discount_rate1 = implode(",", $discount_rate); }
			
			$ap_discount_unit = $this->input->post('apdiscountunit');
			$optional_services = $this->input->post('optionalservices');
			$divercertification = $this->input->post('divercertification');
			$divercertification1 ="";
			if(isset($divercertification) && is_array($divercertification)){ $divercertification1 = implode(",", $divercertification); }
			$diverexperience = $this->input->post('diverexperience');
			$diverexperience1 ="";
			if(isset($diverexperience) && is_array($diverexperience)){ $diverexperience1 = implode(",", $diverexperience); }
			$diverspecialties = $this->input->post('diverspecialties');
			$diverspecialties1 ="";
			if(isset($diverspecialties) && is_array($diverspecialties)){ $diverspecialties1 = implode(",", $diverspecialties); }
			
			$start_range = $this->input->post('applypromo_startdate');
			$date2 = str_replace('/', '-', $start_range);
			$start_date_range= date('Y-m-d', strtotime($date2));
			//$start_date_range =date("d-m-Y", strtotime($start_range));
			
			
			$end_range = $this->input->post('applypromo_enddate');
			$date1 = str_replace('/', '-', $end_range);
			$end_date_range= date('Y-m-d', strtotime($date1));
			
			
			$services = $this->input->post('services');
			$services1 ="";
			if(isset($services) && is_array($services)){
				$services1 = implode(",", $services); 
			}
			$price_of_service = $this->input->post('price_of_service');
			$price_of_service1 ="";
			if(isset($price_of_service) && is_array($price_of_service)){
				$price_of_service1 = implode(",", $price_of_service); 
			}
			$quantity_require = $this->input->post('quantity_require');
			$quantity_require1 ="";
			if(isset($quantity_require) && is_array($quantity_require)){
				$quantity_require1 = implode(",", $quantity_require); 
			}
			$displaydivercertification = "";
			if($this->input->post('displaydivercertification') !="")
			{
				$displaydivercertification = "TRUE";
			}
			else
			{
				$displaydivercertification = "FALSE";
			}
			$displaydiverexperience = "";
			if($this->input->post('displaydiverexperience') !="")
			{
				$displaydiverexperience = "TRUE";
			}
			else
			{
				$displaydiverexperience = "FALSE";
			}
			$displaydiverspecialties = "";
			if($this->input->post('displaydiverspecialties') !="")
			{
				$displaydiverspecialties = "TRUE";
			}
			else
			{
				$displaydiverspecialties = "FALSE";
			}
			$apply_promo_bulk_amt = $this->input->post('apbdl');
			$apply_promo_bulk_amt1 ="";
			if(isset($apply_promo_bulk_amt) && is_array($apply_promo_bulk_amt)){
				$apply_promo_bulk_amt1 = implode(",", $apply_promo_bulk_amt); 
			}
            $userData = array(
                'product_name' => $this->input->post('name'),
                //'dcimage' => $divecenter_picture,
                'product_description' => $this->input->post('description'),
				'product_include_display' => $display_product_includes,
                'product_includes' => $productincludes1,
				'product_exclude_display' => $display_product_excludes,
                'product_excludes' => $productexcludes1,
                //'product_include_exclude_display' => $display,
                'other_info_display' => $other_info_display,
                //'common_options' =>$commonoptions1,
                'other_info' => $this->input->post('otherinformation'),
                'product_category' => $this->input->post('productcategory'),
                'product_keyword' => $product_keyword1,
                'sequence_number' => $this->input->post('sequence_number'),
                'product_status' => $this->input->post('productstatus'),
				'product_unit' => $productinit1,
				'max_dive_day' => $this->input->post('maxdiveday'),
				'product_max_day' => $this->input->post('productmaxday'),
				'product_price' => $this->input->post('product_price'),
				
				'discount_bulk_purchase' => $this->input->post('dcdiscountpurchase'),
				'discount_unit' =>$discount_unit,
				'range_start' => $range_start1,
				'range_end' => $range_end1,
				'discount_rate' => $discount_rate1,
				'discount_bulk_purchase_amount' => $discount_bulk_purchase_amount1,

				'apply_promo' => $this->input->post('dcapplypromo'),
				'start_date' => $start_date_range,
				'end_date' => $end_date_range,
				'ap_discount_unit' => $ap_discount_unit,
				'ap_discount_rate' => $this->input->post('apdiscountrate'),
				'ap_discount_amount' => $this->input->post('afterpromo_discount'),
				'apply_promo_bulk_discount' => $this->input->post('apbulkdiscount'),
				'apb_amount' => $apply_promo_bulk_amt1,
				'optional_services' =>$this->input->post('optionalservices1'),
				
				'optional_services_service' =>$services1,
				'optional_services_price' =>$price_of_service1,
				'optional_service_qty_required' =>$quantity_require1,
				
				'diver_certification' => $divercertification1,
				'displaydivercertification' => $displaydivercertification,
				'diver_experience' => $diverexperience1,
				'displaydiverexperience' => $displaydiverexperience,
				'diver_specialties' => $diverspecialties1,
				'displaydiverspecialties' => $displaydiverspecialties,
				'user_id' => $this->session->userdata('user_id')
            );         
			//Pass user data to model
			$result['message'] = $this->SAleisuremodel->updateData($userData, $id);
			if($result['message'] == 'SUCCESS')
			{
			$base_url=base_url();
			redirect("$base_url"."SAleisure/SAleisuredashboard");
			}
		}
    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $result['getEditdata']=$this->SAleisuremodel->getEditdata($id);
    $this->load->view('SAdmin/SAleisure/SAleisureupdate',$result);
    $this->load->view('template/footer');
	}
  public function delete($id)
  {
    $this->SAleisuremodel->deleteData($id);
    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $data['SAleisuredashboard']=$this->SAleisuremodel->SAleisurelist();
    $this->load->view('SAdmin/SAleisure/SAleisuredashboard',$data);
    $this->load->view('template/footer');
  }
  
  //**********************************************************************************************************************************************//
 //                                                                   [ Dive Center Leisure END] //***********************************************************************************************************************************************//
 
 
//**********************************************************************************************************************************************//
 //                                                                   [ Dive Center Keywords START] //***********************************************************************************************************************************************//
 
 public function addKeywords()
 {
	$result = array('message'=>'');
	if($this->input->post('submit_product_keywords'))
		{  
            $userData = array(
                'keywords' => $this->input->post('name')
            );          
			//Pass user data to model
			$result['message'] = $this->SAleisuremodel->addKeywords($userData);
        }
	//$result['currency'] = $this->SAleisuremodel->getcurrency();
    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $this->load->view('SAdmin/SAleisure/SAkeywordadd',$result);
    $this->load->view('template/footer');
 }
 function Keywordlist()
  {
    $data['Keywordlist']=$this->SAleisuremodel->Keywordlist();
    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $this->load->view('SAdmin/SAleisure/SAkeywordlist',$data);
    $this->load->view('template/footer');
  }
 
 public function editKeyword($id)
  {
    $result = array('message'=>'');

	if($this->input->post('Update_product_keywords'))
		{  
		$userData = array(
			'keywords' => $this->input->post('pk_name')
		);          
			//Pass user data to model
			$result['message'] = $this->SAleisuremodel->updateKeyword($userData, $id);
			if($result['message'] == 'SUCCESS')
			{
			$base_url=base_url();
			redirect("$base_url"."DCleisure/Keywordlist");
			}
		}
    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $result['getKeyword']=$this->SAleisuremodel->getKeyword($id);
    $this->load->view('SAdmin/SAleisure/SAkeywordupdate',$result);
    $this->load->view('template/footer');
	}
	
	public function deleteKeyword($id)
  {
    $this->SAleisuremodel->deleteKeyword($id);
    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $data['Keywordlist']=$this->SAleisuremodel->Keywordlist();
    $this->load->view('SAdmin/SAleisure/SAkeywordlist',$data);
    $this->load->view('template/footer');
  }
 
}
?>
