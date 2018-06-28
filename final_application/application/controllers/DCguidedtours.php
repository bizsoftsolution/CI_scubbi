<?php
class DCguidedtours extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('DCguidedtoursmodel');
    $this->load->helper('url');
	  $this->load->library('session');
	if ($this->session->userdata('user_type') != 'DCADMIN') {
		redirect('login');
	}
  }
  
  //**********************************************************************************************************************************************
 //                                                                   [ Dive Center Package Start] //***********************************************************************************************************************************************
 
  public function addNew()
  {
    $result = array('message'=>'');	
	if($this->input->post('submit_DCguidedtours_data'))
		{  
			 //Check whether user upload picture
            $files = $_FILES;
			$images = array();
			$cpt = count($_FILES['file']['name']);
			for($i=0; $i<$cpt; $i++){
			$_FILES['file']['name']= $files['file']['name'][$i];
			$_FILES['file']['type']= $files['file']['type'][$i];
			$_FILES['file']['tmp_name']= $files['file']['tmp_name'][$i];
			$_FILES['file']['error']= $files['file']['error'][$i];
			$_FILES['file']['size']= $files['file']['size'][$i];
			$config['upload_path'] = './upload/DCguidedtours/';
			$config['allowed_types'] = '*';
			$config['encrypt_name']=TRUE;
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			
			if ($this->upload->do_upload('file'))
			{
				$upload_file = $this->upload->data();
				$images[] = $upload_file['file_name'];
			}
			}
			$fileName = implode(',',$images);
			
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
			
			$discount_unit = $this->input->post('dcdiscountunit');
			$discount_unit1 ="";
			if(isset($discount_unit)){
				$discount_unit1 = $discount_unit; 
			}
			$single_room = $this->input->post('single_room');
			$twin_room = $this->input->post('twin_room');
			$three_person_room = $this->input->post('three_person_room');
			$quad_room = $this->input->post('quad_room');	
			$range_start = $this->input->post('startrange');
			$range_end = $this->input->post('endrange');
			$discount_rate = $this->input->post('field_name');
			$range_start1 ="";
			if(isset($range_start) && is_array($range_start)){
				$range_start1 = implode(",", $range_start); 
			}
			$range_end1 ="";
			if(isset($range_end) && is_array($range_end)){
				$range_end1 = implode(",", $range_end); 
			}
			$discount_rate1 ="";
			if(isset($discount_rate) && is_array($discount_rate)){
				$discount_rate1 = implode(",", $discount_rate); 
			}
			
			$ap_discount_unit = $this->input->post('apdiscountunit');
			$optional_services = $this->input->post('optionalservices1');
			
			$afacilities = $this->input->post('afacilities');
			$afacilities1 ="";
			if(isset($afacilities) && is_array($afacilities)){
				$afacilities1 = implode(",", $afacilities); 
			}
			
			$amenities = $this->input->post('amenities');
			$amenities1 ="";
			if(isset($amenities) && is_array($amenities)){
				$amenities1 = implode(",", $amenities); 
			}
			$divercertification = $this->input->post('divercertification');
			$divercertification1 ="";
			if(isset($divercertification) && is_array($divercertification)){
				$divercertification1 = implode(",", $divercertification); 
			}
			$diverexperience = $this->input->post('diverexperience');
			$diverexperience1 ="";
			if(isset($diverexperience) && is_array($diverexperience)){
				$diverexperience1 = implode(",", $diverexperience); 
			}
			$diverspecialties = $this->input->post('diverspecialties');
			$diverspecialties1 ="";
			if(isset($diverspecialties) && is_array($diverspecialties)){
				$diverspecialties1 = implode(",", $diverspecialties); 
			}
			$divesites = $this->input->post('divesites');
			$divesites1 ="";
			if(isset($divesites) && is_array($divesites)){
				$divesites1 = implode(",", $divesites); 
			}
			
			$start_range_bp = $this->input->post('bpdatestart');
			$date1 = str_replace('/', '-', $start_range_bp);
			$start_range= date('Y-m-d', strtotime($date1));
			
			$end_range_bp = $this->input->post('bpdateend');
			$date2 = str_replace('/', '-', $end_range_bp);
			$end_range= date('Y-m-d', strtotime($date2));
			
			$start_range_tp = $this->input->post('tpdatestart');
			$date3 = str_replace('/', '-', $start_range_tp);
			$start_range1= date('Y-m-d', strtotime($date3));
			
			$end_range_tp = $this->input->post('tpdateend');
			$date4 = str_replace('/', '-', $end_range_tp);
			$end_range1= date('Y-m-d', strtotime($date4));
			
			$start_range_ap = $this->input->post('applypromo_startdate');
			$date5 = str_replace('/', '-', $start_range_ap);
			$start_range3= date('Y-m-d', strtotime($date5));
			
			$end_range_ap = $this->input->post('applypromo_enddate');
			$date6 = str_replace('/', '-', $end_range_ap);
			$end_range3= date('Y-m-d', strtotime($date6));
			
			$product_keyword = $this->input->post('productkeyword');
			$product_keyword1 ="";
			if(isset($product_keyword) && is_array($product_keyword)){
				$product_keyword1 = implode(",", $product_keyword); 
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

			$apply_discount_nr = $this->input->post('text1');
			$apply_discount_nr1 ="";
			if(isset($apply_discount_nr) && is_array($apply_discount_nr)){
				$apply_discount_nr1 = implode(",", $apply_discount_nr); 
			}
			$apply_discount_wr = $this->input->post('text2');
			$apply_discount_wr1 ="";
			if(isset($apply_discount_wr) && is_array($apply_discount_wr)){
				$apply_discount_wr1 = implode(",", $apply_discount_wr); 
			}
			$apply_discount_psr = $this->input->post('text3');
			$apply_discount_psr1 ="";
			if(isset($apply_discount_psr) && is_array($apply_discount_psr)){
				$apply_discount_psr1 = implode(",", $apply_discount_psr); 
			}
			$apply_discount_spsr = $this->input->post('text4');
			$apply_discount_spsr1 ="";
			if(isset($apply_discount_spsr) && is_array($apply_discount_spsr)){
				$apply_discount_spsr1 = implode(",", $apply_discount_spsr); 
			}
			
			// apply promo bulk discount start

			$apply_promo_bulk_nr = $this->input->post('apbd1');
			$apply_promo_bulk_nr1 ="";
			if(isset($apply_promo_bulk_nr) && is_array($apply_promo_bulk_nr)){
				$apply_promo_bulk_nr1 = implode(",", $apply_promo_bulk_nr); 
			}
			$apply_promo_bulk_wr = $this->input->post('apbd2');
			$apply_promo_bulk_wr1 ="";
			if(isset($apply_promo_bulk_wr) && is_array($apply_promo_bulk_wr)){
				$apply_promo_bulk_wr1 = implode(",", $apply_promo_bulk_wr); 
			}
			$apply_promo_bulk_psr = $this->input->post('apbd3');
			$apply_promo_bulk_psr1 ="";
			if(isset($apply_promo_bulk_psr) && is_array($apply_promo_bulk_psr)){
				$apply_promo_bulk_psr1 = implode(",", $apply_promo_bulk_psr); 
			}
			$apply_promo_bulk_spsr = $this->input->post('apbd4');
			$apply_promo_bulk_spsr1 ="";
			if(isset($apply_promo_bulk_spsr) && is_array($apply_promo_bulk_spsr)){
				$apply_promo_bulk_spsr1 = implode(",", $apply_promo_bulk_spsr); 
			}
			
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
			$actype = "";
			if($this->input->post('actype1') !="")
			{
				$actype = $this->input->post('actype1');
			}
			else
			{
				$actype = $this->input->post('actype');
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
               'booking_period_start_date' => $start_range,				
                'booking_period_end_date' => $end_range,				
                'travel_period_start_date' => $start_range1,				
                'travel_period_end_date' => $end_range1,
                'sequence_number' => $this->input->post('sequence_number'),
                'product_status' => $this->input->post('productstatus'),
				'product_unit' => $this->input->post('productunits'),
				'product_max_day' => $this->input->post('productmaxday'),			
				'single_room' => $single_room,
				'twin_room' => $twin_room,
				'three_person_room' =>$three_person_room,
				'quad_room' => $quad_room,			
				'discount_bulk_purchase' => $this->input->post('dcdiscountpurchase'),			
				'discount_unit' =>$discount_unit1,
				'range_start' => $range_start1,
				'range_end' => $range_end1,
				'discount_rate' => $discount_rate1,
				'apply_discount_sr'=>$apply_discount_nr1,
				'apply_discount_tr'=>$apply_discount_wr1,
				'apply_discount_tpr'=>$apply_discount_psr1,
				'apply_discount_qr'=>$apply_discount_spsr1,
				'apply_promo' => $this->input->post('dcapplypromo'),
				'start_date' => $start_range3,
				'end_date' => $end_range3,
				'ap_discount_unit' => $ap_discount_unit,
				'ap_discount_rate' => $this->input->post('apdiscountrate'),
				'apply_promo_sr'=>$this->input->post('text9'),
				'apply_promo_tr'=>$this->input->post('text10'),
				'apply_promo_tpr'=>$this->input->post('text11'),
				'apply_promo_qr'=>$this->input->post('text12'),
				'apply_promo_bilk_discount' => $this->input->post('apbulkdiscount'),
				'apply_promo_bulk_sr' => $apply_promo_bulk_nr1,
				'apply_promo_bulk_tr' => $apply_promo_bulk_wr1,
				'apply_promo_bulk_tpr' => $apply_promo_bulk_psr1,
				'apply_promo_bulk_qr' => $apply_promo_bulk_spsr1,
				
				'optional_services' => implode(",", (array)$optional_services),
				'optional_services_service' =>$services1,
				'optional_services_price' =>$price_of_service1,
				'optional_service_qty_required' =>$quantity_require1,
				
				'displayaccommodation' =>$this->input->post('accommodation_display'),
				
				'accomodation_name' => $this->input->post('accomodation_name'),
				'oneperson_bed_type' => $this->input->post('1person_bed_type'),
				'twoperson_bed_type' => $this->input->post('2person_bed_type'),
				'threeperson_bed_type' => $this->input->post('3person_bed_type'),
				'fourperson_bed_type' => $this->input->post('4person_bed_type'),
				'checkintime' => $this->input->post('checkintime'),
				'checkouttime' => $this->input->post('checkouttime'),
				'actype' => $actype,
				'amenities' => $amenities1,
				'accommodation_facilities' => $afacilities1,

				'diver_certification' => $divercertification1,
				'displaydivercertification' => $displaydivercertification,
				'diver_experience' => $diverexperience1,
				'displaydiverexperience' => $displaydiverexperience,
				'diver_specialties' => $diverspecialties1,
				'displaydiverspecialties' => $displaydiverspecialties,
				
				'country' => $this->input->post('dive_center_country'),
				'island' => $this->input->post('dive_center_island'),
				'gpsx' => $this->input->post('gpsx'),
				'gpsy' => $this->input->post('gpsy'),
				'dive_sites' => $divesites1,
				'photo' => $fileName,
				'modified' => date("Y-m-d H:i:s"),		
				'user_id' => $this->session->userdata('user_id')
            );          
			//Pass user data to model
			$result['message'] = $this->DCguidedtoursmodel->addNew($userData);
			if($result['message'] == 'SUCCESS')
			{
				$messge = array('message' => 'Product is Created successfully','class' => 'alert alert-success fade in');
				$this->session->set_flashdata('item', $messge);
				//$this->SAleisuredashboard();
				$base_url=base_url();
				redirect("$base_url"."DCguidedtours/DCguidedtourslist");
			}
        }
	//$result['currency'] = $this->DCleisuremodel->getcurrency();
    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $this->load->view('DCguidedtours/DCguidedtoursadd',$result);
    $this->load->view('template/footer');
  }
  function DCguidedtourslist()
  {
    $data['DCguidedtourslist']=$this->DCguidedtoursmodel->DCguidedtourslist();
    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $this->load->view('DCguidedtours/DCguidedtourslist',$data);
    $this->load->view('template/footer');
  }

  public function edit($id)
  {
    $result = array('message'=>'');
	
//	echo("Photo:" . $this->input->post('gallery'));
	
	if($this->input->post('Update_DCguidedtours_Data'))
		{  
			//Prepare array of user data
			//$commonoptions = $this->input->post('commonoptions');
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
			$afacilities = $this->input->post('afacilities');
			$afacilities1 ="";
			if(isset($afacilities) && is_array($afacilities)){
				$afacilities1 = implode(",", $afacilities); 
			}
			$discount_unit = $this->input->post('dcdiscountunit');
			$discount_unit1 ="";
			if(isset($discount_unit)&& is_array($discount_unit)){
				$discount_unit1 = $discount_unit; 
			}
			
			//$discount_unit = $this->input->post('dcdiscountunit');
			$single_room = $this->input->post('single_room');
			$twin_room = $this->input->post('twin_room');
			$three_person_room = $this->input->post('three_person_room');
			$quad_room = $this->input->post('quad_room');		
			//$discount_unit = $this->input->post('dcdiscountunit');		
			$range_start = $this->input->post('startrange');
			$range_end = $this->input->post('endrange');
			$discount_rate = $this->input->post('field_name');
			//$range_start1 ="";
			if(isset($range_start) && is_array($range_start)){
				$range_start1 = implode(",", $range_start); 
			}
			//$range_end1 ="";
			if(isset($range_end) && is_array($range_end)){
				$range_end1 = implode(",", $range_end); 
			}
			//$discount_rate1 ="";
			if(isset($discount_rate) && is_array($discount_rate)){
				$discount_rate1 = implode(",", $discount_rate); 
			}
			$amenities = $this->input->post('amenities');
			$amenities1 ="";
			if(isset($amenities) && is_array($amenities)){
				$amenities1 = implode(",", $amenities); 
			}
			$ap_discount_unit = $this->input->post('apdiscountunit');
			$optional_services = $this->input->post('optionalservices1');
			
			$divercertification = $this->input->post('divercertification');
			$divercertification1 ="";
			if(isset($divercertification) && is_array($divercertification)){
				$divercertification1 = implode(",", $divercertification); 
			}
			$diverexperience = $this->input->post('diverexperience');
			$diverexperience1 ="";
			if(isset($diverexperience) && is_array($diverexperience)){
				$diverexperience1 = implode(",", $diverexperience); 
			}
			$diverspecialties = $this->input->post('diverspecialties');
			$diverspecialties1 ="";
			if(isset($diverspecialties) && is_array($diverspecialties)){
				$diverspecialties1 = implode(",", $diverspecialties); 
			}

			$divesites = $this->input->post('divesites');	
				
			$start_range_bp = $this->input->post('bpdatestart');
			$date1 = str_replace('/', '-', $start_range_bp);
			$start_range= date('Y-m-d', strtotime($date1));
			
			$end_range_bp = $this->input->post('bpdateend');
			$date2 = str_replace('/', '-', $end_range_bp);
			$end_range= date('Y-m-d', strtotime($date2));
			
			$start_range_tp = $this->input->post('tpdatestart');
			$date3 = str_replace('/', '-', $start_range_tp);
			$start_range1= date('Y-m-d', strtotime($date3));
			
			$end_range_tp = $this->input->post('tpdateend');
			$date4 = str_replace('/', '-', $end_range_tp);
			$end_range1= date('Y-m-d', strtotime($date4));
			
			$start_range_ap = $this->input->post('applypromo_startdate');
			$date5 = str_replace('/', '-', $start_range_ap);
			$start_range3= date('Y-m-d', strtotime($date5));
			
			$end_range_ap = $this->input->post('applypromo_enddate');
			$date6 = str_replace('/', '-', $end_range_ap);
			$end_range3= date('Y-m-d', strtotime($date6));
				
			
			$files = $_FILES;
			$images = array();
			$cpt = count($_FILES['file']['name']);
			for($i=0; $i<$cpt; $i++){
			$_FILES['file']['name']= $files['file']['name'][$i];
			$_FILES['file']['type']= $files['file']['type'][$i];
			$_FILES['file']['tmp_name']= $files['file']['tmp_name'][$i];
			$_FILES['file']['error']= $files['file']['error'][$i];
			$_FILES['file']['size']= $files['file']['size'][$i];
			$config['upload_path'] = './upload/DCguidedtours/';
			$config['allowed_types'] = '*';
			$config['encrypt_name']=TRUE;
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			
			if ($this->upload->do_upload('file'))
			{
				$upload_file = $this->upload->data();
				$images[] = $upload_file['file_name'];
			}
			}
			
			$fileName = implode(',',$images);
			$already_get_img = $this->input->post('already_img');
			$fileName1 = implode(',',$already_get_img);
			$fileName2 = $fileName.','.$fileName1;
			
			$product_keyword = $this->input->post('productkeyword');
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
			
			$apply_discount_nr = $this->input->post('text1');
			$apply_discount_nr1 ="";
			if(isset($apply_discount_nr) && is_array($apply_discount_nr)){
				$apply_discount_nr1 = implode(",", $apply_discount_nr); 
			}
			$apply_discount_wr = $this->input->post('text2');
			$apply_discount_wr1 ="";
			if(isset($apply_discount_wr) && is_array($apply_discount_wr)){
				$apply_discount_wr1 = implode(",", $apply_discount_wr); 
			}
			$apply_discount_psr = $this->input->post('text3');
			$apply_discount_psr1 ="";
			if(isset($apply_discount_psr) && is_array($apply_discount_psr)){
				$apply_discount_psr1 = implode(",", $apply_discount_psr); 
			}
			$apply_discount_spsr = $this->input->post('text4');
			$apply_discount_spsr1 ="";
			if(isset($apply_discount_spsr) && is_array($apply_discount_spsr)){
				$apply_discount_spsr1 = implode(",", $apply_discount_spsr); 
			}
			
			// apply promo bulk discount start

			$apply_promo_bulk_nr = $this->input->post('apbd1');
			$apply_promo_bulk_nr1 ="";
			if(isset($apply_promo_bulk_nr) && is_array($apply_promo_bulk_nr)){
				$apply_promo_bulk_nr1 = implode(",", $apply_promo_bulk_nr); 
			}
			$apply_promo_bulk_wr = $this->input->post('apbd2');
			$apply_promo_bulk_wr1 ="";
			if(isset($apply_promo_bulk_wr) && is_array($apply_promo_bulk_wr)){
				$apply_promo_bulk_wr1 = implode(",", $apply_promo_bulk_wr); 
			}
			$apply_promo_bulk_psr = $this->input->post('apbd3');
			$apply_promo_bulk_psr1 ="";
			if(isset($apply_promo_bulk_psr) && is_array($apply_promo_bulk_psr)){
				$apply_promo_bulk_psr1 = implode(",", $apply_promo_bulk_psr); 
			}
			$apply_promo_bulk_spsr = $this->input->post('apbd4');
			$apply_promo_bulk_spsr1 ="";
			if(isset($apply_promo_bulk_spsr) && is_array($apply_promo_bulk_spsr)){
				$apply_promo_bulk_spsr1 = implode(",", $apply_promo_bulk_spsr); 
			}
			
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
			$actype = "";
			if($this->input->post('actype1') !="")
			{
				$actype = $this->input->post('actype1');
			}
			else
			{
				$actype = $this->input->post('actype');
			}
			
            $userData = array(
                'product_name' => $this->input->post('product_name'),
                //'dcimage' => $divecenter_picture,
                'product_description' => $this->input->post('description'),
				'product_include_display' => $display_product_includes,
                'product_includes' => $productincludes1,
				'product_exclude_display' => $display_product_excludes,
                'product_excludes' => $productexcludes1,
                //'common_options' => implode(",", $commonoptions), 
                'other_info_display' => $other_info_display,
				'other_info' => $this->input->post('otherinformation'),
                'product_category' => $this->input->post('productcategory'),
                'product_keyword' => implode("",(array)$product_keyword),			
                'booking_period_start_date' => $start_range,				
                'booking_period_end_date' => $end_range,				
                'travel_period_start_date' => $start_range1,				
                'travel_period_end_date' => $end_range1,
                'sequence_number' => $this->input->post('sequence_number'),
                'product_status' => $this->input->post('productstatus'),
				'product_unit' => $this->input->post('productunits'),
				'product_max_day' => $this->input->post('productmaxday'),
				'single_room' => $single_room,
				'twin_room' => $twin_room,
				'three_person_room' => $three_person_room,
				'quad_room' => $quad_room,			
				'discount_bulk_purchase' => $this->input->post('dcdiscountpurchase'),			
				'discount_unit' => $discount_unit1,
				'range_start' => $range_start1,
				'range_end' => $range_end1,
				'discount_rate' => $discount_rate1,
				'apply_discount_sr'=>$apply_discount_nr1,
				'apply_discount_tr'=>$apply_discount_wr1,
				'apply_discount_tpr'=>$apply_discount_psr1,
				'apply_discount_qr'=>$apply_discount_spsr1,
				'apply_promo' => $this->input->post('dcapplypromo'),
				'start_date' => $start_range3,
				'end_date' => $end_range3,
				'ap_discount_unit' => implode(",", (array)$ap_discount_unit),
				'ap_discount_rate' => $this->input->post('apdiscountrate'),
				'apply_promo_sr'=>$this->input->post('text9'),
				'apply_promo_tr'=>$this->input->post('text10'),
				'apply_promo_tpr'=>$this->input->post('text11'),
				'apply_promo_qr'=>$this->input->post('text12'),
				'apply_promo_bilk_discount' => $this->input->post('apbulkdiscount'),
				'apply_promo_bulk_sr' => $apply_promo_bulk_nr1,
				'apply_promo_bulk_tr' => $apply_promo_bulk_wr1,
				'apply_promo_bulk_tpr' => $apply_promo_bulk_psr1,
				'apply_promo_bulk_qr' => $apply_promo_bulk_spsr1,
				
				'optional_services' => implode(",", (array)$optional_services),
				'optional_services_service' =>$services1,
				'optional_services_price' =>$price_of_service1,
				'optional_service_qty_required' =>$quantity_require1,
				
				'displayaccommodation' =>$this->input->post('accommodation_display'),
				'accomodation_name' => $this->input->post('accomodation_name'),
				'oneperson_bed_type' => $this->input->post('1person_bed_type'),
				'twoperson_bed_type' => $this->input->post('2person_bed_type'),
				'threeperson_bed_type' => $this->input->post('3person_bed_type'),
				'fourperson_bed_type' => $this->input->post('4person_bed_type'),
				'checkintime' => $this->input->post('checkintime'),
				'checkouttime' => $this->input->post('checkouttime'),
				'actype' => $actype,
				'amenities' => $amenities1,
				'accommodation_facilities' => $afacilities1,
				
				'diver_certification' => $divercertification1,
				'displaydivercertification' => $displaydivercertification,
				'diver_experience' => $diverexperience1,
				'displaydiverexperience' => $displaydiverexperience,
				'diver_specialties' => $diverspecialties1,
				'displaydiverspecialties' => $displaydiverspecialties,
				
				'country' => $this->input->post('edit_dive_center_country'),
				'island' => $this->input->post('edit_dive_center_island'),
				'gpsx' => $this->input->post('gpsx'),
				'gpsy' => $this->input->post('gpsy'),
				'dive_sites' => implode(",", (array)$divesites),
				'photo' => $fileName2,
				'modified' => date("Y-m-d H:i:s"),		
				'user_id' => $this->session->userdata('user_id')
            );                    
			//Pass user data to model
			$result['message'] = $this->DCguidedtoursmodel->updateData($userData, $id);
			if($result['message'] == 'SUCCESS')
			{
				$messge = array('message' => 'Product is Updated successfully','class' => 'alert alert-success fade in');
				$this->session->set_flashdata('item', $messge);
				//$this->SAleisuredashboard();
				$base_url=base_url();
				redirect("$base_url"."DCguidedtours/DCguidedtourslist");
			}
		}
		if($this->input->post('Update_DCguidedtours_Image_Data'))
		{
			 //Check whether user upload picture
            if(!empty($_FILES['gallery']['name'])){
                $config['upload_path'] = './upload/DCguidedtours/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['file_name'] = $_FILES['gallery']['name'];
                
                //Load upload library and initialize configuration
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                
                if($this->upload->do_upload('gallery')){
                    $uploadData = $this->upload->data();
                    $divecenter_picture = $uploadData['file_name'];
                }else{
                    $divecenter_picture = '';
                }
            }else{
                $divecenter_picture = '';
            }
			 $userData = array(
                'photo' => $divecenter_picture
				);
			//Pass user data to model
			$result['message'] = $this->DCguidedtoursmodel->updateData($userData, $id);
			if($result['message'] == 'SUCCESS')
			{
				$messge = array('message' => 'Product is Updated successfully','class' => 'alert alert-success fade in');
				$this->session->set_flashdata('item', $messge);
				//$this->SAleisuredashboard();
				$base_url=base_url();
				redirect("$base_url"."DCguidedtours/DCguidedtourslist");
			}
		}
    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $result['getEditdata']=$this->DCguidedtoursmodel->getEditdata($id);
    $this->load->view('DCguidedtours/DCguidedtoursupdate',$result);
    $this->load->view('template/footer');
	}
  public function delete($id)
  {
    $this->DCguidedtoursmodel->deleteData($id);
    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $data['DCguidedtourslist']=$this->DCguidedtoursmodel->DCguidedtourslist();
    $this->load->view('DCguidedtours/DCguidedtourslist',$data);
    $this->load->view('template/footer');
  }
  function enableProduct($id)
 {
     $this->db->where('id',$id);
     if($this->db->update('tbl_dcguidedtours',array('status' => 'ENABLE')))
     {
		$data['DCguidedtourslist']=$this->DCguidedtoursmodel->DCguidedtourslist();
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('DCguidedtours/DCguidedtourslist',$data);
		$this->load->view('template/footer');
     }
     
 }
  //**********************************************************************************************************************************************//
 //                                                                   [ Dive Center Leisure END] //***********************************************************************************************************************************************//
 
}
?>
