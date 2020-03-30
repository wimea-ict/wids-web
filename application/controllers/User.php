<?php //

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Advisory extends CI_Controller
{


    function __construct()
    {
        parent::__construct();
	$this->config->set_item('theme',$this->config->item('country'));
        $this->load->model('User_model');
        $this->load->library('form_validation');
    }
    public function create_user(){
        $row=$this->User_model->get_all();
        $data=array(
            'change'=>27,
            'pagetitle'=>'Add Users',
            'breadcrumb'=>'Sub Add Users',
            'message'=>'This is my message',
            'first_name'=>'Your name'
        );
        $this->load->view('template',$data);


    }
    //public function

    public function update_user($id){
        $row = $this->User_model->get_by_id($id);
        var_dump($row);
        exit;
        $data=array(
            'error' => '',
            'button' => 'Create',
            'action' => site_url('index.php/Landing/update_user_action'),
            'change'=>26,
            'id'=>set_value('id', $row->record_id),//
            'last_name'=>set_value('last_name', $row->last_name),
            'username'=>set_value('username', $row->username),
            'password'=>set_value('password', $row->password),
            'email'=>set_value('email', $row->email),
            'phone'=>set_value('phone', $row->phone),
            'first_name'=>set_value('first_name', $row->first_name),
        );
        $this->load->view('template',$data);

    }
    public function update_user_action(){
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $upload = 'ok';
        }
        if ($upload == "OK") {
            $data = array(
                'username' => $this->input->post('username', TRUE),
                'first_name' => $this->input->post('first_name', TRUE),
                'last_name' => $this->input->post('last_name', TRUE),
                'email' => $this->input->post('email', TRUE),
                'password' => $this->input->post('password', TRUE),
                'type' => $this->input->post('type', TRUE),
                'phone' => $this->input->post('phone', TRUE),
            );

            $this->User_model->update($this->input->post('id', TRUE), $data);
            $user = $this->User_model->get_all();
            var_dump($user);
            exit;
            $data = array(
                'change' => 27,
            );
            $this->session->set_flashdata('message', '<font color="green" size="5">Update Record Success</font>');
            $this->load->view('template', $data);
        }

    }
    public function _rules()
    {
	$this->form_validation->set_rules('username', 'email', 'trim|required');
	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }


}

?>
