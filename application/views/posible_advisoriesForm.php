<!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>

                  <h3 class='box-title'>ADD NEW POSSIBLE ADVISORY</h3>
                      <div class='box box-primary'>
        <form action="<?php echo site_url('index.php/Possible_advisories/savedAdvisory'); ?>" method="post"><table class='table table-bordered'>
	    <tr>

        <?php
      $btn_text ="Submit";
      $cat = '';
      $advise = '';
      $state = '';
      $idd ='';
      if(isset($row_data)){
       $btn_text ="Update";
       foreach($row_data as $a){
        $cat = $a['cat'];
        $advise = $a['advise'];
        $state = $a['state'];
        $idd =$a['pos'];
  }
}
  ?>
        	<td> Sector Name <?php echo form_error('sector_id') ?></td>
           <td>
             <select id ="sector_id" name="sector_id" class="form-control">
             <?php
                     $sqlx = "SELECT * FROM  minor_sector";
                            $sql2= $this->db->query($sqlx);
               foreach ($sql2->result_array() as $re) { ?>
             <option value="<?php echo $re['id']; ?>"><?php echo $re['minor_name']; ?></option>

             <?php } ?>
             </select>
           </td>
        </td>

	    </tr>
        <tr>
        	<td> Advice <?php echo form_error('advise') ?></td>
            <td>
             <input required type="text" value ="<?php echo $advise; ?>" name="advise" class="form-control" id ="advise" placeholder ="Enter Advice">
       		 </td>
        </tr>
           <tr>
          <td> State <?php echo form_error('state') ?></td>
            <td>
             <input required type="text" value ="<?php echo $state; ?>" name="state" class="form-control" id ="state" placeholder ="Enter state">
           </td>
        </tr>
	    <input type="hidden" id="id" name="id" value="<?php echo $idd; ?>" />
    </tr>
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
