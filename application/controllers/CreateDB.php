<?php
function createdb(){
$servername = "localhost";
$username = "root";
$password = "Rc4@adm1n";
$admin_user=$_SESSION['username'];
$admin_pass=$_SESSION['password'];
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {die("Connection failed: " . $conn->connect_error);} 
// Create database
$sql = "CREATE DATABASE IF NOT EXISTS ".$_SESSION['db_name'];
if ($conn->query($sql) === TRUE) {$dbname = $_SESSION['db_name'];} else {echo "Error creating database: " . $conn->error;}


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {die("Connection failed: " . $conn->connect_error);} 

// sql to create table
$admin = "CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `username` (`username`,`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1";
$conn->query($admin);
$q="insert into admin(username,email,password) values('$admin_user','$username','$admin_pass')";
if(mysqli_query($conn,$q)){
    echo 'inserted';
}
// sql to create table
$language = "CREATE TABLE IF NOT EXISTS `language` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key_word` varchar(1000) NOT NULL,
  `english` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
) ENGINE=InnoDB DEFAULT CHARSET=latin1";
$conn->query($language);
$q="insert into language(key_word,english) values('app_title','WEATHER INFORMATION DISSEMINATION')";
if(mysqli_query($conn,$q)){
    echo 'inserted';
}
$advice = "CREATE TABLE IF NOT EXISTS `advice` (
  `id_advice` int(11) NOT NULL AUTO_INCREMENT,
  `advice_name` varchar(100) NOT NULL,
  `advice_des` varchar(100) NOT NULL,
  PRIMARY KEY (`id_advice`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1";
$conn->query($advice);

$language = "CREATE TABLE IF NOT EXISTS `languages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lang_word` varchar(100) NOT NULL,
  `english` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1";
$conn->query($language);

$user="CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(15) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `usertype` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `first_time_login` bit(1) NOT NULL,
  `pic` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8";
$conn->query($user);

$possible_impact="CREATE TABLE IF NOT EXISTS `possible_impacts` (
  `ps` int(11) NOT NULL AUTO_INCREMENT,
  `impact` text NOT NULL,
  `state` varchar(100) NOT NULL,
  PRIMARY KEY (`ps`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1";
$conn->query($possible_impact);

$season = "CREATE TABLE IF NOT EXISTS `season` (
  `id` int(11) NOT NULL,
  `season_name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1";
$conn->query($season);

$possible_advisories = "CREATE TABLE IF NOT EXISTS `possible_advisories` (
  `pos` int(11) NOT NULL AUTO_INCREMENT,
  `cat` varchar(100) NOT NULL,
  `advise` text NOT NULL,
  `state` varchar(100) NOT NULL,
  PRIMARY KEY (`pos`)
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=latin1";
$conn->query($possible_advisories);

$users = "CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(15) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `usertype` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `first_time_login` bit(1) NOT NULL,
  `pic` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8";
$conn->query($users);
//$advice = "";

$category="CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(255) NOT NULL,
  `img` varchar(100) NOT NULL,
  `widget` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1";
$conn->query($users);

$contacts="CREATE TABLE IF NOT EXISTS `contacts` (
  `contact_id` int(5) NOT NULL,
  `contact_group_id` int(5) NOT NULL DEFAULT '0',
  `contact_name` varchar(250) DEFAULT NULL,
  `contact_number` varchar(50) DEFAULT NULL,
  `contact_email` varchar(50) DEFAULT NULL,
  `contact_address` varchar(500) DEFAULT NULL,
  `contact_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `contact_status` enum('0','1') NOT NULL DEFAULT '1',
  PRIMARY KEY (`contact_id`),
  UNIQUE KEY `contact_number` (`contact_number`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1";
$conn->query($contacts);

$menu="CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `is_active` int(11) NOT NULL,
  `is_parent` int(11) NOT NULL,
  `descrpition` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1";
$conn->query($menu);
/***************************************/
//COUNTRY SPECIFIC TABLES
/**************************************/
$country=$_SESSION['country'];
 if($country=="nigeria"){

 	//TABLES SPECIFIC TO NIGERIA
 	$state = "CREATE TABLE IF NOT EXISTS `state` (
   `state_id` int(11) NOT NULL AUTO_INCREMENT,
   `state_name` varchar(100) NOT NULL,
    PRIMARY KEY (`state_id`)
	) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1";
	$conn->query($state);

	$lga = "CREATE TABLE IF NOT EXISTS `lga` (
   `lga_id` int(11) NOT NULL AUTO_INCREMENT,
   `lga_name` varchar(100) NOT NULL,
   `state_id` varchar(100) NOT NULL,
    PRIMARY KEY (`lga_id`),
    KEY `fk_state_idx` (`state_id`)
	) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1";
	$conn->query($lga);

	$daily_forecast_city = "CREATE TABLE IF NOT EXISTS `daily_forecast_city` (
   `city_id` int(11) NOT NULL AUTO_INCREMENT,
   `city_name` varchar(100) NOT NULL,
   `state_id` varchar(100) NOT NULL,
   `lga_id` varchar(100) NOT NULL,
    PRIMARY KEY (`city_id`),
    KEY `fk_state_idx` (`state_id`),
    KEY `fk_lga_idx` (`lga_id`)
	) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1";
	$conn->query($daily_forecast_city);

  $seasonal_forecast="CREATE TABLE IF NOT EXISTS `seasonal_forecast` (
  `sea_id` int(11) NOT NULL AUTO_INCREMENT,
  `state_name` int(11) NOT NULL,
  `lga_name` varchar(100) DEFAULT NULL,
  `city_name` varchar(100) DEFAULT NULL,
  `season` varchar(100) NOT NULL,
  `description` text,
  `descriptionLanguage2` text,
  `impact` text,
  `impactLanguage2` text,
  `issuetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`sea_id`)
  ) ENGINE=InnoDB AUTO_INCREMENT=125 DEFAULT CHARSET=latin1";
  $conn->query($seasonal_forecast);

  $decadal_forecast="CREATE TABLE IF NOT EXISTS `decadal` (
  `decadal_id` int(11) NOT NULL AUTO_INCREMENT,
  `advisory` text NOT NULL,
  `advisoryLanguage2` text NOT NULL,
  `state_name`varchar(100) NOT NULL,
  `lga_name` varchar(100) DEFAULT NULL,
  `city_name` varchar(100) DEFAULT NULL,
  `date_from` date NOT NULL,
  `date_to` date NOT NULL,
  `issuetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`decadal_id`)
  ) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1";
    $conn->query($decadal_forecast);

  $advisory="CREATE TABLE IF NOT EXISTS `advisory` (
  `advisory_id` int(11) NOT NULL AUTO_INCREMENT,
  `message` text,
  `message_summary` text,
  `messagelanguage2` text,
  `messagelanguage2_summary` text,
  `state_id` varchar(30) NOT NULL,
  `lga_id` varchar(30) NOT NULL,
  `city_id` varchar(30) NOT NULL,
  `TS` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`advisory_id`),
  KEY `fk_state_idx` (`state_id`),
  KEY `fk_lga_idx` (`lga_id`),
  KEY `fk_city_idx` (`city_id`)
  ) ENGINE=InnoDB AUTO_INCREMENT=260 DEFAULT CHARSET=latin1";
  $conn->query($advisory);
 
$daily_forecast="CREATE TABLE IF NOT EXISTS `daily_forecast` (
  `id` double NOT NULL AUTO_INCREMENT,
  `mean_temp` double NOT NULL,
  `max_temp` double DEFAULT NULL,
  `min_temp` double DEFAULT NULL,
  `sunrise` varchar(45) DEFAULT NULL,
  `sunset` varchar(45) DEFAULT NULL,
  `wind` int(11) DEFAULT NULL,
  `wind_direction` text NOT NULL,
  `wind_strength` text NOT NULL,
  `weather` text,
  `weatherLuganda` text,
  `advisory` varchar(300) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` varchar(200) NOT NULL,
  `state_id` varchar(30) NOT NULL,
  `lga_id` varchar(30) NOT NULL,
  `city_id` varchar(30) NOT NULL,
  `season_id` int(11) NOT NULL,
  `cat_id` varchar(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_state_idx` (`state_id`),
  KEY `fk_lga_idx` (`lga_id`),
  KEY `fk_city_idx` (`city_id`),
  KEY `fk_season_idx` (`season_id`),
  KEY `fk_cat_idx` (`cat_id`)
  ) ENGINE=InnoDB AUTO_INCREMENT=283 DEFAULT CHARSET=latin1";
 $conn->query($daily_forecast);

  $feedback="CREATE TABLE IF NOT EXISTS `feedback` (
  `record_id` int(11) NOT NULL AUTO_INCREMENT,
  `names` varchar(100) NOT NULL,
  `state_name` text NOT NULL,
  `lga_name` text NOT NULL,
  `city_name` text NOT NULL,
  `observation` text NOT NULL,
  `implication` text NOT NULL,
  `action_to_take` text NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`record_id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1";
 $conn->query($feedback);
$user_feedback="CREATE TABLE IF NOT EXISTS `user_feedback` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `city_name` varchar(20) NOT NULL,
  `category` varchar(20) NOT NULL,
  `accuracy` int(2) NOT NULL,
  `applicability` int(2) NOT NULL,
  `timeliness` int(2) NOT NULL,
  `generalComment` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1";
$conn->query($user_feedback);

 }else if($country=="ghana"){
 	 	//TABLES SPECIFIC TO NIGERIA
 	$region = "CREATE TABLE IF NOT EXISTS `region` (
   `region_id` int(11) NOT NULL AUTO_INCREMENT,
   `region_name` varchar(100) NOT NULL,
    PRIMARY KEY (`region_id`)
	) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1";
	$conn->query($region);

	$assembly = "CREATE TABLE IF NOT EXISTS `assembly` (
   `assembly_id` int(11) NOT NULL AUTO_INCREMENT,
   `assembly_name` varchar(100) NOT NULL,
   `assembly_type` varchar(100) NOT NULL,
   `region_id` varchar(100) NOT NULL,
    PRIMARY KEY (`assembly_id`),
    KEY `fk_region_idx` (`region_id`)
	) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1";
	$conn->query($assembly);

	$district = "CREATE TABLE IF NOT EXISTS `district` (
   `district_id` int(11) NOT NULL AUTO_INCREMENT,
   `district_name` varchar(100) NOT NULL,
   `assembly_id` varchar(100) NOT NULL,
    PRIMARY KEY (`district_id`),
    KEY `fk_assembly_idx` (`assembly_id`)
	) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1";
	$conn->query($district);
     
  $seasonal_forecast="CREATE TABLE IF NOT EXISTS `seasonal_forecast` (
  `sea_id` int(11) NOT NULL AUTO_INCREMENT,
  `region_name` int(11) NOT NULL,
  `assembly_name` varchar(100) DEFAULT NULL,
  `district_name` varchar(100) DEFAULT NULL,
  `season` varchar(100) NOT NULL,
  `description` text,
  `descriptionLanguage2` text,
  `impact` text,
  `impactLanguage2` text,
  `issuetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`sea_id`)
  ) ENGINE=InnoDB AUTO_INCREMENT=125 DEFAULT CHARSET=latin1";
  $conn->query($seasonal_forecast);
  
  $decadal_forecast="CREATE TABLE IF NOT EXISTS `decadal` (
  `decadal_id` int(11) NOT NULL AUTO_INCREMENT,
  `advisory` text NOT NULL,
  `advisoryLanguage2` text,
  `region_name` int(11) NOT NULL,
  `assembly_name` varchar(100) DEFAULT NULL,
  `district_name` varchar(100) DEFAULT NULL,
  `date_from` date NOT NULL,
  `date_to` date NOT NULL,
  `issuetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`decadal_id`)
  ) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1";
    $conn->query($decadal_forecast);

  $advisory="CREATE TABLE IF NOT EXISTS `advisory` (
  `advisory_id` int(11) NOT NULL AUTO_INCREMENT,
  `message` text,
  `message_summary` text,
  `messagelanguage2` text,
  `messagelanguage2_summary` text,
  `region_id` varchar(30) NOT NULL,
  `assembly_id` varchar(30) NOT NULL,
  `district_id` varchar(30) NOT NULL,
  `TS` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`advisory_id`),
  KEY `fk_region_idx` (`region_id`),
  KEY `fk_assembly_idx` (`assembly_id`),
  KEY `fk_district_idx` (`district_id`)
) ENGINE=InnoDB AUTO_INCREMENT=260 DEFAULT CHARSET=latin1";
$conn->query($advisory);
 
 $daily_forecast="CREATE TABLE IF NOT EXISTS `daily_forecast` (
  `id` double NOT NULL AUTO_INCREMENT,
  `mean_temp` double NOT NULL,
  `max_temp` double DEFAULT NULL,
  `min_temp` double DEFAULT NULL,
  `sunrise` varchar(45) DEFAULT NULL,
  `sunset` varchar(45) DEFAULT NULL,
  `wind` int(11) DEFAULT NULL,
  `wind_direction` text NOT NULL,
  `wind_strength` text NOT NULL,
  `weather` text,
  `weatherLuganda` text,
  `advisory` varchar(300) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` varchar(200) NOT NULL,
  `region_id` varchar(30) NOT NULL,
  `assembly_id` varchar(30) NOT NULL,
  `district_id` varchar(30) NOT NULL,
  `season_id` int(11) NOT NULL,
  `cat_id` varchar(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_region_idx` (`region_id`),
  KEY `fk_assembly_idx` (`assembly_id`),
  KEY `fk_district_idx` (`district_id`),
  KEY `fk_season_idx` (`season_id`),
  KEY `fk_cat_idx` (`cat_id`)
  ) ENGINE=InnoDB AUTO_INCREMENT=283 DEFAULT CHARSET=latin1";

 $conn->query($daily_forecast);
    $feedback="CREATE TABLE IF NOT EXISTS `feedback` (
  `record_id` int(11) NOT NULL AUTO_INCREMENT,
  `names` varchar(100) NOT NULL,
  `region_name` text NOT NULL,
  `assembly_name` text NOT NULL,
  `district_name` text NOT NULL,
  `observation` text NOT NULL,
  `implication` text NOT NULL,
  `action_to_take` text NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`record_id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1";
 $conn->query($feedback);
$user_feedback="CREATE TABLE IF NOT EXISTS `user_feedback` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `district_name` varchar(20) NOT NULL,
  `category` varchar(20) NOT NULL,
  `accuracy` int(2) NOT NULL,
  `applicability` int(2) NOT NULL,
  `timeliness` int(2) NOT NULL,
  `generalComment` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1";
$conn->query($user_feedback);
 }else if($country=="south sudan"){
 	 	//TABLES SPECIFIC TO NIGERIA
 	$region = "CREATE TABLE IF NOT EXISTS `region` (
   `region_id` int(11) NOT NULL AUTO_INCREMENT,
   `region_name` varchar(100) NOT NULL,
    PRIMARY KEY (`region_id`)
	) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1";
	$conn->query($region);

	$state = "CREATE TABLE IF NOT EXISTS `state` (
   `state_id` int(11) NOT NULL AUTO_INCREMENT,
   `state_name` varchar(100) NOT NULL,
   `region_id` varchar(100) NOT NULL,
    PRIMARY KEY (`state_id`),
    KEY `fk_region_idx` (`region_id`)
	) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1";
	$conn->query($state);
  
  $seasonal_forecast="CREATE TABLE IF NOT EXISTS `seasonal_forecast` (
  `sea_id` int(11) NOT NULL AUTO_INCREMENT,
  `region_name` int(11) NOT NULL,
  `state_name` varchar(100) DEFAULT NULL,
  `season` varchar(100) NOT NULL,
  `description` text,
  `descriptionLanguage2` text,
  `impact` text,
  `impactLanguage2` text,
  `issuetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`sea_id`)
  ) ENGINE=InnoDB AUTO_INCREMENT=125 DEFAULT CHARSET=latin1";
  $conn->query($seasonal_forecast);

 $decadal_forecast="CREATE TABLE IF NOT EXISTS `decadal` (
  `decadal_id` int(11) NOT NULL AUTO_INCREMENT,
  `advisory` text NOT NULL,
  `advisoryLanguage2` text,
  `region_name` int(11) NOT NULL,
  `state_name` varchar(100) DEFAULT NULL,
  `date_from` date NOT NULL,
  `date_to` date NOT NULL,
  `issuetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`decadal_id`)
  ) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1";
    $conn->query($decadal_forecast);

  $advisory="CREATE TABLE IF NOT EXISTS `advisory` (
  `advisory_id` int(11) NOT NULL AUTO_INCREMENT,
  `message` text,
  `message_summary` text,
  `messagelanguage2` text,
  `messagelanguage2_summary` text,
  `region_id` varchar(30) NOT NULL,
  `state_id` varchar(30) NOT NULL,
  `TS` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`advisory_id`),
  KEY `fk_region_idx` (`region_id`),
  KEY `fk_state_idx` (`state_id`)
 ) ENGINE=InnoDB AUTO_INCREMENT=260 DEFAULT CHARSET=latin1";
 $conn->query($advisory);
  $daily_forecast="CREATE TABLE IF NOT EXISTS `daily_forecast` (
  `id` double NOT NULL AUTO_INCREMENT,
  `mean_temp` double NOT NULL,
  `max_temp` double DEFAULT NULL,
  `min_temp` double DEFAULT NULL,
  `sunrise` varchar(45) DEFAULT NULL,
  `sunset` varchar(45) DEFAULT NULL,
  `wind` int(11) DEFAULT NULL,
  `wind_direction` text NOT NULL,
  `wind_strength` text NOT NULL,
  `weather` text,
  `weatherLuganda` text,
  `advisory` varchar(300) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` varchar(200) NOT NULL,
  `region_id` varchar(30) NOT NULL,
  `state_id` varchar(30) NOT NULL,
  `season_id` int(11) NOT NULL,
  `cat_id` varchar(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_region_idx` (`region_id`),
  KEY `fk_state_idx` (`state_id`),
  KEY `fk_season_idx` (`season_id`),
  KEY `fk_cat_idx` (`cat_id`)
  ) ENGINE=InnoDB AUTO_INCREMENT=283 DEFAULT CHARSET=latin1";
 $conn->query($daily_forecast);
   $feedback="CREATE TABLE IF NOT EXISTS `feedback` (
  `record_id` int(11) NOT NULL AUTO_INCREMENT,
  `names` varchar(100) NOT NULL,
  `state_name` text NOT NULL,
  `region_name` text NOT NULL,
  `observation` text NOT NULL,
  `implication` text NOT NULL,
  `action_to_take` text NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`record_id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1";
 $conn->query($feedback);
 $user_feedback="CREATE TABLE IF NOT EXISTS `user_feedback` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `region_name` varchar(20) NOT NULL,
  `category` varchar(20) NOT NULL,
  `accuracy` int(2) NOT NULL,
  `applicability` int(2) NOT NULL,
  `timeliness` int(2) NOT NULL,
  `generalComment` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1";
$conn->query($user_feedback);
 }else{

 }

if ($conn->query($admin) === TRUE) {
    echo "Table admin created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

//$conn->close();
}
?>