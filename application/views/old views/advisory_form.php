<!-- Main content -->
<script type="text/javascript">
    function HandleOption(){

      var SelectBox = document.getElementById('lang');
      var UserOption = SelectBox.options[SelectBox.selectedIndex].value;
      if(UserOption == 'English'){
        document.getElementById('DisplayOption').style.visibility = 'visible';
      }
      else{
        document.getElementById('DisplayOption').style.visibility = 'collapse';
      }
      return false;
    }

</script>




<section class="content-header">
                    <h1>
                        <small>Advisory form</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo base_url() ?>index.php/Landing/index"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="#"><i class="fa fa-dashboard"></i> Advisory</a></li>
                        <li><a href="#"><i class="fa fa-dashboard"></i>

                           
                        </a></li>
                    </ol>
                </section>
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                 
                  <h3 class='box-title'>NEW  ADVISORY</h3>
                      <div class='box box-primary'>
        <form action="<?php echo  site_url('index.php/Advisory/create_action')?>" method="post"  enctype="multipart/form-data" ><table class='table table-bordered'>

	    <tr>
        	<td>Advice sub Sector: <?php echo form_error('advise') ?></td>
            <td>   <select name = "sector"  id ="sector" class = "form-control" >
       <?php 
       //print_r($sector_data);exit();
				   if(isset($sector_data)){
					   foreach ($sector_data as $dd){
               $advise = $dd['advise'];
               $id = $dd['id'];
                
					?>
                           <option value="<?php echo $id; ?>"><?php echo $dd['minor_name']; ?></option>
                    <?php						   
					  }					  
			     }			 
			?>
				</select>
        	</td>

        </tr> 
       
        <!--<tr id = "DisplayOption"><td>Possible Advisories <?php //echo form_error('gen_advise') ?></td>
                       <td>
                        <div style="overflow-y: scroll; background-color: #ffffff; width: 900px; height: 200px; min-height: 200px;">
                            
                            <h3>Areas expected to receive near normal to BELOW NORMAL rainfall:</

                          
                            <label ><input type = "checkbox" name = "check_list[]" value = "<?php// echo $selected.'<br/>'; ?>" > <?php echo $selected; ?> </label >
                           
                           </div >
                           

                            <h3>Areas expected to receive near normal to ABOVE NORMAL rainfall:</h3>
                            <?php

                            //$sql2 = $this->db->get_where('possible_advisories',array('cat' => 'agric'));
                           // $sqlx = "SELECT * FROM  possible_advisories WHERE cat = 'agric'";
                            //$sql2= $this->db->query($sqlx);
                            //foreach ($sql2->result_array() as $row1) { ?>

                                <div  id =" " class="checkbox" >
                                    <label ><input type = "checkbox" name = "check_list[]" value = "<?php //echo $row1['advise'].'<br/>'; ?>" > <?php echo $row1['advise']; ?> </label >
                                </div >
                            <?php// }?>
                    </div>
                    </td></tr>           
        <tr>-->
       		<td>Advisory <?php echo form_error('msg') ?></td>
            <td><textarea class="form-control" rows="3" name="advisory" id="advisory="advisory"><?php echo $msg; ?></textarea>
        </td>        
        </tr>
        

        <tr><td>Advisory Summary:</td>
            <td><textarea class="form-control" rows="3" name="summary" id="summary" placeholder="Advisory Summary"><?php echo $summary; ?></textarea>
        </td>        
        </tr>       
       
	   
	    <input type="hidden" name="forecast_id" value="<?php echo $forecast_id; ?>" />
	    <tr><td colspan='2'><button type="submit" class="btn btn-primary"><?php echo $button ?></button>
	    <a href="<?php echo site_url('index.php/Landing/index/') ?>" class="btn btn-default">Cancel</a></td></tr>

    </table></form>
    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
<script >


$("#sector").change(function(){
    var selection=$("#sector").val();
    
    $.ajax({		
	url:  "<?php echo site_url('index.php/Advisory/create');?>",
  dataType:'json',				
	type: "POST", 
	data: {selected_sector: selection},

	success: function(datax){

	console.log(datax);				
	}					
});
});

</script>        