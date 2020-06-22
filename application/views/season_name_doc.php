<!doctype html>
<html>
    <head>
        <title>Word Doc</title>

        <!---------------------- Amoko ------------------------->
        <!-- Remove the word Boostrap in the url base -->
        <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css') ?>"/>
        <!---------------------- Amoko ------------------------->

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
        <h2>Seasons List</h2>
        <table class="word-table" style="margin-bottom: 10px;width: 100%">
            <tr>
                    <th width="80px">No.</th>
                    <th>Season Name</th>
                    <th>Abbreviation</th>
                    <th>Month From</th> 
                    <th>Month To</th>
                </tr>
            <?php
            $start = 0;
            foreach ($seasons_data as $re){ $start++;?>
                <tr>
                    <td><?php echo ++$start ?></td>
                    <td><?php  echo $re->season_name;?></td>
                     <td><?php  echo $re->abbreviation;?></td>
                     <td><?php  echo $re->month_from;?></td>
                     <td><?php  echo $re->month_to;?></td>
                </tr>
            <?php }?>
        </table>
    </body>
</html>