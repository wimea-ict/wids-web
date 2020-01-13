
        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                <h3 class='box-title'>Forecast Read</h3>
        <table class="table table-bordered">
	    <tr><td>Forecast</td><td><?php echo $forecast; ?></td></tr>
	    <tr><td>Advisory</td><td><?php echo $advisory; ?></td></tr>
	    <tr><td>Created</td><td><?php echo $created; ?></td></tr>
	    <tr><td>Createdby</td><td><?php if (isset($createdby) && $createdby!=null){echo $createdby; }  ?></td></tr>
	    <tr><td>Username</td><td><?php echo $username; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('forecast') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->