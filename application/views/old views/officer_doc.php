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
        <h2>Officer List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>First Name</th>
		<th>Middle Name</th>
		<th>Last Name</th>
		<th>Phone</th>
		<th>Email</th>
		<th>District Id</th>
		<th>Category Id</th>
		
            </tr><?php
            foreach ($officer_data as $officer)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $officer->first_name ?></td>
		      <td><?php echo $officer->middle_name ?></td>
		      <td><?php echo $officer->last_name ?></td>
		      <td><?php echo $officer->phone ?></td>
		      <td><?php echo $officer->email ?></td>
		      <td><?php echo $officer->district_id ?></td>
		      <td><?php echo $officer->category_id ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>