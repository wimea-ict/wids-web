<!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>

                  <h3 class='box-title'>ADD NEW DAILY FORECAST PERIOD</h3>
                      <div class='box box-primary'>
        <form action="<?php echo site_url('index.php/Daily_forecast_time/saveForecastedTime'); ?>" method="post">
        <table class='table table-bordered'>
	      <tr>

          <?php
        $btn_text ="Submit";
        $period_name = '';
        $from_time = '';
        $to_time = '';
        $idd = '';
        if(isset($row_data)){
         $btn_text ="Update";
         foreach($row_data as $a){
           $period_name = $a['period_name'];
           $from_time = $a['from_time'];
           $to_time = $a['to_time'];
           $idd =$a['id'];
    }
  }
    ?>

           <td>Period Name <?php echo form_error('period_name') ?></td>
           <td><input required type="text" class="form-control" name="period_name" id="period_name" placeholder="Forecast Period Name" value="<?php echo $period_name; ?>" /></td>
        </tr>
        <tr>
           <td>Time From: <?php echo form_error('from_time') ?></td>
           <td><input required type="text" class="form-control" name="from_time" id="from_time" placeholder="Forecast Period Start-Time" value="<?php echo $from_time; ?>" /></td>
        </tr>
        <tr>
          <td>Time To: <?php echo form_error('to_time') ?></td>
           <td><input required type="text" class="form-control" name="to_time" id="to_time" placeholder="Forecast Period  End-Time" value="<?php echo $to_time; ?>" /></td>
        <input type="hidden" id="id" name="id" value="<?php echo $idd; ?>" />
        </tr>
	      <tr><td colspan='2'>
          <input type="submit" class="btn btn-primary" value="<?php if(isset($row_data)){
           echo "Update";}else {echo "Submit"; }?>"/>
	    </td></tr>

    </table></form>
    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
