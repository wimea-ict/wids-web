<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function __construct()
    {
            parent::__construct();
			$this->load->helper('form');
			$this->load->library('form_validation');
		$this->config->set_item('theme',$this->config->item('country'));
    }

	public function index()
	{
		if (file_exists('config.txt')) {

			$this->load->view('index'); 
		  }
		  else{
		    $this->load->view('installer/index');
		}
	}

	public function databaseinfo()
	{
	
	
		$this->form_validation->set_rules('username', 'Mail', 'required');
		  
	
		if ($this->form_validation->run() === FALSE)
		{
		
		}
		else
		{
			$username = $this->input->post('username');
			$password=$this->input->post('password');
			$db_name = $this->input->post('database_name');
			$db_username=$this->input->post('database_username');
			$db_password = $this->input->post('database_password');

			$newdata = array(
				'username'  => $username,
				'password'     => $password,
				'db_name'     =>$db_name,
				'db_username'     => $db_username,
				'db_password'=>$db_password
		     );
		
		 //CREATE TXT FILE
		 $file_pointer = 'config.txt'; 
	 
		 $myfile = fopen($file_pointer, "w") or die("Unable to open file!");
		 $txt =$db_name."\n";
		 fwrite($myfile, $txt);
		 $txt = "Email Address = ".$username."\n";
		 fwrite($myfile, $txt);
		 $txt = "User Password = ".$password."\n";
		 fwrite($myfile, $txt);
		 fwrite($myfile, $txt);
		 $txt = "Database UserName = ".$db_username."\n";
		 fwrite($myfile, $txt);
		 $txt = "Database Password = ".$db_password."\n";
		 fwrite($myfile, $txt);
		 fclose($myfile);
	 




		 $this->session->set_userdata($newdata);
		 if(isset($_SESSION['username'])){
			$this->load->view('installer/page2'); 
		 }
		}
	}

	public function countryinfo()
	{
	
	
		$this->form_validation->set_rules('country', 'Mail', 'required');
		  
	
		if ($this->form_validation->run() === FALSE)
		{
		
		}
		else
		{
			$country = $this->input->post('country');

			$this->session->set_userdata('country', $country);
			$this->load->view('installer/page3'); 
		 }
		}
	
		public function createdb()
		{
				require('CreateDB.php');
				createdb();
				redirect('/', 'refresh');
			 
			}	
	}
