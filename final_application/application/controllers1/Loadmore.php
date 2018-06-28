<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Loadmore extends CI_Controller {
 
 
    public function index()
    {
        $this->load->view('loadmore');
    }
 
    public function getCountry(){
        $page =  $_GET['page'];
        $this->load->model('loadmoreModel');
        $countries = $this->loadmoreModel->getCountry($page);
        foreach($countries as $country){
            echo "<tr><td>".$country->country_id."</td><td>".$country->country_name."</td></tr>";
        }
        exit;
    }
}