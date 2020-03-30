<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class City extends CI_Controller
{
	
	  function __construct()
    {
        parent::__construct();
	$this->config->set_item('theme',$this->config->item('country'));
        $this->load->model('City_model');
        $this->load->model('Division_model');
        $this->load->library('form_validation');
        $this->load->library('session');
    }


   public function index()
    { 
	  $data['city_data'] = $this->City_model->get_all();
	  $data['change'] = 48;
      $this->load->view('template', $data);	
	}
	
public function savecity(){
      $datatoinsert = array(
       		 'city_name' => $this->input->post('city_name',TRUE),
			 'division_id' => $this->input->post('division_id',TRUE)
	    );
	$this->City_model->insert($datatoinsert);
	$data['city_data']= $this->City_model->get_all();
    $data['change'] = 48;

    $this->load->view('template',$data);  	   
	   
  }

//show form for adding the city
public function displayform(){

    $data['city_data']= $this->City_model->get_all();
    $data['division_data']= $this->Division_model->get_all();
// print_r($this->Division_model->get_all()); exit();
    $data['change'] = 51;
    $this->load->view('template', $data);	
    }  

}//end of the class 