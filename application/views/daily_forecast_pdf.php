<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            .word-table {
                border:1px solid black !important; 
                border-collapse: collapse !important;
                width: 100%;
            }
            .word-table tr th, .word-table tr td{
                border:1px solid black !important; 
                padding: 5px 10px;
            }
        </style>
    </head>
    <body>
        <h2>Daily_forecast List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
            <th>No</th>
                <th>Region</th>
                <th>Mean Temperature</th>
                <th>Wind Direction</th>
                <th>Wind Strength</th>
                <th>Weather</th>
                <th>Season</th>

                <th>Datetime</th>
		
            </tr><?php
            foreach ($daily_forecast_data as $daily_forecast)
            {
			 $sea = $this->db->get_where('season',array('id'=>$daily_forecast->season_id));
					$reg = $this->db->get_where('dailyforecast_region',array('DRid'=>$daily_forecast->region));
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
			  <td><?php  foreach ($reg->result() as $p){ echo $p->regionname ; }?></td>
              <td><?php echo $daily_forecast->mean_temp ?></td>
		      <td><?php echo $daily_forecast->wind_direction ?></td>
		      <td><?php echo $daily_forecast->wind_strength ?></td>
		      <td><?php echo $daily_forecast->weather ?></td>
			  <td><?php  foreach ($sea->result() as $s){ echo $s->season_name ; }?></td>
		      <td><?php echo $daily_forecast->date." ".$daily_forecast->time ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>