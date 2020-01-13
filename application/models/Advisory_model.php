<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Advisory_model extends CI_Model
{

    public $table = 'advisory';
    public $id = 'record_id';
    public $order = 'DESC';
    public $TS = 'TS';
    public $transaction_table = 'ussdtransaction';
    public $TS_trans = 'RecordDate';

    function __construct()
    {
        parent::__construct();
    }


    // New method to help with data display in the pdf
    function get_data_records() {
        $this->db->select('user_feedback.id, accuracy, division_name,applicability,timeliness,generalComment,city_name');
        $this->db->from('user_feedback');
        $this->db->join('city', 'user_feedback.city_id = city.id');
        $this->db->join('division', 'city.division_id = division.id');
        $query=$this->db->get();   
        return $query->result_array();
}
      function get_by_id_replaced($id)
    {
       $this->db->select('advisory.advice, advisory.message_summary, minor_sector.minor_name, season_months.abbreviation');
       $this->db->from('advisory');
       $this->db->join('minor_sector','advisory.sector = minor_sector.id');
       $this->db->join('seasonal_forecast','advisory.forecast_id = seasonal_forecast.id');
       $this->db->join('season_months','seasonal_forecast.season_id = season_months.id');
      // $this->db->join('ussdsubregions','advisory.subregionid = ussdsubregions.subregionid');
       $this->db->where('advisory.id',$id);
       return $this->db->get()->result();
}
// Retrieve water advice
function get_advice($division, $identifier){
    $this->db->select('message_summary, sub_region_name, division_name, region_name, minor_name as category, abbreviation');
    $this->db->from('advisory');
    $this->db->join('area_seasonal_forecast', 'advisory.forecast_id = area_seasonal_forecast.forecast_id');
    $this->db->join('region', 'area_seasonal_forecast.region_id = region.id');
    $this->db->join('sub_region','area_seasonal_forecast.subregion_id = sub_region.id');
    $this->db->join('division','area_seasonal_forecast.region_id = division.region_id');
    $this->db->join('minor_sector', 'advisory.sector = minor_sector.id');
    $this->db->join('seasonal_forecast', 'advisory.forecast_id = seasonal_forecast.id');
    $this->db->join('season_months', 'seasonal_forecast.season_id = season_months.id');
    $this->db->order_by('advisory.id','DESC');
    $this->db->limit(1, 0);
    $this->db->where('division.id', $division);
    $this->db->where('minor_sector.minor_name', $identifier);
    $qy = $this->db->get();
    return $qy->result_array();
}
function get_health_advice($division, $identifier){
    $this->db->select('message_summary, sub_region_name, division_name, region_name, minor_name as category, abbreviation');
    $this->db->from('advisory');
    $this->db->join('area_seasonal_forecast', 'advisory.forecast_id = area_seasonal_forecast.forecast_id');
    $this->db->join('region', 'area_seasonal_forecast.region_id = region.id');
    $this->db->join('sub_region','area_seasonal_forecast.subregion_id = sub_region.id');
    $this->db->join('division','area_seasonal_forecast.region_id = division.region_id');
    $this->db->join('minor_sector', 'advisory.sector = minor_sector.id');
    $this->db->join('seasonal_forecast', 'advisory.forecast_id = seasonal_forecast.id');
    $this->db->join('season_months', 'seasonal_forecast.season_id = season_months.id');
    $this->db->order_by('advisory.id','DESC');
    $this->db->limit(1, 0);
    $this->db->where('division.id', $division);
    $this->db->where('minor_sector.minor_name', $identifier);
    $qy = $this->db->get();
    return $qy->result_array();
}

//----------------------end of health and water adviory functions---------------------------


    // get all
    function get_all()
    {	
		    $this->db->select('minor_sector.minor_name, advisory.id,advisory.sector,advisory.forecast_id,advisory.advice,advisory.message_summary,seasonal_forecast.season_id,seasonal_forecast.year,season_months.abbreviation');
		$this->db->from('advisory');
		$this->db->join('seasonal_forecast','advisory.forecast_id=seasonal_forecast.id');
		$this->db->join('season_months','seasonal_forecast.season_id=season_months.id'); 
		$this->db->join('minor_sector','minor_sector.id=advisory.sector');  
		$this->db->order_by('advisory.TS', $this->order);	
		   
		$query=$this->db->get();   
       return $query->result_array();
      
    }
    //get all replaced
    function get_all_replaced()
    {
        $this->db->select('ward.id,ward.ward_name,district.district_name');
	$this->db->from('ward');
	$this->db->join('district','ward.district_id = district.id');
	return $this->db->get()->result();
	}
  // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
	  
	function get_all_where($data)
    {  /*
        var_dump($data);
        exit;
        $this->db->order_by($this->TS, $this->order);
        $this->db->where('advisory',array("message IS NOT NULL"=>NULL ))->row();
        return $this->db->get('advisory');  */

        if($data['lang']=='English'){
            $this->db->order_by($this->TS, $this->order);
            $this->db->select('advisory.record_id,advisory.region,advisory.subregionid,advisory.type,advisory.advice,
                                        advisory.message,advisory.audio');
            $this->db->from('advisory');
           $array=array('region' => $data['region'], 'subregionid' => $data['subregion'],
           'type' => $data['tip'],'advice' => $data['category2'],'message IS NOT NULL'=>NULL);
           $this->db->where($array);
            return $this->db->get()->row();
        }else{
            $this->db->order_by($this->TS, $this->order);
            $this->db->select('advisory.record_id,advisory.region,advisory.subregionid,advisory.type,
                        advisory.advice,advisory.messageLuganda,advisory.audio');
            $this->db->from('advisory');
                $array=array('region' => $data['region'], 'subregionid' => $data['subregion'],
                'type' => $data['tip'],'advice' => $data['category2'],'messageLuganda IS NOT NULL'=>NULL);
            $this->db->where($array);       
            return $this->db->get()->row();            
        }
    }
 // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id', $q);
	$this->db->or_like('ward_name', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
	$this->db->or_like('ward_name', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data=array())
    {
	      $this->db->insert('advisory',$data); 
    }

     // update data
     function update($id, $data)
     {           
         $sql = "UPDATE $this->table SET message = ?, audio = ?  WHERE record_id = $id";
         return $this->db->query($sql, $data);
         
     }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

   //get farmers to send message
    function getfarmers($region,$sub_region,$advisory){

        $numbers = "";
        $unique = array();
        $count = "";
        

       // if($advisory == 5 || $advisory == 6 || $advisory == 7 || $advisory == 8 || $advisory == 9 || $advisory == 10){
 
            $this->db->select('ussdtransaction.Msisdn,ussdtransaction.Level1');

            $this->db->from('ussdtransaction');

            $array = array('regionid'=>$region,'subregionid'=>$sub_region,'Level1'=>$advisory,'districtid IS NOT NULL'=>NULL,
            'Level6 IS NOT NULL'=>NULL,'Level0 IS NOT NULL'=>NULL,'Level7 IS NOT NULL'=>NULL);

             $this->db->where($array);

             $numbers = $this->db->get()->result();
             
            

      
                
        

        foreach($numbers as $number){

            //get one instance of each number returned
            echo $number;

            $unique[$number->Msisdn] = $number;

        //    $this->sendsms($number->Msisdn,$advisory,$region,$sub_region);
        //     echo $number->Msisdn;

            
        }
        
        
        foreach($unique as $uni){
            // echo $uni->Msisdn;
            //if its not disaster then get eligible farmers to whom to send the message.
            if($advisory != 1){
               
                $this->db->select('COUNT(*) as total');

                $this->db->from('ussdtransaction');

                $array = array('regionid'=>$region,'subregionid'=>$sub_region,'Level1'=>$advisory,'Msisdn'=>$uni->Msisdn);

                $this->db->where($array);

                $num =$this->db->count_all_results();

                    if($num >= 0){
                        echo $uni->Msisdn;

                       $count = $this->sendsms($uni->Msisdn,$advisory,$region,$sub_region);
                    }
            }
            
            $count = $this->sendsms($uni->Msisdn,$advisory,$region,$sub_region);
            //echo $count."mmess";

            return $count;
           
        }
    
       
    }

    //send sms function

    function sendsms($phoneNumber,$advisory,$region,$sub_region){

        $message="";
        //if its disaster then send the entire message that has been uploaded

        if($advisory == 1){

            $this->db->order_by($this->TS, $this->order);

            $this->db->select('advisory.message');

            $this->db->from('advisory');

            $array = array('region'=>$region,'subregionid'=>$sub_region,'advice'=>$advisory);

            $this->db->where($array);

            $gt = $this->db->get()->row();
               
             $message =  $gt->message;         
            
        }

        else {

            //Just speciy the category available
            
            $this->db->select('advice.advice_name,advice.advice_des');

            $this->db->from('advice');

            $this->db->where('advice.id_advice', $advisory);

            $gt = $this->db->get()->result();
            
                        
                        foreach($gt as $g){

                        $message = "There is new ".$g->advice_des.", ".$g->advice_name.", for more information please dial *255*85#";
                    }        
        }
       
       //return $message;
       return $this->smsapi($phoneNumber,$message);
       

    

        
    }

    //smsapi

    function smsapi($phoneNumber,$message){

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

/* End of file Ward_model.php */