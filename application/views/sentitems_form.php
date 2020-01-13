<!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                
                  <h3 class='box-title'>SENTITEMS</h3>
                      <div class='box box-primary'>
        <form action="<?php echo $action; ?>" method="post"><table class='table table-bordered'>
	    <tr><td>UpdatedInDB <?php echo form_error('UpdatedInDB') ?></td>
            <td><input type="text" class="form-control" name="UpdatedInDB" id="UpdatedInDB" placeholder="UpdatedInDB" value="<?php echo $UpdatedInDB; ?>" />
        </td>
	    <tr><td>InsertIntoDB <?php echo form_error('InsertIntoDB') ?></td>
            <td><input type="text" class="form-control" name="InsertIntoDB" id="InsertIntoDB" placeholder="InsertIntoDB" value="<?php echo $InsertIntoDB; ?>" />
        </td>
	    <tr><td>SendingDateTime <?php echo form_error('SendingDateTime') ?></td>
            <td><input type="text" class="form-control" name="SendingDateTime" id="SendingDateTime" placeholder="SendingDateTime" value="<?php echo $SendingDateTime; ?>" />
        </td>
	    <tr><td>DeliveryDateTime <?php echo form_error('DeliveryDateTime') ?></td>
            <td><input type="text" class="form-control" name="DeliveryDateTime" id="DeliveryDateTime" placeholder="DeliveryDateTime" value="<?php echo $DeliveryDateTime; ?>" />
        </td>
	    <tr><td>Text <?php echo form_error('Text') ?></td>
            <td><textarea class="form-control" rows="3" name="Text" id="Text" placeholder="Text"><?php echo $Text; ?></textarea>
        </td></tr>
	    <tr><td>DestinationNumber <?php echo form_error('DestinationNumber') ?></td>
            <td><input type="text" class="form-control" name="DestinationNumber" id="DestinationNumber" placeholder="DestinationNumber" value="<?php echo $DestinationNumber; ?>" />
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
	    <tr><td>SenderID <?php echo form_error('SenderID') ?></td>
            <td><input type="text" class="form-control" name="SenderID" id="SenderID" placeholder="SenderID" value="<?php echo $SenderID; ?>" />
        </td>
	    <tr><td>Status <?php echo form_error('Status') ?></td>
            <td><input type="text" class="form-control" name="Status" id="Status" placeholder="Status" value="<?php echo $Status; ?>" />
        </td>
	    <tr><td>StatusError <?php echo form_error('StatusError') ?></td>
            <td><input type="text" class="form-control" name="StatusError" id="StatusError" placeholder="StatusError" value="<?php echo $StatusError; ?>" />
        </td>
	    <tr><td>TPMR <?php echo form_error('TPMR') ?></td>
            <td><input type="text" class="form-control" name="TPMR" id="TPMR" placeholder="TPMR" value="<?php echo $TPMR; ?>" />
        </td>
	    <tr><td>RelativeValidity <?php echo form_error('RelativeValidity') ?></td>
            <td><input type="text" class="form-control" name="RelativeValidity" id="RelativeValidity" placeholder="RelativeValidity" value="<?php echo $RelativeValidity; ?>" />
        </td>
	    <tr><td>CreatorID <?php echo form_error('CreatorID') ?></td>
            <td><textarea class="form-control" rows="3" name="CreatorID" id="CreatorID" placeholder="CreatorID"><?php echo $CreatorID; ?></textarea>
        </td></tr>
	    <input type="hidden" name="ID" value="<?php echo $ID; ?>" /> 
	    <tr><td colspan='2'><button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('sentitems') ?>" class="btn btn-default">Cancel</a></td></tr>
	
    </table></form>
    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->