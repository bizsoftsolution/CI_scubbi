<?php
class Employeemodel extends CI_Model {
 function __construct()
    {
              parent::__construct();
              $this->load->database();
    }
    function add_employee($employee)
{
      if($this->db->insert('employee',$employee))
      {
        return "SUCCESS";
      }

}
function get_entries()
{
 $query = $this->db->get('employee');
  return $query->result();
    }
function update_entry($employee,$id)
    {

      $this->db->where('id',$id);      //var_dump($id);exit();
      $this->db->from('employee');
   if($this->db->update('employee',$employee))
   {
     return "SUCCESS";
   }
   else {
     {
       return "FAILED";
     }
   }
        }

  function get($id){
  //  $sql = "SELECT * FROM employee WHERE id = ?";
    //$query =$this->db->query($sql, array($id));
    $this->db->select('*');
    $this->db->from('employee');
    $this->db->where('id',$id);
    $query = $this->db->get();
    return $query->result();
    }
 function delete_entry($id)
    {
       $this->db->delete('employee', array('id' => $id));
    }
       }
?>
