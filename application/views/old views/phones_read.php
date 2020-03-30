
        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                <h3 class='box-title'>Phones Read</h3>
        <table class="table table-bordered">
	    <tr><td>ID</td><td><?php echo $ID; ?></td></tr>
	    <tr><td>UpdatedInDB</td><td><?php echo $UpdatedInDB; ?></td></tr>
	    <tr><td>InsertIntoDB</td><td><?php echo $InsertIntoDB; ?></td></tr>
	    <tr><td>TimeOut</td><td><?php echo $TimeOut; ?></td></tr>
	    <tr><td>Send</td><td><?php echo $Send; ?></td></tr>
	    <tr><td>Receive</td><td><?php echo $Receive; ?></td></tr>
	    <tr><td>Client</td><td><?php echo $Client; ?></td></tr>
	    <tr><td>Battery</td><td><?php echo $Battery; ?></td></tr>
	    <tr><td>Signal</td><td><?php echo $Signal; ?></td></tr>
	    <tr><td>Sent</td><td><?php echo $Sent; ?></td></tr>
	    <tr><td>Received</td><td><?php echo $Received; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('phones') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->