        <!-- Main content -->

         <section class="content-header">
                    <h1>
                        Dekadal
                        <small>Data tables</small>
                    </h1>
                    <ol class="breadcrumb">
                        <?php $this->session->set_flashdata('message', ''); ?>
                        <li><a href="<?php echo base_url() ?>index.php/Landing/index"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="<?php echo base_url() ?>index.php/dekadal_forecast/create"><i class="fa fa-dashboard"></i> Dekadal Forecast</a></li>
                        <li><a href="#"><i class="fa fa-dashboard"></i> Data tables</a></li>
                    </ol>
                </section>  
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                  <h3 class='box-title'>AREA DEKADAL FORECAST LIST 
		<?php  $this->session->set_flashdata('message', '');
        echo anchor(site_url('index.php/dekadal_forecast/word'), '<i class="fa fa-file-word-o"></i> Word', 'class="btn btn-primary btn-sm"'); ?>
  <?php echo anchor(site_url('index.php/dekadal_forecast/pdf'), '<i class="fa fa-file-pdf-o"></i> PDF', 'class="btn btn-primary btn-sm"'); ?>
  <?php echo anchor(site_url('index.php/dekadal_forecast/create'), '<i class="fa fa-file-pdf-o"></i> Add New', 'class="btn btn-primary btn-sm"'); ?>
  </h3>        
       
                </div><!-- /.box-header -->
                <div class='box-body'>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="80px">No</th>
			<th>Issue</th>
            <th>Date From</th>
		    <th>Date to</th>
            <th>General Info</th>
		    <th>Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
           // print_r($dekadal_forecast_data);exit();
            foreach($dekadal_area_data as $d)
            {			
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
			<td><?php echo $d->issue; ?></td>
			<td><?php echo $d->date_from; ?></td>
			<td><?php echo $d->date_to; ?></td>
            <td><?php echo $d->general_inf0;?></td>
            <td style="text-align:center" width="190px">
			<?php 
			echo anchor(site_url('index.php/dekadal_forecast/read/'.$d->id),'<i class="fa fa-eye"></i>',array('title'=>'detail','class'=>'btn btn-primary btn-sm')); 
			echo '  '; 
			
			     echo anchor(site_url('index.php/dekadal_forecast/update/'.$d->id),'<i class="fa fa-pencil-square-o"></i>',array('title'=>'edit','class'=>'btn btn-primary btn-sm')); 
			     echo '  '; 
			     echo anchor(site_url('index.php/dekadal_forecast/delete/'.$d->id),'<i class="fa fa-trash-o"></i>','title="delete" class="btn btn-danger btn-sm" onclick="javascript: return confirm(\'Are You Sure you want to delete ?\')"'); 
    echo '  ';
		  echo anchor(site_url('index.php/dekadal_forecast/areaforecast/'.$d->id),'<i class="fa fa-cloud"></i>',array('title'=>'Area forecast','class'=>'btn btn-primary btn-sm')); 
		  	echo '  '; 
	  echo anchor(site_url('index.php/dekadal_forecast/advisory/'.$d->id),'<i class="ion-android-mail"></i>',array('title'=>'Advisory','class'=>'btn btn-primary btn-sm')); 
	


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