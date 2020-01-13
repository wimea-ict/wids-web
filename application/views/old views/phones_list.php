
        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                  <h3 class='box-title'>PHONES LIST <?php echo anchor('phones/create/','Create',array('class'=>'btn btn-danger btn-sm'));?>
		<?php echo anchor(site_url('phones/pdf'), '<i class="fa fa-file-pdf-o"></i> PDF', 'class="btn btn-primary btn-sm"'); ?></h3>
                </div><!-- /.box-header -->
                <div class='box-body'>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="80px">No</th>
		    <th>ID</th>
		    <th>UpdatedInDB</th>
		    <th>InsertIntoDB</th>
		    <th>TimeOut</th>
		    <th>Send</th>
		    <th>Receive</th>
		    <th>Client</th>
		    <th>Battery</th>
		    <th>Signal</th>
		    <th>Sent</th>
		    <th>Received</th>
		    <th>Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($phones_data as $phones)
            {
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
			<td><?php echo $phones->ID ?></td>
			<td><?php echo $phones->UpdatedInDB ?></td>
			<td><?php echo $phones->InsertIntoDB ?></td>
			<td><?php echo $phones->TimeOut ?></td>
			<td><?php echo $phones->Send ?></td>
			<td><?php echo $phones->Receive ?></td>
			<td><?php echo $phones->Client ?></td>
			<td><?php echo $phones->Battery ?></td>
			<td><?php echo $phones->Signal ?></td>
			<td><?php echo $phones->Sent ?></td>
			<td><?php echo $phones->Received ?></td>
		    <td style="text-align:center" width="140px">
			<?php 
			echo anchor(site_url('phones/read/'.$phones->IMEI),'<i class="fa fa-eye"></i>',array('title'=>'detail','class'=>'btn btn-danger btn-sm')); 
			echo '  '; 
			echo anchor(site_url('phones/update/'.$phones->IMEI),'<i class="fa fa-pencil-square-o"></i>',array('title'=>'edit','class'=>'btn btn-danger btn-sm')); 
			echo '  '; 
			echo anchor(site_url('phones/delete/'.$phones->IMEI),'<i class="fa fa-trash-o"></i>','title="delete" class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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