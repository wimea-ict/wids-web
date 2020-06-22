
        <!-- Main content -->
        
         <section class="content-header">
                    <h1>
                        Active User List
                        <small>Data tables</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo base_url() ?>index.php/Landing/index"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="#"><i class="fa fa-dashboard"></i> Active User List</a></li>
                        <li><a href="#"><i class="fa fa-dashboard"></i> Data tables</a></li>
                    </ol>
                </section>  

        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                  <h3 class='box-title'>ACTIVE USER LIST <?php
                  //have to replace the forecast usertype to user??
                   if($_SESSION['usertype'] == "wimea" || $_SESSION['usertype'] == "forecast"){
				  echo anchor('index.php/Landing/create_user/','Create',array('class'=>'btn btn-danger btn-sm'));
				   }else{
					   
				   }?>
		<?php //echo anchor(site_url('index.php/season/excel'), ' <i class="fa fa-file-excel-o"></i> Excel', 'class="btn btn-primary btn-sm"'); ?>
		<?php //echo anchor(site_url('index.php/season/word'), '<i class="fa fa-file-word-o"></i> Word', 'class="btn btn-primary btn-sm"'); ?>
		<?php //echo anchor(site_url('index.php/season/pdf'), '<i class="fa fa-file-pdf-o"></i> PDF', 'class="btn btn-primary btn-sm"'); ?></h3>
                </div><!-- /.box-header --> <!--style=" overflow-y: scroll;"-->
                <div class='box-body'   >
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="80px">No</th>
		    <th>Username</th>
			<th>First Name</th>
            <th>Last Name</th>
		    <th>email</th>
		    <th>type</th>
             <th>phone</th>
		   
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($this->Landing_model->get_all() as $users)
            {
			// $reg = $this->db->get_where('region',array('id'=>$decadal_forecast->region));
            //   $audio = "<span class='glyphicon glyphicon-music'></span>";
            //   $graph = "<span class='glyphicon glyphicon-picture'></span>";
            //     $graph2 = str_replace("uploads_decadal/","",$decadal_forecast->graph);
            //     $audio2 = str_replace("uploads_decadal/","",$decadal_forecast->audio);
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
			<td><?php echo substr(($users->username), 0, 20)?></td>
			<td><?php   echo substr(($users->first_name), 0, 20)?></td>
			<td><?php echo $users->last_name ?></td>
			<td><?php echo $users->email ?></td>
             <td><?php echo $users->usertype ?></td>
              <td><?php echo $users->phone ?></td>
			
		    <td style="text-align:center" width="140px" disabled>
			<?php 
             echo anchor(site_url('index.php/Landing/update_user/'.$users->id),'<i class="fa fa-pencil-square-o"></i>',array('title'=>'Edit','class'=>'btn btn-danger btn-sm')); 
			echo ' '; 
			 if($_SESSION['usertype'] == "wimea" || $_SESSION['usertype'] == "forecast"){
                echo anchor(site_url('index.php/Landing/deactivate_user/'.$users->id),'<i class="fa fa-eye"></i>',array('title'=>'Deactivate','class'=>'btn btn-danger btn-sm')); 			
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