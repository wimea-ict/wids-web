   <style>
        /*******************************************************/
#seasonal_forecast{
  margin-top: 60px;
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
        <!-- Main content -->
      
          <!-------------------------------SEASONAL REQUEST DATA-------------  -------------------------------------->
          <div id="seasonal_forecast">
              <h4>Seasonal Forecast for <?php echo $divisio_name ?>
                <div style="background-color: cornflowerblue;height: 3px;margin-top: 10px; width: 50%;"></div>
              </h4>
              
               <?php $count = 0; $flag = false; foreach ($seasonal_data_home as $Seasonal) : ?>

                  <?php $count++; 

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
                 
                                   // echo date('Y-F-d', strtotime($Seasonal['issuetime']));
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
                      <p align="center"><img src="<?php echo base_url() ?>assets/frameworks/adminlte/images/<?php echo $Seasonal['map'] ?>" height="80%" width="80%"></p><br>
                      <p class="season_sub_head">2.1.0  <?php echo $Seasonal['region_name']  ?> Region</p>
                      <p class="season_sub_head">2.2.1   <?php echo $Seasonal['sub_region_name']  ?></p>
                      <p> <?php echo $Seasonal['overall_comment']  ?> </p>

              <?php    $flag = true;  }

            endforeach;
              if(($count < 1) || ($flag == false)) echo "<p>Data has not yet been uploaded. Please try again later.</p>"; ?>
           </div>
 <!---------------------------------------------------- Amoko --------------------------------------->
       
