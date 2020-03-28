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
    // function readfeedback(){
    //     $this->db->order_by($this->feedbackid, $this->order);
    //     return $this->db->get($this->feedback)->result();
    // }
    function readfeedback()
    {  
      $this->db->select('user_feedback.id, user_feedback.city_id, user_feedback.city_id,user_feedback.sector,user_feedback.accuracy, user_feedback.applicability,user_feedback.timeliness,user_feedback.generalComment,user_feedback.contact,user_feedback.datetime,division.division_name,division.division_type');
      $this->db->from('user_feedback');
      $this->db->join('division','user_feedback.city_id = division.id');
      $this->db->order_by('id',"DESC");
      //$this->db->where('minor_sector.major_id','major_sector.id');   
     $query=$this->db->get();   
      return $query->result_array();
    }
  // get data by id
    function get_by_id($id)
    {  
    
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    //get feedback by id
        function get_feedback_by_id($feedbackid)
    {  
      $this->db->select(' user_feedback.city_id, user_feedback.city_id,user_feedback.sector,user_feedback.accuracy, user_feedback.applicability,user_feedback.timeliness,user_feedback.generalComment,user_feedback.contact,user_feedback.datetime,division.division_name,division.division_type');
      $this->db->from('user_feedback');
      $this->db->join('division','user_feedback.city_id = division.id');
      $this->db->where('user_feedback.id',$feedbackid);   
     $query=$this->db->get();   
      return $query->result_array();
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
        $this->db->insert('user_feedback',$data);
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
    public function feedbackgraph(){
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

    public function ussdrequest(){
        $dailyForecast = "SELECT COUNT(menuvalue) as 'R' FROM ussdtransaction_new WHERE menuvalue like 'Daily%'"; 
        $dailyForecast = $this->db->query($dailyForecast)->result_array();
        
        $seasonalForecast = "SELECT COUNT(menuvalue) as 'R' FROM ussdtransaction_new WHERE menuvalue like 'Seasonal%'"; 
        $seasonalForecast = $this->db->query($seasonalForecast)->result_array();

        $monthlyForecast = "SELECT COUNT(menuvalue) as 'R' FROM ussdtransaction_new WHERE menuvalue like 'Monthly%'"; 
        $monthlyForecast = $this->db->query($monthlyForecast)->result_array();
        

        $data = array(
            array_merge(array('number'=>'Daily Forecast'),$dailyForecast[0]),
            array_merge(array('number'=>'Seasonal Forecast'),$seasonalForecast[0]),
            array_merge(array('number'=>'Monthly Forecast'),$monthlyForecast[0]),
           
          
            
        );
        return $data;
    }

    public function trend(){
         $currentYear =  date("Y");
         $prevYear = date("Y")-1;
         $last2Y = date('Y') -2;
        
         //last year
         $agric = "SELECT Count(menuvalue) AS 'R' from ussdtransaction_new WHERE date like '$prevYear%' AND menuvalue like 'Daily%'";
         $Lagric = $this->db->query($agric)->result_array();
        
         $lwea = "SELECT Count(menuvalue) AS 'S' from ussdtransaction_new WHERE date like '$prevYear%' AND menuvalue like 'Seasonal%'";
         $Lweather = $this->db->query($lwea)->result_array();

         $lDis = "SELECT Count(menuvalue) AS 'D' from ussdtransaction_new WHERE date like '$prevYear%' AND menuvalue like 'Monthly%'";
         $LDisaster = $this->db->query($lDis)->result_array();

         // $lFoo = "SELECT Count(Level0) AS 'W' from ussdtransaction WHERE RecordDate like '$prevYear%' AND Level0 like 'water%'";
         // $Lfoo = $this->db->query($lFoo)->result_array();
         
         // $lwat = "SELECT Count(Level0) AS 'H' from ussdtransaction WHERE RecordDate like '$prevYear%' AND Level0 like 'health%'";
         // $Lwater = $this->db->query($lwat)->result_array();
        
                 
         //current year
        $cur = "SELECT Count(menuvalue) AS 'R' from ussdtransaction_new WHERE date like '$currentYear%' AND menuvalue like 'Daily%'";
        $AgricC = $this->db->query($cur)->result_array();
        
         $curW = "SELECT Count(menuvalue) AS 'S' from ussdtransaction_new WHERE date like '$currentYear%' AND menuvalue like 'Seasonal%'";
         $weather = $this->db->query($curW)->result_array();

         $curD = "SELECT Count(menuvalue) AS 'D' from ussdtransaction_new WHERE date like '$currentYear%' AND menuvalue like 'Monthly%'";
         $Disaster = $this->db->query($curD)->result_array();

         $total_requests = $AgricC + $weather + $Disaster;

         // $curWa = "SELECT Count(Level0) AS 'W' from ussdtransaction WHERE RecordDate like '$currentYear%' AND Level0 like 'water%'";
         // $water = $this->db->query($curWa)->result_array();

         // $curH = "SELECT Count(Level0) AS 'H' from ussdtransaction WHERE RecordDate like '$currentYear%' AND Level0 like 'health%'";
         // $health = $this->db->query($curH)->result_array();
        
         $data = array(
             array_merge(array('average'=>$prevYear), $Lweather[0], $LDisaster[0], $Lagric[0] ),
             array_merge(array('average'=>$currentYear), $weather[0], $Disaster[0], $AgricC[0]),
         
         );
         return $data;
        
    }
    

}
