<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Product extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->model('Product_model','product_model');
        $this->load->model('Minor_model','minor_model');
        // $this->load->model('Decadal_forecast_model');
    }
 
    function index(){
        $data['category'] = $this->product_model->get_category()->result();
        $this->load->view('product_view', $data);
    }
 
    function get_sub_category(){
        $category_id = $this->input->post('id',TRUE);
        $data = $this->product_model->get_sub_category($category_id)->result();
        echo json_encode($data);
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
            // $city_id = $this->input->post('division', TRUE);
            // $sector = $this->input->post('category', TRUE);
            // $accuracy = $this->input->post('accuracy',TRUE);
            // $applicability = $this->input->post('applicability',TRUE);
            // $timeliness = $this->input->post('timeliness',TRUE);
            // $generalComment = $this->input->post('generalComment', TRUE);
            // $contact = $this->input->post('contact', TRUE);
// $query ="INSERT INTO `user_feedback`(`city_id`, `sector`, `accuracy`, `applicability`, `timeliness`, `generalComment`, `contact`) VALUES ('$city_id','$sector','$accuracy','$applicability','$timeliness','$generalComment','$contact')";

       // $query ="INSERT INTO `user_feedback`(`city_id`, `sector`, `accuracy`, `applicability`, `timeliness`, `generalComment`, `contact`) VALUES ('$city_id','$sector','$accuracy','$applicability','$timeliness','$generalComment','$contact')";
        // $this->db->query($query);
      
    $this->product_model->logfeedback($datatoinsert);
    // $this->load->view("request_service.php");
    }
    // function get_sub_category(){
    //     $sector_id  = $this->input->post('id',TRUE);
    //     $data = $this->Minor_model->get_sub_category($sector_id)->result();
    //     echo json_ecode($data);
    //     //print_r($data);exit();
    // }
}
