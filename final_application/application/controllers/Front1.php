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
		// Special offer pagination
		
		$config['base_url'] = base_url('Front/index');
        $config['total_rows'] = $this->db->count_all('special_offer');
        $config['per_page'] = "4";
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
		$data['specialoffer'] = $this->front_model->get_specialoffer($config["per_page"], $data['page']);
		$data["links"] = $this->pagination->create_links();
		
		// popular dive destination pagination		
		$data['populardivedestination'] = $this->front_model->get_populardivedestination();
		
		$data['slider'] = $this->front_model->get_slider();
		$this->load->view('front/header');
		$this->load->view('front/slider', $data);
		$this->load->view('front/index', $data);
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
		$data['offerpagination'] = $this->front_model->get_specialoffer($config["per_page"], $data['page']);
		$this->load->view('front/header');
		$this->load->view('front/viewmoreOffer', $data);
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
		// date diff function
		$strdate = $this->input->post('start');
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
		
		$data['search'] = $this->front_model->get_searchdetails();
		//$data['islands'] = $this->front_model->get_cities();
		$this->load->view('front/header');
		//$this->load->view('front/slider');
		$this->load->view('front/search', $data);
		$this->load->view('front/footer');
	}
	function divecenter()
	{
		$data['divecenter'] = $this->front_model->get_divecenter();
		$data['generalinfo'] = $this->front_model->get_generalinfo();
		$data['fundive'] = $this->front_model->get_fundive();
		$data['courses_specialties'] = $this->front_model->get_courses_specialties();
		$data['packages'] = $this->front_model->get_packages();
		$this->load->view('front/header');
		$this->load->view('front/dive_center', $data);
		$this->load->view('front/footer');
	}
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
            'id' => $this->input->post('id') , 
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


	
}


