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
            <td><input type="date" name="date_forecasted" /></td>        
        </tr> 
        <tr>
        <td>Forecasted Time</td>
        <td>
        <select name="time" class="form-control">
          <option value="Late Evening">Late Evening(6:00pm-12:00am)</option>
          <option value="Early Morning">Early Morning(12:00am- 6:00am)</option>
          <option value="Late Morning">Late Morning(6:00am -12:00pm)</option>
          <option value="Afternoon">Afternoon(12:00pm–6:00pm)</option>
        </select>
        </td>
      </tr> 
       <tr>
        	<td>Date of issue:</td>
            <td><input type="date" name="issuedate" /></td>        
        </tr> 
         <tr>
        	<td>Validity Time:</td>
            <td><input type="text" name="validitytime" placeholder ="e.g 6:00am" /></td>        
        </tr> 
           <tr>
        	<td>Duty Forecaster:</td>
            <td><input type="text" name="dutyforecaster" /></td>        
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
    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
