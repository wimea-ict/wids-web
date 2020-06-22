<!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>

                  <h3 class='box-title'>ADD NEW SUB-REGION</h3>
                      <div class='box box-primary'>
        <form action="<?php echo site_url('index.php/Sub_region/saveSub_region'); ?>" method="post"><table class='table table-bordered'>
	    <tr>

        <?php
        $btn_text ="Submit";
        $sub_region_name = '';
        $idd ='';
        if(isset($row_data)){
        $btn_text ="Update";
        foreach($row_data as $a){
        $sub_region_name = $a['sub_region_name'];
        $idd =$a['id'];
        }
        }
        ?>

        	<td>Sub-Region Name <?php echo form_error('sub_region_name') ?></td>
            <td><input type="text" class="form-control" name="sub_region_name" id="sub_region_name" placeholder="Sub Region Name" value="<?php echo $sub_region_name; ?>" required/>
        </td>
	    <input type="hidden" name="id" value="<?php echo $idd; ?>" />
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
	    <tr>

        <td colspan='2'>
          <input type="submit" class="btn btn-primary" value="<?php if(isset($row_data)){
           echo "Update";}else {echo "Submit"; }?>"/>
	      </td>
      </tr>

    </table></form>
    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
