<!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                
                  <h3 class='box-title'>ALERTS</h3>
                      <div class='box box-primary'>
        <form action="<?php echo $action; ?>" method="post"><table class='table table-bordered'>
	    <tr><td>Name <?php echo form_error('name') ?></td>
            <td><input type="text" class="form-control" name="name" id="name" placeholder="Name" value="<?php echo $name; ?>" />
        </td>
	    <tr><td>Issuetime <?php echo form_error('issuetime') ?></td>
            <td><input type="text" class="form-control" name="issuetime" id="issuetime" placeholder="Issuetime" value="<?php echo $issuetime; ?>" />
        </td>
	    <tr><td>Alertscol <?php echo form_error('alertscol') ?></td>
            <td><input type="text" class="form-control" name="alertscol" id="alertscol" placeholder="Alertscol" value="<?php echo $alertscol; ?>" />
        </td>
	    <tr><td>Region Name <?php echo form_error('region_name') ?></td>
            <td>
              <?php echo combo_function('region_id','region','region_name','id','region_id')?>
	   </td>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <tr><td colspan='2'><button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('alerts') ?>" class="btn btn-default">Cancel</a></td></tr>
	
    </table></form>
    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->