        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                <h3 class='box-title'>Seasonal Forecast Read</h3>
                
             <?php foreach($seasonal_data as $dd){ ?>
        <table class="table table-bordered">
            <tr>
            	<td>Season:</td><td><h2><?php echo $dd['season_name']."(".$dd['year'].")"; ?></h2></td>
            </tr>
             <tr>
            	<td>Overview:</td><td><?php echo $dd['overview']; ?></td></tr>
            <tr>
             <tr>
            	<td>Overview:</td><td><?php echo $dd['general_forecast']; ?></td></tr>
            <tr>
            <tr>
            	<td>Issuetime</td><td><?php echo $dd['issuetime']; ?></td>
            </tr>
            
            <tr>
            	<td colspan="2"><h2>Area specific forecasts</h2></td>
            </tr>
            <?php 
			
			//print_r($area); exit;
			 if(isset($area)){
				 foreach($area as $a){
					 ?>
                     <tr>
                     		<td colspan="2"><h2> Region: <?php echo $a['region_name']; ?></h2><?php echo $a['sub_region_name']; ?></td>
                                                 
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
            
            
	</table>
    
    
    <?php } ?>
        </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->