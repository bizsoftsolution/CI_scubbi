<?php
class DCprofile extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('DCprofilemodel');
        $this->load->helper('url');
        $this->load->library('session');
if (($this->session->userdata('user_type') != 'DCADMIN') && ($this->session->userdata('user_type') != 'SUPERADMIN') && ($this->session->userdata('user_type') != 'CUSTOM'))
		{
			redirect('login');
		}
	
    }
    
    //**********************************************************************************************************************************************
    //                                                                   [ Dive Center Profile Start] //***********************************************************************************************************************************************
    
    public function addNew()
    {
        $user_id = $this->session->userdata('user_id');
        $save    = $this->DCprofilemodel->dataAvailabilityCheck($user_id);
		
		$country_id = $this->input->post('dive_center_country');
		
			//******************************************************************************************************************************************Dive Center id Generation*************************************************************** **************************************************************************************************************

		$alphabet = "";
		
		$num = "";
		//$country_code1 = $this->db->get_where('tbl_country',array('country_id',$country_id))->result();
		
//-------------------country Code starts-------------------------------------------------------->		
		$this->db->select('*');
		$this->db->where('country_id',$country_id);
		$country_code1 = $this->db->get('tbl_country')->result();
		//$sql = "SELECT * from tbl_country where country_id= '".$country_id."'";
		//$country_code1 = $this->db->query($sql);
		$country_code = "";
		//var_dump($country_code1);
		foreach($country_code1 as $rowCountry)
		{
			 $country_code = $rowCountry->country_code;
			 
		}
		
	//	echo $country_code."A".$number = sprintf('%03d',1);

	
	
//-------------------Alphabet starts-------------------------------------------------------->		
		
		$result1 = $this->db->query("select * from tbl_dcprofile where dccountry = '".$country_id."'");
		
		$rowcount=$result1->num_rows();
		
		if($rowcount <=999)
		{
			$alphabet = 'A';
		}
		else if ($rowcount >=999 && $rowcount <= 1999)
		{
			$alphabet = 'B';
		}
		else if ($rowcount >1999 && $rowcount <= 2999)
		{
			$alphabet = 'C';
		}
		else if ($rowcount >2999 && $rowcount <= 3999)
		{
			$alphabet = 'D';
		}
		else if ($rowcount >3999 && $rowcount <= 4999)
		{
			$alphabet = 'E';
		}
		else if ($rowcount >4999 && $rowcount <= 5999)
		{
			$alphabet = 'F';
		}
		else if ($rowcount >5999 && $rowcount <= 6999)
		{
			$alphabet = 'G';
		}
		else if ($rowcount >7999 && $rowcount <= 8999)
		{
			$alphabet = 'H';
		}
		else if ($rowcount >9999 && $rowcount <= 10999)
		{
			$alphabet = 'I';
		}
		

//-------------------Alphabet starts-------------------------------------------------------->		
		if($rowcount > 0)
		{
			$result2 = $this->db->query("select max(id) as maxId  from tbl_dcprofile where dccountry = '".$country_id."'")->result();
		
			foreach($result2 as $numRows)	
			{
				$maxId = $numRows->maxId;
				$result3 = $this->db->query("select * from tbl_dcprofile where id = '".$maxId."' ")->result();
				foreach($result3 as $divRow)
				{
					$diveId = $divRow->dc_id;
					$num1 = substr($diveId,3,5);
					if($num1 == 999)
					{
						$num = '001';
					}
					else
					{
						$num = sprintf('%03d',$num1+1);
					}
					
				}
				
			}
		}
		else
		{
			$num = '001';
		}
		
		$diveCenterId = $country_code.$alphabet.$num;
		
			
		
		
			
//******************************************************************************************************************************************Dive Center id Generation Ends *************************************************************** **************************************************************************************************************	
		
		

		
		
		
        if ($save == 0) {
            $result = array(
                'message' => ''
            );
            
            if ($this->input->post('submit_DCprofile')) {
                //Check whether user upload picture
                if (!empty($_FILES['file']['name'])) {
                    $config['upload_path']   = './upload/DCprofile/';
                    $config['allowed_types'] = 'jpg|jpeg|png|gif';
                    $config['file_name']     = $_FILES['file']['name'];
                    
                    //Load upload library and initialize configuration
                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);
                    
                    if ($this->upload->do_upload('file')) {
                        $uploadData         = $this->upload->data();
                        $divecenter_picture = $uploadData['file_name'];
                    } else {
                        $divecenter_picture = '';
                    }
                } else {
                    $divecenter_picture = '';
                }
				
				/* $j=0;
				for($i=0; $i<10; $i++)
				{
					if($this->input->post('dcaffiliation_padi['.$i.']') !="" && $this->input->post('dcaffiliation_member_no['.$i.']')!="")
					{
						$padi_affiliation[$j] = $this->input->post('dcaffiliation_padi['.$i.']');
						$padi_affi_member_no[$j] = $this->input->post('dcaffiliation_member_no['.$i.']');
						$j++;
					}
					
				} */
                //Prepare array of user data
				
				$dcfacilities = "";
				if($this->input->post('dcfaci') !="")
				{
					$dcf = implode(",", $this->input->post('dcfacilities'));
					$dcfacilities = $dcf.','.strtoupper($this->input->post('dcfaci'));
				}
				elseif($this->input->post('dcfacilities') !="")
				{
					$dcfacilities = implode(",", $this->input->post('dcfacilities'));
				}
				else
				{
					$dcfacilities ="";
				}
				
                //$dcfacilities      = $this->input->post('dcfacilities');
                $dcaffiliation     = $this->input->post('dcaffiliation');
                //$dcaffiliation_padi     = $this->input->post('dcaffiliation_padi');
                //$membershipnumber     = $this->input->post('dcaffiliation_member_no');
                $diveseason        = "";
				if($this->input->post('diveseason') !="")
				{
					$diveseason = implode(",", $this->input->post('diveseason'));
				}
				else
				{
					$diveseason = "";
				}
				$dlanguages = "";
				if($this->input->post('dlang') !="")
				{
					$dcl = implode(",", $this->input->post('dlanguages'));
					$dlanguages = $dcl.','.strtoupper($this->input->post('dlang'));
				}
				elseif($this->input->post('dlanguages') !="")
				{
					$dlanguages = implode(",", $this->input->post('dlanguages'));
				}
				else
				{
					$dlanguages = "";
				}
				
                //$dlanguages        = $this->input->post('dlanguages');
				
                $docrequireddiver  = $this->input->post('docrequireddiver');
				
				$custom_accom_info_display = "";
				if($this->input->post('custom_accom_info_display') !="")
				{
					$custom_accom_info_display = "TRUE";
				}
				else
				{
					$custom_accom_info_display = "FALSE";
				}
			
                $userData          = array(
                    'dcname' => $this->input->post('name'),
                    'dc_id' => $diveCenterId,
                    'dcimage' => $divecenter_picture,
                    'dcdescription' => $this->input->post('description'),
                    'dccountry' => $this->input->post('dive_center_country'),
                    'dcislands' => $this->input->post('dive_center_island'),
                    'dcgps_x' => $this->input->post('gpsx'),
                    'dcgps_y' => $this->input->post('gpsy'),
                    'dcreg_co_name' => $this->input->post('rcname'),
                    'dcbusiness_reg_no' => $this->input->post('brnumber'),
                    'dcbusi_telephone_no' => $this->input->post('tpnumber'),
                    'dcbilling_address' => $this->input->post('baddress'),
                    'dcbusi_fax_no' => $this->input->post('faxnumber'),
                    'dcaddress' => $this->input->post('dcaddress'),
                    'dctelephone_no' => $this->input->post('dctpnumber'),
                    'dcfax_no' => $this->input->post('dcfaxnumber'),
                    'dcemailid' => $this->input->post('emailid'),
                    'dcsiteurl' => $this->input->post('websiteurl'),
                    'custom_accom' => $this->input->post('custom_accom'),
                    'custom_accom_display' => $custom_accom_info_display,
                    'dcno_of_divemaster' => $this->input->post('divemaster'),
                    'dcno_boats' => $this->input->post('noofboats'),
                    'dcdaily_capacity' => $this->input->post('dailycapacity'),
                    'dcfacilities' => $dcfacilities,
                    'dcaffiliation' => implode(",", $dcaffiliation),
                    'dcaffiliation_padi' => $this->input->post('dcaffiliation_padi'),
                    //'dcaffiliation_member_no' => implode(",", $padi_affi_member_no),
					'hundredpercentage_aware' => $this->input->post('100%_aware'),
					'green_star_award' => $this->input->post('green_star_award'),
					'national_geographic_center' => $this->input->post('national_geographic_center'),
					'padi_five_cdc_center' => $this->input->post('padi_5*_cdc_center'),
					'padi_five_dive_resort' => $this->input->post('padi_5*_dive_resort'),
					'padi_five_dive_center' => $this->input->post('padi_5*_dive_center'),
					'padi_five_instructor_development_center' => $this->input->post('	padi_5*_instructor_development_center'),
					'padi_dive_center' => $this->input->post('padi_dive_center'),
					'padi_five_instructor_development_resort' => $this->input->post('padi_5*_instructor_development_resort'),
					'padi_dive_resort' => $this->input->post('padi_dive_resort'),
					'padi_tecrec_center' => $this->input->post('padi_tecrec_center'),
					
					'padi_member_no' => $this->input->post('padi_input'),
					'ssi_member_no' => $this->input->post('SSI_input'),
					'sdi_member_no' => $this->input->post('SDI_input'),
					'hepca_member_no' => $this->input->post('HEPCA_input'),
					'andi_member_no' => $this->input->post('ANDI_input'),
					'bis_member_no' => $this->input->post('BIS_input'),
					'naui_member_no' => $this->input->post('NAUI_input'),
					'tdi_member_no' => $this->input->post('TDI_input'),
					
                    //'dcaffiliation_reg_no' => $this->input->post('affiliationno'),
                    'dcseason' => $diveseason,
                    'dclanguage' => $dlanguages,
                    'dcdocument_required' => implode(",", $docrequireddiver),
                    'dccurrency' => $this->input->post('currency'),
					'modified' => date("Y-m-d H:i:s"),		
                    'user_id' => $this->session->userdata('user_id')
                );
                //Pass user data to model
                $result['message'] = $this->DCprofilemodel->addNew($userData);
            }
            
            $result['currency'] = $this->DCprofilemodel->getcurrency();
            $this->load->view('template/header');
            $this->load->view('template/sidebar');
            $this->load->view('DCprofile/DCprofileadd', $result);
            $this->load->view('template/footer');
        } 
        else {
            $result = array(
                'message' => ''
            );
            $id = $this->session->userdata('user_id');
            
            // Image update part
            if ($this->input->post('update_dcprofile_image')) {
                if (!empty($_FILES['file']['name'])) {
                    $config['upload_path']   = './upload/DCprofile/';
                    $config['allowed_types'] = 'jpg|jpeg|png|gif';
                    $config['file_name']     = $_FILES['file']['name'];
                    //Load upload library and initialize configuration
                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);
                    
                    if ($this->upload->do_upload('file')) {
                        $uploadData              = $this->upload->data();
                        $edit_divecenter_picture = $uploadData['file_name'];
                    } else {
                        $edit_divecenter_picture = '';
                    }
                } else {
                    $edit_divecenter_picture = '';
                }
                $data              = array(
                    'dcimage' => $edit_divecenter_picture
                );
                //Pass user data to model
                $result['message'] = $this->DCprofilemodel->updateData($data, $id);
                if ($result['message'] == 'SUCCESS') {
                    $base_url = base_url();
                    redirect("$base_url" . "DCprofile/addNew");
                }
            }
            if ($this->input->post('update_DCprofile_data')) {
				
				$dcfacilities = "";
				//$dcf = "";
				if($this->input->post('dcfaci') !="")
				{
					//if()
					$dcf = $this->input->post('dcfacilities');
					$dcf1 = "";
					if(isset($dcf) && is_array($dcf)){ $dcf1 = implode(",", $dcf); }
					
					//$dcf = implode(",", $this->input->post('dcfacilities'));
					$dcfacilities = $dcf1.','.strtoupper($this->input->post('dcfaci'));
				}
				else
				{
					$dcfacilities = implode(",", $this->input->post('dcfacilities'));
				}
                //$dcfacilities      = $this->input->post('dcfacilities');
                $dcaffiliation     = $this->input->post('dcaffiliation');
                //$dcaffiliation_padi     = $this->input->post('dcaffiliation_padi');
                //$membershipnumber     = $this->input->post('dcaffiliation_member_no');
                $diveseason        = $this->input->post('diveseason');
				
				$dlanguages = "";
				if($this->input->post('dlang') !="")
				{
					$dcl = $this->input->post('dlanguages');
					$dcl1 = "";
					if(isset($dcl) && is_array($dcl)){ $dcl1 = implode(",", $dcl); }
					
					//$dcl = implode(",", $this->input->post('dlanguages'));
					$dlanguages = $dcl1.','.strtoupper($this->input->post('dlang'));
				}
				else
				{
					$dlanguages = implode(",", $this->input->post('dlanguages'));
				}
				
                //$dlanguages        = $this->input->post('dlanguages');
                $docrequireddiver  = $this->input->post('docrequireddiver');
				
				$custom_accom_info_display = "";
				if($this->input->post('custom_accom_info_display') !="")
				{
					$custom_accom_info_display = "TRUE";
				}
				else
				{
					$custom_accom_info_display = "FALSE";
				}
			
                $userData          = array(
                    'dcname' => $this->input->post('name'),
                    'dcdescription' => $this->input->post('description'),
                    'dccountry' => $this->input->post('edit_dive_center_country'),
                    'dcislands' => $this->input->post('edit_dive_center_island'),
                    'dcgps_x' => $this->input->post('gpsx'),
                    'dcgps_y' => $this->input->post('gpsy'),
                    'dcreg_co_name' => $this->input->post('rcname'),
                    'dcbusiness_reg_no' => $this->input->post('brnumber'),
                    'dcbusi_telephone_no' => $this->input->post('tpnumber'),
                    'dcbilling_address' => $this->input->post('baddress'),
                    'dcbusi_fax_no' => $this->input->post('faxnumber'),
                    'dcaddress' => $this->input->post('dcaddress'),
                    'dctelephone_no' => $this->input->post('dctpnumber'),
                    'dcfax_no' => $this->input->post('dcfaxnumber'),
                    'dcemailid' => $this->input->post('emailid'),
                    'dcsiteurl' => $this->input->post('websiteurl'),
					'custom_accom' => $this->input->post('custom_accom'),
                    'custom_accom_display' => $custom_accom_info_display,
                    'dcno_of_divemaster' => $this->input->post('divemaster'),
                    'dcno_boats' => $this->input->post('noofboats'),
                    'dcdaily_capacity' => $this->input->post('dailycapacity'),
                    'dcfacilities' => $dcfacilities,
                    'dcaffiliation' => implode(",", $dcaffiliation),
                    'dcaffiliation_padi' => $this->input->post('dcaffiliation_padi'),
                    //'dcaffiliation_member_no' => implode(",", $membershipnumber),
					'hundredpercentage_aware' => $this->input->post('100%_aware'),
					'green_star_award' => $this->input->post('green_star_award'),
					'national_geographic_center' => $this->input->post('national_geographic_center'),
					'padi_five_cdc_center' => $this->input->post('padi_5*_cdc_center'),
					'padi_five_dive_resort' => $this->input->post('padi_5*_dive_resort'),
					'padi_five_dive_center' => $this->input->post('padi_5*_dive_center'),
					'padi_five_instructor_development_center' => $this->input->post('	padi_5*_instructor_development_center'),
					'padi_dive_center' => $this->input->post('padi_dive_center'),
					'padi_five_instructor_development_resort' => $this->input->post('padi_5*_instructor_development_resort'),
					'padi_dive_resort' => $this->input->post('padi_dive_resort'),
					'padi_tecrec_center' => $this->input->post('padi_tecrec_center'),
					
					'padi_member_no' => $this->input->post('padi_input'),
					'ssi_member_no' => $this->input->post('SSI_input'),
					'sdi_member_no' => $this->input->post('SDI_input'),
					'hepca_member_no' => $this->input->post('HEPCA_input'),
					'andi_member_no' => $this->input->post('ANDI_input'),
					'bis_member_no' => $this->input->post('BIS_input'),
					'naui_member_no' => $this->input->post('NAUI_input'),
					'tdi_member_no' => $this->input->post('TDI_input'),
					
                    //'dcaffiliation_reg_no' => $this->input->post('affiliationno'),
                    'dcseason' => implode(",", $diveseason),
                    'dclanguage' => $dlanguages,
                    'dcdocument_required' => implode(",", $docrequireddiver),
                    'dccurrency' => $this->input->post('currency'),
					'modified' => date("Y-m-d H:i:s"),		
                    'user_id' => $this->session->userdata('user_id')
                );
                //Pass user data to model
                $result['message'] = $this->DCprofilemodel->updateData($userData, $id);
                if ($result['message'] == 'SUCCESS') {
                    $base_url = base_url();
                    redirect("$base_url" . "DCprofile/addNew");
                }
            }
            $id = $this->session->userdata('user_id');
            $this->load->view('template/header');
            $this->load->view('template/sidebar');
            $result['getEditdata'] = $this->DCprofilemodel->getEditdata($id);
            $this->load->view('DCprofile/DCprofileupdate', $result);
            $this->load->view('template/footer');
            
        }
        
        
        
    }
    function DClist()
    {
		$id = $this->session->userdata('user_id');
        $data['DClist'] = $this->DCprofilemodel->DClist($id);
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('DCprofile/DCprofilelist', $data);
        $this->load->view('template/footer');
    }
 
    public function delete($id)
    {
        $this->DCprofilemodel->deleteData($id);
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $data['DClist'] = $this->DCprofilemodel->DClist();
        $this->load->view('DCprofile/DCprofilelist', $data);
        $this->load->view('template/footer');
    }
    
    //**********************************************************************************************************************************************//
    //                                                                   [ Dive Center Profile END] //***********************************************************************************************************************************************//
    
    //**********************************************************************************************************************************************//
    //                                                                   [ CONTACTS TAB START] //***********************************************************************************************************************************************//
    
    // Start Department
    
    function addDept()
    {
        $result = array(
            'message' => ''
        );
        if ($this->input->post('name')) {
            $userData          = array(
                'dept_name' => $this->input->post('name'),
				'modified' => date("Y-m-d H:i:s"),		
				'user_id' => $this->session->userdata('user_id')
            );
            //Pass user data to model
            $result['message'] = $this->DCprofilemodel->addNewDept($userData);
        }
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('DCprofile/DCdepartmentadd', $result);
        $this->load->view('template/footer');
    }
    function deptList()
    {
        $result['department'] = $this->DCprofilemodel->getDepartment();
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('DCprofile/DCdeptlist', $result);
        $this->load->view('template/footer');
    }
    public function departedit($id)
    {
        $result = array(
            'message' => ''
        );
        if ($this->input->post('name')) {
            $data              = array(
                'dept_name' => $this->input->post('name'),
				'modified' => date("Y-m-d H:i:s"),		
				'user_id' => $this->session->userdata('user_id')
                
            );
            $result['message'] = $this->DCprofilemodel->departedit($data, $id);
            if ($result['message'] == 'SUCCESS') {
                $base_url = base_url();
                redirect("$base_url" . "DCprofile/deptList");
            }
        }
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $result['department'] = $this->DCprofilemodel->getData($id);
        $this->load->view('DCprofile/DCdeptUpdate', $result);
        $this->load->view('template/footer');
    }
    public function departdelete($id)
    {
        $this->DCprofilemodel->deleteDepart($id);
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $data['department'] = $this->DCprofilemodel->getDepartment();
        $this->load->view('DCprofile/DCdeptlist', $data);
        $this->load->view('template/footer');
    }
    // end Department
    
    // Staff *************
    
    function DCstaffList()
    {
        $data['DCcontactlist'] = $this->DCprofilemodel->DCcontactlist();
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('DCprofile/DCstafflist', $data);
        $this->load->view('template/footer');
    }
    
    function addStaff()
    {
        $result = array(
            'message' => ''
        );
        if ($this->input->post('submit_contact_data')) {
            $userData          = array(
                'dept_name' => $this->input->post('departments'),
                'name' => $this->input->post('name'),
                'contact_no' => $this->input->post('contactno'),
                'email' => $this->input->post('email'),
				'modified' => date("Y-m-d H:i:s"),		
				'user_id' => $this->session->userdata('user_id')
            );
            //Pass user data to model
            $result['message'] = $this->DCprofilemodel->addNewStaff($userData);
        }
        $result['department'] = $this->DCprofilemodel->getDepartment();
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('DCprofile/DCstaffadd', $result);
        $this->load->view('template/footer');
    }
    public function editstaff($id)
    {
        $result = array(
            'message' => ''
        );
        if ($this->input->post('submit_update_data')) {
            $data              = array(
                'dept_name' => $this->input->post('departments'),
                'name' => $this->input->post('name'),
                'contact_no' => $this->input->post('contactno'),
                'email' => $this->input->post('email'),
				'modified' => date("Y-m-d H:i:s"),		
				'user_id' => $this->session->userdata('user_id')
            );
            $result['message'] = $this->DCprofilemodel->Staffdepartedit($data, $id);
            if ($result['message'] == 'SUCCESS') {
                $base_url = base_url();
                redirect("$base_url" . "DCprofile/DCstaffList");
            }
        }
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $result['department']  = $this->DCprofilemodel->getDepartment();
        $result['contactdept'] = $this->DCprofilemodel->getstaffData($id);
        $this->load->view('DCprofile/DCstaffupdate', $result);
        $this->load->view('template/footer');
    }
    public function deleteStaff($id)
    {
        $this->DCprofilemodel->deleteStaff($id);
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $data['DCcontactlist'] = $this->DCprofilemodel->DCcontactlist();
        $this->load->view('DCprofile/DCstafflist', $data);
        $this->load->view('template/footer');
    }
    
    // Dive Master *********
    
    function DCmasterList()
    {
        $data['DCmasterlist'] = $this->DCprofilemodel->DCmasterlist();
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('DCprofile/DCdivemasterList', $data);
        $this->load->view('template/footer');
    }
    function addDivemaster()
    {
        $result = array(
            'message' => ''
        );
        if ($this->input->post('submit_dive_master_data')) {
            if (!empty($_FILES['profile_photo']['name'])) {
                $config['upload_path']   = './upload/DCprofile/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['file_name']     = $_FILES['profile_photo']['name'];
                
                //Load upload library and initialize configuration
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                
                if ($this->upload->do_upload('profile_photo')) {
                    $uploadData          = $this->upload->data();
                    $divecenter_picture1 = $uploadData['file_name'];
                } else {
                    $divecenter_picture1 = '';
                }
            } else {
                $divecenter_picture1 = '';
            }
            
            $userData = array(
                'images' => $divecenter_picture1,
                'name' => $this->input->post('name'),
                'position' => $this->input->post('position'),
                'cert_body' => $this->input->post('certbody'),
                'id_no' => $this->input->post('idno'),
				'modified' => date("Y-m-d H:i:s"),		
				'user_id' => $this->session->userdata('user_id')
            );
            //Pass user data to model
            $result['message'] = $this->DCprofilemodel->addNewDivemaster($userData);
        }
        //$result['department'] = $this->DCprofilemodel->getDepartment();
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('DCprofile/DCdivemasterAdd', $result);
        $this->load->view('template/footer');
    }
    public function editDivemaster($id)
    {
        $result = array(
            'message' => ''
        );
        if ($this->input->post('submit_Divemaster_update_data')) {
            $data              = array(
                'name' => $this->input->post('name'),
                'position' => $this->input->post('position'),
                'cert_body' => $this->input->post('certbody'),
                'id_no' => $this->input->post('idno'),
				'modified' => date("Y-m-d H:i:s"),		
				'user_id' => $this->session->userdata('user_id')
            );
            $result['message'] = $this->DCprofilemodel->editNewDivemaster($data, $id);
            if ($result['message'] == 'SUCCESS') {
                $base_url = base_url();
                redirect("$base_url" . "DCprofile/DCmasterList");
            }
        }
        
        if ($this->input->post('submit_Divemaster_update_Image_data')) {
            //Check whether user upload picture
            if (!empty($_FILES['edit_photo']['name'])) {
                $config['upload_path']   = './upload/DCprofile/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['file_name']     = $_FILES['edit_photo']['name'];
                
                //Load upload library and initialize configuration
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                
                if ($this->upload->do_upload('edit_photo')) {
                    $uploadData         = $this->upload->data();
                    $divecenter_picture = $uploadData['file_name'];
                } else {
                    $divecenter_picture = '';
                }
            } else {
                $divecenter_picture = '';
            }
            
            $data              = array(
                'images' => $divecenter_picture
            );
            $result['message'] = $this->DCprofilemodel->editNewDivemaster($data, $id);
            if ($result['message'] == 'SUCCESS') {
                $base_url = base_url();
                redirect("$base_url" . "DCprofile/DCmasterList");
            }
            
        }
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        //$result['department'] = $this->DCprofilemodel->getDepartment();
        $result['divemasterdata'] = $this->DCprofilemodel->getdivemasterData($id);
        $this->load->view('DCprofile/DCdivemasterUpdate', $result);
        $this->load->view('template/footer');
    }
    
    public function deleteDivemaster($id)
    {
        $this->DCprofilemodel->deleteDivemaster($id);
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $data['DCmasterlist'] = $this->DCprofilemodel->DCmasterlist();
        $this->load->view('DCprofile/DCdivemasterList', $data);
        $this->load->view('template/footer');
    }
    
    //**********************************************************************************************************************************************
    //                                                                   [ CONTACTS TAB END ] //***********************************************************************************************************************************************
    
    //**********************************************************************************************************************************************
    //                                                                   [ GALLEY TAB START ] //***********************************************************************************************************************************************
    
    function DCgalleryList()
    {
		$id = $this->session->userdata('user_id');
		$config['base_url'] = base_url('DCprofile/DCgalleryList');
        $config['total_rows'] = $this->db->where('user_id',$id)->count_all_results('tbl_gallery');
        $config['per_page'] = "9";
        $config["uri_segment"] = 3;
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);
		
		$config['full_tag_open'] = '<ul class="pagination pagination-separated">';
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
		//$data['viewallevents'] = $this->Frontmodel->get_viewAllevents($config["per_page"], $data['page']);
		$data["links"] = $this->pagination->create_links();
		
        $data['DCgallerylist'] = $this->DCprofilemodel->DCgallerylist($config["per_page"], $data['page']);
		//var_dump( $data['DCgallerylist']);
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('DCprofile/DCgalleryList', $data);
        $this->load->view('template/footer');
    }
    function addGallery()
    {
        $result = array(
            'message' => ''
        );
        if ($this->input->post('submit_gallery_data')) {
            if (!empty($_FILES['gallery']['name'])) {
                $config['upload_path']   = './upload/DCprofile/gallery/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['file_name']     = $_FILES['gallery']['name'];
                
                //Load upload library and initialize configuration
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                
                if ($this->upload->do_upload('gallery')) {
                    $uploadData          = $this->upload->data();
                    $divecenter_picture1 = $uploadData['file_name'];
                } else {
                    $divecenter_picture1 = '';
                }
            } else {
                $divecenter_picture1 = '';
            }
            
            $userData          = array(
                'gallery' => $divecenter_picture1,
				'modified' => date("Y-m-d H:i:s"),		
				'user_id' => $this->session->userdata('user_id')
            );
            //Pass user data to model
            $result['message'] = $this->DCprofilemodel->addNewGallery($userData);
        }
        //$result['department'] = $this->DCprofilemodel->getDepartment();
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('DCprofile/DCgalleryAdd', $result);
        $this->load->view('template/footer');
    }
    public function editGallery($id)
    {
        $result = array(
            'message' => ''
        );
        if ($this->input->post('update_gallery_Image_data')) {
            //Check whether user upload picture
            if (!empty($_FILES['edit_gallery']['name'])) {
                $config['upload_path']   = './upload/DCprofile/gallery/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['file_name']     = $_FILES['edit_gallery']['name'];
                
                //Load upload library and initialize configuration
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                
                if ($this->upload->do_upload('edit_gallery')) {
                    $uploadData         = $this->upload->data();
                    $divecenter_picture = $uploadData['file_name'];
                } else {
                    $divecenter_picture = '';
                }
            } else {
                $divecenter_picture = '';
            }
            
            $data              = array(
                'gallery' => $divecenter_picture,
				'modified' => date("Y-m-d H:i:s"),		
				'user_id' => $this->session->userdata('user_id')
            );
            $result['message'] = $this->DCprofilemodel->editNewGallery($data, $id);
            if ($result['message'] == 'SUCCESS') {
                $base_url = base_url();
                redirect("$base_url" . "DCprofile/DCgalleryList");
            }
            
        }
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        //$result['department'] = $this->DCprofilemodel->getDepartment();
        $result['getgalleryData'] = $this->DCprofilemodel->getgalleryData($id);
        $this->load->view('DCprofile/DCgalleryUpdate', $result);
        $this->load->view('template/footer');
    }
    
    public function deleteGallery($id)
    {
        $this->DCprofilemodel->deleteGallery($id);
        /* $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $data['DCgallerylist'] = $this->DCprofilemodel->DCgallerylist();
        $this->load->view('DCprofile/DCgalleryList', $data);
        $this->load->view('template/footer'); */
		 redirect("$base_url" . "DCprofile/DCgalleryList");
    }
	public function testing()
	{

		
		
	}
	
    
    //**********************************************************************************************************************************************
    //                                                                   [ GALLEY TAB END ] //***********************************************************************************************************************************************
    
}
?>