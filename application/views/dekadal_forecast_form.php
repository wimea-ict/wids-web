<!-- Main content -->
 <section class="content-header">
                    <h1>
                        Dekadal
                        <small>Forecast form</small>
                    </h1>
                    <ol class="breadcrumb">
                      <?php $this->session->set_flashdata('message', ''); ?>
                        <li><a href="<?php echo base_url() ?>index.php/Landing/index"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="#"><i class="fa fa-dashboard"></i> Dekadal Forecast</a></li>
                        <li><a href="#"><i class="fa fa-dashboard"></i> Forecast form</a></li>
                    </ol>
                </section>

<section class="content" id="dashboard-content">


        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>

                  <h3 class='box-title'>DEKADAL FORECAST</h3>
                      <div class='box box-primary'>
        <form action="<?php echo site_url('index.php/Dekadal_forecast/saveForecast');?>" method="post" enctype="multipart/form-data"><table class='table table-bordered'>
            <tr>

              <?php
            $btn_text ="Submit";
            $regionid = '';
        //    $sub_region = '';
             //print_r($dekadal_data);exit();
             if(isset($dekadal_data)){
               $btn_text ="Update";
               $count =0;
            foreach ($dekadal_data as $p)
            {   
              $count++;
               $date_from = $p['date_from']; 
               $date_to = $p['date_to']; 
               $general_info = $p['general_info']; 
               $max_temp = $p['max_temp']; 
               $min_temp = $p['min_temp']; 
               $mean_temp = $p['mean_temp'];
               $rainfall = $p['rainfall'];
               $issue = $p['issue'];
               $idd = $p['id'];

            }
          }
         ?>

          <tr><td>Date From </td>
            <td><!--<input type="date" class="form-control" name="date_from" id="date_from" placeholder="Date From in format yyyy-mm-dd" value="<?php// echo $date_from; ?>" />-->
                <input required type="date"  name="date_from" class="form-control form_date"  value="<?php echo $date_from;?>" data-mask="" placeholder ="yyyy-mm-dd">
        </td>
        <tr><td>Date To <?php echo form_error('date_to') ?></td>
            <td>
                <input required type="date"  name="date_to" class="form-control form_date"    value="<?php echo $date_to;?>"  placeholder ="yyyy-mm-dd"  />
        </td>
        </tr>
        <tr><td>General Information <?php echo form_error('general_info') ?></td>
        <td>
           <textarea required   name="general_information" class="form-control " placeholder ="Enter General dekadal forecast" ><?php echo $general_info;?>  </textarea>
        </td>
        </tr>
       
        <tr>
             <td>Maximum Temperature</td>
             <td><input type="number" name="max_temp" value="<?php echo $max_temp;?>" class="form-control "></td>
        </tr>
        <tr>
             <td>Minimum Temperature</td>
             <td><input type="number" name="min_temp" class="form-control" value = <?php echo $min_temp;?>></td>
        </tr>
        <tr>
             <td>Mean Temperature</td>
             <td><input type="number" name="mean_temp" class="form-control" value=<?php echo $mean_temp;?>></td>
        </tr>
        <tr>
             <td>Rainfall</td>
             <td> <textarea required   name="rainfall" class="form-control " placeholder ="Enter rainfall performance" ><?php echo $rainfall;?>  </textarea>
        </td>
        </tr>
        <tr>
           		<td>Issue Date:</td>
                <td> <input type="date" name="date" value ="<?php echo $issue;?>" ></td>
           
           </tr>

	    <input type="hidden" id="id" name="id" value="<?php echo $idd; ?>" />
	    <tr><td colspan='2'>
        <input type="submit" class="btn btn-primary" value="<?php if(isset($dekadal_data)){
       echo "Update";}else {echo "Submit"; }?>"/>
	    </td></tr>

    </table></form>
    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
