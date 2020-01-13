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
        <h2>Sentitems List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>UpdatedInDB</th>
		<th>InsertIntoDB</th>
		<th>SendingDateTime</th>
		<th>DeliveryDateTime</th>
		<th>Text</th>
		<th>DestinationNumber</th>
		<th>Coding</th>
		<th>UDH</th>
		<th>SMSCNumber</th>
		<th>Class</th>
		<th>TextDecoded</th>
		<th>SenderID</th>
		<th>Status</th>
		<th>StatusError</th>
		<th>TPMR</th>
		<th>RelativeValidity</th>
		<th>CreatorID</th>
		
            </tr><?php
            foreach ($sentitems_data as $sentitems)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $sentitems->UpdatedInDB ?></td>
		      <td><?php echo $sentitems->InsertIntoDB ?></td>
		      <td><?php echo $sentitems->SendingDateTime ?></td>
		      <td><?php echo $sentitems->DeliveryDateTime ?></td>
		      <td><?php echo $sentitems->Text ?></td>
		      <td><?php echo $sentitems->DestinationNumber ?></td>
		      <td><?php echo $sentitems->Coding ?></td>
		      <td><?php echo $sentitems->UDH ?></td>
		      <td><?php echo $sentitems->SMSCNumber ?></td>
		      <td><?php echo $sentitems->Class ?></td>
		      <td><?php echo $sentitems->TextDecoded ?></td>
		      <td><?php echo $sentitems->SenderID ?></td>
		      <td><?php echo $sentitems->Status ?></td>
		      <td><?php echo $sentitems->StatusError ?></td>
		      <td><?php echo $sentitems->TPMR ?></td>
		      <td><?php echo $sentitems->RelativeValidity ?></td>
		      <td><?php echo $sentitems->CreatorID ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>