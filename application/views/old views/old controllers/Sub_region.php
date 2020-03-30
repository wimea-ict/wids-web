<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Sub_region extends CI_Controller
{
	
	  function __construct()
    {
        parent::__construct();
	$this->config->set_item('theme','Ghana');
        $this->load->model('Sub_region_model');
		$this->load->model('Region_model');
        $this->load->library('form_validation');
		$this->load->library('session');
    }


   public function index()
    { 
	  $data['sub_region_data'] = $this->Sub_region_model->get_all();
	  $data['change'] = 54;
      $this->load->view('template', $data);
	
	}
	
	//show form for adding the division
	public function displayform(){

	$data['region_data']= $this->Region_model->get_all();
	$data['change'] = 55;
	$this->load->view('template', $data);	
   }
   
   public function saveSub_region(){
   	   $id = $this->input->post('id');
      $datatoinsert = array(
       		 'sub_region_name' => $this->input->post('sub_region_name',TRUE),
			 'region_id' => $this->input->post('region_id',TRUE)
	    );
     //====== checking the presence of $id==========
		if (!is_null($id) && $this->Sub_region_model->get_by_id($id)) {
            $this->Sub_region_model->update($id,$datatoinsert);
        } else {

            $datatoinsert1 = array(
       		  'sub_region_name' => $this->input->post('sub_region_name',TRUE),
			 'region_id' => $this->input->post('region_id',TRUE)		    
	       );

           $this->Sub_region_model->insert($datatoinsert1);
        }
		//=====================================================
	$data = array(
		   'sub_region_data'=> $this->Sub_region_model->get_all(),
		   'change' => 54,
			);
    $this->load->view('template',$data);  	   
	   
  }
  //--------- Updating  and deleting a given row---------------------
	 public function update($id=NULL)

     { 
        $data['region_data']= $this->Region_model->get_all();
	    $row = $this->Sub_region_model->get_by_id($id);
	 
	    if ($row) { //if there is some data
            $data['change'] = 55;
			$data['sub_region_data']= $row;

			$data['row_data'] =$this->Sub_region_model->get_by_id($id);
            $this->load->view('template', $data);			
			
        } else {
		  $data = array(
		      'change' => 54
	    );
            $this->session->set_flashdata('message', '<font color="red" size="5">Record Not Found</font>');
           $this->load->view('template', $data);
        }
    }

     public function delete($id=NULL){

     	    $this->Sub_region_model->delete($id);
     	 //if there is some data
     	    $minor_sector = $this->Sub_region_model->get_all();
            $data = array(
            'sub_region_data' => $minor_sector,
			'change' => 54
        );

        $this->load->view('template', $data);			
		
	}
	//----------------------the end--------------------------------
	
}//end of the class 