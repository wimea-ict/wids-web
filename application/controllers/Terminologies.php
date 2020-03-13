<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Terminologies extends CI_Controller
{

	  function __construct()
    {
        parent::__construct();
	$this->config->set_item('theme','Ghana');
        $this->load->model('Terminologies_model');
        $this->load->library('form_validation');
        $this->load->library('session');
    }


   public function index()
    {
	  $terminology = $this->Terminologies_model->get_all();
	  $data = array(
            'terminology_data' => $terminology,
			'change' => 52
        );

        $this->load->view('template', $data);

	}


	public function displayform(){

	$data['change'] = 53;
	$this->load->view('template', $data);
   }
public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=sub_region.doc");

        $data = array(
            'terminology_data' => $this->Terminologies_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('terminology_doc',$data);
    }
	public function pdf()
    {
        $data = array(
            'terminology_data' => $this->Terminologies_model->get_all(),
            'start' => 0
        );
        
        ini_set('memory_limit', '10G');
        $html = $this->load->view('terminology_doc', $data, true);
        $this->load->library('pdf');
        $pdf = $this->pdf->load();
        $pdf->WriteHTML($html);
        $pdf->Output('terminologies.pdf', 'D'); 
    }

   public function saveTerminology(){
   	   $id = $this->input->post('id');
	    $datatoinsert = array(
	    	  'description' => $this->input->post('description',TRUE),
       		 'terminology' => $this->input->post('terminology',TRUE)
	    );
	    //====== checking the presence of $id==========
		if (!is_null($id) && $this->Terminologies_model->get_by_id($id)) {
            $this->Terminologies_model->update($id,$datatoinsert);
        } else {

            $datatoinsert1 = array(
       		 'description' => $this->input->post('description',TRUE),
       		 'terminology' => $this->input->post('terminology',TRUE)		    
	       );

           $this->Terminologies_model->insert($datatoinsert1);
        }
		//=====================================================
		
		$data = array(
			   'terminology_data'=> $this->Terminologies_model->get_all(),
			   'change' => 52,
			);
        $this->load->view('template',$data);

	 }
	 //--------- Updating  and deleting a given row---------------------
	 public function update($id=NULL) 
     {
	    $row = $this->Terminologies_model->get_by_id($id);
	 
	    if ($row) { //if there is some data
            $data['change'] = 53;
			$data['terminology_data']= $row;
			$data['row_data'] =$this->Terminologies_model->get_by_id($id);
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
     	    $this->Terminologies_model->delete($id);
     	 //if there is some data
     	    $terminology = $this->Terminologies_model->get_all();
            $data = array(
            'terminology_data' => $terminology,
			'change' => 52
        );

        $this->load->view('template', $data);			
		
	}
	//----------------------the end--------------------------------

}//end of the class
