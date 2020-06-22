<!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>

                  <h3 class='box-title'>ADD NEW SEASONAL TERMINOLOGY</h3>
                      <div class='box box-primary'>
        <form action="<?php echo site_url('index.php/Terminologies/saveTerminology'); ?>" method="post">
        <table class='table table-bordered'>
	      <tr>
          <?php 
        $btn_text ="Submit";
        $description = '';
        $terminology ='';
        $idd ='';
        if(isset($row_data)){
         $btn_text ="Update";
         foreach($row_data as $a){
          $description = $a['description'];
          $terminology = $a['terminology'];
          $idd =$a['id'];
    }
  }
    ?>
        <td>Terminology <?php echo form_error('terminology') ?></td>
        <td><input required type="text" class="form-control" name="terminology" id="terminology" placeholder="terminology" value="<?php echo $terminology; ?>" /></td>
	      </tr>
                <tr>
        <td>Decsription <?php echo form_error('description') ?></td>
        <td><textarea class="form-control" rows =10 name="description" id="description" placeholder="description" value="<?php echo $description; ?>" ><?php echo $description; ?></textarea></td>
        </tr>
        <input type="hidden" id = 'id' name="id" value="<?php echo $idd; ?>" />
	      <tr><td colspan='2'>
        <input type="submit" class="btn btn-primary" value="<?php if(isset($row_data)){
         echo "Update";}else {echo "Submit"; }?>"/>
	    </td></tr>

    </table></form>
    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
