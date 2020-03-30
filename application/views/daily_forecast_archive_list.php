
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
                        <li><a href="#"><i class="fa fa-dashboard"></i> Data tables</a></li>
                    </ol>
                </section>
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                  <h3 class='box-title'>DAILY FORECAST ARCHIVE LIST <?php
				   if($_SESSION['usertype'] == "wimea" || $_SESSION['usertype'] == "forecast"){
				  echo anchor('index.php/daily_forecast/create/','Create',array('class'=>'btn btn-danger btn-sm'));
				   }else{

				   }
				  ?>
		<?php //echo anchor(site_url('index.php/daily_forecast/excel'), ' <i class="fa fa-file-excel-o"></i> Excel', 'class="btn btn-primary btn-sm"'); ?>
		<?php echo anchor(site_url('index.php/daily_forecast/word'), '<i class="fa fa-file-word-o"></i> Word', 'class="btn btn-primary btn-sm"'); ?>
		<?php echo anchor(site_url('index.php/daily_forecast/pdf_archive'), '<i class="fa fa-file-pdf-o"></i> PDF', 'class="btn btn-primary btn-sm"'); ?></h3>
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
       <div class="box-body">

       
       
       </div>
                </div><!-- /.box-header -->
                <div class='box-body'>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="80px">No</th>
            <th>Region</th>
            <th>Mean Temperature</th>
            <th>Wind Direction</th>
            <th>Wind Strength</th>
		    <th>Weather</th>

		    <th>Datetime</th>
		   <!-- <th>Season Name</th>-->
		    <th>Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($this->Daily_forecast_model->get_archive() as $daily_forecast)
            {
				    $sea = $this->db->get_where('season',array('id'=>$daily_forecast->season_id));
					$reg = $this->db->get_where('dailyforecast_region',array('DRid'=>$daily_forecast->region));
                    //$egg = $this->db->get_where('ussdsubregions',array('subregionid'=>$daily_forecast->subregionid));




                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
			<td><?php  foreach ($reg->result() as $p){ echo $p->regionname ; }?></td>
			<!-- <td><?php // foreach ($egg->result() as $peg){ echo $peg->subregionname ; }?></td> -->
			<td><?php echo $daily_forecast->mean_temp ?></td>
			<td><?php echo $daily_forecast->wind_direction ?></td>
			<td><?php echo $daily_forecast->wind_strength ?></td>
			<!-- <td><?php //echo $daily_forecast->wind ?></td> -->
			<td><?php echo ($daily_forecast->weather).($daily_forecast->weatherLuganda) ?></td>
			
			<td><?php echo $daily_forecast->date." ".$daily_forecast->time ?></td>
			<!--<td><?php  //foreach ($sea->result() as $s){ echo $s->season_name ; }?></td>-->
		    <td style="text-align:center" width="140px">
			<?php
			echo anchor(site_url('index.php/daily_forecast/read/'.$daily_forecast->id),'<i class="fa fa-eye"></i>',array('title'=>'detail','class'=>'btn btn-danger btn-sm'));
			echo '  ';
			 if($_SESSION['usertype'] == "wimea" || $_SESSION['usertype'] == "forecast"){
			        // echo anchor(site_url('index.php/daily_forecast/update/'.$daily_forecast->id),'<i class="fa fa-pencil-square-o"></i>',array('title'=>'edit','class'=>'btn btn-danger btn-sm'));
			        // echo '  ';
			        // echo anchor(site_url('index.php/daily_forecast/delete/'.$daily_forecast->id),'<i class="fa fa-trash-o"></i>','title="delete" class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure ?\')"');
			 }
			?>
		    </td>
	        </tr>
                <?php
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
                    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
