<!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>

                  <h3 class='box-title'>ADD NEW LANGUAGE</h3>
                      <div class='box box-primary'>
                        <br>
        <form action="<?php echo site_url('index.php/USSD/saveLanguage'); ?>" method="post"><table class='table table-bordered'>
	    <tr>
        	<td>Languge</td>
           <td>
             <input required type="text" name="language" class="form-control" id ="language" placeholder ="Enter Language">
           </td>
        </td>
        <tr>
          <td colspan="2" style="color: red">
            <b>Note: </b>Input per field <b>must not</b> exceed <b>160 characters</b>
          </td>
        </tr>

	    </tr>
      <tr>
        <td><b>English Form</b></td>
        <td><b>New Translation</b></td>
      </tr>
        <tr>
        	<td>Please enter your district<br>0. Back</td>
            <td>
              <textarea maxlength="160" required rows="2" name="district" id="district" style="width: 100%" cols="70"></textarea>
       		 </td>
        </tr>
        <tr>
          <td>Invalid district entered<br>Please enter your district</td>
            <td>
               <textarea maxlength="160" required rows="2" name="invalidistrict" id="invalidistrict" style="width: 100%" cols="70"></textarea>
            </td>
        </tr>
        <tr>
          <td>Select a product<br>1. Daily Forecast<br>2. Dekadal Forecast<br>3. Seasonal Forecast<br>0. Back</td>
            <td>
               <textarea maxlength="160" required rows="5" name="product" id="product" style="width: 100%" cols="70"></textarea>
            </td>
        </tr>
        <tr>
          <td>Unknown Input Option<br>0. Back</td>
            <td>
               <textarea maxlength="160" required rows="2" name="invalidinput" id="invalidinput" style="width: 100%" cols="70"></textarea>
            </td>
        </tr>
        <tr>
          <td>Sorry, the selected forecast data is currently unavailable.<br>Please try again later<br>1. Products<br>0. Enter district</td>
            <td>
               <textarea maxlength="160" required rows="4" name="no_data" id="no_data" style="width: 100%" cols="70"></textarea>
            </td>
        </tr>
        <tr>
          <td>Please Choose a Response format<br>1. Text Message<br>2. Audio<br>0. Back</td>
            <td>
               <textarea maxlength="160" required rows="3" name="response_format" id="response_format" style="width: 100%" cols="70"></textarea>
            </td>
        </tr>
        <tr>
          <td>Confirm Submission<br>1. Confirm Submission<br>2. Back</td>
            <td>
               <textarea maxlength="160" required rows="3" name="Submission" id="Submission" style="width: 100%" cols="70"></textarea>
            </td>
        </tr>
        <tr>
          <td>You will receive a message shortly<br>Thank you for Contacting Us.</td>
            <td>
               <textarea maxlength="160" required rows="2" name="End" id="End" style="width: 100%" cols="70"></textarea>
            </td>
        </tr>
        <tr>
          <td>You will get a call shortly<br>Thank you for Contacting Us.</td>
            <td>
               <textarea maxlength="160" required rows="2" name="voiceEnd" id="voiceEnd" style="width: 100%" cols="70"></textarea>
            </td>
        </tr>
        <tr>
          <td>Request Canceled</td>
            <td>
               <textarea maxlength="160" required rows="1" name="Cancel" id="Cancel" style="width: 100%" cols="70"></textarea>
            </td>
        </tr>
	    <tr>

        <td colspan='2'>
          <input type="submit" class="btn btn-primary" value="Submit"/>
	    </td></tr>

    </table></form>
    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
