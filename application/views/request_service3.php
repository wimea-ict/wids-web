<!DOCTYPE html>
<html><head>
         <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
		
		<!-- Global site tag (gtag.js) - Google Analytics -->
        
        <style>
     .tabs{
        height:auto;
        margin:0 auto;
			
	
      }

/* tab list item */
.tabs .tabs-list{
    list-style:none;
    margin:0px;
    padding:0px;
}
.tabs .tabs-list li{
    width:160px;
    float:left;
    margin:0px;
    margin-right:2px;
    padding:10px 5px;
    text-align: center;
    background-color:cornflowerblue;
    border-radius:3px;
}
.tabs .tabs-list li:hover{
    cursor:pointer;
}
.tabs .tabs-list li a{
    text-decoration: none;
    color:white;
}

/* Tab content section */
.tabs .tab{
    display:none;
    width:86%;
    min-height:250px;
    height:auto;
    border-radius:3px;
    padding:20px 15px;
    background-color:lavender;
    color:darkslategray;
    clear:both;
}
.tabs .tab h3{
    border-bottom:3px solid cornflowerblue;
    letter-spacing:1px;
    font-weight:normal;
    padding:5px;
}
.tabs .tab p{
    line-height:20px;
    letter-spacing: 1px;
}


/* When active state */
.active{
    display:block !important;
}
.tabs .tabs-list li.active{
    background-color:lavender !important;
    color:black !important;
}
.active a{
    color:black !important;
}

/* media query */
@media screen and (max-width:360px){
    .tabs{
        margin:0;
        width:96%;
    }
    .tabs .tabs-list li{
        width:180px;
    }
}
        </style>
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-133419491-1"></script>
		<script>
		  window.dataLayer = window.dataLayer || [];
		  function gtag(){dataLayer.push(arguments);}
		  gtag('js', new Date());

		  gtag('config', 'UA-133419491-1');
		</script>

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
			   background-image: url("<?php echo base_url() ?>assets/frameworks/adminlte/img/trythis.jpg");

		   }
		   .main-sidebar{
			   background-image: url("<?php echo base_url() ?>assets/frameworks/adminlte/img/trythis.png");
                           

		   }

		</style>
      <script type="text/javascript">
$(document).ready(function(){

  $(".tabs-list li a").click(function(e){
     e.preventDefault();
  });

  $(".tabs-list li").click(function(){
     var tabid = $(this).find("a").attr("href");
     $(".tabs-list li,.tabs div.tab").removeClass("active");   // removing active class from tab

     $(".tab").hide();   // hiding open tab
     $(tabid).show();    // show tab
     $(this).addClass("active"); //  adding active class to clicked tab

  });

});
</script>


    </head>
	<body class="hold-transition skin-blue sidebar-mini" >
  

		<div class = "wrapper" style="background-color:lavender;" >
		   <div class="row" >
			 <!--<div class = 'col-md-12'>-->
			      <header class="main-header">
							     <a href="#" class="logo">
                                <!-- mini logo for sidebar mini 50x50 pixels -->
                                <span class="logo-mini"><b>W</b>IDS</span>
                                <!-- logo for regular state and mobile devices -->
                                <span class="logo-lg"><h5>WEATHER INFORMATION DISSEMINATION SYSTEM</h5></span>
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
                                        <li style=" text-align:left; padding-top:15px"> <small>                                        
                                           <form method="post" action="<?php site_url('index.php/auth/index') ?>"><span style="color:white;font-weight:bold">Language:
                                        </span> <select name="language" onChange="submit()">
                                           <?php 
					  if(isset($languages)){
						  foreach($languages as $fd){
							  ?>
                              <option value="<?php echo $fd->name; ?>"><?php echo $fd->name; ?></option>
                              <?php 							  
						  }						  
						}					
					?>  </select>                            
                                        
                                        </form> </small> </li>
                                        <li><?php echo anchor(site_url('index.php'), "<span class='glyphicon glyphicon-user'></span>" . strtoupper('home'));?></li>
                                        <li><?php echo anchor(site_url('index.php/Map/index'), "<span class='glyphicon glyphicon-globe'></span>" . strtoupper('Live Map'));?></li>

                                        <li><?php echo anchor(site_url('index.php/auth/load_login'), "<span class='glyphicon glyphicon-log-in'></span>" . strtoupper('Login'));?></li>

                                       <li>
                                            <a href="#" data-toggle="control-sidebar"><!--<i class="fa fa-gears"></i>--></a>
                                        </li>
                                    </ul>
                                </div>
                            </nav>


				   </header>
	   <!--<div class = "main_body">-->
           <aside class="main-sidebar" style="height:100%">
              <section class="sidebar">
				<div class="col-md-12" >
  		       <header> <h4><span class="test1"> <?php echo $request_service_form; ?> </span></h4> </header>
		<?php if($this->session->flashdata('success')){?>
			      <div class = "alert alert-success"><?php echo $this->session->flashdata('success');?></div>
		   <?php }
			echo form_open('index.php/auth/index/');
			?><br/>
            <form method="post" action="<?php site_url('index.php/auth/index') ?>">
              <div class="test1 control-group">
                      <label class="control-label" for="Sub" id="opt_type_2"> Select <?php echo "State"; ?></label>
                         <div class="controls">                             
							<select name = "division" id="sub" class = "form-control" required>
                                <option value="">Select Region </option>                            
                              <?php

                                $dd = "SELECT * FROM division order by division_name ASC";
                                $ddd = $this->db->query($dd);
                                foreach ($ddd->result_array() as $rowss) { ?>
                        <option value="<?php echo $rowss['id']; ?>"><?php echo $rowss['division_name']; ?></option>
                    <?php } ?>                  
                             </select>
                        </div>
                    </div>
			<br/>
            <div class="control-group">
			      <label class="control-label" for = "Slung" >Select Category</label>
				  <div class="controls">
			        <select name = 'category1' id="category1" class="form-control">
						  
						  <option value= "Agriculture advisory"  >Agricuture & Food Security</option>
                          <option value= "water advisory" >Water advisory</option>
                          <option value= "Food advisory" >Disaster Preparedness</option>
                         <option value= "health advisory" >Health advisory</option>
						  <option value= "Weather Forecast"  >Weather Forecast </option>
                          <option value= "offer feedback"  >Suggest forecast </option>

			</select>
			   </div>
			</div>
			<br/>
            <div class="control-group">
			      <label class="control-label" for = "option" id = "opt_type" >Select sub Catergory</label>
				  <div class="controls">
			    <select name = 'product'  id="product" class="form-control" >
                    
                    options="<option value = 5 >Planting Advice</option>
        <option value = 6 >Harvesting Advice</option>
        <option value = 7 >Pests and Diseases</option>
        <!--<option value = 10 >Food advisory</option> -->
			     </select>
			   </div>
			</div>
			<br/>
           
			<div class="control-group">
				  <div class="controls">
				<button type="submit" name="request_s" class="btn btn-info"><i class="fa fa-hand-rock-o" aria-hidden="true"></i>&nbsp;Request</button>
		  </div>
     </form>
		  </div>
		</div>
		<br/>
	   </div>
	   </section>
	</aside>
      
	<div class="content-wrapper" style=" width:100%;">
	<div class="col-md-12" style=" height:100%;" >
    <?php
        if ($category1 == "Agriculture advisory" ||$category1 == "water advisory" || $category1 == "health advisory" ) {

         } ?>
      <section class="content-header">
                <h1>Welcome to the WIDS <?php if (!$division==NULL){echo $category1;}else{ echo "Weather Forecast";} ?> </h1>
            </section>


                <!--<div class="col-lg-12  col-center-style">-->
                
                    
      <?php 
     // print_r($daily_forecast_region_data1);exit();
	  
	 // print_r($daily_forecast_region_data);
	  if(isset($daily_forecast_data)){ 
	  
	    foreach($daily_forecast_data as $d){
			$date = $d->date;
			$weather = $d->weather;
			$issuedate = $d->issuedate;	
			$validitydate = $d->validitytime;			
		}
	  
	  ?>
             <h3>Daily Forecast for  <?php echo $date; ?></h3>
             Issued on:&nbsp; <?php echo $issuedate; ?> and Valid till : &nbsp; <strong style="color:red"><?php echo $validitydate; ?></strong>
     <p>
  
     <table width="80%" height="100%" >
     	<tr>
        	<td colspan="7">Weather Description:&nbsp;<?php echo $weather; ?></td>
        </tr>
      	<tr>
       		<th></th>
            <th>Weather</th>
        	<th>Max Temp</th>
            <th>Min Temp</th>
            <th>Mean Temp</th>
            <th>Wind Speed</th>
            <th>Wind Direction</th>        
            <th>Wind Strength</th>                              
        </tr>
    <?php 
	   if(isset($daily_forecast_region_data)){
		foreach($daily_forecast_region_data as $fd){ ?>
        
        <?php if($fd->time=="Early Morning"){ ?>
        <tr>
         	<td>12:00am - 06:00am <br/><strong>(Early Morning)</strong></td>
            <td><img sr,c="<?php echo base_url() ?>assets/frameworks/adminlte/img/sunny.png" height="50" width="50"></td>
            <td><?php echo $fd->max_temp; ?>&deg;C</td>
            <td><?php echo $fd->min_temp; ?>&deg;C</td>
            <td><?php echo $fd->mean_temp; ?>&deg;C</td>
            <td><?php echo $fd->wind; ?></td>    
            <td><?php echo $fd->wind_direction; ?></td>          
            <td><?php echo $fd->wind_strength; ?></td>               
        </tr>
        <?php } else if($fd->time=="Late Morning"){ ?>
         <tr>
         	<td>06:00am - 12:00pm</td>
            <td><img src="<?php echo base_url() ?>assets/frameworks/adminlte/img/sunny.png" height="50" width="50"></td>
            <td><?php echo $fd->max_temp; ?>&deg;C</td>
            <td><?php echo $fd->min_temp; ?>&deg;C</td>
            <td><?php echo $fd->mean_temp; ?>&deg;C</td>
            <td><?php echo $fd->wind; ?></td>    
            <td><?php echo $fd->wind_direction; ?></td>          
            <td><?php echo $fd->wind_strength; ?></td>        
        </tr>
        <?php } else if($fd->time=="Afternoon"){ ?>
     <tr class="even">
         	<td>12:00pm -06:00pm</td>
            <td><img src="<?php echo base_url() ?>assets/frameworks/adminlte/img/showers.ico" height="50" width="50"></td>
            <td><?php echo $fd->max_temp; ?>&deg;C</td>
            <td><?php echo $fd->min_temp; ?>&deg;C</td>
            <td><?php echo $fd->mean_temp; ?>&deg;C</td>
            <td><?php echo $fd->wind; ?></td>  
            <td><?php echo $fd->wind_direction; ?></td>          
            <td><?php echo $fd->wind_strength; ?></td>         
        </tr>
        <?php }  else { ?>
         <tr class="odd">
         	<td>06:00pm-12:00am</td>
            <td><img src="<?php echo base_url() ?>assets/frameworks/adminlte/img/lightthunder.ico" height="50" width="50"></td>
            <td><?php echo $fd->max_temp; ?>&deg;C</td>
            <td><?php echo $fd->min_temp; ?>&deg;C</td>
            <td><?php echo $fd->mean_temp; ?>&deg;C</td>
            <td><?php echo $fd->wind; ?></td>   
            <td><?php echo $fd->wind_direction; ?></td>          
            <td><?php echo $fd->wind_strength; ?></td>          
        </tr>
        
     <?php  
		}
	 
	   }  } ?>
     </table>
     </p>
            
            
       <?php }else if(isset($dekadal_forecast_data)){ ?>
       
         Dekadal
       
       <?php } else if(isset($seasonal_data)){ ?>
            Seasonal
       <?php } else { ?>
         
     <div class="tabs">
  <ul class="tabs-list">
     <li class="active"><a href="#tab1">Daily Forecast</a></li>
     <li ><a href="#tab2">Dekadal Forecast</a></li>
     <li ><a href="#tab3">Seasonal Forecast<a/></li>
  </ul>

  <div id="tab1" class="tab active" style="">
     <h3>Daily Forecast</h3>
     <p>
     <table width="100%" cellspacing="5"  height="100%">
      	<tr>
        	<th>Time</th>
            <th>Conditions</th>
            <th>Temperature</th>
            <th>Precipitation</th>
            <th>Cloud Cover</th>
            <th>Dew point</th>
            <th>Humidity</th>
            <th>Wind direction</th>
            <th>Wind Speed</th>
            <th>Pressure</th>        
        </tr>
        <tr>

         	<td>12:00am - 06:00am</td>
             <td><img sr,c="<?php echo base_url() ?>assets/frameworks/adminlte/img/sunny.png" height="50" width="50"></td>
            <td><?php echo $fd->max_temp; ?>&deg;C</td>
            <td><?php echo $fd->min_temp; ?>&deg;C</td>
            <td><?php echo $fd->mean_temp; ?>&deg;C</td>
            <td><?php echo $fd->wind; ?></td>    
            <td><?php echo $fd->wind_direction; ?></td>          
            <td><?php echo $fd->wind_strength; ?></td> 
         <tr>
         	<td>06:00am - 12:00pm</td>
            <td><img src="<?php echo base_url() ?>assets/frameworks/adminlte/img/sunny.png" height="50" width="50"></td>
            <td><?php echo $fd->max_temp; ?>&deg;C</td>
            <td><?php echo $fd->min_temp; ?>&deg;C</td>
            <td><?php echo $fd->mean_temp; ?>&deg;C</td>
            <td><?php echo $fd->wind; ?></td>    
            <td><?php echo $fd->wind_direction; ?></td>          
            <td><?php echo $fd->wind_strength; ?></td>         
        </tr>
     <tr class="even">
         	<td>12:00pm -06:00pm</td>
            <td><img src="<?php echo base_url() ?>assets/frameworks/adminlte/img/showers.ico" height="50" width="50"></td>
            <td><?php echo $fd->max_temp; ?>&deg;C</td>
            <td><?php echo $fd->min_temp; ?>&deg;C</td>
            <td><?php echo $fd->mean_temp; ?>&deg;C</td>
            <td><?php echo $fd->wind; ?></td>    
            <td><?php echo $fd->wind_direction; ?></td>          
            <td><?php echo $fd->wind_strength; ?></td>         
        </tr>
         <tr class="odd">
         	<td>06:00pm-12:00am</td>
             <td><img sr,c="<?php echo base_url() ?>assets/frameworks/adminlte/img/sunny.png" height="50" width="50"></td>
            <td><?php echo $fd->max_temp; ?>&deg;C</td>
            <td><?php echo $fd->min_temp; ?>&deg;C</td>
            <td><?php echo $fd->mean_temp; ?>&deg;C</td>
            <td><?php echo $fd->wind; ?></td>    
            <td><?php echo $fd->wind_direction; ?></td>          
            <td><?php echo $fd->wind_strength; ?></td>        
        </tr>
     
     </table>
     </p>
  </div>
  <div id="tab2" class="tab">
    <h3>Dekadal/ 10 day Forecast for .... </h3> 
    <p>
    <table cellspacing="4" width="100%" border="1">
        <tr>
        	<th >Day </th>
            <th > Description</th>
            <th > High/Low</th>
            <th > Precipitation </th>
            <th > Humidity </th>
            <th> Gust </th>
            <th > Cloud (%)</th>
            <th > Visiblity</th>
            <th > Pressure</th>          
        </tr>
        <?php for($i=0;$i<10;$i++){ ?>
        <tr>
        	<td><?php  echo ($i+1);?></td>
            <td> Rainny</td>
            <td>28/22</td>
            <td>4mm</td>
            <td>68%</td>
            <td>23 km/hr</td>
            <td>34%</td>
            <td>23%</td>
            <td>1010 mb</td>           
                   
        </tr>
    	<?php } ?>
    
    </table>
    
    </p>
  </div>
  <div id="tab3" class="tab">
    <?php $this->load->view('advisory_read');?>
       </div>

</div>
         
                        
    <?php } ?>        
            
            
          </div>
      </div>
      
      

        <footer class="main-footer" style="margin-top:180px;">
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
    options+="<option value = 10 >Food advisory</option>";


        $("#opt_type").html(opt);
        $("#product").html(options);


    }else if(selection=="Food advisory"){
        var opt = "Select disaster advice";
        var options="<option value = 1 >Disaster advice</option>";


        $("#opt_type").html(opt);
        $("#product").html(options);
    }else if(selection=="offer feedback"){
        var opt = "Suggest Forecast basing on your local knowledge";
        var options="<option>Forecast advice</option>";


        $("#opt_type").html(opt);
        $("#product").html(options);
    }else if(selection=="water advisory"){
        var opt = "Water Advise";
        var options="<option value = 9 >water Advice</option>";


        $("#opt_type").html(opt);
        $("#product").html(options);
    }else if(selection=="health advisory"){
        var opt = "health Advise";
        var options="<option value = 8 >health Advice</option>";


        $("#opt_type").html(opt);
        $("#product").html(options);
    }else{
        var opt = "Select Product";
        var options="<option>Daily Forecast</option>";
            options+="<option>Dekadal Forecast</option>";
            options+="<option>Seasonal Forecast</option>";

            $("#opt_type").html(opt);
        $("#product").html(options);
    }
});
</script>

    
</html>
