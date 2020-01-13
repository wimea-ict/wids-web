<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Season_model extends CI_Model
{

    public $table = 'seasonal_forecast';
    public $id = 'id';
    public $order = 'DESC';
	public $issuetime = 'issuetime';

    function __construct()
    {
        parent::__construct();
    }

    // get allgetdivisionname
    function get_all()
    {  
	   $this->db->select('season_months.season_name,seasonal_forecast.year,seasonal_forecast.overview,seasonal_forecast.general_forecast,seasonal_forecast.issuetime,season_months.abbreviation,seasonal_forecast.id');
	   $this->db->from('seasonal_forecast');
       $this->db->join('season_months','season_months.id=seasonal_forecast.season_id');  
       $this->db->order_by('seasonal_forecast.issuetime', $this->order);
	   
	   $query=$this->db->get();   
       return $query->result_array();
    
    }
    // New method for viewing the seasonal forecast data on the admin side
    function view_season_data($id)
    {  
        $this->db->select('seasonal_forecast.issuetime, seasonal_forecast.year,season_months.season_name, season_months.abbreviation, seasonal_forecast.overview, seasonal_forecast.general_forecast, ');
        $this->db->from('seasonal_forecast');
        $this->db->join('season_months','seasonal_forecast.season_id = season_months.id');
        $this->db->where('seasonal_forecast.id', $id);
       $query=$this->db->get();   
       return $query->result_array();
    
    }

    function get_update_data($forecast_id)
    {  
       $this->db->select('issuetime, overview,general_forecast');
       $this->db->from('seasonal_forecast');
       // $this->db->where('id', $forecast_id);
       
       $query=$this->db->get();   
       return $query->result_array();
    
    }

    function update_data($data, $id)
    {  
       $sql = "UPDATE seasonal_forecast SET overview = ?, general_forecast = ? WHERE id = $id";
       return $this->db->query($sql, $data);
    
    }
	
	function get_current_season(){
	   	
	  $this->db->select('season.season_name,seasonal_forecast.id as id'); 
	   $this->db->from('season');
	   $this->db->join('seasonal_forecast','seasonal_forecast.season_id=season.id');
	    $this->db->order_by('seasonal_forecast.issuetime', $this->order);	   
	   $this->db->limit(1);
	   $query = $this->db->get();
	   
	   if($query->num_rows()>0) {	 
		 $data = $query->row_array();		 
		 $value = $data['id'];		 
		 return $value;
		 
	 }
	}
	
	function get_recent_forecast($region,$forecast_id){
	   $this->db->select('area_seasonal_forecast.region_id,area_seasonal_forecast.subregion_id,area_seasonal_forecast.expected_peak, area_seasonal_forecast.peakdesc, area_seasonal_forecast.onset_period,area_seasonal_forecast.onsetdesc,area_seasonal_forecast.end_period,area_seasonal_forecast.enddesc,area_seasonal_forecast.overall_comment,area_seasonal_forecast.general_info');
	   $this->db->from('area_seasonal_forecast');  
	   $this->db->join('region','region.id=area_seasonal_forecast.region_id'); //area_seasonal_forecast
	   $this->db->join('sub_region','area_seasonal_forecast.subregion_id=sub_region.id');
	   $multipleWhere = ['area_seasonal_forecast.region_id =' => $region, 'area_seasonal_forecast.forecast_id =' => $forecast_id];	 
	   $this->db->where($multipleWhere);
      // $this->db->order_by('area_seasonal_forecast.issuetime', $this->order);
	   
	   $query=$this->db->get();   
       return $query->result_array();
    	
		
	}
    
    //------------------------------
    
    //------------------------------

    function get_season_data1($id)
    {  
	   $this->db->select('season_months.season_name,seasonal_forecast.year,seasonal_forecast.overview,seasonal_forecast.general_forecast,seasonal_forecast.issuetime,season_months.abbreviation,seasonal_forecast.id');
	   $this->db->from('seasonal_forecast');
       $this->db->join('season_months','season_months.id=seasonal_forecast.season_id'); 
	   $this->db->where('seasonal_forecast.id',$id);
       $this->db->order_by('seasonal_forecast.issuetime', $this->order);   
	   
	   $query=$this->db->get();   
       return $query->result_array();
    
    }
	
	//area forcast
function get_areaseason_data($id)
    {  
	   $this->db->select('area_seasonal_forecast.expected_peak, area_seasonal_forecast.peakdesc, area_seasonal_forecast.onset_period,area_seasonal_forecast.end_period,area_seasonal_forecast.enddesc,area_seasonal_forecast.overall_comment,area_seasonal_forecast.general_info,region.region_name,sub_region.sub_region_name');
	   $this->db->from('area_seasonal_forecast');
	   $this->db->join('seasonal_forecast','area_seasonal_forecast.forecast_id=seasonal_forecast.id'); 
	   $this->db->join('region','area_seasonal_forecast.region_id=region.id');
	   $this->db->join('sub_region','area_seasonal_forecast.subregion_id=sub_region.id');
	   $this->db->where('area_seasonal_forecast.forecast_id',$id);	   
	   
	   $query=$this->db->get();   
       return $query->result_array();
    
    }

//----------------------------------
public  function get_all_forecast_area($id=NULL){
    $id = 2; 
    $this->db->select('area_seasonal_forecast.region_id, area_seasonal_forecast.subregion_id, area_seasonal_forecast.expected_peak, area_seasonal_forecast.onset_period,area_seasonal_forecast.onsetdesc,area_seasonal_forecast.overall_comment,area_seasonal_forecast.general_info, region.region_name,area_seasonal_forecast.enddesc,region.id,seasonal_forecast.season_id, area_seasonal_forecast.end_period,area_seasonal_forecast.peakdesc,area_seasonal_forecast.id');
    $this->db->from('area_seasonal_forecast');
    $this->db->join('seasonal_forecast','seasonal_forecast.id=area_seasonal_forecast.forecast_id','inner'); 
    $this->db->join('region','region.id=area_seasonal_forecast.region_id','inner'); 

     $this->db->where('area_seasonal_forecast.forecast_id',$id);	 
   $query=$this->db->get();   
    return $query->result_array();

   }
//------------------------------------
     
public  function get_forecast_area($id=NULL){
      
      $this->db->select('area_seasonal_forecast.expected_peak, area_seasonal_forecast.onset_period,area_seasonal_forecast.onsetdesc,area_seasonal_forecast.overall_comment,area_seasonal_forecast.general_info, region.region_name,area_seasonal_forecast.enddesc,area_seasonal_forecast.end_period,area_seasonal_forecast.peakdesc,area_seasonal_forecast.id');
      $this->db->from('area_seasonal_forecast');

      $this->db->join('region','region.id=area_seasonal_forecast.region_id','inner'); 
     if(isset($id)){
        $this->db->where('area_seasonal_forecast.forecast_id',$id);	 
	}
     $query=$this->db->get();   
      return $query->result_array();

     }
  // get data by id
    function get_by_id($id)
    {    
	   $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
	
	
  // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id', $q);
	$this->db->or_like('season_name', $q);
	$this->db->or_like('season_code', $q);
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

    // insert data
    function insert($data=array())
    {    $this->db->insert('seasonal_forecast',$data);    

    }
  //==================seasonal forecast with advisory------------------------------------------
        // New Method with advisories
     function get_season_data($id, $division)
    {  
        $this->db->select('seasonal_forecast.issuetime, seasonal_forecast.year, season_months.abbreviation, seasonal_forecast.overview, seasonal_forecast.general_forecast, seasonal_forecast.map, region.region_name, sub_region.sub_region_name, area_seasonal_forecast.overall_comment');
        $this->db->from('division');
        $this->db->join('region','division.region_id = region.id');
        $this->db->join('area_seasonal_forecast','area_seasonal_forecast.region_id =  division.region_id');
        $this->db->join('sub_region','area_seasonal_forecast.subregion_id = sub_region.id');
        $this->db->join('seasonal_forecast','area_seasonal_forecast.forecast_id = seasonal_forecast.id');
        $this->db->join('season_months','seasonal_forecast.season_id = season_months.id');
        //$this->db->where('seasonal_forecast.id', $id);
        $this->db->where('division.id', $division);
        $this->db->order_by('area_seasonal_forecast.id','DESC');
       $query=$this->db->get();   
       return $query->result_array();
    
    }function get_advice($division){
        $this->db->select('message_summary,seasonal_forecast.year, sub_region_name, division_name, region_name, minor_name, abbreviation');
        $this->db->from('advisory');
        $this->db->join('area_seasonal_forecast', 'advisory.forecast_id = area_seasonal_forecast.forecast_id');
        $this->db->join('region', 'area_seasonal_forecast.region_id = region.id');
        $this->db->join('sub_region','area_seasonal_forecast.subregion_id = sub_region.id');
        $this->db->join('division','area_seasonal_forecast.region_id = division.region_id');
        $this->db->join('minor_sector', 'advisory.sector = minor_sector.id');
        $this->db->join('seasonal_forecast', 'advisory.forecast_id = seasonal_forecast.id');
        $this->db->join('season_months', 'seasonal_forecast.season_id = season_months.id');
        $this->db->order_by('advisory.id','DESC');
        $this->db->where('division.id', $division);
        $qy = $this->db->get();
        return $qy->result_array();

    }
    //==================seasonal forecast with advisory------------------------------------------
    
    function get_current_division($id){
        $this->db->select('division_name');
        $this->db->from('division');
        $this->db->where('id', $id);
        $query=$this->db->get(); 
        if($query->num_rows()>0) {   
         $data = $query->row_array();        
         $value = $data['division_name'];       
         return $value;
     }
        
    }
     // update data
// Edited the method to be able to update the specific season data for the admin
     function update($id, $data)
     {
         $data1 = array(
             'region' => $data['region'],
             'subregion' => $data['subregion'],
             'seas' => $data['seas'],
             'descrip' => $data['descrip'],
             'impact' =>$data['impact'],
             'file1' =>  $data['file1'],
             'file2' => $data['file2'],
         );
          if($data['lang']=='English')
           $sql = "UPDATE $this->table SET region = ?, subregionid = ?, season = ?, description = ?, impact = ?, graph = ?, audio =?  WHERE id = $id";
           if($data['lang']=='Luganda')
           $sql = "UPDATE $this->table SET region = ?, subregionid = ?, season = ?, descriptionLuganda = ?, impactLuganda = ?, graph = ?, audio =?  WHERE id = $id";
          
         return $this->db->query($sql, $data1);
     }
/////////////////////////////////////////////////////////////////
 //---------------------insert seasonal data area-----------------
     // insert data int minor_sector table
    function insertForecastArea($data=array())
    {  
        $this->db->insert('area_seasonal_forecast',$data);
    }
 //---------------------------------------------

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

    //get farmers to send message
    function getfarmers($region,$sub_region,$season){

        $numbers = "";
        $unique = array();
        $count = "";
        

       
            $this->db->select('ussdtransaction.Msisdn,ussdtransaction.districtid');

            $this->db->from('ussdtransaction');

            $array = array('regionid'=>$region,'subregionid'=>$sub_region,'Level1'=>'Seasonal','districtid IS NOT NULL'=>NULL,
            'Level6 IS NOT NULL'=>NULL,'Level0 IS NOT NULL'=>NULL,'Level7 IS NOT NULL'=>NULL);

             $this->db->where($array);

             $numbers = $this->db->get()->result();
            
        
        

        foreach($numbers as $number){

            //get one instance of each number returned

            $unique[$number->Msisdn] = $number;
            
        }
        
        
        foreach($unique as $uni){
            
                $this->db->select('COUNT(*) as total');

                $this->db->from('ussdtransaction');

                $array = array('regionid'=>$region,'subregionid'=>$sub_region,'Level1'=>'Seasonal   ','Msisdn'=>$uni->Msisdn);

                $this->db->where($array);

                $num =$this->db->count_all_results();
               

                    if($num >= 2){
                        
                        $message = "There is new seasonal forecast, for more information please dial *255*85#";

                       $count = $this->smsapi($uni->Msisdn,$message);
                    }
                    
            
           
        }
       
        return $count;
       
    
       
    }

    //smsapi

    function smsapi($phoneNumber,$message){

        echo $phoneNumber." ".$message;

        $msg=str_replace("<br>","\n",$message);
        $messg=str_replace("?","\'",$msg);
        

		$resp = "";
		try{
                
        
        $textmessage = urlencode($messg);	
        
		$url = 'http://simplysms.com/getapi.php';
        $urlfinal = $url.'?'.'email'.'='.'rc4wids@yahoo.com'.'&'.'password'.'='.'VBsd9A2'.'&'.'sender'.'='.'8777'.'&'.'message'.'='.$textmessage.'&'.'recipients'.'='.$phoneNumber;
        //var_dump($urlfinal);
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $urlfinal);
		curl_setopt_array($ch,array(
		CURLOPT_RETURNTRANSFER =>1,   
		//CURLOPT_URL =>$urlfinal,
		CURLOPT_USERAGENT =>'Codular Sample cURL Request'));

		$resp = curl_exec($ch);

		curl_close($ch);
			
		}catch(Exception $e){}
		return $resp;
    }

}

/* End of file Season_model.php */