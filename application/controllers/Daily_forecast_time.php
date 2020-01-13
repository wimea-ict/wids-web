<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Daily_forecast_time extends CI_Controller
{
	
	  function __construct()
    {
        parent::__construct();
	    $this->config->set_item('theme','Ghana');
        $this->load->model('Daily_forecast_time_model');
        $this->load->library('form_validation');
        $this->load->library('session');
    }


   public function index()//minor data===time data
    { 
	  $daily_forecast_time = $this->Daily_forecast_time_model->get_all();
	  $data = array(
            'time_data' => $daily_forecast_time,
			'change' => 65
        );

        $this->load->view('template', $data);
	
	}
	
	//display Minor-Sector form
	public function DailyForecastTimeForm(){
		
	$data['change'] = 66;
	$this->load->view('template', $data);	
   }
   //period_name`, `to_time`, `from_time`
   
   public function saveForecastedTime(){
   	    $id = $this->input->post('id');
	    $datatoinsert = array(
       		 'period_name' => $this->input->post('period_name',TRUE),
       		 'to_time' => $this->input->post('to_time',TRUE),
       		 'from_time' => $this->input->post('from_time',TRUE)
       		 );
	    //====== checking the presence of $id==========
		if (!is_null($id) && $this->Daily_forecast_time_model->get_by_id($id)) {
            $this->Daily_forecast_time_model->update($id,$datatoinsert);
        } else {

            $datatoinsert1 = array(
       		 'period_name' => $this->input->post('period_name',TRUE),
       		 'to_time' => $this->input->post('to_time',TRUE),
       		 'from_time' => $this->input->post('from_time',TRUE)		    
	       );

           $this->Daily_forecast_time_model->insert($datatoinsert1);
        }
		//=====================================================
		$data = array(
			   'time_data'=> $this->Daily_forecast_time_model->get_all(),
			   'change' => 65,);

        $this->load->view('template',$data);  
	   
	 }
	 //--------- Updating  and deleting a given row---------------------
	 public function update($id=NULL) 
     {
	    $row = $this->Daily_forecast_time_model->get_by_id($id);
	 
	    if ($row) { //if there is some data
            $data['change'] = 66;
			$data['time_data']= $row;
			$data['row_data'] =$this->Daily_forecast_time_model->get_by_id($id);
            $this->load->view('template', $data);			
			
        } else {
		  $data = array(
		      'change' => 65,
		//'forecast_id' => $row->forecast_id,
	    );
            $this->session->set_flashdata('message', '<font color="red" size="5">Record Not Found</font>');
           $this->load->view('template', $data);
        }
    }

     public function delete($id=NULL){
     	    $this->Daily_forecast_time_model->delete($id);
     	 //if there is some data
     	    $time_data = $this->Daily_forecast_time_model->get_all();
            $data = array(
            'time_data' => $time_data,
			'change' => 65
        );

        $this->load->view('template', $data);			
		
	}
	//----------------------the end--------------------------------
	
}//end of the class 