<style>
   .weather-card .top .wrapper .temp .temp-value {
  display: inline-block;
  font-size: 85px;
  font-weight: 600; 
}

#container {
    column-count: 4;
}
.item {
    break-inside: avoid-column; 
	vertical-align:top;   
	
}
.item{
    break-after:column;
    display:block;
}

</style>

			<div class="wrapper">
						<div class="mynav">
							<a href="javascript:;"><span class="lnr lnr-chevron-left"></span></a>
							<a href="javascript:;"><span class="lnr lnr-cog"></span></a>
						</div>
                        <h3 class="location"><?php echo $division; ?></h3>
                        <?php
												 
						  if(isset($daily_forecast_data)){
							  foreach($daily_forecast_data as $d){
								  $division = $d->division_name;	
								  $date = $d->date;
								  $period_name = $d->period_name;							  
						
						?>
                         <h3><?php echo $division; ?>,&nbsp; <?php echo $date; ?> </h3>
                        
                      <div id="container">
						<div>
                        <h1 class="heading">Early Morning</h1>
						
                        <p >
                        
                        <?php  if($period_name=="Early Morning"){?>
                              <table cellspacing="3" hspace="5" vspace="3">
                                <tr>
                                    <td>Max Temp:</td><td><?php echo $d->max_temp; ?>&deg;C </td>
                                </tr>
                                <tr>
                                    <td>Min Temp:</td><td><?php echo $d->min_temp; ?>&deg;C </td>
                                </tr>
                                <tr>
                                    <td>Sunrise:</td><td><?php echo $d->sunrise; ?>&deg;C </td>
                                </tr>
                                <tr>
                                    <td>Wind:</td><td><?php echo $d->wind; ?>&deg;C </td>
                                </tr>
                                <tr>
                                    <td>Wind Direction:</td><td><?php echo $d->wind_direction; ?>&deg;C </td>
                                </tr>
                                <tr>
                                    <td>Wind Strength:</td><td><?php echo $d->wind_strength; ?>&deg;C </td>
                                </tr>
                                <tr>
                                    <td>Weather:</td><td><?php echo $d->weather; ?>&deg;C </td>
                                </tr>
                            </table>	
                                
                           
                            
                            <?php } ?>
						</p>
                        </div>
                        
                        <div class="item" style="vertical-align:top">
                        	<h1 class="heading">Late morning</h1>
						
                        <p class="temp">
                         <?php  if($period_name=="Late Morning"){?>
							
                            <table cellspacing="3" hspace="5" vspace="3">
                                <tr>
                                    <td>Max Temp:</td><td><?php echo $d->max_temp; ?>&deg;C </td>
                                </tr>
                                <tr>
                                    <td>Min Temp:</td><td><?php echo $d->min_temp; ?>&deg;C </td>
                                </tr>
                                <tr>
                                    <td>Sunrise:</td><td><?php echo $d->sunrise; ?> </td>
                                </tr>
                                <tr>
                                    <td>Wind:</td><td><?php echo $d->wind; ?></td>
                                </tr>
                                <tr>
                                    <td>Wind Direction:</td><td><?php echo $d->wind_direction; ?> </td>
                                </tr>
                                <tr>
                                    <td>Wind Strength:</td><td><?php echo $d->wind_strength; ?> </td>
                                </tr>
                                <tr>
                                    <td>Weather:</td><td><?php echo $d->weather; ?></td>
                                </tr>
                            </table>	
                            <?php } ?>
						</p>                        
                        
                        </div>
                        
                        
                          <div class="item">
                        	<h1 class="heading">After Noon</h1>
                            <?php  if($period_name=="After Noon"){?>
                            <table cellspacing="3" hspace="5" vspace="3">
                                <tr>
                                    <td>Max Temp:</td><td><?php echo $d->max_temp; ?>&deg;C </td>
                                </tr>
                                <tr>
                                    <td>Min Temp:</td><td><?php echo $d->min_temp; ?>&deg;C </td>
                                </tr>
                                <tr>
                                    <td>Sunrise:</td><td><?php echo $d->sunrise; ?> </td>
                                </tr>
                                <tr>
                                    <td>Wind:</td><td><?php echo $d->wind; ?></td>
                                </tr>
                                <tr>
                                    <td>Wind Direction:</td><td><?php echo $d->wind_direction; ?> </td>
                                </tr>
                                <tr>
                                    <td>Wind Strength:</td><td><?php echo $d->wind_strength; ?> </td>
                                </tr>
                                <tr>
                                    <td>Weather:</td><td><?php echo $d->weather; ?> </td>
                                </tr>
                            </table>
                            
                            <?php } ?>
						                     
						</p>                        
                        
                        </div>
                        
                          <div class="item">
                        	<h1 class="heading">Late Evening</h1>
						                    <p class="temp">
							      <?php  if($period_name=="Evening"){?>
                            <table cellspacing="3" hspace="5" vspace="3">
                                <tr>
                                    <td>Max Temp:</td><td><?php echo $d->max_temp; ?>&deg;C </td>
                                </tr>
                                <tr>
                                    <td>Min Temp:</td><td><?php echo $d->min_temp; ?>&deg;C </td>
                                </tr>
                                <tr>
                                    <td>Sunrise:</td><td><?php echo $d->sunrise; ?> </td>
                                </tr>
                                <tr>
                                    <td>Wind:</td><td><?php echo $d->wind; ?> </td>
                                </tr>
                                <tr>
                                    <td>Wind Direction:</td><td><?php echo $d->wind_direction; ?> </td>
                                </tr>
                                <tr>
                                    <td>Wind Strength:</td><td><?php echo $d->wind_strength; ?> </td>
                                </tr>
                                <tr>
                                    <td>Weather:</td><td><?php echo $d->weather; ?> </td>
                                </tr>
                            </table>
                            
                            <?php } ?>
						</p>                        
                        
                        </div>
                        
                      </div>
                        
					</div>
                    
                    
                    <?php 	  }
						  }
						 ?>