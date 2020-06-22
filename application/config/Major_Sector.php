<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Major_Sector extends CI_Controller
{
	
	  function __construct()
    {
        parent::__construct();
	$this->config->set_item('theme',$this->config->item('country'));
        $this->load->model('Major_model');
        $this->load->library('form_validation');
    }


   public function index()
    { 
	  $major = $this->Major_model->get_all();
	  $data = array(
            'major_data' => $major,
			'change' => 61
        );

        $this->load->view('template', $data);
	
	}
	
	//dispalyform
	public function displayMajorForm(){
		
	$data['change'] = 62;
	$this->load->view('template', $data);	
   }
   
   
   public function saveMajorSector(){
	    $datatoinsert = array(
       		 'sector_name' => $this->input->post('sector_name',TRUE)		    
	    );
		$this->Major_model->insert($datatoinsert);
		$data = array(
			   'major_data'=> $this->Major_model->get_all(),
			   'change' => 61,
			);
        $this->load->view('template',$data);  
	   
	 }
	
}//end of the class 