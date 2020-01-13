        <!-- Main content -->
        <section class="content-header">
                    <h1>
                        Daily Forecast
                        <small>Data tables</small>
                    </h1>
                    <ol class="breadcrumb">
                        <?php $this->session->set_flashdata('message', ''); ?>
                        <li><a href="<?php echo base_url() ?>index.php/Landing/index"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="#"><i class="fa fa-dashboard"></i> Daily forecast</a></li>                        
                    </ol>
                </section>
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                  <h3 class='box-title'>DAILY FORECAST DATA LIST 
		<?php
		
		 $link = "index.php/daily_forecast/addnewforecastdata/".$forecast_id;
		 
		
		 echo anchor(site_url('index.php/daily_forecast/word'), '<i class="fa fa-file-word-o"></i> Word', 'class="btn btn-primary btn-sm"'); ?>
		<?php echo anchor(site_url('index.php/daily_forecast/pdf_latest'), '<i class="fa fa-file-pdf-o"></i> PDF', 'class="btn btn-primary btn-sm"'); ?> <?php echo anchor(site_url($link ), '<i class="fa fa-file-pdf-o"></i> Add New', 'class="btn btn-primary btn-sm"'); ?>
        
        </h3> 
        
        <div class="box-body">
      <!-- Buttons, labels, and many other things can be placed here! -->
      <!-- Here is a label for example -->
      <ol class="breadcrumb">
           <li> <span class="fa fa-clock-o" aria-hidden="true">Early Morning(12:00am - 06:00am)</span></li>
           <li> <span class="fa fa-clock-o" aria-hidden="true">Late Morning(06:00am - 12:00pm)</span></li>
            <li><span class="fa fa-clock-o" aria-hidden="true">Afternoon(12:00pm -06:00pm) </span></li>
            <li><span class="fa fa-clock-o" aria-hidden="true">Late Evening( 06:00pm-12:00am) </span>
      </ol>

    </div>
       
                </div><!-- /.box-header -->
                <div class='box-body'>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
            <th width="80px">No</th>
            <th>Min Temp</th>
            <th>Max Temp</th>
            <th>Mean Temp</th>
            <th>Wind Speed</th>
		    <th>Wind Direction</th>
		    <th>Wind Strength</th>
            <th>Region</th>
            <th>Division</th>
            <th>Weather</th>
            <th>Date</th>
		    <th>Action</th>
           </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
			if(isset($daily_forecast_data)){
            foreach ($daily_forecast_data as $p)
            {   ?>
                <tr>
		    <td><?php echo ++$start ?></td>
			<td><?php  if($p->max_temp==0){print('-');}else{echo $p->max_temp;}  ?></td>			
			<td><?php if($p->min_temp==0){print('-');}else{echo $p->min_temp;}  ?></td>
			<td><?php echo $p->mea_temp; ?></td>
			<td><?php echo $p->wind; ?></td>
			<td><?php echo $p->wind_direction; ?></td>			
			<td><?php echo $p->wind_strength; ?></td>
            <td><?php echo $p->region_name; ?></td>
            <td><?php echo $p->division_name; ?></td>
            <td><?php echo $p->weather; ?></td>
            <td><?php echo $p->datetime?></td>
			<td style="text-align:center" width="140px">
			<?php
										 
					 echo anchor(site_url('index.php/daily_forecast/areaforecast_list/'.$p->id),'<i class="fa fa-cloud"></i>',array('title'=>'Area forecast','class'=>'btn btn-primary btn-sm')); 
			        echo '  ';
			        echo anchor(site_url('index.php/daily_forecast/update/'.$p->id),'<i class="fa fa-pencil-square-o"></i>',array('title'=>'edit','class'=>'btn btn-primary btn-sm'));
			        echo '  ';
			        echo anchor(site_url('index.php/daily_forecast/delete/'.$p->id),'<i class="fa fa-trash-o"></i>','title="delete" class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure ?\')"');
			 
			?>
		    </td>
	        </tr>
                <?php
            }
			
			}
            ?>
            </tbody>
        </table>
        <script src="<?php echo base_url('assets/frameworks/jquery/jquery.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/plugins/datatables/jquery.dataTables.js') ?>"></script>
        <script src="<?php echo base_url('assets/plugins/datatables/dataTables.bootstrap.js') ?>"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $("#mytable").dataTable();
            });
        </script>
          <div class="box-tools pull-right">
       <?php
       echo anchor('index.php/daily_forecast/create2_1/','Archive',array('class'=>'btn btn-primary btn-sm'));
	
?>
       
       </div>
                    </div><!-- /.box-body -->
                    
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
