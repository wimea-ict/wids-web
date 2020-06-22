        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                 

                  <h3 class='box-title'>  AREA-SPECIFIC DEKADAL FORECAST </h3>
                      <div class='box box-primary'>
        <form action="<?php echo site_url('index.php/Dekadal_forecast/saveareaforecast'); ?>" method="post" enctype="multipart/form-data" ><table class='table table-bordered'>
      <tr>
      		<td>Region <?php echo form_error('region_id') ?></td>
           <td> 
           <select name="region_id"  class="form-control" id="region_id">
            <?php 

                 $sql1 = "SELECT * FROM  region";
                            $sql3= $this->db->query($sql1);
                            foreach ($sql3->result_array() as $row2) { ?>
                           <option value="<?php echo $row2['id']; ?>"><?php echo $row2['region_name']; ?></option>
                           <?php
                            }
        
        ?>
            </select>
             </td></tr>
             <tr>
             	<td> Sub region:</td>
             	<td>
                	   <select name="subregion_id"  class="form-control" id="subregion_id">
            <?php 
			         if(isset($subregion)){
                           foreach ($subregion as $sb) { ?>
                           <option value="<?php echo $sb['id']; ?>"><?php echo $sb['sub_region_name']; ?></option>
                           <?php
                            }
					 }
        	?>
            </select>
                 
                </td>
             
             
    </tr> 
    <tr>
             <td>Dekadal Forecast Map</td>
             <td><input type="file" name="img"></td>
        </tr>

      <tr >
       <td>General information <?php echo form_error('general_info') ?></td>
        <td><textarea class="form-control" rows = "10" name="general_info" id="general_info" placeholder="General information" /> <?php echo $general_info; ?></textarea>
        </td>
                        
	    <input type="hidden" name="forecast_id" value="<?php echo $this->uri->segment(3); ?>" />

	    <tr><td colspan='2'><button type="submit" class="btn btn-primary"><?php echo "Submit" ?></button>
	    <a href="<?php echo site_url('index.php/Dekadal_forecast/index') ?>" class="btn btn-default">Cancel</a></td></tr>

    </table></form>
    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
