<!DOCTYPE html>
<html><head>
         <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
		
		<!-- Global site tag (gtag.js) - Google Analytics -->
        
        <style>
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

<div  style="margin-top:-12%;" >
    
	  <?php 
	  
	 // print_r($daily_forecast_region_data);
	  if(isset($daily_forecast_data)){ 
	  
	    foreach($daily_forecast_data as $d){
			$date = $d->date;
			$weather = $d->weather;
			$issuedate = $d->issuedate;	
			$validitydate = $d->validitytime;			
		}
	  
	  ?>
             <h3>Daily Forecast for  <?php echo $date; ?></h3>
             Issued on:&nbsp; <?php echo $issuedate; ?> and Valid till : &nbsp; <strong style="color:red"><?php echo $validitydate; ?></strong>
     <p>
  
     <table width="80%" height="100%" >
     	<tr>
        	<td colspan="7">Weather Description:&nbsp;<?php echo $weather; ?></td>
        </tr>
      	<tr>
       		<th></th>
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
        
        <?php if($fd->time=="Early Morning"){ ?>
        <tr>
         	<td>12:00am - 06:00am <br/><strong>(Early Morning)</strong></td>
            <td><img src="<?php echo base_url() ?>assets/frameworks/adminlte/img/sunny.png" height="50" width="50"></td>
            <td><?php echo $fd->max_temp; ?>&deg;C</td>
            <td><?php echo $fd->min_temp; ?>&deg;C</td>
            <td><?php echo $fd->mean_temp; ?>&deg;C</td>
            <td><?php echo $fd->wind; ?></td>    
            <td><?php echo $fd->wind_direction; ?></td>          
            <td><?php echo $fd->wind_strength; ?></td>               
        </tr>
        <?php } else if($fd->time=="Late Morning"){ ?>
         <tr>
         	<td>06:00am - 12:00pm</td>
            <td><img src="<?php echo base_url() ?>assets/frameworks/adminlte/img/sunny.png" height="50" width="50"></td>
            <td><?php echo $fd->max_temp; ?>&deg;C</td>
            <td><?php echo $fd->min_temp; ?>&deg;C</td>
            <td><?php echo $fd->mean_temp; ?>&deg;C</td>
            <td><?php echo $fd->wind; ?></td>    
            <td><?php echo $fd->wind_direction; ?></td>          
            <td><?php echo $fd->wind_strength; ?></td>        
        </tr>
        <?php } else if($fd->time=="Afternoon"){ ?>
     <tr class="even">
         	<td>12:00pm -06:00pm</td>
            <td><img src="<?php echo base_url() ?>assets/frameworks/adminlte/img/showers.ico" height="50" width="50"></td>
            <td><?php echo $fd->max_temp; ?>&deg;C</td>
            <td><?php echo $fd->min_temp; ?>&deg;C</td>
            <td><?php echo $fd->mean_temp; ?>&deg;C</td>
            <td><?php echo $fd->wind; ?></td>  
            <td><?php echo $fd->wind_direction; ?></td>          
            <td><?php echo $fd->wind_strength; ?></td>         
        </tr>
        <?php }  else { ?>
         <tr class="odd">
         	<td>06:00pm-12:00am</td>
            <td><img src="<?php echo base_url() ?>assets/frameworks/adminlte/img/lightthunder.ico" height="50" width="50"></td>
            <td><?php echo $fd->max_temp; ?>&deg;C</td>
            <td><?php echo $fd->min_temp; ?>&deg;C</td>
            <td><?php echo $fd->mean_temp; ?>&deg;C</td>
            <td><?php echo $fd->wind; ?></td>   
            <td><?php echo $fd->wind_direction; ?></td>          
            <td><?php echo $fd->wind_strength; ?></td>          
        </tr>
        
     <?php  
		}
	 
	   }  } ?>
     </table>
     </p>
            
            
       <?php }else if(isset($dekadal_forecast_data)){ ?>
       
         Dekadal
       
       <?php } else if(isset($seasonal_data)){ ?>
            Seasonal
       <?php } else { ?>
         
     <div class="tabs">
  <ul class="tabs-list">
     <li class="active"><a href="#tab1">Daily Forecast</a></li>
     <li ><a href="#tab2">Dekadal Forecast</a></li>
     <li ><a href="#tab3">Seasonal Forecast<a/></li>
  </ul>

  <div id="tab1" class="tab active" style="">
     <h3>Daily Forecast</h3>
     <p>
     <table width="100%" cellspacing="5"  height="100%">
      	<tr>
        	<th>Time</th>
            <th>Conditions</th>
            <th>Temperature</th>
            <th>Precipitation</th>
            <th>Cloud Cover</th>
            <th>Dew point</th>
            <th>Humidity</th>
            <th>Wind direction</th>
            <th>Wind Speed</th>
            <th>Pressure</th>        
        </tr>
        <tr>

         	<td>12:00am - 06:00am</td>
            <td > <i class="fa fa-cloud fa-3x" ></i></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>  
            <td></td>        
        </tr>
         <tr>
         	<td>06:00am - 12:00pm</td>
            <td><img src="<?php echo base_url() ?>assets/frameworks/adminlte/img/sunny.png" height="50" width="50"></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>  
            <td></td>        
        </tr>
     <tr class="even">
         	<td>12:00pm -06:00pm</td>
            <td><img src="<?php echo base_url() ?>assets/frameworks/adminlte/img/showers.ico" height="50" width="50"></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>  
            <td></td>
            <td></td>        
        </tr>
         <tr class="odd">
         	<td>06:00pm-12:00am</td>
            <td><img src="<?php echo base_url() ?>assets/frameworks/adminlte/img/lightthunder.ico" height="50" width="50"></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>  
            <td></td>
            <td></td>
            <td></td>        
        </tr>
     
     </table>
     </p>
  </div>
  <div id="tab2" class="tab">
    <h3>Dekadal/ 10 day Forecast for .... </h3> 
    <p>
    <table cellspacing="4" width="100%" border="1">
        <tr>
        	<th >Day </th>
            <th > Description</th>
            <th > High/Low</th>
            <th > Precipitation </th>
            <th > Humidity </th>
            <th> Gust </th>
            <th > Cloud (%)</th>
            <th > Visiblity</th>
            <th > Pressure</th>          
        </tr>
        <?php for($i=0;$i<10;$i++){ ?>
        <tr>
        	<td><?php  echo ($i+1);?></td>
            <td> Rainny</td>
            <td>28/22</td>
            <td>4mm</td>
            <td>68%</td>
            <td>23 km/hr</td>
            <td>34%</td>
            <td>23%</td>
            <td>1010 mb</td>           
                   
        </tr>
    	<?php }  ?>
    
    </table>
    
    </p>
  </div>
  <div id="tab3" class="tab">
    <h3>Seasonal Forecast</h3>
    <p>
      The quick, brown fox jumps over a lazy dog. DJs flock by when MTV ax quiz prog. Junk MTV quiz graced by fox whelps. Bawds jog, flick quartz, vex nymphs. Waltz, bad nymph, for quick jigs vex! Fox nymphs grab quick-jived waltz. Brick quiz whangs jumpy veldt fox. Bright vixens
    </p>
  </div>

</div>
         
                        
    <?php } ?>        
            
            
    