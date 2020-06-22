
        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                <h3 class='box-title'>Daily_forecast Read</h3>
        <table class="table table-bordered">
		<?php 
		           $sea = $this->db->get_where('season',array('id'=>$season_name));
					$reg = $this->db->get_where('dailyforecast_region',array('DRid'=>$region));
					$sea1 = $this->db->get_where('category',array('id'=>$cat));
					//$sea2 = $this->db->get_where('ussdsubregions',array('subregionid'=>$subregionid));

		?>
		<tr><td>Region</td><td><?php  foreach ($reg->result() as $p){ echo $p->regionname ; } ?></td></tr>
	    <tr><td>Mean Temp</td><td><?php echo $mean_temp; ?></td></tr>
	    <tr><td>Wind direction</td><td><?php echo $wind_direction; ?></td></tr>
	    <tr><td>Wind strength</td><td><?php echo $wind_strength; ?></td></tr>
	    <!-- <tr><td>Sunset</td><td><?php //echo $sunset; ?></td></tr>
	    <tr><td>Wind</td><td><?php //echo $wind; ?></td></tr>  -->
	    <tr><td>Weather</td><td><?php echo $weather.$weatherLuganda; ?></td></tr>
	    <tr><td>Advisory</td><td><?php echo $advisory; ?></td></tr>
	    <tr><td>Datetime</td><td><?php echo $date." ".$time; ?></td></tr>
	    <tr><td>Season Name</td><td><?php  foreach ($sea->result() as $p){ echo $p->season_name ; } ?></td></tr>
		<tr><td>Description</td><td><?php  foreach ($sea1->result() as $p){ echo $p->cat_name ; } ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('index.php/daily_forecast/create2') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->