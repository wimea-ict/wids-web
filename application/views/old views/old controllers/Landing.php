<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Landing extends CI_Controller {

    public function __construct() {
        parent::__construct();

        /* Load :: Common */
        $this->config->set_item('theme',$this->config->item('country'));
        $this->load->helper('number');
        $this->load->model('Landing_model');
		$this->load->model('Season_model');
        $this->load->library('form_validation');
        $this->load->library('email');
        ///$this->load->model('User_model');
		$this->load->library('session');
        include APPPATH . 'third_party/morris/landing_charts.php';

    }

    public function index() {
        $this->data['change'] = 0;
        $this->data['count_users'] = $this->Landing_model->get_count_record('users');
       // $this->data['count_groups'] = $this->Landing_model->get_count_record('groups');
        $this->data['count_categories'] = $this->Landing_model->get_count_record('weather_category');
        $this->data['count_advisory'] = $this->Landing_model->get_count_record('advisory');
        $this->data['count_daily_forecast'] = $this->Landing_model->get_count_record('daily_forecast');
        $this->data['count_decadal'] = $this->Landing_model->get_count_record('decadal_forecast');
        $this->data['count_seasonal_forecast'] = $this->Landing_model->get_count_record('seasonal_forecast');
        $this->data['count_season'] = $this->Landing_model->get_count_record('season');
        $this->data['count_region'] = $this->Landing_model->get_count_record('region');
        $this->data['disk_totalspace'] = $this->Landing_model->disk_totalspace(DIRECTORY_SEPARATOR);
        $this->data['disk_freespace'] = $this->Landing_model->disk_freespace(DIRECTORY_SEPARATOR);
        $this->data['disk_freepercent'] = $this->Landing_model->disk_freepercent(DIRECTORY_SEPARATOR, FALSE);
        $this->data['disk_usespace'] = $this->data['disk_totalspace'] - $this->data['disk_freespace'];
        $this->data['disk_usepercent'] = $this->Landing_model->disk_usepercent(DIRECTORY_SEPARATOR, FALSE);
        $this->data['memory_usage'] = $this->Landing_model->memory_usage();
        $this->data['memory_peak_usage'] = $this->Landing_model->memory_peak_usage(TRUE);
        $this->data['memory_usepercent'] = $this->Landing_model->memory_usepercent(TRUE, FALSE);
		$this->data['seasons'] = $this->Season_model->get_all();
        //$this->data['ussd_count']= $this->Landing_model->ussd_count();

        //chart data
      // $this->data['line_chart'] = $this->line_chart("test_line");
       //$this->data['bar_chart'] = $this->bar_chart("test_bar");

        //$this->template->admin_render('admin/dashboard/index', $this->data);
        $this->load->view('template', $this->data);
    }

    /**
     * Display
     *
     * @brief Creates a line chart
     */
    private function line_chart($element_id) {
        $morris = new MorrisLineCharts($element_id);
        $morris->xkey = array('category');
        $morris->ykeys = array('R','S','D');
        $morris->labels = array('Maximum temperature', 'Minimum temperature', 'Wind Speed');
        $morris->data = $this->Landing_model->line_chart($region_id);
        return $morris->toJavascript();
    }

    /**
     * @brief This function creates a bar chart
     *
     */
   
    private function bar_chart($element_id) {
        $morris = new MorrisBarCharts($element_id);
        $morris->xkey = array('average');
        $morris->ykeys = array('R', 'S', 'D');
        $morris->labels = array('Maximum temperature', 'Minimum temperature', 'Wind Speed');
        $morris->stacked = false;

        $morris->data = $this->Landing_model->bar_chart();
        return  $morris->toJavascript();
    }

    public function create_user(){

        $data=array(
            'action' => site_url('index.php/Landing/create_user_action'),
            'change' => 24,
        );

        $this->load->view('template',$data);
    }
    public function create_user_action(){
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create_user();
        } else {
            $ip = getenv('REMOTE_ADDR');
            $today=date('Ymd');
           // send email to user
            $mailadd=(String)$this->input->post('email',TRUE);
            $msg=(String)$this->input->post('pass',TRUE);
           // $mailto= mail($mailadd,"password",$msg);

          //addition down
                $data = array(
                    'ip_address'=>$ip,
                    'username' => $this->input->post('username', TRUE),
                    'password' => md5($this->input->post('pass', TRUE)),
                    'email' => $this->input->post('email', TRUE),
                    'created_on'=>$today,
                    'first_name' =>$this->input->post('first_name',TRUE),
                    'last_name' => $this->input->post('last_name', TRUE),
                    'usertype'=>$this->input->post('usertype',TRUE),
                    'phone' => $this->input->post('phone_number',TRUE),
                    'active'=>1,
                    'first_time_login'=>1,

                );

                $ww = $this->Landing_model->insert($data);
                $user = $this->Landing_model->get_all();

                $data = array(
                    'change' => 27,
                    'advisory_data' => $user
                );
                if ($ww) {
                    $this->session->set_flashdata('message', '<font color="green" size="5">Create Record Success</font>');
                } else {
                    $this->session->set_flashdata('message', '<font color="red" size="5">Create Record Not Successful</font>');
                }

                $this->load->view('template', $data);

        }


    }
    //public function

    public function update_user($id){

        $row = $this->Landing_model->get_by_id($id);
        // var_dump($row);
        // exit;
        $data=array(
            'error' => '',
            'button' => 'update',
            'action' => site_url('index.php/Landing/update_user_action'),
            'change'=>26,
            'id'=>set_value('id', $row->id),
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
            $this->update_user($this->input->post('id', TRUE));
        } else {
            $upload = 'ok';

        }
        if ($upload == "ok") {
            $data = array(
                'username' => $this->input->post('username', TRUE),
                'first_name' => $this->input->post('first_name', TRUE),
                'last_name' => $this->input->post('last_name', TRUE),
                'email' => $this->input->post('email', TRUE),

                'type' => $this->input->post('usertype', TRUE),
                'phone' => $this->input->post('phone_number', TRUE),
            );

            $cc=$this->Landing_model->update($this->input->post('id', TRUE), $data);
            // var_dump($cc);
            // exit;
            $user = $this->Landing_model->get_all();

            $data = array(
                'change' => 27,
            );
            $this->session->set_flashdata('message', '<font color="green" size="5">Update Record Success</font>');
            $this->load->view('template', $data);
        }

    }
    //list users
    public function user_list(){
        $data = array(
            'change'=>27
        );
        $this->load->view('template',$data);
    }

    public function inactive_user_list(){
        $data = array(
            'change'=>28
        );
        $this->load->view('template',$data);
    }
    //activation
    public function activate_user($id){

        if($this->Landing_model->activate_user_status($id)){
            $data = array(
                 'change'=> 27,

            );
            $this->session->set_flashdata('message', '<font color="green" size="5">User Activation Success</font>');
            $this->load->view('template',$data);
        }else{
            $this->session->set_flashdata('message', '<font color="green" size="5">User Activation Failed</font>');
        }
    }

    public function deactivate_user($id){
        if($this->Landing_model->deactivate_user_status($id)){
            $data = array(
                 'change'=> 28,

            );
            $this->session->set_flashdata('message', '<font color="green" size="5">User Deactivation Success</font>');
            $this->load->view('template',$data);
        }else{
            $this->session->set_flashdata('message', '<font color="green" size="5">User Deactivation Failure</font>');
        }
    }
    public function _rules()
    {
    $this->form_validation->set_rules('first_name','First Name','required');
    $this->form_validation->set_rules('last_name','First Name','required');
	$this->form_validation->set_rules('username', 'Username', 'required|is_unique[users.username]');
    $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
    $this->form_validation->set_rules('pass', 'Password', 'required');
    $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[pass]');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function ussdcount(){
        $data = array(
            'action' => site_url('index.php/Landing/ussd'),
            'change'=>38  );
        $this->load->view('template',$data);

    }

 //numer of ussd users for specified time
    public function ussd(){
       
            $from = $this->input->post('from',TRUE);
            
            $to= $this->input->post('to',TRUE);
            
            $number_of_users = $this->Landing_model->ussd($from,$to);

            //var_dump( $number_of_users);

            $data = array(
                'number' => $number_of_users ,
                'from'=>$from,
                'to'=>$to,
                'change'=>39  );
            $this->load->view('template',$data);
       


    }


}
