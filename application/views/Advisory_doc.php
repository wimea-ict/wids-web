<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css') ?>"/>
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
        <h2>Seasonal Advisory List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th width="80px">No</th>
                <th>Sector</th>
                <th>Forecast</th>
                <th>Advisory Summary</th>
            </tr>
            <?php
            $start = 0;
            foreach ($advisory_data as $ad){
                ?>
                <tr>
                    <td><?php echo ++$start ?></td>
                    <td><?php  echo $ad['sector_name'] ; ?></td>
                    <td><?php  echo $ad['abbreviation']."(".$ad['year'].")";  ?></td>                 
                    <td> <?php echo $ad['message_summary']; ?></td>                 
                    
            <?php 
            }

            ?>
        </table>
    </body>
</html>