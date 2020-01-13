<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Possible_advisories extends CI_Controller
{
	
	  function __construct()
    {
        parent::__construct();
	$this->config->set_item('theme','Ghana');
        $this->load->model('Possible_advisories_model');
		$this->load->model('Minor_model');
        $this->load->library('form_validation');
		$this->load->library('session');
    }


   public function index()
    { 
	  $data['possible_advisories_data'] = $this->Possible_advisories_model->get_all();
	  $data['change'] = 75;
      $this->load->view('template', $data);
	
	}
	
	//show form for adding the division
	public function displayform(){

	$data['possible_advisories_data']= $this->Possible_advisories_model->get_all();
	
	$data['change'] = 74;
	$this->load->view('template', $data);	
   }
   
   public function savedAdvisory(){
   	  $id = $this->input->post('id');
      $datatoinsert = array(
       		 'cat' => $this->input->post('sector_id',TRUE),
			 'advise' => $this->input->post('advise',TRUE),
			 'state' => $this->input->post('state',TRUE)
	    );
      //====== checking the presence of $id==========
		if (!is_null($id) && $this->Possible_advisories_model->get_by_id($id)) {
            $this->Possible_advisories_model->update($id,$datatoinsert);
        } else {
         $datatoinsert1 = array(
       		 'cat' => $this->input->post('sector_id',TRUE),
			 'advise' => $this->input->post('advise',TRUE),
			 'state' => $this->input->post('state',TRUE)
	    );
           $this->Possible_advisories_model->insert($datatoinsert1);
        }
	//===================================================== 
	
	$data = array(
		   'possible_advisories_data'=> $this->Possible_advisories_model->get_all(),
		   'change' => 75,
			);
    $this->load->view('template',$data);  	   
	   
  }
  //--------- Updating  and deleting a given row---------------------
	 public function update($id=NULL) 
     {   
        $data['possible_advisories_data']= $this->Possible_advisories_model->get_all();
	    $row = $this->Possible_advisories_model->get_by_id($id);
	    
	    if ($row) {
	     //if there is some data
            $data['change'] = 74;
			$data['row_data'] =$this->Possible_advisories_model->get_by_id($id);
            $this->load->view('template', $data);			
			
        } else {
		  $data = array(
		      'change' => 75,
		//'forecast_id' => $row->forecast_id,
	    );
            $this->session->set_flashdata('message', '<font color="red" size="5">Record Not Found</font>');
           $this->load->view('template', $data);
        }
    }

     public function delete($id=NULL){
     	    $this->Possible_advisories_model->delete($id);
     	 //if there is some data
     	    $possible = $this->Possible_advisories_model->get_all();
            $data = array(
            'possible_advisories_data' => $possible,
			'change' => 75
        );

        $this->load->view('template', $data);			
		
	}
	//----------------------the end--------------------------------
	
}//end of the class 