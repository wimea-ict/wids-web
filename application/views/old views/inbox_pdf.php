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
        <h2>Inbox List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>UpdatedInDB</th>
		<th>ReceivingDateTime</th>
		<th>Text</th>
		<th>SenderNumber</th>
		<th>Coding</th>
		<th>UDH</th>
		<th>SMSCNumber</th>
		<th>Class</th>
		<th>TextDecoded</th>
		<th>RecipientID</th>
		<th>Processed</th>
		
            </tr><?php
            foreach ($inbox_data as $inbox)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $inbox->UpdatedInDB ?></td>
		      <td><?php echo $inbox->ReceivingDateTime ?></td>
		      <td><?php echo $inbox->Text ?></td>
		      <td><?php echo $inbox->SenderNumber ?></td>
		      <td><?php echo $inbox->Coding ?></td>
		      <td><?php echo $inbox->UDH ?></td>
		      <td><?php echo $inbox->SMSCNumber ?></td>
		      <td><?php echo $inbox->Class ?></td>
		      <td><?php echo $inbox->TextDecoded ?></td>
		      <td><?php echo $inbox->RecipientID ?></td>
		      <td><?php echo $inbox->Processed ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>