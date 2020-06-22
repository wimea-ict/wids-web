<?php 
  if(isset($daily_forecasted)){
    foreach ($daily_forecasted as $k) {
      $summary=$k['weather'];
      $fdate=$k['date'];
      $issuedate=$k['issuedate'];
      $Validity = $k['validitytime'];
    }
  }

 ?>
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
        <form action="<?php if(isset($daily_forecasted)){ echo  site_url('index.php/Daily_forecast/save_update/'.$this->uri->segment(3)); }else{ echo  site_url('index.php/Daily_forecast/save');}  ?>" method="post"><table class='table table-bordered'>
          
 <!-- get the regions for the dailyforecast_region table-->
 <?php if(!isset($daily_forecasted)){ ?>
          <tr>
        <td>Language</td>
        <td>


        <select name="language" id="language" class="form-control">
           <?php
         //print_r($available_language_data);exit(); 
          if(isset($available_language_data)){
         foreach($available_language_data as $dd){
            //$expiry_time = $dd['to_time'];
          ?> 
          <option value="<?php  echo $dd['id'];?>"><?php echo $dd['language'];?></option>
          <?php
        } }
        ?>
        </select>
        
        </td>
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
          <td>Duty Forecaster:</td>
            <td><input type="text" class="form-control" name="dutyforecaster" /></td>        
        </tr>   <?php } ?>  
        <tr>
          <td>Date of issue:</td>
            <td><input type="date" value="<?php echo $issuedate ?>" class="form-control" name="issuedate" /></td>        
        </tr> 
         <tr>
          <td>Validity Time:</td>
             
            <td><input type="text" name="validitytime" value="<?=$Validity ?>" class="form-control" placeholder ="e.g 6:00 am" /></td>        
        </tr>  

        <tr>
          <td>Forecasted Date:</td>
            <td><input type="date" value="<?=$fdate  ?>" class="form-control" name="date_forecasted" id="date_forecasted" /></td>        
        </tr> 



       <tr>
        <td>Weather Summary <?php echo form_error('weather') ?></td>
            <td><textarea class="form-control" rows="3" name="weather" id="weather" placeholder="Weather"><?php echo $summary; ?></textarea>
            <input type="hidden" name="id" value="<?php echo $id; ?>" />
        </td>
      </tr>
  
      <tr><td colspan='2'><input type="submit" class="btn btn-primary" value="submit">
    </td></tr>

    </table>
  </form>
    <br>
  <!-- <br>
    <p>Upload PDF Document</p>
    <form action="<?php //echo  site_url('index.php/CSV_file')?>" method="post" enctype="multipart/form-data">
<input type="file" name="file2"  /><br><input class="btn btn-primary" type="submit" value="Upload Data" />
</form> -->

    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
