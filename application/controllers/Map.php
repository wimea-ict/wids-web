<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Map extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Advisory_model');
        $this->load->model('Season_model');
        $this->load->model('Division_model');
         $this->load->model('Daily_forecast_model');
        $this->load->library('form_validation');
        $this->load->helper('number');
      
        include APPPATH . 'third_party/morris/landing_charts.php';
    }

    public function index(){

  
        
          $this->load->view('map');  
    }

    public function daily($x){
        $advisories_data = $this->Daily_forecast_model->get_map_advice($x);
        $data = array(
            'division' =>$x,
            'advisories_data' => $advisories_data,
           // 'advisory_data' => $advisory
        );
///----------------------------------
        $data['daily_advice'] = $this->Daily_forecast_model->get_advice($division_id);
            $data['seasonal_advice'] = $this->Daily_forecast_model->get_advice($division_id);
               $daily_forecast_data = $this->Daily_forecast_model->get_recent_forecast();
                // retrieves forecast for the next day
                $next_day_forecast_data = $this->Daily_forecast_model->get_next_day_forecast($division_id);
                $data['next_day_forecast_data']=$next_day_forecast_data;
                if(isset($next_day_forecast_data)){ 
                    foreach($next_day_forecast_data as $d){ 
                        $tomorrow = $d->date;   
                        $tmr_forecast = $d->id;
                        $weather_desc = $d->weather;
                        $valid = $d->validitytime;  
                        $issuedat = $d->issuedate;      

                    }
                }
                $data['daily_forecast_data']= $daily_forecast_data;
                if(isset($daily_forecast_data)){ 
      
                    foreach($daily_forecast_data as $d){
                        $forecast_id = $d->id;
                        $forecast_time = $d->time;  
                        $today = $d->date;  
                    }
                }   
                // passing data to the view
                $data['today'] = $today;
                $data['tomorrow'] = $tomorrow;
                $data['weather_desc'] =  $weather_desc;
                $data['valid'] = $valid;
                $data['issuedat'] = $issuedat;
                $get_next_day_forecast_data_for_region= $this->Daily_forecast_model->get_next_day_forecast_data_for_region($tmr_forecast,$division_id);
                $data['get_next_day_forecast_data_for_region'] =$get_next_day_forecast_data_for_region; 
                // passing data to the view
                $data['daily_forecast_data']= $daily_forecast_data;
                if(isset($daily_forecast_data)){ 
                    foreach($daily_forecast_data as $d){
                        $forecast_id = $d->id;
                        $forecast_time = $d->time;                                  
                    }
                }
                $daily_forecast_region_data= $this->Daily_forecast_model->get_daily_forecast_data_for_region($forecast_id,$division_id);
                $data['daily_forecast_region_data'] =$daily_forecast_region_data;

               //division name for currently accessed daily forecast
               $division_name = $this->Division_model->get_divisionNameByID($division_id);
               $data['division_name'] =$division_name;
               $data['div_id']= $division_id;
               //Retrieve daily forecast for specific/ random region
               $daily_forecast_region_data_dynamic = $this->Daily_forecast_model->get_daily_forecast_data_for_region($forecast_id,$random);
               $data['daily_forecast_region_data_dynamic'] = $daily_forecast_region_data_dynamic;
///----------------------------------







     $this->load->view('daily_map_display', $data);  
     $this->load->view('chart', $data);

    }

 
 public function seasonal($x){
        $advisories_data = $this->Season_model->get_map_advice($x);
        $data = array(
            'division' =>$x,
            'advisories_data' => $advisories_data,
           // 'advisory_data' => $advisory
        );
     $this->load->view('map_advisory_read', $data); 
     $this->load->view('chart', $data); 

    }

 public function dekadal($x){
      $advisories_data = $this->Season_model->get_map_advice($x);
        $data = array(
            'division' =>$x,
            'advisories_data' => $advisories_data,
           // 'advisory_data' => $advisory
        );
     $this->load->view('map_advisory_read', $data); 
     $this->load->view('chart', $data); 

    }

 public function food($x){  
        $data = array(
            'a' => $x,
            'c' => 1,
           // 'advisory_data' => $advisory
        );
     $this->load->view('map_advisory_read', $data);  
     $this->load->view('chart', $data);

    }

 public function health($x){
        $data = array(
            'a' => $x,
            'c' => 8,
           // 'advisory_data' => $advisory
        );
     $this->load->view('map_advisory_read', $data); 
     $this->load->view('chart', $data); 

    }

    
}