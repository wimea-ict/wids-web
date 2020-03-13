<!doctype html>
<html>
    <head>
        <title>PDF</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
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
        <h2>Season List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
            <th width="80px">No.</th>
		   		    <th>Season Name</th>
                    <th>Abbreviation</th>
                    <th>Month From</th>	
                    <th>Month To</th>
                   
		
            </tr><?php
            foreach ($season_data as $season)
            {
              
                ?>
                <tr>

                <td><?php echo ++$start ?></td>
			<td><?php  echo $season->season_name;?></td>
             <td><?php  echo $season->abbreviation;?></td>
             <td><?php  echo $season->month_from;?></td>
             <td><?php  echo $season->month_to;?></td>
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>