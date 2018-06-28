<?php
class Product extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('ProductModel', 'productModel');
    $this->load->helper('url');
	$this->load->library('session');
  }
  public function addNew()
  {
    $result = array('message'=>'');
	
	if($this->input->post('submit_pdct_data'))
		{  
            //Check whether user upload picture
            if(!empty($_FILES['pdct_image']['name'])){
                $config['upload_path'] = './upload/product/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['file_name'] = $_FILES['pdct_image']['name'];
                
                //Load upload library and initialize configuration
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                
                if($this->upload->do_upload('pdct_image')){
                    $uploadData = $this->upload->data();
                    $pdct_picture = $uploadData['file_name'];
                }else{
                    $pdct_picture = '';
                }
            }else{
                $pdct_picture = '';
            }
            //Prepare array of user data
            $userData = array(
				'product_name' => $this->input->post('pdct_name'),
                'product_image' => $pdct_picture,             
                'price' => $this->input->post('pdct_price'),
                'product_description' => $this->input->post('pdct_description')
            );          
			//Pass user data to model
			$result['message'] = $this->productModel->addNew($userData);
        }
    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $this->load->view('product/newProduct',$result);
    $this->load->view('template/footer');
  }
  function productList()
  {
    $data['productList']=$this->productModel->productList();
    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $this->load->view('product/productList',$data);
    $this->load->view('template/footer');
  }

  public function editData($id)
  {
    $result = array('message'=>'');
	
	// Image update part
	if($this->input->post('update_product_image'))
		{  
		if(!empty($_FILES['edit_product_image']['name'])){
			$config['upload_path'] = './upload/product/';
			$config['allowed_types'] = 'jpg|jpeg|png|gif';
			$config['file_name'] = $_FILES['edit_product_image']['name']; 
			//Load upload library and initialize configuration
			$this->load->library('upload',$config);
			$this->upload->initialize($config);
			
			if($this->upload->do_upload('edit_product_image')){
				$uploadData = $this->upload->data();
				$edit_pdct_picture = $uploadData['file_name'];
			}else{
				$edit_pdct_picture = '';
			}
		}else{
			$edit_pdct_picture = '';
		}
			$data = array(
                'product_image' => $edit_pdct_picture
            );          
			//Pass user data to model
			$result['message'] = $this->productModel->updateData($data, $id);
			if($result['message'] == 'SUCCESS')
			{
			$base_url=base_url();
			redirect("$base_url"."Product/productList");
			}
		}
	if($this->input->post('update_product'))
		{  
			$data = array(
                'product_name' => $this->input->post('edit_pdct_name'),
                'price' => $this->input->post('edit_pdct_price'),
                'product_description' => $this->input->post('edit_pdct_description')
            );          
			//Pass user data to model
			$result['message'] = $this->productModel->updateData($data, $id);
			if($result['message'] == 'SUCCESS')
			{
			$base_url=base_url();
			redirect("$base_url"."Product/productList");
			}
		}
    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $result['getEditdata']=$this->productModel->getEditdata($id);
    $this->load->view('product/updateProduct',$result);
    $this->load->view('template/footer');
	}
  public function deleteData($id)
  {
    $this->productModel->deleteData($id);
    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $data['productList']=$this->productModel->productList();
    $this->load->view('product/productList',$data);
    $this->load->view('template/footer');
  }

}
?>
