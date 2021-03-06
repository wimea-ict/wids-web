<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Region extends CI_Controller
{
	
	  function __construct()
    {
        parent::__construct();
	    $this->config->set_item('theme','Ghana');
        $this->load->model('Region_model');
        $this->load->library('form_validation');
		$this->load->library('session');
    }


   public function index()
    { 
	  $region = $this->Region_model->get_all();
	  $data = array(
            'region_data' => $region,
			'change' => 46
        );

        $this->load->view('template', $data);
	
	}
	
	
	public function displayform(){
		
	$data['change'] = 49;
	$this->load->view('template', $data);	
   }
   
   
   public function saveregion(){
        $id = $this->input->post('id');
	    $datatoinsert = array(
       		 'region_name' => $this->input->post('region_name',TRUE)		    
	    );
        //====== checking the presence of $id==========
        if (!is_null($id) && $this->Region_model->get_by_id($id)) {
            $this->Region_model->update($id,$datatoinsert);
        } else {

            $datatoinsert1 = array(
             'region_name' => $this->input->post('region_name',TRUE)            
           );

           $this->Region_model->insert($datatoinsert1);
        }
        //=====================================================
		
		$data = array(
			   'region_data'=> $this->Region_model->get_all(),
			   'change' => 46,
			);
        $this->load->view('template',$data);  
	   
	 }
	 //--------- Updating  and deleting a given row---------------------
     public function update($id=NULL) 
     {
        $row = $this->Region_model->get_by_id($id);
     
        if ($row) { //if there is some data
            $data['change'] = 49;//referencing the form view
            $data['region_data']= $row;
            $data['row_data'] =$this->Region_model->get_by_id($id);
            $this->load->view('template', $data);           
            
        } else {
          $data = array(
              'change' => 0,
        //'forecast_id' => $row->forecast_id,
        );
            $this->session->set_flashdata('message', '<font color="red" size="5">Record Not Found</font>');
           $this->load->view('template', $data);
        }
    }

     public function delete($id=NULL){
            $this->Region_model->delete($id);
         //if there is some data
            $region = $this->Region_model->get_all();
            $data = array(
            'region_data' => $region,
            'change' => 46
        );

        $this->load->view('template', $data);           
        
    }
    //----------------------the end--------------------------------
	 public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=region.doc");

        $data = array(
            'region_data' => $this->Region_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('region_doc',$data);
    }

    public function pdf()
    {
        $data = array(
            'region_data' => $this->Region_model->get_all(),
            'start' => 0
        );
        
        ini_set('memory_limit', '10G');
        $html = $this->load->view('region_pdf', $data, true);
        $this->load->library('pdf');
        $pdf = $this->pdf->load();
        $pdf->WriteHTML($html);
        $pdf->Output('region.pdf', 'D'); 
    }
	//---------------------------------------------------------------------------
}//end of the class 