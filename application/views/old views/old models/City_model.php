<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class City_model extends CI_Model
{

    public $table = 'city';
    public $id = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
      $this->db->select('division.division_name, division.division_type, division.id,city.city_name,city.division_id,city.id');
	  $this->db->from('city');
      $this->db->join('division','division.id=city.division_id');	   
	  $query=$this->db->get();   
       return $query->result_array();
    }
	   // get all
    function get_major_cities()
    {
      $this->db->select('division.division_name, division.division_type, division.id as division_id,city.city_name,city.division_id,region.id as region_id,region.region_name');
	  $this->db->from('city');
      $this->db->join('division','division.id=city.division_id');	
	  $this->db->join('region','region.id=division.region_id');
	  $this->db->where('city.major_city',1);   
	  $query=$this->db->get();   
       return $query->result_array();
    }
	
// =================get data by id==========
    function get_by_id($id=NULL)
    {  
     $this->db->from('city'); 
        if(isset($id)){
       $this->db->where('id',$id);   
      }
         $query=$this->db->get();   
      return $query->result_array();
    }
    //==============================================
  // get total rows
    function total_rows($q = NULL) {
        return $this->db->count_all_results();
    }


    //-----------------------------------------------------------
    // insert data int city table
    function insert($data = array())
    {     
         // $this->db->set($data);
          $this->db->insert('city',$data);
    }


     // update data
     function update($id, $data =array())
     {   
        $this->db->where('id', $id);
         $this->db->set($data);
        $this->db->update('city');
        
     }
 
 

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }
//----------------------------------------------------------------
   

}

/* End of file Season_model.php */