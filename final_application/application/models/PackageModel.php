<?php
class PackageModel extends CI_Model {
 function __construct()
    {
              parent::__construct();
              $this->load->database();
    }
    function addNew($data)
{
      if($this->db->insert('tbl_package',$data))
      {
        return "SUCCESS";
      }
      else
      {
        return "FAILED";
      }

}
function packageList()
{
 $query = $this->db->get('tbl_package');
  return $query->result();
    }
function updateData($data,$id)
    {

      $this->db->where('id',$id);      //var_dump($id);exit();
     // $this->db->from('tbl_country');
   if($this->db->update('tbl_package',$data))
   {
     return "SUCCESS";
   }
   else {
     {
       return "FAILED";
     }
   }
        }

  function editData($id){
  //  $sql = "SELECT * FROM employee WHERE id = ?";
    //$query =$this->db->query($sql, array($id));
    $this->db->select('*');
    $this->db->from('tbl_package');
    $this->db->where('id',$id);
    $query = $this->db->get();
    return $query->result();
    }
 function deleteData($id)
    {
       $this->db->delete('tbl_package', array('id' => $id));
    }
       }
?>
