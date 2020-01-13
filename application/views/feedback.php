<!-- Main content -->

<link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/morris/morris.css">
<section class="content-header">
        <div>
        <h1>
            <small>Indigenous Knowledge Form</small>                        
                     
            <small class="pull-right">

                <?php 
                if($_SESSION['usertype'] != 'wimea' && $_SESSION['first_time_login']==1){?> 
                <a href="<?php echo base_url(); ?>index.php/Auth/change_pass"><button type="button" class="btn"><strong>Change Password</strong></button></a> 
                <?php }?>                         
            </small>
        </h1>
        </div>

      </section>  

        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                
                  <h3 class='box-title'>Offer Forecast Advice</h3>
                      <div class='box box-primary'>
                          <?php echo $msg; ?>
			<?php echo form_open('index.php/User_feedback/create_action'); ?>
      <!-- <form method="post" action="index.php/auth/submit_feedback">-->
			<table class='table table-bordered'>
		<tr><td>Name<?php echo form_error('names') ?> </td>
			<td><input type="text" name="names" placeholder="enter your name e.g Abraham" class="form-control" required /></td>
		</tr>
		<tr><td>Region <?php echo form_error('region') ?> </td>
								<td>
								<select name = "region" id="sub" class = "form-control" >
								<?php
						$selectRegions = "SELECT * FROM region order by name ASC";
						$eachRegion = $this->db->query($selectRegions);
						foreach ($eachRegion->result_array() as $rowss) { ?>
								<option value="<?php echo $rowss['regionid']; ?>"><?php echo $rowss['name']; ?></option>
						<?php } ?>
						</select>
		</td>
          </tr>
		<tr><td>District <?php echo form_error('district') ?></td>
           <td> 
					 <select name = "district" id="sub" class = "form-control" >
                              <?php

                                $dd = "SELECT * FROM ussddistricts order by districtname ASC";
                                $ddd = $this->db->query($dd);
                                foreach ($ddd->result_array() as $rowss) { ?>
                                    <option value="<?php echo $rowss['districtid']; ?>"><?php echo $rowss['districtname']; ?></option>
                    <?php } ?>

           </select>
        </td>
			</tr>
	    <tr><td>Observation</td>
            <td><textarea class="form-control" rows = "2" name="observation" placeholder="enter your observation" required ></textarea>
        </td>
			</tr>
			<tr><td>Implication(s)<?php echo form_error('impact') ?></td>
            <td><textarea class="form-control" rows = "2" name="impact" placeholder="enter the impact of that observation" required ></textarea>
        </td>
			</tr>
			<tr><td>Action(s) to take<?php echo form_error('actionToTake') ?></td>
            <td><textarea class="form-control" rows = "2" name="actionToTake" placeholder="enter actions to take" required ></textarea>
        </td>
			</tr>
		
	   <!-- <input type="hidden" name="id" value="<?php// echo $id; ?>" />  -->
	    <tr>
			<td></td>
			<td colspan='2'> 
			<?php echo form_submit('send','Submit','class="btn btn-info"'); ?> &nbsp; &nbsp; &nbsp;
		<!--<button type="submit"  name = "send" class="btn btn-primary">Submit</button>--> 
      &nbsp; &nbsp; &nbsp; <a href="<?php echo site_url('index.php') ?>" class="btn btn-default">Cancel</a>
      </td>
			</tr>
	
    </table>
	<?php echo form_close(); ?>
    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->

	