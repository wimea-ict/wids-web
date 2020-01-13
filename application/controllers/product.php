<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Product extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->model('Product_model','product_model');
        $this->load->model('Minor_model','minor_model');
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
    // function get_sub_category(){
    //     $sector_id  = $this->input->post('id',TRUE);
    //     $data = $this->Minor_model->get_sub_category($sector_id)->result();
    //     echo json_ecode($data);
    //     //print_r($data);exit();
    // }
}