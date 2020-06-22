<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Coastline_forecast extends CI_Controller
{


    function __construct()
    {
        parent::__construct();
		$this->config->set_item('theme',$this->config->item('country'));
        $this->load->model('Coastline_forecast_model');
         $this->load->library('session');
		
    }

    public function index()
    {
        $coastline_forecast = $this->Coastline_forecast_model->get_all();
		//$country = $this->config->item('country');  
        $data = array(
            'coastline_forecast_data' => $coastline_forecast,
            'change' => 92
        );
        $this->load->view('template', $data);
    }

      public function addnew()
    {
        $data['coastline_forecast_data']= $this->Coastline_forecast_model->get_all();
		$data['change'] = 93;
        $this->load->view('template', $data);
    }

    //save coastline 
  public function save(){
      //--------date-----------------------------------
      $date = strtotime($this->input->post('issue_date',TRUE));
    $issue_date = date('Y',$date).'-'.date('m',$date).'-'.date('d',$date);
    $valid = strtotime($this->input->post('valid_date',TRUE));
    $valid_date = date('Y',$valid).'-'.date('m',$valid).'-'.date('d',$valid);
      //-------end of date format----------------
         $data = array(
                'issue_date' => $issue_date,
                'valid_date' => $valid_date,
                'duty_forecaster' => $this->input->post('duty_forecaster',TRUE),
                'sea_state' => $this->input->post('sea_state',TRUE),
                'warning' => $this->input->post('warning',TRUE),
                'surface_wind_24' => $this->input->post('wind_24',TRUE),
                'surface_wind_48' => $this->input->post('wind_48',TRUE),
                'visibility_24' => $this->input->post('visibility_24',TRUE),
                'visibility_48' => $this->input->post('visibility_48',TRUE),
                'temp_24' => $this->input->post('temp_24',TRUE),
                'temp_48' => $this->input->post('temp_48',TRUE),

                'height_24' => $this->input->post('wind_48',TRUE),
                'height_48' => $this->input->post('visibility_24',TRUE),
                'wave_24' => $this->input->post('visibility_48',TRUE),
                'wave_48' => $this->input->post('temp_24',TRUE),
                'temp_48' => $this->input->post('temp_48',TRUE),

                 'current_24' => $this->input->post('current_24',TRUE),
                'current_48' => $this->input->post('current_48',TRUE),
                'weather' => $this->input->post('weather',TRUE),             
                );
        
            $this->Coastline_forecast_model->insert($data);
        
            $data['change'] = 92;
            $data['coastline_forecast_data'] = $this->Coastline_forecast_model->get_all();
            //$country = $this->config->item('country');
          //  $data['division_type']= $this->Division_model->getdivisionname($country);  
            $this->load->view('template',$data);
       
    }

    public function view()
    {
    //echo $id;
    //exit;
        $id = $this->uri->segment(3);
    //change messageluganda
    $data = array(
        'change' => 94,
        'forecast_read' => $this->Coastline_forecast_model->get_it_by_id_replaced($id),
        'rem' => "show"
    );
        $this->load->view('template', $data);
    }


    public function update($id)
    {    $id = $this->uri->segment(3);
        $row = $this->Coastline_forecast_model->get_by_id($id);
        
        if ($row) {
            
            $data = array(
                'button' => 'Update',
                'action' => site_url('index.php/Coastline_forecast/update_action'),
                'sea_state' => set_value('sea_state', $row->sea_state),
                'warning' => set_value('warning', $row->warning),
                'duty_forecaster' => set_value('duty_forecaster', $row->duty_forecaster),
                'valid_date' => set_value('valid_date', $row->valid_date),
                 'issue_date' => set_value('issue_date', $row->issue_date),
                'surface_wind_24' => set_value('surface_wind_24', $row->surface_wind_24),
                'surface_wind_48' => set_value('surface_wind_48', $row->surface_wind_48),
                'visibility_24' => set_value('visibility_24', $row->visibility_24),
                'visibility_48' => set_value('visibility_48', $row->visibility_48),
                'temp_24' => set_value('temp_24', $row->temp_24),
                'temp_48' => set_value('temp_48', $row->temp_48),
                'height_24' => set_value('height_24', $row->height_24),
                //'sub_region' => set_value('subregionid', $row->subregionid),
                'height_48' => set_value('height_48', $row->height_48),

                 'wave_24' => set_value('wave_24', $row->wave_24),
                'wave_48' => set_value('wave_48', $row->wave_48),
                'current_24' => set_value('current_24', $row->current_24),
                'current_48' => set_value('current_48', $row->current_48),
                //'sub_region' => set_value('subregionid', $row->subregionid),
                'weather' => set_value('weather', $row->weather),
                'change'  => 93
	    );

            $this->load->view('template', $data);
      
        } 
    }
    public function update_action()
    {
        $this->_rules_single();
         $date = strtotime($this->input->post('issue_date',TRUE));
    $issue_date = date('Y',$date).'-'.date('m',$date).'-'.date('d',$date);
    $valid = strtotime($this->input->post('valid_date',TRUE));
    $valid_date = date('Y',$valid).'-'.date('m',$valid).'-'.date('d',$valid);

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
                'issue_date' => $issue_date,
                'valid_date' => $valid_date,
                'duty_forecaster' => $this->input->post('duty_forecaster',TRUE),
                'sea_state' => $this->input->post('sea_state',TRUE),
                'warning' => $this->input->post('warning',TRUE),
                'surface_wind_24' => $this->input->post('wind_24',TRUE),
                'surface_wind_48' => $this->input->post('wind_48',TRUE),
                'visibility_24' => $this->input->post('visibility_24',TRUE),
                'visibility_48' => $this->input->post('visibility_48',TRUE),
                'temp_24' => $this->input->post('temp_24',TRUE),
                'temp_48' => $this->input->post('temp_48',TRUE),

                'height_24' => $this->input->post('wind_48',TRUE),
                'height_48' => $this->input->post('visibility_24',TRUE),
                'wave_24' => $this->input->post('visibility_48',TRUE),
                'wave_48' => $this->input->post('temp_24',TRUE),
                'temp_48' => $this->input->post('temp_48',TRUE),

                 'current_24' => $this->input->post('current_24',TRUE),
                'current_48' => $this->input->post('current_48',TRUE),
                'weather' => $this->input->post('weather',TRUE), 
	    );

            $this->Coastline_forecast_model->update($this->input->post('id', TRUE), $data);
			$data = array(
			  'change' => 93,
			);
            $this->session->set_flashdata('message', '<font color="green" size="5">Update Record Success</font>');
            $this->load->view('template', $data);
        }
    }

    public function delete()
    {   $id = $this->uri->segment(3);

        $data['change'] =92;
         $data['coastline_forecast_data']= $this->Coastline_forecast_model->get_all();
            $this->Coastline_forecast_model->delete($id);
            $this->session->set_flashdata('message', '<font color="green" size="5">Deleted Record Success</font>');
            $this->load->view('template', $data);

    }

    public function _rules()
    {
        $this->form_validation->set_rules('mean_temp1', 'mean temp(Late Evening)', 'trim|numeric|required');
        $this->form_validation->set_rules('mean_temp2', 'mean temp(Early Morning)', 'trim|numeric|required');
        $this->form_validation->set_rules('mean_temp3', 'mean temp(Late Morning)', 'trim|numeric|required');
        $this->form_validation->set_rules('mean_temp4', 'mean temp(Aternoon)', 'trim|numeric|required');

        $this->form_validation->set_rules('wind_direction1', 'wind strength(Late Evening)', 'trim|required');
        $this->form_validation->set_rules('wind_direction2', 'wind strength(Early Morning)', 'trim|required');
        $this->form_validation->set_rules('wind_direction3', 'wind strength(Late Morning)', 'trim|required');
        $this->form_validation->set_rules('wind_direction4', 'wind strength(Afternoon)', 'trim|required');

        $this->form_validation->set_rules('wind_strength1', 'wind strength(Late Evening)', 'trim|required');
        $this->form_validation->set_rules('wind_strength2', 'wind strength(Early Morning)', 'trim|required');
        $this->form_validation->set_rules('wind_strength3', 'wind strength(Late Morning)', 'trim|required');
        $this->form_validation->set_rules('wind_strength4', 'wind strength(Afternoon)', 'trim|required');

        $this->form_validation->set_rules('weather', 'weather(Late Evening)', 'trim|required');
        $this->form_validation->set_rules('date1', 'Date(Late Evening)', 'trim|required');
        $this->form_validation->set_rules('date2', 'Date(Other)', 'trim|required');
      	$this->form_validation->set_rules('season_id', 'season id', 'trim|required');
      	$this->form_validation->set_rules('id', 'id', 'trim');
      	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function _rules_single()
    {
        $this->form_validation->set_rules('mean_temp1', 'mean temp', 'trim|numeric|required');
		$this->form_validation->set_rules('mean_temp2', 'mean temp', 'trim|numeric|required');
		$this->form_validation->set_rules('mean_temp3', 'mean temp', 'trim|numeric|required');
		$this->form_validation->set_rules('mean_temp4', 'mean temp', 'trim|numeric|required');
        $this->form_validation->set_rules('wind_direction1', 'wind strength', 'trim|required');
		$this->form_validation->set_rules('wind_direction2', 'wind strength', 'trim|required');
		$this->form_validation->set_rules('wind_direction3', 'wind strength', 'trim|required');
		$this->form_validation->set_rules('wind_direction4', 'wind strength', 'trim|required');
        $this->form_validation->set_rules('wind_strength1', 'wind strength', 'trim|required');
		$this->form_validation->set_rules('wind_strength2', 'wind strength', 'trim|required');
		$this->form_validation->set_rules('wind_strength3', 'wind strength', 'trim|required');
		$this->form_validation->set_rules('wind_strength4', 'wind strength', 'trim|required');
        $this->form_validation->set_rules('weather', 'weather', 'trim|required');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "daily_forecast.xls";
        $judul = "daily_forecast";
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
		xlsWriteLabel($tablehead, $kolomhead++, "Max Temp");
		xlsWriteLabel($tablehead, $kolomhead++, "Min Temp");
		xlsWriteLabel($tablehead, $kolomhead++, "Sunrise");
		xlsWriteLabel($tablehead, $kolomhead++, "Sunset");
		xlsWriteLabel($tablehead, $kolomhead++, "Wind");
		xlsWriteLabel($tablehead, $kolomhead++, "Weather");
		xlsWriteLabel($tablehead, $kolomhead++, "Advisory");
		xlsWriteLabel($tablehead, $kolomhead++, "date");

	foreach ($this->Daily_forecast_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->max_temp);
	    xlsWriteNumber($tablebody, $kolombody++, $data->min_temp);
	    xlsWriteLabel($tablebody, $kolombody++, $data->sunrise);
	    xlsWriteLabel($tablebody, $kolombody++, $data->sunset);
	    xlsWriteNumber($tablebody, $kolombody++, $data->wind);
	    xlsWriteLabel($tablebody, $kolombody++, $data->weather);
	    xlsWriteLabel($tablebody, $kolombody++, $data->advisory);
	    xlsWriteLabel($tablebody, $kolombody++, $data->date);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=daily_forecast.doc");

        $data = array(
            'daily_forecast_data' => $this->Daily_forecast_model->get_all(),
            'start' => 0
        );

        $this->load->view('daily_forecast_doc',$data);
    }

    public function pdf()
    {
        $data = array(
            'daily_forecast_data' => $this->Daily_forecast_model->get_all(),
            'start' => 0
        );
        
        $this->pdf_download($data);
    }


    public function pdf_archive()
    {
        $data = array(
            'daily_forecast_data' => $this->Daily_forecast_model->get_archive(),
            'start' => 0
        );
        $this->pdf_download($data);
    }

    public function pdf_latest()
    {
        $data = array(
            'daily_forecast_data' => $this->Daily_forecast_model->get_all_last_10days(),
            'start' => 0
        );
        $this->pdf_download($data);        
    }
	
	
	//download pdf
    public function pdf_download($data){
        
        ini_set('memory_limit', '10G');
        $html = $this->load->view('daily_forecast_pdf', $data, true);
        $this->load->library('pdf');
        $pdf = $this->pdf->load();
        $pdf->WriteHTML($html);
        $pdf->Output('daily_forecast.pdf', 'D');

}

}

/* End of file Daily_forecast.php */
