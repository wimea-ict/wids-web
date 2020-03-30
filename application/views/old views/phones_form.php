<!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                
                  <h3 class='box-title'>PHONES</h3>
                      <div class='box box-primary'>
        <form action="<?php echo $action; ?>" method="post"><table class='table table-bordered'>
	    <tr><td>ID <?php echo form_error('ID') ?></td>
            <td><textarea class="form-control" rows="3" name="ID" id="ID" placeholder="ID"><?php echo $ID; ?></textarea>
        </td></tr>
	    <tr><td>UpdatedInDB <?php echo form_error('UpdatedInDB') ?></td>
            <td><input type="text" class="form-control" name="UpdatedInDB" id="UpdatedInDB" placeholder="UpdatedInDB" value="<?php echo $UpdatedInDB; ?>" />
        </td>
	    <tr><td>InsertIntoDB <?php echo form_error('InsertIntoDB') ?></td>
            <td><input type="text" class="form-control" name="InsertIntoDB" id="InsertIntoDB" placeholder="InsertIntoDB" value="<?php echo $InsertIntoDB; ?>" />
        </td>
	    <tr><td>TimeOut <?php echo form_error('TimeOut') ?></td>
            <td><input type="text" class="form-control" name="TimeOut" id="TimeOut" placeholder="TimeOut" value="<?php echo $TimeOut; ?>" />
        </td>
	    <tr><td>Send <?php echo form_error('Send') ?></td>
            <td><input type="text" class="form-control" name="Send" id="Send" placeholder="Send" value="<?php echo $Send; ?>" />
        </td>
	    <tr><td>Receive <?php echo form_error('Receive') ?></td>
            <td><input type="text" class="form-control" name="Receive" id="Receive" placeholder="Receive" value="<?php echo $Receive; ?>" />
        </td>
	    <tr><td>Client <?php echo form_error('Client') ?></td>
            <td><textarea class="form-control" rows="3" name="Client" id="Client" placeholder="Client"><?php echo $Client; ?></textarea>
        </td></tr>
	    <tr><td>Battery <?php echo form_error('Battery') ?></td>
            <td><input type="text" class="form-control" name="Battery" id="Battery" placeholder="Battery" value="<?php echo $Battery; ?>" />
        </td>
	    <tr><td>Signal <?php echo form_error('Signal') ?></td>
            <td><input type="text" class="form-control" name="Signal" id="Signal" placeholder="Signal" value="<?php echo $Signal; ?>" />
        </td>
	    <tr><td>Sent <?php echo form_error('Sent') ?></td>
            <td><input type="text" class="form-control" name="Sent" id="Sent" placeholder="Sent" value="<?php echo $Sent; ?>" />
        </td>
	    <tr><td>Received <?php echo form_error('Received') ?></td>
            <td><input type="text" class="form-control" name="Received" id="Received" placeholder="Received" value="<?php echo $Received; ?>" />
        </td>
	    <input type="hidden" name="IMEI" value="<?php echo $IMEI; ?>" /> 
	    <tr><td colspan='2'><button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('phones') ?>" class="btn btn-default">Cancel</a></td></tr>
	
    </table></form>
    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->