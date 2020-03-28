<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Minor_sector_model extends CI_Model
{

    public $table = 'minor_sector';
    public $id = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
       $this->db->select('minor_sector.minor_name, minor_sector.id,major_sector.sector_name');
	   $this->db->from('minor_sector');
       $this->db->join('major_sector','major_sector.id=minor_sector.major_id');
	   $query=$this->db->get();
   
       return $query->result_array();
    }
  // get data by id
    function get_by_id($id=NULL)
    {  
     $this->db->from('minor_sector'); 
        if(isset($id)){
       $this->db->where('id',$id);   
      }
         $query=$this->db->get();   
      return $query->result_array();
    }
	
	//function to return the name of tehdivision 
	function getdivisionname($country){
	   $this->db->select('id');
	   $this->db->from('minor_sector');
	   $this->db->limit(1);
	   $query = $this->db->get();
	   
	   if($query->num_rows()>0) {	 
		 $data = $query->row_array();		 
		 $value = $data['id'];		 
		 return $value;
		 
	 }
	}
  
    
     function insert($data=array())
    {  
        $this->db->insert('minor_sector',$data);
    }


     // update data
     function update($id, $data =array())
     {   
        $this->db->where('id', $id);
         $this->db->set($data);
        $this->db->update('minor_sector');
        
     }
 
 

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

   

}

/* End of file Season_model.php */