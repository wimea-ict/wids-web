
        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                <h3 class='box-title'>Inbox Read</h3>
        <table class="table table-bordered">
	    <tr><td>UpdatedInDB</td><td><?php echo $UpdatedInDB; ?></td></tr>
	    <tr><td>ReceivingDateTime</td><td><?php echo $ReceivingDateTime; ?></td></tr>
	    <tr><td>Text</td><td><?php echo $Text; ?></td></tr>
	    <tr><td>SenderNumber</td><td><?php echo $SenderNumber; ?></td></tr>
	    <tr><td>Coding</td><td><?php echo $Coding; ?></td></tr>
	    <tr><td>UDH</td><td><?php echo $UDH; ?></td></tr>
	    <tr><td>SMSCNumber</td><td><?php echo $SMSCNumber; ?></td></tr>
	    <tr><td>Class</td><td><?php echo $Class; ?></td></tr>
	    <tr><td>TextDecoded</td><td><?php echo $TextDecoded; ?></td></tr>
	    <tr><td>RecipientID</td><td><?php echo $RecipientID; ?></td></tr>
	    <tr><td>Processed</td><td><?php echo $Processed; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('inbox') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->