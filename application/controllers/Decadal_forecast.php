<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Decadal_forecast extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
	    $this->config->set_item('theme',$this->config->item('country'));
        $this->load->model('Decadal_forecast_model');
        $this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('Sub_region_model');
    }

    public function index()
    {
    	$data['decadal_forecast'] =  $this->Decadal_forecast_model->get_all(); 
		$data['change'] = 2;
		$this->load->view('template', $data);
    }
	
	//form for adding new area forecast
	function areaforecast(){
		$forecastid= $this->uri->segment(3);		      
        $data['change'] = 77;
		$data['subregion'] = $this->Sub_region_model->get_all();
			
        $this->load->view('template', $data);	
		
	}
	
	//saving area forecast
	function saveareaforecast(){
	    $datatoinsert = array(
             'region_id' => $this->input->post('region_id',TRUE),
			 'subregion_id'=>$this->input->post('subregion_id',TRUE),
			 'dekadal_id'=>$this->input->post('forecast_id',TRUE),			
             'mapurl' => $this->input->post('mapurl',TRUE),
			 'general_info' => $this->input->post('general_info',TRUE)            
           
             );
         $this->Decadal_forecast_model->insertDekadalForecastArea($datatoinsert);
         $data = array(
           'dekadal_area_data'=> $this->Decadal_forecast_model->get_dekadal_forecast_area(),
           'change' => 76
            );
    $this->load->view('template',$data); 		
		
	}
	
	// for a specific area 
	function showareaforecast(){
	   $forecastid= $this->uri->segment(3);
       $decadal_data = $this->Decadal_model->get_all();
       
       $data = array(                               
                'change' => 76,
				'decadal_data'=>$subregion
               
             );
      $this->load->view('template', $data);	
	
	}

    public function read($id) 
    {
	 $id = $this->uri->segment(3);
	 $data['decadal_details'] = $this->Decadal_forecast_model->get_by_id($id);
	 $data['change'] = 11;	      
	 
	 $this->load->view('template', $data);      
		
    }
	
	
	
public function create2(){
	$data['change'] = 0;
	$this->load->view('template', $data);
}



public function create1(){
 $data = array(
            'decadal_forecast_data' => $this->Decadal_forecast_model->get_all(),
            'start' => 0,
			'change' => 4
        );
$this->load->view('template', $data);

}

public function create3(){
$data['change'] = 2;
$this->load->view('template', $data);
}
    public function create() 
    {
         $data = array(
            'button' => 'Create',
            'error' => ' ',
            'error1'=> ' ',
            'ed' => '1',
            'action' => site_url('index.php/decadal_forecast/create_action'),
	    'id' => set_value('id'),
	    'advisory' => set_value('advisory'),
	    'date_from' => set_value('date_from'),
	    'date_to' => set_value('date_to'),
	    'issuetime' => set_value('issuetime'),
	    'graph' => set_value('graph'),
        'audio' => set_value('audio'),
		'change' => 71,
	);
        $this->load->view('template', $data);
    }
    
    public function create_action() 
    {
		
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            if (!empty($_FILES['userfile']['name'])) {
                $this->do_upload();
                if (!$this->upload->do_upload('userfile')) {
                    $data = array(
                        'error' => $this->upload->display_errors(),
                        'error1' => '',
                        'ed' => '1',
                        'button' => 'Create',
                        'action' => site_url('index.php/decadal_forecast/create_action'),
                        'id' => set_value('id'),
                        'advisory' => set_value('advisory'),
                        'date_from' => set_value('date_from'),
                        'date_to' => set_value('date_to'),
                        'issuetime' => set_value('issuetime'),
                        'graph' => set_value('graph'),
                        'audio' => set_value('audio'),
                        'change' => 2,

                    );
                    $det = "3";
                    $upload = "not_ok";
                    $this->load->view('template', $data);
                    // echo "not done";
                    //exit;
                } else {
                    $temp = $this->upload->data();
                    $image = $temp['file_name'];
                    $upload = "ok";
                    $det = "2";
                }
            } else {

                $image = "no image upload";
                $upload = "ok";
                $det = "1";
            }
            if (!empty($_FILES['userfile1']['name'])) {
                $this->do_upload();
                if (!$this->upload->do_upload('userfile1')) {
                    $data = array(
                        'error1' => $this->upload->display_errors(),
                        'error' => '',
                        'ed' => '1',
                        'button' => 'Create',
                        'action' => site_url('index.php/decadal_forecast/create_action'),
                        'id' => set_value('id'),
                        'advisory' => set_value('advisory'),
                        'date_from' => set_value('date_from'),
                        'date_to' => set_value('date_to'),
                        'issuetime' => set_value('issuetime'),
                        'forecast_id' => set_value('forecast_id'),
                        'graph' => set_value('graph'),
                        'audio' => set_value('audio'),
                        'change' => 2,

                    );
                    $upload1 = "not_ok";
                    $det1 = "2";

                    $this->load->view('template', $data);

                } else {
                    $dat = $this->upload->data();
                    $image1 = $dat['file_name'];
                    $upload1 = "ok";
                    $det1 = "1";

                }
            } else {
                $upload1 = "ok";
                $det1 = "1";
                $image1 = "no audio uploaded";


            }
            if (($det == "2") && ($det1 == "2")) {

                $path1 = $_SERVER['DOCUMENT_ROOT'] . 'Dissemination/uploads_decadal/' . $image;
               

                $this->remove_file($path1);
                //$this->remove_file($path);
            }
            if ($det == "3" && $det1 == "1") {

                $path1 = $_SERVER['DOCUMENT_ROOT'] . 'Dissemination/uploads_decadal/' . $image1;
                //$path = $_SERVER['DOCUMENT_ROOT'].'Dissemination_tz/'.$row->audio;

                $this->remove_file($path1);
                //$this->remove_file($path);
            }
            if ($upload == "ok" && $upload1 == "ok") {

                $data = array(
                    'advisory' => $this->input->post('advisory', TRUE),
                    'region' => $this->input->post('region', TRUE),
                    'subregion' => $this->input->post('sub_region', TRUE),
                    'date_from' => $this->input->post('date_from', TRUE),
                    'date_to' => $this->input->post('date_to', TRUE),
                    'lang'=>$this->input->post('lang',TRUE),
                    'file1' => 'uploads_decadal/' . $image,
                    'file2' => 'uploads_decadal/' . $image1,

                );

                $hh = $this->Decadal_forecast_model->insert($data);
                if ($hh) {
                    
                    $region = $this->input->post('region', TRUE);
                    $sub_region = $this->input->post('sub_region', TRUE);
                    $dek =  $this->input->post('advisory', TRUE);
                    $date_from = $this->input->post('date_from', TRUE);
                    $date_to = $this->input->post('date_to', TRUE);

                    $farm = $this->Decadal_forecast_model->getfarmers($region,$sub_region,$dek,$date_from,$date_to);
//var_dump($farm);exit;
                    $this->session->set_flashdata('message', '<font color="green" size="5">Create Record Success</font>');
                } else {
                    $this->session->set_flashdata('message', '<font color="red" size="5">Create not Record Successful</font>');
                }
             $data['change'] = 4;
                $this->load->view('template', $data);
            }
        }

    }
	
	public function save(){
		
		 $date_from = explode("/",$this->input->post('datefrom',TRUE));
		 $date_to = explode("/",$this->input->post('dateto',TRUE));		
		
		 $data = array(
				'volume' => $this->input->post('volume',TRUE),
				'issue' => $this->input->post('issue',TRUE),
				'max_temp' => $this->input->post('max_temp',TRUE),
				'min_temp' => $this->input->post('min_temp',TRUE),
				'mean_temp' => $this->input->post('mean_temp',TRUE),
				'rainfall' => $this->input->post('rainfall',TRUE),
				'general_info' => $this->input->post('general_description',TRUE),				
				'date_from' => $date_from[2]."-".$date_from[1]."-".$date_from[0],
				'date_to' =>  $date_to[2]."-".$date_to[1]."-".$date_to[0],
				'map_url' => $this->input->post('mapurl',TRUE)				
				);
		
            $this->Decadal_forecast_model->insert($data);	
     		 $decadal_forecast = $this->Decadal_forecast_model->get_all();  	
			$data['decadal_forecast'] =  $decadal_forecast;
			$data['change'] = 2;
			$this->load->view('template', $data);
				
	}
	
    
        
    public function update($id) 
    {
        $row = $this->Decadal_forecast_model->get_by_id($id);
        

        if ($row) {
            $luganda = $row->advisoryLuganda;
            $english = $row->advisory;

            if($luganda!=NULL){
            $data = array(
                'error1' => '',
                'error' => '',
                'ed' => '2',
                'button' => 'Update',
                'action' => site_url('index.php/decadal_forecast/update_action'),
		'id' => set_value('id', $row->decadal_id),
		'region' => set_value('region', $row->region),
        'subregion' => set_value('subregionid', $row->subregionid),
		'advisory' => set_value('advisory', $row->advisoryLuganda),
		'date_from' => set_value('date_from', $row->date_from),
		'date_to' => set_value('date_to', $row->date_to),
         'graph' => set_value('graph', $row->graph),
         'audio' => set_value('audio', $row->audio),
		'issuetime' => set_value('issuetime', $row->issuetime),
        'change'   => 12,
        'lang' =>'Luganda',
        );
    }
    elseif($english!=NULL){
            $data = array(
                'error1' => '',
                'error' => '',
                'ed' => '2',
                'button' => 'Update',
                'action' => site_url('index.php/decadal_forecast/update_action'),
		'id' => set_value('id', $row->decadal_id),
		'region' => set_value('region', $row->region),
        'subregion' => set_value('subregionid', $row->subregionid),
		'advisory' => set_value('advisory', $row->advisory),
		'date_from' => set_value('date_from', $row->date_from),
		'date_to' => set_value('date_to', $row->date_to),
         'graph' => set_value('graph', $row->graph),
         'audio' => set_value('audio', $row->audio),
		'issuetime' => set_value('issuetime', $row->issuetime),
        'change'   => 12,
        'lang' =>'English',
            );
        }
            $this->load->view('template', $data);
        } else {
        	$data['change'] = 4;
            $this->session->set_flashdata('message', '<font color="red" size="5">Record Not Found</font>');
            $this->load->view('template', $data);
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {

            if (!empty($_FILES['userfile']['name'])) {
            $this->do_upload();
            if (!$this->upload->do_upload('userfile')) {
                    $row = $this->Decadal_forecast_model->get_by_id($this->input->post('id',TRUE));

                if ($row) {
                    $luganda = $row->advisoryLuganda;
                    $english = $row->advisory;
                            if($luganda!=NULL){
                            $data = array(
                                'error' => $this->upload->display_errors(),
                                'error1' => '',
                                'ed' => '2',
                                'button' => 'Update',
                                'action' => site_url('index.php/decadal_forecast/update_action'),
                                'id' => set_value('id', $row->decadal_id),
                                'region' => set_value('region', $row->region),
                                'advisory' => set_value('advisory', $row->advisoryLuganda),
                                'date_from' => set_value('date_from', $row->date_from),
                                'date_to' => set_value('date_to', $row->date_to),
                                'graph' => set_value('graph', $row->graph),
                                'audio' => set_value('audio', $row->audio),
                                'issuetime' => set_value('issuetime', $row->issuetime),
                                'change'   => 12,
                                'lang' =>'Luganda',
                            );
                        }
                elseif ($english!=NULL) {
                    $data = array(
                        'error' => $this->upload->display_errors(),
                        'error1' => '',
                        'ed' => '2',
                        'button' => 'Update',
                        'action' => site_url('index.php/decadal_forecast/update_action'),
                        'id' => set_value('id', $row->decadal_id),
                        'region' => set_value('region', $row->region),
                        'advisory' => set_value('advisory', $row->advisory),
                        'date_from' => set_value('date_from', $row->date_from),
                        'date_to' => set_value('date_to', $row->date_to),
                        'graph' => set_value('graph', $row->graph),
                        'audio' => set_value('audio', $row->audio),
                        'issuetime' => set_value('issuetime', $row->issuetime),
                        'change'   => 12,
                        'lang' =>'English', 
                    );
                }
                    $det = "1";
                    $upload = "not_ok";
                    $this->load->view('template', $data);
                } else {
                    $det = "1";
                    $upload = "not_ok";
                    $data['change'] = 4;
                    $this->session->set_flashdata('message', '<font color="red" size="5">Record Not Found</font>');
                    $this->load->view('template', $data);
                }
            } else {
                $det = "2";
                $upload = "ok";
                $temp = $this->upload->data();
                $image = $temp['file_name'];
               // $image = 'uploads_decadal/' . $image;
            }

            }else{
                $image = $this->input->post('graph', TRUE);
                $upload = "ok";
                $det = "3";

            }
            if (!empty($_FILES['userfile1']['name'])) {
                $this->do_upload();
                if (!$this->upload->do_upload('userfile1')) {
                    $row = $this->Decadal_forecast_model->get_by_id($this->input->post('id',TRUE));

                    if ($row) {
                        $data = array(
                            'error1' => $this->upload->display_errors(),
                            'error' => '',
                            'ed' => '2',
                            'button' => 'Update',
                            'action' => site_url('index.php/decadal_forecast/update_action'),
                            'id' => set_value('id', $row->decadal_id),
                            'region' => set_value('region', $row->region),
                            'advisory' => set_value('advisory', $row->advisoryLuganda),
                            'date_from' => set_value('date_from', $row->date_from),
                            'date_to' => set_value('date_to', $row->date_to),
                            'graph' => set_value('graph', $row->graph),
                            'audio' => set_value('audio', $row->audio),
                            'issuetime' => set_value('issuetime', $row->issuetime),
                            'change'   => 12,
                            'lang' =>'English',
                        );
                        $det1 = "2";
                        $upload1 = "not_ok";
                        $this->load->view('template', $data);
                    } else {
                        $det1 = "2";
                        $upload1 = "not_ok";
                      $data['change'] = 4;
                        $this->session->set_flashdata('message', '<font colour="red" size="5">Record Not Found</font>');
                        $this->load->view('template', $data);
                    }

                } else {
                    $dat = $this->upload->data();
                    $image1 = $dat['file_name'];
                    //$image1 = 'uploads_decadal/' . $image1;
                    $upload1 = "ok";
                    $det1 = "1";

                }
            }else{
                $image1 = $this->input->post('audio', TRUE);
                $upload1 = "ok";
                $det1 = "3";


            }
            if($det == "2" && $upload1 == "not_ok"){

                $path1 = $_SERVER['DOCUMENT_ROOT'] . 'Dissemination/uploads_decadal/' . $image;
                //$path = $_SERVER['DOCUMENT_ROOT'].'Dissemination_tz/'.$row->audio;

                $this->remove_file($path1);
                //$this->remove_file($path);
            }
            if($det == "1" && $upload == "not_ok"){

                $path1 = $_SERVER['DOCUMENT_ROOT'] . 'Dissemination/uploads_decadal/' . $image1;
                //$path = $_SERVER['DOCUMENT_ROOT'].'Dissemination_tz/'.$row->audio;

                $this->remove_file($path1);
                //$this->remove_file($path);
            }
            if($det == "2" && $det1 == "1" ){

                $odd = $this->input->post('audio', TRUE);

                $odd1 = $this->input->post('graph', TRUE);
                if(!(strpos($odd,'no image'))) {
                    $path1 = $_SERVER['DOCUMENT_ROOT'] . 'Dissemination/' . $odd1;
                    $this->remove_file($path1);
                }
                if(!(strpos($odd,'no audio'))) {
                    $path = $_SERVER['DOCUMENT_ROOT'] . 'Dissemination/' . $odd;
                    $this->remove_file($path);
                }
                $image = 'uploads_decadal/' . $image;
                $image1 = 'uploads_decadal/' . $image1;
            }
            if(($det == "2" && $det1 == "2" ) || ($det == "2" && $det1 == "3" )){

                $image = 'uploads_decadal/' . $image;

            }
            if(($det == "3" && $det1 == "1" ) || ($det == "1" && $det1 == "1" )){

                $image1 = 'uploads_decadal/' . $image1;
            }

             if($upload == "ok" && $upload1 == "ok") {


                 $data = array(
                     'advisory' => $this->input->post('advisory', TRUE),
                     'date_from' => $this->input->post('date_from', TRUE),
                     'date_to' => $this->input->post('date_to', TRUE),
                     'lang'=>$this->input->post('lang', TRUE),
                     'file1' => $image,
                     'file2' => $image1,
                 );

                 $this->Decadal_forecast_model->update($this->input->post('id', TRUE), $data);
                $data['change'] = 4;
                 //send message to frequent farmers
                 $region = $this->input->post('region', TRUE);
                    $sub_region = $this->input->post('sub_region', TRUE);
                    $dek =  $this->input->post('advisory', TRUE);
                    $date_from = $this->input->post('date_from', TRUE);
                    $date_to = $this->input->post('date_to', TRUE);

                    $farm = $this->Decadal_forecast_model->getfarmers($region,$sub_region,$dek,$date_from,$date_to);
                    var_dump($farm);exit;

                 $this->session->set_flashdata('message', '<font color="green" size="5">Update Record Success</font>');
                 $this->load->view('template', $data);

             }

        }
    } 
    public function delete($id) 
    {
        $row = $this->Decadal_forecast_model->get_by_id($id);
        $data['change'] = 4;
        if ($row) {
            //echo $row->graph, $row->audio;
            //exit;
            if(!(strpos($row->graph,'no image'))) {
                $path1 = $_SERVER['DOCUMENT_ROOT'].'Dissemination/'.$row->graph;
                $this->remove_file($path1);
            }

            if(!(strpos($row->audio,'no audio'))) {
                $path = $_SERVER['DOCUMENT_ROOT'].'Dissemination/'.$row->audio;
                $this->remove_file($path);
            }


            $this->Decadal_forecast_model->delete($id);
			
            $this->session->set_flashdata('message', '<font color="green" size="5">Delete Record Success</font>');
            $this->load->view('template', $data);
        } else {
            $this->session->set_flashdata('message', '<font color="red" size="5">Record Not Found</font>');
           $this->load->view('template', $data);
        }
    }

    public function remove_file($pp)
    {
        if (file_exists($pp)) {
            unlink($pp);
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('advisory', 'advisory', 'trim|required');
	$this->form_validation->set_rules('date_from', 'date from', 'trim|required');
	$this->form_validation->set_rules('date_to', 'date to', 'trim|required');
	//$this->form_validation->set_rules('issuetime', 'issuetime', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }


    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "decadal_forecast.xls";
        $judul = "decadal_forecast";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
		 xlsWriteLabel($tablehead, $kolomhead++, "Region");
	xlsWriteLabel($tablehead, $kolomhead++, "Advisory");
	xlsWriteLabel($tablehead, $kolomhead++, "Date From");
	xlsWriteLabel($tablehead, $kolomhead++, "Date To");
	xlsWriteLabel($tablehead, $kolomhead++, "Issuetime");

	foreach ($this->Decadal_forecast_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
			 xlsWriteLabel($tablebody, $kolombody++, $data->region);
	    xlsWriteLabel($tablebody, $kolombody++, $data->advisory);
	    xlsWriteLabel($tablebody, $kolombody++, $data->date_from);
	    xlsWriteLabel($tablebody, $kolombody++, $data->date_to);
	    xlsWriteLabel($tablebody, $kolombody++, $data->issuetime);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=decadal_forecast.doc");

        $data = array(
            'decadal_forecast_data' => $this->Decadal_forecast_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('decadal_forecast_doc',$data);
    }

    public function pdf()
    {
        $data = array(
            'decadal_forecast_data' => $this->Decadal_forecast_model->get_all(),
            'start' => 0
        );
        
        ini_set('memory_limit', '10G');
        $html = $this->load->view('decadal_forecast_pdf', $data, true);
        $this->load->library('pdf');
        $pdf = $this->pdf->load();
        $pdf->WriteHTML($html);
        $pdf->Output('decadal_forecast.pdf', 'D'); 
    }
    public function do_upload()
    {
        $config['upload_path']          = './uploads_decadal/';
        $config['allowed_types']        = 'gif|jpg|jpeg|png|mp3|mp4|mpeg';
        $config['max_size']             = 5000000;
        $config['max_width']            = 5000000;
        $config['max_height']           = 7680000;

        $this->load->library('upload', $config);

    }
	
	public function list(){
		 $data = array(
					'decadal_forecast_data' => $this->Decadal_forecast_model->get_all(),
					'start' => 0,
					'change' => 4
				);
		$this->load->view('template', $data);

}

}

/* End of file Decadal_forecast.php */