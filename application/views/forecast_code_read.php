
        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                <h3 class='box-title'>Forecast_code Read</h3>
        <table class="table table-bordered">
	    <tr><td>Abbreviation</td><td><?php echo $abbreviation; ?></td></tr>
	    <tr><td>Name</td><td><?php echo $name; ?></td></tr>
	    <tr><td>Translation</td><td><?php echo $translation; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('forecast_code') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->