<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class CSV_model extends CI_Model
{

    public $id = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }


    // Return the Region id
    function get_region($id)
    {

      $this->db->where('id', $id);
      return $this->db->get('region')->row();
    }

    // Return weather category id
    function get_weather_cat($weather)
    {
      $this->db->where('cat_name', $weather);
      return $this->db->get('weather_category')->row();
    }

     // Return Time id
    function get_time($time)
    {
      $this->db->where('period_name', $time);
      return $this->db->get('forecast_time')->row();
    }

    
    // Get the id of the recently entered data for entry of the daily forecast data
    function get_recent_forecast()
    {
      $this->db->order_by('id', 'DESC');
      return $this->db->get('daily_forecast')->row();
    }


    // Insert daily forecast
    function insert_daily($data = array())
    {     
      $this->db->insert('daily_forecast',$data);
    }


    // Insert daily forecast data
    function insert_daily_data($data = array())
    {     
      $this->db->insert('daily_forecast_data',$data);
    }






   

}

/* End of file Season_model.php */