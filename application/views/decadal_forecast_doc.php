<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
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
        <h2>Dekadal_forecast List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
            <th>No</th>
            <th>Issue Date</th>
            <th> Date From</th>
            <th> Date To</th>
		    <th>General Information</th>
		    <th>Rainfall Performance</th>
		
            </tr><?php
            foreach ($decadal_forecast_data as $d)
            {
	
                ?>
                <tr>
                    <td><?php echo ++$start ?></td>
                    <td><?php echo $d->issue; ?></td>
                    <td><?php echo $d->date_from; ?></td>
                    <td><?php echo $d->date_to; ?></td>
                    <td><?php echo $d->general_info; ?></td>
                    <td><?php echo $d->general_info; ?></td>              
              </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>