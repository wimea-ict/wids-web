<?php 
$ip = '196.43.135.108';
//$ip = $_SERVER['REMOTE_ADDR'];

          $details = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));
          $data = $details->city; 
          $sql = "SELECT * FROM ussddistricts where districtname = '$data'";
            $district = $this->db->query($sql);
            foreach ($district->result_array() as $row){
              $DRid = $row['DRid'];
              
            }
           $comp =  date('Y-m-d');
           $yesto = date('Y-m-d', strtotime('-1 days'));
           
?>
<div class="col-lg-12  col-center-style" style="background-color:#e4ecf3; margin-top:-1px; "> 
<div class="row col-padding"><?php
$Today = date('y:m:d');
  $new = date('l, F d, Y', strtotime($Today));
  // $yesterday = strtotime('-1 day');
  // $yesterday = date($yesterday);
 $yesterday = date('l', strtotime('-1 days'));

$reg = $this->db->get_where('dailyforecast_region',array('DRid'=>$DRid));
//echo "<h2>".$data."</h2>";
echo "<h2>".$data.",  ".$yesterday. " - ".$new."     ";foreach ($reg->result() as $p){/* echo $p->regionname ; */}echo "</h2>";
//  var_dump($p->regionname);
//  exit();
  //echo now([timezone ="America/New_York"]);

?>
<div class="img-area" styl="height:20%;">
            
            <img src=<?php echo base_url()?>assets/frameworks/adminlte/img/background_images/default.jpg height 300px>
            <div class="img-area-front">
                <?php

            $late_evening  = "SELECT daily_forecast.max_temp, daily_forecast.wind, daily_forecast.mean_temp, daily_forecast.wind_direction, daily_forecast.wind_strength,  daily_forecast.time, daily_forecast.cat_id, category.cat_name, category.widget FROM daily_forecast join category on daily_forecast.cat_id = category.id WHERE daily_forecast.region = '$DRid' AND daily_forecast.date = '$comp' AND daily_forecast.time LIKE 'Late Evening%' order by daily_forecast.id DESC limit 1";
            $lateEvening_avalues = $this->db->query($late_evening);
            
            foreach ($lateEvening_avalues->result_array() as $values);
            {
            $LE_mean_temp = $values['mean_temp'];
            $LE_wind_direction = $values['wind_direction'];
            $LE_wind_strength = $values['wind_strength'];
            $LE_time_duration = $values['time'];
            $LE_cat_name = $values['cat_name'];
            $LE_cat_id = $values['cat_id'];
            $LE_widget = $values['widget'];
            }
           
             ?>
             

<!-- late morning column -->
<div class="daily-column">
        <h4 style="text-align: center; color: white;"><?php echo $LE_time_duration.", ".$yesterday; ?></h4>
      
        <div class=" col-padding margin-style"  style="height: 100%; min-height: 200px;" >  
        
        <div class="widget">
        <div class="<?php echo $LE_widget; ?>"></div>
        </div>
        <div class="W_desc">
        <span><?php echo $LE_cat_name; ?></span>
        </div>
        <p class="daily_temp"><?php echo $LE_mean_temp; ?>&deg;C</p>
        
        <div class="daily_description">
            <p>Wind Direction: <?php echo $LE_wind_direction; ?></p>
            <p>Wind Strength: <?php echo $LE_wind_strength; ?></p>
        </div>

        </div>
    </div>

<!-- querying late morning forecast for the specific district -->
<?php
              $early_morning  = "SELECT daily_forecast.max_temp, daily_forecast.wind, daily_forecast.mean_temp, daily_forecast.wind_direction, daily_forecast.wind_strength,  daily_forecast.time, daily_forecast.cat_id, category.cat_name, category.widget FROM daily_forecast join category on daily_forecast.cat_id = category.id WHERE daily_forecast.region = '$DRid' AND daily_forecast.date = '$comp' AND daily_forecast.time LIKE 'Early Morning%' order by daily_forecast.id DESC limit 1";
            $earlyMorning_avalues = $this->db->query($early_morning);
            foreach ($earlyMorning_avalues->result_array() as $EmValues);
            {
            $EM_mean_temp = $EmValues['mean_temp'];
            $EM_wind_direction = $EmValues['wind_direction'];
            $EM_wind_strength = $EmValues['wind_strength'];
            $EM_time_duration = $EmValues['time'];
            $EM_cat_name = $EmValues['cat_name'];
            $EM_cat_id = $EmValues['cat_id'];
            $EM_widget = $EmValues['widget'];
            }
            
             ?>
<!-- late morning column -->
    <div class="daily-column">
        <h4 style="text-align: center; color:  #fff;"><?php echo $EM_time_duration; ?></h4>
        <div class=" col-padding margin-style"  style="height: 100%; min-height: 200px;" >
            <table class="table" style="width: 100%; min-height: 200px;">
            <div>

    <div class="widget">
        <div class="<?php echo $EM_widget ?>"></div>
        </div>
        <div class="W_desc">
        <span><?php echo $EM_cat_name; ?></span>
        </div>
        <p class="daily_temp"><?php echo $EM_mean_temp; ?>&deg;C</p>
        
        <div class="daily_description">
            <p>Wind Direction: <?php echo $EM_wind_direction; ?></p>
            <p>Wind Strength: <?php echo $EM_wind_strength; ?></p>
        </div>
       
<!--</div>-->
</div>
            </table>
        </div>
    </div>

<!-- querying late morning forecast for the specific district -->
<?php
            
            $late_morning  = "SELECT daily_forecast.max_temp, daily_forecast.wind, daily_forecast.mean_temp, daily_forecast.wind_direction, daily_forecast.wind_strength,  daily_forecast.time, daily_forecast.cat_id, category.cat_name, category.widget FROM daily_forecast join category on daily_forecast.cat_id = category.id WHERE (daily_forecast.region = '$DRid') AND (daily_forecast.date = '$comp') AND (daily_forecast.time LIKE 'Late Morning%') ";
            $LM_avalues = $this->db->query($late_morning);
            foreach ($LM_avalues->result_array() as $Lmvalues);
            {
            $LM_mean_temp = $Lmvalues['mean_temp'];
            $LM_wind_direction = $Lmvalues['wind_direction'];
            $LM_wind_strength = $Lmvalues['wind_strength'];
            $LM_time_duration = $Lmvalues['time'];
            $LM_cat_name = $Lmvalues['cat_name'];
            $LM_cat_id = $Lmvalues['cat_id'];
            $LM_widget = $Lmvalues['widget'];
            }
             ?>
<!-- Late evening column -->
<div class="daily-column">
        <h4 style="text-align: center; color: #fff;"><?php echo $LM_time_duration; ?></h4>
        
        
        <div class=" col-padding margin-style"  style="height: 100%; min-height: 200px;" >
            <table class="table" style="width: 100%; min-height: 200px;">
            <div>

            <div class="widget">
                <div class="<?php echo $LM_widget ?>"></div>
                </div>
                <div class="W_desc">
                <span><?php echo $LM_cat_name; ?></span>
                </div>
                <p class="daily_temp"><?php echo $LM_mean_temp; ?>&deg;C</p>
                
                <div class="daily_description">
                    <p>Wind Direction: <?php echo $LM_wind_direction; ?></p>
                    <p>Wind Strength: <?php echo $LM_wind_strength; ?></p>
                </div>
            
            <!--</div>-->
            </div>
            </table>
        </div>
        
    </div>

<!-- querying afternoon forecast for the specific district -->
<?php
            
             $afternoon  = "SELECT daily_forecast.max_temp, daily_forecast.wind, daily_forecast.mean_temp, daily_forecast.wind_direction, daily_forecast.wind_strength,  daily_forecast.time, daily_forecast.cat_id, category.cat_name, category.widget FROM daily_forecast join category on daily_forecast.cat_id = category.id WHERE daily_forecast.region = '$DRid' AND daily_forecast.date = '$comp' AND daily_forecast.time LIKE 'Afternoon%' order by daily_forecast.id DESC limit 1";
            $afternoon_values = $this->db->query($afternoon);
            foreach ($afternoon_values->result_array() as $Avalues);
            {
            $A_mean_temp = $Avalues['mean_temp'];
            $A_wind_direction = $Avalues['wind_direction'];
            $A_wind_strength = $Avalues['wind_strength'];
            $A_time_duration = $Avalues['time'];
            $A_cat_name = $Avalues['cat_name'];
            $A_cat_id = $Avalues['cat_id'];
            $A_widget = $Avalues['widget'];
            
            }
             ?>
<!-- Afternoon column -->
<div class="daily-column">
        <h4 style="text-align: center; color: #fff;"><?php echo $A_time_duration; ?></h4>
        <div class=" col-padding margin-style"  style=" height: 100%; min-height: 200px;" >
        
       
            <table class="table" style="width: 100%; min-height: 200px;">
            <div>

            <div class="widget">
                <div class="<?php echo $A_widget ?>"></div>
                </div>
                <div class="W_desc">
                    <span><?php echo $A_cat_name; ?></span>
                </div>
                <p class="daily_temp"><?php echo $A_mean_temp; ?>&deg;C</p>
                
                <div class="daily_description">
                    <p>Wind Direction: <?php echo $A_wind_direction; ?></p>
                    <p>Wind Strength: <?php echo $A_wind_strength; ?></p>
                </div>
            
            <!--</div>-->
            </div>
            </table>
        </div>
    </div>
<!-- afternoon ends -->
  </div>
</div>
</div>


</div>
