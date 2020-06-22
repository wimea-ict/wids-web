<!DOCTYPE html>
<html><head>
         <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
		
		<!-- Global site tag (gtag.js) - Google Analytics -->
        
        <style>
        /*********************Amoko********************/
/*css for the forecast*/
#daily_forecast{
  margin-top: 20px;
  background-color: white;
  width: 78%;
  /*overflow-y: scroll;*/
  border-top: 2px solid #d2d6de;
  margin-left: 2%;
  padding-top: 15px;
  padding-left: 30px;
  padding-right: 30px;
  border-bottom: 2px solid #d2d6de;
  padding-bottom: 20px;
  /*padding-top: 10px;*/
}

#daily_forecast_desc_und{background-color: cornflowerblue;height: 2px; margin-bottom:10px;width: 150px;}
#daily_forecast_head{margin-top: 20px}
/*********************Amoko********************/
     .tabs{
        height:auto;
        margin:0 auto;
      }

/* tab list item */
.tabs .tabs-list{
    list-style:none;
    margin:0px;
    padding:0px;
}
.tabs .tabs-list li{
    width:160px;
    float:left;
    margin:0px;
    margin-right:2px;
    padding:10px 5px;
    text-align: center;
    background-color:cornflowerblue;
    border-radius:3px;
}
.tabs .tabs-list li:hover{
    cursor:pointer;
}
.tabs .tabs-list li a{
    text-decoration: none;
    color:white;
}

/* Tab content section */
.tabs .tab{
    display:none;
    width:86%;
    min-height:250px;
    height:auto;
    border-radius:3px;
    padding:20px 15px;
    background-color:lavender;
    color:darkslategray;
    clear:both;
}
.tabs .tab h3{
    border-bottom:3px solid cornflowerblue;
    letter-spacing:1px;
    font-weight:normal;
    padding:5px;
}
.tabs .tab p{
    line-height:20px;
    letter-spacing: 1px;
}


/* When active state */
.active{
    display:block !important;
}
.tabs .tabs-list li.active{
    background-color:lavender !important;
    color:black !important;
}
.active a{
    color:black !important;
}

/* media query */
@media screen and (max-width:360px){
    .tabs{
        margin:0;
        width:96%;
    }
    .tabs .tabs-list li{
        width:180px;
    }
}
	
     .dekadal{
        margin-left:1%;
        width:90%;
        background-color:white;
     }
     .dekadal1{
        margin-left:1%;
     }
     .dekadal2{
        margin-left:2%;
     }
    
     /*******************************************************/
#seasonal_forecast{
  margin-top: 20px;
  background-color: white;
  width: 70%;
  /*overflow-y: scroll;*/
  border-top: 4px solid #d2d6de;
  margin-left: 5%;
  padding-top: 15px;
  padding-left: 80px;
  padding-right: 80px;
  border-bottom: 2px solid #d2d6de;
  padding-bottom: 20px;
  /*padding-top: 10px;*/
}
.season_head{
  font-weight: bold;
  text-align: center;
  font-size: 16px;
}
.season_sub_head{
  font-weight: bold;
  font-size: 15px;
}
/*******************************************************/

        </style>

		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-133419491-1"></script>
		<script>
		  window.dataLayer = window.dataLayer || [];
		  function gtag(){dataLayer.push(arguments);}
		  gtag('js', new Date());

		  gtag('config', 'UA-133419491-1');
		</script>

        <title>Weather Information Dissemination System</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.5 -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/frameworks/bootstrap/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">-->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/frameworks/font-awesome/css/font-awesome.min.css">
        <!-- Ionicons -->
        <!--<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">-->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/frameworks/ionicons/css/ionicons.min.css">
        <!-- DataTables -->
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/datatables/dataTables.bootstrap.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/frameworks/adminlte/css/adminlte.min.css">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/frameworks/adminlte/css/skins/_all-skins.min.css">
    		<!--begin page css link-->
         <link rel="stylesheet" href="<?php echo base_url() ?>assets/frameworks/adminlte/css/begin.css">
         <link rel="stylesheet" href="<?php echo base_url() ?>assets/frameworks/adminlte/css/styles.css">
         <link rel="stylesheet" href="<?php echo base_url() ?>assets/frameworks/adminlte/css/widgets.css">
         <link rel="stylesheet" href="<?php echo base_url() ?>assets/frameworks/adminlte/css/animate.css">

        <!-- jQuery 2.1.4 -->
        <script src="<?php echo base_url() ?>assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
        <!-- Bootstrap 3.3.5 -->
        <script src="<?php echo base_url() ?>assets/frameworks/bootstrap/js/bootstrap.min.js"></script>
        <!-- DataTables -->
        <script src="<?php echo base_url() ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url() ?>assets/plugins/datatables/dataTables.bootstrap.min.js"></script>
        <!-- SlimScroll -->
        <script src="<?php echo base_url() ?>assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
        <!-- FastClick -->
        <script src="<?php echo base_url() ?>assets/plugins/fastclick/fastclick.min.js"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo base_url() ?>assets/frameworks/adminlte/js/app.min.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="<?php echo base_url() ?>assets/frameworks/adminlte/js/demo.js"></script>
        <!-- notifying -->
        <script src="<?php echo base_url() ?>assets/plugins/notify/notify.min.js"></script>
		<style>


		   .wrapper{
			   background-image: url("<?php echo base_url() ?>assets/frameworks/adminlte/img/trythis.jpg");

		   }
		   .main-sidebar{
			   background-image: url("<?php echo base_url() ?>assets/frameworks/adminlte/img/trythis.png");
                         
		   }

		</style>
      <script type="text/javascript">
$(document).ready(function(){

  $(".tabs-list li a").click(function(e){
     e.preventDefault();
  });

  $(".tabs-list li").click(function(){
     var tabid = $(this).find("a").attr("href");
     $(".tabs-list li,.tabs div.tab").removeClass("active");   // removing active class from tab

     $(".tab").hide();   // hiding open tab
     $(tabid).show();    // show tab
     $(this).addClass("active"); //  adding active class to clicked tab

  });

});
</script>


    </head>
	<body class="hold-transition skin-blue sidebar-mini" >
		<div class = "wrapper" style="background-color:lavender;" >
		   <div class="row" >
        <!-- Makes the top bar fixed -->
         <header class="main-header" style="position: fixed;width: 100%;margin-left: 15px">
							     <a href="#" class="logo">
                                <!-- mini logo for sidebar mini 50x50 pixels -->
                                <span class="logo-mini"><b>W</b>IDS</span>
                                <!-- logo for regular state and mobile devices -->
                                <span class="logo-lg" ><h5>WEATHER INFORMATION DISSEMINATION SYSTEM</h5></span>
                            </a>
                            <!-- Header Navbar: style can be found in header.less -->
                            <nav class="navbar navbar-static-top" role="navigation">
                                <!-- Sidebar toggle button-->
                                
                                <div class="navbar-custom-menu">
                                
                                    <ul class="nav navbar-nav">
                                        <li style=" text-align:left; padding-top:15px"> <small>                                        
                                           <form method="post" action="<?php site_url('index.php/auth/index') ?>"><span style="color:white;font-weight:bold">Language:
                                        </span> <select name="language" onChange="submit()">
                                           <?php 
					  if(isset($languages)){
						  foreach($languages as $fd){
							  ?>
                              <option value="<?php echo $fd->name; ?>"><?php echo $fd->name; ?></option>
                              <?php 							  
						  }						  
						}					
					?>  </select>                            
                                        
                                        </form> </small> </li>
                                        <li><?php echo anchor(site_url('index.php'), "<span class='glyphicon glyphicon-user'></span>" . strtoupper('home'));?></li>
                                        <li><?php echo anchor(site_url('index.php/Map/index'), "<span class='glyphicon glyphicon-globe'></span>" . strtoupper('Live Map'));?></li>

                                        <li><?php echo anchor(site_url('index.php/auth/load_login'), "<span class='glyphicon glyphicon-log-in'></span>" . strtoupper('Login'));?></li>

                                       <li>
                                            <a href="#" data-toggle="control-sidebar"><!--<i class="fa fa-gears"></i>--></a>
                                        </li>
                                    </ul>
                                </div>
                            </nav>


				   </header>
	  
      <aside class="main-sidebar" style="position: fixed;">
              <section class="sidebar">
				<div class="col-md-12" >
  		       <header> <h4><span class="test1"> <?php echo $request_service_form; ?> </span></h4> </header>
		<?php if($this->session->flashdata('success')){?>
			      <div class = "alert alert-success"><?php echo $this->session->flashdata('success');?></div>
		   <?php }
			echo form_open('index.php/auth/index/');
			?><br/>
            <form method="post" action="<?php site_url('index.php/auth/index') ?>">
              <div class="test1 control-group">
                      <label class="control-label" for="Sub" id="opt_type_2"> Select <?php echo $division_type; ?></label>
                         <div class="controls">                             
							<select name = "division" id="division" class = "form-control" required>
                                <option value="">Select <?php echo $division_type; ?> </option>                            
                              <?php

                                $dd = "SELECT * FROM division order by division_name ASC";
                                $ddd = $this->db->query($dd);
                                foreach ($ddd->result_array() as $rowss) { ?>
                        <option value="<?php echo $rowss['id']; ?>"><?php echo $rowss['division_name']; ?></option>
                    <?php } ?>                  
                             </select>
                        </div>
                    </div>
			<br/>
            <div class="control-group">
			      <label class="control-label" for = "Slung" >Select Category</label>
				  <div class="controls">
			        <select name = 'category1' id="category1" class="form-control">
						  
						  <option value= "Agriculture advisory"  >Agriculture & Food Security</option>
             <option value= "Water advisory" >Water advisory</option>
             <option value= "Food advisory" >Disaster Preparedness</option>
             <option value= "Health advisory" >Health advisory</option>
						  <option value= "Weather Forecast"  >Weather Forecast </option>
             <option value= "Offer feedback"  >Suggest forecast </option>

			</select>
			   </div>
			</div>
			<br/>
            <div class="control-group">
			      <label class="control-label" for = "option" id = "opt_type" >Select sub Catergory</label>
				  <div class="controls">
			    <select name = 'product'  id="product" class="form-control" >
                    
                   options="<option value = 5 >Planting Advice</option>
        <option value = 6 >Harvesting Advice</option>
        <option value = 7 >Pests and Diseases</option>
        <!--<option value = 10 >Food advisory</option> -->
			     </select>
			   </div>
			</div>
			<br/>
           
			<div class="control-group">
				  <div class="controls">
				<button type="submit" name="request_s" class="btn btn-info"><i class="fa fa-hand-rock-o" aria-hidden="true"></i>&nbsp;Request</button>
		  </div>
                </form>
     
		  </div>
		</div>
		<br/>
	   </div>
	   </section>
	</aside>
      
	<div class="content-wrapper" style=" width:100%;">
	  <div class="col-md-12" style=" height:100%;" >
    
         <section class="content-header" style="margin-top: 4%;" >
                <h1 style="margin-left: 5%">Welcome to  <?php if(isset($category1)){ echo "WIDS ". $category1;}else{echo "Weather Information Dissemination System";} ?> </h1>
           </section>

            <?php   
         //Get Division_Name for currently displaying information
         if(isset($division_name)){
            foreach($division_name as $dn){
             $div_name = $dn->division_name;
            }
         }
         //-----------------------------------------
            if(isset($daily_forecast_data)){ 
              foreach($daily_forecast_data as $d){
			   $date = $d->date;
				$weather = $d->weather;
				$issuedate = $d->issuedate;	
				$validitydate = $d->validitytime;			
			  }
		    }
           $Currentdate = date('Y-m-d');
        ?> 
       <?php if ( $category1 == "Agriculture advisory") {
            $this->load->view('show_audio_advise');
        } else if( $category1 == "Food advisory") {
           //---disasater preparedness----------
        } else if($category1 == "Water advisory") {
          //-----water advisory-------------
       $data['advice'] = 'water';
        $data['division'] = $div_name;
        $this->load->view('advisory_display',$data);
        } else if($category1 == "Health advisory"){

        $data['advice'] = 'health';
        $data['division'] = $div_name;
        $this->load->view('advisory_display',$data); 

        }else if($category1 == "Weather Forecast"){ //echo $category2;?>
        
    <!===================================================================================>
     <?php if($category2 == "Daily Forecast"){ ?>
     <div id="daily_forecast">
      <a  href ="<?php site_url('index.php/auth/index') ?>" style="margin-left:100%;" class="glyphicon glyphicon-remove-sign"> </a>
        <h4>Daily Forecast for <?php echo $div_name;  ?>
                <div style="background-color: cornflowerblue;height: 2.5px;margin-top: 10px; width: 100%;"></div>
          </h4>
          <?php $count = 0; foreach($daily_forecast_region_data_home as $fd){$now= $fd->issuedate; $count ++;}
              if($now == date('Y-m-d') && $count>0){
               ?>

                        <h5 id='daily_forecast_head'>Today's Forecast</h5>
                        <div id='daily_forecast_desc_und'></div>
                        <h5>Issued on:&nbsp; <?php echo date('jS F Y', strtotime( $fd->issuedate))?></h5>
                        <p>Weather Summary:&nbsp;<br><ul><?php  foreach($daily_forecast_region_data as $fd){ echo '<li>'.$fd->weather.'</li>';}    ?></ul></p><br>
                        <table width="100%" height="100%" >
                            <tr>
                              <th>Time</th>
                                <th>Weather</th>
                              <th>Max Temp</th>
                                <th>Min Temp</th>
                                <th>Mean Temp</th>
                                <th>Wind Speed</th>
                                <th>Wind Direction</th>        
                                <th>Wind Strength</th>                              
                            </tr>
                            <?php 
                           if(isset($daily_forecast_region_data)){
                          foreach($daily_forecast_region_data as $fd){ ?>
                              <tr>
                                <td><?php  echo $fd->time.'<br>'; 
                                if($fd->time=="Early Morning") echo '12:00am - 06:00am';
                                else if($fd->time=="Late Morning") echo "06:00am - 12:00pm"; 
                                else if($fd->time=="Afternoon") echo "12:00pm -06:00pm"; 
                                else echo "06:00pm-12:00am"; ?></td>
                                  <td><img src="<?php echo base_url() ?>assets/frameworks/adminlte/<?php echo $fd->img ?>" height="50" width="50">
                                    <br><?php echo $fd->cat_name;  ?></td>
                                  <td><?php  if($fd->max_temp==0){print('-');}else{echo $fd->max_temp; ?> &deg;C <?php } ?></td>
                                  <td><?php if($fd->min_temp==0){print('-');}else{echo $fd->min_temp;?> &deg;C <?php }  ?></td>
                                  <td><?php echo $fd->mean_temp; ?> &deg;C</td>
                                  <td><?php echo $fd->wind; ?></td>    
                                  <td><?php echo $fd->wind_direction; ?></td>          
                                  <td><?php echo $fd->wind_strength; ?></td>               
                              </tr>
                           <?php  
                          
                         
                           }  } ?>
                          </table>
                          <h5>Valid till : &nbsp; <strong style="color:red"><?php echo $validitydate; ?></strong></h5>
                        
                      <?php
                      if($tomorrow == date('Y-m-d', strtotime(' +1 day'))){
                          ?>
                            <h5 id='daily_forecast_head'>Tomorrow's Forecast</h5>
                            <div id='daily_forecast_desc_und'></div>
                            <h5>Issued on:&nbsp; <?php echo date('jS F Y', strtotime( $issuedate))?></h5>
                            <p>Weather Summary:&nbsp;<br><ul><?php  foreach($daily_forecast_region_data as $fd){ echo '<li>'.$fd->weather.'</li>';}    ?></ul></p><br>
                            <table width="100%" height="100%" >
                                  <tr>
                                    <th>Time</th>
                                      <th>Weather</th>
                                    <th>Max Temp</th>
                                      <th>Min Temp</th>
                                      <th>Mean Temp</th>
                                      <th>Wind Speed</th>
                                      <th>Wind Direction</th>        
                                      <th>Wind Strength</th>                              
                                  </tr>
                                  <?php 
                                 if(isset($next_day_forecast_data)){
                                foreach($get_next_day_forecast_data_for_region as $fd){ ?>
                                    
                                    <tr>
                                      <td><?php  echo $fd->time.'<br>'; 
                                      if($fd->time=="Early Morning") echo '12:00am - 06:00am';
                                      else if($fd->time=="Late Morning") echo "06:00am - 12:00pm"; 
                                      else if($fd->time=="Afternoon") echo "12:00pm -06:00pm"; 
                                      else echo "06:00pm-12:00am"; ?></td>
                                        <td><img src="<?php echo base_url() ?>assets/frameworks/adminlte/<?php echo $fd->img ?>" height="50" width="50">
                                          <br><?php echo $fd->cat_name;  ?></td>
                                        <td><?php  if($fd->max_temp==0){print('-');}else{echo $fd->max_temp; ?> &deg;C <?php } ?></td>
                                        <td><?php if($fd->min_temp==0){print('-');}else{echo $fd->min_temp;?> &deg;C <?php }  ?></td>
                                        <td><?php echo $fd->mean_temp; ?> &deg;C</td>
                                        <td><?php echo $fd->wind; ?></td>    
                                        <td><?php echo $fd->wind_direction; ?></td>          
                                        <td><?php echo $fd->wind_strength; ?></td>               
                                    </tr>
                                 <?php                                 
                                 }  } ?>
                                </table>
                                <h5>Valid till : &nbsp; <strong style="color:red"><?php echo $valid; ?></strong></h5>
                            
                          <?php
                        }
              }else{
                echo "<p>Data has not yet been uploaded. Please try again later.</p>";
              }
               
              ?>
              
            
      </div> 
 <!------------------------------DEKADAL REQUEST DATA--------------  -------------------------------------->
       <?php }else if($category2 == "Dekadal Forecast"){
          //print_r($dekadal_forecast_data);exit();
          $count = 0; $flag = false;
          foreach($dekadal_forecast_data as $dekadal){
            
           ?>
           <div id="seasonal_forecast">
           <a  href ="<?php site_url('index.php/auth/index') ?>" style="margin-left:100%;" class="glyphicon glyphicon-remove-sign"> </a>
              <h5>TEN DAY FORECAST FOR <?php  $count++; echo $dekadal['region_name'];?> REGION: (<?php echo date('jS ', strtotime( $dekadal['date_from']))." - ".date('jS ', strtotime( $dekadal['date_to'])).', '.date('F Y', strtotime( $dekadal['date_to'])); ?>)
                <div style="background-color: cornflowerblue;height: 3px;margin-top: 10px; width: 90%;"></div>
              </h4>
                      <p class="season_sub_head">1.0  General Forecast</p>
                      <p class="season_content"><?php echo $dekadal['general_info']  ?></p>
                     <p align="center"><strong><?php echo $dekadal['region_name']; ?> REGION RAINFALL FORECAST: (<?php echo $dekadal['date_from']." to ".$dekadal['date_to']; ?>)</strong><br><img src="<?php echo base_url() ?>assets/frameworks/adminlte/dekadal_maps/<?php echo $dekadal['mapurl'] ?>" height="60%" width="60%"></p><br>
                       <p class="season_sub_head">Rainfall</p>
                      <p class="season_content">  <?php echo $dekadal['rainfall']  ?></p>
                 <center>     
                <br/>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#feedbackModal"> Send FeebBack </button>
                </center>
                <!-- END OF BUTTON TO TRIGGER FEEDBACK FORM -->

              <?php    } $flag = true;
            //endforeach;
              if(($count < 1) || ($flag == false)) echo "<p> Data has not yet been uploaded. Please try again later.</p>"; ?>
           </div>
      <br><br>  
           <?php
       } else if($category2 == "Seasonal Forecast"){ ?>
        <!-------------------------------SEASONAL REQUEST DATA-------------  -------------------------------------->
     <div id="seasonal_forecast">
     <a  href ="<?php site_url('index.php/auth/index') ?>" style="margin-left:100%;" class="glyphicon glyphicon-remove-sign"> </a>
              <h4>Seasonal Forecast for <?php echo $divisio_name ?>
                <div style="background-color: cornflowerblue;height: 3px;margin-top: 10px; width: 50%;"></div>
              </h4>
               <?php $count = 0; $flag = false; foreach ($seasonal_data as $Seasonal){ ?> <?php $count++; 
      $months  = array('JANUARY','FEBRUARY','MARCH','APRIL', 'MAY','JUNE','JULY', 'AUGUST', 'SEPTEMBER','OCTOBER','NOVEMBER', 'DECEMBER');
                  $date_struct = explode('-', $Seasonal['issuetime']);
                     // New code to check the season we are in before displaying data for the season currently available in the database
                     $season = "unknown";
                     if((date('m') == 1) || (date('m') == 2)) $season = 'JF';
                     else if((date('m') == 3) || (date('m') == 4)  || (date('m') == 5) ) $season = 'MAM';
                     else if ((date('m') == 6) || (date('m') == 7)  || (date('m') == 8) ) $season = 'JJA';
                     else $season = 'SOND';
   
                     // Thie check the year and season we are currently in before desiding to display anything
                    if(date('Y') == $Seasonal['year'] && ($Seasonal['abbreviation']) == $season){
     ///////////////////////////// Amoko////////////////////////////

                  ?>

                <p style="font-weight: bold;font-size: 16px;">Date: <?php
                    echo date('jS F Y', strtotime($Seasonal['issuetime']));
                    // echo $date_struct[2].' '.$months[$date_struct[1]-1].' '.$date_struct[0]  ?></p>
                    <p class="season_head"><?php $m = '';
                    if( $Seasonal['abbreviation'] == 'SOND') $m = 'SEPTEMBER-OCTOBER-NOVEMBER AND DECEMBER'; 
                    else if( $Seasonal['abbreviation'] == 'MAM') $m = 'MARCH-APRIL AND MAY'; 
                    else if( $Seasonal['abbreviation'] == 'JJA') $m = 'JUNE-JULY AND AUGUST'; 
                    else if( $Seasonal['abbreviation'] == 'JF') $m = 'JANUARY AND FEBRUARY'; 
                      echo $m.' ('.$Seasonal['abbreviation'].') '.$Seasonal['year']; ?><br>SEASONAL RAINFALL OUTLOOK OVER UGANDA</p>
                      <p class="season_sub_head">1.0  Overiew</p>
                      <p class="season_content"><?php echo $Seasonal['overview']  ?></p>
                      <p class="season_sub_head">2.0  General Forecast</p>
                      <p class="season_content"><?php echo $Seasonal['general_forecast']  ?></p>
                      <p align="center"><img src="<?php echo base_url() ?>assets/frameworks/adminlte/img/<?php echo $Seasonal['map'] ?>" height="80%" width="80%"></p><br>
                      <p class="season_sub_head">2.1.0  <?php echo $Seasonal['region_name']  ?> Region</p>
                      <p class="season_sub_head">2.2.1   <?php echo $Seasonal['sub_region_name']  ?></p>
                      <p> <?php echo $Seasonal['overall_comment']  ?> </p>

              <?php    $flag = true;  }

                 }
              if(($count < 1) || ($flag == false)) echo "<p>Data has not yet been uploaded. Please try again later.</p>"; ?>
           </div>
	 <!---------------------------------------------------- end of seasonal request data --------------------------------------->


		   <?php }?>  
		<!====================================================================================>
		  <?php 
		 }else { ?>
			 
	  <div class="tabs">
		<ul class="tabs-list">
		  <li class="active"><a href="#tab1">Daily Forecast</a></li>
		  <li ><a href="#tab3">Dekadal Forecast</a></li>
		  <li ><a href="#tab2">Seasonal Forecast</a></li>
		</ul>
		<div id="tab1" class="tab active" >
	   <!--------------------------------------------  -------------------------------------------->
		  <div id="daily_forecast">
			<a  href ="<?php site_url('index.php/auth/index') ?>" style="margin-left:100%;" class="glyphicon glyphicon-remove-sign"> </a>
			  <h4>Daily Forecast for <?php echo $div_name;  ?>
					  <div style="background-color: cornflowerblue;height: 2.5px;margin-top: 10px; width: 100%;"></div>
			   </h4>
					<?php $count = 0; foreach($daily_forecast_region_data_home as $fd){$now= $fd->issuedate; $count ++;}
					if($now == date('Y-m-d') && $count>0){
					?>

                          <h5 id='daily_forecast_head'>Today's Forecast: <?php echo date('jS F Y', strtotime(' +0 day'))?></h5>
                          <div id='daily_forecast_desc_und'></div>
                          <h5>Issued on:&nbsp; <?php echo date('jS F Y', strtotime( $fd->issuedate))?></h5>
                          <p>Weather Summary:&nbsp;<br><ul><?php  foreach($daily_forecast_region_data_home as $fd){ echo '<li>'.$fd->weather.'</li>';}    ?></ul></p><br>
                          <table width="100%" height="100%" >
                              <tr>
                                <th>Time</th>
                                  <th>Weather</th>
                                <th>Max Temp</th>
                                  <th>Min Temp</th>
                                  <th>Mean Temp</th>
                                  <th>Wind Speed</th>
                                  <th>Wind Direction</th>        
                                  <th>Wind Strength</th>                              
                              </tr>
                              <?php 
                            if(isset($daily_forecast_region_data_home)){
                            foreach($daily_forecast_region_data_home as $fd){ ?>
                                <tr>
                                  <td><?php  echo $fd->time.'<br>'; 
                                  if($fd->time=="Early Morning") echo '12:00am - 06:00am';
                                  else if($fd->time=="Late Morning") echo "06:00am - 12:00pm"; 
                                  else if($fd->time=="Afternoon") echo "12:00pm -06:00pm"; 
                                  else echo "06:00pm-12:00am"; ?></td>
                                    <td><img src="<?php echo base_url() ?>assets/frameworks/adminlte/<?php echo $fd->img ?>" height="50" width="50">
                                      <br><?php echo $fd->cat_name;  ?></td>
                                    <td><?php  if($fd->max_temp==0){print('-');}else{echo $fd->max_temp; ?> &deg;C <?php } ?></td>
                                    <td><?php if($fd->min_temp==0){print('-');}else{echo $fd->min_temp;?> &deg;C <?php }  ?></td>
                                    <td><?php echo $fd->mean_temp; ?> &deg;C</td>
                                    <td><?php echo $fd->wind; ?></td>    
                                    <td><?php echo $fd->wind_direction; ?></td>          
                                    <td><?php echo $fd->wind_strength; ?></td>               
                                </tr>
                            <?php  
                            
                          
                            }  } ?>
                            </table>
                            <h5>Valid till : &nbsp; <strong style="color:red"><?php echo $fd->validitytime; ?></strong></h5>
                          
                        <?php
                        if($tomorrow == date('Y-m-d', strtotime(' +1 day'))){
                            ?>
                              <h5 id='daily_forecast_head'>Tomorrow's Forecast: <?php echo date('jS F Y', strtotime(' +1 day'))?></h5>
                              <div id='daily_forecast_desc_und'></div>
                              <h5>Issued on:&nbsp; <?php echo date('jS F Y', strtotime('+1 day'));?></h5>
                              <p>Weather Summary:&nbsp;<br><ul><?php  foreach($daily_forecast_region_data_home as $fd){ echo '<li>'.$fd->weather.'</li>';}    ?></ul></p><br>
                              <table width="100%" height="100%" >
                                    <tr>
                                      <th>Time</th>
                                        <th>Weather</th>
                                      <th>Max Temp</th>
                                        <th>Min Temp</th>
                                        <th>Mean Temp</th>
                                        <th>Wind Speed</th>
                                        <th>Wind Direction</th>        
                                        <th>Wind Strength</th>                              
                                    </tr>
                                    <?php 
                                  if(isset($get_next_day_forecast_data_for_region_home)){
                                  foreach($get_next_day_forecast_data_for_region_home as $fd){ ?>
                                      
                                      <tr>
                                        <td><?php  echo $fd->time.'<br>'; 
                                        if($fd->time=="Early Morning") echo '12:00am - 06:00am';
                                        else if($fd->time=="Late Morning") echo "06:00am - 12:00pm"; 
                                        else if($fd->time=="Afternoon") echo "12:00pm -06:00pm"; 
                                        else echo "06:00pm-12:00am"; ?></td>
                                          <td><img src="<?php echo base_url() ?>assets/frameworks/adminlte/<?php echo $fd->img ?>" height="50" width="50">
                                            <br><?php echo $fd->cat_name;  ?></td>
                                          <td><?php  if($fd->max_temp==0){print('-');}else{echo $fd->max_temp; ?> &deg;C <?php } ?></td>
                                          <td><?php if($fd->min_temp==0){print('-');}else{echo $fd->min_temp;?> &deg;C <?php }  ?></td>
                                          <td><?php echo $fd->mean_temp; ?> &deg;C</td>
                                          <td><?php echo $fd->wind; ?></td>    
                                          <td><?php echo $fd->wind_direction; ?></td>          
                                          <td><?php echo $fd->wind_strength; ?></td>               
                                      </tr>
                                      
                                  <?php                                 
                                  }  } ?>
                                  </table>
                                  <h5>Valid till : &nbsp; <strong style="color:red"><?php echo $fd->validitytime; ?></strong></h5>
                                  <p>
                                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#feedbackModal"> Send FeebBack </button>
                                  </p> 
                            <?php
                          }
                }else{
                  echo "<p>Data has not yet been uploaded. Please try again later.</p>";
                }
                
                ?>
                
              
        </div>
 <!-------------------------------------------- -------------------------------------------->
  </div>
  <!-------------------------- DEKADAL TAB------------------------------------------------------->
  <div id="tab3" class="tab">
        <?php 
        $dekadal_forecast_data= $this->Decadal_forecast_model->get_dekadal_forecast_area(2);
        // print_r($dekadal_forecast_data);exit();

          $count = 0; $flag = false;
                foreach($dekadal_forecast_data as $dekadal){
                  
                ?>
                <div id="seasonal_forecast">
                    <h5>TEN DAY FORECAST FOR <?php  $count++; echo $dekadal['region_name'];?> REGION: (<?php echo date('jS ', strtotime( $dekadal['date_from']))." - ".date('jS ', strtotime( $dekadal['date_to'])).', '.date('F Y', strtotime( $dekadal['date_to'])); ?>)
                      <div style="background-color: cornflowerblue;height: 3px;margin-top: 10px; width: 90%;"></div>
                    </h4>
                            <p class="season_sub_head">1.0  General Forecast</p>
                            <p class="season_content"><?php echo $dekadal['general_info']  ?></p>
                          <h6 align="center"><strong><?php echo $dekadal['region_name']; ?> REGION RAINFALL FORECAST: (<?php echo $dekadal['date_from']." to ".$dekadal['date_to']; ?>)</strong></h6><p align="center"><img src="<?php echo base_url() ?>assets/frameworks/adminlte/dekadal_maps/<?php echo $dekadal['mapurl'] ?>" height="80%" width="80%"></p><br>
                            <p class="season_sub_head">2.0 Rainfall</p>
                            <p class="season_content">  <?php echo $dekadal['rainfall']  ?></p>
                      <p class="season_sub_head">     
                      <br/>
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#feedbackModal"> Send FeebBack </button>
                      </p>

                    <?php    } $flag = true;
                  //endforeach;
                    if(($count < 1) || ($flag == false)) echo "<p>Data has not yet been uploaded. Please try again later.</p>"; ?>
                
            </div>
    </div>
<div id="tab2" class="tab">
        
          <!-------------------------------SEASONAL REQUEST DATA-------------  -------------------------------------->
          <div id="seasonal_forecast">
          <a  href ="<?php site_url('index.php/auth/index') ?>" style="margin-left:100%;" class="glyphicon glyphicon-remove-sign"> </a>
                    <h4>Seasonal Forecast for <?php echo $divisio_name ?>
                      <div style="background-color: cornflowerblue;height: 3px;margin-top: 10px; width: 50%;"></div>
                    </h4>
                    <?php $count = 0; $flag = false; foreach ($seasonal_data_home as $Seasonal){ ?> <?php $count++; 
                     $months  = array('JANUARY','FEBRUARY','MARCH','APRIL', 'MAY','JUNE','JULY', 'AUGUST', 'SEPTEMBER','OCTOBER','NOVEMBER', 'DECEMBER');
                        $date_struct = explode('-', $Seasonal['issuetime']);
                          // New code to check the season we are in before displaying data for the season currently available in the database
                          $season = "unknown";
                          if((date('m') == 1) || (date('m') == 2)) $season = 'JF';
                          else if((date('m') == 3) || (date('m') == 4)  || (date('m') == 5) ) $season = 'MAM';
                          else if ((date('m') == 6) || (date('m') == 7)  || (date('m') == 8) ) $season = 'JJA';
                          else $season = 'SOND';
        
                          // Thie check the year and season we are currently in before desiding to display anything
                          if(date('Y') == $Seasonal['year'] && ($Seasonal['abbreviation']) == $season){
                          ///////////////////////////// ////////////////////////////

                        ?>

                      <p style="font-weight: bold;font-size: 16px;">Date: <?php
                          echo date('jS F Y', strtotime($Seasonal['issuetime']));
                          // echo $date_struct[2].' '.$months[$date_struct[1]-1].' '.$date_struct[0]  ?></p>
                          <p class="season_head"><?php $m = '';
                          if( $Seasonal['abbreviation'] == 'SOND') $m = 'SEPTEMBER-OCTOBER-NOVEMBER AND DECEMBER'; 
                          else if( $Seasonal['abbreviation'] == 'MAM') $m = 'MARCH-APRIL AND MAY'; 
                          else if( $Seasonal['abbreviation'] == 'JJA') $m = 'JUNE-JULY AND AUGUST'; 
                          else if( $Seasonal['abbreviation'] == 'JF') $m = 'JANUARY AND FEBRUARY'; 
                            echo $m.' ('.$Seasonal['abbreviation'].') '.$Seasonal['year']; ?><br>SEASONAL RAINFALL OUTLOOK OVER UGANDA</p>
                            <p class="season_sub_head">1.0  Overiew</p>
                            <p class="season_content"><?php echo $Seasonal['overview']  ?></p>
                            <p class="season_sub_head">2.0  General Forecast</p>
                            <p class="season_content"><?php echo $Seasonal['general_forecast']  ?></p>
                            <p align="center"><img src="<?php echo base_url() ?>assets/frameworks/adminlte/img/<?php echo $Seasonal['map'] ?>" height="80%" width="80%"></p><br>
                            <p class="season_sub_head">2.1.0  <?php echo $Seasonal['region_name']  ?> Region</p>
                            <p class="season_sub_head">2.2.1   <?php echo $Seasonal['sub_region_name']  ?></p>
                            <p> <?php echo $Seasonal['overall_comment']  ?> </p>
                            <p class="season_sub_head">     
                      <br/>
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#feedbackModal"> Send FeebBack </button>
                      </p>

                    <?php    $flag = true;  }

                      }
                    if(($count < 1) || ($flag == false)) echo "<p>Data has not yet been uploaded. Please try again later.</p>"; ?>
                </div>
		  <!---------------------------------------------------- end of seasonal request data --------------------------------------->

				</div>
				<?php } ?>   
			 </div>
		 
	  
    </div>
 </div>

        <footer class="main-footer" style="margin-top:180px;">
               <div class="pull-right hidden-xs">
                    <b>Version</b>
                    <?php
                        echo $this->config->item('dissemination_version');
                    ?>
                   </div>
                <strong>Copyright &copy; <?php echo date('Y');?>  <a href="http://wimea.mak.ac.ug/" target="_blank">WIMEA-ICT</a>.</strong> All rights reserved.
            </footer>
       </div>
        <!-- START OF HENRY DIV FOR FEEDBACK FORM -->


                               <!-- Modal -->
<div class="modal fade" id="feedbackModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title" style="text-align: center">Feedback Form</h3>
      </div>
      <div class="modal-body">
      <form method="POST">
			<div class="form-group row">
				<label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">Division </label>
				<div class="col-sm-8">
				<select name="districtName" id="districtName" class = "form-control" >
                          <?php

                            $dd = "SELECT * FROM division order by division_name ASC";
                            $ddd = $this->db->query($dd);
                            foreach ($ddd->result_array() as $rowss) { ?>
                                <option value="<?php echo $rowss['id']; ?>"><?php echo $rowss['division_name']; ?></option>
                            <?php } ?>         

           </select>
				</div>
			</div>
			<div class="form-group row">
				<label for="colFormLabel" class="col-sm-4 col-form-label">Sector</label>
				<div class="col-sm-8">
				<select name="CategoryName" id="CategoryName" class = "form-control" >
                
				<option>Weather Forecast(Daily Forecast)</option>
				</select>
				</div>
			</div>
			<div class="form-group row">
				<label for="colFormLabelLg" class="col-sm-4 col-form-label col-form-label-lg">Accuracy Level</label>
				<div class="col-sm-8">
				<select name="accuracy" id="accuracy" class="form-control">
				<option>10</option>
				<option>9</option>
				<option>8</option>
				<option>7</option>
				<option>6</option>
				<option>5</option>
				<option>4</option>
				<option>3</option>
				<option>2</option>
				<option>1</option>
				</select>
				</div>
			</div>
			<div class="form-group row">
				<label for="colFormLabelLg" class="col-sm-4 col-form-label col-form-label-lg">Applicability</label>
				<div class="col-sm-8">
				<select name="applicability" id="applicability" class="form-control">
				<option>10</option>
				<option>9</option>
				<option>8</option>
				<option>7</option>
				<option>6</option>
				<option>5</option>
				<option>4</option>
				<option>3</option>
				<option>2</option>
				<option>1</option>
				</select>
				</div>
			</div>
			<div class="form-group row">
				<label for="colFormLabelLg" class="col-sm-4 col-form-label col-form-label-lg">Timeliness</label>
				<div class="col-sm-8">
				<select name="timeliness" id="timeliness" class="form-control">
				<option>10</option>
				<option>9</option>
				<option>8</option>
				<option>7</option>
				<option>6</option>
				<option>5</option>
				<option>4</option>
				<option>3</option>
				<option>2</option>
				<option>1</option>
				</select>
				</div>
			</div>
            <div class="form-group row">
				<label for="colFormLabelLg" class="col-sm-4 col-form-label col-form-label-lg">Contact Details(Email/Phone)</label>
				<div class="col-sm-8">
				<textarea name="contact" id="contact" class="form-control" ></textarea>
				</div>
			</div>

			<div class="form-group row">
				<label for="colFormLabelLg" class="col-sm-4 col-form-label col-form-label-lg">Comment</label>
				<div class="col-sm-8">
				<textarea name="generalComment" id="generalComment" class="form-control" required></textarea>
				</div>
			</div>
		
		</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" name="feedback_button" id="feedback_button" class="btn btn-primary" data-toggle="modal" data-target="#feedbackModal">Submit </button>
      </div>
    </div>
  </div>
</div>
	</body>
 

	
	<script>
	$(document).ready(function(){
		$('#feedback_button').click(function(){

var division = $('#division_id').val();
var category = $('#CategoryName').val();
var accuracy = $('#accuracy').val();
var applicability = $('#applicability').val();
var timeliness = $('#timeliness').val();
var generalComment = $('#generalComment').val();
var contact = $('#contact').val();

if(generalComment != ""){
	
$.ajax({		
	url:  "<?php echo site_url('index.php/User_feedback/log_userfeedback');?>",				
	type: "POST", 
	data: {'division': division, 'category':category, 'accuracy': accuracy, 'applicability' : applicability, 'timeliness': timeliness, 'generalComment' : generalComment, 'contact' : contact},

	success: function(datax){

	console.log(datax);				
	}					
});

}
else{
	alert("We really appreciate your comment. Please provide a comment !!!");
	return false;
	
}
		
});

	})
  </script>
  
  <script>
$("#category1").change(function(){
    var selection=$("#category1").val();
    if(selection== "Agriculture advisory" ){
        var opt = "Select option";
        var options="<option value = 5 >Planting Advice</option>";
            options+="<option value = 6 >Harvesting Advice</option>";
            options+="<option value = 7 >Pests and Diseases</option>";
    options+="<option value = 10 >Food advisory</option>";


        $("#opt_type").html(opt);
        $("#product").html(options);


    }else if(selection=="Food advisory"){
        var opt = "Select disaster advice";
        var options="<option value = 1 >Disaster advice</option>";


        $("#opt_type").html(opt);
        $("#product").html(options);
    }else if(selection=="Offer feedback"){
        var opt = "Suggest Forecast basing on your local knowledge";
        var options="<option>Forecast advice</option>";


        $("#opt_type").html(opt);
        $("#product").html(options);
    }else if(selection=="Water advisory"){
        var opt = "Water Advise";
        var options="<option value = 9 >water Advice</option>";


        $("#opt_type").html(opt);
        $("#product").html(options);
    }else if(selection=="Health advisory"){
        var opt = "health Advise";
        var options="<option value = 8 >health Advice</option>";


        $("#opt_type").html(opt);
        $("#product").html(options);
    }else{
        var opt = "Select Product";
        var options="<option>Daily Forecast</option>";
            options+="<option>Dekadal Forecast</option>";
            options+="<option>Seasonal Forecast</option>";

            $("#opt_type").html(opt);
        $("#product").html(options);
    }
});
</script>

    
</html>
