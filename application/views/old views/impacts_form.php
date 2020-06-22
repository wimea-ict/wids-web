
<!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>

                  <h3 class='box-title'>ADD NEW IMPACT</h3>
                      <div class='box box-primary'>
        <form action="<?php echo site_url('index.php/Impacts/saveImpacts'); ?>" method="post">
        <table class='table table-bordered'>
	      <tr>

          <?php
          $btn_text ="Submit";
          $description = '';
          $idd ='';
          if(isset($row_data)){
          $btn_text ="Update";
          foreach($row_data as $a){
          $description = $a['description'];
          $idd =$a['id'];
          }
          }
          ?>

        <td>IMPACT DESCRIPTION <?php echo form_error('description') ?></td>
        <td><input required type="text" class="form-control" name="description" id="description" placeholder="Impact Description" value="<?php echo $description;?>" /></td>
	      <input type="hidden" id ="id" name="id" value="<?php echo $idd; ?>" />
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
