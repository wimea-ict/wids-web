<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Graph extends CI_Controller {

    public function __construct() {
        parent::__construct();
	$this->config->set_item('theme',$this->config->item('country'));


        /* Load :: Common */
        $this->load->helper('number');
        $this->load->model('Landing_model');
        $this->load->library('session');
        $this->load->model('User_feedback_model');
        include APPPATH . 'third_party/morris/landing_charts.php';
    }

    public function index() {
        //charts for north, east, central,west
        $this->data['line_chart1'] = $this->line_chart("north_line");
        $this->data['line_chart2'] = $this->line_chart("east_line");
        $this->data['line_chart3'] = $this->line_chart("west_line");
        $this->data['line_chart4'] = $this->line_chart("central_line");
        $this->data['line_chart2'] = $this->line_chart("east_line");
echo "sdsd";
exit();        $this->load->view('template', $this->data);
        
    }

    /**
     * Display l victoria
     *
     * @brief Creates a line chart
     */
    private function line_chart($element_id) {
        $morris = new MorrisLineCharts($element_id);
        $morris->xkey = array('day');
        $morris->ykeys = array('R','S','D');
        $morris->labels = array('Maximum temperature', 'Minimum temperature', 'Wind Speed');
        $morris->data = $this->Landing_model->line_chart('east');
        return $morris->toJavascript();
    }

    //feedback
    public function feedback(){
       $data['change'] = 43;
      
       $data['bar_chart'] = $this->feedbackG("test_bar");
       
       $this->load->view('template', $data);
    }

    private function feedbackG($element_id) {
        $morris = new MorrisBarCharts($element_id);
        $morris->xkey = array('average');
         $morris->barSizeRatio = 0.3;
        // $morris->barGape =2;
        $morris->ykeys = array('R');
        // $morris->barColors = ['orange'];
        $morris->ymax = 10;
        $morris->labels = array('Accuracy', 'Applicability', 'Timeliness');
        $morris->stacked = true;

        $morris->data = $this->User_feedback_model->feedbackgraph();
        
        return  $morris->toJavascript();
    }

    public function ussdRequest(){
        $data['change'] = 44;
       
        $data['bar_chart'] = $this->ussdRequestG("test_bar");
        
        $this->load->view('template', $data);
     }

    private function ussdRequestG($element_id){
        $morris = new MorrisBarCharts($element_id);
        $morris->xkey = array('number');
        $morris->barSizeRatio = 0.4;
        $morris->barGape =2;
        $morris->grid = false;
        $morris->ykeys = array('R');
        $morris->labels = array('Number');
        $morris->stacked = false;

        $morris->data = $this->User_feedback_model->ussdrequest();
        
        return  $morris->toJavascript();
    }

    public function trend(){
        $data['change'] = 45;
     
      $data['bar_chart'] = $this->trendG("test_bar");
        
        $this->load->view('template', $data);
        
    }

    private function trendG($element_id){
        $morris = new MorrisBarCharts($element_id);
        $morris->xkey = array('average');
        $morris->ykeys = array( 'S', 'D', 'R');
        $morris->labels = array('Seasonal', 'Monthly', 'Daily');
        $morris->stacked = false;

        $morris->data = $this->User_feedback_model->trend();
        return  $morris->toJavascript();
    }
    
    
}
