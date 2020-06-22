<!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>

                  <h3 class='box-title'>ADD NEW MINOR SECTOR</h3>
                      <div class='box box-primary'>
        <form action="<?php echo site_url('index.php/Minor_sector/savedMinor'); ?>" method="post"><table class='table table-bordered'>
	    <tr>
    <?php 
      $btn_text ="Submit";
      $sector_name = '';
       $idd ='';
    if(isset($row_data)){
         $btn_text ="Update";
         foreach($row_data as $a){
          $sector_name = $a['minor_name'];

          $idd =$a['id'];
        }
     }
    ?>

        	<td>Sector Name <?php echo form_error('sector_name') ?></td>
            <td><input required type="text" class="form-control" name="sector_name" id="sector_name" placeholder="Sector Name" value="<?php echo $sector_name; ?>" />
        </td>
	    <input type="hidden" name="id" value="<?php echo $idd; ?>" />
	    <tr>
        <tr>
        	<td>Major Sector Name <?php echo form_error('sector_name') ?></td>
            <td>
             <select name="major_id" class="form-control">
             <?php foreach($major_data as $re){ ?>
             <option value="<?php echo $re->id; ?>"><?php echo $re->sector_name; ?></option>

             <?php } ?>

             </select>
       		 </td>
	    <tr>

        <td colspan='2'>
        <input type="submit" class="btn btn-primary" value="<?php if(isset($row_data)){
         echo "Update";}else {echo "Submit"; }?>"/>
	    </td></tr>

    </table></form>
    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
