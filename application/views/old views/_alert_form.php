<!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                
                  <h3 class='box-title'>NEW ALERT</h3>
                      <div class='box box-primary'>
        <form action="<?php echo $action; ?>" method="post"><table class='table table-bordered'>
	    <tr><td>Alert Message <?php echo form_error('alert_message') ?></td>
            <td><textarea class="form-control" rows="3" name="alert_message" id="alert_message" placeholder="Alert Message"><?php echo $alert_message; ?></textarea>
        </td></tr>
	    <tr><td>Created <?php echo form_error('created') ?></td>
            <td><input type="text" class="form-control" name="created" id="created" placeholder="Created" value="<?php echo $created; ?>" />
        </td>
	    <tr><td>Createdby <?php echo form_error('createdby') ?></td>
            <td><input type="text" class="form-control" name="createdby" id="createdby" placeholder="Createdby" value="<?php echo $createdby; ?>" />
        </td>
	    <tr><td>Username <?php echo form_error('username') ?></td>
            <td>
              <?php echo combo_function('createdby','users','username','id','createdby')?>
	   </td>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <tr><td colspan='2'><button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('alert') ?>" class="btn btn-default">Cancel</a></td></tr>
	
    </table></form>
    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->