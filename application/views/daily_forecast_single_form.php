<!-- Main content -->

<section class="content-header">
                    <h1>
                        Daily
                        <small>Single Forecast form</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo base_url() ?>index.php/Landing/index"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="#"><i class="fa fa-dashboard"></i> Daily Forecast</a></li>
                        <li><a href="#"><i class="fa fa-dashboard"></i> Forecast form</a></li>
                    </ol>
                </section>

        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>


                  <h3 class='box-title'>DAILY FORECAST SINGLE FORM</h3>
                      <div class='box box-primary'>
        <form action="<?php echo  site_url('index.php/Daily_forecast/save')?>" method="post"><table class='table table-bordered'>
          
 <!-- get the regions for the dailyforecast_region table-->
              
        
        <tr>
          <td>Forecasted Date:</td>
            <td><input type="date" class="form-control" name="date_forecasted" /></td>        
        </tr> 
        <tr>
        <td>Forecasted Time</td>
        <td>


        <select id='time'name="time" class="form-control">
          <?php
          //print_r($forecast_time_data);exit(); 
          if(isset($forecast_time_data)){
          foreach($forecast_time_data as $dd){
            $expiry_time = $dd['to_time'];
          ?>
          <option value="<?php  echo $dd['id'];?>"><?php  echo $dd['period_name'].'('.$dd['from_time']."-".$dd['to_time'].")";?></option>
          <?php
        } }
        ?>
        </select>
        
        </td>
      </tr> 
       <tr>
          <td>Date of issue:</td>
            <td><input type="date" class="form-control" name="issuedate" /></td>        
        </tr> 
         <tr>
          <td>Validity Time:</td>
             
            <td><input type="text" name="validitytime" class="form-control" placeholder ="e.g 6:00 am" /></td>        
        </tr> 
           <tr>
          <td>Duty Forecaster:</td>
            <td><input type="text" class="form-control" name="dutyforecaster" /></td>        
        </tr>              
       <tr>
        <td>Weather Summary <?php echo form_error('weather') ?></td>
            <td><textarea class="form-control" rows="3" name="weather" id="weather" placeholder="Weather"><?php echo $weather; ?></textarea>
            <input type="hidden" name="id" value="<?php echo $id; ?>" />
        </td>
      </tr>
  
      <tr><td colspan='2'><input type="submit" class="btn btn-primary" value="submit">
    </td></tr>

    </table></form>
    <br>
    <p>Upload CSV File</p>
    <form action="<?php echo  site_url('index.php/CSV_file/index')?>" method="post" enctype="multipart/form-data">
<input type="file" name="file"  /><br><input class="btn btn-primary" type="submit" value="Upload Data" />
</form>
    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
