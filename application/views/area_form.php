        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                  <?php

                 $sqlx = "SELECT * FROM  season_months WHERE  id = $add_id";
                            $sql2= $this->db->query($sqlx);
                            foreach ($sql2->result_array() as $row1) { ?>
                  <h3 class='box-title'> ADD <strong><?php echo $row1['abbreviation']; }?></strong> SEASONAL FORECAST AREA</h3>
                      <div class='box box-primary'>
        <form action="<?php echo site_url('index.php/Season/SaveForecastArea'); ?>" method="post" enctype="multipart/form-data" ><table class='table table-bordered'>
      <tr><td>Region <?php echo form_error('region_id') ?></td>
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
            <tr><td>	
            
            
            On-set: <?php echo form_error('onset_start') ?></td>
                    <td> <select name="onsetdesc">
                    		<option value="Early">Early</option>
                            <option value="Mid">Mid</option>
                            <option value="Late">Late</option>
                            <option value="Early to Mid">Early to Mid</option>
                            <option value="Mid to Late">Mid to Late</option>                                     
                    
                    	</select>                  
                    
                    	<select name = "onset_start" >
                           <option value="Jan">Jan</option>
                            <option value="Feb">Feb</option>
                            <option value="Mar">Mar</option>
                            <option value="Apr">Apr</option>
                            <option value="May">May</option>
                            <option value="Jun">Jun</option>
                            <option value="Jul">Jul</option>
                            <option value="Aug">Aug</option>
                            <option value="Sept">Sept</option>
                            <option value="Oct">Oct</option>
                            <option value="Nov">Nov</option>
                            <option value="Dec">Dec</option>

                        </select>
                    </td></tr>  
          
        <tr>
        		<td>Peak: <?php echo form_error('sub_region') ?></td>
                <td>
                    <select name="peakdesc">
                    		<option value="Early">Early</option>
                            <option value="Mid">Mid</option>
                            <option value="Late">Late</option>
                            <option value="Early to Mid">Early to Mid</option>
                            <option value="Mid to Late">Mid to Late</option>                                      
                    
                    	</select>
                 <select name="expected_peak" >
                            <option value="Jan">Jan</option>
                            <option value="Feb">Feb</option>
                            <option value="Mar">Mar</option>
                            <option value="Apr">Apr</option>
                            <option value="May">May</option>
                            <option value="Jun">Jun</option>
                            <option value="Jul">Jul</option>
                            <option value="Aug">Aug</option>
                            <option value="Sept">Sept</option>
                            <option value="Oct">Oct</option>
                            <option value="Nov">Nov</option>
                            <option value="Dec">Dec</option>
               </select>
                </td>
            </tr>          
   		   <tr>
          <td>End: <?php echo form_error('seasonal_rain_end') ?></td>
          <td> 
          		<select name="enddesc">
                    		<option value="Early">Early</option>
                            <option value="Mid">Mid</option>
                            <option value="Late">Late</option>
                            <option value="Early to Mid">Early to Mid</option>
                            <option value="Mid to Late">Mid to Late</option>                                         
                    
                    	</select>
          
          		<select name="end_period">
            		<option value="Jan">Jan</option>
                    <option value="Feb">Feb</option>
                    <option value="Mar">Mar</option>
                    <option value="Apr">Apr</option>
                    <option value="May">May</option>
                    <option value="Jun">Jun</option>
                    <option value="Jul">Jul</option>
                    <option value="Aug">Aug</option>
                    <option value="Sept">Sept</option>
                    <option value="Oct">Oct</option>
                    <option value="Nov">Nov</option>
                    <option value="Dec">Dec</option>
         	 </select>
          </td>
      </tr>
     
	    <tr>
        <td>Overall Comment <?php echo form_error('overall_comment') ?></td>
        <td><textarea class="form-control" rows = "3" name="overall_comment" id="overall_comment" placeholder="Overall Comment" /> <?php echo $overall_comment; ?></textarea></td>
     </tr>
      <tr >
       <td>General information <?php echo form_error('general_info') ?></td>
        <td><textarea class="form-control" rows = "10" name="general_info" id="general_info" placeholder="General information" /> <?php echo $general_info; ?></textarea>
        </td>
                        
	    <input type="hidden" name="forecast_id" value="<?php echo $add_id; ?>" />

	    <tr><td colspan='2'><button type="submit" class="btn btn-primary"><?php echo "Submit" ?></button>
	    <a href="<?php echo site_url('index.php/season/index') ?>" class="btn btn-default">Cancel</a></td></tr>

    </table></form>
    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
