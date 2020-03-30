
        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                <h3 class='box-title'>Advisory Read</h3>
				<?php
				    $red = $this->db->get_where('region',array('id'=>$region));
            $red2 = $this->db->get_where('ussdsubregions',array('subregionid'=>$sub));
					 $red1 = $this->db->get_where('advice',array('id_advice'=>$advice));
				    //echo $audio;
				    //exit;

				?>
        <table class="table table-bordered">
          
	    <tr><td>Region</td><td><?php foreach ($red->result() as $s){ echo $s->name ; } ?></td></tr>
      <tr><td>Sub Region</td><td><?php foreach ($red2->result() as $ss){ echo $ss->subregionname ; } ?></td></tr>
         
		  <tr><td>Category</td><td><?php foreach ($red1->result() as $s1){ echo $s1->advice_name ; } ?></td></tr>
	    <tr><td>Message</td><td><?php echo $message.$messageLuganda; ?></td></tr>
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
	  </table>
        </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->