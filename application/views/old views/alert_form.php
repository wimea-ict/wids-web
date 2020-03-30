<!-- Include the plugin's CSS and JS: -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/bootstrap-multiselect/bootstrap-multiselect.js"></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/bootstrap-multiselect/bootstrap-multiselect.css">

<!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                
                  <h3 class='box-title'>NEW ALERT</h3>
                      <div class='box box-primary'>                          
                         
                        <form class="form-horizontal" action="<?php echo $action; ?>" method="post">

                            <fieldset>
                                <br/>

                                <!-- Alert Textarea -->
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="textarea">Alert Message</label>
                                    <div class="col-md-8">                     
                                        <textarea class="form-control" rows="3" id="alert_message" name="alert_message" placeholder="Enter forecast details here..." ></textarea>
                                        <h6 class="pull-right" id="count_alert"></h6>
                                        <span class="help-block"><?php echo form_error('alert_message') ?></span>
                                    </div>
                                </div> 
                                
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="chbox" >Send to:</label>
                                        
                                    
                                    <div class="col-md-8 checkbox" id="chbox">
                                        <textarea class="form-control" rows="1" id="sendto_list" name="sendto_list" placeholder="Enter phone numbers separated by semicolon, e.g. 0782111000;0715333444;0743000123 ;..." ></textarea>
                                        <span class="text-danger"><?php echo $no_phone_number_error; ?></span>                                                                      
                                    </div>
                                    
                                    
                                    <?php 
                                        //generating combo boxes dynamically
                                        foreach ($categories as $cat){
                                            echo '<label class="col-md-3 control-label" for="chbox" ></label>
                                                  <div class="col-md-8 checkbox" id="chbox">';
                                            if($cat['level_id']==3) //TODO: hard coded, 3 = district,change this later
                                                echo multiselect_group($cat['name'], "region", "region_name", "district", "district_name", "region_id");
                                            else if($cat['level_id']==2) //TODO: hard coded, 2 = region,change this later
                                               echo multiselect($cat['name'], "region", "region_name"); 
                                            echo '</div>';
                                        }
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
    $('#alert_message').keyup(function () {
        var text_length = $('#alert_message').val().length;
        var text_remaining = 320 - text_length;
        $('#count_alert').html(text_remaining + ' remaining');
    });
</script>