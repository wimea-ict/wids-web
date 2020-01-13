<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Major_model extends CI_Model
{
     //connecting to table major_sector 
    public $table = 'major_sector';
    public $id = 'id';
    public $order = 'DESC';
	public $sector_name = 'sector_name';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->sector_name, $this->order);
		//echo $this->db->get($this->table)->result(); exit();
        return $this->db->get($this->table)->result();
    }
  // get data by id
    function get_by_id($id)
    {    
	    //echo $id;
	    //  exit;
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
  // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id', $q);
		$this->db->or_like('sector_name', $q);
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
    function insert($data=array())
    {  
        $this->db->insert('major_sector',$data);
    }


     // update data
     function update($id, $data)
     {
         $data1 = array(
             'major_sector' => $data['major_sector']
      
         );
    
          
         return $this->db->query($sql, $data1);
     }
 
 

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

   

}

/* End of file Season_model.php */