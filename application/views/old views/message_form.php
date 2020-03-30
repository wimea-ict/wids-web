<!-- Include the plugin's CSS and JS: -->
<script type="text/javascript" src="<?php echo base_url();?>assets/plugins/bootstrap-multiselect/bootstrap-multiselect.js"></script>
<link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/bootstrap-multiselect/bootstrap-multiselect.css">

<!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                
                  <h3 class='box-title'>NEW MESSAGE</h3>
                      <div class='box box-primary'>
                        <form class="form-horizontal" action="<?php echo $action; ?>" method="post">

                            <fieldset>
                            <br/>
                            
                            <!-- Textarea -->
                            <div class="form-group">
                              <label class="col-md-3 control-label" for="textarea">Message</label>
                              <div class="col-md-8">                     
                                  <textarea class="form-control" rows="3" id="Message" name="Message" placeholder="Enter your message here..." ></textarea>
                                <span class="help-block"><?php echo form_error('Message') ?></span>
                              </div>
                            </div>
                              
                            <div class="form-group">
                                
                                <label class="col-md-3 control-label" for="chbox" >Send to:</label>
                                  <div class="col-md-8 checkbox" id="chbox">                              

                                   <?php echo multiselect_group("Farmer", "region", "region_name", "district", "district_name", "region_id");?>
                                  </div>
                                
                                <label class="col-md-3 control-label" for="chbox" ></label>
                                <div class="col-md-8 checkbox" id="chbox">
                                    <?php echo multiselect_group("DC", "region", "region_name", "district", "district_name", "region_id");?>
                                 </div>
                                  
                                <label class="col-md-3 control-label" for="chbox" ></label>
                                <div class="col-md-8 checkbox" id="chbox">
                                   <?php echo multiselect("RC", "region", "region_name");?>
                                <span class="error-content"><?php echo $destination_error; ?></span>                                                                      
                                </div>
                            </div>
                            
                            <!-- Button (Double) -->
                            <div class="form-group">
                              <label class="col-md-3 control-label" for="button1id"></label>
                              <div class="col-md-8">
                                <input type="hidden" name="ID" value="<?php echo $ID; ?>" /> 
                                <button id="button1id" name="button1id" class="btn btn-success"><?php echo $button ?></button>
                                <button id="button2id" name="button2id" class="btn btn-danger">Cancel</button>
                              </div>
                            </div>

                            </fieldset>

                        </form>
                    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->   