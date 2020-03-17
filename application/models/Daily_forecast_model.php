<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Daily_forecast_model extends CI_Model
{

    public $table = 'daily_forecast';
    public $table1 = 'daily_advisory';
    public $id = 'id';
    public $order = 'DESC';
    public $date ='date';

    function __construct()
    {
        parent::__construct();
    }

    function delete($id)
    {
        $this->db->where("id", $id);
        $this->db->delete("daily_forecast_data");
    }
    function delete1($id)
    {
        $this->db->where("id", $id);
        $this->db->delete("daily_forecast");
        $this->db->where("forecast_id", $id);
        $this->db->delete("daily_forecast_data");
    }


     function get_update($id)
    {
      $this->db->select('daily_forecast.id,daily_forecast.date,daily_forecast.weather,daily_forecast.time,daily_forecast.issuedate,daily_forecast.validitytime, daily_forecast.dutyforecaster, ussdmenulanguage.language');
      $this->db->from('daily_forecast');
      $this->db->join('ussdmenulanguage','daily_forecast.language_id = ussdmenulanguage.id');
       $this->db->where('daily_forecast.id', $id);
      $query=$this->db->get();
       return $query->result_array();
        // $this->db->order_by($this->id, $this->order);
        // return $this->db->get($this->table)->result();
    }

    function updating($id, $wet=array())
     {
        $sql = "UPDATE $this->table SET issuedate= ? ,validitytime = ? , date = ? ,weather = ? WHERE id = $id";
       return $this->db->query($sql, $wet);
     }

    function forecast_checker($date, $time)
    {
      $this->db->select('date, time');
      $this->db->from('daily_forecast');
      $this->db->where('date', $date);
      $this->db->where('time',$time);
      $query=$this->db->get();
      return $query->result_array();
    }
    
    function forecast_data_checker($region_id, $forecast_id)
    {
      $this->db->select('region_id');
      $this->db->from('daily_forecast_data');
      $this->db->where('region_id', $region_id);
      $this->db->where('forecast_id', $forecast_id);
      $query=$this->db->get();
      return $query->result_array();
    }

    // get all
    function get_all()
    {
      $this->db->select('daily_forecast.id,daily_forecast.date,daily_forecast.weather,daily_forecast.time,daily_forecast.issuedate,daily_forecast.validitytime, daily_forecast.dutyforecaster, ussdmenulanguage.language');
      $this->db->from('daily_forecast');
      $this->db->join('ussdmenulanguage','daily_forecast.language_id = ussdmenulanguage.id');
       $this->db->order_by('daily_forecast.id', 'DESC');
     $query=$this->db->get();
   
       return $query->result_array();
        // $this->db->order_by($this->id, $this->order);
        // return $this->db->get($this->table)->result();
    }
      //------new query to fetch the forcast time data----------
      //------new query to fetch the forcast time data----------
      function get_forecast_time()
    {   
        $this->db->select('forecast_time.id,forecast_time.from_time,forecast_time.to_time,forecast_time.period_name');
        $this->db->from('forecast_time');
        $this->db->order_by('forecast_time.id', 'ASC');
        $query=$this->db->get();
   
       return $query->result_array();
  }
    //---------------------get language available--------------------------------
      function get_available_language()
    {   
       $this->db->select('language,id');
     $this->db->from('ussdmenulanguage');
     $query=$this->db->get();
   
       return $query->result_array();
  }
    //-----------------------------------------------------
	//------advisories--------------------------------
   function get_advice($division){
      $dateadded = date('Y-m-d');
        $this->db->select('minor_sector.minor_name, daily_advisory.message_summary, division.division_name, daily_advisory.advice,daily_forecast.date');
        $this->db->from('daily_advisory');
        $this->db->join('daily_forecast_data', 'daily_advisory.forecast_id = daily_forecast_data.forecast_id');
        $this->db->join('daily_forecast','daily_forecast.id = daily_advisory.forecast_id');
        $this->db->join('division','daily_forecast_data.region_id = division.region_id');
        $this->db->join('minor_sector','minor_sector.id = daily_advisory.sector');
        $this->db->order_by('daily_advisory.id','DESC');
        $this->db->where('division.id', $division);
        $this->db->where("daily_forecast.language_id", 1); 
        $this->db->where('daily_forecast.date', $dateadded);
        $qy = $this->db->get();
        return $qy->result_array();

    }

    public  function get_all_advisories()
    { 
        $this->db->select('minor_sector.minor_name, daily_advisory.id,daily_advisory.sector,daily_advisory.forecast_id,daily_advisory.advice,daily_advisory.message_summary,');
        $this->db->from('daily_advisory');
        $this->db->join('minor_sector','minor_sector.id=daily_advisory.sector'); 
        $this->db->order_by('daily_advisory.dateadded', $this->order); 
           
        $query=$this->db->get();   
       return $query->result_array();
      
    }
        public  function get_all_advisory($id = NULL)
    { 
        $this->db->select('minor_sector.minor_name, daily_advisory.id,daily_advisory.sector,daily_advisory.forecast_id,daily_advisory.advice,daily_advisory.message_summary');
        $this->db->from('daily_advisory');
        $this->db->join('minor_sector','minor_sector.id=daily_advisory.sector'); 
        $this->db->join('daily_forecast','daily_forecast.id=daily_advisory.forecast_id');  
        $this->db->where("daily_forecast.language_id", 1); 
        if($id != NULL){
            $this->db->where('daily_forecast.id',$id);
        }
        $this->db->order_by('daily_advisory.dateadded', $this->order); 
           
        $query=$this->db->get();   
       return $query->result_array();
      
    }
    function insert_advisory($data=array())
    {
        $this->db->insert('daily_advisory',$data); 
    }
    function get_it_by_id_replaced($id)
    {
       $this->db->select('daily_advisory.advice, daily_advisory.message_summary, minor_sector.minor_name');
     $this->db->from('daily_advisory');
     $this->db->join('minor_sector','daily_advisory.sector = minor_sector.id');
       $this->db->join('daily_forecast','daily_advisory.forecast_id = daily_forecast.id');
      // $this->db->join('ussdsubregions','advisory.subregionid = ussdsubregions.subregionid');
     $this->db->where('daily_advisory.id',$id);
     $this->db->where("daily_forecast.language_id", 1); 
     return $this->db->get()->result();
  }
    //----------------------------------------------
	//get all area forecast
	function get_daily_forecast_data($id){
		 $this->db->select('forecast_time.period_name as time, daily_forecast_data.id, daily_forecast_data.mean_temp,daily_forecast_data.max_temp,daily_forecast_data.min_temp,daily_forecast_data.wind,daily_forecast_data.wind_direction,daily_forecast_data.wind_strength,region.region_name,weather_category.cat_name,daily_forecast_data.datetime,daily_forecast_data.forecast_id ');
	$this->db->from(' daily_forecast_data');
  $this->db->distinct("region.region_name");
	$this->db->join('region','region.id = daily_forecast_data.region_id');
	$this->db->join('weather_category','weather_category.id = daily_forecast_data.weather_cat_id');
	$this->db->join('daily_forecast','daily_forecast.id = daily_forecast_data.forecast_id');
    $this->db->join('forecast_time','daily_forecast.time = forecast_time.id');

    // $this->db->where("daily_forecast.language_id", 1); 	
	$this->db->where("daily_forecast_data.forecast_id", $id);
  //$this->db->order_by('forecast_time.id',"ASC");			
	return $this->db->get()->result(); 
		
    }
     //get all area forecast 
     function get_daily_impacts_data($id){
  $this->db->select('impact_forecast.id,impact_forecast.type, impact_forecast.impact_id,impact_forecast.forecast_id,daily_forecast.id,impacts.id,impacts.description');
   $this->db->from(' impact_forecast');	
   $this->db->join('daily_forecast','daily_forecast.id = impact_forecast.forecast_id');
   $this->db->join('impacts','impacts.id = impact_forecast.impact_id');
   $this->db->where("impact_forecast.forecast_id", $id);
   $this->db->where("daily_forecast.language_id", 1); 			
   return $this->db->get()->result(); 
       
   }
	
//show data for the selected division	
function get_daily_forecast_data_for_region1($forecast_id,$division_id){
			
	$this->db->select('daily_forecast_data.id, daily_forecast_data.mean_temp,daily_forecast_data.max_temp,daily_forecast_data.min_temp,daily_forecast_data.wind,daily_forecast_data.wind_direction,daily_forecast_data.wind_strength,division.division_name,region.region_name,weather_category.cat_name,daily_forecast_data.datetime,daily_forecast_data.forecast_id,forecast_time.period_name as time');
	$this->db->from(' daily_forecast_data');	
	$this->db->join('division','division.id = daily_forecast_data.division_id');
	$this->db->join('region','region.id = daily_forecast_data.region_id');
	$this->db->join('weather_category','weather_category.id = daily_forecast_data.weather_cat_id');
	$this->db->join('daily_forecast','daily_forecast.id = daily_forecast_data.forecast_id');
   $this->db->join('forecast_time','daily_forecast.time = forecast_time.id');
  
	// $this->db->where("daily_forecast_data.forecast_id", $forecast_id);
    $this->db->where("daily_forecast.language_id", 1); 
   $this->db->where("daily_forecast_data.division_id", $division_id); 
    $this->db->order_by('forecast_time.id',"ASC");     
	return $this->db->get()->result(); 	
    }
    
	///////////////////////////////// ///////////////////////
   // Retrieves the data of the forecast
   function get_daily_forecast_data_for_region_division($division_id){
    $this->db->select('division_name');
    $this->db->from('division');    
    // $this->db->join('weather_category','daily_forecast_data.weather_cat_id = weather_category.id');

    $this->db->where("id", $division_id);   

    return $this->db->get()->result(); 
        
    }
   function get_daily_forecast_data_for_region($forecast_id,$division_id){
    $this->db->select('daily_forecast.issuedate,forecast_time.period_name as time,division.division_name, daily_forecast.validitytime,daily_forecast.weather,
        daily_forecast_data.max_temp,daily_forecast_data.min_temp, daily_forecast_data.mean_temp, daily_forecast_data.wind, daily_forecast_data.wind_direction, daily_forecast_data.wind_strength ,daily_forecast.datetime,
        weather_category.cat_name, weather_category.img');
    $this->db->from('daily_forecast'); 
    $this->db->join('daily_forecast_data',' daily_forecast.id = daily_forecast_data.forecast_id');

   $this->db->join('forecast_time','daily_forecast.time = forecast_time.id');

    $this->db->join('region','region.id = daily_forecast_data.region_id');
    $this->db->join('division','division.region_id = region.id');
    $this->db->join('weather_category','daily_forecast_data.weather_cat_id = weather_category.id');

    $this->db->where("division.id", $division_id);
    $this->db->where("daily_forecast.language_id", 1); 
    $this->db->where("daily_forecast.date", date('Y-m-d')); 
     $this->db->order_by('forecast_time.id',"ASC"); 
    // $this->db->where("daily_forecast.id", $forecast_id);    

    return $this->db->get()->result(); 
        
    }

     function get_next_day_forecast_data_for_region($forecast_id,$division_id){
            
    $this->db->select('daily_forecast.issuedate,daily_forecast.weather,forecast_time.period_name as time, 
        daily_forecast_data.max_temp,daily_forecast_data.min_temp, daily_forecast_data.mean_temp, daily_forecast_data.wind, daily_forecast_data.wind_direction, daily_forecast_data.wind_strength ,daily_forecast.datetime,
        weather_category.cat_name, weather_category.img');
    $this->db->from('daily_forecast');    
     $this->db->join('daily_forecast_data',' daily_forecast.id = daily_forecast_data.forecast_id');
       
    $this->db->join('region','region.id = daily_forecast_data.region_id');
    $this->db->join('division','division.region_id = region.id');
    $this->db->join('weather_category','daily_forecast_data.weather_cat_id = weather_category.id');

   $this->db->join('forecast_time','daily_forecast.time = forecast_time.id');
 

    $this->db->where("division.id", $division_id); 
    $this->db->where("daily_forecast.language_id", 1); 
    $this->db->where("daily_forecast.date", date('Y-m-d', strtotime(' +1 day'))); 
    // $this->db->where("daily_forecast.id", $forecast_id);    
      $this->db->order_by('forecast_time.id',"ASC"); 
    return $this->db->get()->result(); 
        
    }

    // Returns forecast_id of the current day
	function get_recent_forecast(){

        $current_date = date('Y-m-d');

	   $this->db->select('daily_forecast.id, daily_forecast.weather, daily_forecast.date, daily_forecast.time, daily_forecast.issuedate,daily_forecast.validitytime,daily_forecast.dutyforecaster, daily_forecast.datetime');
	$this->db->from('daily_forecast');	
    $this->db->where('daily_forecast.date',$current_date);
	return $this->db->get()->result(); 
		
	}

    // Returns forecast_id of the next day
    function get_next_day_forecast($dist){
    $next_date = date('Y-m-d', strtotime(' +1 day'));
    $this->db->select('daily_forecast.id, daily_forecast.weather, daily_forecast.date, forecast_time.period_name as time, daily_forecast.issuedate,daily_forecast.validitytime,daily_forecast.dutyforecaster, daily_forecast.datetime');
    $this->db->from('daily_forecast');  

   $this->db->join('forecast_time','daily_forecast.time = forecast_time.id');

     $this->db->join('daily_forecast_data',' daily_forecast.id = daily_forecast_data.forecast_id');
     $this->db->join('division','division.region_id = daily_forecast_data.region_id');
   
    $this->db->where("daily_forecast.language_id", 1); 
    $this->db->where('daily_forecast.date',$next_date);
    $this->db->where("division.id", $dist); 
    $this->db->order_by('forecast_time.id',"ASC"); 
    return $this->db->get()->result(); 
        
    }
///////////////////////////// ///////////////////////////////
	
    //archive
    function get_archive()
    {
        $this->db->order_by($this->id, $this->order);
        //date 10 days before
        $past = date('Y-m-d', strtotime('-10 day', time()));
        $this->db->where('date<',$past);
        return $this->db->get($this->table)->result();

    }
    
    //get last 10 days
    function get_all_last_10days()
    {
        $this->db->order_by($this->id, $this->order);
        //date 10 days before
        $hours = date('Y-m-d', strtotime('-10 day', time()));
        //today's date
        $date = date('Y-m-d');        
        $this->db->where('date >=',$hours);
        $this->db->where('date <=', $date);
        return $this->db->get($this->table)->result();


    }
 /*function get_all_region($region=NULL){
			
	        $this->db->select('daily_forecast.id,daily_forecast.mean_temp,daily_forecast.max_temp,daily_forecast.min_temp,daily_forecast.wind,daily_forecast.wind_direction,daily_forecast.wind_strength,daily_forecast.weather,daily_forecast.datetime,division.division_name,weather_category.cat_name,region.region_name');
	$this->db->from('daily_forecast');
	// $this->db->where('date <=', $date);
	return $this->db->get()->result();
	 
	}*/

    //get all replaced
  function get_all_replaced()
    {
        $this->db->select('daily_forecast.id,daily_forecast.datetime,daily_forecast.weather,daily_forecast.date,forecast_time.period_name as time,daily_forecast.issuedate,daily_forecast.validitytime,daily_forecast.dutyforecaster');
	$this->db->from('daily_forecast');

   $this->db->join('forecast_time','daily_forecast.time = forecast_time.id');
   $this->db->order_by('forecast_time.id',"ASC");	
	return $this->db->get()->result();
	}
	//other days
	function get_other_days($datas){
      
          $sqlx = "SELECT * FROM  daily_forecast WHERE time = ? && region = ? && date > ? order by date asc limit 5";
         return $this->db->query($sqlx, $datas);
	}
  // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    //get by id replaced
    function get_by_id_replaced($id)
    {   
	 $this->db->where($this->id, $id);
     return $this->db->get($this->table)->row();
}

	function get_forecast_data_for_city($region, $time){
	   $this->db->select('daily_forecast_data.max_temp, daily_forecast_data.wind, daily_forecast_data.mean_temp, daily_forecast_data.wind_direction, daily_forecast_data.wind_strength, weather_category.cat_name, weather_category.widget');
	   $this->db->from('daily_forecast_data');
       $this->db->join('weather_category','daily_forecast_data.weather_cat_id = weather_category.id');
	   $this->db->where("daily_forecast_data.region_id" , $region);
	   $this->db->order_by('daily_forecast_data.id', 'DESC');
	   $this->db->limit(1); 
	   $query=$this->db->get();   
       return $query->result_array();		
	}


  // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id', $q);
        $this->db->or_like('mean_temp', $q);
        $this->db->or_like('max_temp', $q);
        $this->db->or_like('min_temp', $q);
        $this->db->or_like('wind', $q);
        $this->db->or_like('wind_direction', $q);
        $this->db->or_like('wind_strength', $q);
        $this->db->or_like('weather', $q);
        $this->db->or_like('advisory', $q);
        $this->db->or_like('datetime', $q);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
        $this->db->or_like('mean_temp', $q);
        $this->db->or_like('max_temp', $q);
        $this->db->or_like('min_temp', $q);
        $this->db->or_like('wind', $q);
        $this->db->or_like('wind_direction', $q);
        $this->db->or_like('wind_strength', $q);
        $this->db->or_like('weather', $q);
        $this->db->or_like('advisory', $q);
        $this->db->or_like('datetime', $q);
        $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
	  $this->db->insert('daily_forecast',$data);         
    }
    //------inserting forecast data------------------------insertforecastimpactdata
   function insertforecastdata($data){
	  	$this->db->insert('daily_forecast_data',$data);   
    }
    //-----------------------------------------------------------
     //------inserting forecast data------------------------
   function insertforecastimpactdata($data){
    $this->db->insert('impact_forecast',$data);   
}
//-----------------------------------------------------------
    
     // update data
     function update($id, $data)
     {

         // $this->db->where($this->id, $id);
         // $this->db->update($this->table, $data);

         $data1=array(
             'mean_temp' => $data['mean_temp'],
             'wind_direction' => $data['wind_direction'],
             'wind_strength' => $data['wind_strength'],
             'weather' => $data['weather']
             
                 );


          $lang=$data['lang'];
          if($lang='Luganda')
          $sql = "UPDATE $this->table SET mean_temp = ?, wind_direction = ?, wind_strength = ?, weatherLuganda = ? WHERE id = $id";
          else
          $sql = "UPDATE $this->table SET max_temp = ?, wind_direction = ?, wind_strengthm = ?, weather = ?  WHERE id = $id";
         return $this->db->query($sql, $data1);
     }

    // delete data
    

    function delete_ad($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table1);
    }

    function get_date(){
        $today = "SELECT region FROM $this->table WHERE (date > date('y-m-d')) ";
        $today2 = $this->db->query($today);

    }

}

/* End of file Daily_forecast_model.php */
