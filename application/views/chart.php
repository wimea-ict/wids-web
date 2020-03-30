<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*$this->load->model('Daily_forecast_model');
foreach ($this->Daily_forecast_model->get_data() as $daily){
              echo $daily->region;
              exit();

             }
             */

           //  echo $a;

?>      

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">

      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['region', 'mnumbers'],
          
           <?php

 switch ($a) {  
    case "Kampala":
        $b = 3;
        break;
    case "Entebbe":
      $b = 3;
        break;
    case "Kalangala":
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
    case "Fort Portal":
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
    case "Nakaseke";
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
 
    if($b == 3){
    
                 $sqlx = "SELECT * FROM data LIMIT 5";
                 $sql2= $this->db->query($sqlx);
                 foreach ($sql2->result_array() as $row1) { 
                  echo "['".$row1['days_of_the_week']."',".$row1['d02']."],";

                }

}else if($b == 1){

         $sqlx = "SELECT * FROM data LIMIT 5";
                 $sql2= $this->db->query($sqlx);
                 foreach ($sql2->result_array() as $row1) { 
                  echo "['".$row1['days_of_the_week']."',".$row1['d03']."],";

                }

}

else if($b == 4){

         $sqlx = "SELECT * FROM data LIMIT 5";
                 $sql2= $this->db->query($sqlx);
                 foreach ($sql2->result_array() as $row1) { 
                  echo "['".$row1['days_of_the_week']."',".$row1['d01']."],";

                }

}

           ?>

        ]);

        var options = {
          title: 'Rainfall values for last 5 days',
          is3D: true,
          pieSliceText: 'value',
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>









<script type="text/javascript">

google.charts.load('current', {packages: ['corechart', 'bar']});
google.charts.setOnLoadCallback(drawAnnotations);

function drawAnnotations() {
      var data = google.visualization.arrayToDataTable([
        ['City', '2010 Population', '2000 Population'],


         <?php
    
                 $sqlx = "SELECT * FROM data LIMIT 5";
                 $sql2= $this->db->query($sqlx);
                 foreach ($sql2->result_array() as $row1) { 
                  echo "['".$row1['d03']."',".$row1['d01']."],";

                }


           ?>




       // ['New York City, NY', 8175000, 8008000],
       // ['Los Angeles, CA', 3792000, 3694000],
       // ['Chicago, IL', 2695000, 2896000],
       // ['Houston, TX', 2099000, 1953000],
       // ['Philadelphia, PA', 1526000, 1517000]
      ]);

      var data = google.visualization.arrayToDataTable([
        ['City', '2010 Population', {type: 'string', role: 'annotation'},
         '2000 Population', {type: 'string', role: 'annotation'}],
        ['New York City, NY', 8175000, '8.1M', 8008000, '8M'],
        ['Los Angeles, CA', 3792000, '3.8M', 3694000, '3.7M'],
        ['Chicago, IL', 2695000, '2.7M', 2896000, '2.9M'],
        ['Houston, TX', 2099000, '2.1M', 1953000, '2.0M'],
        ['Philadelphia, PA', 1526000, '1.5M', 1517000, '1.5M']
      ]);
 
      var options = {
        title: 'Population of Largest U.S. Cities',
        chartArea: {width: '50%'},
        annotations: {
          alwaysOutside: true,
          textStyle: {
            fontSize: 12,
            auraColor: 'none',
            color: '#555'
          },
          boxStyle: {
            stroke: '#ccc',
            strokeWidth: 1,
            gradient: {
              color1: '#f3e5f5',
              color2: '#f3e5f5',
              x1: '0%', y1: '0%',
              x2: '100%', y2: '100%'
            }
          }
        },
        hAxis: {
          title: 'Total Population',
          minValue: 0,
        },
        vAxis: {
          title: 'City'
        }
      };
      var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
      chart.draw(data, options);
    }


</script>


<script type="text/javascript">

google.charts.load('current', {packages: ['corechart', 'bar']});
google.charts.setOnLoadCallback(drawBasic);

function drawBasic() {

      var data = new google.visualization.DataTable();
      data.addColumn('timeofday', 'Time of Day');
      data.addColumn('number', 'Rainfall in mm');

      data.addRows([


         <?php



                switch ($a) {  
    case "Kampala":
        $b = 3;
        break;
    case "Entebbe":
      $b = 3;
        break;
    case "Kalangala":
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
    case "Fort Portal":
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
    case "Nakaseke";
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
 

      if($b == 3){
                  $time = 8;
                 $sqlx = "SELECT * FROM data";
                 $sql2= $this->db->query($sqlx);
                 foreach ($sql2->result_array() as $row1) { 
                  echo "[{v: [".$time++."]},".$row1['d01']."],";
                  //echo "[{v: [".$row1['days_of_the_week']."]},".$row1['d01']."],";

                }

}

  if($b == 1){
                  $time = 8;
                 $sqlx = "SELECT * FROM data";
                 $sql2= $this->db->query($sqlx);
                 foreach ($sql2->result_array() as $row1) { 
                  echo "[{v: [".$time++."]},".$row1['d02']."],";
                //   echo "[{v: [".$row1['days_of_the_week']."]},".$row1['d02']."],";

                }

}

if($b == 4){
                  $time = 8;
                 // $time = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");
                 $sqlx = "SELECT * FROM data";
                 $sql2= $this->db->query($sqlx);
                 foreach ($sql2->result_array() as $row1) { 
                  echo "[{v: [".$time++."]},".$row1['d03']."],";
                 //  echo "[{v: [".$row1['days_of_the_week']."]},".$row1['d03']."],";

                }

}



                 
           ?>



      //  [{v: [8, 0, 0], f: '8 am'}, 1],
        //[{v: [9, 0, 0], f: '9 am'}, 2],
        //[{v: [10, 0, 0], f:'10 am'}, 3],
        //[{v: [11, 0, 0], f: '11 am'}, 4],
        //[{v: [12, 0, 0], f: '12 pm'}, 5],
        //[{v: [13, 0, 0], f: '1 pm'}, 6],
        //[{v: [14, 0, 0], f: '2 pm'}, 7],
        //[{v: [15, 0, 0], f: '3 pm'}, 8],
        //[{v: [16, 0, 0], f: '4 pm'}, 9],
        //[{v: [17, 0, 0], f: '5 pm'}, 10],
      ]);

      var options = {
        title: 'Rainfall distribution forecast for next 7 days',
        hAxis: {
          title: 'Days',
          format: 'h',
          viewWindow: {
            min: [7],
            max: [15]
          }
        },
        vAxis: {
          title: 'Rating (scale of 1-10)'
        }
      };

      var chart = new google.visualization.ColumnChart(
        document.getElementById('chart_div_2'));

      chart.draw(data, options);
    }

</script>


      <div class="col-xs-6">
       <div id="chart_div_2" style="width: 900px; height: 500px;"></div>
     </div>
   <div class="col-xs-6">  
    <div id="piechart" style="width: 900px; height: 500px;"></div>
</div>


</div>
</section>

  </body>
</html>   