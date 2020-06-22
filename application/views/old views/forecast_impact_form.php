<!-- Main content -->
<section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>

                  <h3 class='box-title'>ADD FORECAST IMPACTS</h3>
                      <div class='box box-primary'>
        <form action="<?php echo site_url('index.php/Forecast_impact/saveforecastimpactdata'); ?>" method="post"><table class='table table-bordered'>
	    <tr>



        <td>Forecast Type <?php echo form_error('type') ?></td>
         <td>
         <select name="type" class="form-control">
         <option>Daily</option>
         <option>Seasonal</option>
         <option> Dekadal</option>
         </select>
        </td>
	    </tr>
      <tr id = "DisplayOption"><td>Possible Impacts <?php echo form_error('gen_advise') ?></td>
                       <td>
                        <div style="overflow-y: scroll; background-color: #ffffff; width: 900px; height: 200px; min-height: 200px;">
                        

                            <h3>Possible Forecast Impacts:</h3>
                            <?php
                   
                   if(isset($impacts_data)){
                          foreach($impacts_data as $dd){
                               ?>

                                <div class="radio" >
                                    <label ><input type = "radio" name = "impact_id"  id="impact_id" value = "<?php echo $dd->id; ?>" ><?php echo $dd->description; ?> </label >
                                </div >
                                <?php

                            }


                     }

                     ?>
                    </div>
                    </td></tr>

            <td colspan='2'>
              <input type="submit" class="btn btn-primary" value="Save Changes"/>
               <input type="hidden" name="forecast_id" value="<?php echo $forecast_id; ?>"/>
            </td>

      </tr>

    </table></form>
    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
