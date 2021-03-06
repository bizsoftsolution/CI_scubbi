
<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Front extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
			$this->load->helper('file');
		//$this->load->library('session');
		$this->load->model('Front_model', 'front_model');
		$this->load->database();
		$this->load->library('googlemaps');
    }
	
	public function index()
	{	
		$scountry = $this->input->post('scountry');
		$travel_period = $this->input->post('travel_period');
		$tp = date("Y-m", strtotime($travel_period));
			
		//$data['total_rows'] = $this->db->count_all('special_offer');
		$data['specialoffer'] = $this->front_model->get_specialoffer();	
		$data['populardivedestination'] = $this->front_model->get_populardivedestination();
		$data['guidedtour'] = $this->front_model->get_guidedtour($scountry, $tp);
		$data['slider'] = $this->front_model->get_slider();
		//var_dump($data['guidedtour']);
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
		
		$data['country']= $this->input->post('scountry');	
		$data['islands']= $this->input->post('islands');	
		$data['Noofpersons']= $this->input->post('no_of_persons');	
		//}
		$data['per_page'] = $config['per_page'];
		$data['search'] = $this->front_model->get_searchdetails($config["per_page"], $data['page']);
		
		$data['num_rows'] = count($data['search']);
		if($data['search'] == 'fail')
		{
			$data['num_rows'] = 0;
				//  redirect('front/error_page');
				$this->load->view('front/search',$data);
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
	function divecenter($id,$sDate,$eDate,$no_of_persons)
	{
		//echo $sDate;
		/* $cin = $this->input->post('checkin');
		$data['Sdate']= $this->session->userdata($cin);
		
		$cout = $this->input->post('checkout');
		$data['Edate']= $this->session->userdata($cout); */
		
	//	$data['Noofpersons']= $this->input->post('no_of_persons');
		
		$data['divecenterpage'] = $this->front_model->get_allDetails($id);
		//$newDate = date('d-m-Y', strtotime($sDate));
		$data['sDate'] = $sDate;
		$data['eDate'] = $eDate;
		$data['no_of_persons'] = $no_of_persons;
		$data['d_id'] = $id;
		//$this->load->view('front/dive_center', $data);
		//$this->load->view('front/footer');
		if($data['divecenterpage'] == 'fail')
		{
				  redirect('front/error_page');
				//$this->load->view('front/error_page');
		}
		else
		{
			$this->load->view('front/dive_center', $data);
		}
	}
	function divecenter_search()
	{
		if($this->input->post('dive_search'))
		{
		$no_of_persons = $this->input->post('no_of_persons');
		
		$var1 = $this->input->post('checkin');
		$startdate = str_replace('/', '-', $var1);
		$sDate = date('d-m-Y', strtotime($startdate));
		
		$var2 = $this->input->post('checkout');
		$enddate = str_replace('/', '-', $var2);
		$eDate = date('d-m-Y', strtotime($enddate));
		
		//$sDate = $this->input->post('checkin');
		//$eDate = $this->input->post('checkout');
		$id = $this->input->post('diveid');
		return $this->divecenter($id,$sDate,$eDate,$no_of_persons);
		}
	}
	function tellmemore($id,$iid)
	{
		$data['tellmemore'] = $this->front_model->get_tellmemore($id);
		$data['iid'] = $id;
		$data['cid'] = $iid;
		//$this->load->view('front/tellmemore', $data);
		if($data['tellmemore'] == 'fail')
		{
				  redirect('front/error_page');
				//$this->load->view('front/error_page');
		}
		else
		{
			$this->load->view('front/tellmemore', $data);
		}
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
		$p_id="p-".$this->input->post("lproduct_id");
        $insert = array(
              "id"  => $_POST["product_id"],
		    "name"  => $_POST["product_name"],
			"qty"  => $_POST["quantity"],
		    "price"  => $_POST["product_price"]
            );
			$option_value = $this->input->post('optional_service');
			$option_value_new="";
			if(isset($option_value) && is_array($option_value))
			{	
				
				foreach($option_value as $row_option)
				{	
					$i=0;
					$option_value_new= explode('-', $row_option);
					
					foreach($option_value_new as $o1)
					{
						if($i==0)
						{
							 $product_name="product_name =".$o1."<br>";
						}
						else
						{
							 $price="Price =".$o1."<br>";
						}
						
						$i++;
					}
				
				} 
			}
			
			//echo $option_value_new;

			//var_dump($option_value_new);
			$this->cart->insert($insert);
			echo $this->view_cart();
		
    }
	 function view_cart()
 {
  $this->load->library("cart");
  $output = '<table class="table table-striped" id="cart_details">';
  
  $count = 0;
  foreach($this->cart->contents() as $items)
  {
   $count++;
   $output .= '
   <tr style="font-size:12px;"> 
    <td >'.$items["name"].'</td>
    <td style="padding:2px;">MYR '.$items["price"].' X '.$items["qty"].'</td>
    <td ">'.$items["subtotal"].'</td>
    <td style="padding:2px;"><a class="btn btn-danger btn-xs remove_inventory" id="'.$items["rowid"].'"><i class="fa fa-remove"></i></a</td>
   </tr>
   ';
  }
  $output .= '
   <tr>
    <td colspan="3" align="right">Total</td>
    <td>'.$this->cart->total().'</td>
   </tr>
   </table>
  ';

  if($count == 0)
  {
   $output = '<h3 align="center">Cart is Empty</h3>';
  }
  return $output;
 }
    function remove1($rowid) {
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
	 function remove()
	{
		$this->load->library("cart");
		$row_id = $_POST["row_id"];
		$data = array(
		'rowid'  => $row_id,
		'qty'  => 0
		);
	  $this->cart->update($data);
	  echo $this->view_cart();
 }
 function clear()
 {
	if($this->db->truncate('tbl_dummy_cart'))
	{
		if($this->db->truncate('tbl_dummy_cart_product'))
		{
			if($this->db->truncate('tbl_dummy_cart_product_optional'))
			{
				echo "Cart is Empty";
			}
		}
	}
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

	
function insertReview()
	{
		if($this->input->post('content'))
		{
			$review_date = date("Y-m-d H:i:s");
			$data = array(
			'description'=>$this->input->post('content'),
			'divecenter_id'=>$this->input->post('diveid'),
			'customer_id'=>$this->input->post('uuuid'),
			'date'=>$review_date
			);
		$this->front_model->insertReview($data);
		}
		
		
		//if($ir == 'true')
		//{
			//echo json_encode(array('status'=>TRUE));
		//}
	}
	function fetchProductDetails()
	{

		$insert = array(
            "id"  => $_POST["product_id"],
		    "dive_id"  => $_POST["dive_id"],
			"table"  => $_POST["table"],
			"checkin"  => $_POST["checkin"],
			"checkout"  => $_POST["checkout"],
			"noofPerson"  => $_POST["noofPerson"]
            );
			$data = $this->front_model->fetchProductDetails($insert);
			//var_dump($insert);
			if($_POST["table"] == 'tbl_dcleisure')
			{
				//echo "dsjfdjfhdjfh";
				echo $this->leisureProduct($data,$insert);
			}
			elseif($_POST["table"] == 'tbl_dccourses')
			{
				//echo "dsjfdjfhdjfh";
				echo $this->courseProduct($data,$insert);
			}
			elseif($_POST["table"] == 'tbl_dcpackage')
			{
				//echo "dsjfdjfhdjfh";
				echo $this->packageOffer($data,$insert);
			}
	}
	function leisureProduct($data,$insert)
	{

		//var_dump(data);
		foreach($data as $row)
		{
			$output = '
			<form action="" method="post" class="cartForm">
					<div class="col-md-12" style="background-color:#ccc;padding-top:20px;padding-bottom:20px;">
						<div class="row">
							<div class="col-md-3">
									<b style="font-size:20px;">'.$row->product_name.'</b>
									<input type="hidden" value="'.$row->product_price.'" name="price"/>
									<input type="hidden" value="'.$row->product_name.'" name="product_name"/>
									<input type="hidden" value="'.$insert['table'].'" name="table_name"/>
									<input type="hidden" value="'.$insert['id'].'" name="product_id"/>
									<input type="hidden" value="'.$insert['dive_id'].'" name="dive_id"/>
									<input type="hidden" value="'.$insert['checkin'].'" name="checkin"/>
									<input type="hidden" value="'.$insert['checkout'].'" name="checkout"/>
									<input type="hidden" value="'.$insert['noofPerson'].'" name="no_of_persons"/>
							</div><div class="col-md-3">
								<select name="no_of_dive_slt" class="form-control">';
									
									$checkin = $insert['checkin'];
									$checkout = $insert['checkout'];
									
			//---------------------Date Difference-----------------------------------------------------------------------
									
									$date1 = strtotime($checkin);
									$date2 = strtotime($checkout);
									$datediff = $date2 - $date1;
									$days_between = floor($datediff / (60 * 60 * 24));
											
									//echo $days_between;		
									$checkin1 = $insert['checkin'];
									$checkin1 = strtotime($checkin1);
									$slt_value =0;
									$renderqty = 0;
									$loglqdata = "";
									for($i=0;$i<=$days_between;$i++)
									{
										$loglqdata .= "Iterate: $i  " . $insert['checkin'] . "\n";
										// ----------------------No Limit----------------------------------
										if($row->product_max_day == 'No Limit')
										{
											$slt_value = $slt_value + $row->max_dive_day * $insert['noofPerson'];
											$loglqdata .= "  - No max \n";
										}
										else
										{

											if($row->product_unit == 'Dive')
											{
										//---------------------------Dive --------------------------
												$checkin1 = strtotime("+1 day", $checkin1);
												$newCheckin = date('Y-m-d', $checkin1);
												$avalabile=$this->front_model->checkAvalability($newCheckin,$insert['table'],$insert['dive_id'],$insert['id']);

												if($avalabile == 1)
												{
													
													$slt_value = $slt_value + $row->max_dive_day;

												}
												else 
												{
													foreach($avalabile as $rowAvalable)
													{
														 $booked_dive = $rowAvalable->booked_dives;	
														 $max_dive_day = $row->product_max_day;
														 $per_day_dive = $row->max_dive_day;
														 $check_ava = $max_dive_day - $booked_dive;
														 
														 if($check_ava >= $per_day_dive)
														 {
															 $slt_value = $slt_value + $row->max_dive_day;
														 } 
														 else{
															// $slt_value="";
														 }
													}
												}
												$loglqdata .= "  - $slt_value Dive \n";

											}
											else
											{

												
													$checkin1 = strtotime("+1 day", $checkin1);
												$newCheckin = date('Y-m-d', $checkin1);
												$avalabile=$this->front_model->checkAvalability($newCheckin,$insert['table'],$insert['dive_id'],$insert['id']);

												if($avalabile == 1)
												{
													
													$slt_value = $slt_value + ($row->max_dive_day * $insert['noofPerson']);

												}
												else 
												{
													foreach($avalabile as $rowAvalable)
													{
														 $booked_dive = $rowAvalable->booked_dives;	
														 $max_dive_day = $row->product_max_day;
														 $per_day_dive = $row->max_dive_day;
														 $check_ava = $max_dive_day - $booked_dive;
														 
														 if($check_ava >= $per_day_dive)
														 {
															 $slt_value = $slt_value + ($row->max_dive_day * $insert['noofPerson']);
														 } 
														 else{
															// $slt_value="";
														 }
													}
												}
											}
																				
											}
/*
											$output=$output.'
												<option value="'.$slt_value.'">'.$slt_value.'</option>
												';	
*/
											$renderqty = $slt_value;
											$loglqdata .= "  - Rendering $slt_value qty \n";
									}
									for($j=$renderqty;$j>=1;$j--)
									{
											$output=$output.'
												<option value="'.$j.'">'.$j.'</option>
												';	
									}
									
									$checkin = strtotime($checkin);
									$checkin = strtotime("+1 day", $checkin);
									
									//echo date('d-m-Y', $checkin);
								
		if ( !write_file('application/controllers/logrenderLeisureqty.txt', $loglqdata)){
     		echo 'Unable to write the file';
		}			
								
									
									
						$output=$output.'								
								</select>
							</div>
							<div class="col-md-3">
								<b>';
								$dive_user_id = $row->user_id;
								$currency = $this->db->get_where('tbl_dcprofile', array('user_id' => $dive_user_id))->result();
								foreach($currency as $rowcurrency)
								{
									$output= $output.$rowcurrency->dccurrency.'&nbsp;&nbsp;';
								}
								
						$output = $output.$row->product_price.'</b>
							</div>
							<div class="col-md-3">
							<button type="button" class="btn addCart" id="addCart" style="background-color:red;color:#fff;">Add to My Dive Cart</button>
							</div>
						</div>
						<div class="col-md-12">&nbsp;</div>
						<div class="row">
							<div class="col-md-12">
								'.$row->product_description.'  
							</div>
						
						</div>
						<div class="col-md-12">&nbsp;</div>
						<div class="row" >
							<div class="col-md-12" style="padding:0px;">
								
								<div class="col-md-4">
									<b>DIVE SITES</b><br>
									Soyak<br>
									The Builders<br>
									KM Sipadan<br>
									
									<br>
									<b>DIVER LEVEL</b><br>';
								
									$diver_level = explode(',',$row->diver_experience);
									foreach($diver_level as $row_diver_level)
									{
										$output=$output.$row_diver_level.'<br>';	
									}
					$output=$output.'<br>
									<b>DIVER SKILLS</b><br>';
									$diver_skill = explode(',',$row->diver_certification);
									foreach($diver_skill as $row_diver_skill)
									{
										$output=$output.$row_diver_skill.'<br>';	
									}
									
									
			$output=$output.'	<br>
									<b>DIVER SPECILALTIES</b><br>';
									$diver_specialties1 = explode(',',$row->diver_specialties);
									foreach($diver_specialties1 as $row_diver_specialties)
									{
										$output=$output.$row_diver_specialties.'<br>';	
									}
									
					$output=$output.' </div>
								<div class="col-md-4">
									<b>INCLUDED</b><br>';
									$includes = explode(',',$row->product_includes);
									foreach($includes as $row_includes)
									{
										$output=$output.$row_includes.'<br>';	
									}
					$output=$output.'<br>
									<b>EXCLUDED</b><br>';
									$excludes = explode(',',$row->product_excludes);
									foreach($excludes as $row_excludes)
									{
										$output=$output.$row_excludes.'<br>';	
									}
								$output=$output.'</div>
								
								<div class="col-md-4" style="padding:0px;">
									<b>OPTIONAL SERVICE</b><br><table class="optionservice">';
									$optional_services1 = explode(',',$row->optional_services);
									$i=1;
									$option_service_name[]="";
									foreach($optional_services1 as $row_optional_services)
									{
										//$output=$output.$row_optional_services.'<br>';	
										$option_service_name[$i]=$row_optional_services;
										$i++;
									}
								
										$j=1;
										$optional_services_price1 = explode(',',$row->optional_services_price);
										foreach($optional_services_price1 as $row_optional_services_price)
										{
											$dive_user_id = $row->user_id;
											$currency = $this->db->get_where('tbl_dcprofile', array('user_id' => $dive_user_id))->result();
											foreach($currency as $rowcurrency)
											{
												$optional_services_price_con[$i]=$row_optional_services_price;
												$optional_concat_name[$j] = $option_service_name[$j]."-".$optional_services_price_con[$i];
												//$output= $output.$rowcurrency->dccurrency.'&nbsp;'.$row_optional_services_price.'&nbsp;<input type="checkbox" name="optional_service_chk[]" value="'.$optional_concat_name[$j].'"/><br>';
												$output=$output.'<tr>
																	<td>'.$option_service_name[$j].'</td>
																	<td><b>'.$rowcurrency->dccurrency.'</b></td>
																	<td><b>'.$row_optional_services_price.'</b></td>
																	<td><input type="checkbox" name="optional_service_chk[]" value="'.$optional_concat_name[$j].'"/></td>
																</tr>';
											}
											$j++;
										}
										$output=$output.'
									</table>
									
									
									
								</div>
								
								<hr class="col-md-12">
								<div class="col-md-6">
									<b>BOOKING POLICY</b><br>';
									
									$booking = $this->db->get_where('tbl_booking_policies', array('user_id' => $dive_user_id))->result();
									foreach($booking as $rowbooking)
									{
										$output=$output.$rowbooking->booking_name.'<br>';
									}
					$output=$output.'</div>
								<div class="col-md-6">
									<b>CANCELLATION POLICY</b><br>';
									
									$cancellation = $this->db->get_where('tbl_cancellation_policies', array('user_id' => $dive_user_id))->result();
									foreach($cancellation as $rowcancellation)
									{
										$output=$output.$rowcancellation->cancellation_name.'<br>';
									}
								$output=$output.'</div>
							</div>
						</div>
					</div>
				</form>
			';
			}
			return $output;
		
	}	
	function courseProduct($data,$insert)
	{
		//var_dump(data);
		foreach($data as $row)
		{
			$output = '
			<form action="" method="post" class="cartForm1">
					<div class="col-md-12" style="background-color:#ccc;padding-top:20px;padding-bottom:20px;">
						<div class="row">
							<div class="col-md-3">
									<b style="font-size:20px;">'.$row->product_name.'</b>
									<input type="hidden" value="'.$row->product_normal_rate.'" name="price"/>
									<input type="hidden" value="'.$row->product_name.'" name="product_name"/>
									<input type="hidden" value="'.$insert['table'].'" name="table_name"/>
									<input type="hidden" value="'.$insert['id'].'" name="product_id"/>
									<input type="hidden" value="'.$insert['dive_id'].'" name="dive_id"/>
									<input type="hidden" value="'.$insert['checkin'].'" name="checkin"/>
									<input type="hidden" value="'.$insert['checkout'].'" name="checkout"/>
									<input type="hidden" value="'.$insert['noofPerson'].'" name="no_of_persons"/>
							</div><div class="col-md-3">
								<select name="no_of_dive_slt" class="form-control">';
									
									$checkin = $insert['checkin'];
									$checkout = $insert['checkout'];
									
			//---------------------Date Difference-----------------------------------------------------------------------
									
									$date1 = strtotime($checkin);
									$date2 = strtotime($checkout);
									$datediff = $date2 - $date1;
									$days_between = floor($datediff / (60 * 60 * 24));
											
									//echo $days_between;		
									$checkin1 = $insert['checkin'];
									$checkin1 = strtotime($checkin1);
									$slt_value =0;
									$renderqty = 0;
									for($i=0;$i<=$days_between;$i++)
									{
										// ----------------------No Limit----------------------------------
										if($row->product_max_day == 'No Limit')
										{
											$slt_value = $slt_value + $row->max_dive_day * $insert['noofPerson'];
										}
										else
										{

											if($row->product_unit == 'Dive')
											{
										//---------------------------Dive --------------------------
												
												$newCheckin = date('Y-m-d', $checkin1);
												$avalabile=$this->front_model->checkAvalability($newCheckin,$insert['table'],$insert['dive_id'],$insert['id']);

												if($avalabile == 1)
												{
													
													$slt_value = $slt_value + $row->max_dive_day;

												}
												else 
												{
													foreach($avalabile as $rowAvalable)
													{
														 $booked_dive = $rowAvalable->booked_dives;	
														 $max_dive_day = $row->product_max_day;
														 $per_day_dive = $row->max_dive_day;
														 $check_ava = $max_dive_day - $booked_dive;
														 
														 if($check_ava >= $per_day_dive)
														 {
															 $slt_value = $slt_value + $row->max_dive_day;
														 } 
														 else{
															// $slt_value="";
														 }
													}
												}
												$checkin1 = strtotime("+1 day", $checkin1);
											}
											else
											{

												
													
												$newCheckin = date('Y-m-d', $checkin1);
												$avalabile=$this->front_model->checkAvalability($newCheckin,$insert['table'],$insert['dive_id'],$insert['id']);

												if($avalabile == 1)
												{
													
													$slt_value = $slt_value + ($row->max_dive_day * $insert['noofPerson']);

												}
												else 
												{
													foreach($avalabile as $rowAvalable)
													{
														 $booked_dive = $rowAvalable->booked_dives;	
														 $max_dive_day = $row->product_max_day;
														 $per_day_dive = $row->max_dive_day;
														 $check_ava = $max_dive_day - $booked_dive;
														 
														 if($check_ava >= $per_day_dive)
														 {
															 $slt_value = $slt_value + ($row->max_dive_day * $insert['noofPerson']);
														 } 
														 else{
															// $slt_value="";
														 }
													}
												}
												$checkin1 = strtotime("+1 day", $checkin1);
											}
																				
											}
											$renderqty = $slt_value;
/*											
											$output=$output.'
												<option value="'.$slt_value.'">'.$slt_value.'</option>
												';	
*/
									}
									for($j=$renderqty;$j>=1;$j--)
									{
											$output=$output.'
												<option value="'.$j.'">'.$j.'</option>
												';	
									}
									$checkin = strtotime($checkin);
									$checkin = strtotime("+1 day", $checkin);
									
									//echo date('d-m-Y', $checkin);
								
								
									
									
						$output=$output.'								
								</select>
							</div>
							<div class="col-md-3">
								<b>';
								$dive_user_id = $row->user_id;
								$currency = $this->db->get_where('tbl_dcprofile', array('user_id' => $dive_user_id))->result();
								foreach($currency as $rowcurrency)
								{
									$output= $output.$rowcurrency->dccurrency.'&nbsp;&nbsp;';
								}
								
						$output = $output.$row->product_normal_rate.'</b>
							</div>
							<div class="col-md-3">
							<button type="button" class="btn addCart1" id="addCart" style="background-color:red;color:#fff;">Add to My Dive Cart</button>
							</div>
						</div>
						<div class="col-md-12">&nbsp;</div>
						<div class="row">
							<div class="col-md-12">
								'.$row->product_description.'  
							</div>
						
						</div>
						<div class="col-md-12">&nbsp;</div>
						<div class="row" >
							<div class="col-md-12" style="padding:0px;">
								
								<div class="col-md-2">
									<b>DIVE SITES</b><br>
									Soyak<br>
									The Builders<br>
									KM Sipadan<br>
									
									<br>
									<b>DIVER LEVEL</b><br>';
								
									$diver_level = explode(',',$row->diver_experience);
									foreach($diver_level as $row_diver_level)
									{
										$output=$output.$row_diver_level.'<br>';	
									}
					$output=$output.'<br>
									<b>DIVER SKILLS</b><br>';
									$diver_skill = explode(',',$row->diver_certification);
									foreach($diver_skill as $row_diver_skill)
									{
										$output=$output.$row_diver_skill.'<br>';	
									}
									
									
			$output=$output.'	<br>
									<b>DIVER SPECILALTIES</b><br>';
									$diver_specialties1 = explode(',',$row->diver_specialties);
									foreach($diver_specialties1 as $row_diver_specialties)
									{
										$output=$output.$row_diver_specialties.'<br>';	
									}
									
					$output=$output.' </div>
								<div class="col-md-2">
									<b>INCLUDED</b><br>';
									$includes = explode(',',$row->product_includes);
									foreach($includes as $row_includes)
									{
										$output=$output.$row_includes.'<br>';	
									}
					$output=$output.'<br>
									<b>EXCLUDED</b><br>';
									$excludes = explode(',',$row->product_excludes);
									foreach($excludes as $row_excludes)
									{
										$output=$output.$row_excludes.'<br>';	
									}
								$output=$output.'</div>
								
								<div class="col-md-4" style="padding:0px;">
									<b>OPTIONAL SERVICE</b><br><table class="optionservice">';
									if($row->optional_services == "Yes")
									{
										$optional_services1 = explode(',',$row->optional_services_service);
										$i=1;
	//									var_dump( $optional_services1);
										$option_service_name[]="";
										foreach($optional_services1 as $row_optional_services)
										{
											//$output=$output.$row_optional_services.'aaaa<br>';	
											$option_service_name[$i]=$row_optional_services;
											$i++;
										}
										
											$optional_services_required1 = explode(',',$row->optional_service_qty_required);
											$k=1;
											$option_service_qty_req[]="";
											foreach($optional_services_required1 as $row_optional_services_required)
											{
												$option_service_qty_req[$k]=$row_optional_services_required;
												$k++;
											}
									
											$j=1;
											$optional_services_price1 = explode(',',$row->optional_services_price);
											foreach($optional_services_price1 as $row_optional_services_price)
											{
												$dive_user_id = $row->user_id;
												$currency = $this->db->get_where('tbl_dcprofile', array('user_id' => $dive_user_id))->result();
												foreach($currency as $rowcurrency)
												{
													$optional_services_price_con[$i]=$row_optional_services_price;
													$optional_concat_name[$j] = $option_service_name[$j]."-".$optional_services_price_con[$i];
													//$output= $output.$rowcurrency->dccurrency.'&nbsp;'.$row_optional_services_price.'&nbsp;<input type="checkbox" name="optional_service_chk[]" value="'.$optional_concat_name[$j].'"/><br>';
													$output=$output.'<tr>
																		<td>'.$option_service_name[$j].'</td>
																		<td><b>'.$rowcurrency->dccurrency.'</b></td>
																		<td><b>'.$row_optional_services_price.'</b></td>
																		<td><input type="checkbox" name="optional_service_chk[]" value="'.$optional_concat_name[$j].'" /></td>
																		<td>';
																		
																		
										
												
												
												if($option_service_qty_req[$j] == "Y")
												{
													//echo $option_service_qty_req[$j];
													$output=$output.'
													<div class="input-group number-spinner '.$optional_concat_name[$j].'" style="display:none;">
														<span class="input-group-btn data-dwn">
															<a class="btn btn-danger inc" data-dir="dwn"><span class="glyphicon glyphicon-minus"></span></a>
														</span>
														<input type="text" class="form-control text-center qty" value="1" min="-10" max="40" name="qty">
														<span class="input-group-btn data-up">
															<a class="btn btn-success inc" data-dir="up"><span class="glyphicon glyphicon-plus"></span></a>
														</span>
													</div>';
												}
												else
												{
													
												}
										
												
											$output=$output.'								 
																																															</td>
																	</tr>';
												}
												$j++;
											}
									}
										$output=$output.'
									</table>
									
									
									
								</div>
									
								<div class="col-md-4" style="padding:0px;">
									<b>ACCOMMODATION</b><BR>
									
									<div class="col-md-6" style="padding:0px;">
										<b>Room Type :</b><br>
									
										<input type="radio" name="accommodation_type" value="1">Single<br>
										<input type="radio" name="accommodation_type" value="2">Twin Sharing<br>
										<input type="radio" name="accommodation_type" value="3">Tripple Sharing<br>
										<input type="radio" name="accommodation_type" value="4">Quad Sharing<br>
									</div>
									<div class="col-md-6" style="padding:0px;">
										<b>Bed Type :</b><br>';
										$output=$output.$row->oneperson_bed_type.'<br>';
										$output=$output.$row->twoperson_bed_type.'<br>';
										$output=$output.$row->threeperson_bed_type.'<br>';
										$output=$output.$row->fourperson_bed_type.'<br>';
										$output=$output.'
									</div>
									<div class="col-md-12" style="padding:0px;"><br>
										Extend Night MYR 30 Per Night <input type="checkbox"/>
										<br>
										<br>
									</div>
									<div class="col-md-6" style="padding:0px;">
										check in :<br>
										Check out :</br>
										Bathroom :<br>
										Accomodation Type: <br>
										Amenities :</br>
										
									</div>
									<div class="col-md-6" style="padding:0px;">';
										$output=$output.$row->checkintime.'<br>';
										$output=$output.$row->checkouttime.'<br>
										Attached<br>';
										$output=$output.$row->actype.'<br>';
										$amenities = explode(',',$row->amenities);
										foreach($amenities as $rowamenities)
										{
											$output=$output.$rowamenities.' | ';
										}
										
									$output=$output.'
									</div>
									
								</div>
								<hr class="col-md-12">
								<div class="col-md-6">
									<b>BOOKING POLICY</b><br>';
									
									$booking = $this->db->get_where('tbl_booking_policies', array('user_id' => $dive_user_id))->result();
									foreach($booking as $rowbooking)
									{
										$output=$output.$rowbooking->booking_name.'<br>';
									}
									$output=$output.'</div>
								<div class="col-md-6">
									<b>CANCELLATION POLICY</b><br>';
									
									$cancellation = $this->db->get_where('tbl_cancellation_policies', array('user_id' => $dive_user_id))->result();
									foreach($cancellation as $rowcancellation)
									{
										$output=$output.$rowcancellation->cancellation_name.'<br>';
									}
								$output=$output.'</div>
							</div>
						</div>
					</div>
				</form>
			';
			}
			return $output;
		
	}
	function packageOffer($data,$insert)
	{
//			$this->load->helper('file');
		//var_dump(data);
		foreach($data as $row)
		{
			$output = '
			<form action="" method="post" class="cartForm2">
					<div class="col-md-12" style="background-color:#ccc;padding-top:20px;padding-bottom:20px;">
						<div class="row">
							<div class="col-md-3">
									<b style="font-size:20px;">'.$row->product_name.'</b>
									<input type="hidden" value="'.$row->normal_product_price.'" name="price"/>
									<input type="hidden" value="'.$row->product_name.'" name="product_name"/>
									<input type="hidden" value="'.$insert['table'].'" name="table_name"/>
									<input type="hidden" value="'.$insert['id'].'" name="product_id"/>
									<input type="hidden" value="'.$insert['dive_id'].'" name="dive_id"/>
									<input type="hidden" value="'.$insert['checkin'].'" name="checkin"/>
									<input type="hidden" value="'.$insert['checkout'].'" name="checkout"/>
									<input type="hidden" value="'.$insert['noofPerson'].'" name="no_of_persons"/>
							</div><div class="col-md-3">
								<select name="no_of_dive_slt" class="form-control">';
									
									$checkin = $insert['checkin'];
									$checkout = $insert['checkout'];
									
			//---------------------Date Difference-----------------------------------------------------------------------
									
									$date1 = strtotime($checkin);
									$date2 = strtotime($checkout);
									$datediff = $date2 - $date1;
									$days_between = floor($datediff / (60 * 60 * 24));
											
									//echo $days_between;		
									$checkin1 = $insert['checkin'];
									$checkin1 = strtotime($checkin1);
									$slt_value =0;
									$renderqty = 0;
									$logoqdata = "";
									for($i=0;$i<=$days_between;$i++)
									{
										// ----------------------No Limit----------------------------------
										
											$slt_value += $insert['noofPerson'] ;
											$logoqdata .= "  - $i Rendering $slt_value qty \n";
/*										
											$output=$output.'
												<option value="'.$slt_value.'">'.$slt_value.'</option>
												';	
*/
									}
									$renderqty = $slt_value;
									$logoqdata .= "  - Rendering total $renderqty selects \n";
									for($j=$renderqty;$j>=1;$j--)
									{
											$output=$output.'
												<option value="'.$j.'">'.$j.'</option>
												';	
									}

									$checkin = strtotime($checkin);
									$checkin = strtotime("+1 day", $checkin);
									
									//echo date('d-m-Y', $checkin);
								
								
		if ( !write_file('application/controllers/logrenderOfferqty.txt', $logoqdata)){
     		echo 'Unable to write the file';
		}			
									
									
						$output=$output.'								
								</select>
							</div>
							<div class="col-md-3">
								<b>';
								$dive_user_id = $row->user_id;
								$currency = $this->db->get_where('tbl_dcprofile', array('user_id' => $dive_user_id))->result();
								foreach($currency as $rowcurrency)
								{
									$output= $output.$rowcurrency->dccurrency.'&nbsp;&nbsp;';
								}
								
						$output = $output.$row->normal_product_price.'</b>
							</div>
							<div class="col-md-3">
							<button type="button" class="btn addCart2" id="addCart" style="background-color:red;color:#fff;">Add to My Dive Cart</button>
							</div>
						</div>
						<div class="col-md-12">&nbsp;</div>
						<div class="row">
							<div class="col-md-12">
								'.$row->product_description.'  
							</div>
						
						</div>
						<div class="col-md-12">&nbsp;</div>
						<div class="row" >
							<div class="col-md-12" style="padding:0px;">
								
								<div class="col-md-2">
									<b>DIVE SITES</b><br>
									Soyak<br>
									The Builders<br>
									KM Sipadan<br>
									
									<br>
									<b>DIVER LEVEL</b><br>';
								
									$diver_level = explode(',',$row->diver_experience);
									foreach($diver_level as $row_diver_level)
									{
										$output=$output.$row_diver_level.'<br>';	
									}
					$output=$output.'<br>
									<b>DIVER SKILLS</b><br>';
									$diver_skill = explode(',',$row->diver_certification);
									foreach($diver_skill as $row_diver_skill)
									{
										$output=$output.$row_diver_skill.'<br>';	
									}
									
									
			$output=$output.'	<br>
									<b>DIVER SPECILALTIES</b><br>';
									$diver_specialties1 = explode(',',$row->diver_specialties);
									foreach($diver_specialties1 as $row_diver_specialties)
									{
										$output=$output.$row_diver_specialties.'<br>';	
									}
									
					$output=$output.' </div>
								<div class="col-md-2">
									<b>INCLUDED</b><br>';
									$includes = explode(',',$row->product_includes);
									foreach($includes as $row_includes)
									{
										$output=$output.$row_includes.'<br>';	
									}
					$output=$output.'<br>
									<b>EXCLUDED</b><br>';
									$excludes = explode(',',$row->product_excludes);
									foreach($excludes as $row_excludes)
									{
										$output=$output.$row_excludes.'<br>';	
									}
								$output=$output.'</div>
								
								<div class="col-md-4" style="padding:0px;">
									<b>OPTIONAL SERVICE</b><br><table class="optionservice">';
									$optional_services1 = explode(',',$row->optional_services);
									$i=1;
									$option_service_name[]="";
									foreach($optional_services1 as $row_optional_services)
									{
										//$output=$output.$row_optional_services.'aaaa<br>';	
										$option_service_name[$i]=$row_optional_services;
										$i++;
									}
								
										$j=1;
										$optional_services_price1 = explode(',',$row->optional_services_price);
										foreach($optional_services_price1 as $row_optional_services_price)
										{
											$dive_user_id = $row->user_id;
											$currency = $this->db->get_where('tbl_dcprofile', array('user_id' => $dive_user_id))->result();
											foreach($currency as $rowcurrency)
											{
												$optional_services_price_con[$i]=$row_optional_services_price;
												$optional_concat_name[$j] = $option_service_name[$j]."-".$optional_services_price_con[$i];
												//$output= $output.$rowcurrency->dccurrency.'&nbsp;'.$row_optional_services_price.'&nbsp;<input type="checkbox" name="optional_service_chk[]" value="'.$optional_concat_name[$j].'"/><br>';
												$output=$output.'<tr>
																	<td>'.$option_service_name[$j].'</td>
																	<td><b>'.$rowcurrency->dccurrency.'</b></td>
																	<td><b>'.$row_optional_services_price.'</b></td>
																	<td><input type="checkbox" name="optional_service_chk[]" value="'.$optional_concat_name[$j].'"/></td>
																</tr>';
											}
											$j++;
										}
										$output=$output.'
									</table>
									
									
									
								</div>
								<div class="col-md-4" style="padding:0px;">
									<b>ACCOMMODATION</b><BR>
									
									<div class="col-md-6" style="padding:0px;">
										<b>Room Type :</b><br>
									
										<input type="radio" name="accommodation_type" value="1">Single<br>
										<input type="radio" name="accommodation_type" value="2">Twin Sharing<br>
										<input type="radio" name="accommodation_type" value="3">Tripple Sharing<br>
										<input type="radio" name="accommodation_type" value="4">Quad Sharing<br>
									</div>
									<div class="col-md-6" style="padding:0px;">
										<b>Bed Type :</b><br>';
										$output=$output.$row->oneperson_bed_type.'<br>';
										$output=$output.$row->twoperson_bed_type.'<br>';
										$output=$output.$row->threeperson_bed_type.'<br>';
										$output=$output.$row->fourperson_bed_type.'<br>';
										$output=$output.'
									</div>
									<div class="col-md-12" style="padding:0px;"><br>
										Extend Night MYR 30 Per Night <input type="checkbox"/>
										<br>
										<br>
									</div>
									<div class="col-md-6" style="padding:0px;">
										check in :<br>
										Check out :</br>
										Bathroom :<br>
										Accomodation Type: <br>
										Amenities :</br>
										
									</div>
									<div class="col-md-6" style="padding:0px;">';
										$output=$output.$row->checkintime.'<br>';
										$output=$output.$row->checkouttime.'<br>
										Attached<br>';
										$output=$output.$row->actype.'<br>';
										$amenities = explode(',',$row->amenities);
										foreach($amenities as $rowamenities)
										{
											$output=$output.$rowamenities.' | ';
										}
										
									$output=$output.'
									</div>
									
								</div>
								<hr class="col-md-12">
								<div class="col-md-6">
									<b>BOOKING POLICY</b><br>';
									
									$booking = $this->db->get_where('tbl_booking_policies', array('user_id' => $dive_user_id))->result();
									foreach($booking as $rowbooking)
									{
										$output=$output.$rowbooking->booking_name.'<br>';
									}
					$output=$output.'</div>
								<div class="col-md-6">
									<b>CANCELLATION POLICY</b><br>';
									
									$cancellation = $this->db->get_where('tbl_cancellation_policies', array('user_id' => $dive_user_id))->result();
									foreach($cancellation as $rowcancellation)
									{
										$output=$output.$rowcancellation->cancellation_name.'<br>';
									}
								$output=$output.'</div>
								<hr class="col-md-12">
								<div class="col-md-12">
								<div class="featured-slider">';
								
								$data123 = $this->db->get_where('tbl_gallery', array('user_id' => $dive_user_id));
								$this->db->limit(4);
								$data124 =  $data123->result();
								foreach ($data124 as $cval24)
								{
									$output=$output.'<div class="col-md-3" style="padding: 0px;">
										<div class="papular-reviews">
											
												<div class="image">
													<img alt="Tour Package" src="'.base_url().'upload/DCprofile/gallery/'.$cval24->gallery.'" class="img-responsive" style="height:150px;width:200px;">
												</div>
											
										</div>
									</div>';
								
								} 
							
								
								$output=$output.'</div></div>
							</div>
						</div>
					</div>
				</form>
			';
			}
			return $output;
		
	}
	function addToCart()
	{
			
			$no_of_dive = $this->input->post('no_of_dive_slt');
			$optional_service = $this->input->post('optional_service_chk');
			$optional_service1 ="";
		
			/* $no_of_person = $this->input->post('no_of_persons');
			$room_type = $this->input->post('accommodation_type');
			
			$room_type1="";
			if($this->input->post('accommodation_type') == "1")
			{
				$room_type1 = "Single";
			}
			elseif($this->input->post('accommodation_type') == "2")
			{
				$room_type1 = "Twin Sharing";
			}
			elseif($this->input->post('accommodation_type') == "3")
			{
				$room_type1 = "Tripple Sharing";
			}
			elseif($this->input->post('accommodation_type') == "4")
			{
				$room_type1 = "Quad Sharing";
			}
			
			$no_of_rooms = $no_of_person / $room_type;
			$no_of_rooms_person = round($no_of_rooms); */
			
			$checkin1=$this->input->post('checkin');
			$checkout1=$this->input->post('checkout');
			$newCheckin = date('Y-m-d', strtotime($checkin1));
			$newCheckout = date('Y-m-d', strtotime($checkout1));
			$data = array(
					'check_in' => $newCheckin,
					'check_out' => $newCheckout,
					'no_of_persons' => $this->input->post('no_of_persons'),
					'dive_id' => $this->input->post('dive_id'),
					//'room_type'=>$room_type1,
					//'no_of_rooms'=>$no_of_rooms_person
						);
			$dummyProduct = array(
				'product_id' => $this->input->post('product_id'),
				'product_name' => $this->input->post('product_name'),
				'qty' => 1,
				'price' => $no_of_dive * $this->input->post('price'),
				'no_of_dive' => $no_of_dive,
				'table_name' => $this->input->post('table_name'),
				'user_id' => $this->input->post('dive_id')
				
			);
							
			$logaddcartdata = "";
			$logaddcartdata .= "Check-in:" . $this->input->post('checkin') . ", Check-out:" . $this->input->post('checkout') . "\n" .
				"  - ProductID: " . $this->input->post('product_id') . " [" . $this->input->post('product_name') . "], No of Dives:" . $no_of_dive . 
				", Unit Price:" . $this->input->post('price') . "\n from table:" . $this->input->post('table_name') . ", dive id:" . 
				$this->input->post('dive_id') ."\n";
			$result = $this->front_model->insertDummyProduct($data,$dummyProduct);
			
			if($result == 1)
			{
				$data1 = "You cannot add more than one product on the same tab";
				echo $this->viewCart($data1);
			}
			else if($result == 2)
			{
				$data1 = "Successfully Update the Cart";
				echo $this->viewCart($data1);
			}
			else
			{
				//echo "djfdgjfdgjf";
				$dummy_id = $result['dummy_id'];
				$dummy_product_id = $result['dummy_product_id'];
				if(isset($optional_service) && is_array($optional_service))
				{
					//echo "djfdgjfdgjf";
					$option_name_chk[]="";
					$option_price_chk[]="";
					$j=0;
					$displayCart =0;
					foreach($optional_service as $row_option)
					{
						  $explode_data = explode('-',$row_option);
						  $i=1;
						  foreach($explode_data as $row_explode)
						  {
							 // echo $row_explode."<br>";
							 if($i == 1) 
							 {
								 $option_name_chk[$j]=$row_explode;
							 }
							 else
							 {
								//$
								
								$option_price_chk[$j]=$row_explode;
							 }
							  $i++;
						  }
							//var_dump( $explode_data);
						$qty = 1;
						
						$insertOptional = array(
								'product_id' =>$this->input->post('product_id'),
								'product_name' =>$option_name_chk[$j],
								'qty' => $qty,
								'price' => $option_price_chk[$j],
								'total' => $qty * $option_price_chk[$j],
								'dummy_id' => $dummy_id,
								'dummy_product_id' => $dummy_product_id
						);
						$logaddcartdata .= "Optional -> $j :" . $option_name_chk[$j] . ", qty " . $qty . " x px " . $option_price_chk[$j] . ", dumid:" . $dummy_id . ", dumprdid:" . $dummy_product_id . "\n";
						if($this->db->insert('tbl_dummy_cart_product_optional', $insertOptional))
						{
							$displayCart = 1;
							
						}
						$j++;
							
					}
					if($displayCart == 1)
					{
							$data1 = "Product successfully added to Cart";
							echo $this->viewCart($data1);
					}
				//var_dump($option_price_chk);
				
				}

			if ( !write_file('application/controllers/logaddtocart.txt', $logaddcartdata)){
     		echo 'Unable to write the file';
		}			
			
				$data1 = "Product successfully added to Cart";
				echo $this->viewCart($data1);
				///
				
				
				
			}
			
			//var_dump( $data);
			
	
		//echo "fjkghjfh";
	}
	function viewCart($data1)
	{
			$resultOutput = '';
		 $this->db->select('*');
		 $this->db->from('tbl_dummy_cart_product');
		 $query = $this->db->get();
		 $res = $query->result();
		 $total = 0;
		 
			$resultOutput ='<tr style="color:red;font-weight:bold"><td colspan="4">'.$data1.'</td></tr>'; 
		 
			$i=1; 
		 foreach($res as $rrow)
		 {
			 $resultOutput = $resultOutput.'
							<tr>
								<td style="padding:3px;">'.$rrow->product_name.'</td>
								<td style="padding:3px;">'.$rrow->qty.'&nbsp;X&nbsp;'.$rrow->price.'&nbsp;&nbsp;</td>
								<td style="padding:3px;">'.number_format($rrow->qty * $rrow->price,2).'</td>
								<td style="padding:3px;color:red;" class="removeCart1" data-pk="'.$rrow->id.'" data-tbl="tbl_dummy_cart_product"><i class="fa fa-remove"></i></td>
								
							</tr>
					
			 ';
			 $total=$total + $rrow->qty * $rrow->price;
			 $this->db->select('*');
			 $this->db->from('tbl_dummy_cart_product_optional');
			 $this->db->where('dummy_product_id',$rrow->id);
			 $query1 = $this->db->get();
			 $res1 = $query1->result();
			 foreach($res1 as $rrow1)
			 {
				  $resultOutput = $resultOutput.'
				  <hr>
							<tr>
								<td style="padding:3px;">'.$rrow1->product_name.'</td>
								<td style="padding:3px;">'.$rrow1->qty.'&nbsp;X&nbsp;'.$rrow1->price.'&nbsp;&nbsp;</td>
								<td style="padding:3px;">'.number_format($rrow1->qty * $rrow1->price,2).'</td>
								<td style="padding:3px;color:red;width:10px;" class="removeCart" data-pk="'.$rrow1->id.'" data-tbl="tbl_dummy_cart_product_optional"><i class="fa fa-remove"></a></td>
							</tr>';
							$total=$total + $rrow1->qty * $rrow1->price;
			 }
			 $i++;
		 }
		 $resultOutput = $resultOutput.'<tr><td>&nbsp;</td><td><b>Total</b></td><td>'.number_format($total,2).'</td><td>&nbsp;</td></tr>';
		 return $resultOutput;
	}
	function removeCartDetails()
	{
		$id = $_POST['product_id'];
		//$table = $_POST['table'];
		//echo "product removed".$id;
		//echo $this->viewCart($data);
		$this->db->select('*');
		$this->db->from('tbl_dummy_cart_product');
		$this->db->where('id', $id);
		$query = $this->db->get();
		$res = $query->result();
		foreach($res as $prdt_row)
		{
			$Qty = $prdt_row->qty;
			$newqty = $Qty-1;
			if($newqty > 0)
			{
				$data_val = array('qty'=>$newqty);
				$this->db->where('id', $prdt_row->id);
				if($this->db->update('tbl_dummy_cart_product', $data_val))
				{ 
					$opt_table = $this->db->get_where('tbl_dummy_cart_product_optional', array('dummy_product_id', $id));
					if($opt_table->num_rows() > 0)
					{	
						foreach($opt_table->result() as $opt_table_row)
						{
						//echo "hai";
						$qty_opt = $opt_table_row->qty;
						
						if($qty_opt <= $newqty)
						{
							$abd = "Deleted Successfully";
							echo $this->viewCart($abd);
						}
						else
						{	
							
							$qtty_opt = $qty_opt - 1;
							$qtty_opt12 = array('qty'=>$qtty_opt);
							$this->db->where('id', $opt_table_row->id);
							if($this->db->update('tbl_dummy_cart_product_optional', $qtty_opt12))
							{
								$data = "Deleted Successfully!";
								echo $this->viewCart($data);
							}
						} 
						}
					}
					else
					{
						$data = "Deleted Successfully!";
						echo $this->viewCart($data);
					}
					
				}
			}
			else
			{
				if($this->db->delete('tbl_dummy_cart_product', array('id'=>$id)))
				{
					if($this->db->delete('tbl_dummy_cart_product_optional', array('dummy_product_id'=>$id)))
					{
						$data = "Deleted Successfully!";
						echo $this->viewCart($data);
					}
				}
				
			}
			//echo $this->viewCart($abc);
		}
	}
	
	function removeCartDetails1()
	{
		$id = $_POST['product_id'];
		
		$this->db->select('*');
		$this->db->from('tbl_dummy_cart_product_optional');
		$this->db->where('id', $id);
		$query = $this->db->get();
		$res = $query->result();
		foreach($res as $prdt_row)
		{
			$qty_optl = $prdt_row->qty;
			$qty_del_optl = $qty_optl - 1;
			if($qty_del_optl > 0)
			{
				$new_qty_optl = array('qty'=>$qty_del_optl);
				$this->db->where('id', $prdt_row->id);
				$this->db->update('tbl_dummy_cart_product_optional', $new_qty_optl);
				$data = "Deleted Successfully";
				echo $this->viewCart($data);
			}
			else
			{
				if($this->db->delete('tbl_dummy_cart_product_optional', array('id'=>$id)))
					{
						$data = "Deleted Successfully!";
						echo $this->viewCart($data);
					}
			}
		}
	}
	//-------------------------------Popular Diving Destination-----------------------
	function becomeapartner()
	{
		//$data['help'] = $this->front_model->get_help();
		//$this->load->view('front/header');
		$this->load->view('front/becomea_partner');
		$this->load->view('front/footer');
	}
	function addBecomeapartner()
	{
		if($this->input->post('textdcn'))
		{
			$data = array(
			'dive_center_name'=>$this->input->post('textdcn'),
			'contact_person'=>$this->input->post('textcp'),
			'business_registration_no'=>$this->input->post('textbrn'),
			'country'=>$this->input->post('textsc'),
			'island'=>$this->input->post('texti'),
			'email_address'=>$this->input->post('textea'),
			'phone_no'=>$this->input->post('textpn')
			);
			if($this->front_model->addBecomeapartner($data))
			{
				echo "success";
			}
		}
	}
		public function pdd_overview($country_id)
	{
		
		$config1['zoom'] = "auto";
		$this->googlemaps->initialize($config1);
		$coords = $this->front_model->get_divepointcoordinates($country_id);
		foreach ($coords as $coordinate) {
		 $marker = array();
		 $marker1 = array();
		 $marker['position'] = $coordinate->coords_x.','.$coordinate->coords_y;
		 //$marker1['infowindow_content'] = $coordinate->dcname;
		 
		  $marker1['position'] = '4.2105, 101.9758';
			$marker1['icon'] = 'http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=|9999FF|000000';
		 $this->googlemaps->add_marker($marker1);
		 $this->googlemaps->add_marker($marker);
		 }
		 // Create the map
		 $data['map'] = $this->googlemaps->create_map();
		//$data['total_rows'] = $this->db->count_all('special_offer');
		$data['cid_dive'] = $country_id;
		$data['populardivedestination'] = $this->front_model->get_pdd_overview($country_id);
		
		if($data['populardivedestination'] == 'fail')
		{
				  redirect('front/error_page');
				//$this->load->view('front/error_page');
		}
		else
		{
			$this->load->view('front/populardivingOverview', $data);
		}
			   
	}
	function divesitesOverview($id)
	{
		$data['divesitesOverview'] = $this->front_model->get_divesitesOverview($id);
		//$this->load->view('front/tellmemore', $data);
		if($data['divesitesOverview'] == 'fail')
		{
				  redirect('front/error_page');
				//$this->load->view('front/error_page');
		}
		else
		{
			$this->load->view('front/divesitesOverview', $data);
		}
	} 
		public function contactDiveCenter($dcid)
	   {
		
			$data['dcid']= $dcid;
		    $this->load->view('front/header');
			$this->load->view('front/contact_dive_center',$data);
			$this->load->view('front/footer');
		   
	   }
	   function CheckEmailAvalability()
	{
		$email = $this->input->post('email');
		$emailCheck = $this->db->get_where('tbl_becomeapartner',array('email_address' =>$email));
		if($emailCheck->num_rows() == 0)
		{
			//echo $emailCheck->num_rows();
			echo "1";
		}
		else
		{
			//echo $emailCheck->num_rows();
			echo "Email-id already exist, please use another";
		}
			
	}
	function CheckEmailAvalabilitySignUp()
	{
		$email = $this->input->post('email');
		$emailCheck = $this->db->get_where('tbl_customerprofile',array('email' =>$email));
		if($emailCheck->num_rows() == 0)
		{
			//echo $emailCheck->num_rows();
			echo "1";
		}
		else
		{
			//echo $emailCheck->num_rows();
			echo "Email-id already exist, please use another";
		}
			
	}

	function divecenterPopup()
	{
		
		$sDate = $this->input->post('sdate_popup');
		$eDate = $this->input->post('edate_popup');
		$no_of_persons = $this->input->post('nop_popup');
		$id = $this->input->post('diveid_popup');
		
		if($this->front_model->send_DivecenterData())
		{
			redirect('Customer/customerDashboard');
		}
		
	}
	
}

?>
