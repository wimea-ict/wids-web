<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Major_Sector extends CI_Controller
{
	
	  function __construct()
    {
        parent::__construct();
	    $this->config->set_item('theme','Ghana');
        $this->load->model('Major_model');
        $this->load->library('form_validation');
        $this->load->library('session');
    }


   public function index()
    { 
	  $major_sector = $this->Major_model->get_all();
	  $data = array(
            'major_data' => $major_sector,
			'change' => 61
        );

        $this->load->view('template', $data);
	
	}
	
	//dispalyform
	public function displayMajorForm(){
		
	$data['change'] = 62;
    $data['languages'] = $this->Major_model->get_languages()->result();
	$this->load->view('template', $data);	
   }
   
   
   public function saveMajorSector(){
   	    $id = $this->input->post('id');
   	    
	    $datatoinsert = array(
            'language_id' => $this->input->post('language', TRUE),
       		 'sector_name' => $this->input->post('sector_name',TRUE)		    
	    );
	    //====== checking the presence of $id==========
		if (!is_null($id) && $this->Major_model->get_by_id($id)) {
            $this->Major_model->update($id,$datatoinsert);
        } else {

            $datatoinsert1 = array(
                'language_id' => $this->input->post('language', TRUE),
       		 'sector_name' => $this->input->post('sector_name',TRUE)		    
	       );

           $this->Major_model->insert($datatoinsert1);
        }
		//=====================================================
		$data = array(
			   'major_data'=> $this->Major_model->get_all(),
			   'change' => 61,
			);
        $this->load->view('template',$data);  
	   
	 }
   //--------- Updating  and deleting a given row---------------------
	 public function update($id=NULL) 
     {
	    $row = $this->Major_model->get_by_id($id);
	 
	    if ($row) { //if there is some data
            $data['change'] = 62;
			$data['major_data']= $row;
			$data['row_data'] =$this->Major_model->get_by_id($id);
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
	public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=Major_Sector.doc");

        $data = array(
            'major_data'=> $this->Major_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('major_sector_doc',$data);
    }

    
	//----------------------the end--------------------------------
	
	 public function pdf()
    {
        $data = array(
			'major_data'=> $this->Major_model->get_all(),
            'start' => 0
        );
        
        ini_set('memory_limit', '10G');
        $html = $this->load->view('major_sector_doc', $data, true);
        $this->load->library('pdf');
        $pdf = $this->pdf->load();
        $pdf->WriteHTML($html);
        $pdf->Output('Major_Sector.pdf', 'D'); 
    }
}//end of the class 