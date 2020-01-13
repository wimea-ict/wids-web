<!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                
                  <h3 class='box-title'>INBOX</h3>
                      <div class='box box-primary'>
        <form action="<?php echo $action; ?>" method="post"><table class='table table-bordered'>
	    <tr><td>UpdatedInDB <?php echo form_error('UpdatedInDB') ?></td>
            <td><input type="text" class="form-control" name="UpdatedInDB" id="UpdatedInDB" placeholder="UpdatedInDB" value="<?php echo $UpdatedInDB; ?>" />
        </td>
	    <tr><td>ReceivingDateTime <?php echo form_error('ReceivingDateTime') ?></td>
            <td><input type="text" class="form-control" name="ReceivingDateTime" id="ReceivingDateTime" placeholder="ReceivingDateTime" value="<?php echo $ReceivingDateTime; ?>" />
        </td>
	    <tr><td>Text <?php echo form_error('Text') ?></td>
            <td><textarea class="form-control" rows="3" name="Text" id="Text" placeholder="Text"><?php echo $Text; ?></textarea>
        </td></tr>
	    <tr><td>SenderNumber <?php echo form_error('SenderNumber') ?></td>
            <td><input type="text" class="form-control" name="SenderNumber" id="SenderNumber" placeholder="SenderNumber" value="<?php echo $SenderNumber; ?>" />
        </td>
	    <tr><td>Coding <?php echo form_error('Coding') ?></td>
            <td><input type="text" class="form-control" name="Coding" id="Coding" placeholder="Coding" value="<?php echo $Coding; ?>" />
        </td>
	    <tr><td>UDH <?php echo form_error('UDH') ?></td>
            <td><textarea class="form-control" rows="3" name="UDH" id="UDH" placeholder="UDH"><?php echo $UDH; ?></textarea>
        </td></tr>
	    <tr><td>SMSCNumber <?php echo form_error('SMSCNumber') ?></td>
            <td><input type="text" class="form-control" name="SMSCNumber" id="SMSCNumber" placeholder="SMSCNumber" value="<?php echo $SMSCNumber; ?>" />
        </td>
	    <tr><td>Class <?php echo form_error('Class') ?></td>
            <td><input type="text" class="form-control" name="Class" id="Class" placeholder="Class" value="<?php echo $Class; ?>" />
        </td>
	    <tr><td>TextDecoded <?php echo form_error('TextDecoded') ?></td>
            <td><textarea class="form-control" rows="3" name="TextDecoded" id="TextDecoded" placeholder="TextDecoded"><?php echo $TextDecoded; ?></textarea>
        </td></tr>
	    <tr><td>RecipientID <?php echo form_error('RecipientID') ?></td>
            <td><textarea class="form-control" rows="3" name="RecipientID" id="RecipientID" placeholder="RecipientID"><?php echo $RecipientID; ?></textarea>
        </td></tr>
	    <tr><td>Processed <?php echo form_error('Processed') ?></td>
            <td><input type="text" class="form-control" name="Processed" id="Processed" placeholder="Processed" value="<?php echo $Processed; ?>" />
        </td>
	    <input type="hidden" name="ID" value="<?php echo $ID; ?>" /> 
	    <tr><td colspan='2'><button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('inbox') ?>" class="btn btn-default">Cancel</a></td></tr>
	
    </table></form>
    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->