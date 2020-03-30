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
  <style>
        /*******************************************************/
#advisory{
  margin-top: 0px;
  background-color: white;
  width: 70%;
  /*overflow-y: scroll;*/
  border-top: 4px solid #d2d6de;
  margin-left: 5%;
  padding-top: 15px;
  padding-left: 80px;
  padding-right: 80px;
  border-bottom: 2px solid #d2d6de;
  padding-bottom: 20px;
  /*padding-top: 10px;*/
}
.advisory_head{
  font-weight: bold;
  text-align: center;
  font-size: 16px;
}
.advisory_sub_head{
  font-weight: bold;
  font-size: 15px;
}
/*******************************************************/

   </style>
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
        <!-- Main content -->
          <!-------------------------------ADVISORY REQUEST DATA-------------  -------------------------------------->
          <div id="advisory">
          <?php
				foreach($division_text as $dd){
				$division_name =$dd->division_name;
				
		 }?>
              <h4><?php echo $category1 ?> for <?php echo $division_name ?>
                <div style="background-color: cornflowerblue;height: 3px;margin-top: 10px; width: 50%;"></div>
              </h4>
              
               <?php $count = 0; $flag = false; foreach ($seasonal_data_home as $Seasonal) : ?>

                  <?php $count++; 

                $red = $this->db->get_where('region',array('id'=>$region));
                $red2 = $this->db->get_where('ussdsubregions',array('subregionid'=>$subregion));
                $red1 = $this->db->get_where('advice',array('id_advice'=>$advice));
                //echo $audio;
                //exit;

                ?>
                <table class="table table-bordered">
                <tr><td>District <?php echo form_error('district') ?></td>
                <td> <?php
                //     if($change == 2){
                //echo combo_function('region_id','region','name','id','region_id');
                //}else{
                $sub2 = $this->input->post('district', TRUE);
                $ss = "SELECT * FROM ussddistricts WHERE districtid = '$sub2' ";
                $ss2 = $this->db->query($ss);

                // $regg = $this->db->get_where('district',array('id'=>$sub2));

                //$reg =  $this->db->get()->row();
                foreach($ss2->result_array() as $pp){
                echo $pp['districtname'];
                }
                // }
                ?>
                </td></tr>
                <tr><td>Climatic Zone</td><td><?php foreach ($red->result() as $s){ echo $s->name ; } ?></td></tr>
                <tr><td>Sub Zone</td><td><?php foreach ($red2->result() as $ss){ echo $ss->subregionname ; } ?></td></tr>

                <tr><td>Category</td><td><?php foreach ($red1->result() as $s1){ echo $s1->advice_name ; } ?></td></tr>
                <tr><td>Message</td><td><?php echo $message;  ?></td></tr>
                <?php if($rem == "remove"){

                }else if($rem == "show"){
                echo "<tr><td>Audio</td><td>
                <audio controls >
                    <source src= '";  echo base_url()."uploads/".$audio; echo "' 'type='audio/mpeg'>
                </audio>
                </td></tr>";

                }if($rem == "remove"){

                }else if($rem == "show"){
                echo "<tr><td></td><td><a href='"; echo site_url('index.php/advisory'); echo "' class='btn btn-default'>Cancel</a></td></tr>";
                } ?>
                    
                <tr>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#feedbackModal"> Send FeebBack </button>
                </tr>
                </table>

                            <?php    $flag = true;  

                            endforeach;
                            if(($count < 1) || ($flag == false)) echo "<p>No advisories!. Please try again later.</p>"; ?>
           </div>
 <!----------------------------------------------------  --------------------------------------->
       

