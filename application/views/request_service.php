<!DOCTYPE html>
<html><head>
         <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <!-- Global site tag (gtag.js) - Google Analytics -->
        
  <style>
/*css for the forecast*/
#daily_forecast{
  background-color: white;
  width: 90%;
  margin:10px auto;
  /*overflow-y: scroll;*/
  border-top: 4px solid #d2d6de;
  /*margin-left: 2%;*/
  padding-top: 15px;
  padding-left: 70px;
  padding-right: 70px;
  border-bottom: 4px solid #d2d6de;
  padding-bottom: 20px;
  /*padding-top: 10px;*/
}
h4 b {
	color: #3c8dbc;
}

#daily_forecast_desc_und{background-color: cornflowerblue;height: 2px; margin-bottom:10px;width: 150px;}
#daily_forecast_head{margin-top: 10px;font-weight: bold;}


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
    margin-top: 4px;
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
    width:100%;
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
    /*letter-spacing: 1px;*/
}


/* When active state */
.active{
    display:block !important;
    
}
.tabs .tabs-list li.active{
    background-color:lavender !important;
    color:black !important;
    /*border: 2px solid rgba(100,100,100,0.5);*/
}
.active a{
    color:black !important;
}

/* media query */

  
     .dekadal{
        margin-left:1%;
        width:100%;
        background-color:white;
     }
     .dekadal1{
        margin-left:1%;
     }
     .dekadal2{
        margin-left:2%;
     }
    
     /*******************************************************/
     table {
  border: 1px solid #ccc;
  border-collapse: collapse;
  margin: 0;
  padding: 0;
  width: 100%;
  table-layout: fixed;
}


#seasonal_forecast{
  background-color: white;
  width: 90%;
  margin:10px auto;
  /*overflow-y: scroll;*/
  border-top: 4px solid #d2d6de;
  /*margin-left: 2%;*/
  padding-top: 15px;
  padding-left: 70px;
  padding-right: 70px;
  border-bottom: 2px solid #d2d6de;
  padding-bottom: 20px;
  /*padding-top: 10px;*/
}
@media screen and (max-width:500px){
	.tabs .tabs-list li.active{
    border: 2px solid rgba(100,100,100,0.5);
}
   

   /*Responsiveness*/
  

  
  table thead {
    border: none;
    clip: rect(0 0 0 0);
    height: 1px;
    margin: -1px;
    overflow: hidden;
    padding: 0;
    position: absolute;
    width: 1px;
  }
  
  table tr {
    /*border-bottom: 3px solid #ddd;*/
    display: block;
    margin-bottom: .625em;
  }
  
  .table-bordered td {
    /*border-bottom: 1px solid #ddd;*/
    display: block;
    /*font-size: .9em;*/
    text-align: right;
  }
  
  table td::before {
    /*
    * aria-label has no advantage, it won't be read inside a table
    content: attr(aria-label);
    */
    content: attr(data-label);
    float: left;
    font-weight: bold;
    /*text-transform: uppercase;*/
  }
  
  table td:last-child {
    border-bottom: 0;
  }





    .tabs{
        margin:0;
        width:100%;
    }
    .tabs .tabs-list li{
        width:180px;
    }
    #seasonal_forecast{
    	width: 100%;
    	margin-top: -5px;
    padding-left: 20px;
    padding-right: 20px;
  }
  #daily_forecast{
    	width: 100%;
    padding-left: 0px;
    padding-right: 0px;
  }
  #daily_forecast{
  	margin-top: -5px;
	  padding-left: 20px;
	  padding-right: 20px;
	}
	/* Force table to not be like tables anymore */
	table, thead, tbody, th, td, tr { 
		display: block; 
	}
	
	/* Hide table headers (but not display: none;, for accessibility) */
	thead tr { 
		position: absolute;
		top: -9999px;
		left: -9999px;
	}
	
	tr { border: 1px solid #ccc; }
	
	td { 
		/* Behave  like a "row" */
		border: none;
		border-bottom: 1px solid #eee; 
		position: relative;
		padding-left: 50%; 
	}
	
	/*td:before { */
		/* Now like a table header */
		/*position: absolute;*/
		/* Top/left values mimic padding */
		/*top: 6px;
		left: 6px;
		width: 45%; 
		padding-right: 10px; 
		white-space: nowrap;
	}*/

	/*.table td:nth-of-type(1):before { content: "Time"; }
	.table td:nth-of-type(2):before { content: "Weather"; }
	.table td:nth-of-type(3):before { content: "Mean Temp"; }
	.table td:nth-of-type(4):before { content: "Wind Speed"; }
	.table td:nth-of-type(5):before { content: "Wind Direction"; }
	.table td:nth-of-type(6):before { content: "Wind Strength"; }*/


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
/***************************************************/
#advisory{
    margin-top: 20px;
      background-color: white;
      width: 100%;
      /*overflow-y: scroll;*/
      border-top: 2px solid #d2d6de;
      /*margin-left: 2%;*/
      padding-top: 15px;
      /*padding-left: 30px;*/
      /*padding-right: 30px;*/
      padding-bottom: 20px;
  }
    .advice_table{width: 100%}
    .advice_table tr td:first-child{width: 12%; }
  .advice_table td{padding: 10px;border: 1px solid rgb(240,240,240);vertical-align: top;}
  .advice_table th{padding: 10px;border: 1px solid rgb(240,240,240);vertical-align: top;}
  /***************************************************/
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/frameworks/gritter/css/jquery.gritter.css" />
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
<script type="text/javascript" src="<?php echo base_url() ?>assets/frameworks/gritter/js/jquery.gritter.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/frameworks/gritter/gritter-conf.js"></script>
<script type="text/javascript">
        $(document).ready(function () {
        var unique_id = $.gritter.add({
            // (string | mandatory) the heading of the notification
            title: 'ALERT NOTIFICATION!',
            // (string | mandatory) the text inside the notification
            text: ' <b/>WARNING<b/><br/> <?php  $sqlx = "SELECT AVG(d03)  AS average FROM  data";
                           $sql2= $this->db->query($sqlx);

                            $sqlx2 = "SELECT AVG(d02)  AS average FROM  data";
                           $sql4= $this->db->query($sqlx2);


                            $sqlx3 = "SELECT AVG(d01)  AS average FROM  data";
                           $sql6= $this->db->query($sqlx3);

                           foreach ($sql2->result_array() as $row1) {

                          echo" <tr> ";
                           echo" <td>EASTERN AVERAGE:".  $row1["average"]."mm</td><br/><br/>";

                           if($row1["average"] > 5){

                            echo "<td>This is a warning to the people of the EASTERN REGION, heavy rains are expected to arrive in this region and may lead to landslides in the area spanning a region of 4 miles.<br/><br/>";

                           } else{
                                echo "<td>This is a warning to the people of the WESTERN REGION, dry spells of drought are in the forcast and may last for as long as 3 months with no rain. You are advised to collect and store water and preserve water bodies.<br/><br/>";

                           }
                           
            
            } 

                           foreach ($sql4->result_array() as $row2) {

                          echo" <tr> ";
                           echo" <td>WESTERN AVERAGE:".  $row2["average"]."mm</td><br/><br/>";

                           if($row2["average"] > 5){

                            echo "<td>This is a warning to the people of the people of the EASTERN REGION, heavy rains are expected to arrive in this region and may lead to landslides in the area spanning a region of 4 miles.";

                           }
                           
            
            } 


             ?>  ',
            // (string | optional) the image to display on the left
          //  image: 'assets/img/ui-sam.jpg',
            // (bool | optional) if you want it to fade out on its own or just sit there
            sticky: false,
            // (int | optional) the time you want it to be alive for before fading out
            time: '10000',
            // (string | optional) the class name you want to apply to that specific message
            class_name: 'my-sticky-class'
        });

        return false;
        });
  </script>

    </head>
  <body class="hold-transition skin-blue sidebar-mini" style="overflow-y: hidden;">
   <?php $dist=""; ?>
    <div class = "wrapper" style="background-color:lavender; " >
       <div class="row" >
         <header class="main-header">
           <a href="#" class="logo" style="margin-left: 15px;"  >
              <!-- mini logo for sidebar mini 50x50 pixels -->
              <span class="logo-mini"><b>W</b>IDS</span>
              <!-- logo for regular state and mobile devices -->
              <span class="logo-lg" ><h5>WEATHER INFORMATION DISSEMINATION SYSTEM</h5></span>
          </a>
          <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
              <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button" style="margin-left: 15px">
                <span class="sr-only">Toggle navigation</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; WELCOME TO WEATHER INFORMATION DISSEMINATION SYSTEM (<?= strtoupper($this->config->item('country'));?>)
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>


            <div class="navbar-custom-menu" style="margin-right: 30px">
              <ul class="nav navbar-nav">
                <li><?php echo anchor(site_url('index.php'), "<span class='glyphicon glyphicon-user'></span>" . strtoupper('home'));?></li>
                <!-- <li><?php //echo anchor(site_url('index.php/Map/index'), "<span class='glyphicon glyphicon-globe'></span>" . strtoupper('Live Map'));?></li> -->

                <li><?php echo anchor(site_url('index.php/auth/load_login'), "<span class='glyphicon glyphicon-log-in'></span>" . strtoupper('Login'));?></li>
              </ul>
            </div>
                                
            </nav>
            
         </header>
         
       </div>

       <!-- Perfect location -->
       <div class="content-wrapper" style="overflow-y: scroll;height: 90vh">

           <div class="col-md-12" style="background-color: #ecf0f5;" >
             <section class="content-header" style="background-color:lavender ;padding-bottom: 10px">
                <h1 style="text-align: center;"></h1>
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

              <?php 
     if($category1 == "Daily Forecast"){ ?>
      <div id="daily_forecast" >
        <a  href ="<?php site_url('index.php/auth/index') ?>" style="float: right;" class="glyphicon glyphicon-remove-sign"> </a>
        <h4><b>DAILY FORECAST for <?php $dist=$div_name; echo strtoupper($div_name);  ?>
          <div style="background-color: cornflowerblue;height: 2.5px;margin-top: 10px; width: 100%;"></div></b>
        </h4>
        <?php $count = 0;
           foreach($daily_forecast_region_data as $fd){$now = $today; $count ++;}
              if($now == date('Y-m-d') && $count>0){ ?>
                <h5 id='daily_forecast_head'>Today's Forecast</h5>
                <div id='daily_forecast_desc_und'></div>
                <h5>Issued on:&nbsp; <?php echo date('jS F Y', strtotime( $fd->issuedate))?></h5>
                <p>Weather Summary:&nbsp;<br><ul>
                <?php  foreach($daily_forecast_region_data as $fd){ echo '<li>'.$fd->weather.'</li>';}    ?></ul></p>
                <table class="table table-bordered" >
                  <thead>
                  <tr>
                      <th scope="col">Time</th>
                      <th scope="col">Weather</th>
                    <!-- <th scope="col">Max Temp</th>
                      <th scope="col">Min Temp</th> -->
                      <th scope="col">Temperature</th>
                      <th scope="col">Wind Speed</th>
                      <th scope="col">Wind Direction</th>        
                      <th scope="col">Wind Strength</th>                              
                  </tr>
              </thead>
              <tbody>
                  <?php 
                     if(isset($daily_forecast_region_data)){
                    foreach($daily_forecast_region_data as $fd){ ?>
                        <tr>
                          <td scope="row" data-label="Time"><?php  echo $fd->time.'<br>'; 
                          if($fd->time=="Early Morning") echo '12:00am - 06:00am';
                          else if($fd->time=="Late Morning") echo "06:00am - 12:00pm"; 
                          else if($fd->time=="Afternoon") echo "12:00pm -06:00pm"; 
                          else echo "06:00pm-12:00am"; ?></td>
                            <td data-label="Weather"><img src="<?php echo base_url() ?>assets/frameworks/adminlte/<?php echo $fd->img ?>" height="50" width="50"> <?php echo $fd->cat_name;  ?></td>
                            <!-- <td data-label="Max Temp"><?php  //if($fd->max_temp==0){print('-');}else{echo $fd->max_temp; ?> &deg;C <?php //} ?></td>
                            <td data-label="Min Temp"><?php //if($fd->min_temp==0){print('-');}else{echo $fd->min_temp;?> &deg;C <?php// }  ?></td> -->
                            <td data-label="Temperature"><?php echo $fd->mean_temp; ?> &deg;C</td>
                            <td data-label="Wind Speed"><?php echo $fd->wind; ?></td>    
                            <td data-label="Wind Direction"><?php echo $fd->wind_direction; ?></td>          
                            <td data-label="Wind Strength"><?php echo $fd->wind_strength; ?></td>               
                        </tr>
                     <?php  
                    
                   
                     }  } ?>
                 </tbody>
                </table>
                <h5>Valid till : &nbsp; <strong style="color:red"><?php echo $fd->validitytime;; ?></strong></h5>
                <br>
                

                <!-------ADDED NEW ADVISORIES DISPLAY-------- -->
           <div class="box box-default collapsed-box">
             <div class="box-header with-border" style="margin-left: -10px">
              <button type="button" class="btn btn-primary" data-widget="collapse" style="margin-top: 10px;margin-right: 20px; width: 180px"><i style ="font-color: green;" class="fa fa-plus">VIEW ADVISORIES</i></button>
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#feedbackModal" style="margin-top: 10px; width: 180px"> SEND FEEDBACK </button>
               
             <!--  <div class="box-tools pull-right">
               
              </div> -->
             </div>


             <div class="box-body">
               <?php  if(isset($daily_advice_home)){ foreach ($daily_advice_home as $advice) :  ?>
               <div id="advisory">
                  <table class="advice_table">
                    <tr style="background-color: powderblue;">
                      <td>Sector</td>
                      <td><?=$advice['minor_name'] ?></td>
                    </tr>
                    <tr>
                      <td>Advice</td><td><?=$advice['advice'] ?></td>
                    </tr>
                    <tr> <td>Message</td><td><?=$advice['message_summary'] ?></td> </tr>
                  </table>
                </div>
                <?php $flag = true; endforeach;} if($flag == false){echo "<p>Data has not yet been uploaded. Please try again later.</p>"; }?>
             </div>
           </div>                
  <!-- ADDED NEW ADVISORIES DISPLAY-------- -->


     <?php
      if($tomorrow == date('Y-m-d', strtotime(' +1 day'))){
          ?>
          <h5 id='daily_forecast_head'>Tomorrow's Forecast</h5>
          <div id='daily_forecast_desc_und'></div>
          <h5>Issued on:&nbsp; <?php echo date('jS F Y', strtotime( $issuedate))?></h5>
          <p>Weather Summary:&nbsp;<br><ul><?php  foreach($get_next_day_forecast_data_for_region as $fd){ echo '<li>'.$fd->weather.'</li>';}    ?></ul></p><br>
       <table class="table table-bordered" >
                  <thead>
                  <tr>
                      <th scope="col">Time</th>
                      <th scope="col">Weather</th>
                    <!-- <th scope="col">Max Temp</th>
                      <th scope="col">Min Temp</th> -->
                      <th scope="col">Temperature</th>
                      <th scope="col">Wind Speed</th>
                      <th scope="col">Wind Direction</th>        
                      <th scope="col">Wind Strength</th>                              
                  </tr>
              </thead>
              <tbody>
                  <?php 
                     if(isset($daily_forecast_region_data)){
                    foreach($daily_forecast_region_data as $fd){ ?>
                        <tr>
                          <td scope="row" data-label="Time"><?php  echo $fd->time.'<br>'; 
                          if($fd->time=="Early Morning") echo '12:00am - 06:00am';
                          else if($fd->time=="Late Morning") echo "06:00am - 12:00pm"; 
                          else if($fd->time=="Afternoon") echo "12:00pm -06:00pm"; 
                          else echo "06:00pm-12:00am"; ?></td>
                            <td data-label="Weather"><img src="<?php echo base_url() ?>assets/frameworks/adminlte/<?php echo $fd->img ?>" height="50" width="50"> <?php echo $fd->cat_name;  ?></td>
                            <!-- <td data-label="Max Temp"><?php  //if($fd->max_temp==0){print('-');}else{echo $fd->max_temp; ?> &deg;C <?php //} ?></td>
                            <td data-label="Min Temp"><?php //if($fd->min_temp==0){print('-');}else{echo $fd->min_temp;?> &deg;C <?php// }  ?></td> -->
                            <td data-label="Temperature"><?php echo $fd->mean_temp; ?> &deg;C</td>
                            <td data-label="Wind Speed"><?php echo $fd->wind; ?></td>    
                            <td data-label="Wind Direction"><?php echo $fd->wind_direction; ?></td>          
                            <td data-label="Wind Strength"><?php echo $fd->wind_strength; ?></td>               
                        </tr>
                     <?php  
                    
                   
                     }  } ?>
                 </tbody>
                </table>
        <h5>Valid till : &nbsp; <strong style="color:red"><?php echo $valid; ?></strong></h5>
        <!-------ADDED NEW ADVISORIES DISPLAY-------- -->
           <div class="box box-default collapsed-box">
             <div class="box-header with-border" style="margin-left: -10px">
              <button type="button" class="btn btn-primary" data-widget="collapse" style="margin-top: 10px;margin-right: 20px; width: 180px"><i style ="font-color: green;" class="fa fa-plus">VIEW ADVISORIES</i></button>
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#feedbackModal" style="margin-top: 10px; width: 180px"> SEND FEEDBACK </button>
               
             <!--  <div class="box-tools pull-right">
               
              </div> -->
             </div>


             <div class="box-body">
               <?php  if(isset($daily_advice_home)){ foreach ($daily_advice_home as $advice) :  ?>
               <div id="advisory">
                  <table class="advice_table">
                    <tr style="background-color: powderblue;">
                      <td>Sector</td>
                      <td><?=$advice['minor_name'] ?></td>
                    </tr>
                    <tr>
                      <td>Advice</td><td><?=$advice['advice'] ?></td>
                    </tr>
                    <tr> <td>Message</td><td><?=$advice['message_summary'] ?></td> </tr>
                  </table>
                </div>
                <?php $flag = true; endforeach;} if($flag == false){echo "<p>Data has not yet been uploaded. Please try again later.</p>"; }?>
             </div>
           </div>                
  <!-- ADDED NEW ADVISORIES DISPLAY-------- -->

              <?php } }else{
                echo "<p>Data has not yet been uploaded. Please try again later.</p>";
              }
                ?>
      </div>

     <?php  }else if($category1 == "Dekadal Forecast"){ ?>

Dekadal Pending

    <?php }else if($category1 == "Seasonal Forecast"){?>

       <div id="seasonal_forecast">
            <a  href ="<?php site_url('index.php/auth/index') ?>" style="float: right;" class="glyphicon glyphicon-remove-sign"> </a>
              <h4><b>SEASONAL FORECAST for <?php $dist=$divisio_name; echo strtoupper($divisio_name); ?>
                <div style="background-color: cornflowerblue;height: 3px;margin-top: 2%; width: 100%;"></div></b>
              </h4>

          <?php 
              $months  = array('JANUARY','FEBRUARY','MARCH','APRIL', 'MAY','JUNE','JULY', 'AUGUST', 'SEPTEMBER','OCTOBER','NOVEMBER', 'DECEMBER');
               $flag = false;$count = 0; foreach ($seasonal_data as $Seasonal) : 
              $season = "unknown";
              //-----COMMENTED OUT 'JF' season is not available
              if((date('m') == 1) || (date('m') == 2)) $season = 'MAM';
              else if((date('m') == 3) || (date('m') == 4)  || (date('m') == 5) ) $season = 'MAM';
              else if ((date('m') == 6) || (date('m') == 7)  || (date('m') == 8) ) $season = 'JJA';
              else $season = 'SOND';
              
              // Thie check the year and season we are currently in before desiding to display anything
              if(date('Y') == $Seasonal['year'] &&( ($Seasonal['abbreviation']) == $season)){
                // Set flag to true since there is data for that season in the database
                $flag = true;
                if($count == 0){ 
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
                    <!-------ADDED NEW ADVISORIES DISPLAY-------- -->
           <div class="box box-default collapsed-box">
            <div class="box-header with-border">
              <button type="button" class="btn btn-primary" data-widget="collapse" style="margin-top: 15px;width: 180px"><i style ="font-color: green;" class="fa fa-plus" >VIEW ADVISORIES</i>
                </button>
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#feedbackModal" style="margin-top: 15px;width: 180px"> SEND FEEDBACK </button>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
             <?php  if(isset($seasonal_advice)) foreach ($seasonal_advice as $advice) : 
              ?><div id="advisory"><table class="advice_table">
                              <tr style="background-color: powderblue;"> <td>Sector</td><td><?=$advice['minor_name'] ?></td></tr>
                              <tr> <td>Message</td><td><?=$advice['message_summary'] ?></td> </tr>

                           </table> 
          </div>
        <?php $flag = true; endforeach; if($flag == false){echo "<p>Data has not yet been uploaded. Please try again later.</p>"; }?>
            </div>
            <!-- /.box-body -->
          </div>

  <!-- ADDED NEW ADVISORIES DISPLAY-------- -->
                  <?php
                
              }}
           ?>  
           <?php $count++; endforeach; 
            if($flag == false){
          echo "<p>Data has not yet been uploaded. Please try again later.</p>";
        }?>
                    </div>

   <?php }else{ ?>
      <div class="tabs" style="margin-top: 10px;">
         <ul class="tabs-list">
          <li class="active"><a href="#tab1">Daily Forecast</a></li>
          <li ><a href="#tab2">Dekadal Forecast</a></li>
          <li ><a href="#tab3">Seasonal Forecast</a></li>
        </ul>
        <div id="tab1" class="tab active" >
           <div id="daily_forecast">
             <h4><b>DAILY FORECAST FOR <?php $ct = 0; foreach($daily_forcast_division as $fd){$ct++;if($ct == 1){ $dist = strtoupper($fd->division_name); echo strtoupper($fd->division_name);}}  ?>
                <div style="background-color: cornflowerblue;height: 2.5px;margin-top: 10px; width: 100%;"></div></b>
            </h5>
            <?php $count = 0; foreach($daily_forecast_region_data as $fd){$now = $today; $count ++;}
              if($now == date('Y-m-d') && $count>0){ ?>
                <h5 id='daily_forecast_head'>Today's Forecast</h5>
                <div id='daily_forecast_desc_und'></div>
                <h5>Issued on:&nbsp; <?php echo date('jS F Y', strtotime( $fd->issuedate))?></h5>
                <p>Weather Summary:&nbsp;<br><ul><?php  foreach($daily_forecast_region_data as $fd){ echo '<li>'.$fd->weather.'</li>';}    ?></ul></p><br>



                <table class="table table-bordered" >
                	<thead>
                  <tr>
                      <th scope="col">Time</th>
                      <th scope="col">Weather</th>
                    <!-- <th scope="col">Max Temp</th>
                      <th scope="col">Min Temp</th> -->
                      <th scope="col">Temperature</th>
                      <th scope="col">Wind Speed</th>
                      <th scope="col">Wind Direction</th>        
                      <th scope="col">Wind Strength</th>                              
                  </tr>
              </thead>
              <tbody>
                  <?php 
                     if(isset($daily_forecast_region_data)){
                    foreach($daily_forecast_region_data as $fd){ ?>
                        <tr>
                          <td scope="row" data-label="Time"><?php  echo $fd->time.'<br>'; 
                          if($fd->time=="Early Morning") echo '12:00am - 06:00am';
                          else if($fd->time=="Late Morning") echo "06:00am - 12:00pm"; 
                          else if($fd->time=="Afternoon") echo "12:00pm -06:00pm"; 
                          else echo "06:00pm-12:00am"; ?></td>
                            <td data-label="Weather"><img src="<?php echo base_url() ?>assets/frameworks/adminlte/<?php echo $fd->img ?>" height="50" width="50"> <?php echo $fd->cat_name;  ?></td>
                            <!-- <td data-label="Max Temp"><?php  //if($fd->max_temp==0){print('-');}else{echo $fd->max_temp; ?> &deg;C <?php //} ?></td>
                            <td data-label="Min Temp"><?php //if($fd->min_temp==0){print('-');}else{echo $fd->min_temp;?> &deg;C <?php// }  ?></td> -->
                            <td data-label="Temperature"><?php echo $fd->mean_temp; ?> &deg;C</td>
                            <td data-label="Wind Speed"><?php echo $fd->wind; ?></td>    
                            <td data-label="Wind Direction"><?php echo $fd->wind_direction; ?></td>          
                            <td data-label="Wind Strength"><?php echo $fd->wind_strength; ?></td>               
                        </tr>
                     <?php  
                    
                   
                     }  } ?>
                 </tbody>
                </table>
                <h5>Valid till : &nbsp; <strong style="color:red"><?php echo $fd->validitytime;; ?></strong></h5>
                 <!-------ADDED NEW ADVISORIES DISPLAY-------- -->
           <div class="box box-default collapsed-box">
             <div class="box-header with-border">
               <button type="button" class="btn btn-primary" data-widget="collapse" style="margin-top: 10px;margin-right: 20px; width: 180px"><i style ="font-color: green;" class="fa fa-plus">VIEW ADVISORIES</i></button>
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#feedbackModal" style="margin-top: 10px; width: 180px"> SEND FEEDBACK </button>
             </div>


             <div class="box-body">
               <?php  if(isset($daily_advice_home)){ foreach ($daily_advice_home as $advice) :  ?>
               <div id="advisory">
                  <table class="advice_table">
                    <tr style="background-color: powderblue;">
                      <td>Sector</td>
                      <td><?=$advice['minor_name'] ?></td>
                    </tr>
                    <tr>
                      <td>Advice</td><td><?=$advice['advice'] ?></td>
                    </tr>
                    <tr> <td>Message</td><td><?=$advice['message_summary'] ?></td> </tr>
                  </table>
                </div>
                <?php $flag = true; endforeach;} if($flag == false){echo "<p>Data has not yet been uploaded. Please try again later.</p>"; }?>
             </div>
           </div>                
  <!-- ADDED NEW ADVISORIES DISPLAY-------- -->

        <?php
          if ($tomorrow == date('Y-m-d', strtotime(' +1 day'))) {
              ?>
            <h5 id='daily_forecast_head'>Tomorrow's Forecast</h5>
            <div id='daily_forecast_desc_und'></div>
            <h5>Issued on:&nbsp; <?php echo date('jS F Y', strtotime( $issuedat))?></h5>
            <p>Weather Summary:&nbsp;<br><ul><?php  foreach($get_next_day_forecast_data_for_region_home as $fd){ echo '<li>'.$fd->weather.'</li>';}    ?></ul></p><br>  
            <table class="table table-bordered" >
                  <thead>
                  <tr>
                      <th scope="col">Time</th>
                      <th scope="col">Weather</th>
                    <!-- <th scope="col">Max Temp</th>
                      <th scope="col">Min Temp</th> -->
                      <th scope="col">Temperature</th>
                      <th scope="col">Wind Speed</th>
                      <th scope="col">Wind Direction</th>        
                      <th scope="col">Wind Strength</th>                              
                  </tr>
              </thead>
              <tbody>
                  <?php 
                     if(isset($daily_forecast_region_data)){
                    foreach($daily_forecast_region_data as $fd){ ?>
                        <tr>
                          <td scope="row" data-label="Time"><?php  echo $fd->time.'<br>'; 
                          if($fd->time=="Early Morning") echo '12:00am - 06:00am';
                          else if($fd->time=="Late Morning") echo "06:00am - 12:00pm"; 
                          else if($fd->time=="Afternoon") echo "12:00pm -06:00pm"; 
                          else echo "06:00pm-12:00am"; ?></td>
                            <td data-label="Weather"><img src="<?php echo base_url() ?>assets/frameworks/adminlte/<?php echo $fd->img ?>" height="50" width="50"> <?php echo $fd->cat_name;  ?></td>
                            <!-- <td data-label="Max Temp"><?php  //if($fd->max_temp==0){print('-');}else{echo $fd->max_temp; ?> &deg;C <?php //} ?></td>
                            <td data-label="Min Temp"><?php //if($fd->min_temp==0){print('-');}else{echo $fd->min_temp;?> &deg;C <?php// }  ?></td> -->
                            <td data-label="Temperature"><?php echo $fd->mean_temp; ?> &deg;C</td>
                            <td data-label="Wind Speed"><?php echo $fd->wind; ?></td>    
                            <td data-label="Wind Direction"><?php echo $fd->wind_direction; ?></td>          
                            <td data-label="Wind Strength"><?php echo $fd->wind_strength; ?></td>               
                        </tr>
                     <?php  
                    
                   
                     }  } ?>
                 </tbody>
                </table>
            <h5>Valid till : &nbsp; <strong style="color:red"><?php echo $valid; ?></strong></h5>
            <!-------ADDED NEW ADVISORIES DISPLAY-------- -->
           <div class="box box-default collapsed-box">
             <div class="box-header with-border">
               <button type="button" class="btn btn-primary" data-widget="collapse" style="margin-top: 10px;margin-right: 20px; width: 180px"><i style ="font-color: green;" class="fa fa-plus">VIEW ADVISORIES</i></button>
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#feedbackModal" style="margin-top: 10px; width: 180px"> SEND FEEDBACK </button>
             </div>


             <div class="box-body">
               <?php  if(isset($daily_advice_home)){ foreach ($daily_advice_home as $advice) :  ?>
               <div id="advisory">
                  <table class="advice_table">
                    <tr style="background-color: powderblue;">
                      <td>Sector</td>
                      <td><?=$advice['minor_name'] ?></td>
                    </tr>
                    <tr>
                      <td>Advice</td><td><?=$advice['advice'] ?></td>
                    </tr>
                    <tr> <td>Message</td><td><?=$advice['message_summary'] ?></td> </tr>
                  </table>
                </div>
                <?php $flag = true; endforeach;} if($flag == false){echo "<p>Data has not yet been uploaded. Please try again later.</p>"; }?>
             </div>
           </div>                
  <!-- ADDED NEW ADVISORIES DISPLAY-------- -->
             <?php } }else{
                echo "<p>Data has not yet been uploaded. Please try again later.</p>";
              } ?>
           </div>
        </div>

        <div id="tab3" class="tab">
          <div id="seasonal_forecast">
            <h4><b>SEASONAL FORECAST FOR <?php $ct = 0; foreach($daily_forcast_division as $fd){$ct++;if($ct == 1){ $dist = strtoupper($fd->division_name); echo strtoupper($fd->division_name);}}  ?>
                      <div style="background-color: cornflowerblue;height: 3px;margin-top: 10px; width: 100%;"></div></b></h4>
              <?php $count = 0; $flag = false; foreach ($seasonal_data_home as $Seasonal){ ?> <?php $count++; 
                        $months  = array('JANUARY','FEBRUARY','MARCH','APRIL', 'MAY','JUNE','JULY', 'AUGUST', 'SEPTEMBER','OCTOBER','NOVEMBER', 'DECEMBER');
                        $date_struct = explode('-', $Seasonal['issuetime']);
                          // New code to check the season we are in before displaying data for the season currently available in the database
                          $season = "unknown";
                          if((date('m') == 1) || (date('m') == 2)) $season = 'MAM';
                           else 
                            if((date('m') == 3) || (date('m') == 4)  || (date('m') == 5) ) $season = 'MAM';
                          else if ((date('m') == 6) || (date('m') == 7)  || (date('m') == 8) ) $season = 'JJA';
                          else $season = 'SOND';
        
              // Thie check the year and season we are currently in before desiding to display anything
               if(date('Y') == $Seasonal['year'] && ($Seasonal['abbreviation']) == $season){
                     if($count == 1){ 
                        ?>
                        <p style="font-weight: bold;font-size: 16px;"> Date: <?php
                           echo date('jS F Y', strtotime($Seasonal['issuetime']));?> </p>
                        <p class="season_head"><?php $m = '';
                           if( $Seasonal['abbreviation'] == 'SOND'){ $m = 'SEPTEMBER-OCTOBER-NOVEMBER AND DECEMBER'; 
                           } else if( $Seasonal['abbreviation'] == 'MAM'){ $m = 'MARCH-APRIL AND MAY'; 
                           } else if( $Seasonal['abbreviation'] == 'JJA'){ $m = 'JUNE-JULY AND AUGUST'; 
                           } else if( $Seasonal['abbreviation'] == 'JF') { $m = 'JANUARY AND FEBRUARY';}
                           echo $m.' ('.$Seasonal['abbreviation'].') '.$Seasonal['year']; ?><br>SEASONAL RAINFALL OUTLOOK OVER UGANDA
            </p>
            
                        <p class="season_sub_head">1.0  Overiew</p>
                        <p class="season_content"><?php echo $Seasonal['overview']; ?></p>
                        <p class="season_sub_head">2.0  General Forecast</p>
                        <p class="season_content"><?php echo $Seasonal['general_forecast']; ?></p>
                        <p align="center"><img src="<?php echo base_url() ?>assets/frameworks/adminlte/img/<?php echo $Seasonal['map'];?>" height="100%" width="100%"></p><br>
                        <p class="season_sub_head">2.1.0  <?php echo $Seasonal['region_name']; ?> Region</p>
                        <p class="season_sub_head">2.2.1   <?php echo $Seasonal['sub_region_name']; ?></p>
                        <p> <?php echo $Seasonal['overall_comment'];  ?> </p>

                        <!-------ADDED NEW ADVISORIES DISPLAY-------- -->
           <div class="box box-default collapsed-box">
            <div class="box-header with-border">
              <button type="button" class="btn btn-primary" data-widget="collapse" style="margin-top: 15px;width: 180px"><i style ="font-color: green;" class="fa fa-plus" >VIEW ADVISORIES</i>
                </button>
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#feedbackModal" style="margin-top: 15px;width: 180px"> SEND FEEDBACK </button>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
             <?php  if(isset($seasonal_advice_home)) foreach ($seasonal_advice_home as $advice) : 
              ?><div id="advisory"><table class="advice_table">
                              <tr style="background-color: powderblue;"> <td>Sector</td><td><?=$advice['minor_name'] ?></td></tr>
                              <tr> <td>Message</td><td><?=$advice['message_summary'] ?></td> </tr>

                           </table> 
          </div>
        <?php $flag = true; endforeach; if($flag == false){echo "<p>Data has not yet been uploaded. Please try again later.</p>"; }?>
            </div>
            <!-- /.box-body -->
          </div>

  <!-- ADDED NEW ADVISORIES DISPLAY-------- -->
                <!-- END OF BUTTON TO TRIGGER FEEDBACK FORM -->
              <?php  $flag = true;  } } } if(($count < 1) || ($flag == false)) echo "<p>Data has not yet been uploaded. Please try again later.</p>";
        ?>
          </div>
        </div>
        <div id="tab2" class="tab">
           <div id="seasonal_forecast">
            <h4>TEN DAY FORECAST FOR <?php $ct = 0; foreach($daily_forcast_division as $fd){$ct++;if($ct == 1){ $dist = strtoupper($fd->division_name); echo strtoupper($fd->division_name);}}  ?>
        <?php 
        $dekadal_forecast_data= $this->Decadal_forecast_model->get_dekadal_forecast_area(2);
        // print_r($dekadal_forecast_data);exit();

          $count = 0; $flag = false;$today_data = date('Y-m-d');
                foreach($dekadal_forecast_data as $dekadal){

                   $count++;
                  if(($count == 1) && (($today_data >=  $dekadal['date_from'])&& ($today_data <=  $dekadal['date_to']) ) ){
                ?>
                  REGION: (<?php echo date('jS ', strtotime( $dekadal['date_from']))." - ".date('jS ', strtotime( $dekadal['date_to'])).', '.date('F Y', strtotime( $dekadal['date_to'])); ?>)
                      <div style="background-color: cornflowerblue;height: 3px;margin-top: 10px; width: 90%;"></div>
                    <?php } }?>
                    </h4>
             
           </div>
        </div>
      </div>

   <?php } ?>

           </div>
             <!--  <footer style="background-color: white;height: 80px;bottom: all;">
                 <div class="pull-right hidden-xs">
                    <b>Version</b>
                    <?php
                        // echo $this->config->item('dissemination_version');
                    ?>
                   </div>
                // <strong>Copyright &copy; <?php //echo date('Y');?>  <a href="http://wimea.mak.ac.ug/" target="_blank">WIMEA-ICT</a>.</strong> All rights reserved.
              </footer> -->
         </div>


     </div>

      <!-- Modal -->
<div class="modal fade" id="feedbackModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title" style="text-align: center">Feedback Form</h3>
      </div>
      <div class="modal-body">

      <form method="POST" action = "<?php echo site_url('index.php/User_feedback/log_userfeedback'); ?>" >
      <div class="form-group row">
        <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">Division </label>
        <div class="col-sm-8">

        	<select name="districtName" id="districtName" class = "form-control" >
                              
        		<?php

                        $dd = "SELECT * FROM division order by division_name ASC";
                        $ddd = $this->db->query($dd);
                        foreach ($ddd->result_array() as $rowss) { ?>
                          <option value="<?php echo $rowss['id']; ?>"><?php $dist = strtoupper($rowss['division_name']); echo $rowss['division_name']; ?></option>
                      <?php } ?>
           </select>
        </div>
      </div>
      <div class="form-group row">
        <label for="colFormLabel" class="col-sm-4 col-form-label">Forecast</label>
        <div class="col-sm-8">
        <select name="CategoryName" id="CategoryName" class = "form-control" >
                
        <option>DAILY FORECAST</option>
        <option>SEASONAL FORECAST</option>
        <option>DEKADAL FORECAST</option>
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
        <button type="submit" name="feedback_button" id="feedback_button" class="btn btn-primary" data-toggle="modal" data-target="#feedbackModal">Submit </button>
      </div>
    </div>
  </div>
</div>
     


     <aside class="main-sidebar">
       <section class="sidebar">
        <div class="col-md-12" ><br>
          <header> <h4><b><span class="test1"> <?php echo $request_service_form; ?> </span></b></h4> </header>
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
                          <option value="<?php echo $rowss['id']; ?>"><?php $dist = strtoupper($rowss['division_name']); echo $rowss['division_name']; ?></option>
                      <?php } ?>                  
                     </select>
                </div>
            </div>
            <br/>
            <div class="control-group">
              <label class="control-label" for = "Slung" >Select Product</label>
              <div class="controls">
                <select name = 'product' id="product" class="form-control" required>
                  <option value= ""  selected >Select Product</option>
                  <option value= "Daily Forecast"  >DAILY FORECAST</option>
                  <option value= "Dekadal Forecast" >DEKADAL FORECAST</option>
                  <option value= "Seasonal Forecast" >SEASONAL FORECAST</option>
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
      </section>
     </aside>

     

        <!-- START OF  DIV FOR FEEDBACK FORM -->


                              

  </body>
 

  
  <script>
  $(document).ready(function(){
    $('#feedback_button').click(function(){

var division = $('#districtName').val();
var category = $('#CategoryName').val();
var accuracy = $('#accuracy').val();
var applicability = $('#applicability').val();
var timeliness = $('#timeliness').val();
var generalComment = $('#generalComment').val();
var contact = $('#contact').val();

var div = "qwertyu";

if(generalComment != ""){
  
  // alert(division); 
$.ajax({
                    url : "<?php echo base_url().'index.php/Product/log_userfeedback'?>",
                    method : "POST",
                    data: {'division': division, 'category':category, 'accuracy': accuracy, 'applicability' : applicability, 'timeliness': timeliness, 'generalComment' : generalComment, 'contact' : contact},
                    // async : true,
                    // dataType : 'json',
                    success: function(data){
                         
                         alert("Well received. Thank you  for your feedback");
                       
                       
                    },
                    error: function(jqXHR, textStatus, errorThrown){
                      alert(errorThrown);
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
  $(document).ready(function(){
    $('#feedback_button').click(function(){
  
});

  })
  </script>  
</html>
