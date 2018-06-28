<?php
class IslandModel extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    function newIsland($data)
    {
        if ($this->db->insert('tbl_island', $data)) {
            return "SUCCESS";
        } else {
            return "FAILED";
        }
        
    }
    function islandList()
    {
         $this->db->select('t1.*,t2.*,t3.island_name island_group');
         $this->db->from('tbl_island as t1');
         $this->db->join('tbl_country as t2', 't1.country_id = t2.country_id', 'left');
         $this->db->join('tbl_island as t3', 't1.group_id = t3.island_id', 'left');
         $query = $this->db->get();
         return $query->result(); 
    }
    function editIsland($data, $id)
    {
        
        $this->db->where('island_id', $id); //var_dump($id);exit();
        // $this->db->from('tbl_country');
        if ($this->db->update('tbl_island', $data)) {
            return "SUCCESS";
        } else { {
                return "FAILED";
            }
        }
    }
    function getIslandGroup()
    {
        //  $sql = "SELECT * FROM employee WHERE id = ?";
        //$query =$this->db->query($sql, array($id));
        $this->db->select('*');
        $this->db->from('tbl_island');
        $this->db->where('group_id', '0');
        $query = $this->db->get();
        return $query->result();
    }
    
    function getIsland($id)
    {
        //  $sql = "SELECT * FROM employee WHERE id = ?";
        //$query =$this->db->query($sql, array($id));
        $this->db->select('*');
        $this->db->from('tbl_island');
        $this->db->where('island_id', $id);
        $query = $this->db->get();
        return $query->result();
    }
    function deleteIsland($id)
    {
        $this->db->delete('tbl_island', array(
            'island_id' => $id
        ));
    }

    function countryList()
    {
        $query = $this->db->get('tbl_country');
        return $query->result();
    }
    function TellmemoreList()
    {
        $query = $this->db->get('tbl_satellmemore');
        return $query->result();
    }
}
?>
