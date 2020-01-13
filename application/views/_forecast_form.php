<?php error_reporting(0);
?><!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                
                  <h3 class='box-title'>FORECAST</h3>
                      <div class='box box-primary'>
        <form action="<?php echo $action; ?>" method="post"><table class='table table-bordered'>
	    <tr><td>Forecast <?php echo form_error('forecast') ?></td>
            <td><textarea class="form-control" rows="3" name="forecast" id="forecast" placeholder="Forecast"><?php echo $forecast; ?></textarea>
        </td></tr>
	    <tr><td>Advisory <?php echo form_error('advisory') ?></td>
            <td><textarea class="form-control" rows="3" name="advisory" id="advisory" placeholder="Advisory"><?php echo $advisory; ?></textarea>
        </td></tr>
            <tr><td>Season <?php echo form_error('season') ?></td>
            <td>
              <?php echo combo_function('season_id','season','season_name','id','season_id')?>
	   </td>
           
	    <tr><td>Created By <?php echo form_error('username') ?></td>
            <td>
              <?php echo combo_function('createdby','users','username','id','createdby')?>
	   </td>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <tr><td colspan='2'><button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('forecast') ?>" class="btn btn-default">Cancel</a></td></tr>
	
    </table></form>
    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->