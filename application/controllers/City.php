<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class City extends CI_Controller
{
	
	  function __construct()
    {
        parent::__construct();
	$this->config->set_item('theme','Ghana');
        $this->load->model('City_model');
        //$this->load->model('Division_model');
        $this->load->library('form_validation');
        $this->load->library('session');
    }


   public function index()
    { 
	  $data['city_data'] = $this->City_model->get_all();
	  $data['change'] = 48;
      $this->load->view('template', $data);	
	}
  //---------doc------------------------
  public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=city.doc");

        $data = array(
            'city_data' => $this->City_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('city_doc',$data);
    }
    //--------------------------------
	
	public function pdf()
    {
        $data = array(
          'city_data' => $this->City_model->get_all(),
          'start' => 0
        );
        
        ini_set('memory_limit', '10G');
        $html = $this->load->view('city_doc', $data, true);
        $this->load->library('pdf');
        $pdf = $this->pdf->load();
        $pdf->WriteHTML($html);
        $pdf->Output('city.pdf', 'D'); 
    }
public function savecity(){
      $id = $this->input->post('id');
      $datatoinsert = array(
       		 'city_name' => $this->input->post('city_name',TRUE),
             'division_id' => $this->input->post('division_id',TRUE),
             'major_city' => $this->input->post('major_city',TRUE)
	    );
      //====== checking the presence of $id==========
    if (!is_null($id) && $this->City_model->get_by_id($id)) {
            $this->City_model->update($id,$datatoinsert);
        } else {

            $datatoinsert1 = array(
           'division_name' => $this->input->post('division_name',TRUE),
       'division_type' => $this->input->post('division_type',TRUE),
       'region_id' => $this->input->post('region_id',TRUE)        
         );

           $this->City_model->insert($datatoinsert1);
        }
    //=====================================================
	$data['city_data']= $this->City_model->get_all();
    $data['change'] = 48;

    $this->load->view('template',$data);  	   
	   
  }

//show form for adding the city
public function displayform(){

    $data['city_data']= $this->City_model->get_all();
    $data['division_data']= $this->City_model->get_all();
// print_r($this->City_model->get_all()); exit();
    $data['change'] = 51;
    $this->load->view('template', $data);	
    }  

//--------- Updating  and deleting a given row---------------------
   public function update($id=NULL) 
     {   
      $data['city_data']= $this->City_model->get_all();
      $data['division_data']= $this->City_model->get_all();
      $row = $this->City_model->get_by_id($id);
   
      if ($row) { //if there is some data
            $data['change'] = 51;//referencing the form view
            $data['city_data']= $row;
            $data['row_data'] =$this->City_model->get_by_id($id);
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
          $this->City_model->delete($id);
       //if there is some data
          $city = $this->City_model->get_all();
            $data = array(
            'city_data' => $city,
      'change' => 48
        );

        $this->load->view('template', $data);     
    
  }
  //----------------------the end--------------------------------
  } 