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
        </style>
    </head>
    <body>
        <!---------------------- Amoko ------------------------->
        <h2>Season List</h2>
        <table class="word-table" style="margin-bottom: 10px;width: 100%">
            <tr>
                <th>No</th>
			<th>Season</th>
			<th>Year</th>
            <th>Overview</th>
            <th>General Forecast</th>
            <th>Issue Date</th>
		
            </tr>


            <?php
            $start = 0;
            foreach ($season_data as $season){ $start++;?>
                <tr style="vertical-align: top">
                    <td><?=$start ?></td>
                    <td><?=$season['abbreviation'] ?></td>
                    <td><?=$season['year']?></td>
                    <td><?=$season['overview'] ?></td>
                    <td><?=$season['general_forecast'] ?></td>
                    <td><?=$season['issuetime'] ?></td>
                </tr>
            <?php }?>
        </table>
        <!---------------------- Amoko ------------------------->
    </body>
</html>