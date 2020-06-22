<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Coastline_forecast_model extends CI_Model
{

    public $table = 'coastline_forecast';
    public $id = 'id';
    public $order = 'DESC';
    public $date ='issue_date';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }
	  
     function get_all_replaced()
    {
        $this->db->select('*');
  $this->db->from('coastline_forecast');  
  return $this->db->get()->result();
  }
    function insert_advisory($data=array())
    {
        $this->db->insert('daily_advisory',$data); 
    }
    
    function get_it_by_id_replaced($id)
    {
       $this->db->select('*');
     $this->db->from('coastline_forecast');
      // $this->db->join('ussdsubregions','advisory.subregionid = ussdsubregions.subregionid');
     $this->db->where('coastline_forecast.id',$id);
     return $this->db->get()->result();
  }
    //----------------------------------------------
 function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    function update($id, $data =array())
     {   
        $this->db->where('id', $id);
         $this->db->set($data);
        $this->db->update('coastline_forecast');
        
     }
 
    function insert($data)
    {
	  $this->db->insert('coastline_forecast',$data);         
    }
    //------inserting forecast data------------------------insertforecastimpactdata
   function insertforecastdata($data){
	  	$this->db->insert('daily_forecast_data',$data);   
    }
    //-----------------------------------------------------------
     //------inserting forecast data------------------------
   function insertforecastimpactdata($data){
    $this->db->insert('impact_forecast',$data);   
}
//-----------------------------------------------------------
    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

    function get_date(){
        $today = "SELECT region FROM $this->table WHERE (date > date('y-m-d')) ";
        $today2 = $this->db->query($today);

    }

}

/* End of file Daily_forecast_model.php */
