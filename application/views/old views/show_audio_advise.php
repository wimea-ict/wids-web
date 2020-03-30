


	
	<script>
	$(document).ready(function(){
		$('#feedback_button').click(function(){

var division = $('#division_id').val();
var category = $('#CategoryName').val();
var accuracy = $('#accuracy').val();
var applicability = $('#applicability').val();
var timeliness = $('#timeliness').val();
var generalComment = $('#generalComment').val();
var contact = $('#contact').val();

if(generalComment != ""){
	
$.ajax({		
	url:  "<?php echo site_url('index.php/User_feedback/log_userfeedback');?>",				
	type: "POST", 
	data: {'division': division, 'category':category, 'accuracy': accuracy, 'applicability' : applicability, 'timeliness': timeliness, 'generalComment' : generalComment, 'contact' : contact},

	success: function(datax){

	console.log(datax);				
	}					
});

}
else{
	alert("We really appreciate your comment. Please provide a comment !!!");
	return false;
	
}
		
});

	})
	
  </script>


<!-- feedback form modal -->

<div class="modal fade" data-keyboard="false" data-backdrop="static" id="feedbackModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" style="text-align: center">Feedback Form</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="float: right"> 
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	  <form method="POST">
			<div class="form-group row">
			<?php
				foreach($division_text as $dd){
				$division_name =$dd->division_name;
				
		 }?>
				<label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm"><?php echo $division_type; ?></label>
				<div class="col-sm-8">
				<select name="division" id="division_id" class = "form-control" >
                              <?php

                               $dd = "SELECT * FROM division order by division_name ASC";
                               $ddd = $this->db->query($dd);
                               foreach ($ddd->result_array() as $rowss) { ?>
                                    <option value="<?php echo $rowss['id']; ?>"><?php echo $rowss['division_name']; ?></option>
                   <?php } ?>

           </select>
				</div>
			</div>
			<div class="form-group row">
				<label for="colFormLabel" class="col-sm-4 col-form-label">Sector</label>
				<div class="col-sm-8">
				<select name="CategoryName" id="CategoryName" class = "form-control" >
				<option><?php echo $category1;?></option>
				</select>
				</div>
			</div>
			<div class="form-group row">
				<label for="colFormLabelLg" class="col-sm-4 col-form-label col-form-label-lg">Accuracy Level</label>
				<div class="col-sm-8">
				<select name="accuracy" id="accuracy" class="form-control">
				<option>10</option>
				<option>9</option>
				<option>8</option>
				<option>7</option>
				<option>6</option>
				<option>5</option>
				<option>4</option>
				<option>3</option>
				<option>2</option>
				<option>1</option>
				</select>
				</div>
			</div>
			<div class="form-group row">
				<label for="colFormLabelLg" class="col-sm-4 col-form-label col-form-label-lg">Applicability</label>
				<div class="col-sm-8">
				<select name="applicability" id="applicability" class="form-control">
				<option>10</option>
				<option>9</option>
				<option>8</option>
				<option>7</option>
				<option>6</option>
				<option>5</option>
				<option>4</option>
				<option>3</option>
				<option>2</option>
				<option>1</option>
				</select>
				</div>
			</div>
			<div class="form-group row">
				<label for="colFormLabelLg" class="col-sm-4 col-form-label col-form-label-lg">Timeliness</label>
				<div class="col-sm-8">
				<select name="timeliness" id="timeliness" class="form-control">
				<option>10</option>
				<option>9</option>
				<option>8</option>
				<option>7</option>
				<option>6</option>
				<option>5</option>
				<option>4</option>
				<option>3</option>
				<option>2</option>
				<option>1</option>
				</select>
				</div>
			</div>
			<div class="form-group row">
				<label for="colFormLabelLg" class="col-sm-4 col-form-label col-form-label-lg">Contact Details(Email/Phone)</label>
				<div class="col-sm-8">
				<textarea name="contact" id="contact" class="form-control" ></textarea>
				</div>
			</div>
			<div class="form-group row">
				<label for="colFormLabelLg" class="col-sm-4 col-form-label col-form-label-lg">Comment</label>
				<div class="col-sm-8">
				<textarea name="generalComment" id="generalComment" class="form-control" required></textarea>
				</div>
			</div>
		
		</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" name="feedback_button" id="feedback_button" class="btn btn-primary" data-toggle="modal" data-target="#feedbackModal">Submit </button>
      </div>
    </div>
  </div>
</div>

<!-- feedback from modal ends -->
	

<div class="tabdiv"  style="height: 200px;">
	<div class="tabbed">
		 <input name="tabbed" id="tabbed1" type="radio" checked> 
		<section>
			<h1>
				<label class = "my_label btn btn-default" for="tabbed1">Text Response</label>
			</h1>
			<div>
				<?php
				   $this->load->view('advisory_request_data');
				?>
			</div>
		</section>
		<input name="tabbed" id="tabbed2" type="radio"> 
		<section>
			<h1>
				<label class = "my_label btn btn-default" for="tabbed2"  class ="bl">Audio response</label>
			</h1>
			<div>

				<!-- Main content -->
				<section class='content'>
					<div class='row'>
						<div class='col-xs-12'>
							<div class='box'>
								<div class='box-header'>
									<h3 class='box-title'>Advisory audio response</h3>
									<?php
									$red = $this->db->get_where('region',array('id'=>$region));
									$red2 = $this->db->get_where('sub_region',array('sub_region_name'=>$sub_region_name));
									$red1 = $this->db->get_where('advice',array('id_advice'=>$advice));
									//echo $audio;
									//exit;

									?>
			
									<table class="table table-bordered">
										<tr><td><?php echo $division_type; ?><?php echo form_error('district') ?></td>
		                               <td> <?php echo $division_name; ?></td></tr>
										<tr><td>Region</td><td><?php echo $region_name ; ?></td></tr>

										<tr><td>Sub Region</td><td><?php echo $sub_region_name ; ?></td></tr>
										
										<tr><td>advisory</td><td><?php foreach ($red1->result() as $s1){ echo $s1->advice_name ; } ?></td></tr>
										<?php if($cont == 'no audio'){
											   echo "<tr><td>Audio</td><td>";
											   echo  $audio;
											   echo   "</td></tr>";
										}else{
											 echo "<tr><td>Audio</td><td>
												  <audio controls >
													<source src= '";  echo base_url()."uploads/".$audio; echo "' 'type='audio/mpeg'>
												   </audio>
													</td></tr>";
										  } ?>

									</table>
								</div><!-- /.box-body -->
							</div><!-- /.box -->
						</div><!-- /.col -->
					</div><!-- /.row -->
				</section><!-- /.content -->


			</div>
		</section>


	</div>
</div>
