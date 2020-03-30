<!DOCTYPE html>
<html>
<head>
    <title>Daily_forecast Data List</title>
    <!-- Amoko-------------------------------- -->
        <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css') ?>"/>
        <!-- Amoko-------------------------------- -->
        <style>
            .word-table {
                border:1px solid black !important; 
                border-collapse: collapse !important;
                width: 100%;
            }
            .word-table tr th, .word-table tr td{
                border:1px solid black !important; 
                padding: 5px 10px;
            }
            tr{
                vertical-align: top;
            }
        </style>
</head>
<body>
    <h2>Daily_forecast Data List</h2>
     <table class="word-table" style="margin-bottom: 10px">
            <tr>
                    <th width="80px">No</th>
                    <th width="80px">Forecast Type</th>
                    <th width="80px">Weather</th>
                    <th width="80px">Time</th>
                    <th>Impact Description</th>
                </tr>
              <?php foreach($daily_impacts_data2 as $re){


        ?>
        <tr>
            <td><?php echo ++$start ?></td>
            <td><?php  echo $re->type;?></td>
            <td><?php  echo $re->weather;?></td>
            <td><?php  echo $re->time;?></td>
            <td><?php  echo $re->description;?></td>
            </tr>

                <!-- Amoko-------------------------------- -->
                <?php
            }
            ?>
    </table>
</body>
</html>