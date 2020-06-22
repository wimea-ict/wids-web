
        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                <h3 class='box-title'>User Feedback Details</h3>
        <table class="table table-bordered">
        <?php 
		    $reg = $this->db->get_where('user_feedback');
		?>
		<tr>
        <td>District Name</td>
        <td><?php  foreach ($reg->result() as $p){ echo $p->districtname ; }?></td>
        </tr>
		<tr>
        <td>category</td>
        <td><?php echo $category; ?></td>
        </tr>
        <tr>
        <td>Accuracy (out of 10)</td>
        <td><?php echo $accuracy; ?></td>
        </tr>
        <tr>
        <td>Applicability (out of 10)</td>
        <td><?php echo $applicability; ?></td>
        </tr>
        <tr>
        <td>Timeliness (out of 10)</td>
        <td><?php echo $timeliness; ?></td>
        </tr>
        <tr>
        <td>General Comment</td>
        <td><?php echo $generalComment; ?></td>
        </tr>
		 
	    
	    <tr><td></td><td><a href="<?php echo site_url('index.php/user_feedback/readfeedback') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->