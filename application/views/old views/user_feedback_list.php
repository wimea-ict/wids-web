
        <!-- Main content -->
        <section class="content-header">
                    <h1>
                        Indigenous Forecast 
                      
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
                  <h3 class='box-title'>USER FORECAST ADVICE LIST 
		<?php echo anchor(site_url('index.php/user_feedback/word'), '<i class="fa fa-file-word-o"></i> Word', 'class="btn btn-primary btn-sm"'); ?>
		<?php echo anchor(site_url('index.php/user_feedback/pdf'), '<i class="fa fa-file-pdf-o"></i> PDF', 'class="btn btn-primary btn-sm"'); ?></h3>
                </div><!-- /.box-header -->
                <div class='box-body'>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="80px">No</th>
		    <th>Name</th>
		    <th>Region</th>
		    <th>District</th>
            <th>Observation</th>
            <th>Implication(s)</th>
            <th>Action(s) to take</th>
            <th>Status</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($this->user_feedback_model->get_all() as $user_feedback)
            {
                if ($user_feedback->status == 1) {
                   
                
            $reg = $this->db->get_where('region',array('id'=>$user_feedback->region));
            $district = $this->db->get_where('ussddistricts', array('districtid'=>$user_feedback->district));
            ?>
                <tr>
		    <td style="width: 100px;"><?php echo ++$start ?></td>
			<td><?php echo $user_feedback->names ?></td>
			<td><?php  foreach ($reg->result() as $p){ echo $p->name ; }?></td>
            <td><?php  foreach ($district->result() as $p){ echo $p->districtname ; }?></td>
            <td><?php echo $user_feedback->observation ?></td>
            <td><?php echo $user_feedback->implication ?></td>
            <td><?php echo $user_feedback->action_to_take ?></td>
    
		    <td style="text-align:center" width="140px">
            <?php 
         
               
            echo anchor(site_url('index.php/user_feedback/read/'.$user_feedback->record_id),'<i class="fa fa-eye"></i>',array('title'=>'detail','class'=>'btn btn-danger btn-sm')); 
			echo '  ';  
			 if($_SESSION['usertype'] == "wimea" ){
			     echo anchor(site_url('index.php/user_feedback/delete/'.$user_feedback->record_id),'<i class="fa fa-trash-o"></i>','title="delete" class="btn btn-danger btn-sm" onclick="javascript: return confirm(\'Are You Sure ?\')"'); 
            
             echo anchor(site_url('index.php/user_feedback/verify/'.$user_feedback->record_id),'Verified',array('class'=>'btn btn-success btn-sm')); 
                echo '  ';  
          
                }
			 ?>
		    </td>
	        </tr>
                <?php
            }
        }
            ?>

            <!-- unverified--> 
            <?php 
            foreach ($this->user_feedback_model->get_all() as $user_feedback)
            {
                if ($user_feedback->status == 0) {
                   
                
            $reg = $this->db->get_where('region',array('id'=>$user_feedback->region));
            $district = $this->db->get_where('ussddistricts', array('districtid'=>$user_feedback->district));
            ?>
                <tr>
		    <td style="width: 100px;"><?php echo ++$start ?></td>
			<td><?php echo $user_feedback->names ?></td>
			<td><?php  foreach ($reg->result() as $p){ echo $p->name ; }?></td>
            <td><?php  foreach ($district->result() as $p){ echo $p->districtname ; }?></td>
            <td><?php echo $user_feedback->observation ?></td>
            <td><?php echo $user_feedback->implication ?></td>
            <td><?php echo $user_feedback->action_to_take ?></td>
    
		    <td style="text-align:center" width="140px">
            <?php 
         
                
            echo anchor(site_url('index.php/user_feedback/read/'.$user_feedback->record_id),'<i class="fa fa-eye"></i>',array('title'=>'detail','class'=>'btn btn-danger btn-sm')); 
			echo '  ';  
			 if($_SESSION['usertype'] == "wimea" ){
			     echo anchor(site_url('index.php/user_feedback/delete/'.$user_feedback->record_id),'<i class="fa fa-trash-o"></i>','title="delete" class="btn btn-danger btn-sm" onclick="javascript: return confirm(\'Are You Sure ?\')"'); 
             
                 echo anchor(site_url('index.php/user_feedback/verify/'.$user_feedback->record_id),'Verify',array('title'=>'Verify this Indigenous Knowledge', 'class'=>'btn btn-primary btn-sm')); 
                 echo '  ';  
           
                }
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