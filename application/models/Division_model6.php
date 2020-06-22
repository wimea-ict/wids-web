<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Division_model extends CI_Model
{

    public $table = 'division';
    public $id = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
       $this->db->select('division.division_name, division.division_type, division.id,region.region_name');
	   $this->db->from('division');
       $this->db->join('region','region.id=division.region_id');
	   $query=$this->db->get();
   
       return $query->result_array();
    }
// =================get data by id==========
    function get_by_id($id=NULL)
    {  
     $this->db->from('division'); 
        if(isset($id)){
       $this->db->where('id',$id);   
      }
         $query=$this->db->get();   
      return $query->result_array();
    }
    //==============================================
	//function to return the name of tehdivision 
	function getdivisionname($country){
	   $this->db->select('division_type');
	   $this->db->from('division');
	   $this->db->limit(1);
	   $query = $this->db->get();
	   
	   if($query->num_rows()>0) {	 
		 $data = $query->row_array();		 
		 $value = $data['division_type'];		 
		 return $value;
		 
	 }
	}
     //-----------------------------------------------------------
    // insert data int major_sector table
    function insert($data = array())
    {     
         // $this->db->set($data);
          $this->db->insert('division',$data);
    }


     // update data
     function update($id, $data =array())
     {   
        $this->db->where('id', $id);
         $this->db->set($data);
        $this->db->update('division');
        
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