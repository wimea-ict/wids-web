<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Decadal_forecast_model extends CI_Model
{

    public $table = 'decadal_forecast';
    public $table1 = 'dekadal_advisory';
    public $id = 'id';
    public $order = 'DESC';
  public $issuetime = 'issuedate';

    function __construct()
    {
        parent::__construct();
    }
    
      function get_it_by_id_replaced($id)
    {
       $this->db->select('dekadal_advisory.advice, dekadal_advisory.message_summary, minor_sector.minor_name');
        $this->db->from('dekadal_advisory');
        $this->db->join('minor_sector','dekadal_advisory.sector = minor_sector.id');
       $this->db->join('daily_forecast','dekadal_advisory.forecast_id = daily_forecast.id');
      // $this->db->join('ussdsubregions','advisory.subregionid = ussdsubregions.subregionid');
        $this->db->where('dekadal_advisory.id',$id);
        return $this->db->get()->result();
    }
    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
      //  echo $this->db->get($this->table)->result(); exit();
        return $this->db->get($this->table)->result();
    }
  // get data by id
    function get_by_id($id)
    {  
        //$this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

     function get_data_by_id($id)
    {  
        $this->db->select('*');
        $this->db->from('decadal_forecast');
        $this->db->where('id', $id);
       
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
  
  
  function get_recent_forecast($region_id){
     $this->db->select('decadal_forecast.date_from,decadal_forecast.date_to, decadal_forecast.issuetime,region.region_name');
    $this->db->from('decadal_forecast');
    $this->db->join('region','decadal_forecast.regionid = region.id');
    $this->db->order_by($this->id, $this->order);
    $this->db->limit("1");  
  return $this->db->get()->result();  
    
  }
       public  function get_all_advisory()
    { 
        $this->db->select('minor_sector.minor_name, dekadal_advisory.id,dekadal_advisory.sector,dekadal_advisory.forecast_id,dekadal_advisory.advice,dekadal_advisory.message_summary,');
        $this->db->from('dekadal_advisory');
        $this->db->join('minor_sector','minor_sector.id=dekadal_advisory.sector');  
        $this->db->order_by('dekadal_advisory.TS', $this->order); 
           
        $query=$this->db->get();   
       return $query->result_array();
      
    }
///////////////////////////////////////////////////////
     function logfeedback($data=array())
    {
        $this->db->insert('user_feedback',$data);
        return 1;
    }
    ///////////////////////////////////////////////////////

    function insert_advisory($data=array())
    {
        $this->db->insert('dekadal_advisory',$data); 
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

    // insert data
    function insert($data=array())
    {            
       $this->db->insert('decadal_forecast',$data);  
    } 
  
    function insertDekadalForecastArea($data=array())
    {  
        $this->db->insert('area_decadal_forecast',$data);
    }
    //SELECT area_decadal_forecast.mapurl,area_decadal_forecast.general_info,region.region_name, sub_region.sub_region_name,decadal_forecast.date_from,decadal_forecast.date_to,decadal_forecast.issuedate,decadal_forecast.volume,decadal_forecast.general_info,decadal_forecast.max_temp, decadal_forecast.min_temp, decadal_forecast.mean_temp,decadal_forecast.issue,decadal_forecast.rainfall FROM area_decadal_forecast INNER JOIN region ON area_decadal_forecast.region_id = region.id INNER JOIN sub_region ON area_decadal_forecast.subregion_id = sub_region.id 
    //INNER JOIN decadal_forecast ON area_decadal_forecast.dekadal_id = decadal_forecast.id
  //get the details if teh dekadal area forecast 
  function get_dekadal_forecast_area($id=NULL){
    $this->db->select('area_decadal_forecast.id, area_decadal_forecast.region_id, area_decadal_forecast.subregion_id, area_decadal_forecast.dekadal_id, area_decadal_forecast.mapurl,area_decadal_forecast.general_info,decadal_forecast.id, decadal_forecast.date_from, decadal_forecast.date_to, decadal_forecast.issuedate, decadal_forecast.volume, decadal_forecast.issue,decadal_forecast.general_info,decadal_forecast.max_temp,decadal_forecast.min_temp,decadal_forecast.mean_temp, decadal_forecast.rainfall,sub_region.sub_region_name,region.region_name');
      $this->db->from('area_decadal_forecast');
    $this->db->join('decadal_forecast','decadal_forecast.id=area_decadal_forecast.dekadal_id','inner'); 
      $this->db->join('region','region.id=area_decadal_forecast.region_id','inner'); 
    $this->db->join('sub_region','sub_region.id=area_decadal_forecast.subregion_id','inner'); 
     if(isset($id)){
     $this->db->where('area_decadal_forecast.region_id',$id);  
  }
     $query=$this->db->get();   
     return $query->result_array(); 
    }
    
    function get_dekadal_forecast_division($id=NULL){
        $this->db->select('division.division_name, division.division_type,region.region_name, area_decadal_forecast.id, area_decadal_forecast.region_id, area_decadal_forecast.subregion_id, area_decadal_forecast.dekadal_id, area_decadal_forecast.mapurl,area_decadal_forecast.general_info,decadal_forecast.id, decadal_forecast.date_from, decadal_forecast.date_to, decadal_forecast.issuedate, decadal_forecast.volume, decadal_forecast.issue,decadal_forecast.general_info,decadal_forecast.max_temp,decadal_forecast.min_temp,decadal_forecast.mean_temp, decadal_forecast.rainfall,sub_region.sub_region_name,region.region_name');
        $this->db->from('division');
        $this->db->join('region','division.region_id = region.id');
        $this->db->join('area_decadal_forecast','area_decadal_forecast.region_id =  division.region_id');
        $this->db->join('sub_region','area_decadal_forecast.subregion_id = sub_region.id');
        $this->db->join('decadal_forecast','area_decadal_forecast.dekadal_id = decadal_forecast.id');
         $this->db->where('division.id',$id);
       $query=$this->db->get();   
       return $query->result_array(); 
      }
     
      function update_by_id($id, $data =array())
     {   
        $this->db->where('id', $id);
         $this->db->set($data);
        $this->db->update('decadal_forecast');
        
     }
     // update data
     function update($id, $data)
     {    
         $data1=array(
             'advisory' => $data['advisory'],
             'date_from' => $data['date_from'],
             'date_to' => $data['date_to'],
             'file2' => $data['file2']
 
         );
         
 
          $lang=$data['lang'];
          if($lang='Luganda')
          $sql = "UPDATE $this->table SET advisoryLuganda = ?, date_from = ?, date_to = ?, audio = ?  WHERE id = $id";
          else
          $sql = "UPDATE $this->table SET advisory = ?, date_from = ?, date_to = ?, audio = ?  WHERE id = $id";
         return $this->db->query($sql, $data1);
     }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }
    function delete_ad($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table1);
    }

    //get farmers to send message
    function getfarmers($region,$sub_region,$dek,$date_from,$date_to){

        $numbers = "";
        $unique = array();
        $count = "";
    
            $this->db->select('ussdtransaction.Msisdn,ussdtransaction.districtid');
            $this->db->from('ussdtransaction');
            $array = array('regionid'=>$region,'subregionid'=>$sub_region,'Level1'=>'Dekadal','districtid IS NOT NULL'=>NULL,
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

                $array = array('regionid'=>$region,'subregionid'=>$sub_region,'Level1'=>'Dekadal','Msisdn'=>$uni->Msisdn);

                $this->db->where($array);

                $num =$this->db->count_all_results();
               

                    if($num >= 2){
                        
                        $message = "There is new Dekadal forecast, for more information please dial *255*85#";

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

/* End of file Decadal_forecast_model.php */