        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                <h3 class='box-title'>Seasonal Forecast Read</h3>
                
             <?php foreach($seasonal_data as $dd){ ?>
        <table class="table table-bordered" style="margin-top: 20px">
            <tr>
            	<td>Season:</td><td><p><?php echo $dd['season_name']." (".$dd['abbreviation'].") ".$dd['year']; ?></p></td>
            </tr>
             <tr>
            	<td>Overview:</td><td><?php echo $dd['overview']; ?></td></tr>
            <tr>
             <tr>
            	<td>General Forecast:</td><td><?php echo $dd['general_forecast']; ?></td></tr>
            <tr>
            <tr>
            	<td>Issuetime</td><td><?php echo $dd['issuetime']; ?></td>
            </tr>
            
           
            <?php 
			
			// print_r($area); exit;
			 if(isset($area)){ ?>
                 <tr>
                    <td colspan="2"><h3>Area specific forecasts</h3></td>
                </tr> <?php
				 foreach($area as $a){
					 ?>
                     <tr>
                     		<td colspan="2"><h3> Region: <?php echo $a['region_name']; ?></h3><?php echo $a['sub_region_name']; ?></td>
                                                 
                     </tr>
                     <tr>
                     	<td colspan="2"><?php echo $a['general_info']; ?></td>
                     
                     </tr>
                     <tr>
                     	<td>Onset period: </td>
                        <td><?php echo $a['onset_desc']."&nbsp;".$a['onset_period']; ?></td>
                     
                     </tr>
                     <tr>
                     	<td>Peak period: </td>
                        <td><?php echo $a['peakdesc']."&nbsp;".$a['expected_peak']; ?></td>
                     
                     </tr>
                     <tr>
                     	<td>Expected End: </td>
                        <td><?php echo $a['end_desc']."&nbsp;".$a['end_period']; ?></td>
                     
                     </tr>
                     
                     
                     <?php 
					 
					 
			   }
				 
		     }
			
			
			?>
            <tr>
                <td colspan="2">
                    <a href="<?php echo base_url().'index.php/season/index' ?>"><button  style="background-color: #3c8dbc; width: 100px; height: 35px;border-radius: 5px; text-align: center;color: #fff">Go Back</button></a>
                </td>
            </tr>
            
            
	</table>

    
    
    <?php } ?>
        </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->