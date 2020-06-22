<!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                
                  <h3 class='box-title'>ADD NEW MAJOR SECTOR</h3>
                      <div class='box box-primary'>
        <form action="<?php echo site_url('index.php/Major-Sector/saveMajorSector'); ?>" method="post">
        <table class='table table-bordered'>
	      <tr>
        <td>Major-Sector Name <?php echo form_error('sector_name') ?></td>
        <td><input type="text" class="form-control" name="sector_name" id="sector_name" placeholder="Major Sector Name" value="<?php echo $sector_name; ?>" /></td>
	      <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	      <tr><td colspan='2'>
        <input type="submit" class="btn btn-primary" value="submit"/>
	    <a href="<?php echo site_url('major_sector') ?>" class="btn btn-default">Cancel</a></td></tr>
	
    </table></form>
    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->