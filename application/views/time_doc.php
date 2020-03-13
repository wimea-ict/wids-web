<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
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
        </style>
    </head>
    <body>
        <h2>Daily Forecast Periods</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                    <th width="80px">No.</th>
                    <th>Period Name</th>
                    <th>Time From</th>
                    <th>Time To</th>
                </tr>

                 <?php foreach($time_data as $re){


        ?>
            <tr>
                <td><?php echo ++$start ?></td>
                <td><?php  echo $re->period_name;?></td>
                <td><?php  echo $re->from_time;?></td>
                <td><?php  echo $re->to_time;?></td>
            </td>
                <?php  } ?>
            <!-- Amoko-------------------------------- -->
            
        </table>
    </body>
</html>