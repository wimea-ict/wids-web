<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Possible_advisories_model extends CI_Model
{
     //connecting to table major_sector 
    public $table = 'possible_advisories';
    public $id = 'pos';
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
      
      $this->db->select('possible_advisories.cat,possible_advisories.pos, possible_advisories.advise,possible_advisories.state,minor_sector.minor_name,');
      $this->db->from('possible_advisories');
      $this->db->join('minor_sector','minor_sector.id=possible_advisories.cat'); 
      //$this->db->where('minor_sector.major_id','major_sector.id');   
     $query=$this->db->get();   
      return $query->result_array();
    }

    // =================get data by id==========
    function get_by_id($id=NULL)
    {  
     $this->db->from('possible_advisories'); 
        if(isset($id)){
       $this->db->where('pos',$id);   
      }
         $query=$this->db->get();   
      return $query->result_array();
    }
    //==============================================

    // insert data int minor_sector table
    //-----------------------------------------------------------
    // insert data int major_sector table
    function insert($data = array())
    {     
         // $this->db->set($data);
          $this->db->insert('possible_advisories',$data);
    }


     // update data
     function update($id, $data =array())
     {   
        $this->db->where('pos', $id);
         $this->db->set($data);
        $this->db->update('possible_advisories');
        
     }
 
    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }
//----------------------------------------------------------------

   

}

/* End of file Minor_model.php */