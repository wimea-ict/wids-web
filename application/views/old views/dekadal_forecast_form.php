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
            $date_from = '';
            $date_to ='';
            $idd ='';
            if(isset($row_data)){
             $btn_text ="Update";
             foreach($row_data as $a){
              $regionid = $a['regionid'];
          //    $sub_region = $a['sub_region'];
              $date_from = $a['date_from'];
              $date_to = $a['date_to'];
              $idd =$a['decadal_id'];
        }
      }
        ?>

          <tr><td>Date From <?php echo form_error('date_from') ?></td>
            <td><!--<input type="date" class="form-control" name="date_from" id="date_from" placeholder="Date From in format yyyy-mm-dd" value="<?php// echo $date_from; ?>" />-->
                <input required type="date"  name="date_from" class="form-control form_date"  value="<?php echo $date_from;?>" data-mask="" placeholder ="yyyy-mm-dd">
        </td>
        <tr><td>Date To <?php echo form_error('date_to') ?></td>
            <td>
                <input required type="date"  name="date_to" class="form-control form_date"    value="<?php echo $date_to;?>"  placeholder ="yyyy-mm-dd"  />
        </td>
        </tr>
        <tr><td>General Information <?php echo form_error('general_information') ?></td>
        <td>
           <textarea required   name="general_information" class="form-control " placeholder ="Enter General dekadal forecast" ><?php echo $general_information;?>  </textarea>
        </td>
        </tr>
       
        <tr>
             <td>Maximum Temperature</td>
             <td><input type="number" name="max_temp" class="form-control "></td>
        </tr>
        <tr>
             <td>Minimum Temperature</td>
             <td><input type="number" name="min_temp" class="form-control "></td>
        </tr>
        <tr>
             <td>Mean Temperature</td>
             <td><input type="number" name="mean_temp" class="form-control "></td>
        </tr>
        <tr>
             <td>Rainfall</td>
             <td> <textarea required   name="rainfall" class="form-control " placeholder ="Enter rainfall performance" ><?php echo $rainfall;?>  </textarea>
        </td>
        </tr>
        <tr>
           		<td>Issue Date:</td>
                <td> <input type="date" name="date"></td>
           
           </tr>

	    <input type="hidden" id="id" name="id" value="<?php echo $idd; ?>" />
	    <tr><td colspan='2'>
        <input type="submit" class="btn btn-primary" value="<?php if(isset($row_data)){
       echo "Update";}else {echo "Submit"; }?>"/>
	    </td></tr>

    </table></form>
    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
