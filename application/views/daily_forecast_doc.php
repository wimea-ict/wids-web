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
            tr{
                vertical-align: top;
            }
        </style>
    </head>
    <body>
        <h2>Daily_forecast List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
                <th>Forecast Date</th>
                <th>Forecast Time</th>
                <th>Issue Date</th>
                <th>Validity</th>
                <th>Duty Forecaster</th>
                <th>Weather Summary</th>
                <th>Time Posted</th>
            </tr>
            <!-- Amoko-------------------------------- -->
            <?php
            $start = 0;
            foreach ($daily_forecast_data as $p)
            {
                ?>
                <tr>
		      <tr>
                <td><?php echo ++$start ?></td>
                <td><?php  echo $p->date; ?></td>           
                <td><?php echo $p->time; ?></td>
                <td><?php echo $p->issuedate; ?></td>
                <td><?php echo $p->validitytime; ?></td>
                <td><?php echo $p->dutyforecaster; ?></td>          
                <td><?php echo $p->weather; ?></td>
                <td><?php echo $p->datetime; ?></td>
            </tr>

                <!-- Amoko-------------------------------- -->
                <?php
            }
            ?>
        </table>
    </body>
</html>