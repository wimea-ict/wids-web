
        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                  <h3 class='box-title'>LIST OF RECEIVED MESSAGES 
		<?php echo anchor(site_url('inbox/excel'), ' <i class="fa fa-file-excel-o"></i> Excel', 'class="btn btn-primary btn-sm"'); ?>
		<?php echo anchor(site_url('inbox/word'), '<i class="fa fa-file-word-o"></i> Word', 'class="btn btn-primary btn-sm"'); ?>
		<?php echo anchor(site_url('inbox/pdf'), '<i class="fa fa-file-pdf-o"></i> PDF', 'class="btn btn-primary btn-sm"'); ?></h3>
                </div><!-- /.box-header -->
                <div class='box-body'>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="80px">No</th>                    
		    <th>Received Date</th>		  
		    <th>Sender Number</th>
		    <th>Text</th>	
		    <th>Processed</th>
		    <th>Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($inbox_data as $inbox)
            {
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
			<td><?php echo $inbox->ReceivingDateTime ?></td>			
			<td><?php echo $inbox->SenderNumber ?></td>			
			<td><?php echo $inbox->TextDecoded ?></td>			
			<td><?php echo $inbox->Processed ?></td>
		    <td style="text-align:center" width="140px">
			<?php 
			echo anchor(site_url('inbox/read/'.$inbox->ID),'<i class="fa fa-eye"></i>',array('title'=>'detail','class'=>'btn btn-danger btn-sm')); 
			echo '  '; 
                        echo anchor(site_url('inbox/process_sms/'),'<i class="fa fa-eye"></i>',array('title'=>'Test','class'=>'btn btn-danger btn-sm')); 
			echo '  ';
			echo anchor(site_url('inbox/delete/'.$inbox->ID),'<i class="fa fa-trash-o"></i>','title="delete" class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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