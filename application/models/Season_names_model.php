<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Season_names_model extends CI_Model
{
     //connecting to table major_sector 
    public $table = 'season_months';
    public $id = 'id';
    public $order = 'DESC';
	  public $season_name = 'season_name';
    public $month_from = 'month_from';
    public $month_to = 'month_to';
    public $abbreviation = 'abbreviation';
    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->season_name, $this->order);
        return $this->db->get($this->table)->result();
    }
// get data by id
 function get_by_id($id=NULL)
    {  
     $this->db->from('season_months'); 
        if(isset($id)){
       $this->db->where('id',$id);   
      }
         $query=$this->db->get();   
      return $query->result_array();
    }
  // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id', $q);
		$this->db->or_like('season_name', $q);
    $this->db->or_like('abbreviation', $q);
		$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
	$this->db->or_like('season_name', $q);
  $this->db->or_like('abbreviation', $q);
	$this->db->or_like('season_code', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

     // insert data int major_sector table
    function insert($data = array())
    {     
         // $this->db->set($data);
          $this->db->insert('season_months',$data);
    }


     // update data
     function update($id, $data =array())
     {   
        $this->db->where('id', $id);
         $this->db->set($data);
        $this->db->update('season_months');
        
     }
 
 

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

   

}

/* End of file Minor_model.php */