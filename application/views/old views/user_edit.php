<section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
<div class='box box-primary'>

        <div>
            <h2 padding-left="50px">Edit User</h2>
        </div>
        <form action="<?php echo $action; ?>" method="post"  enctype="multipart/form-data" >
        <table class='table table-bordered'>

	    <tr><td>First Name   <?php echo form_error('first_name') ;?></td>
             <td>
                <input type="text" name="first_name" id="first_name" class="form-control"  value="<?php
			    $reg = $this->db->get_where('users',array('id'=>$id));
			 
			  foreach($reg->result() as $rr) { echo $rr->first_name; } ?>" >
	   </td>

	   </tr>

         <tr><td>Last Name <?php echo form_error('last_name') ?></td>
                <td> 
                <input type="text" name="last_name" id="last_name" class="form-control" value="<?php
			    $reg1 = $this->db->get_where('users',array('id'=>$id));
			 
			  foreach($reg1->result() as $rr) { echo $rr->last_name; } ?>" >
             </td>
            </tr>

	    <tr><td>Email Address <?php echo form_error('email') ?></td>
            <td>   <input type="text" name="email" id="email" class="form-control" value="<?php
			    $reg3 = $this->db->get_where('users',array('id'=>$id));
			 
			  foreach($reg3->result() as $rr) { echo $rr->email; } ?>" >        </td>
        <tr>

	    <tr><td>Phone Number <?php echo form_error('phone_number') ?></td>
            <td>   <input type="text" name="phone_number" id="phone_number" class="form-control" value="<?php
			    $reg4 = $this->db->get_where('users',array('id'=>$id));
			 
			  foreach($reg4->result() as $rr) { echo $rr->phone; } ?>" >        </td>
        <tr>

	    <tr><td>Choose Username <?php echo form_error('username') ?></td>
            <td>   <input type="text" name="username" id="username" class="form-control" value="<?php
			    $reg6 = $this->db->get_where('users',array('id'=>$id));
			 
			  foreach($reg6->result() as $rr) { echo $rr->username; } ?>" >        </td>
        <tr>
            <td>User type</td>
            <td>
            <select name="usertype" id = "usertype" class="form-control" >
              <option value="forecast" <?php echo  set_select('usertype', 'forecast', TRUE); ?> > Forecast Administrator</option>
              <option value="water" <?php echo  set_select('usertype', 'water'); ?>>Water Advisory Administrator</option>
              <option value="food" <?php echo  set_select('usertype', 'food'); ?>>Food Advisory administrator</option>
              <option value="agriculture" <?php echo  set_select('usertype', 'agriculture'); ?>>Agriculture Advisory Administrator</option>
              <option value="health" <?php echo  set_select('usertype', 'health'); ?>>Health Advisory Administrator</option>
            </select>
            </td>
        </tr>
	    <!-- <tr><td>Password<?php echo form_error('pass') ?></td>
            <td>   <input type="password" name="pass" id="pass" class="form-control" value="<?php
			    $reg7 = $this->db->get_where('users',array('id'=>$id));
			 
			  foreach($reg7->result() as $rr) { echo $rr->password; } ?>" >        </td>
        </tr> -->
	    <!-- <tr><td>Confirm Password <?php echo form_error('passconf') ?></td>
            <td>   <input type="password" name="passconf" id="passconf" class="form-control" placeholder="Password">        </td>
        </tr> -->
        <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <tr><td colspan='2'><button type="submit" class="btn btn-primary">Create</button>
	    <a href="<?php echo site_url('index.php/Landing/index/') ?>" class="btn btn-default">Cancel</a>
            </td>
        </tr>
    </table></form>
    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
