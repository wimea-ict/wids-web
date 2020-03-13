<!-- Main content -->

<section class="content-header">
                    <h1>
                        Daily
                        <small>Single Forecast data</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo base_url() ?>index.php/Landing/index"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="#"><i class="fa fa-dashboard"></i> Daily Forecast</a></li>
                        <li><a href="#"><i class="fa fa-dashboard"></i> CSV Forecast</a></li>
                    </ol>
                </section>

        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>


                  <h3 class='box-title'>DAILY FORECAST DATA</h3>
                      <div class='box box-primary'>
                        
                        <table class='table table-bordered'>
                          <tr>
                            <th><?php echo "Issue Date";  ?></th>
                            <td><?=$issue_date  ?></td>
                          </tr>
                          <tr>
                            <th><?php echo "Forecast Date";  ?></th>
                            <td><?=$forecast_date  ?></td>
                          </tr>
                          <tr>
                            <th><?php echo "Valid";  ?></th>
                            <td><?=$valid  ?></td>
                          </tr>
                          <tr>
                            <th><?php echo "Forecaster";  ?></th>
                            <td><?=$forecaster  ?></td>
                          </tr>
                          <tr>
                            <th><?php echo "Weather Summary";  ?></th>
                            <td><?=$sum  ?></td>
                          </tr>

                        </table>
        <table class='table table-bordered'>
          <thead>
            <th>ID</th>
            <th>Region</th>
            <th>Weather Description</th>
            <th>Temperature</th>
            <th>Wind Direction</th>
            <th>Wind Strength</th>
          </thead>
          
 <!-- get the regions for the dailyforecast_region table-->
 <?php

         for($m=0;$m<sizeof($temp);$m++){
                echo "<tr>";  
                echo "<td>".($m+1)."</td>";
                echo "<td>".$regs[$m]."</td>";
                echo "<td>".$weather_desc[$m]."</td>";
                echo "<td>".$temp[$m]."</td>";
                echo "<td>".$wind_dir[$m]."</td>";
                echo "<td>".$wind_str[$m]."</td>";
                echo "</tr>";
            }
            echo "</table>"; ?>
    </table>
    <a href="<?php echo  site_url('index.php/Daily_forecast/index')?>"><button class="btn btn-primary">Close</button></a>
     
   
    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
