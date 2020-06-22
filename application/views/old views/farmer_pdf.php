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
        <h2>Farmer List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>First Name</th>
		<th>Middle Name</th>
		<th>Last Name</th>
		<th>Phone</th>
		
            </tr><?php
            foreach ($farmer_data as $farmer)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $farmer->first_name ?></td>
		      <td><?php echo $farmer->middle_name ?></td>
		      <td><?php echo $farmer->last_name ?></td>
		      <td><?php echo $farmer->phone ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>