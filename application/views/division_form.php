<!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>

                  <h3 class='box-title'>ADD NEW DIVISION/STATE/DISTRICT</h3>
                      <div class='box box-primary'>
        <form action="<?php echo site_url('index.php/Division/savedivision'); ?>" method="post"><table class='table table-bordered'>
	    <tr>

        <?php
      $btn_text ="Submit";
      $division_name = '';
      $idd ='';
      if(isset($row_data)){
       $btn_text ="Update";
       foreach($row_data as $a){
        $division_name = $a['division_name'];
        $idd =$a['id'];
  }
}
  ?>

        	<td>Division Name <?php echo form_error('division_name') ?></td>
            <td><input required type="text" class="form-control" name="division_name" id="division_name" placeholder="Division Name" value="<?php echo $division_name; ?>" />
        </td>
	    <tr>
        <tr>
        	<td>Region Name <?php echo form_error('region_name') ?></td>
            <td>
             <select name="region_id" class="form-control">
             <?php foreach($region_data as $re){ ?>
             <option value="<?php echo $re->id; ?>"><?php echo $re->region_name; ?></option>

             <?php } ?>

             </select>
       		 </td>
	    <input type="hidden" name="id" value="<?php echo $idd; ?>" />
	    <tr>
        <tr>
        	<td>Division type <?php echo form_error('division_type') ?></td>
            <td>
             <select name="division_type" class="form-control">
                  <option value="District">District</option>
                 <option value="State">State</option>
                 <option value="Province">Province</option>

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
