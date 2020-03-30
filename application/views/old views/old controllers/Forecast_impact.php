<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Forecast_impact extends CI_Controller
{


    function __construct()
    {
        parent::__construct();
		$this->config->set_item('theme',$this->config->item('country'));
        $this->load->model('Forecast_impact_model');
        $this->load->library('form_validation');
        $this->load->model('Impacts_model');
         $this->load->library('session');
    }

//index function 

//-----------------------------------------------------------
//show area forecast impacts
function daily_impacts_data(){
    $id = $this->uri->segment(3);
    $data['daily_impacts_data'] = $this->Forecast_impact_model->get_daily_impacts_data($id);
   // $country = $this->config->item('country');
    //$data['division_type']= $this->Division_model->getdivisionname($country);  
    $data['forecast_id'] = $id;
    $data['change'] = 80; 
    $this->load->view('template', $data);	
      
  }
//add new forecast_impact
  function addforecastimpactdata(){

    $data['forecast_id'] = $this->uri->segment(3);	
    $data['change'] = 81; 
    $data['impacts_data'] = $this->Impacts_model->get_all();
   // print_r($data); exit();
    $this->load->view('template', $data);
      
  }
  // save forecast-impact data
function saveforecastimpactdata(){
	$id = $this->input->post('forecast_id',TRUE);
	$data = array(
				'type' => $this->input->post('type',TRUE),
				'impact_id' => $this->input->post('impact_id',TRUE),
				'forecast_id' => $this->input->post('forecast_id',TRUE)
				);	
		    $this->Forecast_impact_model->insertforecastimpactdata($data);
            $data['daily_impacts_data'] = $this->Forecast_impact_model->get_daily_impacts_data($id);
            // $country = $this->config->item('country');
             //$data['division_type']= $this->Division_model->getdivisionname($country);  
             $data['forecast_id'] = $id;
             $data['change'] = 80; 
             $this->load->view('template', $data);   
	
}

public function delete()
{   $id = $this->uri->segment(3);
    $data['change'] =80;
        $this->Forecast_impact_model->delete($id);
        $this->session->set_flashdata('message', '<font color="green" size="5">Deleted Record Success</font>');
        $this->load->view('template', $data);

}
//----------------------------------------------------------------------------------


}

/* End of file Daily_forecast.php */
