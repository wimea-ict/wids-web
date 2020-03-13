<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User_feedback extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        
        $this->lang->load('message', 'english'); 
        // New code lines
        $this->load->model('Advisory_model');       
         $data_records = $this->Advisory_model->get_data_records(); 
        $this->config->set_item('theme',$this->config->item('country'));
        $this->load->model('user_feedback_model');
        $this->load->model('Decadal_forecast_model','decadal_forecast_model');
        $this->load->library('form_validation');
        $this->load->library('session');
    }

    public function index()
    { 
  $user_feedback = $this->user_feedback_model->get_all();
    $data = array(
            'change' => 18,
            'user_feedback_data' => $user_feedback,
        );

        $this->load->view('template', $data);
    }

    public function readfeedback(){
        $user_feedback_data = $this->user_feedback_model->readfeedback();
      //  $feedback = $this->user_feedbak_model->readfeedback();
        $data = array(
            'change' => 40,
            'user_feedback_data' => $user_feedback_data
        );
       
        $this->load->view('template', $data);
    }

    public function read($id) 
    {
    $row = $this->user_feedback_model->get_by_id($id);
    
    if ($row) {
            $data = array(
        //'id' => $row->record_id,
        'names' => $row->names,
        'region' => $row->region,
        'district' => $row->district,
        'observation' => $row->observation,
        'implication' => $row->implication,
        'actionToTake' => $row->action_to_take,

        'change' => 20,
        //'forecast_id' => $row->forecast_id,
        );
            $this->load->view('template', $data);
        } else {
          $data = array(
        'change' => 4,
    );
            $this->session->set_flashdata('message', 'Record Not Found');
           $this->load->view('template', $data);
        }
    }

    public function read_feedback(){
        $feedbackid = $this->uri->segment(3);
        $read_user_feedback = $this->user_feedback_model->get_feedback_by_id($feedbackid);

           $data = array(
               'read_user_feedback' => $read_user_feedback,
               'change' => 42
           );
            $this->load->view('template', $data);
        
    }

public function create2(){
$data = array(
    'change' => 0
);
$this->load->view('template', $data);
}
public function create1(){
 $data = array(
            'user_feedback_data' => $this->user_feedback_model->get_all(),
            'start' => 0,
            'change' => 18,
        );
$this->load->view('template', $data);
//$this->load->view('decadal_forecast_list', $data);
}

public function create3(){
$data = array(
    'change' => 2,
);
$this->load->view('template', $data);
}
    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('index.php/user_feedback/create_action'),
        'names' => set_value('names'),
        'advisory' => set_value('advisory'),
        'region' => set_value('region'),
        'change' => 17,
    );
        $this->load->view('template', $data);
    }
    
    public function create_action() 
    {
    //echo ($this->input->post('names', TRUE));
    //exit;
        $this->_rules();

        if ($this->form_validation->run() == TRUE) {
           $this->create();
        } else {
            $data = array(
        'names' => $this->input->post('names',TRUE),
        'region' => $this->input->post('region',TRUE),
        'district' => $this->input->post('district',TRUE),
        'observation' => $this->input->post('observation',TRUE),
        'impact' => $this->input->post('impact',TRUE),
        'actionToTake' => $this->input->post('actionToTake',TRUE),
        
        );
        
       $checkResult = $this->checkForExistence();

       if ($checkResult) {
        $this->session->set_flashdata('message', '<font color="red" size="5">This indigenous knowledge already exists for this region</font>');
       }
       else {

           $hh = $this->user_feedback_model->insert($data);
            if($hh){
              //  $this->session->set_flashdata('message', 'Create Record Success');
              $this->session->set_flashdata('message', '<font color="green" size="5">Indigenous knowledge inserted successfully</font>');
              }else{
                $this->session->set_flashdata('message', 'Create not Record Successful');
              
              }
              $data = array(
             'change' => 17,
               );
           
            
            }
            $this->load->view('template', $data);
        }
    }

    public function checkForExistence()
    {
            
             $region = $this->input->post('region',TRUE);
             $district = $this->input->post('district',TRUE);

            $observation = $this->input->post('observation',TRUE);
            $impact = $this->input->post('impact',TRUE);
            $actionToTake = $this->input->post('actionToTake',TRUE);

            $newString = $observation." ".$impact." ".$actionToTake;
           
           $sa = $this->user_feedback_model->CheckForExistence($region, $district, $thisregionString);
          
           for ($i=0; $i < count($sa); $i++) { 
            if(strcasecmp($sa[$i], $newString) == 0){
            return true;
            break;
            }
            else {
                continue;
            }

           }
      
    }

    public function verify($id){
        $row = $this->user_feedback_model->get_by_id($id);
       $data = array(
           'change' => 19,
       );

       if ($row) {
        $this->user_feedback_model->verify($id);
        $this->session->set_flashdata('message', '<font color="green" size="5">Record verified</font>');
            $this->load->view('template', $data);
       }
        
    }

    function log_userfeedback(){
   
        $datatoinsert = array(

            'city_id' => $this->input->post('division', TRUE),
            'sector' => $this->input->post('category', TRUE),
            'accuracy' => $this->input->post('accuracy',TRUE),
            'applicability' => $this->input->post('applicability',TRUE),
            'timeliness' => $this->input->post('timeliness',TRUE),
            'generalComment' => $this->input->post('generalComment', TRUE),
            'contact' => $this->input->post('contact', TRUE)
        
        );
        
    $this->Decadal_forecast_model->logfeedback($datatoinsert);

   

    // $this->load->view("request_service.php");
      
    
    }
    
    public function update($id) 
    {
        $row = $this->Decadal_forecast_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('index.php/decadal_forecast/update_action'),
        'id' => set_value('id', $row->decadal_id),
        'region' => set_value('region', $row->region),
        'advisory' => set_value('advisory', $row->advisory),
        'date_from' => set_value('date_from', $row->date_from),
        'date_to' => set_value('date_to', $row->date_to),
        'issuetime' => set_value('issuetime', $row->issuetime),
        'change'   => 12,
        );
            $this->load->view('template', $data);
        } else {
        $data = array(
           'change'   => 4,
        );
            $this->session->set_flashdata('message', 'Record Not Found');
            $this->load->view('template', $data);
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
        'advisory' => $this->input->post('advisory',TRUE),
        'date_from' => $this->input->post('date_from',TRUE),
        'date_to' => $this->input->post('date_to',TRUE),
        //'issuetime' => $this->input->post('issuetime',TRUE),
        );

            $this->Decadal_forecast_model->update($this->input->post('id', TRUE), $data);
            $data = array(
           'change'   => 4,
        );
            $this->session->set_flashdata('message', 'Update Record Success');
            $this->load->view('template',$data);
        }
    }
    
    public function delete($id) 
    {
        $row = $this->user_feedback_model->get_by_id($id);
        $data = array(
           'change'   => 19,
        );
        if ($row) {
            $this->user_feedback_model->delete($id);
            
            $this->session->set_flashdata('message', '<font color="green" size="5">Record Successfully Deleted</font>');
            $this->load->view('template', $data);
        } else {
            $this->session->set_flashdata('message', '<font color="red" size="5">Record Not Found</font>'); 
           $this->load->view('template', $data);
        }
    }

    public function delete_feedback($feedbackid){
        $row = $this->user_feedback_model->get_feedback_by_id($feedbackid);
        $data = array(
            'change' => 41,
        );
        if ($row) {
            $this->user_feedback_model->delete_feedback($feedbackid);
            $this->session->set_flashdata('message', '<font color="green" size="5">Record Successfully Deleted</font>');
            $this->load->view('template', $data);
        }
        else {

            $this->session->set_flashdata('message', '<font color="red" size="5">Record Not Found</font>'); 
           $this->load->view('template', $data);
        }
    }

    public function _rules() 
    {
    $this->form_validation->set_rules('names', 'names', 'trim|required');
    $this->form_validation->set_rules('advisory', 'advisory', 'trim|required');
    $this->form_validation->set_rules('region', 'region', 'trim|required');
    //$this->form_validation->set_rules('issuetime', 'issuetime', 'trim|required');

    //$this->form_validation->set_rules('id', 'id', 'trim');
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
        header("Content-Disposition: attachment;Filename=user_feedback.doc");

        $data = array(
            'user_feedback_data' => $this->user_feedback_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('user_feedback_doc',$data);
    }

    public function feedback_word(){
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=user_feedback.doc");
        $user_feedback = $this->user_feedback_model->readfeedback();
        $data = array(
            'user_feedback' => $user_feedback
        );

        $this->load->view('read_user_feedback_doc', $data);
    }

    public function pdf()
    {
        $data = array(
            'user_feedback_data' => $this->user_feedback_model->get_all(),
            'start' => 0,
        );
        
        ini_set('memory_limit', '10G');
        $html = $this->load->view('user_feedback_pdf', $data, true);
        $this->load->library('pdf');
        $pdf = $this->pdf->load();
        $pdf->WriteHTML($html);
        $pdf->Output('user_feedback.pdf', 'D'); 
    }

    public function feedback_pdf(){
        $data = array(
            'user_feedback' => $this->user_feedback_model->readfeedback(),
            'start' => 0,
        );

        ini_set('memory_limit', '10G');
       // $data['user_feedback_data'] = $this->Advisory_model->get_data_records();
        $html = $this->load->view('read_user_feedback_doc', $data, true);
        $this->load->library('pdf');
        $pdf = $this->pdf->load();
        $pdf->WriteHTML($html);
        $pdf->Output('user_feedback.pdf', 'D'); 
    }


}

/* End of file Decadal_forecast.php */