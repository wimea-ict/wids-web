
        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                <h3 class='box-title'>Alerts Read</h3>
        <table class="table table-bordered">
	    <tr><td>Name</td><td><?php echo $name; ?></td></tr>
	    <tr><td>Issuetime</td><td><?php echo $issuetime; ?></td></tr>
	    <tr><td>Alertscol</td><td><?php echo $alertscol; ?></td></tr>
	    <tr><td>Region Name</td><td><?php echo $region_name; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('alerts') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->