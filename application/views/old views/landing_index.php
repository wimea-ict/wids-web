<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<link rel="stylesheet" href="<?php echo base_url() ?>assets/<?php echo $this->config->item('theme');?>/plugins/morris/morris.css">

<!--<div class="content-wrapper"> -->

     <section class="content-header">
        <div>
        <h1>
            Home
            <small>System Statistics</small>                        
        <small class="pull-right">

        <?php //if($_SESSION['usertype']=='wimea' && $_SESSION['first_time_login']==0){?>
            
        <!--<a href="<?php echo base_url(); ?>index.php/Auth/change_pass"><button type="button" class="btn">change password</button></a> -->
        <a href="<?php echo base_url(); ?>index.php/Landing/create_user"><button type="button" class="btn">Add User</button></a>
        <a href="<?php echo base_url(); ?>index.php/Landing/user_list"><button type="button" class="btn">View Active Users</button></a>
        <a href="<?php echo base_url(); ?>index.php/Landing/inactive_user_list"><button type="button" class="btn">View Deactivated Users</button></a> 
       <?php if($_SESSION['usertype'] != 'wimea' && $_SESSION['first_time_login']==1){?> 
       <a href="<?php echo base_url(); ?>index.php/Auth/change_pass"><button type="button" class="btn"><strong>Change Password</strong></button></a> 
       <?php }?>                         
        </small>
        </h1>
        </div>

      </section>  

<section class="content" id="dashboard-content">


    <!-- Info boxes -->
    <div class="row">
    <?php if($_SESSION['usertype']=='wimea' && $_SESSION['first_time_login']==0){?>
        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="ion ion-ios-person-outline"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">SYSTEM USERS</span>
                    <span class="info-box-number"><?php echo $count_users; ?></span>
                    
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-red"><i class="ion-android-people"></i></span>

                <div class="info-box-content">
                <a href="<?php echo base_url(); ?>index.php/Landing/ussdcount"><span class="info-box-text">USSD USERS</span></a>
                    <span class="info-box-number"><?php echo $ussd_count; ?></span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-red"><i class="ion ion-ios-people-outline"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">SOCIETY FORECAST HELP</span>
                    <span class="info-box-number"><?php echo $count_feedback; ?></span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
                <?php }?>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-green"><i class="ion-ios-cloudy-night-outline"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Daily Forecast</span>
                    <span class="info-box-number"><?php echo $count_daily_forecast; ?></span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-green"><i class="ion-android-cloud-circle"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Dekadal Forecast</span>
                    <span class="info-box-number"><?php echo $count_decadal; ?></span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-orange"><i class="ion-android-cloud-outline"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Seasonal Forecast</span>
                    <span class="info-box-number"><?php echo $count_seasonal_forecast; ?></span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->



    <!-- fix for small devices only -->
    <div class="clearfix visible-sm-block"></div>

    <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-green"><i class="ion-ios-partlysunny-outline"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Seasons</span>
                <span class="info-box-number"><?php echo $count_season; ?></span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-green"><i class="ion ion-android-globe"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Regions</span>
                <span class="info-box-number"><?php echo $count_region; ?></span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-orange"><i class="ion-android-contacts"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Advisories</span>
                <span class="info-box-number"><?php echo $count_advisory; ?></span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.row -->
</div>
    <div class="row">
        
        <!-- Main content -->
        <!-- Main content -->

        <section class="content col-md-12" >
            <div class="row">


                    <!-- BAR CHART -->
                    <div class="box box-success">
                        <div class="box-header with-border">
                            <h3 class="box-title" style="text-align: center">Previous Average Temperature and Windspeed Daily Forecast For all Regions</h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                            </div>
                        </div>
                        <div class="box-body chart-responsive">
                            <div class="chart" id="test_bar" style="height: 300px;">
                                <?php echo $bar_chart; ?>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>

                    <!-- /.box -->
                    <!-- end of area chart -->


                    <!-- /.box -->



                <!-- /.box -->
        </section>
        <!-- /.content -->

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