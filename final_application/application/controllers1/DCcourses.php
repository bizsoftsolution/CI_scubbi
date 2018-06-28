<?php
class DCcourses extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('DCcoursesmodel');
    $this->load->helper('url');
	  $this->load->library('session');
	
	if ($this->session->userdata('user_type') != 'DCADMIN') {
		redirect('login');
	}
  }
  
  //**********************************************************************************************************************************************
 //                                                                   [ Dive Center Profile Start] //***********************************************************************************************************************************************
 
  public function addNew()
  {
    $result = array('message'=>'');	
	if($this->input->post('submit_DCcourses_data'))
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
			
			
			$discount_unit = $this->input->post('dcdiscountunit');
			$range_start = $this->input->post('startrange');
			$range_end = $this->input->post('endrange');
			$discount_rate = $this->input->post('field_name');
			$ap_discount_unit = $this->input->post('apdiscountunit');
			
			$afacilities = $this->input->post('afacilities');
			$afacilities1 ="";
			if(isset($afacilities) && is_array($afacilities)){
				$afacilities1 = implode(",", $afacilities); 
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
			
			$start_range = $this->input->post('applypromo_startdate');
			$date2 = str_replace('/', '-', $start_range);
			$start_date_range= date('Y-m-d', strtotime($date2));
			//$start_date_range =date("d-m-Y", strtotime($start_range));
			
			$end_range = $this->input->post('applypromo_enddate');
			$date1 = str_replace('/', '-', $end_range);
			$end_date_range= date('Y-m-d', strtotime($date1));
			
			$product_keyword = $this->input->post('productkeyword');
			$product_keyword1 ="";
			if(isset($product_keyword) && is_array($product_keyword)){
				$product_keyword1 = implode(",", $product_keyword); 
			}
			
			// newfeatcures 
			$product_inclusive_accomodation_single = $this->input->post('product_inclusive_accomodation_single');
			$product_inclusive_accomodation_single1 ="";
			if(isset($product_inclusive_accomodation_single) && is_array($product_inclusive_accomodation_single)){
				$product_inclusive_accomodation_single1 = implode(",", $product_inclusive_accomodation_single); 
			}
			$product_inclusive_accomodation_twin = $this->input->post('product_inclusive_accomodation_twin');
			$product_inclusive_accomodation_twin1 ="";
			if(isset($product_inclusive_accomodation_twin) && is_array($product_inclusive_accomodation_twin)){
				$product_inclusive_accomodation_twin1 = implode(",", $product_inclusive_accomodation_twin); 
			}
			$product_inclusive_accomodation_threeperson = $this->input->post('product_inclusive_accomodation_threeperson');
			$product_inclusive_accomodation_threeperson1 ="";
			if(isset($product_inclusive_accomodation_threeperson) && is_array($product_inclusive_accomodation_threeperson)){
				$product_inclusive_accomodation_threeperson1 = implode(",", $product_inclusive_accomodation_threeperson); 
			}
			$product_inclusive_accomodation_quad = $this->input->post('product_inclusive_accomodation_quad');
			$product_inclusive_accomodation_quad1 ="";
			if(isset($product_inclusive_accomodation_quad) && is_array($product_inclusive_accomodation_quad)){
				$product_inclusive_accomodation_quad1 = implode(",", $product_inclusive_accomodation_quad); 
			}
			$custom_room = $this->input->post('custom_room');
			$custom_room1 ="";
			if(isset($custom_room) && is_array($custom_room)){
				$custom_room1 = implode(",", $custom_room); 
			}
			
			$accommodation_extension_single = $this->input->post('accommodation_extension_single');
			$accommodation_extension_single1 ="";
			if(isset($accommodation_extension_single) && is_array($accommodation_extension_single)){
				$accommodation_extension_single1 = implode(",", $accommodation_extension_single); 
			}
			$accommodation_extension_twin = $this->input->post('accommodation_extension_twin');
			$accommodation_extension_twin1 ="";
			if(isset($accommodation_extension_twin) && is_array($accommodation_extension_twin)){
				$accommodation_extension_twin1 = implode(",", $accommodation_extension_twin); 
			}
			$accommodation_extension_threeperson = $this->input->post('accommodation_extension_threeperson');
			$accommodation_extension_threeperson1 ="";
			if(isset($accommodation_extension_threeperson) && is_array($accommodation_extension_threeperson)){
				$accommodation_extension_threeperson1 = implode(",", $accommodation_extension_threeperson); 
			}
			$accommodation_extension_quad = $this->input->post('accommodation_extension_quad');
			$accommodation_extension_quad1 ="";
			if(isset($accommodation_extension_quad) && is_array($accommodation_extension_quad)){
				$accommodation_extension_quad1 = implode(",", $accommodation_extension_quad); 
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
			$amenities = $this->input->post('amenities');
			$amenities1 ="";
			if(isset($amenities) && is_array($amenities)){
				$amenities1 = implode(",", $amenities); 
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
			$apply_discount_single_room = $this->input->post('text5');
			$apply_discount_single_room1 ="";
			if(isset($apply_discount_single_room) && is_array($apply_discount_single_room)){
				$apply_discount_single_room1 = implode(",", $apply_discount_single_room); 
			}
			$apply_discount_twin_room = $this->input->post('text6');
			$apply_discount_twin_room1 ="";
			if(isset($apply_discount_twin_room) && is_array($apply_discount_twin_room)){
				$apply_discount_twin_room1 = implode(",", $apply_discount_twin_room); 
			}
			$apply_discount_three_person_room = $this->input->post('text7');
			$apply_discount_three_person_room1 ="";
			if(isset($apply_discount_three_person_room) && is_array($apply_discount_three_person_room)){
				$apply_discount_three_person_room1 = implode(",", $apply_discount_three_person_room); 
			}
			$apply_discount_quad_room = $this->input->post('text8');
			$apply_discount_quad_room1 ="";
			if(isset($apply_discount_quad_room) && is_array($apply_discount_quad_room)){
				$apply_discount_quad_room1 = implode(",", $apply_discount_quad_room); 
			}
			$apply_discount_custom_room = $this->input->post('text18');
			$apply_discount_custom_room1 ="";
			if(isset($apply_discount_custom_room) && is_array($apply_discount_custom_room)){
				$apply_discount_custom_room1 = implode(",", $apply_discount_custom_room); 
			}
			$apply_promo_single_room = $this->input->post('text13');
			$apply_promo_single_room1 ="";
			if(isset($apply_promo_single_room) && is_array($apply_promo_single_room)){
				$apply_promo_single_room1 = implode(",", $apply_promo_single_room); 
			}
			$apply_promo_twin_room = $this->input->post('text14');
			$apply_promo_twin_room1 ="";
			if(isset($apply_promo_twin_room) && is_array($apply_promo_twin_room)){
				$apply_promo_twin_room1 = implode(",", $apply_promo_twin_room); 
			}
			$apply_promo_three_person_room = $this->input->post('text15');
			$apply_promo_three_person_room1 ="";
			if(isset($apply_promo_three_person_room) && is_array($apply_promo_three_person_room)){
				$apply_promo_three_person_room1 = implode(",", $apply_promo_three_person_room); 
			}
			$apply_promo_quad_room = $this->input->post('text16');
			$apply_promo_quad_room1 ="";
			if(isset($apply_promo_quad_room) && is_array($apply_promo_quad_room)){
				$apply_promo_quad_room1 = implode(",", $apply_promo_quad_room); 
			}
			$apply_promo_custom_room = $this->input->post('text17');
			$apply_promo_custom_room1 ="";
			if(isset($apply_promo_custom_room) && is_array($apply_promo_custom_room)){
				$apply_promo_custom_room1 = implode(",", $apply_promo_custom_room); 
			}
			
			$apply_promo="";
		if(!empty($this->input->post('dcapplypromo')))
		{
			$apply_promo = $this->input->post('dcapplypromo');
		}
		$apbulkdiscount="";
		if(!empty($this->input->post('apbulkdiscount')))
		{
			$apbulkdiscount = $this->input->post('apbulkdiscount');
		}
		
		$optional_services="";
		if(!empty($this->input->post('optionalservices1')))
		{
			$optional_services = $this->input->post('optionalservices1');
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
			$apply_promo_bulk_single_room = $this->input->post('apbd5');
			$apply_promo_bulk_single_room1 ="";
			if(isset($apply_promo_bulk_single_room) && is_array($apply_promo_bulk_single_room)){
				$apply_promo_bulk_single_room1 = implode(",", $apply_promo_bulk_single_room); 
			}
			$apply_promo_bulk_twin_room = $this->input->post('apbd6');
			$apply_promo_bulk_twin_room1 ="";
			if(isset($apply_promo_bulk_twin_room) && is_array($apply_promo_bulk_twin_room)){
				$apply_promo_bulk_twin_room1 = implode(",", $apply_promo_bulk_twin_room); 
			}
			$apply_promo_bulk_three_person_room = $this->input->post('apbd7');
			$apply_promo_bulk_three_person_room1 ="";
			if(isset($apply_promo_bulk_three_person_room) && is_array($apply_promo_bulk_three_person_room)){
				$apply_promo_bulk_three_person_room1 = implode(",", $apply_promo_bulk_three_person_room); 
			}
			$apply_promo_bulk_quad_room = $this->input->post('apbd8');
			$apply_promo_bulk_quad_room1 ="";
			if(isset($apply_promo_bulk_quad_room) && is_array($apply_promo_bulk_quad_room)){
				$apply_promo_bulk_quad_room1 = implode(",", $apply_promo_bulk_quad_room); 
			}
			$apply_promo_bulk_custom_room = $this->input->post('apbd9');
			$apply_promo_bulk_custom_room1 ="";
			if(isset($apply_promo_bulk_custom_room) && is_array($apply_promo_bulk_custom_room)){
				$apply_promo_bulk_custom_room1 = implode(",", $apply_promo_bulk_custom_room); 
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
                'sequence_number' => $this->input->post('sequence_number'),
                'product_status' => $this->input->post('productstatus'),
				'product_unit' => $this->input->post('productunits'),
				'max_dive_day' => $this->input->post('maxdiveday'),
				'product_max_day' => $this->input->post('productmaxday'),
				
				'product_normal_rate' => $this->input->post('product_normal_price'),
				'product_weekend_rate' => $this->input->post('product_weekend_price'),
				'product_peakseason_rate' =>$this->input->post('product_peakseason_price'),
				'product_superpeak_rate' =>$this->input->post('product_super_peakseason_price'),
				'product_inclusive_accomodation' =>$this->input->post('dcinclusiveaccomodation'),
				'product_inclusive_accomodation_single' =>$product_inclusive_accomodation_single1,
				'product_inclusive_accomodation_twin' =>$product_inclusive_accomodation_twin1,
				'product_inclusive_accomodation_3person' =>$product_inclusive_accomodation_threeperson1,
				'product_inclusive_accomodation_quad' =>$product_inclusive_accomodation_quad1,
				'custom_room' =>$custom_room1,
				'accomodation_extension' =>$this->input->post('dcaccommodationextension'),
				'accomodation_extension_single' =>$accommodation_extension_single1,
				'accomodation_extension_twin' =>$accommodation_extension_twin1,
				'accomodation_extension_3person' =>$accommodation_extension_threeperson1,
				'accomodation_extension_quad' =>$accommodation_extension_quad1,
				
				'discount_bulk_purchase' => $this->input->post('dcdiscountpurchase'),
				'discount_unit' =>$discount_unit,
				'range_start' => implode(",", $range_start),
				'range_end' => implode(",", $range_end),
				'discount_rate' => implode(",", $discount_rate),
				'apply_discount_nr'=>$apply_discount_nr1,
				'apply_discount_wr'=>$apply_discount_wr1,
				'apply_discount_psr'=>$apply_discount_psr1,
				'apply_discount_spsr'=>$apply_discount_spsr1,
				'apply_discount_single_room'=>$apply_discount_single_room1,
				'apply_discount_twin_room'=>$apply_discount_twin_room1,
				'apply_discount_three_person_room'=>$apply_discount_three_person_room1,
				'apply_discount_quad_room'=>$apply_discount_quad_room1,
				'apply_discount_custom_room'=>$apply_discount_custom_room1,
				'apply_promo' => $apply_promo,
				'start_date' => $start_date_range,
				'end_date' => $end_date_range,
				'ap_discount_unit' =>$ap_discount_unit,
				'ap_discount_rate' => $this->input->post('apdiscountrate'),
				'apply_promo_nr'=>$this->input->post('text9'),
				'apply_promo_wr'=>$this->input->post('text10'),
				'apply_promo_psr'=>$this->input->post('text11'),
				'apply_promo_spsr'=>$this->input->post('text12'),
				'apply_promo_single_room'=>$apply_promo_single_room1,
				'apply_promo_twin_room'=>$apply_promo_twin_room1,
				'apply_promo_three_person_room'=>$apply_promo_three_person_room1,
				'apply_promo_quad_room'=>$apply_promo_quad_room1,
				'apply_promo_custom_room'=>$apply_promo_custom_room1,
				'apply_promo_bilk_discount' => $apbulkdiscount,
				'apply_promo_bulk_nr' => $apply_promo_bulk_nr1,
				'apply_promo_bulk_wr' => $apply_promo_bulk_wr1,
				'apply_promo_bulk_psr' => $apply_promo_bulk_psr1,
				'apply_promo_bulk_spsr' => $apply_promo_bulk_spsr1,
				'apply_promo_bulk_single_room' => $apply_promo_bulk_single_room1,
				'apply_promo_bulk_twin_room' => $apply_promo_bulk_twin_room1,
				'apply_promo_bulk_three_person_room' => $apply_promo_bulk_three_person_room1,
				'apply_promo_bulk_quad_room' => $apply_promo_bulk_quad_room1,
				'apply_promo_bulk_custom_room' => $apply_promo_bulk_custom_room1,
				
				'optional_services' =>$optional_services,
				'optional_services_service' =>$services1,
				'optional_services_price' =>$price_of_service1,
				'optional_service_qty_required' =>$quantity_require1,
				
				'displayaccommodation' =>$this->input->post('accommodation_display'),
				
				'accomodation_name' =>$this->input->post('accomodation_name'),
				'oneperson_bed_type' =>$this->input->post('1person_bed_type'),
				'twoperson_bed_type' =>$this->input->post('2person_bed_type'),
				'threeperson_bed_type' =>$this->input->post('3person_bed_type'),
				'fourperson_bed_type' =>$this->input->post('4person_bed_type'),
				'checkintime' =>$this->input->post('checkintime'),
				'checkouttime' =>$this->input->post('checkouttime'),
				'actype' =>$actype,
				'amenities' => $amenities1,
				'accommodation_facilities' => $afacilities1,
				'diver_certification' => $divercertification1,
				'displaydivercertification' => $displaydivercertification,
				'diver_experience' => $diverexperience1,
				'displaydiverexperience' => $displaydiverexperience,
				'diver_specialties' => $diverspecialties1,
				'displaydiverspecialties' => $displaydiverspecialties,
				'user_id' => $this->session->userdata('user_id')
            );          
			//Pass user data to model
			$result['message'] = $this->DCcoursesmodel->addNew($userData,$product_inclusive_accomodation_single,$product_inclusive_accomodation_twin,$product_inclusive_accomodation_threeperson,$product_inclusive_accomodation_quad,$custom_room,$apply_promo_bulk_single_room,$apply_promo_bulk_twin_room,$apply_promo_bulk_three_person_room,$apply_promo_bulk_quad_room,$apply_promo_bulk_custom_room,$start_date_range,$end_date_range);
			if($result['message'] == 'SUCCESS')
			{
				$messge = array('message' => 'Product is Created successfully','class' => 'alert alert-success fade in');
				$this->session->set_flashdata('item', $messge);
				//$this->SAleisuredashboard();
				$base_url=base_url();
				redirect("$base_url"."DCcourses/DCcoursesdashboard");
			}
        }
	//$result['currency'] = $this->DCleisuremodel->getcurrency();
    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $this->load->view('DCcourses/DCcoursesadd', $result);
    $this->load->view('template/footer');
  }
  
  function DCcoursesdashboard()
  {
    $data['DCcoursesdashboard']=$this->DCcoursesmodel->DCcoursesdashboard();
    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $this->load->view('DCcourses/DCcoursesdashboard',$data);
    $this->load->view('template/footer');
  }
  
  function DCcourseslist()
  {
    $data['DCcourseslist']=$this->DCcoursesmodel->DCcourseslist();
    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $this->load->view('DCcourses/DCcourseslist',$data);
    $this->load->view('template/footer');
  }

  function enable($id)
  {
	$data1 = $this->db->get_where('tbl_standard_courses', array('id'=>$id))->result();
	
	//var_dump($data1);
	foreach($data1 as $data1_row)
	{
		//echo "gkjgkgkg";
		$data2 = array(
			'product_name' => $data1_row->product_name,
			//'dcimage' => $divecenter_picture,
			'product_description' => $data1_row->product_description,
			'product_include_display' => $data1_row->product_include_display,
            'product_includes' => $data1_row->product_includes,
			'product_exclude_display' => $data1_row->product_exclude_display,
			'product_excludes' => $data1_row->product_excludes,
			//'product_include_exclude_display' => $data1_row->product_include_exclude_display,
			//'common_options' =>$commonoptions1,
			'other_info' => $data1_row->other_info,
			'other_info_display' => $data1_row->other_info_display,
			'product_category' => $data1_row->product_category,
			'product_keyword' => $data1_row->product_keyword,
			'sequence_number' => $data1_row->sequence_number,
			'product_status' => $data1_row->product_status,
			'product_unit' => $data1_row->product_unit,
			'max_dive_day' => $data1_row->max_dive_day,
			'product_max_day' => $data1_row->product_max_day,
			
			'product_normal_rate' => $data1_row->product_normal_rate,
			'product_weekend_rate' => $data1_row->product_weekend_rate,
			'product_peakseason_rate' =>$data1_row->product_peakseason_rate,
			'product_superpeak_rate' =>$data1_row->product_superpeak_rate,
			'product_inclusive_accomodation' =>$data1_row->product_inclusive_accomodation,
			'product_inclusive_accomodation_single' =>$data1_row->product_inclusive_accomodation_single,
			'product_inclusive_accomodation_twin' =>$data1_row->product_inclusive_accomodation_twin,
			'product_inclusive_accomodation_3person' =>$data1_row->product_inclusive_accomodation_3person,
			'product_inclusive_accomodation_quad' =>$data1_row->product_inclusive_accomodation_quad,
			'custom_room' =>$data1_row->custom_room,
			'accomodation_extension' =>$data1_row->accomodation_extension,
			'accomodation_extension_single' =>$data1_row->accomodation_extension_single,
			'accomodation_extension_twin' =>$data1_row->accomodation_extension_twin,
			'accomodation_extension_3person' =>$data1_row->accomodation_extension_3person,
			'accomodation_extension_quad' =>$data1_row->accomodation_extension_quad,
			
			'discount_bulk_purchase' => $data1_row->discount_bulk_purchase,
			'discount_unit' =>$data1_row->discount_unit,
			'range_start' => $data1_row->range_start,
			'range_end' => $data1_row->range_end,
			'discount_rate' => $data1_row->discount_rate,
			'apply_discount_nr' => $data1_row->apply_discount_nr,
			'apply_discount_wr' => $data1_row->apply_discount_wr,
			'apply_discount_psr' => $data1_row->apply_discount_psr,
			'apply_discount_spsr' => $data1_row->apply_discount_spsr,
			'apply_discount_single_room' => $data1_row->apply_discount_single_room,
			'apply_discount_twin_room' => $data1_row->apply_discount_twin_room,
			'apply_discount_three_person_room' => $data1_row->apply_discount_three_person_room,
			'apply_discount_quad_room' => $data1_row->apply_discount_quad_room,
			'apply_discount_custom_room' => $data1_row->apply_discount_custom_room,
			'apply_promo' => $data1_row->apply_promo,
			'start_date' => $data1_row->start_date,
			'end_date' => $data1_row->end_date,
			'ap_discount_unit' =>$data1_row->ap_discount_unit,
			'ap_discount_rate' => $data1_row->ap_discount_rate,
			'apply_promo_nr' => $data1_row->apply_promo_nr,
			'apply_promo_wr' => $data1_row->apply_promo_wr,
			'apply_promo_psr' => $data1_row->apply_promo_psr,
			'apply_promo_spsr' => $data1_row->apply_promo_spsr,
			'apply_promo_single_room' => $data1_row->apply_promo_single_room,
			'apply_promo_twin_room' => $data1_row->apply_promo_twin_room,
			'apply_promo_three_person_room' => $data1_row->apply_promo_three_person_room,
			'apply_promo_quad_room' => $data1_row->apply_promo_quad_room,
			'apply_promo_custom_room' => $data1_row->apply_promo_custom_room,
			'apply_promo_bilk_discount' => $data1_row->apply_promo_bilk_discount,
			'apply_promo_bulk_nr' => $data1_row->apply_promo_bulk_nr,
			'apply_promo_bulk_wr' => $data1_row->apply_promo_bulk_wr,
			'apply_promo_bulk_psr' => $data1_row->apply_promo_bulk_psr,
			'apply_promo_bulk_spsr' => $data1_row->apply_promo_bulk_spsr,
			'apply_promo_bulk_single_room' => $data1_row->apply_promo_bulk_single_room,
			'apply_promo_bulk_twin_room' => $data1_row->apply_promo_bulk_twin_room,
			'apply_promo_bulk_three_person_room' => $data1_row->apply_promo_bulk_three_person_room,
			'apply_promo_bulk_quad_room' => $data1_row->apply_promo_bulk_quad_room,
			'apply_promo_bulk_custom_room' => $data1_row->apply_promo_bulk_custom_room,
			
			'optional_services' =>$data1_row->optional_services,
			'optional_services_service' =>$data1_row->optional_services_service,
			'optional_services_price' =>$data1_row->optional_services_price,
			'optional_service_qty_required' =>$data1_row->optional_service_qty_required,
			'displayaccommodation' =>$data1_row->displayaccommodation,

			'accomodation_name' =>$data1_row->accomodation_name,
			'oneperson_bed_type' =>$data1_row->oneperson_bed_type,
			'twoperson_bed_type' =>$data1_row->twoperson_bed_type,
			'threeperson_bed_type' =>$data1_row->threeperson_bed_type,
			'fourperson_bed_type' =>$data1_row->fourperson_bed_type,
			'checkintime' =>$data1_row->checkintime,
			'checkouttime' =>$data1_row->checkouttime,
			'actype' =>$data1_row->actype,
			'amenities' => $data1_row->amenities,
			'accommodation_facilities' => $data1_row->accommodation_facilities,
			
			'diver_certification' => $data1_row->diver_certification,
			'displaydivercertification' => $data1_row->displaydivercertification,
			'diver_experience' => $data1_row->diver_experience,
			'displaydiverexperience' => $data1_row->displaydiverexperience,
			'diver_specialties' => $data1_row->diver_specialties,
			'displaydiverspecialties' => $data1_row->displaydiverspecialties,
			'user_id' => $this->session->userdata('user_id'),
			'status' => "ENABLE",
			'product_mode' => "STANDARD",
			'modified' => date("Y-m-d H:i:s"),		
			'standard_id' => $data1_row->id
		);
		
	}
	if($this->DCcoursesmodel->enable($data2))
	{
		$this->DCcoursesdashboard();
	}
   
  }
  
  function disable($id)
  {
	$data1 = $this->db->get_where('tbl_standard_courses', array('id'=>$id))->result();
	
	//var_dump($data1);
	foreach($data1 as $data1_row)
	{
		//echo "gkjgkgkg";
		$data2 = array(
			'product_name' => $data1_row->product_name,
			//'dcimage' => $divecenter_picture,
			'product_description' => $data1_row->product_description,
			'product_include_display' => $data1_row->product_include_display,
            'product_includes' => $data1_row->product_includes,
			'product_exclude_display' => $data1_row->product_exclude_display,
			'product_excludes' => $data1_row->product_excludes,
			//'product_include_exclude_display' => $data1_row->product_include_exclude_display,
			//'common_options' =>$commonoptions1,
			'other_info' => $data1_row->other_info,
			'other_info_display' => $data1_row->other_info_display,
			'product_category' => $data1_row->product_category,
			'product_keyword' => $data1_row->product_keyword,
			'sequence_number' => $data1_row->sequence_number,
			'product_status' => $data1_row->product_status,
			'product_unit' => $data1_row->product_unit,
			'max_dive_day' => $data1_row->max_dive_day,
			'product_max_day' => $data1_row->product_max_day,
			
			'product_normal_rate' => $data1_row->product_normal_rate,
			'product_weekend_rate' => $data1_row->product_weekend_rate,
			'product_peakseason_rate' =>$data1_row->product_peakseason_rate,
			'product_superpeak_rate' =>$data1_row->product_superpeak_rate,
			'product_inclusive_accomodation' =>$data1_row->product_inclusive_accomodation,
			'product_inclusive_accomodation_single' =>$data1_row->product_inclusive_accomodation_single,
			'product_inclusive_accomodation_twin' =>$data1_row->product_inclusive_accomodation_twin,
			'product_inclusive_accomodation_3person' =>$data1_row->product_inclusive_accomodation_3person,
			'product_inclusive_accomodation_quad' =>$data1_row->product_inclusive_accomodation_quad,
			'custom_room' =>$data1_row->custom_room,
			'accomodation_extension' =>$data1_row->accomodation_extension,
			'accomodation_extension_single' =>$data1_row->accomodation_extension_single,
			'accomodation_extension_twin' =>$data1_row->accomodation_extension_twin,
			'accomodation_extension_3person' =>$data1_row->accomodation_extension_3person,
			'accomodation_extension_quad' =>$data1_row->accomodation_extension_quad,
			
			'discount_bulk_purchase' => $data1_row->discount_bulk_purchase,
			'discount_unit' =>$data1_row->discount_unit,
			'range_start' => $data1_row->range_start,
			'range_end' => $data1_row->range_end,
			'discount_rate' => $data1_row->discount_rate,
			'apply_discount_nr' => $data1_row->apply_discount_nr,
			'apply_discount_wr' => $data1_row->apply_discount_wr,
			'apply_discount_psr' => $data1_row->apply_discount_psr,
			'apply_discount_spsr' => $data1_row->apply_discount_spsr,
			'apply_discount_single_room' => $data1_row->apply_discount_single_room,
			'apply_discount_twin_room' => $data1_row->apply_discount_twin_room,
			'apply_discount_three_person_room' => $data1_row->apply_discount_three_person_room,
			'apply_discount_quad_room' => $data1_row->apply_discount_quad_room,
			'apply_discount_custom_room' => $data1_row->apply_discount_custom_room,
			'apply_promo' => $data1_row->apply_promo,
			'start_date' => $data1_row->start_date,
			'end_date' => $data1_row->end_date,
			'ap_discount_unit' =>$data1_row->ap_discount_unit,
			'ap_discount_rate' => $data1_row->ap_discount_rate,
			'apply_promo_nr' => $data1_row->apply_promo_nr,
			'apply_promo_wr' => $data1_row->apply_promo_wr,
			'apply_promo_psr' => $data1_row->apply_promo_psr,
			'apply_promo_spsr' => $data1_row->apply_promo_spsr,
			'apply_promo_single_room' => $data1_row->apply_promo_single_room,
			'apply_promo_twin_room' => $data1_row->apply_promo_twin_room,
			'apply_promo_three_person_room' => $data1_row->apply_promo_three_person_room,
			'apply_promo_quad_room' => $data1_row->apply_promo_quad_room,
			'apply_promo_custom_room' => $data1_row->apply_promo_custom_room,
			'apply_promo_bilk_discount' => $data1_row->apply_promo_bilk_discount,
			'apply_promo_bulk_nr' => $data1_row->apply_promo_bulk_nr,
			'apply_promo_bulk_wr' => $data1_row->apply_promo_bulk_wr,
			'apply_promo_bulk_psr' => $data1_row->apply_promo_bulk_psr,
			'apply_promo_bulk_spsr' => $data1_row->apply_promo_bulk_spsr,
			'apply_promo_bulk_single_room' => $data1_row->apply_promo_bulk_single_room,
			'apply_promo_bulk_twin_room' => $data1_row->apply_promo_bulk_twin_room,
			'apply_promo_bulk_three_person_room' => $data1_row->apply_promo_bulk_three_person_room,
			'apply_promo_bulk_quad_room' => $data1_row->apply_promo_bulk_quad_room,
			'apply_promo_bulk_custom_room' => $data1_row->apply_promo_bulk_custom_room,
			
			'optional_services' =>$data1_row->optional_services,
			'optional_services_service' =>$data1_row->optional_services_service,
			'optional_services_price' =>$data1_row->optional_services_price,
			'optional_service_qty_required' =>$data1_row->optional_service_qty_required,
			'displayaccommodation' =>$data1_row->displayaccommodation,

			'accomodation_name' =>$data1_row->accomodation_name,
			'oneperson_bed_type' =>$data1_row->oneperson_bed_type,
			'twoperson_bed_type' =>$data1_row->twoperson_bed_type,
			'threeperson_bed_type' =>$data1_row->threeperson_bed_type,
			'fourperson_bed_type' =>$data1_row->fourperson_bed_type,
			'checkintime' =>$data1_row->checkintime,
			'checkouttime' =>$data1_row->checkouttime,
			'actype' =>$data1_row->actype,
			'amenities' => $data1_row->amenities,
			'accommodation_facilities' => $data1_row->accommodation_facilities,
			
			'diver_certification' => $data1_row->diver_certification,
			'displaydivercertification' => $data1_row->displaydivercertification,
			'diver_experience' => $data1_row->diver_experience,
			'displaydiverexperience' => $data1_row->displaydiverexperience,
			'diver_specialties' => $data1_row->diver_specialties,
			'displaydiverspecialties' => $data1_row->displaydiverspecialties,
			'user_id' => $this->session->userdata('user_id'),
			'status' => "DISABLE",
			'product_mode' => "STANDARD",
			'modified' => date("Y-m-d H:i:s"),		
			'standard_id' => $data1_row->id
		);
		
	}
	if($this->DCcoursesmodel->disable($data2))
	{
		$this->DCcoursesdashboard();
	}
   
  }
  
  function edit($id)
  {
    $result = array('message'=>'');

	if($this->input->post('update_DCcourses_data'))
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
			
			
			$discount_unit = $this->input->post('dcdiscountunit');
			$range_start = $this->input->post('startrange');
			$range_end = $this->input->post('endrange');
			$discount_rate = $this->input->post('field_name');
			$ap_discount_unit = $this->input->post('apdiscountunit');
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
			
			$start_range = $this->input->post('applypromo_startdate');
			$date2 = str_replace('/', '-', $start_range);
			$start_date_range= date('Y-m-d', strtotime($date2));
			//$start_date_range =date("d-m-Y", strtotime($start_range));
			
			$end_range = $this->input->post('applypromo_enddate');
			$date1 = str_replace('/', '-', $end_range);
			$end_date_range= date('Y-m-d', strtotime($date1));
			
			$product_keyword = $this->input->post('productkeyword');
			$product_keyword1 ="";
			if(isset($product_keyword) && is_array($product_keyword)){
				$product_keyword1 = implode(",", $product_keyword); 
			}
			
			// newfeatcures 
			$product_inclusive_accomodation_single = $this->input->post('product_inclusive_accomodation_single');
			$product_inclusive_accomodation_single1 ="";
			if(isset($product_inclusive_accomodation_single) && is_array($product_inclusive_accomodation_single)){
				$product_inclusive_accomodation_single1 = implode(",", $product_inclusive_accomodation_single); 
			}
			$product_inclusive_accomodation_twin = $this->input->post('product_inclusive_accomodation_twin');
			$product_inclusive_accomodation_twin1 ="";
			if(isset($product_inclusive_accomodation_twin) && is_array($product_inclusive_accomodation_twin)){
				$product_inclusive_accomodation_twin1 = implode(",", $product_inclusive_accomodation_twin); 
			}
			$product_inclusive_accomodation_threeperson = $this->input->post('product_inclusive_accomodation_threeperson');
			$product_inclusive_accomodation_threeperson1 ="";
			if(isset($product_inclusive_accomodation_threeperson) && is_array($product_inclusive_accomodation_threeperson)){
				$product_inclusive_accomodation_threeperson1 = implode(",", $product_inclusive_accomodation_threeperson); 
			}
			$product_inclusive_accomodation_quad = $this->input->post('product_inclusive_accomodation_quad');
			$product_inclusive_accomodation_quad1 ="";
			if(isset($product_inclusive_accomodation_quad) && is_array($product_inclusive_accomodation_quad)){
				$product_inclusive_accomodation_quad1 = implode(",", $product_inclusive_accomodation_quad); 
			}
			$custom_room = $this->input->post('custom_room');
			$custom_room1 ="";
			if(isset($custom_room) && is_array($custom_room)){
				$custom_room1 = implode(",", $custom_room); 
			}
			
			$accommodation_extension_single = $this->input->post('accommodation_extension_single');
			$accommodation_extension_single1 ="";
			if(isset($accommodation_extension_single) && is_array($accommodation_extension_single)){
				$accommodation_extension_single1 = implode(",", $accommodation_extension_single); 
			}
			$accommodation_extension_twin = $this->input->post('accommodation_extension_twin');
			$accommodation_extension_twin1 ="";
			if(isset($accommodation_extension_twin) && is_array($accommodation_extension_twin)){
				$accommodation_extension_twin1 = implode(",", $accommodation_extension_twin); 
			}
			$accommodation_extension_threeperson = $this->input->post('accommodation_extension_threeperson');
			$accommodation_extension_threeperson1 ="";
			if(isset($accommodation_extension_threeperson) && is_array($accommodation_extension_threeperson)){
				$accommodation_extension_threeperson1 = implode(",", $accommodation_extension_threeperson); 
			}
			$accommodation_extension_quad = $this->input->post('accommodation_extension_quad');
			$accommodation_extension_quad1 ="";
			if(isset($accommodation_extension_quad) && is_array($accommodation_extension_quad)){
				$accommodation_extension_quad1 = implode(",", $accommodation_extension_quad); 
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
			$amenities = $this->input->post('amenities');
			$amenities1 ="";
			if(isset($amenities) && is_array($amenities)){
				$amenities1 = implode(",", $amenities); 
			}
			//Show New Price Apply Discount start
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
			$apply_discount_single_room = $this->input->post('text5');
			$apply_discount_single_room1 ="";
			if(isset($apply_discount_single_room) && is_array($apply_discount_single_room)){
				$apply_discount_single_room1 = implode(",", $apply_discount_single_room); 
			}
			$apply_discount_twin_room = $this->input->post('text6');
			$apply_discount_twin_room1 ="";
			if(isset($apply_discount_twin_room) && is_array($apply_discount_twin_room)){
				$apply_discount_twin_room1 = implode(",", $apply_discount_twin_room); 
			}
			$apply_discount_three_person_room = $this->input->post('text7');
			$apply_discount_three_person_room1 ="";
			if(isset($apply_discount_three_person_room) && is_array($apply_discount_three_person_room)){
				$apply_discount_three_person_room1 = implode(",", $apply_discount_three_person_room); 
			}
			$apply_discount_quad_room = $this->input->post('text8');
			$apply_discount_quad_room1 ="";
			if(isset($apply_discount_quad_room) && is_array($apply_discount_quad_room)){
				$apply_discount_quad_room1 = implode(",", $apply_discount_quad_room); 
			}
			$apply_discount_custom_room = $this->input->post('text18');
			$apply_discount_custom_room1 ="";
			if(isset($apply_discount_custom_room) && is_array($apply_discount_custom_room)){
				$apply_discount_custom_room1 = implode(",", $apply_discount_custom_room); 
			}
			//Show New Price Apply Discount end
			
			//Show New Price Apply Promo start
				$apply_promo_single_room = $this->input->post('text13');
				$apply_promo_single_room1 ="";
				if(isset($apply_promo_single_room) && is_array($apply_promo_single_room)){
					$apply_promo_single_room1 = implode(",", $apply_promo_single_room); 
				}
				$apply_promo_twin_room = $this->input->post('text14');
				$apply_promo_twin_room1 ="";
				if(isset($apply_promo_twin_room) && is_array($apply_promo_twin_room)){
					$apply_promo_twin_room1 = implode(",", $apply_promo_twin_room); 
				}
				$apply_promo_three_person_room = $this->input->post('text15');
				$apply_promo_three_person_room1 ="";
				if(isset($apply_promo_three_person_room) && is_array($apply_promo_three_person_room)){
					$apply_promo_three_person_room1 = implode(",", $apply_promo_three_person_room); 
				}
				$apply_promo_quad_room = $this->input->post('text16');
				$apply_promo_quad_room1 ="";
				if(isset($apply_promo_quad_room) && is_array($apply_promo_quad_room)){
					$apply_promo_quad_room1 = implode(",", $apply_promo_quad_room); 
				}
				$apply_promo_custom_room = $this->input->post('text17');
				$apply_promo_custom_room1 ="";
				if(isset($apply_promo_custom_room) && is_array($apply_promo_custom_room)){
					$apply_promo_custom_room1 = implode(",", $apply_promo_custom_room); 
				}
			//Show New Price Apply Promo End
			$afacilities = $this->input->post('afacilities');
			$afacilities1 ="";
			if(isset($afacilities) && is_array($afacilities)){
				$afacilities1 = implode(",", $afacilities); 
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
			$apply_promo_bulk_single_room = $this->input->post('apbd5');
			$apply_promo_bulk_single_room1 ="";
			if(isset($apply_promo_bulk_single_room) && is_array($apply_promo_bulk_single_room)){
				$apply_promo_bulk_single_room1 = implode(",", $apply_promo_bulk_single_room); 
			}
			$apply_promo_bulk_twin_room = $this->input->post('apbd6');
			$apply_promo_bulk_twin_room1 ="";
			if(isset($apply_promo_bulk_twin_room) && is_array($apply_promo_bulk_twin_room)){
				$apply_promo_bulk_twin_room1 = implode(",", $apply_promo_bulk_twin_room); 
			}
			$apply_promo_bulk_three_person_room = $this->input->post('apbd7');
			$apply_promo_bulk_three_person_room1 ="";
			if(isset($apply_promo_bulk_three_person_room) && is_array($apply_promo_bulk_three_person_room)){
				$apply_promo_bulk_three_person_room1 = implode(",", $apply_promo_bulk_three_person_room); 
			}
			$apply_promo_bulk_quad_room = $this->input->post('apbd8');
			$apply_promo_bulk_quad_room1 ="";
			if(isset($apply_promo_bulk_quad_room) && is_array($apply_promo_bulk_quad_room)){
				$apply_promo_bulk_quad_room1 = implode(",", $apply_promo_bulk_quad_room); 
			}
			$apply_promo_bulk_custom_room = $this->input->post('apbd9');
			$apply_promo_bulk_custom_room1 ="";
			if(isset($apply_promo_bulk_custom_room) && is_array($apply_promo_bulk_custom_room)){
				$apply_promo_bulk_custom_room1 = implode(",", $apply_promo_bulk_custom_room); 
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
                'sequence_number' => $this->input->post('sequence_number'),
                'product_status' => $this->input->post('productstatus'),
				'product_unit' => $this->input->post('productunits'),
				'max_dive_day' => $this->input->post('maxdiveday'),
				'product_max_day' => $this->input->post('productmaxday'),
				
				'product_normal_rate' => $this->input->post('product_normal_price'),
				'product_weekend_rate' => $this->input->post('product_weekend_price'),
				'product_peakseason_rate' =>$this->input->post('product_peakseason_price'),
				'product_superpeak_rate' =>$this->input->post('product_super_peakseason_price'),
				'product_inclusive_accomodation' =>$this->input->post('dcinclusiveaccomodation'),
				
				'product_inclusive_accomodation_single' =>$product_inclusive_accomodation_single1,
				'product_inclusive_accomodation_twin' =>$product_inclusive_accomodation_twin1,
				'product_inclusive_accomodation_3person' =>$product_inclusive_accomodation_threeperson1,
				'product_inclusive_accomodation_quad' =>$product_inclusive_accomodation_quad1,
				'custom_room' =>$custom_room1,
				'accomodation_extension' =>$this->input->post('dcaccommodationextension'),
				'accomodation_extension_single' =>$accommodation_extension_single1,
				'accomodation_extension_twin' =>$accommodation_extension_twin1,
				'accomodation_extension_3person' =>$accommodation_extension_threeperson1,
				'accomodation_extension_quad' =>$accommodation_extension_quad1,
				
				'discount_bulk_purchase' => $this->input->post('dcdiscountpurchase'),
				'discount_unit' =>$discount_unit,
				'range_start' => implode(",", $range_start),
				'range_end' => implode(",", $range_end),
				'discount_rate' => implode(",", $discount_rate),
				'apply_discount_nr'=>$apply_discount_nr1,
				'apply_discount_wr'=>$apply_discount_wr1,
				'apply_discount_psr'=>$apply_discount_psr1,
				'apply_discount_spsr'=>$apply_discount_spsr1,
				'apply_discount_single_room'=>$apply_discount_single_room1,
				'apply_discount_twin_room'=>$apply_discount_twin_room1,
				'apply_discount_three_person_room'=>$apply_discount_three_person_room1,
				'apply_discount_quad_room'=>$apply_discount_quad_room1,
				'apply_discount_custom_room'=>$apply_discount_custom_room1,
				'apply_promo' => $this->input->post('dcapplypromo'),
				'start_date' => $start_date_range,
				'end_date' => $end_date_range,
				'ap_discount_unit' =>$ap_discount_unit,
				'ap_discount_rate' => $this->input->post('apdiscountrate'),
				'apply_promo_nr'=>$this->input->post('text9'),
				'apply_promo_wr'=>$this->input->post('text10'),
				'apply_promo_psr'=>$this->input->post('text11'),
				'apply_promo_spsr'=>$this->input->post('text12'),
				'apply_promo_single_room'=>$apply_promo_single_room1,
				'apply_promo_twin_room'=>$apply_promo_twin_room1,
				'apply_promo_three_person_room'=>$apply_promo_three_person_room1,
				'apply_promo_quad_room'=>$apply_promo_quad_room1,
				'apply_promo_custom_room'=>$apply_promo_custom_room1,
				'apply_promo_bilk_discount' => $this->input->post('apbulkdiscount'),
				
				'apply_promo_bulk_nr' => $apply_promo_bulk_nr1,
				'apply_promo_bulk_wr' => $apply_promo_bulk_wr1,
				'apply_promo_bulk_psr' => $apply_promo_bulk_psr1,
				'apply_promo_bulk_spsr' => $apply_promo_bulk_spsr1,
				'apply_promo_bulk_single_room' => $apply_promo_bulk_single_room1,
				'apply_promo_bulk_twin_room' => $apply_promo_bulk_twin_room1,
				'apply_promo_bulk_three_person_room' => $apply_promo_bulk_three_person_room1,
				'apply_promo_bulk_quad_room' => $apply_promo_bulk_quad_room1,
				'apply_promo_bulk_custom_room' => $apply_promo_bulk_custom_room1,
				
				'optional_services' =>$this->input->post('optionalservices1'),
				'optional_services_service' =>$services1,
				'optional_services_price' =>$price_of_service1,
				'optional_service_qty_required' =>$quantity_require1,
				
				'displayaccommodation' =>$this->input->post('accommodation_display'),
				'accomodation_name' =>$this->input->post('accomodation_name'),
				'oneperson_bed_type' =>$this->input->post('1person_bed_type'),
				'twoperson_bed_type' =>$this->input->post('2person_bed_type'),
				'threeperson_bed_type' =>$this->input->post('3person_bed_type'),
				'fourperson_bed_type' =>$this->input->post('4person_bed_type'),
				'checkintime' =>$this->input->post('checkintime'),
				'checkouttime' =>$this->input->post('checkouttime'),
				'actype' =>$actype,
				'amenities' => $amenities1,
				'accommodation_facilities' => $afacilities1,
				
				'diver_certification' => $divercertification1,
				'displaydivercertification' => $displaydivercertification,
				'diver_experience' => $diverexperience1,
				'displaydiverexperience' => $displaydiverexperience,
				'diver_specialties' => $diverspecialties1,
				'displaydiverspecialties' => $displaydiverspecialties,
				'user_id' => $this->session->userdata('user_id')
            );          
			//Pass user data to model
			$result['message'] = $this->DCcoursesmodel->updateData($userData, $id,$product_inclusive_accomodation_single,$product_inclusive_accomodation_twin,$product_inclusive_accomodation_threeperson,$product_inclusive_accomodation_quad,$custom_room,$apply_promo_bulk_single_room,$apply_promo_bulk_twin_room,$apply_promo_bulk_three_person_room,$apply_promo_bulk_quad_room,$apply_promo_bulk_custom_room,$start_date_range,$end_date_range);
			if($result['message'] == 'SUCCESS')
			{
			//$base_url=base_url();
			//redirect("$base_url"."DCcourses/DCcoursesdashboard");
			
				$messge = array('message' => 'Product is Updated successfully','class' => 'alert alert-success fade in');
				$this->session->set_flashdata('item', $messge);
				//$this->SAleisuredashboard();
				$base_url=base_url();
				redirect("$base_url"."DCcourses/DCcoursesdashboard");
			}
		}
    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $result['getEditdata']=$this->DCcoursesmodel->getEditdata($id);
    $this->load->view('DCcourses/DCcoursesupdate',$result);
    $this->load->view('template/footer');
	}
  public function delete($id)
  {
    $this->DCcoursesmodel->deleteData($id);
	$base_url=base_url();
	redirect("$base_url"."DCcourses/DCcoursesdashboard");
   /*  $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $data['DCcourseslist']=$this->DCcoursesmodel->DCcourseslist();
    $this->load->view('DCcourses/DCcourseslist',$data);
    $this->load->view('template/footer'); */
  }
  function enableProduct($id)
 {
     $this->db->where('id',$id);
     if($this->db->update('tbl_dccourses',array('status' => 'ENABLE')))
     {
		$data['DCcoursesdashboard']=$this->DCcoursesmodel->DCcoursesdashboard();
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('DCcourses/DCcoursesdashboard',$data);
		$this->load->view('template/footer');
     }
     
 }
  //**********************************************************************************************************************************************//
 //                                                                   [ Dive Center Profile END] //***********************************************************************************************************************************************//

}
?>
