<?php
class DCpackage extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('DCpackagemodel');
    $this->load->helper('url');
	  $this->load->library('session');
  }
  
  //**********************************************************************************************************************************************
 //                                                                   [ Dive Center Package Start] //***********************************************************************************************************************************************
 
  public function addNew()
  {
    $result = array('message'=>'');	
	if($this->input->post('submit_DCpackage_data'))
		{  
			 //Check whether user upload picture
            if(!empty($_FILES['gallery']['name'])){
                $config['upload_path'] = './upload/DCpackage/';
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
			
            //Prepare array of user data
			$productincludes = $this->input->post('productincludes');
			$productincludes1 ="";
			if(isset($productincludes) && is_array($productincludes))
			{ 
				$productincludes1 = implode(",", $productincludes); 
			}	
			else 
			{
				$productincludes1 = $this->input->post('productincludes1');
			}
			
			$productexcludes = $this->input->post('productexcludes');
			$productexcludes1 ="";
			if(isset($productexcludes) && is_array($productexcludes))
			{ 
				$productexcludes1 = implode(",", $productexcludes); 
			}
			else
			{
				$productexcludes1 = $this->input->post('productexcludes1');
			}
			
			$single_room = $this->input->post('single_room');
			$twin_room = $this->input->post('twin_room');
			$three_person_room = $this->input->post('three_person_room');
			$quad_room = $this->input->post('quad_room');		
			$discount_unit = $this->input->post('dcdiscountunit');
			$discount_unit1 ="";
			if(isset($discount_unit)){
				$discount_unit1 = $discount_unit; 
			}
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
			$optional_services = $this->input->post('optionalservices');
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
			$start_range = $this->input->post('bpdatestart');
			//$str_range = substr($start_range ,0,10);
			$start_date_range =date("Y-m-d", strtotime($start_range));
			
			$end_range = $this->input->post('bpdateend');
			//$ed_range = substr($end_range ,14,23);
			$end_date_range =date("Y-m-d", strtotime($end_range));
			
			$start_range1 = $this->input->post('tpdatestart');
			$start_date_range1 =date("Y-m-d", strtotime($start_range1));
			
			$end_range1 = $this->input->post('tpdateend');
			$end_date_range1 =date("Y-m-d", strtotime($end_range1));
			
			$start_range3 = $this->input->post('applypromo_startdate');
			$start_date_range3 =date("Y-m-d", strtotime($start_range3));
			
			$end_range3 = $this->input->post('applypromo_enddate');
			$end_date_range3 =date("Y-m-d", strtotime($end_range3));
			
			$product_keyword = $this->input->post('productkeyword');
			$product_keyword1 ="";
			if(isset($product_keyword) && is_array($product_keyword)){
				$product_keyword1 = implode(",", $product_keyword); 
			}
			
            $userData = array(
                'product_name' => $this->input->post('name'),
                //'dcimage' => $divecenter_picture,
                'product_description' => $this->input->post('description'),
                'product_includes' => $productincludes1,
                'product_excludes' => $productexcludes1,
                //'common_options' => $commonoptions1,
                'other_info' => $this->input->post('otherinformation'),
                'product_category' => $this->input->post('productcategory'),
                'product_keyword' => $product_keyword1,			
                'booking_period_start_date' => $start_date_range,				
                'booking_period_end_date' => $end_date_range,				
                'travel_period_start_date' => $start_date_range1,				
                'travel_period_end_date' => $end_date_range1,	
                'sequence_number' => $this->input->post('sequence_number'),
                'product_status' => $this->input->post('productstatus'),
				'product_unit' => $this->input->post('productunits'),
				'product_max_day' => $this->input->post('productmaxday'),			
				'normal_product_price' => $this->input->post('normal_product_price'),
				'weekend_product_price' => $this->input->post('weekend_product_price'),
				'peak_product_price' => $this->input->post('peak_product_price'),
				'disaccomodation' => $this->input->post('dcaccomodation'),
				'single_room' => implode(",", $single_room),
				'twin_room' => implode(",", $twin_room),
				'three_person_room' => implode(",", $three_person_room),
				'quad_room' => implode(",", $quad_room),			
				'discount_bulk_purchase' => $this->input->post('dcdiscountpurchase'),			
				'discount_unit' =>$discount_unit1,
				'range_start' => $range_start1,
				'range_end' => $range_end1,
				'discount_rate' => $discount_rate1,
				'apply_promo' => $this->input->post('dcapplypromo'),
				'start_date' => $start_date_range3,
				'end_date' => $end_date_range3,
				'ap_discount_unit' =>$ap_discount_unit,
				'ap_discount_rate' => $this->input->post('apdiscountrate'),
				'apply_promo_bilk_discount' => $this->input->post('apbulkdiscount'),
				'optional_services' => implode(",", $optional_services),
				'accomodation_name' => $this->input->post('accomodation_name'),
				'oneperson_bed_type' => $this->input->post('1person_bed_type'),
				'twoperson_bed_type' => $this->input->post('2person_bed_type'),
				'threeperson_bed_type' => $this->input->post('3person_bed_type'),
				'fourperson_bed_type' => $this->input->post('4person_bed_type'),
				'checkintime' => $this->input->post('checkintime'),
				'checkouttime' => $this->input->post('checkouttime'),
				'actype' => $this->input->post('packageactype'),
				'amenities' => $amenities1,
				'diver_certification' => $divercertification1,
				'diver_experience' => $diverexperience1,
				'diver_specialties' => $diverspecialties1,				
				'country' => $this->input->post('dive_center_country'),
				'island' => $this->input->post('dive_center_island'),
				'gpsx' => $this->input->post('gpsx'),
				'gpsy' => $this->input->post('gpsy'),
				'dive_sites' => $divesites1,
				'photo' => $divecenter_picture,
				'user_id' => $this->session->userdata('user_id')
            );          
			//Pass user data to model
			$result['message'] = $this->DCpackagemodel->addNew($userData);
			if($result['message'] == 'SUCCESS')
			{
				$messge = array('message' => 'Product is Created successfully','class' => 'alert alert-success fade in');
				$this->session->set_flashdata('item', $messge);

				$this->DCpackagelist();
			}
        }
	//$result['currency'] = $this->DCleisuremodel->getcurrency();
    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $this->load->view('DCpackage/DCpackageadd',$result);
    $this->load->view('template/footer');
  }
  function DCpackagelist()
  {
    $data['DCpackagelist']=$this->DCpackagemodel->DCpackagelist();
    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $this->load->view('DCpackage/DCpackagelist',$data);
    $this->load->view('template/footer');
  }
	function DCpackagedashboard()
  {
    $data['DCpackagedashboard']=$this->DCpackagemodel->DCpackagedashboard();
    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $this->load->view('DCpackage/DCpackagedashboard',$data);
    $this->load->view('template/footer');
  }
  
  public function edit($id)
  {
    $result = array('message'=>'');
	
	if($this->input->post('Update_DCpackage_Data'))
		{  
			//Prepare array of user data
			//$commonoptions = $this->input->post('commonoptions');
			$productincludes = $this->input->post('productincludes');
			$productincludes1 ="";
			if(isset($productincludes) && is_array($productincludes))
			{ 
				$productincludes1 = implode(",", $productincludes); 
			}	
			else 
			{
				$productincludes1 = $this->input->post('productincludes1');
			}
			
			$productexcludes = $this->input->post('productexcludes');
			$productexcludes1 ="";
			if(isset($productexcludes) && is_array($productexcludes))
			{ 
				$productexcludes1 = implode(",", $productexcludes); 
			}
			else
			{
				$productexcludes1 = $this->input->post('productexcludes1');
			}
			$single_room = $this->input->post('single_room');
			$twin_room = $this->input->post('twin_room');
			$three_person_room = $this->input->post('three_person_room');
			$quad_room = $this->input->post('quad_room');		
			$discount_unit = $this->input->post('dcdiscountunit');		
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
			
			$ap_discount_unit = $this->input->post('apdiscountunit');
			$optional_services = $this->input->post('optionalservices');
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

			$start_range = $this->input->post('bpdatestart');
			//$str_range = substr($start_range ,0,10);
			$start_date_range =date("Y-m-d", strtotime($start_range));
			
			$end_range = $this->input->post('bpdateend');
			//$ed_range = substr($end_range ,14,23);
			$end_date_range =date("Y-m-d", strtotime($end_range));
			
			$start_range1 = $this->input->post('tpdatestart');
			$start_date_range1 =date("Y-m-d", strtotime($start_range1));
			
			$end_range1 = $this->input->post('tpdateend');
			$end_date_range1 =date("Y-m-d", strtotime($end_range1));
			
			$start_range3 = $this->input->post('applypromo_startdate');
			$start_date_range3 =date("Y-m-d", strtotime($start_range3));
			
			$end_range3 = $this->input->post('applypromo_enddate');
			$end_date_range3 =date("Y-m-d", strtotime($end_range3));
			$product_keyword = $this->input->post('productkeyword');
			
            $userData = array(
                'product_name' => $this->input->post('product_name'),
                //'dcimage' => $divecenter_picture,
                'product_description' => $this->input->post('description'),
                'product_includes' => $productincludes1,
                'product_excludes' => $productexcludes1,
               // 'common_options' => implode(",", $commonoptions),
                'other_info' => $this->input->post('otherinformation'),
                'product_category' => $this->input->post('productcategory'),
                'product_keyword' => implode(",", $product_keyword),			
                'booking_period_start_date' => $start_date_range,				
                'booking_period_end_date' => $end_date_range,				
                'travel_period_start_date' => $start_date_range1,				
                'travel_period_end_date' => $end_date_range1,	
                'sequence_number' => $this->input->post('sequence_number'),
                'product_status' => $this->input->post('productstatus'),
				'product_unit' => $this->input->post('productunits'),
				'product_max_day' => $this->input->post('productmaxday'),			
				'normal_product_price' => $this->input->post('normal_product_price'),
				'weekend_product_price' => $this->input->post('weekend_product_price'),
				'peak_product_price' => $this->input->post('peak_product_price'),
				'disaccomodation' => $this->input->post('dcaccomodation'),
				'single_room' => implode(",", $single_room),
				'twin_room' => implode(",", $twin_room),
				'three_person_room' => implode(",", $three_person_room),
				'quad_room' => implode(",", $quad_room),			
				'discount_bulk_purchase' => $this->input->post('dcdiscountpurchase'),			
				'discount_unit' =>$discount_unit,
				'range_start' => $range_start1,
				'range_end' => $range_end1,
				'discount_rate' => $discount_rate1,
				'apply_promo' => $this->input->post('dcapplypromo'),
				'start_date' => $start_date_range3,
				'end_date' => $end_date_range3,
				'ap_discount_unit' => $ap_discount_unit,
				'ap_discount_rate' => $this->input->post('apdiscountrate'),
				'apply_promo_bilk_discount' => $this->input->post('apbulkdiscount'),
				'optional_services' => implode(",", $optional_services),
				'accomodation_name' => $this->input->post('accomodation_name'),
				'oneperson_bed_type' => $this->input->post('1person_bed_type'),
				'twoperson_bed_type' => $this->input->post('2person_bed_type'),
				'threeperson_bed_type' => $this->input->post('3person_bed_type'),
				'fourperson_bed_type' => $this->input->post('4person_bed_type'),
				'checkintime' => $this->input->post('checkintime'),
				'checkouttime' => $this->input->post('checkouttime'),
				'actype' => $this->input->post('actype'),
				'amenities' => $amenities1,
				'diver_certification' => $divercertification1,
				'diver_experience' => $diverexperience1,
				'diver_specialties' => $diverspecialties1,				
				'country' => $this->input->post('edit_dive_center_country'),
				'island' => $this->input->post('edit_dive_center_island'),
				'gpsx' => $this->input->post('gpsx'),
				'gpsy' => $this->input->post('gpsy'),
				'dive_sites' => implode(",", $divesites),
				'user_id' => $this->session->userdata('user_id')
            );                    
			//Pass user data to model
			$result['message'] = $this->DCpackagemodel->updateData($userData, $id);
			if($result['message'] == 'SUCCESS')
			{
			$base_url=base_url();
			redirect("$base_url"."DCpackage/DCpackagelist");
			}
		}
		if($this->input->post('Update_DCpackage_Image_Data'))
		{
			 //Check whether user upload picture
            if(!empty($_FILES['gallery']['name'])){
                $config['upload_path'] = './upload/DCpackage/';
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
			$result['message'] = $this->DCpackagemodel->updateData($userData, $id);
			if($result['message'] == 'SUCCESS')
			{
			$base_url=base_url();
			redirect("$base_url"."DCpackage/DCpackagelist");
			}
		}
    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $result['getEditdata']=$this->DCpackagemodel->getEditdata($id);
    $this->load->view('DCpackage/DCpackageupdate',$result);
    $this->load->view('template/footer');
	}
  public function delete($id)
  {
    $this->DCpackagemodel->deleteData($id);
    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $data['DCpackagelist']=$this->DCpackagemodel->DCpackagelist();
    $this->load->view('DCpackage/DCpackagelist',$data);
    $this->load->view('template/footer');
  }
  
  //**********************************************************************************************************************************************//
 //                                                                   [ Dive Center Leisure END] //***********************************************************************************************************************************************//
 
}
?>
