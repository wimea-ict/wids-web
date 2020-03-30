<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User extends CI_Controller {

	  function __construct()
    {
        parent::__construct();
	    $this->config->set_item('theme',$this->config->item('country'));
        $this->load->model('main_model');
        $this->load->library('form_validation');
        $this->load->library('session');
    }


    public function index(){
        // load base_url
        $this->load->helper('url');

        //load model
        $this->load->model('Main_model');

        // Get 
        $edit = $this->input->get('edit'); 

        if(!isset($edit)){
            // get data
            $data['response'] = $this->Main_model->getUsersList();
            $data['view'] = 1;

            // load view
            $this->load->view('user_view',$data);
        }else{

            // Check submit button POST or not
            if($this->input->post('submit') != NULL ){
                // POST data
                $postData = $this->input->post();

                //load model
                $this->load->model('Main_model');

                // Update record
                $this->Main_model->updateUser($postData,$edit);

                // Redirect page
                redirect('user/');

            }else{

                // get data by id
                $data['response'] = $this->Main_model->getUserById($edit);
                $data['view'] = 2;

                // load view
                $this->load->view('user_view',$data);

            }
        }
    }
}