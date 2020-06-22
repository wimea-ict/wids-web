<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class USSD extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->config->set_item('theme',$this->config->item('country'));
		$this->load->model('USSD_model');
        $this->load->library('form_validation');
        $this->load->library('session');//Major_model	
        $this->load->dbforge();
        $this->dbforge = $this->load->dbforge($this->session->userdata('database_username'), TRUE);

	}

	public function index()
	{
		$data = array(
			'change' => 88,
			'language' => $this->USSD_model->get_all()
		);

		$this->load->view('template', $data);
	}

	public function addNew()
	{
		$data['change'] = 89;
		$this->load->view('template', $data);	
	}

	public function saveLanguage(){
		$language = $this->input->post('language',TRUE);
		$lang = $this->USSD_model->get_all();
		$no = FALSE;
		foreach ($lang as $k) {
			if($k->language == $language){
				$this->session->set_flashdata('message', '<font color="red" size="5">Language already exists</font>');
				$no=TRUE;
			}
		}
		if($no == FALSE){

			
			$menu =strtolower("ussdmenu".$language);
			$daily_forecast =strtolower("daily_forecast_data_".$language);

			$field = array(
				'id' => array(
					'type' => 'INT',
					'constant' => 20,
					'unique' => TRUE,
					'unsigned' => TRUE,
					'auto_increment' => TRUE
				),
				'menuname' => array(
					'type' => 'VARCHAR',
					'constraint' => '255'
				),
				'menudescription' => array(
					'type' => 'VARCHAR',
					'constraint' => '255'
				)
			);
			$this->dbforge->add_field($field);
			

			if($this->dbforge->create_table($menu)){
			  	$datatoinsert = array(str_replace("\r\n", "-",$this->input->post('district',TRUE)),str_replace("\r\n", "-", $this->input->post('invalidistrict',TRUE)),str_replace("\r\n", "-", $this->input->post('product',TRUE)),str_replace("\r\n", "-",$this->input->post('invalidinput',TRUE)),str_replace("\r\n", "-",$this->input->post('no_data',TRUE)),str_replace("\r\n", "-",$this->input->post('response_format',TRUE)),str_replace("\r\n", "-",$this->input->post('Submission',TRUE)),str_replace("\r\n", "-", $this->input->post('End',TRUE)),str_replace("\r\n", "-", $this->input->post('voiceEnd',TRUE)),str_replace("\r\n", "-", $this->input->post('Cancel',TRUE)));

				$data_menu = array('district','invalidistrict','product','invalidinput','no_data','response_format','Submission-opt','End','voicecall','Cancel');

			  	$language = array(
						'language' => $language,
						'language_text_table' => $menu,
						'forecast_table' => "seasonal_forecast_".strtolower($language),'daily' => "daily_forecast_data_".strtolower($language)
					);

			  	$this->USSD_model->insert($language);
		  		for($i = 0; $i< count($data_menu); $i++){
			  		$data_intert = array(
			  				'menuname' => $data_menu[$i],
			  				'menudescription' => $datatoinsert[$i]
			  			);
					$this->USSD_model->translations($menu,$data_intert);
		  		}
			  	

			  	
				$this->session->set_flashdata('message', '<font color="red" size="5">New language menu added successfully</font>');
			}else{
				$this->session->set_flashdata('message', '<font color="red" size="5">Database creation failed</font>');
			}
			
		}

		$data = array(
			'change' => 88,
			'language' => $this->USSD_model->get_all()
		);

		$this->load->view('template', $data);   
	   
  	}
  	function delete() 
  	{
  		$forecast_table_name = $this->uri->segment(3);
  		$this->USSD_model->delete($forecast_table_name);
  		$tab = "".$forecast_table_name;


  		$daily_table = $this->uri->segment(4);
  		$tabling = "".$daily_table;
  		
  		// $this->dbforge->drop_table($tabling);
  		$this->dbforge->drop_table($tab);
  		$this->session->set_flashdata('message', '<font color="red" size="5">Language deleted</font>');
  		$data = array(
			'change' => 88,
			'language' => $this->USSD_model->get_all()
		);

		$this->load->view('template', $data);  
  	}
  	function read()
  	{
  		$table = $this->uri->segment(3);
  		$data = array(
			'change' => 90,
			'language' => $this->USSD_model->display_lang($table),
			'language_trans' => $this->USSD_model->display_trans($table)
		);

		$this->load->view('template', $data); 
  	}
}


?>
