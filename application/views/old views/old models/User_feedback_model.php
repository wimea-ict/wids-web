<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User_feedback_model extends CI_Model
{

    public $table = 'user_feedback';
    public $feedback = 'user_feedback';
    public $feedbackid = 'id';
    public $id = 'id';
    public $order = 'DESC';
   
	//public $issuetime = 'issuetime';

    function __construct()
    {
        parent::__construct();
        $this->load->helper('array');
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
       // return $this->db->get($this->table)->result();
	   return $this->db->get($this->table)->result();
    }

    //get the userfeedback
    function readfeedback(){
        $this->db->order_by($this->feedbackid, $this->order);
        return $this->db->get($this->feedback)->result();
    }
  // get data by id
    function get_by_id($id)
    {  
	
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    //get feedback by id
    function get_feedback_by_id($feedbackid){
        $this->db->where($this->feedbackid, $feedbackid);
        return $this->db->get($this->feedback)->row();
    }
  // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id', $q);
	$this->db->or_like('advisory', $q);
	$this->db->or_like('date_from', $q);
	$this->db->or_like('date_to', $q);
	$this->db->or_like('issuetime', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
    $this->db->order_by($this->id, $this->order);
    $this->db->like('id', $q);
	$this->db->or_like('advisory', $q);
	$this->db->or_like('date_from', $q);
	$this->db->or_like('date_to', $q);
	$this->db->or_like('issuetime', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    //insert user_feedback into user_feedback table
    function logfeedback($data)
    {
     
    $sql = "INSERT INTO user_feedback(id, city_id, sector, accuracy, applicability, timeliness, generalComment, contact) VALUES(null, ?, ?, ?, ?, ?, ?, ?)";
    
     return $this->db->query($sql, $data);
    
    }

    function CheckForExistence($region, $district, $thisregionString)
    {
        $thisregionString = array();
        $thisregion = $this->db->get_where('feedback', array('region'=>$region, 'district'=>$district));
        foreach ($thisregion->result() as $row){
            //punting each row into a string
             $regionvalues = $row->observation." ".$row->implication." ".$row->action_to_take; 
            //pushing the string into the array
             array_push($thisregionString, $regionvalues);
         }
           return $thisregionString;
           
    }

   // insert Indidigenous knowledge into the database
   function insert($data)
   {   // var_dump($data);
        //exit;
       //$this->db->insert($this->table, $data); 
       $sql = "INSERT INTO $this->table(record_id, names, region, district, observation, implication, action_to_take) VALUES(null, ?, ?, ?, ?, ?, ?)";
         return $this->db->query($sql, $data);
   }

    // update data
    function update($id, $data)
    {    //var_dump($data);
	     //echo $id;  
	     //exit;
		 
         $sql = "UPDATE $this->table SET advisory = ?, date_from = ?, date_to = ?  WHERE decadal_id = $id";
        return $this->db->query($sql, $data);
    }

    function verify($id){
        $verified = "UPDATE $this->table SET status = 1 WHERE record_id = $id";
        return $this->db->query($verified);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }
    function delete_feedback($feedbackid)
    {
        $this->db->where($this->feedbackid, $feedbackid);
        $this->db->delete($this->feedback);
    }

        //bar graph for feedback
    public function feedbackgraph($element_id){
        $query = "SELECT ROUND(AVG(accuracy), 2) as 'R' FROM user_feedback"; 
        $accuracy = $this->db->query($query)->result_array();

       
        $query = "SELECT ROUND(AVG(applicability), 2) as 'R' FROM user_feedback"; 
        $applicability = $this->db->query($query)->result_array();

        $query = "SELECT ROUND(AVG(timeliness), 2) as 'R' FROM user_feedback"; 
        $timeliness = $this->db->query($query)->result_array();
        $data = array(
            array_merge(array('average'=>'Accuracy'),$accuracy[0]),
            array_merge(array('average'=>'Apllicability'),$applicability[0]),
            array_merge(array('average'=>'Timliness'),$timeliness[0]),
            
        );
        return $data;
    }

    public function ussdrequest($element_id){
        $agriculture = "SELECT COUNT(Level0) as 'R' FROM ussdtransaction WHERE Level0 like 'agriculture%'"; 
        $agric = $this->db->query($agriculture)->result_array();
        
        
        $wea = "SELECT COUNT(Level0) as 'R' FROM ussdtransaction WHERE Level0 like 'weather%'"; 
        $weather = $this->db->query($wea)->result_array();

        $wa = "SELECT COUNT(Level0) as 'R' FROM ussdtransaction WHERE Level0 like 'water%'"; 
        $water = $this->db->query($wa)->result_array();

        $dis = "SELECT COUNT(Level0) as 'R' FROM ussdtransaction WHERE Level0 like 'disaster%'"; 
        $disaster = $this->db->query($dis)->result_array();
      
        $hea = "SELECT COUNT(Level0) as 'R' FROM ussdtransaction WHERE Level0 like 'health%'"; 
        $health = $this->db->query($hea)->result_array();

        $data = array(
            array_merge(array('number'=>'Agriculture'),$agric[0]),
            array_merge(array('number'=>'Weather'),$weather[0]),
            array_merge(array('number'=>'Water'),$water[0]),
            array_merge(array('number'=>'Disaster Preparedness'),$disaster[0]),
            array_merge(array('number'=>'Health'),$health[0]),
          
            
        );
        return $data;
    }

    public function trend($element_id){
         $currentYear =  date("Y");
         $prevYear = date("Y")-1;
         $last2Y = date('Y') -2;
        
         //last year
         $agric = "SELECT Count(Level0) AS 'R' from ussdtransaction WHERE RecordDate like '$prevYear%' AND Level0 like 'agriculture%'";
         $Lagric = $this->db->query($agric)->result_array();
        
         $lwea = "SELECT Count(Level0) AS 'S' from ussdtransaction WHERE RecordDate like '$prevYear%' AND Level0 like 'weather%'";
         $Lweather = $this->db->query($lwea)->result_array();

         $lDis = "SELECT Count(Level0) AS 'D' from ussdtransaction WHERE RecordDate like '$prevYear%' AND Level0 like 'Disaster%'";
         $LDisaster = $this->db->query($lDis)->result_array();

         $lFoo = "SELECT Count(Level0) AS 'W' from ussdtransaction WHERE RecordDate like '$prevYear%' AND Level0 like 'water%'";
         $Lfoo = $this->db->query($lFoo)->result_array();
         
         $lwat = "SELECT Count(Level0) AS 'H' from ussdtransaction WHERE RecordDate like '$prevYear%' AND Level0 like 'health%'";
         $Lwater = $this->db->query($lwat)->result_array();
        
                 
         //current year
        $cur = "SELECT Count(Level0) AS 'R' from ussdtransaction WHERE RecordDate like '$currentYear%' AND Level0 like 'agriculture%'";
        $AgricC = $this->db->query($cur)->result_array();
        
         $curW = "SELECT Count(Level0) AS 'S' from ussdtransaction WHERE RecordDate like '$currentYear%' AND Level0 like 'weather%'";
         $weather = $this->db->query($curW)->result_array();

         $curD = "SELECT Count(Level0) AS 'D' from ussdtransaction WHERE RecordDate like '$currentYear%' AND Level0 like 'Disaster%'";
         $Disaster = $this->db->query($curD)->result_array();

         $curWa = "SELECT Count(Level0) AS 'W' from ussdtransaction WHERE RecordDate like '$currentYear%' AND Level0 like 'water%'";
         $water = $this->db->query($curWa)->result_array();

         $curH = "SELECT Count(Level0) AS 'H' from ussdtransaction WHERE RecordDate like '$currentYear%' AND Level0 like 'health%'";
         $health = $this->db->query($curH)->result_array();
        
         $data = array(
             array_merge(array('average'=>$prevYear), $Lweather[0], $LDisaster[0], $Lfoo[0], $Lwater[0], $Lagric[0] ),
             array_merge(array('average'=>$currentYear), $weather[0], $Disaster[0], $health[0], $water[0], $AgricC[0]),
         
         );
         return $data;
        
    }
    

}
