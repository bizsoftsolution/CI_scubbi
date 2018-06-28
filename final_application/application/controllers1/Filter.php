<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Filter extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		//$this->load->library('session');
		$this->load->model('Filtermodel');
    }
	
	function filter()
	{
	/* $size = $this->input->post('size');
	$this->db->from('dive_center');
	$this->db->where_in('country_id','".implode("','",$size)."');
	$all_row = $this->db->get();  */

		/* $sql="SELECT * FROM dive_center";
    extract($_POST);
    if(isset($size)) 
    	$sql.=" WHERE country_id IN (".implode(',', $size).")";
   // $all_row=$this->query($sql);
	$all_row = $this->db->get($sql);
	 */
		//return $query->result();
	/* foreach ($all_row->result() as $product) { 
	echo '
    <div class="col-sm-3 col-md-3">
    	<div class="well">
    		<h2 class="text-info">'.$product['center_name'].'</h2>
    		<p><span class="label label-info">'.$product['country_id'].'</span></p>        		         
    		<p>'.$product['address1'].'</p>
    		<hr>
    		<h3>'.$product['email_id'].'</h3>

    	</div>
    </div>';
				}  */
		$data['divecenter'] = $this->Filtermodel->get_divecenter();
		//$data['filterdata'] = $this->Filtermodel->get_filterdata();
		$this->load->view('front/header');
		$this->load->view('front/filterview', $data);
		$this->load->view('front/footer');
	}
	function filter1()
	{
	/* $size = $this->input->post('size');
	$this->db->from('dive_center');
	$this->db->where_in('country_id','".implode("','",$size)."');
	$all_row = $this->db->get();  */

		/* $sql="SELECT * FROM dive_center";
    extract($_POST);
    if(isset($size)) 
    	$sql.=" WHERE country_id IN (".implode(',', $size).")";
   // $all_row=$this->query($sql);
	$all_row = $this->db->get($sql);
	 */
		//return $query->result();
	/* foreach ($all_row->result() as $product) { 
	echo '
    <div class="col-sm-3 col-md-3">
    	<div class="well">
    		<h2 class="text-info">'.$product['center_name'].'</h2>
    		<p><span class="label label-info">'.$product['country_id'].'</span></p>        		         
    		<p>'.$product['address1'].'</p>
    		<hr>
    		<h3>'.$product['email_id'].'</h3>

    	</div>
    </div>';
				}  */
			//	echo "dfgdf";
		$data['divecenter'] = $this->Filtermodel->get_divecenter1();
		//$data['filterdata'] = $this->Filtermodel->get_filterdata();
		$this->load->view('front/header');
		$this->load->view('front/filterview', $data);
		$this->load->view('front/footer');
	}
}