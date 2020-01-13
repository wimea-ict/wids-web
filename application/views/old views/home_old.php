
<style>

  @media screen and (max-width: 500px) {
    .full-center {
        width: 100%;
    }
}

</style>

<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.1.0/cookieconsent.min.css" />
<script src="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.1.0/cookieconsent.min.js"></script>
<script>
window.addEventListener("load", function(){
window.cookieconsent.initialise({
  "palette": {
    "popup": {
      "background": "#000"
    },
    "button": {
      "background": "#f1d600"
    }
  },
  "content": {
    "dismiss": "OK"
  }
})});
</script>
            <!-- kampala column -->
           <div class="full-center">
             <?php
             //early morning kampala weather forecast
         $EM_kampala  = "SELECT daily_forecast.max_temp, daily_forecast.wind, daily_forecast.mean_temp, daily_forecast.wind_direction, daily_forecast.wind_strength,  daily_forecast.time, daily_forecast.cat_id, weather_category.cat_name, weather_category.widget FROM daily_forecast join weather_category on daily_forecast.cat_id = weather_category.id WHERE daily_forecast.region_id = 2 AND daily_forecast.time LIKE 'Early Morning%' order by daily_forecast.id DESC limit 1";
            $EM_kampalavalues = $this->db->query($EM_kampala);
            foreach ($EM_kampalavalues->result_array() as $EM_values);
            {
            $EM_Kmean_temp = $EM_values['mean_temp'];
            $EM_Kwind_direction = $EM_values['wind_direction'];
            $EM_Kwind_strength = $EM_values['wind_strength'];
            $EM_Ktime_duration = $EM_values['time'];
            $EM_Kcat_name = $EM_values['cat_name'];
            $EM_Kcat_id = $EM_values['cat_id'];
            $EM_Kwidget = $EM_values['widget'];
            } 

            //late morning kampala weather forecast
            $LM_kampala = "SELECT daily_forecast.max_temp, daily_forecast.wind, daily_forecast.mean_temp, daily_forecast.wind_direction, daily_forecast.wind_strength,  daily_forecast.time, daily_forecast.cat_id, weather_category.cat_name, weather_category.widget FROM daily_forecast join weather_category on daily_forecast.cat_id = weather_category.id WHERE daily_forecast.region_id = 2 AND daily_forecast.time LIKE 'Late Morning%' order by daily_forecast.id DESC limit 1";
             $LM_kampalavalues = $this->db->query($LM_kampala);
            foreach ($LM_kampalavalues->result_array() as $LM_values);
            {
            $LM_Kmean_temp = $LM_values['mean_temp'];
            $LM_Kwind_direction = $LM_values['wind_direction'];
            $LM_Kwind_strength = $LM_values['wind_strength'];
            $LM_Ktime_duration = $LM_values['time'];
            $LM_Kcat_name = $LM_values['cat_name'];
            $LM_Kcat_id = $LM_values['cat_id'];
            $LM_Kwidget = $LM_values['widget'];
            } 

            //Afternoon kampala weather forecast
            $A_kampala = "SELECT daily_forecast.max_temp, daily_forecast.wind, daily_forecast.mean_temp, daily_forecast.wind_direction, daily_forecast.wind_strength,  daily_forecast.time, weather_category.cat_name, weather_category.widget FROM daily_forecast join weather_category on daily_forecast.cat_id = weather_category.id WHERE daily_forecast.region_id = 2 AND daily_forecast.time LIKE 'Afternoon%' order by daily_forecast.id DESC limit 1";
            $A_kampalavalues = $this->db->query($A_kampala);
           foreach ($A_kampalavalues->result_array() as $A_values);
           {
           $A_Kmean_temp = $A_values['mean_temp'];
           $A_Kwind_direction = $A_values['wind_direction'];
           $A_Kwind_strength = $A_values['wind_strength'];
           $A_Ktime_duration = $A_values['time'];
           $A_Kcat_name = $A_values['cat_name'];
           $A_Kcat_id = $A_values['cat_id'];
           $A_Kwidget = $A_values['widget'];
           } 

           //late evening kampala weather forecast 
           $LE_kampala = "SELECT daily_forecast.max_temp, daily_forecast.wind, daily_forecast.mean_temp, daily_forecast.wind_direction, daily_forecast.wind_strength,  daily_forecast.time, weather_category.cat_name, weather_category.widget FROM daily_forecast join weather_category on daily_forecast.cat_id = weather_category.id WHERE daily_forecast.region_id = 2 AND daily_forecast.time LIKE 'Late Evening%' order by daily_forecast.id DESC limit 1";
            $LE_kampalavalues = $this->db->query($LE_kampala);
           foreach ($LE_kampalavalues->result_array() as $LE_values);
           {
           $LE_Kmean_temp = $LE_values['mean_temp'];
           $LE_Kwind_direction = $LE_values['wind_direction'];
           $LE_Kwind_strength = $LE_values['wind_strength'];
           $LE_Ktime_duration = $LE_values['time'];
           $LE_Kcat_name = $LE_values['cat_name'];
           $LE_Kcat_id = $LE_values['cat_id'];
           $LE_Kwidget = $LE_values['widget'];
           } 
             ?>
                          <div class="widget-block">
                           <!-- MAIN AREA -->
                             <div class="img-area">
                                <div class="img-area-mask"></div>
                                <img src=<?php echo base_url()?>assets/frameworks/adminlte/img/kampala-slice.jpg alt="">
                                <div class="img-area-front">
                                   <h5 class="location">KAMPALA</h5>
                                   <p class="today"><script type="text/javascript">document.write(new Date().toLocaleDateString());</script></p>

                               <!-- text carousel starts -->
                             
                     <div id="text-carousel" class="carousel slide" data-ride="carousel" data-pause="false">
                           <div class="carousel-inner">
                           <!-- early morning weather forecast -->
                               <div class="item active animated fadeInUp"> 
                                  <div>
                                  <div class="widg">
                                      <div class="<?php echo $EM_Kwidget ?>"></div>
                                      </div>
                                      <div class="weather-desc">
                                          <span><?php echo $EM_Kcat_name; ?></span>
                                      </div>
                                      <p class="time"><?php echo $EM_Ktime_duration."(12:00am - 6:00am)" ?></p>
                                      <p class="today-temperature"><?php echo $EM_Kmean_temp; ?>&deg;C</p>
                                      
                                      <div class="today-wind">
                                          <p>Wind Direction: <?php echo $EM_Kwind_direction; ?></p>
                                          <p>Wind Strength: <?php echo $EM_Kwind_strength; ?></p>
                                      </div>
                                  <!--</div>-->
                                  </div>
                               </div>
                      <!-- second item -->
                          <div class="item animated fadeInUp">
                          <div>
                                  <div class="widg">
                                      <div class="<?php echo $LM_Kwidget ?>"></div>
                                      </div>
                                      <div class="weather-desc">
                                          <span><?php echo $LM_Kcat_name; ?></span>
                                      </div>
                                      <p class="time"><?php echo $LM_Ktime_duration."(6:00am - 12:00pm)" ?></p>
                                      <p class="today-temperature"><?php echo $LM_Kmean_temp; ?>&deg;C</p>
                                      
                                      <div class="today-wind">
                                          <p>Wind Direction: <?php echo $LM_Kwind_direction; ?></p>
                                          <p>Wind Strength: <?php echo $LM_Kwind_strength; ?></p>
                                      </div>
                                  <!--</div>-->
                                  </div>
                       </div>

                        <!-- third item -->
                               <div class="item animated fadeInUp">
                               <div>
                                  <div class="widg">
                                      <div class="<?php echo $A_Kwidget ?>"></div>
                                      </div>
                                      <div class="weather-desc">
                                          <span><?php echo $A_Kcat_name; ?></span>
                                      </div>
                                      <p class="time"><?php echo $A_Ktime_duration."(12:00pm - 6:00pm)" ?></p>
                                      <p class="today-temperature"><?php echo $A_Kmean_temp; ?>&deg;C</p>
                                      
                                      <div class="today-wind">
                                          <p>Wind Direction: <?php echo $A_Kwind_direction; ?></p>
                                          <p>Wind Strength: <?php echo $A_Kwind_strength; ?></p>
                                      </div>
                                  <!--</div>-->
                                  </div>
                               </div>
                        <!-- fourth item -->
                               <div class="item animated fadeInUp">
                               <div>
                                  <div class="widg">
                                      <div class="<?php echo $LE_Kwidget ?>"></div>
                                      </div>
                                      <div class="weather-desc">
                                          <span><?php echo $LE_Kcat_name; ?></span>
                                      </div>
                                      <p class="time"><?php echo $LE_Ktime_duration."(6:00am - 12:00am)" ?></p>
                                      <p class="today-temperature"><?php echo $LE_Kmean_temp; ?>&deg;C</p>
                                      
                                      <div class="today-wind">
                                          <p>Wind Direction: <?php echo $LE_Kwind_direction; ?></p>
                                          <p>Wind Strength: <?php echo $LE_Kwind_strength; ?></p>
                                      </div>
                                  <!--</div>-->
                                  </div>
                               </div>

                           </div>
                     </div>


                                 <!-- text carousel emds -->

                                </div>
                             </div>

                          </div>
                   </div>


                   <div class="full-center">
                     <?php
                     //early morning Jinja weather forecast
                     $EM_jinja  = "SELECT daily_forecast.max_temp, daily_forecast.wind, daily_forecast.mean_temp, daily_forecast.wind_direction, daily_forecast.wind_strength, daily_forecast.time, weather_category.cat_name, weather_category.widget FROM daily_forecast join weather_category on daily_forecast.cat_id = weather_category.id WHERE daily_forecast.region_id = 1 AND daily_forecast.time LIKE 'Early Morning%' order by daily_forecast.id DESC limit 1";
                    $EM_jinjavalues = $this->db->query($EM_jinja);
                    foreach ($EM_jinjavalues->result_array() as $EM_Jvalues);
                    {
                    $EM_Jmean_temp = $EM_Jvalues['mean_temp'];
                    $EM_Jwind_direction = $EM_Jvalues['wind_direction'];
                    $EM_Jwind_strength = $EM_Jvalues['wind_strength'];
                    $EM_Jtime_duration = $EM_Jvalues['time'];
                    $EM_Jcat_name = $EM_Jvalues['cat_name'];
                    $EM_Jcat_id = $EM_Jvalues['cat_id'];
                    $EM_Jwidget = $EM_Jvalues['widget'];
                    }

                    //Late morning jinja weather forecast
                    $LM_jinja  = "SELECT daily_forecast.max_temp, daily_forecast.wind, daily_forecast.mean_temp, daily_forecast.wind_direction, daily_forecast.wind_strength, daily_forecast.time, daily_forecast.cat_id, weather_category.cat_name, weather_category.widget FROM daily_forecast join weather_category on daily_forecast.cat_id = weather_category.id WHERE daily_forecast.region_id = 1 AND daily_forecast.time LIKE 'Late Morning%' order by daily_forecast.id DESC limit 1";
                    $LM_jinjavalues = $this->db->query($LM_jinja);
                    foreach ($LM_jinjavalues->result_array() as $LM_Jvalues);
                    {
                    $LM_Jmean_temp = $LM_Jvalues['mean_temp'];
                    $LM_Jwind_direction = $LM_Jvalues['wind_direction'];
                    $LM_Jwind_strength = $LM_Jvalues['wind_strength'];
                    $LM_Jtime_duration = $LM_Jvalues['time'];
                    $LM_Jcat_name = $LM_Jvalues['cat_name'];
                    $LM_Jcat_id = $LM_Jvalues['cat_id'];
                    $LM_Jwidget = $LM_Jvalues['widget'];
                    }

                    //Querying afternoon jinja weather forecast
                    $A_jinja  = "SELECT daily_forecast.max_temp, daily_forecast.wind, daily_forecast.mean_temp, daily_forecast.wind_direction, daily_forecast.wind_strength, daily_forecast.time, weather_category.cat_name, weather_category.widget FROM daily_forecast join weather_category on daily_forecast.cat_id = weather_category.id WHERE daily_forecast.region_id = 1 AND daily_forecast.time LIKE 'Afternoon%' order by daily_forecast.id DESC limit 1";
                    $A_jinjavalues = $this->db->query($A_jinja);
                    foreach ($A_jinjavalues->result_array() as $A_Jvalues);
                    {
                    $A_Jmean_temp = $A_Jvalues['mean_temp'];
                    $A_Jwind_direction = $A_Jvalues['wind_direction'];
                    $A_Jwind_strength = $A_Jvalues['wind_strength'];
                    $A_Jtime_duration = $A_Jvalues['time'];
                    $A_Jcat_name = $A_Jvalues['cat_name'];
                    $A_Jcat_id = $A_Jvalues['cat_id'];
                    $A_Jwidget = $A_Jvalues['widget'];
                    }

                    //querying late evening jinja weather forecast
                   $LE_jinja  = "SELECT daily_forecast.max_temp, daily_forecast.wind, daily_forecast.mean_temp, daily_forecast.wind_direction, daily_forecast.wind_strength, daily_forecast.time, weather_category.cat_name, weather_category.widget FROM daily_forecast join weather_category on daily_forecast.cat_id = weather_category.id WHERE daily_forecast.region_id = 1 AND daily_forecast.time LIKE 'Late Evening%' order by daily_forecast.id DESC limit 1";
                    $LE_jinjavalues = $this->db->query($LE_jinja);
                    foreach ($LE_jinjavalues->result_array() as $LE_Jvalues);
                    {
                    $LE_Jmean_temp = $LE_Jvalues['mean_temp'];
                    $LE_Jwind_direction = $LE_Jvalues['wind_direction'];
                    $LE_Jwind_strength = $LE_Jvalues['wind_strength'];
                    $LE_Jtime_duration = $LE_Jvalues['time'];
                    $LE_Jcat_name = $LE_Jvalues['cat_name'];
                    $LE_Jcat_id = $LE_Jvalues['cat_id'];
                    $LE_Jwidget = $LE_Jvalues['widget'];
                    }
                     ?>
                                  <div class="widget-block">
                                   <!-- MAIN AREA -->
                                     <div class="img-area">
                                        <div class="img-area-mask"></div>
                                        <img src=<?php echo base_url()?>assets/frameworks/adminlte/img/jinja-slice.jpg alt="">
                                        <div class="img-area-front">
                                           <h5 class="location">JINJA</h5>
                                           <p class="today"><script type="text/javascript">document.write(new Date().toLocaleDateString());</script></p>

                                              <!-- text carousel starts -->
                             
                     <div id="text-carousel" class="carousel slide" data-ride="carousel" data-pause="false">
                           <div class="carousel-inner">
                           <!-- early morning weather forecast -->
                               <div class="item active animated fadeInUp"> 
                                  <div>
                                  <div class="widg">
                                      <div class="<?php echo $EM_Jwidget ?>"></div>
                                      </div>
                                      <div class="weather-desc">
                                          <span><?php echo $EM_Jcat_name; ?></span>
                                      </div>
                                      <p class="time"><?php echo $EM_Jtime_duration."(12:00am - 6:00am)" ?></p>
                                      <p class="today-temperature"><?php echo $EM_Jmean_temp; ?>&deg;C</p>
                                      
                                      <div class="today-wind">
                                          <p>Wind Direction: <?php echo $EM_Jwind_direction; ?></p>
                                          <p>Wind Strength: <?php echo $EM_Jwind_strength; ?></p>
                                      </div>
                                  <!--</div>-->
                                  </div>
                               </div>
                      <!-- second item -->
                          <div class="item animated fadeInUp">
                          <div>
                                  <div class="widg">
                                      <div class="<?php echo $LM_Jwidget ?>"></div>
                                      </div>
                                      <div class="weather-desc">
                                          <span><?php echo $LM_Jcat_name; ?></span>
                                      </div>
                                      <p class="time"><?php echo $LM_Jtime_duration."(6:00am - 12:00pm)" ?></p>
                                      <p class="today-temperature"><?php echo $LM_Jmean_temp; ?>&deg;C</p>
                                      
                                      <div class="today-wind">
                                          <p>Wind Direction: <?php echo $LM_Jwind_direction; ?></p>
                                          <p>Wind Strength: <?php echo $LM_Jwind_strength; ?></p>
                                      </div>
                                  <!--</div>-->
                                  </div>
                       </div>

                        <!-- third item -->
                               <div class="item animated fadeInUp">
                               <div>
                                  <div class="widg">
                                      <div class="<?php echo $A_Jwidget ?>"></div>
                                      </div>
                                      <div class="weather-desc">
                                          <span><?php echo $A_Jcat_name; ?></span>
                                      </div>
                                      <p class="time"><?php echo $A_Jtime_duration."(12:00pm - 6:00pm)" ?></p>
                                      <p class="today-temperature"><?php echo $A_Jmean_temp; ?>&deg;C</p>
                                      
                                      <div class="today-wind">
                                          <p>Wind Direction: <?php echo $A_Jwind_direction; ?></p>
                                          <p>Wind Strength: <?php echo $A_Jwind_strength; ?></p>
                                      </div>
                                  <!--</div>-->
                                  </div>
                               </div>
                        <!-- fourth item -->
                               <div class="item animated fadeInUp">
                               <div>
                                  <div class="widg">
                                      <div class="<?php echo $LE_Jwidget ?>"></div>
                                      </div>
                                      <div class="weather-desc">
                                          <span><?php echo $LE_Jcat_name; ?></span>
                                      </div>
                                      <p class="time"><?php echo $LE_Jtime_duration."(6:00pm - 12:00am)" ?></p>
                                      <p class="today-temperature"><?php echo $LE_Jmean_temp; ?>&deg;C</p>
                                      
                                      <div class="today-wind">
                                          <p>Wind Direction: <?php echo $LE_Jwind_direction; ?></p>
                                          <p>Wind Strength: <?php echo $LE_Jwind_strength; ?></p>
                                      </div>
                                  <!--</div>-->
                                  </div>
                               </div>

                           </div>
                     </div>


                                 <!-- text carousel emds -->
                                        </div>
                                     </div>
                                  </div>
                               </div>
<div class="full-center">
  <?php
  //querying early morning gulu weather forecast
  $EM_gulu  = "SELECT daily_forecast.max_temp, daily_forecast.wind, daily_forecast.mean_temp, daily_forecast.wind_direction, daily_forecast.wind_strength, daily_forecast.time, weather_category.cat_name, weather_category.widget FROM daily_forecast join weather_category on daily_forecast.cat_id = weather_category.id WHERE daily_forecast.region_id = 12 AND daily_forecast.time LIKE 'Early Morning%' order by daily_forecast.id DESC limit 1";
 $EM_guluvalues = $this->db->query($EM_gulu);
 foreach ($EM_guluvalues->result_array() as $EM_Gvalues);
 {
      $EM_Gmean_temp = $EM_Gvalues['mean_temp'];
      $EM_Gwind_direction = $EM_Gvalues['wind_direction'];
      $EM_Gwind_strength = $EM_Gvalues['wind_strength'];
      $EM_Gtime_duration = $EM_Gvalues['time'];
      $EM_Gcat_name = $EM_Gvalues['cat_name'];
      $EM_Gcat_id = $EM_Gvalues['cat_id'];
      $EM_Gwidget =$EM_Gvalues['widget'];
 }

 //querying late morning gulu weather forecast
 $LM_gulu  = "SELECT daily_forecast.max_temp, daily_forecast.wind, daily_forecast.mean_temp, daily_forecast.wind_direction, daily_forecast.wind_strength, daily_forecast.time, daily_forecast.cat_id, weather_category.cat_name, weather_category.widget FROM daily_forecast join weather_category on daily_forecast.cat_id = weather_category.id WHERE daily_forecast.region_id = 12 AND daily_forecast.time LIKE 'Late Morning%' order by daily_forecast.id DESC limit 1";
 $LM_guluvalues = $this->db->query($LM_gulu);
 foreach ($LM_guluvalues->result_array() as $LM_Gvalues);
 {
      $LM_Gmean_temp = $LM_Gvalues['mean_temp'];
      $LM_Gwind_direction = $LM_Gvalues['wind_direction'];
      $LM_Gwind_strength = $LM_Gvalues['wind_strength'];
      $LM_Gtime_duration = $LM_Gvalues['time'];
      $LM_Gcat_name = $LM_Gvalues['cat_name'];
      $LM_Gcat_id = $LM_Gvalues['cat_id'];
      $LM_Gwidget =$LM_Gvalues['widget'];
 }

 //querying afternoon gulu weather forecast
 $A_gulu  = "SELECT daily_forecast.max_temp, daily_forecast.wind, daily_forecast.mean_temp, daily_forecast.wind_direction, daily_forecast.wind_strength, daily_forecast.time, daily_forecast.cat_id, weather_category.cat_name, weather_category.widget FROM daily_forecast join weather_category on daily_forecast.cat_id = weather_category.id WHERE daily_forecast.region_id = 12 AND daily_forecast.time LIKE 'Afternoon%' order by daily_forecast.id DESC limit 1";
 $A_guluvalues = $this->db->query($A_gulu);
 foreach ($A_guluvalues->result_array() as $A_Gvalues);
 {
      $A_Gmean_temp = $A_Gvalues['mean_temp'];
      $A_Gwind_direction = $A_Gvalues['wind_direction'];
      $A_Gwind_strength = $A_Gvalues['wind_strength'];
      $A_Gtime_duration = $A_Gvalues['time'];
      $A_Gcat_name = $A_Gvalues['cat_name'];
      $A_Gcat_id = $A_Gvalues['cat_id'];
      $A_Gwidget =$A_Gvalues['widget'];
 }

 //querying late evening gulu weather forecast
 $LE_gulu  = "SELECT daily_forecast.max_temp, daily_forecast.wind, daily_forecast.mean_temp, daily_forecast.wind_direction, daily_forecast.wind_strength, daily_forecast.time, daily_forecast.cat_id, weather_category.cat_name, weather_category.widget FROM daily_forecast join weather_category on daily_forecast.cat_id = weather_category.id WHERE daily_forecast.region_id = 12 AND daily_forecast.time LIKE 'Late Evening%' order by daily_forecast.id DESC limit 1";
 $LE_guluvalues = $this->db->query($LE_gulu);
 foreach ($LE_guluvalues->result_array() as $LE_Gvalues);
 {
      $LE_Gmean_temp = $LE_Gvalues['mean_temp'];
      $LE_Gwind_direction = $LE_Gvalues['wind_direction'];
      $LE_Gwind_strength = $LE_Gvalues['wind_strength'];
      $LE_Gtime_duration = $LE_Gvalues['time'];
      $LE_Gcat_name = $LE_Gvalues['cat_name'];
      $LE_Gcat_id = $LE_Gvalues['cat_id'];
      $LE_Gwidget =$LE_Gvalues['widget'];
 }
  ?>
               <div class="widget-block">
                <!-- MAIN AREA -->
                  <div class="img-area">
                     <div class="img-area-mask"></div>
                     <img src=<?php echo base_url()?>assets/frameworks/adminlte/img/gulu-slice.jpg alt="">
                     <div class="img-area-front">
                        <h5 class="location">GULU</h5>
                        <p class="today"><script type="text/javascript">document.write(new Date().toLocaleDateString());</script></p>
        <!-- text carousel starts -->
                             
        <div id="text-carousel" class="carousel slide" data-ride="carousel" data-pause="false">
                           <div class="carousel-inner">
                           <!-- early morning weather forecast -->
                               <div class="item active animated fadeInUp"> 
                                  <div>
                                  <div class="widg">
                                      <div class="<?php echo $EM_Gwidget ?>"></div>
                                      </div>
                                      <div class="weather-desc">
                                          <span><?php echo $EM_Gcat_name; ?></span>
                                      </div>
                                      <p class="time"><?php echo $EM_Gtime_duration."(12:00am - 6:00am)" ?></p>
                                      <p class="today-temperature"><?php echo $EM_Gmean_temp; ?>&deg;C</p>
                                      
                                      <div class="today-wind">
                                          <p>Wind Direction: <?php echo $EM_Gwind_direction; ?></p>
                                          <p>Wind Strength: <?php echo $EM_Gwind_strength; ?></p>
                                      </div>
                                  <!--</div>-->
                                  </div>
                               </div>
                      <!-- second item -->
                          <div class="item animated fadeInUp">
                          <div>
                                  <div class="widg">
                                      <div class="<?php echo $LM_Gwidget ?>"></div>
                                      </div>
                                      <div class="weather-desc">
                                          <span><?php echo $LM_Gcat_name; ?></span>
                                      </div>
                                      <p class="time"><?php echo $LM_Gtime_duration."(6:00am - 12:00pm)" ?></p>
                                      <p class="today-temperature"><?php echo $LM_Gmean_temp; ?>&deg;C</p>
                                      
                                      <div class="today-wind">
                                          <p>Wind Direction: <?php echo $LM_Gwind_direction; ?></p>
                                          <p>Wind Strength: <?php echo $LM_Gwind_strength; ?></p>
                                      </div>
                                  <!--</div>-->
                                  </div>
                       </div>

                        <!-- third item -->
                               <div class="item animated fadeInUp">
                               <div>
                                  <div class="widg">
                                      <div class="<?php echo $A_Gwidget ?>"></div>
                                      </div>
                                      <div class="weather-desc">
                                          <span><?php echo $A_Gcat_name; ?></span>
                                      </div>
                                      <p class="time"><?php echo $A_Gtime_duration."(12:00pm - 6:00pm)" ?></p>
                                      <p class="today-temperature"><?php echo $A_Gmean_temp; ?>&deg;C</p>
                                      
                                      <div class="today-wind">
                                          <p>Wind Direction: <?php echo $A_Gwind_direction; ?></p>
                                          <p>Wind Strength: <?php echo $A_Gwind_strength; ?></p>
                                      </div>
                                  <!--</div>-->
                                  </div>
                               </div>
                        <!-- fourth item -->
                               <div class="item animated fadeInUp">
                               <div>
                                  <div class="widg">
                                      <div class="<?php echo $LE_Gwidget ?>"></div>
                                      </div>
                                      <div class="weather-desc">
                                          <span><?php echo $LE_Gcat_name; ?></span>
                                      </div>
                                      <p class="time"><?php echo $LE_Gtime_duration."(6:00pm - 12:00am)" ?></p>
                                      <p class="today-temperature"><?php echo $LE_Gmean_temp; ?>&deg;C</p>
                                      
                                      <div class="today-wind">
                                          <p>Wind Direction: <?php echo $LE_Gwind_direction; ?></p>
                                          <p>Wind Strength: <?php echo $LE_Gwind_strength; ?></p>
                                      </div>
                                  <!--</div>-->
                                  </div>
                               </div>

                           </div>
                     </div>
        <!-- text carousel emds -->
                         
                     </div>
                  </div>

               </div>
        </div>

<div class="full-center">

  <?php 
  //Querying Mbrara early morning forecast
  $EM_mbrara  = "SELECT daily_forecast.max_temp, daily_forecast.wind, daily_forecast.mean_temp, daily_forecast.wind_direction, daily_forecast.wind_strength, daily_forecast.time, daily_forecast.cat_id, weather_category.cat_name, weather_category.widget, weather_category.img FROM daily_forecast join weather_category on daily_forecast.cat_id = weather_category.id WHERE daily_forecast.region_id = 7 AND daily_forecast.time LIKE 'Early Morning%' order by daily_forecast.id DESC limit 1";
$EM_mbaravalues = $this->db->query($EM_mbrara);
foreach ($EM_mbaravalues->result_array() as $EM_Mvalues);
{
    $EM_Mmean_temp = $EM_Mvalues['mean_temp'];
    $EM_Mwind_direction = $EM_Mvalues['wind_direction'];
    $EM_Mwind_strength = $EM_Mvalues['wind_strength'];
    $EM_Mtime_duration = $EM_Mvalues['time'];
    $EM_Mcat_name = $EM_Mvalues['cat_name'];
    $EM_Mcat_id = $EM_Mvalues['cat_id'];
    $EM_Mwidget = $EM_Mvalues['widget'];
}

 //Querying Mbrara late morning forecast
 $LM_mbrara  = "SELECT daily_forecast.max_temp, daily_forecast.wind, daily_forecast.mean_temp, daily_forecast.wind_direction, daily_forecast.wind_strength, daily_forecast.time, daily_forecast.cat_id, weather_category.cat_name, weather_category.widget, weather_category.img FROM daily_forecast join weather_category on daily_forecast.cat_id = weather_category.id WHERE daily_forecast.region_id = 7 AND daily_forecast.time LIKE 'Late Morning%' order by daily_forecast.id DESC limit 1";
 $LM_mbaravalues = $this->db->query($LM_mbrara);
 foreach ($LM_mbaravalues->result_array() as $LM_Mvalues);
 {
     $LM_Mmean_temp = $LM_Mvalues['mean_temp'];
     $LM_Mwind_direction = $LM_Mvalues['wind_direction'];
     $LM_Mwind_strength = $LM_Mvalues['wind_strength'];
     $LM_Mtime_duration = $LM_Mvalues['time'];
     $LM_Mcat_name = $LM_Mvalues['cat_name'];
     $LM_Mcat_id = $LM_Mvalues['cat_id'];
     $LM_Mwidget = $LM_Mvalues['widget'];
 }
//Querying Mbrara afternoon forecast
$A_mbrara  = "SELECT daily_forecast.max_temp, daily_forecast.wind, daily_forecast.mean_temp, daily_forecast.wind_direction, daily_forecast.wind_strength, daily_forecast.time, daily_forecast.cat_id, weather_category.cat_name, weather_category.widget, weather_category.img FROM daily_forecast join weather_category on daily_forecast.cat_id = weather_category.id WHERE daily_forecast.region_id = 7 AND daily_forecast.time LIKE 'Afternoon%' order by daily_forecast.id DESC limit 1";
 $A_mbaravalues = $this->db->query($A_mbrara);
 foreach ($A_mbaravalues->result_array() as $A_Mvalues);
 {
     $A_Mmean_temp = $A_Mvalues['mean_temp'];
     $A_Mwind_direction = $A_Mvalues['wind_direction'];
     $A_Mwind_strength = $A_Mvalues['wind_strength'];
     $A_Mtime_duration = $A_Mvalues['time'];
     $A_Mcat_name = $A_Mvalues['cat_name'];
     $A_Mcat_id = $A_Mvalues['cat_id'];
     $A_Mwidget = $A_Mvalues['widget'];
 }
//Querying Mbrara late evening forecast
$LE_mbrara  = "SELECT daily_forecast.max_temp, daily_forecast.wind, daily_forecast.mean_temp, daily_forecast.wind_direction, daily_forecast.wind_strength, daily_forecast.time, daily_forecast.cat_id, weather_category.cat_name, weather_category.widget, weather_category.img FROM daily_forecast join weather_category on daily_forecast.cat_id = weather_category.id WHERE daily_forecast.region_id = 7 AND daily_forecast.time LIKE 'Late Evening%' order by daily_forecast.id DESC limit 1";
 $LE_mbaravalues = $this->db->query($LE_mbrara);
 foreach ($LE_mbaravalues->result_array() as $LE_Mvalues);
 {
     $LE_Mmean_temp = $LE_Mvalues['mean_temp'];
     $LE_Mwind_direction = $LE_Mvalues['wind_direction'];
     $LE_Mwind_strength = $LE_Mvalues['wind_strength'];
     $LE_Mtime_duration = $LE_Mvalues['time'];
     $LE_Mcat_name = $LE_Mvalues['cat_name'];
     $LE_Mcat_id = $LE_Mvalues['cat_id'];
     $LE_Mwidget = $LE_Mvalues['widget'];
 }
  ?>
               <div class="widget-block">
                <!-- MAIN AREA -->
                  <div class="img-area">
                     <div class="img-area-mask" ></div>
                     <img src=<?php echo base_url()?>assets/frameworks/adminlte/img/mbarara-slice.jpg alt="">
                     <div class="img-area-front">
                        <h5 class="location">Mbarara </h5>
                        <p class="today"><script type="text/javascript">document.write(new Date().toLocaleDateString());</script></p>
  <!-- text carousel starts -->
                             
  <div id="text-carousel" class="carousel slide" data-ride="carousel" data-pause="false">
                           <div class="carousel-inner">
                           <!-- early morning weather forecast -->
                               <div class="item active animated fadeInUp"> 
                                  <div>
                                  <div class="widg">
                                      <div class="<?php echo $EM_Mwidget ?>"></div>
                                      </div>
                                      <div class="weather-desc">
                                          <span><?php echo $EM_Mcat_name; ?></span>
                                      </div>
                                      <p class="time"><?php echo $EM_Mtime_duration."(12:00am - 6:00am)" ?></p>
                                      <p class="today-temperature"><?php echo $EM_Mmean_temp; ?>&deg;C</p>
                                      
                                      <div class="today-wind">
                                          <p>Wind Direction: <?php echo $EM_Mwind_direction; ?></p>
                                          <p>Wind Strength: <?php echo $EM_Mwind_strength; ?></p>
                                      </div>
                                  <!--</div>-->
                                  </div>
                               </div>
                      <!-- second item -->
                          <div class="item animated fadeInUp">
                          <div>
                                  <div class="widg">
                                      <div class="<?php echo $LM_Mwidget ?>"></div>
                                      </div>
                                      <div class="weather-desc">
                                          <span><?php echo $LM_Mcat_name; ?></span>
                                      </div>
                                      <p class="time"><?php echo $LM_Mtime_duration."(6:00am - 12:00pm)" ?></p>
                                      <p class="today-temperature"><?php echo $LM_Mmean_temp; ?>&deg;C</p>
                                      
                                      <div class="today-wind">
                                          <p>Wind Direction: <?php echo $LM_Mwind_direction; ?></p>
                                          <p>Wind Strength: <?php echo $LM_Mwind_strength; ?></p>
                                      </div>
                                  <!--</div>-->
                                  </div>
                       </div>

                        <!-- third item -->
                               <div class="item animated fadeInUp">
                               <div>
                                  <div class="widg">
                                      <div class="<?php echo $A_Mwidget ?>"></div>
                                      </div>
                                      <div class="weather-desc">
                                          <span><?php echo $A_Mcat_name; ?></span>
                                      </div>
                                      <p class="time"><?php echo $A_Mtime_duration."(12:00pm - 6:00pm)" ?></p>
                                      <p class="today-temperature"><?php echo $A_Mmean_temp; ?>&deg;C</p>
                                      
                                      <div class="today-wind">
                                          <p>Wind Direction: <?php echo $A_Mwind_direction; ?></p>
                                          <p>Wind Strength: <?php echo $A_Mwind_strength; ?></p>
                                      </div>
                                  <!--</div>-->
                                  </div>
                               </div>
                        <!-- fourth item -->
                               <div class="item animated fadeInUp">
                               <div>
                                  <div class="widg">
                                      <div class="<?php echo $LE_Mwidget ?>"></div>
                                      </div>
                                      <div class="weather-desc">
                                          <span><?php echo $LE_Mcat_name; ?></span>
                                      </div>
                                      <p class="time"><?php echo $LE_Mtime_duration."(6:00pm - 12:00am)" ?></p>
                                      <p class="today-temperature"><?php echo $LE_Mmean_temp; ?>&deg;C</p>
                                      
                                      <div class="today-wind">
                                          <p>Wind Direction: <?php echo $LE_Mwind_direction; ?></p>
                                          <p>Wind Strength: <?php echo $LE_Mwind_strength; ?></p>
                                      </div>
                                  <!--</div>-->
                                  </div>
                               </div>

                           </div>
                     </div>
        <!-- text carousel emds -->
                        
                     </div>
                  </div>

               </div>
            </div>
