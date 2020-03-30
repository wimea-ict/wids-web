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
        <h2>Forecast List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Forecast</th>
		<th>Advisory</th>
		<th>Created</th>
		<th>Createdby</th>
		
            </tr><?php
            foreach ($forecast_data as $forecast)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $forecast->forecast ?></td>
		      <td><?php echo $forecast->advisory ?></td>
		      <td><?php echo $forecast->created ?></td>
		      <td><?php echo $forecast->createdby ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>