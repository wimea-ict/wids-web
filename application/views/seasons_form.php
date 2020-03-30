<!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                
                  <h3 class='box-title'>ADD NEW SEASON</h3>
                      <div class='box box-primary'>
        <form action="<?php echo site_url('index.php/Season_names/saveSeasonName'); ?>" method="post">
        <table class='table table-bordered'>
	      <tr>
          <?php 
        $btn_text ="Submit";
         $season_name = '';
       $abbreviation = '';
        $idd ='';
        if(isset($row_data)){
         $btn_text ="Update";
         foreach($row_data as $a){
          $season_name = $a['season_name'];
          $abbreviation = $a['abbreviation'];
          $idd =$a['id'];
    }
  }
    ?>
        <td>Season Name: <?php echo form_error('season_name') ?></td>
        <td><input type="text" class="form-control" name="season_name" id="season_name" placeholder="Season Name" value="<?php echo $season_name; ?>" /></td>
	     </tr>
       <tr>
        <td>Month From: <?php echo form_error('month_from') ?></td>
        <td><select id ="month_from" name="month_from" class="form-control"> 
    <option>JAN</option> 
        <option >FEB</option> 
        <option >MAR</option> 
        <option >APR</option> 
        <option >MAY</option> 
        <option >JUN</option> 
        <option >JUL</option> 
        <option >AUG</option> 
        <option >SEPT</option> 
        <option >OCT</option> 
        <option >NOV</option> 
         <option>DEC</option>                       
        </select></td>
       </tr>
        <tr>
        <td>Month To: <?php echo form_error('month_to') ?></td>
        <td><select id="month_to" name="month_to" class="form-control"> 
  
        <option>JAN</option> 
        <option >FEB</option> 
        <option >MAR</option> 
        <option >APR</option> 
        <option >MAY</option> 
        <option >JUN</option> 
        <option >JUL</option> 
        <option >AUG</option> 
        <option >SEPT</option> 
        <option >OCT</option> 
        <option >NOV</option> 
         <option>DEC</option>                        
        </select></td>
       </tr>
       <tr>
        <td>Season Abbreviation: <?php echo form_error('abbreviation') ?></td>
        <td><input type="text" class="form-control" name="abbreviation" id="abbreviation" placeholder="Abbreviation" value="<?php echo $abbreviation; ?>" /></td>
       </tr>
        <input type="hidden" id ="id" name="id" value="<?php echo $idd; ?>" /> 
	      <tr><td colspan='2'>
       <input type="submit" class="btn btn-primary" value="<?php if(isset($row_data)){
         echo "Update";}else {echo "Submit"; }?>"/></td></tr>
    </table></form>
    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->