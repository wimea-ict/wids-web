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
        <h2>Phones List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>ID</th>
		<th>UpdatedInDB</th>
		<th>InsertIntoDB</th>
		<th>TimeOut</th>
		<th>Send</th>
		<th>Receive</th>
		<th>Client</th>
		<th>Battery</th>
		<th>Signal</th>
		<th>Sent</th>
		<th>Received</th>
		
            </tr><?php
            foreach ($phones_data as $phones)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $phones->ID ?></td>
		      <td><?php echo $phones->UpdatedInDB ?></td>
		      <td><?php echo $phones->InsertIntoDB ?></td>
		      <td><?php echo $phones->TimeOut ?></td>
		      <td><?php echo $phones->Send ?></td>
		      <td><?php echo $phones->Receive ?></td>
		      <td><?php echo $phones->Client ?></td>
		      <td><?php echo $phones->Battery ?></td>
		      <td><?php echo $phones->Signal ?></td>
		      <td><?php echo $phones->Sent ?></td>
		      <td><?php echo $phones->Received ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>