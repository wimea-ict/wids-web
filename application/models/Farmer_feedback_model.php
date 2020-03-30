<?php 
if (!defined('BASEPATH'))
exit('No direct script access allowed');

class User_feedback_model extends CI_Model
{
    public $table = 'user_feedback';
    public $id = 'id';
    public $order = 'DESC';
   
	//public $issuetime = 'issuetime';

    function __construct()
    {
        parent::__construct();
        $this->load->helper('array');
    }

    function insert(){
        echo "farmers model called";
    }

}
?>