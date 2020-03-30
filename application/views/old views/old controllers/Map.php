<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Map extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
	$this->config->set_item('theme','Ghana');
        $this->load->model('Advisory_model');
        $this->load->library('form_validation');
        $this->load->helper('number');
      
        include APPPATH . 'third_party/morris/landing_charts.php';
    }

    public function index(){

  
        
          $this->load->view('map');  
    }

    public function agric($x){
        $data = array(
            'a' => $x,
            'c' => 1,
           // 'advisory_data' => $advisory
        );
     $this->load->view('map_advisory_read', $data);  
     $this->load->view('chart', $data);

    }

 
 public function water($x){
        $data = array(
            'a' => $x,
            'c' => 9,
           // 'advisory_data' => $advisory
        );
     $this->load->view('map_advisory_read', $data); 
     $this->load->view('chart', $data); 

    }

 public function road($x){
        $data = array(
            'a' => $x,
            'c' => "Road Construction Advisory",
           // 'advisory_data' => $advisory
        );
     $this->load->view('map_advisory_read', $data);  

    }

 public function food($x){  
        $data = array(
            'a' => $x,
            'c' => 1,
           // 'advisory_data' => $advisory
        );
     $this->load->view('map_advisory_read', $data);  
     $this->load->view('chart', $data);

    }

 public function health($x){
        $data = array(
            'a' => $x,
            'c' => 8,
           // 'advisory_data' => $advisory
        );
     $this->load->view('map_advisory_read', $data); 
     $this->load->view('chart', $data); 

    }

    
}