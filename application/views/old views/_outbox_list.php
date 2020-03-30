
        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                  <h3 class='box-title'>OUTBOX LIST <?php echo anchor('outbox/create/','Create',array('class'=>'btn btn-danger btn-sm'));?>
		<?php echo anchor(site_url('outbox/excel'), ' <i class="fa fa-file-excel-o"></i> Excel', 'class="btn btn-primary btn-sm"'); ?>
		<?php echo anchor(site_url('outbox/word'), '<i class="fa fa-file-word-o"></i> Word', 'class="btn btn-primary btn-sm"'); ?>
		<?php echo anchor(site_url('outbox/pdf'), '<i class="fa fa-file-pdf-o"></i> PDF', 'class="btn btn-primary btn-sm"'); ?></h3>
                </div><!-- /.box-header -->
                <div class='box-body'>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="80px">No</th>
		    <th>UpdatedInDB</th>
		    <th>InsertIntoDB</th>
		    <th>SendingDateTime</th>
		    <th>SendBefore</th>
		    <th>SendAfter</th>
		    <th>Text</th>
		    <th>DestinationNumber</th>
		    <th>Coding</th>
		    <th>UDH</th>
		    <th>Class</th>
		    <th>TextDecoded</th>
		    <th>MultiPart</th>
		    <th>RelativeValidity</th>
		    <th>SenderID</th>
		    <th>SendingTimeOut</th>
		    <th>DeliveryReport</th>
		    <th>CreatorID</th>
		    <th>Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($outbox_data as $outbox)
            {
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
			<td><?php echo $outbox->UpdatedInDB ?></td>
			<td><?php echo $outbox->InsertIntoDB ?></td>
			<td><?php echo $outbox->SendingDateTime ?></td>
			<td><?php echo $outbox->SendBefore ?></td>
			<td><?php echo $outbox->SendAfter ?></td>
			<td><?php echo $outbox->Text ?></td>
			<td><?php echo $outbox->DestinationNumber ?></td>
			<td><?php echo $outbox->Coding ?></td>
			<td><?php echo $outbox->UDH ?></td>
			<td><?php echo $outbox->Class ?></td>
			<td><?php echo $outbox->TextDecoded ?></td>
			<td><?php echo $outbox->MultiPart ?></td>
			<td><?php echo $outbox->RelativeValidity ?></td>
			<td><?php echo $outbox->SenderID ?></td>
			<td><?php echo $outbox->SendingTimeOut ?></td>
			<td><?php echo $outbox->DeliveryReport ?></td>
			<td><?php echo $outbox->CreatorID ?></td>
		    <td style="text-align:center" width="140px">
			<?php 
			echo anchor(site_url('outbox/read/'.$outbox->ID),'<i class="fa fa-eye"></i>',array('title'=>'detail','class'=>'btn btn-danger btn-sm')); 
			echo '  '; 
			echo anchor(site_url('outbox/update/'.$outbox->ID),'<i class="fa fa-pencil-square-o"></i>',array('title'=>'edit','class'=>'btn btn-danger btn-sm')); 
			echo '  '; 
			echo anchor(site_url('outbox/delete/'.$outbox->ID),'<i class="fa fa-trash-o"></i>','title="delete" class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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