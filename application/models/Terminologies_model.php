<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class terminologies_model extends CI_Model
{

    public $table = 'seasonal_terminology';
    public $id = 'id';
    public $order = 'DESC';
	public $description = 'description';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->description, $this->order);
		//echo $this->db->get($this->table)->result(); exit();
        return $this->db->get($this->table)->result();
    }
  // get data by id
 function get_by_id($id=NULL)
    {  
     $this->db->from('seasonal_terminology'); 
        if(isset($id)){
       $this->db->where('id',$id);   
      }
         $query=$this->db->get();   
      return $query->result_array();
    }
  // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id', $q);
		$this->db->or_like('description', $q);
		$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
	$this->db->or_like('description', $q);
	$this->db->or_like('season_code', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data=array())
    {
        $this->db->insert('seasonal_terminology',$data);
    }


     // update data
 // update data
     function update($id, $data =array())
     {   
        $this->db->where('id', $id);
         $this->db->set($data);
        $this->db->update('seasonal_terminology');
        
     }
 
 

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }



}

/* End of file Season_model.php */
