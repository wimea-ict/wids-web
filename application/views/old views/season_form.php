<!-- Main content -->
<script type="text/javascript">
    function HandleOption(){

      var SelectBox = document.getElementById('lang');
      var UserOption = SelectBox.options[SelectBox.selectedIndex].value;
      if(UserOption == 'English'){
        document.getElementById('DisplayOption').style.visibility = 'visible';
      }
      else{
        document.getElementById('DisplayOption').style.visibility = 'collapse';
      }
      return false;
    }
</script>

<section class="content-header">
                    <h1>
                        Season
                        <small>Seasonal Forecast form</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo base_url() ?>index.php/Landing/index"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="#"><i class="fa fa-dashboard"></i> Season Forecast</a></li>
                        <li><a href="#"><i class="fa fa-dashboard"></i> Forecast form</a></li>
                    </ol>
                </section>
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>

                  <h3 class='box-title'>SEASONAL FORECAST</h3>
                      <div class='box box-primary'>
        <form action="<?php echo site_url('index.php/Season/saveforecast'); ?>" method="post" enctype="multipart/form-data" ><table class='table table-bordered'>
      <tr><td>Season:</td>
           <td> 
           <select name="season_id" class="form-control" id="season">
             	<?php 
				  if(isset($season_data)){
					   foreach ($season_data as $d){
						   ?>
                           <option value="<?php echo $d->id; ?>"><?php echo $d->season_name; ?></option>
                           <?php
						   
					  }				  
			     }
				
				?>
             
            </select>
             </td>
           </tr>        
          <tr>
          		<td>Year:</td>
          		<td><input type="text" name="year" /></td>
          </tr>
      
	      <tr>
          		<td>Overview:</td>
           	    <td><textarea class="form-control" rows = "3" name="overview" id="overview" placeholder="overview" /> <?php echo $overview; ?></textarea>
        		</td>
           </tr>
           <tr>
          		<td>General Forecast:</td>
           	    <td><textarea class="form-control" rows = "3" name="general_forecast" id="forecast" placeholder="general forecast" /> <?php echo $general_forecast; ?></textarea>
        		</td>
           </tr>
           <tr>
             <td>Seasonal Forecast Map</td>
             <td><input type="file" name="img"></td>
           </tr>
           <tr>
           		<td>Issue Date:</td>
                <td> <input type="date" name="date"></td>
           
           </tr>
              
                
	    <input type="hidden" name="id" value="<?php echo $id; ?>" />

	    <tr><td colspan='2'><input type="submit" value="submit" name="submit" class="btn btn-primary">
	   </td></tr>

    </table></form>
    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
