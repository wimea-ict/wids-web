<!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                
                  <h3 class='box-title'>FARMER</h3>
                      <div class='box box-primary'>
        <form action="<?php echo $action; ?>" method="post"><table class='table table-bordered'>
	    <tr><td>First Name <?php echo form_error('first_name') ?></td>
            <td><input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name" value="<?php echo $first_name; ?>" />
        </td>
	    <tr><td>Middle Name <?php echo form_error('middle_name') ?></td>
            <td><input type="text" class="form-control" name="middle_name" id="middle_name" placeholder="Middle Name" value="<?php echo $middle_name; ?>" />
        </td>
	    <tr><td>Last Name <?php echo form_error('last_name') ?></td>
            <td><input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name" value="<?php echo $last_name; ?>" />
        </td>
	    <tr><td>Phone <?php echo form_error('phone') ?></td>
            <td><input type="text" class="form-control" name="phone" id="phone" placeholder="Phone" value="<?php echo $phone; ?>" />
        </td>
	    <tr><td>District Name <?php echo form_error('district_name') ?></td>
            <td>
              <?php echo combo_function('district_id','district','district_name','id','district_id')?>
	   </td>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <tr><td colspan='2'><button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('farmer') ?>" class="btn btn-default">Cancel</a></td></tr>
	
    </table></form>
    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->