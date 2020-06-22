
        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                <h3 class='box-title'>User Feedback Details</h3>
        <table class="table table-bordered">
        <?php 
        //print_r($read_user_feedback);exit();
           foreach ($read_user_feedback as $p) {
           }
		?>
		<tr>
        <td><?php echo $p['division_type']; ?></td>
        <td><?php echo $p['division_name']; ?></td>
        </tr>
		<tr>
        <td>category</td>
        <td><?php echo $p['sector']; ?></td>
        </tr>
        <tr>
        <td>Accuracy (out of 10)</td>
        <td><?php echo $p['accuracy']; ?></td>
        </tr>
        <tr>
        <td>Applicability (out of 10)</td>
        <td><?php echo $p['applicability']; ?></td>
        </tr>
        <tr>
        <td>Timeliness (out of 10)</td>
        <td><?php echo $p['timeliness']; ?></td>
        </tr>
        <tr>
        <td>General Comment</td>
        <td><?php echo $p['generalComment']; ?></td>
        </tr>

	    
	    <tr><td></td><td><a href="<?php echo site_url('index.php/user_feedback/readfeedback') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->