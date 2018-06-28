<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class LoadmoreModel extends CI_Model{
 
    public function getCountry($page){
        $offset = 2*$page;
        $limit = 2;
        $sql = "select * from tbl_country limit $offset ,$limit";
        $result = $this->db->query($sql)->result();
        return $result;
    }
}