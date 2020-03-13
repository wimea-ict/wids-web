<!-- Main content -->

        <section class="content-header">
                    <h1>
                       Dekadal Advisory
                        <small>Data tables</small>
                    </h1>
                    <ol class="breadcrumb">
                    	<?php $this->session->set_flashdata('message', ''); ?>
                        <li><a href="<?php echo base_url() ?>index.php/Landing/index"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="#"><i class="fa fa-dashboard"></i> Advisory</a></li>
                        <li><a href="#"><i class="fa fa-dashboard"></i> Data tables</a></li>
                    </ol>
                </section> 
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                  <h3 class='box-title'>DEKADAL ADVISORY LIST 
        <?php 
        $link = "index.php/Dekadal_forecast/create_advisory_form/".$dekadal_id;
        //echo anchor(site_url('index.php/Advisory/excel'), ' <i class="fa fa-file-excel-o"></i> Excel', 'class="btn btn-primary btn-sm"'); ?>
		<?php $this->session->set_flashdata('message', ''); 
		echo anchor(site_url('index.php/Advisory/dekadal_advisory_word'), '<i class="fa fa-file-word-o"></i> Word', 'class="btn btn-primary btn-sm"'); ?>
		<?php echo anchor(site_url('index.php/Advisory/dekadaladvisory_pdf'), '<i class="fa fa-file-pdf-o"></i> PDF', 'class="btn btn-primary btn-sm"'); ?>
      
        <?php if($this->uri->segment(3) != NULL)echo anchor(site_url($link ), '<i class="fa fa-plus"></i> Add New', 'class="btn btn-primary btn-sm"'); ?>

        </h3>
                </div><!-- /.box-header -->
                <div class='box-body'>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="80px">No</th>
                    <th>Sector</th>
                     <th>Advice</th>
                     <th>Summary</th>
                    <th>Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php	
			
            $start = 0;
		if(isset($get_all_advisory)){
            foreach ($get_all_advisory as $ad)
            {
             ?>
                <tr>
                    <td><?php echo ++$start ?></td>
                    <td><?php  echo $ad['minor_name'] ; ?></td>
                    <td><?php echo $ad['advice']; ?></td>                   
                    <td> <?php echo $ad['message_summary']; ?>     </td>                 
                    
                    <td style="text-align:center" width="140px">
			<?php 
			echo anchor(site_url('index.php/Dekadal_forecast/read/'.$ad['id']),'<i class="fa fa-eye"></i>',array('title'=>'detail','class'=>'btn btn-primary btn-sm')); 			 
			    //echo anchor(site_url('index.php/Advisory/update/'.$advise->record_id),'<i class="fa fa-pencil-square-o"></i>',array('title'=>'edit','class'=>'btn btn-primary btn-sm')); 
			    echo '  '; 
			    echo anchor(site_url('index.php/Dekadal_forecast/delete_ad/'.$ad['id']),'<i class="fa fa-trash-o"></i>','title="delete" class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
			
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
                    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->