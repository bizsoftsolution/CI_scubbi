<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Map extends CI_Controller {
 function __construct()
 {
 parent::__construct();
 }
 function index()
 { 
 // Load the library
 $this->load->library('googlemaps');

 // Load our model
 $this->load->model('Map_model', '', TRUE);
 // Initialize the map, passing through any parameters
 $config['center'] = '1600 Amphitheatre Parkway in Mountain View, Santa Clara County, California';
 $config['zoom'] = "auto";
 $this->googlemaps->initialize($config);
 // Get the co-ordinates from the database using our model
 $coords = $this->Map_model->get_coordinates();
 // Loop through the coordinates we obtained above and add them to the map
 foreach ($coords as $coordinate) {
 $marker = array();
 $marker['position'] = $coordinate->lat.','.$coordinate->lng;
 $this->googlemaps->add_marker($marker);
 }
 // Create the map
 $data = array();
 $data['map'] = $this->googlemaps->create_map();
 // Load our view, passing through the map data

/*  $config['center'] = '37.4419, -122.1419';
$config['zoom'] = 'auto';
$this->googlemaps->initialize($config);

$marker = array();
$marker['position'] = '37.429, -122.1519';
$marker['infowindow_content'] = '1 - Hello World!';
$marker['icon'] = 'http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=A|9999FF|000000';
$this->googlemaps->add_marker($marker);

$marker = array();
$marker['position'] = '37.409, -122.1319';
$marker['draggable'] = TRUE;
$marker['animation'] = 'DROP';
$this->googlemaps->add_marker($marker);

$marker = array();
$marker['position'] = '37.449, -122.1419';
$marker['onclick'] = 'alert("You just clicked me!!")';
$this->googlemaps->add_marker($marker);
$data['map'] = $this->googlemaps->create_map(); */
 $this->load->view('map_view', $data);
 }
}