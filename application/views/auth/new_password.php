
<h1><?php echo lang('change_password_heading');?></h1>

<div id="infoMessage"><?php echo $message;?></div>

<?php echo form_open("index.php/Auth/minano");?>

      <tr><td>old Password<?php echo form_error('old_password') ?></td>
            <td>   <input type="password" name="old_password" id="old_password" class="form-control" placeholder="old Password">        </td>
        </tr>
	    <tr><td>New Password <?php echo form_error('new_password') ?></td>
            <td>   <input type="password" name="new_password" id="new_password" class="form-control" placeholder="new Password">        </td>
        </tr>

      <tr><td>Confirm Password <?php echo form_error('new_password_conf') ?></td>
            <td>   <input type="password" name="new_password_conf" id="new_password_conf" class="form-control" placeholder="confirm new Password">        </td>
        </tr>
      <?php echo $id; ?>
      <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
      <!-- <?php// echo form_input($id);?> -->
      <p><?php echo form_submit('submit', lang('change_password_submit_btn'));?></p>

<?php echo form_close();?>
