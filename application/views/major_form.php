<!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                
                  <h3 class='box-title'>ADD NEW MAJOR SECTOR</h3>
                      <div class='box box-primary'>
        <form action="<?php echo site_url('index.php/Major_Sector/saveMajorSector'); ?>" method="post">
        <table class='table table-bordered'>
          <tr>
            <td>Language</td>
            <td><select class="form-control" name="language" id="language" required>
                 <?php foreach($languages as $row):?>
                  <option value="<?php echo $row->id;?>"><?php echo $row->language;?></option>
                  <?php endforeach;?>
            </select></td>
          </tr>
        <tr>
        <?php 
        $btn_text ="Submit";
        $sector_name = '';
        $idd ='';
        if(isset($row_data)){
         $btn_text ="Update";
         foreach($row_data as $a){
          $sector_name = $a['sector_name'];
          $idd =$a['id'];
    }
  }
    ?>
        <td>Major-Sector Name <?php echo form_error('sector_name') ?></td>
        <td><input type="text" class="form-control" name="sector_name" id="sector_name" placeholder="Major Sector Name" value="<?php echo $sector_name; ?>" /></td>
        <input type="hidden" name="id" value="<?php echo $idd; ?>" /> 
        <tr><td colspan='2'>
        <input type="submit" class="btn btn-primary" value="<?php if(isset($row_data)){
         echo "Update";}else {echo "Submit"; }?>"/>
  
    </table></form>
    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->