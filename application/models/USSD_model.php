<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
/**
 * 
 */
class USSD_model extends CI_model
{
	public $id = "id";
	public $table = "ussdmenulanguage";
	public $order = "ASC";
	public $language_table = "language_text_table";

	function __construct()
	{
		parent::__construct();
	}

	function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    function get_lang($lang)
    {
        return $this->db->get($this->table)->result();
    }

    function insert($data=array())
    {
    	$this->db->insert($this->table,$data); 
    	// $this->db->insert($menu, $data); 
    }
    function translations($menu, $data=array())
    {
    	// $this->db->insert($this->table,$data); 
    	$this->db->insert($menu, $data); 
    }
    
    function delete($table_name)
    {
        $this->db->where($this->language_table, $table_name);
        $this->db->delete($this->table);
    }

    function display_trans($table_name){
    	$this->db->select('ussdmenu.menudescription as eng, '.$table_name.'.menudescription as trans');
    	$this->db->from('ussdmenu');
    	$this->db->join($table_name, "$table_name.menuname = ussdmenu.menuname");
    	return $this->db->get()->result();
    }

    function display_lang($table_name){
    	$this->db->select('language');
    	$this->db->from($this->table);
    	$this->db->where('language_text_table', $table_name);
    	return $this->db->get()->result();
    }
}

    
?>