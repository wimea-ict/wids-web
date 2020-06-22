
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
    "dismiss": "I Accept"
  }
})});
</script>
            <!-- kampala column -->
           <div class="full-center">
             <?php
             $kampala  = "SELECT daily_forecast.max_temp, daily_forecast.wind, daily_forecast.mean_temp, daily_forecast.wind_direction, daily_forecast.wind_strength,  daily_forecast.time, daily_forecast.cat_id, category.cat_name, category.widget FROM daily_forecast join category on daily_forecast.cat_id = category.id WHERE daily_forecast.region = 2 order by daily_forecast.id DESC limit 1";
            $kampalavalues = $this->db->query($kampala);
            foreach ($kampalavalues->result_array() as $values);
            {
            $mean_temp = $values['mean_temp'];
            $wind_direction = $values['wind_direction'];
            $wind_strength = $values['wind_strength'];
            $time_duration = $values['time'];
            $cat_name = $values['cat_name'];
            $cat_id = $values['cat_id'];
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

                                     <div class="widg">
                                        <div class="<?php echo $values['widget']; ?>"></div>
                                     </div>


                                   <div class="weather-desc">
                                      <span><?php echo $cat_name; ?></span>
                                   </div>

                                     <div class="tmp">
                                        <span class="temperature-feels"> <?php echo $time_duration; ?></span>
                                         <p class="temperature"><?php echo $mean_temp; ?>&deg;C</p>

                                     </div>
                                     <div class="wind_description">
                                         <p>Wind Direction: <?php echo $wind_direction; ?></p>
                                          <p>Wind Strength: <?php echo $wind_strength; ?></p>
                                     </div>

                                </div>
                             </div>

                          </div>
                   </div>


                   <div class="full-center">
                     <?php
                     $jinja  = "SELECT daily_forecast.max_temp, daily_forecast.wind, daily_forecast.mean_temp, daily_forecast.wind_direction, daily_forecast.wind_strength, daily_forecast.time, daily_forecast.cat_id, category.cat_name, category.widget FROM daily_forecast join category on daily_forecast.cat_id = category.id WHERE daily_forecast.region = 1 order by daily_forecast.id DESC limit 1";
                    $jinjavalues = $this->db->query($jinja);
                    foreach ($jinjavalues->result_array() as $values);
                    {
                    $mean_temp = $values['mean_temp'];
                    $wind_direction = $values['wind_direction'];
                    $wind_strength = $values['wind_strength'];
                    $time_duration = $values['time'];
                    $cat_name = $values['cat_name'];
                    $cat_id = $values['cat_id'];
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

                                             <div class="widg">
                                                <div class="<?php echo $values['widget']; ?>"></div>
                                             </div>


                                           <div class="weather-desc">
                                              <span><?php echo $cat_name; ?></span>
                                           </div>

                                      <div class="tmp">
                                          <span class="temperature-feels"><?php echo $time_duration ?></span>
                                          <p class="temperature"><?php echo $mean_temp; ?>&deg;C</p>

                                      </div>

                                      <div class="wind_description">
                                         <p>Wind Direction: <?php echo $wind_direction; ?></p>
                                          <p>Wind Strength: <?php echo $wind_strength; ?></p>
                                     </div>

                                        </div>
                                     </div>

                                  </div>
                               </div>


<div class="full-center">
  <?php
  $gulu  = "SELECT daily_forecast.max_temp, daily_forecast.wind, daily_forecast.mean_temp, daily_forecast.wind_direction, daily_forecast.wind_strength, daily_forecast.time, daily_forecast.cat_id, category.cat_name, category.widget FROM daily_forecast join category on daily_forecast.cat_id = category.id WHERE daily_forecast.region = 12 order by daily_forecast.id DESC limit 1";
 $guluvalues = $this->db->query($gulu);
 foreach ($guluvalues->result_array() as $values);
 {
 $mean_temp = $values['mean_temp'];
 $wind_direction = $values['wind_direction'];
 $wind_strength = $values['wind_strength'];
 $time_duration = $values['time'];
 $cat_name = $values['cat_name'];
 $cat_id = $values['cat_id'];
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

                          <div class="widg">
                             <div class="<?php echo $values['widget']; ?>"></div>
                          </div>


                        <div class="weather-desc">
                           <span><?php echo $cat_name; ?></span>
                        </div>

                          <div class="tmp">
                               <span class="temperature-feels"><?php echo $time_duration; ?></span>
                              <p class="temperature"><?php echo $mean_temp; ?>&deg;C</p>
                          </div>

                          <div class="wind_description">
                            <p>Wind Direction: <?php echo $wind_direction; ?></p>
                            <p>Wind Strength: <?php echo $wind_strength; ?></p>
                        </div>

                     </div>
                  </div>

               </div>
        </div>

<div class="full-center">
  <?php $mbrara  = "SELECT daily_forecast.max_temp, daily_forecast.wind, daily_forecast.mean_temp, daily_forecast.wind_direction, daily_forecast.wind_strength, daily_forecast.time, daily_forecast.cat_id, category.cat_name, category.widget, category.img FROM daily_forecast join category on daily_forecast.cat_id = category.id WHERE daily_forecast.region = 10 order by daily_forecast.id DESC limit 1";
$mbaravalues = $this->db->query($mbrara);
foreach ($mbaravalues->result_array() as $values);
{
  $mean_temp = $values['mean_temp'];
  $wind_direction = $values['wind_direction'];
  $wind_strength = $values['wind_strength'];
  $time_duration = $values['time'];
  $cat_name = $values['cat_name'];
  $cat_id = $values['cat_id'];
}


  ?>
               <div class="widget-block">
                <!-- MAIN AREA -->
                  <div class="img-area">
                     <div class="img-area-mask" ></div>
                     <img src=<?php echo base_url()?>assets/frameworks/adminlte/img/mbarara-slice.jpg alt="">
                     <div class="img-area-front">
                        <h5 class="location">MBARARA </h5>
                        <p class="today"><script type="text/javascript">document.write(new Date().toLocaleDateString());</script></p>

                          <!-- when it's showers -->
                          <div class="widg">

                                 <div class="<?php echo $values['widget'];?>"> </div>

                         </div>
                        <div class="weather-desc">
                           <span><?php echo $cat_name; ?></span>
                        </div>

                          <div class="tmp">
                               <span class="temperature-feels"><?php echo $time_duration; ?></span>
                              <p class="temperature"><?php echo $mean_temp; ?>&deg;C</p>
                          </div>

                          <div class="wind_description">
                            <p>Wind Direction: <?php echo $wind_direction; ?></p>
                            <p>Wind Strength: <?php echo $wind_strength; ?></p>
                        </div>

                     </div>
                  </div>

               </div>
            </div>
