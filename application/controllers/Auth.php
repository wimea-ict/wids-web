<?php
 
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

 public function __construct() {
    
     parent::__construct();
     $this->lang->load('message', $this->config->item('language'));  
     $this->config->set_item('theme',$this->config->item('country'));
	 $this->load->library('session');
	$this->config->item($this->session->userdata('language'));
     
	 
   if(!empty($this->config->item('country'))){
    // echo $this->config->item('country')." is the country"; exit; 
     $this->load->database();
     $this->load->model('Advisory_model');
     $this->load->model('Season_model');
     $this->load->model('Decadal_forecast_model');
     $this->load->model('Daily_forecast_model');
      $this->load->model('Coastline_forecast_model');
	 $this->load->model('Language_model');
	 $this->load->model('Division_model');//Forecast_time_model
	 $this->load->model('Forecast_time_model');
	  $this->load->model('City_model');
     $this->load->model('Landing_model');
	 $this->load->model('Major_model');
	 $this->load->model('Minor_model');
     $this->load->library(array('ion_auth', 'form_validation'));
     $this->load->helper(array('url', 'language'));//Major_model

     $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
        
      $this->lang->load('auth');
     }

    }

    // redirect if needed, otherwise display the user list
	 public function index($page = 'request_service') { 
	 			$data['language'] = $this->lang->line('msg_language');
				$data['request'] = $this->lang->line('msg_request');
				$data['english'] = $this->lang->line('msg_english'); 
				$data['luganda'] = $this->lang->line('msg_luganda');     
				$data['Agriculture_Food_security'] = $this->lang->line('msg_Agriculture_&_Food_security');
				$data['select_your_ditrict'] = $this->lang->line('msg_select_your_ditrict');
				$data['select_ditrict'] = $this->lang->line('msg_select_ditrict');
				$data['ditrict'] = $this->lang->line('msg_ditrict');
				$data['select_subCategory'] = $this->lang->line('msg_select_subCategory');
				$data['select_Category'] = $this->lang->line('msg_select_Category');
				$data['Planting_Advice'] = $this->lang->line('msg_Planting_Advice');
				$data['weather_forecast'] = $this->lang->line('msg_weather_forecast');
				$data['request_service_form'] = $this->lang->line('msg_request_service_form');
				$data['pest_disease'] = $this->lang->line('msg_pest_disease');
				$data['disaster_advice'] = $this->lang->line('msg_disaster_advice');
				$data['select_disaster_advice'] = $this->lang->line('msg_select_disaster_advice');
				$data['forecast_advice'] = $this->lang->line('msg_forecast_advice');
				$data['suggest_forecast_basing'] = $this->lang->line('msg_suggest_forecast_basing');
				$data['harvesting_advice'] = $this->lang->line('msg_harvesting_advice');
				$data['suggest_forecast'] = $this->lang->line('msg_suggest_forecast');
				$data['select_period'] = $this->lang->line('msg_select_period');
				$data['water_advice'] = $this->lang->line('msg_water_advice');
				$data['water_advisory'] = $this->lang->line('msg_water_advisory');
				$data['health_advisory'] = $this->lang->line('msg_health_advisory');
				$data['health_advice'] = $this->lang->line('msg_health_advice');
				$data['welcome_wid'] = $this->lang->line('msg_welcome_wid'); 
				$data['disaster_preparedness'] = $this->lang->line('msg_disaster_preparedness');
				$data['select_option'] = $this->lang->line('msg_select_option');
				$data['today'] = $this->lang->line('msg_today');
				$data['seasonal'] = $this->lang->line('msg_seasonal');
				$data['dekadal'] = $this->lang->line('msg_dekadal');
				$data['wind_strength'] = $this->lang->line('msg_wind_strength');
				$data['wind_direction'] = $this->lang->line('msg_wind_direction');
				$data['climatic_zone'] = $this->lang->line('msg_climatic_zone');
				$data['category'] = $this->lang->line('msg_category');
				$data['messages'] = $this->lang->line('msg_messages');
				$data['advisory_read'] = $this->lang->line('msg_advisory_read');
				$data['sub_zone'] = $this->lang->line('msg_sub_zone');
				$data['food_advisory'] = $this->lang->line('msg_food_advisory');
				$data['create_new_user'] = $this->lang->line('msg_create_new_user');
				$data['first_names'] = $this->lang->line('msg_first_names');
				$data['last_names'] = $this->lang->line('msg_last_names');
				$data['phone_numbers'] = $this->lang->line('msg_phone_numbers');
				$data['choose_username'] = $this->lang->line('msg_choose_username');
				$data['disaster_advisory'] = $this->lang->line('msg_disaster_advisory');
				$data['agriculture_advisory'] = $this->lang->line('msg_agriculture_advisory');
 						
 
	    $country = $this->config->item('country');		
    	if(empty($country)){
      
			$step= $this->input->post('step'); 
			
			if(!isset($step))
	        	$this->load->view('installer/index',$data);// has hidden variable step 1
			else if($step==1){
					
			$newdata = array('systemusername'  => $this->input->post('systemusername'),
					 'systempassword'     => $this->input->post('systempassword'),
					 'database_name' =>$this->input->post('database_name'),
					 'database_username' =>$this->input->post('database_username'),
					 'database_password' =>$this->input->post('database_password'),
					 'system_email' =>$this->input->post('system_email'),
					 'country' =>$this->input->post('country')
				   );
				$this->session->set_userdata($newdata);
		  
			//set up connection to the db	
	      //  echo $this->session->userdata('database_name')." in the session ";
			$content = file_get_contents(APPPATH .'config/database.php');
			
			$file_content = str_replace("'username' => ''","'username' => '".$this->session->userdata('database_username')."'",$content);
			//insert the content back
			$write_result = file_put_contents(APPPATH .'config/database.php',$file_content);
			
			
			$content = file_get_contents(APPPATH .'config/database.php');
			$file_content = str_replace("'password' => ''","'password' => '".$this->session->userdata('database_password')."'",$content);
			//insert the content back
			$write_result = file_put_contents(APPPATH .'config/database.php',$file_content);
			
			$content = file_get_contents(APPPATH .'config/database.php');
			$file_content = str_replace("'database' => ''","'database' => '".$this->session->userdata('database_name')."'",$content);
		    //insert the content back
			$write_result = file_put_contents(APPPATH .'config/database.php',$file_content);	

		   
		    //cresate the database 
		    $link = mysqli_connect('localhost', $this->session->userdata('database_username'), $this->session->userdata('database_password'));
			 if (!$link) {
       			 die('Could not connect: ' . mysql_error());
  		  }
	///	  echo $this->session->userdata('database_name')." is the database";
			$db =  mysqli_query($link ,"create database IF NOT EXISTS ".$this->input->post('database_name'));//$this->session->userdata('database_name')
			if(!$db){
			  echo mysqli_error($link); echo "create database IF NOT EXISTS ".$this->session->userdata('database_name');   exit();	
			}			
		   mysqli_select_db($link, $this->session->userdata('database_name'));///select the database
		   $this->create_tables($link,$this->session->userdata('systemusername'), $this->session->userdata('systempassword'), $this->session->userdata('system_email'),$this->session->userdata('country'));  
		   		   		
		  //open the libraries so that they can load database connection
			//$library_loader = file_get_contents(BASEPATH .'/core/Loader.php');
			//$new_content = str_replace("/* database"," ",$library_loader);
		    //insert the content back
			//$write_new_content = file_put_contents(BASEPATH .'/core/Loader.php',$new_content);
			
			//remove the closing comment
			//$library_loader = file_get_contents(BASEPATH .'/core/Loader.php');
			//$closing = str_replace("database */"," ",$library_loader);
		    //insert the content back
			//$write_new_content = file_put_contents(BASEPATH .'/core/Loader.php',$closing);
		    
		    $country = $this->session->userdata('country');			
			$write_result = file_put_contents(APPPATH .'config/config.php', "$"."config['country'] = '".$country."';",FILE_APPEND);
			$this->session->unset_userdata($newdata);
			//refresh so that the person is led to the actual system
     	
		   $this->load->helper('url');
		   redirect(base_url('/index.php/auth/index'));        
							
		   }
         }else { //loading the main content from here 
		 
		   $langg = $this->input->post('language', TRUE);
		 ///  echo $langg." thsisis"; 
		   if(!empty($langg)){
			   //session
			   $this->session->set_userdata($langg);
			   $this->load->helper('url');
		       redirect(base_url('/index.php/auth/index')); 
			}else {	 
		 
		    //if user has selected to view any product there will be some post variables				 
           $data['division_type']= $this->Division_model->getdivisionname($country);    
		  //get all major cities 
		  $cities = $this->City_model->get_major_cities();
		  $foreacast_time = $this->Forecast_time_model->get_all();
		  $data['major_sector'] = $this->Major_model->get_all();
		  $data['minor_sector'] = $this->Minor_model->get_all();
		  $data['languages'] = $this->Language_model->get_all();
		  $data['division_type']= $this->Division_model->getdivisionname($country);
		  //get data for all the recenty entered city data 
		  if(isset($cities)){
			  foreach($cities as $c){
				if(isset($foreacast_time)){
					foreach($foreacast_time as $ft){
		  				$data['forecast_data'][$c['region_id']][$ft->id] = $this->Daily_forecast_model->get_forecast_data_for_city($c['region_id'], $ft->id);				
						$counter++;	
					}
				}
			  }
			
		  }
		      
         //===============select the category and product=======================
         $data['category1'] = $this->input->post('product');
         $id = $this->input->post('division');
         $data['country_name'] = $country;
         $division_text = $this->Division_model->get_divisionName_data($id);
         $data['division_text']= $division_text;
         $random = rand(1, 3);
         //-----------------SEASONAL DATA--------------------
         //////////////////////////new  product//////////////////////
          $data['coastline_forecast'] = $this->Coastline_forecast_model->get_all();
         //advice query
	     $data['seasonal_advice_home'] = $this->Season_model->get_advice($random);
         $season_home = $this->Season_model->get_current_season(); 
         $data['divide'] = $season_home;

          $data['seasonal_data_home'] = $this->Season_model->get_season_data($season_home, $random);
          $data['dekadal_forecast_data']= $this->Decadal_forecast_model->get_dekadal_forecast_area($random);
          $data['divisio_name'] = $this->Season_model->get_current_division($random); 


         //---------------------------------------------------
       //-=------------------HOME PAGE DAILY FORECASTS-------------------
		$data['daily_advice_home'] = $this->Daily_forecast_model->get_advice($random);
                 $daily_forecast_data_home = $this->Daily_forecast_model->get_recent_forecast();
			 	// retrieves forecast for the next day
			 	$next_day_forecast_data_home = $this->Daily_forecast_model->get_next_day_forecast($random);
			 	$data['next_day_forecast_data_home']=$next_day_forecast_data_home;
			 	if(isset($next_day_forecast_data_home)){ 
					foreach($next_day_forecast_data_home as $d){	
                        $tomorrow = $d->date;	
                        $tmr_forecast = $d->id;
                        $weather_desc = $d->weather;
                        $valid = $d->validitytime;	
                        $issuedat = $d->issuedate;		

					}
                }

                $data['daily_forecast_data_home']= $daily_forecast_data_home;
				if(isset($daily_forecast_data_home)){ 
                    
					foreach($daily_forecast_data_home as $d){
						$forecast_id = $d->id;
                        $forecast_time = $d->time;
                        $today = $d->date;	
                    }
                }	
                // passing data to the view
                $data['today'] = $today;
                $data['tomorrow'] = $tomorrow;
                $data['weather_desc'] =  $weather_desc;
                $data['valid'] = $valid;
                $data['issuedat'] = $issuedat;


                $get_next_day_forecast_data_for_region_home= $this->Daily_forecast_model->get_next_day_forecast_data_for_region($tmr_forecast,$random);
                $data['get_next_day_forecast_data_for_region_home'] =$get_next_day_forecast_data_for_region_home;		
                // passing data to the view
				$data['daily_forecast_data_home']= $daily_forecast_data_home;
				if(isset($daily_forecast_data_home)){ 
					foreach($daily_forecast_data_home as $d){
						$forecast_id = $d->id;
                        $forecast_time = $d->time;									
					}
                }

                // $data['daily_forecast_region_data_home'] = $this->Daily_forecast_model->get_daily_forecast_data_for_region($forecast_id,12);
                
                $data['daily_forecast_region_data'] =$this->Daily_forecast_model->get_daily_forecast_data_for_region($forecast_id,$random);
                $data['daily_forcast_division'] =$this->Daily_forecast_model->get_daily_forecast_data_for_region_division($random);
               //division name for currently accessed daily forecast
               $division_name = $this->Division_model->get_divisionNameByID(1);
               $data['division_name'] =$division_name;
               $data['div_id']= $random;
       //==================end============================================
		        $area1 = $this->Season_model->get_all_forecast_area();
		        $data['area']= $area1;
        //============================================    

		         //capturing region===========================
		         $ve = $this->input->post('product');
		         $division_id = $this->input->post('division');
				// echo $ve; exit();
		    //-------check for requested category---------------
		   if(isset($ve)){
             //===============DAILY REQUEST DATA=================================================
			  if($ve=="Daily Forecast"){
 			$data['daily_advice'] = $this->Daily_forecast_model->get_advice($division_id);
  			$data['seasonal_advice'] = $this->Daily_forecast_model->get_advice($division_id);
                                                            $daily_forecast_data = $this->Daily_forecast_model->get_recent_forecast();
			 	// retrieves forecast for the next day
			 	$next_day_forecast_data = $this->Daily_forecast_model->get_next_day_forecast($division_id);
			 	$data['next_day_forecast_data']=$next_day_forecast_data;
			 	if(isset($next_day_forecast_data)){ 
					foreach($next_day_forecast_data as $d){	
                        $tomorrow = $d->date;	
                        $tmr_forecast = $d->id;
                        $weather_desc = $d->weather;
                        $valid = $d->validitytime;	
                        $issuedat = $d->issuedate;		

					}
                }
                $data['daily_forecast_data']= $daily_forecast_data;
				if(isset($daily_forecast_data)){ 
	  
					foreach($daily_forecast_data as $d){
						$forecast_id = $d->id;
                        $forecast_time = $d->time;	
                        $today = $d->date;	
                    }
                }	
                // passing data to the view
                $data['today'] = $today;
                $data['tomorrow'] = $tomorrow;
                $data['weather_desc'] =  $weather_desc;
                $data['valid'] = $valid;
                $data['issuedat'] = $issuedat;
                $get_next_day_forecast_data_for_region= $this->Daily_forecast_model->get_next_day_forecast_data_for_region($tmr_forecast,$division_id);
                $data['get_next_day_forecast_data_for_region'] =$get_next_day_forecast_data_for_region;	
                // passing data to the view
				$data['daily_forecast_data']= $daily_forecast_data;
				if(isset($daily_forecast_data)){ 
					foreach($daily_forecast_data as $d){
						$forecast_id = $d->id;
                        $forecast_time = $d->time;									
					}
                }
                $daily_forecast_region_data= $this->Daily_forecast_model->get_daily_forecast_data_for_region($forecast_id,$division_id);
                $data['daily_forecast_region_data'] =$daily_forecast_region_data;

               //division name for currently accessed daily forecast
               $division_name = $this->Division_model->get_divisionNameByID($division_id);
               $data['division_name'] =$division_name;
               $data['div_id']= $division_id;
               //Retrieve daily forecast for specific/ random region
               $daily_forecast_region_data_dynamic = $this->Daily_forecast_model->get_daily_forecast_data_for_region($forecast_id,$random);
               $data['daily_forecast_region_data_dynamic'] = $daily_forecast_region_data_dynamic;
              
             }
            
        //====================DEKADAL DATA================================================
			 if($ve=="Dekadal Forecast"){
             
			 $dekadal_forecast_data =  $this->Decadal_forecast_model->get_dekadal_forecast_division($division_id);
             $data['dekadal_forecast_data'] = $dekadal_forecast_data;
             $data['div_id']= $division_id;
            }
			 //===================SEASONAL DATA================================================
			 if($ve=="Seasonal Forecast"){
			 	//advice query
				 $data['seasonal_advice'] = $this->Season_model->get_advice($division_id);
                $season = $this->Season_model->get_current_season(); 
                $data['divide'] = $season;
                 $data['seasonal_data'] = $this->Season_model->get_season_data($season, $division_id);


                $data['divisio_name'] = $this->Season_model->get_current_division($division_id);
                $data['div_id']= $division_id;
                }
         }	 
    //---------------------------------ADVISORY REQUEST DATA------------------------------------
			
//             if($ve== 8){
//                 // Same here
//                 $identifier = 'Health';
//                 $data['get_advice'] = $this->Advisory_model->get_advice($division_id, $identifier);
//             }
// //--------------------------------------------------------------------------------
		  
		 $data['major_cities'] = $cities;
		 $data['counter'] = sizeof($cities);
		 $this->load->view($page, $data);
		
        } //closing else, which loads the site 
        
	  }
    }
   
	//=========================for creating tables===========================================
	 public function create_tables($link,$u,$p,$email,$country){
	   $q = array();

	   	array_push($q,"CREATE TABLE `advice` (
		  `id_advice` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
		  `advice_name` varchar(100) NOT NULL,
		  `advice_des` varchar(100) NOT NULL
		) ENGINE=InnoDB DEFAULT CHARSET=latin1;");

	array_push($q,"CREATE TABLE `advisory` (
			  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
			  `sector` int(5) NOT NULL,
			  `forecast_id` int(11) NOT NULL,
			  `advice` text NOT NULL,
			  `message_summary` text,
			  `TS` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
			) ENGINE=InnoDB DEFAULT CHARSET=latin1;
			");

  $enc_password = md5($p);
	array_push($q,"CREATE TABLE `alerts` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `description` text,
  `issuetime` timestamp NULL DEFAULT NULL,
  `region_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;");

	array_push($q,"CREATE TABLE `area_decadal_forecast` (
   `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `region_id` int(10) NOT NULL,
  `subregion_id` int(10) NOT NULL,
  `dekadal_id` bigint(16) NOT NULL,
  `mapurl` varchar(100) NOT NULL,
  `general_info` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;");


	array_push($q,"CREATE TABLE `seasonal_forecast` (
 `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `overview` text,
  `year` int(4) NOT NULL,
  `general_forecast` text NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `issuetime` date NOT NULL,
  `season_id` int(11) NOT NULL,
  `map` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
		");
		
	array_push($q,"CREATE TABLE `area_seasonal_forecast` (
 `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `forecast_id` int(10) NOT NULL,
  `region_id` int(4) NOT NULL,
  `subregion_id` int(4) NOT NULL,
  `expected_peak` varchar(25) NOT NULL,
  `peakdesc` varchar(32) NOT NULL,
  `onset_period` varchar(35) NOT NULL,
  `onsetdesc` varchar(23) NOT NULL,
  `end_period` varchar(23) NOT NULL,
  `enddesc` varchar(23) NOT NULL,
  `overall_comment` text NOT NULL,
  `general_info` text,
  `language_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;");
	
			

		array_push($q,"CREATE TABLE `season_months` (
		  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
		  `season_name` varchar(80) NOT NULL,
		  `month_from` varchar(80) NOT NULL,
		  `month_to` varchar(80) NOT NULL,
		  `abbreviation` varchar(80) NOT NULL,
		  `time_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
		) ENGINE=InnoDB DEFAULT CHARSET=latin1;");
		
	array_push($q,"INSERT INTO `season_months` (`id`, `season_name`, `month_from`, `month_to`, `abbreviation`, `time_added`) VALUES
					(1, 'September to December', 'SEPT', 'DEC', 'SOND', '2019-09-09 14:44:58'),
					(2, 'March to May', 'March', 'May', 'MAM', '2019-09-09 14:47:27'),
					(3, 'June to July', 'June', 'July', 'JJA', '2019-09-12 02:16:08'),
					(4, 'January to Feb', 'January', 'Feb', 'JF', '2019-09-14 07:37:46');
					");	
		
   	array_push($q,"CREATE TABLE `region` (
		  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
		  `region_name` varchar(45) NOT NULL
		) ENGINE=InnoDB DEFAULT CHARSET=latin1;");

  array_push($q,"INSERT INTO `region` (`id`, `region_name`) VALUES
		(1, 'Northern'),
		(2, 'Western'),
		(3, 'Eastern'),
		(4, 'Central'),
		(5, 'Southern');");

		
	array_push($q,"CREATE TABLE `sub_region` (
		  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
		  `sub_region_name` varchar(80) NOT NULL,
		  `region_id` int(11) NOT NULL
		) ENGINE=InnoDB DEFAULT CHARSET=latin1;");
	//------------check country----------------------	
		if($country=="Nigeria"){
			 array_push($q,"
				INSERT INTO `sub_region` (`id`, `sub_region_name`,`region_id`) VALUES
				(1, 'North Central','1'),
				(2, 'North East','1'),
				(3, 'North West','1'),
				(4, 'South East','5'),
				(5, 'South South','5'),
				(6, 'South West','5');");			
			
		}else if($country=="Ghana"){
			 array_push($q,"
				INSERT INTO `sub_region` (`id`, `sub_region_name`,`region_id`) VALUES
				(1, 'North East','1'),
				(2, 'Western North','2'),
				(3, 'Upper West Region','1'),
				(4, 'Brong-Ahafo Region','5');");			
			
			
		}else if($country=="South Sudan"){
			 array_push($q,"
				INSERT INTO `sub_region` (`id`, `sub_region_name`,`region_id`) VALUES
				(1, 'Greater Upper Nile','1'),
				(2, 'Equatoria','5'),
				(3, 'Bahr El Ghazal','1');");				
			
		}else {
	       array_push($q,"
				INSERT INTO `sub_region` (`id`, `sub_region_name`,`region_id`) VALUES
				(1, 'Western Parts of Uganda','1'),
				(2, 'Eastern Parts of Central','4'),
				(3, 'Central and Western Lake Victoria','4'),
				(4, 'Eastern Lake Victoria Basin','4'),
				(5, 'South Western','2'),
				(6, 'Central Western','2'),
				(7, 'South Eastern','3'),
				(8, 'Eastern central','3'),
				(9, 'North Western','1');");						
			
	  }

	//---------------the end-----------------------------
		array_push($q,"CREATE TABLE `division` (
		  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
		  `division_name` varchar(45) NOT NULL,
		  `division_type` varchar(45) NOT NULL,
		  `region_id` int(8) NOT NULL,
		  `sub_region_id` int(11) DEFAULT NULL,
		  `main_region` int(11) DEFAULT NULL
		) ENGINE=InnoDB DEFAULT CHARSET=latin1;
		");

      if($country=="Nigeria"){
		
		array_push($q," INSERT INTO `division` (`id`, `division_name`,`division_type`,`region_id`) VALUES
				('1','Benue','State','1'),
				('2','Kogi','State','1'),
				('3','Nasarawa','State','1'),
				('4','Adamawa','State','2'),
				('5','Kaduna','State','3');");  
	  }else if($country=="Ghana"){
		  
		array_push($q," INSERT INTO `division` (`id`, `division_name`,`division_type`,`region_id`) VALUES
				('1','Aowin','District','2'),
				('2','Bia West','District','2'),
				('3','Bia East','District','2'),
				('4','Juabeso','District','2'),
				('5','Suaman','District','2'),
				('6','Yunyoo-Nasuan','District','1'),
				('7','West Mamprusi','District','2'),
				('8','Mamprugu Moagduri','District','2'),
				('9','East Mamprusi','District','2'),
				('10','Chereponi','District','2');");    
		  
		 }else if($country=="South Sudan"){
			array_push($q," INSERT INTO `division` (`id`, `division_name`,`division_type`,`region_id`) VALUES
				('1','Jonglei','States','1'),
				('2','Fangak','States','1'),
				('3','Bieh','States','1'),
				('4','Akobo','States','1'),
				('5','Maiwut','States','1'),
				('6','Central Upper Nile ','States','1'),
				('7','Jubek','States','2'),
				('8','Terekeka','States','2'),
				('9','Gbudwe ','States','2'),
				('10','Kapoeta ','States','2');	"); 
			 
			 
			}else {
				array_push($q,"    INSERT INTO `division` (`id`, `division_name`,`division_type`,`region_id`) VALUES
				('1','Kiboga','District','1'),
				('2','Mubende','District','1'),
				('3','Rakai','District','1'),
				('4','Kasanda','District','1'),
				('5','Nakasongola','District','1'),
				('6','Central Upper Nile ','District','1'),
				('7','Mukono','District','2'),
				('8','Buyikwe','District','2'),
				('9','Kayunga ','District','2'),
				('10','Buvuma ','District','2');	"); 
								
			}
			
	array_push($q,"CREATE TABLE IF NOT EXISTS `city` (
		  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
		  `city_name` varchar(45) NOT NULL,
		  `major_city` int(1) NOT NULL default 0,
		  `division_id` varchar(45) NOT NULL
		) ENGINE=InnoDB DEFAULT CHARSET=latin1;");
		
		if($country=='Nigeria'){
			 array_push($q,"INSERT INTO `city` (`id`, `city_name`,`division_id`,`major_city`) VALUES
				('1','Agatu','1','1'),
				('2','Obi','1','1'),
				('3','Ohimini','1','1'),
				('4','Igalamela-Odolu','2','1'),
				('5','Olamaboro','2','0')");
				
		}
		else if($country=="Ghana"){
			 array_push($q,"
				INSERT INTO `city` (`id`, `city_name`,`division_id`,`major_city`) VALUES
				('1','Sekondi-Takoradi','1','1'),
				('2','Tarkwa','1','1'),
				('3',' Wiawso','1','1'),
				('4','Sekondi-Takoradi','2','1'),
				('5',' Tarkwa','2','0'); ");
			
			
		}else if($country=="South Sudan"){
			array_push($q,"INSERT INTO `city` (`id`, `city_name`,`division_id`,`major_city`) VALUES
				('1','Duk Padiet','1','1'),
				('2','Twic Center','1','1'),
				('3',' Bor East ','1','1'),
				('4','Waat','3','1'); ");								
			
		}else{
			 array_push($q,"
				 INSERT INTO `city` (`id`, `city_name`,`division_id`,`major_city`) VALUES
				('1','Kiboga','1','1'),
				('2','Mubende','2','1'),
				('3','Rakai','3','1'),
				('4','Buvuma','10','1');");			
			}


		array_push($q,"CREATE TABLE `seasonal_terminology` (
		  `id` int(4) NOT NULL PRIMARY KEY AUTO_INCREMENT,
		  `terminology` varchar(34) NOT NULL,
		  `description` text NOT NULL
		) ENGINE=InnoDB DEFAULT CHARSET=latin1;");
		
		
     
     array_push($q,"CREATE TABLE `contacts` (
	  `contact_id` int(5) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	  `contact_group_id` int(5) NOT NULL DEFAULT '0',
	  `contact_name` varchar(250) DEFAULT NULL,
	  `contact_number` varchar(50) DEFAULT NULL,
	  `contact_email` varchar(50) DEFAULT NULL,
	  `contact_address` varchar(500) DEFAULT NULL,
	  `contact_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	  `contact_status` enum('0','1') NOT NULL DEFAULT '1'
	) ENGINE=InnoDB DEFAULT CHARSET=latin1;");


	array_push($q,"CREATE TABLE `weather_impacts` (
		  `ps` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
		  `weather_type` varchar(23) NOT NULL,
		  `impact` text NOT NULL,
		  `state` varchar(100) NOT NULL
		) ENGINE=InnoDB DEFAULT CHARSET=latin1;");


	array_push($q,"CREATE TABLE weather_category (
		  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
		  cat_name varchar(23) NOT NULL,
		  img varchar(100) NOT NULL,
		  widget varchar(100) NOT NULL
		) ENGINE=InnoDB DEFAULT CHARSET=latin1;");

	array_push($q,"INSERT INTO `weather_category` (`id`, `cat_name`, `img`, `widget`) VALUES
(1, 'heavy rain', 'img/rain.PNG', 'heavyrain'),
(2, 'light thunder showers', 'img/thunderstorm.PNG', 'thundershowers'),
(3, 'sunny intervals', 'img/sunny.PNG', 'partlysunny'),
(4, 'showers', 'img/showers.ico', 'rainy'),
(5, 'sunny', 'img/image1s0.jpg', 'sunny'),
(6, 'cloudy', 'img/img-thing.jpg', 'cloudy'),
(7, 'flood', 'img/floudimages.jpg', 'flood'),
(8, 'light rain', 'img/H.PNG', 'lightrain'),
(9, 'heavy thunder', 'img/lightthunder.ico', 'thunder'),
(10, 'isolated showers', 'img/isolated_showers.ico', 'lightrain'),
(11, 'isolated rain', 'img/showers.ico', 'lightrain'),
(12, 'light isolated showers', 'img/showers.ico', 'lightrain'),
(13, 'partly cloudy', 'img/partlyCloudy.png', 'partlysunny');");

	array_push($q,"CREATE TABLE IF NOT EXISTS `contacts` (
		  `contact_id` int(5) NOT NULL PRIMARY KEY AUTO_INCREMENT,
		  `contact_group_id` int(5) NOT NULL DEFAULT '0',
		  `contact_name` varchar(250) DEFAULT NULL,
		  `contact_number` varchar(50) DEFAULT NULL,
		  `contact_email` varchar(50) DEFAULT NULL,
		  `contact_address` varchar(500) DEFAULT NULL,
		  `contact_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
		  `contact_status` enum('0','1') NOT NULL DEFAULT '1'
		) ENGINE=InnoDB DEFAULT CHARSET=latin1;");

	array_push($q,"CREATE TABLE `daily_forecast` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
 `language_id` int(11) NOT NULL,
  `weather` text,
  `date` date DEFAULT NULL,
  `time` varchar(11) DEFAULT NULL,
  `issuedate` date NOT NULL,
  `validitytime` varchar(30) NOT NULL,
  `dutyforecaster` varchar(30) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;	");

	array_push($q,"CREATE TABLE `daily_forecast_data` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `mean_temp` double NOT NULL,
  `max_temp` double DEFAULT NULL,
  `min_temp` double DEFAULT NULL,
  `wind` int(11) DEFAULT NULL,
  `wind_direction` text NOT NULL,
  `wind_strength` text NOT NULL,
  `region_id` int(10) NOT NULL,
  `division_id` int(10) NOT NULL,
  `weather_cat_id` varchar(11) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `forecast_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
");


		array_push($q," CREATE TABLE `decadal_forecast` (
   `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `date_from` date NOT NULL,
  `date_to` date NOT NULL,
  `issuedate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `volume` int(9) NOT NULL,
  `general_info` text NOT NULL,
  `max_temp` int(11) NOT NULL,
  `min_temp` int(11) NOT NULL,
  `mean_temp` int(11) NOT NULL,
  `issue` varchar(30) NOT NULL,
  `rainfall` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;");

	array_push($q,"CREATE TABLE IF NOT EXISTS `feedback` (
		  `record_id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
		  `forecast_type` int(11) NOT NULL
		) ENGINE=InnoDB DEFAULT CHARSET=latin1;");
		
	array_push($q,"CREATE TABLE `forecast_time` (
			  `id` int(4) NOT NULL PRIMARY KEY AUTO_INCREMENT,
			  `period_name` varchar(20) NOT NULL,
			  `to_time` varchar(10) NOT NULL,
			  `from_time` varchar(10) NOT NULL,
			  `timeadded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
			) ENGINE=InnoDB DEFAULT CHARSET=latin1;");
		
		
	array_push($q,"INSERT INTO `forecast_time` (`id`, `period_name`, `to_time`, `from_time`, `timeadded`) VALUES
			(1, 'Early Morning', '12:00 am ', '6:00 am', '2019-09-08 09:22:57'),
			(2, 'Late Morning', '6:00 am', '12:00 pm', '2019-09-07 19:22:57'),
			(3, 'Late Evening', '6:00 pm', '12:00 pm', '2019-09-08 10:07:57');");
			
		
		
		array_push($q,"CREATE TABLE `impacts` (
			  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
			  `description` varchar(234) NOT NULL,
			  `date_added` timestamp NULL DEFAULT CURRENT_TIMESTAMP
			) ENGINE=InnoDB DEFAULT CHARSET=latin1;");


		array_push($q,"CREATE TABLE `language` (
		  `id` int(4) NOT NULL PRIMARY KEY AUTO_INCREMENT,
		  `name` varchar(30) NOT NULL
		) ENGINE=InnoDB DEFAULT CHARSET=latin1;");


		array_push($q,"
		INSERT INTO `language` (`id`, `name`) VALUES
		(1, 'English'),
		(2, 'Luganda');");


		array_push($q,"CREATE TABLE `major_sector` (
		  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
		  `language_id` int(11) NOT NULL,
		  `sector_name` varchar(45) NOT NULL
		) ENGINE=InnoDB DEFAULT CHARSET=latin1;
		");
		
		
		array_push($q,"INSERT INTO `major_sector` (`id`, `language_id`, `sector_name`) VALUES
			(1, 1, 'Agriculture and food security'),
			(2, 1, 'Health'),
			(3, 1, 'Construction '),
			(4, 1, 'Water'),
			(5, 1, 'weather'),
			(6, 1, 'Disaster Management ');");	
			
			
	array_push($q,"CREATE TABLE IF NOT EXISTS `seasonal_forecast` (
		  `id` bigint(10) NOT NULL,
		  `overview` text,
		  `year` int(4) NOT NULL,
		  `general_forecast` text NOT NULL,
		  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
		  `issuetime` date NOT NULL,
		  `season_id` int(11) NOT NULL,
		  `map` varchar(24) NOT NULL
		) ENGINE=InnoDB DEFAULT CHARSET=latin1;");

  array_push($q,"CREATE TABLE IF NOT EXISTS `weather_impacts` (
	  `ps` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	  `weather_type` varchar(23) NOT NULL,
	  `impact` text NOT NULL,
	  `state` varchar(100) NOT NULL
	) ENGINE=InnoDB DEFAULT CHARSET=latin1;");

   array_push($q,"CREATE TABLE `season` (
	  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	  `season_name` varchar(45) NOT NULL,
	  `month_from` varchar(45) NOT NULL,
	  `month_to` varchar(45) NOT NULL
	) ENGINE=InnoDB DEFAULT CHARSET=latin1;");
	
	 array_push($q,"INSERT INTO `season` (`id`, `season_name`, `month_from`, `month_to`) VALUES
		(1, 'MAM', 'March', 'May');");
	
	
	  array_push($q,"CREATE TABLE `user_feedback` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `city_id` int(10) NOT NULL,
  `sector` text NOT NULL,
  `accuracy` int(2) NOT NULL,
  `applicability` int(2) NOT NULL,
  `timeliness` int(2) NOT NULL,
  `generalComment` text NOT NULL,
  `contact` text NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;");

   array_push($q,"CREATE TABLE `users` (
		  `id` int(11) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
		  `ip_address` varchar(15) DEFAULT NULL,
		  `username` varchar(100) DEFAULT NULL,
		  `password` varchar(255) NOT NULL,
		  `salt` varchar(255) DEFAULT NULL,
		  `email` varchar(100) NOT NULL,
		  `activation_code` varchar(40) DEFAULT NULL,
		  `forgotten_password_code` varchar(40) DEFAULT NULL,
		  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
		  `remember_code` varchar(40) DEFAULT NULL,
		  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
		  `last_login` int(11) UNSIGNED DEFAULT NULL,
		  `active` tinyint(1) UNSIGNED DEFAULT NULL,
		  `first_name` varchar(50) DEFAULT NULL,
		  `last_name` varchar(50) DEFAULT NULL,
		  `usertype` varchar(100) DEFAULT NULL,
		  `phone` varchar(20) DEFAULT NULL,
		  `first_time_login` bit(1) DEFAULT NULL,
		  `pic` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;");

  array_push($q, "INSERT INTO `users` (`username`, `usertype`,`password`,  `email`,`active`) VALUES ( 'admin','".$u."', '".$enc_password."', '".$email."','1')");
  
  
   array_push($q,"CREATE TABLE `menu` (
	  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	  `name` varchar(255) NOT NULL,
	  `link` varchar(255) NOT NULL,
	  `icon` varchar(255) NOT NULL,
	  `is_active` int(11) NOT NULL,
	  `is_parent` int(11) NOT NULL,
	  `descrpition` varchar(100) NOT NULL
	) ENGINE=InnoDB DEFAULT CHARSET=latin1;");
	
	 array_push($q,"INSERT INTO `menu` (`id`, `name`, `link`, `icon`, `is_active`, `is_parent`, `descrpition`) VALUES
(1, 'Forecasts', '', 'fa fa-line-chart', 1, 0, 'forecast'),
(2, 'Dekadal forecast', '/index.php/Dekadal_forecast/index', 'fa fa-cloud', 1, 1, 'one'),
(3, 'Daily Forecast', '/index.php/Daily_forecast/index', 'fa fa-cloud', 1, 1, 'one'),
(4, 'Seasonal Forecast', '/index.php/season/index', 'fa fa-cloud', 1, 1, 'one'),
(5, 'Marine Forecast', '/index.php/Coastline_forecast/index', 'fa fa-cloud', 1, 1, 'one'),
(8, 'Advisories', '/index.php/Advisory/index', 'fa fa-check-square-o', 1, 0, 'one'),
(12, 'Forecast Advice', '/index.php/user_feedback/index', 'ion-android-mail', 1, 5, 'one'),
(14, 'forecast graphs', '/index.php/graph/index', 'ion-arrow-graph-up-right', 0, 0, 'one'),
(15, 'user feedback', '/index.php/user_feedback/readfeedback', 'fa fa-comments', 1, 0, 'one'),
(16, 'STATISTICS', '/index.php/graph/index', 'fa fa-bar-chart', 1, 0, 'one'),
(17, 'feedback', '/index.php/graph/feedback', '', 1, 16, 'one'),
(18, 'ussd requests', 'index.php/graph/ussdRequest', '', 1, 16, 'one'),
(19, 'ussd request trend', 'index.php/graph/trend', '', 1, 16, 'one'),
(20, 'Admin Structures', '/index.php/Division/index', 'fa fa-sitemap', 1, 0, ''),
(21, 'Region', '/index.php/Region/index', '', 1, 20, 'one'),
(22, 'Division', '/index.php/Division/index', '', 1, 20, 'one'),
(23, 'City', '/index.php/City/index', '', 1, 20, 'one'),
(24, 'Sectors', '/index.php/Sector/index', 'glyphicon glyphicon-grain', 1, 0, ''),
(25, 'Major Sector', '/index.php/Major_Sector/index', '', 1, 24, 'one'),
(26, 'Minor Sector', '/index.php/Minor_sector/index', '', 1, 24, 'one'),
(27, 'Daily Forecast Time', '/index.php/Daily_forecast_time/index', 'fa fa-cloud', 1, 1, 'one'),
(31, 'Possible Impacts', '/index.php/Impacts/index', 'fa fa-compress', 1, 0, ''),
(32, 'Seasons', '/index.php/Season_names/index', 'fa fa-cloud', 1, 0, ''),
(33, 'Possible Advisories', '/index.php/Possible_advisories/index', 'fa fa-check-square', 1, 0, ''),
(34, 'Seasonal Terminologies', '/index.php/Terminologies/index', '', 0, 0, ''),
(35, 'SUB-REGIONS', '/index.php/Sub_region/index', '', 1, 20, 'one'),
(36, 'Daily Advisory', '/index.php/Advisory/daily', '', 1, 8, 'one'),
(37, 'Dekadal Advisory', '/index.php/Advisory/dekadal', '', 1, 8, 'one'),
(38, 'Seasonal Advisory', '/index.php/Advisory/index', '', 1, 8, 'one'),
(39, 'USSD Menu Settings', '/index.php/USSD/index', 'fa fa-tablet', 1, 0, 'USSD menu'),
(40, 'User Management', '/index.php/Landing/user_list', 'fa fa-users', 1, 0, 'User management');
");
	
	array_push($q,"CREATE TABLE `minor_sector` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `minor_name` varchar(45) NOT NULL,
  `major_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1");

array_push($q,"
		INSERT INTO `minor_sector` (`id`, `minor_name`, `major_id`) VALUES
		(1, 'Animal Husbandry ', 8),
		(2, 'Harvesting', 1),
		(3, 'Planting', 1);
		");


	array_push($q,"CREATE TABLE `possible_advisories` (
		  `pos` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
		  `cat` text NOT NULL,
		  `advise` text NOT NULL,
		  `state` text NOT NULL
		) ENGINE=InnoDB DEFAULT CHARSET=latin1;");

	array_push($q,"INSERT INTO `possible_advisories` (`pos`, `cat`, `advise`, `state`) VALUES
(1, '1', 'Use irregular light rains for early land preparation and securing inputs like seed, fertilizer, chemicals.', 'normal'),
(2, '1', 'Timely planting of improved varieties such as Beans (NABE 15-23 series), maize (Longe 5, 7H, 10H-11H).', 'normal'),
(3, '4', 'Establishment of water harvesting structures at household and communal level.', 'above'),
(4, '3', 'Soil and water conservation practices e.g. trenches, grass bunds, mulching to enhance soil moisture retention and control erosion.', 'above'),
(5, '1', 'Enhance good agronomic practices (proper spacing, fertilizer use, weeding).', 'above');");


array_push($q,"CREATE TABLE `possible_impacts` (
		  `id` int(7) NOT NULL PRIMARY KEY AUTO_INCREMENT,
		  `impact` text NOT NULL,
		  `state` varchar(100) NOT NULL
		) ENGINE=InnoDB DEFAULT CHARSET=latin1;");
//-------------new tables-------------------
array_push($q,"CREATE TABLE `daily_advisory` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `sector` int(5) NOT NULL,
  `forecast_id` int(11) NOT NULL,
  `advice` text NOT NULL,
  `message_summary` text,
  `dateadded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;");

array_push($q,"CREATE TABLE `data` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `days_of_the_week` varchar(10) NOT NULL,
  `d01` double NOT NULL,
  `d02` double NOT NULL,
  `d03` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;");

array_push($q,"
		INSERT INTO `data` (`id`, `days_of_the_week`, `d01`, `d02`, `d03`) VALUES
(1, 'Monday', 9.91858, 1.60976, 3.32214),
(2, 'Tuesday', 5.22581, 0, 5.75889),
(3, 'Wednesday', 10.36767, 3.99439, 13.58074),
(4, 'Thursday', 18.40449, 0.29202, 12.50758),
(5, 'Friday', 21.72388, 0.19852, 14.06225),
(6, 'Monday', 26.56933, 4.53594, 18.40455),
(7, 'Tuesday', 12.69532, 0.611, 8.64607),
(8, 'Wednesday', 3.24182, 0.79654, 3.90178),
(9, 'Thursday', 12.36614, 0, 0.66021),
(10, 'Friday', 11.67441, 0, 9.31397);
		");

 array_push($q,"CREATE TABLE `dekadal_advisory` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `sector` int(5) NOT NULL,
  `forecast_id` int(11) NOT NULL,
  `advice` text NOT NULL,
  `message_summary` text,
  `TS` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;");


//----------missing tables-------------------------
  array_push($q,"CREATE TABLE `main_regions` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `region_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;");
 

  array_push($q," CREATE TABLE `coastline_forecast` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `valid_date` varchar(255) NOT NULL,
  `issue_date` varchar(255) NOT NULL,
  `duty_forecaster` varchar(255) NOT NULL,
  `sea_state` varchar(255) NOT NULL,
  `warning` text NOT NULL,
  `surface_wind_24` varchar(255) NOT NULL,
  `surface_wind_48` varchar(255) NOT NULL,
  `visibility_24` varchar(255) NOT NULL,
  `visibility_48` varchar(255) NOT NULL,
  `temp_24` varchar(255) NOT NULL,
  `temp_48` varchar(255) NOT NULL,
  `height_24` varchar(255) NOT NULL,
  `height_48` varchar(255) NOT NULL,
  `wave_24` varchar(233) NOT NULL,
  `wave_48` varchar(255) NOT NULL,
  `current_24` varchar(255) NOT NULL,
  `current_48` varchar(255) NOT NULL,
  `weather` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;");

   array_push($q," CREATE TABLE `ussdmenulanguage` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `language` varchar(100) NOT NULL,
  `language_text_table` varchar(255) NOT NULL,
  `forecast_table` varchar(100) NOT NULL,
  `daily` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;");


   array_push($q,"CREATE TABLE `voice` (
   `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `language_id` int(11) NOT NULL,
  `voice_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;");



   array_push($q,"CREATE TABLE `voice_requests` (
    `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `phone` varchar(255) NOT NULL,
  `language_id` int(50) NOT NULL,
  `sessionID` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;");

  array_push($q," CREATE TABLE `ussdtransaction_new` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `phone` varchar(100) NOT NULL,
  `sessionId` varchar(100) NOT NULL,
  `menuvariable` varchar(255) DEFAULT NULL,
  `menuvalue` varchar(255) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `districtId` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;");
 
 

  array_push($q,"  CREATE TABLE `ussdmenu` (
  `menuname` varchar(200) DEFAULT NULL,
  `menuid` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `menudescription` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;");
 

 

    for($i=0;$i<58;$i++){   
	   $db =  mysqli_query($link ,$q[$i]);
		if(!$db){
		  echo mysqli_error($link);
		  echo "Query is ".$q[$i];
		  	
		}
	}//for
	}
		
	//for logging in
    public function load_login() {
	  $data['remember_me'] = $this->lang->line('msg_remember_me');
      $data['login'] = $this->lang->line('msg_login');
      $data['forgot_passwords'] = $this->lang->line('msg_forgot_passwords');

      $this->load->view('auth/login', $data);
    }

    // log the user in
    public function login() {
		  	        $this->form_validation->set_rules('identity', 'Email', 'required');
	        $this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
     //  echo $_POST['submit_login']; exit();
   		 if ($this->form_validation->run()== FALSE) {
		
            $this->load_login();
        } else {
			$dat[1] = $_POST['identity'];
			$dat[2] = md5($_POST['password']);
			
			$sql = $this->ion_auth->login1($dat);
				
			foreach ($sql->result_array() as $row)
			{				
				$username = $row['username'];
				$usertype = $row['usertype'];
				$first_time_login = $row['first_time_login'];
				$username = $row['username'];	
				$pic = $row['pic'];
				$active = $row['active'];			
			}
		if ($username && $active == 1) {
         
			$_SESSION['user_logged']=TRUE;
			$_SESSION['username']= $username;
			$_SESSION['usertype']= $usertype;
			$_SESSION['first_time_login']=  $first_time_login;			
			$_SESSION['pic']= $pic;
			$data['change'] = 0;
			redirect('index.php/landing/index');
                               
		 }elseif(!$username){
            $this->session->set_flashdata("error","<div class = 'alert alert-danager'> Incorrect login  in ... consider checking your Email or password</div>");
            $this->load_login();

           } elseif($username && !$active == 1){
                                        $this->session->set_flashdata("error","<div class = 'alert alert-danager'> You can not login in ... this account is not active</div>");
                                        $this->load_login();



			  }
        }


    }

    // log the user out
    public function logout() {
        $this->data['title'] = "Logout";

        // log the user out
        $logout = $this->ion_auth->logout();

        // redirect them to the login page
        $this->session->set_flashdata('message', $this->ion_auth->messages());
        redirect('index.php/auth/login', 'refresh');
    }
    //new password for first login
    // public function new_password() {

    //     $this->form_validation->set_rules('old_password', 'Old password', 'required');
    //     $this->form_validation->set_rules('new_password', 'new Password', 'required|min_length[8]');
    //     $this->form_validation->set_rules('new_password_conf', 'Password Confirmation', 'required|matches[new_password]');
    //         if (!$this->ion_auth->logged_in()) {

    //             redirect('index.php/auth/login', 'refresh');
    //         }

    //     $user = $this->ion_auth->user()->row();
    //     // echo 'user if';
    //     // exit;

    //     if ($this->form_validation->run() == false) {
    //         // echo 'wrong val';
    //         // exit;
    //         // display the form
    //         // set the flash data error message if there is one
    //         $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

    //         $this->data['min_password_length'] = $this->config->item('min_password_length', 'ion_auth');
    //         $this->data['old_password'] = array(
    //             'name' => 'old',
    //             'id' => 'old',
    //             'type' => 'password',
    //         );
    //         $this->data['new_password'] = array(
    //             'name' => 'new',
    //             'id' => 'new',
    //             'type' => 'password',
    //             'pattern' => '^.{' . $this->data['min_password_length'] . '}.*$',
    //         );
    //         $this->data['new_password_confirm'] = array(
    //             'name' => 'new_confirm',
    //             'id' => 'new_confirm',
    //             'type' => 'password',
    //             'pattern' => '^.{' . $this->data['min_password_length'] . '}.*$',
    //         );
    //         $this->data['user_id'] = array(
    //             'name' => 'user_id',
    //             'id' => 'user_id',
    //             'type' => 'hidden',
    //             'value' => $user->id,
    //         );

    //         // render
    //         //$this->template->load_auth('index.php/auth/new_password', $this->data);
    //         $this->load->view('auth/new_password',$data);
    //     } else {

    //         $identity = $this->session->userdata('identity');
    //         var_dump($identity);
    //         exit;

    //         $change = $this->ion_auth->change_password($identity, $this->input->post('old'), $this->input->post('new'));

    //         if ($change) {
    //             echo 'if changed password';
    //         exit;
    //             //if the password was successfully changed
    //             $this->session->set_flashdata('message', $this->ion_auth->messages());
    //             $this->logout();
    //         } else {
    //             $this->session->set_flashdata('message', $this->ion_auth->errors());
    //             redirect('index.php/auth/new_password', 'refresh');
    //         }
    //     }
    // }
    public function _rules()
    {

    $this->form_validation->set_rules('old_password', 'Old Password', 'required');
    $this->form_validation->set_rules('new_password', 'New Password', 'required');
    $this->form_validation->set_rules('new_password_conf', 'Password Confirmation', 'required|matches[new_password]');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
    public function minano(){

        $this->_rules();
        $username = '';

        if ($this->form_validation->run() == FALSE) {

            $this->load->view('auth/new_password');

        }else{
            $data = array(
               'username' => $_SESSION['username'],
               'usertype' =>  $_SESSION['usertype'],
               'pic'      => $_SESSION['pic'],
               'change'   => 0,
            );
           $username =  $_SESSION['username'];

            $password=$this->Landing_model->get_old_password($username);
            $entered_old_password=md5($this->input->post('old_password'));
            $new_password=md5($this->input->post('new_password'));


            if($password->password==$entered_old_password){
                // var_dump($password->password==$entered_old_password);
                // exit;
                $this->Landing_model->update_old_password($username,$new_password);
                redirect('index.php/auth/login', 'refresh');
            }
        }

        //$this->load->view('auth/new_password');
    }

    //directing to the change password form

    public function change_pass(){


        $data = array(
            'change' => 34,
        );
        $this->load->view('template',$data);
    }

    // change password
    public function change_password() {
        $this->form_validation->set_rules('old', $this->lang->line('change_password_validation_old_password_label'), 'required');
        $this->form_validation->set_rules('new', $this->lang->line('change_password_validation_new_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[new_confirm]');
        $this->form_validation->set_rules('new_confirm', $this->lang->line('change_password_validation_new_password_confirm_label'), 'required');

        if (!$this->ion_auth->logged_in()) {
            redirect('index.php/auth/login', 'refresh');
        }

        $user = $this->ion_auth->user()->row();

        if ($this->form_validation->run() == false) {
            // display the form
            // set the flash data error message if there is one
            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

            $this->data['min_password_length'] = $this->config->item('min_password_length', 'ion_auth');
            $this->data['old_password'] = array(
                'name' => 'old',
                'id' => 'old',
                'type' => 'password',
            );
            $this->data['new_password'] = array(
                'name' => 'new',
                'id' => 'new',
                'type' => 'password',
                'pattern' => '^.{' . $this->data['min_password_length'] . '}.*$',
            );
            $this->data['new_password_confirm'] = array(
                'name' => 'new_confirm',
                'id' => 'new_confirm',
                'type' => 'password',
                'pattern' => '^.{' . $this->data['min_password_length'] . '}.*$',
            );
            $this->data['user_id'] = array(
                'name' => 'user_id',
                'id' => 'user_id',
                'type' => 'hidden',
                'value' => $user->id,
            );


            // render
            $this->template->load_auth('auth/change_password', $this->data);
        } else {
            $identity = $this->session->userdata('identity');

            $change = $this->ion_auth->change_password($identity, $this->input->post('old'), $this->input->post('new'));

            if ($change) {
                //if the password was successfully changed
                $this->session->set_flashdata('message', $this->ion_auth->messages());
                $this->logout();
            } else {
                $this->session->set_flashdata('message', $this->ion_auth->errors());
                redirect('auth/change_password', 'refresh');
            }
        }
    }

    // forgot password
    public function forgot_password() {
        // setting validation rules by checking whether identity is username or email
        if ($this->config->item('identity', 'ion_auth') != 'email') {
            $this->form_validation->set_rules('identity', $this->lang->line('forgot_password_identity_label'), 'required');
        } else {
            $this->form_validation->set_rules('identity', $this->lang->line('forgot_password_validation_email_label'), 'required|valid_email');
        }


        if ($this->form_validation->run() == false) {
            $this->data['type'] = $this->config->item('identity', 'ion_auth');
            // setup the input
            $this->data['identity'] = array('name' => 'identity',
                'id' => 'identity',
            );

            if ($this->config->item('identity', 'ion_auth') != 'email') {
                $this->data['identity_label'] = $this->lang->line('forgot_password_identity_label');
            } else {
                $this->data['identity_label'] = $this->lang->line('forgot_password_email_identity_label');
            }

            // set any errors and display the form
            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
            $this->template->load_auth('auth/forgot_password', $this->data);
        } else {
            $identity_column = $this->config->item('identity', 'ion_auth');
            $identity = $this->ion_auth->where($identity_column, $this->input->post('identity'))->users()->row();

            if (empty($identity)) {

                if ($this->config->item('identity', 'ion_auth') != 'email') {
                    $this->ion_auth->set_error('forgot_password_identity_not_found');
                } else {
                    $this->ion_auth->set_error('forgot_password_email_not_found');
                }

                $this->session->set_flashdata('message', $this->ion_auth->errors());
                redirect("auth/forgot_password", 'refresh');
            }

            // run the forgotten password method to email an activation code to the user
            $forgotten = $this->ion_auth->forgotten_password($identity->{$this->config->item('identity', 'ion_auth')});

            if ($forgotten) {
                // if there were no errors
                $this->session->set_flashdata('message', $this->ion_auth->messages());
                redirect("auth/login", 'refresh'); //we should display a confirmation page here instead of the login page
            } else {
                $this->session->set_flashdata('message', $this->ion_auth->errors());
                redirect("auth/forgot_password", 'refresh');
            }
        }
    }

    // reset password - final step for forgotten password
    public function reset_password($code = NULL) {
        if (!$code) {
            show_404();
        }

        $user = $this->ion_auth->forgotten_password_check($code);

        if ($user) {
            // if the code is valid then display the password reset form

            $this->form_validation->set_rules('new', $this->lang->line('reset_password_validation_new_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[new_confirm]');
            $this->form_validation->set_rules('new_confirm', $this->lang->line('reset_password_validation_new_password_confirm_label'), 'required');

            if ($this->form_validation->run() == false) {
                // display the form
                // set the flash data error message if there is one
                $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

                $this->data['min_password_length'] = $this->config->item('min_password_length', 'ion_auth');
                $this->data['new_password'] = array(
                    'name' => 'new',
                    'id' => 'new',
                    'type' => 'password',
                    'pattern' => '^.{' . $this->data['min_password_length'] . '}.*$',
                );
                $this->data['new_password_confirm'] = array(
                    'name' => 'new_confirm',
                    'id' => 'new_confirm',
                    'type' => 'password',
                    'pattern' => '^.{' . $this->data['min_password_length'] . '}.*$',
                );
                $this->data['user_id'] = array(
                    'name' => 'user_id',
                    'id' => 'user_id',
                    'type' => 'hidden',
                    'value' => $user->id,
                );
                $this->data['csrf'] = $this->_get_csrf_nonce();
                $this->data['code'] = $code;

                // render
                $this->template->load_auth('auth/reset_password', $this->data);
            } else {
                // do we have a valid request?
                if ($this->_valid_csrf_nonce() === FALSE || $user->id != $this->input->post('user_id')) {

                    // something fishy might be up
                    $this->ion_auth->clear_forgotten_password_code($code);

                    show_error($this->lang->line('error_csrf'));
                } else {
                    // finally change the password
                    $identity = $user->{$this->config->item('identity', 'ion_auth')};

                    $change = $this->ion_auth->reset_password($identity, $this->input->post('new'));

                    if ($change) {
                        // if the password was successfully changed
                        $this->session->set_flashdata('message', $this->ion_auth->messages());
                        redirect("auth/login", 'refresh');
                    } else {
                        $this->session->set_flashdata('message', $this->ion_auth->errors());
                        redirect('auth/reset_password/' . $code, 'refresh');
                    }
                }
            }
        } else {
            // if the code is invalid then send them back to the forgot password page
            $this->session->set_flashdata('message', $this->ion_auth->errors());
            redirect("auth/forgot_password", 'refresh');
        }
    }

    // activate the user
    public function activate($id, $code = false) {
        if ($code !== false) {
            $activation = $this->ion_auth->activate($id, $code);
        } else if ($this->ion_auth->is_admin()) {
            $activation = $this->ion_auth->activate($id);
        }

        if ($activation) {
            // redirect them to the auth page
            $this->session->set_flashdata('message', $this->ion_auth->messages());
            redirect("auth", 'refresh');
        } else {
            // redirect them to the forgot password page
            $this->session->set_flashdata('message', $this->ion_auth->errors());
            redirect("auth/forgot_password", 'refresh');
        }
    }

    // deactivate the user
    public function deactivate($id = NULL) {
        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) {
            // redirect them to the home page because they must be an administrator to view this
            return show_error('You must be an administrator to view this page.');
        }

        $id = (int) $id;

        $this->load->library('form_validation');
        $this->form_validation->set_rules('confirm', $this->lang->line('deactivate_validation_confirm_label'), 'required');
        $this->form_validation->set_rules('id', $this->lang->line('deactivate_validation_user_id_label'), 'required|alpha_numeric');

        if ($this->form_validation->run() == FALSE) {
            // insert csrf check
            $this->data['csrf'] = $this->_get_csrf_nonce();
            $this->data['user'] = $this->ion_auth->user($id)->row();

            $this->template->load_auth('auth/deactivate_user', $this->data);
        } else {
            // do we really want to deactivate?
            if ($this->input->post('confirm') == 'yes') {
                // do we have a valid request?
                if ($this->_valid_csrf_nonce() === FALSE || $id != $this->input->post('id')) {
                    show_error($this->lang->line('error_csrf'));
                }

                // do we have the right userlevel?
                if ($this->ion_auth->logged_in() && $this->ion_auth->is_admin()) {
                    $this->ion_auth->deactivate($id);
                }
            }

            // redirect them back to the auth page
            redirect('auth', 'refresh');
        }
    }

    // create a new user
    public function create_user() {
        $this->data['title'] = $this->lang->line('create_user_heading');

        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) {
            redirect('auth', 'refresh');
        }

        $tables = $this->config->item('tables', 'ion_auth');
        $identity_column = $this->config->item('identity', 'ion_auth');
        $this->data['identity_column'] = $identity_column;

        // validate form input
        $this->form_validation->set_rules('first_name', $this->lang->line('create_user_validation_fname_label'), 'required');
        $this->form_validation->set_rules('last_name', $this->lang->line('create_user_validation_lname_label'), 'required');
        if ($identity_column !== 'email') {
            $this->form_validation->set_rules('identity', $this->lang->line('create_user_validation_identity_label'), 'required|is_unique[' . $tables['users'] . '.' . $identity_column . ']');
            $this->form_validation->set_rules('email', $this->lang->line('create_user_validation_email_label'), 'required|valid_email');
        } else {
            $this->form_validation->set_rules('email', $this->lang->line('create_user_validation_email_label'), 'required|valid_email|is_unique[' . $tables['users'] . '.email]');
        }
        $this->form_validation->set_rules('phone', $this->lang->line('create_user_validation_phone_label'), 'trim');
        $this->form_validation->set_rules('company', $this->lang->line('create_user_validation_company_label'), 'trim');
        $this->form_validation->set_rules('password', $this->lang->line('create_user_validation_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]');
        $this->form_validation->set_rules('password_confirm', $this->lang->line('create_user_validation_password_confirm_label'), 'required');

        if ($this->form_validation->run() == true) {
            $email = strtolower($this->input->post('email'));
            $identity = ($identity_column === 'email') ? $email : $this->input->post('identity');
            $password = $this->input->post('password');

            $additional_data = array(
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'company' => $this->input->post('company'),
                'phone' => $this->input->post('phone'),
            );
        }
        if ($this->form_validation->run() == true && $this->ion_auth->register($identity, $password, $email, $additional_data)) {
            // check to see if we are creating the user
            // redirect them back to the admin page
            $this->session->set_flashdata('message', $this->ion_auth->messages());
            redirect("auth", 'refresh');
        } else {
            // display the create user form
            // set the flash data error message if there is one
            $this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

            $this->data['first_name'] = array(
                'name' => 'first_name',
                'id' => 'first_name',
                'type' => 'text',
                'value' => $this->form_validation->set_value('first_name'),
            );
            $this->data['last_name'] = array(
                'name' => 'last_name',
                'id' => 'last_name',
                'type' => 'text',
                'value' => $this->form_validation->set_value('last_name'),
            );
            $this->data['identity'] = array(
                'name' => 'identity',
                'id' => 'identity',
                'type' => 'text',
                'value' => $this->form_validation->set_value('identity'),
            );
            $this->data['email'] = array(
                'name' => 'email',
                'id' => 'email',
                'type' => 'text',
                'value' => $this->form_validation->set_value('email'),
            );
            $this->data['company'] = array(
                'name' => 'company',
                'id' => 'company',
                'type' => 'text',
                'value' => $this->form_validation->set_value('company'),
            );
            $this->data['phone'] = array(
                'name' => 'phone',
                'id' => 'phone',
                'type' => 'text',
                'value' => $this->form_validation->set_value('phone'),
            );
            $this->data['password'] = array(
                'name' => 'password',
                'id' => 'password',
                'type' => 'password',
                'value' => $this->form_validation->set_value('password'),
            );
            $this->data['password_confirm'] = array(
                'name' => 'password_confirm',
                'id' => 'password_confirm',
                'type' => 'password',
                'value' => $this->form_validation->set_value('password_confirm'),
            );

            $this->template->load_auth('auth/create_user', $this->data);
        }
    }

    // edit a user
    public function edit_user($id) {
        $this->data['title'] = $this->lang->line('edit_user_heading');

        if (!$this->ion_auth->logged_in() || (!$this->ion_auth->is_admin() && !($this->ion_auth->user()->row()->id == $id))) {
            redirect('auth', 'refresh');
        }

        $user = $this->ion_auth->user($id)->row();
        $groups = $this->ion_auth->groups()->result_array();
        $currentGroups = $this->ion_auth->get_users_groups($id)->result();

        // validate form input
        $this->form_validation->set_rules('first_name', $this->lang->line('edit_user_validation_fname_label'), 'required');
        $this->form_validation->set_rules('last_name', $this->lang->line('edit_user_validation_lname_label'), 'required');
        $this->form_validation->set_rules('phone', $this->lang->line('edit_user_validation_phone_label'), 'required');
        $this->form_validation->set_rules('company', $this->lang->line('edit_user_validation_company_label'), 'required');

        if (isset($_POST) && !empty($_POST)) {
            // do we have a valid request?
            if ($this->_valid_csrf_nonce() === FALSE || $id != $this->input->post('id')) {
                show_error($this->lang->line('error_csrf'));
            }

            // update the password if it was posted
            if ($this->input->post('password')) {
                $this->form_validation->set_rules('password', $this->lang->line('edit_user_validation_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]');
                $this->form_validation->set_rules('password_confirm', $this->lang->line('edit_user_validation_password_confirm_label'), 'required');
            }

            if ($this->form_validation->run() === TRUE) {
                $data = array(
                    'first_name' => $this->input->post('first_name'),
                    'last_name' => $this->input->post('last_name'),
                    'company' => $this->input->post('company'),
                    'phone' => $this->input->post('phone'),
                );

                // update the password if it was posted
                if ($this->input->post('password')) {
                    $data['password'] = $this->input->post('password');
                }



                // Only allow updating groups if user is admin
                if ($this->ion_auth->is_admin()) {
                    //Update the groups user belongs to
                    $groupData = $this->input->post('groups');

                    if (isset($groupData) && !empty($groupData)) {

                        $this->ion_auth->remove_from_group('', $id);

                        foreach ($groupData as $grp) {
                            $this->ion_auth->add_to_group($grp, $id);
                        }
                    }
                }

                // check to see if we are updating the user
                if ($this->ion_auth->update($user->id, $data)) {
                    // redirect them back to the admin page if admin, or to the base url if non admin
                    $this->session->set_flashdata('message', $this->ion_auth->messages());
                    if ($this->ion_auth->is_admin()) {
                        redirect('auth', 'refresh');
                    } else {
                        ////redirect('/', 'refresh');
                    }
                } else {
                    // redirect them back to the admin page if admin, or to the base url if non admin
                    $this->session->set_flashdata('message', $this->ion_auth->errors());
                    if ($this->ion_auth->is_admin()) {
                        redirect('auth', 'refresh');
                    } else {
                        ////redirect('/', 'refresh');
                    }
                }
            }
        }

        // display the edit user form
        $this->data['csrf'] = $this->_get_csrf_nonce();

        // set the flash data error message if there is one
        $this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

        // pass the user to the view
        $this->data['user'] = $user;
        $this->data['groups'] = $groups;
        $this->data['currentGroups'] = $currentGroups;

        $this->data['first_name'] = array(
            'name' => 'first_name',
            'id' => 'first_name',
            'type' => 'text',
            'value' => $this->form_validation->set_value('first_name', $user->first_name),
        );
        $this->data['last_name'] = array(
            'name' => 'last_name',
            'id' => 'last_name',
            'type' => 'text',
            'value' => $this->form_validation->set_value('last_name', $user->last_name),
        );
        $this->data['company'] = array(
            'name' => 'company',
            'id' => 'company',
            'type' => 'text',
            'value' => $this->form_validation->set_value('company', $user->company),
        );
        $this->data['phone'] = array(
            'name' => 'phone',
            'id' => 'phone',
            'type' => 'text',
            'value' => $this->form_validation->set_value('phone', $user->phone),
        );
        $this->data['password'] = array(
            'name' => 'password',
            'id' => 'password',
            'type' => 'password'
        );
        $this->data['password_confirm'] = array(
            'name' => 'password_confirm',
            'id' => 'password_confirm',
            'type' => 'password'
        );

        $this->template->load_auth('auth/edit_user', $this->data);
    }

    // create a new group
    public function create_group() {
        $this->data['title'] = $this->lang->line('create_group_title');

        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) {
            redirect('auth', 'refresh');
        }

        // validate form input
        $this->form_validation->set_rules('group_name', $this->lang->line('create_group_validation_name_label'), 'required|alpha_dash');

        if ($this->form_validation->run() == TRUE) {
            $new_group_id = $this->ion_auth->create_group($this->input->post('group_name'), $this->input->post('description'));
            if ($new_group_id) {
                // check to see if we are creating the group
                // redirect them back to the admin page
                $this->session->set_flashdata('message', $this->ion_auth->messages());
                redirect("auth", 'refresh');
            }
        } else {
            // display the create group form
            // set the flash data error message if there is one
            $this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

            $this->data['group_name'] = array(
                'name' => 'group_name',
                'id' => 'group_name',
                'type' => 'text',
                'value' => $this->form_validation->set_value('group_name'),
            );
            $this->data['description'] = array(
                'name' => 'description',
                'id' => 'description',
                'type' => 'text',
                'value' => $this->form_validation->set_value('description'),
            );

            $this->template->load_auth('auth/create_group', $this->data);
        }
    }

    // edit a group
    public function edit_group($id) {
        // bail if no group id given
        if (!$id || empty($id)) {
            redirect('auth', 'refresh');
        }

        $this->data['title'] = $this->lang->line('edit_group_title');

        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) {
            redirect('auth', 'refresh');
        }

        $group = $this->ion_auth->group($id)->row();

        // validate form input
        $this->form_validation->set_rules('group_name', $this->lang->line('edit_group_validation_name_label'), 'required|alpha_dash');

        if (isset($_POST) && !empty($_POST)) {
            if ($this->form_validation->run() === TRUE) {
                $group_update = $this->ion_auth->update_group($id, $_POST['group_name'], $_POST['group_description']);

                if ($group_update) {
                    $this->session->set_flashdata('message', $this->lang->line('edit_group_saved'));
                } else {
                    $this->session->set_flashdata('message', $this->ion_auth->errors());
                }
                redirect("auth", 'refresh');
            }
        }

        // set the flash data error message if there is one
        $this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

        // pass the user to the view
        $this->data['group'] = $group;

        $readonly = $this->config->item('admin_group', 'ion_auth') === $group->name ? 'readonly' : '';

        $this->data['group_name'] = array(
            'name' => 'group_name',
            'id' => 'group_name',
            'type' => 'text',
            'value' => $this->form_validation->set_value('group_name', $group->name),
            $readonly => $readonly,
        );
        $this->data['group_description'] = array(
            'name' => 'group_description',
            'id' => 'group_description',
            'type' => 'text',
            'value' => $this->form_validation->set_value('group_description', $group->description),
        );

        $this->template->load_auth('auth/edit_group', $this->data);
    }
	
	
   //function 
    public function _get_csrf_nonce() {
        $this->load->helper('string');
        $key = random_string('alnum', 8);
        $value = random_string('alnum', 20);
        $this->session->set_flashdata('csrfkey', $key);
        $this->session->set_flashdata('csrfvalue', $value);

        return array($key => $value);
    }

    public function _valid_csrf_nonce() {
        if ($this->input->post($this->session->flashdata('csrfkey')) !== FALSE &&
                $this->input->post($this->session->flashdata('csrfkey')) == $this->session->flashdata('csrfvalue')) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

   
}
