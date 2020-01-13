
        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                <h3 class='box-title'>Decadal Forecast Details</h3>
                <?php 
			 
				  //foreach($decadal_details as $p){
					//print_r($p);
					$volume = $decadal_details->volume;	    
					$issue = $decadal_details->issue; 
					$issuedate = $decadal_details->issuedate;
					$period = $decadal_details->date_from." To ".$decadal_details->date_to;				
				 			
				?>
                
        <table class="table table-bordered">
			<tr>
            	<td>Volume</td><td><?php  echo $volume;  ?></td>
           </tr>
    	   <tr>
           		<td>Issue:</td><td><?php echo $issue;  ?></td>
           </tr>
           <tr>
           		<td>Issue Date:</td><td><?php echo $issuedate;  ?></td>
           </tr>   
	   	  <tr>
          		<td>Period:</td>
                <td><?php echo $period; ?></td>
          </tr>
          <tr>
          		<td>General Description:</td>
          		<td><?php echo $decadal_details->general_info; ?></td>
          </tr>
	        
         <tr><td>Audio</td><td>
                    <audio controls >
                        <source src="<?php echo base_url().$audio; ?>" type="audio/mpeg">
                    </audio>
                </td></tr>
	   
	</table>
        </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->