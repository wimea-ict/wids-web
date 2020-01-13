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
        <h2>Outbox List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>UpdatedInDB</th>
		<th>InsertIntoDB</th>
		<th>SendingDateTime</th>
		<th>SendBefore</th>
		<th>SendAfter</th>
		<th>Text</th>
		<th>DestinationNumber</th>
		<th>Coding</th>
		<th>UDH</th>
		<th>Class</th>
		<th>TextDecoded</th>
		<th>MultiPart</th>
		<th>RelativeValidity</th>
		<th>SenderID</th>
		<th>SendingTimeOut</th>
		<th>DeliveryReport</th>
		<th>CreatorID</th>
		
            </tr><?php
            foreach ($outbox_data as $outbox)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $outbox->UpdatedInDB ?></td>
		      <td><?php echo $outbox->InsertIntoDB ?></td>
		      <td><?php echo $outbox->SendingDateTime ?></td>
		      <td><?php echo $outbox->SendBefore ?></td>
		      <td><?php echo $outbox->SendAfter ?></td>
		      <td><?php echo $outbox->Text ?></td>
		      <td><?php echo $outbox->DestinationNumber ?></td>
		      <td><?php echo $outbox->Coding ?></td>
		      <td><?php echo $outbox->UDH ?></td>
		      <td><?php echo $outbox->Class ?></td>
		      <td><?php echo $outbox->TextDecoded ?></td>
		      <td><?php echo $outbox->MultiPart ?></td>
		      <td><?php echo $outbox->RelativeValidity ?></td>
		      <td><?php echo $outbox->SenderID ?></td>
		      <td><?php echo $outbox->SendingTimeOut ?></td>
		      <td><?php echo $outbox->DeliveryReport ?></td>
		      <td><?php echo $outbox->CreatorID ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>