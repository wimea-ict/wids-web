<!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                
                  <h3 class='box-title'>MESSAGE_LOGS</h3>
                      <div class='box box-primary'>
        <form action="<?php echo $action; ?>" method="post"><table class='table table-bordered'>
	    <tr><td>Delivery Status <?php echo form_error('delivery_status') ?></td>
            <td><input type="text" class="form-control" name="delivery_status" id="delivery_status" placeholder="Delivery Status" value="<?php echo $delivery_status; ?>" />
        </td>
	    <tr><td>Created <?php echo form_error('created') ?></td>
            <td><input type="text" class="form-control" name="created" id="created" placeholder="Created" value="<?php echo $created; ?>" />
        </td>
	    <tr><td>Message Value <?php echo form_error('message_value') ?></td>
            <td><input type="text" class="form-control" name="message_value" id="message_value" placeholder="Message Value" value="<?php echo $message_value; ?>" />
        </td>
	    <tr><td>Phone <?php echo form_error('phone') ?></td>
            <td>
              <?php echo combo_function('customer_id','customer','phone','id','customer_id')?>
	   </td>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <tr><td colspan='2'><button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('message_logs') ?>" class="btn btn-default">Cancel</a></td></tr>
	
    </table></form>
    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->