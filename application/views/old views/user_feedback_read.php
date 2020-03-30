
        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                <h3 class='box-title'>Indigenous Knowledge Details</h3>
        <table class="table table-bordered">
		<?php 
        $reg = $this->db->get_where('region',array('id'=>$region));
        $district = $this->db->get_where('ussddistricts', array('districtid'=>$district));
		?>
		<tr><td>Name</td><td><?php echo $names; ?></td></tr>
		 <tr><td>Region</td><td><?php foreach ($reg->result() as $p){ echo $p->name ; } ?></td></tr>
     <tr><td>District</td><td><?php foreach ($district->result() as $p){ echo $p->districtname ; } ?></td></tr>
     <tr><td>Observation</td><td><?php echo $observation; ?></td></tr>
     <tr><td>Implication(s)</td><td><?php echo $implication; ?></td></tr>
     <tr><td>Action(s) to take</td><td><?php echo $actionToTake; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('index.php/user_feedback/create1') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->