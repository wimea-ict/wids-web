<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Forecast_impact_model extends CI_Model
{

    public $table = 'impact_forecast';
    public $Id = 'id';
    public $order = 'DESC';
    public $type ='type';

    function __construct()
    {
        parent::__construct();
    }

 	
 //--------------------get all area forecast -------------------
     function get_daily_impacts_data($id){
  $this->db->select('impact_forecast.Id,impact_forecast.type, impact_forecast.impact_id,impact_forecast.forecast_id,daily_forecast.id,daily_forecast.weather,daily_forecast.time,impacts.id,impacts.description');
   $this->db->from(' impact_forecast');	
   $this->db->join('daily_forecast','daily_forecast.id = impact_forecast.forecast_id');
   $this->db->join('impacts','impacts.id = impact_forecast.impact_id');
   $this->db->where("impact_forecast.forecast_id", $id);			
   return $this->db->get()->result(); 
       
   }//-----------------------------------------------------------------
	

     //------inserting forecast data------------------------
   function insertforecastimpactdata($data){
    $this->db->insert('impact_forecast',$data);   
}
//-----------------------------------------------------------
   // delete data
   function delete($id)
   {
       $this->db->where($this->Id, $id);
       $this->db->delete($this->table);
   }
        

}

/* End of file Daily_forecast_model.php */
