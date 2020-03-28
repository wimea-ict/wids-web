<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Minor_model extends CI_Model
{
     //connecting to table major_sector 
    public $table = 'minor_sector';
    public $id = 'id';
    public $order = 'DESC';
	  //public $sector_name = 'sector_name';
    //public $major_name = 'major_name';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        
      $this->db->select(' minor_sector.minor_name, minor_sector.id,major_sector.sector_name,possible_advisories.cat,possible_advisories.advise,possible_advisories.state');
      $this->db->from('minor_sector');
      $this->db->join('major_sector','major_sector.id = minor_sector.major_id');
      $this->db->join('possible_advisories','minor_sector.id  = possible_advisories.cat');  
      //$this->db->where('minor_sector.major_id','major_sector.id');   
     $query=$this->db->get();   
      return $query->result_array();
    }
    function get_category(){
        $query = $this->db->get('minor_sector');
        return $query;  
    }
    //-------------minor_sector_advisory-------------------
   function get_sub_category($category_id){
    $query = $this->db->get_where('possible_advisories', array('cat' => $category_id));
    return $query;
}
 
    function get_categories(){
        $query = $this->db->get('minor_sector');
        return $query;  
    }
   //---------------------------------
  // get data by id
    function get_by_id($id)
    {    
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }


    // insert data int minor_sector table
    function insert($data=array())
    {  
        $this->db->insert('minor_sector',$data);
    }


     // update data
     function update($id, $data)
     {
         $data1 = array(
             'minor_sector' => $data['minor_sector']
      
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

/* End of file Minor_model.php */