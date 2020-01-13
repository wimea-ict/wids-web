<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Weather Information Dissemination System</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.5 -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/frameworks/bootstrap/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">-->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/frameworks/font-awesome/css/font-awesome.min.css">
        <!-- Ionicons -->
        <!--<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">-->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/frameworks/ionicons/css/ionicons.min.css">
        <!-- DataTables -->
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/datatables/dataTables.bootstrap.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/frameworks/adminlte/css/adminlte.min.css">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/frameworks/adminlte/css/skins/_all-skins.min.css">
		<!--begin page css link-->
         <link rel="stylesheet" href="<?php echo base_url() ?>assets/frameworks/adminlte/css/begin.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/frameworks/adminlte/css/styles.css">
         <link rel="stylesheet" href="<?php echo base_url() ?>assets/frameworks/adminlte/css/widgets.css">
         <link rel="stylesheet" href="<?php echo base_url() ?>assets/frameworks/adminlte/css/animate.css">

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
		<style>


		   .wrapper{
			   background-image: url("<?php echo base_url() ?>assets/frameworks/adminlte/img/trythis.png");

		   }
		   .main-sidebar{
			   background-image: url("<?php echo base_url() ?>assets/frameworks/adminlte/img/trythis.png");

		   }

		</style>


    </head>
	<body class="hold-transition skin-blue sidebar-mini" >

		<div class = "wrapper">
		   <div class="row">
			 <!--<div class = 'col-md-12'>-->
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

                                         <li><?php echo anchor(site_url('index.php/Map/index'), "<span class='glyphicon glyphicon-globe'></span>" . strtoupper('Live Map'));?></li>
                                        <!--<li><?php //echo anchor(site_url('index.php/auth/load_login'), "<span class='glyphicon glyphicon-user'></span>" . strtoupper('Sign Up'));?></li>-->
                                        <li><?php echo anchor(site_url('index.php/auth/load_login'), "<span class='glyphicon glyphicon-log-in'></span>" . strtoupper('Login'));?></li>



                                       <li>
                                            <a href="#" data-toggle="control-sidebar"><!--<i class="fa fa-gears"></i>--></a>
                                        </li>
                                    </ul>
                                </div>
                            </nav>


				   </header>
	   <!--<div class = "main_body">-->
           <aside class="main-sidebar">
              <section class="sidebar">
				<div class="col-md-12" >
  		       <header> <h4>REQUEST SERVICE FORM</h4> </header>
		<?php if($this->session->flashdata('success')){?>
			      <div class = "alert alert-success"><?php echo $this->session->flashdata('success');?></div>
		   <?php }

		  // echo validation_errors('<div class = "alert alert-danger">','</div>');
		  if(isset($_POST['request_s'])){
			//echo  $region, $category1, $category2, $response;
			 //echo $msg;
		  }
			echo form_open('index.php/auth/index/request_service/');
			?><br/>

		<!--	<div class="control-group">
			      <label class="control-label" for="Sub">Select Region</label>
				  <div class="controls">
			     <select name = 'region' id="region" class="form-control"">
						  <option value = 3 >L. Victoria basin</option>
						  <option value = 5 >Western</option>
						  <option value = 4 >Central</option>
						  <option value = 7 >Northern</option>
						  <option value = 6 >Eastern</option>
			</select>
			   </div>
			</div>
                    <br/> -->


              <div class="control-group">
                      <label class="control-label" for="Sub" id="opt_type_2">Select District</label>
                         <div class="controls">
                             <select name = "district" id="sub" class = "form-control" >
                              <?php

                                $dd = "SELECT * FROM ussddistricts order by districtname ASC";
                                $ddd = $this->db->query($dd);
                                foreach ($ddd->result_array() as $rowss) { ?>
                        <option value="<?php echo $rowss['districtid']; ?>"><?php echo $rowss['districtname']; ?></option>
                    <?php } ?>

                              <!--  <option value="41">Bukomansimbi</option>
                                 <option value="58">Butambala</option>
                                 <option value="3">Gomba</option>
                                 <option value="4">Jinja</option>
                                 <option value="5">Masaka</option>
                                 <option value="6">Mpigi</option>
                                 <option value="7">Kalangala</option>
                                 <option value="8">Kampala</option>
                                 <option value="9">Wakiso</option> -->
                             </select>
                        </div>
                    </div>
			<br/>
			<div class="control-group">
			      <label class="control-label" for = "Slung" >Select Category</label>
				  <div class="controls">
			        <select name = 'category1' id="category1" class="form-control">
						  <option value= "Food advisory" >Food advisory</option>
						  <option value= "Agriculture advisory"  >Agricuture advisory</option>
                          <option value= "water advisory" >Water advisory</option>
                         <option value= "health advisory" >Health advisory</option>
						  <option value= "Weather Forecast"  >Weather Forecast </option>
                          <option value= "offer feedback"  >Forecast advise </option>

			</select>
			   </div>
			</div>
			<br/>
			<div class="control-group">
			      <label class="control-label" for = "option" id = "opt_type" >Select subcatergory</label>
				  <div class="controls">
			    <select name = 'category2'  id="category2" class="form-control" >
                    <option value = 1 >Food Security Tips</option>
			     </select>
			   </div>
			</div>
			<br/>
      <div class="control-group">
			      <label class="control-label" for = "option" id = "opt_type" >Select Response Language</label>
				  <div class="controls">
			    <select name = 'lang'  id="lang" class="form-control" >
                    <option value = "English" >English</option>
                    <option value = "Luganda" >Luganda</option>
			     </select>
			   </div>
		</div>
			<br/>
			<div class="control-group">
				  <div class="controls">
				<button type="submit" name="request_s" class="btn btn-info"><i class="fa fa-hand-rock-o" aria-hidden="true"></i>&nbsp;Request</button>
		  </div>
		</div>
		<br/>
	   </div>
	   </section>
	</aside>
	<div class="content-wrapper">
	<div class="col-md-12"  >
	    <?php
		//if($response == "Text"){
        if ($category1 == "Agriculture advisory" || $category1 == "Food advisory" || $category1 == "water advisory" || $category1 == "health advisory" ) {

            ?>
            <section class="content-header">
                <h1>Welcome to the WIDS <?php echo $category1; ?> </h1>
            </section>
            <div id='body' style="min-height: 600px; height: auto; background-color: #e4ecf3" >

                <?php
                    $this->load->view('show_audio_advise');

        }else{
            
        if($category1 == "Weather Forecast") {
           // echo "weather forecast";
            //exit;
            $this->load->view('show_Daily_Forecast');

        }else if($category1 == "offer feedback"){

            $this->load->view('feedback');

        }else {
            $this->load->view('home');
        }

			?>

		<?php }?>
   	</div>

	 <!--</div> -->

          </div>
      </div>
        <footer class="main-footer">
               <div class="pull-right hidden-xs">
                    <b>Version</b>
                    <?php
                        echo $this->config->item('dissemination_version');
                    ?>
                   </div>
                <strong>Copyright &copy; <?php echo date('Y');?>  <a href="http://wimea.mak.ac.ug/" target="_blank">WIMEA-ICT</a>.</strong> All rights reserved.
            </footer>
       </div>
	</body>

     <script>
	$("#category1").change(function(){
		var selection=$("#category1").val();
		if(selection== "Agriculture advisory" ){
			var opt = "Select option";
			var options="<option value = 5 >Planting Advice</option>";
				options+="<option value = 6 >Harvesting Advice</option>";
				options+="<option value = 7 >Pests and Diseases</option>";

			$("#opt_type").html(opt);
			$("#category2").html(options);


		}else if(selection=="Food advisory"){
			var opt = "Select Food Security advice";
			var options="<option value = 1 >Food Security Tips</option>";
				options+="<option value = 3 >Hunger forecast</option>";
				options+="<option value = 4 >Food storage tips</option>";

			$("#opt_type").html(opt);
			$("#category2").html(options);
		}else if(selection=="offer feedback"){
            var opt = "Give us your Forecast";
            var options="<option>Forecast advise</option>";


            $("#opt_type").html(opt);
            $("#category2").html(options);
        }else if(selection=="water advisory"){
            var opt = "Water Advise";
            var options="<option value = 9 >water Advice</option>";


            $("#opt_type").html(opt);
            $("#category2").html(options);
        }else if(selection=="health advisory"){
            var opt = "health Advise";
            var options="<option value = 8 >health Advice</option>";


            $("#opt_type").html(opt);
            $("#category2").html(options);
        }else{
			var opt = "Select Period";
			var options="<option>Today</option>";
				options+="<option>Dekadal</option>";
				options+="<option>Seasonal</option>";

				$("#opt_type").html(opt);
			$("#category2").html(options);
		}
	});

	 </script>
</html>
