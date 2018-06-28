<?php
class ProductModel extends CI_Model {
 function __construct()
    {
	  parent::__construct();
	  $this->load->database();
    }
    function addNew($userData)
	{
      if($this->db->insert('product',$userData))
      {
        return "SUCCESS";
      }
      else
      {
        return "FAILED";
      }
	}
	function productList()
	{
	$query = $this->db->get('product');
	return $query->result();
    }
	
	function getEditdata($id){
  //  $sql = "SELECT * FROM employee WHERE id = ?";
    //$query =$this->db->query($sql, array($id));
    $this->db->select('*');
    $this->db->from('product');
    $this->db->where('product_id',$id);
    $query = $this->db->get();
    return $query->result();
    }
	function updateData($data,$id)
    {
    $this->db->where('product_id',$id);      //var_dump($id);exit();
	if($this->db->update('product',$data))
	{
     return "SUCCESS";
	}
	else 
	{
		return "FAILED";
	}
    }
 function deleteData($id)
    {
       $this->db->delete('product', array('product_id' => $id));
	   //unlink(base_url("upload/slider/".$files));
    }
}
?>
