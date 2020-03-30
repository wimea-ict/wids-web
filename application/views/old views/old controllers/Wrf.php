<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Wrf extends CI_Controller
{
    

    function __construct()
    {
        parent::__construct();
        $this->load->model('Wrf_model');
        $this->load->library('form_validation');
    }

    public function index(){
    	$data = array(
    		 'button' => 'Create',
            'error' => ' ',
            //'error1'=> ' ',
           'ed' => '1',
            'action' => site_url('index.php/wrf/create_action'),  
    		'change' => 30
    	);
    	$this->load->view('template', $data);
    }

    public function send(){//sftp://andrew@wids.mak.ac.ug/home/okwir/Build_WRF/WRFV3/run/Districts.csv

          $sqlx = "LOAD DATA LOCAL INFILE '~/home/okwir/Build_WRF/WRFV3/run/Districts.csv' INTO TABLE dissemination.data2
                   FIELDS TERMINATED BY ','
                   LINES TERMINATED BY '\n'
                   IGNORE 1 LINES
                   (d01, d02, d03, d04)"; 
          $sql2= $this->db->query($sqlx);

    }

    public function read(){
    	//$ww = "SELECT * FROM advisory ORDER BY desc ";
    	//$ww2 = $this->query($ww);
    	//echo json_encode($ww2);

    	$res = $this->Wrf_model->get_all();
    	//echo json_encode($res);
    	if($res){

    		echo json_encode(array("status" => TRUE));
    	} 

    }

    public function create_action(){

    	if(!empty($_FILES['userfile']['name'])){

 			$data = array(
        
                    'file1' => 'uploads/' . $image,
                    //'file2' => 'uploads/' . $image1,

                );

                $hh = $this->Wrf_model->insert($data);
                if ($hh) {
                    $this->session->set_flashdata('message', 'Create Record Success');
                } else {
                    $this->session->set_flashdaa('message', 'Create not Record Successful');
                }
              //  $season = $this->Season_model->get_all();
                //$data = array(
                  //  'season_data' => $season,
                    //'change' => 15,
                //);

                $this->load->view('template', $data);
}

    }

}

