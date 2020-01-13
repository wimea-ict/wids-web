<!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>

                  <h3 class='box-title'>ADD NEW REGION</h3>
                      <div class='box box-primary'>
        <form action="<?php echo site_url('index.php/Region/saveregion'); ?>" method="post"><table class='table table-bordered'>
	    <tr>
        <?php
      $btn_text ="Submit";
      $region_name = '';
      $idd ='';
      if(isset($row_data)){
       $btn_text ="Update";
       foreach($row_data as $a){
        $region_name = $a['region_name'];
        $idd =$a['id'];
  }
}
  ?>
        <td>Region Name <?php echo form_error('region_name') ?></td>
            <td><input required type="text" class="form-control" name="region_name" id="region_name" placeholder="Region Name" value="<?php echo $region_name; ?>" />
        </td>
	    <input type="hidden" name="id" value="<?php echo $idd; ?>" />
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
