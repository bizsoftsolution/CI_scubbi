<?php
class DCavailabiltycalendar extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('DCcalendarmodel');
    $this->load->helper('url');
	  $this->load->library('session');
	if ($this->session->userdata('user_type') != 'DCADMIN')
	{
        redirect('login');
	}
  }
  
  //**********************************************************************************************************************************************
 //                                                                   [ Dive Center Profile Start] //***********************************************************************************************************************************************
 
 
  
  function index()
  {
 //   $data=$this->DCcalendarmodel->DCcalendarlist1();

    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $this->load->view('mybookings/DCavailability_calendar');
    $this->load->view('template/footer');
  }  
  function AvailabilityList()
  {
 //   $data=$this->DCcalendarmodel->DCcalendarlist1();

    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $this->load->view('mybookings/DCavailability_list');
    $this->load->view('template/footer');
  }  
  function dayCal()
  {
 //   $data=$this->DCcalendarmodel->DCcalendarlist1();

    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $this->load->view('mybookings/DCdayCal');
    $this->load->view('template/footer');
  }  
  function datavalue()
  {
    $data=$this->DCcalendarmodel->DCcalendarlist1();
  }
  function eventslist()
  {
    $data=$this->DCcalendarmodel->DCeventslist();
    //$data="";
  }
  function addEvent()
  {

		if($this->input->post('prod'))
		{
			$posted = "posted " . $this->uri->segment(3) . ", " . $this->uri->segment(4) . ", prod:" . $this->uri->segment(5);
		} else {
			$posted = "not posted";
		}
	    $data = array(
	    "start" => $this->uri->segment(3),
	    "end" => $this->uri->segment(4),
	    "res" => $this->uri->segment(5),
	    "posted" => $posted	    
	    );
		$this->load->view('mybookings/addEvent',$data);
		
  }
  function updateDateType()
  {
	    
//		$json = file_get_contents('php://input');
// $params = json_decode($json);
//echo $params;
	
	$start = $this->input->get("start");
	//echo $start;
	$end = $this->input->get("end");
	$prod = $this->input->get("prod");
	$prodid = substr($prod,1);	
	$dtype = $this->input->get("dtype");

	//echo("<br>From $start to $end <br> for $prod assigning $dtype <br>");

	switch(substr($prod,0,1)) {
	case 'L':
		$tabsrc = "tbl_dcleisure";
	break;
	case 'C':
		$tabsrc = "tbl_dccourses";
	break;
	case 'P':
		$tabsrc = "tbl_dcpackage";
	break;
	default:
		$tabsrc = "not found";
	break;
	}
	echo "Table " . $tabsrc . ", ID:" . $prodid . "<br>";		
	
	$dbegin = new DateTime( substr($start,0,10) );
	$dend   = new DateTime( substr($end,0,10) );

	for($i = $dbegin; $i < $dend; $i->modify('+1 day')){
		$sdate = $i->format("Y-m-d");
   	echo $i->format("Y-m-d") . "<br>";
    	$data = $this->DCcalendarmodel->setProdAvailability($sdate,$tabsrc,$prodid,$dtype);
    	echo $i->format("Y-m-d") . " $data <br>";
	}
	/*$response = array(
		'result' => 'OK',
		'message' => 'Created',
		'id' => '1'
	);*/
	
//echo json_encode($response);
	echo "<br>&nbsp;<br> Press anywhere outside this box to continue....";
  }
  function dayType()
  {
	  $aa="";
	  $qq = $this->db->get("tbl_booking_availability")->result();
	  $i=1;
	  foreach($qq as $row)
	  {
		  $aa[] = array(
				$row->bookeddate => $row->day_type
		  );
		  $i++;
		  //var_dump($aa);
		//echo $row->bookeddate."<br>";
		//echo $row->table_name."<br>";
		//echo $row->day_type."<br>";
		
		
	  }
	  echo json_encode($aa);
  }
  function availlist()
  {
//$json = file_get_contents('php://input');
//$params = json_decode($json);
//echo $params;
	
$result1 = $this->db->query("SELECT a.id, a.booked_dives text, a.bookeddate start, DATE_ADD(a.bookeddate, INTERVAL 1 DAY) end, concat(ucase(substring(a.table_name,7,1)),a.product_id) resource, concat(a.day_type,a.booked_dives) bubbleHtml, c.dftcolor backColor  FROM tbl_booking_availability a join tbl_daycolor c on a.day_type = c.id WHERE a.bookeddate >= NOW()"); // '.$params->start.'");
// $result = $result1->result();
 
$events = $result1->result_array();
echo json_encode($events); 

}

  function busy()
  {
//$json = file_get_contents('php://input');
//$params = json_decode($json);
//echo $params;
	
$result1 = $this->db->query("SELECT a.id, concat(a.day_type) text, a.bookeddate start, DATE_ADD(a.bookeddate, INTERVAL 1 DAY) end, concat(ucase(substring(a.table_name,7,1)),a.product_id) resource, concat(a.day_type,a.booked_dives) bubbleHtml, c.dftcolor backColor  FROM tbl_booking_availability a join tbl_daycolor c on a.day_type = c.id WHERE a.bookeddate >= NOW()"); // '.$params->start.'");
// $result = $result1->result();

 
$events = $result1->result_array();

/*
foreach($result as $row) {

	switch($row->table_name) {
	case "tbl_dcleisure":
		$resource = "L" . $row->product_id;
	break;
	case "tbl_dccourses":
		$resource = "C" . $row->product_id;
	break;
	case "tbl_dcpackage":
		$resource = "P" . $row->product_id;
	break;
	default:
		$resource = $row->product_id;
	break;
	}

  $events[]= array(
	'id' => $row->id,
  'text' => $row->day_type . $row->booked_dives,
  'start' => $row->bookeddate ,
  'end' => $row->endd ,
  'resource' => $resource,
//  'moveDisabled' => true,
// 'resizeDisabled' => true,
//  'clickDisabled' => true,
//  'backColor' => "#E69138",   // lighter #F6B26B
  'bubbleHtml' => "Not Available"
);

}
*/
echo json_encode($events); 

  }
  function editEventCont()
  {
	   $data = array(
	    "id" => $this->uri->segment(3)  
	    );
	  $this->load->view('mybookings/editEvent',$data);
  }
  function editDateType()
  {
	  $id = $this->input->get('id');
	  $day_type = $this->input->get('dtype');
	 // echo $id."gjgj";
	 
	 $value=array('day_type'=>$day_type);
		 $this->db->where('id',$id);
		 if( $this->db->update('tbl_booking_availability',$value))
		 {
			 echo "Updated Successfully";
		 }
  }
  
  
  
  //**********************************************************************************************************************************************//
 //                                                                   [ Dive Center Profile END] //***********************************************************************************************************************************************//
 
 function bulkDateUpdated()
	{
		if($this->input->post('submit_bulk_data'))
		{
			$startDate = $this->input->post('bpdatestart');
			$endDate = $this->input->post('bpdateend');
			$leisureProduct = $this->input->post('leisure_product');
			$coursesProduct = $this->input->post('courses_product');
			$packageProduct = $this->input->post('package_product');
			$guidedProduct = $this->input->post('guided_product');
			$days = $this->input->post('day');
			$dayType = $this->input->post('dayType');
			
			

//************************** Leisure Product ******************************************/
			if(!empty($leisureProduct))
			{
				foreach($leisureProduct as $row)
				{
					$date1 = str_replace('/', '-', $startDate);
					$start_range= date('Y-m-d', strtotime($date1));
					
					$date2 = str_replace('/', '-', $endDate);
					$end_range= date('Y-m-d', strtotime($date2));
					
					$begin  = new DateTime($start_range);
					$end    = new DateTime($end_range);
					
					while ($begin <= $end) // Loop will work begin to the end date 
					{
						if($begin->format("D") == $days ) //Check that the day is Sunday here
						{
							$newDate = $begin->format("Y-m-d");	
							$this->DCcalendarmodel->setProdAvailability($newDate,'tbl_dcleisure',$row,$dayType);
						}
						$begin->modify('+1 day');
					}
				}
			}
		
//************************** Courses Product ******************************************/
			if(!empty($coursesProduct))
			{
				foreach($coursesProduct as $row1)
				{
					$date1 = str_replace('/', '-', $startDate);
					$start_range= date('Y-m-d', strtotime($date1));
					
					$date2 = str_replace('/', '-', $endDate);
					$end_range= date('Y-m-d', strtotime($date2));
					
					$begin  = new DateTime($start_range);
					$end    = new DateTime($end_range);
					
					while ($begin <= $end) // Loop will work begin to the end date 
					{
						if($begin->format("D") == $days ) //Check that the day is Sunday here
						{
							$newDate = $begin->format("Y-m-d");	
							$this->DCcalendarmodel->setProdAvailability($newDate,'tbl_dccourses',$row1,$dayType);
						}
						$begin->modify('+1 day');
					}
				}
			}
		
					
//************************** Guided Product ******************************************/
			if(!empty($guidedProduct))
			{
				foreach($guidedProduct as $row2)
				{
					$date1 = str_replace('/', '-', $startDate);
					$start_range= date('Y-m-d', strtotime($date1));
					
					$date2 = str_replace('/', '-', $endDate);
					$end_range= date('Y-m-d', strtotime($date2));
					
					$begin  = new DateTime($start_range);
					$end    = new DateTime($end_range);
					
					while ($begin <= $end) // Loop will work begin to the end date 
					{
						if($begin->format("D") == $days ) //Check that the day is Sunday here
						{
							$newDate = $begin->format("Y-m-d");	
							$this->DCcalendarmodel->setProdAvailability($newDate,'tbl_dcguidedtours',$row2,$dayType);
						}

						$begin->modify('+1 day');
					}
					
				}
			}
		
								
//************************** Package Product ******************************************/
			if(!empty($packageProduct))
			{
				foreach($packageProduct as $row3)
				{
					$date1 = str_replace('/', '-', $startDate);
					$start_range= date('Y-m-d', strtotime($date1));
					
					$date2 = str_replace('/', '-', $endDate);
					$end_range= date('Y-m-d', strtotime($date2));
					
					$begin  = new DateTime($start_range);
					$end    = new DateTime($end_range);
					
					while ($begin <= $end) // Loop will work begin to the end date 
					{
						if($begin->format("D") == $days ) //Check that the day is Sunday here
						{
							$newDate = $begin->format("Y-m-d");	
							$this->DCcalendarmodel->setProdAvailability($newDate,'tbl_dcpackage',$row3,$dayType);
						}

						$begin->modify('+1 day');
					}
				}
			}
		
			$this->index();
			

		}
		else
		{
			$this->load->view('template/header');
			$this->load->view('template/sidebar');
			$this->load->view('mybookings/bulkDateUpdate');
			$this->load->view('template/footer');
		}
	}

}
?>
