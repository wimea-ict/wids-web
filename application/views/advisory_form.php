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
                 
                  <h3 class='box-title'>NEW FORECAST ADVISORY</h3>
                      <div class='box box-primary'>
<!----------------------- AMoko -->
        <form action="<?php echo  site_url('index.php/Advisory/create_action/'.$this->uri->segment(3))?>" method="post"  enctype="multipart/form-data" ><table class='table table-bordered'>
<!----------------------- AMoko -->
      <tr>
          <td>Advicory Sector: <?php echo form_error('advise') ?></td>
            <td>   
            <select class="form-control" name="category" id="category" required>
                        <option value="">No Selected</option>
                        <?php foreach($sector_data as $row):?>
                        <option value="<?php echo $row->id;?>"><?php echo $row->minor_name;?></option>
                        <?php endforeach;?>
           </select>
          </td>
        </tr> 
     
        <tr><td>Advisory Summary:</td>
            <td><textarea class="form-control" rows="5" name="summary" id="summary" placeholder="Advisory Summary"><?php echo $summary; ?></textarea>
        </td>        
        </tr>       
       <input type="hidden" name="forecast_id" id ="forecast_id" value="<?php echo $forecast_id; ?>" />
     
      <tr><td colspan='2'><button type="submit" class="btn btn-primary"><?php echo $button ?></button>
      <a href="<?php echo site_url('index.php/season/index/') ?>" class="btn btn-default">Cancel</a></td></tr>

    </table></form>
    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
        <script type="text/javascript" src="<?php echo base_url().'assets/js/jquery-3.3.1.js'?>"></script>
    <script type="text/javascript" src="<?php echo base_url().'assets/js/bootstrap.js'?>"></script>
    