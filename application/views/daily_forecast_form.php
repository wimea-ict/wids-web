<!-- Main content -->

<section class="content-header">
                    <h1>
                        Daily
                        <small>Forecast form</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo base_url() ?>index.php/Landing/index"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="#"><i class="fa fa-dashboard"></i> Daily Forecast</a></li>
                        <li><a href="#"><i class="fa fa-dashboard"></i> Forecast form</a></li>
                    </ol>
                </section>

        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>


                  <h3 class='box-title'>DAILY FORECAST</h3>
                      <div class='box box-primary'>
        <form action="<?php echo  site_url('index.php/Daily_forecast/save_multiple')?>" method="post"><table class='table table-bordered'>
         <tr><th></th><th>Late Evening</th><th>Early Morning</th><th>Late Morning</th><th>Afternoon</th>
         <tr><td> <?php echo $division_type; ?>:</td>
                <td colspan="4"> <select name="division" class="form-control">                
                         <?php 
						 //print_r($division_data); exit();
					  if(isset($division_data)){
						  foreach($division_data as $fd){
							  ?>
                              <option value="<?php echo $fd['id']; ?>"><?php echo $fd['division_name']; ?></option>
                              <?php 							  
						  }
						 }					
					?>    
               </select> </td>
            </tr>

       <tr>
       <td>Mean Temp <?php echo form_error('mean_temp') ?></td>

            <td><input type="number" class="form-control" name="mean_temp1" id="mean_temp1" placeholder="Mean Temp" value="<?php echo $mean_temp1; ?>" />
            </td>

            <td><input type="number" class="form-control" name="mean_temp2" id="mean_temp2" placeholder="Mean Temp" value="<?php echo $mean_temp2; ?>" />
            </td>

           <td><input type="number" class="form-control" name="mean_temp3" id="mean_temp3" placeholder="Mean Temp" value="<?php echo $mean_temp3; ?>" />
           </td>

            <td><input type="number" class="form-control" name="mean_temp4" id="mean_temp4" placeholder="Mean Temp" value="<?php echo $mean_temp4; ?>" />
             </td>

        </tr>	 
        <tr>
       <td>Max Temp <?php echo form_error('max_temp') ?></td>

            <td><input type="number" class="form-control" name="max_temp1" id="mean_temp1" placeholder="Mean Temp" value="<?php echo $mean_temp1; ?>" />
            </td>

            <td><input type="number" class="form-control" name="max_temp2" id="mean_temp2" placeholder="Mean Temp" value="<?php echo $mean_temp2; ?>" />
            </td>

           <td><input type="number" class="form-control" name="max_temp3" id="mean_temp3" placeholder="Mean Temp" value="<?php echo $mean_temp3; ?>" />
           </td>

            <td><input type="number" class="form-control" name="max_temp4" id="mean_temp4" placeholder="Mean Temp" value="<?php echo $mean_temp4; ?>" />
             </td>

        </tr>	 
       
       <tr>
       <td>Min Temp <?php echo form_error('min_temp') ?></td>

            <td><input type="number" class="form-control" name="min_temp1" id="mean_temp1" placeholder="Mean Temp" value="<?php echo $mean_temp1; ?>" />
            </td>

            <td><input type="number" class="form-control" name="min_temp2" id="mean_temp2" placeholder="Mean Temp" value="<?php echo $mean_temp2; ?>" />
            </td>

           <td><input type="number" class="form-control" name="min_temp3" id="mean_temp3" placeholder="Mean Temp" value="<?php echo $mean_temp3; ?>" />
           </td>

            <td><input type="number" class="form-control" name="min_temp4" id="mean_temp4" placeholder="Mean Temp" value="<?php echo $mean_temp4; ?>" />
             </td>

        </tr>
       
        <tr>
        	<td>Wind direction <?php echo form_error('wind_direction') ?></td>
            <td><select name="wind_direction1" class="form-control">
                 <option value="Easterly">Easterly</option>
                 <option value="Northerly">Northerly</option>
                 <option value="Northeasterly">Northeasterly</option>
                 <option value="Northwesterly">Northwesterly</option>
                 <option value="Southerly">Southerly</option>
                 <option value="Southeasterly">Southeasterly</option>
                 <option value="Southwesterly">Southwesterly</option>
                 <option value="Westerly">Westerly</option>
                 <option value="Variable">Variable</option>
                 </select>
            </td>

            <td><select name="wind_direction2" class="form-control">
                 <option value="Easterly">Easterly</option>
                 <option value="Northerly">Northerly</option>
                 <option value="Northeasterly">Northeasterly</option>
                 <option value="Northwesterly">Northwesterly</option>
                 <option value="Southerly">Southerly</option>
                 <option value="Southeasterly">Southeasterly</option>
                 <option value="Southwesterly">Southwesterly</option>
                 <option value="Westerly">Westerly</option>
                 <option value="Variable">Variable</option>

                 </select>
            </td>

            <td><select name="wind_direction3" class="form-control">
                 <option value="Easterly">Easterly</option>
                 <option value="Northerly">Northerly</option>
                 <option value="Northeasterly">Northeasterly</option>
                 <option value="Northwesterly">Northwesterly</option>
                 <option value="Southerly">Southerly</option>
                 <option value="Southeasterly">Southeasterly</option>
                 <option value="Southwesterly">Southwesterly</option>
                 <option value="Westerly">Westerly</option>
                 <option value="Variable">Variable</option>

                 </select>
            </td>

            <td><select name="wind_direction4" class="form-control">
                 <option value="Easterly">Easterly</option>
                 <option value="Northerly">Northerly</option>
                 <option value="Northeasterly">Northeasterly</option>
                 <option value="Northwesterly">Northwesterly</option>
                 <option value="Southerly">Southerly</option>
                 <option value="Southeasterly">Southeasterly</option>
                 <option value="Southwesterly">Southwesterly</option>
                 <option value="Westerly">Westerly</option>
                 <option value="Variable">Variable</option>

                 </select>
            </td>

      </tr>
        <tr><td>Wind strength <?php echo form_error('wind_strength') ?></td>

            <td><select name="wind_strength1" class="form-control">
                 <option value="Light">Light</option>
                 <option value="Moderate">Moderate</option>
                 <option value="Variable">Variable</option>
                 <option value="Strong">Strong</option>


                 </select>
            </td>

            <td><select name="wind_strength2" class="form-control">
                 <option value="Light">Light</option>
                 <option value="Moderate">Moderate</option>
                 <option value="Variable">Variable</option>
                 <option value="Strong">Strong</option>


                 </select>
            </td>

            <td><select name="wind_strength3" class="form-control">
            <option value="Light">Light</option>
                 <option value="Moderate">Moderate</option>
                 <option value="Variable">Variable</option>
                 <option value="Strong">Strong</option>
                 </select>
            </td>

            <td><select name="wind_strength4" class="form-control">
            <option value="Light">Light</option>
                 <option value="Moderate">Moderate</option>
                 <option value="Variable">Variable</option>
                 <option value="Strong">Strong</option>
                 </select>
            </td></tr>       

	    <tr><td>Weather Outlook <?php echo form_error('cat_id') ?></td>

         <td> <?php echo combo_function('cat_id1','weather_category','cat_name','id','cat_id1')?>
            </td>

            <td> <?php echo combo_function('cat_id2','weather_category','cat_name','id','cat_id2')?>
            </td>

            <td> <?php echo combo_function('cat_id3','weather_category','cat_name','id','cat_id3')?>
            </td>
            <td> <?php echo combo_function('cat_id4','weather_category','cat_name','id','cat_id4')?>
            </td>
      </tr>
	   <tr>
           <td>Further Outlook <?php echo form_error('weather') ?></td>
          <td colspan="4"><textarea class="form-control" name="weather" id="weather" placeholder="Further Outlook"><?php echo $weather1; ?></textarea>
          </td>
          </tr>
	    <tr><td>Season Name <?php echo form_error('season_name') ?></td>
            <td colspan="4">
                <Select name="season">
                   	 <?php 
					  if(isset($season_names)){
						  foreach($season_names as $fd){
							  ?>
                              <option value="<?php echo $fd->id; ?>"><?php echo $fd->abbreviation; ?></option>
                              <?php 							  
						  }						  
						}					
					?>                  
                
                </Select>
	       </td>
	  <input type="hidden" name="time1" value="Late Evening" />
      <input type="hidden" name="time2" value="Early Morning" />
      <input type="hidden" name="time3" value="Late Morning" />
      <input type="hidden" name="time4" value="Afternoon" />
	    <tr><td colspan='2'>
        <input type="submit" name="submit" value="Submit" />
      
	   </td></tr>

    </table></form>
    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->



        
