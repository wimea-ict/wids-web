<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Impacts extends CI_Controller
{
	
	  function __construct()
    {
        parent::__construct();
	    $this->config->set_item('theme','Ghana');
        $this->load->model('Impacts_model');
        $this->load->library('form_validation');
        $this->load->library('session');
    }


   public function index()
    { 
	  $impacts = $this->Impacts_model->get_all();
	  $data = array(
            'impacts_data' => $impacts,
			'change' => 69
        );

        $this->load->view('template', $data);
	
	}
	
	//dispalyform
	public function displayImpactsForm(){
		
	$data['change'] = 70;
	$this->load->view('template', $data);	
   }
public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=sub_region.doc");

        $data = array(
            'impacts_data' => $this->Impacts_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('impacts_doc',$data);
    }
	
	 public function pdf()
    {
        $data = array(
			'impacts_data' => $this->Impacts_model->get_all(),
            'start' => 0
        );
        
        ini_set('memory_limit', '10G');
        $html = $this->load->view('impacts_doc', $data, true);
        $this->load->library('pdf');
        $pdf = $this->pdf->load();
        $pdf->WriteHTML($html);
        $pdf->Output('impacts.pdf', 'D'); 
    }

   
   
   public function saveImpacts(){
   	     $id = $this->input->post('id');
	    $datatoinsert = array(
       		 'description' => $this->input->post('description',TRUE));
	    //====== checking the presence of $id==========
		if (!is_null($id) && $this->Impacts_model->get_by_id($id)) {
            $this->Impacts_model->update($id,$datatoinsert);
        } else {

            $datatoinsert1 = array(
       		 'description' => $this->input->post('description',TRUE));

           $this->Impacts_model->insert($datatoinsert1);
           
        }
		//=====================================================
		$data = array(
			   'impacts_data'=> $this->Impacts_model->get_all(),
			   'change' => 69);
        $this->load->view('template',$data);  
	   
	 }

//--------- Updating  and deleting a given row---------------------
	 public function update($id=NULL) 
     {
	    $row = $this->Impacts_model->get_by_id($id);
	 
	    if ($row) { //if there is some data
            $data['change'] = 70;//referencing the form view
			$data['impacts_data']= $row;
			$data['row_data'] =$this->Impacts_model->get_by_id($id);
            $this->load->view('template', $data);			
			
        } else {
		  $data = array(
		      'change' => 69,
		//'forecast_id' => $row->forecast_id,
	    );
            $this->session->set_flashdata('message', '<font color="red" size="5">Record Not Found</font>');
           $this->load->view('template', $data);
        }
    }

     public function delete($id=NULL){
     	    $this->Impacts_model->delete($id);
     	 //if there is some data
     	    $impacts = $this->Impacts_model->get_all();
            $data = array(
            'impacts_data' => $impacts,
			'change' => 69
        );

        $this->load->view('template', $data);			
		
	}
	//----------------------the end--------------------------------
	
}//end of the class 