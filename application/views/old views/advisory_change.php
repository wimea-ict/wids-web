<!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                
                  <h3 class='box-title'>ADVISORY EDIT </h3>
                      <div class='box box-primary'>
        <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" ><table class='table table-bordered'>
	    <tr><td>Region <?php echo form_error('Region') ;?></td>
             <td>
             <input type="text" class="form-control" name="region" id="region" placeholder="region" value="<?php
			    $reg = $this->db->get_where('region',array('id'=>$region));
			 
			  foreach($reg->result() as $rr) { echo $rr->name; } ?>"  disabled />
	   </td>
	   </tr>
       <tr><td>Sub Region <?php echo form_error('Sub_region') ;?></td>
             <td>
             <input type="text" class="form-control" name="sub" id="region" placeholder="region" value="<?php
          $reg2 = $this->db->get_where('ussdsubregions',array('subregionid'=>$sub));
       
        foreach($reg2->result() as $rr2) { echo $rr2->subregionname; } ?>"  disabled />
     </td>
     </tr>
	    <tr><td>Advice <?php echo form_error('advice') ;?></td>
             <td>
             <input type="text" class="form-control" name="advice" id="region" placeholder="" value="<?php
          $reg3 = $this->db->get_where('advice',array('id_advice'=>$advise));
       
        foreach($reg3->result() as $rr3) { echo $rr3->advice_name; } ?>"  disabled />
     </td>
     </tr>
	    <tr><td>Message <?php echo form_error('msg') ?></td>
            <td><textarea class="form-control" rows="3" name="msg" id="msg" placeholder="Advisory Message"><?php echo $msg; ?></textarea>
        </td></tr>
                <tr>
                    <td>Advisory Audio part<?php echo "<p class='text-warning'>".$error."</p>"; ?>

                    </td>
                    <td>
                        <input type="file" name="userfile" id = "pic" size="20" class="form-control" />
                        <input type="hidden" class="form-control" name="audio" id="region"  value="<?php echo $audio; ?>"  />
                        <input type="text" class="form-control" name="aud" id="region"  value="<?php if(strpos($audio,'no image')){ echo "no file uploaded yet"; }else{ echo $audio; } ?>"  disabled />
                    </td>
                </tr>
	    <!--<tr><td>Season Name <?php //echo form_error('season_name') ?></td>
            <td>
              <?php// echo combo_function('season_id','season','season_name','id','season_id')?>
	   </td>-->
	    <input type="hidden" name="id" value="<?php echo $record_id; ?>" /> 
	    <tr><td colspan='2'><button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('index.php/Advisory/index/') ?>" class="btn btn-default">Cancel</a></td></tr>
	
    </table></form>
    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->