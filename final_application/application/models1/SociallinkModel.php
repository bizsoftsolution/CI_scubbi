<?php
class SociallinkModel extends CI_Model {
 function __construct()
    {
              parent::__construct();
              $this->load->database();
    }
/*
    function addNew($data)
{
      if($this->db->insert('tbl_social_links',$data))
      {
        return "SUCCESS";
      }
      else
      {
        return "FAILED";
      }

}
*/
function socialList()
{
 $query = $this->db->get('tbl_social_links');
  return $query->result();
    }
function updateData($data,$id)
    {

      $this->db->where('id',$id);      //var_dump($id);exit();
     // $this->db->from('tbl_country');
   if($this->db->update('tbl_social_links',$data))
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
    $this->db->from('tbl_social_links');
    $this->db->where('id',$id);
    $query = $this->db->get();
    return $query->result();
    }
 function deleteData($id)
    {
       $this->db->delete('tbl_social_links', array('id' => $id));
    }
       }
?>
