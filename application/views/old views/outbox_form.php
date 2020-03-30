<!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                
                  <h3 class='box-title'>OUTBOX</h3>
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
	    <tr><td>SendBefore <?php echo form_error('SendBefore') ?></td>
            <td><input type="text" class="form-control" name="SendBefore" id="SendBefore" placeholder="SendBefore" value="<?php echo $SendBefore; ?>" />
        </td>
	    <tr><td>SendAfter <?php echo form_error('SendAfter') ?></td>
            <td><input type="text" class="form-control" name="SendAfter" id="SendAfter" placeholder="SendAfter" value="<?php echo $SendAfter; ?>" />
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
	    <tr><td>Class <?php echo form_error('Class') ?></td>
            <td><input type="text" class="form-control" name="Class" id="Class" placeholder="Class" value="<?php echo $Class; ?>" />
        </td>
	    <tr><td>TextDecoded <?php echo form_error('TextDecoded') ?></td>
            <td><textarea class="form-control" rows="3" name="TextDecoded" id="TextDecoded" placeholder="TextDecoded"><?php echo $TextDecoded; ?></textarea>
        </td></tr>
	    <tr><td>MultiPart <?php echo form_error('MultiPart') ?></td>
            <td><input type="text" class="form-control" name="MultiPart" id="MultiPart" placeholder="MultiPart" value="<?php echo $MultiPart; ?>" />
        </td>
	    <tr><td>RelativeValidity <?php echo form_error('RelativeValidity') ?></td>
            <td><input type="text" class="form-control" name="RelativeValidity" id="RelativeValidity" placeholder="RelativeValidity" value="<?php echo $RelativeValidity; ?>" />
        </td>
	    <tr><td>SenderID <?php echo form_error('SenderID') ?></td>
            <td><input type="text" class="form-control" name="SenderID" id="SenderID" placeholder="SenderID" value="<?php echo $SenderID; ?>" />
        </td>
	    <tr><td>SendingTimeOut <?php echo form_error('SendingTimeOut') ?></td>
            <td><input type="text" class="form-control" name="SendingTimeOut" id="SendingTimeOut" placeholder="SendingTimeOut" value="<?php echo $SendingTimeOut; ?>" />
        </td>
	    <tr><td>DeliveryReport <?php echo form_error('DeliveryReport') ?></td>
            <td><input type="text" class="form-control" name="DeliveryReport" id="DeliveryReport" placeholder="DeliveryReport" value="<?php echo $DeliveryReport; ?>" />
        </td>
	    <tr><td>CreatorID <?php echo form_error('CreatorID') ?></td>
            <td><textarea class="form-control" rows="3" name="CreatorID" id="CreatorID" placeholder="CreatorID"><?php echo $CreatorID; ?></textarea>
        </td></tr>
	    <input type="hidden" name="ID" value="<?php echo $ID; ?>" /> 
	    <tr><td colspan='2'><button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('outbox') ?>" class="btn btn-default">Cancel</a></td></tr>
	
    </table></form>
    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->