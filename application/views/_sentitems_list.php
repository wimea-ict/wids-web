
        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                  <h3 class='box-title'>SENTITEMS LIST <?php echo anchor('sentitems/create/','Create',array('class'=>'btn btn-danger btn-sm'));?>
		<?php echo anchor(site_url('sentitems/excel'), ' <i class="fa fa-file-excel-o"></i> Excel', 'class="btn btn-primary btn-sm"'); ?>
		<?php echo anchor(site_url('sentitems/word'), '<i class="fa fa-file-word-o"></i> Word', 'class="btn btn-primary btn-sm"'); ?>
		<?php echo anchor(site_url('sentitems/pdf'), '<i class="fa fa-file-pdf-o"></i> PDF', 'class="btn btn-primary btn-sm"'); ?></h3>
                </div><!-- /.box-header -->
                <div class='box-body'>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="80px">No</th>
		    <th>UpdatedInDB</th>
		    <th>InsertIntoDB</th>
		    <th>SendingDateTime</th>
		    <th>DeliveryDateTime</th>
		    <th>Text</th>
		    <th>DestinationNumber</th>
		    <th>Coding</th>
		    <th>UDH</th>
		    <th>SMSCNumber</th>
		    <th>Class</th>
		    <th>TextDecoded</th>
		    <th>SenderID</th>
		    <th>Status</th>
		    <th>StatusError</th>
		    <th>TPMR</th>
		    <th>RelativeValidity</th>
		    <th>CreatorID</th>
		    <th>Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($sentitems_data as $sentitems)
            {
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
			<td><?php echo $sentitems->UpdatedInDB ?></td>
			<td><?php echo $sentitems->InsertIntoDB ?></td>
			<td><?php echo $sentitems->SendingDateTime ?></td>
			<td><?php echo $sentitems->DeliveryDateTime ?></td>
			<td><?php echo $sentitems->Text ?></td>
			<td><?php echo $sentitems->DestinationNumber ?></td>
			<td><?php echo $sentitems->Coding ?></td>
			<td><?php echo $sentitems->UDH ?></td>
			<td><?php echo $sentitems->SMSCNumber ?></td>
			<td><?php echo $sentitems->Class ?></td>
			<td><?php echo $sentitems->TextDecoded ?></td>
			<td><?php echo $sentitems->SenderID ?></td>
			<td><?php echo $sentitems->Status ?></td>
			<td><?php echo $sentitems->StatusError ?></td>
			<td><?php echo $sentitems->TPMR ?></td>
			<td><?php echo $sentitems->RelativeValidity ?></td>
			<td><?php echo $sentitems->CreatorID ?></td>
		    <td style="text-align:center" width="140px">
			<?php 
			echo anchor(site_url('sentitems/read/'.$sentitems->ID),'<i class="fa fa-eye"></i>',array('title'=>'detail','class'=>'btn btn-danger btn-sm')); 
			echo '  '; 
			echo anchor(site_url('sentitems/update/'.$sentitems->ID),'<i class="fa fa-pencil-square-o"></i>',array('title'=>'edit','class'=>'btn btn-danger btn-sm')); 
			echo '  '; 
			echo anchor(site_url('sentitems/delete/'.$sentitems->ID),'<i class="fa fa-trash-o"></i>','title="delete" class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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