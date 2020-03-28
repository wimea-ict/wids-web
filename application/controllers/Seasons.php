<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Seasons extends CI_Controller
{
	
	  function __construct()
    {
        parent::__construct();
	    $this->config->set_item('theme',$this->config->item('country'));
        $this->load->model('Seasons_model');
        $this->load->library('form_validation');
        $this->load->library('session');
    }


   public function index()
    { 
	  $seasons = $this->Seasons_model->get_all();
	  $data = array(
            'seasons_data' => $seasons,
			'change' => 67
        );

        $this->load->view('template', $data);
	
	}
	
	//display season form
	public function displaySeasonForm(){
		
	$data['change'] = 68;
	$this->load->view('template', $data);	
   }
   
   
   public function saveSeason(){
	    $datatoinsert = array(
       		 'season_name' => $this->input->post('season_name',TRUE),
       		 'month_from' => $this->input->post('month_from',TRUE),
       		 'month_to' => $this->input->post('month_to',TRUE),
       		 'abbreviation' => $this->input->post('abbreviation',TRUE)
       		 );
		$this->Seasons_model->insert($datatoinsert);
		$data = array(
			   'seasons_data'=> $this->Seasons_model->get_all(),
			   'change' => 67,);
        $this->load->view('template',$data);  
	   
	 }
	
}//end of the class 