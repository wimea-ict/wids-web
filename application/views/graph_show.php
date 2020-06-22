<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/morris/morris.css">
<!--begin page css link-->
<link rel="stylesheet" href="<?php echo base_url() ?>assets/frameworks/adminlte/css/begin.css">
<!--<div class="content-wrapper"> -->

<section class="content" id="dashboard-content">


    <div class="row">

        <!-- Main content -->
        <!-- Main content -->
        <section class="content-header">
                    <h1>
                        Regional
                        <small>Visualizations</small>
                    </h1>
                    <ol class="breadcrumb">
                      <?php $this->session->set_flashdata('message', ''); ?>
                        <li><a href="<?php echo base_url() ?>index.php/Landing/index"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="#"><i class="fa fa-dashboard"></i>Visualizaions</a></li>
                    </ol>
                </section>  

       
        <section class="content col-md-12" >
            


             <div class="but_list">
           <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
            <ul id="myTab" class="nav nav-tabs" role="tablist">
              <li role="presentation" class="active"><a href="#agrictext" id="text-tab" role="tab" data-toggle="tab" aria-controls="agrictext" aria-expanded="true">L. Victoria Basin</a></li>
              <li role="presentation"><a href="#agricaudio" role="tab" id="agricaudio-tab" data-toggle="tab" aria-controls="agricaudio">Central</a></li>
              <li role="presentation"><a href="#agricgraphic" role="tab" id="agricgraphic-tab" data-toggle="tab" aria-controls="agricgraphic">Western</a></li>
              <li role="presentation"><a href="#agricgraphic1" role="tab" id="agricgraphic-tab" data-toggle="tab" aria-controls="agricgraphic">Eastern</a></li>
              <li role="presentation"><a href="#agricgraphic2" role="tab" id="agricgraphic-tab" data-toggle="tab" aria-controls="agricgraphic">Northern</a></li>

            </ul>
        <div id="myTabContent" class="tab-content">

          <div role="tabpanel" class="tab-pane fade in active" id="agrictext" aria-labelledby="agrictext-tab">
            <div class="box box-success">
           <div class="box-header with-border">
                            <h3 class="box-title" style="text-align: center">Previous  Temperature and Windspeed Daily Forecast For L.VICTORIA BASIN</h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                            </div>
                        </div>
                        <div class="box-body chart-responsive">
                            <div class="chart" id="test_line" style="height: 300px;">
                                <?php echo  $line_chart; ?>
                            </div>
                        </div>
                    </div>
          </div>
          <div role="tabpanel" class="tab-pane fade" id="agricaudio" aria-labelledby="agricaudio-tab">
            
            <div class="box box-success">
                        <div class="box-header with-border">
                            <h3 class="box-title" style="text-align: center">Previous  Temperature and Windspeed Daily Forecast For CENTRAL</h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                            </div>
                        </div>
                        <div class="box-body chart-responsive">
                            <div class="chart" id="central_line" style="height: 300px;">
                                <?php echo  $line_chart4; ?>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
            


          </div>
          
          <div role="tabpanel" class="tab-pane fade in active" id="agricgraphic" aria-labelledby="agricgraphic-tab">
            

            <div class="box box-success">
                        <div class="box-header with-border">
                            <h3 class="box-title" style="text-align: center">Previous  Temperature and Windspeed Daily Forecast For WESTERN</h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                            </div>
                        </div>
                        <div class="box-body chart-responsive">
                            <div class="chart" id="west_line" style="height: 300px;">
                                <?php echo  $line_chart3; ?>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>

          </div>


          <div role="tabpanel" class="tab-pane fade in active" id="agricgraphic1" aria-labelledby="agricgraphic-tab">
            
            <div class="box box-success">
                        <div class="box-header with-border">
                            <h3 class="box-title" style="text-align: center">Previous  Temperature and Windspeed Daily Forecast For EASTERN</h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                            </div>
                        </div>
                        <div class="box-body chart-responsive">
                            <div class="chart" id="east_line" style="height: 300px;">
                                <?php echo  $line_chart2; ?>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
            

          </div>


          <div role="tabpanel" class="tab-pane fade in active" id="agricgraphic2" aria-labelledby="agricgraphic-tab">
            

            <div class="box box-success">
                        <div class="box-header with-border">
                            <h3 class="box-title" style="text-align: center">Previous  Temperature and Windspeed Daily Forecast For NORTHERN</h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                            </div>
                        </div>
                        <div class="box-body chart-responsive">
                            <div class="chart" id="north_line" style="height: 300px;">
                                <?php echo  $line_chart1; ?>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>

          </div>




        </div>
   </div>
   </div>





		



        </section>
        <!-- /.content -->
    </div>
</section>

<!-- /.content -->

<!-- Morris.js charts -->
<script src="<?php echo base_url() ?>assets/plugins/morris/raphael.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/morris/morris.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo base_url() ?>assets/plugins/sparkline/jquery.sparkline.min.js"></script>

<!-- jQuery Knob Chart -->
<script src="<?php echo base_url() ?>assets/plugins/knob/jquery.knob.js"></script>

<script src="<?php echo base_url() ?>assets/plugins/chartjs/Chart.min.js"></script>