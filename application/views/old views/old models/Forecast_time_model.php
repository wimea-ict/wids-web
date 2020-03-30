<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Forecast_time_model extends CI_Model
{

    public $table = 'forecast_time';
    public $id = 'id';
    public $order = 'DESC';
	public $region_name = 'period_name';

    function __construct()
    {
        parent::__construct();
    }

    // get all times of the day and their corresponding 
    function get_all()
    {
        $this->db->order_by($this->period_name, $this->order);
        return $this->db->get($this->table)->result();
    }
 
   

}
