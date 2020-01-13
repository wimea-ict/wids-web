<!-- Include the plugin's CSS and JS: -->

<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/bootstrap-multiselect/bootstrap-multiselect.js"></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/bootstrap-multiselect/bootstrap-multiselect.css">

<!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                
                  <h3 class='box-title'>NEW FORECAST</h3>
                      <div class='box box-primary'>
                          
                         
                        <form class="form-horizontal" action="<?php echo $action; ?>" method="post">

                            <fieldset>
                                <br/>

                                <!-- Forecast Textarea -->
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="textarea">Forecast</label>
                                    <div class="col-md-8">                     
                                        <textarea class="form-control" rows="3" id="forecast" name="forecast" placeholder="Enter forecast details here..." ></textarea>
                                        <h6 class="pull-right" id="count_forecast"></h6>
                                        <span class="help-block"><?php echo form_error('forecast') ?></span>
                                    </div>
                                </div>
                                
                                <!-- Advisory Textarea -->
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="textarea">Advisory</label>
                                    <div class="col-md-8">                     
                                        <textarea class="form-control" rows="3" id="advisory" name="advisory" placeholder="Type an advisory note here..." ></textarea>
                                        <h6 class="pull-right" id="count_advisory"></h6>
                                        <span class="help-block"><?php echo form_error('advisory') ?></span>
                                    </div>
                                </div>
                                
                                <!-- forecast type -->
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="select">Season</label>
                                    <div class="col-md-8 select" id="select">    
                                         <?php echo combo_function('season_id','season','season_name','id','season_id')?>
                                        <span class="help-block"><?php echo form_error('season_id') ?></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="chbox" >Send to:</label>
                                        
                                    
                                    <div class="col-md-8 checkbox" id="chbox">
                                        <textarea class="form-control" rows="1" id="sendto_list" name="sendto_list" placeholder="Enter phone numbers separated by semicolon, e.g. 0782111000;0715333444;0743000123 ;..." ></textarea>
                                        <span class="text-danger"><?php if (isset($no_phone_number_error) && $no_phone_number_error!=null){echo $no_phone_number_error; }?></span>                                                                      
                                    </div>
                                    
                                    
                                    <?php 
                                        //generating combo boxes dynamically
                                     if (isset($categories)){
                                        foreach ($categories as $cat){
                                            echo '<label class="col-md-3 control-label" for="chbox" ></label>
                                                  <div class="col-md-8 checkbox" id="chbox">';
                                            if($cat['level_id']==3) //TODO: hard coded, 3 = district,change this later
                                                echo multiselect_group($cat['name'], "region", "region_name", "district", "district_name", "region_id");
                                            else if($cat['level_id']==2) //TODO: hard coded, 2 = region,change this later
                                               echo multiselect($cat['name'], "region", "region_name"); 
                                            echo '</div>';
                                        }}
                                    ?>
                                    
               
                                    
                                    
                                    
                                    
                                </div>

                                <!-- Button -->
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="button1id"></label>
                                    <div class="col-md-8">
                                        <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
                                        <button type="submit" name="button_id" class="btn btn-success"><?php echo $button ?></button>
                                        <a href="<?php echo site_url('forecast') ?>" class="btn btn-danger">Cancel</a>
                                    </div>
                                </div>

                            </fieldset>

                        </form>
                    </div><!-- /.box-body -->
                    
                    
                    
        
    <!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
            </div> <!-- box -->
          </div><!-- /.row -->
        </section><!-- /.content -->
        
        
<script type="text/javascript">
    $('#forecast').keyup(function () {
        var text_length = $('#forecast').val().length;
        var text_remaining = 320 - text_length;
        $('#count_forecast').html(text_remaining + ' remaining');
    });
    
    $('#advisory').keyup(function () {
        var text_length = $('#advisory').val().length;
        var text_remaining = 320 - text_length;
        $('#count_advisory').html(text_remaining + ' remaining');
    });
</script>
