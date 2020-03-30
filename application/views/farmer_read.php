
        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                <h3 class='box-title'>Farmer Read</h3>
        <table class="table table-bordered">
	    <tr><td>First Name</td><td><?php echo $first_name; ?></td></tr>
	    <tr><td>Middle Name</td><td><?php echo $middle_name; ?></td></tr>
	    <tr><td>Last Name</td><td><?php echo $last_name; ?></td></tr>
	    <tr><td>Phone</td><td><?php echo $phone; ?></td></tr>
	    <tr><td>District Name</td><td><?php echo $district_name; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('farmer') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->