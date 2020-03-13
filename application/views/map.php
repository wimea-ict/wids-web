<!DOCTYPE html>
<html>
  <head>
    <title>Live Map</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0; 
      }
      #description {
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
      }

      #infowindow-content .title {
        font-weight: bold;
      }

      #infowindow-content {
        display: none;
      }

      #map #infowindow-content {
        display: inline;
      }

      .pac-card {
        margin: 10px 10px 0 0;
        border-radius: 2px 0 0 2px;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
        outline: none;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
        background-color: #fff;
        font-family: Roboto;
      }

      #pac-container {
        padding-bottom: 12px;
        margin-right: 12px;
      }

      .pac-controls {
        display: inline-block;
        padding: 5px 11px;
      }

      .pac-controls label {
        font-family: Roboto;
        font-size: 13px;
        font-weight: 300;
      }

      #pac-input {
        background-color: #fff;
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
        margin-left: 12px;
        padding: 0 11px 0 13px;
        text-overflow: ellipsis;
        width: 400px;
      }

      #pac-input:focus {
        border-color: #4d90fe;
      }

      #title {
        color: #fff;
        background-color: #4d90fe;
        font-size: 25px;
        font-weight: 500;
        padding: 6px 12px;
      }
    </style>







    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/frameworks/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">-->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/frameworks/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <!--<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">-->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/frameworks/ionicons/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/datatables/dataTables.bootstrap.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/frameworks/adminlte/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/frameworks/adminlte/css/skins/_all-skins.min.css">
    <!--begin page css link-->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/frameworks/adminlte/css/begin.css">


    <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/morris/morris.css">
<!--begin page css link-->
<link rel="stylesheet" href="<?php echo base_url() ?>assets/frameworks/adminlte/css/begin.css">

 <link rel="stylesheet" href="<?php echo base_url(); ?>assets/frameworks/gritter/css/jquery.gritter.css" />


    <!-- jQuery 2.1.4 -->
    <script src="<?php echo base_url() ?>assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?php echo base_url() ?>assets/frameworks/bootstrap/js/bootstrap.min.js"></script>
    <!-- DataTables -->
    <script src="<?php echo base_url() ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url() ?>assets/plugins/datatables/dataTables.bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="<?php echo base_url() ?>assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url() ?>assets/plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url() ?>assets/frameworks/adminlte/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo base_url() ?>assets/frameworks/adminlte/js/demo.js"></script>
    <!-- notifying -->
    <script src="<?php echo base_url() ?>assets/plugins/notify/notify.min.js"></script>


<script type="text/javascript" src="<?php echo base_url() ?>assets/frameworks/gritter/js/jquery.gritter.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/frameworks/gritter/gritter-conf.js"></script>

    <!--script for this page-->

<script type="text/javascript">
        $(document).ready(function () {
        var unique_id = $.gritter.add({
            // (string | mandatory) the heading of the notification
            title: 'ALERT NOTIFICATION!',
            // (string | mandatory) the text inside the notification
            text: ' <b/>WARNING<b/><br/> <?php  $sqlx = "SELECT AVG(d03)  AS average FROM  data";
                           $sql2= $this->db->query($sqlx);

                            $sqlx2 = "SELECT AVG(d02)  AS average FROM  data";
                           $sql4= $this->db->query($sqlx2);


                            $sqlx3 = "SELECT AVG(d01)  AS average FROM  data";
                           $sql6= $this->db->query($sqlx3);

                           foreach ($sql2->result_array() as $row1) {

                          echo" <tr> ";
                           echo" <td>EASTERN AVERAGE:".  $row1["average"]."mm</td><br/><br/>";

                           if($row1["average"] > 5){

                            echo "<td>This is a warning to the people of the EASTERN REGION, heavy rains are expected to arrive in this region and may lead to landslides in the area spanning a region of 4 miles.<br/><br/>";

                           } else{
                                echo "<td>This is a warning to the people of the WESTERN REGION, dry spells of drought are in the forcast and may last for as long as 3 months with no rain. You are advised to collect and store water and preserve water bodies.<br/><br/>";

                           }
                           
            
            } 

                           foreach ($sql4->result_array() as $row2) {

                          echo" <tr> ";
                           echo" <td>WESTERN AVERAGE:".  $row2["average"]."mm</td><br/><br/>";

                           if($row2["average"] > 5){

                            echo "<td>This is a warning to the people of the people of the EASTERN REGION, heavy rains are expected to arrive in this region and may lead to landslides in the area spanning a region of 4 miles.";

                           }
                           
            
            } 


             ?>  ',
            // (string | optional) the image to display on the left
          //  image: 'assets/img/ui-sam.jpg',
            // (bool | optional) if you want it to fade out on its own or just sit there
            sticky: false,
            // (int | optional) the time you want it to be alive for before fading out
            time: '10000',
            // (string | optional) the class name you want to apply to that specific message
            class_name: 'my-sticky-class'
        });

        return false;
        });
  </script>






    <header class="main-header">
        <a href="#" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>W</b>IDS</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>DISSEMINATION</b></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <li><?php echo anchor(site_url('index.php'), "<span class='glyphicon glyphicon-user'></span>" . strtoupper('home'));?></li>
                    <li><?php echo anchor(site_url('index.php/map/index'), "<span class='glyphicon glyphicon-globe'></span>" . strtoupper('Live Map'));?></li>
                    <li><?php echo anchor(site_url('index.php/auth/load_login'), "<span class='glyphicon glyphicon-log-in'></span>" . strtoupper('Login'));?></li>



                    <li>
                        <a href="#" data-toggle="control-sidebar"><!--<i class="fa fa-gears"></i>--></a>
                    </li>
                </ul>
            </div>
        </nav>


    </header>

</head>

  <body>
    <div class="pac-card" id="pac-card">
      <div>
        <div id="title">
          Autocomplete Search
        </div>
        <div id="type-selector" class="pac-controls">
          <input type="radio" name="type" id="changetype-all" checked="checked">
          <label for="changetype-all">All</label>

          <input type="radio" name="type" id="changetype-establishment">
          <label for="changetype-establishment">Establishments</label>

          <input type="radio" name="type" id="changetype-address">
          <label for="changetype-address">Addresses</label>

          <input type="radio" name="type" id="changetype-geocode">
          <label for="changetype-geocode">Geocodes</label>
        </div>
        <div id="strict-bounds-selector" class="pac-controls">
          <input type="checkbox" id="use-strict-bounds" value="">
          <label for="use-strict-bounds">Strict Bounds</label>
        </div>
      </div>
      <div id="pac-container">
        <input id="pac-input" type="text"
            placeholder="Enter your  location">
      </div>
    </div>
    <div id="map"></div>
    <div id="infowindow-content">
      <img src="" width="16" height="16" id="place-icon">
      <span id="place-name"  class="title"></span><br>
      <span id="place-address"></span>
      <span id="daily"></span> 

    </div>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB0dy46oTvw9PivnuoTzy_aa5LDp_8FNIo&libraries=places"></script>
    <script src="<?php echo base_url() ?>assets/frameworks/adminlte/js/myscript.js"></script>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/frameworks/gritter/css/jquery.gritter.css" />
   

        <div class="modal fade" id="water" tabindex="-1" role="dialog" aria-labelledby="waterLabel" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h2 class="modal-title"><script type="text/javascript"></script>></h2>
                            </div>
                           <div class="grid_3 grid_5">
         <h3 class="head-top">Water Advisory</h3>
         <div class="but_list">
           <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
            <ul id="myTab" class="nav nav-tabs" role="tablist">
              <li role="presentation" class="active"><a href="#text" id="text-tab" role="tab" data-toggle="tab" aria-controls="text" aria-expanded="true">Text</a></li>
              <li role="presentation"><a href="#audio" role="tab" id="audio-tab" data-toggle="tab" aria-controls="audio">Audio</a></li>
              <li role="presentation"><a href="#graphic" role="tab" id="graphic-tab" data-toggle="tab" aria-controls="graphic">Graphic</a></li>
              
            </ul>
        <div id="myTabContent" class="tab-content">
          <div role="tabpanel" class="tab-pane fade in active" id="text" aria-labelledby="text-tab">
            
            <?php
                   //$this->load->view('advisory_read');
                ?>
            

          </div>
          <div role="tabpanel" class="tab-pane fade" id="audio" aria-labelledby="audio-tab">
            

             <table class="table table-bordered">
                                        <tr><td>Region</td><td></td></tr>
                                       <!-- <tr><td>Sub Region</td><td><?php //echo $sub; ?></td></tr>
                                        <tr><td>Type</td><td><?php //echo $type; ?></td></tr> -->
                                        <tr><td>Category</td><td></td></tr>
                                       <?php
                                             echo "<tr><td>Audio</td><td>
                                                  <audio controls >
                                                    <source src= '";  //echo base_url()."uploads/".$audio;
                                                     echo "' 'type='audio/mpeg'>
                                                   </audio>
                                                    </td></tr>";
                                        ?>
                                    </table>


          </div>
          
          <div role="tabpanel" class="tab-pane fade in active" id="graphic" aria-labelledby="graphic-tab">
            

            

          </div>


        </div>
   </div>
   </div>
  </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                               <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div>


<!--AGRICULTURAL ADVISORY -->

                <div class="modal fade" id="agric" tabindex="-1" role="dialog" aria-labelledby="agricLabel" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h2 class="modal-title"><?php echo "Daily Forecast"; ?></h2>
                            </div>
                           <div class="grid_3 grid_5">
         <h3 class="head-top">Daily Forecast</h3>
         <div class="but_list">
           <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
            <ul id="myTab" class="nav nav-tabs" role="tablist">
              <li role="presentation" class="active"><a href="#agrictext" id="text-tab" role="tab" data-toggle="tab" aria-controls="agrictext" aria-expanded="true">Text</a></li>
              <li role="presentation"><a href="#agricaudio" role="tab" id="agricaudio-tab" data-toggle="tab" aria-controls="agricaudio">Audio</a></li>
              <li role="presentation"><a href="#agricgraphic" role="tab" id="agricgraphic-tab" data-toggle="tab" aria-controls="agricgraphic">Graphic</a></li>
              
            </ul>
        <div id="myTabContent" class="tab-content">
          <div role="tabpanel" class="tab-pane fade in active" id="agrictext" aria-labelledby="agrictext-tab">
            
            <?php
                  // $this->load->view('advisory_read');
                ?>
            

          </div>
          <div role="tabpanel" class="tab-pane fade" id="agricaudio" aria-labelledby="agricaudio-tab">
            

             <table class="table table-bordered">
                                        <tr><td>Region</td><td></td></tr>
                                       <!-- <tr><td>Sub Region</td><td><?php //echo $sub; ?></td></tr>
                                        <tr><td>Type</td><td><?php //echo $type; ?></td></tr> -->
                                        <tr><td>Category</td><td></td></tr>
                                       <?php
                                             echo "<tr><td>Audio</td><td>
                                                  <audio controls >
                                                    <source src= '";  //echo base_url()."uploads/".$audio;
                                                     echo "' 'type='audio/mpeg'>
                                                   </audio>
                                                    </td></tr>";
                                        ?>
                                    </table>


          </div>
          
          <div role="tabpanel" class="tab-pane fade in active" id="agricgraphic" aria-labelledby="agricgraphic-tab">
            
                
               <div style="height: 300px;">
                                <?php //echo  $line_chart1; 
                              
                                $this->load->view('google2');


                                ?>
                            </div>
            
          

          </div>


        </div>
   </div>
   </div>
  </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                               <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div>


<!--FOOD ADVISORY -->

    <div class="modal fade" id="food" tabindex="-1" role="dialog" aria-labelledby="foodLabel" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>



        <!-- <img src="" width="16" height="16" id="place-icon"> -
  
      <span id="place-name"  class="title"></span><br>
      <span id="place-address"></span>
     <!-- <span id="daily"></span> -->

   
     <h2 class="modal-title">
                               <span id="daily"></span>
                          </h2>
                           <div class="grid_3 grid_5">
         <h3 class="head-top">Seasonal Forecast</h3>
         <div class="but_list">
           <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
            <ul id="myTab" class="nav nav-tabs" role="tablist">
              <li role="presentation" class="active"><a href="#foodtext" id="text-tab" role="tab" data-toggle="tab" aria-controls="foodtext" aria-expanded="true">Text</a></li>
              <li role="presentation"><a href="#foodaudio" role="tab" id="foodaudio-tab" data-toggle="tab" aria-controls="foodaudio">Audio</a></li>
              <li role="presentation"><a href="#foodgraphic" role="tab" id="foodgraphic-tab" data-toggle="tab" aria-controls="foodgraphic">Graphic</a></li>
              
            </ul>
        <div id="myTabContent" class="tab-content">
          <div role="tabpanel" class="tab-pane fade in active" id="foodtext" aria-labelledby="foodtext-tab">
            
            <?php
                   //$this->load->view('advisory_read');
                ?>
            

          </div>
          <div role="tabpanel" class="tab-pane fade" id="foodaudio" aria-labelledby="foodaudio-tab">
            

             <table class="table table-bordered">
                                        <tr><td>Region</td><td></td></tr>
                                       <!-- <tr><td>Sub Region</td><td><?php //echo $sub; ?></td></tr>
                                        <tr><td>Type</td><td><?php //echo $type; ?></td></tr> -->
                                        <tr><td>Category</td><td></td></tr>
                                       <?php
                                             echo "<tr><td>Audio</td><td>
                                                  <audio controls >
                                                    <source src= '";  //echo base_url()."uploads/".$audio;
                                                     echo "' 'type='audio/mpeg'>
                                                   </audio>
                                                    </td></tr>";
                                        ?>
                                    </table>


          </div>
          
          <div role="tabpanel" class="tab-pane fade in active" id="foodgraphic" aria-labelledby="foodgraphic-tab">
            

            

          </div>


        </div>
   </div>
   </div>
  </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                               <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div>


<!--ROAD SECTOR ADVISORY -->

<div class="modal fade" id="road" tabindex="-1" role="dialog" aria-labelledby="roadLabel" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h2 class="modal-title">Mbarara</h2>
                            </div>
                           <div class="grid_3 grid_5">
         <h3 class="head-top">Road Sector Advisory</h3>
         <div class="but_list">
           <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
            <ul id="myTab" class="nav nav-tabs" role="tablist">
              <li role="presentation" class="active"><a href="#roadtext" id="roadtext-tab" role="tab" data-toggle="tab" aria-controls="roadtext" aria-expanded="true">Text</a></li>
              <li role="presentation"><a href="#roadaudio" role="tab" id="roadaudio-tab" data-toggle="tab" aria-controls="roadaudio">Audio</a></li>
              <li role="presentation"><a href="#roadgraphic" role="tab" id="roadgraphic-tab" data-toggle="tab" aria-controls="roadgraphic">Graphic</a></li>
              
            </ul>
        <div id="myTabContent" class="tab-content">
          <div role="tabpanel" class="tab-pane fade in active" id="roadtext" aria-labelledby="roadtext-tab">
            
            <?php
                   //$this->load->view('advisory_read');
                ?>
            

          </div>
          <div role="tabpanel" class="tab-pane fade" id="roadaudio" aria-labelledby="roadaudio-tab">
            

             <table class="table table-bordered">
                                        <tr><td>Region</td><td></td></tr>
                                       <!-- <tr><td>Sub Region</td><td><?php //echo $sub; ?></td></tr>
                                        <tr><td>Type</td><td><?php //echo $type; ?></td></tr> -->
                                        <tr><td>Category</td><td></td></tr>
                                       <?php
                                             echo "<tr><td>Audio</td><td>
                                                  <audio controls >
                                                    <source src= '";  //echo base_url()."uploads/".$audio;
                                                     echo "' 'type='audio/mpeg'>
                                                   </audio>
                                                    </td></tr>";
                                        ?>
                                    </table>


          </div>
          
          <div role="tabpanel" class="tab-pane fade in active" id="roadgraphic" aria-labelledby="roadgraphic-tab">
            

            

          </div>


        </div>
   </div>
   </div>
  </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                               <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div>

<!-- HEALTH SECTOR -->


<div class="modal fade" id="health" tabindex="-1" role="dialog" aria-labelledby="healthLabel" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h2 class="modal-title">Mbarara</h2>
                            </div>
                           <div class="grid_3 grid_5">
         <h3 class="head-top">Health Sector Advisory</h3>
         <div class="but_list">
           <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
            <ul id="myTab" class="nav nav-tabs" role="tablist">
              <li role="presentation" class="active"><a href="#healthtext" id="healthtext-tab" role="tab" data-toggle="tab" aria-controls="healthtext" aria-expanded="true">Text</a></li>
              <li role="presentation"><a href="#healthaudio" role="tab" id="healthaudio-tab" data-toggle="tab" aria-controls="healthaudio">Audio</a></li>
              <li role="presentation"><a href="#healthgraphic" role="tab" id="healthgraphic-tab" data-toggle="tab" aria-controls="healthgraphic">Graphic</a></li>
              
            </ul>
        <div id="myTabContent" class="tab-content">
          <div role="tabpanel" class="tab-pane fade in active" id="healthtext" aria-labelledby="healthtext-tab">
            
            <?php
                  // $this->load->view('advisory_read');
                ?>
            

          </div>
          <div role="tabpanel" class="tab-pane fade" id="healthaudio" aria-labelledby="healthaudio-tab">
            

             <table class="table table-bordered">
                                        <tr><td>Region</td><td></td></tr>
                                       <!-- <tr><td>Sub Region</td><td><?php //echo $sub; ?></td></tr>
                                        <tr><td>Type</td><td><?php //echo $type; ?></td></tr> -->
                                        <tr><td>Category</td><td></td></tr>
                                       <?php
                                             echo "<tr><td>Audio</td><td>
                                                  <audio controls >
                                                    <source src= '";  //echo base_url()."uploads/".$audio;
                                                     echo "' 'type='audio/mpeg'>
                                                   </audio>
                                                    </td></tr>";
                                        ?>
                                    </table>


          </div>
          
          <div role="tabpanel" class="tab-pane fade in active" id="healthgraphic" aria-labelledby="healthgraphic-tab">
            

            

          </div>


        </div>
   </div>
   </div>
  </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                               <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div>


<script type="text/javascript" src="<?php echo base_url() ?>assets/frameworks/gritter/js/jquery.gritter.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/frameworks/gritter/gritter-conf.js"></script>

    <!--script for this page-->




  </body>
</html>

<script src="<?php echo base_url() ?>assets/plugins/morris/raphael.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/morris/morris.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo base_url() ?>assets/plugins/sparkline/jquery.sparkline.min.js"></script>

<!-- jQuery Knob Chart -->
<script src="<?php echo base_url() ?>assets/plugins/knob/jquery.knob.js"></script>

<script src="<?php echo base_url() ?>assets/plugins/chartjs/Chart.min.js"></script>


