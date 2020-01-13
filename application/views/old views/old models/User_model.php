<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Advisory_model extends CI_Model
{

    public $table = 'users';
    public $id = 'id';
    

    function __construct()
    {
        parent::__construct();
    }
    public function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
     // update data
     public function update($id, $data)
     {    
          $sql = "UPDATE $this->table SET username = ?, first_name = ?, last_name = ?, email = ?, password = ?, type = ?, phone = ?  WHERE decadal_id = $id";
         return $this->db->query($sql, $data);
     }
      // get all
    public function get_all()
    {
        $this->db->order_by($this->$id);
       
	   return $this->db->get($this->table)->result();
    }

    
    
}?>