
        <!-- Main content -->
        <section class="content-header">
                    <h1>
                       <?php echo $user_feedbacks; ?>
                        
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo base_url() ?>index.php/Landing/index"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="#"><i class="fa fa-dashboard"></i>Feedback</a></li>
                        <li><a href="#"><i class="fa fa-dashboard"></i> Feedback list</a></li> 
                    </ol>
                </section>  

        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                  <h3 class='box-title'>USER FEEDBACK LIST 
        <?php $this->session->set_flashdata('message', '');
        echo anchor(site_url('index.php/user_feedback/feedback_word'), '<i class="fa fa-file-word-o"></i> Word', 'class="btn btn-primary btn-sm"'); ?>
		<?php echo anchor(site_url('index.php/user_feedback/feedback_pdf'), '<i class="fa fa-file-pdf-o"></i> PDF', 'class="btn btn-primary btn-sm"'); ?></h3>
                </div><!-- /.box-header -->
                <div class='box-body'>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th>No</th>
		    <th>District Name</th>
			<th>Category</th>
		    <th>Accuracy (out of 10)</th>
		    <th>Applicability (out of 10)</th>

            <th>Timeliness (out of 10)</th>
            <th>General Comment</th>

                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($this->user_feedback_model->readfeedback() as $user_feedback)
            {
			$reg = $this->db->get_where('ussddistricts',array('districtid'=>$user_feedback->districtName));
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
			<td><?php  foreach ($reg->result() as $p){ echo $p->districtname ; }?></td>
			<td><?php echo $user_feedback->category ?></td>
            <td><?php echo $user_feedback->accuracy ?></td>
            <td><?php echo $user_feedback->applicability ?></td>
            <td><?php echo $user_feedback->timeliness ?></td>
            <td><?php echo $user_feedback->generalComment ?></td>
			
		    <td style="text-align:center" width="100px">
			<?php 
			echo anchor(site_url('index.php/user_feedback/read_feedback/'.$user_feedback->id),'<i class="fa fa-eye"></i>',array('title'=>'detail','class'=>'btn btn-danger btn-sm')); 
			echo '  ';  
			 if($_SESSION['usertype'] == "wimea" ){
			     echo anchor(site_url('index.php/user_feedback/delete_feedback/'.$user_feedback->id),'<i class="fa fa-trash-o"></i>','title="delete" class="btn btn-danger btn-sm" onclick="javascript: return confirm(\'Are You Sure ?\')"'); 
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