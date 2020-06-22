<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Daily_forecast_time_model extends CI_Model
{
      //period_name`, `to_time`, `from_time`
     //connecting to forecast_time 
    public $table = 'forecast_time';
    public $id = 'id';
    public $order = 'DESC';
	  public $period_name = 'period_name';
    public $to_time = 'to_time';
    public $from_time = 'from_time';


    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->period_name, $this->order);
		//echo $this->db->get($this->table)->result(); exit();
        return $this->db->get($this->table)->result();
    }
      function get_by_id($id=NULL)
    {  
     $this->db->from('forecast_time'); 
        if(isset($id)){
       $this->db->where('id',$id);   
      }
         $query=$this->db->get();   
      return $query->result_array();
    }
  // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id', $q);
		$this->db->or_like('period_name', $q);
		$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
	$this->db->or_like('season_name', $q);
	$this->db->or_like('season_code', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

     // insert data int major_sector table
    function insert($data = array())
    {     
         // $this->db->set($data);
          $this->db->insert('forecast_time',$data);
    }


     // update data
     function update($id, $data =array())
     {   
        $this->db->where('id', $id);
         $this->db->set($data);
        $this->db->update('forecast_time');
        
     }
 
 

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }
   

}

/* End of file forecast time_model.php */