<!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>

                  <h3 class='box-title'>ADD NEW CITY</h3>
                      <div class='box box-primary'>
        <form action="<?php echo site_url('index.php/City/savecity'); ?>" method="post"><table class='table table-bordered'>
	    <tr>

        <?php
      $btn_text ="Submit";
      $city_name = '';
      $idd ='';
      if(isset($row_data)){
       $btn_text ="Update";
       foreach($row_data as $a){
        $city_name = $a['city_name'];
        $idd =$a['id'];
  }
}
  ?>

        	<td>City Name <?php echo form_error('city_name') ?></td>
            <td><input required type="text" class="form-control" name="city_name" id="city_name" placeholder="City Name" value="<?php echo $city_name; ?>" />
        </td>
	    <input type="hidden" id = "id" name="id" value="<?php echo $idd; ?>" />
	    <tr>
            <tr>
                <td>Division type <?php echo form_error('division_type') ?></td>
                <td>
                <select name="division_id" class="form-control">
                    <?php
                   // print_r($this->Division_model->get_all(); exit();
                     if(isset($division_data)){
                            foreach($division_data as $dd){
                                 ?>
                                  <option value='<?php echo $dd['id']; ?>'><?php echo $dd['division_name']; ?></option>
                                 <?php

                            }


                     }

                     ?>

                </select>
                </td>

            <tr>

            <tr>
        	<td>Major City <?php echo form_error('major_city') ?></td>
            <td>Yes<input type="radio" name="major_city" id="major_city" value="1" />
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No<input type="radio" name="major_city" id="major_city" value="0" />
            </td>
            </tr>

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
