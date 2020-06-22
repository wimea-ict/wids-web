
        <!-- Main content -->
   <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Weather Information Dissemination System</title>
        <!-- Tell the browser to be responsive to screen width -->
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
         background-image: url("<?php echo base_url() ?>assets/frameworks/adminlte/img/trythis.PNG");
          
       }
       .main-sidebar{
         background-image: url("<?php echo base_url() ?>assets/frameworks/adminlte/img/trythis.PNG");
          
       }
       
    </style>
   
        
    </head>    
          
    
      <body>
       <!-- <section class='content'>
          <div class='row'>
            <div class='col-xs-5'>-->
              <div class='row' style="margin-left:  10px; margin-top: 25px;">
              <div class='panel panel-primary col-md-11' style="padding: 0px;">
                <div class='panel-heading'>
                Advisory Read
                </div>
                <div class="panel-body">
                 <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
        <th>District</th>
        <!--<th>Region</th> -->
       <th>Message</th>
                </tr>
            </thead>
      <tbody>

                <?php    
               // echo $a;

              switch ($a) {  
    case "Kampala":
        $b = 3;
        break;
    case "Entebbe":
      $b = 3;
        break;
    case "Buvuma":
    $b = 3;
      break;
    case "Butambala":
    $b = 3;
      break;
      case "Gomba":
      $b = 3;
        break;
        case "Mityana":
        $b = 3;
          break;
          case "Mayuge":
          $b = 3;
            break;
            case "Busia":
            $b = 3;
              break;
    case "Kalangala":
      $b = 3;
        break;
    case "Buvuma":
      $b = 3;
        break;
    case "Wakiso";
      $b = 3;
        break;
     case "Masaka":
        $b = 3;
        break;
    case "Mpigi":
      $b = 3;
        break;
    case "Jinja":
      $b = 3;
        break;
    case "Kisoro";
      $b = 1;
        break;
    case "Runkungiri";
      $b = 1;
      break;
    case "Kanungu";
      $b = 1;
      break;
    case "Isingiro";
      $b = 1;
      break;
    case "Ibanda";
      $b = 1;
        break;
    case "Buhweju";
        $b = 1;
          break;
    case "Mitooma";
        $b = 1;
        break;
    case "Sheema";
        $b = 1;
          break;
    case "Rubirizi";
       $b = 1;
        break;
    case "Bundibugyo";
    $b = 1;
      break;
    case "Ntoroko";
    $b = 1;
      break;

    case "Kyenjojo";
    $b = 1;
      break;
    case "Kyegegwa";
    $b = 1;
      break;

    case "Kamwenge";
    $b = 1;
      break;

    case "Kibaale";
    $b = 1;
      break;

    case "Buliisa";
    $b = 1;
      break;

    case "Masindi";
    $b = 1;
      break;



    case "Kiruhura";
        $b = 1;
         break;
     case "Kabale":
        $b = 1;
        break;
    case "Ntungamo":
      $b = 1;
        break;
    case "Bushenyi":
      $b = 1;
        break;
    case "Mbarara";
      $b = 1;
        break;
     case "Kasese":
        $b = 1;
        break;
    case "Hoima":
      $b = 1;
        break;
    case "Kabarole":
      $b = 1;
        break;
    case "Kiboga";
      $b = 2;
        break;
case "Rakai":
        $b = 2;
        break;
    case "Ssembabule":
      $b = 2;
        break;
    case "Bukomansimbi":
      $b = 2;
        break;
    case "Mukono";
      $b = 2;
        break;
     case "Nakasongola":
        $b = 2;
        break;
    case "Kayunga":
      $b = 2;
        break;
    case "Luweero":
      $b = 2;
        break;
    case "Lwengo":
    $b = 2;
      break;
    case "Lyantonde":
    $b = 2;
      break;
    case "Nakaseke";
      $b = 2;
        break;
        case "Kyankwanzi":
        $b = 2;
          break;
      case "Buikwe":
      $b = 2;
        break;
     case "Mubende":
        $b = 2;
        break;
    case "Kalungu":
      $b = 2;
        break;

    case "Kamuli":
      $b = 4;
        break;
        case "Bugiri North":
        $b = 4;
          break; 
    case "Namutumba":
    $b = 4;
      break;
    case "Kaliro":
    $b = 4;
      break; 
    case "Tororo":
    $b = 4;
      break;  
      case "Sironko":
      $b = 4;
        break;
    case "Manafwa":
    $b = 4;
      break;
    case "Kapchorwa":
    $b = 4;
      break;
    case "Kumi":
    $b = 4;
      break;
    case "Abim":
    $b = 4;
      break;
    case "Napak":
    $b = 4;
      break;
    case "Amuria":
    $b = 4;
      break;
    case "Bukwo":
    $b = 4;
      break;
    case "Bukedea":
    $b = 4;
      break;
    case "Ngora":
    $b = 4;
      break;
    case "Katakwi":
    $b = 4;
      break;
    case "Kotido":
    $b = 4;
      break;
    case "Nakapiripirit":
    $b = 4;
      break;
      
    case "Kaberamaido":
    $b = 4;
      break;
      case "Kween":
      $b = 4;
        break;
    case "Bulambuli":
    $b = 4;
      break;
    case "Luuka":
      $b = 4;
        break;
    case "Iganga";
      $b = 4;
        break;
     case "Buyende":
        $b = 4;
        break;
    case "Paliisa":
      $b = 4;
        break;
    case "Bugiri":
      $b = 4;
        break;
    case "Mbale";
      $b = 4;
        break;

    case "Budaka":
      $b = 4;
        break;
    case "Bududa";
      $b = 4;
        break;
     case "Soroti":
        $b = 4;
        break;
    case "Serere":
      $b = 4;
        break;
    case "Moroto":
      $b = 4;
        break;
    case "Amudat";
      $b = 4;
        break;
    case "Butaleja";
      $b = 4;
        break;

    case "Gulu":
      $b = 5;
        break;
    case "Moyo":
    $b = 5;
      break;
    case "Alebtong":
    $b = 5;
      break;
    case "Otuke":
    $b = 5;
      break; 
    case "Amuru":
    $b = 5;
      break;
    case "Oyam":
    $b = 5;
      break;
    case "Arua":
    $b = 5;
      break;
    case "Kole":
    $b = 5;
      break;
    case "Kirandongo":
    $b = 5;
      break;
    case "Maracha":
    $b = 5;
      break;
    case "Nebbi":
    $b = 5;
      break;
    case "Okoro":
    $b = 5;
      break;
    case "Adjumani":
    $b = 5;
      break;
    case "Yumbe":
    $b = 5;
      break;
    case "Koboko":
    $b = 5;
      break;
    case "Zombo":
    $b = 5;
      break;
    case "Apac";
      $b = 5;
        break;
     case "Lira":
        $b = 5;
        break;
    case "Kitgum":
      $b = 5;
        break;
    case "Pader":
      $b = 5;
        break;
    case "Kaabong";
      $b = 5;
        break;

    case "Dokolo":
      $b = 5;
        break;
    case "Agago";
      $b = 5;
        break;
     case "Amolatar":
        $b = 5;
        break;
    case "Lamwo":
      $b = 5;
        break;
    case "Nwoya":
      $b = 5;
        break;
    default:
        echo "No details for the place, region or district selected";
}

                          $red = "SELECT name from region WHERE regionid = '$b'";
                          $red2 = $this->db->query($red);

                           //$sql2 = $this->db->get_where('possible_advisories',array('cat' => 'agric'));
                           $sqlx = "SELECT * FROM  advisory WHERE region = '$b' && advice = '$c' LIMIT 1";
                           $sql2= $this->db->query($sqlx);
                           foreach ($sql2->result_array() as $row1) { ?>

                           <tr>
                            <td> <?php echo $a; ?> </td>
                            <!--<td> <?php //echo $row1['region']?></td> -->
                            <td> <?php echo $row1['message'];  ?></td>
             
             <?php    }  ?>

               </tr>
                          
<?php

/*

NOTE: IMPORTANT:
BEFORE RETRIEVING THIS ADVISORY FROM THE ADVISORY TABLE, FIRST YOU HAVE TO RETRIEVE THE DATA FROM THE WRF MODEL TABLE IN THE DATABSE AND DISPLAY IT.. THEN AFTER RETRIEVING THIS DATA, DEPENDING ON THE DETAILS YOU RETRIEVE, YOU THEN WRITE SQL STATEMENTS TO CALL THE APPROPRIATE DATA FROM THE ADVISORY TABLE..

e.g TEMP = 30,
SELECT FROM ADVISORY WHERE TEMP == $TEMP


HENCE WE SHALL NEED A NEW ADVISORY TABLE WHICH HAS THE ADVISORIES TOGETHER WITH THE PARAMETERS ALONGSIDE EACH TYPE OF ADVISORY.


*/






                 ?>
 </tbody>
        </table>
       
                    </div><!-- /.box-body -->
              </div><!-- /.box -->
           <!-- </div><!-- /.col -->
          </div><!-- /.row -->
       <!-- </section><!-- /.content -->


                