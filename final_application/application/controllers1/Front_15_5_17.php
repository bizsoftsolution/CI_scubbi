<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Front extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		//$this->load->library('session');
		$this->load->model('Front_model', 'front_model');
    }
	public function index()
	{	
		//$data['total_rows'] = $this->db->count_all('special_offer');
		$data['specialoffer'] = $this->front_model->get_specialoffer();	
		$data['populardivedestination'] = $this->front_model->get_populardivedestination();
		$data['guidedtour'] = $this->front_model->get_guidedtour();
		$data['slider'] = $this->front_model->get_slider();
		
		$this->load->view('front/header');
		$this->load->view('front/slider', $data);
		$this->load->view('front/index', $data);
		$this->load->view('front/footer');	   
	}
	
	public function splOffer(){
		
		$data['specialoffer'] = $this->front_model->get_splOffer();
		$data['populardivedestination'] = $this->front_model->get_populardivedestination();
		$data['slider'] = $this->front_model->get_slider();

		$this->load->view('front/header');
		$this->load->view('front/slider', $data);
		$this->load->view('front/sploffer', $data);
		$this->load->view('front/footer');
    }
	
	function get_Allspecialoffer()
	{
		$config['base_url'] = base_url('Front/get_Allspecialoffer');
        $config['total_rows'] = $this->db->count_all('special_offer');
        $config['per_page'] = "12";
        $config["uri_segment"] = 3;
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);
        //config for bootstrap pagination class integration
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
		$this->pagination->initialize($config);
		$data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data["links"] = $this->pagination->create_links();
		$data['offerpagination'] = $this->front_model->get_specialoffer_all($config["per_page"], $data['page']);
		$this->load->view('front/header');
		$this->load->view('front/viewmoreOffer', $data);
		$this->load->view('front/footer');
	}
	
	public function popularDestination()
	{	
		$data['specialoffer'] = $this->front_model->get_specialoffer();
		$data['populardivedestination'] = $this->front_model->get_ppldestination();
		$data['slider'] = $this->front_model->get_slider();
		
		$this->load->view('front/header');
		$this->load->view('front/slider', $data);
		$this->load->view('front/popularDestination', $data);
		$this->load->view('front/footer');	   
	}
	
	function get_AllPDD()
	{
		$config['base_url'] = base_url('Front/get_AllPDD');
        $config['total_rows'] = $this->db->count_all('daily_plan');
        $config['per_page'] = "12";
        $config["uri_segment"] = 3;
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);
        //config for bootstrap pagination class integration
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
		$this->pagination->initialize($config);
		$data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data["links"] = $this->pagination->create_links();
		$data['populardivedestination'] = $this->front_model->get_popularpagination($config["per_page"], $data['page']);
		$this->load->view('front/header');
		$this->load->view('front/viewmorePopular', $data);
		$this->load->view('front/footer');	   
	}
	
	function get_island($country)
	{
	 $this->load->model('front_model');
	 header('Content-Type: application/x-json; charset=utf-8');
	 echo(json_encode($this->front_model->get_island($country)));
	}
	function search()
	{	
		//if($this->input->post('search_result'))
		//{
		$country = $this->input->post('scountry');
		$islands = $this->input->post('islands');
		
		$config['base_url'] = base_url('index.php/Front/search');
		$query = $this->db->where('dccountry', $country)->where('dcislands', $islands)->get('tbl_dcprofile');
        $config['total_rows'] = $query->num_rows();
		
        //$config['total_rows'] = $this->db->count_all('tbl_dcprofile');
        $config['per_page'] = "10";
        $config["uri_segment"] = 3;
       // $choice = $config["total_rows"] / $config["per_page"];
        //$config["num_links"] = floor($choice);
        $config["num_links"] =  $config['total_rows'];
        //config for bootstrap pagination class integration
		$config['use_page_numbers']  = TRUE;
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="page-item disabled">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
		$this->pagination->initialize($config);
		
		$data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data["links"] = $this->pagination->create_links();
		//$cin = $this->input->post('checkin');
		$data['Sdate']= $this->input->post('checkin');
		//$cout = $this->input->post('checkout');
		$data['Edate']= $this->input->post('checkout');
		
		$data['Noofpersons']= $this->input->post('no_of_persons');	
		//}
		$data['per_page'] = $config['per_page'];
		$data['search'] = $this->front_model->get_searchdetails($config["per_page"], $data['page']);
		
		$data['num_rows'] = count($data['search']);
		if($data['search'] == 'fail')
		{
				  redirect('front/error_page');
				//$this->load->view('front/error_page');
		}
		else
		{
			$this->load->view('front/search', $data);
		}
		
		// date diff function
		/* $strdate = $this->input->post('start');
		$end1date = $this->input->post('end');	
		$diff = abs(strtotime($strdate) - strtotime($end1date));		
		$diff_val1 = floor($diff / (60 * 60 * 24)); //86400
		$diff_val = strval($diff_val1);
		
		// country island 
		$cname ="";
		$curty = $this->input->post('scountry');
		$country = $this->front_model->countryname($curty);
			//var_dump( $country);
		foreach($country as $country1){
            $cname = $country1->country_name;
        }
		
		$island ="";
		$islnd = $this->input->post('islands');
		$island = $this->front_model->islandname($islnd);
		foreach($island as $island1){
            $island = $island1->island_name;
        }		
		$ci =  $cname.",".$island;
		
		// Get price from daily_plan
		$ciprice ="";
		$price = $this->front_model->getDailyplan($curty, $islnd);
		foreach($price as $price1){
            $ciprice = $price1->per_day_amount;
        }
		
		// insert data to cart
		$insert = array(
			'name' =>$ci,
            'qty' => $diff_val,
            'price' => $ciprice
            );
			//var_dump($insert);
        $this->cart->insert($insert);
		
		$data['search'] = $this->front_model->get_searchdetails(); */
		//$data['islands'] = $this->front_model->get_cities();
		/* $this->load->view('front/header'); */
		//$this->load->view('front/slider');
		
		/* $this->load->view('front/footer'); */
	}
	function customerSignup()
	{
		$this->load->view('front/header');
		$this->load->view('front/signup');
		//$this->load->view('front/footer');
	}
	function error_page()
	{
		$this->load->view('front/error_page');
		$this->load->view('front/footer');
	}
	function filter_language()
	{
		if($this->input->post('brandss')){
			//$brandis=array();
			//parse_str($this->input->post('brandss'),$brandis); //changing string into array 
			//split 1st array elements
			//foreach($brandis as $ids)
			//{
			//$ids;
			//}
			//$brandii=implode("','",$ids);
			$brandii=$this->input->post('brandss');
			$fll = $this->front_model->filter_language($brandii);
			//foreach($fll as $farrayval)
			//{
				//echo $farrayval['dcname'];
			//}
		}
	}
	function divecenter($id)
	{
		/* $cin = $this->input->post('checkin');
		$data['Sdate']= $this->session->userdata($cin);
		
		$cout = $this->input->post('checkout');
		$data['Edate']= $this->session->userdata($cout); */
		
		$data['Noofpersons']= $this->input->post('no_of_persons');
		
		$data['divecenterpage'] = $this->front_model->get_allDetails($id);
		$this->load->view('front/dive_center', $data);
		//$this->load->view('front/footer');
	}
	
	//Customer Section Start //
	
	function customerDashboard()
	{
		$this->load->view('front/header');
		$this->load->view('front/customer_dashboard');
		$this->load->view('front/footer');
	}
	function customerProfile()
	{
		$data['get_customerprofile'] = $this->front_model->get_customerprofile();
		$this->load->view('front/header');
		$this->load->view('front/customer_profile', $data);
		$this->load->view('front/footer');
	}
	function customereditProfile()
	{
		$id = $this->uri->segment(3);
		$data['edit_customerprofile'] = $this->front_model->edit_customerprofile($id);
		$this->load->view('front/header');
		$this->load->view('front/customer_editprofile', $data);
		$this->load->view('front/footer');
	}
	function Updatecustomerprofile($id)
	{
		//$result = array('message'=>'');
		if($this->input->post('update_customerprofile_data'))
		{  
			 //Check whether user upload picture
            if(!empty($_FILES['identification_passport']['name'])){
                $config['upload_path'] = './upload/customerprofile/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['file_name'] = $_FILES['identification_passport']['name'];
                
                //Load upload library and initialize configuration
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                
                if($this->upload->do_upload('identification_passport')){
                    $uploadData = $this->upload->data();
                    $identification_passport = $uploadData['file_name'];
                }else{
                    $identification_passport = '';
                }
            }else{
                $identification_passport = '';
            }
			
			 if(!empty($_FILES['diver_card']['name'])){
                $config['upload_path'] = './upload/customerprofile/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['file_name'] = $_FILES['diver_card']['name'];
                
                //Load upload library and initialize configuration
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                
                if($this->upload->do_upload('diver_card')){
                    $uploadData = $this->upload->data();
                    $diver_card = $uploadData['file_name'];
                }else{
                    $diver_card = '';
                }
            }else{
                $diver_card = '';
            }
			
			$con = $this->input->post('field_name');
			$other_language = $this->input->post('field_name1');
			$dob = $this->input->post('dob');
			$date_dob =date("Y-m-d", strtotime($dob));
			
            $userData = array(
                'firstname' => $this->input->post('firstname'),
                //'dcimage' => $divecenter_picture,
                'lastname' => $this->input->post('lastname'),
                'gender' => $this->input->post('gender'),
                'dob' => $date_dob,
                'email' => $this->input->post('email'),
                'contactno' => implode(",", $con),
                'nationality' => $this->input->post('nationality'),
                'diver_registration_body' => $this->input->post('diver_registration_body'),
                'identifiction_passport' =>$identification_passport ,
				'diver_registration_level' => $this->input->post('diver_registration_level'),
				'diver_speciality_skill' => $this->input->post('Specialtiesskill'),
				'diver_card' => $diver_card,
				'language' => $this->input->post('language'),
				'currency' => $this->input->post('currency'),
				'address1' => $this->input->post('address1'),
				'address2' => $this->input->post('address2'),
				'address3' => $this->input->post('address3'),
				'other_language' => implode(",", $other_language),
				'name' => $this->input->post('name'),
				'contact_no' => $this->input->post('contact_no'),
				'e_mail' => $this->input->post('e_mail'),
				'relationship' => $this->input->post('relationship')
            );          
			//Pass user data to model
			$this->front_model->updateData($userData, $id);
			$base_url=base_url();
			redirect("$base_url"."Front/customerDashboard");
		}
	}
	function customerChangepassword()
	{
		$this->load->view('front/header');
		$this->load->view('front/customer_changepassword');
		$this->load->view('front/footer');
	}
	function customerMydiveTrips()
	{
		$this->load->view('front/header');
		$this->load->view('front/customer_mydiveTrips');
		$this->load->view('front/footer');
	}
	//Customer Section End //
	
	function help()
	{
		$data['help'] = $this->front_model->get_help();
		$this->load->view('front/header');
		$this->load->view('front/help', $data);
		$this->load->view('front/footer');
	}
        function addCart()
    {
        //$product = $this->front_model->get_product($this->input->post('id'));
        //var_dump($product);
        $insert = array(
            'id' => $this->input->post('id'), 
            'qty' => '1',
            'name' => $this->input->post('name'),
            'price' => $this->input->post('price')
            );
			//var_dump($insert);
        $this->cart->insert($insert);
        redirect('front/divecenter');
    }
    function remove($rowid) {
                    // Check rowid value.
        if ($rowid==="all"){
                       // Destroy data which store in  session.
            $this->cart->destroy();
        }
        else{
                    // Destroy selected rowid in session.
            $data = array(
                'rowid'   => $rowid,
                'qty'     => 0
            );
                     // Update cart data, after cancle.
            $this->cart->update($data);
        }
        
                 // This will show cancle data in cart.
        redirect('Front/divecenter');
    }
    function update_cart(){
                
                // Recieve post values,calcute them and update
       $cart_info =  $_POST['cart'] ;
        foreach( $cart_info as $id => $cart)
        {   
                    $rowid = $cart['rowid'];
                    $price = $cart['price'];
                    $amount = $price * $cart['qty'];
                    $qty = $cart['qty'];
                    
                        $data = array(
                'rowid'   => $rowid,
                                'price'   => $price,
                                'amount' =>  $amount,
                'qty'     => $qty
            );
             
            $this->cart->update($data);
        }
        redirect('Front/divecenter');        
    }   
    

    function removeCart($rowid)
    {
        $this->cart->update( array(
            'rowid' => $rowid,
            'qty' => 0 

            ));
        redirect('front/divecenter');
    }
    function updateCart()
    {
        $contents = $this->input->post();
        var_dump($contents);
        
        foreach ($contents as $content)
        {
            $info = array(
           'rowid' => $content['rowid'],
           'qty'   => $content['qty']
             );

            $this->cart->update($info);

        }
        //redirect('front/checkout');
    }
    function checkout()
    {
        $this->load->view('front/header');
        $this->load->view('front/checkout');
        $this->load->view('front/footer');
    }
	function tellmemore($id)
	{
		$data['tellmemore'] = $this->front_model->get_tellmemore($id);
		$this->load->view('front/tellmemore', $data);
	}

	
}


